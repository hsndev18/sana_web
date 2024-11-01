<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('visitors.landing');
    }


    public function showChat($videoId, $chatUuid)
    {
        return view('visitors.chat', compact('videoId', 'chatUuid'));
    }


    public function showChatLoading($videoId)
    {
        return view('visitors.loading', compact('videoId'));
    }
}
