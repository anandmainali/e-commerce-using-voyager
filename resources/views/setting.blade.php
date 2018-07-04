    @extends('layouts.home-master')

    @section('class')
    page-product @endsection

    @section('content')     


    <!-- MAIN -->
    <main class="site-main shopping-cart">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="{{route('/')}}">Home </a></li>
                <li class="active"><a href="#">Setting</a></li>
            </ol>
        </div>
        <div class="col-md-6 col-md-offset-3">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            
                <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>
@endif
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 align="center">Account Information</h2>
                        
                            <div class="col-md-4">                            
                    <img src="{{productImage(Auth::user()->avatar)}}" style="margin-top: 20px" class="img-responsive thumbnail" alt="">                   
                        </div>

                        <div class="col-md-8 col-sm-8">
                    <div class="panel tab-border card-topline-green">
                        <header class="panel-heading panel-heading-gray custom-tab">
                            <ul class="nav nav-tabs">                                        
                                <li class="active">
                                    <a href="#about-2" data-toggle="tab">
                                        <i class="fa fa-edit"></i> Update Profile
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#contact-2" data-toggle="tab">
                                        <i class="fa fa-lock"></i> Update Password
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane " id="home-2">Home</div>
                                <div class="tab-pane active" id="about-2">
                                    <div class="card-body " id="bar-parent">

                                        {!! Form::model(Auth::user(),['method'=>'PATCH','action'=>['UserController@updateUser',Auth::user()->id],'files'=>true])!!}

                                        <div class="form-group">
                                            {!! Form::label('name','Username')!!}
                                            {!! Form::text('name',null,['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('email','Email')!!}
                                            {!! Form::email('email',null,['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('phone','Contact Number')!!}
                                            {!! Form::text('phone',null,['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('address','Address')!!}
                                            {!! Form::text('address',null,['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('avatar','User Image')!!}
                                            {!! Form::file('avatar',['class'=>'form-control'])!!}
                                        </div>                               

                                        <div class="form-group">                        
                                            {!! Form::button('<i class="fa fa-paper-plane"></i>Update',['type'=>'submit','class'=>'btn btn-primary pull-right'])!!}
                                        </div>


                                        {!! Form::close()!!} 
                                    </div>

                                </div>
                                <div class="tab-pane " id="contact-2">
                                    <div class="card-body " id="bar-parent">
                                        {!! Form::open(['method'=>'POST','action'=>['UserController@updatePassword',Auth::user()->id]])!!} 

                                        <div class="form-group">
                                            {!! Form::label('oldPassword','Old Password')!!}
                                            {!! Form::password('oldPassword',['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('newPassword','New Password')!!}
                                            {!! Form::password('newPassword',['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('confirmPassword','Confirm Password')!!}
                                            {!! Form::password('confirmPassword',['class'=>'form-control'])!!}
                                        </div>

                                        <div class="form-group">                        
                                            {!! Form::button('<i class="fa fa-paper-plane"></i>Update',['type'=>'submit','class'=>'btn btn-primary pull-right'])!!}
                                        </div>
                                        
                                        
                                        {!! Form::close()!!} 
                                    </div>
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

                            @foreach(recommendations() as $product)
                            <div class="product-item style1">
                                <div class="product-inner equal-elem">
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}" alt="f3" style="height: 214px; width: 214px;"></a>
                                        </div>
                                        @if($product->discount)
                                        <span class="onsale">-{{$product->discount}}%</span>
                                        @endif
                                        <a href="#" class="quick-view">Quick View</a>
                                    </div>
                                    <div class="product-innfo">
                                        <div class="product-name"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></div>
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

                            @endforeach




                        </div>
                    </div>
                </div>


            </main><!-- end MAIN -->


            @endsection