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

/*
$query = "select count(*) from mpreserve_config where url = '$url'";
$result = mysql_query($query,$connect);
$cnt_rows = mysql_result($result,0,0);

if($cnt_rows > 0)
{
	echo "
	<script>
	alert('해당 코드가 이미 존재합니다');
	history.back();
	</script>
	";
	exit;
}
*/

$dbobj = new dbUtil($connect);
$dbobj->setTable("mpkeyword");

$wdate = date("Y-m-d H:i:s");
//$keyword = $keyword1 . "|" . $keyword2 . "|" . $keyword3 . "|" . $keyword4 . "|" . $keyword5 . "|" . $keyword6;

$dbobj->addfield("title",$title);
$dbobj->addfield("keyword",$keyword);
$dbobj->addfield("url",$url);
$dbobj->addfield("contents",$contents);
if($asrmode == "keywritedb") $dbobj->addfield("wdate",$wdate);

if($asrmode == "keywritedb") $dbobj->insert();
if($asrmode == "keymodifydb") $dbobj->update("no=$no");

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?asumode=$asumode&asrmode=keylist\">";

?>
