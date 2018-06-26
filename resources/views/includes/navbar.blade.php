
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
             


              @foreach($treeView as $category)
                @if(count($category->subcategories) > 0)
              <li class="dropdown menu-item-has-children arrow">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">{{$category->name}}                           
                        </a>
                        <span class="toggle-submenu hidden-md"></span>
                <div class="submenu parent-megamenu">
                  <div class="row">
                    <div class="submenu-banner submenu-banner-menu-1">
                      <div class="col-md-4">
                        <div class="dropdown-menu-info">

                          <div class="dropdown-menu-content">
                        <ul class="menu">
                        @foreach($category->subcategories as $subcategory)
                           @if(count($subcategory->childcategories)>0)                        
                        
                          <li class="dropdown menu-item-has-children arrow item-megamenu">
                            <a href="#">{{$subcategory->name}}</a>
                            <ul class="dropdown-menu">
                              @foreach($subcategory->childcategories as $childcategory)
                              <li><a href="{{route('shop.index',['childcategory'=>$childcategory->slug])}}">{{$childcategory->name}}</a></li>
                              @endforeach                              
                            </ul>
                          </li> 
                          @else
                      <li><a href="{{route('shop.index',['subcategory'=>$subcategory->slug])}}">{{$subcategory->name}}</a></li>
                      @endif
                        @endforeach 
                         
                        </ul>
                      </li>
                      @else
                 <li>
                <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}</a>
                  </li>

              @endif
              
              @endforeach

                      </ul>

                    </div>
                  </div>

                  <div class="header-menu header-menu-resize">

                    <ul class="header-nav krystal-nav">
                      <li class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></li>
                      <li>
                        <a href="{{route('/')}}" class="dropdown-toggle">Home</a>
                        <span class="toggle-submenu hidden-md"></span>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Electronics <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li class="dropdown">
                            <a href="#">Another dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a></li>
                              <li class="divider"></li>
                              <li><a href="#">One more separated link</a></li>
                            </ul>
                          </li>
                          
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Groceries <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li class="dropdown">
                            <a href="#">Another dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a></li>
                              <li class="divider"></li>
                              <li><a href="#">One more separated link</a></li>
                            </ul>
                          </li>
                          
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Home Appliances <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li class="dropdown">
                            <a href="#">Another dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a></li>
                              <li class="divider"></li>
                              <li><a href="#">One more separated link</a></li>
                            </ul>
                          </li>
                          
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>
                      
                      <li>
                        <a href="{{url('contact')}}" class="dropdown-toggle">Contact Us</a>
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