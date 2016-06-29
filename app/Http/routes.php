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
Route::group(['middleware' => 'web'], function () {
    // Route::auth();
});

// admin/test
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
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
    Route::patch('/product/update/{id}', [
        'as' => 'product.update',
        'uses' => 'Admin\ProductController@update'
    ]);
    Route::put('/product/destroy/{id}', 'Admin\ProductController@destroy');

});
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('login', 'Auth\AuthController@getLogin')->name('get-admin-login');
    $router->post('login', 'Auth\AuthController@postLogin')->name('post-admin-login');
    $router->get('logout', function () {
        Auth::logout();
        session()->flush();
        Session::flash('success', 'successfull logout ');
        return redirect('/admin/login');
    });
});
Route::get('/login', function () {
    return redirect('admin/login');
});
Route::get('/{slug}', function ($slug) {

    if (\App\Admin\Product::where('sku', $slug)->count()) {
        //Route::get('/{slug}','ProductController@index');
        //return redirect(route('HomeController@index',$slug));
        $app=app();
        $controller=$app->make('App\Http\Controllers\ProductController');
        return $controller->CallAction('index',[$slug]);
    } else if (App\User::where('username', $slug)->count()) {
        // return redirect()->action('User\ProfileController@index', [$slug]);
        // return App::make('App\Http\Controllers\User\ProfileController', [$slug])->index();
        return 'User found';
    } else {
        return view('errors.404');
    }
    //view('errors.404');
});
