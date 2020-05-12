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
<meta name='keywords' content='센트럴 라섹' />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name='viewport' content='width=1200,user-scalable=yes, target-densitydpi=device-dpi' />
<title>:: 센트럴 라섹 :: </title>
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
			<img src="img/landing02_0101.jpg" alt=""/>
			<img src="img/landing02_0102.jpg" alt=""/>
			<img src="img/landing02_0103.jpg" alt=""/>
			<img src="img/landing02_0104.jpg" alt=""/>
			<img src="img/landing02_0105.jpg" alt=""/>
			<img src="img/landing02_0106.jpg" alt=""/>
			<img src="img/landing02_0107.jpg" alt=""/>
			<img src="img/landing02_0108.jpg" alt="" usemap="#Map_link01"/>
			<map name="Map_link01" id="Map_link01">
				<area shape="rect" coords="1008,1810,1211,1834" onclick="window.open('/01_intro/map_pop1.php','_blank','scrollbars=yes,width=640,height=800')" href="javascript:();" />
				<area shape="rect" coords="1008,2016,1201,2039" onclick="window.open('/01_intro/map_pop2.php','_blank','scrollbars=yes,width=640,height=800')" href="javascript:();" />
			</map>
			<img src="img/landing02_0109.jpg" alt=""/>
		</div>



	<form name="form" method="post" action="/inc/proc3_db.php" onSubmit="return check_mini(this);">
		<input type="hidden" name="code" value="landing03">
		<input type="hidden" name="cate3" value="라섹">
		<input type="hidden" name="position" value="<?=$PHP_SELF?>?<?=$_SERVER["QUERY_STRING"]?>">
		<!-- <input type="hidden" name="cate1_input" value="MOBILE"> -->
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
	<script type="text/javascript">
    var roosevelt_params = {
        retargeting_id:'fIVYeChrKV9rkZBHfEOcnQ00',
        tag_label:'qOsV7XWlRjGRjHrRb5RbYw'
    };
</script>
<script type="text/javascript" src="//adimg.daumcdn.net/rt/roosevelt.js" async></script>
</body>
</html>