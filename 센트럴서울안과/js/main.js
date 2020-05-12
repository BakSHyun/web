$(document).ready(function (){

//if($.cookie('key')=="ok"){
//	$('.rq').css({'display':'none'});
//	return false;
//	//alert('있다');
//}


$('#mv_inner').bxSlider({
	   mode: 'horizontal',
		 controls:true,
		 auto:true,
		 pagerCustom: '#bx-pager'
	});	

var owl = $("#mainvi"),
      status = $("#owlStatus");
 
  owl.owlCarousel({
	  autoPlay: 5000,
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      afterAction : afterAction,
	  stopOnHover:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
  function updateResult(pos,value){
    status.find(pos).find(".result").text(value);
  }
 
  function afterAction(){
    updateResult(".owlItems", this.owl.owlItems.length);
    updateResult(".currentItem", (this.owl.currentItem+1));
    updateResult(".prevItem", this.prevItem);
    updateResult(".visibleItems", this.owl.visibleItems);
    updateResult(".dragDirection", this.owl.dragDirection);
  }

/*배너*/
 $('#board_roll01').bxSlider({
    mode: 'vertical',
	pager:false,
	auto:true,
	pause:4000,
    slideWidth: 430,
    minSlides: 4,
	moveSlides: 1,
    slideMargin: 5
  });
	$('#board_roll02').bxSlider({
    mode: 'vertical',
	pager:false,
	auto:true,
	pause:4000,
    slideWidth: 430,
    minSlides: 2,
	moveSlides: 1,
    slideMargin: 10
  });
$('.bxslider01').bxSlider({
	mode: 'horizontal',
	auto : true,
	controls : false,
	speed:1000,
	pause:7000,
	pager:true

});

$('.bxslider02').bxSlider({
	mode: 'horizontal',
	auto : true,
	controls : false,
	speed:1000,
	pause:7000,
	pager:true
});
/* 상단팝업*/
	$('#pop_close_btn').click(function(){
		if($('#pop_close_chk').prop('checked')){$.cookie('pop_chk','1',{ expires:1,path:'/' }); }
		$('#head_pop_wrap').hide();
	});
	if($.cookie('pop_chk')!='1'){
		$('#head_pop_wrap').css('display','block');
	}else{
		$('#head_pop_wrap').css('display','none');
	}



$('.rq_closebtn').click(function(){	
		if($('#rq_wrap').attr('class') == "rq_close"){
//			alert("close");
			$(this).attr("src",$(this).attr("src").replace("_open.jpg","_close.jpg"))
			$('#rq_wrap').removeClass("rq_close");
			$('#rq_wrap').attr('class','rq_open');

			return false;
		};
		if($('#rq_wrap').attr('class') == "rq_open"){
//			alert("open");
			$(this).attr("src",$(this).attr("src").replace("_close.jpg","_open.jpg"))
			$.cookie('key','1',{ expires:1,path:'/' })
			$('#rq_wrap').removeClass("rq_open");
			$('#rq_wrap').attr('class','rq_close');
		};
	});
			

	if($.cookie('key') !="1"){
		$('#rq_wrap').removeClass("rq_close");
		$('#rq_wrap').attr("class","rq_open");
	}else{
		$('#rq_wrap').removeClass("rq_open");
		$('#rq_wrap').attr("class","rq_close");
		
		//alert('있다');
	}


});