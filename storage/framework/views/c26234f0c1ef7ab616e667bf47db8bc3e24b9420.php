
<!-- header-menu-bar -->
<div class="header-menu-bar header-sticky">
  <div class="header-menu-nav menu-style-2">
    <div class="container">
      <div class="header-menu-nav-inner">
        <div id="box-vertical-megamenus" class="box-vertical-megamenus nav-toggle-cat">
          <h4 class="title active">
            <span class="btn-open-mobile home-page">
              <span></span>
              <span></span>
              <span></span>
            </span>
            <span class="title-menu">All Departments</span>   
          </h4>
          <div class="vertical-menu-content" >
            <span class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></span>
            <ul class="vertical-menu-list">
             


              <?php $__currentLoopData = $treeView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($category->subcategories) > 0): ?>
              <li class="dropdown menu-item-has-children arrow">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo e($category->name); ?>                           
                        </a>
                        <span class="toggle-submenu hidden-md"></span>
                <div class="submenu parent-megamenu">
                  <div class="row">
                    <div class="submenu-banner submenu-banner-menu-1">
                      <div class="col-md-4">
                        <div class="dropdown-menu-info">

                          <div class="dropdown-menu-content">
                        <ul class="menu">
                        <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if(count($subcategory->childcategories)>0): ?>                        
                        
                          <li class="dropdown menu-item-has-children arrow item-megamenu">
                            <a href="#"><?php echo e($subcategory->name); ?></a>
                            <ul class="dropdown-menu">
                              <?php $__currentLoopData = $subcategory->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><a href="<?php echo e(route('shop.index',['childcategory'=>$childcategory->slug])); ?>"><?php echo e($childcategory->name); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                              
                            </ul>
                          </li> 
                          <?php else: ?>
                      <li><a href="<?php echo e(route('shop.index',['subcategory'=>$subcategory->slug])); ?>"><?php echo e($subcategory->name); ?></a></li>
                      <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                         
                        </ul>
                      </li>
                      <?php else: ?>
                 <li>
                <a href="<?php echo e(route('shop.index',['category'=>$category->slug])); ?>"><?php echo e($category->name); ?></a>
                  </li>

              <?php endif; ?>
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </ul>

                    </div>
                  </div>

                  <div class="header-menu header-menu-resize">

                    <ul class="header-nav krystal-nav">
                      <li class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></li>
                      <li>
                        <a href="<?php echo e(route('/')); ?>" class="dropdown-toggle">Home</a>
                        <span class="toggle-submenu hidden-md"></span>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Electronics <span class="caret"></span></a>
                        
                        <ul class="dropdown-menu" role="menu">
                          <?php $__currentLoopData = $electroSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $electroSubCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($electroSubCat->childcategories)): ?>
                          <li class="dropdown">
                            <a href="#"><?php echo e($electroSubCat->name); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <?php $__currentLoopData = $electroSubCat->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $electroChildCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                               
                              <li><a href="<?php echo e(route('shop.index',['childcategory'=>$electroChildCat->slug])); ?>"><?php echo e($electroChildCat->name); ?></a></li>
                                
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </li>
                            <?php else: ?>
                              <li><a href="<?php echo e(route('shop.index',['subcategory'=>$electroSubCat->slug])); ?>"><?php echo e($electroSubCat->name); ?></a></li>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </ul>

                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Groceries <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <?php $__currentLoopData = $grocerySubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grocerySubCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($grocerySubCat->childcategories)): ?>
                          <li class="dropdown">
                            <a href="#"><?php echo e($grocerySubCat->name); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <?php $__currentLoopData = $grocerySubCat->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groceryChildCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                               
                              <li><a href="<?php echo e(route('shop.index',['childcategory'=>$groceryChildCat->slug])); ?>"><?php echo e($groceryChildCat->name); ?></a></li>
                                
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </li>
                            <?php else: ?>
                              <li><a href="<?php echo e(route('shop.index',['subcategory'=>$grocerySubCat->slug])); ?>"><?php echo e($grocerySubCat->name); ?></a></li>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Home Appliances <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <?php $__currentLoopData = $homeSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeSubCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($homeSubCat->childcategories)): ?>
                          <li class="dropdown">
                            <a href="<?php echo e(route('shop.index',['subcategory'=>$homeSubCat->slug])); ?>"><?php echo e($homeSubCat->name); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <?php $__currentLoopData = $homeSubCat->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeChildCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                               
                              <li><a href="<?php echo e(route('shop.index',['childcategory'=>$homeChildCat->slug])); ?>"><?php echo e($homeChildCat->name); ?></a></li>
                                
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </li>
                            <?php else: ?>
                              <li><a href="<?php echo e(route('shop.index',['subcategory'=>$homeSubCat->slug])); ?>"><?php echo e($homeSubCat->name); ?></a></li>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </ul>
                      </li>
                      
                      <li>
                        <a href="<?php echo e(url('contact')); ?>" class="dropdown-toggle">Contact Us</a>
                        <span class="toggle-submenu hidden-md"></span>
                      </li>

                    </ul>
                  </div>
                  <span data-action="toggle-nav" class="menu-on-mobile hidden-md">
                    <span class="btn-open-mobile home-page">
                      <span></span>
                      <span></span>
                      <span></span>
                    </span>
                    <span class="title-menu-mobile">Main menu</span> 
                  </span>
                </div>
              </div>
            </div>
          </div>
        </header><!-- end HEADER -->   