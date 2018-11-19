<?php

namespace App\Providers;

use App\User;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts/header', function($view) {
            if (Auth::check()) {
                $currentUser = Auth::user();
                $view->with('currentUser', $currentUser);
            }
        });

        view()->composer('layouts/app_client', function($view) {
            if (Auth::check()) {
                $currentUser = Auth::user();
                $view->with('currentUser', $currentUser);
            } else {
                $view->with('currentUser', 'Guest');
            }
        });

        view()->composer('layouts/app_client', function($view) {
            $number_product = Product::all()->count();
            $view->with('number_product', $number_product);
        });

        view()->composer('layouts/app_client', function($view) {
            $number_category = Category::all()->count();
            $view->with('number_category', $number_category);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
