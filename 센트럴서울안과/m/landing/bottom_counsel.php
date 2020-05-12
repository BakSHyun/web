<style type="text/css">
.footQuickBtn{position:fixed;bottom:0px;z-index:99999;text-align:center;width:100%; max-width:640px;}
.footQuickWrap{position:fixed;bottom:-328px;z-index:9;display:none;width:100%; max-width:640px;}
.footQuickWrap label{font: normal 30px "NanumGothic";}
.footQuickWrap input{height:50px; font-size:30px;border:0; }
.footQuickWrap select{height:50px; font-size:30px; border:0;}
.footQuickWrap input[type="checkbox"]{width:40px; height:40px;}
.cost_quickform{position:relative; font: bold 30px "NanumGothic"; background:#2b65ce; padding:30px 3% 30px; color:#fff; }
.cost_quickform li{padding-top:1%;clear:both;}
.cost_quickform span{display:block;float:left;width:100px;}
.footQuickShow{text-align: center; }
.counsel_btn{position:absolute; right:20px; top:200px; background-color:#00afee; color:#fff; width:156px; height:162px !important; text-align:center; font-weight:bold; font-size:33px !important; -webkit-appearance:none; cursor:pointer}


.privacy_pop2 {width:100%; display:none; position:fixed; bottom:0px; z-index:100000000}
.pop_show2{cursor:pointer}
.prviacy-wp{position:relative; width:640px;}
.pop_close2_wrap {width:100%; height:50px; font-size:30px; line-height:50px; background-color:#0f0f0f; text-align:center; color:#fff;}
.pop_close2_wrap > .pop_close2{cursor:pointer}
.foot_counsel img{width:100%;}
</style>
<script type="text/javascript">
$(function(){
	$(".footQuickBtn").bind("click",function(){
		$(".footQuickWrap").show().animate({
			"bottom":0
		},function(){
			$(".footQuickBtn").hide();
			$(".footQuickShow").show();
		})
	})
	$(".footQuickShow").bind("click",function(){
		$(".footQuickWrap").animate({
			"bottom":-328
		},function(){
			$(".footQuickWrap").hide();
			$(".footQuickBtn").show();
			$(".footQuickShow").hide();
		})
	})
})
</script>
<script language="JavaScript">

function check_mini(cf) {

	if(cf.name.value=="") {
		alert("이름을 입력하세요");
		cf.name.focus();
		return false;
	}

	if(cf.hphone1.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone1.focus();
		return false;
	}

	if(cf.hphone2.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone2.focus();
		return false;
	}

	if(cf.hphone3.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone3.focus();
		return false;
	}

	if(cf.contents.value=="") {
		alert("내용을 입력하세요");
		cf.contents.focus();
		return false;
	}

	if(cf.m_agree.checked == false) {
		alert("개인정보 수집동의에 체크가 필요합니다.");
		cf.m_agree.focus();
		return false;
	}

	return true;
}

$(document).ready(function(){
	$('.pop_show2').click(function(){
		$('.privacy_pop2').show();
	});
	$('.pop_close2').click(function(){
		$('.privacy_pop2').hide();
	});
});

</script>
<div class="foot_counsel">
	<div class="footQuickBtn"><img src="img/foot_counsel.png" alt="" style="vertical-align:bottom"></div>
	<div class="footQuickWrap">
		<div class="footQuickShow"><img src="img/foot_counsel.png" alt="" style="vertical-align:bottom"></div>
		<div><img src="img/counsel_tt.jpg" alt=""></div>
		<ul class="cost_quickform">
			<li style="padding-top:0px;">
				<span><label>이름</label></span>
				<input name="name" title="고객성함" class="required" style="width:330px;" type="text" maxlength="10">
			</li>
			<li>
				<span><label>연락처</label></span>
				<select name="hphone1" title="연락처" class="selected" style="width:105px;">
				<option value="">선택</option>
				<option value="010">010</option>
				<option value="011">011</option>
				<option value="016">016</option>
				<option value="017">017</option>
				<option value="018">018</option>
				<option value="019">019</option>
				</select>
				<input name="hphone2" title="전화번호" class="required" style="width:110px;" type="tel" maxlength="4">
				<input name="hphone3" title="전화번호" class="required" style="width:110px;" type="tel" maxlength="4">
			</li>
			<li>
				<span><label>내용</label></span>
				<input name="contents" title=" 상담내용" class="required" style="width:330px;" type="text">
			</li>
			<li style="padding:3% 2% 0 0; float:left;font-size:30px;">
				<input name="m_agree" title="개인정보수집동의" class="checked" type="checkbox" value="Y">
				개인정보수집동의
				<a style="color:#00bfff;font-size:30px;text-decoration:none;" class="pop_show2">[자세히 보기]</a>
			</li>
			<div style="clear:both;"></div>
		</ul>
		<ul>
			<li>
				<input type="submit" value="실시간상담" class="counsel_btn">
			</li>
		</ul>
	</div>
</div>

<div class="privacy_pop2">
	<div class="prviacy-wp">
		<img src="img/privacy_pop.jpg" alt="" style="widh:100%">
		<p class="pop_close2_wrap"><span class="pop_close2">[창닫기]</span></p>
	</div>
</div>