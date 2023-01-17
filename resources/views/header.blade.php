@extends('index')

@section('banner')
   <section class="banner-sec">
      <div class="testi-slid">
         <div class="auto-des">
            <div class="banner-test-slide">
               <img src="images/banner-slide1.png" class="img-fluid">
            </div>
         </div>
         <div class="auto-des">
            <div class="banner-test-slide">
               <img src="images/banner-slide1.png" class="img-fluid">
            </div>
         </div>
         <div class="auto-des">
            <div class="banner-test-slide">
               <img src="images/banner-slide1.png" class="img-fluid">
            </div>
         </div>
      </div>
   </section>
   @endsection
   <!-- get all product section start -->
   @section('banner-products');
   <section class="banner-products">
      <div class="container-fluid">
         <div class="row">
                     <!-- start for each from here -->
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
               <div class="banner-pdct">
                  <a href=""><img src="images/pp-1.png" class="img-fluid"></a>
                  <p>Wooden Cutlery Knives</p>
               </div>
               <!-- end for each here -->
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
               <div class="banner-pdct">
                  <a href=""><img src="images/pp2.png" class="img-fluid"></a>
                  <p>Tailgate Party Packs</p>
               </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
               <div class="banner-pdct">
                  <a href=""><img src="images/pp3.png" class="img-fluid"></a>
                  <p>Disposable Face Mask</p>
               </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
               <div class="banner-pdct">
                  <a href=""><img src="images/pp4.png" class="img-fluid"></a>
                  <p>Flex/bendable Straws</p>
               </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
               <div class="banner-pdct">
                  <a href=""><img src="images/pp5.png" class="img-fluid"></a>
                  <p>Jumbo Craft Sticks</p>
               </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
               <div class="banner-pdct">
                  <a href=""><img src="images/pp6.png" class="img-fluid"></a>
                  <p>Snow Cone Supplies</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end of produc section  -->
   @endsection
   @section('customizable-product')
   <section class="custom-products-sec">
      <div class="container-fluid">
         <h3>Customizable Products</h3>
         <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp1.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>5.25" Black Paper Cocktail Straws</h6>
                     <p>5.25" Unwrapped Black Cocktail Straws . Each straw is Eco-friendly and has a diameter of 6mm .
                        Perfect for bars, cafes, and restaurants. Show your cus..</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp2.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>5.25" Black Paper Cocktail Straws</h6>
                     <p>5.25" Unwrapped Black Cocktail Straws . Each straw is Eco-friendly and has a diameter of 6mm .
                        Perfect for bars, cafes, and restaurants. Show your cus..</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp3.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>7.75" Black Jumbo PaperStraws</h6>
                     <p>7.75” Jumbo unwrapped paper straws are a wonderful alternative to their plastic counterparts.
                        Earth friendly and compostable, our unwrapped black pa..</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp4.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>7.75" Black Jumbo PaperStraws</h6>
                     <p>7.75” Jumbo unwrapped paper straws are a wonderful alternative to their plastic counterparts.
                        Earth friendly and compostable, our unwrapped black pa..</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row lwr">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp5.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>9" Bagasse Sugarcane Plates ( Case of 500)</h6>
                     <p>Our plates are made from environmentally friendly bagasse that are FDA approved and
                        Biodegradable. The plates are great for hot and cold foods...</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp6.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>Perfect Ware Palm Plate 6- Pack of 100 Plates</h6>
                     <p>6 Inch Square Shape Palm Plate- Product Compostable. Made from Fallen Palm Leaves. Raised Edges.
                        Great Earth-Friendly Plate- Pack of 100 Plates</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp7.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>Printed Holiday Cocktail Stirrers 6" (Pack of 24).</h6>
                     <p>6" Length Great for Cocktails Perfect for holiday events Unique Shape Multi Color</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
               <div class="product-box">
                  <div class="product-img">
                     <img src="images/cp8.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>12oz Frost Flex Cups</h6>
                     <p>12oz frosted plastic cups . Custom print these cups with any party theme, promotion, logo, or
                        marketing opportunity you would like to push to your cus..</p>
                  </div>
                  <div class="product-btn cstm-bt">
                     <a href="">Customize It</a>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @endsection
@section('newproducts')
   <section class="product-slide-sec">
      <div class="container-fluid">
         <div class="product-slide-head">
            <h3>New Products</h3>
         </div>
         <div class="product-slider">

            <div class="auto-des">
               <div class="product-box new-pdcts">
                  <div class="product-img">
                     <img src="images/np1.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>Perfectware 10 Printed Plates with Thanksgiving Print</h6>
                     <p>Fun and attractive "Gobble Til You Wobble" print plates. Disposable for easy clean up.
                        Biodegrable, compostable, and environmentally friendly alternative to styrofoam. Sturdy, strong
                        plate that can handle hot and cold foods. Great for any Thanksgiving gathering large or small!
                        Pack of 25 Plates</p>
                     <div class="product-size-price">
                        <p>Case Size:<span> </span> </p>
                        <p>Pallet Size:<span> </span> </p>
                        <p>List Price:<span>$30.99</span> </p>
                     </div>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="auto-des">
               <div class="product-box new-pdcts">
                  <div class="product-img">
                     <img src="images/np2.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>2 Ply Black Beverage Napkins 200ct</h6>
                     <p>Pack of 200 High quality napkins. Great for business's portable bars, restaurants, cafes, or at
                        home use. 2-ply design for extra strength; folded dimensions 5" x 5"</p>
                     <div class="product-size-price">
                        <p>Case Size:<span> </span> </p>
                        <p>Pallet Size:<span> </span> </p>
                        <p>List Price:<span>$30.99</span> </p>
                     </div>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>

            <div class="auto-des">
               <div class="product-box new-pdcts">
                  <div class="product-img">
                     <img src="images/np3.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>Perfect Stix Latex Gloves Powder Free Pack of 1000 Gloves Size X Large. Pack 10-100CT</h6>
                     <p>Perfect Stix Latex Powder Free Gloves- Pack of 100 Gloves.Powder Free Latex Gloves Ambidextrous
                        - perfect for right or left handed use | Perfect fit for optimal protection and comfort. Pack of
                        1000 Gloves Size is X Large</p>
                     <div class="product-size-price">
                        <p>Case Size:<span> </span> </p>
                        <p>Pallet Size:<span> </span> </p>
                        <p>List Price:<span>$30.99</span> </p>
                     </div>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="auto-des">
               <div class="product-box new-pdcts">
                  <div class="product-img">
                     <img src="images/np4.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>Perfect Stix Medium Latex Gloves Powder Free. Pack of 10-100CT Size Medium</h6>
                     <p>Perfect Stix Latex Powder Free Gloves- Pack of 100 Gloves.Powder Free Latex Gloves Ambidextrous
                        - perfect for right or left handed use | Perfect fit for optimal protection and comfort. Pack of
                        1000 Gloves Size is X Large</p>
                     <div class="product-size-price">
                        <p>Case Size:<span> </span> </p>
                        <p>Pallet Size:<span> </span> </p>
                        <p>List Price:<span>$30.99</span> </p>
                     </div>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
            <div class="auto-des">
               <div class="product-box new-pdcts">
                  <div class="product-img">
                     <img src="images/np2.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>2 Ply Black Beverage Napkins 200ct</h6>
                     <p>Pack of 200 High quality napkins. Great for business's portable bars, restaurants, cafes, or at
                        home use. 2-ply design for extra strength; folded dimensions 5" x 5"</p>
                     <div class="product-size-price">
                        <p>Case Size:<span> </span> </p>
                        <p>Pallet Size:<span> </span> </p>
                        <p>List Price:<span>$30.99</span> </p>
                     </div>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>

            <div class="auto-des">
               <div class="product-box new-pdcts">
                  <div class="product-img">
                     <img src="images/np1.png" class="img-fluid">
                  </div>
                  <div class="product-abt">
                     <h6>Perfectware 10 Printed Plates with Thanksgiving Print</h6>
                     <p>Fun and attractive "Gobble Til You Wobble" print plates. Disposable for easy clean up.
                        Biodegrable, compostable, and environmentally friendly alternative to styrofoam. Sturdy, strong
                        plate that can handle hot and cold foods. Great for any Thanksgiving gathering large or small!
                        Pack of 25 Plates</p>
                     <div class="product-size-price">
                        <p>Case Size:<span> </span> </p>
                        <p>Pallet Size:<span> </span> </p>
                        <p>List Price:<span>$30.99</span> </p>
                     </div>
                  </div>
                  <div class="product-btn cart-bt">
                     <a href="">Add to Cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @endsection
