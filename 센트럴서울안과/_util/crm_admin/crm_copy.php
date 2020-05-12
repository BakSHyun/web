<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";

$sel = $_POST['field_code'];
$m2 = $_POST['m2'];



 // 게시물 쓰기,수정 객체 생성
// $bwriteobj = new amboardWrite($connect);
// $bwriteobj->init();
//echo "m2:".$m2;

//복사할 게시판 코드
$sel ="online3";


if($m2 == "crm_copy") {	// 리스트에서 선택된 게시물을 복사한다


	for($i=0;$i<count($delno);$i++) {
		if($delno[$i]) {
			$no = $delno[$i];
			//join하여 amboard_테이블과 amboard_테이블_file과 amboard_테이블_comment의 정보를 no값을 기준으로 select (08.05.29)
			$SQL = "SELECT gcode,category, cate1, cate2, cate3, ab.name AS abname, ab.userid AS ab_userid, ab.passwd AS passwd,email,homepage, title, subtitle, html, secret, contents, recontents,view,download, point, point_check, wmode, vstate, ab.ip AS ab_ip, ab.wdate AS ab_wdate, hphone1, hphone2, hphone3, etc1, etc2, etc3, etc4, etc5, etc6, etc7, etc8, etc9, etc10, etc11, etc12, etc13, etc14, etc15, etc16, etc17, etc18,etc19, etc20,admin_id,admin_name,rdate, ab.del_state AS del_state, vname, abf.name AS abfname, rname, path, size, count, opt1, opt2, opt3, regdate,abc.name AS abc_name, abc.userid AS abc_userid, abc.passwd AS abc_passwd, abc.comment AS abc_comment, abc.ip AS abc_ip, abc.wdate AS abc_wdate FROM amboard_basic ab LEFT OUTER JOIN amboard_basic_file abf ON abf.fno = ab.no LEFT OUTER JOIN amboard_basic_comment abc ON abc.fno = ab.no
            WHERE ab.no = '$no'";

			$row = mysql_fetch_array(mysql_query($SQL,$connect));
			if($row) {
				$gcode = $row[gcode];
				$category = $row[category];
				$cate1 = $row[cate1];
				$cate2 = $row[cate2];
				$cate3 = $row[cate3];
				$ab_name = $row[abname];
				$ab_userid = $row[ab_userid];
				$ab_passwd = $row[ab_passwd];
				$email = $row[email];
				$homepage = $row[homepage];
				$title  = $row[title];
				$title = stripslashes($title);
				$title = addslashes($title);
				$subtitle = $row[subtitle];
				$html = $row[html];
				$secret = $row[secret];
				$contents = $row[contents];
				$contents = stripslashes($contents);
				$contents = addslashes($contents);
				$recontents = $row[recontents];
				$recontents = stripslashes($recontents);
				$recontents = addslashes($recontents);
				$view = $row[view];
				$wmode = $row[wmode];
				$vstate = $row[vstate];
				$ab_ip = $row[ab_ip];
				$ab_wdate = $row[ab_wdate];
				$hphone1 = $row[hphone1];
				$hphone2 = $row[hphone2];
				$hphone3 = $row[hphone3];
				$etc1 = $row[etc1];
				$etc2 = $row[etc2];
				$etc3 = $row[etc3];
				$etc4 = $row[etc4];
				$etc5 = $row[etc5];
				$etc6 = $row[etc6];
				$etc7 = $row[etc7];
				$etc8 = $row[etc8];
				$etc9 = $row[etc9];
				$etc10 = $row[etc10];
				$etc11 = $row[etc11];
				$etc12 = $row[etc12];
				$etc13 = $row[etc13];
				$etc14 = $row[etc14];
				$etc15 = $row[etc15];
				$etc16 = $row[etc16];
				$etc17 = $row[etc17];
				$etc18 = $row[etc18];
				$etc19 = $row[etc19];
				$etc20 = $row[etc20];
				$del_state = $row[del_state];

				$vname = $row[vname];
				$abf_name  = $row[abfname];
				$rname = $row[rname];
				$path = $row[path];
				$path = stripslashes($path);
				$path = addslashes($path);
				$size  = $row[size];
				$count  = $row[count];
				$opt1  = $row[opt1];
				$opt2  = $row[opt2];
			    $opt3  = $row[opt3];
				$regdate = $row[regdate];

				$admin_id =  $row[admin_id];
				$admin_name = $row[admin_name];
				$rdate = $row[rdate];


				$abc_name =  $row[abc_name];
				$abc_userid = $row[abc_userid];
				$abc_passwd = $row[abc_passwd];
				$abc_comment = $row[abc_comment];
				$abc_comment = stripslashes($abc_comment);
				$abc_comment = addslashes($abc_comment);
				$abc_ip = $row[abc_ip];
				$abc_wdate = $row[abc_wdate];

			}

}
			$SQL1 = "insert into amboard_basic (gcode,code,category,cate1,cate2,cate3,name,userid,passwd,email,homepage,title,subtitle,html,secret,contents,recontents,view,wmode,vstate,ip,wdate,hphone1,hphone2,hphone3,etc1,etc2,etc3,etc4,etc5,etc6,etc7,etc8,etc9,etc10,etc11,etc12,etc13,etc14,etc15,etc16,etc17,etc18,etc19,etc20,admin_id,admin_name,rdate,del_state) values ('$gcode','$sel','$category','$cate1','$cate2','$cate3','$ab_name','$ab_userid','$passwd','$email','$homepage','$title','$subtitle',$html,'$secret','$contents','$recontents',$view,'$wmode','$vstate','$ip','$ab_wdate','$hphone1','$hphone2','$hphone3','$etc1','$etc2','$etc3','$etc4','$etc5','$etc6','$etc7','$etc8','$etc9','$etc10','$etc11','$etc12','$etc13','$etc14','$etc15','$etc16','$etc17','$etc18','$etc19','$etc20','$admin_id','$admin_name','$rdate','$del_state')";
				//$SQL1 = "insert into amboard_basic (code,category,cate1,cate2,cate3,name,userid,passwd,email,homepage,title,subtitle,html,secret,contents,recontents) values ('$sel','$category','$cate1','$cate2','$cate3','$name','$userid','$passwd','$email','$homepage','$title','$subtitle',$html,'$secret','$contents','$recontents')";
			//	echo $SQL1;
			//	exit;
				mysql_query($SQL1,$connect);

				/*MEDIPIX 게시물에 이벤트 발생시 로그 기록 추가 -pooh(08.05.29) */

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

				/*MEDIPIX 게시물에 이벤트 발생시 로그 기록 추가 -pooh(08.05.29) */

			   $SQL2 = "SELECT no FROM `amboard_basic` ORDER BY `no` DESC LIMIT 1";
			   $row = mysql_fetch_array(mysql_query($SQL2,$connect));
			   if($row) {
                  $bno =  $row[no];
               //echo $SQL2."<br>";
			   //echo $bno;

			   $SQL3 = "update amboard_basic set ino= '$bno' where no= '$bno'";
			   mysql_query($SQL3,$connect);


				// 여러개 파일 복사
/*

				$SQL4 = "insert into amboard_".$bwriteobj->gtable."_file(fno,vname,name,rname,path,size,count,opt1,opt2,opt3,regdate) values ('$bno','$vname','$abf_name','$newfile_name','$path','$size','$count','$sel','$opt2','$opt3','$regdate')";
				mysql_query($SQL4,$connect);
*/


//파일 이전
				$SQL6 ="SELECT * FROM amboard_basic_file where fno='$no' ";
				$result4 = mysql_query($SQL6);

				while($rows2 = mysql_fetch_array($result4)) {

				$query = "SELECT MAX(no) FROM amboard_basic_file";
				$result3 = mysql_query($query);

				if($result3)
				{
					$row3=mysql_fetch_row($result3);
					$MaxIdx2 = $row3[0] + 1;
				}
				else
				{
					$MaxIdx2 = 1;
				}

				$rname_array = explode(".",$rows2[rname]);

				$file = $_SERVER[DOCUMENT_ROOT]."/mpboard/upload/".$rows2[rname];
				$newfile_name=$rname_array[0]."_new.".$rname_array[1].".".$rname_array[2];
				$newfile = $_SERVER[DOCUMENT_ROOT]."/mpboard/upload/".$newfile_name;

				if (!crm_copy($file, $newfile)) {
				echo "failed to crm_copy $file...\n";
				}


					$query ="";

					$query = "insert into amboard_basic_file (";
					$query = $query . "no, ";
					$query = $query . "fno, ";
					$query = $query . "vname, ";
					$query = $query . "name, ";
					$query = $query . "rname, ";
					$query = $query . "path, ";
					$query = $query . "size, ";
					$query = $query . "count, ";
					$query = $query . "opt1, ";
					$query = $query . "opt2, ";
					$query = $query . "opt3, ";
					$query = $query . "regdate";
					$query = $query . ") values (";
					$query = $query . "'$MaxIdx2',";
					$query = $query . "'$bno',";
					$query = $query . "'$rows2[vname]',";
					$query = $query . "'$rows2[name]',";
					$query = $query . "'$newfile_name',";
					$query = $query . "'/./mpboard/upload/',";
					$query = $query . "'$rows2[size]',";
					$query = $query . "'$rows2[count]',";
					$query = $query . "'$sel',";
					$query = $query . "'$rows2[opt2]',";
					$query = $query . "'$rows2[opt3]',";
					$query = $query . "'$rows2[regdate]'";
					$query = $query . ")";

					$result5 = mysql_query($query);

					if(!$result5)
					{
						$errNO = mysql_errno($conn);
						$errMSG = mysql_error($conn);
						echo("ERROR_QUERY : $query<BR>");
						echo("ERROR_NO    : $errNO<BR>");
						echo("ERROR_MSG   : $errMSG<BR>");
						exit;
					}


				}





			  if(!($abc_name ==  '' || $abc_userid == '')){
			  $SQL5 = "insert into amboard_basic_comment(fno,code,name,userid,passwd,comment,ip,wdate) values ('$bno','$sel','$abc_name','$abc_userid','$abc_passwd','$abc_comment','$abc_ip','$abc_wdate')";
			  mysql_query($SQL5,$connect);
			  }

			//echo $SQL;
			//echo $SQL1;
			//echo $SQL2;
			//echo $SQL3;
			//echo $SQL4;
            //echo $SQL5;
			}
		}
}

msg ("게시물 복사가 완료 되었습니다.");

gourl("$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category&m1=online&$bwriteobj->searchpara$bwriteobj->catepara&bsort=$bsort&bfsort=$bfsort&$bwriteobj->addpara");

?>