<?php
	/***************************************************************************************
	*작성일 : 2010년 7월 1일
	*기  능 : 통큰아이에서 제공하는 SMS 발송 내역 조회 웹서비스의 결과값 치환
	*작성자 : 통큰아이 SMS 팀(sms@goodinternet.co.kr)
	***************************************************************************************/

	function SMSresult($input_result){
		$return_result = str_replace(" ","",$input_result);
		$return_result = str_replace("\n","",$return_result);
		$return_result = str_replace("\r","",$return_result);
		$return_result = str_replace("<result>00</result>","<result>예약</result>",$return_result);
		$return_result = str_replace("<result>03</result>","<result>메세지 형식 오류</result>",$return_result);
		$return_result = str_replace("<result>05</result>","<result>번호형식오류</result>",$return_result);
		$return_result = str_replace("<result>06</result>","<result>발송성공</result>",$return_result);
		$return_result = str_replace("<result>07</result>","<result>비가입자, 결번,서비스정지</result>",$return_result);
		$return_result = str_replace("<result>08</result>","<result>단말기 Power off 상태</result>",$return_result);
		$return_result = str_replace("<result>09</result>","<result>음영(통화불가능지역)</result>",$return_result);
		$return_result = str_replace("<result>10</result>","<result>단말기 메시지 FULL</result>",$return_result);
		$return_result = str_replace("<result>11</result>","<result>기타 에러(이통사)</result>",$return_result);
		$return_result = str_replace("<result>13</result>","<result>번호이동관련</result>",$return_result);
		$return_result = str_replace("<result>14</result>","<result>기타 에러(무선망)</result>",$return_result);
		$return_result = str_replace("<result>18</result>","<result>메시지 중복 오류</result>",$return_result);
		$return_result = str_replace("<result>20</result>","<result>UNKNOWN</result>",$return_result);
		$return_result = str_replace("<result>21</result>","<result>착신번호 에러(자리수에러)</result>",$return_result);
		$return_result = str_replace("<result>22</result>","<result>착신번호 에러(없는 국번)</result>",$return_result);
		$return_result = str_replace("<result>23</result>","<result>수신거부 메시지 없음</result>",$return_result);
		$return_result = str_replace("<result>25</result>","<result>성인광고,대출 광고 등 기타 제한</result>",$return_result);
		$return_result = str_replace("<result>26</result>","<result>스펨메세지 발송제한</result>",$return_result);
		$return_result = str_replace("<result>40</result>","<result>단말기착신거부</result>",$return_result);
		$return_result = str_replace("<result>70</result>","<result>기타오류-KTF URL</result>",$return_result);
		$return_result = str_replace("<result>80</result>","<result>결번(이통사 Nack)</result>",$return_result);
		$return_result = str_replace("<result>81</result>","<result>전송실패(정지고객등)</result>",$return_result);
		$return_result = str_replace("<result>82</result>","<result>번호이동 DB 조회불가</result>",$return_result);
		$return_result = str_replace("<result>84</result>","<result>타임아웃</result>",$return_result);
		$return_result = str_replace("<result>85</result>","<result>전송실패(기타에러)</result>",$return_result);
		$return_result = str_replace("<NewDataSet/>","no_data",$return_result);
		return $return_result;
	}

?>