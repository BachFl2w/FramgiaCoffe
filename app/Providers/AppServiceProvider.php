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
        view()->composer('layouts/header', function ($view) {
            if (Auth::check()) {
                $currentUser = Auth::user();
                $view->with('currentUser', $currentUser);
            }
        });
        view()->composer('index', function ($view) {
            $categories = Category::all();
            $sizes = Size::all();
            $toppings = Topping::all();
            $view->with(['categories' => $categories, 'sizes' => $sizes, 'toppings' => $toppings]);
        });
        view()->composer('layouts/search_and_menu_client', function ($view) {
            $category = Category::with(['products' => function($query) {
                $query->limit(5);
            }])->get();
           $view->with('category_with_product', $category);
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
