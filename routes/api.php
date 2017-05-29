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


Route::post('/authenticate', 'AuthenticateController@authenticate');
Route::post('/signup', 'AuthenticateController@signup');
Route::resource('polls', 'PollAPIController');

Route::get('/user/details','AuthenticateController@getAuthenticatedUser');
Route::get('/userdetail/{id}','AuthenticateController@getUserDetail');
Route::get('/pollsbyuser/{id}','PollAPIController@pollsByUser');
Route::get('/usercontribution/{id}','PollAPIController@usercontribution');
Route::get('/usercontributedsurveys/{id}','VoteAPIController@user_contributed_surveys');




Route::resource('opinions', 'OpinionAPIController');

Route::resource('categories', 'CategoryAPIController');

Route::resource('answers', 'AnswersAPIController');

Route::post('/vote', 'VoteAPIController@vote');
Route::get('/pollresult/{id}', 'PollAPIController@pollResult');
Route::get('/pollresultnumbers/{id}', 'PollAPIController@getPollVoteNumbers');

Route::resource('surveys', 'SurveyAPIController');