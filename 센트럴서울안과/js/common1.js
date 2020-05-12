
//***kth_menu_vol1***************************************************************************************************//

    function menu_set(mn,sn,cn,evt1,evt2){
          
		  var dep1 = null;
		  var dep2 = null;
		  var dep2_left = null;
		  var dep3 = null;
		  var chk1=null;
		  var chk2=null;
		  var chk2_left=null;
		  var chk3=null;
		  var id=null;

		  if($('ul[id=top_menu]')){
		    dep1 = $('#top_menu .dep1');
		    dep2 = $('#top_menu .dep2');
			dep2.find('>li').addClass('off');
			dep1.find('>a').keyup(function(e){clearId();chk2=null;if(chk1!=$(this).parent().index()){chk1=$(this).parent().index();chk_dep1();}});
            dep2.find('>ul>li>a').keyup(function(e){clearId();chk2=$(this).parent().index();chk_dep2();});
	        if(evt1==0 || evt1==null){dep1.find('>a').on('mouseenter',function(e){clearId();dep2.find('>li').removeClass('on1').addClass('off');chk2=null;if(chk1!=$(this).parent().index()){chk1=$(this).parent().index();chk_dep1();}});};
		    if(evt1==1){dep1.find('>a').on('mouseenter',function(e){clearId();dep2.find('>li').removeClass('on1').addClass('off');chk2=null;});dep1.find('>a').on('click',function(e){if(chk1!=$(this).parent().index()){chk1=$(this).parent().index();chk_dep1();}});};
            dep1.find('>a').on('mouseleave',function(e){autoChk();});
		    dep2.find('>ul>li>a').on('mouseenter',function(e){clearId();chk2=$(this).parent().index();chk_dep2();});
		    dep2.find('>ul>li>a').on('mouseleave',function(e){autoChk();});
            function autoChk(){id=setInterval(function(){chkDepth()},500);};
			function chkDepth(){if(mn==null || mn==0){dep1.removeClass('on1').addClass('off');dep2.find('>li').removeClass('on1').addClass('off');dep2.clearQueue().stop().slideUp(0);return}else{clearId();chk1=mn-1;chk2=sn-1;if(!dep1.eq(chk1).hasClass('on1')){chk_dep1();};chk_dep2();}};chkDepth();
			function chk_dep1(){if(dep1.eq(chk1).children('.dep2')){dep2.clearQueue().stop().slideUp(0); dep1.eq(chk1).children('.dep2').clearQueue().finish().slideDown();};dep1.removeClass('on1').addClass('off');dep1.eq(chk1).removeClass('off').addClass('on1')};
		    function chk_dep2(){dep2.find('>li').removeClass('on1').addClass('off');dep2.eq(chk1).find('>li').eq(chk2).removeClass('off').addClass('on1');};
		  }

		  if($('ul[id=left_menu]')){
		    dep2_left = $('#left_menu .dep2');
			dep3 = $('#left_menu .dep3');
            dep2_left.find('>a').keyup(function(e){clearId();chk3=null;if(chk2_left!=$(this).parent().index()){chk2_left=$(this).parent().index();chk_dep2_left();}});
			dep3.find('>li>a').keyup(function(e){clearId();chk3=$(this).parent().index();chk_dep3();});
            if(evt2==0 || evt2==null){dep2_left.find('>a').on('mouseenter',function(e){clearId();chk3=null;if(chk2_left!=$(this).parent().index()){chk2_left=$(this).parent().index();chk_dep2_left();}});};
			if(evt2==1){dep2_left.find('>a').on('mouseenter',function(e){clearId();});dep2_left.find('>a').on('click',function(e){chk3=null;if(chk2_left!=$(this).parent().index()){chk2_left=$(this).parent().index();chk_dep2_left();}});};
			dep2_left.find('>a').on('mouseleave',function(e){autoChk2();});
			dep3.find('>li>a').on('mouseenter',function(e){clearId();chk3=$(this).parent().index();chk_dep3();});
			dep3.find('>li>a').on('mouseleave',function(e){autoChk2();});
			function autoChk2(){id=setInterval(function(){chkDepth_left()},500);};
			function chkDepth_left(){if(sn==null || sn==0){return};clearId();chk2_left=sn-1;chk3=cn-1;if(!dep2_left.eq(chk2_left).hasClass('on')){chk_dep2_left();};chk_dep3();};chkDepth_left();
			function chk_dep2_left(){if(dep2_left.eq(chk2_left).children('.dep3')){dep3.clearQueue().stop().slideUp();dep2_left.eq(chk2_left).children('.dep3').clearQueue().finish().slideDown();};dep2_left.removeClass('on').addClass('off');dep2_left.eq(chk2_left).removeClass('off').addClass('on')};
		    function chk_dep3(){dep3.find('>li').removeClass('on').addClass('off');dep2_left.eq(chk2_left).children('.dep3').find('>li').eq(chk3).removeClass('off').addClass('on');};
		  }

	      function clearId(){if(id){clearInterval(id);}};
}
		
