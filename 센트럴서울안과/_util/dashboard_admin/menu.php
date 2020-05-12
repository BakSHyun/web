<script>
$(document).ready(function(){
	$('.alm_dep1').click(function(){
		$('.alm_dep2').each(function(){ $(this).slideUp(); });
		$(this).next().slideDown();
	});
});
</script>

<h1><i class="fa fa-users"></i> 그룹선택</h1>
<div class='admin_left_menu1'><?include "./pulldown.php";?></div>

<h1> <i class="fa fa-cog fa-spin"></i> 기본관리</h1>
<ul class='admin_left_menu'>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&m2=site_mod"><i class="fa fa-check-square-o"></i> 사이트 관리</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=member&m2=list"><i class="fa fa-user"></i> 회원 관리</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=reserve"><i class="fa fa-calendar"></i> 온라인 예약</a></li>
</ul>

<ul class='admin_left_menu alm_dep2'>
	<?
	if($group) {
	$SQL = "select name, code from amboard_config where gcode='$group' and board_idx < 2000 order by board_idx asc";
	$result1 = mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result1)) {
	$ln_qry = mysql_fetch_array(mysql_query("select wdate, view from amboard_basic where code='$row[code]' order by wdate desc limit 1", $connect));
	//$bcounter = mysql_fetch_array(mysql_query("select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'", $connect));
	//echo "select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'";
	$check_time=(time()-strtotime($ln_qry[0]))/60/60;
	$totalcount = $bcounter[counter];
	if( $check_time <= 24 ) {
	//if($totalcount <> 0){
		$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
	} else{
		$newimg = "";
	}
	?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&code=<?=$row[code]?>"><i class="fa fa-pencil-square-o"></i> <?=$row[name]?><?=$newimg?></a></li>
	<?}
	}?>
</ul>
<ul class='admin_left_menu alm_dep2'>
	<?
	if($group) {
	$SQL = "select name, code from amboard_config where gcode='$group' and board_idx > 2000 and board_idx < 3000 order by board_idx asc";
	$result1 = mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result1)) {
	$ln_qry = mysql_fetch_array(mysql_query("select wdate, view from amboard_basic where code='$row[code]' order by wdate desc limit 1", $connect));
	//$bcounter = mysql_fetch_array(mysql_query("select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'", $connect));
	//echo "select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'";
	$check_time=(time()-strtotime($ln_qry[0]))/60/60;
	$totalcount = $bcounter[counter];
	if( $check_time <= 24 ) {
	//if($totalcount <> 0){
		$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
	} else{
		$newimg = "";
	}
	?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&code=<?=$row[code]?>"><i class="fa fa-pencil-square-o"></i> <?=$row[name]?><?=$newimg?></a></li>
	<?}
	}?>
</ul>
<ul class='admin_left_menu alm_dep2'>
	<?
	if($group) {
	$SQL = "select name, code from amboard_config where gcode='$group' and board_idx > 3000   and board_idx < 4000 order by board_idx asc";
	$result1 = mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result1)) {
	$ln_qry = mysql_fetch_array(mysql_query("select wdate, view from amboard_basic where code='$row[code]' order by wdate desc limit 1", $connect));
	//$bcounter = mysql_fetch_array(mysql_query("select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'", $connect));
	//echo "select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'";
	$check_time=(time()-strtotime($ln_qry[0]))/60/60;
	$totalcount = $bcounter[counter];
	if( $check_time <= 24 ) {
	//if($totalcount <> 0){
		$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
	} else{
		$newimg = "";
	}
	?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&code=<?=$row[code]?>"><i class="fa fa-pencil-square-o"></i> <?=$row[name]?><?=$newimg?></a></li>
	<?}
	}?>
</ul>
<ul class='admin_left_menu alm_dep2'>
	<?
	if($group) {
	$SQL = "select name, code from amboard_config where gcode='$group' and board_idx > 4000   and board_idx < 5000 order by board_idx asc";
	$result1 = mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result1)) {
	$ln_qry = mysql_fetch_array(mysql_query("select wdate, view from amboard_basic where code='$row[code]' order by wdate desc limit 1", $connect));
	//$bcounter = mysql_fetch_array(mysql_query("select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'", $connect));
	//echo "select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'";
	$check_time=(time()-strtotime($ln_qry[0]))/60/60;
	$totalcount = $bcounter[counter];
	if( $check_time <= 24 ) {
	//if($totalcount <> 0){
		$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
	} else{
		$newimg = "";
	}
	?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&code=<?=$row[code]?>"><i class="fa fa-pencil-square-o"></i> <?=$row[name]?><?=$newimg?></a></li>
	<?}
	}?>
</ul>
<ul class='admin_left_menu alm_dep2'>
	<?
	if($group) {
	$SQL = "select name, code from amboard_config where gcode='$group' and board_idx > 5000  and board_idx < 6000 order by board_idx asc";
	$result1 = mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result1)) {
	$ln_qry = mysql_fetch_array(mysql_query("select wdate, view from amboard_basic where code='$row[code]' order by wdate desc limit 1", $connect));
	//$bcounter = mysql_fetch_array(mysql_query("select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'", $connect));
	//echo "select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'";
	$check_time=(time()-strtotime($ln_qry[0]))/60/60;
	$totalcount = $bcounter[counter];
	if( $check_time <= 24 ) {
	//if($totalcount <> 0){
		$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
	} else{
		$newimg = "";
	}
	?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&code=<?=$row[code]?>"><i class="fa fa-pencil-square-o"></i> <?=$row[name]?><?=$newimg?></a></li>
	<?}
	}?>
</ul>