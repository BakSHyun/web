		<!-- <ul class="foot_icon">
			<li><a href="../07_counsel/counsel1.php"><img src="../img/main/f_icon01.jpg" alt="온라인상담" /></a></li>
			<li><a href="http://pf.kakao.com/_xlmiNM/chat" target="_blank"><img src="../img/main/f_icon04.jpg" alt="카카오예약상담" /></a></li>
			<li class="last"><a href="../01_intro/intro6.php"><img src="../img/main/f_icon03.jpg" alt="오시는길" /></a></li>
		</ul> -->
		<ul class="foot_icon">
			<li><a href="../07_counsel/counsel1.php"><img src="../img/main/f_n_icon01.jpg" alt="온라인상담" /></a></li>
			<li><a href="http://pf.kakao.com/_xlmiNM/chat" target="_blank"><img src="../img/main/f_n_icon02.jpg" alt="카카오예약상담" /></a></li>
			<li class="last"><a href="../01_intro/intro6.php"><img src="../img/main/f_n_icon03.jpg" alt="오시는길" /></a></li>
		</ul>
		<!-- 푸터 -->
		<div class='foot_box'>
			<div class="f_copy">
				<ul>
				<?if(!$_SESSION[userid]) {?>
					<li><a href="../member/login.php?return_values=/">로그인</a></li>
					<li><a href="../member/join.php">회원가입</a></li>
				<?} else {?>
					<li><a href='/ammember/logout_session.php?return_url=/m/'>로그아웃</a></li>
					<li><a href="<?if($_SESSION['gcode'] == 'social_secret'){?>javascript:alert('SNS계정 로그인 회원은 정보수정을 지원하지 않습니다.');<?}else{?>../member/edit.php<?}?>">정보수정</a></li>
				<?}?>
					<li class="last"><a href="../member/privacy.php">개인정보취급방침</a></li>
				</ul>
				<p class="f_tel">대표전화 : <span class="">02)792-2226</span><br/> </p>
				<p>센트럴서울안과의원 ::	서울 특별시 용산구 이촌로 224 한강쇼핑 2층   <br/>
					대표자명 : 황종욱. 최재완. 김균형 | 사업자등록번호 : 106-90-76793<br/>
				</p>
				<p class="copy">COPYRIGHT 2015. CENTRAL SEOUL EYE CENTER ALL RIGHTS RESERVED.</p>

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