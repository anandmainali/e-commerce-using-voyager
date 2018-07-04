<div class="block-recent-view">
            <div class="container">
                <div class="title-of-section">You may be also Interested</div>
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
                                                
                                            </div>
                                            <div class="product-innfo">
                                                <div class="product-name"><a href="{{route('shop.show',$product->slug)}}">{{substr($product->name,0,90)}}</a></div>
                                                <span class="price">
                                                    <ins>Rs.{{$product->new_price}}</ins>
                                                    @if($product->old_price)
                                                    <del>Rs.{{$product->old_price}}</del>
                                                    @endif
                                                </span>

                                                <div class="group-btn-hover">
                                                    <div class="inner">
                                                        <div style="float: left;">
                                                       <form action="" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" id="pid{{$product->id}}" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" id="pn{{$product->id}}" value="{{$product->name}}" />    
                                                        <input type="hidden" id="pnp{{$product->id}}" name="price" value="{{$product->new_price}}" />
                                                        <input type="hidden" id="pqty{{$product->id}}" name="qty" value="1" />
                                                        <button type="button" id="hello{{$product->id}}" class="add-to-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                                <div style="float: right;">
                                                    <form action="" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" id="wid{{$product->id}}" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" id="wpn{{$product->id}}" value="{{$product->name}}" />
                                                        <input type="hidden" name="price" id="wnp{{$product->id}}" value="{{$product->new_price}}" />
                                                        <button type="button" id="wishlist{{$product->id}}" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></button>

                                                    </form>
                                                </div>
                                                    </div>
                                                </div>
                                                @include('includes.addToCartAjax')
                                                @include('includes.addToWishlistAjax')
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach


                </div>
            </div>
        </div>