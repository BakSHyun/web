<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_comment.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 코멘트부분을 관리한다.
//
//

class amboardComment extends amboard {

	var $no;
	var $cno;

	var $tdclass;

	var $dbobj;

	var $bsort;
	var $bfsort;
	var $sortpara;

	/* Public Method */
	function amboardComment($connect) {
		$this->amboard($connect);
	}

	function init() {

		global $no;
		global $cno;
		global $sno;
		global $acmode;

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
		$this->cno = $cno;
		if(!$acmode) $acmode = "commentinsert";
		$this->dbobj = new dbUtil($this->connect);

	}


	function getListData() {

		$SQL = "select count(*) counter from amboard_".$this->gtable."_comment where code='$this->code' and fno='$this->no'";
		$countrow = mysql_fetch_array(mysql_query($SQL,$this->connect));
		$ccount = $countrow[counter];

		$SQL = "select * from amboard_".$this->gtable."_comment where code='$this->code' and fno='$this->no' order by no asc";
		$listresult = mysql_query($SQL,$this->connect);

		while($listrow=mysql_fetch_array($listresult)) {
			$listno = $ccount;

			$listrow[listno] = $ccount;
			$listrow[comment] = ereg_replace(" "," &nbsp;",nl2br(htmlspecialchars($listrow[comment])));
			$listrow[comment] = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='word-break:break-all'><tr><td class='".$this->tdclass."' valign='top'>".$listrow[comment]."</td></tr></table>";

			if($_SESSION[userlevel]!="1") {
				$comip_array = explode(".",$listrow[ip]);
				$listrow[ip] = $comip_array[0].".".$comip_array[1].".xxx.xxx";
			}
			$listrow[wdate_full] =$listrow[wdate];
			$listrow[wdate] = substr($listrow[wdate], 0, 10);
			$ccount = $ccount-1;

			$LIST[] = $listrow;
		}

		return $LIST;
	}

	function getCommentData() {
		$SQL = "select * from amboard_".$this->gtable."_comment where code='$this->code' and no='$this->cno'";
		$result = mysql_query($SQL,$this->connect);

		if($row=mysql_fetch_array($result)) {
			$CDATA[name] = $row[name];
			$CDATA[passwd] = $row[passwd];
			$CDATA[userid] = $row[userid];
			$CDATA[comment] = $row[comment];
		}

		return $CDATA;
	}

	function addfield($fields,$values,$type=1) {
		$this->dbobj->addfield($fields,$values,$type);
	}

	function write($debug=false) {
		$this->dbobj->setTable("amboard_".$this->gtable."_comment");
		$this->dbobj->insert($debug);
	}

	function modify($where,$debug=false) {
		$this->dbobj->setTable("amboard_".$this->gtable."_comment");
		$this->dbobj->update($where,$debug);
	}

	function delete($where,$debug=false) {
		$this->dbobj->setTable("amboard_".$this->gtable."_comment");
		$this->dbobj->delete($where,$debug);
	}

	function deleteall($debug=false) {
		$this->dbobj->setTable("amboard_".$this->gtable."_comment");
		$this->dbobj->delete($where,$debug);
	}

	function bprint() {
		global $_REQUEST;
		global $BROOT;
		global $INDIR;

		global $group;
		global $code;
		global $acmode;
		global $no;
		global $cno;

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


		$compiles = new skinCompile($this->config[skin],"comment.html");
		$compiles->skindir = "/$INDIR/mpboard/skin";
		$compiles->compiledir = "/$INDIR/mpboard/compile";
		$compiles->init();
		if($compiles->update()) {
			//echo "새로생성";
		} else {
			//echo "변경없음";
		}

		include $BROOT."/compile/".$this->config[skin]."/comment.html";
	}

}
?>