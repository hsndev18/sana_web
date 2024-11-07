<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateSnap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $namespaceId, public $namespaceType, public $transcript)
    {
        $this->queue = 'generate_snaps';
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $processingEndpoint = (config('services.python_api.endpoints.generate_snap'))();

        $response = Http::withHeaders([
            'Authorization' => config('services.python_api.key'),
        ])->asForm()->post($processingEndpoint, [
            'namespace_id' => $this->namespaceId,
            'namespace_type' => $this->namespaceType,
            'transcript' => $this->transcript,
        ]);

        if ($response->failed()) {
            Log::error('Failed to generate snaps for video ' . $this->namespaceId);
            throw new \Exception('Failed to generate snaps for video ' . $this->namespaceId);
        }
    }
}
