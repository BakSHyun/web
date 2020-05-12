<? include "../inc/head.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/sub.css">

<script>
function check_quick(frm){
	if(frm.name.value=="") {
		alert("이름을 입력하세요");
		return false;
	}
	if(frm.cate1.value=="") {
		alert("진료과목을 선택하세요");
		return false;
	}
	if(frm.hphone1.value=="" || frm.hphone2.value=="" || frm.hphone3.value=="") {
		alert("휴대폰 번호를 입력하세요");
		return false;
	}
	if(!frm.term_agree.checked){
		alert("작성을 위해서 개인정보 보호정책에 동의해 주시기 바랍니다.");
		return false;
	}
	if(!frm.term_agree2.checked){
		alert("SMS수신에 동의해 주시기 바랍니다.");
		return false;
	}
	return true;
}
</script>

<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>카톡상담</h2>
</div>

<div class='sub_content'>
	<img src="../img/sub/talk_img.jpg" alt="" />
	<form name="quick2" method="post" action="/beauty/inc/proc2_db.php" onSubmit="return check_quick(this);">
	<input type='hidden' name='code' value='quick_counsel2'>
	<input type="hidden" name="gcode" value="basic" />
	<input type="hidden" name="title" value="카톡상담 신청입니다." />
	<input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
	<input type="hidden" name="position" value="카톡상담(모바일)">
	<table class="tbl01 type01">
		<tr>
			<th>이름</th>
			<td><input type="text" class="rq_name" name="name" /></td>
		</tr>
		<tr>
			<th>연락처</th>
			<td><input type="text" class="rq_tel" name="hphone1" /> <input type="text" class="rq_tel" name="hphone2" /> <input type="text" class="rq_tel last" name="hphone3" /></td>
		</tr>
		<tr>
			<th>시술항목</th>
			<td>
				<select name="cate1" id="" class="rq_list">
				<option value="">-</option>
				<option value="여신성형">여신성형</option>
				<option value="FACE리봄">FACE리봄</option>
				<option value="BODY리봄">BODY리봄</option>
				<option value="DIET리봄">DIET리봄</option>
				<option value="Special Program">Special Program</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>상담내용</th>
			<td>
				<textarea name="contents" id="" cols="30" rows="10"></textarea>
				<p><input type="checkbox" name="term_agree" /> 개인정보취급방침 동의 <a href="../member/privacy.php"><span class="rq_btn ag_more">자세히보기</span></a> </p>
				<p><input type="checkbox" name="term_agree2" /> SMS 수신 동의</p>
			</td>
		</tr>
	</table>
	<p class="ag_cen"><input name="" type="image" class="btn01"  width="280" height="60" src="../img/comm/rq_content02_btn.jpg" alt="상담하기"/></p><br/>
	</form>
</div>

<? include "../inc/foot.php"; ?>
