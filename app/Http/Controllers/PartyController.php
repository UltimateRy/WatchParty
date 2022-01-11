<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Party;
use App\Events\GroupCreated;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $party = new Party;
        $party->host = Auth::user()->id;
        $party->movie_id = $request->movie_id;
        $party->invite_only - $request->invite_only;

        $users = $request->users;
        $party->users()->attach($users);
        $party->save();

        //$users->push(auth()->user()->id); //LINE NOT NEEDED BECAUSE THE HOST IS KEPT IN THE PARTY 
    
        broadcast(new GroupCreated($party))->toOthers(); //THE BROADCASTED CHANNELS
        return $party;
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
            'party' => $party
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
