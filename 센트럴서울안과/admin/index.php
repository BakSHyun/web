<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once "inc/config.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";
?>
<!DOCTYPE html>
<html lang='ko'>
<head>
<meta name="Robots" content="noindex,nofollow,noimageindex,noarchive">
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta charset='utf-8'/>
<title>::::::::: 관리자 모드 :::::::::</title>

<script language="JavaScript" SRC="/admin/js/jquery-1.9.1.min.js"></script>
<script language="JavaScript" SRC="/admin/js/jquery-ui.min.js"></script>
<script language="JavaScript" SRC="/admin/js/jquery.easing.1.3.min.js"></script>
<script language="JavaScript" SRC="/admin/js/common.js"></script>
<script language="JavaScript" SRC="/amlibrary/script/window.js"></script>
<script language="JavaScript" SRC="/amlibrary/script/document.js"></script>
<script language="JavaScript" SRC="/amlibrary/script/cookie.js"></script>
<link href="/admin/css/common.css" rel="stylesheet" type="text/css">
<link href="/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/admin/css/admin.css" rel="stylesheet" type="text/css">

<link href="/admin/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="/admin/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css">
<link href="/admin/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<iframe name="smsFrame" src="/<?=$AMDIR?>/smsResult.html" width="0" height="0" style="display:none"></iframe>
<iframe name="lmsFrame" src="/<?=$AMDIR?>/lmsResult.html" width="0" height="0" style="display:none"></iframe>
<iframe name="mmsFrame" src="/<?=$AMDIR?>/mmsResult.html" width="0" height="0" style="display:none"></iframe>
<? //include "../$AMDIR/sms_check.php"; ?>
<ul id='head_wrap'>
	<li class='head_title'><img src='./img/comm/hlogo_icon.png' alt='로고 아이콘'> <a href='/admin/'><strong>관리자</strong> 모드</a></li>
	<li class='log_out'><a href="/<?=$INDIR?>/<?=$MDIR?>/logout_session.php?return_url=/<?=$AMDIR?>/login.php">로그아웃</a></li>
	<li>
		<ol class='site_link'>
			<li>
				<form name="smsForm" style="margin=0">잔여량 :
					SMS <input type="text" name="smsResult">LMS <input type="text" name="lmsResult">MMS <input type="text" name="mmsResult">
				</form>
			</li>
			<li class='bar'> | </li>
			<li><a href='/'>사이트 메인으로 이동</a></li>
			<li class='bar'> | </li>
			<li class='as'><a href='http://www.medipix.co.kr/as'><strong>AS</strong> 사이트 이동</a></li>
			<li class='bar'> | </li>
			<li><strong><?=$mrow[0]?></strong> 님 환영합니다</li>
		</ol>
	</li>
</ul>
<ul id='head_navi'>
	<li class='menu'><i class="fa fa-bars"></i></li>
    <?if($_SESSION['userlevel'] < "1") {?>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=board'><img src='./img/comm/logo_icon.png' alt='로고 아이콘'> 메디픽스 전용</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=statistics'><i class="fa fa-line-chart"></i> 통계</a></li>
	<?}?>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=dashboard'><i class="fa fa-tachometer"></i> 대시보드</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=crm&m2=crm_list'><i class="fa fa-database"></i> CRM 관리</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=reserve'><i class="fa fa-calendar"></i> 예 약</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=member'><i class="fa fa-user"></i> 회 원</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=popup&aspmode=popupmain&pmode=layer'><i class="fa fa-comment-o"></i> 팝 업</a></li>
	<?if($_SESSION['userlevel'] < "1") {?>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=keyword'><i class="fa fa-keyboard-o"></i> 검색/메타태그</a></li>
	<?}?>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=sms'><i class="fa fa-envelope-o"></i> SMS 발송/내역</a></li>

	<!--<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=banner'>배 너</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=poll'>투 표</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=mail'>메 일</a></li>
	<li><a href='<?$PHP_SELF?>?group=<?=$group?>&m1=crm'>CRM</a></li>-->
</ul>

<div id='admin_cont_wrap'>
	<div id='admin_cont_left'>
		<?
		switch ($m1) {

			case "dashboard" :
				include "../_util/dashboard_admin/menu.php";
			break;

			case "statistics" :
				include "../_util/statistic_admin/menu.php";
			break;

			case "crm" :
				include "../_util/crm_admin/menu.php";
			break;

			case "keyword" :
				include "../_util/keyword_admin/menu.php";
			break;



			case "board" :
				include "../mpboard/admin/menu.php";
			break;

			case "member" :
				include "../ammember/admin/menu.php";
			break;

			case "popup" :
				include "../ampopup/admin/menu.php";
			break;

			case "banner" :
				include "../ambanner/admin/menu.php";
			break;

			case "poll" :
				include "../ampoll/admin/menu.php";
			break;

			case "shop" :
				include "../amshop/admin/menu.php";
			break;

			case "club" :
				include "../amclub/admin/menu.php";
			break;

			case "grouplist" :
				include "../admin/admin/menu.php";
			break;

			case "groupmodify" :
				include "../admin/admin/menu.php";
			break;

			case "creategroup" :
				include "../admin/admin/menu.php";
			break;

			case "reserve" :
				include "../mpreserve/admin/menu.php";
			break;

			case "mail" :
				include "../ammail/admin/menu.php";
			break;



			case "metamanage" :
				include "../mpboard/admin/menu.php";
			break;

			case "sms" :
				include "../admin/admin/menu.php";
			break;

			default:
				if($code) include "../_util/dashboard_admin/menu.php";
				else include "../_util/dashboard_admin/menu.php";
			break;
		}
		?>
	</div>
	<div id='admin_cont_right'>
		<?
		switch ($m1) {

			case "dashboard" :
				include "../_util/dashboard_admin/index.php";
			break;

			case "keyword" :
				include "../_util/keyword_admin/index.php";
			break;

			case "crm" :
				include "../_util/crm_admin/index.php";
			break;

			case "statistics" :
				include "../_util/statistic_admin/index.php";
			break;

			case "board" :
				include "../mpboard/admin/index.php";
			break;

			case "member" :
				include "../ammember/admin/index.php";
			break;

			case "popup" :
				include "../ampopup/admin/index.php";
			break;

			case "banner" :
				include "../ambanner/admin/index.php";
			break;

			case "poll" :
				include "../ampoll/admin/index.php";
			break;

			case "shop" :
				include "../amshop/admin/index.php";
			break;

			case "club" :
				include "../amclub/admin/index.php";
			break;

			case "grouplist" :
				include "../admin/admin/grouplist.php";
			break;

			case "groupmodify" :
				include "../admin/admin/groupcreate.php";
			break;

			case "creategroup" :
				include "../admin/admin/groupcreate.php";
			break;

			case "creategroupdb" :
				include "../admin/admin/groupcreate_db.php";
			break;

			case "groupdelete" :
				include "../admin/admin/groupcreate_db.php";
			break;

			case "sitemanage" :
				include "../admin/admin/sitemanage.php";
			break;

			case "sitemanage_ok" :
				include "../admin/admin/sitemanage_ok.php";
			break;

			case "metamanage" :
				include "../admin/admin/metamanage.php";
			break;

			case "metamanage_ok" :
				include "../admin/admin/metamanage_ok.php";
			break;

			case "updateinfoview" :
				include "../admin/admin/updateinfoview.php";
			break;

			case "reserve" :
				include "../mpreserve/admin/index.php";
			break;

			case "mail" :
				include "../ammail/admin/index.php";
			break;

			case "sms" :
				include "../admin/admin/smsreportmenu.php";
			break;

			default:
				if($code) include "../_util/dashboard_admin/index.php";
				else include "../_util/dashboard_admin/index.php";
			break;
		}
		?>
	</div>
</div>

<div id='foot_wrap'>
	<p>Copyright &#169; <a href='http://medipix.co.kr/'>MEDIPIX</a> <img src='./img/comm/logo_icon.png' alt='로고 아이콘'> All Rights Reserved.<p>
</div>

</body>
</html>