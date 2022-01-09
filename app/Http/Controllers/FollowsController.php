<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
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
    


}
