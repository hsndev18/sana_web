<?php

namespace App\Livewire\Visitors\Video;

use App\Models\Chat;
use App\Models\Video;
use Livewire\Component;

class Loading extends Component
{
    public $videoId;

    public function mount($videoId)
    {
        $this->videoId = $videoId;
 
    }

    public function render()
    {
        return view('livewire.visitors.video.loading');
    }

    public function checkVideoStatus()
    {
        $video = Video::where('id', $this->videoId)->first();
        if ($video->status->isCompleted()) {
            $chat = Chat::firstOrCreate([
                'chatable_type' => Video::class,
                'chatable_id' => $video->id,
            ], [
                'chatable_type' => Video::class,
                'chatable_id' => $video->id,
                'session_id' => session()->getId(),
            ]);
            return redirect()->route('chat.show', [$video->id, $chat->uuid]);
        }
    }
}
