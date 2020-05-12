<?
// 2020.04.27 최종 수정
// 개발자: 백성현
?>
<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 왜센트럴서울안과인가 > <strong>연혁</strong></div>
	<? include "../inc/left.php" ?>
  <? include "./_tap4.php" ?>
<!--컨텐츠 파트 start-->
	<div class="sub_cnt">

		<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br><strong>Central Seoul History</strong></h1>
<!--		<img src="../img/sub/intro4_2.jpg" alt="" />-->
		<div class="box_wrap">
		</div>
	</div>

	<script type="text/javascript">
	$(function(){
		for (var i = 0; i < trophy_arr.length; i++) {
			var inhtml = '<div class="box"><div class="box_thum">';
			var trophy_num = i+1;
			if (trophy_num <10) {
					trophy_num= '0'+trophy_num;
			}
			inhtml += '<img src="../img/sub/intro/intro4_2_'+trophy_num+'.jpg" alt="">';
			inhtml += '</div>	';
			inhtml += '<div class="box_txt">';
			inhtml += '<div class="box_mid_line"></div>';
			inhtml += trophy_arr[i];
			inhtml += '</div></div></div>	';
			$(".box_wrap").append(inhtml);
		}
		// $(".intro_since_form").
	});
		var trophy_arr =['2020년<br> 메디컬 헬스케어 대상<br> (노안, 녹내장 부문)',
		'헬스조선 선정 <br><좋은 병원>',
		'백내장 수술 우수 병원<br>(Center of Excellence)<br>(독일 Oculentis사)',
		'백내장 수술<br>  아시아태평양 레퍼런스 센터<br>  (네덜란드 OPHTEC사)  ',
		'아시아 태평양<br>  베스트 클리닉<br>  (독일 Oculentis)',
		'2016~2017<br> 대한민국소비자만족도1위<br>  (백내장 수술 및 안과질환)',
		'2016~2018<br> 2년 연속 세계안과학회 최우수학술상<br>  -최재완 원장-',
		'아쿠아ICL / EVO+ ICL<br>  전문 센터 인증<br>  (미국 STAAR Surgical사)',
		'2013<br> 파워브랜드 선정<br>  (노안, 백내장 부문)<br>  -일간스포츠-',
		'2013~2014 <br>한국소비자만족지수 1위<br>  (노안, 백내장 부문) ',
		'2016 한국브랜드선호도1위<br> (백내장 수술 및 안과질환)<br> -한국경제매거진- ',
		'2016 대한민국 베스트 브랜드대상<br> (백내장 수술 및 안과질환)<br> -한국경제매거진- ',
		'ICL Expert Surgeon<br> (미국 STAAR Surgical 社) <br>- 김균형 원장 -',
		'XEN MASTE<br>R (미국 Allergan 社)<br> -최재완 원장-',
		'ASRS (미국망막학회) 위촉장<br>  -황종욱 원장-',
		'2009~2020 (11년 연속)<br>  소비자 분쟁 전문위원 위촉장<br> (한국소비자원)<br> - 김균형 원장-'
	];




	</script>
	<div class="clear_float">
<!--컨텐츠 파트 end -->


<? include "../inc/foot.php" ?>
