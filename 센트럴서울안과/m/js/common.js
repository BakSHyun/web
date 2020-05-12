$(document).ready(function(){

	$('#total_toggle').click(function(){
		if($('#total_val').val() == '0'){
			$(this).find('img').attr('src',$(this).find('img').attr('src').replace(".gif","_ov.gif"));
			$('#total_menu').slideDown('easeOutExpo');
			$('#total_val').val('1')
		}else{
			$(this).find('img').attr('src',$(this).find('img').attr('src').replace("_ov.gif",".gif"));
			$('#total_menu').slideUp('easeOutExpo');
			$('#total_val').val('0')
		}
	});
	$('.closebtn').click(function(){
			$('#total_menu').slideUp('easeOutExpo');
			$('#total_toggle').find('img').attr('src',$('#total_toggle').find('img').attr('src').replace("_ov.jpg",".jpg"));
			$('#total_val').val('0')
	});

	/*셀렉트박스 이동*/
	$('#select_portal').change(function(){
		location.href=$(this).val();
	});
	$('.select_move').change(function(){
		location.href=$(this).val();
	});

	$('.menu_total').click(function(){
		$('.total_menu_wrap').show();
	});

	$('#total_menu_close').click(function(){
		$('.total_menu_wrap').hide();
	});


/* 서브 둘러보기 */
	 $('#mv_inner').bxSlider({
	   mode: 'horizontal',
	   controls:true,
	   auto:true,
	   captions: true,
		   pager:false
	});

});