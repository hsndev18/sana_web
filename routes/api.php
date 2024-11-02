<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VideoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::patch('/videos/{video}/status', [VideoController::class, 'updateStatus'])->name('videos.status.update');


Route::post('/snaps', [VideoController::class, 'storeSnaps'])->name('videos.snaps.store');