<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $isFollowed = (boolean) Auth::user()->follows()->where('users.id', $id)->count();

        return view('users.show', [
            'profile' => $user, 'isFollowed' => $isFollowed,
        ]);
    }

    public function follow($id) 
    {
        $userToFollow = User::findOrFail($id);
        $user = Auth::user();
        
        if ($user->isFollowing($userToFollow)) {
            $user->removeFriend($userToFollow);
        } else {
            $user->addFriend($userToFollow);
        }
        return redirect()->route('profiles.show', [
            'id' => $userToFollow->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
