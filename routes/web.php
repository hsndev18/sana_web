<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Visitors\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::get('videos/{videoId}/chat/{chatUuid}', [LandingController::class, 'showChat'])->name('chat.show');
Route::get('videos/{videoId}/loading', [LandingController::class, 'showChatLoading'])->name('chat.show.loading');
Route::get('videos/{videoId}/snaps', [LandingController::class, 'showSnaps'])->name('snaps.show');
Route::get('videos/{videoId}/exams', [LandingController::class, 'showExam'])->name('exam.show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
