    

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
                    <form method="post" enctype="multipart/form-data">
                    <div class="col-md-9">
                        <div class="form-cart">
                            <div class="table-cart">
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
                                            

                                           
                                            <td class="tb-qty">
                                                <div class="quantity">
                                                    <div class="buttons-added">
                                                        <input type="text" value="1" name="qty" title="Qty" class="input-text qty text" size="1">
                                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tb-total">
                                                <span class="price">Rs.<?php echo e(($product->price)*($product->qty)); ?></span>
                                            </td>
                                            <td class="tb-remove">
                                                <form action="<?php echo e(route('cart.remove',$product->rowId)); ?>" method="post">
                                                            <?php echo e(csrf_field()); ?>

                                                            <button type="submit" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
                                                            </form>                                                
                                            </td>
                                        </tr>

  
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
                                <a href="<?php echo e(route('/')); ?>">
                                <button type="submit" class="btn-continue">
                                    <span>Continue Shopping</span>
                                </button></a>
                                <button type="submit" class="btn-clean" >
                                    <span>Update Shopping Cart</span>
                                </button>
                                <a href="<?php echo e(route('cart.destroy')); ?>">
                                <button type="submit" class="btn-update" >
                                    <span>Clear Shopping Cart</span>
                                </button></a>
                            </div>
                        </div>
                    </div>
                </form>
                    <div class="col-md-3 padding-left-5">
                        <div class="order-summary">
                            <h4 class="title-shopping-cart">Order Summary</h4>
                            <div class="checkout-element-content">
                                <span class="order-left">Subtotal:<span>Rs.<?php echo e(Cart::total()); ?>.00</span></span>
                                <span class="order-left">Shipping:<span>Free Shipping</span></span>
                                <span class="order-left">Total:<span>Rs.<?php echo e(Cart::total()); ?>.00</span></span>
                                
                                <a href="<?php echo e(route('checkout.index')); ?>" title=""><button type="submit" class="btn-checkout" >
                                    <span>Check Out</span>
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <?php echo $__env->make('includes.recommendation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            
        </main><!-- end MAIN -->


        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>