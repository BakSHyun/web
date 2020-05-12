<style type="text/css">
#program_container_wrap{}
.pro-wp{position:relative; width:800px; height:560px; background-color:#f2f2f2; margin:0 auto;}
.logo-ps{position:absolute; top:65px; left:125px;}
.pro-ps{position:absolute; top:50px; left:125px;}
.pro-ps label{width:70px; font-size:18px; color:#252528; cursor:pointer; float:left; margin-right:25px;}
.pro-ps input{height:40px; border:1px solid #cfcfcf; box-sizing:border-box; float:left; font-size:14px; text-align:center;}
.wp-name , .wp-phone , .wp-email{display:block; margin-bottom:15px; vertical-align:middle;}
.wp-name:after{content:""; display:block; clear:both}
.wp-phone:after{content:""; display:block; clear:both}
.wp-email:after{content:""; display:block; clear:both}
.wp-chkbox:after{content:""; display:block; clear:both}

#in-name{width:470px !important;}
.in-hphone{width:154px !important; margin-right:4px}
#in-email{width:470px !important;}
.privacy{width:470px; height:75px; background-color:#fff; border:1px solid #cfcfcf; box-sizing:border-box; overflow-y:scroll;margin-left: 95px;}
.wp-chkbox{margin-top:15px;padding-left: 95px;letter-spacing: -1px;}
#in-chkbox{width:20px; height:20px; margin-right:10px}
.wp-btn{margin-top:25px; margin-left:110px;}
.wp-btn > button{border:0; cursor:pointer;}
.doc-experi-link{float:left; font-size:18px; font-weight:bold; text-align:center; text-decoration:none;  color:#fff; background-color:#d2a2a2; width:220px; height:45px; line-height:45px;}
.link-arr{float:left; box-sizing:border-box; border-left:1px solid #ed4946; width:40px; height:45px; line-height:45px; color:#fff; background-color:#d2a2a2; text-align:center; font-size:18px; display:inline-block;}
</style>

<div id="program_container_wrap">

	<div class="pro-wp">
		<div class="pro-ps">
			<form action="../inc/inc_proc_db.php" enctype="multipart/form2-data" name="procomm" method="post" onsubmit="return prochk()">
				<input type='hidden' name='gcode' value='basic'>
				<input type='hidden' name='code' value='event_list'>
				<input type='hidden' name='cate1' value='예약'>
				<input type="hidden" name="gourl" value="<?=$PHP_SELF?>" />
				<input type="hidden" name="position" value="이벤트자원">
				<input type="hidden" name="etc2" value="<?=$BDATA[no]?>">
				<input type="hidden" name="title" value="<?=$BDATA[title]?>">
				<div class="wp-name">
					<label for="in-name">이름</label>
					<input type="text" name="name" id="in-name" placeholder="이름을 입력하세요." maxlength="12">
				</div>
				<div class="wp-phone">
					<label for="in-phone">연락처</label>
					<input type="text" name="hphone1" id="in-phone" class="in-hphone" placeholder="첫번째번호" maxlength="3">
					<input type="text" name="hphone2" class="in-hphone" placeholder="가운데번호" maxlength="4">
					<input type="text" name="hphone3" class="in-hphone" placeholder="마지막번호" maxlength="4">
				</div>
				<div class="wp-email">
					<label for="in-email">이메일</label>
					<input type="text" name="email" id="in-email"  placeholder="ex)your@email.com" maxlength="40">
				</div>
				<div class="wp-email">
					<label for="in-email">궁금한점</label>
					<textarea name="contents" id="" style="width:470px; height:100px;border: 1px solid #cfcfcf;"></textarea>
					<!-- <input type="text" name="email" id="in-email"  placeholder="ex)your@email.com" maxlength="40"> -->
				</div>
				<div class="wp-textarea">
					<div class="privacy" >
						<br/><개인정보 수집, 이용 동의 안내><br/>
						*가입필수정보<br/>
						※ 수집 항목 : 이름, 전화번호<br/>
					</div>
				</div>
				<div class="wp-chkbox">
					<input type="checkbox" name="agree" id="in-chkbox"><label for="in-chkbox" style="font-size:13px; color:#252528; letter-spacing:-0.5px; width:500px;">동의합니다.(고객님은 동의를 거부할 수 있습니다. 거부시에는 해당 서비스 이용이 제한됩니다.)</label>
				</div>
				<div class="wp-btn">
					<button type="submit"><em class="doc-experi-link font-s">이벤트 신청하기</em><span class="link-arr">></span></button>
				</div>
			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
function prochk() {

	var form = document.procomm;

	if(form.name.value=="") {
		alert("이름을 입력하세요.");
		form.name.focus();
		return false;
	}
	if(form.hphone1.value=="") {
		alert("휴대전화번호를 입력하세요");
		form.hphone1.focus();
		return false;
	}
	if(form.hphone2.value=="") {
		alert("휴대전화번호를 입력하세요");
		form.hphone2.focus();
		return false;
	}
	if (form.hphone2.value.length < 3) {
		alert('가운데번호는 3자리 이상 써 주세요.');
		form.hphone2.focus();
		return false;
	}
	if(form.hphone3.value=="") {
		alert("휴대전화번호를 입력하세요");
		form.hphone3.focus();
		return false;
	}
	if (form.hphone3.value.length < 4) {
		alert('마지막번호는 4자리 이상 써 주세요.');
		form.hphone3.focus();
		return false;
	}
	if (form.hphone1.value.match(/[^0-9]/) || form.hphone2.value.match(/[^0-9]/) || form.hphone3.value.match(/[^0-9]/)) {
		alert('휴대전화번호는 숫자만 가능합니다.');
		return false;
	}
	if(!form.agree.checked){
		alert("개인정보수집 및 이용안내에에 동의해 주시기 바랍니다.");
		return false;
	}
	return true;
}
</script>