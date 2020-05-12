<?php
/*************************************************************************
 *작성일 : 2006-09-19  
 *기  능 : 통큰아이에서 제공하는 SMS XML 웹서비스를 호출
 *작성자 : 김지훈 (dev@tongkni.co.kr)
 *************************************************************************/
include_once('nusoap_tong.php');

$snd_number=$_POST[snd_number];  //보내는 사람 번호를 받음
$rcv_number=$_POST[rcv_number];    //받는 사람 번호를 받음
$sms_content=$_POST[sms_content];  //전송 내용을 받음
$reserve_date=$_POST[reserve_date]; //예약 일자를 받음
$reserve_time=$_POST[reserve_time];  //예약 시간을 받음

/******고객님 접속 정보************/
$sms_id="mediphics";            //고객님께서 부여 받으신 sms_id
$sms_pwd="684768";       //고객님께서 부여 받으신 sms_pwd
/**********************************/
$callbackURL = "sms.tongkni.co.kr";


$sms = new SMS(); //SMS 객체 생성

//$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5개의 인자로 함수를 호출합니다.

/*예약 전송으로 구성하실경우*/
$result=$sms->SendSMSReserve($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content,$reserve_date,$reserve_time);// 7개의 인자로 함수를 호출합니다.

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
	echo "alert('전송 성공');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="0") {
	echo "<script language='javascript'>";
	echo "alert('잔여량부족');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="-1") {
	echo "<script language='javascript'>";
	echo "alert('아이디/패스워드 이상');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="-3") {
	echo "<script language='javascript'>";
	echo "alert('다중발송실패');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="-50") {
	echo "<script language='javascript'>";
	echo "alert('전화번호이상');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} else {
	echo "<script language='javascript'>";
	echo "alert('Error Code ".$result."  ');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
}
	
?>



