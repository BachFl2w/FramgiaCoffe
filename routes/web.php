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

        Route::get('list', 'RoleController@index')->name('admin.role.index');

        Route::get('json', 'RoleController@getDataJson')->name('admin.role.json');

    });

    Route::group(['prefix' => 'user'], function() {
        Route::get('index', 'UserController@index')->name('admin.user.index');

        Route::get('edit/{id}', 'UserController@edit')->name('admin.user.edit');

        Route::get('update/{id}', 'UserController@update')->name('admin.user.update');
    });

    Route::group(['prefix' => 'product'], function () {

        Route::get('list', 'ProductController@index')->name('admin.product.index');

        Route::get('json', 'ProductController@getDataJson')->name('admin.product.json');

        Route::get('{id}/images', 'ProductController@getImages')->name('admin.product.images');

    });
});
