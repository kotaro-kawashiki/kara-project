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
Route::get('/', 'WelcomeController@index');
Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('users', 'UsersController');
    Route::resource('people','PeopleController');
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('favo', 'UserFavoController@store')->name('user.favo');
        Route::delete('unfavo', 'UserFavoController@destroy')->name('user.unfavo');
        Route::get('favos', 'UsersController@favos')->name('users.favos');
        
    });
    
    Route::get('/calendar', 'CalendarController@index')->name('calendar');
    Route::resource('posts', 'PostsController');
});


