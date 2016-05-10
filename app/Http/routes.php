<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    //
    Route::auth();


});
// admin/test
Route::group(['prefix' => 'admin','middleware' => 'web'],function() {
    Route::resource('/posts', 'PostController@index');
    Route::resource('post/create', 'PostController@create');
    Route::resource('post/store', 'PostController@store');
    Route::get('dashboard', 'HomeController@index');
    Route::get('user/create', 'Admin\UserController@create');
    Route::post('user/store', 'Admin\UserController@store');

});

Route::get('/home', 'HomeController@index');
