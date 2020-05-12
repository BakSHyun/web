<? include "../inc/head.php"; ?>
<? //include_once "popup170919.php"; ?>
<? include_once "pop180711.php"; ?><!--코로나팝업-->

		<style>
		.mv01 .bx-pager {display:none;}
		</style>
		<!-- 메인비주얼 -->
		<div class="mv01" id="main_visual01">
			<ul class="mv_slide01">
	             <!-- <li><img src="../img/main/main_06.jpg" alt="CS라섹"></li> -->
				 <li><a href="../07_counsel/community3.php?sno=0&group=basic&code=community03&category=&&cate1=&cate2=&cate3=&abmode=view&no=84740&bsort=desc&bfsort=ino"><img src="../img/main/mv_200408.jpg" alt=""></a></li>
				 <li><a href="../02_cataract/cataract9.php"><img src="../img/main/main_04.jpg" alt="서울의 중심위치"></a></li>
				 <li><img src="../img/main/main_05.jpg" alt="서울의 중심위치"></li>
				 <li><img src="../img/main/main_img01.jpg" alt="서울의 중심위치"></li>
				 <li><img src="../img/main/main_02_200410.jpg" alt="서울의 중심위치"></li>
				 <li><img src="../img/main/main_03.jpg" alt="서울의 중심위치"></li>
			</ul>
		</div>
		<!-- 메인비주얼 -->
		<div class="mb01">
			<a href="../02_cataract/cataract2.php"><img src="../img/main/micon_01.jpg" alt="백내장"></a>
			<a href="../04_glaucoma/glaucoma9.php"><img src="../img/main/micon_02.jpg" alt="녹내장"></a>
			<a href="../05_retina/retina2.php"><img src="../img/main/micon_03.jpg" alt="망막"></a>
			<a href="../06_dream/dream1.php"><img src="../img/main/micon_04.jpg" alt="드림렌즈"></a>
			<a href="../03_myopia/myopia2.php"><img src="../img/main/micon_05.jpg" alt="고도근시"></a>
		</div>
		<!-- 메인비주얼 -->
		<div class="mv01" id="main_visual">
			<ul class="mv_slide">
				 <li><img src="../img/main/mv_01.jpg" alt=""  /></li>
				 <li><img src="../img/main/mv_02.jpg" alt=""  /></li>
				 <li><img src="../img/main/mv_03.jpg" alt=""  /></li>
				 <li><img src="../img/main/mv_04.jpg" alt=""  /></li>
				 <li><img src="../img/main/mv_05.jpg" alt=""  /></li>
			</ul>
		</div>
		<!-- 메인비주얼 -->
		<div class="main_cnt">
			<!-- 배너슬라이드 -->
			<div class="mv02">
				<ul class="mv_slide02">
					<!-- <li><img src="../img/main/popup200115_m.jpg" alt="" /></li> -->
					<!-- <li><a href="http://cseye.net/m_old/landing/landing5.html" target="_blank"><img src="img/mbh_m_191219.jpg" alt=""  /></a></li> -->
					<li><a href="http://health.chosun.com/site/data/html_dir/2020/02/11/2020021101179.html" target="_blank"><img src="../img/main/mbh_m_200219.jpg" alt=""  /></a></li>
					<li><a href="http://health.chosun.com/site/data/html_dir/2019/09/30/2019093001989.html" target="_blank"><img src="img/popup191001.jpg" alt=""  /></a></li>
					<li><a href="http://health.chosun.com/site/data/html_dir/2018/11/22/2018112202358.html" target="_blank"><img src="img/popup181122.jpg" alt=""  /></a></li>
					<li><a href="https://www.youtube.com/channel/UC2FUiZl5XTXj6eDQRhdJb2w" target="_blank"><img src="../img/main/mbh_m_200409.jpg" alt=""  /></a></li>
					<!--<li><img src="../img/main/popup180814_1.jpg" alt=""  /></li>-->
					 <!-- <li><img src="../img/main/popup180529_2.jpg" alt=""  /></li> -->
					 <li><a href="http://health.chosun.com/site/data/html_dir/2018/04/17/2018041700933.html"><img src="../img/main/mb_01.jpg" alt="녹내장권위자로버트리치박사방문"  /></a></li>
					 <li><a href="http://cseye.net/m_new/07_counsel/counsel6.php?sno=0&group=basic&code=community03&category=&&cate1=&cate2=&cate3=&abmode=view&no=4014&bsort=&bfsort="><img src="../img/main/mb_06.png" alt="국민방송인 엄앵란선생님 방문"  /></a></li>
					 <!--<li><img src="../img/main/mb_02.png" alt="김균형원장 대학교수 출신 명의 20인 선정"  /></li>-->
				</ul>
			</div>

			<div class="main_board">
				<div class="box01">
					<a href="../07_counsel/counsel5.php"><img src="../img/main/box_img01.jpg" alt="언론속의 센트럴 서울안과"></a>
					<p class="btngo"><a href="../07_counsel/counsel5.php"><img src="../img/main/btn_go.jpg" alt="go"></a></p>
					<div class="slide_wrap">
						<div class="slider1">
<?

$group = "basic";

$code = "community02";

$skin  = "default_mobile";

$line  = 3; // 최근 게시물 갯수

$cutwidth  = 70; // 제목글 길이

$contentscutwidth  = "300"; // 내용글 길이X



$blistsort  = 1; // 링크된 게시판 정렬. 기본 : 1, 수정 : 2

$bfsort  = "ino"; // ino: 기본정렬 , point : 점수 , download : 다운로드 , view : 보기

$bsort  = "desc"; // desc : 내림차순 , asc : 오름차순



$boardurl  = "/".$INDIR."/m/07_counsel/counsel5.php"; // 게시판 URL 삽입

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/newlist.php";

?>
						</div>
					</div>


				</div>
				<div class="box01 last">
					<a href="../07_counsel/counsel6.php"><img src="../img/main/box_img02.jpg" alt="병원이슈"></a>
					<a href="../07_counsel/counsel6.php"><p class="btngo"><img src="../img/main/btn_go.jpg" alt="go"></p></a>
					<div class="slide_wrap">
						<div class="slider2">
<?

$group = "basic";

$code = "community03";

$skin  = "default_mobile2";

$line  = 3; // 최근 게시물 갯수

$cutwidth  = 32; // 제목글 길이

$contentscutwidth  = "100"; // 내용글 길이X



$blistsort  = 1; // 링크된 게시판 정렬. 기본 : 1, 수정 : 2

$bfsort  = "ino"; // ino: 기본정렬 , point : 점수 , download : 다운로드 , view : 보기

$bsort  = "desc"; // desc : 내림차순 , asc : 오름차순



$boardurl  = "/".$INDIR."/m/07_counsel/counsel6.php"; // 게시판 URL 삽입

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/newlist.php";

?>
						</div>
					</div>

				</div>
			</div>
		</div>


<? include "../inc/foot.php"; ?>
