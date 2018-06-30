<?php

namespace App\Http\Controllers;
use Mail;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\User;
use App\Wishlist;
class CartController extends Controller
{
    
    public function index()
    {
        return view('shopping-cart');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem,$rowId) use ($request){
           return $cartItem->id === $request->id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message','This item is already in your cart.');
        }

        Cart::add($request->id, $request->name,1, $request->price)->associate('App\Product');

        $notification = array(
        'message' => 'Successfully added to Cart.', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request)
    {
          $qty = $request->qty;
       $row = $request->id;
       $data = Cart::update($row, $qty);
        return response()->json($data);
    }

    
    public function destroy()
    {
        Cart::destroy();

        $notification = array(
        'message' => 'Successfully removed all item from Cart.', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function remove($id){
        Cart::remove($id);

        $notification = array(
        'message' => 'Successfully removed from Cart.', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    


}
