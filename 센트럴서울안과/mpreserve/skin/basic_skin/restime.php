<?
	require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/config.php";
	require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpreserve/inc/sys.php";
	require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";
	require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php";

	$mpreserve = new mpreserve($_POST[code]);

	$resdate = $_POST['rday'];
	$timelist = $mpreserve->gettimelist($rdate);
?>

<select name="restime">
	<?
		if(is_array($timelist)){
			foreach($timelist as $times) {
			$arr_rtime = explode(":",$times[rtime]);
			$rtime = $arr_rtime[0]."시";
			if($arr_rtime[1] != "00") $rtime .= $arr_rtime[1]."분";
	?>
	<option value="<?=$rtime?>"><?=$rtime?></option>
	<? }
	}
	else{
	?>
	<option value=''>예약 가능한 시간이 없습니다.</option>
	<? }?>
</select>