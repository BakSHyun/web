$(document).ready(function(){
  $('.mv_slide').bxSlider({
	   mode: 'horizontal',
	   controls:true,
	   auto:true,
	   pager:false
//	   speed:800
	});

	 $('.mv_slide01').bxSlider({
	   mode: 'horizontal',
	   controls:false,
	   auto:true,
	   pager:true
//	   speed:800
	});

	 $('.mv_slide02').bxSlider({
	   mode: 'horizontal',
	   controls:false,
	   auto:true,
	   pager:true
//	   speed:800
	});
	
	$('.slider1').bxSlider({
    mode: 'vertical',
    slideWidth: 260,
    minSlides: 1,
    slideMargin: 10,
		pager:false,auto:true,
 });

	$('.slider2').bxSlider({
    mode: 'vertical',
    slideWidth: 260,
    minSlides: 1,
    slideMargin: 10,
		pager:false,auto:true,
 });


});
