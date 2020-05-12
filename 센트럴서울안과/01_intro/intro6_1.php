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
			<li><a href="intro6_1.php"><img src="../img/sub/intro6_1_6_ov.jpg" alt="" /></a></li>
			<li><a href="intro6_3.php"><img src="../img/sub/intro6_1_3.jpg" alt="" /></a></li>
			<li><a href="intro6_4.php"><img src="../img/sub/intro6_1_4.jpg" alt="" /></a></li>
			<li><a href="intro6_5.php"><img src="../img/sub/intro6_1_1.jpg" alt="" /></a></li>
			<li><a href="intro6_6.php"><img src="../img/sub/intro6_1_5.jpg" alt="" /></a></li>
			<li><a href="intro6_2.php"><img src="../img/sub/intro6_1_2.jpg" alt="" /></a></li>
		</ul>
		
		<div class="doc_info">
			<div class="doc_tit">
				<h1>김미진 원장 <span class="">녹내장, 백내장, 시력교정</span></h1>
				<p><strong>서울의대 출신, 대학교수 경력의 녹내장 전문가 </strong></p>
			</div>
			<ul class="tabs" style="border-right:1px solid #dadada">
				<li class="on">학력/경력</li>
				<li>논문</li>
				<li>학회</li>
			</ul>
			<div class="tabcnt"  id="content1">
				<h2>학력/경력</h2>
				<p>서울대학교 의과대학 졸업 (2007)<br/>
						서울대학교 대학원 의학석사 (2013)<br/>
						서울대병원 안과 전공의 (2008-2011)<br/>
						분당서울대병원 안과 녹내장 전임의 (2012-2014)<br/>
						건양의대 김안과병원 (2014-2020)<br/>
						현 센트럴서울안과 녹내장 진료원장<br/>
				</p>

			</div>
			<div class="tabcnt"  id="content2">
				<h2>논문</h2>
				<p>
					1. Differentiation of parapapillary atrophy using spectral-domain optical coherence tomography</br>Ophthalmology<br/><br/>
					2. Relationship of spontaneous retinal vein pulsation with ocular circulatory cycle</br>PLoS One<br/><br/>
					3. Spontaneous retinal venous pulsation and disc hemorrhage in open-angle glaucoma.</br>Invest Ophthalmol Vis Sci.<br/><br/>
					4. Metabolic syndrome as a risk factor in normal-tension glaucoma</br>Acta Ophthalmol.<br/><br/>
					5. Recent structural alteration of the peripheral lamina cribrosa near the location of disc hemorrhage in glaucoma.</br>Invest Ophthalmol Vis Sci.<br/><br/>
					6. Relationship of intraocular pressure and frequency of spontaneous retinal venous pulsation in primary open-angle glaucoma</br>Ophthalmology<br/><br/>
					7. Influence of lamina cribrosa thickness and depth on the rate of progressive retinal nerve fiber layer thinning.</br>Ophthalmology<br/><br/>
					8. Microstructure of β-zone parapapillary atrophy and rate of retinal nerve fiber layer thinning in primary open-angle glaucoma.</br>Ophthalmology<br/><br/>
					9. Peripapillary retinoschisis in glaucomatous eyes</br>Invest Ophthalmol Vis Sci.<br/><br/>
					10. 상사근기능항진에서 상사근힘줄절제술 및 상사근뒤쪽힘줄절제술의 교정 효과</br>한안지<br/><br/>
					11. 전층각막이식술 후 발생한 감염성 각막염의 임상양상 및 위험요인.</br>한안지<br/><br/>
					12. 망막에서 기인한 기형성 수질상피종 1예.</br>한안지<br/><br/>
					13. 안와골절 수술 후 발생한 두가지 상피세포를 가진 안와점액낭종 1예.</br>한안지<br/><br/>
					14. 안내 섬모에 의한 안내염.</br>J Neurosurg Spine<br/><br/>
					<br/><br/>
				</p>
			</div>
			<div class="tabcnt"  id="content3">
				<h2>학회</h2>
				<p> 
					1. Differentiation of Parapapillary Atrophy using SD-OCT (구연)</br>Asia-Pacific Glaucoma Congress 2012<br/><br/>
					2. Spontaneous Retinal Venous Pulsation and Disc Hemorrhage in Open Angle Glaucoma</br>ARVO 2013br/><br/>
					3. Differentiation of Parapapillary Atrophy using SD-OCT (포스터)</br>World Glaucoma Congress 2013<br/><br/>
					4. Metabolic Syndrome and the Risk of Developing Normal Tension Glaucoma (포스터)</br>ARVO 2012<br/><br/>
					5. Clinical Characteristics of Infectious Keratitis Following Penetrating Keratoplasty (포스터)</br>ARVO 2011<br/><br/>
				</p>
			</div>
			<!--<div class="tabcnt"  id="content4">
				
			</div>
			<div class="tabcnt"  id="content5">
			</div>-->
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>