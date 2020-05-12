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

	/*가입*/
	$('.il > span > input, .il2 > span > textarea').bind({ focus:function(){ il_chk($(this).val(),$(this)); },keyup:function(){ il_chk($(this).val(),$(this)); },keydown:function(){ il_chk($(this).val(),$(this)); },blur:function(){ il_chk($(this).val(),$(this)); } }).each(function(){ $(this).blur(); });
	function il_chk(txt,e){ if( $.trim(txt) != '' ){ e.prev().css('color','#ffffff'); }else{ e.prev().css('color','#999'); } }

	$('#hphone2').keyup(function(){ if( $.trim($(this).val()).length == 4 ){ $('#hphone3').focus(); } });

	$('#mail_sel').change(function(){ if($(this).val() == 'dir'){ $('#mail_dir').css('display','block').find('input').focus(); }else{ $('#mail_dir').css('display','none').find('input').val(''); } });

	/*셀렉트박스 이동*/
	$('#select_portal').change(function(){
		location.href=$(this).val();
	});

	$('.menu_total').click(function(){
		$('.total_menu_wrap').show();
	});

	$('#total_menu_close').click(function(){
		$('.total_menu_wrap').hide();
	});

	var tap_width = ($('#tap_btn').width()/$('#tap_btn>li').length+1)-4;

    $('#tap_btn>li').css({width:tap_width});
	

});

function joinchk(cf){

	if(cf.id.value=="") {
		alert("아이디를 입력하세요");
		cf.id.focus();
		return false;
	}
	if(cf.pw.value=="") {
		alert("비밀번호를 입력하세요");
		cf.pw.focus();
		return false;
	}
	if(cf.name.value=="") {
		alert("이름을 입력하세요");
		cf.name.focus();
		return false;
	}
	if(cf.hphone2.value=="" || cf.hphone3.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone2.focus();
		return false;
	}
	if(cf.email1.value=="") {
		alert("이메일을 입력하세요");
		cf.email1.focus();
		return false;
	}
}