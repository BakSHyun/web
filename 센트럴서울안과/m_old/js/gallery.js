$(document).ready(function(){

    /* 둘러보기 */
	$(".tab_menu > li").bind({
		mouseover:function(){
			$(this).addClass('on').removeClass('off');
		},mouseout:function(){
			if(!$(this).hasClass('selects')){
				$(this).removeClass('on').addClass('off');
			}
		},click:function(){
			var ids = $(this).attr('id').split("_");
			
			$(".alide_scroll").html(eval($(this).attr('id')));

			$("#"+$("#"+ids[0]+"_val").val()).removeClass("selects").addClass('off');
			$("#"+ids[0]+"_conts").find("li.tab_cont_box").each(function(){
				$(this).css({"display":"none"});
			});
			$(this).addClass("selects");
			$("#"+ids[0]+"_val").val($(this).attr('id'));
			$("."+$(this).attr('id')).css({"display":"block"});
		}
	});

	var content = ".alide_scroll";
	var section = content+' > p';
	var w = $(section).width();

	function init_doc(){
		var end = $(section).length - 1;
		var last = $(section).eq(end);
		$(section).eq(end).remove();
		$(content).css({"width":w*section.length, "marginLeft":-w}).prepend(last);
	}
	init_doc();

	$(".alide_left").click(function(){
		if ($(content).is(':animated')) return false;
		$(content).animate({ marginLeft: '+=' +w }, 1000,"easeInOutExpo", function() {
			var end = $(section).length - 1;
			var last = $(section).eq(end);
			$(section).eq(end).remove();
			$(this).animate({ marginLeft: '-=' +w }, 0).prepend(last);
		});
	});

	$(".alide_right").click(function(){
		if ($(content).is(':animated')) return false;
		$(content).animate({ marginLeft: '-=' +w }, 1000,"easeInOutExpo",  function() {
			var first = $(section).eq(0);
			$(section).eq(0).remove();
			$(this).animate({ marginLeft: '+=' +w }, 0).append(first);
		});
	});

});



/********************** 둘러보기 **********************************/

	var facilities_conts1 = "<p class='alide_box'><img src='../img/gallery/parking1.jpg' alt=''></p>";
	facilities_conts1 += "<p class='alide_box'><img src='../img/gallery/parking2.jpg' alt=''></p>";
	facilities_conts1 += "<p class='alide_box'><img src='../img/gallery/parking1.jpg' alt=''></p>";
	facilities_conts1 += "<p class='alide_box'><img src='../img/gallery/parking2.jpg' alt=''></p>";

	var facilities_conts2 = "<p class='alide_box'><img src='../img/gallery/lounge4.jpg' alt=''></p>";
	facilities_conts2 += "<p class='alide_box'><img src='../img/gallery/lounge1.jpg' alt=''></p>";
	facilities_conts2 += "<p class='alide_box'><img src='../img/gallery/lounge2.jpg' alt=''></p>";
	facilities_conts2 += "<p class='alide_box'><img src='../img/gallery/lounge3.jpg' alt=''></p>";

	var facilities_conts3 = "<p class='alide_box'><img src='../img/gallery/1f6.jpg' alt=''></p>";
	facilities_conts3 += "<p class='alide_box'><img src='../img/gallery/1f1.jpg' alt=''></p>";
	facilities_conts3 += "<p class='alide_box'><img src='../img/gallery/1f2.jpg' alt=''></p>";
	facilities_conts3 += "<p class='alide_box'><img src='../img/gallery/1f3.jpg' alt=''></p>";
	facilities_conts3 += "<p class='alide_box'><img src='../img/gallery/1f4.jpg' alt=''></p>";
	facilities_conts3 += "<p class='alide_box'><img src='../img/gallery/1f5.jpg' alt=''></p>";

	var facilities_conts4 = "<p class='alide_box'><img src='../img/gallery/2f4.jpg' alt=''></p>";
	facilities_conts4 += "<p class='alide_box'><img src='../img/gallery/2f1.jpg' alt=''></p>";
	facilities_conts4 += "<p class='alide_box'><img src='../img/gallery/2f2.jpg' alt=''></p>";
	facilities_conts4 += "<p class='alide_box'><img src='../img/gallery/2f3.jpg' alt=''></p>";

    var facilities_conts5 = "<p class='alide_box'><img src='../img/gallery/3f5.jpg' alt=''></p>";
	facilities_conts5 += "<p class='alide_box'><img src='../img/gallery/3f1.jpg' alt=''></p>";
	facilities_conts5 += "<p class='alide_box'><img src='../img/gallery/3f2.jpg' alt=''></p>";
	facilities_conts5 += "<p class='alide_box'><img src='../img/gallery/3f3.jpg' alt=''></p>";
	facilities_conts5 += "<p class='alide_box'><img src='../img/gallery/3f4.jpg' alt=''></p>";