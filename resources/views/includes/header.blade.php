<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::render() !!}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style type="text/css" media="screen">
       .dropdown-margin{
        margin-bottom: -240px !important;
    }
    </style>

    <!-- Facebook Messenger  -->
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115862185-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115862185-1');
</script>

<style>.fb-livechat,.fb-widget{display:none}.ctrlq.fb-button,.ctrlq.fb-close{position:fixed;right:24px;cursor:pointer}.ctrlq.fb-button{z-index:1;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;width:60px;height:60px;text-align:center;bottom:24px;border:0;outline:0;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;-ms-border-radius:60px;-o-border-radius:60px;box-shadow:0 1px 6px rgba(0,0,0,.06),0 2px 32px rgba(0,0,0,.16);-webkit-transition:box-shadow .2s ease;background-size:80%;transition:all .2s ease-in-out}.ctrlq.fb-button:focus,.ctrlq.fb-button:hover{transform:scale(1.1);box-shadow:0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)}.fb-widget{background:#fff;z-index:2;position:fixed;width:360px;height:435px;overflow:hidden;opacity:0;bottom:0;right:24px;border-radius:6px;-o-border-radius:6px;-webkit-border-radius:6px;box-shadow:0 5px 40px rgba(0,0,0,.16);-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16);-moz-box-shadow:0 5px 40px rgba(0,0,0,.16);-o-box-shadow:0 5px 40px rgba(0,0,0,.16)}.fb-credit{text-align:center;margin-top:8px}.fb-credit a{transition:none;color:#bec2c9;font-family:Helvetica,Arial,sans-serif;font-size:12px;text-decoration:none;border:0;font-weight:400}.ctrlq.fb-overlay{z-index:0;position:fixed;height:100vh;width:100vw;-webkit-transition:opacity .4s,visibility .4s;transition:opacity .4s,visibility .4s;top:0;left:0;background:rgba(0,0,0,.05);display:none}.ctrlq.fb-close{z-index:4;padding:0 6px;background:#365899;font-weight:700;font-size:11px;color:#fff;margin:8px;border-radius:3px}.ctrlq.fb-close::after{content:'x';font-family:sans-serif}</style>

<div class="fb-livechat">
<div class="ctrlq fb-overlay"></div>
<div class="fb-widget">
<div class="ctrlq fb-close"></div>
<div class="fb-page" data-href="https://www.facebook.com/helpmedotcom.np/" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false">
<blockquote cite="https://www.facebook.com/helpmedotcom.np/" class="fb-xfbml-parse-ignore"> </blockquote>
</div>
<div class="fb-credit">
<a href="https://www.facebook.com/sanuthakuri2013" target="_blank">Facebook LIVE Chat Design BY Sanu Babu Malla   </a>
</div>
<div id="fb-root"></div>
</div>
<a href="https://www.facebook.com/helpmedotcom.np/" title="Send us a message on Facebook" class="ctrlq fb-button"></a>
</div>

<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>$(document).ready(function(){var t={delay:125,overlay:$(".fb-overlay"),widget:$(".fb-widget"),button:$(".fb-button")};setTimeout(function(){$("div.fb-livechat").fadeIn()},8*t.delay),$(".ctrlq").on("click",function(e){e.preventDefault(),t.overlay.is(":visible")?(t.overlay.fadeOut(t.delay),t.widget.stop().animate({bottom:0,opacity:0},2*t.delay,function(){$(this).hide("slow"),t.button.show()})):

t.button.fadeOut("medium",function(){t.widget.stop().show().animate({bottom:"30px",opacity:1},2*t.delay),t.overlay.fadeIn(t.delay)})})});</script>


    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>



        <!-- Facebook messenger end -->

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
<body class="@yield('class')" id="body">
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
          <a href="{{route('wishlist.index')}}"  id="wishlistcount">&emsp;<i class="fa fa-heart-o" aria-hidden="true"></i> My Wishlists <span class="label label-primary"> {{count($wishlists)}}</span></a><br>
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
                            <div class="block-minicart dropdown" id="nav-cart">
                                
                                <a class="minicart" href="{{url('cart')}}">
                                    <span class="counter qty" >
                                        <span class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                                        <span class="counter-number">{{count(Cart::content())}}</span>
                                    </span>
                                    <span class="counter-your-cart">
                                        <span class="counter-label">Your Cart:</span>
                                        <span class="counter-price" >Rs.{{Cart::total()}}</span>
                                    </span>
                                </a>
                                <div class="parent-megamenu" >
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

                                                            <a href="{{ route('cart.index')}}" class="remove"><i class="fa fa-times" aria-hidden="true"></i></a> 
                                                            
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