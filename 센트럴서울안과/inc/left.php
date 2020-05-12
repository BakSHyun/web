<!-- 왼쪽메뉴영역 -->
<div id=" ">
	<div id=" ">

		<?
			$urls=$_SERVER[PHP_SELF];
			$bn=basename($_SERVER["PHP_SELF"]);

			if(strpos($urls,'01_intro') !==false){
		?>

		<div class="sub_topmenu">
			<ul class="sub_dep1menu mtype03">
				<li><a href="../01_intro/intro1.php" <?=$bn=='intro1.php'?"class='select'":""; ?>>인사말</a></li>
				<li><a href="../01_intro/intro2.php" <?=$bn=='intro2.php'?"class='select'":""; ?>>미션∙비전∙핵심가치</a></li>
				<li><a href="../01_intro/intro3.php" <?=$bn=='intro3.php'?"class='select'":""; ?>>MEET THE EXPERTS</a></li>
				<li><a href="../01_intro/intro4.php" <?=strpos($urls,'intro4') !==false?"class='select'":"";  ?>>연구 연혁</a></li>
				<!-- <li><a href="../01_intro/intro5.php" <?=strpos($urls,'intro5') !==false?"class='select'":""; ?>>수상 내역</a></li> -->
				<li><a href="../01_intro/intro6_1.php" <?=strpos($urls,'intro6') !==false?"class='select'":""; ?>>의료진 소개</a></li>
				<li><a href="../01_intro/intro7.php" <?=$bn=='intro7.php'?"class='select'":""; ?>>첨단의료장비</a></li>
				<li><a href="../01_intro/intro8.php" <?=$bn=='intro8.php'?"class='select'":""; ?>>병원 시설</a></li>
				<li><a href="../01_intro/intro9.php" <?=$bn=='intro9.php'?"class='select'":""; ?>>진료시간</a></li>
				<li><a href="../01_intro/intro10.php" <?=$bn=='intro10.php'?"class='select'":""; ?>>오시는길</a></li>
				<li><a href="../01_intro/intro11.php" <?=$bn=='intro11.php'?"class='select'":""; ?>>C.I.</a></li>
				<li></li>
				<li></li>
			</ul>
		</div>

		<? }else if(strpos($urls,'02_cataract') !==false){ ?>
			<div class="sub_topmenu">
				<ul class="sub_dep1menu mtype02">
					<!-- <li><a href="../02_cataract/cataract2.php" <?=strpos($urls,'cataract2') !==false?"class='select'":""; ?>>CS 백내장굴절수술 클리닉</a></li> -->
					<li><a href="../02_cataract/cataract2.php" <?=strpos($urls,'cataract2') !==false?"class='select'":""; ?>>노안 백내장 수술 클리닉</a></li>
					<li><a href="../02_cataract/cataract9.php" <?=$bn=='cataract9.php'?"class='select'":""; ?>>레이저 백내장 수술</a></li>
					<li><a href="../02_cataract/cataract1.php" <?=$bn=='cataract1.php'?"class='select'":""; ?>>백내장이란</a></li>
					<li><a href="../02_cataract/cataract3.php" <?=$bn=='cataract3.php'?"class='select'":""; ?>>백내장 수술 선택가이드</a></li>

					<li><a href="../02_cataract/cataract4.php" <?if($bn=='cataract4.php' || $bn=='cataract5.php' || $bn=='cataract6.php' || $bn=='cataract7.php'){ echo "class='select'";}; ?>>프리미엄 인공수정체</a></li>
					<!-- <li><a href="../02_cataract/cataract4.php" <?=$bn=='cataract4.php'?"class='select'":""; ?>>아트렌즈</a></li>
					<li><a href="../02_cataract/cataract5.php" <?=$bn=='cataract5.php'?"class='select'":""; ?>>레스토렌즈</a>
					<li><a href="../02_cataract/cataract6.php" <?=$bn=='cataract6.php'?"class='select'":""; ?>>토릭렌즈</a>
					<li><a href="../02_cataract/cataract7.php" <?=$bn=='cataract7.php'?"class='select'":""; ?>>렌티스 컴포트 렌즈</a> -->

					<li><a href="../02_cataract/cataract8.php" <?=$bn=='cataract8.php'?"class='select'":""; ?>>사후관리&해피콜</a>
					</li>
				</ul>
			</div>
		<? }else if(strpos($urls,'03_myopia') !==false){ ?>
		<div class="sub_topmenu">
				<ul class="sub_dep1menu mtype02">
					<li><a href="../03_myopia/myopia1.php" <?=$bn=='myopia1.php'?"class='select'":""; ?>>Dr. 김균형</a></li>
					<li><a href="../03_myopia/myopia7.php" <?if($bn=='myopia7.php' || $bn=='myopia7_02.php'){ echo "class='select'";}; ?>>CS 엑스퍼트 라섹</a></li>
					<li><a href="../03_myopia/myopia3.php" <?=$bn=='myopia3.php'?"class='select'":""; ?>>안전한 안내렌즈삽입술이란</a></li>
					<li><a href="../03_myopia/myopia2.php" <?=$bn=='myopia2.php'?"class='select'":""; ?>>CS 고도·초고도근시 클리닉</a></li>
					<li><a href="../03_myopia/myopia4.php" <?=$bn=='myopia4.php'?"class='select'":""; ?>>고도·초고도근시와 백내장</a></li>
					<li><a href="../03_myopia/myopia5.php" <?=$bn=='myopia5.php'?"class='select'":""; ?>>고도·초고도근시와 녹내장</a></li>
					<li><a href="../03_myopia/myopia6.php" <?=$bn=='myopia6.php'?"class='select'":""; ?>>고도·초고도근시와 망막질환</a></li>
				</ul>
			</div>
		<? }else if(strpos($urls,'04_glaucoma') !==false){ ?>
		<div class="sub_topmenu">
				<ul class="sub_dep1menu mtype02">
					<li><a href="../04_glaucoma/glaucoma9.php" <?=$bn=='glaucoma9.php'?"class='select'":""; ?>>CS 녹내장 클리닉 소개</a></li>
					<li><a href="../04_glaucoma/glaucoma8.php" <?=$bn=='glaucoma8.php'?"class='select'":""; ?>>최소침습녹내장수술</a></li>
					<li><a href="../04_glaucoma/glaucoma10.php" <?=$bn=='glaucoma10.php'?"class='select'":""; ?>>젠(XEN) 녹내장 스텐트 삽입술</a></li>
					<li><a href="../04_glaucoma/glaucoma11.php" <?=$bn=='glaucoma11.php'?"class='select'":""; ?>>아이스텐트 (iStent) 수술</a></li>
					<!-- <li><a href="../04_glaucoma/glaucoma12.php" <?=$bn=='glaucoma12.php'?"class='select'":""; ?>>마이크로펄스레이저 녹내장 수술</a></li> -->
					<!-- <li><a href="../04_glaucoma/glaucoma13.php" <?=$bn=='glaucoma13.php'?"class='select'":""; ?>>백내장-녹내장 병합 수술</a></li> -->
					<li><a href="../04_glaucoma/glaucoma3.php" <?=$bn=='glaucoma3.php'?"class='select'":""; ?>>녹내장이란</a></li>
					<li><a href="../04_glaucoma/glaucoma5.php" <?=$bn=='glaucoma5.php'?"class='select'":""; ?>>녹내장의 증상과 분류</a></li>
					<li><a href="../04_glaucoma/glaucoma6.php" <?=$bn=='glaucoma6.php'?"class='select'":""; ?>>녹내장 위험인자 및 유전성</a></li>
					<li><a href="../04_glaucoma/glaucoma2.php" <?=$bn=='glaucoma2.php'?"class='select'":""; ?>>CS 녹내장 정밀 진단 프로그램</a></li>
					<li><a href="../04_glaucoma/glaucoma7.php" <?=$bn=='glaucoma7.php'?"class='select'":""; ?>>CS 맞춤형 녹내장 치료 프로그램</a></li>
					<!-- <li><a href="../04_glaucoma/glaucoma1.php" <?=$bn=='glaucoma1.php'?"class='select'":""; ?>>Dr. 최재완</a></li> -->
				</ul>
			</div>
		<? }else if(strpos($urls,'05_retina') !==false){ ?>
		<div class="sub_topmenu">
			<ul class="sub_dep1menu">
				<li><a href="../05_retina/retina1.php" <?=$bn=='retina1.php'?"class='select'":""; ?>>Dr. 황종욱</a></li>
				<li><a href="../05_retina/retina2.php" <?=$bn=='retina2.php'?"class='select'":""; ?>>CS 원스톱 망막치료시스템</a></li>
				<li><a href="../05_retina/retina3.php" <?=$bn=='retina3.php'?"class='select'":""; ?>>황반변성 클리닉</a></li>
				<li><a href="../05_retina/retina4.php" <?=$bn=='retina4.php'?"class='select'":""; ?>>당뇨망막 클리닉</a></li>
				<li><a href="../05_retina/retina5.php" <?=$bn=='retina5.php'?"class='select'":""; ?>>Constellation 유리체절제술</a></li>
				<li><a href="../05_retina/retina6.php" <?=$bn=='retina6.php'?"class='select'":""; ?>>안구내 항체 주입술</a></li>
				<li><a href="../05_retina/retina7.php" <?=$bn=='retina7.php'?"class='select'":""; ?>>범망막 광응고술(PRP)</a></li>
				<li><a href="../05_retina/retina8.php" <?=$bn=='retina8.php'?"class='select'":""; ?>>OCT Angiography 망막검사</a></li>
				<li><a href="../05_retina/retina9.php" <?=$bn=='retina9.php'?"class='select'":""; ?>>형광안저촬영</a></li>
				<li></li>
			</ul>
		</div>
		<? }else if(strpos($urls,'06_dream') !==false){ ?>
		<div class="sub_topmenu">
			<ul class="sub_dep1menu mtype02">
				<li><a href="../06_dream/dream1.php" <?=$bn=='dream1.php'?"class='select'":""; ?>>드림렌즈</a></li>
				<li><a href="../06_dream/dream2.php" <?=$bn=='dream2.php'?"class='select'":""; ?>>드림렌즈 체험기</a></li>
				<li><a href="../06_dream/dream8.php" <?=$bn=='dream8.php'?"class='select'":""; ?>>안구건조증</a></li>
				<li></li>
			</ul>
		</div>
		<? }else if(strpos($urls,'07_counsel') !==false){ ?>
		<div class="sub_topmenu">
			<ul class="sub_dep1menu mtype02">
				<li><a href="../07_counsel/counsel1.php" <?=$bn=='counsel1.php'?"class='select'":""; ?>>온라인 상담</a></li>
				<li><a href="../07_counsel/counsel2.php" <?=$bn=='counsel2.php'?"class='select'":""; ?>>온라인 예약</a></li>
				<li><a href="../07_counsel/kakao.php" <?=$bn=='kakao.php'?"class='select'":""; ?>>전화상담 신청</a></li>
				<li><a href="../07_counsel/community1.php?cate1=<?=urlencode("백내장")?>" <?=$bn=='community1.php'?"class='select'":""; ?>>수술 체험기</a></li>
				<li><a href="../07_counsel/community2.php" <?=$bn=='community2.php'?"class='select'":""; ?>>언론속 센트럴서울안과</a></li>
				<li><a href="../07_counsel/community5.php" <?=$bn=='community5.php'?"class='select'":""; ?>>바른 눈 치료 리포트</a></li>
				<li><a href="../07_counsel/community3.php" <?=$bn=='community3.php'?"class='select'":""; ?>>CS  EYE 소식</a></li>
				<li><a href="../07_counsel/community6.php" <?=$bn=='community6.php'?"class='select'":""; ?>>비급여진료비</a></li>
				<li><a href="../07_counsel/community4.php" <?=$bn=='community4.php'?"class='select'":""; ?>>채용안내</a></li>
				<li><a href="../07_counsel/community7.php" <?=$bn=='community7.php'?"class='select'":""; ?>>영상체험인터뷰</a></li>
				<li><a href="../07_counsel/community8.php" <?=$bn=='community8.php'?"class='select'":""; ?>>진행중인 이벤트</a></li>
			</ul>
		</div>

		<? }else if(strpos($urls,'member') !==false){ ?>
		<div class="sub_topmenu">
			<ul class="sub_dep1menu mtype03">
			<? if(!$_SESSION['userid']){?>
				<li><a href="../member/login.php" <?=$bn=='login.php'?"class='select'":""; ?>>로그인</a></li>
				<li><a href="../member/join.php" <?=$bn=='join.php'?"class='select'":""; ?>>회원가입</a></li>
				<li><a href="../member/idpw.php" <?=$bn=='idpw.php'?"class='select'":""; ?>>아이디/비번찾기</a></li>
				<? }else{ ?>
				<li><a href='/<?=$INDIR?>/ammember/logout_session.php?return_url=/' <?=$bn=='logout_session.php'?"class='select'":""; ?>>로그아웃</a></li>
				<li><a href="../member/edit.php" <?=$bn=='edit.php'?"class='select'":""; ?>>정보수정</a></li>
				<? } ?>
				<li><a href="../member/privacy.php" <?=$bn=='privacy.php'?"class='select'":""; ?>>개인정보 보호정책</a></li>
				<li><a href="../member/service1.php" <?=$bn=='service1.php'?"class='select'":""; ?>>환자권리장전</a></li>
				<li><a href="../member/service.php" <?=$bn=='service.php'?"class='select'":""; ?>>이용약관</a></li>

			</ul>
		</div>
		<? } ?>

	</div>

</div>
<!-- 왼쪽메뉴영역끝 -->
