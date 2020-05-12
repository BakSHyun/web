<? include "../inc/head.php"; ?>
<? include "../inc/cataract_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>노안 백내장 수술 클리닉</h2>
</div>

<div class='sub_content'>
	<img src="../img/sub/cataract2_n_0101.jpg" alt="" />
	<img src="../img/sub/cataract2_n_0102_200211.jpg" alt="" />
	<img src="../img/sub/cataract2_n_0103.jpg" alt="" />
	<img src="../img/sub/cataract2_n_0104.jpg" alt="" />
	<img src="../img/sub/cataract2_n_0105.jpg" alt="" />
	<img src="../img/sub/cataract2_n_0106.jpg" alt="" />
	<img src="../img/sub/cataract2_n_0107.jpg" alt="" />
	
	<?php
	include_once "../inc/sub_prize.php";
	?>

	<h2 style="padding:50px 0 30px;text-align:center;font-size:40px;">노안, 백내장 고객 후기</h2>
	<?
	if(!$group) $group = "basic";
	if(!$code) $code = "community1";
	$skinmode="mobile";
	$cate1="백내장";
	include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
	?>
</div>

<? include "../inc/foot.php"; ?>