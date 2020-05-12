<h1><i class="fa fa-cogs"></i> 예약설정</h1>
<ul class='admin_left_menu'>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=reserve&m2=reslist"><i class="fa fa-bars"></i> 예약 리스트</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=reserve&m2=resconfiglist"><i class="fa fa-cog"></i> 지점 설정</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=reserve&m2=resclosetime"><i class="fa fa-cog"></i> 휴진 설정</a></li>
</ul>
<?if($_SESSION['userlevel'] < "1") {?>
<h1><i class="fa fa-sign-in"></i> 소스삽입</h1>
<ul class='admin_left_menu'>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=reserve&m2=reserve_source"><i class="fa fa-puzzle-piece"></i> 삽입 소스</a></li>
</ul>
<?}?>