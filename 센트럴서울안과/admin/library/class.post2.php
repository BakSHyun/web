<?
//
//
//  @ Project : amsolution
//  @ File Name : class.post.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : 우면번호 찾기
//
//

class post extends am {
	
	var $connect;
	var $ziptable;
	
	var $totalcount;
	var $listnum;
	var $pagenum;
	var $pageing;
	
	var $addpara;
	var $gpara;
	var $searchpara;
	
	var $prestr;
	var $nextstr;
	var $prestrgroup;
	var $nextstrgroup;
	var $startstr;
	var $endstr;
	var $linkclass;			// 링크 스타일이름
	
	/* Public Method */
	function post($connect) {
		global $sno;
		
		$this->connect = $connect;
		
		$this->pageobj = new pageing($sno);
		$this->sno = $sno;
		$this->prestr = "[이전]";
		$this->nextstr = "[다음]";
		$this->prestrgroup = "[이전그룹]";
		$this->nextstrgroup = "[다음그룹]";
		$this->startstr = "[처음]";
		$this->endstr = "[마지막]";
		$this->pagetmp = "[{페이지}]";
		$this->apagetmp = "[<b>{페이지}</b>]";

	}
	
	function init() {
		if(!$this->ziptable) $this->ziptable = "zipcode";
		
		$this->pageobj->sno = $this->pageobj->sno;
		$this->pageobj->prestr = $this->pageobj->prestr;
		$this->pageobj->nextstr = $this->pageobj->nextstr;
		$this->pageobj->prestrgroup = $this->pageobj->prestrgroup;
		$this->pageobj->nextstrgroup = $this->pageobj->nextstrgroup;
		$this->pageobj->startstr = $this->pageobj->startstr;
		$this->pageobj->endstr = $this->pageobj->endstr;
		$this->pageobj->pagetmp = $this->pageobj->pagetmp;
		$this->pageobj->apagetmp = $this->pageobj->apagetmp;
		
		$this->pageobj->listnum = $this->listnum;
		$this->pageobj->pagenum = $this->pagenum;
		
		if(!$this->sno) $this->sno = 0;
		
		if(!$this->totalcount) $this->totalcount = $this->getTotalCount();
		if(!$this->totalcount) $this->totalcount = 1;
		
		$this->pageobj->totalcount = $this->totalcount;
		$this->pageobj->addpara = $this->gpara."&".$this->addpara."&".$this->searchpara;
		
		$this->setPage();
	}
	
	function getListData() {
		
		global $dong;
		
		if(!$this->selfield) $this->selfield = "*";
		if($this->pageobj->sno == 0) $page = 0;
		else $page = ($this->pageobj->sno / $this->pageobj->listnum);
		$intTotalCount = $this->totalcount;
		
		$SQL = "select * from ".$this->ziptable." where DONG like '%$dong%' order by NO ASC limit ".$this->pageobj->sno.", ".$this->pageobj->listnum."";
		$listresult = mysql_query($SQL,$this->connect);
		
		while($listrow=mysql_fetch_array($listresult)) {
			$listno = $intTotalCount - ($this->pageobj->listnum*($page));
			$listrow[listno] = $listno;
			
			$LIST[] = $listrow;
			
			$intTotalCount = $intTotalCount - 1;
		}
		
		return $LIST;
	}
	
	function getTotalCount() {
		
		global $dong;
		
		$SQL = "select count(*) counter from ".$this->ziptable." where DONG like '%$dong%'";
		$countrow = mysql_fetch_array(mysql_query($SQL,$this->connect));
		return $countrow[counter];
	}
	
	function getPageing() {
		return $this->pageing;
	}
	
	function setPage($pagename="") {
		$this->pageing = $this->pageobj->setPage($pagename);
		return $this->pageing;
	}

	function amprint() {
		global $_REQUEST;
		global $MROOT;
		
		global $group;
		
		if(is_array($this->globalvar)) while(list($key, $value)=each($this->globalvar)) {
			global $$value;
		}
		
		if(is_array($_REQUEST)) while(list($key, $value)=each($_REQUEST)) {
			$$key = $value;
		}
		
		include $MROOT."/skin/default/post.html";
	}
}
?>