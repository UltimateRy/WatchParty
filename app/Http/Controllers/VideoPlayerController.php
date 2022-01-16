<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoPlayerController extends Controller
{
    public function apiPlay(Request $request)
    {
        return "It works!";
    }
    public function apiPause(Request $request)
    {
        return "It works!";
    }
    public function apiScrub(Request $request)
    {
        return "It works!";
    }
}
