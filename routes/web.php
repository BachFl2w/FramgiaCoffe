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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'role'], function () {

        Route::get('index', 'RoleController@index')->name('admin.role.index');

        Route::get('json', 'RoleController@getDataJson')->name('admin.role.json');

        Route::post('store', 'RoleController@store')->name('admin.role.store');

        Route::post('update/{id}', 'RoleController@update')->name('admin.role.update');

        Route::get('destroy/{id}', 'RoleController@destroy')->name('admin.role.destroy');

    });

    Route::group(['prefix' => 'user'], function() {

        Route::get('index', 'UserController@index')->name('admin.user.index');

        Route::get('create', 'UserController@create')->name('admin.user.create');

        Route::post('store', 'UserController@store')->name('admin.user.store');

        Route::get('edit/{id}', 'UserController@edit')->name('admin.user.edit');

        Route::post('update/{id}', 'UserController@update')->name('admin.user.update');

        Route::get('destroy/{id}', 'UserController@destroy')->name('admin.user.destroy');
    });

    Route::group(['prefix' => 'feedback'], function() {
        Route::get('index', 'FeedbackController@index')->name('admin.user.index');

        Route::get('edit/{id}', 'FeedbackController@edit')->name('admin.user.edit');

        Route::post('update/{id}', 'FeedbackController@update')->name('admin.user.update');
    });

    Route::group(['prefix' => 'product'], function () {

        Route::get('index', 'ProductController@index')->name('admin.product.index');

        Route::get('json', 'ProductController@getDataJson')->name('admin.product.json');

        Route::post('store', 'ProductController@store')->name('admin.product.store');

        Route::get('{id}/images', 'ProductController@getImages')->name('admin.product.images');

        Route::post('upload-image', 'ProductController@uploadImage')->name('admin.product.uploadimage');

    });

    Route::group(['prefix' => 'category'], function() {

        Route::get('json', 'CategoryController@getDataJson')->name('admin.category.json');

        Route::get('index', 'CategoryController@index')->name('admin.category.index');

        Route::post('store', 'CategoryController@store')->name('admin.category.store');

        Route::post('update/{id}', 'CategoryController@update')->name('admin.category.update');

        Route::get('destroy/{id}', 'CategoryController@destroy')->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'topping'], function() {

        Route::get('json', 'TopingController@getDataJson')->name('admin.topping.json');

        Route::get('index', 'TopingController@index')->name('admin.topping.index');

        Route::post('store', 'TopingController@store')->name('admin.topping.store');

        Route::post('update/{id}', 'TopingController@update')->name('admin.topping.update');

        Route::get('destroy/{id}', 'TopingController@destroy')->name('admin.topping.destroy');
    });
});
