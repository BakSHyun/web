<?
// 외부에서의 접근을 막는다.
if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}

	
	// 코멘트 쓰기,수정 객체 생성
	$bcommentobj = new amboardComment($connect);
	$bcommentobj->addpara = $addpara;			// 추가적으로 파라메타가 필요한 경우
	$bcommentobj->init();
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$wdate = date("Y-m-d H:i:s");
	
	$bcommentobj->addfield("code",$code);
	$bcommentobj->addfield("fno",$no);
	$bcommentobj->addfield("name",$name);
	$bcommentobj->addfield("userid",$_SESSION[userid]);
	$bcommentobj->addfield("passwd",$passwd);
	$bcommentobj->addfield("comment",$comment);
	$bcommentobj->addfield("ip",$ip);
	$bcommentobj->addfield("wdate",$wdate);
	
	
	if($abmode == "commentinsert") $bcommentobj->write();
	if($abmode == "commentupdate") $bcommentobj->modify("no='$cno'");
	if($abmode == "commentdelete") $bcommentobj->delete("no='$cno'");
	
	
	echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category&abmode=view&no=$no&$bcommentobj->searchpara&$bcommentobj->addpara\">";
?>