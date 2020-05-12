<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 고객센터 > <strong>아이디 / 비번찾기</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">		
		<img src="../img/board/board_img09.jpg" alt="아이디 / 비번찾기" />

		<div class="board_wrap">
		<div class="sub_cnt" style="width:900px; margin: 0 auto;">		
		 <?

if(!$ammode) $ammode = "idpwsearch"; // 3. 회원 ID, PW 찾기

if(!$group) $group = "basic"; // 회원 공통

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/member.php"; // 회원 공통

?>
	</div>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>
