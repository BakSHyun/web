
<?
// 게시물 쓰기,수정 객체 생성
$bwriteobj = new amboardWrite($connect);
$bwriteobj->addpara = $addpara;			// 추가적으로 파라메타가 필요한 경우
$bwriteobj->init();

$AUTH = $bwriteobj->getAuth(); // MEDIPIX 문의사항방식의 조건을 위해 위로 이동 (08.05.19)

// 문의사항 게시판일 경우 쓰기 페이지를 바로 이동하게 링크를 잡을수 있으므로 스팸등록 방지 세션을 생성해 준다.
if($bwriteobj->config[kind] == "inquire" && !$AUTH[manage]) {	//메디픽스 메디픽스 관리자추가로 인한 조건문 변경 추가 (08.05.07)
	$_SESSION[write_check] = "ok";	// 스팸등록 방지 채크 세션
}

// 게시물의 회원정보를 찾기위해 회원객체를 생성한다.
$memberobj = new ammemberRegister($connect);
$memberobj->init();

$LINK[slist] = $bwriteobj->slistLink;
$LINK[addpara] = $bwriteobj->addpara;
$CALIST = $bwriteobj->getCategoryData();			// 카테고리데이타
$CATE_STATE = $bwriteobj->config[category];			// 카테고리 사용,미사용
$FILE_STATE = $bwriteobj->config[upload_state];		// 파일업로드 사용여부
$FILE_NUM = $bwriteobj->config[upload_num];			// 파일업로드 갯수
$FILE_ADD = $bwriteobj->config[upload_add];			// 파일업로드 갯수
$CONFIG = $bwriteobj->config;						// 게시판 환경설정 데이타
$ADDFIELD = $bwriteobj->getAddField();				// 추가입력 필드 정보를 불러온다.
$MEMINFO = $memberobj->getData($_SESSION[userid]);		// 게시물 작성자의 회원정보를 불러온다.
$SELSKIN = $bwriteobj->config[skin];
$SECRET_TYPE = $bwriteobj->config[secret_type];		//메디픽스 공개/비공개설정 추가 (08.04.21)
$SMS_USE = $bwriteobj->config[sms_use];		//메디픽스 sms발송여부 추가 -pooh (08.05.15)
$date_edit = $bwriteobj->config[date_edit];		//메디픽스 날짜,조회수 수정 여부 추가 (08.12.05)

$COMM_STATE = $bwriteobj->config[comment];	// 코멘트 사용여부

//echo "상태:".$COMM_STATE;

/* MEDIPIX 분류 설정 (08.05.09) */
$CATE_NUM = $bwriteobj->config[cate_num];
$CATE1_NAME = $bwriteobj->config[cate1_name];
$CATE1_ITEM = explode("|",$bwriteobj->config[cate1_item]);
$CATE2_NAME = $bwriteobj->config[cate2_name];
$CATE2_ITEM = explode("|",$bwriteobj->config[cate2_item]);
$CATE3_NAME = $bwriteobj->config[cate3_name];
$CATE3_ITEM = explode("|",$bwriteobj->config[cate3_item]);
/* MEDIPIX 분류 설정 (08.05.09) */

$EDITMODE = $bwriteobj->config[editmode];

global $skinmode;
if($skinmode == "mobile") {
	if($code == "web_z_img"){
		$EDITMODE == "webedit";
	}else{
		$EDITMODE = "";
	}

}


if($EDITMODE == "webedit") {
	$editpicup = $bwriteobj->config[editpicup];
	$editpicmanage = $bwriteobj->config[editpicmanage];

	if($editpicmanage=="yes") {		// 에디터에서 이미지관리를 사용할경우
		if($_SESSION['userid']) $amimage_use = "yes";							// AMIMAGE 관리 사용여부 (회원로그인시에만 사용가능)
		else $amimage_use = "no";
	} else {
		$amimage_use = "no";
	}
	if($editpicup=="yes") {		// 에디터에서 일반 이미지 업로드 사용할경우
		$image_use = "yes";
	} else {
		$image_use = "no";
	}
?>
	<script language="Javascript" src="/webnote/webnote.js"></script>
<?
}



if($abmode == "write") {

	if(!$AUTH[write]) {
		msg("글쓰기 권한이 없습니다.");
		gourl("../member/login.php?return_url=" . $PHP_SELF);
		exit;
	}

		//네이버 로그인 인지 체크
	if($_SESSION['gcode'] == 'social_secret'){
		$BDATA[name] = $_SESSION['username'];
		$BDATA[email] = $_SESSION['useremail'];
		$emailArray = explode("@", $_SESSION['useremail']);
			$BDATA[email1] = $emailArray[0];
			$BDATA[email2] = $emailArray[1];
		$BDATA[email] = $_SESSION['useremail'];
	}else{
		if($_SESSION[userid]) {
			if($MEMINFO[nicname]) $BDATA[name] = $MEMINFO[nicname];
			else $BDATA[name] = $MEMINFO[name];

			$BDATA[email] = $MEMINFO[email];
		}
	}
	$BDATA[cate1] = $cate1;
	$BDATA[vstate] = $bwriteobj->config[vstate];
	$KIND_MODE = $bwriteobj->config[kind];
	$abmodef = "writedb";
}

if($abmode == "modify") {

	if(!$AUTH[write]) {
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
	if($code != "watch") {
		if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
			echo "
			<br><br><br><br>
			<center>
			올바른 접속이 아닙니다.
			</center>
			";
			exit;
		}
	}

	$KIND_MODE = $bwriteobj->config[kind]; // MEDIPIX 수정모드시도 게시판 분류 추가 (08.05.02)
	$abmodef = "modifydb";
	$BDATA = $bwriteobj->getWiteData();
	$FLIST = $bwriteobj->getFileData($no);	// 파일 정보
	$ADDFIELDVALUE = $bwriteobj->getAddFieldValue($no);


	// 웹에디터 모드에서 이전 html 방식을 사용하지 않은 데이타 이면 본문내용을 HTML 방식으로 변환한다.
	if($BDATA[html] == 0 && $EDITMODE == "webedit") {
		$BDATA[contents]=ereg_replace(" ","&nbsp;",$BDATA[contents]);
		$BDATA[contents]=nl2br($BDATA[contents]);
	}
}

if($abmode == "reply") {

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

	if(!$AUTH[rewrite]) {
		msgback("답글쓰기 권한이 없습니다.");
		exit;
	}

	$abmodef = "replydb";
	$BDATA = $bwriteobj->getWiteData();
	$BDATA[contents] = $BDATA[contents]."\n\n================== [답변글] ======================\n\n";
	$BDATA[name] = $_SESSION[username];
	$BDATA[email] = $MEMINFO[email];
	$BDATA[passwd] = "";
	$BDATA[htmlchecked] = "";
	$BDATA[secretchecked] = "";
	$BDATA[category] = "";

}

if($_SESSION[userid]) {
	$LOGIN_USER = $bwriteobj->getLoninInfo();
}

$bwriteobj->assign("category");
$bwriteobj->assign("LINK");
$bwriteobj->assign("KIND_MODE");
$bwriteobj->assign("BDATA");
$bwriteobj->assign("CALIST");
$bwriteobj->assign("FLIST");
$bwriteobj->assign("abmodef");
$bwriteobj->assign("CATE_STATE");
$bwriteobj->assign("FILE_STATE");
$bwriteobj->assign("FILE_NUM");
$bwriteobj->assign("FILE_ADD");
$bwriteobj->assign("LOGIN_USER");
$bwriteobj->assign("VMODE_STATE");
$bwriteobj->assign("AUTH");
$bwriteobj->assign("ADDFIELD");
$bwriteobj->assign("ADDFIELDVALUE");
$bwriteobj->assign("MEMINFO");
$bwriteobj->assign("CONFIG");
$bwriteobj->assign("SECRET_TYPE");		//메디픽스 공개/비공개설정 추가 (08.04.21)
$bwriteobj->assign("SMS_USE");			//메디픽스 sms발송여부 추가 -pooh (08.05.15)
/* MEDIPIX 분류 설정 (08.05.09) */
$bwriteobj->assign("CATE_NUM");
$bwriteobj->assign("CATE1_NAME");
$bwriteobj->assign("CATE1_ITEM");
$bwriteobj->assign("CATE2_NAME");
$bwriteobj->assign("CATE2_ITEM");
$bwriteobj->assign("CATE3_NAME");
$bwriteobj->assign("CATE3_ITEM");
/* MEDIPIX 분류 설정 (08.05.09) */
$bwriteobj->assign("date_edit");	//날짜와 조회수와 변경체크 추가 (08.12.05)

/*
$bwriteobj->assign("COMM_STATE");

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

$bwriteobj->assign("bcommentobj");
*/
$bwriteobj->getHead();
$bwriteobj->bprint();
$bwriteobj->getBottom();

if($EDITMODE == "webedit") {
?>
	<script>
	document.wform.html.checked=true;
	</script>
	<?
}
?>
