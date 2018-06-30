<!-- FOOTER -->
        <footer class="site-footer footer-opt-2">
                <div class="footer-top full-width">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="newsletter-title">
                                    <h3 class="h3-newsletter">Sign up to Newsletter</h3>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="newsletter-form">
                                    <form id="newsletter-validate-detail" class="form subscribe">
                                        <div class="control">
                                            <input type="email" placeholder="Enter your email address" id="newsletter" name="email" class="input-subscribe">
                                            <button type="submit" title="Subscribe" class="btn subscribe">
                                                <span>Sign Up</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-column equal-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 equal-elem">
                                <h3 class="title-of-section">About Us</h3>
                                <div class="contacts">
                                    <p class="contacts-info"><?php echo e(setting('site.description')); ?></p>
                                    <span class="contacts-info info-address "><?php echo e(setting('site.location')); ?></span>
                                    <span class="contacts-info info-phone"><?php echo e(setting('site.phone')); ?></span>
                                    <span class="contacts-info info-support"><?php echo e(setting('site.email')); ?></span>
                                    <div class="socials">
                                        <a target="_blank" href="<?php echo e(setting('site.twitter')); ?>" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a target="_blank" href="<?php echo e(setting('site.facebook')); ?>" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>                                        
                                        <a target="_blank" href="<?php echo e(setting('site.instagram')); ?>" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>                                        
                                        <a target="_blank" href="<?php echo e(setting('site.youtube')); ?>" class="social"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 equal-elem">
                                <div class="links">
                                <h3 class="title-of-section">My account</h3>
                                <ul>
                                    <?php if(!auth()->user()): ?>
                                    <li><a href="<?php echo e(route('login')); ?>">Sign In</a></li>
                                    <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(route('cart.index')); ?>">My Cart</a></li>
                                    <li><a href="<?php echo e(route('wishlist.index')); ?>">My Wishlist</a></li><li><a href="<?php echo e(route('wishlist.order')); ?>">My Orders</a></li>
                                    <li><a href="<?php echo e(route('setting')); ?>">Account Info</a></li>
                                    
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 equal-elem">
                                <div class="links">
                                <h3 class="title-of-section">Information</h3>
                                <ul>
                                    <li><a href="<?php echo e(route('sellUs.index')); ?>">Sell Us</a></li>
                                    <li><a href="<?php echo e(route('shop.index',['category'=>request()->category,'sort'=>'latest'])); ?>">New products</a></li>                               
                                    <li><a href="<?php echo e(route('contact')); ?>">Contact us</a></li> 
                                    <li><a href="#">Terms & Conditions</a></li>                                    
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 equal-elem">
                                <div class="links links-ins">
                                    <h3 class="title-of-section">Facebook Page</h3>
                                    <div class="content-ins">
                                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhelpmedotcom.np%2F&tabs&width=340&height=154&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2113711515311974" width="310" height="154" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright full-width">
                     <div class="container">
                         <div class="copyright-right">                
                            © Copyright 2017<span> Helpme Dot Com Pvt. Ltd.</span>. All Rights Reserved.
                        </div>
                        <div class="pay-men">
                            <a ><img src="<?php echo e(asset('images/esewa.jpg')); ?>" alt="pay1"></a>
                            
                        </div>
                     </div>
                </div>
        </footer><!-- end FOOTER -->    
        
        
        
    </div>
    <a href="#" id="scrollup" title="Scroll to Top">Scroll</a>
    <!-- jQuery -->    
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-2.1.4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-dropdownhover.min.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/wow.min.js')); ?>"></script> 
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.actual.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/chosen.jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.bxslider.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.sticky.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.elevateZoom.min.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('extra-js'); ?>
    

    <script src="<?php echo e(asset('js/fancybox/source/jquery.fancybox.pack.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fancybox/source/helpers/jquery.fancybox-media.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fancybox/source/helpers/jquery.fancybox-thumbs.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/function.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/Modernizr.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.plugin.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.countdown.js')); ?>"></script>

    <script>$(document).ready(function() {
        $('#global-modal').modal('show');
});</script>
<script>
  <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
    switch(type){
        case 'info':
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;
        
        case 'warning':
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;

        case 'success':
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;

        case 'error':
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
    }
  <?php endif; ?>
</script>
</body>


</html>