<footer class="site-footer">
      <div class="container">
         <div class="footer-content">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                  <div class="ftr-menu">
                     <h6 class="ftr-hdd">Navigation</h6>
                     <ul>
                        <li>
                           <a href="/home">Home</a>
                        </li>
                        <li>
                           <a href="">About Us</a>
                        </li>
                        <li>
                           <a href="/my_account">Register</a>
                        </li>
                        <li>
                           <a href="/my_account">Sign In</a>
                        </li>
                        <li>
                           <a href="">Privacy Policy</a>
                        </li>
                        <li>
                           <a href="">Returns Policy</a>
                        </li>
                        <li>
                           <a href="">Advanced Search</a>
                        </li>
                        <li>
                           <a href="">Terms & Conditions</a>
                        </li>
                        <li>
                           <a href="">Frequently Asked Questions</a>
                        </li>
                        <li>
                           <a href="">Live Support</a>
                        </li>
                        <li>
                           <a href="">Newsletter</a>
                        </li>
                        <li>
                           <a href="">Contact Us</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                  <div class="ftr-menu">
                     <h6 class="ftr-hdd">Products</h6>
                     <ul>
                        @if ($allproducts)
                  
                        @foreach ($allproducts as $all)
                        <li>
                           <a href="/products/{{$all->slug}}">{{$all->productname}}</a>
                        </li>
                        @endforeach
                
                                
                        @endif
                     </ul>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                  <div class="ftr-menu">
                  <h6 class="ftr-hdd">Categorys</h6>
                     <ul>
                        @if ($cat)
                           @foreach ($cat as $c)
                           <li>
                           <a href="/categories/{{$c->category}}">{{$c->category}}</a>
                        </li>
                           @endforeach
                        @endif
                       
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                  <div class="ftr-menu about">
                     <h6 class="ftr-hdd">Perfect Stix, LLC</h6>
                     <ul>
                        <li>
                           <a href=""><span class="ftr-ab loc-dd"></span> 4776 US Highway 1, Vero Beach, Florida
                              32967</a>
                        </li>
                        <li>
                           <a href=""><span class="ftr-ab cal-dd"></span>Toll Free : (800) 341-0079</a>
                        </li>
                        <li>
                           <a href=""><span class="ftr-ab fax-dd"></span>Fax: (772) 770-3757</a>
                        </li>
                        <li>
                           <a href=""><span class="ftr-ab mail-dd"></span> Email: sales@perfectstix.com</a>
                        </li>
                        <li>
                           <a href=""><span class="ftr-img-crd"><img src="images/ftr-img.png"
                                    class="img-fluid"></span></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
