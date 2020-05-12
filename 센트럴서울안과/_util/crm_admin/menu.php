<h1><i class="fa fa-bars"></i> CRM 목록</h1>
<ul class='admin_left_menu'>
<?
$rcounter = mysql_fetch_array(mysql_query("select count(*) counter from mpreserve where view='0' ", $connect));
$totalcount_r = $rcounter[counter];

	if($totalcount_r <> 0){
		$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
	} else{
		$newimg = "";
	}
?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=crm&m2=reserve"><i class="fa fa-pencil-square-o"></i> 온라인예약<?=$newimg?></a></li>
	<?
	if($group) {
		$SQL = "select name, code from amboard_config where gcode='$group' and specail_board='1'";
		$result1 = mysql_query($SQL,$connect);
		while($row=mysql_fetch_array($result1)) {

			//$ln_qry = mysql_fetch_array(mysql_query("select wdate, view from amboard_basic where code='$row[code]' order by wdate desc limit 1", $connect));
			$bcounter = mysql_fetch_array(mysql_query("select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'", $connect));
			//$check_time=(time()-strtotime($ln_qry[0]))/60/60;
			$totalcount = $bcounter[counter];
			//if( $check_time <= 24 && $ln_qry[view]==0) {
			if($totalcount <> 0){
				$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
			} else{
				$newimg = "";
			}

	?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=crm&code=<?=$row[code]?>"><i class="fa fa-pencil-square-o"></i> <?=$row[name]?><?=$newimg?></a></li>
	<?
		}
	}
	?>

</ul>
