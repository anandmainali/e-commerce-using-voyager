    

    <?php $__env->startSection('class'); ?>
    page-product <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>     


    <!-- MAIN -->
    <main class="site-main shopping-cart">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="<?php echo e(route('/')); ?>">Home </a></li>
                <li class="active"><a href="#">Orders</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 align="center">My Order Items</h2>
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($orderItems) > 0): ?>
                                    <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>                                            
                                        <td class="tb-image"><a href="<?php echo e(route('shop.show',$product->slug)); ?>" class="item-photo"><img src="<?php echo e(productImage($product->image)); ?>" alt="cart" style="height: 100px; width: 100px"></a></td>
                                        <td class="tb-product">
                                            <div class="product-name"><a href="<?php echo e(route('shop.show',$product->slug)); ?>"><?php echo e($product->name); ?></a></div>
                                        </td>

                                        <td class="tb-price">
                                            <span class="price">Rs.<?php echo e($product->new_price); ?></span>
                                        </td>
                                        <td class="tb-qty">
                                                 <span class="price"><?php echo e($product->quantity); ?></span>
                                            </td>
                                            <td class="tb-total">
                                                <span class="price">Rs.<?php echo e(($product->new_price)*($product->quantity)); ?></span>
                                            </td>
                                        
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr  align="center">
                                        <td></td>
                                        <td colspan="2"><h2>No Orders Found.</h2></td>

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

                                <a href="<?php echo e(route('cart.index')); ?>">
                                    <button type="submit" class="btn-update" >
                                        <span>View Cart</span>
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