<? include "../inc/head.php"; ?>
<? include "../inc/counsel_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>진행중인 이벤프</h2>
</div>

<div class='sub_content'>
	<img src="../img/board/community8_vis.jpg" alt="">
<?

if(!$group) $group = "basic";

if(!$code) $code = "community8";

$skinmode="mobile";
include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";

?>
</div>

<? include "../inc/foot.php"; ?>