<!DOCTYPE html>
<html lang='ko'>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta charset='utf-8'/>
<title>::::::::: 관리자 모드 :::::::::</title>
<?
require_once "inc/config.php";
?>
<link href="/admin/css/common.css" rel="stylesheet" type="text/css">
<link href="/admin/css/login.css" rel="stylesheet" type="text/css">
</head>

<body onload='document.iform.id.focus();'>

<div id='admin_login_wrap'>
	<h1><img src='./img/login/login_logo.png' alt='메디픽스 관리자모드'></h1>
	<div id='login_form'>
		<h2>Administrator <strong>Mode</strong></h2>
		<div class='login_box'>
		<form name="iform" method="post" action="/<?=$INDIR?>/ammember/login_session.php">
		<input type="hidden" name="return_url" value="/<?=$INDIR?>/admin/">
		<input type="hidden" name="return_values" value="">
			<input name="id" type="text" class='text' id="id" />
			<input name="pw" type="password" class='text' id="pw" />
			<span><input type='image' src='./img/login/login_btn.png' alt='로그인'></span>
		</form>
		</div>
		<p>아이디, 비밀번호 재설정 문의는 하단 메일로 문의 바랍니다.<br><strong>design@mediphics.co.kr</strong></p>
	</div>
</div>

</body>
</html>