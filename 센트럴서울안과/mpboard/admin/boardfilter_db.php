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
$dbobj->setTable("amboard_filter");
$dbobj->addfield("filterstr",$fcontents_str);
$dbobj->addfield("state",$fcontents_stat);
$dbobj->update("no=".$fcontents_no,1);

$dbobj->setTable("amboard_filter");
$dbobj->addfield("filterstr",$fname_str);
$dbobj->addfield("state",$fname_stat);
$dbobj->update("no=".$fname_no,1);

//echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&m1=$m1&m2=$m2\">";

?>

<script> 
	location.href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=configfilter";
</script>
