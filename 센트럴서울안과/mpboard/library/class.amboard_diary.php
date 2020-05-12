<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_diary.php
//  @ Date : 2006-06-30
//	@ Documemt : amboard 의 일정관리
//
//
?>


<?
class amboard_diary extends amboard {

	function amboard_diary(){
		global $nowmon;
		global $nowyear;

		  // 년도리스트의 셀렉트화하기 위하여 이전 1년, 이후 10년 까지만 저장
			$diary[default_year] =2005; // 제작년이 기본 설정 년도이다 과거는 2005년까지만 제공한다
			$diary[full_year] = date('Y'); // 미래는 현재로부터 10년만 제공한다.
			$diary[full_year] = $diary[full_year] + 10; // 미래는 현재로부터 10년만 제공한다.
		// 각 월의 날짜 총 수  배열저장
		  $diary[totaldays] = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

		// 현재의 시간을 지정한다.
			if(!$nowyear){

				$diary[nowyear] = date("Y");	// 년도 저장
				$diary[nowmon] = date("n");		// 월 저장
				$diary[nowday] = date("j");		// 일저장
			}else{

				$diary[nowyear] = $nowyear;		// 년도 저장
				$diary[nowmon] = $nowmon;		// 월 저장
				$diary[nowday] =  date("j");		// 일저장
			}

		// 윤년 설정   # 윤년에는 2월이 29일이니까 지정해놓는다.
			if(date("L", mktime(0,0,0,$diary[nowmon],1,$diary[nowyear]))) $diary[totaldays][2] = 29;


		// 달 변수 설 정
			$diary[premon] = $diary[nowmon] - 1;			// 지난달은 현재달의 -1 값
			$diary[preyear] = $diary[nowyear];			// 작년에 일단 현재년을 저장해둔다. 나중에 더하기 빼기를 한다.
			$diary[nextmon] = $diary[nowmon] + 1;			// 다음달은 현재달의 +1
			$diary[nextyear] = $diary[nowyear];			// 내년도 일단 현재년을 저장해둔다. 나중에 더하기 빼기를 한다.

			if($diary[nowmon] == 1){				// 현재 달이 1월 이라면
				$diary[premon] = 12;				// 이전 달은 12월이 되는거다
				$diary[preyear] = $diary[nowyear] - 1;	// 작년은 현재년의 -1 이 된다
			}

			if ($diary[nowmon] == 12){				// 현재달이 12월 이라면
				$diary[nextmon]=1;					// 다음달은 1월이 된다.
				$diary[nextyear]++;				// 내년변수도 +1이 된다.
			}

			$diary[firstday] = date("w", mktime(0,0,0,$diary[nowmon],1,$diary[nowyear])); // 현재달 1일의 요일저장


			$diary[weeks] = $diary[totaldays];
			return $diary;

	}

	function week_array($totalday,$x,$h,$dayCount,$nowyear,$nowmon,$font_size){
		global $AUTH;
		global $group;
		global $code;
		global $cate1;

		// 공휴일 배열 설정 시작
		/*
		$holiday_array["10-3"] = "개천절";
		$holiday_array["10-5"] = "";
		$holiday_array["10-6"] = "추석";
		$holiday_array["10-7"] = "";
		*/
		// 공휴일 배열 설정 끝

		if($h >= $x){


			// 오늘인 경우
			if($dayCount == date("j") && $nowyear == date("Y") && $nowmon == date("n")){

				if($AUTH[write]) {
					if($dayCount < 10) $tmp_day = "0" . $dayCount;
					else $tmp_day = $dayCount;
					if($nowmon < 10) $tmp_mon = "0" . $nowmon;
					else $tmp_mon = $nowmon;
					$nowdate = $nowyear . "-" . $tmp_mon . "-" . $tmp_day;
					$query = "SELECT * from amboard_".$group." where code = '".$code."' and cate1 = '" . $cate1 . "' and etc1 = '".$nowdate."'";
					//echo $query;
					$res = mysql_query($query);
					$tmp_row = mysql_fetch_array($res);
					if($tmp_row[no])
						echo "<textarea style=\"border:0px;text-align:left;padding-left:15px;background:;overflow:hidden;height:70px;><a href=".$PHP_SELF."?group=".$group."&code=".$code."&abmode=modify&no=$tmp_row[no]&bsort=&bfsort=&cate1=$cate1>";
					else
						echo "<a href=".$PHP_SELF."?group=".$group."&code=".$code."&abmode=write&bsort=&bfsort=&cate1=$cate1>";
				}

				$week=date(w, mktime(0,0,0,$nowmon,$dayCount,$nowyear));


				if($week == "0") echo "<font color='orange'>";
				if($week == "6") echo "<font color='3838BE'>";
				echo "<strong>".$dayCount."</strong></font>";

				if($AUTH[write]){
					echo "</a>";
				}
				$bobj = new amboard_diary();
				$bobj->get_import_date($nowyear,$nowmon,$dayCount,1,1,$font_size); // 주요글
				$bobj->get_date($nowyear,$nowmon,$dayCount,1,$font_size); // 일반글

			}else{

				if($totalday >= $dayCount){
					if($dayCount < 10) $tmp_day = "0" . $dayCount;
					else $tmp_day = $dayCount;
					if($nowmon < 10) $tmp_mon = "0" . $nowmon;
					else $tmp_mon = $nowmon;
					$nowdate = $nowyear . "-" . $tmp_mon . "-" . $tmp_day;
					//$query = "SELECT * from amboard_".$group." where code = '".$code."' and etc1 = '".$nowdate."'";
					$query = "SELECT * from amboard_".$group." where code = '".$code."' and cate1 = '" . $cate1 . "' and etc1 = '".$nowdate."'";
					$res = mysql_query($query);
					$tmp_row = mysql_fetch_array($res);
					if($tmp_row[no])
						echo "<a href=".$PHP_SELF."?group=".$group."&code=".$code."&abmode=modify&no=$tmp_row[no]&bsort=&bfsort=&nowyear=".$nowyear."&nowmon=".$nowmon."&nowday=".$dayCount."&cate1=$cate1>";
					else
						echo "<a href=".$PHP_SELF."?group=".$group."&code=".$code."&abmode=write&bsort=&bfsort=&nowyear=".$nowyear."&nowmon=".$nowmon."&nowday=".$dayCount."&cate1=$cate1>";

					$week=date(w, mktime(0,0,0,$nowmon,$dayCount,$nowyear));
					//echo "날짜 : ".$nowyear."-".$nowmon."-".$dayCount;


					$holiday_state = 0;
					if(is_array($holiday_array)){
						while(list($key,$value)= each($holiday_array)){
							//echo $value.",".$nowmon."-".$dayCount;
							if($key == $nowmon."-".$dayCount) {
								$holiday_state = 1;
								break;
							}
						}
					}

					if($holiday_state) {
						echo "<font color='red'>";
						echo $dayCount;
						echo " $value</a></font>";
					} else {
						if($week == "0") echo "<font color='orange'>";
						if($week == "6") echo "<font color='3838BE'>";
						echo $dayCount;
						echo "</a></font>";
					}

					$bobj = new amboard_diary();
					$bobj->get_import_date($nowyear,$nowmon,$dayCount,2,1,$font_size);  // 주요글
					$bobj->get_date($nowyear,$nowmon,$dayCount,2,$font_size);  // 일반글

				}

			}
		}
	}



	function get_import_date($nowyear,$nowmon,$dayCount,$TODAY,$IMPORT,$font_size){			// 주요일정 캐치 함수

		// $TODAY  = 1 이면 오늘 $TODAY = 2 이면 오늘이 아닌 해당일
		// $IMPORT = 1 이면 주요일정  $IMPORT = 0 이면 일반일정
		global $group;
		global $code;
		global $AUTH;
		global $connect;

		// 해당날짜에 저장된 일정을 뽑아옵니다.
		if(strlen($dayCount) == 1)$now_day = "0".$dayCount;
			else $now_day = $dayCount;
		if(strlen($nowmon) == 1)$now_mon = "0".$nowmon;
			else $now_mon = $nowmon;


		if($TODAY == 1)$now_time = date('Y-m');
		if($TODAY == 2)$now_time = $nowyear."-".$now_mon;

		//$SQL = "SELECT * from amboard_".$group." where code = '".$code."' and etc1 like '%".$now_time."%' or etc2 like '%".$now_time."%'";
		$SQL = "SELECT * from amboard_".$group." where code = '".$code."' and (etc1 like '%".$now_time."%' or etc2 like '%".$now_time."%')";
		$result = mysql_query($SQL,$connect);
			$n_time = $nowyear.$now_mon.$now_day;
		while($row = mysql_fetch_array($result)){
			$s_time = substr($row[etc1],0,10);
			$s_time = str_replace("-","",$s_time);
			$e_time = substr($row[etc2],0,10);
			$e_time = str_replace("-","",$e_time);


			if($s_time <= $n_time && $e_time >= $n_time || $s_time == $n_time){

				if($row[wmode] == $IMPORT){
					if(strlen($row[title]) > 20){
						$row[title] = substr($row[title],0,20);
						$row[title] .= "...";
					}
					echo "<br>";
					//echo "<table border='0' width='100%' cellpadding='0' cellspacing='0'><tr><td align='left' onmouseover=\"layerinfo('".$row[contents]."','divlayerinfo')\"  OnMouseOut=\"layerinfo('','divlayerinfo')\">";


					if($AUTH[view]){

						echo "<a  href='".$PHP_SELF."?group=".$group."&code=".$code."&abmode=view&bsort=&bfsort=	&no=".$row[no]."&nowyear=".$nowyear."&nowmon=".$nowmon."&nowday=".$dayCount."'>";

					}

					if($IMPORT == 1) echo "<font color=red>";
					echo "<span style=\"font-size:".$font_size."\">".$row[title]."</span>";

					if($IMPORT == 1) echo "</font>";
					if($AUTH[view]){
						echo "</a>";
					}

					//echo "</td></tr></table>";
				}
			}

		}
	}


	function get_date($nowyear,$nowmon,$dayCount,$TODAY,$font_size){			// 일반일정 캐치 함수

		// $TODAY  = 1 이면 오늘 $TODAY = 2 이면 오늘이 아닌 해당일

		global $group;
		global $code;
		global $AUTH;
		global $connect;
		global $cate1;

		// 해당날짜에 저장된 일정을 뽑아옵니다.
		if(strlen($dayCount) == 1)$now_day = "0".$dayCount;
			else $now_day = $dayCount;
		if(strlen($nowmon) == 1)$now_mon = "0".$nowmon;
			else $now_mon = $nowmon;

		$n_time = $nowyear.$now_mon.$now_day;
		if($TODAY == 1)$now_time = date('Y-m');
		if($TODAY == 2)$now_time = $nowyear."-".$now_mon;

		//$SQL = "SELECT * from amboard_".$group." where code = '".$code."' and etc1 like '%".$now_time."%' or etc2 like '%".$now_time."%'";
		$SQL = "SELECT * from amboard_".$group." where code = '".$code."' and cate1 = '" . $cate1 . "' and (etc1 like '%$now_time%' or etc2 like '%$now_time%')";
		//echo $SQL;

		$result = mysql_query($SQL,$connect);
		while($row = mysql_fetch_array($result)) {
			$s_time = substr($row[etc1],0,10);
			$s_time = str_replace("-","",$s_time);
			$e_time = substr($row[etc2],0,10);
			$e_time = str_replace("-","",$e_time);

			if($s_time <= $n_time && $e_time >= $n_time || $s_time == $n_time){

				if($row[wmode] != 1){
					/*
					if(strlen($row[title]) > 20){
						$row[title] = substr($row[title],0,20);
						$row[title] .= "...";
					}
					*/
					echo "<br>";
					//echo "<table width='100%' cellpadding='0' cellspacing='0'><tr><td align='left' onmouseover=\"layerinfo('".$row[contents]."','divlayerinfo')\" OnMouseOut=\"layerinfo('','divlayerinfo')\">";


					if($AUTH[view]){
						echo "<a  href='".$PHP_SELF."?group=".$group."&code=".$code."&abmode=view&bsort=&bfsort=	&no=".$row[no]."&nowyear=".$nowyear."&nowmon=".$nowmon."&nowday=".$dayCount."'>";

					}

					if($code=="intro03") {

						if($row[etc14] == "휴진") $row[etc14] = "<font color='E45F5F'>$row[etc14]</font>";
						if($row[etc15] == "휴진") $row[etc15] = "<font color='E45F5F'>$row[etc15]</font>";


						echo "
						<table width='100%' cellspacing='0' cellpadding='0' border='0'>
							<tr><td height='5'></td></tr>
							<tr><td style='padding-left:5px;font-family:Verdana;font-size:11px'>오전 : $row[etc14]</td></tr>
							<tr><td style='padding-left:5px;font-family:Verdana;font-size:11px'>오후 : $row[etc15]</td></tr>
						</table>
						";
					} else {
						echo "<br/><textarea style=\"border:0px;text-align:left;padding-left:15px;background:;overflow:hidden;height:70px;font-size:".$font_size."\">".$row[title]."</textarea>";
					}


					//echo "<span style=\"font-size:".$font_size."\">".$row[etc14]."</span>";
					if($AUTH[view]){
						echo "</a>";
					}

					//echo "</td></tr></table>";
				}
			}
		}
	}


	// 선택달의 주요일정을 캐치하는 함수.
	function get_import_list($nowyear,$nowmon){

		global $group;
		global $code;
		global $connect;

		if(strlen($nowmon) == 1)$now_mon = "0".$nowmon;
			else $now_mon = $nowmon;

		$date = $nowyear."-".$now_mon;

		$SQL = "select * from amboard_".$group." where code = '".$code."' and etc1 like '%".$date."%' or etc2 like '%".$date."%' order by no asc";

		$result = mysql_query($SQL,$connect);
		$i = 0;
		while($row = mysql_fetch_array($result)){
			$stime = substr($row[etc1],5,5);
			$etime = substr($row[etc2],5,5);

			if($row[wmode] == 1){
				// 이부분을 수정하여 출력하십시요.
				if($row[etc2] == $row[etc1]){
					$IMPORT_TITLE[$i] =  "[".$stime."]"." ".$row[title]."&nbsp;&nbsp;";
				}else{
					$IMPORT_TITLE[$i] =  "[".$stime."]-[".$etime."]"." ".$row[title]."&nbsp;&nbsp;";
				}
				$i++;
			}
		}
		return $IMPORT_TITLE;
	}




	function Auth_check(){

		global $group;
		global $code;
		global $connect;

		$SQL = "SELECT * FROM amboard_diary_config where code = '".$code."'";
		$result = mysql_query($SQL,$connect);
		$config = mysql_fetch_array($result);

		$gcode = $config[gcode];
		$diary_auth = $config[group_type];      // 전체용인지, 그룹용인지를 저장
		$birth_state = $config[birth];			// 생일 테이블 출력인지 아닌지

		if($config[group_type] == "1"){			// 만약, 전체용이 아닌 그룹용이라면
			$group_list=explode(",",$config[group_list]);
			$group_count = count($group_list);

			for($i = 0; $i < $group_count; $i++){
				if($group_list[$i] == $_SESSION['userid']){
					$auth = $group_list[$i];
				}
			}

			if(!$auth){
				echo "<script>alert('사용권한이 없습니다');</script>";
				echo "<script>history.back();</script>";
			}
		}

		return $config;
	}








	// 주요글 테이블 색을 바꾸기 위한 쿼리 함수
	function get_diary_bgcolor($nowyear,$nowmon,$dayCount,$bgcolor,$today_bgcolor){

		global $group;
		global $code;
		global $connect;


		if(strlen($nowmon) == 1)$now_mon = "0".$nowmon;
			else $now_mon = $nowmon;

		if(strlen($dayCount) == 1)$now_day = "0".$dayCount;
			else $now_day = $dayCount;

		$date = $nowyear."-".$now_mon;

		$maxday = date("t", mktime(0, 0, 0, $nowmon, 1, $nowyear));


		if($now_day == date("j") && $nowyear == date("Y") && $nowmon == date("n")){
			echo "bgcolor = '#edf3ff'"; // 오늘셀의 배경은 무조건 이렇게
		}else{
			if($now_day && $now_day <= $maxday) echo "bgcolor = '#fcfcfc'";
			$SQL = "select * from amboard_".$group." where code = '".$code."' and etc1 like '%".$date."%' or etc2 like '%".$date."%'";

			$result = mysql_query($SQL,$connect);

			while($row = mysql_fetch_array($result)){
				$s_time = substr($row[etc1],0,10);
				$s_time = str_replace("-","",$s_time);
				$e_time = substr($row[etc2],0,10);
				$e_time = str_replace("-","",$e_time);
				$check_time = $nowyear.$now_mon.$now_day;



				if($s_time <= $check_time && $e_time >= $check_time){

					if($row[wmode] == 1){

						$import_color = true;
					}
				}
			}

			if($import_color == true) echo "bgcolor = '$bgcolor'";
		}
	}








	function get_birth_list($group_type,$nowmon){

		global $group;
		global $code;
		global $connect;

		if(strlen($nowmon) == 1)$now_mon = "0".$nowmon;
			else $now_mon = $nowmon;

		// 만약 전체라면 전체 회원에서 그룹이라면 그룹내 리스트에서
		if($diary_auth == 0){

			$SQL = "SELECT * FROM ammember where gcode = '$group'";
			$result = mysql_query($SQL,$connect);

			$i = 0;
			while($row = mysql_fetch_array($result)){
				$birth_month = substr($row[birth],2,2);

				if($birth_month == $now_mon){
					$BIRTH_ID[$i] = $row[name]."(".$row[id].")";
				}

				$i++;
			}
		}elseif($diary_auth == 1){	 // 그룹 소속원 중에 이번달 회원이 있는지 검색

			for($i = 0; $i < $group_count; $i++){
				$SQL = "SELECT * FROM ammember where gcode = '$group'and id = '$group_list[$i]'";
				$result = mysql_query($SQL,$connect);
				$row = mysql_fetch_array($result);
				$birth_month = substr($row[birth],2,2);

				if($birth_month == $now_mon){
					$BIRTH_ID[$i] = $row[name]."(".$row[id].")";
				}
			}
		}

		return $BIRTH_ID;
	}



}	// 클래스 끝


		 ?>