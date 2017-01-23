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
/*Route::group(['middleware' => 'web'], function () {

    // Route::auth();
});*/

// admin/test
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'Admin\HomeController@index');
    Route::get('user/create', 'Admin\UserController@create');
    Route::post('user/store', 'Admin\UserController@store');
    Route::get('user/show', 'Admin\UserController@show');
    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');
});
$router->group(['prefix' => 'admin/product', 'middleware' => 'auth'], function ($router) {
    $router->get('create', 'Admin\ProductController@create');
    $router->post('store', 'Admin\ProductController@store');
    $router->get('show', 'Admin\ProductController@show');
    $router->get('edit/{id}', 'Admin\ProductController@edit');
    $router->patch('update/{id}', [
        'as' => 'product.update',
        'uses' => 'Admin\ProductController@update'
    ]);
    $router->get('/destroy/{id}','Admin\ProductController@destroy');
});
$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function ($router) {
    Route::resource('banner', 'Admin\BannerController');
});


$router->group(['prefix' => 'admin/category', 'middleware' => 'auth'], function ($router) {
    $router->get('create', 'Admin\CategoryController@create');
    $router->post('store', 'Admin\CategoryController@store');
    $router->get('show', 'Admin\CategoryController@show');
    $router->get('edit/{id}', 'Admin\CategoryController@edit');
    $router->get('destroy/{id}','Admin\CategoryController@destroy');
    $router->patch('update/{id}', [
        'as' => 'category.update',
        'uses' => 'Admin\CategoryController@update'
    ]);
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
Route::get('register', 'RegistrationController@show')->name('registration');
Route::post('register', 'RegistrationController@store')->name('register');
Route::get('/login', function () {
    return redirect('admin/login');
});
Route::get('/{slug}', function ($slug) {
    if (\App\Model\Product::where('sku', $slug)->count()) {
        $app=app();
        $controller=$app->make('App\Http\Controllers\ProductController');
        return $controller->CallAction('index',[$slug]);
    }  else {
        return view('errors.404');
    }
});