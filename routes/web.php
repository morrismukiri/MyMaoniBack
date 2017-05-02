<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/ps', 'HomeController@ps');

Route::resource('users', 'UserController');

Route::resource('polls', 'PollController');





Route::resource('opinions', 'OpinionController');

Route::resource('categories', 'CategoryController');

Route::resource('answers', 'AnswersController');

Route::resource('surveys', 'SurveyController');