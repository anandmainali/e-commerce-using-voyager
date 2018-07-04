  @extends('layouts.home-master')

  @section('class')
  page-product grid-view @endsection

  @section('content')     


  <!-- MAIN -->
  <main class="site-main product-list product-grid">
    <div class="container">
        <ol class="breadcrumb-page">
            <li><a href="{{route('/')}}">Home </a></li>
            <li class="active"><a href="#">Grid Categories  </a></li>
        </ol>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 float-none float-right padding-left-5">
                <div class="main-content">

                    <div class="toolbar-products">
                        <h4 class="title-product">{{$categoryName}}</h4>
                        <div class="toolbar-option">
                            <ul class="header-nav krystal-nav">
                            <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Sort by Popularity <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          
                                    <li><a href="{{route('shop.index',['category'=>request()->category,'sort'=>'latest'])}}">New Product</a></li>
                                    {{-- <li><a href="" title="">Name A-Z</a></li>
                                    <li><a href="" title="">Name Z-A</a></li> --}}
                                    <li><a href="{{route('shop.index',['category'=>request()->category,'sort'=>'low_high'])}}">Price Low to High</a></li>
                                    <li><a href="{{route('shop.index',['category'=>request()->category,'sort'=>'high_low'])}}">Price High to Low</a></li>
                         
                        </ul>
                      </li>
                            

                            <div class="modes">
                                <a href="#" class="active modes-mode mode-grid" title="Grid"><i class="flaticon-squares"></i>
                                    <span>Grid</span>
                                </a>
                                
                            </div>
                        </div>  
                    </div>
                    <div class="bestseller-and-deals-content border-background equal-container">
                        @forelse($products as $product)
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
                                    <div class="product-name" style="height:60px"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></div>
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

                        @empty
                        <br><br><br>
                        <div><h2>No items found.</h2></div>
                        @endforelse
                        <div class="pull-right">
                            {{$products->appends(request()->input())->links()}}
                        </div>

                    </div>  



                </div>


            </div>

            <div class="col-md-3 col-sm-4">
                <div class="col-sidebar">
                    {{-- <div class="filter-options">
                        <div class="block-title">Shop by</div>
                        <div class="block-content">


                            <div class="filter-options-item filter-price">
                                <div class="filter-options-title">Price</div>
                                <div class="filter-options-content">
                                    <div class="price_slider_wrapper">
                                        <div data-label-reasult="Price:" data-min="0" data-max="3000" data-unit="$" class="slider-range-price " data-value-min="85" data-value-max="2000">
                                            <span class="text-right">Filter</span>
                                        </div>
                                        <div class="price_slider_amount">
                                            <div class="price_label">
                                                Price: <span class="from">$85</span>-<span class="to">$2000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div> --}}

                    <div class="block-latest-roducts">
                        <div class="block-title">Top Discount Products</div>
                        <div class="block-latest-roducts-content">
                            <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>
                                <div class="owl-ones-row">
                                    @foreach($discounts as $product)
                                    <div class="product-item style1">
                                        <div class="product-inner">
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="p1" style="height: 80px; width: 80px;"></a>
                                                </div>
                                            </div>
                                            <div class="product-innfo">
                                                <div class="product-name"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></div>
                                                <span class="price">
                                                    <ins>Rs.{{$product->new_price}}</ins>
                                                    @if($product->old_price)
                                                    <del>Rs.{{$product->old_price}}</del>
                                                    @endif
                                                </span>
                                                <span class="star-rating">

                                                    <span class="review" style="color: white;">5 Review(s)</span>
                                                </span>
                                            </div>    
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="owl-ones-row">
                                    @foreach($discounts as $product)
                                    <div class="product-item style1">
                                        <div class="product-inner">
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="p1" style="height: 80px; width: 80px;"></a>
                                                </div>
                                            </div>
                                            <div class="product-innfo">
                                                <div class="product-name"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></div>
                                                <span class="price">
                                                    <ins>Rs.{{$product->new_price}}</ins>
                                                    @if($product->old_price)
                                                    <del>Rs.{{$product->old_price}}</del>
                                                    @endif
                                                </span>
                                                <span class="star-rating">

                                                    <span class="review" style="color: white;">5 Review(s)</span>
                                                </span>
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
    
    @include('includes.recommendation')


</main><!-- end MAIN -->


@endsection