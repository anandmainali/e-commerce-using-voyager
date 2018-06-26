<?php

namespace App\Http\Controllers;
use App\ChildCategory;
use App\SubCategory;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    
    public function index()
    {
        $discounts = Product::orderBy('discount','desc')->take(6)->where('status',true)->get();
        $paginate = 12;
        $ProductCategory = ProductCategory::all();
        $SubCategory = SubCategory::all();
        $ChildCategory = ChildCategory::all();

        
        if(request()->category){
            $products = Product::with('category')->whereHas('category',function ($query){
                $query->where('slug',request()->category);
            })->where('status',true);
           
            
            $categoryName = optional($ProductCategory->where('slug',request()->category)->first())->name;
        }
        //subcategory
         elseif(request()->subcategory){
            $products = Product::with('subcategory')->whereHas('subcategory',function ($query){
                $query->where('slug',request()->subcategory);
            })->where('status',true);
            
            
            $categoryName = optional($SubCategory->where('slug',request()->subcategory)->first())->name;
            
        }

        //childcategory
        elseif(request()->childcategory){
            $products = Product::with('childcategory')->whereHas('childcategory',function ($query){
                $query->where('slug',request()->childcategory);
            })->where('status',true);

            $categoryName = optional($ChildCategory->where('slug',request()->childcategory)->first())->name;
        }else {
            $products = Product::where('status',true);

            $categoryName = "All Products";
        }



        if(request()->sort == 'latest'){
            $products = $products->orderBy('created_at','desc');
        }

        if(request()->sort == 'low_high'){
            $products = $products->orderBy('new_price')->paginate($paginate);
        }elseif (request()->sort == 'high_low'){
            $products = $products->orderBy('new_price','desc')->paginate($paginate);
        }else{
            $products = $products->paginate($paginate);
    }
        
        
        return view('shop',compact('products','categories','categoryName','subcategoryName','childcategoryName','discounts'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->where('status',true)->firstOrFail();
        
        return view('single',compact('product'));
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {

        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');

        $products = Product::search($query)->where('status',true)->paginate(16);
        $total = count(Product::search($query)->get());
        return view('search-results',compact('products','total'));
    }
    
    public function discount($discount){
        $products = Product::where('discount','<=',$discount)->where('status',true)->orderBy('discount','desc')->paginate(16);
        $total = count(Product::where('discount','<=',$discount)->get());
        return view('search-results',compact('products','total'));
    }
}
