<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Party;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $parties = auth()->user()->parties;

        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();

        return view('dashboard', ['parties' => $parties, 'users' => $users, 'user' => $user]);
    }
}
