<? include "../inc/head.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/sub.css">


<? include "../inc/member_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>회원가입</h2>
</div>

<div class='sub_content'>
	<div class='content'>
	<?
	// 회원가입폼이 // 회원가입폼이 보여질부분에 넣어 주세요
	if(!$group) $group = "basic";
	if(!$ammode) $ammode = "join";
	//$skinmode="mobile";
	include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/member.php";
	?>

	</div>
</div>

<? include "../inc/foot.php"; ?>