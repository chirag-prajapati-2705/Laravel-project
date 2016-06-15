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

Route::post('/', function () {
    return view('auth.login');
});
Route::get('/{slug}', function () {
    view('errors.404');
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
    Route::get('dashboard', 'Admin\HomeController@index');
    Route::get('user/create', 'Admin\UserController@create');
    Route::post('user/store', 'Admin\UserController@store');
    Route::get('user/show', 'Admin\UserController@show');
    Route::get('product/create', 'Admin\ProductController@create');
    Route::post('product/store', 'Admin\ProductController@store');
    Route::get('product/show', 'Admin\ProductController@show');
});

Route::get('/', 'HomeController@index');
