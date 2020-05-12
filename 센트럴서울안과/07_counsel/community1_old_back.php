<? include "../inc/head.php" ?>
<style>
	*{margin:0; padding:0; border:0; list-style:none;}
	#roll_wrap {width:1200px; height:650px; overflow:hidden; border:5px solid #b2c3cd; position:relative; vertical-align:top;}
	.slider {position:relative;}
	.slider li {width:1200px; height:130px; overflow:hidden; background:url(../img/community_img/icon.jpg) 24px center no-repeat; border-bottom:1px solid #cfcfcf; text-align:left;}
	.slider li img {float:left; display:block; margin:18px 0 0 85px;}
	.slider li p {float:left; margin:18px 0 0 30px; font:normal 14px/26px 'dotum'; color:#777; letter-spacing:-1px;}
	.slider li strong {    color: #004fc2;
    font-size: 17px;
    display: block;
    margin-bottom: 10px;
    text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
    -moz-binding: url('ellipsis.xml#ellipsis');
    white-space: nowrap;
    overflow: hidden;}
</style>

<script type='text/javascript' src='../include/jquery-1.11.2.min.js'></script>
<script type='text/javascript' src='../include/jquery.easing.1.3.js'></script>
<link rel="stylesheet" href="../css/common.css" media="all">
<script type='text/javascript'>
	$(document).ready(function(){
		var over=0;
		var chk=0;
		var time = 3000;
		var id=null;
		var gab = 130;

		function apd(){var clone = $('#roll_wrap .slider ul').clone();$('#roll_wrap .slider').append(clone);}apd();
		function autoPlay(){id = setInterval(function(){rollChk();},time)};autoPlay();

		function rollChk(){
			over++;
			if(chk==9){
				chk=0;
				apd();
			}else{
				chk++;
			}
			$('#roll_wrap .slider').stop().animate({top:-(gab*(over))},800);
			//console.log(-(gab*(over-1)));
		}
	});
</script>
<div class="sub_wrap" >
	<div class="pagenavi">HOME > 커뮤니티 > <strong>수술 체험기</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<img src="../img/board/board_img03.jpg" alt="수술 체험기" />
		<div class="board_wrap">


			<div id='roll_wrap' style="margin:0 auto;">
				<div class='slider'>
					<ul>
						<li>
							<img src='../img/community_img/img1.jpg' alt=''/>
							<p>
							<strong>오**님 / 67세 / 백내장수술</strong>
							백내장 수술 잘해주셔서 감사합니다. 간호사님도 친절하시고 여러모로 감사합니다..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img2.jpg' alt=''/>
							<p>
							<strong>한**님 / 30세 / 백내장수술</strong>
							수술을 꼼꼼하게 해주신 원장님께 정말 감사 드리며 꼼꼼하게 챙겨주신 상담실장님과<br/>다른 상담원 분들께도 감사 드립니다..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img3.jpg' alt=''/>
							<p>
							<strong>이**님 / 90세 / 백내장수술</strong>
							진료와 수술 후에도 친절하게 상담 해주시고 수술경과가 좋아서 아주 만족합니다..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img4.jpg' alt=''/>
							<p>
							<strong>김**님 / 77세 / 백내장수술</strong>
							진료시 자세한 설명을 해주시고 환자를 편안하게 해주셔서 환자로 하여금 안심하고<br/>치료에 응할 수 있었습니다..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img5.jpg' alt=''/>
							<p>
							<strong>이**님 / 60세 / 백내장수술</strong>
							친척의 소개를 받고 병원을 찾아 왔는데 개인병원에서는 볼 수 없는 현대식 시설과 의사 선생님을..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img6.jpg' alt=''/>
							<p>
							<strong>김**님 / 60세 / 백내장수술</strong>
							수술 전 이물감이 있어 내원하였고, 수술 후 불편함이 없이 좋게 개선되었습니다..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img7.jpg' alt=''/>
							<p>
							<strong>이**님 / 58세 / 백내장수술</strong>
							정성껏 수술해 주신 원장님께 깊이 감사 드리며 더 많은 사람들에게 밝은 세상을 보게 해주세요..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img8.jpg' alt=''/>
							<p>
							<strong>한**님 / 30세 / 백내장수술</strong>
							처음 진단 받았을 때 나이가 20세 후반인지라 백내장이 올 것이라고는 상상도 못하고 있었는데..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img9.jpg' alt=''/>
							<p>
							<strong>변**님 / 57세 / 백내장수술</strong>
							원장님 인품이 특출하시고 상담도 잘해주셔서 감사했습니다..
							</p>
						</li>
						<li>
							<img src='../img/community_img/img10.jpg' alt=''/>
							<p>
							<strong>김**님 / 61세 / 백내장수술</strong>
							양쪽 눈에 백내장이 있는 상태로 일상생활에서 많은 불편을 느꼈으나 수술 후 마치 소명이<br/>눈을 뜬 것과 같은 희열을 느꼈습니다..
							</p>
						</li>
					</ul>
				</div>
			</div>


		</div>
	</div>
</div>

<? include "../inc/foot.php" ?>