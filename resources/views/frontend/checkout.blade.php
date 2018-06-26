@extends('layouts.home-master')
@section('content')
    <br><br>
    <!-- breadcrumbs -->
    <ol class="breadcrumb breadcrumb1">
        <li><a href="{{route('/')}}">Home</a></li>
        <li><a href="{{route('cart.index')}}">Shopping Cart</a></li>
        <li class="active">Checkout</li>
    </ol>
    <div class="clearfix"> </div>
    <!-- //breadcrumbs -->
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
    <div class="row">
        <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <!-- <div class="connecting-line"></div> -->
                    <ul class="nav  breadcrumb_checkout" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <h3>Checkout Confirmation</h3>
                            </a>
                        </li>

                    </ul>
                </div>
                <form role="form" action="{{route('checkout.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="step1">

                                <!-- new customer start -->


                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Full Name*</label>
                                        @if(auth::user())
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="{{auth::user()->name}}" readonly>
                                             @else
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required autofocus>
                                        @endif
                                        <label for="email">Email*</label>
                                            @if(auth::user())
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{auth::user()->email}}" readonly>
                                            @else
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        @endif


                                        <label for="phone">Contact No.*</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+977" required>

                                        <label for="address">Shipping Address*</label>
                                        <textarea name="address" rows="4" cols="50" class="form-control" placeholder="1234 XYZ Marga, Maharajgunj, Kathmandu, Nepal"></textarea>
                                    </div>


                            <div class="col-md-6">
                                <h4><strong>Place your order and pay</strong>  </h4><br>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td>{{substr($item->model->name,0,70)}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td> Rs.{{($item->price)*($item->qty)}}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td><strong>Total:</strong></td>
                                        <td></td>
                                        <td>
                                            <strong>Rs.{{Cart::total()}}</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>

                                    <br>
                                    <div class="clearfix"></div>
                                    <ul class="list-inline pull-right">
                                        <li><a href="{{route('cart.index')}}"><button type="button" class="btn btn-danger prev-step btn-theme">Cancel</button></a></li>
                                    {{--    <li><a href="{{route('checkout')}}" type=""><button type="submit" class="btn btn-primary next-step btn-theme">Cash On Delivery</button></a></li>
                                     --}}<li><input type="submit" value="Cash On Delivery" class="btn btn-primary btn-theme"></li>
                                       {{-- <li><button type="button" class="btn btn-success btn-info-full next-step btn-theme">E-Sewa</button></li>
                                   --}} </ul>

                            </div><!-- step 1 end div tag -->

                        </div>

                       {{-- <div class="tab-pane" role="tabpanel" id="complete">
                            <div class="step44">
                                <h5>Completed</h5>
                            </div>
                        </div>--}}
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

    <br><br>
    @endsection
