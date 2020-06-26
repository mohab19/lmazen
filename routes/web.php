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
            Route::resource('categories', 'CategoryController');
            Route::get('categories/get_categories/{id}', 'CategoryController@getCategories');
            Route::resource('models', 'ModelController');
            Route::resource('types', 'TypeController');
            Route::get('types/get_types/{id}', 'TypeController@getTypes');
            Route::resource('brands', 'BrandController');
            Route::get('brands/get_brands/{id}', 'BrandController@getBrands');
            Route::resource('suppliers', 'SupplierController');
            Route::resource('supplier_account', 'SupplierAccountController');
            Route::resource('customers', 'CustomerController');
            Route::resource('customer_history', 'CustomerHistoryController');
            Route::resource('products', 'ProductController');
            Route::post('get_products', 'ProductController@getProducts');
            Route::resource('requests', 'UserRequestController');
            Route::resource('reports', 'ReportController');
            Route::post('reports/create', 'ReportController@create');
            Route::resource('expenses', 'ExpenseController');

            Route::get('print_bill/{customer_history}', 'CustomerHistoryController@show');
        });
    });
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
