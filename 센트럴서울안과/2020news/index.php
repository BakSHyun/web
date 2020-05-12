<? include "./inc/head_sosic.php"; ?>

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
	<?if($_GET[abmode] == "view"){?>
	<?}else{?>
	<div><img src="./img/main/cs_sosic_new01.jpg" style="width:100%;" alt=""></div>
	<br />
	<!-- <br />
	<div class="nv_slider_warp">
		<ul class="nv_slider">
			<li><img src="./img/main/cs_sosic_bn01.jpg" alt=""  /></li>
			<li><img src="./img/main/cs_sosic_bn02.jpg" alt=""  /></li>
			<li><img src="./img/main/cs_sosic_bn03.jpg" alt=""  /></li>
			<li><img src="./img/main/cs_sosic_bn04.jpg" alt=""  /></li>
			<li><img src="./img/main/cs_sosic_bn05.jpg" alt=""  /></li>
			<li><img src="./img/main/cs_sosic_bn07.jpg" alt=""  /></li>
		</ul>
	</div>
	<br /> -->
	<?}?>
	<?
			if(!$group) $group = "basic";
			if(!$code) $code = "web_z_img";
			$cate1 = "인터뷰";
			$skinmode="mobile";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
</div>

<? include "./inc/foot_sosic.php"; ?>