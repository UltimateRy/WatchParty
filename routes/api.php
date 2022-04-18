<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\VideoPlayerController;
use App\Http\Controllers\FollowsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sendmessage', [MessageController::class, 'apiSend'])
    ->name('api.message.send');

Route::post('/addfriend', [FollowsController::class, 'apiAddFriend']);

Route::post('/acceptfriendrequest', [FollowsController::class, 'apiAcceptRequest']);

Route::post('/declinefriendrequest', [FollowsController::class, 'apiDeclineRequest']);

Route::post('/pausevideo', [VideoPlayerController::class, 'apiPause'])
    ->name('api.video.pause');

Route::post('/playvideo', [VideoPlayerController::class, 'apiPlay'])
    ->name('api.video.play');

Route::post('/scrubvideo', [VideoPlayerController::class, 'apiScrub'])
    ->name('api.video.scrub');

Route::get('image/{filename}', [ImageController::class, 'getImage']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

