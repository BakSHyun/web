<?
  $sel = $_POST['field_code'];
  
  //echo $sel."<br>";
   if($abmode == "change") {	// 리스트에서 선택된 게시물을 삭제한다.
		$array_uidvalue = explode("|",$checkvalue);
		$array_uidcount = count($array_uidvalue);
		
		for($i=0;$i < $array_uidcount;$i++) {
			if($array_uidvalue[$i]) {
				$no = $array_uidvalue[$i];
		    
    	//	      echo $no."<br>";	
			      $SQL = "update amboard_basic set code='$sel' where no='$no'";
				  mysql_query($SQL,$connect);	 
				
				/*MEDIPIX 게시물에 이벤트 발생시 로그 기록 추가 -pooh(08.05.19) */

					$SQL = "insert board_log (";
					$SQL = $SQL."user_id,";
					$SQL = $SQL."name,";
					$SQL = $SQL."code,";
					$SQL = $SQL."mode,";
					$SQL = $SQL."ip,";
					$SQL = $SQL."wdate,";
					$SQL = $SQL."subject,";
					$SQL = $SQL."no";
					$SQL = $SQL.") values (";
					$SQL = $SQL."'$_SESSION[userid]',";
					$SQL = $SQL."'$name',";
					$SQL = $SQL."'$code',";
					$SQL = $SQL."'$abmode',";
					$SQL = $SQL."'$ip',";
					$SQL = $SQL."'$wdate',";
					$SQL = $SQL."'$title',";
					$SQL = $SQL."'$no')";
					mysql_query($SQL,$connect);

				/*MEDIPIX 게시물에 이벤트 발생시 로그 기록 추가 -pooh(08.05.19) */
					
			}
		}
	}
	  gourl("$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category&abmode=list&$bwriteobj->searchpara$bwriteobj->catepara&bsort=$bsort&bfsort=$bfsort&$bwriteobj->addpara");

?>
