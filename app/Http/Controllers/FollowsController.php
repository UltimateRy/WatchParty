<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use App\Models\User;
use App\Models\Party;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function index()
    {
        $following = Auth::user()->follows;

        return view('following', [
            'following' => $following
        ]);
    }
    
    public function indexWithOnline()
    {
        $following = Auth::user()->follows;

        foreach ($following as $follower) {
            if (Cache::has('user-is-online-'.$follower->id)) {
                $follower['isOnline'] = "True";
            } else {
                $follower['isOnline'] = "False";
            }
        }

        return view('following', [
            'following' => $following
        ]);

    }

    public function indexOnlyOnline() 
    {
        $following = Auth::user()->follows;

        $filtered = $following->filter(function ($value, $key) {

            return Cache::has('user-is-online-'.$value->id);

        });

        return view('following', [
            'following' => $filtered
        ]);
    }

}
