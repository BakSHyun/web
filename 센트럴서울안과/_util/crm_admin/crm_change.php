<?
$sel ="online3";


  //echo $sel."<br>";
   if($m2 == "crm_change") {	// 리스트에서 선택된 게시물을 삭제한다.

	for($i=0;$i<count($delno);$i++) {
		if($delno[$i]) {
					$no = $delno[$i];

    	//	      echo $no."<br>";
			      $SQL = "update amboard_basic set code='$sel' where no='$no'";
				  mysql_query($SQL,$connect);
				  $SQL = "update amboard_basic_file set opt1='$sel' where fno='$no'";
				  mysql_query($SQL,$connect);
				  $SQL = "update amboard_basic_comment set code='$sel' where fno='$no'";
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
		msg ("게시물 이동이 완료 되었습니다.");
gourl("$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category&m1=online&$bwriteobj->searchpara$bwriteobj->catepara&bsort=$bsort&bfsort=$bfsort&$bwriteobj->addpara");

?>
