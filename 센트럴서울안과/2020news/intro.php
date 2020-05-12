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

<style>
.prog_tab1_wrap{width:600px;margin:0 auto 20px auto;}
.prog_tab1_wrap > ul {display: inline-block;background:#16687e ;}
.prog_tab1_wrap > ul > li{float:left;width: 149px;padding-right:8px;text-align:center;box-sizing:border-box;border-right:1px solid #fff ;padding:10px 0;}
.prog_tab1_wrap > ul > li > a{display:block;color:#fff;font-size:30px;letter-spacing:-0.6px;height:56px;line-height:56px;font-weight:500;width:149px;display: inline-block;font-family: 'NanumGothic';}
/*.prog_tab1_wrap > ul > li{float:left;width: 140px;margin-right:8px;text-align:center;border:solid 4px #dadada;box-sizing:border-box;}
.prog_tab1_wrap > ul > li > a{display:block;color:#a0a0a0;font-size:20px;letter-spacing:-0.6px;height:56px;line-height:56px;font-weight:500}*/
.prog_tab1_wrap > ul > li:last-child{margin-right:0}
.prog_tab1_wrap > ul > li.select{border-bottom:4px solid #bad6de ;}
.prog_tab1_wrap > ul > li.select > a{color:#fff}
.prog_tab1_wrap > ul.co4{width:650px;margin:0 auto}
.prog_tab1_wrap > ul.co3{width:485px;margin:0 auto}
.prog_tab1_wrap > ul.co2{width:325px;margin:0 auto}
</style>

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

	<div class="prog_tab1_wrap" id="linkpo">
		<ul>
			<li><a href="/2020news/index.php?cate1=%EC%9D%B8%ED%84%B0%EB%B7%B0&amp;#linkpo">인터뷰</a></li>
			<li><a href="/2020news/index.php?cate1=%EB%89%B4%EC%8A%A4&amp;#linkpo">뉴스</a></li>
			<li><a href="/2020news/index.php?cate1=%EC%97%90%EC%84%B8%EC%9D%B4&amp;#linkpo">에세이</a></li>
			<li class="select" style="border-right:none;"><a href="https://www.cseye.net/2020news/intro.php?#linkpo">병원소개</a></li>
		</ul>
	</div>

	<img src="./img/sub/intro03_1.jpg" />
	<img src="./img/sub/intro03_6.jpg" />
	<img src="./img/sub/intro03_3.jpg" />
	<img src="./img/sub/intro03_2.jpg" />
	<img src="./img/sub/intro03_5.jpg" />
	<img src="./img/sub/intro03_4.jpg" />
</div>

<? include "./inc/foot_sosic.php"; ?>