<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_passwd.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의  페스워드를 관리한다.
//
//

class amboardPasswd extends amboard {
	
	var $no;
	var $dbobj;
	
	var $bsort;
	var $bfsort;
	var $sortpara;
	
	/* Public Method */
	function amboardPasswd($connect) {
		$this->amboard($connect);
	}
	
	function init() {
		
		global $no;
		global $cno;
		
		global $bsort;
		global $bfsort;
		
		$this->bsort = $bsort;
		$this->bfsort = $bfsort;
		$this->sortpara = "bsort=".$bsort."&bfsort=".$bfsort;

		$this->no = $no;
		$this->cno = $cno;
		$this->dbobj = new dbUtil($this->connect);
		
	}

	function passwdCheck($passwd,$mode,$memid) {
		
		global $_SESSION;
		
		$revalue;
		
		// 최고관리자의 경우 페스워드확인을 통과한다.
		if($_SESSION[userlevel] && $_SESSION[userlevel] <= 1) return true;	/* MEDIPIX 카피부분삭제 (08.05.07) */
		
		if($mode=="board") $revalue = $this->boardPasswd($passwd,$memid);
		if($mode=="comment") $revalue = $this->commentPasswd($passwd,$memid);
		
		return $revalue;
	}
	
	function boardPasswd($passwd,$memid) {
		
		global $_SESSION;
		
		$SQL = "select no,passwd,relation,secret from amboard_".$this->gtable." where no='$this->no'";
		$crow = mysql_fetch_array(mysql_query($SQL,$this->connect));
		
		$SQL = "select passwd from amboard_".$this->gtable." where no='$this->no' and passwd='$passwd'";
		if($crow[relation] != 0 && $crow[secret] == 1) { // 답글이며, 답글이 비밀글일 경우...
			// 원본글의 비밀번호와 비교하여 채크한다.
			$SQL = "select passwd from amboard_".$this->gtable." where no='".$crow[relation]."' and passwd='$passwd'";
		}
		if($memid) {
			$SQL = "select passwd from amboard_".$this->gtable." where no='$this->no' and userid='$memid'";
			if($crow[relation] != 0 && $crow[secret] == 1) { // 답글이며, 답글이 비밀글일 경우...
				$SQL = "select passwd from amboard_".$this->gtable." where no='".$crow[relation]."' and userid='".$_SESSION[userid]."'";
			}
		}
		
		$row = mysql_fetch_array(mysql_query($SQL,$this->connect));
		
		if($row) return true;
		else return false;
	}
	
	function commentPasswd($passwd,$memid) {
		$SQL = "select passwd from amboard_".$this->gtable."_comment where no='$this->cno' and passwd='$passwd'";
		if($memid) $SQL = "select passwd from amboard_".$this->gtable."_comment where no='$this->cno' and userid='$memid'";
		$row = mysql_fetch_array(mysql_query($SQL,$this->connect));
		
		if($row) return true;
		else return false;
	}
	
}

?>
