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
<meta name='author' content='br' />
<meta name='keywords' content='센트럴 안내렌즈삽입술' />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name='viewport' content='width=1200,user-scalable=yes, target-densitydpi=device-dpi' />
<title>:: 센트럴 안내렌즈삽입술 :: </title>
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
	if(!cf.agree.checked){
		alert("작성을 위해서 이용자 약관에 동의해 주시기 바랍니다.");
		return false;
	}

	return true;
}

function gosite(){

}
</script>
</head>
<style type="text/css">
	*{margin:0;padding:0;overflow-x:hidden;}
	.cnt {min-width:1200px;margin-bottom:169px;}
	.cnt img{display:block; position:relative; left:50%; margin-left:-1000px;border:0; }
	.counsel{width:100%;background:url('img/counsel_bg.jpg') no-repeat center center;  position:fixed; bottom:0;  }
	.counsel .counsel_cnt{background:url('img/counsel_cntbg.jpg') no-repeat; width:1200px; height:169px;margin:0 auto; position:relative;}
	.counsel .counsel_cnt input{position:absolute;border:0;}
	.c_name{width:220px; height:25px;top:32px; left:375px;}
	.c_phone1{width:60px; height:25px; top:72px; left: 375px;}
	.c_phone2{width:60px; height:25px; top:72px; left: 455px;}
	.c_phone3{width:60px; height:25px; top:72px; left: 536px;}
	.c_time{width:100px; height:25px; top:32px; left: 700px;}
	.c_agree{width: 16px;height: 16px;top: 124px;left: 322px;}
	.c_txt{width: 280px;height: 70px;top: 75px;left: 700px;position:absolute;border:0px }
	.c_btn{top:17px; right:30px;}
	center{width:1200px; margin:0 auto;}
	center img{position: static !important;left: 0 !important;margin-left: 0 !important;}
	.a_link{position:absolute;left: 540px;top: 120px;width: 77px;height: 22px;text-indent:-99999px;overflow:hidden; }
	.quick{position: fixed;    right: 0;    top: 175px;}

</style>
<body>
	<div class="wrap">
		<div class="cnt">
			<img src="img/img01.jpg" alt=""/>
			<img src="img/img02.jpg" alt=""/>
			<img src="img/img03.jpg" alt=""/>
			<img src="img/img04.jpg" alt=""/>
			<img src="img/img05.jpg" alt=""/>
			<img src="img/img06.jpg" alt=""/>
			<img src="img/img07.jpg" alt=""/>
			<img src="img/img08.jpg" alt=""/>
			<img src="img/img09.jpg" alt=""/>
			<img src="img/img10.jpg" alt=""/>
		</div>
	<form name="form" method="post" action="/inc/proc3_db.php" onSubmit="return check_mini(this);">
		<input type="hidden" name="code" value="landing02 ">
		<input type="hidden" name="cate3" value="안내렌즈삽입술">
		<input type="hidden" name="position" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
		<input type="hidden" name="cate1_input" value="MOBILE">
		<input type="hidden" name="cate2_input" value="<?=$nf_kwd?>">
		<input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
		<div class="counsel">
			<div class="counsel_cnt">
				<input type="text" name="name" class="c_name"/>
				<input type="text" name="hphone1" class="c_phone1"/>
				<input type="text" name="hphone2" class="c_phone2"/>
				<input type="text" name="hphone3" class="c_phone3"/>
				<input type="text" name="cate1" class="c_time"/>
				<input type="checkbox" name="agree" class="c_agree"/>
				<textarea name="contents" id="" class="c_txt" ></textarea>
				<input type="image" src="img/btn01.png" class="c_btn" />
				<a href="../member/privacy.php" class="a_link" target="_blank"> 자세히 보기 </a>
			</div>
		</div>
	</form>
	</div>
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
</body>
</html>