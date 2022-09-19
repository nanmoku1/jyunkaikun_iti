<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('youtube_channel', 'API\YoutubeChannelController@index');
Route::post('youtube_channel/create', 'API\YoutubeChannelController@create');
Route::post('youtube_channel/update', 'API\YoutubeChannelController@update');

Route::get('youtube_channel/kick_bat', 'API\YoutubeChannelController@kickBat');


Route::get('youtube_video', 'API\YoutubeVideoController@index');
Route::post('youtube_video/create', 'API\YoutubeVideoController@create');
Route::post('youtube_video/update', 'API\YoutubeVideoController@update');


