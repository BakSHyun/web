<? include "../inc/rq_quick.php" ?>
<script>
function check_minia(frm){
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

	if(frm.cate1.value=="") {
		alert("진료과목 입력하세요");
		return false;
	}


	return true;
}
</script>
		<form name="form" method="post" action="/inc/proc_db.php" onSubmit = "return check_minia(this);">
			<input type='hidden' name='code' value='quick_contact'>
			<input type='hidden' name='cate3' value='빠른상담문의'>
			<input type="hidden" name="position" value="빠른상담문의">
			<input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
			<div class="btm_counsel">
				<div class="counsel_wrap">
					<input type="text" class="c_name" name="name" />
					<input type="text" class="c_phone1" name="hphone1" maxlength="3" />
					<input type="text" class="c_phone2" name="hphone2" maxlength="4" />
					<input type="text" class="c_phone3" name="hphone3" maxlength="4" />
					<input type="checkbox" class="c_agree" name="agreecheck" />
					<select name="cate1" id="" class="c_select">
						<option value="">선택하세요</option>
						<option value="노안∙백내장">노안∙백내장</option>
						<option value="초고도근시">초고도근시</option>
						<option value="녹내장">녹내장</option>
						<option value="망막질환">망막질환</option>
						<option value="드림렌즈">드림렌즈</option>
						<option value="기타">기타</option>
					</select>
					<textarea name="contents" id="" class="c_txt"></textarea>
					<input type="image" src="../img/sub/c_btn.png" class="c_btn01" />
				</div>
			</div>
		</form>

		<div class="footer_top ">
			<div class="foot_box">
				<ul class="foot_img">
					<li style="padding:0 15px 0 -1px">
						<img src="../img/main/foot_new_01.jpg" alt="" style="padding:0;" />
						<p>보건복지부 후원</br>메디컬 헬스케어 대상</p>
					</li>
					<li>
						<img src="../img/main/foot_new_02.jpg" alt="" / style="padding-top:0px;">
						<p>헬스조선 선정</br>안과 ‘최초‘ 좋은병원</p>
					</li>
					<li>
						<img src="../img/main/foot_new_03.jpg" alt="" / style="padding-top:0px;">
						<p>세계안과학회</br>5회 연속 초청강연</p>
					</li>
					<li>
						<img src="../img/main/foot_new_04.jpg" alt="" />
						<p>EVO+ ICL</br>Expert Surgeon 선정</p>
					</li>
					<li>
						<img src="../img/main/foot_new_05.jpg" alt="" />
						<p>백내장수술</br>우수병원 인증</p>
					</li>
					<li style="margin-right:0;">
						<img src="../img/main/foot_new_06.jpg" alt="" />
						<p>백내장수술</br>아시아태평양레퍼런스 센터</p>
					</li>
				</ul>
			</div>
		</div>
		<!--<div class="footer_top ">
			<div class="foot_box">
				<ul class="foot_img">
					<li style="padding:0 15px 0 30px">
						<img src="../img/main/foot_03.jpg" alt="" style="padding:0;" />
						<p style="padding-left:10px;">헬스조선 선정</br>좋은병원</p>
					</li>
					<li>
						<img src="../img/main/foot_01.jpg" alt="" />
						<p>한국소비자만족지수</br>3회 연속 1위</p>
					</li>
					<li>
						<img src="../img/main/foot_06.jpg" alt="" />
						<p>세계안과학회 4회 연속 </br>초청강연 (2012-2018)</p>
					</li>
					<li>
						<img src="../img/main/foot_04.jpg" alt="" />
						<p>백내장 수술</br>우수병원 인증</p>
					</li>
					<li>
						<img src="../img/main/foot_05.jpg" alt="" />
						<p>백내장 수술 </br>아시아태평양레퍼런스 센터 </p>
					</li>
					<li style="margin-right:0;">
						<img src="../img/main/foot_07.jpg" alt="" />
						<p>AQUA ICL</br>전문센터</p>
					</li>
				</ul>
			</div>
		</div>-->
		<div class="footer_btm ">
			<div class="f_menu">
				<h1>대표전화 : </h1><strong>02)792-2226</strong>
				<ul>
					<li><a href="../member/service1.php">환자권리장전</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
					<li><a href="../member/service.php">이용약관</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
					<li><a href="../member/privacy.php">개인정보취급방침</a></li>
				</ul>
			</div>
			<div class="copy">
				<div class="copy_txt">
					<p>
						서울특별시 용산구 이촌로 224 한강쇼핑센터 2층<br/>
						상호명 : 센트럴 서울안과의원&nbsp;&nbsp;&nbsp;대표자명 : 최재완, 황종욱, 김균형&nbsp;&nbsp;&nbsp;사업자등록번호 : 106-90-76793<br/>
						<span>COPYRIGHT 2015. CENTRAL SEOUL EYE CENTER ALL RIGHTS RESERVED.</span>
					</p>
					<img src="../img/main/foot_img.jpg" class="f_img" alt="" />

				</div>

			</div>
		</div>
	</div>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '487541084748222');
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" src="https://www.facebook.com/tr?id=487541084748222&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
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

<script type="text/javascript">
    var roosevelt_params = {
        retargeting_id:'fIVYeChrKV9rkZBHfEOcnQ00',
        tag_label:'qOsV7XWlRjGRjHrRb5RbYw'
    };
</script>
<script type="text/javascript" src="//adimg.daumcdn.net/rt/roosevelt.js" async></script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WFWB4PK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


</body>
</html>