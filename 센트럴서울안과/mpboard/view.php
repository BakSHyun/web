<?
$_SESSION[write_check] = "ok";	// 스팸등록 방지 채크 세션

#############################################################
# 게시물 보기 객체 생성
#############################################################
$bviewobj = new amboardView($connect);
$bviewobj->addpara = $addpara;			// 추가적으로 파라메타가 필요한 경우
$bviewobj->tdclass = "type2";
$bviewobj->init();

$AUTH = $bviewobj->getAuth();

if(!$AUTH[view]) {
	msg("의료법상 로그인 후 사진및상담 열람이 가능합니다.\\n 본원은 의료법을 준수합니다.\\n컨텐츠 이용을 위해 로그인을 하여 주십시요.");

	gourl("../member/login.php?return_url=" . $PHP_SELF);
	exit;
}


// 게시물의 회원정보를 찾기위해 회원객체를 생성한다.
$memberobj = new ammemberRegister($connect);
$memberobj->init();

$LINK[slist] = $bviewobj->slistLink;
$LINK[modify] = $bviewobj->modifyLink;
$LINK[reply] = $bviewobj->replyLink;
$LINK[delete] = $bviewobj->deleteLink;
$LINK[addpara] = $bviewobj->addpara;

$BDATA = $bviewobj->getViewData($no);		// 게시물 뷰

if($BDATA[homepage]) {
	$BDATA[homepage] = str_replace("http://", "", $BDATA[homepage]);
	$BDATA[homepage] = str_replace("https://", "", $BDATA[homepage]);

	$BDATA[homepage] = "http://".$BDATA[homepage];
}
$NEXTDATA = $bviewobj->next($no,2);			// 다음 게시물
$PREDATA = $bviewobj->pre($no,2);			// 이전 게시물
$FLIST = $bviewobj->getFileData($no);		// 파일 정보
$COMM_STATE = $bviewobj->config[comment];	// 코멘트 사용여부
$POINT_STATE = $bviewobj->config[point];	// 포인트 사용여부
$IMG_STATE = $bviewobj->config[img_view];	// 이미지 뷰여부
$AUTH = $bviewobj->getAuth();
$BSUMINFO = $bviewobj->getUserPoint($BDATA[userid]);
$ADDFIELD = $bviewobj->getAddField();				// 추가입력 필드 정보를 불러온다.
$ADDFIELDVALUE = $bviewobj->getAddFieldValue($no);
$MEMINFO = $memberobj->getData($BDATA[userid]);		// 게시물 작성자의 회원정보를 불러온다.
$SELSKIN = $bviewobj->config[skin];
$DOWNLOAD_STATE = $bviewobj->config[download_state];	//	MEDIPIX 파일다운로드 사용여부 추가 (08.04.21)
$KIND_MODE = $bviewobj->config[kind]; // MEDIPIX view 에도 게시판 형식 사용 (08.05.02)

// 메디픽스 리스트 항목 추가 (14.02.17)
$VIEW_WRITER = $bviewobj->config[list_writer];
$VIEW_DATE = $bviewobj->config[list_date];
$VIEW_HIT = $bviewobj->config[list_hit];




// 등록자에게 회원 포인트 적립
if(($bviewobj->config[mem_point_vstate]=="1" || $bviewobj->config[mem_point_vstate]=="3") && $BDATA[userid] && $BDATA[userid]!=$_SESSION[userid]) {
	$memberobj->pointUpdate("point",$bviewobj->config[mem_viewpoint],$BDATA[userid]);
}
// 등록자에게 회원 캐쉬 적립
if(($bviewobj->config[mem_cpoint_vstate]=="1" || $bviewobj->config[mem_cpoint_vstate]=="3") && $BDATA[userid] && $BDATA[userid]!=$_SESSION[userid]) {
	$memberobj->pointUpdate("cpoint",$bviewobj->config[mem_viewpoint],$BDATA[userid]);
}

// 실행자에게 회원 포인트 적립
if(($bviewobj->config[mem_point_vstate]=="2" || $bviewobj->config[mem_point_vstate]=="3") && $_SESSION[userid]) {
	$memberobj->pointUpdate("point",$bviewobj->config[mem_viewpoint],$_SESSION[userid]);
}
// 실행자에게 회원 캐쉬 적립
if(($bviewobj->config[mem_cpoint_vstate]=="2" || $bviewobj->config[mem_cpoint_vstate]=="3") && $_SESSION[userid]) {
	$memberobj->pointUpdate("cpoint",$bviewobj->config[mem_viewpoint],$_SESSION[userid]);
}

$VMODE_LINK[0] = "$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category1&abmode=vstateupdate&$bviewobj->searchpara&bsort=$bsort&bfsort=$bfsort&$bviewobj->addpara&no=$no&vstate=0";
$VMODE_LINK[1] = "$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category1&abmode=vstateupdate&$bviewobj->searchpara&bsort=$bsort&bfsort=$bfsort&$bviewobj->addpara&no=$no&vstate=1";
#############################################################

$bviewobj->assign("LINK");
$bviewobj->assign("KIND_MODE"); // MEDIPIX view 에도 게시판 형식 사용 (08.05.02)
$bviewobj->assign("BDATA");
$bviewobj->assign("NEXTDATA");
$bviewobj->assign("PREDATA");
$bviewobj->assign("FLIST");
$bviewobj->assign("IMG_STATE");
$bviewobj->assign("COMM_NUM");
$bviewobj->assign("AUTH");
$bviewobj->assign("BSUMINFO");
$bviewobj->assign("ADDFIELD");
$bviewobj->assign("ADDFIELDVALUE");
$bviewobj->assign("MEMINFO");
$bviewobj->assign("VMODE_LINK");
$bviewobj->assign("category");
$bviewobj->assign("PHP_SELF");
$bviewobj->assign("DOWNLOAD_STATE");	//	MEDIPIX 파일다운로드 사용여부 추가 (08.04.21)

#############################################################
# 코멘트 객체생성
#############################################################
$bcommentobj = new amboardComment($connect);
//$bcommentobj->addpara = "bsort=$bsort&bfsort=$bfsort";			// 추가적으로 파라메타가 필요한 경우
$bcommentobj->tdclass = "type2";
$bcommentobj->init();

$LINK[addpara] = $bcommentobj->addpara;

$CLIST = $bcommentobj->getListData();		// 코멘트 리스트
$CMDATA = $bcommentobj->getCommentData();	// 코멘트 데이타
if($_SESSION[userid]) {
	$LOGIN_USER = $bcommentobj->getLoninInfo();
	if($LOGIN_USER[nicname]) $LOGIN_USER[name] = $LOGIN_USER[nicname];
}
#############################################################

$bcommentobj->assign("LINK");
$bcommentobj->assign("CLIST");
$bcommentobj->assign("CMDATA");
$bcommentobj->assign("AUTH");
$bcommentobj->assign("LOGIN_USER");


#############################################################
# 포인트 객체생성
#############################################################
$bpointobj = new amboardPoint($connect);
//$bpointobj->addpara = "bsort=$bsort&bfsort=$bfsort";			// 추가적으로 파라메타가 필요한 경우
$bpointobj->init();

$POINT_INT = $bpointobj->getPoint();

$bpointobj->assign("POINT_INT");
$LINK[addpara] = $bpointobj->addpara;

#############################################################


$bviewobj->assign("LINK");
$bviewobj->assign("COMM_STATE");
$bviewobj->assign("POINT_STATE");
$bviewobj->assign("bcommentobj");
$bviewobj->assign("bpointobj");

$bviewobj->getHead();

$passwdobj = new amboardPasswd($connect);
$passwdobj->init();
$passwdcheck = $passwdobj->passwdCheck($secret,"board",$_SESSION[userid]);

// 비밀글일경우 비밀번호 체크폼 출력조건 처리...
// 로그인 회원이 관리자/운영자가 아닐경우와  글쓴회원이 로그인한 회원과 다를경우, 글쓴이가 비회원로 글을 오렸을 경우에 비밀번호 입력 폼이 보여진다.
//echo $secret;
/*
echo "secret:".$BDATA[secret];
echo "<br />";
echo "passwd:".$BDATA[passwd];
echo "<br />";
echo "manage:".$BDATA[manage];
echo "<br />";
echo "userid:".$BDATA[userid];
echo "<br />";
echo "passwdcheck:".$passwdcheck;
echo "<br />";
echo "_SESSION[id]:".$_SESSION[userid];
echo "<br />";
*/

if($BDATA[secret]==1 && $secret!=$BDATA[passwd] && !$AUTH[manage] && ($_SESSION[userid]!=$BDATA[userid] || $BDATA[userid]=="") && $passwdcheck==false) {

$bviewobj->pwprint();
//msg ('1');
?>
<script>board_pass_view('boardsecretpasswd');</script>
<?
} else {
	$bviewobj->bprint();
//	msg ('2');



}

$bviewobj->getBottom();


$viewcount_cookie_data = $group."_".$code."_".$no;
?>
<script>
	expires = 3600 * 24; // 하루
	setCookie("viewcount_cookie", "<?=$viewcount_cookie_data?>", expires );
</script>
<?
if(!$no_new){
	include "list.php";
}
?>