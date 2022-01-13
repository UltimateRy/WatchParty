<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Party;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    //return (int) $user->id === (int) $id;
    return true;
});

Broadcast::channel('parties.{party}', function ($user, Party $party) {
    //return $party->hasUser($user->id);
    return true;
});
