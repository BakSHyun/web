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

if(!$no)
{
	msgback("예약번호가 넘어오지 않았습니다.");
	exit;
}

if($my = 'mypage'){
	require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
	require_once $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/inc/sys.php";

	$SQL1 = "update  mpreserve set resstate = '9' where no = $no" ;
	$A = mysql_query($SQL1,$connect);
	msg("예약이 취소되었습니다.");
?>       
  <script language="javascript">
  location.href = "../06_community/community2_2_check.php";
  </script>
  
<?

	}else {
	$result = mysql_query("update ".$mpreserve->tables[reserve]." set resstate = '9' where no = $no");

	if($result){ ?>
	<form name="resmove" action="" method="post">
	<input type="hidden" name="mode" value="confirmlist">
	<input type="hidden" name="name" value="<?=$name?>">
	<input type="hidden" name="hphone1" value="<?=$hphone1?>">
	<input type="hidden" name="hphone2" value="<?=$hphone2?>">
	<input type="hidden" name="hphone3" value="<?=$hphone3?>">
	</form>

	<script language="javascript">
	document.all.resmove.submit();
	</script>
	<?
		}
}
?>