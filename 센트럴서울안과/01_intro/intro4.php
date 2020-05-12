<?
// 2020.04.27 최종 수정
// 개발자: 백성현
?>
<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 왜센트럴서울안과인가 > <strong>연구 연혁</strong></div>
	<? include "../inc/left.php" ?>
  <? include "./_tap4.php" ?>
<!--컨텐츠 파트 start-->
	<div class="sub_cnt">

		<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br><strong>Central Seoul History</strong></h1>
<!--		<img src="../img/sub/intro/intro4_2.jpg" alt="" />-->
		<div class="intro_since_form">

		</div>
	</div>
<!--컨텐츠 파트 end -->

<script type="text/javascript">
$(function(){
	for (var i = 0; i < since.length; i++) {
		var inhtml = '<div class="intro_since_wrap" style="height:'+since[i].month.length*52+'px">';
		inhtml += '<div class="intro_sin">';
		var since_num = i+1;
		if (since_num <10) {
				since_num= '0'+since_num;
		}
		inhtml += '<img src="../img/sub/intro/since_'+since_num+'.jpg" alt="" />';
		inhtml += '</div>';
		inhtml += '	<div class="intro_work">';
		inhtml += '<ul>';
		for (var j = 0; j < since[i].month.length; j++) {
			inhtml +='<li><img src="../img/sub/intro/li_icon.png" alt="" /> <span class="monthnum">'+since[i].month[j]+'</span> <span class="content_txt">'+since[i].content[j]+'</span></li>';
			if (j < (since[i].month.length-1)) {
				inhtml +='<li class="line_li"></li>';
			}

		}
		inhtml += '</ul>';
		inhtml += '</div></div>';
		$(".intro_since_form").append(inhtml);
	}
	// $(".intro_since_form").
})
	var since =[{
			'since' : '2020',
			'month' : ['06','05','03','01'],
			'content':[
			'세계안과학회 녹내장 세션 좌장 및 초청연자 (최재완 원장)',
			'녹내장 클리닉 의료진 보강 (김미진 원장 영입, 5월부터 진료)',
			'국제녹내장수술학회 스텐트수술 세션 좌장 (최재완 원장, 영국 런던) ',
			'센트럴서울안과 2020 소식지 <나눔, 그리고 나음> 발간 ']
	},
	{
			'since' : '2019',
			'month' : ['12','11','08','08','07','06','04','04','04','03','01'],
			'content':[
				'전안부 전용 안구광학단층촬영장치 <CASIA-2> / 레이저백내장수술장비 <Femto LDV Z8> 도입',
				'유튜브 눈 건강 정보 채널 <DocTorsTV>와 <녹내장TV> 개국',
				'312차 비전케어 아이캠프 자원봉사 의료진 파견 (중국 꾸이양)',
				'305차 비전케어 아이캠프 자원봉사 의료진 파견 (키르키스스탄 비슈케크)',
				'4차 확장 공사 (행복연구소, 콜센터, 사무공간 확장)',
				'XEN MASTER 인증 (최재완 원장 – Allergan사) ',
				'세계녹내장학회 수술세션 초청강연 (최재완 원장, 호주 멜버른)',
				'미국 TAAR Surgical사 ICL expert surgeon 선정 (전안부 클리닉 김균형원장)',
				'ICL Expert Surgeon 선정 (김균형 원장 – STAAR Surgical 사)',
				'망막 클리닉 의료진 보강 (송민혜 원장 영입)',
				'센트럴서울안과 2019 소식지 첫 발간'
			]
	},
	{
		'since' :'2018',
			'month' : ['11','09','07','06','03','03'],
			'content':[
				'녹내장 젠 (XEN)스텐트 수술 서울 최초 집도',
				'287차 비전케어 아이캠프 자원봉사 의료진 파견 (중국 꾸이양)',
				'헬스조선 선정 <좋은 병원> 인증',
				'세계안과학회 녹내장 세션 초청강연 및 우수학술상 수상 (최재완 원장, 스페인 바르셀로나)',
				'미국안과학회지 (Ophthalmology) 선정 우수심사위원상 (Outstanding Reviewer Award) 수상 (최재완 원장)',
				'이촌1동 사회보장협의체 고문 위촉 (최재완 원장)']
			},{
	'since' :'2017',

		'month' : ['08','07','07','07','05','05','05','05','04','03','03'],
		'content':[
			'254차 비전케어 아이캠프 자원봉사 의료진 파견 (중국 꾸이양)',
			'알버트넬슨 평생공로상 (최재완 원장 - 마르퀴즈후즈후)',
			'녹내장 아이스텐트 (iStent) 수술 도입',
			'유럽백내장굴절수술학회 노안백내장수술 포스터 발표 (김균형 원장, 포르투갈 리스본)',
			'대한민국소비자만족도1위 (백내장 수술 및 안과질환) (한국마케팅포럼)',
			'3차 확장 공사 (외래센터/수술센터 분리)',
			'2018.5 Albert Nelson Marquis Lifetime Achievement Award 알버트 넬슨 평생공로상 수상(황종욱 원장, 2년 연속)',
			'시력교정레이저 / 안구건조증 전용 진단 장비 / 다초점망막전위도 검사 장비 등 도입',
			'노안·전안부 클리닉 확장 (유애리 원장 영입)',
			'아시아태평양안과학회 녹내장 세션 좌장 및 초청강연 (최재완원장, 싱가포르)',
			'아시아 태평양 베스트 클리닉 (독일 Oculentis사) '
		]},{
'since' :'2016',
	'month' : ['11','11','10','10','09','05','04','03','03','02','02'],
	'content':[
		'아쿠아ICL 전문 센터 인증 (미국 STAAR Surgical사)',
		'개원5주년 기념행사 <국악한마당 나눔과 어울림> 개최',
		'대한민국 베스트 브랜드 대상(백내장수술 및 안과질환 부문) 한국경제매거진',
		'실명질환예방 기부금 마련 전 구성원 서울달리기대회 참가',
		'유럽백내장굴절수술학회 노안백내장수술 세션 초청강연 (김균형 원장, 덴마크 코펜하겐)',
		'대한민국소비자만족도1위 (백내장 수술 및 안과질환) (한국마케팅포럼)',
		'한국 브랜드 선호도 1위 (백내장 수술 및 안과질환) (한국경제매거진) ',
		'아시아태평양안과학회 노안백내장수술 세션 초청강연 (김균형 원장, 대만 타이페이)',
		'미국망막학회 (ASRS, American Society of Retina Specialists) 정회원 위촉 (황',
		'세계안과학회 녹내장 세션 초청강연 및 우수학술상 수상 (최재완 원장, 멕시코 과달라하라)',
		'이촌1동 사회보장협의체 공식 회원기관 등록'
	]},{
'since' :'2015',
'month' : ['10','10','09','04','04','04','03','03'],
'content':[
	'2차 확장 공사 (병원 전체 리노베이션)',
	'컴퓨터 네비게이션 백내장 수술 시스템 <칼리스토아이 (Callisto Eye)> 도입',
	'한국소비자만족지수 1위 (노안,백내장 수술)',
	'아시아태평양안과학회 녹내장 세션 초청강연 (최재완 원장, 중국 광저우)',
	'백내장 수술 아시아태평양레퍼런스센터 (네덜란드 OPHTEC사)  ',
	'백내장 수술 우수 병원 (Center of Excellence) (독일 Oculentis사)',
	'노안·전안부 클리닉 개설 (김균형 원장 영입)',
	'대한안과의사회 학술위원 위촉 (황종욱, 김균형원장)'
]},{
'since' :'2014',
'month' : ['09','09','05','04'],
'content':[
'한국소비자만족지수 1위 (노안, 백내장 부문 - 한경비즈니스)',
'1차 확장 공사 (수술실 및 검사실)',
'광각망막촬영장치 <옵토맵(Optomap)> 도입',
'세계안과학회 초청강연 (최재완원장, 일본 도쿄)'
]},{
'since' :'2013',
'month' : ['10','09','09','02','01'],
'content':[
'국제학술지 Metallomics 표지논문 1저자 게재 (황종욱 원장)<br><spna class="mg_75"> Methallothionein-3 contributes to vascular endothelial growth factor induction in a mouse model of choroidal</span> ',
'한국소비자만족지수 1위 (노안, 백내장 부문 - 한경비즈니스)',
'녹내장 Ex-Press 방수 유출관 삽입술 도입',
'파워브랜드 선정 (노안, 백내장 부문 - 일간스포츠)',
'파워브랜드 선정 (노안, 백내장 부문 - 일간스포츠)'
]},{
'since' :'2012',
'month' : ['06','02'],
'content':[
'녹내장 레이저 SLT 장비 도입',
'세계 안과 학회 초청강연 (최재완 원장, UAE 아부다비)'
]},{
'since' :'2011',
'month' : ['11'],
'content':[
'센트럴서울안과 개원'
]}
];




</script>
<? include "../inc/foot.php" ?>
