<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Product;
use App\Slider;
use App\Discount;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        
        $sliders = Slider::all();
        $latests = Product::orderBy('created_at','desc')->take(25)->inRandomOrder()->where('status',true)->get();
        $discounts = Product::orderBy('discount','desc')->take(6)->where('status',true)->get();
        $featured = Product::where('status',true)->where('featured',true)->get();

        $electroCat = ProductCategory::where('name','Electronics & Appliances')->pluck('id');
        $electronics = Product::where('category_id',$electroCat)->where('status',true)->take(20)->inRandomOrder()->get();

        $groceryCat = ProductCategory::where('name','Grocery Store (Foods & Beverages)')->pluck('id');
        $groceries = Product::where('category_id',$groceryCat)->where('status',true)->take(20)->inRandomOrder()->get();

        $homeCat = ProductCategory::where('name','Home And Living')->pluck('id');
        $appliances = Product::where('category_id',$homeCat)->where('status',true)->take(20)->inRandomOrder()->get();
        
        return view('home',compact('sliders','latests','discounts','featured','electronics','groceries','appliances'));
    }

    

}
