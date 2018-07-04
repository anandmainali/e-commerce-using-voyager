@extends('layouts.home-master')
@section('content')
    <br><br>

   
<div class="container">

    <!-- breadcrumbs -->
    <ol class="breadcrumb breadcrumb1">
        <li><a href="{{route('/')}}">Home</a></li>
        <li class="active">Shopping Cart</li>
    </ol>
    <div class="clearfix"> </div>
    <!-- //breadcrumbs -->
     <div id="updateDiv">
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

    @if(Auth()->user())
    <div class="container">
         @if($count > 0)
            <h2>{{$count}} Item(s) in Wishlist</h2><br>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                
                    <tr>
            <th style="width:50%">Product</th>
            <th style="width:18%">Price</th>
            
            <th style="width:10%" class="text-center">Action</th>
            <th style="width:22%"></th>
        </tr>
               
                </thead>
                <tbody>
                	@foreach($wishlistItems as $data)
                	<?php $item = App\wishList::find($data->id);
                	 ?>
                <tr>
					<td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 hidden-xs"><a href="{{route('shop.show',$item->product->slug)}}"><img src="{{productImage($item->product->image)}}" alt="..." class="img-responsive"/></a></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin"><a href="{{route('shop.show',$item->product->slug)}}">{{substr($item->product->name,0,80)}}</a></h4>
                        <p>{{$item->product->details}}</p>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rs.{{$item->product->new_price}}</td>
            <td class="actions" data-th="">
                

                <form action="{{route('wishlist.destroy',$data->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </form>

            </td>
            <td></td>

                </tr>
                @endforeach
                </tbody>

            </table>

        @else
            <br>
            <h2>Wishlist Empty.</h2><br><br>
            @endif 
    </div>
    @endif
    <br><br><br>
    @include('includes.recommendation');
@endsection

