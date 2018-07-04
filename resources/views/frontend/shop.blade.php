@extends('layouts.home-master')


@section('content')

    <!-- products -->
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <!-- breadcrumbs -->
                <ol class="breadcrumb breadcrumb1">
                    <li><a href="{{route('/')}}">Home</a></li>
                    <li class="active">Products</li>
                </ol>
                <div class="clearfix"> </div>
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
                <div class="product-top">
                    <h4>{{$categoryName}}</h4>
                    <ul>
                        <li class="dropdown head-dpdn">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter By<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('shop.index',['category'=>request()->category,'sort'=>'low_high'])}}">Low price</a></li>
                                <li><a href="{{route('shop.index',['category'=>request()->category,'sort'=>'high_low'])}}">High price</a></li>
                                <li><a href="{{route('shop.index',['category'=>request()->category,'sort'=>'latest'])}}">Latest</a></li>

                            </ul>
                        </li>
                       
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="products-row">

                    @forelse($products as $product)
                            <div class="col-md-3 product-grids">
                                <div class="agile-products">
                                    @if($product->discount)
                                    <div class="new-tag"><h6>{{$product->discount}}%<br>Off</h6></div>
                                    @endif
                                    <a href="{{route('shop.show',$product->slug)}}" style="height:241px;width:221px"><img src="{{productImage($product->image)}}" style="height:185px;width:154px" alt="img"></a>
                                    <div class="agile-product-text">
                                        <h6 style="height:80px;"><a href="{{route('shop.show',$product->slug)}}" align="center">{{substr($product->name,0,90)}}</a></h6>
                                        <h6 align="center">@if($product->old_price)<del>Rs.{{$product->old_price}}</del>@endif Rs.{{$product->new_price}}{{$product->unit}}</h6>
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

                            </div>

                        @empty
                            <br><br><br>
                        <div><h2>No items found.</h2></div>
                        @endforelse


                    <div class="clearfix"> </div>
                </div>
                <div class="pull-right">
                    {{$products->appends(request()->input())->links()}}
                </div>
                <div class="clearfix"> </div>
                <!-- add-products -->
                <!--<div class="w3ls-add-grids w3agile-add-products">
                    <a href="{{route('shop.index')}}">
                        <h4>TOP 10 TRENDS FOR YOU FLAT UPTO <span>20%</span> OFF</h4>
                        <h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                    </a>
                </div>-->
                <!-- //add-products -->
            </div>
           
       <div class="col-md-3">
   <div class="container" >
                      <div class="menu" >
        <div class="cd-dropdown-wrapper" style="margin-left:-80px;">
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
                   <ul class="is-hidden" style="height:200px">    
                        
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
            
            <div class="clearfix"> </div>
            <!-- recommendations -->
            @include('includes/recommendation')
            <!-- //recommendations -->
        </div>
    </div>
    <!--//products-->
@endsection
