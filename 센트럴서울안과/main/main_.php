<? include "../inc/head.php"?>
<?/* include_once "pop160711.php"; */?> <!--CS엑스퍼트 라섹  -->
<? /*include_once "pop161121.php"; */?> <!--아쿠아ICL 전문센터 공식지정  -->
<? //include_once "popup_161228.php"; ?>

		<!-- 메인비주얼 시작 -->
		<div class="main_visual">
			<div id="mainvi" class="owl-carousel owl-theme">
			  <div class="item" style="background:url(../img/main/mv06.jpg) no-repeat center; height: 665px;"> </div>
			  <div class="item" style="background:url(../img/main/mv01.jpg) no-repeat center; height: 665px;"> </div>
			  <div class="item" style="background:url(../img/main/mv02.jpg) no-repeat center; height: 665px;"> </div>
			  <div class="item" style="background:url(../img/main/mv03.jpg) no-repeat center; height: 665px;"><iframe width="460" height="260" style="position:absolute; left:50%;     margin-left: -575px;bottom: 65px;    z-index: 9"src="https://www.youtube.com/embed/lsBZjxRNBWY" frameborder="0" allowfullscreen></iframe> </div>
			  <div class="item" style="background:url(../img/main/mv04.jpg) no-repeat center; height: 665px;"> </div>
			  <div class="item" style="background:url(../img/main/mv05.jpg) no-repeat center; height: 665px;"><a href="../01_intro/intro3.php" style="position: absolute;width: 186px;    height: 30px;left: 50%;margin-left: -600px;bottom: 125px;"></a> </div>
			</div>
			<div id="owlStatus">
				<div class="currentItem">
					<div class="result"></div>
				</div>
				<div class="divide">/</div>
				<div class="owlItems">
					<div class="result"></div>
				</div>
			</div>
		</div>
		<script>
		$("iframe").each(function(){
      var ifr_source = $(this).attr('src');
      var wmode = "wmode=transparent";
      if(ifr_source.indexOf('?') != -1) $(this).attr('src',ifr_source+'&'+wmode);
      else $(this).attr('src',ifr_source+'?'+wmode);
   });
		</script>
		<!--
		<div class="main_visual">
			<div id="mv_wrap">
				<ul id="mv_inner">
					<li><a href="../01_intro/intro1.php"><img src="../img/main/mv1.jpg" alt="본연의 건강한 아름다움을 찾다" /></a></li>
					<li><a href="../01_intro/intro1.php"><img src="../img/main/mv1.jpg" alt="본연의 건강한 아름다움을 찾다" /></a></li>
					<li><a href="../01_intro/intro1.php"><img src="../img/main/mv1.jpg" alt="본연의 건강한 아름다움을 찾다" /></a></li>
					<li><a href="../01_intro/intro1.php"><img src="../img/main/mv1.jpg" alt="본연의 건강한 아름다움을 찾다" /></a></li>
					<li><a href="../01_intro/intro1.php"><img src="../img/main/mv1.jpg" alt="본연의 건강한 아름다움을 찾다" /></a></li>
				</ul>
			</div>
		</div>
		-->
		<!-- 메인비주얼 끝 -->
		<div class="main_content">
			<div class="main_box">
				<h1 class="main_tit"><strong>‘바른’ 눈 전문가들</strong>, 센트럴 서울안과에서 만나십시오. </h1>
				<ul class="main_box01">
					<li>
						<a href="http://cseye.pixmd.co.kr/01_intro/intro3.php#section01"><img src="../img/main/li_img01.png" alt="" />
						<h2>EXPERT Doctors</h2>
						<p>국제적 권위를 가진</br>안과전문의 3인 진료</p></a>
					</li>
					<li>
						<a href="http://cseye.pixmd.co.kr/01_intro/intro3.php#section02"><img src="../img/main/li_img02.png" alt="" />
						<h2>EXPERT Patient Care</h2>
						<p>더 나은 진료를 위한</br>고객맞춤형 환자 관리 시스템</p></a>
					</li>
					<li>
						<a href="http://cseye.pixmd.co.kr/01_intro/intro3.php#section03"><img src="../img/main/li_img03.png" alt="" />
						<h2>EXPERT Devices</h2>
						<p>업데이트된 안과 진료 장비로</br>안전한 수술 가능</p></a>
					</li>
					<li>
						<a href="http://cseye.pixmd.co.kr/01_intro/intro3.php#section04"><img src="../img/main/li_img04.png" alt="" />
						<h2>EXPERT Safety</h2>
						<p>고객의 안전 보장을 위한</br>노력은 기본입니다</p></a>
					</li>
					<li class="last">
						<a href="http://cseye.pixmd.co.kr/01_intro/intro3.php#section05"><img src="../img/main/li_img05.png" alt="" />
						<h2>EXPERT Culture</h2>
						<p>구성원의 능력들이 모여 병원의</br> 역량을 만든다고 믿습니다</p></a>
					</li>
				</ul>
			</div>
			<div class="main_box">
				<ul class="main_icon01">
					<li><img src="../img/main/main_icon_tit.jpg" alt="전문 진료 분야를 선택하세요" /></li>
					<li><a href="../02_cataract/cataract1.php"><img src="../img/main/main_icon_01.jpg" alt="백내장" /></a></li>
					<li><a href="../04_glaucoma/glaucoma3.php"><img src="../img/main/main_icon_02.jpg" alt="녹내장" /></a></li>
					<li><a href="../05_retina/retina2.php"><img src="../img/main/main_icon_03.jpg" alt="망막" /></a></li>
					<li><a href="../06_dream/dream1.php"><img src="../img/main/main_icon_04.jpg" alt="드림렌즈" /></a></li>
					<li><a href="../03_myopia/myopia2.php"><img src="../img/main/main_icon_05.jpg" alt="고도근시" /></a></li>
				</ul>
			</div>

			<div class="main_box">
				<div id='mb01'>
					<ul class="bxslider01">
					  <li><a href="../01_intro/intro7.php#tab01"><img src='../img/main/mb01_1.png' alt='컴퓨터네비게이션시스템'/></a></li>
					  <li><a href="../01_intro/intro7.php#tab02"><img src='../img/main/mb01_2.png' alt='백내장수술기'/></a></li>
					  <li><a href="../01_intro/intro7.php#tab03"><img src='../img/main/mb01_3.png' alt='망막맥락막혈관검사장비'/></a></li>
					  <li><a href="../07_counsel/counsel2.php"><img src='../img/main/mb01_4.png' alt='백내장수술 사전예약필수 '/></a></li>
					</ul>
				</div>
				<div id='mb02'>
					<ul class="bxslider02">
					  <li><a href="https://www.cseye.net:8033/07_counsel/community3.php?group=basic&amp;code=community03&amp;no=4014&amp;bsort=desc&amp;bfsort=ino&amp;abmode=view" target="_self"><img src='../img/main/mb02_6.jpg' alt='엄앵란' border="0"/></a></li>
                      <li><img src='../img/main/mb02_1.png' alt='김균형원장'/></li>
					  <li><img src='../img/main/mb02_7.jpg' alt='대한민국소비자만족도1위'/></li>
					  <li><img src='../img/main/mb02_2.png' alt='한국소비자지수 1위'/></li>
					  <!--<li><img src='../img/main/mb02_3.png' alt='백나장수술10000례돌파'/></li>-->
					  <li><img src='../img/main/mb02_4.png' alt='최재완원장'/></li>
					  <li><img src='../img/main/mb02_5.png' alt='황종욱원장'/></li>
					</ul>
				</div>
				<div id="mb_03">
					<a href="../07_counsel/kakao.php"><img src="../img/main/main_kakao.jpg" alt="카카오톡" class="m-b-5" /></a>
					<a href="https://www.facebook.com/pages/%EC%84%BC%ED%8A%B8%EB%9F%B4%EC%84%9C%EC%9A%B8%EC%95%88%EA%B3%BC-Central-Seoul-Eye-Center/139705122734212" target="_blank"><img src="../img/main/main_fb.jpg" alt="페이스북" class="m-r-5" /></a>
					<a href="http://blog.naver.com/bluestarys" target="_blank"><img src="../img/main/main_naver.jpg" alt="네이버블로그" class="m-b-5" border="0" usemap="#map01" /></a>
					<map name="map01">
						<area shape="rect" coords="0,0,133,37" href="http://blog.naver.com/deskshot" target="_blank" alt="" />
						<area shape="rect" coords="0,38,133,75" href="http://blog.naver.com/tigerme" target="_blank" alt="" />
					</map>
					<a href="../07_counsel/community5.php"><img src="../img/main/main_report.png" alt="네이버뉴스" /></a>
				</div>
			</div>

			<div class="main_box m-tb-40">
				<div class="board_01">
					<h1>방송 및 언론보도 <a href="../07_counsel/community2.php">GO <img src="../img/main/arrow01.png" alt="" /></a></h1>
					<img src="../img/main/main_board_titimg.png" alt="" style="margin-bottom:5px" />
					<div id="board_roll01" class="slider8">
<?

$group = "basic";

$code = "community02";

$skin = "default_main2";

$line = 10; // 최근 게시물 갯수

$cutwidth = 180; // 제목글 길이

$contentscutwidth = "100"; // 내용글 길이X



$blistsort = 1; // 링크된 게시판 정렬. 기본 : 1, 수정 : 2

$bfsort = "ino"; // ino: 기본정렬 , point : 점수 , download : 다운로드 , view : 보기

$bsort = "desc"; // desc : 내림차순 , asc : 오름차순



$boardurl = "/".$INDIR."/07_counsel/community2.php"; // 게시판 URL 삽입

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/newlist.php";

?>

					</div>
				</div>
				<div class="board_02">
					<h1>병원 이슈 <a href="../07_counsel/community3.php">GO <img src="../img/main/arrow01.png" alt="" /></a></h1>
					<div id="board_roll02" class="slider8">
<?

$group = "basic";

$code = "community03";

$skin = "default_main";

$line = 5; // 최근 게시물 갯수

$cutwidth = 180; // 제목글 길이

$contentscutwidth = "180"; // 내용글 길이X



$blistsort = 1; // 링크된 게시판 정렬. 기본 : 1, 수정 : 2

$bfsort = "ino"; // ino: 기본정렬 , point : 점수 , download : 다운로드 , view : 보기

$bsort = "desc"; // desc : 내림차순 , asc : 오름차순



$boardurl = "/".$INDIR."/07_counsel/community3.php"; // 게시판 URL 삽입

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/newlist.php";

?>

					</div>
				</div>
				<script>
				function check_mini(frm){
					if(frm.name.value=="") {
						alert("이름을 입력하세요");
						return false;
					}

					if(frm.hphone1.value=="" || frm.hphone2.value=="" || frm.hphone3.value=="") {
						alert("번호를 입력하세요");
						return false;
					}

					if(frm.agree.checked != true) {
						alert("개인정보 이용약관에 동의하여 주시기 바랍니다.");
						return false;
					}



					return true;
				}

				function contents_remove(){
					//alert ('자바스크립트');
					$("#contents").val('');
				}
				</script>
				<form name="form" method="post" action="/inc/proc_db.php" onSubmit="return check_mini(this);">
				<div class="phone_wrap">
						<input type="hidden" name="code" value="main_quick ">
						<input type="hidden" name="cate3" value="무료상담신청">
						<input type="hidden" name="position" value="무료상담신청">
						<textarea name="contents" id="contents" class="phone_txt" Onclick="javascript:contents_remove();">신속하고 간편한 상담문자 신청 서비스 입니다.문의사항을 남겨주시면 전문상담사가 전화로 친절하고 자세한 상담을 도와드립니다.</textarea>
						<input type="text" name="name" class="p_name" />
						<input type="text" name="hphone1" class="p_phone1" maxlength="3" />
						<input type="text" name="hphone2" class="p_phone2" maxlength="4" />
						<input type="text" name="hphone3" class="p_phone3" maxlength="4" />
						<input type="checkbox" name="agree" class="p_agree" />
						<input type="image" src="../img/main/phone_btn.png" class="p_btn"  />
						<a href="../member/privacy.php" class="p_more" target="_new"><자세히보기></a>
				</div>
				</form>
			</div>

			<div class="main_box">
				<div class="main_morebox">
					<img src="../img/main/morebox_img01.jpg" alt="" />
					<h1>백내장 클리닉</h1>
					<p>컴퓨터 가이드 백내장수술</br>눈 특성에 맞춘 맞춤형 노안 백내장 수술</p>
					<a class="more_btn" href="../02_cataract/cataract1.php">MORE +</a>
				</div>
				<div class="main_morebox">
					<img src="../img/main/morebox_img02.jpg" alt="" />
					<h1>초고도근시 클리닉</h1>
					<p>안내렌즈삽입술 전문 클리닉</br>대학교수 출신 김균형 원장 직접 수술</p>
					<a class="more_btn" href="../03_myopia/myopia1.php">MORE +</a>
				</div>
				<div class="main_morebox">
					<img src="../img/main/morebox_img03.jpg" alt="" />
					<h1>녹내장 클리닉</h1>
					<p>세계안과학회 3회 연속 강의</br>녹내장 수술 500례 이상 시행</p>
					<a class="more_btn" href="../04_glaucoma/glaucoma1.php">MORE +</a>
				</div>
				<div class="main_morebox last">
					<img src="../img/main/morebox_img04.jpg" alt="" />
					<h1>망막 클리닉</h1>
					<p>콘스텔레이션 망막 수술 시스템</br>당일입원 망막 수술 가능</p>
					<a class="more_btn" href="../05_retina/retina1.php">MORE +</a>
				</div>
			</div>


		</div>
		<? include "../inc/foot.php" ?>