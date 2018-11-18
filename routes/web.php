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


Auth::routes();

Route::get('home', function() {
    return view('index');
})->name('home');

// Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
});

Route::post('login', 'UserController@login')->name('postLogin');
Route::get('logout', 'UserController@logoutUser')->name('logout');


Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function() {

    Route::get('logout', 'UserController@logoutAdmin')->name('admin.logout');

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

        Route::get('edit/{user}', 'UserController@edit')->name('admin.user.edit');

        Route::post('update/{id}', 'UserController@update')->name('admin.user.update');

        Route::get('/destroy/{id}', 'UserController@destroy')->name('admin.user.destroy');

        Route::post('active/{user}', 'UserController@active')->name('admin.user.active');
    });

    Route::group(['prefix' => 'feedback'], function() {
        Route::get('index', 'FeedbackController@index')->name('admin.feedback.index');

        Route::get('edit/{id}', 'FeedbackController@edit')->name('admin.feedback.edit');

        Route::post('send_mail', 'FeedbackController@send')->name('admin.feedback.send_mail');

        Route::post('update/{id}', 'FeedbackController@update')->name('admin.feedback.update');
    });

    Route::group(['prefix' => 'product'], function () {

        Route::get('index', 'ProductController@index')->name('admin.product.index');

        Route::get('getDataJson', 'ProductController@getDataJson')->name('admin.product.json');

        Route::post('store', 'ProductController@store')->name('admin.product.store');

        Route::get('{id}/images', 'ProductController@getImages')->name('admin.product.images');

        Route::post('upload-image', 'ProductController@uploadMoreImage')->name('admin.product.uploadimage');

        Route::get('show/{id}', 'ProductController@show')->name('admin.product.show');

        Route::post('update/{id}', 'ProductController@update')->name('admin.product.update');

        Route::post('change-main-image', 'ProductController@changMainImage')->name('admin.product.change_main_image');

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

        Route::get('show/{id}', 'TopingController@show')->name('admin.topping.show');
    });

    Route::group(['prefix' => 'order', 'as' => 'admin.order.'], function() {

        Route::get('index', 'OrderController@index')->name('index');

        Route::get('json', 'OrderController@listOrderJson')->name('list.json');

        Route::get('/{id}/detail','OrderDetailController@show')->name('detail');

        Route::get('detail', 'OrderDetailController@showDetail')->name('detail.show');

        Route::get('detail/update-quantity', 'OrderDetailController@updateQuantity')->name('detail.update_quantity');

        Route::get('{id}/detail/json', 'OrderDetailController@showJson')->name('detail.json');
    });
});

// Route::group(['middleware' => 'userLogin'], function() {
//     Route::get('', function() {
//         //
//     });
// });
