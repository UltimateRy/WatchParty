<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Party;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $parties = auth()->user()->parties->load('host');

        //$parties = Party::with('host')->where('party_id', )

       // $users = User::where('id', '<>', auth()->user()->id)->get();
        $following = Auth::user()->follows()->pluck('id');

        $user = Auth::user();

        return view('dashboard', [
            'parties' => $parties, 
            'following' => $following, 
            'user' => $user
        ]);
    }
}
