 <?
// 게시판리스트 객체 생성
$slistobj = new sboardlist($connect);
$slistobj->tdclass = "type2";

/* 초기 추가설정 사항 시작 */
//$bobj->debug = true;
//$bobj->addpara = "bsort=$bsort&bfsort=$bfsort";			// 추가적으로 파라메타가 필요한 경우
/* 초기 추가설정 사항 끝 */

// 최근게시물 기본 설정값 셋팅
if(!$skin) $skin="default";
if(!$line) $line = 3;
if(!$boardurl) $boardurl = "/mpboard/index.php";
if(!$linkclass) $linkclass = "a";

if(!$bsort) $bsort = "desc";
if(!$bfsort) $bfsort = "ino";
if(!$blistsort) $blistsort = 1;

// 정렬 값이 있을 경우 처리
if($bsort) $slistobj->bsort = $bsort;
if($bfsort) $slistobj->bfsort = $bfsort;
if($blistsort) $slistobj->blistsort = $blistsort;
if($mypage) $slistobj->mypage = $mypage;    //08.06.05 mypage를 위한 변수 추가 
if($mp) $slistobj->mp = $mp;           //08.06.05 mypage를 위한 변수 추가 

$slistobj->linkclass = $linkclass;
$LIST = $slistobj->getListData($group,$code,$line,$cutwidth,$cate1,$category);

/* 게시판리스트 객체에 변수등록 시작*/
$slistobj->assign("LIST");
$slistobj->assign("boardurl");
/* 게시판리스트 객체에 변수등록 끝*/

$slistobj->bprint($skin,"newlist.html");			// 게시판 출력
?>