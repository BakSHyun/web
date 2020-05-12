<? include_once "../inc/head.php" ?>

<!-- ───────────────────────────────────────────────────────────────── -->
<div style="width: 1200px;    margin: 10px auto;">

	<div class='sub_title' style="margin-top:50px"><strong>검색</strong>모든 환자를 가족을 대하는 마음으로 진찰하여 항상 편안한 병원이 되도록 노력하겠습니다.</div>

	<div class='board_wrap'>

		<div id='search_title'>[ <span style='color:#1168ec;'><?=$search_word?></span> ]에 대한 컨텐츠 검색결과</div>

		<dl class='search_boxs'>
		<dt>온라인상담</dt>
		<div>
		<?
		$code = "counsel02";
		$link = "../07_counsel/counsel1.php";
		$query = "select * from amboard_basic where code = '".$code."' and title like '%".$search_word."%' limit 5";
		$res = mysql_query($query);
		$i = 0;
		while($row = mysql_fetch_array($res)){
			$dates = explode(" ",$row[wdate]);
			$dates = str_replace("-",".",$dates[0]);
			echo "<dd><a href='".$link."?group=basic&code=".$code."&category=".$row[category]."&abmode=view&no=".$row[no]."'>$row[title]</a><font class='seper'>|</font>$row[name]<font class='seper'>|</font><font class='dates'>$dates</font></dd>";
			$i++;
		}
		if($i == 0){
			echo "<dd>검색된 결과가 존재하지 않습니다.</dd>";
		}
		?>
		</div>
		</dl>


		<dl class='search_boxs'>
		<dt>언론속 선트럴서울 안과</dt>
		<div>
		<?
		$code = "community02";
		$link = "../07_counsel/community2.php";
		$query = "select * from amboard_basic where code = '".$code."' and title like '%".$search_word."%' limit 4";
		$res = mysql_query($query);
		$i = 0;
		while($row = mysql_fetch_array($res)){
			$dates = explode(" ",$row[wdate]);
			$dates = str_replace("-",".",$dates[0]);
			echo "<dd><a href='".$link."?group=basic&code=".$code."&category=".$row[category]."&abmode=view&no=".$row[no]."'>$row[title]</a><font class='seper'>|</font>$row[name]<font class='seper'>|</font><font class='dates'>$dates</font></dd>";
			$i++;
		}
		if($i == 0){
			echo "<dd>검색된 결과가 존재하지 않습니다.</dd>";
		}
		?>
		</div>
		</dl>
		<div class='clr'></div>

		<dl class='search_boxs'>
		<dt>채용 안내</dt>
		<div>
		<?
		$code = "community04";
		$link = "../07_counsel/community4.php";
		$query = "select * from amboard_basic where code = '".$code."' and title like '%".$search_word."%' limit 5";
		//echo $query;
		$res = mysql_query($query);
		$i = 0;
		while($row = mysql_fetch_array($res)){
			$dates = explode(" ",$row[wdate]);
			$dates = str_replace("-",".",$dates[0]);
			echo "<dd><a href='".$link."?group=basic&code=".$code."&category=".$row[category]."&abmode=view&no=".$row[no]."'>$row[title]</a><font class='seper'>|</font>$row[name]<font class='seper'>|</font><font class='dates'>$dates</font></dd>";
			$i++;
		}
		if($i == 0){
			echo "<dd>검색된 결과가 존재하지 않습니다.</dd>";
		}
		?>
		</div>
		</dl>


	</div>
</div>

<!-- ───────────────────────────────────────────────────────────────── -->

<? include_once "../inc/foot.php" ?>