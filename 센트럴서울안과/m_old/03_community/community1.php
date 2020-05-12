<? include "../inc/head.php"; ?>

    <div id='home_wrap'>
		<div id='back_btn'><a onclick='history.go(-1);'><img src='../img/common/back_btn.png' alt='뒤로가기'></a></div>
		<div id='home_btn'><a href='/m/'><img src='../img/common/home_btn.png' alt='메인페이지로 가기'></a></div>
		<h1>진료 상담</h1>
	</div>

	<? include "../inc/community_link.php"; ?>

    <div id='sub_content'>
	  <div class='content'>
	  <img src="../img/sub/board_1.jpg" border="0"><br>
	  <br>
		<?
		// 게시판이 보여질부분에 넣어 주세요
		if(!$group) $group = "basic";
		if(!$code) $code = "counsel02";
		//$skinmode = "mobile";
		//$abmode="write";
		include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
		?>
	  </div>
  </div>
<? include "../inc/foot.php"; ?>