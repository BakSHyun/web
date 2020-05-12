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

$result = mysql_query("select * from amboard_basic where no = $no", $connect);
$row = mysql_fetch_array($result);

$modifyDate = date("Y-m-d H:i:s");

$dbobj = new dbUtil($connect);
$dbobj->setTable("amboard_basic");

$dbobj->addfield("vstate",$vstate);
$dbobj->addfield("hphone1",$hphone1);
$dbobj->addfield("hphone2",$hphone2);
$dbobj->addfield("hphone3",$hphone3);
$dbobj->addfield("email",$email);
$dbobj->addfield("secret",$secret);
$dbobj->addfield("etc19",$etc19);
if($row[etc3] != $etc3) $dbobj->addfield("etc5",$modifyDate);
$dbobj->addfield("etc6",$etc6);
$dbobj->addfield("etc7",$etc7);
$dbobj->addfield("etc4",$etc4);
$dbobj->addfield("etc20",$etc20);
$dbobj->addfield("crm5",$crm5);
$dbobj->addfield("crm6",$crm6);
$dbobj->addfield("recontents",$recontents);
//$dbobj->addfield("wyear",$wyear);
$dbobj->addfield("wmonth",$wmonth);
$dbobj->addfield("wday",$wday);
$dbobj->addfield("whour",$whour);
$dbobj->addfield("wmin",$wmin);
if($recontents != "") {
	$dbobj->addfield("admin_id",$_SESSION[userid]);
	$dbobj->addfield("admin_name",$_SESSION[username]);
	$dbobj->addfield("rdate",$modifyDate);
}
$dbobj->update("no=$no");

/* 이벤트에 답변 메일 및 sms 발송 */
if($send_email == "Y" && $recontents != "" && $email != "") {
	/*
	if(!$html) $mcontents = nl2br($contents);
	else $mcontents = $contents;
	*/
	$mcontents = $row[contents];
	$mcontents = str_replace("\"", "", $mcontents);
	$mcontents = str_replace("\\", "", $mcontents);

	$mrecontents = $recontents;
	$mrecontents = str_replace("\"", "", $mrecontents);
	$mrecontents = str_replace("\\", "", $mrecontents);

	/* 메일 발송 */
	//답변작성시 메일발송에 체크한경우에 발송
	$mailobj = new mailtool();
	$mailhtml = $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/mailhtml/replymail2.html";
	$mailinfo[frommail] = $SITE_INFO[email];
	$mailinfo[fromname] = $SITE_INFO[name];
	$mailinfo[fromname] = iconv("UTF-8","CP949",$mailinfo[fromname]);
	$mailinfo[tomail] = $row[email];
	$mailinfo[toname] = $row[name];
	$mailinfo[subject] = "안녕하세요? 퍼스트치과입니다. 문의하신 내용의 답변입니다.";
	$mailinfo[html] = 1;
	//$mailinfo[내용] = $mrecontents;
	$mailinfo[내용] = $mcontents;
	$mailinfo[답변] = $mrecontents;

	$mailobj->readhtml($mailhtml);

	$mailobj->mailcontents = str_replace("=\"./images", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("=\"./css", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("='./images", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("='./css", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("=./images", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("=./css", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);

	$mailobj->mailcontents = str_replace("=\"images", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("=\"css", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("='images", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("='css", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("=images", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
	$mailobj->mailcontents = str_replace("=css", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);

	//$mailobj->mailsend($mailinfo);
}
	if($send_sms == "Y" && $hphone1 != "" && $hphone2 != "" && $hphone3 != "") {
		include_once ($_SERVER[DOCUMENT_ROOT]."/$INDIR/mpboard/nusoap_tong.php");

		if($etc19){
			$msg = $etc19;
		} else{
			$msg = "[퍼스트치과]. 문의주신 내용에 답변이 등록되었습니다.감사합니다.";
		}

		//$msg = $msg . " 문의하신 상담내용을 메일로 답변드렸습니다.";//.$SITE_INFO[url];
		$to_hphone = $hphone1.$hphone2.$hphone3;
		$snd_number= $adm_sql[adm_phone];  //보내는 사람 번호를 받음
		$rcv_number=$to_hphone;    //받는 사람 번호를 받음
		$sms_content=$msg;  //전송 내용을 받음

		/******고객님 접속 정보************/
		$sms_id= $adm_sql[adm_sms_id];            //고객님께서 부여 받으신 sms_id
		$sms_pwd= $adm_sql[adm_sms_pw];       //고객님께서 부여 받으신 sms_pwd
		/**********************************/
		$callbackURL = $gourl;

		$sms = new SMS(); //SMS 객체 생성

		$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5개의 인자로 함수를 호출합니다.

		if ($result > 0) {
			echo "<script language='javascript'>";
			echo "alert('sms 전송성공');";
		//	echo "location.href='sms_main.php'";
			echo "</script>";
		} elseif ($result=="0") {
			echo "<script language='javascript'>";
			echo "alert('잔여량부족');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		} elseif ($result=="-1") {
			echo "<script language='javascript'>";
			echo "alert('아이디/패스워드 이상');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		} elseif ($result=="-3") {
			echo "<script language='javascript'>";
			echo "alert('다중발송실패');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		} elseif ($result=="-50") {
			echo "<script language='javascript'>";
			echo "alert('전화번호이상');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		} else {
			echo "<script language='javascript'>";
			//	echo "alert('Error Code ".$result."  ');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		}
	}

/* 이벤트에 답변 메일 및 sms 발송 */

//echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&m1=$m1&m2=crm_list&no=$no&sno=$sno&search_etc4=$search_etc4&search_clinic=&search_clinic&search_cate1=$search_cate1&search_key=&search_key&search_value=$search_value&implode_etc3=$implode_etc3 \">";
echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&code=$code&m1=$m1&m2=crm_list&no=$no&sno=$sno&$search_para \">";

?>