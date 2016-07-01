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
Route::get('/login', function () {
    return  Redirect::route('admin/login');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
Route::group(['prefix' => 'admin','middleware' => 'web'],function() {
    Route::get('dashboard', 'Admin\HomeController@index');
    Route::get('user/create', 'Admin\UserController@create');
    Route::post('user/store', 'Admin\UserController@store');
    Route::get('user/show', 'Admin\UserController@show');
    Route::get('product/create', 'Admin\ProductController@create');
    Route::post('product/store', 'Admin\ProductController@store');
    Route::get('product/show', 'Admin\ProductController@show');
    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');
    Route::get('product/edit/{id}', 'Admin\ProductController@edit');
    Route::patch('/product/update/{id}',[
        'as' => 'product.update',
        'uses' => 'Admin\ProductController@update'
    ]);
    Route::put('/product/destroy/{id}','Admin\ProductController@destroy');

});
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('login', 'Auth\AuthController@getLogin')->name('get-admin-login');
    $router->post('login', 'Auth\AuthController@postLogin')->name('post-admin-login');
    $router->get('logout', 'Auth\AuthController@getLogout')->name('admin-logout');
});
Route::get('register', 'RegistrationController@show')->name('registration');
Route::post('register', 'RegistrationController@store')->name('register');
Route::get('/{slug}', function () {
    view('errors.404');
});