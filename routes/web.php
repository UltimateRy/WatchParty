<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PartyController;

use App\Events\NewMessage;
use App\Models\User;
use App\Models\Party;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//DASHBOARD ROUTES

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [DashboardController::class, 'index'])
    ->name('dashboard')->middleware(['auth']);

//FRIENDS

Route::get('/friends', [FollowsController::class, 'indexFriendsWithOnline'])
    ->name('friends')->middleware(['auth']);

//PROFILES ROUTES

Route::get('/profiles/{id}', [ProfileController::class, 'show'])
    ->name('profiles.show')->middleware('auth');

//MOVIE ROUTES

Route::get('/movies', [MovieController::class, 'index'])
    ->name('movies.index')->middleware('auth');

Route::get('/movies/{id}', [MovieController::class, 'show'])
    ->name('movies.show')->middleware('auth');


//PARTY ROUTES

Route::get('/watchparty', [PartyController::class, 'index'])
    ->name('parties.index')->middleware('auth');

Route::get('/watchparty/create', [PartyController::class, 'create'])
    ->name('parties.create')->middleware('auth');

Route::get('/watchparty', [PartyController::class, 'store'])
    ->name('parties.store')->middleware('auth');

Route::get('/watchparty/{id}', [PartyController::class, 'show']) 
    ->name('parties.show')->middleware('auth');

require __DIR__.'/auth.php';
