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
         @if(1)
            <h2>{{$count}} Item(s) in Order List</h2><br>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                
                    <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:10%">Subtotal</th>
            <th style="width:0%">Shipping Status</th>
        </tr>
               
                </thead>
                <tbody>
                    
                        @foreach($orderItems as $item)
                        <tr>
                    <td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 hidden-xs"><a href="{{route('shop.show',$item->slug)}}"><img src="{{productImage($item->image)}}" alt="..." class="img-responsive"/></a></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin"><a href="{{route('shop.show',$item->slug)}}">{{substr($item->name,0,80)}}</a></h4>
                        
                    </div>
                </div>
            </td>
            <td data-th="Price">Rs.{{$item->new_price}}</td>
                <td data-th="Quantity">
                {{$item->quantity}}
            </td>
            <td>
                {{(($item->new_price)*($item->quantity))}}
            </td>
            <td>
                @if($item->shipped == 0)
                    <h4><span class="label label-info">Not Received</span></h4>
                @elseif($item->shipped == 1)
                    <h4><span class="label label-success">Received</span></h4>
                @endif    
            </td>
            </tr>
                        @endforeach
                
                </tbody>

            </table>

        @else
            <br>
            <h2>Your Order List is Empty.</h2><br><br>
            @endif 
    </div>
    @endif
    </div>
    <br><br><br>
    @include('includes.recommendation');
@endsection

