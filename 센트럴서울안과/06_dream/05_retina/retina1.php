<? include "../inc/head.php" ?>
<script type="text/javascript">
			$(document).ready(function(){				
				
				$(".retina_pop li a").on('click', function(){
					var num = $(this).parent().index();
					$('body').append("<div class='cover'></div>");
					$(".section01").hide();
					$(".section01").eq(num).show();
				});

				$(".section01").on('click', function(){
					$('body .cover').remove();
					$(".section01").hide();
					$(".retina_pop").show();
				});


				$(".retina_bookpop a").on('click', function(){
					var num = $(this).parent().index();
					$('body').append("<div class='cover'></div>");
					$(".section_book").hide();
					$(".section_book").eq(num).show();
				});

				$(".section_book").on('click', function(){
					$('body .cover').remove();
					$(".section_book").hide();
					$(".retina_bookpop").show();
				});



			});
		</script>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 망막클리닉 > <strong>Dr. 황종욱</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br>망막 클리닉 <strong>Dr. 황종욱</strong></h1>
		<div class="sub_imgtit">
			<div class="ltxt" style="padding-top: 100px;">
				<em>‘세상에서 가장 진보된 카메라’를 사랑한, 완벽한 수술을 지향하는 테크니션</em>
				<h1 class="doc_b_tit">Dr.황종욱</h1>	
				<h2>대한민국 대표적 1차의료기관내 망막수술전문의</h2>
			</div>
			<div class="rimg">
				<img src="../img/sub/retina1_1.jpg" alt="황종욱원장" />
			</div>
		</div>
		<img src="../img/sub/retina1_2.jpg" alt="" />
		<div class="box_section">			
			<div class="section" style="margin-bottom:50px; ">
				<h1 class="gray_txt">Biography</h1>
				<p>망막 파트 책임전문의인 황종욱 원장은 센트럴서울안과의 공동대표원장을 맡고 있습니다. </br>황종욱원장은 과학영재학교 경기과학고등학교를 우등졸업하였으며, 서울대학교 의과대학에서 의학사 학위를, 울산의대에서 의학박사 학위를 받았습니다. </br>서울아산병원 안과에서 안과 전문의 취득 후 안과전문병원인 한길안과병원 망막분과 진료과장과 서울아산병원 안과 망막 임상강사를 거쳐 국군수도병원 안과 전문계약직 초빙교수/과장을 역임하였습니다. </br>2011년 황종욱 원장은 서울의대 동문이자 녹내장 분야 전문의사인 최재완 원장과 함께 센트럴서울안과를 개원하였습니다.</br></br>
				
				황종욱 원장은 서울아산병원 안과 재직시 황반변성 치료제인 아일리아(Eylea)를 포함한 망막분야 국제임상시험 7건에 부연구자로 참여하였고, 2003-2004년도에는 대한안과학회 학술대회 수술비디오 부문에서 우수상과 최우수상을 연속으로 수상하였으며, 서울아산병원 우수학술활동 표창을 2년 연속 수상하였습니다. </br>2010년 아시아태평양망막학회 최우수연제후보로 선정되었으며, 국제인명사전인 Marquis Who’s Who in the World 에 2013, 2014, 2015년 3년연속등재되었습니다. 2013년에는 영국국제인명센터(IBC) ‘2000 Outstanding Intellectuals of 21st Century’ 에 선정되었습니다.</br></br>
				
				황종욱 원장의 주요 임상진료 분야는 당뇨망막병증, 망막전막, 황반원공, 망막박리에 대한 망막수술 (유리체절제술), 망막 레이저치료, 황반변성에 대한 안구내 항체주입술, 난치성 고난도 백내장수술 및 이차 인공수정체 삽입술, 인공수정체 교환술, 맞춤형 노안백내장수술입니다.</br></br></br></p>

				<h1 class="gray_txt">전세계 최고의 망막전문가 그룹 미국망막학회 (American Society of Retina Specialists)</h1>
				<p>황종욱 원장은 미국망막학회 (American Society of Retina Specialists, ASRS) 의 정회원으로 활동중입니다. 미국망막학회는 엄격한 심사기준을 통과하여야 회원으로 인정되는 closed society로서, 유수의 망막분야 석학들이 활동하며 최신의 치료결과를 공유하는 전세계 최고의 망막전문가 그룹입니다. 이외에도 황종욱 원장은 현재 한국망막학회 정회원, 한국백내장굴절수술학회 정회원, 한국콘택트렌즈학회 정회원, 미국시과학회지 Investigative Ophthalmology and Visual Science 및 영국안과학회지 British Journal of Ophthalmology 검토위원으로 활동 중이며, 서울아산병원 안과 외래 부교수를 겸임하고 있습니다.<br/><br/></p>
				<img src="../img/sub/retina1_00.jpg" alt=" " />
			</div>
			<div class="section retina_pop_wrap">
				<h1 class="gray_txt">다양한 안과학 국제학술지 제 1 저자 논문</h1>		
				<p>황종욱 원장은 학술적으로 전세계 최고의 안과학술지로 꼽히는 미국시과학회지 (Investigative Ophthalmology and Visual Science), 망막 (Retina), 영국안과학회지 (British Journal of Ophthalmology)에 망막 관련 논문을 제1저자로 게재하고 백내장 분야 권위지인 국제백내장굴절수술학회지 (Journal of Cataract and Refractive Surgery)에 제1저자로 3편의 논문을 게재하였으며 특히 2013년에는 안과의사로는 이례적으로 세계적 기초과학학술지인 메탈로믹스 (Metallomics)에 황반변성 관련 제 1저자 논문이 10월호 표지논문으로 게재되는 영광을 누리는 등 활발한 학술 활동을 펼치고 있습니다.</p>
				<div class="retina_pop">
					<ul>
						<li><a href="#this"><img src="../img/sub/retina1_img06.jpg" alt="" /></a></li>
						<li><a href="#this"><img src="../img/sub/retina1_img07.jpg" alt="" /></a></li>
						<li><a href="#this"><img src="../img/sub/retina1_img01.jpg" alt="" /></a></li>
						<li><a href="#this"><img src="../img/sub/retina1_img02.jpg" alt="" /></a></li>
						<li><a href="#this"><img src="../img/sub/retina1_img03.jpg" alt="" /></a></li>
						<li><a href="#this"><img src="../img/sub/retina1_img04.jpg" alt="" /></a></li>
						<li><a href="#this"><img src="../img/sub/retina1_img05.jpg" alt="" /></a></li>
					</ul>
				</div>
				<div class="section01">
					<img src="../img/sub/retina1_pop06.jpg" alt="" />
				</div>
				<div class="section01">
					<img src="../img/sub/retina1_pop07.jpg" alt="" />
				</div>
				<div class="section01">
					<img src="../img/sub/retina1_pop01.jpg" alt="" />
				</div>
				<div class="section01">
					<img src="../img/sub/retina1_pop02.jpg" alt="" />					
				</div>
				<div class="section01">
					<img src="../img/sub/retina1_pop03.jpg" alt="" />					
				</div>
				<div class="section01">
					<img src="../img/sub/retina1_pop04.jpg" alt="" />					
				</div>
				<div class="section01">
					<img src="../img/sub/retina1_pop05.jpg" alt="" />					
					<!-- <p class='close'><img src="../img/comm/closebtn.jpg" alt="" /></p> -->
				</div>
			</div>	
			<div class="section" style="margin-bottom:50px; ">
				<h1 class="gray_txt">세계적 기초과학학술지 메탈로믹스 (Metallomics)</h1>
				<p style="letter-spacing: -0.2px;">황종욱 원장은 2013년 10월 안과의사로서는 이례적으로 RSC (Royal Society of Chemistry) 산하의 세계적 기초과학학술지인 메탈로믹스 (Metallomics)에 황반변성관련 제 1 저자 논문을 게재하였으며 이 논문은 그 달의 표지논문으로 선정되는 영광을 누리며 저널커버를 장식하였습니다.</br></p>
				<img src="../img/sub/retina1_001.jpg" alt=" " /></br></br></br>

				<h1 class="gray_txt">‘세상에서 가장 진보된 카메라’를 사랑한 어느 의사의 이야기</h1>
				<p>황종욱 원장은 과학도로서의 장점을 살려 광학적으로 완벽한 수술을 지향합니다. 다만 황반변성이나 당뇨망막병증 등 여러 만성질환을 치료하는데 있어서 현존 치료법의 한계를 누구보다 잘 알고 있기에 환자를 대하는데 있어 인간으로서의 공감 (sympathy)이 가장 중요하다고 생각합니다.  주간 ‘Weekly People’ 내 인터뷰를 통해 그의 이야기를 들어봅니다.<br/><br/></p>
				<div class="retina_bookpop_wrap">
					<div class="retina_bookpop">
						<a href="#this"><img src="../img/sub/retina1_book01.jpg" alt="" />
					</div>
					<div class="section_book">
						<img src="../img/sub/retina1_bookpop01.jpg" alt="" />
					</div>				
				</div>
				
			</div>
		</div>
		<div class="sub_imgbtm">
			<div class="rimg">
				<img src="../img/sub/retina1_4.jpg" alt="" />
			</div>
			<div class="ltxt">
				<center><em style="font-size: 30px;">최선의 치료법 도입에 힘쓰며 낮은 문턱 </em><br/> <em style="font-size: 30px;">에서 최상의 치료를 받을 수 있는 안과를</em><br/><em style="font-size: 29px;">만드는데 최선을 다할 것을 약속드립니다.</em></center>
				<p>
					<strong class="blue">황종욱 원장은 </strong> <br/> 
					세계 최고의 안과학 저널인 미국시과학회지(Investigative Ophthalmology & Visual Science, IOVS) 망막분야의 권위 저널인 미국망막학회지(RETINA, The Journal of Retinal and Vitreous Diseases) 백내장분야의 권위 저널인 미국백내장굴절수술학회지(Journal of Cataract and Refractive Surgery, JCRS)<br/> 
				</p>
			</div>			
		</div>
		<img src="../img/sub/retina1_5.jpg" alt="" />
		
	</div>
</div>

<? include "../inc/foot.php" ?>