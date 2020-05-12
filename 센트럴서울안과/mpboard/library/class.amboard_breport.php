<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_breport.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 불량자료신고를 관리한다.
//
//

class amboardBreport extends amboard {
	
	var $connect;

	var $group;
	var $code;
	
	var $config;
	
	/* Public Method */
	function amboardBreport($connect) {
		global $group;
		global $code;
		
		$this->connect = $connect;
		$this->group = $group;
		$this->code = $code;
		$this->gtable = $this->config[gtable];			// 테이블 구분이름
		
		$this->amboard($connect);
	}
	
	function init() {
		$this->config = $this->getConfig($this->code);
		$this->dbobj = new dbUtil($this->connect);
		$this->dbobj->setTable("amboard_breport");
	}
	
	function addfield($fields,$values,$type=1) {
		$this->dbobj->addfield($fields,$values,$type);
	}
	
	// 기본 글입력
	function write($debug=false) {
		$this->dbobj->insert($debug);
	}
	
	// 글수정
	function modify($where,$debug=false) {
		$this->dbobj->update($where,$debug);
	}
	
	// 게시물 삭제
	function delete($no) {
		$SQL="delete from amboard_breport where no='$no'";
		mysql_query($SQL,  $this->connect );
	}
	
	function getData($no) {
		$SQL = "select * from amboard_".$this->gtable." where no='$no'";
		$data = mysql_fetch_array(mysql_query($SQL,$this->connect));
		
		return $data;
	}
	
	function bprint() {
		global $_REQUEST;
		global $BROOT;
		
		global $group;
		global $code;
		
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
		
		$compiles = new skinCompile($this->config[skin],"breport.html");
		$compiles->skindir = "/mpboard/skin";
		$compiles->compiledir = "/mpboard/compile";
		$compiles->init();
		if($compiles->update()) {
			//echo "새로생성";
		} else {
			//echo "변경없음";
		}
		
		include $BROOT."/compile/".$this->config[skin]."/breport.html";
	}
}
?>