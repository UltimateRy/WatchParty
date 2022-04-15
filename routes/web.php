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


//DASHBOARD AND FRIENDS ROUTES

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')->middleware(['auth']);

//FOLLOWING & FOLLOWERS

Route::get('/following', [FollowsController::class, 'indexOnlyOnline'])
    ->name('following')->middleware(['auth']);

Route::get('/followers', [FollowersController::class, 'index'])
    ->name('followers')->middleware(['auth']);

//USER ROUTE (ADMIN ONLY)

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index')->middleware(['auth']);//, 'role']);

//PROFILES ROUTES

Route::get('/profiles/{id}', [ProfileController::class, 'show'])
    ->name('profiles.show')->middleware('auth');

Route::get('/profiles/{id}/follow', [ProfileController::class, 'follow'])
    ->name('profiles.follow')->middleware('auth');


//MOVIE ROUTES

Route::get('/movies', [MovieController::class, 'index']) //ADMINS ONLY???
    ->name('movies.index')->middleware('auth');

Route::get('/movies/{id}', [MovieController::class, 'show'])
    ->name('movies.show')->middleware('auth');


//PARTY ROUTES

Route::get('/watchparty', [PartyController::class, 'index']) //ADMINS ONLY
    ->name('parties.index')->middleware('auth');//, 'role']);

Route::get('/watchparty/create', [PartyController::class, 'create'])
    ->name('parties.create')->middleware('auth');//, 'role']);

Route::get('/watchparty', [PartyController::class, 'store'])
    ->name('parties.store')->middleware('auth');//, 'role']);

Route::get('/watchparty/{id}', [PartyController::class, 'show']) //HERE THE USER WILL BE PROMPTED TO SELECT THEIR MOVIE FILE FOR THE PARTY AND
    ->name('parties.show')->middleware('auth');//, 'role']); NEED TO MAKE SURE THE USER IS ALLOWED IN THE PARTY

    /*
Route::post('/send-message', function (Request $request){
    
    
    //return 1;
    //return response()->json($request->all());
    //return  response()->json($request->input('user.username'));

    //$user = User::findOrFail($id);
    //$party = Party::findOrFail($id);
    $message = $request->input('message');

    //return $user_id . " : " . $party_id;

    event(
        new NewMessage(
            $request->input('user.id'),
            $request->input('party.id'),
            $request->input('message')
        )
    );

    return ["success" => true];
    /*
    return  response()->json($request->input('user.username'));

    //return $request;
    
});
*/

require __DIR__.'/auth.php';
