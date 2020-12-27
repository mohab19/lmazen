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

Route::auth();
Route::post('register', 'Auth\RegisterController@create');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin-login.submit');

Route::redirect('/', 'en');
Route::group(['prefix' => '{language}'], function () {
    Route::group(['middleware' => ['auth:web,admin']], function () {
        /*** home page admin route ***/
        Route::get('/', 'HomeController@index')->name('home');
        Route::group(['prefix' => 'admin'], function () {

            /*** users routes ***/
            Route::resource('users', 'UserController');
            Route::post('users_search', ['uses' => 'UserController@search', 'as' => 'users_view']);
            Route::get('users/activation/{user}','UserController@activation');

            /*** System routes ***/
            Route::get('types/get_types/{id}', 'TypeController@getTypes');
            Route::resource('types', 'TypeController');
            Route::resource('customers', 'CustomerController');
            Route::resource('systems', 'SystemController');
            Route::get('subscriptions/pay/{subscription}', 'SubscriptionController@pay_subscription');
            Route::resource('subscriptions', 'SubscriptionController');
            
        });
    });
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
