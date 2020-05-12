<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 드림렌즈 > <strong>드림렌즈 체험기</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<img src="../img/board/board_img11.jpg" alt="" />
		<div class="board_wrap">
				<?
			if(!$group) $group = "basic";
			if(!$code) $code = "community08";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>