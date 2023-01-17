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
               <a href="my_account"><i class="fa-regular fa-user"></i> My Account</a>
                  @else
                     {{ Auth::user()->name }}
                     <a href="/logout"><i class="fa-regular fa-user"></i> Logout</a>
                  @endif
                  <!-- <a href="my_account"><i class="fa-regular fa-user"></i> My Account</a> -->
                  <a href="#"><i class="fa-regular fa-heart"></i> My Wishlist</a>
                  <a href="#"><i class="fa-solid fa-bag-shopping"></i><span>0</span>items</a>
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
                        <a href="/admin/dashboard/uploadproduct" class="banner-lgo"><img src="/images/logo.png"></a>
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
      <div class="header-links-toggle">
         <div class="container-fluid">
            <div class="header-content">
                <!-- nav section start from here  -->
               <nav class="navbar navbar-expand-lg navbar-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="bar bar-1"></span>
                     <span class="bar bar-2"></span>
                     <span class="bar bar-3"></span>
                  </button>

                  <div class="mb-collapse collapse navbar-collapse" id="navbarSupportedContent">
<!-- nav baar content is here  -->
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item main-menu-item flyout-down has_sub_menu">
                           <a class="{{ (request()->segment(3) == 'uploadproduct') ? 'active' : '' }} nav-link" href="/admin/dashboard/uploadproduct">UPLOAD YOUR PRODUCT</a>
                        </li>
                        <li class="nav-item main-menu-item flyout-down has_sub_menu">
                           <a class="{{ (request()->segment(3) == 'addcategory') ? 'active' : '' }} nav-link" href="/admin/dashboard/addcategory">UPLOAD YOUR CATEGORIES</a>
                        </li>
                       
                     </ul>
                  </div>
<!-- navbar content is end  here -->
<!-- toggel buttton content is start from here -->
                  <div class="nav-bar-toogle nav-tggg">
                     <button class="navbar-right-toggler navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarrightDropdown" aria-controls="navbarrightDropdown" aria-expanded="true"
                        aria-label="Toggle navigation">
                        <span class="bar bar-1"></span>
                        <span class="bar bar-2"></span>
                        <span class="bar bar-3"></span>
                     </button>
                     <div class="collapse navbar-right-content" id="navbarrightDropdown">
                        <ul class="navbar-right-desktop-content navbar-nav">
                           <li class="nav-item flyout-left has_sub_menu">
                              <a class="nav-link" href="">Ice Cream Sticks,Spoons, Candy Taster Spoons</a>
                              <div class="submenu">
                                 <ul>
                                    <li class="nav-item"><a class="nav-link" href="#">Ice Cream Sticks</a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="#">Ice Cream Spoons</a></li> -->
                                    <li class="nav-item flyout-left has_sub_menu">
                                       <a class="nav-link" href="">Ice Cream Spoons</a>
                                       <div class="submenu">
                                          <ul>
                                             <li class="nav-item"><a class="nav-link" href="#">candy taster spoon</a>
                                             </li>
                                          </ul>
                                       </div>
                                    </li>

                                 </ul>
                              </div>
                            </ul>
                     </div>
                  </div>
<!-- togggel content is end here  -->
               </nav>
               <!-- full nav is end here -->
            </div>
         </div>
      </div>
   </header>