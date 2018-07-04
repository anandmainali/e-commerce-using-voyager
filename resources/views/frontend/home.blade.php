@extends('layouts.home-master')


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




   <div class="col-md-12" >
       <div class="col-md-3">
   <div class="container -fluid">
      <div class="menu">
        <div class="cd-dropdown-wrapper">
          <a class="dropdown-is-active"><h3><b>Store Categories</b></h3></a><br>
          <nav class="cd-dropdown dropdown-is-active">
            <a href="#0" class="cd-close">Close</a>
            <ul class="cd-dropdown-content" class="margin-left:50px;">

            @foreach($treeView as $category)
                @if(count($category->subcategories) > 0)
                <li class="has-children">
                <a href="#">{{$category->name}}</a>
                <ul class="cd-secondary-dropdown is-hidden">
                  <li class="go-back"><a href="#">Menu</a></li>
                  <li class="has-children">
                   <ul class="is-hidden" style="height:300px">    
                        
                          @foreach($category->subcategories as $subcategory)

                           @if(count($subcategory->childcategories)>0)

                          <li class="has-children">
                      <a href="#">{{$subcategory->name}}&emsp;</a>                 
                       <ul class="is-hidden"> 
                                 <li class="go-back"><a href="#">Menu</a></li>
                                 @foreach($subcategory->childcategories as $childcategory)
                                 <li><a href="{{route('shop.index',['childcategory'=>$childcategory->slug])}}">{{$childcategory->name}}</a></li>                         
                                 @endforeach
                                     
                               </ul> 
                               
                      </li>
                      @else
                      <li><a href="{{route('shop.index',['subcategory'=>$subcategory->slug])}}">{{$subcategory->name}}&emsp;</a></li>
                      @endif
                        @endforeach
                        
                        </ul>
                  </li>

                </ul>
              </li>
              
              @else
                 <li>
                <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}</a>
                  </li>

              @endif
              
              @endforeach
             
              
            </ul> 
          </nav> 
        </div> 
      </div>
      
    </div>
  </div>

    <!-- banner -->
    <div class="banner col-md-8 col-md-offset-1" >
        <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
            <!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">
               
                @foreach($sliders as $slider)
                <div class="item {{ $loop->first ? ' active' : '' }}"> <!-- Second-Slide -->
                    <img src="{{productImage($slider->image)}}" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h4 data-animation="animated fadeInDown">{{$slider->quote}}</h4>
                        <h4 data-animation="animated fadeInUp">HELP ME DOT COM</h4>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
                <span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <script src="{{asset('js/custom.js')}}"></script>
    </div>
    <!-- //banner -->
    </div> 



    <!-- welcome -->
    <div class="welcome" style="padding-bottom:0px;">
        <div class="container">
            <div class="welcome-info">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    
                    <div class="clearfix"> </div>
                    <br><br><br>
                    <h3 class="w3ls-title">Featured Products</h3>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                            <div class="tabcontent-grids">
                                <div id="owl-demo" class="owl-carousel">
                                    @foreach($products as $product)
                                        <div class="item">
                                <div class="agile-products">
                                    @if($product->discount)
                                    <div class="new-tag"><h6>{{$product->discount}}%<br>Off</h6></div>
                                    @endif
                                    <a href="{{route('shop.show',$product->slug)}}" style="height:241px;width:221px"><img src="{{productImage($product->image)}}"  alt="img" style="height:185px;width:154px"></a>
                                    <div class="agile-product-text">
                                        <h6 style="height:60px"><a href="{{route('shop.show',$product->slug)}}">{{substr($product->name,0,90)}}</a></h6>
                                        <h6>@if($product->old_price)<del>Rs.{{$product->old_price}}</del>@endif Rs.{{$product->new_price}}</h6>
                                        <form action="{{route('cart.store')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$product->id}}" />
                                            <input type="hidden" name="name" value="{{$product->name}}" />
                                            {{--<input type="hidden" name="add" value="1" />--}}

                                            <input type="hidden" name="price" value="{{$product->new_price}}" />
                                            <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                        </form>
                                    </div>
                                </div>

<!--                            </div>
-->                                            
                                            
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>




                    </div>
                    <a href="{{route('shop.index')}}" type="button" class="btn btn-lg btn-primary">View More</a>

                </div>
            </div>
        </div>
    </div>
    <!-- //welcome -->
    
    
     <!-- welcome -->
    <div class="welcome" style="padding-top:0px;">
        <div class="container">
            <div class="welcome-info">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

                    <div class="clearfix"> </div>
    <div class="recommend">
    <h3 class="w3ls-title">Latest Products </h3>
    <script>
        $(document).ready(function() {
            $("#owl-demo5").owlCarousel({

                autoPlay: 2500, //Set AutoPlay to 3 seconds

                items :4,
                itemsDesktop : [640,5],
                itemsDesktopSmall : [414,4],
                navigation : true

            });

        });
    </script>
    <div id="owl-demo5" class="owl-carousel">
         @foreach($latests as $latest)
                                        <div class="item">

                                <div class="agile-products">
                                    @if($latest->discount)
                                    <div class="new-tag"><h6>{{$latest->discount}}%<br>Off</h6></div>
                                    @endif
                                    <a href="{{route('shop.show',$latest->slug)}}" style="height:241px;width:221px"><img src="{{productImage($latest->image)}}" alt="img" style="height:185px;width:154px"></a>
                                    <div class="agile-product-text">
                                        <h6 style="height:60px"><a href="{{route('shop.show',$latest->slug)}}">{{substr($latest->name,0,90)}}</a></h6>
                                        <h6>@if($latest->old_price)<del>Rs.{{$latest->old_price}}</del>@endif Rs.{{$latest->new_price}}{{$latest->unit}}</h6>
                                        <form action="{{route('cart.store')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$latest->id}}" />
                                            <input type="hidden" name="name" value="{{$latest->name}}" />
                                            {{--<input type="hidden" name="add" value="1" />--}}

                                            <input type="hidden" name="price" value="{{$latest->new_price}}" />
                                            <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                        </form>
                                    </div>
                                </div>
<!--</div>-->                                            
                                            
                                        </div>
                                    @endforeach

        </div>

    </div>                      
                                <a href="{{route('shop.index')}}" type="button" class="btn btn-lg btn-primary">View More</a>
                                  </div>
            </div>
        </div>
    </div>

</div>
    
    
    <br><br><br>
    <!-- add-products -->
    <div class="add-products">
        <div class="container">
            <div class="add-products-row">
                <div class="w3ls-add-grids">
                    <a href="{{route('shop.discount',$discounts[0]->discount)}}">
                        <h4>{{$discounts[0]->name}} <span>{{$discounts[0]->discount}}%</span> OFF</h4>
                        <h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                    </a>
                </div>
                <div class="w3ls-add-grids w3ls-add-grids-mdl">
                    <a href="{{route('shop.discount',$discounts[1]->discount)}}">
                        <h4>{{$discounts[1]->name}} <span>{{$discounts[1]->discount}}%</span> OFF</h4>
                        <h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                    </a>
                </div>
                <div class="w3ls-add-grids w3ls-add-grids-mdl1">
                    <a href="{{route('shop.discount',$discounts[2]->discount)}}">
                        <h4> {{$discounts[2]->name}} <span>{{$discounts[2]->discount}}%</span> OFF</h4>
                        <h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                    </a>
                </div>
                <div class="clerfix"> </div>
            </div>
        </div>
    </div>
    <!-- //add-products -->
    <!-- coming soon -->
    <div class="soon">
        <div class="container">
            <h3 style="color:blue;">Helpme Best Selling Products</h3>
            <h4><a href="{{route('shop.index')}}">Shop Now</a></h4>
           
        </div>
    </div>
    <!-- //coming soon -->
    <!-- deals -->
    <div class="deals">
        <div class="container">
            <h3 class="w3ls-title">DEALS OF THE DAY </h3>
            <div class="deals-row">
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'mobiles'])}}" class="wthree-btn">
                        <div class="focus-image"><i class="fa fa-mobile"></i></div>
                        <h4 class="clrchg">Mobiles</h4>
                    </a>
                </div>
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'electronics'])}}" class="wthree-btn wthree1">
                        <div class="focus-image"><i class="fa fa-laptop"></i></div>
                        <h4 class="clrchg"> Electronics & Appliances</h4>
                    </a>
                </div>
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'furnitures'])}}" class="wthree-btn wthree2">
                        <div class="focus-image"><i class="fa fa-wheelchair"></i></div>
                        <h4 class="clrchg">Furnitures</h4>
                    </a>
                </div>
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'home-decor'])}}" class="wthree-btn wthree3">
                        <div class="focus-image"><i class="fa fa-home"></i></div>
                        <h4 class="clrchg">Home Decor</h4>
                    </a>
                </div>
                <div class="col-md-2 focus-grid w3focus-grid-mdl">
                    <a href="{{route('shop.index',['category'=>'books'])}}" class="wthree-btn wthree3">
                        <div class="focus-image"><i class="fa fa-book"></i></div>
                        <h4 class="clrchg">Books</h4>
                    </a>
                </div>
                <div class="col-md-2 focus-grid w3focus-grid-mdl">
                    <a href="{{route('shop.index',['category'=>'fashion'])}}" class="wthree-btn wthree4">
                        <div class="focus-image"><i class="fa fa-asterisk"></i></div>
                        <h4 class="clrchg">Fashion</h4>
                    </a>
                </div>
                <div class="col-md-2 focus-grid w3focus-grid-mdl">
                    <a href="{{route('shop.index',['category'=>'kids'])}}" class="wthree-btn wthree2">
                        <div class="focus-image"><i class="fa fa-gamepad"></i></div>
                        <h4 class="clrchg">Kids</h4>
                    </a>
                </div>
                <div class="col-md-2 focus-grid w3focus-grid-mdl">
                    <a href="{{route('shop.index',['category'=>'groceries'])}}" class="wthree-btn wthree">
                        <div class="focus-image"><i class="fa fa-shopping-basket"></i></div>
                        <h4 class="clrchg">Groceries</h4>
                    </a>
                </div>
                <div class="col-md-2 focus-grid w3focus-grid-mdl">
                    <a href="{{route('shop.index',['category'=>'health'])}}" class="wthree-btn wthree5">
                        <div class="focus-image"><i class="fa fa-medkit"></i></div>
                        <h4 class="clrchg">Health</h4>
                    </a>
                </div>
                <div class="col-md-2 focus-grid w3focus-grid-mdl">
                    <a href="{{route('shop.index',['category'=>'automotive'])}}" class="wthree-btn wthree1">
                        <div class="focus-image"><i class="fa fa-car"></i></div>
                        <h4 class="clrchg">Automotive</h4>
                    </a>
                </div>
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'food'])}}" class="wthree-btn wthree2">
                        <div class="focus-image"><i class="fa fa-cutlery"></i></div>
                        <h4 class="clrchg">Food</h4>
                    </a>
                </div>
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'sports'])}}" class="wthree-btn wthree5">
                        <div class="focus-image"><i class="fa fa-futbol-o"></i></div>
                        <h4 class="clrchg">Sports</h4>
                    </a>
                </div>
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'games'])}}" class="wthree-btn wthree3">
                        <div class="focus-image"><i class="fa fa-gamepad"></i></div>
                        <h4 class="clrchg">Games</h4>
                    </a>
                </div>
                <div class="col-md-3 focus-grid">
                    <a href="{{route('shop.index',['category'=>'gifts'])}}" class="wthree-btn ">
                        <div class="focus-image"><i class="fa fa-gift"></i></div>
                        <h4 class="clrchg">Gifts</h4>
                    </a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //deals -->

@endsection
