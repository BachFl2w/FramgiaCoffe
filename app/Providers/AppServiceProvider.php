<?php

namespace App\Providers;

use App\User;
use App\Product;
use App\Category;
use App\Size;
use App\Topping;
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

        view()->composer('list_product', function($view) {
            $total_product = Product::all()->count();
            $categories = Category::withCount('products')->get();
            $sizes = Size::all();
            $toppings = Topping::all();
            $view->with('categories', $categories)
            ->with('total_product', $total_product)
            ->with('toppings', $toppings)
            ->with('sizes', $sizes);
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
