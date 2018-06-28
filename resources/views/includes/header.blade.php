<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    @yield('meta')
    <title>{{setting('site.title')}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-dropdownhover.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.bxslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link href="../../../../fonts.googleapis.com/css2277.css?family=Open+Sans:300,400,600,600i,700,700i" rel="stylesheet">
    <link href="../../../../fonts.googleapis.com/css1b12.css?family=Roboto:300,400,400i,500,500i,700" rel="stylesheet">
    <style type="text/css" media="screen">
       .dropdown-margin{
        margin-bottom: -240px !important;
    }
    </style>

    <!-- Facebook Share SDK -->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=206746959940681&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body class="@yield('class')">
    <div class="wrapper">
        <form id="block-search-mobile" method="get" class="block-search-mobile">
            <div class="form-content">
                <div class="control">
                    <a href="#" class="close-block-serach"><span class="icon fa fa-times"></span></a>
                    <form action="{{route('search')}}" method="get">
          <input type="search" name="query" id="query" value="{{request()->input('query')}}" placeholder="Search for a Product..." required="" class="input-subscribe">
          <button type="submit" class="btn btn-default search" aria-label="Left Align">
            <span><i class="fa fa-search" aria-hidden="true"></i></span>
          </button>
        </form>
                    
                </div>
            </div>
        </form>
        <div id="block-quick-view-popup" class="block-quick-view-popup">
            <div class="quick-view-content">
                <a class="popup-btn-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                <div class="slide-quick">
                    <div class="product-thumbs">
                        <a href="#" class="img-product-thumb"><img src="frontendImage/s-pop1.jpg" alt="p1"></a>
                        <a href="#" class="img-product-thumb"><img src="frontendImage/s-pop2.jpg" alt="p1"></a>
                        <a href="#" class="img-product-thumb"><img src="frontendImage/s-pop3.jpg" alt="p1"></a>
                        <a href="#" class="img-product-thumb"><img src="frontendImage/s-pop4.jpg" alt="p1"></a>
                    </div>
                </div>
                <div class="product-items">
                    <div class="product-image">
                        <a href="#"><img src="frontendImage/popup-pro.jpg" alt="p1"></a>
                    </div>
                    <div class="product-info">
                        <div class="product-name"><a href="#">Acer's Aspire S7 is a thin and portable laptop</a></div>
                        
                        <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>Add to Wishlist</a>
                        <div class="product-infomation">
                            Description Our new HPB12 / A12 battery is rated at 2000mAh and designed to power up Black and Decker FireStorm line of 12V tools allowing...
                        </div>
                    </div>
                    <div class="product-info-price">
                        <span class="price">
                            <ins>$229.00</ins>
                            <del>$259.00</del>
                        </span>
                        <div class="quantity">
                            <h6 class="quantity-title">Quantity:</h6>
                            <div class="buttons-added">
                                <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <a href="#" class="btn-add-to-cart">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- HEADER -->
        <header class="site-header header-opt-1">
            <!-- header-top -->
            <div class="header-top">
                <div class="container">
                    <!-- hotline -->
                    <ul class="nav-top-left" >
                        <li><a href="https://www.facebook.com/profile.php?id=100004046676332"><b>Developed By:- Anand Kumar Mainali</b></a></li>
                    </ul><!-- hotline -->
                    <!-- heder links -->
                    <ul class="nav-top-right krystal-nav">
                       
                        <li><i class="fa fa-shopping-cart" aria-hidden="true"></i> <a href="{{route('sellUs.index')}}">Sell Us</a></li>
                        @if(auth()->user())
                        
                        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user" aria-hidden="true"></i> Hello, {{auth()->user()->name}} <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a href="{{route('wishlist.index')}}">&emsp;<i class="fa fa-heart-o" aria-hidden="true"></i> My Wishlists <span class="label label-primary"> {{count($wishlists)}}</span></a><br>
          <a href="{{route('wishlist.order')}}">&emsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders </a><br>
          <div class="dropdown-divider"></div>
           <a href="{{route('setting')}}">&emsp;<i class="fa fa-cog" aria-hidden="true"></i> Setting</a><br>
          <a href="{{route('logout')}}">&emsp;<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </div>
      </li> 
                                  
                        @else

                        <li><i class="fa fa-user" aria-hidden="true"></i> <a href="{{route('register')}}">Register</a></li>
                        <li><i class="fa fa-sign-in" aria-hidden="true"></i><a href="{{route('login')}}"> Sign In</a></li>
                        @endif


                        </ul><!-- heder links -->
                </div>
            </div> <!-- header-top -->
            <!-- header-content -->
            <div class="header-content">
                <div class="container navbar-color">
                    <div class="row">
                        <div class="col-md-2 nav-left">
                            <!-- logo -->
                            <strong class="logo">
                                <a href="{{route('/')}}"><img src="{{productImage(setting('site.logo'))}}" height="100px" alt="logo"></a>
                            </strong><!-- logo -->
                        </div>
                        <div class="col-md-8 nav-mind">
                            <!-- block search -->
                            <div class="block-search">
                                <div class="block-content">
                                    <div class="categori-search">
                                        <b>&emsp;All Categories</b> &emsp;&emsp;
                                    </div>
                                    <div class="form-search">
                                        <form action="{{route('search')}}" method="get">
                                            <div class="box-group">
          <input type="search" name="query" id="query" value="{{request()->input('query')}}" placeholder="Searh entire store here..." required="" class="form-control">
          <button type="submit" class="btn btn-search">
            <span>search</span>
          </button>
          </div>
        </form>
                                        
                                    </div>
                                </div>
                            </div><!-- block search -->
                        </div>
                        <div class="col-md-2 nav-right">
                            <!-- block mini cart -->
                            <div class="block-minicart dropdown">
                                
                                <a class="minicart" href="#">
                                    <span class="counter qty">
                                        <span class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                                        <span class="counter-number">{{count(Cart::content())}}</span>
                                    </span>
                                    <span class="counter-your-cart">
                                        <span class="counter-label">Your Cart:</span>
                                        <span class="counter-price">Rs.{{Cart::total()}}</span>
                                    </span>
                                </a>
                                <div class="parent-megamenu">
                                    @if(count(Cart::content()) > 0)
                                        <div class="minicart-content-wrapper" >
                                            <div class="subtitle">
                                                You have <span>{{count(Cart::content())}}</span> item(s) in your cart
                                            </div>
                                            <div class="minicart-items-wrapper">
                                                <ol class="minicart-items">
                                                    @foreach(Cart::content() as $product)
                                                    <li class="product-inner">
                                                        <div class="product-thumb style1">
                                                            <div class="thumb-inner">
                                                                <a href="{{route('shop.show',$product->model->slug)}}"><img src="{{productImage($product->model->image)}}" alt="c1" style="height: 40px; width: 40px;"></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-innfo">
                                                            <div class="product-name"><a href="{{route('shop.show',$product->model->slug)}}"><small>{{$product->name}}</small></a></div>
                                                            <form action="{{ route('cart.remove',$product->rowId) }}" method="post">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="remove"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                            </form> 
                                                            <span class="price price-dark">
                                                                <ins>Rs.{{$product->price}}</ins>
                                                            </span>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                            <div class="subtotal">
                                                <span class="label">Total :</span>
                                                <span class="price">Rs.{{Cart::total()}}</span>
                                            </div>

                                            <div class="actions">
                                                                                         
                                                <div class="row">
                                                    <a class="btn btn-viewcart" href="{{url('cart')}}">View cart</a>
                                                
                                                
                                                    <a class="btn btn-checkout" href="{{route('checkout.index')}}">Checkout</a>
                                                </div>
                                                
                                               
                                            </div>
                                        </div>
                                        @else
                                            <h4>No products in the cart.</h4>
                                        @endif
                                    
                                </div>
                            </div><!-- block mini cart -->
                            <a href="#" class="hidden-md search-hidden"><span class="pe-7s-search"></span></a>
                            
                        </div>
                    </div>
                </div>
            </div><!-- header-content -->