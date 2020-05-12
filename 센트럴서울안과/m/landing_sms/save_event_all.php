<meta charset='utf-8'/>
<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";

if(!$_SESSION['userid']){ $_SESSION['userid']= 'guest'; }

if($title){ $title='상담신청입니다.'; }


// 외부에서의 접근을 막는다.

for ( $i = 0; $i < count($name); $i++){
 if ( ord($name[$i]) >= 128 )
 {
  //msg ('한글');
  //exit;
 } else{
  echo "<script>alert('영문이름은 스팸정책으로 인하여 사용하실 수 없습니다. 작성자를 한글로 작성해주세요. 감사합니다.'); history.go(-1);</script>";
  exit;
 }
}



$nums = mysql_fetch_array(mysql_query("select no+1 from amboard_basic order by no desc limit 1"));


if(preg_match('/iphone|ipod|ios|blackberry|android|windows ce|lg|mot|samsung|sonyericsson|nokia/i', $_SERVER['HTTP_USER_AGENT'])){
	$device="mobile";
}else{
	$device="desk";
}

if($_SESSION['nvkwd']) $keyword = $_SESSION['nvkwd'];

if($_SESSION['userlevel'] < "1") {
?>
<script>
	//alert("<?=$_SESSION['nvkwd']?>");
	//alert("<?=$keyword?>");
</script>
<?
}
if(!$_SESSION['userid']){ $_SESSION['userid']= 'guest'; }

if($cate2_input == "") $cate2_input = $_SESSION['nvkwd'];


	//사이트 방문전 페이지를 저장 -2015.4.6
if($_SESSION['reffer_session']){
		$referer_page =$_SESSION['reffer_session'];
	}

if($position =="장치별 비용 상담"){
	$etc1 = implode('|', $etc1);
}
$mail_time = date("Y-m-d H:i:s");
$SQL1 = "insert into amboard_basic set
ino = '".$nums[0]."',
gcode = '".$gcode."',
code = '".$code."',
userid = '".$_SESSION['userid']."',
name = '".$name."',
contents = '".$name." 님의 이벤트신청입니다.<br/>요청페이지 : ".$gourl." <br/> 연락처 : ".$hphone1."-".$hphone2."-".$hphone3." <br/>".$contents."',
title = '".$name." 님의 ".$etc1." ".$etc2."이벤트신청입니다. 연락처 : ".$hphone1."-".$hphone2."-".$hphone3."',
cate1 = '".$cate1_input."',
cate2 = '".$cate2_input."',
hphone1 = '".$hphone1."',
hphone2 = '".$hphone2."',
hphone3 = '".$hphone3."',
email = '".$email."',
etc1='".$etc1."',
etc2='".$etc2."',
etc10='".$etc10."',
etc11='".$etc11."',
keyword = '".$keyword."',
referer_page = '".$referer_page."',
vstate = '1',
html = '1',
wdate = '".$mail_time."',
ip = '".$_SERVER['REMOTE_ADDR']."'
";
//echo $SQL1;
mysql_query($SQL1);
//exit;


	include_once('nusoap_tongkni.php');

	$msg = $SITE_INFO[name]."-" . $name."님의 ";
	$msg = $msg . " 드림렌즈이벤트 신청하기가  등록되었습니다.";//.$SITE_INFO[url];

	$to_hphone = $hphone1.$hphone2.$hphone3;
	$snd_number =$adm_sql[adm_phone];  //보내는 사람 번호를 받음
	$rcv_number="01031224641";    //받는 사람 번호를 받음
	$rcv_number2="01074751134";    //받는 사람 번호를 받음
	$rcv_number3="01088058515";    //받는 사람 번호를 받음
	$rcv_number4="01043110919";    //받는 사람 번호를 받음





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

	/*echo $sms_id."<br />".$sms_pwd."<br />".$snd_number."<br />".$rcv_number."<br />".$sms_content;
	exit;
	*/

	/*즉시 전송으로 구성하실경우*/
	$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5개의 인자로 함수를 호출합니다.

	$result2=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number2,$sms_content);// 5개의 인자로 함수를 호출합니다.
	$result3=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number3,$sms_content);// 5개의 인자로 함수를 호출합니다.
	$result4=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number4,$sms_content);// 5개의 인자로 함수를 호출합니다.


/*
	echo "<script language='javascript'>";

	if ($result == "0") {
		if ($funcMode == "2") {
			echo "alert('예약내역이 없음');";
		}
		else {
			echo "alert('잔여량부족');";
		}
	}
	elseif ($result == "-1") {
		echo "alert('잘못된 sms_id와 패스워드 입력.');";
	}
	elseif ($result == "-2") {
		echo "alert('SMS 아이디 공백.');";
	}
	elseif ($result == "-3") {
		echo "alert('발송 모두 실패');";
	}
	elseif ($result == "-5") {
		echo "alert('잘못된 sms_id와 패스워드 입력.');";
	}
	elseif ($result == "-8") {
		echo "alert('발신자 전화번호 공백.');";
	}
	elseif ($result == "-9") {
		echo "alert('전송내용 공백.');";
	}
	elseif ($result == "-10") {
		echo "alert('예약 날짜 이상.');";
	}
	elseif ($result == "-11") {
		echo "alert('예약 시간 이상.');";
	}
	elseif ($result == "-12") {
		echo "alert('예약 가능 시간이 지났습니다.현재 시간 이후로 예약 하십시요.');";
	}
	elseif ($result == "-13") {
		echo "alert('스팸 동의서가 접수되지 않았습니다.');";
	}
	elseif ($result == "-14") {
		echo "alert('URL/ MMS/LMS 서비스를 신청하지 않음.');";
	}
	elseif ($result == "-23") {
		echo "alert('설정하신 허용ip 목록에 없습니다.');";
	}
	elseif ($result == "-50") {
		echo "alert('전화번호이상');";
	}
	elseif ($funcMode == "3"){
		if ($result == "0|0")
			echo "alert('만료 될 건이 없습니다.');";
		else{
			$res = explode("|",$result);
			echo "alert('".$res[0]."일 후 ".$res[1]."건이 만료됩니다.');";
		}
	}
	else {
		echo "alert('Error Code ".$result."  ');";
	}
//	echo "location.href='sms_main.php';";
	echo "</script>";


*/

?>

<script>
	alert('감사합니다. 상담신청이 완료 되었습니다.\n 문의하신 내용 확인 후 빠른 시일 내에 답변해 드리겠습니다.');
	location.replace('<?=$gourl?>');
</script>