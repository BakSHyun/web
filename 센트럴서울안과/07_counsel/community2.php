<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 커뮤니티 > <strong>언론속 센트럴서울안과</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<img src="../img/board/board_img04.jpg" alt="언론속 센트럴서울안과" />
		<div class="board_wrap">
			<?
			if(!$group) $group = "basic";
			if(!$code) $code = "community02";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>