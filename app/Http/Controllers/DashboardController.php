<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use App\Models\User;
use App\Models\Party;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $following = Auth::user()->follows;

        $filtered = $following->filter(function ($value, $key) {

            return Cache::has('user-is-online-'.$value->id);

        });


        $parties = auth()->user()->parties->load('host');

        foreach($parties as $party) {

            if ((Cache::has('user-is-online-'.$party->host->id))) {

                $party->host['isOnline'] = "True";

            } else {

                $party->host['isOnline'] = "False";

            }

        }

        $parties->load('movie');
        
        //$parties = Party::with('host')->where('party_id', )

       // $users = User::where('id', '<>', auth()->user()->id)->get();
        $following = Auth::user()->follows()->pluck('id');

        $user = Auth::user();

        //dd($filtered);

        //dd($filtered);

        return view('dashboard', [
            'parties' => $parties, 
            'following' => $following, 
            'user' => $user,
            'onlineFollowing' => $filtered,
        ]);
    }
}
