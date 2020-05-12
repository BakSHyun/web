<?
require_once "../../admin/inc/config.php";
require_once "../../admin/inc/sys.php";

$_SESSION['userid'] = "";
$_SESSION['username'] = "";
$_SESSION['userlevel'] = "";

//msg ("로그아웃 되었습니다.감사합니다.");
gourl("/m/");
?>