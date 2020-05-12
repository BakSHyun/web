<? include "../inc/head.php"; ?>
<? include "../inc/cataract_link.php"; ?>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>클리닉소개</h2>
</div>

<div class='sub_content'>
	<img src="../img/sub/cataract2_1.jpg" alt="" />
	<img src="../img/sub/cataract2_2.jpg" alt="" />
	<img src="../img/sub/cataract2_3.jpg" alt="" />
	<div style="width:600px; margin:0 auto;"><iframe width="600" height="315" src="https://www.youtube.com/embed/lsBZjxRNBWY?rel=0" frameborder="0" allowfullscreen></iframe></div>
	<img src="../img/sub/cataract2_4.jpg" alt="" />

	<img src="../img/sub/intro07_1.jpg" />
		<img src="../img/sub/intro07_2.jpg" />
		<img src="../img/sub/intro07_3.jpg" />
		<div style="text-align: center;">
			<iframe src="https://player.vimeo.com/video/232280753?byline=0&portrait=0" width="600" height="338" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		</br></br><img src="../img/sub/new_intro07_6.jpg" />
		<!--<img src="../img/sub/intro07_4.jpg" />
		<img src="../img/sub/intro07_5.jpg" />-->
<?
			if(!$group) $group = "basic";
			if(!$code) $code = "community1";
			$skinmode="mobile";
			$cate1="백내장";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
</div>

<? include "../inc/foot.php"; ?>