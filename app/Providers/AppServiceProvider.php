<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['website.includes.header'],function ($view)
        {
        $view->with('categories',Category::all());
        $view->with('subcategories',SubCategory::all());

        });
        
        Paginator::useBootstrap();

    }
}
