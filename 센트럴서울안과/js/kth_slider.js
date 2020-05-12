 (function($){

	$.fn.extend({

	kth_slid: function(options){
		var defaults = {
			btnStyle : null,
			slidStyle : null,
			spd : 800,
			time : 3000,
			evStyle : null,
			auto : null
		}

		var options = $.extend(defaults,options);

		return this.each(function(){

		var op=options;
		var obj=$(this);
		var rootId=obj.attr("id");
		var $banners=$("#"+rootId);
		var $bannerItem=$banners.find(".roll_img");
		var $btnItem = null;
		var $nextBtn =null;
		var $prevBtn =null;
		var max=$bannerItem.length;
		var over=1;
		var res=null;
		var geb=null;
		var id=null;
		var clr=0;

		initPosition();

		if($banners.children().hasClass('remote')){var arStop = $banners.find('.remote>a.arstop'); var arPlay = $banners.find('.remote>a.arplay'); if(op.auto == null || op.auto == 0){clr=1;arStop.hide();remoteSet();} else if(op.auto == 'on'){arPlay.hide();remoteSet();autoPlay();}}else{if(op.auto == null || op.auto == 0){clr=1;} else if(op.auto == 'on'){autoPlay();}}

		function initPosition(){
			$bannerItem.find('>a').addClass('off');
			$banners.find('#img_num'+over+'>a').removeClass('off').addClass('on');
			if($banners.find('#img_num'+over+'>a').children().hasClass('mov')){$banners.find('#img_num'+over+' .mov').on('click',function(e){clearInterval(id); $(this).find('img').css({'display':'none'}); $(this).find('#player').css({'display':'block'}).attr('src',$(this).find('#player').attr('alt'));});}
			if(op.btnStyle == null){$bannerItem.find('>a').keyup(function(e){if(e.keyCode === 39){nextVisual();}if(e.keyCode === 37){prevVisual();}if(e.keyCode==9){clearInterval(id);remoteChk();}}); $bannerItem.find('>a').blur(function(){removeEvent();$banners.find('#img_num'+over+'>a').removeClass('off').addClass('on');});} else if(op.btnStyle == 0){npHandler();} else if(op.btnStyle == "list"){btnHandler();} else if(op.btnStyle == "full"){npHandler(); btnHandler();}
			if(op.slidStyle == null || op.slidStyle == 0){$bannerItem.css({opacity:0});$banners.find('>#img_num'+over).css({opacity:1});}else if(op.slidStyle == 'x'){if($bannerItem.parent().hasClass('slide')){geb = Number($banners.find('.slide').width());}else{geb = Number($banners.width());}}else if(op.slidStyle == 'y'){if($bannerItem.parent().hasClass('slide')){geb = Number($banners.find('.slide').height());}else{geb = Number($banners.height());}}
		}

		/************************************헨들러*****************************************************************************************************************************************/
		function npHandler(){$nextBtn = $banners.find('.next'); $prevBtn = $banners.find('.prev'); $nextBtn.keyup(function(e){if(e.keyCode==9){clearInterval(id);remoteChk();}}); $nextBtn.blur(function(e){removeEvent();$banners.find('#img_num'+over+'>a').removeClass('off').addClass('on');}); $prevBtn.keyup(function(e){if(e.keyCode==9){clearInterval(id);}}); $prevBtn.blur(function(e){removeEvent();$banners.find('#img_num'+over+'>a').removeClass('off').addClass('on');}); npEvent();}
		function btnHandler(){$btnItem = $banners.find('.roll_btn'); $btnItem.find('a').keyup(function(e){if(e.keyCode==9){clearInterval(id);remoteChk();}}); $btnItem.find('a').blur(function(e){removeEvent();$banners.find('#img_num'+over+'>a').removeClass('off').addClass('on');}); btnEvent();}
		/***********************************************************************************************************************************************************************************/

		function btnEvent(){$btnItem.find('a').on('mouseleave',function(e){if(clr == 0){autoPlay();}}); if(op.evStyle == 1){$btnItem.find('a').on('mouseenter',function(e){clearInterval(id); var chk=$(this).parent().attr('id').replace('btn_num','');if(over!=chk){res=over;over=chk;activeEvent();}});} else if(op.evStyle == null || op.evStyle == 0){$btnItem.find('a').on('mouseenter',function(e){clearInterval(id);}); $btnItem.find('a').on('click',function(e){if($bannerItem.is(':animated')){return false;}var chk=$(this).parent().attr('id').replace('btn_num','');if(over!=chk){res=over;over=chk;activeEvent();}});}}
		function npEvent(){$nextBtn.on("mouseenter",function(e){clearInterval(id); $(this).removeClass('off').addClass('on'); }); $nextBtn.on("mouseleave",function(e){if(clr == 0){autoPlay();} $(this).removeClass('on').addClass('off'); }); $nextBtn.on("click",function(e){if ($bannerItem.is(':animated')){return false;}nextVisual();}); $prevBtn.on("mouseenter",function(e){clearInterval(id); $(this).removeClass('off').addClass('on'); }); $prevBtn.on("mouseleave",function(e){if(clr == 0){autoPlay();} $(this).removeClass('on').addClass('off'); }); $prevBtn.on("click",function(e){if ($bannerItem.is(':animated')){return false;}prevVisual();});}
		function remoteSet(){arStop.on("click",function(e){clr=1;$(this).hide();arPlay.show();clearInterval(id);}); arPlay.on("click",function(e){clr=0;$(this).hide();arStop.show();autoPlay();});}
		function chkBtn(){$banners.find('#btn_num'+res+'>a').removeClass('on').addClass('off'); $banners.find('#btn_num'+over+'>a').removeClass('off').addClass('on');}

		function activeEvent(){
			var imgOver = $banners.find('#img_num'+over);
			var imgRes = $banners.find('#img_num'+res);
			removeEvent();
			imgOver.find('a').removeClass('off').addClass('on');
			imgRes.find('a').removeClass('off').addClass('on');

			if(imgRes.find('a').children().hasClass('mov')){imgRes.find('.mov img').css({'display':'block'}); imgRes.find('.mov #player').css({'display':'none'}).attr('src','');}
			if(op.btnStyle == "list"){chkBtn();}else if(op.btnStyle == "full"){chkBtn();}

			if(op.slidStyle == null || op.slidStyle == 0){imgRes.css({'z-index':'1'}); imgOver.css({'z-index':'2'}); imgRes.stop().animate({opacity:0},op.spd); imgOver.stop().animate({opacity:1},op.spd);}
			else if(op.slidStyle == 'x'){
				if(over==1 && res==max){imgOver.css({left:geb}).stop().animate({left:0},op.spd,"easeInOutQuint"); imgRes.css({left:0}).stop().animate({left:-geb},op.spd,"easeInOutQuint");}
				else if(over==max && res==1){imgOver.css({left:-geb}).stop().animate({left:0},op.spd,"easeInOutQuint"); imgRes.css({left:0}).stop().animate({left:geb},op.spd,"easeInOutQuint");}
				else if(over>res){imgOver.css({left:geb}).stop().animate({left:0},op.spd,"easeInOutQuint"); imgRes.css({left:0}).stop().animate({left:-geb},op.spd,"easeInOutQuint");}
				else if(over<res){imgOver.css({left:-geb}).stop().animate({left:0},op.spd,"easeInOutQuint"); imgRes.css({left:0}).stop().animate({left:geb},op.spd,"easeInOutQuint");}
			}
			else if(op.slidStyle == 'y'){
				if(over==1 && res==max){imgOver.css({top:geb}).stop().animate({top:0},op.spd,"easeInOutQuint"); imgRes.css({top:0}).stop().animate({top:-geb},op.spd,"easeInOutQuint");}
				else if(over==max && res==1){imgOver.css({top:-geb}).stop().animate({top:0},op.spd,"easeInOutQuint"); imgRes.css({top:0}).stop().animate({top:geb},op.spd,"easeInOutQuint");}
				else if(over>res){imgOver.css({top:geb}).stop().animate({top:0},op.spd,"easeInOutQuint"); imgRes.css({top:0}).stop().animate({top:-geb},op.spd,"easeInOutQuint");}
				else if(over<res){imgOver.css({top:-geb}).stop().animate({top:0},op.spd,"easeInOutQuint"); imgRes.css({top:0}).stop().animate({top:geb},op.spd,"easeInOutQuint");}
			}
		}

		function removeEvent(){$bannerItem.find('>a').removeClass('on').addClass('off');}
		function remoteChk(){if($banners.children().hasClass('remote')){clr=1;arStop.hide();arPlay.show();}}
		function autoPlay(){id = setInterval(function(){nextVisual();},op.time)}
		function nextVisual(){if(over == max){res = over;over = 1;activeEvent();}else{res = over;over++;activeEvent();}}
		function prevVisual(){if(over == 1){res = over;over = max;activeEvent();}else{res = over;over--;activeEvent();}}
	
  });

 }
 
});
  
})(jQuery);

