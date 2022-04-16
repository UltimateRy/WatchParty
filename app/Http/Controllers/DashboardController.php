<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use App\Models\User;
use App\Models\Party;
use App\Models\Movie;
use App\Models\MovieImage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //Return the parties along with the movies that the user has been added to
        $parties = auth()->user()->parties->load('host');
        foreach($parties as $party) {
            if ((Cache::has('user-is-online-'.$party->host->id))) {
                $party->host['isOnline'] = "True";
            } else {
                $party->host['isOnline'] = "False";
            }
        }
        $parties->load('movie');
        
        //Return the users that the current user is following along with their online status
        $usersFollowing = Auth::user()->follows;
        foreach ($usersFollowing as $userFollowing) {
            if (Cache::has('user-is-online-'.$userFollowing->id)) {
                $userFollowing['isOnline'] = "True";
            } else {
                $userFollowing['isOnline'] = "False";
            }
        }

        //Return the ids of the users that the current user is following
        $following = Auth::user()->follows()->pluck('id');

        //Return the current user
        $user = Auth::user();

        //Return the most popular movies to watch
        $popularMovies = Movie::all();//->take(8);
        
        foreach ($popularMovies as $popularMovie) {
            $movieImage = MovieImage::find($popularMovie->id);
            $popularMovie['image'] = $movieImage->file_path;
        }
        //$popularMovies->load('movieImage');

        //dd($popularMovies);

        return view('dashboard', [
            'parties' => $parties, 
            'following' => $following, 
            'user' => $user,
            'onlineFollowing' => $usersFollowing,
            'popularMovies' => $popularMovies,
        ]);
    }
}
