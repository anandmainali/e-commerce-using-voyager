  

  <?php $__env->startSection('class'); ?>
page-product detail-product <?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
<!-- Facebook Share -->
  <meta property="og:url"           content="<?php echo e(url()->current()); ?>" />
  <meta property="og:type"          content="Shopping" />
  <meta property="og:title"         content="<?php echo e($product->name); ?>" />
  <meta property="og:description"   content="<?php echo e(strip_tags($product->description)); ?>" />
  <meta property="og:image"         content="<?php echo e(productImage($product->image)); ?>" />

<?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>     

   <!-- MAIN -->
        <main class="site-main">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="<?php echo e(route('/')); ?>">Home </a></li>
                    <li class="active"><a href="#">Detail</a></li>
                </ol>
            </div>
            <div class="container">
                <div class="product-content-single">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 padding-right">
                            <div class="product-media">
                                <div class="image-preview-container image-thick-box image_preview_container">
                                    <img id="img_zoom" data-zoom-image="<?php echo e(productImage($product->image)); ?>" src="<?php echo e(productImage($product->image)); ?>" alt="">
                                    <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-preview image-small product_preview">
                                    <div id="thumbnails" class="thumbnails_carousel owl-carousel nav-style4" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":5},"600":{"items":5},"1000":{"items":5}}'>
                                        <?php if($product->images): ?>
                                <?php $__currentLoopData = json_decode($product->images,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" data-image="<?php echo e(productImage($product->image)); ?>" data-zoom-image="<?php echo e(productImage($product->image)); ?>">
                                            <img src="<?php echo e(productImage($product->image)); ?>" data-large-image="<?php echo e(productImage($product->image)); ?>" alt="i1">
                                        </a>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <div class="product-info-main">
                                <div class="product-name"><a href="#"><?php echo e($product->name); ?></a></div>
                                <br>
                                
                                <div class="group-btn-share">
                                    <div class="fb-share-button" data-href="<?php echo e(url()->current()); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="<?php echo e(url()->current()); ?>" class="fb-xfbml-parse-ignore">Share</a></div>
                                </div>
                                <br>
                                <div class="product-description">
                                    <?php echo $product->description; ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="product-info-price">
                                <div class="product-info-stock-sku">
                                    <div class="stock available">
                                        <span class="label-stock">Availability: </span>In Stock
                                    </div>
                                </div>
                                <div class="transportation">
                                    <span>item with Free Delivery</span>
                                </div>
                                <span class="price">
                                    <ins>Rs.<?php echo e($product->new_price); ?></ins>
                                    <?php if($product->old_price): ?>
                                    <del>Rs.<?php echo e($product->old_price); ?></del>
                                    <?php endif; ?>
                                </span>
                                <div class="quantity">
                                    <h6 class="quantity-title">Quantity:</h6>
                                    <div class="buttons-added">
                                        <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="single-add-to-cart">
                                    
                                    <form action="<?php echo e(route('cart.store')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>" />
                                                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>" />    
                                                        <input type="hidden" name="price" value="<?php echo e($product->new_price); ?>" />
                                                        <input type="hidden" name="qty" value="1" />
                                                        <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</button>
                                                    </form>
                                                    <form action="<?php echo e(route('wishlist.store',$product->id)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>" />
                                                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>" />
                                                        <input type="hidden" name="price" value="<?php echo e($product->new_price); ?>" />
                                                        <a href="#" class="wishlist"><button ><i class="fa fa-heart-o" aria-hidden="true"></i> Wishlist</button></a>

                                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
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