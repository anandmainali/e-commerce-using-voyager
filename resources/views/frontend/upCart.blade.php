  <script>
        $(document).ready(function () {
            <?php for ($i=1;$i<30;$i++){?>
            $('#upCart<?php echo $i; ?>').on('change keyup',function () {
                var newqty = $('#upCart<?php echo $i; ?>').val();
                var rowId = $('#rowId<?php echo $i; ?>').val();
                var proId = $('#proId<?php echo $i; ?>').val();

            if(newqty <=0){
                alert('Enter a positive number.');
            }else{
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/');?>/cart/update/'+proId,
                    data: "qty="+newqty+"& rowId="+rowId+"& proId="+proId,
                    success:function (response) {
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });
                
            }
            });
           <?php } ?>
        });
    </script>
    
    
    
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

    @if(Cart::count() > 0)
    <h2>{{Cart::count()}} Item(s) in Shopping Cart</h2><br>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
            <?php $count =1 ?>
        @foreach(Cart::content() as $item)
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 hidden-xs"><a href="{{route('shop.show',$item->model->slug)}}"><img src="{{productImage($item->model->image)}}" alt="..." class="img-responsive"/></a></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin"><a href="{{route('shop.show',$item->model->slug)}}">{{$item->model->name}}</a></h4>
                        <p>{{$item->model->details}}</p>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rs.{{$item->price}}</td>
                <td data-th="Quantity">
                <input type="hidden" id="rowId<?php echo $count; ?>" value="{{$item->rowId}}">
                <input type="hidden" id="proId<?php echo $count; ?>" value="{{$item->id}}">
                <input class="form-control" type="number" value="{{$item->qty}}" name="qty" id="upCart<?php echo $count; ?>" autocomplete="off" style="text-align: center;max-width: 50px;" min="1" max="30">
            </td>
            <td data-th="Subtotal" class="text-center">Rs.{{($item->price)*($item->qty)}}</td>
            <td class="actions" data-th="">
                @if(Auth()->user())
                <form action="{{route('cart.switchToSaveForLater',$item->rowId)}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                </form>
                @endif

                <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </form>

            </td>
        </tr>
        <?php $count++ ?>
            @endforeach

        </tbody>

        <tfoot>

        <tr class="visible-xs">
            <td class="text-center"><strong>Total Rs.{{Cart::total()}}</strong></td>
        </tr>
        <tr>
            <td><a href="{{route('shop.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rs.{{Cart::total()}}</strong></td>
            <td><a href="{{route('checkout.index')}}" class="btn btn-success btn-block">Proceed To Checkout <i class="fa fa-angle-right"></i></a></td>
        </tr>
        </tfoot>
    </table>

        @else
        <br>
    <h2>No items in Cart.</h2><br><br>
        <a href="{{route('shop.index')}}" class="btn btn-success pull-right">Continue Shopping <i class="fa fa-angle-right"></i></a>
        @endif