    

    <?php $__env->startSection('class'); ?>
page-product <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>     

          
        <!-- MAIN -->
        <main class="site-main shopping-cart">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="<?php echo e(route('/')); ?>">Home </a></li>
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
                                        <?php if(count(Cart::content()) > 0): ?>
                                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>                                            
                                            <td class="tb-image"><a href="<?php echo e(route('shop.show',$product->model->slug)); ?>" class="item-photo"><img src="<?php echo e(productImage($product->model->image)); ?>" alt="cart" style="height: 100px; width: 100px"></a></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="<?php echo e(route('shop.show',$product->model->slug)); ?>"><?php echo e($product->name); ?></a></div>
                                            </td>
                                            <td class="tb-price">
                                                <span class="price">Rs.<?php echo e($product->price); ?></span>
                                            </td>
                                            <td class="text-center tb-qty">
                                                <div class="quantity">
                                                    <div class="buttons-added">
                                        <p class="qtypara">
                                            <input type="hidden" value="<?php echo e($product->rowId); ?>" id="hidden<?php echo e($product->id); ?>">                       
                                            <input type="number" min="1" value="<?php echo e($product->qty); ?>" class="form-control  qty<?php echo e($product->id); ?>" >
                                        </p>
                                        </div>
                                                </div>
                                    </td>
                                           
                                            <td class="tb-total">
                                                <span class="price" id="price<?php echo e($product->id); ?>">Rs.<?php echo e(($product->price)*($product->qty)); ?></span>
                                            </td>
                                            <td class="tb-remove">
                                                
                                                    <input type="hidden" name="rowId" value="<?php echo e($product->rowId); ?>" id="row<?php echo e($product->id); ?>">
                                                    <button type="button" id="rmv<?php echo e($product->id); ?>" class="action-remove rmv<?php echo e($product->id); ?>"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
                                                    
                                               
                                                                                               
                                            </td>
                                        </tr>
                                        <script type="text/javascript">
    $(document).ready(function(){
        $(".qty<?php echo e($product->id); ?>").on('change keyup', function(){
            var a =   $(".qty<?php echo e($product->id); ?>").val();
            var b =   $("#hidden<?php echo e($product->id); ?>").val();
            $.ajax({
                url : '<?php echo e(URL::to('cart-update')); ?>',
                data: {'id': b,'qty':a},
                type : 'get',
                success : function(datas){
                    $('#price<?php echo e($product->id); ?>').load(location.href + ' #price<?php echo e($product->id); ?>');
                    $('#grandtotal').load(location.href + ' #grandtotal');

                   toastr.success('Your Cart has been updated.', '');

              }
          });
        });
    });
</script>

<?php echo $__env->make('includes.removeFromCartAjax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr  align="center">
                                                <td></td>
                                                <td colspan="2"><h2>No items found in your cart.</h2></td>
                                                
                                                <td></td>
                                            </tr>
                                        <?php endif; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="cart-actions">
                                
                                <button class="btn-continue">
                                    <span><a href="<?php echo e(route('/')); ?>">Continue Shopping</a></span>
                                </button>
                               
                                
                                <button class="btn-update">
                                    <span><a href="<?php echo e(route('cart.destroy')); ?>">Clear Shopping Cart</a></span>
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3 padding-left-5">
                        <div class="order-summary">
                            <h4 class="title-shopping-cart">Order Summary</h4>
                            <div class="checkout-element-content" id="grandtotal">
                                <span class="order-left">Subtotal:<span>Rs.<?php echo e(Cart::total()); ?>.00</span></span>
                                <span class="order-left">Shipping:<span>Free Shipping</span></span>
                                <span class="order-left">Total:<span>
                                    Rs.<?php echo e(Cart::total()); ?>.00
                                
                                </span></span>
                                
                                <a href="<?php echo e(route('checkout.index')); ?>" title=""><button type="submit" class="btn-checkout" >
                                    <span>Check Out</span>
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

          

            
        </main><!-- end MAIN -->


        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>