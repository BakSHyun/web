<? include "../inc/head_sosic.php"; ?>

<style>
/* 백내장, 시력교정술 카테고리 */
	.sub_content .tab_ps5 {width:640px;margin:25px 0}
	.sub_content .tab_ps5 > li{width:50%;}
	.sub_content .tab_ps5:after {content:''; display:block; clear:both}
	.sub_content .tab_ps5 > li{float:left; font-size:18px; text-align:center; height:52px; box-sizing:border-box; border-bottom:4px solid #514d84; padding-top:17px}
	.sub_content .tab_ps5 > li > a {color: #555555;}
	.sub_content .tab_ps5 > li.tabOn > a {color: #ffffff;}
	.sub_content .tab_ps5 > li.tabOn {background-color: #1c2c50;}

	.nv_slider_warp .bx-pager-item a{background: #9c9c9c;display: inline-block;margin: 3px;width: 15px;height: 15px;border-radius: 17px;text-indent: -99999px;}
	.nv_slider_warp .bx-pager-item a.active{background: #505050;}
	.nv_slider > li img {width:100%;}
</style>
<script>

$(document).ready(function(){
	 $('.nv_slider').bxSlider({
	   mode: 'horizontal',
	   controls:false,
	   auto:true,
	   pager:true
//	   speed:800
	});

});

</script>
<div class='sub_content'>
	<div><img src="../img/main/main_02.jpg" style="width:100%;height:700px;" alt=""></div>
	<br />
	<br />
	<div class="nv_slider_warp">
		<ul class="nv_slider">
			<li><img src="../img/main/popup180814_1.jpg" alt=""  /></li>
			 <!-- <li><img src="../img/main/popup180529_2.jpg" alt=""  /></li> -->
			 <li><a href="http://health.chosun.com/site/data/html_dir/2018/04/17/2018041700933.html"><img src="../img/main/mb_01.jpg" alt="녹내장권위자로버트리치박사방문"  /></a></li>
			 <li><a href="http://cseye.net/m_new/07_counsel/counsel6.php?sno=0&group=basic&code=community03&category=&&cate1=&cate2=&cate3=&abmode=view&no=4014&bsort=&bfsort="><img src="../img/main/mb_06.png" alt="국민방송인 엄앵란선생님 방문"  /></a></li>
		</ul>
	</div>
	<br />
	<?
			if(!$group) $group = "basic";
			if(!$code) $code = "web_z_img";
			$cate1 = "뉴스";
			$skinmode="mobile";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
</div>

<? include "../inc/foot_sosic.php"; ?>