<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";

$weekArray = array("0"=>"일요일", "1"=>"월요일", "2"=>"화요일", "3"=>"수요일", "4"=>"목요일", "5"=>"금요일", "6"=>"토요일");

$query = "select time" . $week . ", numofper" . $week . " from mpreserve_config where code='$code'";
//echo $query;
$result = mysql_query($query, $connect);
$row = mysql_fetch_row($result);
if(!$row[0]) {
	msg("시간설정을 먼저 해주세요.");
	echo "
	<script>
	self.close();
	</script>
	";
	exit;
}
$timeArray = explode("|", $row[0]);
$nopArray = explode("|", $row[1]);
?>
<style type="text/css">
td{font-family:'돋움','굴림';font-size:9pt;color:#333333}
</style>
<script type="text/javascript">
<!--
function apply_numofper() {
	var myform = document.numForm;
	<?
	$i = 0;
	foreach($timeArray as $timeValue) {
		if($i == 0) {
	?>
	numofper = myform.numofper_<?=$i?>.value
	<?
		}
		else {
	?>
	numofper = numofper + "|" + myform.numofper_<?=$i?>.value;
	<?
		}
		$i++;
	}
	?>
	//var numofper = myform.numofper_0.value + "|" +myform.numofper_1.value + "|" +myform.numofper_2.value + "|" +myform.numofper_3.value + "|" +myform.numofper_4.value + "|" +myform.numofper_5.value + "|" +myform.numofper_6.value;
	window.opener.rcform.numofper<?=$week?>.value = numofper;
	self.close();
}
//-->
</script>
</head>
<body style="margin:0">
<form name="numForm">
<table width="300" cellspacing="0" cellpadding="0">
	<tr>
		<td height="30">&nbsp;&nbsp;<strong>시간별 인원설정 - <?=$weekArray[$week]?></strong></td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td align="center">
			<table width="90%" cellspacing="1" cellpadding="0" bgcolor="#cccccc">
				<tr>
					<td width="100" height="30" align="center" bgcolor="#ffffff">시간</td>
					<td align="center" bgcolor="#ffffff">인원</td>
				</tr>
				<?
				$i = 0;
				foreach($timeArray as $timeValue) {
				?>
				<tr>
					<td height="30" align="center" bgcolor="#ffffff"><?=$timeValue?></td>
					<td bgcolor="#ffffff">&nbsp;&nbsp;<input type="text" name="numofper_<?=$i?>" size="4" maxlength="2" value="<?=$nopArray[$i]?>"> 명</td>
				</tr>
				<?
					$i++;
				}
				?>
			</table>
		</td>
	</tr>
	<tr>
		<td height="30" align="right" style="padding-right:20px"><input type="button" value="적용" onclick="apply_numofper();" /></td>
	</tr>
</table>
</form>
</body>
</html>