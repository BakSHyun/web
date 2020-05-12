<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $_SERVER[DOCUMENT_ROOT]."/mpboard/inc/sys.php";

// 외부에서의 접근을 막는다.
if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}


// 게시물 쓰기,수정 객체 생성
$breporteobj = new amboardBreport($connect);
$breporteobj->init();

$wdate = date("Y-m-d H:i:s");

$breporteobj->addfield("page",$page);
$breporteobj->addfield("gcode",$group);
$breporteobj->addfield("code",$code);
$breporteobj->addfield("bno",$bno);

$breporteobj->addfield("rname",$rname);
$breporteobj->addfield("rid",$rid);
$breporteobj->addfield("remail",$remail);
$breporteobj->addfield("oname",$oname);
$breporteobj->addfield("oid",$oid);
$breporteobj->addfield("rway",$rway);
$breporteobj->addfield("rcontent",$rcontent);
$breporteobj->addfield("wdate",$wdate);

if($abmode == "write") {
	$breporteobj->write();
	?>
	<script>
	alert("불량자료 신고가 접수되었습니다.\n빠른시일내에 운영진과 협의후 조취를 취하도록 하겠습니다.");
	window.close();
	</script>
	<?
}

if($abmode == "modify") {
	$breporteobj->addfield("recontent",$recontent);
	$breporteobj->addfield("state",$state);
	$breporteobj->modify("no=$no");
	?>
	<script>
	alert("수정되었습니다.");
	opener.reload(true);
	window.close();
	</script>
	<?
}

?>