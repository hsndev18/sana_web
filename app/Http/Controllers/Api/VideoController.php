<?php

namespace App\Http\Controllers\Api;

use App\Models\Snap;
use App\Models\Video;
use App\Models\Lesson;
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


    public function storeSnaps(Request $request)
    {
        $namespace_id = $request->input('namespace_id');
        $type = $request->input('type');
        $cards = $request->input('cards');


        if($type == 'lesson')
        {
            $namespace = Lesson::where('id', $namespace_id)->firstOrFail();
            $model = Lesson::class;
        } 
        else if($type == 'video')
        {
            $namespace = Video::where('id', $namespace_id)->firstOrFail();
            $model = Video::class;
        }


        foreach ($cards as $card) {
            Snap::create([
                'snapable_type' => $model,
                'snapable_id' => $namespace->id,
                'summary' => $card,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Snaps created successfully',
        ]);
    }
}
