<?
/* 키워드추적 */
if($_GET[n_media] && $_GET[n_keyword]) {
	// 네이버
	$nf_kwd = "NV_" . $_GET[n_media] . "_" . urldecode($_GET[n_query]) . "_" .$_GET[n_rank] . "_" . urldecode($_GET[n_keyword]);
	//setcookie("nf_kwd", $nf_kwd ,time()+3600*24, "/");
	$_SESSION['nvkwd']=$nf_kwd;
}
else if($_GET[DMSKW] && $_GET[DMKW]) {
	// 다음
	$nf_kwd = "DM_" . $_GET[DMCOL] . "_" . urldecode($_GET[DMKW]);
	//setcookie("nf_kwd", $nf_kwd ,time()+3600*24, "/");
	$_SESSION['nvkwd']=$nf_kwd;
}
else if($_GET[OVRAW] && $_GET[OVKEY]) {
	// 오버추어
	$nf_kwd = "OV_" . $_GET[OVMTC] . "_" . urldecode($_GET[OVKEY]);
	//setcookie("nf_kwd", $nf_kwd ,time()+3600*24, "/");
	$_SESSION['nvkwd']=$nf_kwd;
}
else if($_GET[gclid]) {
	// 구글
	$nf_kwd = "GL_" . $_GET[gclid] . "_";
	//setcookie("nf_kwd", $nf_kwd ,time()+3600*24, "/");
	$_SESSION['nvkwd']=$nf_kwd;
}
/* 키워드추적 */

/*방문전 페이지 기록*/
if(!$_SESSION['reffer_session']){
	$reffer = $_SERVER['HTTP_REFERER'];
	$_SESSION['reffer_session'] = $reffer;
}

?>
<!DOCTYPE HTML>
<html lang='ko'>
<head>
<meta charset='utf-8'/>
<meta name='keywords' content='센트럴안과' />
<meta name='description' content='센트럴안과' />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name='viewport' content='width=640,user-scalable=yes, target-densitydpi=device-dpi' />
<title>센트럴안과</title>
<link rel='stylesheet' media='all'  href='css/common.css' />
<link rel='stylesheet' href='css/font-awesome.min.css' media='all'>
<script type='text/javascript' src='js/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='js/jquery-1.11.2ui.js'></script>
</head>
<body>
<div class="document">

		<div class="container_wrap"><!-- 컨텐츠 -->

			<div><img src="img/landing05_0101.jpg" alt=""></div>
			<div><img src="img/landing05_0102.jpg" alt=""></div>
			<div><img src="img/landing05_0103.jpg" alt=""></div>
			<div><img src="img/landing05_0104.jpg" alt=""></div>
			<div><img src="img/landing05_0105.jpg" alt=""></div>
			<div><img src="img/landing05_0106.jpg" alt=""></div>
			<div><img src="img/landing05_0107.jpg" alt=""></div>


			<form name="quick_counsel" method="post" action="/inc/proc3_db.php" onSubmit = "return check_mini(this);" style="position:relative; z-index:10000">
			<input type="hidden" name="code" value="landing05_m">
			<input type="hidden" name="cate3" value="CS 엑스퍼트 라섹M">
			<input type="hidden" name="position" value="CS 엑스퍼트 라섹M">
			<input type="hidden" name="cate1_input" value="MOBILE">
			<input type="hidden" name="cate2_input" value="<?=$nf_kwd?>">
			<input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">

			<?php include_once "bottom_counsel.php"; ?>

			</form>
		</div>


</div><!-- .document E -->
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
</body>
</html>