<? include "../inc/head.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/sub.css">


<? include "../inc/member_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>아이디 / 비번찾기</h2>
</div>

<div class='sub_content'>
	<div class='content'>
	<?
	if(!$ammode) $ammode = "idpwsearch"; // 3. 회원 ID, PW 찾기
	if(!$group) $group = "basic"; // 회원 공통
	include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/member.php"; // 회원 공통
	?>
	</div>
</div>

<? include "../inc/foot.php"; ?>
