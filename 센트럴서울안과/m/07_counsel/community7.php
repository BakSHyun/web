<? include "../inc/head.php"; ?>
<? include "../inc/counsel_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>영상체험인터뷰</h2>
</div>

<div class='sub_content'>
	<img src="../img/board/community7_vis.jpg" alt="">
<?

if(!$group) $group = "basic";

if(!$code) $code = "community7";

$skinmode="mobile";
include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";

?>
</div>

<? include "../inc/foot.php"; ?>