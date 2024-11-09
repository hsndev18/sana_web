<?php

namespace App\Http\Controllers\Api;

use App\Models\Snap;
use App\Models\Video;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Question;
use App\Jobs\GenerateExam;
use App\Jobs\GenerateSnap;
use Predis\Response\Status;
use Illuminate\Http\Request;
use App\Enums\Status\VideoStatus;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function updateStatus(UpdateVideoRequest $request, $videoId)
    {
        $video = Video::where('video_id', $videoId)->firstOrFail();

        $video->update([
            'status' => $request->status, // completed
            'transcription' => $request->transcript,
            'title' => $request->title,
            'duration' => $request->duration,
        ]);

        if ($request->status == VideoStatus::COMPLETED->value) {
            dispatch(new GenerateSnap($videoId, 'video', $video->transcription));
            dispatch(new GenerateExam($videoId, 'video', $video->transcription));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Video updated successfully',
        ]);
    }


    public function storeSnaps(Request $request)
    {
        $namespace_id = $request->input('namespace_id');
        $type = $request->input('type');
        $snaps = $request->input('snaps');

        if (is_string($snaps)) {
            $snaps = json_decode($snaps, true);
        }

        $sentences = $snaps['sentences'] ?? [];

        if ($type == 'lesson') {
            $namespace = Lesson::where('name', $namespace_id)->firstOrFail();
            $model = Lesson::class;
        } elseif ($type == 'video') {
            $namespace = Video::where('video_id', $namespace_id)->firstOrFail();
            $model = Video::class;
        }

        foreach ($sentences as $sentence) {
            Snap::create([
                'snapable_type' => $model,
                'snapable_id' => $namespace->id,
                'summary' => $sentence,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Snaps created successfully',
        ]);
    }


    public function storeQuestions(Request $request)
    {
        $namespace_id = $request->input('namespace_id');
        $type = $request->input('type');
        $questions = $request->input('questions');


        // Decode JSON string to array if necessary
        if (is_string($questions)) {
            $questions = json_decode($questions, true);
        }

        // Check if $questions is now an array
        if (!is_array($questions)) {
            Log::error('Failed to decode questions JSON.');
            return response()->json(['error' => 'Invalid questions format.'], 400);
        }


        if ($type == 'lesson') {
            $namespace = Lesson::where('name', $namespace_id)->firstOrFail();
            $model = Lesson::class;
        } elseif ($type == 'video') {
            $namespace = Video::where('video_id', $namespace_id)->firstOrFail();
            $model = Video::class;
        }

        foreach ($questions as $q) {
            // Insert the question content into the questions table
            $question = Question::create([
                'questionable_type' => $model,
                'questionable_id' => $namespace->id,
                'content' => $q['question']
            ]);

            // Loop through answer options and insert each into the answers table
            foreach (['A', 'B', 'C', 'D'] as $option) {
                Answer::create([
                    'question_id' => $question->id,
                    'content' => $q[$option],
                    'is_correct' => ($q['answer'] === $option) // Mark the correct answer
                ]);
            }
        }


        return response()->json([
            'status' => 'success',
            'message' => 'Snaps created successfully',
        ]);
    }
}
