<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('video/{id}/{string}', ['as' => 'video.watch', 'uses' => 'Api\ApiController@watch']);

Route::get('comments/{id}', 'ApiController@getComments');
//Route::post('comments/{id}', 'ApiController@postComments');

//Route::post('favorite/{video_id}', 'ApiController@postFavorite');

//Route::post('rate/{video_id}', 'ApiController@postRate');


