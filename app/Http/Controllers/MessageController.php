<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function apiSend(Request $request)
    {
        $user = $request->input('user.id');
        $party = $request->input('party.id');
        $message = $request->input('message');
        
        $sender = User::findOrFail($user);
        $message_wrap = $sender->username . ": " . $message;

        Broadcast(new NewMessage($user, $party, $message_wrap))->toOthers();
        return $message_wrap;
    }
}
