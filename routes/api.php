<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

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


Route::post('/signin', 'AuthenticateController@authenticate');
Route::resource('polls', 'PollAPIController');





Route::resource('opinions', 'OpinionAPIController');

Route::resource('categories', 'CategoryAPIController');

Route::resource('answers', 'AnswersAPIController');