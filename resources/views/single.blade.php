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
                                        @if($product->images)
                                @foreach(json_decode($product->images,true) as $image)
                                        <a href="#" data-image="{{productImage($product->image)}}" data-zoom-image="{{productImage($product->image)}}">
                                            <img src="{{productImage($product->image)}}" data-large-image="{{productImage($product->image)}}" alt="i1">
                                        </a>
                                        
                                        @endforeach
                                    @endif
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
                                {{-- <div class="quantity">
                                    <h6 class="quantity-title">Quantity:</h6>
                                    <div class="buttons-added">
                                        <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div> --}}
                                <div class="single-add-to-cart">
                                    
                                                    <form action="" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" id="pid{{$product->id}}" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" id="pn{{$product->id}}" value="{{$product->name}}" />    
                                                        <input type="hidden" id="pnp{{$product->id}}" name="price" value="{{$product->new_price}}" />
                                                        <input type="hidden" id="pqty{{$product->id}}" name="qty" value="1" />
                                                        <button type="button" id="hello{{$product->id}}" class="add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</button>
                                                    </form>
                                                    <form action="" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" id="wid{{$product->id}}" value="{{$product->id}}" />
                                                        <input type="hidden" name="name" id="wpn{{$product->id}}" value="{{$product->name}}" />
                                                        <input type="hidden" name="price" id="wnp{{$product->id}}" value="{{$product->new_price}}" />
                                                        <button type="button" id="wishlist{{$product->id}}" class="wishlist" style="color:white"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>

                                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                        @include('includes.addToCartAjax')
                        @include('includes.addToWishlistAjax')
                    </div>
                </div>
            </div>
            <br><br>
            

            @include('includes.recommendation')

            
        </main><!-- end MAIN -->
        

        @endsection