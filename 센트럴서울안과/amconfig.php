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

require_once $_SERVER["DOCUMENT_ROOT"]."/./admin/inc/config.php";
//require_once $_SERVER["DOCUMENT_ROOT"]."/./amlog/log.php";
?>