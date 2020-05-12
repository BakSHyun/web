<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";

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

$result = mysql_query("select * from amboard_basic where no = $no");
$row = mysql_fetch_array($result);

$wdate = date("Y-m-d H:i:s");
$ip = $_SERVER["REMOTE_ADDR"];

$dbobj = new dbUtil($connect);
$dbobj->setTable("amboard_basic_comment");
$dbobj2 = new dbUtil($connect);
$dbobj2->setTable("amboard_basic");

if($cmtMode == "modify") {
	$dbobj->addfield("comment",$comment);
	$dbobj->update("no=$cno");
}
else if($cmtMode == "delete") {
	$dbobj->delete("no=$cno");
}
else {

	$dbobj2->addfield("etc3",$crm2);
	$dbobj2->addfield("etc6",$crm1);
	$dbobj2->addfield("etc7",$etc7);
	$dbobj2->addfield("admin_name",$_SESSION[username]);
	if($row[etc3] != $crm2) $dbobj2->addfield("etc5",$wdate);
	$dbobj2->update("no=$no");

	if($crm2 <> ""){
		$dbobj->addfield("crm1",$crm1);
		$dbobj->addfield("crm2",$crm2);
		$dbobj->addfield("fno",$no);
		$dbobj->addfield("code",$code);
		$dbobj->addfield("name",$_SESSION[username]);
		$dbobj->addfield("userid",$_SESSION[userid]);
		$dbobj->addfield("comment",$comment);
		$dbobj->addfield("ip",$ip);
		$dbobj->addfield("wdate",$wdate);
		$dbobj->insert();
	}
}

if($m1=="reserve"){
	$m2="resview";
} else{
	$m2="crm_modify";
}

echo "<META http-equiv=\"Refresh\" content=\"0; URL=/admin/index.php?group=$group&code=$code&m1=$m1&m2=$m2&no=$no&sno=$sno& \">";
?>