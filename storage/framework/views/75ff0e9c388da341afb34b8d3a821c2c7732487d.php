    

    <?php $__env->startSection('class'); ?>
page-product <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>     

        <!-- MAIN -->
        <main class="site-main checkout">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="<?php echo e(route('/')); ?>">Home </a></li>
                    <li class="active"><a href="#">checkout</a></li>
                </ol>
            </div>
            <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
            <div class="container">
                <form action="<?php echo e(route('checkout.store')); ?>" class="checkout" method="post" name="checkout">
                    <?php echo e(csrf_field()); ?>

                    <h4 class="title-checkout">Biiling Address</h4>
                    <div class="row col-md-4">
                        <div class="form-group">   
                            <label class="title">Full Name*</label> 
                            <input type="text" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label class="title">Email Address:</label>
                            <input type="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" name="email" readonly>
                        </div>
                        <div class="form-group">
                            <label class="title">Phone number*</label>
                            <input type="text" name="phone" <?php if(Auth::user()->phone): ?> value="<?php echo e(Auth::user()->phone); ?>" <?php endif; ?> class="form-control" placeholder="Type your Contact Number">
                        </div>
                        <div class="form-group">
                            <label class="title">Address:</label>
                            <input type="text" name="address" <?php if(Auth::user()->address): ?> value="<?php echo e(Auth::user()->address); ?>" <?php endif; ?> class="form-control" placeholder="Street and house number">
                        </div>
                        
                        
                    </div>

                        <div class="form-group payment col-md-6 col-md-offset-2">
                            <h4 class="title-checkout">Place your order and pay</h4>
                            <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th> 
                                        <th></th> 
                                        <th>Quantity</th>
                                        <th></th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(substr($item->model->name,0,70)); ?></td>
                                            <td></td>
                                            <td><?php echo e($item->qty); ?></td>
                                            <td></td>
                                            <td> Rs.<?php echo e(($item->price)*($item->qty)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    </tbody>
                                </table>
                            <span class="grand-total">Grand Total<span>Rs.<?php echo e(Cart::total()); ?>.00</span></span>
                            <button type="submit" class="btn-order">Place Order Now</button>
                        </div>
                </form>
            </div>
        </main><!-- end MAIN -->


       <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>