<?
require_once "../admin/inc/config.php";
//require_once $_SERVER[DOCUMENT_ROOT]."/mpboard/inc/sys.php";

/*
// 현재 호스트에서 호출한것인지 채크한다.
$home = "(http://$HTTP_HOST)"; 

if (!eregi($home,$HTTP_REFERER)) 
{
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}
*/


$amobj = new am($connect);
$gtable = $amobj->getGroupTable($group,$code);	// 그룹코드로 그룹테이블을 불러온다.

$upload = "/$INDIR/mpboard/upload/";

$fileobj = new fileManager($connect,"amboard_".$gtable."_file",$upload);
$fileobj->imgview($no,$mode);

?>