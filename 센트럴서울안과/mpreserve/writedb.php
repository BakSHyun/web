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

//require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php";

if(!$_POST[resdate] || !$_POST[restime])
{
	msgback("예약시간이 넘어오지 않았습니다.");
	exit;
}

$config = $mpreserve->config;

if($mn=$mpreserve->write($_POST))
{
	if($config[sms_admin])
	{
		$from_hphone = $hphone1."-".$hphone2."-".$hphone3;
		if($from_hphone == "--") $from_hphone = "000-0000-0000";

		$msg = $adm_sql[adm_meta_title]."-".$name."님의 ";
		$msg = $msg ." 예약이 접수되었습니다";//.$SITE_INFO[url];

include_once('nusoap_tongkni.php');
//echo "4";
$snd_number=$adm_sql[adm_phone];  //보내는 사람 번호를 받음
/* 지점별 관리자 핸드폰으로 가도록 변경 08.11.17 */
//$rcv_number=$SITE_INFO[hphone];    //받는 사람 번호를 받음
if ($config[smsmail_use_phonenum] =="")
{
	$rcv_number=$SITE_INFO[hphone];    //지점별관리자 번호가 없을경우 전체 관리자의 핸드폰번호로 발송한다
} else {

		$rcv_num=explode("|",$config[smsmail_use_phonenum]);
		$rcv_number=$rcv_num[0];    //받는 사람 번호를 받음

		$rcv_number2=$rcv_num[1];    //글등록시 문자받는 사람 번호
		$rcv_number3=$rcv_num[2];    //글등록시 문자받는 사람 번호
		$rcv_number4=$rcv_num[3];    //글등록시 문자받는 사람 번호
		$rcv_number5=$rcv_num[4];    //글등록시 문자받는 사람 번호

	//	echo $rcv_number."<br/ >".$rcv_number2."<br/ >".$rcv_number3."<br/ >".$rcv_number4."<br/ >".$rcv_number5."<br/ >";
	//	exit;

//	$rcv_number =  $config[smsmail_use_phonenum];		//지점별 관리자가 있는경우 지점별관리자의 핸드폰으로 발송한다.
}


$sms_content=$msg;  //전송 내용을 받음
//$reserve_date=$_POST[reserve_date]; //예약 일자를 받음
//$reserve_time=$_POST[reserve_time];  //예약 시간을 받음

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



	if ($result != '1') {
		echo "<script language='javascript'>";
		echo "alert('Error Code ".$result."  ');";
		echo "</script>";
	}


	}
	gourl("$PHP_SELF?mode=resresult&resdate=$resdate&restime=$restime&etc1=$etc1&name=$name&mn=$mn");
}
else
{
	msg("예약완료되었습니다.");
	gourl("$PHP_SELF?mode=seldate&year=$year&month=$month&ryear=$ryear&rmonth=$rmonth&rday=$rday&viewtime=1");
}

?>