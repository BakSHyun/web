<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

if($_SESSION['userid'] && $_SESSION['userlevel']) {
	if($_SESSION['userlevel'] > "1") {	//MEDIPIX	 관리자 로그인은 최고관리자와 메디픽스 관리자로 하기위하여 != 에서 >  로 변경	(08.04.15)
		msg("이곳은 최고관리자 영역입니다.\\n일반회원은 접근하실수 없습니다.");
		gourl("/");
		exit;
	}
} else {
	msg("이곳은 최고관리자 영역입니다.\관리자로 로그인후 이용하세요");
	gourl("/".$AMDIR."/login.php");
	exit;
}

if(!$group) {
	$SQL = "select * from amsolution_group where 1 order by no asc";
	$result = mysql_query($SQL,$connect);
	if($row=mysql_fetch_array($result)) {
		$group = $row[gcode];
	}
}

$sql = mysql_query("select name from ammember where id = '".$_SESSION['userid']."'");
$mrow = mysql_fetch_array($sql);


?>