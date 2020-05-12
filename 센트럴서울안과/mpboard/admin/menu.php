<h1><i class="fa fa-users"></i> 그룹선택</h1>
<div class='admin_left_menu1'><?include "./pulldown.php";?></div>

<h1><i class="fa fa-cog fa-spin"></i> 기본 설정</h1>
<ul class='admin_left_menu'>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard&m2=site_mod"><i class="fa fa-check-square-o"></i> 사이트 관리</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=metamanage"><i class="fa fa-tag"></i> 메타테그관리</a></li>
	<!--<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=grouplist"><i class="fa fa-user-plus"></i> 그룹관리</a></li>-->
</ul>

<h1><i class="fa fa-file-text-o"></i> 사이트 기본정보</h1>
<ul class='admin_left_menu'>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=board&m2=list"><i class="fa fa-bars"></i> 게시판 리스트</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=board&m2=configinsert"><i class="fa fa-pencil-square-o"></i> 게시판 생성</a></li>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=board&m2=configfilter"><i class="fa fa-filter"></i> 게시판 필터</a></li>
</ul>

<h1><i class="fa fa-sign-in"></i> 소스삽입</h1>
<ul class='admin_left_menu'>
	<li><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=board&m2=board_source"><i class="fa fa-puzzle-piece"></i> 삽입 소스</a></li>
</ul>

<h1><i class="fa fa-download"></i> 설치관리</h1>
<ul class='admin_left_menu'>
	<li><a href="/<?=$INDIR?>/admin/mysql_dump.php"><i class="fa fa-unlock-alt"></i> 권한변경 *추후</a></li>
	<li><a href="/<?=$INDIR?>/admin/mysql_dump.php"><i class="fa fa-database"></i> DB백업 *추후</a></li>
</ul>