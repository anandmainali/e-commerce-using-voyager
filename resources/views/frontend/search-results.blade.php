@extends('layouts.home-master')


@section('content')

    <!-- breadcrumbs -->
    <div class="container"><br>
        <ol class="breadcrumb breadcrumb1">
            <li><a href="{{route('/')}}">Home</a></li>
             <li class="active">Search</li>
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
                <h1>Search Results</h1><br>
                <h3><p>{{$total}} result(s) Found</p></h3>


                    <div class="products-row">

                        @forelse($products as $product)
                            <div class="col-md-3 product-grids">
                                <div class="agile-products">
                                    @if($product->discount)
                                    <div class="new-tag"><h6>{{$product->discount}}%<br>Off</h6></div>
                                    @endif
                                    <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="img" style="height:185px;width:154px"></a>
                                    <div class="agile-product-text">
                                        <h5 style="height:60px"><a href="{{route('shop.show',$product->slug)}}" style="height:241px;width:221px">{{substr($product->name,0,90)}}</a></h5><br><br>
                                        <h6>@if($product->old_price)<del>Rs.{{$product->old_price}}</del>@endif Rs.{{$product->new_price}}{{$product->unit}}</h6>
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
            </div>
        </div>
    </div>
    <br><br>
@endsection
