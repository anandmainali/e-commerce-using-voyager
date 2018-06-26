    @extends('layouts.home-master')

    @section('class')
    page-product @endsection

    @section('content')     


    <!-- MAIN -->
    <main class="site-main shopping-cart">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="{{route('/')}}">Home </a></li>
                <li class="active"><a href="#">Orders</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 align="center">My Order Items</h2>
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($orderItems) > 0)
                                    @foreach($orderItems as $product)
                                    <tr>                                            
                                        <td class="tb-image"><a href="{{route('shop.show',$product->slug)}}" class="item-photo"><img src="{{productImage($product->image)}}" alt="cart" style="height: 100px; width: 100px"></a></td>
                                        <td class="tb-product">
                                            <div class="product-name"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></div>
                                        </td>

                                        <td class="tb-price">
                                            <span class="price">Rs.{{$product->new_price}}</span>
                                        </td>
                                        <td class="tb-qty">
                                                 <span class="price">{{$product->quantity}}</span>
                                            </td>
                                            <td class="tb-total">
                                                <span class="price">Rs.{{($product->new_price)*($product->quantity)}}</span>
                                            </td>
                                        
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr  align="center">
                                        <td></td>
                                        <td colspan="2"><h2>No Orders Found.</h2></td>

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

                                <a href="{{route('cart.index')}}">
                                    <button type="submit" class="btn-update" >
                                        <span>View Cart</span>
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