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
                
                @include('includes.recommendation')



            </main><!-- end MAIN -->


            @endsection