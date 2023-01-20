<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Admin</title>

	<!-- Fontfaces CSS-->
	<link href="<?php echo url('Admin/css/font-face.css'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/css/coustam.css'); ?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/font-awesome-4.7/css/font-awesome.min.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/font-awesome-5/css/fontawesome-all.min.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/mdi-font/css/material-design-iconic-font.min.css');?>" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?php echo url('Admin/vendor/bootstrap-4.1/bootstrap.min.css');?>" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?php echo url('Admin/vendor/animsition/animsition.min.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/wow/animate.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/css-hamburgers/hamburgers.min.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/slick/slick.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/select2/select2.min.css');?>" rel="stylesheet" media="all">
	<link href="<?php echo url('Admin/vendor/perfect-scrollbar/perfect-scrollbar.css');?>" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="<?php echo url('Admin/css/theme.css');?>" rel="stylesheet" media="all">
	<!-- script for text editor -->
	<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
</head>
<body class="animsition">
    <div class="page-wrapper">

@include('Admin.Header')
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
         @yield('dashboard')
         @yield('Categories')
		 @yield('addCategory')
		 @yield('editCategory')
		 @yield('Products')
		 @yield('addProduct')
		 @yield('editProduct')
		 @yield('CustomizePricetype')
		 @yield('PriceType')
		 @yield('addPriceType')
		 @yield('editPriceType')
		 @yield('Banner')
		 @yield('addBanner')
         @yield('editBanner')
        </div>

	<!-- Jquery JS-->
	<script src="<?php echo url('Admin/vendor/jquery-3.2.1.min.js');?>"></script>
	<!-- Bootstrap JS-->
	<script src="<?php echo url('Admin/vendor/bootstrap-4.1/popper.min.js');?>"></script>
	<script src="<?php echo url('Admin/vendor/bootstrap-4.1/bootstrap.min.js');?>"></script>
	<!-- Vendor JS       -->
	<script src="<?php echo url('Admin/vendor/slick/slick.min.js');?>">
	</script>
	<script src="<?php echo url('Admin/vendor/wow/wow.min.js');?>"></script>
	<script src="<?php echo url('Admin/vendor/animsition/animsition.min.js');?>"></script>
	<script src="<?php echo url('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js');?>">
	</script>
	<script src="<?php echo url('Admin/vendor/counter-up/jquery.waypoints.min.js');?>"></script>
	<script src="<?php echo url('Admin/vendor/counter-up/jquery.counterup.min.js');?>">
	</script>
	<script src="<?php echo url('Admin/vendor/circle-progress/circle-progress.min.js');?>"></script>
	<script src="<?php echo url('Admin/vendor/perfect-scrollbar/perfect-scrollbar.js');?>"></script>
	<script src="<?php echo url('Admin/vendor/chartjs/Chart.bundle.min.js');?>"></script>
	<script src="<?php echo url('Admin/vendor/select2/select2.min.js');?>">
	</script>

	<!-- Main JS-->
	<script src="<?php echo url('Admin/js/main.js');?>"></script>
	<!-- function for creat slug -->
<script>
	/* Encode string to slug */
function convertToSlug(str){
    
	//replace all special characters | symbols with a space
	str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
			 .toLowerCase();
	  
	// trim spaces at start and end of string
	str = str.replace(/^\s+|\s+$/gm,'');
	  
	// replace space with dash/hyphen
	str = str.replace(/\s+/g, '-');   
	// document.getElementById("slug-text").innerHTML = str;
	$('#slug-text').val(str);
	//return str;
  }
</script>
<script>
	// @if (Session::has('success'))
	// 	alert('{{Session::get('success')}}');
	// @endif
</script>
<!-- script for show field manage sock -->
<script>
	function yesnoCheck(that) {
    if (that.value == "manage_stock") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
<!-- script for customize select -->

<script>
	 function displayDivDemo(id, elementValue) {
      document.getElementById(id).style.display = elementValue.value == 1 ? 'block' : 'none';
   }

</script>
<script>
	function BtnAdd()
{
    /*Add Button*/
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find("input").val('');
    $(v).removeClass("d-none");
}

function BtnDel(v)
{
    /*Delete Button*/
       $(v).parent().parent().remove(); 
       GetTotal();
}

</script>
<!-- function for Quantity and manage stok quantiy vlue = -->
<script>
	$('.fieldone').change(function(){
  checkValue();
});

$('.fieldtwo').change(function(){
  checkValue();
});

function checkValue(){
//   var maxValue = $('.fieldtwo').val();
  if($('.fieldtwo').val() > $('.fieldone').val()){
	alert('Total Quantity must be greater than Stock Price');
    $('.fieldtwo').val(null);
  }
}
</script>
<!-- compare price and sale price in product upload -->
<script>
	$('.product_price').change(function(){
  checkValue();
});

$('.product_sale_price').change(function(){
  checkValue();
});

function checkValue(){
//   var maxValue = $('.fieldtwo').val();
  if($('.product_sale_price').val() > $('.product_price').val()){
	alert('Sale Price must be smaller than Product Price');
    $('.product_sale_price').val(null);
  }
}
</script>
<!-- script for confer delete option -->
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>

<!-- conver text editor to  -->
<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
<!-- end -->

<!-- script with ajax for delete data from data base by using ajax for price variation tabel -->
<script>
	
		$(".deleteRecord").click(function(){
			if($(this).data("id")){
			var id = $(this).data("id");
			var token = $("meta[name='csrf-token']").attr("content");
		
			$.ajax(
			{
				url: "/demo/ajax/"+id,
				type: 'GET',
				data: {
					"id": id,
					"_token": token,
				},
				success: function (){
					console.log("it Works");
					location.reload();
				}
			});
}else{
		alert('its null');
	}
});
	
		</script>

<!-- end of the script -->
<script>
	$(document).ready(function() {
		$('.updateRecord').click(function(){
			var id = $(this).data("id");
			var token = $("meta[name='csrf-token']").attr("content");
			var quantity =  $('#bundel_quantity'+id).val();
			var price = $('#bundel_price'+id).val();
			console.log(id,price,quantity);
			$.ajax(
			{
				url: "/admin/products/updatepricetype",
				type: 'GET',
				dataType:'json',
				data: {
					"id": id,
					"quantity": quantity,
					"price": price,
					"_token": token,
				},
				success: function (data){
					// console.log(data);
					// alert(data);
					// alert('done');
					location.reload();
				}
			});
		});
});
// });
</script>
<!-- script for banner status on off -->
<script type="text/javascript">
    window.onload = function() {
    document.getElementById(".status").checked = false;
    }
</script>
<script>
	$(document).ready(function() {
		$('.status').click(function(){
			var status = $(this).val();
			var token = $("meta[name='csrf-token']").attr("content");
			var id = $(this).data("id");
			if($(this).prop('checked') == false){
				$(this).val(1);
			}else{
				$(this).val(0);
            }
			alert(status);
			$.ajax(
			{
				url: "/admin/banner/status",
				type: 'GET',
				dataType:'json',
				data: {
					"id": id,
					"status": status,
					"_token": token,
				},
				success: function (data){
					window.location.reload();
				}
			});
		});
	});
</script>
</body>

</html>
<!-- end document-->
