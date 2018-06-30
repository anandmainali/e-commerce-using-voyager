<?php

namespace App\Http\Controllers;
use App\SellerInfo;
use App\Product;
use App\ProductCategory;
use App\SubCategory;
use App\ChildCategory;
use Auth;
use Illuminate\Http\Request;

class SellUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id',Auth::id())->paginate(10);
        return view('sellUs.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!empty(Auth::user()->contact || Auth::user()->address)){
        return view('sellUs.create');
    }else{
        $notification = array(
        'message' => 'Update the contact number and the address field.', 
        'alert-type' => 'info'
        );
        return redirect()->route('setting')->with($notification);
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            
            'category_id' => 'required',
            
            'name' => 'required',
            'discount' => 'required',
            'new_price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);


        $slug = str_slug($request->name, $separator = '-');

        if($request->image){
        $file = $request->image;
        $image = time() . $file->getClientOriginalName();
        $file->move('images/products/seller',$image);
        $sellerImage = 'products/seller/'.$image;    
        }

        $user = auth()->user();
       $user_id = $user->id;

        $product = [
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'name' => $request->name,
            'slug' => $slug,
            'featured' => 0,
            'status' => 0,
            'discount' => $request->discount,
            'new_price' => $request->new_price,
            'description' => $request->description,
            'image' => $sellerImage,
            'user_id' => $user_id,
        ];

        Product::create($product);
        $notification = array(
        'message' => 'Product successfully added.', 
        'alert-type' => 'success'
        );
        return redirect()->route('sellUs.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::findOrFail($id);
        $editSubcategories = SubCategory::where('product_category_id',$product->category_id)->get();
        $editChildcategories = ChildCategory::where('product_subcategory_id',$product->subcategory_id)->get();
       $editCategory = ProductCategory::where('id',$product->category_id)->get();
       $editSubcategory = SubCategory::where('id',$product->subcategory_id)->get();
       $editChildcategory = ChildCategory::where('id',$product->childcategory_id)->get();
        
        return view('sellUs.edit',compact('product','editSubcategories','editChildcategories','editCategory','editSubcategory','editChildcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);

        $this->validate($request,[            
            'category_id' => 'required',            
            'name' => 'required',
            'discount' => 'required',
            'new_price' => 'required',
            'description' => 'required',
            
        ]);

        $slug = str_slug($request->name, $separator = '-');

        if($request->hasfile('image')){
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('images/products/seller',$image);
            unlink('images/'.$product->image);
            $data['image'] = 'products/seller/'.$image;
            $product->update($data);
                       
        } 


        $data = [
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'name' => $request->name,
            'slug' => $slug,
            'discount' => $request->discount,
            'new_price' => $request->new_price,
            'description' => $request->description,
        
        ];
        
        $product->update($data);
        $notification = array(
        'message' => 'Product Successfully Updated.', 
        'alert-type' => 'success'
        );
        return redirect()->route('sellUs.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete($product);
        unlink('images/'.$product->image);
        $notification = array(
        'message' => 'Product successfully removed.', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
