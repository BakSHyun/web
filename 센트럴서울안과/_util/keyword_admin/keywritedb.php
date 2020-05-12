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



$dbobj = new dbUtil($connect);
$dbobj->setTable("mpkeyword");

$wdate = date("Y-m-d H:i:s");
//$keyword = $keyword1 . "|" . $keyword2 . "|" . $keyword3 . "|" . $keyword4 . "|" . $keyword5 . "|" . $keyword6;

$dbobj->addfield("title",$title);
$dbobj->addfield("keyword",$keyword);
$dbobj->addfield("url",$url);
$dbobj->addfield("contents",$contents);
if($m2 == "keywritedb") $dbobj->addfield("wdate",$wdate);

if($m2 == "keywritedb") $dbobj->insert();
if($m2 == "keymodifydb") $dbobj->update("no=$no");

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?m1=$m1&m2=keylist\">";

?>
