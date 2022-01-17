<?php

namespace App\Http\Controllers;

use App\Events\PlayerAction;
use Illuminate\Http\Request;

class VideoPlayerController extends Controller
{
    public function apiPlay(Request $request)
    {
        //$user = $request->input('user.id');
        //$party = $request->input('party.id');
        //$action = $request->input('action');
       // Broadcast(new NewMessage($user, $party, $action))->toOthers();
        //return $action . "It works!";
    }
    public function apiPause(Request $request)
    {
       // $user = $request->input('user.id');
        //$party = $request->input('party.id');
        //$message = $request->input('message');
       // Broadcast(new NewMessage($user, $party, $action))->toOthers();
        //return $action . "It works!";
    }
    public function apiScrub(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $time = $request->input('time');
        Broadcast(new PlayerAction($user, $party, $time))->toOthers();
        return "It works!";
    }
}
