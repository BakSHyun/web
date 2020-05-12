<?

if(strpos($_SERVER["HTTP_HOST"],"8033") !== false){
	header("Location: https://www.cseye.net");
	exit;
}

$domain = $_SERVER["PHP_SELF"];
$bn=basename($_SERVER["PHP_SELF"]);
$query_string = ($_SERVER["QUERY_STRING"] == ""?"":"?".$_SERVER["QUERY_STRING"]);
$arr_browser = array("iPhone", "iPod", "IEMobile", "Mobile", "lgtelecom", "PPC");
for($iindexi = 0; $indexi < count($arr_browser); $indexi++) {
	if(strpos($_SERVER['HTTP_USER_AGENT'], $arr_browser[$indexi]) == true) {
		if(strpos($domain,"04_clinic") !== false){
			header("Location: /m/05_retina/retina3.php?".$_SERVER["QUERY_STRING"]);
			exit;
		}else if($bn == "intro9.php"){
			header("Location: /m/01_intro/intro5.php?".$_SERVER["QUERY_STRING"]);
			exit;
		}else{
			header("Location: /m/$_SERVER[PHP_SELF]?".$_SERVER["QUERY_STRING"]);
			exit;
		}
	}
}
?>
<? require_once $_SERVER[DOCUMENT_ROOT].'/amconfig.php'; ?>
<? require_once $_SERVER[DOCUMENT_ROOT].'/mpboard/inc/sys.php'; // 최신게시물 적용시 ?>
<?//=$_SESSION['nvkwd']?>
<!DOCTYPE HTML>
<html lang='ko'>
<head>
<meta charset='utf-8'/>
<meta name='author' content='br' />
<meta name='keywords' content='백내장, 녹내장, 망막질환, 초고도근시, 질환중점진료, 용산안과, 이촌동안과' />
<meta name='description' content='용산구 이촌동 안과, 백내장, 녹내장, 망막질환, 바른시력교정수술, CS엑스퍼트라섹, 질환중점진료' />
<meta property="og:title" content="센트럴서울안과">
<meta property="og:description" content="용산구 이촌동 안과, 백내장, 녹내장, 망막질환, 바른시력교정수술, CS엑스퍼트라섹, 질환중점진료">
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name='viewport' content='width=1200,user-scalable=yes, target-densitydpi=device-dpi' />
<title>센트럴서울안과</title>
<link rel='stylesheet' href='../css/common.css?<?=rand()?>' media='all' />
<link rel='stylesheet' href='../css/main.css?<?=rand()?>' media='all' />
<link rel='stylesheet' href='../css/owl.carousel.css' media='all' />
<link rel='stylesheet' href='../css/owl.theme.css' media='all' />
<link rel='stylesheet' href='../css/owl.transitions.css' media='all' />
<link rel='stylesheet' href='../css/sub.css?<?=rand()?>' media='all' />
<link rel='stylesheet' href='../css/font-awesome.min.css' media='all' />
<link rel='stylesheet' href='../css/jquery.bxslider.css' media='all' />
<link rel="icon" type="image/png" sizes="16x16" href="../img/gall/favicon-16x16.png">
<!-- <script type='text/javascript' src='../js/jquery-1.9.1.min.js'></script> -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146780112-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146780112-1');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WFWB4PK');</script>
<!-- End Google Tag Manager -->


<script type='text/javascript' src='../js/jquery-1.12.2.min.js'></script>
<script type='text/javascript' src='../js/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='../js/jquery.bxslider.min.js'></script>
<script type='text/javascript' src='../js/owl.carousel.js'></script>
<script type='text/javascript' src='../js/kth_slider.js'></script>
<script type='text/javascript' src='../js/main.js'></script>
<script type='text/javascript' src='../js/common.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js'></script>
</head>
<body class="wrap" style="position:relative;width:100%;min-width:1200px;max-width:1903px;overflow-x:scroll;">
	<div class="head_ytb" id="head_pop_wrap" style="height:134px;">
		<div class=""><a href="/07_counsel/community3.php?sno=0&group=basic&code=community03&category=&&cate1=&cate2=&cate3=&abmode=view&no=84740&bsort=desc&bfsort=ino
"><img src="../img/main/top_banner.jpg" alt="" style="position:relative;left:50%;margin-left:-1000px;" /></a></div>
		<div class="pop_close_wrap" style="position: absolute;left: 50%;bottom: 0;margin-left: 580px;color: #fff;padding: 3px 5px;">
				<a id="pop_close_btn"><span><img src='../img/main/head_pop_close.png' alt='이벤트창닫기' style="margin-left:10px;"></span></a>
				<div style="float:left;margin-right:5px;"><input type="checkbox" name="pop_close" id="pop_close_chk"> 오늘하루 이창을 열지 않음</div>
		</div>
	</div>
	<!-- 상단 팝업 -->
	<div>

		<div class="header">
			<h1><a href="../main/main.php"><img class="logo" src="../img/main/logo.jpg" alt="센트럴 서울안과" /></a> <img class="logo" src="../img/main/top_tel.jpg" alt="02.792.2226" /> </h1>
			<ul class="header_menu txt_plus_box">
				<? if(!$_SESSION['userid']){?>
				<li><a href="../member/login.php">로그인</a>&nbsp;&nbsp;| &nbsp;&nbsp;</li>
				<li><a href="../member/join.php">회원가입</a>&nbsp;&nbsp; | &nbsp;&nbsp; </li>
				<? }else{?>
				<li><a href="/<?=$INDIR?>/ammember/logout_session.php?return_url=/main/main.php">로그아웃</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
				<li>
					<a href=<?if($_SESSION['gcode'] == 'social_secret'){?>"javascript:alert('SNS계정 로그인 회원은 정보수정을 지원하지 않습니다.');"<?}else{?>"../member/edit.php""<?}?>>정보수정</a>&nbsp;&nbsp;| &nbsp;&nbsp;
				</li>
						<? } ?>
				<li><a href="../01_intro/intro10.php">오시는길</a>&nbsp;&nbsp; | &nbsp;&nbsp; </li>
				<li>글자크기&nbsp;&nbsp;<span class="txt_big"><a onkeypress="this.onclick" onclick="zoomIn();" href="#"><img src="../img/main/txt_plus.jpg" alt="글자키우기" /></a></span> <a onkeypress="this.onclick" onclick="zoomDefault();" href="#"><img src="../img/main/txt_fix.jpg" alt="" /></a> <span class="txt_small"><a onkeypress="this.onclick" onclick="zoomOut();" href="#"><img src="../img/main/txt_small.jpg" alt="글자줄이기" /></a></span></li>
			</ul>
			<script type="text/javascript">
				//화면확대 축소
				var nowZoom = 100; //
				var maxZoom = 130; //
				var minZoom = 80; //


				function zoomIn() {
					if (nowZoom < maxZoom) {
						nowZoom += 5; //
					} else {
						return;
					}
					document.body.style.zoom = nowZoom + "%";
				}


				function zoomOut() {
					if (nowZoom > minZoom) {
						nowZoom -= 5; //
					} else {
						return;
					}
					document.body.style.zoom = nowZoom + "%";
				}

				function zoomDefault() {
					nowZoom = 100;
					document.body.style.zoom = nowZoom + "%";
				}
			</script>

			<div class="head_search_wrap">
			<form method='get' action='../member/search.php'>
				<div class="ilh"><span><input type="text" name="search_word" id="search_word" title="검색" class="text" placeholder="검색어를 입력하세요"></span></div>
				<span class="search_btn"><input type="image" src="../img/main/search_btn.png" alt="사이트내 검색하기" style="vertical-align: -3px;margin-left: -1px;"></span>
				</form>
			</div>
		</div>
		<div class="gnb_wrap">
			<ul class="gnb txt_plus_box">
				<li class="first"><a style="padding: 8px 11px;" href="../01_intro/intro1.php">센트럴서울안과 소개</a></li>
				<li><a style="padding: 8px 35px;" href="../02_cataract/cataract2.php">노안 백내장 클리닉</a></li>
				<li><a href="../03_myopia/myopia2.php">시력교정, 각막 센터</a></li>
				<li><a style="padding: 8px 45px;"  href="../04_glaucoma/glaucoma9.php">녹내장 센터</a></li>
				<li><a style="padding: 8px 55px 8px 68px;" href="../05_retina/retina2.php">망막 센터</a></li>
				<li><a style="padding: 8px 0px 8px 9px; font-size:15px"  href="../06_dream/dream1.php">건조증, 드림렌즈 클리닉</a></li>
				<li class="last"><a style="padding: 8px 0 8px 36px;"  href="../07_counsel/counsel1.php">고객 만족 센터</a></li>
			</ul>
		</div>

<div class="dep2_area">
	<div class="dep2_menu">
		<ul>
			<li>
				<p><a href="../01_intro/intro1.php">인사말</a></p>
				<p><a href="../01_intro/intro2.php">미션∙비전∙핵심가치</a></p>
				<p><a href="../01_intro/intro3.php">MEET THE EXPERTS</a></p>
				<p><a href="../01_intro/intro4.php">연혁</a></p>
				<p><a href="../01_intro/intro5.php">수상내역</a></p>
				<p><a href="../01_intro/intro6_1.php">의료진소개</a></p>
				<p><a href="../01_intro/intro7.php">첨단의료장비</a></p>
				<p><a href="../01_intro/intro8.php">병원시설</a></p>
				<p><a href="../01_intro/intro9.php">진료시간</a></p>
				<p><a href="../01_intro/intro10.php">오시는길</a></p>
				<p><a href="../01_intro/intro11.php">C.I.</a></p>
			</li>
			<li style="width: 185px;">
				<p><a href="../02_cataract/cataract2.php">노안 백내장 수술 클리닉</a></p>
				<p><a href="../02_cataract/cataract9.php">레이저 백내장 수술</a></p>
				<p><a href="../02_cataract/cataract1.php">백내장이란</a></p>
				<p><a href="../02_cataract/cataract3.php">백내장 수술 선택가이드</a></p>
				<p><a href="../02_cataract/cataract4.php">프리미엄 인공수정체</a></p>
				<!-- <p><a href="../02_cataract/cataract5.php">레스토 렌즈</a></p>
				<p><a href="../02_cataract/cataract6.php">토릭 렌즈</a></p>
				<p><a href="../02_cataract/cataract7.php">렌티스 컴포트 렌즈</a></p> -->
				<p><a href="../02_cataract/cataract8.php">사후관리&해피콜</a></p>
			</li>
			<li style="width: 187px;">
				<!-- <p><a href="../03_myopia/myopia1.php">Dr.김균형</a></p> -->
				<p><a href="../03_myopia/myopia7.php">CS 엑스퍼트 라섹</a></p>
				<p><a href="../03_myopia/myopia3.php">안전한 안내렌즈삽입술이란</a></p>
				<p><a href="../03_myopia/myopia2.php">CS 고도, 초고도근시 클리닉</a></p>
				<p><a href="../03_myopia/myopia4.php">고도, 초고도근시와 백내장</a></p>
				<p><a href="../03_myopia/myopia5.php">고도, 초고도근시와 녹내장</a></p>
				<p><a href="../03_myopia/myopia6.php">고도, 초고도근시와 망막질환</a></p>
			</li>
			<li>
				<p><a href="../04_glaucoma/glaucoma9.php">CS 녹내장 클리닉 소개</a></p>
				<p><a href="../04_glaucoma/glaucoma8.php">최소침습녹내장수술</a></p>
				<p><a href="../04_glaucoma/glaucoma10.php">젠(XEN) 녹내장 스텐트 삽입술</a></p>
				<p><a href="../04_glaucoma/glaucoma11.php">아이스텐트 (iStent) 수술</a></p>
				<!-- <p><a href="../04_glaucoma/glaucoma12.php">마이크로펄스레이저 녹내장 수술</a></p> -->
				<!-- <p><a href="../04_glaucoma/glaucoma13.php">백내장-녹내장 병합 수술</a></p> -->
				<p><a href="../04_glaucoma/glaucoma3.php">녹내장이란</a></p>
				<p><a href="../04_glaucoma/glaucoma5.php">녹내장의 증상과 분류</a></p>
				<p><a href="../04_glaucoma/glaucoma6.php">녹내장 위험인자 및 유전성</a></p>
				<p><a href="../04_glaucoma/glaucoma2.php">CS 녹내장 정밀 진단 프로그램</a></p>
				<p><a href="../04_glaucoma/glaucoma7.php">CS 치료 프로그램</a></p>
				<!-- <p><a href="../04_glaucoma/glaucoma1.php">Dr.최재완</a></p> -->
			</li>
			<li>
				<!-- <p><a href="../05_retina/retina1.php">Dr. 황종욱</a></p> -->
				<p><a href="../05_retina/retina2.php">CS 원스톱 망막치료시스템</a></p>
				<p><a href="../05_retina/retina3.php">황반변성클리닉</a></p>
				<p><a href="../05_retina/retina4.php">당뇨망막클리닉</a></p>
				<p><a href="../05_retina/retina5.php">Constellation 유리체절제술</a></p>
				<p><a href="../05_retina/retina6.php">안구내 항체 주입술</a></p>
				<p><a href="../05_retina/retina7.php">범망막 광응고술(PRP)</a></p>
				<p><a href="../05_retina/retina8.php">OCT Angiography 망막검사</a></p>
				<p><a href="../05_retina/retina9.php">형광안저촬영</a></p>
			</li>
			<li style="width: 150px;">
				<p><a href="../06_dream/dream1.php">드림렌즈</a></p>
				<!-- <p><a href="../06_dream/dream2.php">드림렌즈 교정원리</a></p>
				<p><a href="../06_dream/dream3.php">장점 및 단점</a></p>
				<p><a href="../06_dream/dream4.php">시술대상</a></p>
				<p><a href="../06_dream/dream5.php">검사과정</a></p>
				<p><a href="../06_dream/dream6.php">정기검진</a></p> -->
				<p><a href="../06_dream/dream2.php">드림렌즈 체험기</a></p>
				<p><a href="../06_dream/dream8.php">안구건조증</a></p>
			</li>
			<li style="width: 157px;">
				<p><a href="../07_counsel/counsel1.php">온라인상담</a></p>
				<p><a href="../07_counsel/counsel2.php">온라인예약</a></p>
				<p><a href="../07_counsel/kakao.php">전화상담 신청</a></p>
				<p><a href="../07_counsel/community1.php?cate1=<?=urlencode("백내장")?>">수술 체험기</a></p>
				<p><a href="../07_counsel/community2.php">언론속 센트럴서울안과</a></p>
				<p><a href="../07_counsel/community5.php">바른 눈 치료 리포트</a></p>
				<p><a href="../07_counsel/community3.php">CS EYE소식</a></p>
				<p><a href="../07_counsel/community6.php">비급여진료비</a></p>
				<p><a href="../07_counsel/community4.php">채용안내</a></p>
				<p><a href="../07_counsel/community7.php">영상체험인터뷰</a></p>
				<p><a href="../07_counsel/community8.php">진행중인 이벤트</a></p>
			</li>
		</ul>
	</div>
</div>
