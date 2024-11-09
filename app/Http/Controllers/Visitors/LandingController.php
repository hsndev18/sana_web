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
        if ($chatUuid === 'create') {
            return $this->createNewChat($videoId);
        }

        $chat = $this->getExistingChat($chatUuid);

        if (!$chat) {
            return redirect()->route('chat.show', ['videoId' => $videoId, 'chatUuid' => 'create']);
        }

        return view('visitors.chat', [
            'videoId' => $videoId,
            'chatUuid' => $chat->uuid,
        ]);
    }

    private function createNewChat($videoId)
    {
        $chat = Chat::create([
            'chatable_type' => Video::class,
            'chatable_id' => $videoId,
            'session_id' => session()->getId(),
        ]);

        return redirect()->route('chat.show', [
            'videoId' => $videoId,
            'chatUuid' => $chat->uuid,
        ]);
    }

    private function getExistingChat($chatUuid)
    {
        return Chat::where('uuid', $chatUuid)
            ->where('session_id', session()->getId())
            ->first();
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
