    

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
                                                        <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
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
            <div class="block-recent-view">
                <div class="container">
                    <div class="title-of-section">You may be also interested</div>
                    <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":6}}'>

                        <?php $__currentLoopData = recommendations(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-item style1">
                                        <div class="product-inner equal-elem">
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="<?php echo e(route('shop.show',$product->slug)); ?>"><img src="<?php echo e(productImage($product->image)); ?>" alt="f3" style="height: 214px; width: 214px;"></a>
                                                </div>
                                                <?php if($product->discount): ?>
                                                <span class="onsale">-<?php echo e($product->discount); ?>%</span>
                                                <?php endif; ?>
                                                <a href="#" class="quick-view">Quick View</a>
                                            </div>
                                            <div class="product-innfo">
                                                <div class="product-name"><a href="<?php echo e(route('shop.show',$product->slug)); ?>"><?php echo e($product->name); ?></a></div>
                                                <span class="price">
                                                    <ins>Rs.<?php echo e($product->new_price); ?></ins>
                                                    <?php if($product->old_price): ?>
                                                    <del>Rs.<?php echo e($product->old_price); ?></del>
                                                    <?php endif; ?>
                                                </span>

                                                <div class="group-btn-hover">
                                                    <div class="inner">
                                                        <div style="float: left;">
                                                        <form action="<?php echo e(route('cart.store')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>" />
                                                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>" />    
                                                        <input type="hidden" name="price" value="<?php echo e($product->new_price); ?>" />
                                                        <input type="hidden" name="qty" value="1" />
                                                        <button type="submit" class="add-to-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                                <div style="float: right;">
                                                    <form action="<?php echo e(route('wishlist.store',$product->id)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>" />
                                                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>" />
                                                        <input type="hidden" name="price" value="<?php echo e($product->new_price); ?>" />
                                                        <button class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></button>

                                                    </form>
                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        
                        
                    </div>
                </div>
            </div>
            
        </main><!-- end MAIN -->


        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>