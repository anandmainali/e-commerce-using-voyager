    @extends('layouts.home-master')

    @section('class')
page-product @endsection

    @section('content')     

        <!-- MAIN -->
        <main class="site-main checkout">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="{{route('/')}}">Home </a></li>
                    <li class="active"><a href="#">checkout</a></li>
                </ol>
            </div>
            @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div class="container">
                <form action="{{route('checkout.store')}}" class="checkout" method="post" name="checkout">
                    {{csrf_field()}}
                    <h4 class="title-checkout">Biiling Address</h4>
                    <div class="row col-md-4">
                        <div class="form-group">   
                            <label class="title">Full Name*</label> 
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label class="title">Email Address:</label>
                            <input type="email" value="{{Auth::user()->email}}" class="form-control" name="email" readonly>
                        </div>
                        <div class="form-group">
                            <label class="title">Phone number*</label>
                            <input type="text" name="phone" @if(Auth::user()->phone) value="{{ Auth::user()->phone }}" @endif class="form-control" placeholder="Type your Contact Number">
                        </div>
                        <div class="form-group">
                            <label class="title">Address:</label>
                            <input type="text" name="address" @if(Auth::user()->address) value="{{ Auth::user()->address }}" @endif class="form-control" placeholder="Street and house number">
                        </div>
                        
                        
                    </div>

                        <div class="form-group payment col-md-6 col-md-offset-2">
                            <h4 class="title-checkout">Place your order and pay</h4>
                            <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th> 
                                        <th></th> 
                                        <th>Quantity</th>
                                        <th></th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td>{{substr($item->model->name,0,70)}}</td>
                                            <td></td>
                                            <td>{{$item->qty}}</td>
                                            <td></td>
                                            <td> Rs.{{($item->price)*($item->qty)}}</td>
                                        </tr>
                                    @endforeach

                                    
                                    </tbody>
                                </table>
                            <span class="grand-total">Grand Total<span>Rs.{{Cart::total()}}.00</span></span>
                            <button type="submit" class="btn-order">Place Order Now</button>
                        </div>
                </form>
            </div>
        </main><!-- end MAIN -->


       @endsection