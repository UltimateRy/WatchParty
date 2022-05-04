<?php

namespace App\Http\Controllers;

use App\Events\VideoScrub;
use App\Events\VideoAction;
use App\Events\Reaction;
use App\Events\PartyEnded;
use Illuminate\Http\Request;

class VideoPlayerController extends Controller
{
    public function apiPlay(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $action = $request->input('action');
        Broadcast(new VideoAction($user, $party, $action))->toOthers();
        return "Broadcast Play Command";
    }
    public function apiPause(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $action = $request->input('action');
        Broadcast(new VideoAction($user, $party, $action))->toOthers();
        return "Broadcast Pause Command";
    }
    public function apiScrub(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $time = $request->input('time');
        Broadcast(new VideoScrub($user, $party, $time))->toOthers();
        return "Broadcast Scrub Command";
    }
    public function apiReact(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $reaction = $request->input('reaction');
        Broadcast(new Reaction($user, $party, $reaction))->toOthers();
        return "Broadcast Reaction";
    }
    public function apiEndParty(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        Broadcast(new PartyEnded($user, $party))->toOthers();

        //Delete the party here

        return "Broadcast Party Ended";
    }
}
