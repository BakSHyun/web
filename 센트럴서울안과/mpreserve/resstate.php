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

require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpreserve/inc/sys.php"; //지점별 관리자 $config[smsmail_use_phonenum]의 정보를 가지고 오기 위해 추가 (08.12.16)
                                                                                              
$mpreserve = new mpreserve($code);  //지점별 관리자  $config[smsmail_use_phonenum]의 정보를 가지고 오기 위해 추가 (08.12.16)
$config = $mpreserve->config;          //지점별 관리자  $config[smsmail_use_phonenum]의 정보를 가지고 오기 위해 추가 (08.12.16)  

//echo $config[smsmail_use_phonenum];
//exit();


$dbobj = new dbUtil($connect);
$dbobj->setTable("mpreserve");

$dbobj->addfield("resstate",$resstate);

$dbobj->update("no=$no");

$search_para = "search_code=$search_code&search_ryear=$search_ryear&search_rmonth=$search_rmonth&search_rday=$search_rday&search_key=$search_key&search_value=$search_value";
$order_para = "orderby=$orderby";

$result = mysql_query("select * from mpreserve where no = $no",$connect);
$row = mysql_fetch_array($result);

$arr_date = explode("-",$row[resdate]);
$wyear = intval($arr_date[0]);
$wmonth = intval($arr_date[1]);
$wday = intval($arr_date[2]);
$arr_rtime = explode(":",$row[restime]);
$rtime = $arr_rtime[0]."시";
if($arr_rtime[1] != "00") $rtime .= $arr_rtime[1]."분";

if($sendsms == "Y" && ($resstate == "1" || $resstate == "9"))
{
	$to_hphone = $row[hphone1].$row[hphone2].$row[hphone3];



	if ($config[smsmail_jijum_phonenum] =="") 
	{ 
		$snd_number = $SITE_INFO[phone];    //지점별관리자 번호가 없을경우 병원전화번호로 회원에게 sms를 발송한다 .
		} else {
		$snd_number =  $config[smsmail_jijum_phonenum];		//지점별 관리자가 있는경우 지점별관리자의 핸드폰번호로 sms를 발송한다.
	}

	$msg = "[".$SITE_INFO[title]."] " . $row[name]."님은 ";

	if($resstate == "1")
		$msg .= $wyear."년 ".$wmonth."월 ".$wday."일 ".$rtime." 예약이 완료되었습니다.";
	else if($resstate == "9")
		$msg .= $wyear."년 ".$wmonth."월 ".$wday."일 ".$rtime." 예약이 취소되었습니다.";

	$gourl = "http://".$_SERVER["HTTP_HOST"]."$PHP_SELF?m1=$m1&m2=reslist&sno=$sno&$search_para&$order_para";
/*	
	echo "
	<HTML>
	<HEAD>
	<TITLE>SMS</TITLE>
	<script language='javascript'>
	function init()
	{
		alert('SMS가 발송됩니다.');
		document.form1.submit();
	}
	</script>
	</HEAD>
	
	<BODY onLoad='init();'>
	<form name='form1' method='post' action='http://smshosting.net/sms_send.jsp'>
	<input type='hidden' name='id' value='".$SITE_INFO[sms_id]."'>
	<input type='hidden' name='passwd' value='".$SITE_INFO[sms_pwd]."'>
	<input type='hidden' name='to' value='$to_hphone'>
	<input type='hidden' name='from' value='".$SITE_INFO[phone]."'>
	<input type='hidden' name='msg' value='$msg'>
	<input type='hidden' name='url' value='$gourl'>
	</form>
	</BODY>
	</HTML>
	";
	exit;
	*/

include_once('nusoap_tong.php');

$rcv_number=$to_hphone;    //받는 사람 번호를 받음
$sms_content=$msg;  //전송 내용을 받음

//$reserve_date=$_POST[reserve_date]; //예약 일자를 받음
//$reserve_time=$_POST[reserve_time];  //예약 시간을 받음

/******고객님 접속 정보************/
$sms_id=$SITE_INFO[sms_id];            //고객님께서 부여 받으신 sms_id
$sms_pwd=$SITE_INFO[sms_pwd];       //고객님께서 부여 받으신 sms_pwd
/**********************************/
$callbackURL = $gourl;


$sms = new SMS(); //SMS 객체 생성

$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5개의 인자로 함수를 호출합니다.

/*예약 전송으로 구성하실경우*/
//$result=$sms->SendSMSReserve($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content,$reserve_date,$reserve_time);// 7개의 인자로 함수를 호출합니다.

/*콜백 전송으로 구성하실경우*/
//$result=$sms->SendSMSCallBack($sms_id,$sms_pwd,$snd_number,$rcv_number,$callbackURL,$sms_content);// 6개의 인자로 함수를 호출합니다.

/*콜백 예약 전송으로 구성하실경우*/
//$result=$sms->SendSMSCallBackReserve($sms_id,$sms_pwd,$snd_number,$rcv_number,$callbackURL,$sms_content,$reserve_date,$reserve_time);// 9개의 인자로 함수를 호출합니다.

/*잔여량을 가져올 경우*/
//$result=$sms->GetRemainCount($sms_id,$sms_pwd);

/*결과는 알맞게 처리합니다.*/
/*
*	결과값	
*	1: 성공
*  1~N: N개 성공(다중 전송시)
*	0: 발송량 부족
*	-1: 아이디 이상
*	-2: 전화번호 이상 실패
*	-3: 다중 전송시 전체실퍠
*/	

if ($result > 0) {
	echo "<script language='javascript'>";
	echo "alert('예약sms전송 성공');";
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
	echo "alert('Error Code ".$result."  ');";
//	echo "location.href='sms_main.php'";
	echo "</script>";	
}
  /*	발송된 sms정보 db에 저장 (08.12.15) (관리자가 회원에게)*/
	            $sms_time = date("Y-m-d H:i:s");
	                $SQL2 = "insert sms_log (";
					$SQL2 = $SQL2."smsto_name,";
                    $SQL2 = $SQL2."smsto_number,"; 
					$SQL2 = $SQL2."smsform_name,";
					$SQL2 = $SQL2."smsform_number,";
				    $SQL2 = $SQL2."sms_contents,";
				    $SQL2 = $SQL2."sms_time";
				    $SQL2 = $SQL2.") values (";
                    $SQL2 = $SQL2."'$row[name]',";
					$SQL2 = $SQL2."'$rcv_number',";
					$SQL2 = $SQL2."'$SITE_INFO[name]',";
					$SQL2 = $SQL2."'$snd_number',";
					$SQL2 = $SQL2."'$sms_content',";
					$SQL2 = $SQL2."'$sms_time')";
					mysql_query($SQL2,$connect);  
	
	/*  발송된 sms정보 db에 저장 (08.12.15) (관리자가 회원에게 )*/  
}
if($resssms_check == "Y" && $resstate == "1")
{
	$to_hphone = $row[hphone1].$row[hphone2].$row[hphone3];
	$msg = "[".$SITE_INFO[title]."] " . $row[name]."님 ";
	$msg .= $wyear."년 ".$wmonth."월 ".$wday."일 ".$rtime." 예약하신 날짜와 시간입니다.";
    

    $ressdate = $row[resdate];
    $reserver_d =  date("Ymd", strtotime("$ressdate -$resssms day")); 

    
//	echo $reserver_d."<br>";
//	echo $reserver_t;

   
	
	
	$gourl = "http://".$_SERVER["HTTP_HOST"]."$PHP_SELF?m1=$m1&m2=reslist&sno=$sno&$search_para&$order_para";


include_once('nusoap_tong.php');

/* 지점별 관리자 핸드폰번호로 회원에게 sms를 보내기 설정 08.12.15 */
//$rcv_number=$SITE_INFO[hphone];    //받는 사람 번호를 받음
if ($config[smsmail_use_phonenum] =="") 
{ 
	$snd_number = $SITE_INFO[hphone];    //지점별관리자 번호가 없을경우 전체 관리자의 핸드폰번호로 회원에게 sms를 발송한다 .
	} else {
	$snd_number =  $config[smsmail_use_phonenum];		//지점별 관리자가 있는경우 지점별관리자의 핸드폰번호로 sms를 발송한다.
}

$rcv_number=$to_hphone;    //받는 사람 번호를 받음
$sms_content=$msg;  //전송 내용을 받음
$reserve_date=$reserver_d; //예약 일자를 받음
$reserve_time=$resssms_time;  //예약 시간을 받음


//echo $reserve_date."<br>";
//echo $reserve_time."<br>";

//exit();

/******고객님 접속 정보************/
$sms_id=$SITE_INFO[sms_id];            //고객님께서 부여 받으신 sms_id
$sms_pwd=$SITE_INFO[sms_pwd];       //고객님께서 부여 받으신 sms_pwd
/**********************************/
$callbackURL = $gourl;


$sms = new SMS(); //SMS 객체 생성

//$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5개의 인자로 함수를 호출합니다.

/*예약 전송으로 구성하실경우*/
 $result=$sms->SendSMSReserve($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content,$reserve_date,$reserve_time);// 7개의 인자로 함수를 호출합니다.
 
// echo $sms_content."<bt>";
// echo $reserve_date."<bt>";
// echo $reserve_time."<bt>";
// echo $sms_id."<bt>";

/*콜백 전송으로 구성하실경우*/
//$result=$sms->SendSMSCallBack($sms_id,$sms_pwd,$snd_number,$rcv_number,$callbackURL,$sms_content);// 6개의 인자로 함수를 호출합니다.

/*콜백 예약 전송으로 구성하실경우*/
//$result=$sms->SendSMSCallBackReserve($sms_id,$sms_pwd,$snd_number,$rcv_number,$callbackURL,$sms_content,$reserve_date,$reserve_time);// 9개의 인자로 함수를 호출합니다.

/*잔여량을 가져올 경우*/
//$result=$sms->GetRemainCount($sms_id,$sms_pwd);

/*결과는 알맞게 처리합니다.*/
/*
*	결과값	
*	1: 성공
*  1~N: N개 성공(다중 전송시)
*	0: 발송량 부족
*	-1: 아이디 이상
*	-2: 전화번호 이상 실패
*	-3: 다중 전송시 전체실퍠
*/	
if ($result > 0) {
	echo "<script language='javascript'>";
	echo "alert('예약알림sms전송 성공');";
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
	echo "alert('Error Code ".$result."  ');";
//	echo "location.href='sms_main.php'";
	echo "</script>";	
}
    $sms_content_res = "(".$reserve_date."|".$reserve_time."|"."예약 sms)".$sms_content;
    /*	발송된 sms정보 db에 저장 (08.12.15) (회원에게 보낼 sms예약 전송)*/
	            $sms_time = date("Y-m-d H:i:s");
	                $SQL1 = "insert sms_log (";
					$SQL1 = $SQL1."smsto_name,";
                    $SQL1 = $SQL1."smsto_number,"; 
					$SQL1 = $SQL1."smsform_name,";
					$SQL1 = $SQL1."smsform_number,";
				    $SQL1 = $SQL1."sms_contents,";
				    $SQL1 = $SQL1."sms_time";
				    $SQL1 = $SQL1.") values (";
                    $SQL1 = $SQL1."'$row[name]',";
					$SQL1 = $SQL1."'$rcv_number',";
					$SQL1 = $SQL1."'$SITE_INFO[name]',";
					$SQL1 = $SQL1."'$snd_number',";
					$SQL1 = $SQL1."'$sms_content_res',";
					$SQL1 = $SQL1."'$sms_time')";
					mysql_query($SQL1,$connect);  
	
	/*  발송된 sms정보 db에 저장 (08.12.15) (회원에게 보낼 sms예약 전송)*/  
}
echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?m1=$m1&m2=reslist&sno=$sno&$search_para&$order_para\">";

?>
