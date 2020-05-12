<h1><i class="fa fa-users"></i> 그룹선택</h1>
<div class='admin_left_menu1'><?include "./pulldown.php";?></div>

<h1> <i class="fa fa-cog fa-spin"></i> 기본관리</h1>
<ul class='admin_left_menu'>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&m2=site_mod"><i class="fa fa-check-square-o"></i> 사이트 관리</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=member&m2=list"><i class="fa fa-user"></i> 회원 관리</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=reserve"><i class="fa fa-calendar"></i> 온라인 예약</a></li>
</ul>

<h1><i class="fa fa-cog fa-spin"></i> 게시판관리</h1>
<ul class='admin_left_menu'>
	<?
	if($group) {
	$SQL = "select name, code from amboard_config where gcode='$group'";
	$result1 = mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result1)) {


	//24시간내에 새글이 올라왔을경우

/*
	$ln_qry = mysql_fetch_array(mysql_query("select wdate, view from amboard_basic where code='$row[code]' order by no desc limit 1", $connect));

	//echo $ln_qry[0];
	if( (mktime()-strtotime($ln_qry[0])) < 24*60*60 && $ln_qry[1]==0) {
		$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
	} else{
		$newimg = "";
	}
*/
		$bcounter = mysql_fetch_array(mysql_query("select count(*) counter from amboard_basic where code='$row[code]' and rdate='' and del_state<>'Y'", $connect));
		$totalcount = $bcounter[counter];

		//echo $ln_qry[0];
		//if((mktime()-strtotime($ln_qry[0])) < 24*60*60) {
		if($totalcount <> 0){
			$newimg = " <img src='./img/new.gif' border='0' align='absmiddle'>";
		}
		else{
			$newimg = "";
		}



	?>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&code=<?=$row[code]?>"><i class="fa fa-pencil-square-o"></i> <?=$row[name]?><?=$newimg?></a></li>
	<?}
	}?>
</ul>