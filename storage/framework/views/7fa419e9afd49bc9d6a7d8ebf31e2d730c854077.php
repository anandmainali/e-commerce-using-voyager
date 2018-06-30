    

    <?php $__env->startSection('class'); ?>
page-product <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>     

          
        <!-- MAIN -->
        <main class="site-main shopping-cart">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="<?php echo e(route('/')); ?>">Home </a></li>
                    <li class="active"><a href="#">Wishlist</a></li>
                </ol>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 align="center">My Wishlist Items</h2>
                        <div class="form-cart">                            
                            <div class="table-cart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="tb-image"></th>
                                            <th class="tb-product">Product Name</th>
                                            <th></th>
                                            <th class="tb-price">Unit Price</th>
                                            <th></th>
                                            <th class="tb-remove">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($wishlists) > 0): ?>
                                        <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>                                            
                                            <td class="tb-image"><a href="<?php echo e(route('shop.show',$product->product->slug)); ?>" class="item-photo"><img src="<?php echo e(productImage($product->product->image)); ?>" alt="cart" style="height: 100px; width: 100px"></a></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="<?php echo e(route('shop.show',$product->product->slug)); ?>"><?php echo e($product->product->name); ?></a></div>
                                            </td>
                                            <td></td>
                                            <td class="tb-price">
                                                <span class="price">Rs.<?php echo e($product->product->new_price); ?></span>
                                            </td>
                                            <td></td>
                                            <td class="tb-remove">
                                                <form action="<?php echo e(route('wishlist.destroy',$product->id)); ?>" method="post">
                                                            <?php echo e(csrf_field()); ?>

                                                            <button type="submit" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
                                                            </form>                                                
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr  align="center">
                                                <td></td>
                                                <td colspan="2"><h2>No items found in your Wishlists.</h2></td>
                                                
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