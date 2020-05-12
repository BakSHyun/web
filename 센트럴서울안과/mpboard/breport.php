<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $_SERVER[DOCUMENT_ROOT]."/mpboard/inc/sys.php";

// 게시물 쓰기,수정 객체 생성
$breporteobj = new amboardBreport($connect);
$breporteobj->init();


if($_SESSION[userid]) {
	$LOGIN_USER = $breporteobj->getLoninInfo();
}

if($abmode == "write") {
	
	$BDATA = $breporteobj->getData($bno);
	$BDATA[ruserid] = $_SESSION[userid];
	$BDATA[rusername] = $_SESSION[username];

}

if($abmode == "modify") {
	
	if($_SESSION[userlevel] != 1) {
		msgback("글쓰기 권한이 없습니다.","-2");
		exit;
	}
	
	// GET 방식 접근을 막는다.
	if ($REQUEST_METHOD!="POST") {
		echo "
		<br><br><br><br>
		<center>
		올바른 접속이 아닙니다.
		</center>
		";
		exit;
	}
	
	// 다른 호스트에서의 접근을 막는다.
	if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
		echo "
		<br><br><br><br>
		<center>
		올바른 접속이 아닙니다.
		</center>
		";
		exit;
	}

	$BDATA = $breporteobj->getData($bno);
	$BDATA[ruserid] = $BDATA[rid];
	$BDATA[rusername] = $BDATA[rname];
}


$breporteobj->assign("BDATA");
$breporteobj->assign("LOGIN_USER");
$breporteobj->assign("MEMINFO");


$breporteobj->bprint();
?>