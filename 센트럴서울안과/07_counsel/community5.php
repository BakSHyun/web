<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 커뮤니티 > <strong>바른 눈 치료 리포트</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<img src="../img/board/board_img12.jpg" alt="바른 눈 치료 리포트" />
		<div class="board_wrap">
			<?
			if(!$group) $group = "basic";
			if(!$code) $code = "community5";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>