<script>
        $(document).ready(function(){

            $('#hello{{$product->id}}').click(function(){
                var a = $("#pid{{$product->id}}").val();
                var b = $("#pn{{$product->id}}").val();
                var c = $("#pnp{{$product->id}}").val();
                var d = $("#pqty{{$product->id}}").val();
                
                $.ajax({
                    type: "POST",
                    url:'/cart',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                    data:{'id':a,'name':b,'qty':d,'price':c},

                    success:function(data){

                         toastr.success('Your Cart has been updated.', '');

                        $('#nav-cart').load(location.href + ' #nav-cart');                        
                        
                        $('#grandtotal').load(location.href + ' #grandtotal');


                        
                    }

                });
            });

        });


    </script>