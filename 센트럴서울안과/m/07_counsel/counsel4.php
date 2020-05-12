<? include "../inc/head.php"; ?>
<? include "../inc/counsel_link.php"; ?>
<style>
/* 백내장, 시력교정술 카테고리 */
	.sub_content .tab_ps5 {width:640px;margin:25px 0}
	.sub_content .tab_ps5 > li{width:50%;}
	.sub_content .tab_ps5:after {content:''; display:block; clear:both}
	.sub_content .tab_ps5 > li{float:left; font-size:18px; text-align:center; height:52px; box-sizing:border-box; border-bottom:4px solid #514d84; padding-top:17px}
	.sub_content .tab_ps5 > li > a {color: #555555;}
	.sub_content .tab_ps5 > li.tabOn > a {color: #ffffff;}
	.sub_content .tab_ps5 > li.tabOn {background-color: #1c2c50;}
</style>
<div class="sub_title">
	<div class="back"><a href="javascript:history.back()"><img src="../img/comm/icon_s_back.gif" alt="뒤로가기"></a></div>
	<div class="home"><a href="../index.php"><img src="../img/comm/icon_s_home.gif" alt="홈으로"></a></div>
	<h2>진료체험기</h2>
</div>

<div class='sub_content'>
	<img src="../img/board/board_img04.jpg" alt="">
	<ul class="tab_ps5">
		<li <?=$cate1=='백내장'?"class='tabOn'":""; ?>><a href="/m/07_counsel/counsel4.php?cate1=<?=urlencode("백내장")?>">백내장</a></li>
		<li <?=$cate1=='시력교정술'?"class='tabOn'":""; ?>><a href="/m/07_counsel/counsel4.php?cate1=<?=urlencode("시력교정술")?>">시력교정술</a></li>
	</ul>
	<?
			if(!$group) $group = "basic";
			if(!$code) $code = "community1";
			$skinmode="mobile";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
</div>

<? include "../inc/foot.php"; ?>