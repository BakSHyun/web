
<style>
#sms_sender_wrap {border:1px solid #eaeaea;background:#fafafa;padding:20px;margin:20px 0;position:relative;overflow:hidden;}

#msg_zone_wrap {width:270px;float:left;position:relative;background:#cef5ff;border:1px solid #96bdc7;}
#msg_zone_wrap textarea {padding:10px 10px 20px 10px;width:250px;height:52px;overflow-y:auto;border:none;background:none;}

.msg_count {padding:5px 10px 5px 0;text-align:right;font:bold 11px/12px 'tahoma';}
.msg_count input {font:bold 11px/12px 'tahoma';width:30px;text-align:center;border:none;background:none;position:relative;top:-1px;}
.mms_file {display:none;}

#sms_set {float:left;padding:18px 0;margin:0 20px;width:150px;border-top:1px solid #eaeaea;border-bottom:1px solid #eaeaea;}
#sms_set div {padding:5px 10px;}
#sms_set div select {padding:3px;border:1px solid #eaeaea;}
#sms_set div input.file {width:100%;border:1px solid #eaeaea;}

#sms_case {float:left;padding:8px 0;margin-right:20px;width:190px;border-top:1px solid #eaeaea;border-bottom:1px solid #eaeaea;}
#sms_case span input {width:95% !important;border:1px solid #dadada;padding:3px 6px;}
.tomany {display:none;}

span.tonum_wrap {display:block;margin-bottom:10px;}
span.tonum_wrap .tonum {border:1px solid #eaeaea;font:normal 12px/30px 'dotum';width:30px;}
.tonums textarea {border:1px solid #eaeaea;font:normal 12px/15px 'dotum';width:96%;height:45px;padding:5px 2%;}
.sms_title {display:none;}

#sms_send {float:left;padding:8px 0;margin-right:20px;width:140px;border-top:1px solid #eaeaea;border-bottom:1px solid #eaeaea;}
#sms_send span input {width:95% !important;border:1px solid #dadada;padding:3px 6px;}

#sms_btn {}

</style>

<script language="JavaScript">
$(document).ready(function(){

	$('.msg_zone').keyup(function(){

		var obj = $(this).val(); var len = obj.length; var count = 0; var one_ch=""; var total2 = 0;
		for (var i = 0; i < len ; i++){ one_ch = obj.charAt(i); if (escape(one_ch).length > 4) { count = count + 2; total2 = i; }else { count = count + 1; total2 = i; } }
		if (count > $('.tot_msg').val()*1) { alert("문자 수를 확인하여 주시기 바랍니다."); }else{ $('.curr_msg').val(count); }

	});

	$('.sms_kind').change(function(){
		if($(this).val()=='1'){
			$('.mms_file').hide();
			$('.tot_msg').val('90');
			$('.sms_title').hide();
		}else if($(this).val()=='2'){
			$('.mms_file').show();
			$('.tot_msg').val('2000');
			$('.sms_title').show();
		}else if($(this).val()=='3'){
			$('.mms_file').hide();
			$('.tot_msg').val('2000');
			$('.sms_title').show();
		}
	});

	$('.sms_num').change(function(){
		if($(this).val()=='1'){
			$('.toone').show();
			$('.tomany').hide();
		}else{
			$('.tomany').show();
			$('.toone').hide();
		}
	});

});

function sms_forms(sf) {

	if(sf.msg_cont.value=="") {
		alert("내용을 입력하세요");
		sf.msg_cont.focus();
		return false;
	}


	if(sf.sms_num.value=='1'){
		if(sf.tonum.value=="") {
			alert("문자를 받을 번호를 입력하세요");
			sf.tonum.focus();
			return false;
		}
	}else if(sf.sms_num.value=='2'){
		if(sf.tonums.value=="") {
			alert("문자를 받을 번호들을 입력하세요");
			sf.tonums.focus();
			return false;
		}
	}

	if(sf.fromnum.value=="") {
		alert("문자를 보내는 입력하세요");
		sf.fromnum.focus();
		return false;
	}

	return true;
}
</script>

<div id='sms_sender_wrap'>
<form name='sms_form2' method="post" enctype="multipart/form-data" onSubmit="return sms_forms(this);" action="../admin/sms_sender.php">
	<input type="hidden" name="group" value="<?=$group?>" />
	<input type="hidden" name="code" value="<?=$code?>" />
	<input type="hidden" name="m1" value="<?=$m1?>" />
	<input type="hidden" name="m2" value="<?=$m2?>" />
	<input type="hidden" name="no" value="<?=$no?>" />
	<input type="hidden" name="sno" value="<?=$sno?>" />
	<input type="hidden" name="search_para" value="<?=$search_para?>" />
	<input type="hidden" name="cmtMode" value="<?=$cmtMode?>" />
	<input type="hidden" name="cno" value="<?=$cno?>" />
	<div id='msg_zone_wrap'>
		<textarea class='msg_zone' name='msg_cont'></textarea>
		<div class='msg_count'><input type='text' class='curr_msg' value='0'> / <input type='text' class='tot_msg' value='90'> byte</div>
	</div>

	<div id='sms_set'>
		<div>
			<select name='sms_kind' class='sms_kind'>
				<option value='1'>SMS</option>
				<option value='2'>MMS</option>
				<option value='3'>LMS</option>
			</select>
			<select name='sms_num' class='sms_num'>
				<option value='1'>대인</option>
				<option value='2'>다중</option>
			</select>
		</div>
		<div class='mms_file'><input type='file' class='file' name='sms_file'></div>
	</div>
<?
	$hphone = $row[hphone1].$row[hphone2].$row[hphone3];
?>
	<div id='sms_case'>
		<div class='toone'>
			받는 번호:
			<span class='tonum_wrap'><input type='text' name='tonum' value="<?=$hphone?>"></span>
		</div>
		<div class='tomany'>
			번호들을 (,)로 번호를 추가해주세요.
			<span class='tonums'>
				<textarea name='tonums'></textarea>
			</span>
		</div>
	</div>

	<div id='sms_send'>
		보내는 번호:
<?
	$send_num = str_replace("-","",$adm_sql[adm_phone]);
?>
		<span><input type='text' name='fromnum' value="<?=$send_num?>" readonly></span>
		<div class='sms_title'>제목:<span><input type="text" name="sms_title" size="20"></span></div>
	</div>

	<div id='sms_btn'>
		<input type='image' src='./img/sms_btn.gif' alt='메시지 전송'>
	</div>
</form>
</div>
