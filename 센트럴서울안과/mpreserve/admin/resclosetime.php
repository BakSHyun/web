<script language="JavaScript">
function view_time(ryear,rmonth,rday)
{
	var myform = document.rform;
	myform.ryear.value = ryear;
	myform.rmonth.value = rmonth;
	myform.rday.value = rday;
	myform.submit();
}

function setclose(restime,restype)
{
	if(confirm("휴진처리를 변경 하시겠습니까?")){

	}else{
		return false;
	}
	var resform = document.rform;
	resform.rtime.value = restime;
	resform.rtype.value = restype;
	//resform.rstatus.value = 0;
	resform.m2.value = "resclosetimedb";
	resform.submit();
}

function setclose1(restime,restype)
{
	if(confirm("취소처리를 변경 하시겠습니까?")){

	}else{
		return false;
	}
	var resform = document.rform;
	resform.rtime.value = restime;
	resform.rtype.value = restype;
	//resform.rstatus.value = 1;
	resform.m2.value = "resclosetimedb";
	resform.submit();
}
</script>

<div id='admin_sub_wrap'>
	<h2>휴진 설정</h2>

	<p class='desc'>
		<?
		if(!$code){
			$result = mysql_query("select code, name from mpreserve_config order by no asc",$connect);
			if(is_resource($result)){
				$branchMsg .= "<b class='red'>지점을 선택하세요 -> </b>";
				while($rows = mysql_fetch_array($result)){
					$branchMsg .= "<input type='radio' name='code' value='$rows[code]' onclick=\"location.href='$PHP_SELF?m1=$m1&m2=$m2&code=$rows[code]'\"> $rows[name]&nbsp;&nbsp;";
				}
			}else{
				$branchMsg = "<b class='red'>지점을 먼저 생성해 주세요</b>";
			}
		}else{
			$branch = mysql_fetch_array(mysql_query("select name from mpreserve_config where code='$code'",$connect));
			$branchMsg .= "<b>".$branch[0]."</b>";
		}
		echo $branchMsg;
		?>
	</p>

	<? if($code) { ?>
	<div id='cal_wrap'>
		<?
		if(!$year) $year = date('Y');
		if(!$month) $month = date('n');

		$ndate = $year.'-'.$month.'-1';
		$ndate2 = strtotime($ndate);
		$fweekday = date("w", $ndate2);
		$totdays = date("t", $ndate2); // 그달의 날짜수

		$fblank = $fweekday; // 달력 첫 공백

		if($month == 1){
			$pre_year = $year - 1;
			$pre_month = 12;
		}
		else{
			$pre_year = $year;
			$pre_month = $month - 1;
		}

		if($month == 12){
			$next_year = $year + 1;
			$next_month = 1;
		}
		else{
			$next_year = $year;
			$next_month = $month + 1;
		}

		$pre_month = "<a href='".$PHP_SELF."?m1=$m1&amp;m2=$m2&amp;code=$code&amp;year=".$pre_year."&amp;month=".$pre_month."'>&lt; ".$pre_year.". ".$pre_month."</a>";
		$next_month = "<a href='".$PHP_SELF."?m1=$m1&amp;m2=$m2&amp;code=$code&amp;year=".$next_year."&amp;month=".$next_month."'>".$next_year.". ".$next_month." &gt;</a>";

		?>
		<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data" name="rform">
		<input type="hidden" name="m1" value="<?=$m1?>">
		<input type="hidden" name="m2" value="<?=$m2?>">
		<input type="hidden" name="code" value="<?=$code?>">
		<input type="hidden" name="ryear" value="<?=$ryear?>">
		<input type="hidden" name="rmonth" value="<?=$rmonth?>">
		<input type="hidden" name="rday" value="<?=$rday?>">
		<input type="hidden" name="year" value="<?=$year?>">
		<input type="hidden" name="month" value="<?=$month?>">
		<input type="hidden" name="rtime" value="">
		<input type="hidden" name="rtype" value="">
		<input type="hidden" name="rstatus" value="">
		<input type="hidden" name="viewtime" value="1">

		<div id='cal_left'>

			<div class='cal_year_month'>
				<div class="last_month"><?=$pre_month?></div>
				<div class="next_month"><?=$next_month?></div>
				<p><?=$year?>. <?=$month?></p>
			</div>

			<table class='cal_table_wrap' summary='게시판 휴진 달력'>
				<caption>휴진 달력</caption>
				<thead><tr>
					<th><b class='red'>일</b></th>
					<th>월</th>
					<th>화</th>
					<th>수</th>
					<th>목</th>
					<th>금</th>
					<th><b class='blue'>토</b></th>
				</tr></thead>
				<tbody>
				<?
				$day2 = 1;
				for($i=1; $i<=$totdays+$fblank; $i++){
					if($i%7 == 1) echo "<tr>";
					if($i <= $fblank)	{ echo "<td>&nbsp;</td>";
					}else{
						if($month < 10) $month2 = "0".$month;
						else $month2 = $month;
						if($day2 < 10){ $day3 = "0".$day2;
						}else{ $day3 = $day2; }
						$ttime = $year.'-'.$month2.'-'.$day3;
						$week2 = date("w", strtotime($ttime));
						$ttime2 = date('Y-m-d');

						if(strtotime($ttime) < strtotime($ttime2)){
							echo "
							<td class='past'>
								<div><p>$day2</p><ul>";
							$res = mysql_query("select closetime, status from mpreserve_close where code='$code' and closedate='$ttime' order by closetime asc");
							while($rows = mysql_fetch_array($res)){
								$status = $rows[status];
								if ($status == "0" || $status == ""){
									$status="<b class='blue'>진료</b>";
								}else if ($status == "1"){
									$status="<b class='red'>휴진";
								}else if ($status == "2"){
									$status="<b class='red'>마감";
								}
								echo "<li>".$rows[closetime]." ".$status."</li>";
							}
							echo "
								</ul></div>
							</td>
							";
						}else{
							if($day3 == $rday){
								$todays = " class='tday' ";
							}else{
								$todays = " class='' ";
							}
							echo "
							<td $todays>
								<div><p><a onclick=\"view_time('$year','$month','$day2')\">$day2</a></p><ul>";
							$res = mysql_query("select closetime, status from mpreserve_close where code='$code' and closedate='$ttime' order by closetime asc");
							while($rows = mysql_fetch_array($res)){
								$status = $rows[status];
								if ($status == "0" || $status == ""){
									$status="<b class='blue'>진료</b>";
								}else if ($status == "1"){
									$status="<b class='red'>휴진</b>";
								}else if ($status == "2"){
									$status="<b class='red'>마감</b>";
								}
								echo "<li>".$rows[closetime]." ".$status."</li>";
							}
							echo "
								</ul></div>
							</td>
							";
						}
						$day2++;
					}
				}
				?>
				</tbody>

			</table>

		</div>

		<div id='cal_right'>
			<? if(!$viewtime) { ?>
			<div class='cal_year_month'>
				<p>※ 휴진 설정하실 날짜를<br>선택해 주세요.</p>
			</div>
			<? } else { ?>
			<div class='cal_year_month'>
				<p><?=$ryear?>. <?=$rmonth?>. <?=$rday?></p>
			</div>
			<table class='cal_table_wrap2'>
				<thead><tr>
					<th>시간</th>
					<th>구분</th>
					<th>설정</th>
				</tr></thead>
				<tbody>
					<?
					if($rmonth < 10) $rmonth2 = "0".$rmonth;
					else $rmonth2 = $rmonth;
					if($rday < 10) $rday2 = "0".$rday;
					else $rday2 = $rday;
					$rdate = $ryear."-".$rmonth2."-".$rday2;
					$week = date("w", strtotime($rdate));
					$query = "select time$week from mpreserve_config where code = '$code'";
					if($result = mysql_query($query)){
						$row = mysql_fetch_row($result);
						if($row[0]) $arr_time = explode("|", $row[0]);
						$i = 0;
						if(is_array($arr_time)){
							foreach($arr_time as $times){
								$res_time = mysql_query("select count(*) from mpreserve_close where code='$code' and closedate='$rdate' and closetime='$times'");
								$cnt_time = mysql_result($res_time,0,0);

								if($cnt_time > 0){
									$result2 = mysql_query("select status from mpreserve_close where code='$code' and closedate='$rdate' and closetime='$times'");
									$row = mysql_fetch_array($result2);
									$status	= $row[0];

									if ($status == "0" || $status ==''){
										$status="진료";
									}else if ($status == "1"){
										$status="휴진";
									}else if ($status == "2"){
										$status="마감";
									}

									$resstate = "<font color='#D92323'><a href=\"javascript:setclose('$times','0')\">$status</a></font>";
									$setresstate = "<a href=\"javascript:setclose('$times','0')\">취소</a>";

								}else{
									$resstate = "진료";
									$setresstate = "<font color='#D92323'><a href=\"javascript:setclose('$times','1')\">휴진</a></font> / <br><font color='#D92323'><a href=\"javascript:setclose('$times','2')\">마감</a></font>";
								}

								echo "
								<tr>
									<td height='26' align='center' bgcolor='#FFFFFF'>$times</td>
									<td align='center' bgcolor='#FFFFFF'>$resstate</td>
									<td align='center' bgcolor='#FFFFFF' style=\"cursor:hand\" onmouseover=\"this.style.background='#FAF1FE'\" onmouseout=\"this.style.background='#FFFFFF'\" >$setresstate</td>
								</tr>
								";
								$i++;
							}
							echo "
							<tr>
								<td height='26' align='center' bgcolor='#FFFFFF' colspan='3'>
									<span style='cursor:hand;color:#D92323' onclick=\"setclose('$times','allclose')\">전체 휴진</span>
									|
									<span style='cursor:hand' onclick=\"setclose1('$times','allopen')\">전체 취소</span>
								</td>
							</tr>
							";
						}else{
							echo "
							<tr>
								<td height='26' align='center' bgcolor='#FFFFFF' colspan='3'>설정 가능한 시간이 없습니다.</td>
							</tr>
							";
						}
					}
					?>
				</tbody>
			</table>
			<? } ?>
		</div>

		</form>
	</div>
	<? } ?>

</div>