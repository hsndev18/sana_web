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
        // get chat for video with checking the current session id 
        $chat = Chat::where('session_id', session()->getId())
            ->where('chatable_type', Video::class)
            ->where('chatable_id', $videoId)
            ->first();

        if (!$chat) {
            $chat = Chat::firstOrCreate(
                [
                    'chatable_type' => Video::class,
                    'chatable_id' => $videoId,
                    'session_id' => session()->getId(),
                ]
            );
        }

        $chatUuid = $chat->uuid;
        // save in seesion 
        session()->put('chat_uuid', $chatUuid);
        return view('visitors.snaps', compact('videoId', 'chatUuid'));
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
