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



require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php";

$wdate = date("Y-m-d H:i:s");


$etc1 = @implode("|",$_POST['etc1']);
$ip = $_SERVER["REMOTE_ADDR"];

$dbobj = new dbUtil($connect);
$dbobj->setTable("amboard_basic");

$dbobj->addfield("gcode",$group);
$dbobj->addfield("code",$code);
$dbobj->addfield("name",$name);
$dbobj->addfield("cate1",$cate1_input);
$dbobj->addfield("contents",$contents);
$dbobj->addfield("ip",$ip);
$dbobj->addfield("wdate",$wdate);
$dbobj->addfield("hphone1",$hphone1);
$dbobj->addfield("hphone2",$hphone2);
$dbobj->addfield("hphone3",$hphone3);
$dbobj->addfield("email",$email);
$dbobj->addfield("etc1",$etc1);
$dbobj->addfield("etc2",$etc2);
$dbobj->addfield("etc19",$etc19);
$dbobj->addfield("etc3",$etc3);
$dbobj->addfield("etc6",$etc6);
$dbobj->addfield("etc7",$etc7);
if($row[etc3] != $etc3) $dbobj->addfield("etc5",$wdate);
//echo "3333";
$dbobj->insert();

//echo "111";
//exit;
$l_id=mysql_insert_id();

if($comment <> ""){

	$dbobj2 = new dbUtil($connect);
	$dbobj2->setTable("amboard_basic_comment");
	$dbobj2->addfield("fno",$l_id);
	$dbobj2->addfield("code",$code);
	$dbobj2->addfield("name",$_SESSION[username]);
	$dbobj2->addfield("userid",$_SESSION[userid]);
	$dbobj2->addfield("comment",$comment);
	$dbobj2->addfield("ip",$ip);
	$dbobj2->addfield("wdate",$wdate);
	$dbobj2->insert();
}
/* 이벤트에 답변 메일 및 sms 발송 */

//echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&m1=$m1&m2=crm_list&no=$no&sno=$sno&search_etc4=$search_etc4&search_clinic=&search_clinic&search_cate1=$search_cate1&search_key=&search_key&search_value=$search_value&implode_etc3=$implode_etc3 \">";
echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&code=$code&m1=$m1&m2=crm_list\">";

?>