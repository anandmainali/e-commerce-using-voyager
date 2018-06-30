<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use Cart;
use Auth;
use Mail;
class CheckoutController extends Controller
{
    
    public function index()
    {        
            return view('checkout');        
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
             $request->validate([
           'email' => 'required|email',
           'name' => 'required|min:3|max:25',
            'address' => 'required',
            'phone' => 'required|min:6|max:15',
        ]);
        //store into orders table
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'email' => $request->email,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'total' => $this->getNumbers()->get('total'),
        ]);

        //store into order_product table
        foreach (Cart::content() as $item){
            OrderProduct::create([
               'order_id' => $order->id,
               'product_id' => $item->model->id,
               'quantity' => $item->qty,
            ]);
        }
        
        
        $products = Cart::content();
   
      /*Mail::send('invoice', compact('products'), function($message) {
         $message->to(Auth::user()->email,Auth::user()->name)->subject
            ('Order Successfully Received.');
         $message->from('mail@helpme.com.np','Helpme Dot Com Pvt. Ltd.');
      });
      Mail::send('invoice', compact('products'), function($message) {
         $message->to('mail@helpme.com.np','Help Me Dot Com Pvt. Ltd.')->subject
            ('New Order Received.');
         $message->from(Auth::user()->email,Auth::user()->name);
      });*/
       
        
        Cart::destroy();
        
        $notification = array(
        'message' => 'Thank you!! Your order has been successfully made.', 
        'alert-type' => 'success'
        );
        
        return redirect()->route('wishlist.order')->with($notification);   
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
        //
    }
    
     private function getNumbers(){
        $total = Cart::total();

        return collect([
            'total' => $total,
        ]);
    }
}
