<? include "../inc/head.php" ?>
<script type="text/javascript">
	$(document).ready(function (){
		$(".tabs li").click(function (){
			var num = $(this).index();

			$(".tabs li").removeClass('on');
			$(".tabs li").eq(num).addClass('on');

			$(".tabcnt").hide();
			$(".tabcnt").eq(num).show();	

		});
	})
</script>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 왜센트럴서울안과인가 > <strong>의료진 소개</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br>‘바른’ 눈 전문가들, <strong>센트럴서울안과에서 만나십시오.</strong> </h1>
		<ul class="doc_list">
			<li><a href="intro6_1.php"><img src="../img/sub/intro6_1_6.jpg" alt="" /></a></li>
			<li><a href="intro6_3.php"><img src="../img/sub/intro6_1_3.jpg" alt="" /></a></li>
			<li><a href="intro6_4.php"><img src="../img/sub/intro6_1_4.jpg" alt="" /></a></li>
			<li><a href="intro6_5.php"><img src="../img/sub/intro6_1_1.jpg" alt="" /></a></li>
			<li><a href="intro6_6.php"><img src="../img/sub/intro6_1_5_ov.jpg" alt="" /></a></li>
			<li><a href="intro6_2.php"><img src="../img/sub/intro6_1_2.jpg" alt="" /></a></li>
		</ul>
		
		<div class="doc_info">
			<div class="doc_tit">
				<h1>송민혜 원장 <span class="">망막, 백내장</span></h1>
				<p><strong>10년 임상 경력의 검증된 망막 전문의                     </strong></p>
			</div>
			<ul class="tabs" style="border-right:1px solid #dadada">
				<li class="on">학력/경력</li>
				<li>논문</li>
			</ul>
			<div class="tabcnt"  id="content1">
				<h2>학력/경력</h2>
				<p>서문여고 졸업(1996.2)<br/>
				가톨릭대학교 의과대학 졸업 및 의사면허 취득(2003.2)<br/>
				강남성모병원, 성바오로병원 인턴 수료(2004.2)<br/>
				가톨릭중앙의료원 안과 레지던트 수료 및 전문의 자격증취득(2008.2)<br/>
				여의도성모병원 안과 망막 임상강사(2008.3)<br/>
				김포한길안과 원장(2010.3)<br/>
				새빛안과병원 망막 과장, 지도전문의(2017.1)<br/>
				가톨릭대학교 대학원 석박통합 과정 수료(2011)<br/>
				대한안과학회 정회원(2008.3)<br/>
				대한망막학회 정회원(2009.10)<br/>
				대한포도막학회 정회원(2010.10)<br/>
				</p>

			</div>
			<div class="tabcnt"  id="content2">
				<h2>논문</h2>
				<p>
					1. The Effect of Photodynamic Therapy in Chronic Central Serous Chorioretinopathy </br>한안지 2007 Aug<br/><br/>
					2. The Relationship of Hypertropia, Inferior Oblique Overaction and Extorsion in Congenital Superior Oblique Palsy</br>한안지 2007 Oct <br/><br/>
					3. The Statistical Observation of Ocular Injury</br>한안지 2009 Apr<br/><br/>
					4. Short-term Efficacy of Intravitreal Ranibizumab for Myopic Choroidal Neovascularization</br>한안지 2009 Jul<br/><br/>
					5. Analysis of Postoperative Macular Edema in Cataract Patients with Diabetes using Optical Coherence Tomography</br>한안지 2010 Mar<br/><br/>
					6. Combined Clear Corneal Phacoemulsification and Vitrectomy Versus Two-Step Surgery in Korean Patients With Idiopathic Epiretinal Membrane</br>한안지 2011 Feb<br/><br/>
					7. Bilateral serous retinal detachment as the first manifestation of paroxysmal nocturnal haemoglobinuria</br>Eye (2007) 21, 437–439<br/><br/>
					8. Intravitreal ranibizumab in a patient with choroidal neovascularization secondary to choroidal osteoma</br>Eye (2009) 23, 1745–1746<br/><br/>
					9. Intravitreal ranibizumab for choroidal neovascularization in serpiginous choroiditis</br>Eye (2009) 23, 1873–1875<br/><br/>
					10. One-year results of intravitreal Ranibizumab with or without Photodynamic therapy for Polypoidal Choroidal Vasculopathy</br>Opthalmologica.2011;226(3):119-26<br/><br/>
					<br/><br/>
				</p>
			</div>
			<!-- <div class="tabcnt"  id="content3">
			</div>
			<div class="tabcnt"  id="content4">
				<h2>인증내역</h2>
				<p> 
					<img src="../img/sub/intro6_3_img01.jpg" alt="" />
					<img src="../img/sub/intro6_3_img02.jpg" alt="" />
					<img src="../img/sub/intro6_3_img03.jpg" alt="" />
				</p>
			</div>
			<div class="tabcnt"  id="content5">
			</div> -->
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>