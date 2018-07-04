    @extends('layouts.home-master')

    @section('class')
page-product @endsection

    @section('content')     

          
        <!-- MAIN -->
        <main class="site-main shopping-cart">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="{{route('/')}}">Home </a></li>
                    <li class="active"><a href="#">Shopping Cart</a></li>
                </ol>
            </div>
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-9">
                        <div class="form-cart">

                            <div class="table-cart" >
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="tb-image"></th>
                                            <th class="tb-product">Product Name</th>
                                            <th class="tb-price">Unit Price</th>
                                            <th class="tb-qty">Qty</th>
                                            <th class="tb-total">SubTotal</th>
                                            <th class="tb-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count(Cart::content()) > 0)
                                        @foreach(Cart::content() as $product)
                                        <tr id="carttable{{$product->id}}">                                            
                                            <td class="tb-image"><a href="{{route('shop.show',$product->model->slug)}}" class="item-photo"><img src="{{productImage($product->model->image)}}" alt="cart" style="height: 100px; width: 100px"></a></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="{{route('shop.show',$product->model->slug)}}">{{$product->name}}</a></div>
                                            </td>
                                            <td class="tb-price">
                                                <span class="price">Rs.{{$product->price}}</span>
                                            </td>
                                            <td class="text-center tb-qty">
                                                <div class="quantity">
                                                    <div class="buttons-added">
                                        <p class="qtypara">
                                            <input type="hidden" value="{{$product->rowId}}" id="hidden{{$product->id}}">                       
                                            <input type="number" min="1" value="{{$product->qty}}" class="form-control  qty{{$product->id}}" >
                                        </p>
                                        </div>
                                                </div>
                                    </td>
                                           
                                            <td class="tb-total">
                                                <span class="price" id="price{{$product->id}}">Rs.{{($product->price)*($product->qty)}}</span>
                                            </td>
                                            <td class="tb-remove">
                                                
                                                    <input type="hidden" name="rowId" value="{{$product->rowId}}" id="row{{$product->id}}">
                                                    <button type="button" id="rmv{{$product->id}}" class="action-remove rmv{{$product->id}}"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
                                                    
                                               
                                                                                               
                                            </td>
                                        </tr>
                                        <script type="text/javascript">
    $(document).ready(function(){
        $(".qty{{$product->id}}").on('change keyup', function(){
            var a =   $(".qty{{$product->id}}").val();
            var b =   $("#hidden{{$product->id}}").val();
            $.ajax({
                url : '{{URL::to('cart-update')}}',
                data: {'id': b,'qty':a},
                type : 'get',
                success : function(datas){
                    $('#price{{$product->id}}').load(location.href + ' #price{{$product->id}}');
                    $('#grandtotal').load(location.href + ' #grandtotal');

                   toastr.success('Your Cart has been updated.', '');

              }
          });
        });
    });
</script>

@include('includes.removeFromCartAjax')
  
                                        @endforeach
                                        @else
                                            <tr  align="center">
                                                <td></td>
                                                <td colspan="2"><h2>No items found in your cart.</h2></td>
                                                
                                                <td></td>
                                            </tr>
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="cart-actions">
                                
                                <button class="btn-continue">
                                    <span><a href="{{route('/')}}">Continue Shopping</a></span>
                                </button>
                               
                                
                                <button class="btn-update">
                                    <span><a href="{{route('cart.destroy')}}">Clear Shopping Cart</a></span>
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3 padding-left-5">
                        <div class="order-summary">
                            <h4 class="title-shopping-cart">Order Summary</h4>
                            <div class="checkout-element-content" id="grandtotal">
                                <span class="order-left">Subtotal:<span>Rs.{{Cart::total()}}.00</span></span>
                                <span class="order-left">Shipping:<span>Free Shipping</span></span>
                                <span class="order-left">Total:<span>
                                    Rs.{{Cart::total()}}.00
                                
                                </span></span>
                                
                                <a href="{{route('checkout.index')}}" title=""><button type="submit" class="btn-checkout" >
                                    <span>Check Out</span>
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

          {{--   @include('includes.recommendation') --}}

            
        </main><!-- end MAIN -->


        @endsection