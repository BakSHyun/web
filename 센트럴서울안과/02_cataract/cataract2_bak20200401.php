<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 노안·백내장 클리닉 > <strong>노안 백내장 수술 클리닉</strong></div>
	<? include "../inc/left.php" ?>
	<div class="sub_cnt">
		<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br>노안 백내장 수술 클리닉</h1>
			
			<div><img src="../img/sub/cataract2_n_0101.jpg" alt=""></div>
			<div><img src="../img/sub/cataract2_n_0102_200211.jpg" alt=""></div>
			<div><img src="../img/sub/cataract2_n_0103.jpg" alt=""></div>
			<div><img src="../img/sub/cataract2_n_0104.jpg" alt=""></div>
			<div><img src="../img/sub/cataract2_n_0105.jpg" alt=""></div>
			<div><img src="../img/sub/cataract2_n_0106.jpg" alt=""></div>
			

			<?
			include_once "../inc/sub_prize.php";
			?>

			<script>
				$(function() {
					$('ul.tab li').click(function() {
						var activeTab = $(this).attr('data-tab');
						$('ul.tab li').removeClass('current');
						$('.tabcontent').removeClass('current');
						$(this).addClass('current');
						$('#' + activeTab).addClass('current');
					})
				});
			</script>

			<h1 class="sub_tit"><span>MEET THE EXPERTS</span> </br>노안, 백내장 고객 후기</h1>
			<?
			if(!$group) $group = "basic";
			if(!$code) $code = "community1";
			$cate1="백내장";
			include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
			?>
	</div>

</div>

<? include "../inc/foot.php" ?>