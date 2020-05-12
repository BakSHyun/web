<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 고객센터 > <strong>정보수정</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">		
		<img src="../img/board/board_img10.jpg" alt="회원가입" />

	<div style="width:900px; margin: 0 auto;">		
		 <?

if(!$ammode) $ammode = "modify"; // 2. 회원 정보 수정

if(!$group) $group = "basic"; // 회원 공통

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/member.php"; // 회원 공통

?>
</div>
	</div>
</div>
<? include '../inc/foot.php' ?>

