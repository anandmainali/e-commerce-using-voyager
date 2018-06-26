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
                            <div class="toolbar-sort">
                                <select class="chosen-select sorter-options form-control" >
                                    <option selected="selected" value="position">Sort by popularity</option>
                                    <option value="name">Name</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>

                            <div class="modes">
                                <a href="grid-product.html" class="active modes-mode mode-grid" title="Grid"><i class="flaticon-squares"></i>
                                    <span>Grid</span>
                                </a>
                                <a href="list-product.html" title="List" class="modes-mode mode-list"><i class="flaticon-interface"></i>
                                    <span>List</span>
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
                                    <a href="#" class="quick-view">Quick View</a>
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
                    <div class="filter-options">
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
                    </div>

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

                                                    <span class="review">5 Review(s)</span>
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

                                                    <span class="review">5 Review(s)</span>
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
    <div class="block-recent-view">
        <div class="container">
            <div class="title-of-section">You may be also interested</div>
            <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":6}}'>
                <div class="product-item style1">
                    <div class="product-inner equal-elem">
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="#"><img src="frontendImage/home1/r1.jpg" alt="r1"></a>
                            </div>
                            <span class="onsale">-50%</span>
                            <a href="#" class="quick-view">Quick View</a>
                        </div>
                        <div class="product-innfo">
                            <div class="product-name"><a href="#">Women Hats</a></div>
                            <span class="price">
                                <ins>$229.00</ins>
                                <del>$259.00</del>
                            </span>
                            <span class="star-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="review">5 Review(s)</span>
                            </span>
                            <div class="group-btn-hover style2">
                                <a href="#" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item style1">
                    <div class="product-inner equal-elem">
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="#"><img src="frontendImage/home1/r2.jpg" alt="r2"></a>
                            </div>
                            <span class="onnew">new</span>
                            <a href="#" class="quick-view">Quick View</a>
                        </div>
                        <div class="product-innfo"> 
                            <div class="product-name"><a href="#">Basketball Sports Shoes</a></div>
                            <span class="price price-dark">
                                <ins>$229.00</ins>
                            </span>
                            <span class="star-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="review">5 Review(s)</span>
                            </span>
                            <div class="group-btn-hover style2">
                                <a href="#" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item style1">
                    <div class="product-inner equal-elem">
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="#"><img src="frontendImage/home1/r3.jpg" alt="r3"></a>
                            </div>
                            <a href="#" class="quick-view">Quick View</a>
                        </div>
                        <div class="product-innfo">
                            <div class="product-name"><a href="#">Dark Green Prada Sneakers</a></div>
                            <span class="price price-dark">
                                <ins>$229.00</ins>
                            </span>
                            <span class="star-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="review">5 Review(s)</span>
                            </span>
                            <div class="group-btn-hover style2">
                                <a href="#" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item style1">
                    <div class="product-inner equal-elem">
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="#"><img src="frontendImage/home1/r4.jpg" alt="r4"></a>
                            </div>
                            <a href="#" class="quick-view">Quick View</a>
                        </div>
                        <div class="product-innfo">
                            <div class="product-name"><a href="#">Clutches in Men's Bags for Men</a></div>
                            <span class="price price-dark">
                                <ins>$229.00</ins>
                            </span>
                            <div class="group-btn-hover style2">
                                <a href="#" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item style1">
                    <div class="product-inner equal-elem">
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="#"><img src="frontendImage/home1/r5.jpg" alt="r5"></a>
                            </div>
                            <span class="onsale">-50%</span>
                            <a href="#" class="quick-view">Quick View</a>
                        </div>
                        <div class="product-innfo">
                            <div class="product-name"><a href="#">Parka With a Hood</a></div>
                            <span class="price">
                                <ins>$229.00</ins>
                                <del>$259.00</del>
                            </span>
                            <span class="star-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="review">5 Review(s)</span>
                            </span>
                            <div class="group-btn-hover style2">
                                <a href="#" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-item style1">
                    <div class="product-inner equal-elem">
                        <div class="product-thumb">
                            <div class="thumb-inner">
                                <a href="#"><img src="frontendImage/home1/r6.jpg" alt="r6"></a>
                            </div>
                            <a href="#" class="quick-view">Quick View</a>
                        </div>
                        <div class="product-innfo">
                            <div class="product-name"><a href="#">Smartphone MTK6737 Quad Core.</a></div>
                            <span class="price price-dark">
                                <ins>$229.00</ins>
                            </span>
                            <div class="group-btn-hover style2">
                                <a href="#" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>
                                <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main><!-- end MAIN -->


@endsection