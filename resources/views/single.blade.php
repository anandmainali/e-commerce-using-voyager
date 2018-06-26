  @extends('layouts.home-master')

  @section('class')
page-product detail-product @endsection

@section('meta')
<!-- Facebook Share -->
  <meta property="og:url"           content="{{url()->current()}}" />
  <meta property="og:type"          content="Shopping" />
  <meta property="og:title"         content="{{ $product->name }}" />
  <meta property="og:description"   content="{{ strip_tags($product->description) }}" />
  <meta property="og:image"         content="{{ productImage($product->image) }}" />

@endsection

    @section('content')     

   <!-- MAIN -->
        <main class="site-main">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="{{route('/')}}">Home </a></li>
                    <li class="active"><a href="#">Detail</a></li>
                </ol>
            </div>
            <div class="container">
                <div class="product-content-single">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 padding-right">
                            <div class="product-media">
                                <div class="image-preview-container image-thick-box image_preview_container">
                                    <img id="img_zoom" data-zoom-image="{{productImage($product->image)}}" src="{{productImage($product->image)}}" alt="">
                                    <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-preview image-small product_preview">
                                    <div id="thumbnails" class="thumbnails_carousel owl-carousel nav-style4" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":5},"600":{"items":5},"1000":{"items":5}}'>
                                        <a href="#" data-image="{{productImage($product->image)}}" data-zoom-image="{{productImage($product->image)}}">
                                            <img src="{{productImage($product->image)}}" data-large-image="{{productImage($product->image)}}" alt="i1">
                                        </a>
                                        <a href="#" data-image="{{productImage($product->image)}}" data-zoom-image="{{productImage($product->image)}}">
                                            <img src="{{productImage($product->image)}}" data-large-image="{{productImage($product->image)}}" alt="i1">
                                        </a>
                                        <a href="#" data-image="{{productImage($product->image)}}" data-zoom-image="{{productImage($product->image)}}">
                                            <img src="{{productImage($product->image)}}" data-large-image="{{productImage($product->image)}}" alt="i1">
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <div class="product-info-main">
                                <div class="product-name"><a href="#">{{$product->name}}</a></div>
                                <br>
                                
                                <div class="group-btn-share">
                                    <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="{{url()->current()}}" class="fb-xfbml-parse-ignore">Share</a></div>
                                </div>
                                <br>
                                <div class="product-description">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="product-info-price">
                                <div class="product-info-stock-sku">
                                    <div class="stock available">
                                        <span class="label-stock">Availability: </span>In Stock
                                    </div>
                                </div>
                                <div class="transportation">
                                    <span>item with Free Delivery</span>
                                </div>
                                <span class="price">
                                    <ins>Rs.{{$product->new_price}}</ins>
                                    @if($product->old_price)
                                    <del>Rs.{{$product->old_price}}</del>
                                    @endif
                                </span>
                                <div class="quantity">
                                    <h6 class="quantity-title">Quantity:</h6>
                                    <div class="buttons-added">
                                        <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="single-add-to-cart">
                                    
                                    <form action="{{route('cart.store')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" value="{{$product->name}}" />    
                                                        <input type="hidden" name="price" value="{{$product->new_price}}" />
                                                        <input type="hidden" name="qty" value="1" />
                                                        <button type="submit" class="add-to-cart">Add to cart</button>
                                                    </form>
                                                    <form action="{{route('wishlist.store',$product->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" value="{{$product->name}}" />
                                                        <input type="hidden" name="price" value="{{$product->new_price}}" />
                                                        <a href="#" class="wishlist"><button ><i class="fa fa-heart-o" aria-hidden="true"></i> Wishlist</button></a>

                                                    </form>
                                   
                                </div>
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