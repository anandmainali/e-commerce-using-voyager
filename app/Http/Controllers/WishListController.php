<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Wishlist;
use App\Product;
use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
class WishlistController extends Controller
{
    
    public function index()
    {
        $Wishlists = Wishlist::where('user_id','=',auth()->user()->id)->get();

        return view('wishlist',compact('Wishlists'));
        
    }
    

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        
             $Wishlist= new Wishlist;  
       $user = auth()->user();
       $Wishlist->user_id = $user->id; 
       $Wishlist->product_id = $request->id;
       if(Wishlist::where('product_id','=',$Wishlist->product_id)->count()>0){
        $notification = array(
        'message' => 'Product already in wishlist.', 
        'alert-type' => 'info'
        );
            return redirect()->back()->with($notification);
       }else{
        $Wishlist->save();
        $notification = array(
        'message' => 'Successfully added to Wishlist.', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
       } 
        
        
    }

    public function show($id)
    {
        //
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
        $data = Wishlist::findOrFail($id);
        $data->delete($id);
        $notification = array(
        'message' => 'Password successfully deleted.', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function order(){
        $user = auth()->user();
        $orderItems = DB::table('orders')->where('user_id',$user->id)
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'products.id', '=', 'order_product.product_id')
            ->select('order_product.quantity', 'products.*','orders.shipped')
            ->get();
      
        $count = count($orderItems);
        return view('order',compact('orderItems','count'));
    }
}
