@extends('layouts.home-master')

@section('class')
index-opt-2 @endsection

@section('content')   

   <!-- Popup Modal -->
   @if(setting('site.offer'))
<div class="modal fade" id="global-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" style="margin-top: -16px; font-size: 28px;" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>

      </div>
      <div class="modal-body" style="padding: 0;">
        <img class="img-full img-responsive" src="{{productImage(setting('site.offer'))}}">
      </div>
    </div>
  </div>
</div>
@endif

<!-- Popup Moda End -->

<!-- MAIN -->
<main class="site-main">
    <div class="block-slide">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 padding-left-5">

<div id="carousel-header" class="carousel slide" data-ride="carousel" data-interval="3000">      

            <!-- Indicators -->

  <ol class="carousel-indicators">
    @foreach($sliders as $key=>$slider)
    <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" class="{{ $loop->first ? ' active' : '' }}"></li>
    @endforeach
  </ol>       
  
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
              

            @foreach($sliders as $slider)
            <div class="item {{ $loop->first ? ' active' : '' }}"> 
              <div class="item-img-wrap">
                <img src="{{productImage($slider->image)}}" alt="" class="img-responsive slider" style="height: 338px; width="880px;">
                </div>                
            </div>
          @endforeach     

                </div>
            
            <!-- Controls --> 
                
                <a class="left carousel-control" href="#carousel-header" role="button" data-slide="prev">
                  <span class="fa fa-angle-left fa-lg" aria-hidden="true" style="margin-top: 180px;"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-header" role="button" data-slide="next">
                  <span class="fa fa-angle-right fa-lg" aria-hidden="true" style="margin-top: 180px;"></span>
                  <span class="sr-only">Next</span>
                </a>

            
            </div>
                 
            </div>
                   
        </div>
    </div>
    <div class="block-promotion-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="promotion-banner item-1 style-6">
                        <a href="#" class="banner-img"><img src="{{productImage(setting('site.advert1'))}}" alt="banner1"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="promotion-banner item-2 style-6">
                        <a href="#" class="banner-img"><img src="frontendImage/home2/banner2.jpg" alt="banner2"></a>
                        
                    </div>
                </div>
                <div class="col-sm-4 hidden-sm hidden-xs">
                    <div class="promotion-banner item-3 style-6">
                        <a href="#" class="banner-img"><img src="frontendImage/home2/banner3.jpg" alt="banner3"></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-feature-product">
        <div class="container">
            <div class="title-of-section">New Products</div>
            <div class="tab-product tab-product-fade-effect">

                <div class="tab-content">
                    <div class="tab-container">

                        <div id="tab-1" class="tab-panel active">
                            <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="true" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>


                                @foreach($latests as $product)


                                <div class="product-item style1">
                                    <div class="product-inner equal-elem">
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="f3" style="height: 214px; width: 214px;"></a>
                                            </div>
                                            <span class="onnew">New</span>
                                            
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
                                                   <div style="float: left;">
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
                </div>
            </div>
        </div>
    </div>


    <div class="block-bestseller-and-deals full-width">
        <div class="container">
            <div class="block-bestseller-product style2">
                <div class="title-of-section">Top Discount Products</div>
                <div class="bestseller-and-deals-content border-background equal-container">


                    @foreach($discounts as $product)

                    <div class="product-item style1 col-md-4 col-sm-6 col-xs-6 padding-0">
                        <div class="product-inner equal-elem">
                            <div class="product-thumb">
                                <div class="thumb-inner">
                                    <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="b2" style="height: 214px; width: 214px;"></a>
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
             <div class="block-daily-deals style3">
                <div class="title-of-section">Deals Of the week</div>
                <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="true" data-dots="true" data-loop="true" data-margin="10" data-responsive='{"0":{"items":1},"480":{"items":2},"680":{"items":3},"768":{"items":1}}'>

                   
                    @foreach($featured as $product)

                    <div class="product-item style1">
                        <div class="product-inner">
                            <div class="product-thumb">
                                <div class="thumb-inner">
                                    <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="d1" style="height: 385px; width: 385px;"></a>
                                </div>
                                
                            </div>
                            <div class="product-innfo">
                                <div class="product-name"><a href="{{route('shop.show',$product->slug)}}">{{substr($product->name,0,90)}}</a></div>
                                <span class="price">
                                    <ins>Rs.{{$product->new_price}}</ins>
                                    @if($product->old_price)
                                    <del>Rs.{{$product->old_price}}</del>
                                    @endif
                                </span>
                                @if($product->discount)
                                <span class="onsale">-{{$product->discount}}%</span>
                                @endif

                            </div>
                            <div class="product-count-down">
                                <div class="title-count-down">Hurry up!<span>Deal ends Soon.</span></div>
                               
                            </div>
                        </div>
                    </div>

                    @endforeach
                    




                </div>
            </div> 
        </div>
    

    <div class="block-feature-product">
        <div class="container">
            <div class="title-of-section">Electronics</div>
            <div class="tab-product tab-product-fade-effect">

                <div class="tab-content">
                    <div class="tab-container">

                        <div id="tab-1" class="tab-panel active">
                            <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>



                                @foreach($electronics as $product)

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
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="block-feature-product">
            <div class="container">
                <div class="title-of-section">Groceries</div>
                <div class="tab-product tab-product-fade-effect">

                    <div class="tab-content">
                        <div class="tab-container">

                            <div id="tab-1" class="tab-panel active">
                                <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="true" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>

                                    @foreach($groceries as $product)

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
                    </div>
                </div>
            </div>
        </div>

        <div class="block-feature-product">
            <div class="container">
                <div class="title-of-section">Home Appliances</div>
                <div class="tab-product tab-product-fade-effect">

                    <div class="tab-content">
                        <div class="tab-container">

                            <div id="tab-1" class="tab-panel active">
                                <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="true" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>

                                    @foreach($appliances as $product)

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
                    </div>
                </div>
            </div>
        </div>

        <div class="block-promotion-banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="promotion-banner style-7">
                            <a href="#" class="banner-img"><img src="frontendImage/home2/banner4.jpg" alt="banner4"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="promotion-banner style-7">
                            <a href="#" class="banner-img"><img src="frontendImage/home2/banner5.jpg" alt="banner5"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.recommendation')

        

    </main><!-- end MAIN -->



    @endsection

    