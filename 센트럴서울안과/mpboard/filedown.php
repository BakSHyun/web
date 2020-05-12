<?
require_once "../admin/inc/config.php";


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



$amobj = new am($connect);
$gtable = $amobj->getGroupTable($group,$code);	// 그룹코드로 그룹테이블을 불러온다.

$upload = "/$INDIR/mpboard/upload/";

// 파일다운로드
$fileobj = new fileManager($connect,"amboard_".$gtable."_file",$upload);
$fileobj->filedown($no);

// 다운로드 총수를 게시물에 업데이트 한다.
$SQL="select sum(count) tcount from amboard_".$gtable."_file where fno='".$fno."'";
$result=mysql_query($SQL,$connect);
$row=mysql_fetch_array($result);

$SQL="update amboard_".$gtable." set download = '".$row[tcount]."' where no='".$fno."'";
mysql_query($SQL,$connect);


require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpboard/inc/sys.php";

// 게시물의 회원정보를 찾기위해 회원객체를 생성한다.
$memberobj = new ammemberRegister($connect);
$memberobj->init();
// 게시물 보기 객체 생성
$bviewobj = new amboardView($connect);
$bviewobj->init();

$BDATA = $bviewobj->getViewData($fno);

// 등록자에게 회원 포인트 적립
if(($bviewobj->config[mem_point_dstate]=="1" || $bviewobj->config[mem_point_dstate]=="3") && $BDATA[userid] && $BDATA[userid]!=$_SESSION[userid]) {
	$memberobj->pointUpdate("point",$bviewobj->config[mem_downpoint],$BDATA[userid]);
}
// 등록자에게 회원 캐쉬 적립
if(($bviewobj->config[mem_cpoint_dstate]=="1" || $bviewobj->config[mem_cpoint_dstate]=="3") && $BDATA[userid] && $BDATA[userid]!=$_SESSION[userid]) {
	$memberobj->pointUpdate("cpoint",$bviewobj->config[mem_downpoint],$BDATA[userid]);
}

// 실행자에게 회원 포인트 적립
if(($bviewobj->config[mem_point_dstate]=="2" || $bviewobj->config[mem_point_dstate]=="3") && $_SESSION[userid]) {
	$memberobj->pointUpdate("point",$bviewobj->config[mem_downpoint],$_SESSION[userid]);
}
// 실행자에게 회원 캐쉬 적립
if(($bviewobj->config[mem_cpoint_dstate]=="2" || $bviewobj->config[mem_cpoint_dstate]=="3") && $_SESSION[userid]) {
	$memberobj->pointUpdate("cpoint",$bviewobj->config[mem_downpoint],$_SESSION[userid]);
}

?>