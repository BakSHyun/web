$(document).ready(function (){

	$('.gnb').mouseover(function(){
		$('.dep2_area').show();
	});
	
	$('.dep2_area').mouseleave(function(){
		$('.dep2_area').hide();
	});



	$('.main_banner > li').mouseover(function(){
		$(this).find('img').attr('src',$(this).find('img').attr('src').replace(".jpg","_ov.jpg"));	
	});

	$('.main_banner > li').mouseleave(function(){
		$(this).find('img').attr('src',$(this).find('img').attr('src').replace("_ov.jpg",".jpg"));
	});

	$(".tabs li").click(function (){
			var num = $(this).index();

			$(".tabs li").removeClass('on');
			$(".tabs li").eq(num).addClass('on');

			$(".tabcnt").hide();
			$(".tabcnt").eq(num).show();	

		});

	$(".tablist li").click(function (){
			var num = $(this).index();

			$(".tablist li").removeClass('on');
			$(".tablist li").eq(num).addClass('on');

			$(".tab_cnt").hide();
			$(".tab_cnt").eq(num).show();	

		});

/* 서브 둘러보기 */
	 $('#gall_inner').bxSlider({
	   mode: 'horizontal',
		 controls:true,
		 auto:true,
		 pagerCustom: '#bx-pager',captions: true
	});

	  function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

/*장비둘러보기*/
$('#intro_inner').bxSlider({
		 mode: 'horizontal',
		 controls:true,
		 autoControls:false,
		 auto:false,
		 pagerCustom: '#bx-pager'
	});

/* 사후관리 */
$('.care_inner').bxSlider({
    mode: 'horizontal',
		 controls:true,
		 autoControls:false,
		 auto:true,
		pager: false
  });

});