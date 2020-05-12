<? include "../inc/head.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/sub.css">



<? include "../inc/member_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>회원로그인</h2>
</div>

<div class='sub_content'>
	<div class='content'>
<?
// 로그인폼이 보여질부분에 넣어 주세요
if(!$group) $group = "basic";
if(!$skin) $skin = "default_big";
$skinmode="mobile";

// 로그인후 이동페이지 설정 -> 0 일경우 현재페이지 리플래쉬, 1 일경우 이전페이지로 이동
if(!$retuen_mode) $retuen_mode ="1";

// 아래의 값을 회원가입 코드가 설정된 페이지로 수정해 주세요
if(!$joinpage) $joinpage = "/".$INDIR."/m/member/join.php";
// 아래의 값을 회원정보수정 코드가 설정된 페이지로 수정해 주세요
if(!$modifypage) $modifypage ="/".$INDIR."/m/member/edit.html";
	// 아래의 값을 아이디/비밀번호 찾기 코드가 설정된 페이지로 수정해 주세요
	if(!$idpwsearchpage) $idpwsearchpage ="/".$INDIR."/m/member/idpw.html";

	require_once $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/login.php";
?>

	</div>
</div>

<? include "../inc/foot.php"; ?>