		<div id="rq" <?if(strpos((string)$_SERVER['PHP_SELF'],"main")){?>style="display:none;"<?}?>>
		
			<style>
			.rq_open {display: block;}
			.rq_close {display: none;}
			</style>
			<script>


				function check_mini(frm){
					if(frm.name.value=="") {
						alert("이름을 입력하세요");
						return false;
					}

					if(frm.hphone1.value=="" || frm.hphone2.value=="" || frm.hphone3.value=="") {
						alert("번호를 입력하세요");
						return false;
					}

					if(frm.agree.checked != true) {
						alert("개인정보 이용약관에 동의하여 주시기 바랍니다.");
						return false;
					}



					return true;
				}

				function contents_remove(){
					//alert ('자바스크립트');
					$("#contents").val('');
				}
			</script>
			<div id="rq_wrap"  class="rq_open">
			<form name="form" method="post" action="/inc/proc_db.php" onSubmit="return check_mini(this);">
				<div class="phone_wrap">
						<input type="hidden" name="code" value="main_quick ">
						<input type="hidden" name="cate3" value="무료상담신청">
						<input type="hidden" name="position" value="무료상담신청">
						<textarea name="contents" id="contents" class="phone_txt" Onclick="javascript:contents_remove();">신속하고 간편한 상담문자 신청 서비스 입니다.문의사항을 남겨주시면 전문상담사가 전화로 친절하고 자세한 상담을 도와드립니다.</textarea>
						<input type="text" name="name" class="p_name" />
						<input type="text" name="hphone1" class="p_phone1" maxlength="3" />
						<input type="text" name="hphone2" class="p_phone2" maxlength="4" />
						<input type="text" name="hphone3" class="p_phone3" maxlength="4" />
						<input type="checkbox" name="agree" class="p_agree" />
						<input type="image" src="../img/main/phone_btn.png" class="p_btn"  />
						<a href="../member/privacy.php" class="p_more" target="_new">&lt;자세히보기></a>
				</div>
			</form>
			<a href="../07_counsel/kakao.php"><img src="../img/sub/rq_quick01.jpg" alt="카톡상담" class="m-t-10" />	</a>
			<img src="../img/sub/rq_quick02.jpg" alt="상담전화" class="m-t-10" />	
			<a href="../07_counsel/counsel1.php"><img src="../img/sub/rq_quick03.jpg" alt="온라인상담" class="m-t-10" style="margin-right: 7px;" />	</a>
			<a href="../01_intro/intro10.php"><img src="../img/sub/rq_quick04.jpg" alt="오시는길" class="m-t-10" /></a>	
			</div>
			<img src="../img/sub/rq_open.jpg" alt="" class="rq_closebtn" />	
		</div>

