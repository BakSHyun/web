<?

require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpboard/inc/sys.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";

$addpara = "";	// 추가적으로 파라메타가 필요한 경우

// javascript 와 iframe 테그는 사용하지 못하게 한다.
if(is_array($_REQUEST)) {
	reset($_REQUEST);
	while(list($key, $value)=each($_REQUEST)) {
		$$key = $_REQUEST[$key];
		$$key = eregi_replace("<script","&lt;script",$$key);
		$$key = eregi_replace("</script>","&lt;/script&gt;",$$key);

		if($code == "community03"){
			$$key;
		}else{
			$$key = eregi_replace("<iframe","&lt;iframe",$$key);
			$$key = eregi_replace("</iframe>","&lt;/iframe&gt;",$$key);
		}

	}
}

$bobj = new amboard($connect);


/* MEDIPIX 게시판이용권한에 따른 메세지 설정 (08.06.02) */
if( ( ($_SESSION["userlevel"] && $_SESSION["userlevel"] > $bobj->config[use_auth])) )
{
    $comment = $bobj->config[useauth_ment];
    //echo $comment;
    echo("<script> window.alert('$comment')</script>");
    echo("<script> history.go(-1);</script>");

    //gourl("$PHP_SELF"); // MEDIPIX 문의후 이동 설정 (08.05.19)
    exit;
} else if (!$_SESSION["userlevel"] && $bobj->config[use_auth] != "10" )
{
    $comment = $bobj->config[useauth_login_ment];
    $move_login = $bobj->config[useauth_addr];
    echo("<script> window.alert('$comment')</script>");
    echo("<script> document.location.href='$move_login';</script>");

    //gourl("$PHP_SELF"); // MEDIPIX 문의후 이동 설정 (08.05.19)
    exit;
}

/* MEDIPIX 게시판이용권한에 따른 메세지 설정 (08.06.02) */

/* MEDIPIX 문의사항방식 게시판을 위한 설정 (08.05.16) */

if($bobj->config[kind] == "inquire")
{
	if(!$abmode && (!$_SESSION["userlevel"] || ($_SESSION["userlevel"] && $_SESSION["userlevel"] > $bobj->config[manage_auth]))) $abmode = "write";
}
/* MEDIPIX 문의사항방식 게시판을 위한 설정 (08.05.16) */
//msg ($abmode);
/* MEDIPIX 스타치료후기방식 게시판에 들어오면 마지막 등록한 뷰페이지로 이동 (08.05.20) */
if($bobj->config[kind] == "star")
{
	$query = "select max(no) from amboard_".$group." where code='".$code."'";
	$result = mysql_query($query, $connect);
	$star_maxno = mysql_result($result,0,0);
	if($star_maxno)
	{
		if(!$abmode)
		{
			$abmode = "view";
			$no = $star_maxno;
		}
	}
}

/* MEDIPIX 스타치료후기방식 게시판에 들어오면 마지막 등록한 뷰페이지로 이동 (08.05.20) */


if($m1 =="webservice"){
	$SQL = "select name from amboard_config where gcode='$group' and code='$code'";
	$result1 = mysql_query($SQL,$connect);

	$row=mysql_fetch_array($result1);

	echo "
	<div id='admin_sub_wrap'>
		<h2>$row[name]</h2>";

}

if($code=='media01'){
	if(!$no){
		$no=mysql_fetch_array(mysql_query("select no from amboard_basic where code='$code' and wmode='1' order by no desc limit 1 "));
		$no = $no[0];
	}
}

//msg ('1');
//msg ($abmode);
switch ($abmode) {

	case "list" :
		include $BROOT."/list.php";
	break;

	case "view" :
		include $BROOT."/view.php";
	break;

	case "write" :
		include $BROOT."/write.php";
	break;

	case "reply" :
		include $BROOT."/write.php";
	break;

	case "modify" :
		include $BROOT."/write.php";
	break;

	case "writedb" :
		include $BROOT."/write_db.php";
	break;

	case "modifydb" :
		include $BROOT."/write_db.php";
	break;

	case "replydb" :
		include $BROOT."/write_db.php";
	break;

	case "deletedb" :
		include $BROOT."/write_db.php";
	break;

	case "deleteseldb" :
		include $BROOT."/write_db.php";
	break;

	case "vstateupdate" :
		include $BROOT."/write_db.php";
	break;

	case "commentinsert" :
		include $BROOT."/comment_write_db.php";
	break;

	case "commentmodifyview" :
		include $BROOT."/view.php";
	break;

	case "commentupdate" :
		include $BROOT."/comment_write_db.php";
	break;

	case "commentdelete" :
		include $BROOT."/comment_write_db.php";
	break;

	case "pointupdate" :
		include $BROOT."/point_update_db.php";
	break;

	case "commentmodifypasswd" :
		include $BROOT."/passwdcheck.php";
	break;

	case "commentdelpasswd" :
		include $BROOT."/passwdcheck.php";
	break;

	case "boardmodifypasswd" :
		include $BROOT."/passwdcheck.php";
	break;

	case "boarddelpasswd" :
		include $BROOT."/passwdcheck.php";
	break;

	case "boardsecretpasswd" :
		include $BROOT."/passwdcheck.php";
	break;

	case "message" :
		include $BROOT."/message.php";
	break;

/* MEDIPIX 최고관리자 삭제글 완전삭제 추가 -pooh (08.05.16) */
	case "del_completedb" :
		include $BROOT."/write_db.php";
	break;
/* MEDIPIX 최고관리자 삭제글 완전삭제 추가 -pooh (08.05.16) */

/* MEDIPIX 게시판이동 추가  (08.05.23) */
	case "change" :
		include $BROOT."/change.php";
	break;
/* MEDIPIX 게시판 이동 추가 (08.05.23) */

/* MEDIPIX 게시판이동 추가  (08.05.23) */
	case "copy" :
		include $BROOT."/copy.php";
	break;
/* MEDIPIX 게시판 이동 추가 (08.05.23) */
/* 시술후기 -> Best 시술후기로 복사 */
	case "copy1" :
		include $BROOT."/copy_after.php";
	break;


	default:
		include $BROOT."/list.php";
	break;
}



if($m1 =="webservice"){
	echo "</div>";

}

?>
