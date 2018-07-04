<script>
        jQuery(document).ready(function(){

            $('.rmv{{$product->id}}').on("click",function(){
                
               var a = $("#row{{$product->id}}").val();
                
                $.ajax({
                    cache: false,
                    url: '{{URL::to('/cart/remove')}}',
                    
                    data: {'id':a},
                    type: "get",
                    

                    success:function(){
                        toastr.success('Your Cart has been updated.', '');

                        $('#nav-cart').load(location.href + ' #nav-cart');                        
                        $('#grandtotal').load(location.href + ' #grandtotal');
                         
                        $('#carttable{{$product->id}}').load(location.href + ' #carttable{{$product->id}}');
                    }

                });
            });

        });


    </script>