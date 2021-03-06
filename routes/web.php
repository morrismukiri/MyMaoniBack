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
Route::get('polls/create/{survey?}', 'PollController@create'); 





Route::resource('opinions', 'OpinionController'); 

Route::resource('categories', 'CategoryController'); 

Route::resource('answers', 'AnswersController'); 
Route::get('answers/create/{pollId?}', 'AnswersController@create'); 

Route::resource('surveys', 'SurveyController'); 

//Survey routes

Route::get('/survey/{survey}/polls', 'SurveyController@SurveyPolls'); 
Route::get('/poll/{poll}/answers', 'PollController@PollAnswers'); 
Route::get('/survey/{survey}/results', 'SurveyController@SurveyResults'); 


Route::resource('comments', 'CommentsController'); 

Route::resource('comments', 'CommentsController'); 

Route::get('/passport', function () {
    return view("passport_components"); 
})->name('passport'); 