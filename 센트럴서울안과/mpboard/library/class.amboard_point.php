<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_point.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 게시물 포인트 부분을 관리한다.
//
//

class amboardPoint extends amboard {
	
	var $no;
	var $dbobj;
	var $point;
	
	var $bsort;
	var $bfsort;
	var $sortpara;
	
	/* Public Method */
	function amboardPoint($connect) {
		$this->amboard($connect);
	}
	
	function init() {
		
		global $no;
		global $point;
		global $apmode;
		
		global $bsort;
		global $bfsort;
		
		$this->bsort = $bsort;
		$this->bfsort = $bfsort;
		$this->sortpara = "bsort=".$bsort."&bfsort=".$bfsort;

		if(!$no) {
			$this->error(11);
			exit;
		}
		
		$this->no = $no;
		$this->point = $point;
		if(!$apmode) $apmode = "pointform";
		$this->dbobj = new dbUtil($this->connect);
		
	}
	
	function update($debug=false) {
		
		$point_check = "";
		
		$ip = $_SERVER["REMOTE_ADDR"];
		$userid = $_SESSION[userid];
		
		if($userid) {
			$point_check = $userid."|";
		} else {
			$point_check = $ip."|";
		}

		$SQL = "select point_check from amboard_".$this->gtable." where code='$this->code' and no='$this->no' ";
		$result = mysql_query($SQL,$this->connect);
		if($row=mysql_fetch_array($result)) {
			
			$point_tmp = str_replace($point_check, "", $row[point_check]);
			
			if($point_tmp != $row[point_check]) {	// 이미 IP 나 ID 가 존재 하는 경우
				return false;
			} else {
				$point_check = $row[point_check].$point_check;
			}
		}
		
		$SQL = "update amboard_".$this->gtable." set point=point+$this->point, point_check='$point_check' where code='$this->code' and no='$this->no'";
		$result = mysql_query($SQL,$this->connect);
		
		if($debug) echo $SQL."<br>";
		
		return true;
	}
	
	function getPoint() {
		
		$point_int = 0;
		
		$SQL = "select point from amboard_".$this->gtable." where code='$this->code' and no='$this->no'";
		$result = mysql_query($SQL,$this->connect);
		
		if($row=mysql_fetch_array($result)) {
			$point_int = $row[point];
		}
		
		return $point_int;
	}
	
	function bprint() {
		global $_REQUEST;
		global $BROOT;
		global $INDIR;
		
		global $group;
		global $code;
		global $apmode;
		global $no;
		
		if(is_array($this->globalvar)) {
			reset($this->globalvar);
			while(list($key, $value)=each($this->globalvar)) {
				global $$value;
			}
		}
				
		if(is_array($_REQUEST)) {
			reset($_REQUEST);
			while(list($key, $value)=each($_REQUEST)) {
				$$key = $value;
			}
		}
		
		$compiles = new skinCompile($this->config[skin],"point.html");
		$compiles->skindir = "/$INDIR/mpboard/skin";
		$compiles->compiledir = "/$INDIR/mpboard/compile";
		$compiles->init();
		if($compiles->update()) {
			//echo "새로생성";
		} else {
			//echo "변경없음";
		}
		
		include $BROOT."/compile/".$this->config[skin]."/point.html";
	}
	
}
?>