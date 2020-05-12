<!DOCTYPE html>
<html lang='ko'>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta charset='utf-8'/>
<link href="/admin/css/common.css" rel="stylesheet" type="text/css">
<link href="/admin/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<?
	//require_once "../inc/siteinfo.php";
	require_once "../../admin/inc/config.php";
	include_once('../admin/nusoap_tong.php');
	include_once('result.php');

	$mod_select = "2";	// 기본조회모드 1 (일반사용자) // 향상된 조회모드 2  (xml-reader,xml writer 기능을 사용하는 고객)

	$kind=$_GET["kind"];										//조회 종류 (count : 월 카운트 조회, report : 상세리스트 조회,reserve : 예약리스트 조회)
	$askmonth=$_GET["askmonth"];			//월 카운트 조회 시 조회 할 월
	$firstdate=$_GET["firstdate"];						//상세 리스트 조회 시 조회 시작 일자
	$seconddate=$_GET["seconddate"];  //상세 리스트 조회 시 조회 마지막 일자
	$mode=$_GET["mode"];								//조회 모드 0 : 전체내역 조회  ,  1 :  발송성공내역조회 ,  2 : 발송실패내역조회

	$sms_id=$adm_sql[adm_sms_id];					//고객님께서 부여 받으신 sms_id
	$sms_pwd=$adm_sql[adm_sms_pw];				//고객님께서 부여 받으신 sms_pwd

	$sms = new SMS();								//SMS 객체 생성

	if($kind=="count"){								//월 카운트 조회시
		$result=$sms->CountreportSMS($sms_id,$sms_pwd,$askmonth);
	}
	else if($kind =="report"){				//상세 리스트 조회시
		$result=$sms->reportSMS($sms_id,$sms_pwd,$firstdate,$seconddate,$mode);
	}
	else if($kind =="reserve"){				//예약 리스트 조회시
		$result=$sms->ReservereportSMS($sms_id,$sms_pwd);
	}
	else if($kind =="remain"){
		$result=$sms->RemainSMS($sms_id,$sms_pwd);
	}

	if($mod_select =="1"){
		echo SMSresult($result);
	}else {
		echo "<table class='admin_table_type1'><thead><tr>";
		if($kind=="count"){								//월 카운트 조회시
				echo "<th>결과</th>";
				echo "<th>전송수</th>";
				echo "</tr>";
			}
			else if($kind =="report"){				//상세 리스트 조회시
				echo "<th>전송일</th>";
				echo "<th>결과</th>";
				echo "<th>제목</th>";
				echo "<th>보낸 번호</th>";
				echo "<th>받는 번호</th>";
				echo "<th>메세지</th>";
			}
			else if($kind =="reserve"){				//예약 리스트 조회시
				echo "<th>전송일</th>";
				echo "<th>결과</th>";
				echo "<th>구분</th>";
				echo "<th>제목</th>";
				echo "<th>보낸 번호</th";
				echo "<th>받는 번호</th>";
				echo "<th>메세지</th>";
			}
			else if($kind =="remain"){		//잔여일 조회 시
				echo "<th>충전일</th>";
				echo "<th>만료일</th>";
				echo "<th>유효기간</th>";
				echo "<th>충전 문자수</th>";
				echo "<th>남은 일수</th>";
				echo "<th>남은 문자수</th>";
			}

		echo "</tr></thead><tbody>";

		$check_emty = SMSresult($result);

		$nodate_alert = iconv('euckr','utf-8','조회 결과가 없습니다.');
		$check_erorr = iconv('euckr','utf-8','실패 에러코드 ').$check_emty.iconv('euckr','utf-8',' 입니다');

			/* 실패 에러코드
			*-- 0 : 잔여량부족
			*  -5 : 해쉬이상
			*  -9 : 조회일자 다름
			*  -10 : 조회 날짜1 이상
			*  -11 : 조회 날짜2 이상
			*  -12 : 조회 가능 일자 벗어남
			*  -13 : 스팸 동의서가 접수되지 않음
			*  -21 : 데이타 베이스 이상
			*/

		if($check_emty == "no_data"){ //조회결과가 없을 때
			echo "<tr>";
			echo "<td colspan='8'>";
			echo $nodate_alert;
			echo "</td>";
			echo "</tr>";
		}
		else if( $check_emty <= "0"){ //에러발생시
			echo "<tr>";
			echo "<td colspan='8'>";
			echo $check_erorr;
			echo "</td>";
			echo "</tr>";
		}
		else{
			$xmlDoc = new Domdocument();
			$xmlDoc->loadXML(SMSresult($result));

			foreach($xmlDoc->documentElement->childNodes as $oChildNode){

				echo "<tr>";

				$currNode = $oChildNode;

				foreach($currNode->childNodes as $ocurrNode){
					echo "<td>".$ocurrNode->nodeValue."</td>";
					if($currNode->childNodes->length == 5 & $ocurrNode->nodeName == "result"){
						echo "<td>&nbsp;</td>";
					}
				}
				echo "</tr>";
			}
		}
		echo "</tbody></table>";
	}
?>

</body>
</html>