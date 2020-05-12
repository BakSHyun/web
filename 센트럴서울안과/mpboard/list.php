<?
$_SESSION[write_check] = "ok";	// 스팸등록 방지 채크 세션

// 게시판리스트 객체 생성
$bobj = new amboardList($connect);
$bobj->tdclass = "type2";

/* 초기 추가설정 사항 시작 */
//$bobj->debug = true;
$bobj->addpara = $addpara;			// 추가적으로 파라메타가 필요한 경우
/* 초기 추가설정 사항 끝 */

/* MEDIPIX 분류 설정 (08.05.15) */
$bobj->cate1 = $cate1;
$bobj->cate2 = $cate2;
$bobj->cate3 = $cate3;
/* MEDIPIX 분류 설정 (08.05.15) */

/* 초기 선택설정 사항 시작 */

$bobj->startstr = "<i class='fa fa-angle-double-left'></i>";
$bobj->prestrgroup = "<i class='fa fa-angle-left'></i>";
$bobj->prestr = "";

$bobj->nextstr = "";
$bobj->nextstrgroup = "<i class='fa fa-angle-right'></i>";
$bobj->endstr = "<i class='fa fa-angle-double-right'></i>";

$bobj->pagetmp = "{페이지}";
$bobj->apagetmp = "<li class='curr'><a>{페이지}</a></li>";
$bobj->linkclass = "";

/* 초기 선택설정 사항 끝 */

$bobj->init();		// 게시판 초기설정 적용

// 게시물의 회원정보를 찾기위해 회원객체를 생성한다.
$memberobj = new ammemberRegister($connect);
$memberobj->init();

/* 스킨변수 설정 시작 */
if(!$bsort) $bsort = "desc";
if(!$bfsort) $bfsort = "wdate";

$LIST = $bobj->getListData();				// 리스트데이타
$PAGEING = $bobj->getPageing();				// 페이징
$CALIST = $bobj->getCategoryData();			// 카테고리데이타
$CATE_STATE = $bobj->config[category];
$RSS_STATE = $bobj->config[rssopen];
$POINT_LISTVIEW = $bobj->config[point_listview];
$LIST_FILE_STATE = $bobj->config[upload_listview];
$AUTH = $bobj->getAuth();
$SELSKIN = $bobj->config[skin];
$KIND_MODE = $bobj->config[kind];			// 메디픽스 게시판 기능의 구분 추가 -pooh (08.05.15)

// 메디픽스 리스트 항목 추가 (08.04.16)
$LIST_NO = $bobj->config[list_no];
$LIST_TITLE = $bobj->config[list_title];
$LIST_WRITER = $bobj->config[list_writer];
$LIST_DATE = $bobj->config[list_date];
$LIST_RECOM = $bobj->config[list_recom];
$LIST_HIT = $bobj->config[list_hit];
$LIST_OPEN = $bobj->config[list_open];
$LIST_STAY = $bobj->config[list_stay];
//---------------------------------------------//

/* MEDIPIX 분류 설정 (08.05.15) */
$CATE_NUM = $bobj->config[cate_num];
$CATE1_NAME = $bobj->config[cate1_name];
$CATE1_ITEM = explode("|",$bobj->config[cate1_item]);
$CATE2_NAME = $bobj->config[cate2_name];
$CATE2_ITEM = explode("|",$bobj->config[cate2_item]);
$CATE3_NAME = $bobj->config[cate3_name];
$CATE3_ITEM = explode("|",$bobj->config[cate3_item]);
/* MEDIPIX 분류 설정 (08.05.15) */

$LINK[write] = $bobj->writeLink;
$LINK[deletesel] = $bobj->deleteSelLink;
$LINK[slist] = $bobj->listLink;
$LINK[addpara] = $bobj->addpara;

// 메디픽스 추가 사항 (08.04.24)
// sort를 위해 추가 시킨 사항 --
$LINK[titlesort] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=desc&bfsort=title&".$bobj->addpara;
$LINK[titlesort2] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=asc&bfsort=title&".$bobj->addpara;
$LINK[namesort] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=desc&bfsort=name&".$bobj->addpara;
$LINK[namesort2] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=asc&bfsort=name&".$bobj->addpara;
$LINK[wdatesort] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=desc&bfsort=wdate&".$bobj->addpara;
$LINK[wdatesort2] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=asc&bfsort=wdate&".$bobj->addpara;
$LINK[viewsort2] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=asc&bfsort=view&".$bobj->addpara;
//----------------------------------------------------------------------
$LINK[viewsort] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=desc&bfsort=view&".$bobj->addpara;
$LINK[downsort] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=desc&bfsort=download&".$bobj->addpara;
$LINK[pointsort] = $PHP_SELF."?sno=$sno&group=$group&code=$code&category=$category&abmode=list&bsort=desc&bfsort=point&".$bobj->addpara;
$rsslink = "/mpboard/rss.php?group=$group&code=$code";
/* 스킨변수 설정 끝 */


/* 게시판리스트 객체에 변수등록 시작*/
$bobj->assign("rsslink");
$bobj->assign("PAGEING");
$bobj->assign("LIST");
$bobj->assign("CALIST");
$bobj->assign("LINK");
$bobj->assign("RSS_STATE");
$bobj->assign("CATE_STATE");
$bobj->assign("POINT_LISTVIEW");
$bobj->assign("LIST_FILE_STATE");
$bobj->assign("AUTH");
$bobj->assign("memberobj");


// 메디픽스 리스트 항목 추가 (08.04.16)

$bobj->assign("LIST_NO");
$bobj->assign("LIST_TITLE");
$bobj->assign("LIST_WRITER");
$bobj->assign("LIST_DATE");
$bobj->assign("LIST_RECOM");
$bobj->assign("LIST_HIT");
$bobj->assign("LIST_OPEN");
$bobj->assign("LIST_STAY");
// ======================//
$bobj->assign("KIND_MODE");			// 메디픽스 게시판 기능의 구분 추가 -pooh (08.05.15)

/* MEDIPIX 분류 설정 (08.05.09) */
$bobj->assign("CATE_NUM");
$bobj->assign("CATE1_NAME");
$bobj->assign("CATE1_ITEM");
$bobj->assign("CATE2_NAME");
$bobj->assign("CATE2_ITEM");
$bobj->assign("CATE3_NAME");
$bobj->assign("CATE3_ITEM");
$bobj->assign("cate1");
$bobj->assign("cate2");
$bobj->assign("cate3");
/* MEDIPIX 분류 설정 (08.05.09) */


/* 게시판리스트 객체에 변수등록 끝*/

// 만일 문의사항 게시판이고 관리자가 아니면 글쓰기 페이지로 이동
/* MEDIPIX 문의사항 게시판 방식 변경에 따른 삭제 (08.05.16)
if($bobj->config[kind] == "inquire" && $AUTH[userlevel] != 1) {
	gourl($PHP_SELF."?group=$group&code=$code&category=&$category&abmode=write&$bobj->addpara");
	exit;
}
*/

$bobj->getHead();			// 게시판 상단 출력
$bobj->bprint();			// 게시판 출력
$bobj->getBottom();			// 게시판 하단 출력


?>
