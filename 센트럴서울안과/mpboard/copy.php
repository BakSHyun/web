<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";

$sel = $_POST['field_code'];

 // 게시물 쓰기,수정 객체 생성
 $bwriteobj = new amboardWrite($connect);
 $bwriteobj->init();

if($abmode == "copy") {	// 리스트에서 선택된 게시물을 복사한다

	$array_uidvalue = explode("|",$checkvalue);
	$array_uidcount = count($array_uidvalue);
	
	for($i=0;$i < $array_uidcount;$i++) {
		if($array_uidvalue[$i]) {
			$no = $array_uidvalue[$i];
			//join하여 amboard_테이블과 amboard_테이블_file과 amboard_테이블_comment의 정보를 no값을 기준으로 select (08.05.29)
			$SQL = "SELECT category, cate1, cate2, cate3, ab.name AS abname, ab.userid AS ab_userid, ab.passwd AS passwd,email,homepage, title, subtitle, html, secret, contents, recontents,view,download, point, point_check, wmode, vstate, ab.ip AS ab_ip, ab.wdate AS ab_wdate, hphone1, hphone2, hphone3, etc1, etc2, etc3, etc4, etc5, etc6, etc7, etc8, etc9, etc10, etc11, etc12, etc13, etc14, etc15, etc16, etc17, etc18,etc19, etc20, del_state, vname, abf.name AS abfname, rname, path, size, count, opt1, opt2, opt3, regdate,abc.name AS abc_name, abc.userid AS abc_userid, abc.passwd AS abc_passwd, abc.comment AS abc_comment, abc.ip AS abc_ip, abc.wdate AS abc_wdate FROM amboard_".$bwriteobj->gtable." ab LEFT OUTER JOIN amboard_".$bwriteobj->gtable."_file abf ON abf.fno = ab.no LEFT OUTER JOIN amboard_".$bwriteobj->gtable."_comment abc ON abc.fno = ab.no
            WHERE ab.no = '$no'";
          
			$row = mysql_fetch_array(mysql_query($SQL,$connect));
			if($row) {
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

				$abc_name =  $row[abc_name];
				$abc_userid = $row[abc_userid]; 
				$abc_passwd = $row[abc_passwd];
				$abc_comment = $row[abc_comment];
				$abc_comment = stripslashes($abc_comment);
				$abc_comment = addslashes($abc_comment);
				$abc_ip = $row[abc_ip];
				$abc_wdate = $row[abc_wdate]; 
			}
			
			$SQL1 = "insert into amboard_".$bwriteobj->gtable." (code,category,cate1,cate2,cate3,name,userid,passwd,email,homepage,title,subtitle,html,secret,contents,recontents,view,wmode,vstate,ip,wdate,hphone1,hphone2,hphone3,etc1,etc2,etc3,etc4,etc5,etc6,etc7,etc8,etc9,etc10,etc11,etc12,etc13,etc14,etc15,etc16,etc17,etc18,etc19,etc20,del_state) values ('$sel','$category','$cate1','$cate2','$cate3','$ab_name','$userid','$passwd','$email','$homepage','$title','$subtitle',$html,'$secret','$contents','$recontents',$view,'$wmode','$vstate','$ip','$ab_wdate','$hphone1','$hphone2','$hphone3','$etc1','$etc2','$etc3','$etc4','$etc5','$etc6','$etc7','$etc8','$etc9','$etc10','$etc11','$etc12','$etc13','$etc14','$etc15','$etc16','$etc17','$etc18','$etc19','$etc20','$del_state')";
				//$SQL1 = "insert into amboard_basic (code,category,cate1,cate2,cate3,name,userid,passwd,email,homepage,title,subtitle,html,secret,contents,recontents) values ('$sel','$category','$cate1','$cate2','$cate3','$name','$userid','$passwd','$email','$homepage','$title','$subtitle',$html,'$secret','$contents','$recontents')";
				//echo $SQL1;
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
	
			   $SQL2 = "SELECT no FROM `amboard_".$bwriteobj->gtable."` ORDER BY `no` DESC LIMIT 1";
			   $row = mysql_fetch_array(mysql_query($SQL2,$connect));
			   if($row) {
                  $bno =  $row[no];
               //echo $SQL2."<br>";
			   //echo $bno;
			   
			   $SQL3 = "update amboard_".$bwriteobj->gtable." set ino= '$bno' where no= '$bno'";
			   mysql_query($SQL3,$connect);

			   $SQL4 = "insert into amboard_".$bwriteobj->gtable."_file(fno,vname,name,rname,path,size,count,opt1,opt2,opt3,regdate) values ('$bno','$vname','$abf_name','$rname','$path','$size','$count','$sel','$opt2','$opt3','$regdate')";   
			   mysql_query($SQL4,$connect);
        
			  if(!($abc_name ==  '' || $abc_userid == '')){
			  $SQL5 = "insert into amboard_".$bwriteobj->gtable."_comment(fno,code,name,userid,passwd,comment,ip,wdate) values ('$bno','$sel','$abc_name','$abc_userid','$abc_passwd','$abc_comment','$abc_ip','$abc_wdate')"; 
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
}

gourl("$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category&abmode=list&$bwriteobj->searchpara$bwriteobj->catepara&bsort=$bsort&bfsort=$bfsort&$bwriteobj->addpara");

?>