<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="<?php echo url('css/app.css'); ?>">

      <title>Home-page</title>
   </head>  
   <body> 
   @include('Public.Header')

   @yield('allcategory')
   @yield('banner')
   @yield('banner-products')
   @yield('product')
   @yield('customizable-product')
   @yield('coustomize')
   @yield('newproducts')
   @yield('my_account')
   @yield('cart')
   @yield('SearchProduct')
   @yield('forgetPassword')
   @yield('enterOTP')
   @yield('newPassword')
   @include('Public.Footer')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
   </body>
   <script>
      $(document).ready(function() {
         $('.addtocart').on('click', function(e) {
            e.preventDefault();
            var addToCartUrl = $(this).attr('href');
            var product_id = $(this).attr('data-product-id');
            var quantity = $('.quant').val();
            var token = $("meta[name='csrf-token']").attr("content");
            // alert(quantity);
            $.ajax({
               url: addToCartUrl,
               type: 'GET',
               data: {
                  'product_id': product_id,
                  'quantity': quantity,
                  '_token': token
               },
               success: function(response) {
                  window.location.reload();
               },
            });
         });
      });
   </script>
   <script>
      $(document).ready(function() {
         $('.remove_item').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            // alert(id);
            $.ajax({
               url: '/cart/remove/',
               type: 'GET',
               data: {
                  'id': id,
                  '_token': token,
               },
               success: function(response) {
                 window.location.reload();
               } 
            }); 
         });
      });
   </script>
   <!-- update cart script -->
   <script>
      $(".cart_update").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
        var quantity = ele.val();
        var id = ele.attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
         // alert(id);
        $.ajax({
            url: '/cart/update-cart/',
            method: "GET",
            data: {
                _token: token, 
                id: id, 
                quantity: quantity,
            },
            success: function (response) {
        
               window.location.reload();
            }
        });
    });
   </script>

   <!-- Script for customize products clip art -->
   <script>
      $(document).ready(function() {
         $('.list_craft').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            // alert(id);
            $('#craft_id').val(id);
         });
         });
   </script>
   <script>
             $("#notification").fadeIn("slow");
               $(".dismiss").click(function(){
                     $("#notification").fadeOut("slow");
               });
   </script>
</html>