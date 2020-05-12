<?
// 2020.04.27 최종 수정
// 개발자: 백성현
?>
<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 왜센트럴서울안과인가 > <strong>연구 연혁</strong></div>
	<? include "../inc/left.php" ?>
    <div class="sub_tab1_wrap">
	<ul class="clear">
		<li><a <?=$bn=='intro4_1.php'?"class='select'":""; ?> href="../01_intro/intro4_1.php">연혁</a></li>
		<li><a <?=$bn=='intro4_2.php'?"class='select'":""; ?> href="../01_intro/intro4_2.php">인증, 수상 업적</a></li>
	</ul>
    </div>
<!--컨텐츠 파트 start-->
	<div class="sub_cnt">

		<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br><strong>Central Seoul History</strong></h1>

	</div>
<!--컨텐츠 파트 end -->
<div class="sub_cnt">
		<div class="board_wrap">
				<?
            //연혁 게시판
			if(!$group) $group = "basic";
			if(!$code) $code = "intro4_test";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>
