<? include "../inc/head.php" ?>
<style>
	*{margin:0; padding:0; border:0; list-style:none;}
	#roll_wrap {width:1200px; height:650px; overflow:hidden; border:5px solid #b2c3cd; position:relative; vertical-align:top;}
	.slider {position:relative;}
	.slider li {width:1200px; height:130px; overflow:hidden; background:url(../img/community_img/icon.jpg) 24px center no-repeat; border-bottom:1px solid #cfcfcf; text-align:left;}
	.slider li img {float:left; display:block; margin:18px 0 0 85px;}
	.slider li p {float:left; margin:18px 0 0 30px; font:normal 14px/26px 'dotum'; color:#777; letter-spacing:-1px;}
	.slider li strong {    color: #004fc2;
    font-size: 17px;
    display: block;
    margin-bottom: 10px;
    text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
    -moz-binding: url('ellipsis.xml#ellipsis');
    white-space: nowrap;
    overflow: hidden;}
</style>

<script type='text/javascript' src='../include/jquery-1.11.2.min.js'></script>
<script type='text/javascript' src='../include/jquery.easing.1.3.js'></script>
<link rel="stylesheet" href="../css/common.css" media="all">
<script type='text/javascript'>
	$(document).ready(function(){
		var over=0;
		var chk=0;
		var time = 3000;
		var id=null;
		var gab = 130;

		function apd(){var clone = $('#roll_wrap .slider ul').clone();$('#roll_wrap .slider').append(clone);}apd();
		function autoPlay(){id = setInterval(function(){rollChk();},time)};autoPlay();

		function rollChk(){
			over++;
			if(chk==9){
				chk=0;
				apd();
			}else{
				chk++;
			}
			$('#roll_wrap .slider').stop().animate({top:-(gab*(over))},800);
			//console.log(-(gab*(over-1)));
		}
	});
</script>
<style>
.sub_cnt .tab_ps5 {width:1200px;margin:25px 0}
.sub_cnt .tab_ps5 > li{width:50%;}
.sub_cnt .tab_ps5:after {content:''; display:block; clear:both}
.sub_cnt .tab_ps5 > li{float:left; font-size:18px; text-align:center; height:52px; box-sizing:border-box; border-bottom:4px solid #514d84; padding-top:17px}
.sub_cnt .tab_ps5 > li > a {color: #555555;}
.sub_cnt .tab_ps5 > li.tabOn > a {color: #ffffff;}
.sub_cnt .tab_ps5 > li.tabOn {background-color: #1c2c50;}
</style>
<div class="sub_wrap" >
	<div class="pagenavi">HOME > 커뮤니티 > <strong>수술 체험기</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<img src="../img/board/board_img03.jpg" alt="수술 체험기" />
		<ul class="tab_ps5">
			<li <?=$cate1=='백내장'?"class='tabOn'":""; ?>><a href="/07_counsel/community1.php?cate1=<?=urlencode("백내장")?>">백내장</a></li>
			<li <?=$cate1=='시력교정술'?"class='tabOn'":""; ?>><a href="/07_counsel/community1.php?cate1=<?=urlencode("시력교정술")?>">시력교정술</a></li>
		</ul>
		<div class="board_wrap">
				<?
			if(!$group) $group = "basic";
			if(!$code) $code = "community1";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>