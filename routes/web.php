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

        Route::post('update/{user}', 'UserController@update')->name('admin.user.update');

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

        Route::get('create', 'ProductController@create')->name('admin.product.create');

        Route::post('store', 'ProductController@store')->name('admin.product.store');

        Route::get('edit/{id}', 'ProductController@edit')->name('admin.product.edit');

        Route::get('detail/json/{id}', 'ProductController@productJson')->name('admin.product.detail.json');

        Route::put('update/{id}', 'ProductController@update')->name('admin.product.update');

        Route::get('destroy/{id}', 'ProductController@destroy')->name('admin.product.destroy');

    });

    Route::group(['prefix' => 'category'], function() {

        Route::get('index', 'CategoryController@index')->name('admin.category.index');

        Route::get('create', 'CategoryController@create')->name('admin.category.create');

        Route::post('store', 'CategoryController@store')->name('admin.category.store');

        Route::get('edit/{id}', 'CategoryController@edit')->name('admin.category.edit');

        Route::post('update/{id}', 'CategoryController@update')->name('admin.category.update');

        Route::get('destroy/{id}', 'CategoryController@destroy')->name('admin.category.destroy');

        Route::get('json', 'CategoryController@getCategoryJson')->name('admin.category.json');
    });

    Route::group(['prefix' => 'topping'], function() {

        Route::get('json', 'TopingController@getDataJson')->name('admin.topping.json');

        Route::get('index', 'TopingController@index')->name('admin.topping.index');

        Route::get('create', 'TopingController@create')->name('admin.topping.create');

        Route::post('store', 'TopingController@store')->name('admin.topping.store');

        Route::post('update/{id}', 'TopingController@update')->name('admin.topping.update');

        Route::get('destroy/{id}', 'TopingController@destroy')->name('admin.topping.destroy');

        Route::get('edit/{id}', 'TopingController@edit')->name('admin.topping.edit');
    });

    Route::group(['prefix' => 'order'], function() {

        Route::get('index', 'OrderController@index')->name('admin.order.index');

        Route::get('edit/{id}', 'OrderController@edit')->name('admin.order.edit');

        Route::get('/{id}/detail','OrderDetailController@show')->name('admin.order.detail.json');

        Route::post('update/{id}', 'OrderController@update')->name('admin.order.update');

        Route::get('delete/{id}', 'OrderController@destroy')->name('admin.order.destroy');
    });
});

Route::group(['prefix' => 'user', 'middleware' => 'userLogin'], function() {
    Route::get('profile/{user}', 'UserController@edit')->name('user.edit');
    Route::post('update/{user}', 'UserController@update')->name('user.update');
});


Route::group(['middleware' => 'userLogin'], function() {
    Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
});

Route::group(['prefix' => 'cart'], function() {
    Route::get('cart', 'CartController@index')->name('user.cart');

    Route::post('add', 'CartController@add')->name('user.cart.add');

    Route::get('minus/{product}/{topping}', 'CartController@minus')->name('user.cart.minus');

    Route::get('delete/{product}', 'CartController@deleteOne')->name('user.cart.delete');

    Route::get('destroy', 'CartController@destroy')->name('user.cart.destroy');
});

Route::post('checkout', 'CartController@checkout')->name('user.checkout');

Route::get('/', 'ClientController@index')->name('client.index');

Route::get('/list-product', 'ClientController@listProduct')->name('client.list_product');

Route::post('search', 'ClientController@liveSearch')->name('client.live_search');

Route::get('list-product/filter', 'ClientController@filterProductByCategory')->name('client.list_product.filter');

Route::get('product/{id}', 'ClientController@detailProduct')->name('client.product.detail');

Route::post('demo', 'CartController@demo')->name('demo');

Route::get('show', function() {
    return Session::get('cart');
});

Route::get('remove', function() {
    Session()->forget('cart');
});
