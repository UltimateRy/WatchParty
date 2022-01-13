<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Party;
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

        return view('parties.create', [
            'user' => Auth::user()
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

        $p->addToParty(User::findOrFail('1'));
        //$users->push(auth()->user()->id); //LINE NOT NEEDED BECAUSE THE HOST IS KEPT IN THE PARTY 
    
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
            'id' => $party->id
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
