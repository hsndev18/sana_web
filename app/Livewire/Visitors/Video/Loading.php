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

        $video = Video::find($this->videoId);
        if ($video->status->isCompleted()) {
            $chat = Chat::firstOrCreate(
                [
                    'chatable_type' => Video::class,
                    'chatable_id' => $video->id,
                    'session_id' => session()->getId(),
                ]
            );

            $this->redirect(route('chat.show', [$video->id, $chat->uuid]));
        }
        return view('livewire.visitors.video.loading', compact('video'));
    }
}
