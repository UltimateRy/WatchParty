<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Party;
use App\Models\Movie;
use App\Models\MovieImage;
use App\Models\UserImage;
use App\Events\PartyCreated;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();
        return view('parties.index', [
            'user' => Auth::user(),
            'parties' => $parties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //ALLOW THE USER TO CREATE A NEW PARTY HERE

        $user = Auth::user();
        $userImage = UserImage::find($user->id);
        $user['image'] = $userImage->file_path;


        $followings = Auth::user()->follows;
        $followedBy = Auth::user()->followedBy;
        $friends = $followings->intersect($followedBy);

        $movies = Movie::all();

        foreach ($movies as $movie) {
            $movieImage = MovieImage::find($movie->id);
            $movie['image'] = $movieImage->file_path;
        }

        foreach ($friends as $friend) {
            $friendImage = UserImage::find($friend->id);
            $friend['image'] = $friendImage->file_path;
        }   

        return view('parties.create', [
            'user' => Auth::user(),
            'movies' => $movies,
            'friends' => $friends
        ]);
    }

    public function apiCreate(Request $request) {        
        $user = $request->input('user.id');
        $movie = $request->input('movie');
        $friends = $request->input('friends');

        $p = new Party;
        $p->host_id = $user;
        $p->movie_id = $movie;
        $p->invite_only = 0;
        $p->save();

        foreach ($friends as $friend) {
            $p->addToParty(User::findOrFail($friend));
        }  

        return $p->id;

        //return "Party created!";
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $party = new Party;
        $party->host = Auth::user()->id;
        $party->movie_id = $request->movie_id;
        $party->invite_only - $request->invite_only;

        $users = $request->users;
        $party->users()->attach($users);
        $party->save();
        */

        $p = new Party;
        $p->host_id = Auth::user()->id;
        $p->movie_id = "5";
        $p->invite_only = 0;

        $p->save();

        $p->addToParty(User::findOrFail('1')); //Adding ryan morgans to the party just as an example

        //$users->push(auth()->user()->id); //LINE NOT NEEDED BECAUSE THE HOST IS KEPT IN THE PARTY 
    
        $p->load('host');
        $p->load('movie');

        $hostImage = UserImage::find(Auth::user()->id);

        $p->host['image'] = $hostImage->file_path;

        broadcast(new PartyCreated($p))->toOthers();

        //session()->flash('message', 'Party Successfully Created.');
        return redirect()->route('parties.show', [
            'id' => $p->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $party = Party::findOrFail($id);
        $party->load('host');
        
        $movie = Movie::findOrFail($party->movie_id);
        
        $movieImage = MovieImage::find($movie->id);
        $movie['image'] = $movieImage->file_path;


        return view('parties.show', [
            'p' => $party,
            'id' => $party->id,
            'user' => Auth::User(),
            'movie' => $movie,
        ]);
    }

    public function apiLeave(Request $request){

        $user = $request->input('user.id');
        $party = Party::findOrFail($request->input('party.id'));

        $party->users()->detach($user);

        return "Left the party!";

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        //
    }
}
