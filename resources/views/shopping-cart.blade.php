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
            <div class="block-recent-view">
                <div class="container">
                    <div class="title-of-section">You may be also interested</div>
                    <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":6}}'>

                        @foreach(recommendations() as $product)
                        <div class="product-item style1">
                                        <div class="product-inner equal-elem">
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="f3" style="height: 214px; width: 214px;"></a>
                                                </div>
                                                @if($product->discount)
                                                <span class="onsale">-{{$product->discount}}%</span>
                                                @endif
                                                <a href="#" class="quick-view">Quick View</a>
                                            </div>
                                            <div class="product-innfo">
                                                <div class="product-name"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></div>
                                                <span class="price">
                                                    <ins>Rs.{{$product->new_price}}</ins>
                                                    @if($product->old_price)
                                                    <del>Rs.{{$product->old_price}}</del>
                                                    @endif
                                                </span>

                                                <div class="group-btn-hover">
                                                    <div class="inner">
                                                        <div style="float: left;">
                                                        <form action="{{route('cart.store')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" value="{{$product->name}}" />    
                                                        <input type="hidden" name="price" value="{{$product->new_price}}" />
                                                        <input type="hidden" name="qty" value="1" />
                                                        <button type="submit" class="add-to-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                                <div style="float: right;">
                                                    <form action="{{route('wishlist.store',$product->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" value="{{$product->name}}" />
                                                        <input type="hidden" name="price" value="{{$product->new_price}}" />
                                                        <button class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></button>

                                                    </form>
                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        @endforeach


                        
                        
                    </div>
                </div>
            </div>
            
        </main><!-- end MAIN -->


        @endsection