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
<?
// 파일 최상단에 넣어 주세요
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
?>
<?
	require_once $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/_util/pageview.php"; // 접속 통계
	require_once $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/_util/statistics.php"; // 유입 통계
	//exit;
?>
<?

$query_string = ($_SERVER["QUERY_STRING"] == ""?"":"?".$_SERVER["QUERY_STRING"]);
$arr_browser = array("iPhone", "iPod", "IEMobile", "Mobile", "lgtelecom", "PPC");
for($iindexi = 0; $indexi < count($arr_browser); $indexi++) {
	if(strpos($_SERVER['HTTP_USER_AGENT'], $arr_browser[$indexi]) == true) {
		//header("Location: /m/main/main.php".$_SERVER["QUERY_STRING"]);
		header("Location: https://www.cseye.net/m/main/main.php".$_SERVER["QUERY_STRING"]);
		exit;
	}
}
//$domain = $_SERVER["HTTP_HOST"];
//header( "Location: /main/main.php?".$_SERVER["QUERY_STRING"] );

?>
<script language=javascript> location.href = "https://www.cseye.net/main/main.php<?=$query_string?>"; </script>
<!-- <script language=javascript> location.href = "http://www.cseye.net/main/main.php<?=$query_string?>"; </script> -->
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
<img height="1" width="1"
src="https://www.facebook.com/tr?id=487541084748222&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->