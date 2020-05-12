<meta charset='utf-8'/>
<? require_once $_SERVER[DOCUMENT_ROOT].'/amconfig.php'; ?>
<?
	session_start();

	$sms_kind=$_POST[sms_kind]; // 1 sms 2 mms 3 lms
	$sms_num=$_POST[sms_num]; // 1 대인 2 다중

	if($sms_num=='1'){
		$rcv_number=$_POST[tonum];
	}else{
		$rcv_number=$_POST[tonums];
	}

	$rcv_number=str_replace(' ','',$rcv_number);
	$rcv_number=str_replace('-','',$rcv_number);

	$snd_number=$_POST[fromnum];
	$sms_content=$_POST[msg_cont];
	$sms_title=$_POST[sms_title];

//	$sms_id="mediphics";            //고객님께서 부여 받으신 sms_id
//	$sms_pwd="684768";       //고객님께서 부여 받으신 sms_pwd

	/******고객님 접속 정보************/
	$sms_id=$adm_sql[adm_sms_id];            //고객님께서 부여 받으신 sms_id
	$sms_pwd=$adm_sql[adm_sms_pw];       //고객님께서 부여 받으신 sms_pwd
	/**********************************/



//코멘트에 sms발송내용 저장
	$wdate = date("Y-m-d H:i:s");
	$ip = $_SERVER["REMOTE_ADDR"];

	$dbobj = new dbUtil($connect);
	$dbobj->setTable("amboard_basic_comment");

	$dbobj->addfield("crm2","SMS 발송");
	$dbobj->addfield("fno",$no);
	$dbobj->addfield("code",$code);
	$dbobj->addfield("name",$_SESSION[username]);
	$dbobj->addfield("userid",$_SESSION[userid]);
	$dbobj->addfield("comment",$sms_content);
	$dbobj->addfield("ip",$ip);
	$dbobj->addfield("wdate",$wdate);
	$dbobj->insert();



	if($sms_kind=='1'){

		$webService = "http://webservice.tongkni.co.kr/sms.3/ServiceSMS.asmx?WSDL";

		include_once('nusoap_tong_sms.php');
		$sms = new SMS($webService);
		$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);
	}else if($sms_kind=='2'){

		$reserve_date='';
		$reserve_time='';
		$userdefine='mediphics';

		$webService = "http://mmsservice.tongkni.co.kr/mms.1/ServiceMMS.asmx?WSDL";

		$path='./upload_tmp/';
		$filename=$_FILES[sms_file][name];
		$path2=$path.$filename;
		move_uploaded_file($_FILES[sms_file][tmp_name],$path2);

		include_once('nusoap_tong_mms.php');
		$mms = new MMS($webService);
		$result=$mms->SendMMS1($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_title,$sms_content,$path,$filename);
		echo $result;

	}else if($sms_kind=='3'){

		$webService = "http://lmsservice.tongkni.co.kr/lms.1/ServiceLMS.asmx?WSDL";

		include_once('nusoap_tong_lms.php');
		$lms = new LMS($webService);
		$result=$lms->SendLMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_title,$sms_content);
	}

	echo "<script language='javascript'>";

	if ($result > 0) {
		if ($funcMode == "1")
			echo "alert('잔여량 : ".$result."건');";
		elseif ($funcMode == "2")
			echo "alert('".$result."건 예약취소 성공');";
		else
			echo "alert('".$result."건 전송 성공');";
	}
	elseif ($result == "0") {
		if ($funcMode == "2") {
			echo "alert('예약내역이 없음');";
		}
		else {
			echo "alert('잔여량부족');";
		}
	}
	elseif ($result == "-1") {
		echo "alert('잘못된 mms_id와 패스워드 입력.');";
	}
	elseif ($result == "-2") {
		echo "alert('MMS 아이디 공백.');";
	}
	elseif ($result == "-3") {
		echo "alert('발송 모두 실패');";
	}
	elseif ($result == "-5") {
		echo "alert('잘못된 mms_id와 패스워드 입력.');";
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
	elseif ($result=="-15") {
		echo "alert('이미지 저장 실패');";
	}
	elseif ($result=="-16") {
		echo "alert('잘못된 파일 확장자');";
	}
	elseif ($result=="-17") {
		echo "alert('이미지 제한량(300kb) 초과');";
	}
	elseif ($result == "-23") {
		echo "alert('설정하신 허용ip 목록에 없습니다.');";
	}
	elseif ($result == "-50") {
		echo "alert('전화번호이상');";
	}
	else {
		echo "alert('Error Code [".$result."]  ');";
	}
	echo "history.go(-1);";

	echo "</script>";

?>