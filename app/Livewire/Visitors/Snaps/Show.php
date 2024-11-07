<?php

namespace App\Livewire\Visitors\Snaps;

use App\Models\Video;
use Livewire\Component;

class Show extends Component
{
    public $videoId;
    public $video;
    public $snaps;

    public function render()
    {
        return view('livewire.visitors.snaps.show');
    }

    public function mount($videoId)
    {
        $this->videoId = $videoId;

        $this->video = Video::where('id', $videoId)->first();

        $this->snaps = $this->video->summaries;

    }
}
