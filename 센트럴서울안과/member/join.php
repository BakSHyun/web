<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 고객센터 > <strong>회원가입</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">		
		<img src="../img/board/board_img08.jpg" alt="회원가입" />

		<div class="board_wrap">
		<div class="sub_cnt" style="width:900px; margin: 0 auto;">		
		 <?

if(!$ammode) $ammode = "join"; // 1. 회원 가입
if(!$group) $group = "basic"; // 회원 공통

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/member.php"; // 회원 공통

?>
	</div>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>

