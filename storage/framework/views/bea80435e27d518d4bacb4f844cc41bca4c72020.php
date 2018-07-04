    

    <?php $__env->startSection('class'); ?>
    page-product <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>     


    <!-- MAIN -->
    <main class="site-main shopping-cart">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="<?php echo e(route('/')); ?>">Home </a></li>
                <li class="active"><a href="#">Setting</a></li>
            </ol>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <li><?php echo e($error); ?></li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 align="center">Account Information</h2>
                        
                            <div class="col-md-4">                            
                    <img src="<?php echo e(productImage(Auth::user()->avatar)); ?>" style="margin-top: 20px" class="img-responsive thumbnail" alt="">                   
                        </div>

                        <div class="col-md-8 col-sm-8">
                    <div class="panel tab-border card-topline-green">
                        <header class="panel-heading panel-heading-gray custom-tab">
                            <ul class="nav nav-tabs">                                        
                                <li class="active">
                                    <a href="#about-2" data-toggle="tab">
                                        <i class="fa fa-edit"></i> Update Profile
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#contact-2" data-toggle="tab">
                                        <i class="fa fa-lock"></i> Update Password
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane " id="home-2">Home</div>
                                <div class="tab-pane active" id="about-2">
                                    <div class="card-body " id="bar-parent">

                                        <?php echo Form::model(Auth::user(),['method'=>'PATCH','action'=>['UserController@updateUser',Auth::user()->id],'files'=>true]); ?>


                                        <div class="form-group">
                                            <?php echo Form::label('name','Username'); ?>

                                            <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                                        </div>

                                        <div class="form-group">
                                            <?php echo Form::label('email','Email'); ?>

                                            <?php echo Form::email('email',null,['class'=>'form-control']); ?>

                                        </div>

                                        <div class="form-group">
                                            <?php echo Form::label('phone','Contact Number'); ?>

                                            <?php echo Form::text('phone',null,['class'=>'form-control']); ?>

                                        </div>

                                        <div class="form-group">
                                            <?php echo Form::label('address','Address'); ?>

                                            <?php echo Form::text('address',null,['class'=>'form-control']); ?>

                                        </div>

                                        <div class="form-group">
                                            <?php echo Form::label('avatar','User Image'); ?>

                                            <?php echo Form::file('avatar',['class'=>'form-control']); ?>

                                        </div>                               

                                        <div class="form-group">                        
                                            <?php echo Form::button('<i class="fa fa-paper-plane"></i>Update',['type'=>'submit','class'=>'btn btn-primary pull-right']); ?>

                                        </div>


                                        <?php echo Form::close(); ?> 
                                    </div>

                                </div>
                                <div class="tab-pane " id="contact-2">
                                    <div class="card-body " id="bar-parent">
                                        <?php echo Form::open(['method'=>'POST','action'=>['UserController@updatePassword',Auth::user()->id]]); ?> 

                                        <div class="form-group">
                                            <?php echo Form::label('oldPassword','Old Password'); ?>

                                            <?php echo Form::password('oldPassword',['class'=>'form-control']); ?>

                                        </div>

                                        <div class="form-group">
                                            <?php echo Form::label('newPassword','New Password'); ?>

                                            <?php echo Form::password('newPassword',['class'=>'form-control']); ?>

                                        </div>

                                        <div class="form-group">
                                            <?php echo Form::label('confirmPassword','Confirm Password'); ?>

                                            <?php echo Form::password('confirmPassword',['class'=>'form-control']); ?>

                                        </div>

                                        <div class="form-group">                        
                                            <?php echo Form::button('<i class="fa fa-paper-plane"></i>Update',['type'=>'submit','class'=>'btn btn-primary pull-right']); ?>

                                        </div>
                                        
                                        
                                        <?php echo Form::close(); ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
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