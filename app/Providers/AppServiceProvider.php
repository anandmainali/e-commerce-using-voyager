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
        
        //For electronics 
        $electroSubcategories = SubCategory::where('product_category_id',4)->with(['childcategories'])->get();        
        foreach ($electroSubcategories as $key => $electroSubcat) {
            $electroChildCategories[] = ChildCategory::where('product_subcategory_id',$electroSubcat->id)->get();
        }
        view()->share('electroSubcategories',$electroSubcategories);
        view()->share('electroChildCategories',$electroChildCategories);

        //For Groceries
        $grocerySubcategories = SubCategory::where('product_category_id',5)->with(['childcategories'])->get();        
        foreach ($grocerySubcategories as $key => $grocerySubcat) {
            $groceryChildCategories[] = ChildCategory::where('product_subcategory_id',$grocerySubcat->id)->get();
        }
        view()->share('grocerySubcategories',$grocerySubcategories);
        view()->share('groceryChildCategories',$groceryChildCategories);

        //For Home Appliances
        $homeSubcategories = SubCategory::where('product_category_id',19)->with(['childcategories'])->get();        
        foreach ($homeSubcategories as $key => $homeSubcat) {
            $homeChildCategories[] = ChildCategory::where('product_subcategory_id',$homeSubcat->id)->get();
        }
        view()->share('homeSubcategories',$homeSubcategories);
        view()->share('homeChildCategories',$homeChildCategories);


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
