<?php

namespace App\Http\Controllers\Api;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function updateStatus(UpdateVideoRequest $request, $videoId)
    {
        $video = Video::where('id', $videoId)->firstOrFail();

        $video->update([
            'status' => $request->status, // completed
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Video updated successfully',
        ]);
    }
}
