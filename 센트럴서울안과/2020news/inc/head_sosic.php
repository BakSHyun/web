<!DOCTYPE html>
<html lang='ko'>
<? require_once $_SERVER[DOCUMENT_ROOT].'/amconfig.php'; ?>
<? require_once $_SERVER[DOCUMENT_ROOT].'/mpboard/inc/sys.php'; // 최신게시물 적용시 ?>
<head>
<meta charset="utf-8"/>
<meta name='author' content='br' />
<meta name='keywords' content='백내장, 녹내장, 망막질환, 초고도근시, 질환중점진료, 용산안과, 이촌동안과' />
<meta name='description' content='용산구 이촌동 안과, 백내장, 녹내장, 망막질환, 바른시력교정수술, CS엑스퍼트라섹, 질환중점진료' />
<meta property="og:title" content="센트럴서울안과">
<meta property="og:type" content="website" />
<meta property="og:description" content="용산구 이촌동 안과, 백내장, 녹내장, 망막질환, 바른시력교정수술, CS엑스퍼트라섹, 질환중점진료">
<meta property="og:image" content="https://www.cseye.net/2020news/img/main/cs_sosic_new01.jpg" />
<meta property="og:url" content="https://www.cseye.net/2020news/" />
<link rel="image_src" href="https://www.cseye.net/2020news/img/main/cs_sosic_new01.jpg" />
<meta name='viewport' content='width=640,user-scalable=no, target-densitydpi=device-dpi' />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>


<title>:: 센트럴서울안과 모바일 ::</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./css/common.css">
	<link rel='stylesheet' href='./css/main.css' media='all' />
<link rel='stylesheet' href='./css/sub.css' media='all' />
<link rel='stylesheet' href='./css/font-awesome.min.css' media='all' />
<link rel='stylesheet' href='./css/jquery.bxslider.css' media='all' />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146780112-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146780112-1');
</script>


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WFWB4PK');</script>
<!-- End Google Tag Manager -->

<script type="text/javascript" src="./js/jquery-1.9.1.min.js" ></script>
<script type="text/javascript" src="./js/jquery.easing.1.3.min.js" ></script>
<script type='text/javascript' src='./js/jquery.iosslider.min.js'></script>
<script type="text/javascript" src = "./js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="./js/common.js" ></script>
<script type="text/javascript" src="./js/main.js" ></script>
<script>
function hgoBack() {
    window.history.back();
}
</script>
</head>
<body>
<!--[S]레이어-->
<div id='document'>


<!-- 팝업추가 -->
<?
$todate = date("YmdHi");
{?>
<script type="text/javascript">

function pop_close3(){
	document.getElementById('pop_wrap3').style.display="none";
	var date = new Date();
	date.setTime(date.getTime() + (1*24*60*60*1000));
	document.cookie="popup=1;expires="+ date.toGMTString() + ";path=/";
}

function pop_close4(){
	document.getElementById('pop_wrap4').style.display="none";
	var date = new Date();
	date.setTime(date.getTime() + (1*24*60*60*1000));
	document.cookie="popup=1;expires="+ date.toGMTString() + ";path=/";
}

</script>
<style>
#pop_wrap3 {width:100%;height:1600px;position:absolute;z-index:999999;}
#pop_wrap3 div {padding-bottom:2px;width:475px;font:bold 18px/25px "dotum";color:#fff;position:relative;text-align:right;margin:0 auto;top:0px;text-align: center;}
#pop_wrap3 div a {display:block;color:#fff;background: #000;width: 475px;margin: 0 auto;font-size:22px;padding:5px 0}

#pop_wrap4 {width:100%;height:1600px;position:absolute;z-index:9999999;}
#pop_wrap4 div {padding-bottom:2px;width:614px;font:bold 18px/25px "dotum";color:#fff;position:relative;text-align:right;margin:0 auto;top:106px;text-align: center;}
#pop_wrap4 div a {display:block;color:#fff;background: #000;width: 614px;margin: 0 auto;font-size:22px;padding:5px 0}

</style>

<?
$bname=basename($_SERVER['REQUEST_URI'],'.php');
if(!$_COOKIE[popup] && $bname=='main'){ ?>

<?/*?>
 <div id='pop_wrap3'>
	<div>
		<a href="http://cseye.net/m/landing/landing01.php" target="_blank"><img src='/m/img/main/pop160629.jpg'></a>
		<a onclick='pop_close3();'>오늘 하루 보지 않기</a>
	</div>
</div>
<?*/?>

 <div id='pop_wrap4' style="display:none">
	<div>
		<img src='/m/img/main/popup170918_m.jpg' style="width:614px;">
		<a onclick='pop_close4();'>오늘 하루 보지 않기</a>
	</div>
</div>

<? }} ?>
<!--팝업-->

		<div id='head_wrap' style="width: 640px;background: #fff;margin: 0 auto;">
			<img src="./img/main/cs_sosichead01.jpg" alt="" usemap="#h001"  />
			<map name="h001">
				<area shape="rect" coords="0,0,110,97" href="javascript:hgoBack()">
				<area shape="rect" coords="110,0,640,97" href="https://www.cseye.net/2020news/">
			</map>
		</div>

