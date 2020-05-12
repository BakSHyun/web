<? 
include "db_info.php";


$filename = "timebook_".date("Ymd").".xls";

//header("Content-type: application/vnd.ms-excel");
header( "Content-type: application/vnd.ms-excel; charset=euc-kr" ); 
header("Content-Disposition: attachment; filename=$filename");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");
//header("Cache-control: private"); 
//header("Content-Transfer-Encoding: text/plain"); 
//header("Pragma: no-cache"); 





		//날짜 검색시 시작일이나 종료일이 공백으로 넘어왔을경우
		if ($wyear =="") {
			$wyear	="2000";
			$wmonth	="01";
			$wday	="01";
		}

		
		if ($wyear1 =="") {
			$wyear1	="2999";
			$wmonth1	="12";
			$wday1	="31";
		}
		
		if ($wmonth < 10){
			$wmonth = "0".$wmonth;
		}
		
		if ($wmonth1 < 10){
			$wmonth1 = "0".$wmonth1;
		}
		
		if ($wday < 10){
			$wday = "0".$wday;
		}

		if ($wday1 < 10){
			$wday1 = "0".$wday1;
		}

		if ($field =="daysearch") {
			 $search = "기간검색";
		}

		if($field && $search) {
			if($field=="all") {
				$where_q = " and ( name like '%$search%' or title like '%$search%' or contents like '%$search%') ";
			} elseif ($field=="daysearch") {	 // 출근부의 기간으로 검색하는것을처리하기 위하여
				$where_q = " and date_format( wdate, '%Y-%m-%d' ) BETWEEN '$wyear-$wmonth-$wday' AND '$wyear1-$wmonth1-$wday1' ";
			} else {
				$where_q = " and $field like '%$search%' ";
			}
		}

$sql = "SELECT wdate,name,etc20,etc14,etc15,etc16,etc17,etc18 FROM amboard_intranet where code ='intranet01' $where_q"; 
//echo $sql;

$stmt = mysql_query("$sql",$conn) or die(mysql_error()); 

echo ("일자\t   직원명\t    지점\t    출근시간\t IP\t 퇴근시간 \t IP\t  근무시간\t   지각\t   조퇴 \r\n"); 
while ($row = mysql_fetch_row($stmt)){ 

switch($row[2]){
		case "1" : 
			$jijum ="그룹";
			break;
		case "2" : 
			$jijum ="연구소";
			break;
		case "3" : 
			$jijum ="삼풍점";
			break;
		case "4" : 
			$jijum ="서초점";
			break;
		case "5" : 
			$jijum ="동두천";
			break;
		case "6" : 
			$jijum ="포항점";
			break;
		case "7" : 
			$jijum ="강릉점";
			break;
		case "8" : 
			$jijum ="전주점";
			break;
		case "9" : 
			$jijum ="마산점";
			break;
		case "10" : 
			$jijum ="노원점";
			break;
		default : 
			$jijum ="미지정";
			break;
		}

	if ($row[3] <>""){	
		$atoffice = date("A h:i:s",$row[3]);
		$atoffice = str_replace("AM","오전","$atoffice");
		$atoffice = str_replace("PM","오후","$atoffice");	
	}

	if ($row[4] <>""){	//지각체크
		$late_h = date("H",$row[4]);
		$late_h = $late_h * 3600;
		$late_m = date("i",$row[4]);
		$late_m = $late_m * 60;
		$late_s  = $late_h + $late_m;

		$late_time = 9 * 3600 + 30 * 60; //출근시각이 9시 30분일경우

		if ($late_s > $late_time) {
			$late ="O";	
		}	

	}


	if ($row[5] <>""){
		$gooffice = date("A h:i:s",$row[5]);
		$gooffice = str_replace("AM","오전","$gooffice");
		$gooffice = str_replace("PM","오후","$gooffice");	
	}
	if ($row[5] <>""){
		$work_time = date("H",$row[5]) - date("H",$row[3]);
	}

	if ($row[7] =="Y") {
		$early_go ="O";
	}

	$date= substr($row[0],0,10);
	echo ("$date\t   $row[1]\t    $jijum\t    $atoffice\t $row[4]\t $gooffice \t$row[6]\t  $work_time\t   $late\t   $early_go \r\n"); 
} 

mysql_free_result($stmt); 
mysql_close($conn); 
?> 