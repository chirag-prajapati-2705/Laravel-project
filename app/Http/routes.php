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

Route::get('/login', function () {
return  Redirect::route('admin/login');
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
    Route::auth();
});

// admin/test
$router->group(['prefix' => 'admin','middleware' => 'auth'], function ($router) {
    $router->get('dashboard', 'Admin\HomeController@index')->name('admin-dashboard');
    $router->get('user/create', 'Admin\UserController@create');
    $router->post('user/store', 'Admin\UserController@store');
    $router->get('user/show', 'Admin\UserController@show');
    $router->get('user/edit/{id}', 'Admin\UserController@edit');
    $router->patch('/user/update/{id}', ['as' => 'user.update', 'uses' => 'Admin\UserController@update']);
    $router->get('product/create', 'Admin\ProductController@create');
    $router->post('product/store', 'Admin\ProductController@store');
    $router->get('product/show', 'Admin\ProductController@show');
    $router->get('user/destroy/{id}', 'Admin\UserController@destroy');
});
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('login', 'Auth\AuthController@getLogin')->name('get-admin-login');
    $router->post('login', 'Auth\AuthController@postLogin')->name('post-admin-login');
    $router->get('logout', 'Auth\AuthController@getLogout')->name('admin-logout');
});
