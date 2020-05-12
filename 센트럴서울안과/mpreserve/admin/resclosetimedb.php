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

if($rmonth < 10) $rmonth2 = "0".$rmonth;
else $rmonth2 = $rmonth;
if($rday < 10) $rday2 = "0".$rday;
else $rday2 = $rday;
$rdate = $ryear . "-" . $rmonth2 . "-" . $rday2;

$dbobj = new dbUtil($connect);
$dbobj->setTable("mpreserve_close");


if($rtype == "1")
{
	$dbobj->addfield("code",$code);
	$dbobj->addfield("closedate",$rdate);
	$dbobj->addfield("closetime",$rtime);
	$dbobj->addfield("status",1);
	$dbobj->insert();
} else if($rtype == "2")
{
	$dbobj->addfield("code",$code);
	$dbobj->addfield("closedate",$rdate);
	$dbobj->addfield("closetime",$rtime);
	$dbobj->addfield("status",2);
	$dbobj->insert();
} else if($rtype == "0")
{
	$dbobj->delete("code='$code' and closedate='$rdate' and closetime='$rtime'");
}
else if($rtype == "allclose")
{
	$week = date("w",strtotime($rdate));
	$result = mysql_query("select time$week from mpreserve_config where code='$code'");
	$times = mysql_result($result,0,0);
	$arr_times = explode("|",$times);
	echo count($arr_times);
	foreach($arr_times as $time)
	{
		$res = mysql_query("select count(*) from mpreserve_close where code='$code' and closedate='$rdate' and closetime='$time'");
		if(!mysql_result($res,0,0))
		{
			$dbobj->addfield("code",$code);
			$dbobj->addfield("closedate",$rdate);
			$dbobj->addfield("closetime",$time);
			$dbobj->addfield("status",1);
			$dbobj->insert();
		}
	}
}
else if($rtype == "allopen")
{
	$dbobj->delete("code='$code' and closedate='$rdate'");
}

//if($m2 == "resconfigupdatedb") $dbobj->update("no=$no");

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?m1=$m1&m2=resclosetime&code=$code&ryear=$ryear&rmonth=$rmonth&rday=$rday&year=$year&month=$month&viewtime=$viewtime\">";

?>