<?
// 외부에서의 접근을 막는다.
if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}

$SQL="select no,gtable,code from amboard_config where gcode='".$group."' and code='".$code."'";
$gresult=mysql_query($SQL,$connect);

if($gdata=mysql_fetch_array($gresult)) {


	$SQL = "show table status like 'amboard_".$gdata[gtable]."_category'";
	$result = mysql_query($SQL,$connect);
	$row = mysql_fetch_row($result);


	$ino = $row[10];

	$dbobj = new dbUtil($connect);
	$dbobj->setTable("amboard_".$gdata[gtable]."_category");

	if($m2 == "categoryinsertdb") $dbobj->addfield("ino",$ino);
	$dbobj->addfield("code",$code);
	$dbobj->addfield("cname",$cname);
	$dbobj->addfield("gname",$gname);
	$dbobj->addfield("etc1",$etc1);
	$dbobj->addfield("etc2",$etc2);

	if($m2 == "categoryinsertdb") $dbobj->insert();

	if($m2 == "categoryupdatedb") {
		$dbobj->update("no=$no");
		$SQL = "update amboard_".$gdata[gtable]." set category='$cname' where category='$cnameold' and code='$code'";
		//echo $SQL;
		//exit;
		mysql_query($SQL,$connect);
	}

	if($m2 == "categorydeletedb") {
		$SQL = "delete from amboard_".$gdata[gtable]."_category where no='$no'";
		mysql_query($SQL,$connect);
	}

	if($m2 == "categoryindexdb") {

		if($imode == "d") {
			//msg ('a');
			$sql = "select no,ino from amboard_".$gdata[gtable]."_category where no=$no";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if($row) {
				$no1 = $row[no];
				$ino1 = $row[ino];
			}

			$sql = "select no,ino from amboard_".$gdata[gtable]."_category where ino>$ino1 and code='$code' order by ino asc limit 1";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if($row) {
				$no2 = $row[no];
				$ino2 = $row[ino];
			}



		} else {
			$sql = "select no,ino from amboard_".$gdata[gtable]."_category where no=$no";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if($row) {
				$no1 = $row[no];
				$ino1 = $row[ino];
			}

			$sql = "select no,ino from amboard_".$gdata[gtable]."_category where ino<$ino1 and code='$code' order by ino desc limit 1";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if($row) {
				$no2 = $row[no];
				$ino2 = $row[ino];
			}
		}

		if($no1 && $no2 && $ino1 && $ino2) {
			$sql = "update amboard_".$gdata[gtable]."_category set ino='$ino2' where no=$no1";
			mysql_query($sql);

			$sql = "update amboard_".$gdata[gtable]."_category set ino='$ino1' where no=$no2";
			mysql_query($sql);
		}
	}
}



echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&m1=$m1&m2=boardcategory&code=$code\">";

?>