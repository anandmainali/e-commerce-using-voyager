
@extends('layouts.home-master')

@section('meta')
<!-- Facebook Share -->
  <meta property="og:url"           content="{{url()->current()}}" />
  <meta property="og:type"          content="Shopping" />
  <meta property="og:title"         content="{{ $product->name }}" />
  <meta property="og:description"   content="{{ strip_tags($product->description) }}" />
  <meta property="og:image"         content="{{ productImage($product->image) }}" />

@endsection

@section('content')
    <br><br>
    <!-- breadcrumbs -->
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
            <li><a href="{{route('/')}}">Home</a></li>
            <li><a href="{{route('shop.index')}}">Shop</a></li>
            <li class="active">{{substr($product->name,0,50)}}</li>
        </ol>
        <div class="clearfix"> </div>
    </div>
    <!-- //breadcrumbs -->

    <div class="container">
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get('success_message')}}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- products -->
    <div class="products">
        <div class="container">
            <div class="single-page">
                <div class="single-page-row" id="detail-21">
                    <div class="col-md-6 single-top-left">
                        <div class="flexslider">
                            <ul class="slides">
                                @if($product->images)
                                @foreach(json_decode($product->images,true) as $image)
                                <li data-thumb="{{productImage($image)}}">
                                    <div class="thumb-image detail_images"> <img src="{{productImage($image)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                                </li>
                                @endforeach
                                    @endif
                            </ul>
                        </div>
                                {{--   <li data-thumb="{{asset('images/s2.jpg')}}">
                                       <div class="thumb-image"> <img src="{{asset('images/s2.jpg')}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                                   </li>
                                   <li data-thumb="{{asset('images/s3.jpg')}}">
                                       <div class="thumb-image"> <img src="{{asset('images/s3.jpg')}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                                   </li>
                               </ul>
                           </div>--}}
                        @if(!$product->images)
                        <li data-thumb="{{productImage($product->image)}}">
                            <div class="thumb-image detail_images"> <img src="{{productImage($product->image)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                            @endif

                    </div>
                    <div class="col-md-6 single-top-right">
                        <h3 class="item_name">{{$product->name}}</h3>

                        <p>Processing Time: Item will be shipped out within 2-3 working days. </p>

                        <div class="single-price">
                            <ul>
                                <li>Rs.{{$product->new_price}}@if($product->unit){{'/'.$product->unit}}@endif</li>
                                @if($product->old_price)
                                <li><del>Rs.{{$product->old_price}}</del></li>
                                @endif
                                @if($product->discount)
                                <li><span class="w3off">{{$product->discount}}% OFF</span></li>
                                @endif
                                  </ul>
                        </div>
                        
                        <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="{{url()->current()}}" class="fb-xfbml-parse-ignore">Share</a></div>
                       
                       
                       
                        <p class="single-price-text">{!! $product->description !!}</p><br>
                        <form action="{{route('cart.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$product->id}}" />
                            <input type="hidden" name="name" value="{{$product->name}}" />

                            <input type="hidden" name="price" value="{{$product->new_price}}" />
                            <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>

                        </form>
                        
                        <form action="{{route('wishlist.store',$product->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$product->id}}" />
                            <input type="hidden" name="name" value="{{$product->name}}" />

                            <input type="hidden" name="price" value="{{$product->new_price}}" />
                            <button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>

                        </form>
                       
                        


                        {{--
                        @if(Auth()->user())
                        <form action="" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$product->id}}" />
                            <input type="hidden" name="name" value="{{$product->name}}" />


                            <input type="hidden" name="price" value="{{$product->new_price}}" />
                            <button type="submit" class="w3ls-cart w3ls-cart-like" ><i class="fa fa-heart-o" aria-hidden="true"></i> Save For Later</button>
                        </form>
                            @endif--}}
                         </div>
                    <div class="clearfix"> </div>
                </div>
                {{--<div class="single-page-icons social-icons">
                    <ul>
                        <li><h4>Share on</h4></li>
                        <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                        <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                        <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                        <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                        <li><a href="#" class="fa fa-rss icon rss"> </a></li>
                    </ul>
                </div>--}}
            </div>
            <!-- recommendations -->
            @include('includes/recommendation');
            <!-- //recommendations -->
          
           
        </div>
    </div>
    <!--//products-->
@endsection
