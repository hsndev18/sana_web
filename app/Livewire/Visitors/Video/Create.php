<?php

namespace App\Livewire\Visitors\Video;

use App\Models\Chat;
use App\Models\Video;
use Livewire\Component;
use App\Jobs\EmbeddingVideo;
use Livewire\Attributes\Rule;
use App\Enums\Status\VideoStatus;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;

    #[Rule('required|url|max:255')]
    public $videoUrl;

    public function render()
    {
        return view('livewire.visitors.video.create');
    }

    public function save()
    {
        $this->validate();

        $videoId = $this->extractYoutubeVideoId($this->videoUrl);
        if (!$videoId) {
            $this->addError('videoUrl', 'الرجاء إدخال رابط فيديو من يوتيوب');
            return;
        }

        $video = Video::videoId($videoId)->first();

        if (!$video || $video->status->isFailed()) {

            $video = Video::query()->updateOrCreate([
                'video_id' => $videoId,
            ], [
                'status' => VideoStatus::PENDING
            ]);

            dispatch(new EmbeddingVideo($videoId));
        } elseif ($video->status->isCompleted()) {

            $chat = Chat::firstOrCreate(
                [
                    'chatable_type' => Video::class,
                    'chatable_id' => $video->id,
                    'session_id' => session()->getId(),
                ]
            );

    

            $this->alert('success', 'تم إضافة الفيديو بنجاح', [
                'position' =>  'center',
                'timer' =>  10000,
                'toast' =>  false,
                'text' =>  'جاري تحويلك إلى صفحة المعالجة',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
                'showCloseButton' =>  false,
                'showProgressCancelButton' =>  false,
                'allowOutsideClick' =>  false,
                'allowEscapeKey' =>  false,
                'didOpen' =>  '() => {
                Swal.showLoading();
                setTimeout(() => {
                    window.location.href = "' . route('chat.show', [$video->video_id, $chat->uuid]) . '";
                }, 3000);
            }',
            ]);
        }


        $this->alert('success', 'تم إضافة الفيديو بنجاح', [
            'position' =>  'center',
            'timer' =>  10000,
            'toast' =>  false,
            'text' =>  'جاري تحويلك إلى صفحة المعالجة',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
            'showCloseButton' =>  false,
            'showProgressCancelButton' =>  false,
            'allowOutsideClick' =>  false,
            'allowEscapeKey' =>  false,
            'didOpen' =>  '() => {
            Swal.showLoading();
            setTimeout(() => {
                window.location.href = "' . route('chat.show.loading', $video->id) . '";
            }, 3000);
        }',
        ]);
    }

    public function extractYoutubeVideoId($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        return $match[1] ?? null;
    }
}
