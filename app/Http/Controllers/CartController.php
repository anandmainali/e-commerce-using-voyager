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
        
        return redirect()->back()->with('success_message','Item is successfully added to the cart.');
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
          $qty = $request->qty;
        $proId = $request->proId;
        $rowId = $request->rowId;
        Cart::update($rowId,$qty);
      
        return view('upCart',compact(Cart::content()))->with('success_message','Cart updated successfully!!');
    }

    
    public function destroy()
    {
        Cart::destroy();
        return redirect()->back()->with('success','Cart is Empty.');

    }

    public function remove($id){
        Cart::remove($id);
        return redirect()->back()->with('success_message','Item has been removed.');
    }

    


}
