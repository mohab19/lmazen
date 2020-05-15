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

Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\AdminLoginController@login')->name('login.submit');
Route::auth();

Route::group(['middleware' => 'auth:admin'], function () {
    /*** home page admin route ***/
    Route::get('/', 'AdminController@index')->name('home');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::group(['prefix' => 'admin'], function () {

        /*** users routes ***/
        Route::resource('users', 'UserController');
        Route::post('users_search', ['uses' => 'UserController@search', 'as' => 'users_view']);
        Route::get('users/activation/{user}','UserController@activation');

        /*** System routes ***/
        Route::resource('sectors', 'SectorController');
        Route::resource('categories', 'CategoryController');
        Route::get('categories/get_categories/{id}', 'CategoryController@getCategories');
        Route::resource('types', 'TypeController');
        Route::get('types/get_types/{id}', 'TypeController@getTypes');
        Route::resource('brands', 'BrandController');
        Route::get('brands/get_brands/{id}', 'BrandController@getBrands');
        Route::resource('suppliers', 'SupplierController');
        Route::resource('products', 'ProductController');
        Route::resource('requests', 'UserRequestController');
    });
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
