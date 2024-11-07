<?php

namespace App\Livewire\Visitors\Chat;

use App\Models\Chat;
use App\Models\Video;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Http;

class Show extends Component
{
    #[Rule('required|min:3|max:1024')]
    public $question;

    public $videoId;
    public $video;
    public $chatUuid;

    protected $listeners = ['getResponse'];

    public function mount($videoId, $chatUuid)
    {
        $this->videoId = $videoId;
        $this->chatUuid = $chatUuid;

        $this->video = Video::where('id', $videoId)->first();
    }

    public function render()
    {
        $chat = Chat::with('messages')->find($this->chatUuid);

        return view('livewire.visitors.chat.show', compact('chat'));
    }


    public function sendMessage()
    {
        $this->validate();

        $question = $this->question;

        $this->reset('question');

        $this->dispatch('chatMessageSent', $question);

        $sessionId = session()->getId();

        $chat = Chat::where('uuid', $this->chatUuid)->first();
        
        abort_if(!$chat, 403);
        abort_if($chat->session_id !== $sessionId, 403);
        abort_if($chat->chatable->id != $this->videoId, 403);

        $message = $chat->messages()->create([
            'content' => $question,
            'session_id' => $sessionId,
        ]);

        $this->dispatch('messageSent', $message->id);
    }

    public function getResponse()
    {
        $chat = Chat::find($this->chatUuid);

        $sessionId = session()->getId();
        
        abort_if(!$chat, 403);
        abort_if($chat->session_id !== $sessionId, 403);
        abort_if($chat->chatable->id != $this->videoId, 403);
        $message = $chat->messages()->latest()->first();

        abort_if($message->is_ai, 403);

        $chatEndpoint = config('services.python_api.endpoints.chat')($chat->chatable->video_id);

        try {

            $response = Http::asMultipart()
                ->timeout(999999)
                ->post($chatEndpoint, [
                    'message' => $message->content,
                ]);
            if ($response->successful()) {
                $response = $response->json();
                $chat->messages()->create([
                    'content' => $response['message'],
                    'session_id' => $sessionId,
                    'is_ai' => true,
                ]);

                $this->dispatch('responseRetrieved', $response['message']);
            } else {
                $chat->messages()->create([
                    'content' => 'حدث خطأ أثناء محاولة الإتصال بالخادم',
                    'session_id' => $sessionId,
                    'is_ai' => true,
                ]);
            }
        } catch (\Exception $exception) {
            sleep(5);
            $chat->messages()->create([
                'content' => 'حدث خطأ أثناء محاولة الإتصال بالخادم',
                'session_id' => $sessionId,
                'is_ai' => true,
            ]);
        }
    }

    public function destroySession()
    {
        session()->flush();
        session()->regenerate();
        $this->redirect(route('landing'));
    }
}
