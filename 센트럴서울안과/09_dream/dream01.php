<? include "../inc/head.php" ?>
<script>

//###kth_flash vol 0.1##//

function showFlash(swfUrl,swfW,swfH,wmode){
{
	document.writeln(getFlash(swfUrl,swfW,swfH,wmode));
}

function getFlash(swfUrl,swfW,swfH,wmode){
	
	var result = "";
	
	if(!wmode){
	  wmode='transparent'
	}
	result += ('<object type="application/x-shockwave-flash" data='+swfUrl+' width='+swfW+' height='+swfH+'>')
    result += ('<param name="loop" value="false" />')
	result += ('<param name="movie" value="'+swfUrl+'" />')
	result += ('<param name="wmode" value="'+wmode+'" />')
	result += ('</object>')

	return result;
}

}
</script>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 드림렌즈 > <strong>드림렌즈</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br>드림렌즈</h1>
		<div class="sub_imgtit">
			<div class="ltxt" style="height:350px;padding-top:70px">
				<h1>드림렌즈</h1>	
				<h2>자는 동안 편평해진 각막에 의해<br/>낮 동안 좋은 시력을 유지할 수 있는<br/>시력교정방법입니다.</h2>
			</div>
			<div class="rimg">
				<img src="../img/sub/dream1_1.jpg" alt="드림렌즈" />
			</div>
		</div>

		<div class="box_section">			
			<div class="section">	
				<p>특수하게 제작된 콘택트렌즈를 이용하여 각막의 중심부를 눌러줌으로써 근시를 교정하게 됩니다. 자기 전에 렌즈를 착용하고 아침에 렌즈를 제거하며 자는 동안 편평해진 각막에 의해 낮 동안 좋은 시력을 유지할 수 있는 시력 교정 방법입니다.</p>
				<img src="../img/sub/dream1_2.jpg" alt="드림렌즈" />
			</div>
			<div class="section m-b-0">				
				<ul class="tablist type02">
					<li class="on">드림렌즈 교정원리</li>
					<li>장점 및 단점</li>
					<li>시술대상</li>
					<li>검사과정</li>
					<li>정기검진</li>
				</ul>
				<div class="tab_cnt" id="content1">
					<div class="section m-b-0">
						<h2>드린렘즈 교정원리</h2>
						<p>특수하게 디자인된 렌즈를 이용하여 각막중심부를 눌러주어 상피세포의 재배치를 유도하게 되면, 각막의 굴절력이 감소하여 근시를 교정할 수 있게 됩니다. 이는 각막 중심부를 레이저를 이용하여 평평하게 깎아내는 라식수술의 원리와 비슷한 것입니다.</p>
						<img src="../img/sub/dream1_3.jpg" alt="드림렌즈" /><br/><br/>						
						<div class="gray_full_txt">근시를 교정하는 안경 및 라식, 드림렌즈의 원리를 보여주는 동영상</div>	
						<div class="video_wrap">
<!-- 							<img src="../img/sub/retina5_video.jpg" alt="">							 -->
							<object type="application/x-shockwave-flash" data="../flash/sub_vod3.swf" width="550" height="406" style="margin:0 auto;">
							<param name="movie" value="../flash/sub_vod3.swf" />
							<param name='wmode' value='transparent' />
							<param name='allowScriptAccess' value='always' />
							</object>
						</div>						
					</div>						
				</div>
				<div class="tab_cnt" id="content2">
					<div class="section m-b-0">
						<h2>드림렌즈 장점 </h2>
						<div class="num_box">
							<p class="num_list"><span>1</span>성장기 어린이 근시진행 억제효과가 있습니다.</p>
							<p class="num_list"><span>2</span>낮 동안 안경이나 렌즈 없이 일상생활이 가능합니다.</p>
							<p class="num_list"><span>3</span>잠잘 때에만 착용하기 때문에 소아의 경우 부모의 통제가 기능하며, 렌즈 분실의 위험이 적습니다.</p>							
							<p class="num_list"><span>4</span>연령제한이 없습니다.</p>							
							<p class="num_list"><span>5</span> 렌즈 착용을 중단하게 되면 원래의 눈 상태로 돌아오기 때문에 안전합니다.</p>							
						</div>		
						<br/><br/><br/>
						<h2>드림렌즈 단점 </h2>
						<div class="num_box">
							<p class="num_list"><span>1</span>렌즈 구입 및 관리 비용이 발생합니다.</p>
							<p class="num_list"><span>2</span>렌즈 관리에 따라 부작용이 발생 할 수 있습니다. (충혈, 통증, 시력저하, 상처 및 염증)</p>
							<p class="num_list"><span>3</span>어린아이의 경우 관리가 어려우므로 부모의 관리가 필요합니다.</p>							
							<p class="num_list"><span>4</span>간헐적 착용시 근시 진행 억제효과가 저하되므로 매일 착용 하는게 좋습니다.</p>							
						</div>	
						<img src="../img/sub/dream1_4.jpg" alt="드림렌즈" />
					</div>					
				</div>
				<div class="tab_cnt" id="content3">
					<div class="section m-b-0">
						<h2>드림렌즈 대상</h2>
						<div class="dot">
							<div class="dot_list">
								<ul>
									<li>중등도 이하의 근시(-5D) 와 난시(-1.5D)에서 탁월한 효과</li>
									<li>진행성 근시가 심해지는 성장기 학생 (근시 진행 억제효과 탁월)</li>
									<li>기존에 콘택트렌즈 부작용으로 렌즈착용이 불편하셨던 분</li>
									<li>안경착용 불편한 연예인, 운동선수, 비행승무원, 신체활동 많은 분</li>
									<li>시력교정수술이 두려운 분</li>
									<li>시력교정수술 후 시력이 떨어진 분</li>
								</ul>
							</div>
						</div>
						<img src="../img/sub/dream1_5.jpg" alt="드림렌즈" />
					</div>					
				</div>
				<div class="tab_cnt" id="content4">
					<div class="section m-b-0">
						<h2>드림렌즈 검사과정</h2>
						<img src="../img/sub/dream1_6.jpg" alt="드림렌즈" /><br/><br/>
						<img src="../img/sub/dream1_8.jpg" alt="드림렌즈" />						
					</div>					
				</div>
				<div class="tab_cnt" id="content5">
					<div class="section m-b-0">
						<img src="../img/sub/dream1_7.jpg" alt="정기검진" />
						<p>정기검진은 시력검사, 각막 지형도 검사, 세극등 검사, 렌즈상태 검사로 이루어지며 렌즈관리법 확인을 통해 착용을 잘하고 있는지를 확인합니다. 일정대로 검진을 오셔야 드림렌즈의 부작용을 최소로 줄일 수 있습니다.</p>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>