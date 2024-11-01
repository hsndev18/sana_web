<?php

use App\Http\Controllers\Visitors\LandingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::get('videos/{videoId}/chat/{chatUuid}', [LandingController::class, 'showChat'])->name('chat.show');
Route::get('videos/{videoId}/loading', [LandingController::class, 'showChatLoading'])->name('chat.show.loading');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
