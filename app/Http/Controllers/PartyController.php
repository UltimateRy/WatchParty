<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Party;
use App\Models\Movie;
use App\Models\MovieImage;
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

        $followings = Auth::user()->follows;
        $followedBy = Auth::user()->followedBy;
        $friends = $followings->intersect($followedBy);

        $movies = Movie::all();

        foreach ($movies as $movie) {
            $movieImage = MovieImage::find($movie->id);
            $movie['image'] = $movieImage->file_path;
        }

        return view('parties.create', [
            'user' => Auth::user(),
            'movies' => $movies,
            'friends' => $friends
        ]);
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

        broadcast(new PartyCreated($p))->toOthers();

        session()->flash('message', 'Post Successfully Created.');
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

        return view('parties.show', [
            'p' => $party,
            'id' => $party->id,
            'user' => Auth::User()
        ]);
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
