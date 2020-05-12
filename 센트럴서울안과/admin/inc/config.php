<?
@extract($_GET);
@extract($_POST);
/*
[서버정보 셋팅]

* $BDIR		는 게시판이 설치 된 경로이며, $DROOT (시스템루트경로) 다음부터 디랙토리 경로를 입력하시면 됩니다.
  $DROOT	의 경우 특별히 수정 하실필요없이 시스템 루트경로가 입력되게 되어 있습니다.
  $BROOT	는 게시판이 설치된 경로입니다.
  $FROOT	는 FTP용 웹루트 경로 입니다.
  $FIROOT	는 FTP용 게시판루트 경로 입니다.
*/
$AMDIR = "./admin";
$INDIR = ".";
$DROOT = $_SERVER["DOCUMENT_ROOT"];						// 시스템루트경로
$DB_HOST = "d195.mismh.co.kr";					// DB 서버 URL
$DB_USER = "cseyedb";					// DB 계정 아이디
$DB_PW = "cseye1234";						// DB 계정 비밀번호
$DB_NAME = "cseyedb";					// DB 계정 DB 명

function ftp_root($DROOT) {
	$droot_array = explode ("/", $DROOT);
	return $droot_array[count($droot_array)-1];
}

require_once "sys.php";
?>