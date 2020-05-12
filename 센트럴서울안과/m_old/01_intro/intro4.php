<? include "../inc/head.php"; ?>

	<script src = "../js/jquery.iosslider.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.gall').iosSlider({
				desktopClickDrag: true,
				snapToChildren: true,
				infiniteSlider: true,
				autoSlide: true,
				autoSlideTimer:3000,
				startAtSlide: '1',
				navNextSelector: $('.gallery_wrap .next'),
				navPrevSelector: $('.gallery_wrap .prev')
			});
		});
	</script>
	<div id='home_wrap'>
		<div id='back_btn'><a onclick='history.go(-1);'><img src='../img/common/back_btn.png' alt='뒤로가기'></a></div>
		<div id='home_btn'><a href='/m/'><img src='../img/common/home_btn.png' alt='메인페이지로 가기'></a></div>
		<h1>둘러보기</h1>
	</div>
	<? include "../inc/intro_link.php"; ?>
	<div id='sub_content'>
			<div class='gallery_wrap'>
				<div class="next"><img src="../img/gall/btn_n.png" border="0"></div>
				<div class="prev"><img src="../img/gall/btn_p.png" border="0"></div>
				<div class='gall'>
					<ul class ='slider'>
						<li class ='item'><img src='../img/gall/gall1.jpg' width='546' alt='안내데스크1'></li>
						<li class ='item'><img src='../img/gall/gall2.jpg' width='546' alt='대기실'></li>
						<li class ='item'><img src='../img/gall/gall3.jpg' width='546' alt='안내데스크2'></li>
						<li class ='item'><img src='../img/gall/gall4.jpg' width='546' alt='진료실1'></li>
						<li class ='item'><img src='../img/gall/gall5.jpg' width='546' alt='진료실2'></li>
						<li class ='item'><img src='../img/gall/gall6.jpg' width='546' alt='VIP대기실'></li>
						<li class ='item'><img src='../img/gall/gall7.jpg' width='546' alt='소아진료실'></li>
						<li class ='item'><img src='../img/gall/gall8.jpg' width='546' alt='소아대기실'></li>
						<li class ='item'><img src='../img/gall/gall9.jpg' width='546' alt='로비'></li>
						<li class ='item'><img src='../img/gall/gall10.jpg' width='546' alt='진료상담실1'></li>
						<li class ='item'><img src='../img/gall/gall11.jpg' width='546' alt='진료상담실2'></li>
						<li class ='item'><img src='../img/gall/gall12.jpg' width='546' alt='고객상담실'></li>
						<li class ='item'><img src='../img/gall/gall13.jpg' width='546' alt='특진실'></li>
						<li class ='item'><img src='../img/gall/gall14.jpg' width='546' alt='수술실'></li>
					</ul>
				</div>
			</div>
	</div>
	<? include "../inc/foot.php"; ?>
