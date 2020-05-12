<?
	require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/config.php";
	require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpreserve/inc/sys.php";
	require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";

	$mpreserve = new mpreserve($_POST[code]);

	$resdate = $_POST['rday'];
	$timelist = $mpreserve->gettimelist($resdate);
?>

<select name="restime" class="s_select">
	<?
	if(is_array($timelist)){
		foreach($timelist as $times) {
			if($times[linkreserve3]=='0'){
				continue;
			}
			echo "<option value='".$times[rtime]."'>".$times[rtime]."</option>";
		}
	}
	else{
	?>
	<option value=''>예약 가능한 시간이 없습니다.</option>
	<? }?>
</select>