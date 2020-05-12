<?
@session_start();
$BDIR = "mpboard";						// 게시판이 설치된 디랙토리
$BROOT = $DROOT."/".$INDIR."/".$BDIR;				// 게시판설치경로

$RDIR = "mpreserve";						// 예약 설치된 디랙토리
$RROOT = $DROOT."/".$INDIR."/".$RDIR;				// 예약설치경로

$CDIR = "mpcrm";						// 예약 설치된 디랙토리
$CROOT = $DROOT."/".$INDIR."/".$CDIR;				// 예약설치경로

$MDIR = "ammember";						// 회원관리 설치된 디랙토리
$MROOT = $DROOT."/".$INDIR."/".$MDIR;				// 회원관리 설치경로

$LDIR = "amlog";						// 로그분석 설치된 디랙토리
$LROOT = $DROOT."/".$INDIR."/".$LDIR;				// 로그분석 설치경로

$PDIR = "ampopup";						// 로그분석 설치된 디랙토리
$PROOT = $DROOT."/".$INDIR."/".$PDIR;				// 로그분석 설치경로

$NDIR = "ambanner";						// 로그분석 설치된 디랙토리
$NROOT = $DROOT."/".$INDIR."/".$NDIR;				// 로그분석 설치경로

$ODIR = "ampoll";						// 로그분석 설치된 디랙토리
$OROOT = $DROOT."/".$INDIR."/".$ODIR;				// 로그분석 설치경로

$MODIR	= "ammemo";
$MOROOT = $DROOT."/".$INDIR."/".$MODIR;				// 로그분석 설치경로

$AMLIB = $INDIR."/amlibrary";

@session_save_path($MROOT."/user_session/");



require_once $DROOT."/".$AMDIR."/inc/dbcon.php";
require_once $DROOT."/".$AMDIR."/library/class.am.php";
require_once $DROOT."/".$AMLIB."/class/class.dbutil.php";
require_once $DROOT."/".$AMLIB."/class/class.kftp.php";
require_once $DROOT."/".$AMLIB."/class/class.filetool.php";
require_once $DROOT."/".$AMLIB."/class/class.filemanager.php";
require_once $DROOT."/".$AMLIB."/class/class.pageing.php";
require_once $DROOT."/".$AMLIB."/class/class.stringsize.php";
require_once $DROOT."/".$AMLIB."/class/class.mailtool.php";
require_once $DROOT."/".$AMLIB."/class/class.skincompile.php";
require_once $DROOT."/".$AMLIB."/class/class.rss.php";
require_once $DROOT."/".$AMLIB."/class/class.mysqldb.php";
require_once $DROOT."/".$AMLIB."/class/class.log.php";
require_once $DROOT."/".$AMLIB."/function/function.file.php";
require_once $DROOT."/".$AMLIB."/function/function.data.php";
require_once $DROOT."/".$AMLIB."/function/function.util.php";

$adm_sql=mysql_fetch_array(mysql_query("select * from admin_config"));

?>