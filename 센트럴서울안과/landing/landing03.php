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
<meta name='keywords' content='센트럴 서울안과' />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name='viewport' content='width=1200,user-scalable=yes, target-densitydpi=device-dpi' />
<script type='text/javascript' src='../js/jquery-1.12.2.min.js'></script>
<script type='text/javascript' src='../js/jquery.easing.1.3.js'></script>
<title>:: 센트럴 서울안과 :: </title>

<style type="text/css">
body,div,p,img,a{margin:0; padding:0;}
img{border:0; vertical-align:top}
.document{width:100%; overflow:hidden}
.landing_container_wrap{position:relative; left:50%; margin-left:-1000px;}

</style>

</head>
<body>

<div class="document">

	<?php include_once "bottom_counsel_3.php";?>

	<div class="landing_container_wrap">
		<div><img src="img/landing03_0101.jpg" alt=""></div>
		<div><img src="img/landing03_0102.jpg" alt=""></div>
		<div><img src="img/landing03_0103.jpg" alt=""></div>
		<div><img src="img/landing03_0104.jpg" alt=""></div>
		<div><img src="img/landing03_0105.jpg" alt=""></div>
		<div><img src="img/landing03_0106.jpg" alt=""></div>
		<div><img src="img/landing03_0107.jpg" alt=""></div>
		<div><img src="img/landing03_0108.jpg" alt=""></div>
		<div><img src="img/landing03_0109.jpg" alt=""></div>
		<div><img src="img/landing03_0110.jpg" alt=""></div>
		<div><img src="img/landing03_0111.jpg" alt=""></div>
		<div><img src="img/landing03_0112.jpg" alt=""></div>
		<div><img src="img/landing03_0113.jpg" alt=""></div>
		<div><img src="img/landing03_0114.jpg" alt=""></div>
		<div><img src="img/landing03_0115.jpg" alt=""></div>
		<div><img src="img/landing03_0116.jpg" alt=""></div>
	</div>
</div>

</body>
</html>