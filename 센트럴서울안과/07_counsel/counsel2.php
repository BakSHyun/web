<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 상담 및 예약 > <strong>온라인예약</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<img src="../img/board/board_img02.jpg" alt="" />
		
		<img src="../img/sub/counsel2_1.jpg" alt="" style="margin:30px 0;" />
		<div class="board_wrap">
			<?
			if(!$code) $code = "counsel01";
			if(!$mode) $mode = "seldate"; // 예약하기
			if(!$mode) $mode = "confirm"; // 예약확인
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpreserve/reserve.php";
			?>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>