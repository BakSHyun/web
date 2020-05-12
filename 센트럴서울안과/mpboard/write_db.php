<?
// SWF 업로드를 사용할 경우 이전 쓰레기 파일 삭제
function swf_tmp_delete() {
	global $BROOT;

	$folder_name = $BROOT."/upload/".session_id();

	if(is_dir($folder_name)) {
		$dir_obj=opendir($folder_name);
		while(($file_str = readdir($dir_obj))!==false){
			if($file_str!="." && $file_str!=".."){
				@unlink($folder_name."/".$file_str);
			}
		}
		closedir($dir_obj);
		rmdir($folder_name);
	}
}

if($swfupload=="ok") {
	$folder_name = $BROOT."/upload/".session_id();
	if(is_dir($folder_name)) {
		$dir_obj=opendir($folder_name);
		while(($file_str = readdir($dir_obj))!==false){
			if($file_str!="." && $file_str!=".."){
				$split_str = explode("__swfupload__",$file_str);
				if($split_str[1]) {

					$_FILES[$split_str[0]]['name'] = $split_str[1];
					$_FILES[$split_str[0]]['type'] = "image/pjpeg";
					$_FILES[$split_str[0]]['tmp_name'] = $folder_name."/".$file_str;
					$_FILES[$split_str[0]]['error'] = 0;
					$_FILES[$split_str[0]]['size'] =  filesize($folder_name."/".$file_str);
					$_FILES[$split_str[0]]['mode'] = "swfupload";
				}
			}
		}
		closedir($dir_obj);
	}


}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
// 외부에서의 접근을 막는다.
if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";

	swf_tmp_delete();
	exit;
}

if(!$_SESSION[write_check]) {
	echo "
	<br><br><br><br>
	<center>
	정상적인 방식으로 글쓰기를 하지 않으셨습니다.
	</center>
	";

	swf_tmp_delete();
	exit;
}




$_SESSION[write_check]="";

// 게시물의 회원정보를 찾기위해 회원객체를 생성한다.
$memberobj = new ammemberRegister($connect);
$memberobj->init();

// 게시물 쓰기,수정 객체 생성
$bwriteobj = new amboardWrite($connect);
$bwriteobj->addpara = $addpara;			// 추가적으로 파라메타가 필요한 경우

$bwriteobj->init();

$AUTH = $bwriteobj->getAuth(); // MEDIPIX 문의사항방식의 조건을 위해 위로 이동 (08.05.19)
$BOARDCONFIG = $bwriteobj->config;
// 인증코드 채크 시작
if($auth_code != $_SESSION[auth_image] && $abmode == "writedb" && $BOARDCONFIG[auth_code_board_state] && $_SESSION[userid]=="") {
	session_unregister("auth_image");
	msgback("인증코드를 잘못 입력하였습니다.");
	exit;
}
else {
	session_unregister("auth_image");
}
// 인증코드 채크 끝

$ADDFIELD = $bwriteobj->getAddField();

// 관리자가 다른 사용자 내용을 수정 할경우 암호가 변경 되지 않도록 조정한다.
if($abmode == "modifydb") {
	$BDATA = $bwriteobj->getWiteData();
	if($BDATA[userid] != $_SESSION[userid]) {
		$passwd = $BDATA[passwd];
	}
}


if($abmode == "writedb" && $bwriteobj->config[kind] == "counsel") {
//키워드광고 통해 들어온 키워드를 저장

if($_SESSION['nvkwd']) $keyword = $_SESSION['nvkwd'];

	//사이트 방문전 페이지를 저장 -2015.4.6
	if($_SESSION['reffer_session']){
		$referer_page =$_SESSION['reffer_session'];
	}
}


if(!$category_input) $category_input = "0";
$ip = $_SERVER["REMOTE_ADDR"];
$wdate = date("Y-m-d H:i:s");
$modifyDate = date("Y-m-d H:i:s");

//전화상담 예약글자합치기
$etc17 = $year."-".$month."-".$day." ".$time.":00:00";

if($email1 != "" && $email2 != "") $email = $email1 . "@" . $email2;
$bwriteobj->addfield("gcode",$group);
$bwriteobj->addfield("code",$code);
$bwriteobj->addfield("category",$category_input);
$bwriteobj->addfield("cate1",$cate1_input);
$bwriteobj->addfield("cate2",$cate2_input);
$bwriteobj->addfield("cate3",$cate3_input);
$bwriteobj->addfield("name",$name);
if($abmode != "modifydb") $bwriteobj->addfield("userid",$_SESSION[userid]);
$bwriteobj->addfield("passwd",$passwd);
$bwriteobj->addfield("email",$email);
$bwriteobj->addfield("homepage",$homepage);
$bwriteobj->addfield("title",$title);
if($code == "counsel4") $bwriteobj->addfield("title",$name."님의 진료예약입니다.");
//온라인예약 자동타이틀 달기
$bwriteobj->addfield("subtitle",$subtitle);
$bwriteobj->addfield("html",$html);
$bwriteobj->addfield("device",$device);
if($wmode == "1") {
	// 비공개 게시판에서도 공지사항은 무조건 공개로... 추가(08.12.02)
	$secret = "0";
}
$bwriteobj->addfield("secret",$secret);
$bwriteobj->addfield("contents",$contents);
$bwriteobj->addfield("etc17",$etc17);

/* MEDIPIX 질문자가 답글달린 상태에서 수정할경우 답글이 날라가는것 추가 (08.07.07) */

if ($_SESSION['userlevel'] < '2' &&  $_SESSION[userlevel])
{
	$bwriteobj->addfield("recontents",$recontents);
}


/* MEDIPIX 질문자가 답글달린 상태에서 수정할경우 답글이 날라가는것 추가 (08.07.07) */

//$bwriteobj->addfield("view",$view);

$bwriteobj->addfield("point",$point);
$bwriteobj->addfield("wmode",$wmode);
if($vstate!="") $bwriteobj->addfield("vstate",$vstate);
if($abmode != "modifydb") $bwriteobj->addfield("ip",$ip);

// 수정에서 관리자가 날짜를 변경 가능 하도록 하기 위해 추가 (08.12.04)
if($abmode == "modifydb" && $AUTH[manage] && $date_edit == '1') {
	$bwriteobj->addfield("wdate",$wdate1);
}else if($abmode == "writedb" || $abmode == "replydb"  ) {
	$bwriteobj->addfield("wdate",$wdate);
}

// 수정에서 관리자가 날짜를 변경 가능 하도록 하기 위해 추가 (08.12.04)

$bwriteobj->addfield("hphone1",$hphone1);
$bwriteobj->addfield("hphone2",$hphone2);
$bwriteobj->addfield("hphone3",$hphone3);
if($abmode != "modifydb")  $bwriteobj->addfield("referer_page",$referer_page);
if($abmode != "modifydb")  $bwriteobj->addfield("keyword",$keyword);
$bwriteobj->addfield("etc1",$etc1);
$bwriteobj->addfield("etc2",$etc2);
$bwriteobj->addfield("etc3",$etc3);
$bwriteobj->addfield("etc4",$etc4);
$bwriteobj->addfield("etc5",$etc5);
/* MEDIPIX 임시필드추가 (08.04.14) */
$bwriteobj->addfield("etc6",$etc6);
$bwriteobj->addfield("etc7",$etc7);
$bwriteobj->addfield("etc8",$etc8);
$bwriteobj->addfield("etc9",$etc9);
$bwriteobj->addfield("etc10",$etc10);
$bwriteobj->addfield("etc11",$etc11);
$bwriteobj->addfield("etc12",$etc12);
$bwriteobj->addfield("etc13",$etc13);
$bwriteobj->addfield("etc14",$etc14);
$bwriteobj->addfield("etc15",$etc15);
$bwriteobj->addfield("wyear",$wyear);
$bwriteobj->addfield("wmonth",$wmonth);
$bwriteobj->addfield("wday",$wday);
$bwriteobj->addfield("whour",$whour);
$bwriteobj->addfield("wmin",$wmin);
$bwriteobj->addfield("main_sel",$main_sel);



/* MEDIPIX 임시필드추가 */
// MEDIPIX 최고관리자의 경우 삭제글을 복구시킬수있도록작업 (08.05.16)
$bwriteobj->addfield("del_state",$del_state);

if($recontents != "") {
	$bwriteobj->addfield("admin_id",$_SESSION[userid]);
	$bwriteobj->addfield("admin_name",$_SESSION[username]);
	$bwriteobj->addfield("rdate",$modifyDate);
}


if(is_array($ADDFIELD)) while(list($key, $value)=each($ADDFIELD)) {
		$bwriteobj->subfield($value[fname],$$value[fname]);
	//echo $value[fname].":".$$value[fname]."<br>";
}


if($abmode == "writedb") {
	$bwriteobj->write();


	// for naver syndication
//	include ( '../syndi/include/include.bbs.write_update.php' );

	// 회원 포인트 적립
	if($bwriteobj->config[mem_point_rstate]=="1" && $bwriteobj->config[vstate]=="1" && $_SESSION[userid]) {
		$memberobj->pointUpdate("point",$bwriteobj->config[mem_regpoint],$_SESSION[userid]);
	}
	// 회원 캐쉬 적립
	if($bwriteobj->config[mem_cpoint_rstate]=="1" && $bwriteobj->config[vstate]=="1" && $_SESSION[userid]) {
		$memberobj->pointUpdate("cpoint",$bwriteobj->config[mem_regpoint],$_SESSION[userid]);
	}

		/*
			MEDIPIX 상담게시판에 글이 작성될경우 SMS발송 추가 (08.07.03)
	*/


	if ($bwriteobj->config[write_confirm_sms_use] == "1" && $sms_nosend <> "Y") {

		include_once('nusoap_tongkni.php');
		$msg = $adm_sql[name]."-" . $name."님의 ";
		$msg = $msg .$adm_sql[adm_meta_title].$bwriteobj->config[name]."에 글이 등록되었습니다..";//.$SITE_INFO[url];


		$to_hphone = $hphone1.$hphone2.$hphone3;

		if(!$to_hphone){
			$to_hphone = $adm_sql[adm_phone];
		}
		$snd_number =$adm_sql[adm_phone];  //보내는 사람 번호를 받음
		//여러개의 핸드본으로 발송
		$rcv_num=explode("|",$bwriteobj->config[write_confirm_sms_num]);
		$rcv_number=$rcv_num[0];    //받는 사람 번호를 받음

		$rcv_number2=$rcv_num[1];    //글등록시 문자받는 사람 번호
		$rcv_number3=$rcv_num[2];    //글등록시 문자받는 사람 번호
		$rcv_number4=$rcv_num[3];    //글등록시 문자받는 사람 번호
		$rcv_number5=$rcv_num[4];    //글등록시 문자받는 사람 번호

		$sms_content=$msg;  //전송 내용을 받음

		/******고객님 접속 정보************/
		$sms_id=$adm_sql[adm_sms_id];            //고객님께서 부여 받으신 sms_id
		$sms_pwd=$adm_sql[adm_sms_pw];       //고객님께서 부여 받으신 sms_pwd
		/**********************************/
		$callbackURL = "www.tongkni.co.kr";
		$userdefine = $sms_id;							//예약취소를 위해 넣어주는 구분자 정의값, 사용자 임의로 지정해주시면 됩니다. 영문으로 넣어주셔야 합니다. 사용자가 구분할 수 있는 값을 넣어주세요.
		$canclemode = "1";                //예약 취소 모드 1: 사용자정의값에 의한 삭제.  현제는 무조건 1을 넣어주시면 됩니다.

		//구축 테스트 주소와 일반 웹서비스 선택
		if (substr($sms_id,0,3) == "bt_"){
			$webService = "http://webservice.tongkni.co.kr/sms.3.bt/ServiceSMS_bt.asmx?WSDL";
		}
		else{
			$webService = "http://webservice.tongkni.co.kr/sms.3/ServiceSMS.asmx?WSDL";
		}

		//+) funcMode는 메소드실행 후 반환값에 따라 다른 메시지를 띄우기 위해서 쓰입니다.


		$sms = new SMS($webService); //SMS 객체 생성

		$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5개의 인자로 함수를 호출합니다.

		if($rcv_number2){
			$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number2,$sms_content);// 5개의 인자로 함수를 호출합니다.
		}
		if($rcv_number3){
			$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number3,$sms_content);// 5개의 인자로 함수를 호출합니다.
		}
		if($rcv_number4){
			$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number4,$sms_content);// 5개의 인자로 함수를 호출합니다.
		}
		if($rcv_number5){
			$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number5,$sms_content);// 5개의 인자로 함수를 호출합니다.
		}


		//include_once('sms_log.php');	  //sms_log.php추가 (08.12.15)
	}
?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '487541084748222');
fbq('track', 'PageView');
fbq('track', 'CompleteRegistration');
</script>
<noscript>
<img height="1" width="1" src="https://www.facebook.com/tr?id=487541084748222&ev=PageView&noscript=1"/>
</noscript>
<?
}
if($abmode == "modifydb") {

	$bwriteobj->modify("no='$no'");

	// for naver syndication
//	include ( '../syndi/include/include.bbs.write_update.php' );

}
	/*
		MEDIPIX 상담게시판의 답변달릴경우 메일,sms발송 추가 (08.04.15)
		- 답변메일 발송및 sms발송은 게시판 설정의 답변글권한을 기준으로 한다.
	*/

if($_SESSION[userlevel] && $bwriteobj->config[rewrite_auth] >= $_SESSION[userlevel]  && $bwriteobj->config[kind] == "counsel" && $recontents != "") {

		if(!$html) $mcontents = nl2br($contents);
		else $mcontents = $contents;
		if(!$html) $mrecontents = nl2br($recontents);
		else $mrecontents = $recontents;



	/* SMS 전송 */
	if ($bwriteobj->config[sms_use] == "1" && $sms_send <> "1") {

		//답변작성시 sms발송체크와 게시판설정에서 sms발송설정된경우에 발송

		include_once('nusoap_tongkni.php');
		$msg = $adm_sql[name]."-" . $name."님 ";
		$msg = $msg .$adm_sql[adm_meta_title].$bwriteobj->config[name]. " 대한 답변이 등록되었습니다.";//.$SITE_INFO[url];
		$to_hphone = $hphone1.$hphone2.$hphone3;

		$snd_number=$adm_sql[adm_phone];  //보내는 사람 번호를 받음
		$rcv_number=$to_hphone;    //받는 사람 번호를 받음
		$sms_content=$msg;  //전송 내용을 받음

		/******고객님 접속 정보************/
		$sms_id=$adm_sql[adm_sms_id];            //고객님께서 부여 받으신 sms_id
		$sms_pwd=$adm_sql[adm_sms_pw];       //고객님께서 부여 받으신 sms_pwd
		/**********************************/

		$callbackURL = "www.tongkni.co.kr";
		$userdefine = $sms_id;							//예약취소를 위해 넣어주는 구분자 정의값, 사용자 임의로 지정해주시면 됩니다. 영문으로 넣어주셔야 합니다. 사용자가 구분할 수 있는 값을 넣어주세요.
		$canclemode = "1";                //예약 취소 모드 1: 사용자정의값에 의한 삭제.  현제는 무조건 1을 넣어주시면 됩니다.

		//구축 테스트 주소와 일반 웹서비스 선택
		if (substr($sms_id,0,3) == "bt_"){
			$webService = "http://webservice.tongkni.co.kr/sms.3.bt/ServiceSMS_bt.asmx?WSDL";
		}
		else{
			$webService = "http://webservice.tongkni.co.kr/sms.3/ServiceSMS.asmx?WSDL";
		}

		//+) funcMode는 메소드실행 후 반환값에 따라 다른 메시지를 띄우기 위해서 쓰입니다.

		/*
		echo $sms_id."<br />".$sms_pwd."<br />".$snd_number."<br />".$rcv_number."<br />".$sms_content ;
		exit;
		*/

		$sms = new SMS($webService); //SMS 객체 생성

		$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5개의 인자로 함수를 호출합니다.

		if ($result > 0) {
			echo "<script language='javascript'>";
			echo "alert('sms가 전송되었습니다.');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		}
		elseif ($result=="0") {
			echo "<script language='javascript'>";
			echo "alert('잔여량부족');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		}
		elseif ($result=="-1") {
			echo "<script language='javascript'>";
			echo "alert('아이디/패스워드 이상');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		}
		elseif ($result=="-3") {
			echo "<script language='javascript'>";
			echo "alert('다중발송실패');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		}
		elseif ($result=="-50") {
			echo "<script language='javascript'>";
			echo "alert('전화번호이상');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		}
		else {
			echo "<script language='javascript'>";
			//	echo "alert('Error Code ".$result."  ');";
			//	echo "location.href='sms_main.php'";
			echo "</script>";
		}
		//include_once('sms_log.php');	  //sms_log.php추가 (08.12.15)

	}
}

if($abmode == "replydb") {
	// 문의게시판이며 관리자가 답글을 쓴경우 메일로 발송한다.
	if($bwriteobj->config[kind] == "inquire" && $_SESSION[userlevel] == 1) {

		$SQL = "select * from amboard_".$bwriteobj->gtable." where no='$no'";
		$row = mysql_fetch_array(mysql_query($SQL,$connect));
		if($row) {
			$name = $row[name];
			$id = $row[userid];
			$toemail = $row[email];
		}

		if(!$html) $mcontents = nl2br($contents);
		else $mcontents = $contents;

		$mailinfo[mailskin] = $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/mailhtml/replymail.html";
		if(!$email) $mailinfo[frommail] = $SITE_INFO[email];
		else $mailinfo[frommail] = $email;
		$mailinfo[fromname] = $SITE_INFO[name];
		$mailinfo[tomail] = $toemail;
		$mailinfo[toname] = $name;
		if($SITE_INFO[title]) $mailinfo[subject] = "[".$SITE_INFO[title]."] ".$title;
		else $mailinfo[subject] = $title;
		$mailinfo[html] = 1;
		$mailinfo[제목] = $title;
		$mailinfo[이름] = $name;
		$mailinfo[아이디] = $id;
		$mailinfo[내용] = $mcontents;

		$bwriteobj->boardmail($mailinfo);
	}
	$bwriteobj->reply($no);
}
if($abmode == "deletedb") {

	// for naver syndication
//	include ( '../syndi/include/include.bbs.delete.php' );

		/*
			MEDIPIX 글을 삭제할경우 실제로 삭제하지 않고 del_state 를 Y로 업데이트 시킴 추가 (08.04.16)
			- 메디픽스 최고관리자는 조회가능
			- 글작성에관한 포인트와 캐쉬는 건드리지 않음
			- 파일과 코멘트는 실제 글이 삭제될시점에 삭제함
	*/

	$SQL = "update amboard_".$bwriteobj->gtable." set del_state='Y' where no='$no'";
	mysql_query($SQL,$connect);

		/*
			MEDIPIX 글을 삭제할경우 실제로 삭제하지 않고 del_state 를 Y로 업데이트 시킴 추가 (08.04.16)
	*/

		/* MEDIPIX 실제 삭제가 이루어지는 것이 아니므로 주석처리 (08.04.16)

		$SQL = "select * from amboard_".$bwriteobj->gtable." where no='$no'";
		$row = mysql_fetch_array(mysql_query($SQL,$connect));
		if($row) {
			$vstate = $row[vstate];
			$user_id = $row[userid];
		}

		// 승인상태일때 회원 포인트 적립 감소
		if($bwriteobj->config[mem_point_rstate]=="1" && $vstate=="1" && $user_id) {
			$memberobj->pointUpdate("point","-".$bwriteobj->config[mem_regpoint],$user_id);
		}
		// 승인상태일때 회원 캐쉬 적립 감소
		if($bwriteobj->config[mem_cpoint_rstate]=="1" && $vstate=="1" && $user_id) {
			$memberobj->pointUpdate("cpoint","-".$bwriteobj->config[mem_regpoint],$user_id);
		}

		$bwriteobj->delete($no);	// 관련 파일데이타까지 지운다.
		// 코멘트 쓰기,수정 객체 생성
		$bcommentobj = new amboardComment($connect);
		$bcommentobj->init();
		$bcommentobj->delete("fno=$no");	// 게시물에 해당하는 모든코멘트 삭제
	*/

}
if($abmode == "deleteseldb") {
	// 리스트에서 선택된 게시물을 삭제한다.
	$array_uidvalue = explode("|",$checkvalue);
	$array_uidcount = count($array_uidvalue);

	for($i=0;$i < $array_uidcount;$i++) {
		if($array_uidvalue[$i]) {
			$no = $array_uidvalue[$i];

	// for naver syndication
//	include ( '../syndi/include/include.bbs.delete.php' );

				/*
					MEDIPIX 글을 삭제할경우 실제로 삭제하지 않고 del_state 를 Y로 업데이트 시킴 추가 (08.04.16)
					- 메디픽스 최고관리자는 조회가능
					- 글작성에관한 포인트와 캐쉬는 건드리지 않음
					- 파일과 코멘트는 실제 글이 삭제될시점에 삭제함
			*/

			$SQL = "update amboard_".$bwriteobj->gtable." set del_state='Y' where no='$no'";
			mysql_query($SQL,$connect);
				/*
					MEDIPIX 글을 삭제할경우 실제로 삭제하지 않고 del_state 를 Y로 업데이트 시킴 추가 (08.04.16)
			*/

				/* MEDIPIX 실제 삭제가 이루어지는 것이 아니므로 주석처리 (08.04.16)

				$bwriteobj->delete($no);	// 관련 파일데이타까지 지운다.
				// 코멘트 쓰기,수정 객체 생성
				$bcommentobj = new amboardComment($connect);
				$bcommentobj->init();
				$bcommentobj->delete("fno=$no");	// 게시물에 해당하는 모든코멘트 삭제

			*/
		}
	}
}
if($abmode == "vstateupdate") {
	$SQL = "update amboard_".$bwriteobj->gtable." set vstate='$vstate' where no='$no'";
	mysql_query($SQL,$connect);
	// 회원 포인트 적립
	if($bwriteobj->config[mem_point_rstate]=="1" && $vstate=="1" && $_SESSION[userid]) {
		$memberobj->pointUpdate("point",$bwriteobj->config[mem_regpoint],$_SESSION[userid]);
	}
	// 회원 캐쉬 적립
	if($bwriteobj->config[mem_cpoint_rstate]=="1" && $vstate=="1" && $_SESSION[userid]) {
		$memberobj->pointUpdate("cpoint",$bwriteobj->config[mem_regpoint],$_SESSION[userid]);
	}

	// 회원 포인트 적립 감소
	if($bwriteobj->config[mem_point_rstate]=="1" && $vstate=="0" && $_SESSION[userid]) {
		$memberobj->pointUpdate("point","-".$bwriteobj->config[mem_regpoint],$_SESSION[userid]);
	}
	// 회원 캐쉬 적립 감소
	if($bwriteobj->config[mem_cpoint_rstate]=="1" && $vstate=="0" && $_SESSION[userid]) {
		$memberobj->pointUpdate("cpoint","-".$bwriteobj->config[mem_regpoint],$_SESSION[userid]);
	}
}

if($abmode == "del_completedb" && $_SESSION[userlevel] < 0 ) {

		/*
			MEDIPIX 글을 삭제할경우 실제로 삭제하지 않고 del_state 를 Y로 업데이트 된 데이터들을 삭제 추가 -pooh(08.05.16)
			- 메디픽스 최고관리자만 가능
	*/
	$SQL = "delete from amboard_".$bwriteobj->gtable."  where code ='$code' and del_state='Y' ";
	//		echo	$SQL;
	//		exit;
	mysql_query($SQL,$connect);
}

/*MEDIPIX 게시물에 이벤트 발생시 로그 기록 추가 -pooh(08.05.19) */

$SQL = "insert board_log (";
$SQL = $SQL."user_id,";
$SQL = $SQL."name,";
$SQL = $SQL."code,";
$SQL = $SQL."mode,";
$SQL = $SQL."ip,";
$SQL = $SQL."wdate,";
$SQL = $SQL."subject,";
$SQL = $SQL."no";
$SQL = $SQL.") values (";
$SQL = $SQL."'$_SESSION[userid]',";
$SQL = $SQL."'$name',";
$SQL = $SQL."'$code',";
$SQL = $SQL."'$abmode',";
$SQL = $SQL."'$ip',";
$SQL = $SQL."'$wdate',";
$SQL = $SQL."'$title',";
$SQL = $SQL."'$no')";
mysql_query($SQL,$connect);

/*MEDIPIX 게시물에 이벤트 발생시 로그 기록 추가 -pooh(08.05.19) */


swf_tmp_delete();

// 문의사항이며, 글쓰기일경우 문의사항 접수 맨트를 보여준다.
//메디픽스 추가
// 문의사항 게시판에 글을 작성시 관리자가 정해준 멘트 나오게 수정
if($bwriteobj->config[kind]=="inquire" && $abmode == "writedb") {
	$c = $bwriteobj->config[inquire_ment];
	echo("<script> window.alert('$c')</script>");
	gourl("$PHP_SELF"); // MEDIPIX 문의후 이동 설정 (08.05.19)
	exit;
}

if ($bwriteobj->config[kind]=="counsel" && $abmode == "writedb") {
	msg ('성공적으로 접수되었습니다. 빠른시간내 답변드리겠습니다. ');
}

if($abkind=='writer'){
	/*
	if($code == "eye_after"){
		gourl("$PHP_SELF?category=$category");
	}
	*/
		gourl("$PHP_SELF");
}else{
	if($code == "eye_after"){
		gourl("$PHP_SELF?category=$category_input");
	}else if($code == "counsel02" && $abmode == "writedb"){
		gourl("../07_counsel/counsel1_r.php");
	}else{
		gourl("$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category&abmode=list&$bwriteobj->searchpara$bwriteobj->catepara&bsort=$bsort&bfsort=$bfsort&$bwriteobj->addpara");
	}
}

?>
