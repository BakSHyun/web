<?
/*//////////////////////////////////////////////////////////////////////////////////////////////

[시스템파일 인크루드]
 : 아래의 파일들은 수정하면 않되니다.
   주로 게시판에서 사용되는 library 들을 삽입하는 부분이며, 수정시 치명적인 오류를 발생할수 있습니다.

//////////////////////////////////////////////////////////////////////////////////////////////*/

require_once $BROOT."/library/class.amboard.php";
require_once $BROOT."/library/class.amboard_list.php";
require_once $BROOT."/library/class.amboard_view.php";
require_once $BROOT."/library/class.amboard_write.php";
require_once $BROOT."/library/class.amboard_comment.php";
require_once $BROOT."/library/class.amboard_point.php";
require_once $BROOT."/library/class.amboard_passwd.php";
require_once $BROOT."/library/class.amboard_breport.php";
require_once $BROOT."/library/class.amboard_slist.php";
require_once $BROOT."/library/class.amboard_diary.php";

/*//////////////////////////////////////////////////////////////////////////////////////////////

[글로벌 변수선언]
 : 아래의 변수들은 수정하면 않되니다.
   주로 게시판에서 사용되는 글로벌 변수들을 선언해 놓은 것입니다.

//////////////////////////////////////////////////////////////////////////////////////////////*/

global $g_connect;						// 회원 정보 배열함수
global $g_member;						// 회원 정보 배열함수
global $g_board;						// 게시판 정보 배열함수


?>