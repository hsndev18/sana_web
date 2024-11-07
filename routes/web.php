<?php

use App\Models\Video;
use App\Jobs\GenerateSnap;
use App\Enums\Status\VideoStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Visitors\LandingController;
use Illuminate\Support\Facades\Http;

Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::get('videos/{videoId}/chat/{chatUuid}', [LandingController::class, 'showChat'])->name('chat.show');
Route::get('videos/{videoId}/loading', [LandingController::class, 'showChatLoading'])->name('chat.show.loading');
Route::get('videos/{videoId}/snaps', [LandingController::class, 'showSnaps'])->name('snaps.show');
Route::get('videos/{videoId}/exam', [LandingController::class, 'showExam'])->name('exam.show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('test', function () {
//     $video = Video::where('video_id', "TzimDCGMisQ")->firstOrFail();

//     $processingEndpoint = (config('services.python_api.endpoints.generate_exam'))();

//     $response = Http::withHeaders([
//         'Authorization' => config('services.python_api.key'),
//     ])->asForm()->post($processingEndpoint, [
//         'namespace_id' => $video->video_id,
//         'namespace_type' => 'video',
//         'transcript' => $video->transcription,
//     ]);

//     return response()->json([
//         'status' => 'success',
//         'message' => 'Video updated successfully',
//     ]);
// });
