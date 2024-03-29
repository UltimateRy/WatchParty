<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    public function index()
    {
        $followers = Auth::user()->followedBy;

        return view('followers', [
            'followers' => $followers
        ]);
    }



}
