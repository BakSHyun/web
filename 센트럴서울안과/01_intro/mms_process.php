<?php
	/* 작성자:통큰아이 모바일 팀(sms@goodinternet.co.kr)
	* 작성일자:2011년 06월 30일
	* 작성목적: 본 프로그램은 통큰아이 MMS 호스팅에서 php 웹프로그램 관련 예제이다.
	*              본 예제에서는 보내는 사람의 핸드폰번호, 받는사람 핸드폰번호,전송내용,이미지파일 mms_main.php에서
	*              전송 받아 실제 MMS 보내는 모듈입니다..
	*              본 프로그램을 실행하려면 웹서버에 본 프로그램과 mms_process.php,nusoap_tong.php
	*              파일을 업로드하고 mms_process.php 파일에 통큰아이에서 생성하신 Mms 아이디와 패스워드를
	*              입력하면 됩니다.
	*/
	include_once('nusoap_tong.php');

	$rcv_number = $hphone1.$hphone2.$hphone3;

//echo $rcv_number;
//exit;

	$snd_number='027922226';		//보내는 사람 번호를 받음
	//$rcv_number=$_POST["rcv_number"];			//받는 사람 번호를 받음
	$mms_title = '센트럴 서울 안과 오시는길';					//MMS 메세지 제목
	//$mms_content=$_POST["mms_content"];		//전송 내용을 받음

	$mms_content = "오시는 길 안내 상세\n[센트럴서울안과]\n\n[대중교통]\n지하철: 4호선,중앙선 이촌역 4번출구 도보 150M앞\n\n버스:100번,6211번,2016, 3012번 이촌역 정류소 하차후 한강쇼핑센터 2층\n\n[자가용]\n네비게이션- 용산구이촌동 300-27. 한강쇼핑센터 입력\n한강시민공원 이촌지구 주차장 주차 후 이촌역방향 도보3분\n\n주차공간이 한정되어있는 관계로 한강시민공원을 이용해주세요\n\n한강시민공원 주차 이용시 주차권 지참하시면 무료도장 찍어드립니다.\n문의 전화 : 02-792-2226";


	$path = "../img/sub/";											 // 서버상의 MMS 발송 이미지 저장 절대경로
	$filename1 = "mms_sendimg.jpg";									// MMS 발송할 첫번째 파일이름
	//$filename2 = "goodinternet.jpg";						// MMS 발송할 두번째 파일이름

	// * MMS 로 전송할 수 있는 파일은 JPG,BMP,SIS(이미지파일) , MMF(오디오파일) 만 가능합니다.

	/******고객님 접속 정보************/
	$mms_id="cseye";            //고객님께서 부여 받으신 mms_id
	$mms_pwd="cseye";       //고객님께서 부여 받으신 mms_pwd
	/**********************************/

	$userdefine = $mms_id;         //예약취소를 위해 넣어주는 구분자 정의값, 사용자 임의로 지정해주시면 됩니다. 영문 또는 숫자로 넣어주셔야 합니다. 사용자가 구분할 수 있는 값을 넣어주세요.

	// 동보(다중) 전송시에는 받는 사람 번호를 콤마(,)로 연결합니다.


	$mms = new MMS(); //MMS 객체 생성

	/*하나의 이미지를 호출 즉시 발송합니다*/
	$result=$mms->SendMMS1($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1);// 8개의 인자로 함수를 호출합니다.

	/*두개의 이미지를 호출 즉시 발송합니다*/
	//$result=$mms->SendMMS2($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1,$path,$filename2);// 10개의 인자로 함수를 호출합니다.

	/*하나의 이미지를 예약시간에 발송합니다*/
	//$result=$mms->SendMMSReserve1($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1,$reserve_date,$reserve_time,$userdefine);// 11개의 인자로 함수를 호출합니다.

	/*두개의 이미지를 예약시간에 발송합니다*/
	//$result=$mms->SendMMSReserve2($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1,$path,$filename2,$reserve_date,$reserve_time,$userdefine);// 13개의 인자로 함수를 호출합니다.

	/*잔여량을 가져올 경우*/
	//$result=$mms->GetRemainCount($mms_id,$mms_pwd);		$funcMode = 1;
	//+) funcMode는 메소드실행 후 반환값에 따라 다른 메시지를 띄우기 위해서 쓰입니다.

	/*예약 취소*/
	//$result=$mms->ReserveCancle($mms_id,$mms_pwd,$userdefine);		$funcMode = 2;


	/*결과는 알맞게 처리합니다.*/
	/*전송결과 처리
	*1 : 발송성공
	*1~N : 콤마로 연결하여 다중 발송을 하였을 경우에는 성공한 정수 숫자로 리턴됩니다.
	*0 : MMS발송 가능량 부족
	*-1 : 잘못된 mms_id와 패스워드 입력
	*     (mms_id와 패스워드를 다시 한번 확인해주시기 바랍니다.  mms_id,패스워드는 로그인때 id와 password가 아니며,
	*      sms, LMS, MMS등의 서비스 신청시에 생성한 아이디와 패스워드입니다.)
	*-2 : mms 아이디 공백
	*-3 : 발송 모두 실패
	*      (수신자번호가 "숫자가 아닌 값"일시, 수신자번호 헨드폰 국번이 잘못된 값일시, 발송제한서버일시 값 반환)
	*-4 : 해쉬공백
	*-5 : 잘못된 mms_id와 패스워드 입력
	*     (mms_id와 패스워드를 다시 한번 확인해주시기 바랍니다.  mms_id,패스워드는 로그인때 id와 password가 아니며,
	*      sms, LMS, MMS등의 서비스 신청시에 생성한 아이디와 패스워드입니다.)
	*-8 : 발신자 전화번호 공백
	*-9 : 전송내용 공백
	*-10: 예약 날짜 이상
	*      (예약발송일자가 YYMMDD 형식이 아닐 경우 반환)
	*-11: 예약 시간 이상
	*	   (예약시간이 hhmmss 형식이 아닐 경우 반환)
	*-12: 예약 가능시간 지남
	*      (예약 발송시간이 현재 시간보다 과거인지 확인 부탁드립니다.)
	*-13: 스팸 동의서가 접수되지 않음
	*-14: URL/MMS/LMS 서비스를 신청하지 않음
	*-15 : 이미지 저장에 실패
	*-16 : 잘못된 파일 확장자
	*-23: 허용ip가 아닌 경우 반환
	*      (홈페이지 > 문자메세지 >서비스관리 > 서비스 신청내역 > 발송가능ip목록 내용을 확인해주시기 바랍니다.)
	*-50: 잘못된 전화번호

	*/

echo "<script language='javascript'>";

	if ($result > 0) {
		if ($funcMode == "1")
			echo "alert('잔여량 : ".$result."건');";
		elseif ($funcMode == "2")
			echo "alert('".$result."건 예약취소 성공');";
		else
			echo "alert('고객님의 휴대폰으로 약도를 전송하였습니다');";
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
	elseif ($result == "-23") {
		echo "alert('설정하신 허용ip 목록에 없습니다.');";
	}
	elseif ($result == "-50") {
		echo "alert('전화번호이상');";
	}
	else {
		echo "alert('Error Code ".$result."  ');";
	}
	echo "history.go(-1);";
	echo "</script>";

?>
