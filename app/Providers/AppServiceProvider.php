<?php

namespace App\Providers;

use App\Wishlist;
use App\Order;
use App\ProductCategory;
use App\SubCategory;
use App\ChildCategory;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        $wishlists = Wishlist::all();
        
        
        $categories = ProductCategory::all();
        $subcategories = SubCategory::all();
        $childcategories = ChildCategory::all();
        $treeView = ProductCategory::with(['subcategories'])->get();
        $childView = SubCategory::with(['childcategories'])->get();
        view()->share('categories', $categories);
        view()->share('subcategories',$subcategories);
        view()->share('childcategories',$childcategories);
        view()->share('treeView',$treeView);
        view()->share('childView',$childView);
        view()->share('wishlists',$wishlists);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
