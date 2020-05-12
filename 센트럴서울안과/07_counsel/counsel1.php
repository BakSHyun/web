<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 상담 및 예약 > <strong>온라인상담</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<img src="../img/board/board_img01.jpg" alt="" />

		<div class="board_wrap">
			
			<?
if(!$group) $group = "basic";
if(!$code) $code = "counsel02";
include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
?>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>