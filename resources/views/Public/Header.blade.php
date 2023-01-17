<header>
   
      <div class="head-links">
         <div class="container-fluid">
            <div class="head-link-content">
               <div class="header-social-links">
                  <a href="#"><i class="fa-brands fa-facebook"></i></a>
                  <a href="#"><i class="fa-brands fa-twitter"></i></a>
                  <a href="#"><i class="fa-brands fa-instagram"></i></a>
               </div>
               <div class="header-account-pf">
               @if (Auth::guest())
               <a href="/my_account"><i class="fa-regular fa-user"></i> My Account</a>
                  @else
                     {{ Auth::user()->name }}
                     <a href="/logout"><i class="fa-regular fa-user"></i> Logout</a>
                  @endif
                  <!-- <a href="my_account"><i class="fa-regular fa-user"></i> My Account</a> -->
                  <a href="#"><i class="fa-regular fa-heart"></i> My Wishlist</a>
                  <a href="/cart"><i class="fa-solid fa-bag-shopping"></i><span class='cart_val'>{{ count((array) session('cart')) ?? '' }}</span>items</a>
               </div>
            </div>
         </div>
      </div>
      <div class="contact-header">
         <div class="container-fluid">
            <div class="contact-header-content">
               <div class="row">
                  <div class="col-lg-1 col-md-2 col-sm-2 col-3">
                     <div class="banner-logo">
                        <a href="/home" class="banner-lgo"><img src="/images/logo.png"></a>
                     </div>
                  </div>
                  <div class=" col-lg-6 col-md-6 col-sm-5 col-9">
                     <div class="search-bar">
                        <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search entire store here...">
                           <div class="input-group-append"><button class="btn btn-primary"><i
                                    class="fas fa-search"></i></button></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5 col-md-4 col-sm-5 col-12">
                     <div class="col-lg-6 col-md-12">
                        <a href="tel:1-800-341-0079">
                           <div class="enquiery-number">
                              <div class="enquiery-logo">
                                 <i class="fa-solid fa-phone"></i>
                              </div>
                              <div class="contact-enqui">
                                 <p>General Sales Inquiries</p>
                                 <h6>1-800-341-0079</h6>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <a href="tel:1-800-341-0079">
                           <div class="enquiery-number">
                              <div class="enquiery-logo">
                                 <i class="fa-solid fa-phone"></i>
                              </div>
                              <div class="contact-enqui">
                                 <p>Custom Logo Inquiries</p>
                                 <h6>1-800-341-0079</h6>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header data of category start from here -->
      <div class="header-links-toggle">
         <div class="container-fluid">
            <div class="header-content">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="bar bar-1"></span>
                     <span class="bar bar-2"></span>
                     <span class="bar bar-3"></span>
                  </button>

                  <div class="mb-collapse collapse navbar-collapse" id="navbarSupportedContent">
<!-- start ategory in header -->
                     <ul id='nav-hover' class="navbar-nav mr-auto">
                        
                     @if (!empty($cat))
                     @foreach ($catWithId as $c => $p)
                        @foreach ($p as $category => $d )
                        <li id=''  class="nav-item main-menu-item flyout-down has_sub_menu">
                           <a class="nav-link"  id='cat_id' href="/categories/{{$category}}">{{$category ?? ''}}</a>
                           <div class="submenu"> 
                              <ul value=''>
                                 
                                 @foreach ($d as $products )
                                 <li class="nav-item" value=""><a class="nav-link" href="#">{{$products ?? ''}}</a></li>  
                                 @endforeach                                 
                              </ul>
                           </div>
                        </li>
                        @endforeach
                        @endforeach
                        @endif

                     </ul>
                     </div>
                  </div>

               </nav>
            </div>
         </div>
      </div>
   </header>
