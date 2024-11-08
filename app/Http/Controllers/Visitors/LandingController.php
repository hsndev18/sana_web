<?php

namespace App\Http\Controllers\Visitors;

use App\Models\Chat;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function showSnaps($videoId)
    {

        return view('visitors.snaps', compact('videoId'));
    }

    public function showChatLoading($videoId)
    {
        return view('visitors.loading', compact('videoId'));
    }

    public function showExam($videoId)
    {
        // dd($videoId);
        // // $chatUuid = $chat->uuid;

        // // session()->put('chat_uuid', $chatUuid);
        return view('visitors.exam', compact('videoId'));
    }
}
