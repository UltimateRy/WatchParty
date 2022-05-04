<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use App\Models\User;
use App\Models\UserImage;
use App\Models\Party;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function indexFollowing()
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

    public function indexFriends() {

        $user = Auth::user();

        $followings = Auth::user()->follows;
        $followedBy = Auth::user()->followedBy;
        $friends = $followings->intersect($followedBy);

        $requests = $followedBy->whereNotIn('id', $followings->pluck('id'));
        
        return view('friends', [
            'user' => $user,
            'requests' => $requests,
            'friends' => $friends
        ]);
    }

    public function indexFriendsWithOnline() {

        $user = Auth::user();

        $followings = Auth::user()->follows;
        $followedBy = Auth::user()->followedBy;

        foreach ($followings as $following) {

            if (Cache::has('user-is-online-'.$following->id)) {
                $following['isOnline'] = "True";
            } else {
                $following['isOnline'] = "False";
            }

            $followingImage = UserImage::find($following->id);
            $following['image'] = $followingImage->file_path;
        }   

        foreach ($followedBy as $followed) {

            if (Cache::has('user-is-online-'.$followed->id)) {
                $followed['isOnline'] = "True";
            } else {
                $followed['isOnline'] = "False";
            }

            $followedImage = UserImage::find($followed->id);
            $followed['image'] = $followedImage->file_path;
        }   

        $friends = $followings->intersect($followedBy);

        $requests = $followedBy->whereNotIn('id', $followings->pluck('id'));
        
        return view('friends', [
            'user' => $user,
            'requests' => $requests,
            'friends' => $friends
        ]);

    }

    public function indexFollowedBy() {
        $followedBy = Auth::user()->followedBy;

        return view('following', [
            'following' => $followedBy
        ]);
    }

    public function apiAddFriend(Request $request) {

        $username = $request->input('friendUsername');
        $author = $request->input('user');

        $user = User::where('id', '=', $author['id'])->first();

        //return $user;

        $userToAdd = User::where('username', '=', $username)->first();

        if ($userToAdd == null) {
            return "Failure";
        } else {
            //return $author['id'];

            if ($author['id'] == $userToAdd['id']) {
                return "Cannot Add Yourself";
            }

            if ($user->isFollowing($userToAdd)) {
                return "Already Following";
            }

            return "Success";
        }    
    }

    //TODO
    public function apiAcceptRequest(Request $request) {
        $user = $request->input('user');
        $userToAccept = $request->input('userToAccept');

        //return "Accepted" . $user['id'];

        $sender = User::findOrFail($user['id']);
        $recipient = User::findOrFail($request->input('userToAccept'));

        $sender->follows()->attach($recipient);


        return "User " . $user['id'] . " accepted Request of user " . $userToAccept;
    }
    //TODO
    public function apiDeclineRequest(Request $request) {
        $user = $request->input('user');
        $userToDecline = $request->input('userToDecline');

        //return $user['id'];

        $sender = User::findOrFail($user['id']);
        $recipient = User::findOrFail($request->input('userToDecline'));

        $recipient->follows()->detach($sender);

        return "User " . $user['id'] . " declined Request of user " . $userToDecline;
    }
}
