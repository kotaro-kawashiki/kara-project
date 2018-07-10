<?php

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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('posts', 'PostsController');
    Route::get('/calendar', 'CalendarController@index')->name('calendar');
    
});
Route::get('/', 'WelcomeController@index');


Route::get('/', function () {
    return view('welcome');
});

//Route::get('events', 'EventController@index');

//friendslistでPeoplecontrollerのindex funcをつかってます
Route::resource('people','PeopleController');
