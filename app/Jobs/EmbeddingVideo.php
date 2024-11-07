<?php

namespace App\Jobs;

use App\Enums\Status\VideoStatus;
use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class EmbeddingVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $videoId)
    {
        $this->queue = 'embeddings';
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $processingEndpoint = config('services.python_api.endpoints.embed_video')($this->videoId);
        $response = Http::withHeader('Authorization', config('services.python_api.key'))
            ->timeout(9999999)
            ->get($processingEndpoint);

        // if ($response->failed()) {
        //     Video::where('video_id', $this->videoId)->update([
        //         'status' => VideoStatus::FAILED
        //     ]);
        // } elseif ($response->successful()) {
        //     Video::where('video_id', $this->videoId)->update([
        //         'status' => VideoStatus::DOWNLOADED
        //     ]);
        // }


    }
}
