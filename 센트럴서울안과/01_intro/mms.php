<? require_once $_SERVER[DOCUMENT_ROOT].'/amconfig.php'; ?>
<? require_once $_SERVER[DOCUMENT_ROOT].'/mpboard/inc/sys.php'; // 최신게시물 적용시 ?>
<!DOCTYPE HTML>
<html lang='ko'>
<head>
<meta charset='utf-8'/>
<meta name='author' content='br' />
<meta name='keywords' content='센트럴서울안과' />
<meta name='description' content='센트럴서울안과' />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name='viewport' content='width=1200,user-scalable=yes, target-densitydpi=device-dpi' />
<title>센트럴서울안과</title>
<link rel='stylesheet' href='../css/common.css' media='all' />
<link rel='stylesheet' href='../css/main.css' media='all' />
<link rel='stylesheet' href='../css/owl.carousel.css' media='all' />
<link rel='stylesheet' href='../css/owl.theme.css' media='all' />
<link rel='stylesheet' href='../css/owl.transitions.css' media='all' />
<link rel='stylesheet' href='../css/sub.css' media='all' />
<link rel='stylesheet' href='../css/font-awesome.min.css' media='all' />
<link rel='stylesheet' href='../css/jquery.bxslider.css' media='all' />
<script type='text/javascript' src='../js/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='../js/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='../js/jquery.bxslider.min.js'></script>
<script type='text/javascript' src='../js/owl.carousel.js'></script>
<script type='text/javascript' src='../js/kth_slider.js'></script>
<script type='text/javascript' src='../js/main.js'></script>
<script type='text/javascript' src='../js/common.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js'></script>
</head>
<body class="wrap" style="position:relative;">
<form name="frm_mms_process" method="post" action="mms_process.php" enctype="multipart/form-data"  onSubmit="return checkForm(this)">
	<div class="mms_wrap">
		<select name="hphone1" id="" class="phone_select">
			<option value="010">010</option>
			<option value="011">011</option>
			<option value="017">017</option>
			<option value="018">018</option>
			<option value="019">019</option>
		</select>
		<input type="tel" name="hphone2" class="phone01" />
		<input type="tel" name="hphone3" class="phone02" />
		<input type="image" src="../img/sub/mms_btn01.jpg" class="mms_btn01" />
		<img src="../img/sub/mms_btn02.jpg" class="mms_btn02" Onclick="window.close();" />
	</div>
</form>
</body>
</html>