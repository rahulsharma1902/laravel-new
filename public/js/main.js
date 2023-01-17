$('.testi-slid').slick({
	arrows: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	centerMode: false,
	rows: 0,	
	adaptiveHeight: true,
	arrows: false,
	dots:true,
});
$('.product-slider').slick({
	arrows: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	centerMode: false,
	rows: 0,	
	adaptiveHeight: true,
	dots:false,
	prevArrow: '<div class="class-to-style"><span class="fa-solid fa-arrow-left"></span><span class="sr-only">Prev</span></div>',
	nextArrow: '<div class="class-to-style right"><span class="fa-solid fa-arrow-right"></span><span class="sr-only">Next</span></div>',
	 responsive: [{
      breakpoint: 1199,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,

      }
    },   {
         breakpoint: 767,
         settings: {
        slidesToShow: 2,
        slidesToScroll: 1,

      }
    },   {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    }]	
});
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});

$(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});


jQuery( document ).ready(function() {

$('.navbar').addClass('js-enabled');
    $('.navbar .has_sub_menu > a').after('<div class="child-trigger"><i class="fa-solid fa-angle-down"></i></div>');    
   jQuery('.child-trigger').click(function() {
        jQuery(this).toggleClass('child-open');
        return false;
    }); 

   jQuery('.back-btn').click(function() {
        jQuery(this).parent().siblings('.child-trigger').removeClass('child-open');
        return false;
    });
});

jQuery(document).ready(function(){ 
    jQuery(".child-trigger").click(function(){
        jQuery(this).next(".submenu").slideToggle();
    });
});
 
function color(){
    var color = document.getElementById("inputColor").value;
    //document.body.style.backgroundColor = color;
	jQuery('#inputText').val(color);
    document.getElementById("inputText").value = color;
}
    

