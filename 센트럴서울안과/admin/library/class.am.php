<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 환경설정 데이타를 관리한다.
//
//

class am {
	
	var $globalvar;
	
	var $debug;
	
	var $connect;
	
	/* Public Method */
	function am($connect) {
		$this->connect = $connect;
	}
	
	function error($enum) {
		
		if($this->debug == false) return;
		
		$message = "";
		
		if($enum == 10) $message = "잘못된 코드(code)번호 혹은 게시판 설정데이터 오류";
		if($enum == 11) $message = "잘못된 게시물번호 혹은 존재하지 않는 게시물";
		
		echo "Error Code : $enum<br>";
		echo "Message : $message<br>";
		exit;
	}

	// 그룹코드로 그룹테이블을 불러온다.
	function getGroupTable($gcode,$code) {
		
		$SQL="select * from amboard_config where gcode='".$gcode."' and code='$code'";
		$result=mysql_query($SQL,$this->connect);
		$row=mysql_fetch_array($result);
		
		return $row[gtable];
	}
	
	function addGlobalVar($gvar) {
		$this->globalvar[] = $gvar;
	}
	
	function assign($gvar) {
		$this->globalvar[] = $gvar;
	}
	
	/* 문자열을 잘라준다.  StringSize Class 가 필요하다. */
	function cutstring($subject,$cutwidth) {
	
		//제목이 일정한 글자 넓이를 넘었을때..
		$len = strlen($subject);
		$STRCTRL = new StringSize();
		$subject = $STRCTRL->cut($subject,$cutwidth);
		$len2 = strlen($subject);
		if($len != $len2) {
			$subject = $subject."...";
		}
		return $subject;
	}
}
?>