<?php $__env->startSection('class'); ?>
index-opt-2 <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>   

<!-- MAIN -->
<main class="site-main">
    <div class="block-slide">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 padding-left-5">

<div id="carousel-header" class="carousel slide" data-ride="carousel" data-interval="3000">      

            <!-- Indicators -->

  <ol class="carousel-indicators">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($loop->first ? ' active' : ''); ?>"></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ol>       
  
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
              

            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item <?php echo e($loop->first ? ' active' : ''); ?>"> 
              <div class="item-img-wrap">
                <img src="<?php echo e(productImage($slider->image)); ?>" alt="" class="img-responsive slider" style="height: 338px; width="880px;">
                </div>                
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     

                </div>
            
            <!-- Controls --> 
                
                <a class="left carousel-control" href="#carousel-header" role="button" data-slide="prev">
                  <span class="fa fa-angle-left fa-lg" aria-hidden="true" style="margin-top: 180px;"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-header" role="button" data-slide="next">
                  <span class="fa fa-angle-right fa-lg" aria-hidden="true" style="margin-top: 180px;"></span>
                  <span class="sr-only">Next</span>
                </a>

            
            </div>
                 
            </div>
                   
        </div>
    </div>
    <div class="block-promotion-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="promotion-banner item-1 style-6">
                        <a href="#" class="banner-img"><img src="frontendImage/home2/banner1.jpg" alt="banner1"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="promotion-banner item-2 style-6">
                        <a href="#" class="banner-img"><img src="frontendImage/home2/banner2.jpg" alt="banner2"></a>
                        <a href="#" class="shop-now style2 hidden-mobile">Shop now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 hidden-sm hidden-xs">
                    <div class="promotion-banner item-3 style-6">
                        <a href="#" class="banner-img"><img src="frontendImage/home2/banner3.jpg" alt="banner3"></a>
                        <a href="#" class="shop-now style2 ">Shop now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-feature-product">
        <div class="container">
            <div class="title-of-section">New Products</div>
            <div class="tab-product tab-product-fade-effect">

                <div class="tab-content">
                    <div class="tab-container">

                        <div id="tab-1" class="tab-panel active">
                            <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="true" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>


                                <?php $__currentLoopData = $latests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <div class="product-item style1">
                                    <div class="product-inner equal-elem">
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="<?php echo e(route('shop.show',$product->slug)); ?>"><img src="<?php echo e(productImage($product->image)); ?>" alt="f3" style="height: 214px; width: 214px;"></a>
                                            </div>
                                            <span class="onnew">New</span>
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
                                                   <div style="float: left;">
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
                </div>
            </div>
        </div>
    </div>


    <div class="block-bestseller-and-deals full-width">
        <div class="container">
            <div class="block-bestseller-product style2">
                <div class="title-of-section">Top Discount Products</div>
                <div class="bestseller-and-deals-content border-background equal-container">


                    <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="product-item style1 col-md-4 col-sm-6 col-xs-6 padding-0">
                        <div class="product-inner equal-elem">
                            <div class="product-thumb">
                                <div class="thumb-inner">
                                    <a href="<?php echo e(route('shop.show',$product->slug)); ?>"><img src="<?php echo e(productImage($product->image)); ?>" alt="b2" style="height: 214px; width: 214px;"></a>
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
            <div class="block-daily-deals style3">
                <div class="title-of-section">Deals Of the week</div>
                <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="true" data-dots="true" data-loop="true" data-margin="10" data-responsive='{"0":{"items":1},"480":{"items":2},"680":{"items":3},"768":{"items":1}}'>


                    <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="product-item style1">
                        <div class="product-inner">
                            <div class="product-thumb">
                                <div class="thumb-inner">
                                    <a href="<?php echo e(route('shop.show',$product->slug)); ?>"><img src="<?php echo e(productImage($product->image)); ?>" alt="d1" style="height: 385px; width: 385px;"></a>
                                </div>
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
                                <?php if($product->discount): ?>
                                <span class="onsale">-<?php echo e($product->discount); ?>%</span>
                                <?php endif; ?>

                            </div>
                            <div class="product-count-down">
                                <div class="title-count-down">Hurry up!<span>Deal ends in:</span></div>
                                <div class="kt-countdown" data-y="2017" data-m="8" data-d="1" data-h="10" data-i="0" data-s="0"></div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </div>
            </div>
        </div>
    </div>

    <div class="block-feature-product">
        <div class="container">
            <div class="title-of-section">Electronics</div>
            <div class="tab-product tab-product-fade-effect">

                <div class="tab-content">
                    <div class="tab-container">

                        <div id="tab-1" class="tab-panel active">
                            <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="true" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>



                                <?php $__currentLoopData = $electronics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                </div>
            </div>
        </div>


        <div class="block-feature-product">
            <div class="container">
                <div class="title-of-section">Groceries</div>
                <div class="tab-product tab-product-fade-effect">

                    <div class="tab-content">
                        <div class="tab-container">

                            <div id="tab-1" class="tab-panel active">
                                <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="true" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>

                                    <?php $__currentLoopData = $groceries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                    </div>
                </div>
            </div>
        </div>

        <div class="block-feature-product">
            <div class="container">
                <div class="title-of-section">Home Appliances</div>
                <div class="tab-product tab-product-fade-effect">

                    <div class="tab-content">
                        <div class="tab-container">

                            <div id="tab-1" class="tab-panel active">
                                <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="true" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":5}}'>

                                    <?php $__currentLoopData = $appliances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                    </div>
                </div>
            </div>
        </div>

        <div class="block-promotion-banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="promotion-banner style-7">
                            <a href="#" class="banner-img"><img src="frontendImage/home2/banner4.jpg" alt="banner4"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="promotion-banner style-7">
                            <a href="#" class="banner-img"><img src="frontendImage/home2/banner5.jpg" alt="banner5"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="block-recent-view">
            <div class="container">
                <div class="title-of-section">Random Products</div>
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