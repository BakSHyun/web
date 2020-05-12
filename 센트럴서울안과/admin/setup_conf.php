<?
#############################################
// 설치디랙토리 퍼미션
#############################################
$_FTP_DIR_CHMOD = "0755";
$_FTP_FILE_CHMOD = "0644";

$_WEB_DIR_CHMOD = "0747";
$_WEB_FILE_CHMOD = "0747";


#############################################
// WEB 설치시 디랙토리 권한 체크
#############################################
$_DIR_CHECK[] = "admin/inc";
$_DIR_CHECK[] = "admin";
$_DIR_CHECK[] = "mpboard";
$_DIR_CHECK[] = "ammember";
$_DIR_CHECK[] = "ammemo";
$_DIR_CHECK[] = "ampopup";
$_DIR_CHECK[] = "amshop";
$_DIR_CHECK[] = "amdiary";
$_DIR_CHECK[] = "ampoll";
$_DIR_CHECK[] = "ambanner";
$_DIR_CHECK[] = "mpreserve"; // MEDIPIX 예약부분 추가 (08.05.08)

// 디랙토리 권한체크 함수
function chmodCheck($checkdirname) {
	if(is_dir($_SERVER["DOCUMENT_ROOT"]."/".$checkdirname)) {
		if(!is_writable($_SERVER["DOCUMENT_ROOT"]."/".$checkdirname)) {
			$direrror_message = "<b>$checkdirname</b> 디렉토리의 쓰기 권한설정을 <font color='blue'><b>777</b></font>로 변경하시기 바랍니다.<br>";
		}
	}
	return $direrror_message;
}

// 에러 메세지 출력 함수
function errormsgprint($msg) {
	$buffer = fileread("errormsg.html");
	$buffer = str_replace("{MSG}", $msg, $buffer);
	echo $buffer;
}

?>