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

$query = "select count(*) from mpreserve_config where code = '$code'";
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

$dbobj = new dbUtil($connect);
$dbobj->setTable("mpreserve_config");

$conf_items = $conf_items_1 . "|" . $conf_items_2 . "|" . $conf_items_3 . "|" . $conf_items_4;
//$smsmail_use = $smsmail_use_1 . "|" . $smsmail_use_2 . "|" . $smsmail_use_3. "|" . $smsmail_use_4. "|" . $smsmail_use_phonenum;
$smsmail_use = $smsmail_use_1 . "|" . $smsmail_use_2 . "|" . $smsmail_use_3. "|" . $smsmail_use_4;

if($m2 == "resconfiginsertdb") $dbobj->addfield("code",$code);
$dbobj->addfield("name",$name);
$dbobj->addfield("skin",$skin);
$dbobj->addfield("time0",$time0);
$dbobj->addfield("time0_am",$time0_am);
$dbobj->addfield("time0_pm",$time0_pm);
$dbobj->addfield("time0_txt",$time0_txt);
$dbobj->addfield("time1",$time1);
$dbobj->addfield("time1_am",$time1_am);
$dbobj->addfield("time1_pm",$time1_pm);
$dbobj->addfield("time1_txt",$time1_txt);
$dbobj->addfield("time2",$time2);
$dbobj->addfield("time2_am",$time2_am);
$dbobj->addfield("time2_pm",$time2_pm);
$dbobj->addfield("time2_txt",$time2_txt);
$dbobj->addfield("time3",$time3);
$dbobj->addfield("time3_am",$time3_am);
$dbobj->addfield("time3_pm",$time3_pm);
$dbobj->addfield("time3_txt",$time3_txt);
$dbobj->addfield("time4",$time4);
$dbobj->addfield("time4_am",$time4_am);
$dbobj->addfield("time4_pm",$time4_pm);
$dbobj->addfield("time4_txt",$time4_txt);
$dbobj->addfield("time5",$time5);
$dbobj->addfield("time5_am",$time5_am);
$dbobj->addfield("time5_pm",$time5_pm);
$dbobj->addfield("time5_txt",$time5_txt);
$dbobj->addfield("time6",$time6);
$dbobj->addfield("time6_am",$time6_am);
$dbobj->addfield("time6_pm",$time6_pm);
$dbobj->addfield("time6_txt",$time6_txt);
$dbobj->addfield("time_note",$time_note);
$dbobj->addfield("numofper0",$numofper0);
$dbobj->addfield("numofper1",$numofper1);
$dbobj->addfield("numofper2",$numofper2);
$dbobj->addfield("numofper3",$numofper3);
$dbobj->addfield("numofper4",$numofper4);
$dbobj->addfield("numofper5",$numofper5);
$dbobj->addfield("numofper6",$numofper6);
$dbobj->addfield("conf_items",$conf_items);
$dbobj->addfield("smsmail_use",$smsmail_use);
$dbobj->addfield("smsmail_use_phonenum",$smsmail_use_phonenum);
$dbobj->addfield("manage_auth",$manage_auth);
$dbobj->addfield("write_auth",$write_auth);
$dbobj->addfield("reservation_possibility_day",$reservation_possibility_day);
$dbobj->addfield("keyword_trace_feature",$keyword_trace_feature);
$dbobj->addfield("branch_tel",$branch_tel);
$dbobj->addfield("sms_type",$sms_type);


if($m2 == "resconfiginsertdb") $dbobj->insert();
if($m2 == "resconfigupdatedb") $dbobj->update("no=$no");

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?m1=$m1&m2=resconfiglist\">";

?>
