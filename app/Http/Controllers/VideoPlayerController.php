<?php

namespace App\Http\Controllers;

use App\Events\VideoScrub;
use App\Events\VideoAction;
use Illuminate\Http\Request;

class VideoPlayerController extends Controller
{
    public function apiPlay(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $action = $request->input('action');
        Broadcast(new VideoAction($user, $party, $action))->toOthers();
        return "It works!";
    }
    public function apiPause(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $action = $request->input('action');
        Broadcast(new VideoAction($user, $party, $action))->toOthers();
        return "It works!";
    }
    public function apiScrub(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $time = $request->input('time');
        Broadcast(new VideoScrub($user, $party, $time))->toOthers();
        return "It works!";
    }
}
