<? include "../inc/head.php"; ?>

    <div id='home_wrap'>
		<div id='back_btn'><a onclick='history.go(-1);'><img src='../img/common/back_btn.png' alt='뒤로가기'></a></div>
		<div id='home_btn'><a href='/m/'><img src='../img/common/home_btn.png' alt='메인페이지로 가기'></a></div>
		<h1>진료 예약</h1>
	</div>

	<? include "../inc/community_link.php"; ?>

    <div id='sub_content'>
	  <div class='content'><img src="../img/sub/board_2.jpg" border="0"><br>
	    <img src="../img/board/img_4.jpg" border="0"><br>
		<?
		if(!$code) $code = "counsel01";
		$skinmode = "mobile";
		include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpreserve/reserve.php";
		?>
      <img src="../img/sub/community2_1.jpg" border="0"> </br></br>
      <img src="../img/sub/community2_2.jpg" border="0"> </br></br>
        	  
	</div>
<? include "../inc/foot.php"; ?>