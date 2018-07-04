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

        Cart::add($request->id, $request->name,$request->qty, $request->price)->associate('App\Product');
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
        'message' => 'Your Cart has been updated.', 
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function remove(Request $request){
        $id = $request->id;
        Cart::remove($id);

    }

    


}
