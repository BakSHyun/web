<? include "../inc/head.php"; ?>

    <div id='home_wrap'>
		<div id='back_btn'><a onclick='history.go(-1);'><img src='../img/common/back_btn.png' alt='뒤로가기'></a></div>
		<div id='home_btn'><a href='/m/'><img src='../img/common/home_btn.png' alt='메인페이지로 가기'></a></div>
		<h1>오시는길</h1>
	</div>

	<? include "../inc/intro_link.php"; ?>

    <div id='sub_content'>
	  <div class='content'>
	 
	  <img src="../img/sub/intro4_1.jpg" border="0">
	 <!-- * Daum 지도 - 지도퍼가기 -->
<!-- 1. 지도 노드 -->
<div id="daumRoughmapContainer1435914684390" class="root_daum_roughmap root_daum_roughmap_landing"></div>

<!--
	2. 설치 스크립트
	* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
-->
<script charset="UTF-8" class="daum_roughmap_loader_script" src="http://dmaps.daum.net/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
	new daum.roughmap.Lander({
		"timestamp" : "1435914684390",
		"key" : "4ktd",
		"mapWidth" : "560",
		"mapHeight" : "450"
	}).render();
</script>
		<img src="../img/sub/intro4_3.jpg" border="0">
	   <!--<img src="../img/sub/intro4_4.jpg" border="0">-->
	  </div>
	</div>
<? include "../inc/foot.php"; ?>