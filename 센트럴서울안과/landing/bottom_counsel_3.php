<style type="text/css">
/* 하단 상담신청 폼 */
.form_wrap {width:100%; min-width:1200px; margin-top:155px; }
.form_bg {background:url('img/form_bg.png') no-repeat top center; width:2000px; height:155px; position:fixed; left:50%; margin-left:-1000px; top:0; z-index:99;}
.i_name{position:absolute; top:35px; left:1070px; }
.input_name {width:175px; height:25px;}
.i_phone1{position:absolute; top:72px; left:1070px; }
.input_phone1 {width:50px; height:25px;}
.i_phone2{position:absolute; top:72px; left:1132px; }
.input_phone2 {width:50px; height:25px;}
.i_phone3{position:absolute; top:72px; left:1194px; }
.input_phone3 {width:50px; height:25px;}
.i_contents{position:absolute; top:35px; left:1310px; }
.input_contents {width:175px; height:79px;}
.i_privacy{position:absolute; top:105px; left:1014px; overflow:hidden; font-size:12px; color:#fff}
.i_privacy label{margin-left:5px}
.i_privacy a{color:#76b6ff; cursor:pointer}
.i_btn {position:absolute; top:35px; left:1500px; }
.privacy_pop {display:none; position:fixed; left:50%; margin-left:-210px; top:155px; z-index:100}
.prviacy-wp{position:relative;}
.psa{position:absolute}
.hospital_ps01{top:97px; left:83px; font-size:16px; color:#222;}
.hospital_ps02{top:176px; left:210px; font-size:14px; color:#636363;}
.pop_close_wrap {width:790px; height:30px; font-size:14px; line-height:30px; background-color:#0f0f0f; text-align:right; color:#fff; padding-right:10px;}
.pop_close_wrap > .pop_close{cursor:pointer}
</style>

<div class="form_wrap">
	<div class="form_bg">
		<div class="form_position">
			<form name="ld_01" method="post" action="/inc/proc3_db.php" onSubmit = "return ld01_check();">
			<input type="hidden" name="code" value="landing05">
			<input type="hidden" name="cate3" value="안구건조증">
			<input type="hidden" name="position" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
			<input type="hidden" name="cate2_input" value="<?=$nf_kwd?>">
			<input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
				<div class="i_name"><input type="text" name="name" class="input_name"></div>
				<div class="i_phone1"><input type="text" name="hphone1" maxlength="3" class="input_phone1"></div>
				<div class="i_phone2"><input type="text" name="hphone2" maxlength="4" class="input_phone2"></div>
				<div class="i_phone3"><input type="text" name="hphone3" maxlength="4" class="input_phone3"></div>
				<div class="i_contents"><textarea name="contents" class="input_contents"></textarea></div>
				<div class="i_privacy"><input type="checkbox" name="privacy" id="privacy" style="float:left; width:15px; height:15px"><label for="privacy" style="float:left; margin-left:5px">개인정보취급방침에 동의합니다.</label> <a class="pop_show" style="margin-left:5px">[자세히보기]</a></div>
				<div class="i_btn"><input type="image" src="img/form_btn.png" border="0"></div>

			</form>
		</div>
	</div>
</div>
<div class="privacy_pop">
	<div class="prviacy-wp">
		<?php $hospital_name = "센트럴 서울안과"; ?>
		<h2 class="psa hospital_ps01"><?=$hospital_name?></h2>
		<p class="psa hospital_ps02"><?=$hospital_name?></p>
		<img src="img/pop_privacy.png" alt="">
		<p class="pop_close_wrap"><span class="pop_close">[창닫기]</span></p>
	</div>
</div>

<script type="text/javascript">
function ld01_check() {
	if(ld_01.name.value=="") {
		alert("이름을 입력하세요");
		ld_01.name.focus();
		return false;
	}

	if(ld_01.hphone1.value=="") {
		alert("휴대전화번호를 입력하세요");
		ld_01.hphone1.focus();
		return false;
	}

	if (ld_01.hphone1.value.length < 3) {
		alert('첫번째번호는 3자리 이상 써 주세요.');
		ld_01.hphone1.focus();
		return false;
	}

	if(ld_01.hphone2.value=="") {
		alert("휴대전화번호를 입력하세요");
		ld_01.hphone2.focus();
		return false;
	}

	if (ld_01.hphone2.value.length < 3) {
		alert('가운데번호는 3자리 이상 써 주세요.');
		ld_01.hphone2.focus();
		return false;
	}

	if(ld_01.hphone3.value=="") {
		alert("휴대전화번호를 입력하세요");
		ld_01.hphone3.focus();
		return false;
	}

	if (ld_01.hphone3.value.length < 4) {
		alert('마지막번호는 4자리 이상 써 주세요.');
		ld_01.hphone3.focus();
		return false;
	}

	if (ld_01.hphone1.value.match(/[^0-9]/) || ld_01.hphone2.value.match(/[^0-9]/) || ld_01.hphone3.value.match(/[^0-9]/)) {
		alert('휴대전화번호는 숫자만 가능합니다.');
		return false;
	}

	if(!ld_01.privacy.checked) {
		alert("개인정보처리방침에 동의해주세요");
		ld_01.privacy.focus();
		return false;
	}

	form.submit();
	return true;
}

$(document).ready(function(){
	$('.pop_show').click(function(){
		$('.privacy_pop').show();
	});
	$('.pop_close').click(function(){
		$('.privacy_pop').hide();
	});
});
</script>
<!-- LOGGER TRACKING SCRIPT V.40 FOR logger.co.kr / 36239 : COMBINE TYPE / DO NOT ALTER THIS SCRIPT. -->
<!-- COPYRIGHT (C) 2002-2011 BIZSPRING INC. LOGGER(TM) ALL RIGHTS RESERVED. -->
<script type="text/javascript">var _TRK_LID="36239";var _L_TD="ssl.logger.co.kr";var _FC_TRK_CN="27515";</script>
<script type="text/javascript">var _CDN_DOMAIN = location.protocol == "https:" ? "https://fs.bizspring.net" : "http://fs.bizspring.net";document.write(unescape("%3Cscript src='" + _CDN_DOMAIN +"/fs4/bstrk.js' type='text/javascript'%3E%3C/script%3E"));</script>
<noscript><img alt="Logger Script" width="1" height="1" src="https://ssl.logger.co.kr/tracker.tsp?u=36239&amp;js=N" /></noscript>
<!-- END OF LOGGER TRACKING SCRIPT -->
<!-- RealClick 리얼타겟팅 Checking Script V.20130115 Start-->
<script type='text/javascript'>
function loadrtgJS(b,c){var d=document.getElementsByTagName("head")[0],a=document.createElement("script");a.type="text/javascript";null!=c&&(a.charset="euc-kr");a.src=b;d.appendChild(a)}function load_rtg(b){loadrtgJS(("https:"==document.location.protocol?" https://":" http://")+b,"euc-kr")}load_rtg("event.realclick.co.kr/rtarget/rtget.js?rtcode=cseye");
</script>
<!-- RealClick 리얼타겟팅 Checking Script V.20130115 End -->