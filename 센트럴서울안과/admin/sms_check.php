<?

include_once('../admin/sms/nusoap_tong.php');
include_once('../admin/sms/nusoap_tong_mms.php');
include_once('../admin/sms/nusoap_tong_lms.php');

$sms_id=$SITE_INFO[sms_id];            //고객님께서 부여 받으신 sms_id
$sms_pwd=$SITE_INFO[sms_pwd];       //고객님께서 부여 받으신 sms_pwd

$canclemode = "1";                //예약 취소 모드 1: 사용자정의값에 의한 삭제.  현제는 무조건 1을 넣어주시면 됩니다.
//구축 테스트 주소와 일반 웹서비스 선택
if (substr($sms_id,0,3) == "bt_"){
	$webService = "http://webservice.tongkni.co.kr/sms.3.bt/ServiceSMS_bt.asmx?WSDL";
}
else{
	$webService = "http://webservice.tongkni.co.kr/sms.3/ServiceSMS.asmx?WSDL";
}

$sms = new SMS($webService); //SMS 객체 생성

/*잔여량을 가져올 경우*/
$result=$sms->GetRemainCount($sms_id,$sms_pwd);	$funcMode = 1;
echo $result;
?>
<script type="text/javascript">
<!--
window.parent.smsForm.smsResult.value = '<?=trim($result)?>';
//-->
</script>
<?


$canclemode ="1"; //캔슬모드는 무조건 1입니다

//구축 테스트 주소와 일반 웹서비스 선택
if (substr($sms_id,0,3) == "bt_"){
	$webService = "http://mmsservice.tongkni.co.kr/mms.1.bt/ServiceMMS_bt.asmx?WSDL";
}
else{
	$webService = "http://mmsservice.tongkni.co.kr/mms.1/ServiceMMS.asmx?WSDL";
}

$mms = new MMS($webService); //MMS 객체 생성

/*잔여량을 가져올 경우*/
$result=$mms->GetRemainCount($mms_id,$mms_pwd);		//$funcMode = 1;
// +) funcMode는 메소드실행 후 반환값에 따라 다른 메시지를 띄우기 위해서 쓰입니다.

?>
<script type="text/javascript">
<!--
window.parent.smsForm.mmsResult.value = '<?=trim($result)?>';
//-->
</script>


<?


$canclemode ="1"; //캔슬모드는 무조건 1입니다

//구축테스트 웹서비스주소와 일반 웹서비스 선택
if (substr($sms_id,0,3) == "bt_"){
	$webService = "http://lmsservice.tongkni.co.kr/lms.1.bt/ServiceLMS_bt.asmx?WSDL";
}
else{
	$webService = "http://lmsservice.tongkni.co.kr/lms.1/ServiceLMS.asmx?WSDL";
}

$lms = new LMS($webService); //SMS 객체 생성

/*잔여량을 가져올 경우*/
$result=$lms->GetRemainCount($lms_id,$lms_pwd);		$funcMode = 1;
//+) funcMode는 메소드실행 후 반환값에 따라 다른 메시지를 띄우기 위해서 쓰입니다.

?>
<script type="text/javascript">
<!--
window.parent.smsForm.lmsResult.value = '<?=trim($result)?>';
//-->
</script>