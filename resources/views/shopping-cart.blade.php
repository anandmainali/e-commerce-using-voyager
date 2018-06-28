    @extends('layouts.home-master')

    @section('class')
page-product @endsection

    @section('content')     

          
        <!-- MAIN -->
        <main class="site-main shopping-cart">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="{{route('/')}}">Home </a></li>
                    <li class="active"><a href="#">Shopping Cart</a></li>
                </ol>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-cart">
                            <div class="table-cart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="tb-image"></th>
                                            <th class="tb-product">Product Name</th>
                                            <th class="tb-price">Unit Price</th>
                                            <th class="tb-qty">Qty</th>
                                            <th class="tb-total">SubTotal</th>
                                            <th class="tb-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count(Cart::content()) > 0)
                                        @foreach(Cart::content() as $product)
                                        <tr>                                            
                                            <td class="tb-image"><a href="{{route('shop.show',$product->model->slug)}}" class="item-photo"><img src="{{productImage($product->model->image)}}" alt="cart" style="height: 100px; width: 100px"></a></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="{{route('shop.show',$product->model->slug)}}">{{$product->name}}</a></div>
                                            </td>
                                            <td class="tb-price">
                                                <span class="price">Rs.{{$product->price}}</span>
                                            </td>
                                            <td class="tb-qty">
                                                <div class="quantity">
                                                    <div class="buttons-added">
                                                        <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tb-total">
                                                <span class="price">Rs.{{($product->price)*($product->qty)}}</span>
                                            </td>
                                            <td class="tb-remove">
                                                <form action="{{ route('cart.remove',$product->rowId) }}" method="post">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
                                                            </form>                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <tr  align="center">
                                                <td></td>
                                                <td colspan="2"><h2>No items found in your cart.</h2></td>
                                                
                                                <td></td>
                                            </tr>
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-actions">
                                <a href="{{route('/')}}">
                                <button type="submit" class="btn-continue">
                                    <span>Continue Shopping</span>
                                </button></a>
                                <button type="submit" class="btn-clean" >
                                    <span>Update Shopping Cart</span>
                                </button>
                                <a href="{{route('cart.destroy')}}">
                                <button type="submit" class="btn-update" >
                                    <span>Clear Shopping Cart</span>
                                </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-left-5">
                        <div class="order-summary">
                            <h4 class="title-shopping-cart">Order Summary</h4>
                            <div class="checkout-element-content">
                                <span class="order-left">Subtotal:<span>Rs.{{Cart::total()}}.00</span></span>
                                <span class="order-left">Shipping:<span>Free Shipping</span></span>
                                <span class="order-left">Total:<span>Rs.{{Cart::total()}}.00</span></span>
                                
                                <a href="{{route('checkout.index')}}" title=""><button type="submit" class="btn-checkout" >
                                    <span>Check Out</span>
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            @include('includes.recommendation')

            
        </main><!-- end MAIN -->


        @endsection