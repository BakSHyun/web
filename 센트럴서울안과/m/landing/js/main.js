$(document).ready(function (){
	/* 메인 비주얼 */
	var mv_auto_bxslider = $('#mv_inner').bxSlider({
		mode: 'horizontal',
		controls:true,
		auto:true,
		pager:false, 
		adaptiveHeight: true,
		pause:5000,
		onSliderLoad: function () {
			$('.bx-pager, .bx-next , .bx-prev').click(function () {
				var i = $(this).data('slide-index');
				mv_auto_bxslider.goToSlide(i);
				mv_auto_bxslider.stopAuto();
				mv_auto_bxslider.startAuto();
				return false;
			});
		}
	});
   /* 메인 비주얼 */

   /* 메인배너 좌우이동 */
   var mb_auto_bxslider = $('.mb98_inner').bxSlider({
		mode: 'horizontal',
		controls:true,
		auto:true,
		pager:false, 
		adaptiveHeight: true,
		pause:5000,
		onSliderLoad: function () {
			$('.bx-pager, .bx-next , .bx-prev').click(function () {
				var i = $(this).data('slide-index');
				mb_auto_bxslider.goToSlide(i);
				mb_auto_bxslider.stopAuto();
				mb_auto_bxslider.startAuto();
				return false;
			});
		}
	});
   /* 메인배너 좌우이동 */

	/* 메인배너 상하이동 */
	var mbv_auto_bxslider = $('.mb99_inner').bxSlider({
		mode: 'vertical',
		slideWidth: 400,
		minSlides:3,
		maxSlides:3,
		moveSlides: 1,
		slideMargin: 0,
		controls:true,
		auto:true,
		pager:false,
		adaptiveHeight: true,
		onSliderLoad: function () {
			$('.bx-pager, .bx-next , .bx-prev').click(function () {
				var i = $(this).data('slide-index');
				mbv_auto_bxslider.goToSlide(i);
				mbv_auto_bxslider.stopAuto();
				mbv_auto_bxslider.startAuto();
				return false;
			});
		}
	});
	/* 메인배너 상하이동 */

	/* 해당 아이콘 마우스 hover시 이미지 변경 js */
	$('.icon_list img').mouseover(function() {
		$(this).attr('src',$(this).attr('src').replace(".png","_ov.png"));
	});

	$('.icon_list img').mouseleave(function() {
		$(this).attr('src',$(this).attr('src').replace("_ov.png",".png"));
	});
	/* 해당 아이콘 마우스 hover시 이미지 변경 js */

});
