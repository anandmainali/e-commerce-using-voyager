    @extends('layouts.home-master')

    @section('class')
page-product @endsection

    @section('content')     

          
        <!-- MAIN -->
        <main class="site-main shopping-cart">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="{{route('/')}}">Home </a></li>
                    <li class="active"><a href="#">Wishlist</a></li>
                </ol>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 align="center">My Wishlist Items</h2>
                        <div class="form-cart">                            
                            <div class="table-cart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="tb-image"></th>
                                            <th class="tb-product">Product Name</th>
                                            <th></th>
                                            <th class="tb-price">Unit Price</th>
                                            <th></th>
                                            <th class="tb-remove">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($wishlists) > 0)
                                        @foreach($wishlists as $product)
                                        <tr>                                            
                                            <td class="tb-image"><a href="{{route('shop.show',$product->product->slug)}}" class="item-photo"><img src="{{productImage($product->product->image)}}" alt="cart" style="height: 100px; width: 100px"></a></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="{{route('shop.show',$product->product->slug)}}">{{$product->product->name}}</a></div>
                                            </td>
                                            <td></td>
                                            <td class="tb-price">
                                                <span class="price">Rs.{{$product->product->new_price}}</span>
                                            </td>
                                            <td></td>
                                            <td class="tb-remove">
                                                <form action="{{ route('wishlist.destroy',$product->id) }}" method="post">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
                                                            </form>                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <tr  align="center">
                                                <td></td>
                                                <td colspan="2"><h2>No items found in your Wishlists.</h2></td>
                                                
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