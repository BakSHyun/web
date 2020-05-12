<? include "../inc/head.php" ?>
<style type="text/css">
input[type=checkbox].s_checkbox {position:relative;top:-1px;margin-right:5px;width:15px;height:15px;border:0;border-radius:0;background:url(../mpboard/skin/txt_res_counsel_type1/skin_images/chk_img.gif) no-repeat 0 0;appearance:none;-webkit-appearance:none;-moz-appearance:none;background-size:15px 30px;}
h2.board_title {color:#333;padding:6px 12px;font-size:14px;font-weight:bold;}
h2.board_title i {position:relative;top:1px;color:#bbb;}
/*글쓰기*/
.agreement_wrap {}
.agreement_wrap .agree_form {padding:15px 15px 10px 15px;border:1px solid #e4e4e4;border-top:2px solid #1D5578;background:#fafafa;}
.agreement_wrap .agree_form textarea {padding:12px;font:normal 13px "dotum";width:100%;height:60px;border:1px solid #d9d9d9;color:#7d7d7d;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
.agreement_wrap .agree_form .agree_check {margin-top:5px;}
.agreement_wrap .agree_form .agree_check .s_checkbox {}


.bbs_write {width:100%; margin:30px 0 10px 0;    border-top: 2px solid #1D5578;}
.bbs_write thead {}
.bbs_write tbody th {height:35px;border-bottom:1px solid #d5d7d9;font:normal 13px "dotum";color:#212121;    background: #f7f7f7;}
.bbs_write tbody td {padding:5px 10px;height:45px;border-bottom:1px solid #d5d7d9;font:normal 13px "dotum";position:relative;}
.bbs_write tbody td.agree {position:relative;}
.bbs_write tbody td textarea.contents {width:510px; height:200px;}
.bbs_write tbody td input.text {width:256px;padding-left:5px;line-height:30px;height:30px;border:1px solid #ced1d3;font:normal 13px "dotum";}
.bbs_write tbody td input.text2 {width:90px;padding-left:5px;line-height:30px;height:30px;border:1px solid #ced1d3;font:normal 13px "dotum";}
.bbs_write tbody td input.text3 {width:95%;padding-left:5px;line-height:30px;height:30px;border:1px solid #ced1d3;font:normal 13px "dotum";}
.bbs_write tbody td select {height:30px;font:normal 13px "dotum";}
.bbs_write tbody td textarea {width:95%;height:40px;font:normal 13px "dotum";border:1px solid #d9d9d9;color:#555;padding:3%;}


</style>
<script>
function check_mini(frm){
if(frm.agreecheck.checked != true) {
		alert("개인정보 이용약관에 동의하여 주시기 바랍니다.");
		return false;
	}
	if(frm.name.value=="") {
		alert("이름을 입력하세요");
		return false;
	}

	if(frm.hphone1.value=="" || frm.hphone2.value=="" || frm.hphone3.value=="") {
		alert("번호를 입력하세요");
		return false;
	}


	return true;
}
</script>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 커뮤니티 > <strong>전화상담 신청 </strong></div>
	<? include "../inc/left.php" ?>
<form name="form" method="post" action="/inc/proc_db.php" onSubmit = "return check_mini(this);">
	<input type='hidden' name='code' value='kakao_sub'>
	<input type='hidden' name='cate3' value='카카오페이지'>
	<input type="hidden" name="position" value="카카오페이지">
	<input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
	<div class="sub_cnt">
		<img src="../img/board/board_img13.jpg" alt="전화상담 신청 " />
		<div class="section" style="padding-top:40px;"><img src="../img/sub/counsel3_1.jpg" alt="" border="0" usemap="#map01"	 />
			<map name="map01">
				<area shape="rect" coords="565,101,777,279" href="/07_counsel/counsel1.php" alt="상담" />
				<area shape="rect" coords="992,102,1200,279" href="/07_counsel/counsel2.php" alt="예약" />
				<area shape="rect" coords="780,102,988,279" href="http://pf.kakao.com/_xlmiNM/chat" alt="카카오" target="_blank"/>
			</map>
		</div>
		<div class="board_wrap">
			<div class="agreement_wrap">
				<h2 class="board_title">개인정보 취급방침 동의</h2>
				<div class="agree_form">
					<textarea readonly>&lt;개인정보 수집, 이용 동의 안내&gt;

*가입필수정보
※ 수집 항목 : 이름, 이메일, 전화번호,
※ 수집 목적 : 상담 서비스 이행을 위한 연락
※ 보유 기간 : 1년(상담 목적 달성 확인시)</textarea>
					<div class="agree_check"><input type="checkbox" name="agreecheck" value="1" tabindex="1" class="s_checkbox" checked=""> 위 개인정보 보호정책에 동의합니다.</div>
					<p>※ 동의를 거부할 수 있습니다. 동의 거부시에는 회원서비스 이용이 제한됩니다.</p>
				</div>
			</div>

			<table class="bbs_write">
				<tr>
					<th>이름</th>
					<td><input name="name" type="text" class="text" maxlength="10" value=""></td>
				</tr>
				<tr background="">
					<th>휴대전화</th>
					<td>
						<select name="hphone1">
							<option value="010">010</option>
							<option value="070">070</option>
							<option value="016">016</option>
							<option value="017">017</option>
							<option value="018">018</option>
							<option value="019">019</option>
						</select>
						-
						<input name="hphone2" type="text" class="text2" maxlength="4">
						-
						<input name="hphone3" type="text" class="text2" maxlength="4">
					</td>
				</tr>
			</table>


			<!--<p style="font-size:13px;">※ 성함과 연락처를 남겨주시면, 센트럴서울안과에서 병원 업무시간 중 카카오톡으로 인사드립니다.<br/>
※ 직접 상담 문의 원하시는 분은 <strong style="color:#F17C03">카카오톡 아이디 검색</strong>에서 <strong style="color:#F17C03">'cseye365'</strong>를 검색하세요.</p>-->


<ul style="width: 400px;    margin: 20px auto 20px auto;    text-align: right;">
	<li><input type="submit" style="border:1px solid #4E4574;background: #1D5578; color:#fff; width:100%; height:35px; line-height:35px; text-align:center; font-size:13px; font-weight:bold; cursor:pointer; text-decoration:none; display:block; text-shadow:0px 0px 0px #000;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;" value="상담신청하기"></li>
</ul>
		</div>
		</form>
	</div>
</div>

<? include "../inc/foot.php" ?>