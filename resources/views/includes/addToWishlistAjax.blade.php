<script>
        $(document).ready(function(){

            $('#wishlist{{$product->id}}').click(function(){
                var a = $("#wid{{$product->id}}").val();
                
            
                
                $.ajax({
                    type: "POST",
                    url:'/wishlist',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                    data:{'id':a},

                    success:function(data){
                        $('#wishlistcount').load(location.href + ' #wishlistcount');
                         toastr.success('Your Wishlist has been updated.', '');   
                    }

                });
            });

        });


    </script>