<? include "../inc/head.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/sub.css">


<? include "../inc/member_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>정보수정</h2>
</div>

<div class='sub_content'>
	<div class='content'>
	<?
		if(!$ammode) $ammode = "modify"; // 2. 회원 정보 수정
		if(!$group) $group = "basic"; // 회원 공통
		//$skinmode="mobile";
		include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/member.php"; // 회원 공통
		?>

	</div>
</div>

<? include "../inc/foot.php"; ?>
