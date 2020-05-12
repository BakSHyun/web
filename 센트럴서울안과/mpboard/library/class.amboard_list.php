<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_list.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 리스트페이지를 관리한다.
//
//

class amboardList extends amboard {

	var $pageobj;

	var $pageing;

	var $totalcount;
	var $listnum;
	var $pagenum;
	var $addpara;

	var $prestr;
	var $nextstr;
	var $prestrgroup;
	var $nextstrgroup;
	var $startstr;
	var $endstr;
	var $linkclass;			// 게시판 리스트의 링크 스타일이름
	var $apagetmp;			// 현재 페이지
	var $pagetmp;			// 일반 페이지

	var $searchsql;

	var $selfield;
	var $bsort;
	var $bfsort;
	var $sortpara;

	var $tdclass;

	/* MEDIPIX 분류 설정 (08.05.15) */
	var $cate1;
	var $cate2;
	var $cate3;
	/* MEDIPIX 분류 설정 (08.05.15) */


	/* Public Method */
	function amboardList($connect) {
		global $sno;
		global $group;
		global $code;

		$this->pageobj = new pageing($sno);

		$this->amboard($connect);
		$this->sno = $sno;
		$this->prestr = "[이전]";
		$this->nextstr = "[다음]";
		$this->prestrgroup = "[이전그룹]";
		$this->nextstrgroup = "[다음그룹]";
		$this->startstr = "[처음]";
		$this->endstr = "[마지막]";
		$this->pagetmp = "[{페이지}]";
		$this->apagetmp = "[<b>{페이지}</b>]";
		$this->linkclass = "a";


	}

	function init() {

		global $group;
		global $code;
		global $no;
		global $field;
		global $search;
		global $category;
		global $bsort;
		global $bfsort;
		global $esort;

		/*MEDIPIX 게시판관리권한이 있을경우 모든글을 보기위한 추가 (08.05.15) */
		$memberinfo = $this->getAuth();
		/*MEDIPIX 게시판관리권한이 있을경우 모든글을 보기위한 추가 (08.05.15) */

		$this->bsort = $bsort;
		$this->bfsort = $bfsort;

		if($this->config[sort_check] == '1') {
			$bfsort = $this->config[sort_item];
			$bsort = $this->config[sort_order];
			$this->sortpara = "bsort=".$bsort."&bfsort=".$bfsort;
		}
		else {
			$this->sortpara = "bsort=".$bsort."&bfsort=".$bfsort;
		}

		$this->pageobj->sno = $this->sno;
		$this->pageobj->prestr = $this->prestr;
		$this->pageobj->nextstr = $this->nextstr;
		$this->pageobj->prestrgroup = $this->prestrgroup;
		$this->pageobj->nextstrgroup = $this->nextstrgroup;
		$this->pageobj->startstr = $this->startstr;
		$this->pageobj->endstr = $this->endstr;
		$this->pageobj->pagetmp = $this->pagetmp;
		$this->pageobj->apagetmp = $this->apagetmp;
		$this->pageobj->linkclass = $this->linkclass;

		if(!$this->config) {
			$this->error(10);
			exit;
		}




		if($field && $search) {
			if($field=="all") {
				$this->searchsql = " and ( name like '%$search%' or title like '%$search%' or contents like '%$search%') ";
			}
			else {
				$this->searchsql = " and $field like '%$search%' ";
			}
		}
		//마이페이지를 위해서 추가(08_05_29) S
		if($code == "mypage") {
			$this->searchsql .= " and userid = '$memberinfo[userid]'";

		}
		//마이페이지를 위해서 추가(08_05_29) E

		if($group == "minihp" && $code != "info") {
			$this->searchsql .= " and mhid = '$_COOKIE[mhid]'";
		}

		if($category != "") {
			$this->searchsql .= " and category = '$category' ";
		}

		/* MEDIPIX 분류 설정 (08.05.15) */
		if($this->cate1 != "")
		{
			$this->searchsql .= " and cate1 = '$this->cate1' ";
		}

		if($this->cate2 != "")
		{
			$this->searchsql .= " and cate2 = '$this->cate2' ";
		}

		if($this->cate3 != "")
		{
			$this->searchsql .= " and cate3 = '$this->cate3' ";
		}
		/* MEDIPIX 분류 설정 (08.05.15) */

		/*MEDIPIX 게시판관리권한이 있을경우 모든글을 보기위한 추가 (08.05.15) */
		if ($memberinfo[userlevel] >  "0" ){
			//게시판 관리자 권한이고 메디픽스 최고관리자는 아닌경우 삭제한글은 볼수 없도록
			$this->searchsql .= " and del_state <>'Y' ";
		}
		/*MEDIPIX 게시판관리권한이 있을경우 모든글을 보기위한 추가 (08.05.15) */


		if(!$this->sno) $this->sno = 0;

		$this->pageobj->listnum = $this->config[list_num];
		$this->pageobj->pagenum = $this->config[page_num];

		if(!$this->totalcount) $this->totalcount = $this->getTotalCount();
		if(!$this->totalcount) $this->totalcount = 1;

		$this->pageobj->totalcount = $this->totalcount;
		$this->pageobj->addpara = $this->gpara."&".$this->addpara."&".$this->searchpara."&".$this->sortpara."&".$this->catepara;  // MEDIPIX 분류 설정 (08.05.15)

		$this->setPage();


		$this->writeLink = "$PHP_SELF?".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=write"."&".$this->sortpara;
		$this->slistLink = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=list"."&".$this->sortpara;
		$this->listLink = "$PHP_SELF?group=$group&code=$code&".$this->addpara."&abmode=list";
		$this->deleteSelLink = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=deleteseldb"."&".$this->sortpara;

	}


	function getListData() {

		global $BDIR;
		global $bsort;
		global $bfsort;
		global $cate1;

		$tgebcount = 0;
		$agebcount = 0;

		$memberinfo = $this->getAuth();

		/*MEDIPIX 게시판관리권한이 있을경우 모든글을 보기위한 추가 (08.04.15) */
		// 관리자가 아닐경우 승인이 된글이거나 자신이 쓴글이 아니면 볼수 없다.
		//echo $memberinfo[userlevel];
		if(!$memberinfo[manage] && $memberinfo[userlevel] > 0) {
			if($memberinfo[userid]) {
				//$vstate_sql = " and (vstate='1' or userid='".$memberinfo[userid]."') and del_state <>'Y' ";
				$vstate_sql = " and (vstate='1') and del_state <>'Y' ";
			}
			else {
				$vstate_sql = " and vstate='1' and del_state <>'Y' ";
			}
			$vstatecount_sql = " or vstate<>'1' and del_state <>'Y' ";

		}

		if ($memberinfo[userlevel] >  "0" && $memberinfo[manage]){
			//게시판 관리자 권한이고 메디픽스 최고관리자는 아닌경우 삭제한글은 볼수 없도록
			$vstate_sql = " and del_state <>'Y' ";
			$vstatecount_sql = " and del_state <>'Y' ";
		}
		/*MEDIPIX 게시판관리권한이 있을경우 모든글을 보기위한 추가 (08.04.15) */


		####### 공지사항 상단 뿌려주기 설정 시작 ######
		$SQL = "select count(*) counter from amboard_".$this->gtable." where code='$this->code' $this->searchsql and wmode='1' ".$vstate_sql." ";
		$listresult = mysql_query($SQL,$this->connect);
		$listrow=mysql_fetch_array($listresult);
		$tgabcount = $listrow[counter];

		$SQL = "select count(*) counter from amboard_".$this->gtable." where code='$this->code' $this->searchsql and wmode='1' ".$vstate_sql." order by $bfsort $esort $bsort limit ".$this->pageobj->sno.", ".$this->pageobj->listnum."";
		$listresult = mysql_query($SQL,$this->connect);
		$listrow=mysql_fetch_array($listresult);
		$agabcount = $listrow[counter];

		$list_sno = 0;

		$list_listnum = $this->pageobj->listnum - $tgabcount;

		if($tgabcount && !$agabcount) {
			//$snoset = $this->pageobj->agecount;
			//if(!$snoset) $snoset = 1;
			if($this->pageobj->sno) $list_sno = $this->pageobj->sno - ($tgabcount*$snoset);
			//if($this->pageobj->sno) $list_sno = $this->pageobj->sno - $tgabcount;
			//echo $list_sno;
		}
		else {
			$list_sno = $this->pageobj->sno;
		}
		####### 공지사항 상단 뿌려주기 설정 끝 ######


		if(!$this->selfield) $this->selfield = "*";
		if($list_sno == 0) $page = 0;
		else $page = ($list_sno / $list_listnum);
		$intTotalCount = $this->totalcount;


		####### 공지사항 상단 추가 #######
		$SQL = "select $this->selfield from amboard_".$this->gtable." where code='$this->code' $this->searchsql and wmode='1' ".$vstate_sql." order by $bfsort $esort $bsort";
		$listresult = mysql_query($SQL,$this->connect);
		$LIST = $this->setListArray($LIST,$listresult,$page,$intTotalCount);

		$minus = count($LIST);

		$SQL = "select count(*) noticecount from amboard_".$this->gtable." where code='$this->code' $this->searchsql and (wmode='1' ".$vstatecount_sql.")";
		$listresult = mysql_query($SQL,$this->connect);
		$countrow = mysql_fetch_array($listresult);
		$minus = $countrow[noticecount];

		//$this->pageobj->listnum = $this->config[list_num]-$minus;
		//$this->setPage();

		//$this->pageobj->listnum = $this->config[list_num]-$minus;
		$this->pageobj->listnum = $list_listnum;
		$this->pageobj->totalcount = $this->totalcount-$minus;
		$this->setPage();

		//$this->pageobj->listnum = $list_listnum;
		//$this->setPage();

		####### 일반게시물 추가 #######
		//$SQL = "select $this->selfield from amboard_".$this->gtable." where code='$this->code' $this->searchsql order by $bfsort $bsort ,no, indent limit ".$list_sno.", ".$list_listnum."";
		if($this->code == "mypage") {
			$SQL = "select $this->selfield from amboard_".$this->gtable." where 1 $this->searchsql and wmode<>'1' ".$vstate_sql." order by $bfsort $esort $bsort limit ".$list_sno.", ".$list_listnum."";
		}else if($this->code == "web_z_img"){
			// $SQL = "select $this->selfield from amboard_".$this->gtable." where code='$this->code' $this->searchsql and wmode<>'1' ".$vstate_sql." order by $bfsort $esort $bsort limit ".$list_sno.", ".$list_listnum."";
			$SQL = "select $this->selfield from amboard_".$this->gtable." where code='$this->code' $this->searchsql and wmode<>'1' ".$vstate_sql." order by cast( etc11  as unsigned) desc, $bfsort $esort $bsort limit ".$list_sno.", ".$list_listnum."";

		}else{
			$SQL = "select $this->selfield from amboard_".$this->gtable." where code='$this->code' $this->searchsql and wmode<>'1' ".$vstate_sql." order by $bfsort $esort $bsort limit ".$list_sno.", ".$list_listnum."";

		}
		$listresult = mysql_query($SQL,$this->connect);

		$LIST = $this->setListArray($LIST,$listresult,$page,$intTotalCount,$minus);

		if($this->code == "media01") {
			//echo $SQL;
		}

		if($_SESSION[userid] == "medipix") {
			//echo $SQL;
			//exit;
		}

		return $LIST;
	}


	function setListArray($LIST,$listresult,$page,$intTotalCount,$minus=0) {

		global $BDIR;
		global $INDIR;
		global $bsort;
		global $bfsort;
		global $group;
		global $code;

		while($listrow=mysql_fetch_array($listresult)) {
			$listno = $intTotalCount - ($this->pageobj->listnum*($page)) - $minus;

			// 첨부파일이 있을경우 설정
			$fileinfo = $this->getFileData($listrow[no]);
			$firstfileinfo = $fileinfo[0];	// 첫번째 파일정보를 구한다.
			$filepathinfo = pathinfo($firstfileinfo[name]);
			//echo $filepathinfo[filename];
			//echo $filepathinfo[extension];
			//echo "<br>";
			//echo $firstfileinfo[downlink];



			// 파일확장자가 이미지 확장자이면...
			if(!strcasecmp($filepathinfo[extension], "gif") || !strcasecmp($filepathinfo[extension], "jpg") || !strcasecmp($filepathinfo[extension], "png")) {
				//$listrow[addimgfile] = "/$INDIR/mpboard/imgview.php?no=".$firstfileinfo[no]."&group=".$this->group."&code=".$this->code."&mode=thumbs";
				$listrow[addimgfile] = "/$INDIR/mpboard/imgview.php?no=".$firstfileinfo[no]."&group=".$this->group."&code=".$this->code;
			}
			else {
				$listrow[addimgfile] = "/$INDIR/mpboard/skin/".$this->config[skin]."/skin_images/imgerror.gif";
			}

			// 파일다운로드 수
			$listrow[addfilecount] = $firstfileinfo[count];

			$listrow[commentcount] = $this->getCommentCount($listrow[no]);

			// 추가입력필드값 정보
			$listrow[addfieldvalue] = $this->getAddFieldValue($listrow[no]);

			$filecount = sizeof($fileinfo);
			$cutwidth = $this->config[cut_width];	// 리스트에서 제목글 자르기 넓이정보
			$con_cutwidth = $this->config[contents_cut_width];	// 리스트에서 내용글 자르기 넓이정보

			if($filecount > 3) $filecount = 3;

			$secretimg = "<img src='/$INDIR/$BDIR/skin/".$this->config[skin]."/skin_images/secret.gif' border='0' align='absmiddle'>";
			$newimg = "<img src='/$INDIR/$BDIR/skin/".$this->config[skin]."/skin_images/new.gif' border='0' align='absmiddle'>";
			$reimg = "<img src='/$INDIR/$BDIR/skin/".$this->config[skin]."/skin_images/re.gif' border='0' align='absmiddle'>";
			$listrow[reimg] = $reimg;
			$firstfileinfo[downlink];
			$listrow[fileicon] = "<a href='$firstfileinfo[downlink]&group=$group&code=$code'><img src='/$INDIR/$BDIR/icon/disk_".$filecount.".gif' border='0'></a>";

			$listrow[listno] = $listno;
			if($listrow[wmode] == "1") $listrow[listno] = "공지";
			//$listrow[title] = $listrow[title];


			if($cutwidth) $listrow[cuttitle] = cutstring($listrow[title],$cutwidth);	// 제목을 넓이에 맞게 자른다.
			else $listrow[cuttitle] = $listrow[title];

			// 제목은 HTML 테그를 막는다.
			$ctitle = $listrow[cuttitle];
			$ctitle = str_replace("<", "&lt;", $ctitle);
			$ctitle = str_replace(">", "&gt;", $ctitle);
			$listrow[cuttitle] = $ctitle;

			if ($listrow[del_state] =="Y"){
				$listrow[cuttitle] = "<font  color='red'>[삭제글] </font>".$listrow[cuttitle];
			}

			$listrow[viewlink] = "sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara.$this->catepara."&abmode=view&no=".$listrow[no]."&".$this->sortpara; // MEDIPIX 분류 설정 (08.05.15)
			$listrow[linktitle] = "<a href='$PHP_SELF?$listrow[viewlink]' class='$this->linkclass'>".$listrow[cuttitle]."</a>";
			$listrow[wdate_org] = $listrow[wdate];
			$listrow[wdate] = substr($listrow[wdate], 0, 10);
			if($listrow[category]=="0" || $listrow[category]=="일반") $listrow[category]="일반";
			else {
				if ($code <> "counsel01"){
					//퍼스트 치과 온라인 상담에 리스트에 이미지 연결하기 위한 작업
					$listrow[category] = $this->getCategory($listrow[category]);
				}
			}

			$listrow[modifyLink] = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=modify&no=".$listrow[no]."&".$this->sortpara;

			if($listrow[html] == 0) $listrow[contents] = nl2br($listrow[contents]);
			$listrow[contents] = $listrow[contents];

			/* MEDIPIX 내용글 자르기 추가 (08.04.18) */
			$listrow[contents] = strip_tags($listrow[contents]);
			$listrow[contents] = str_replace('p{margin:0px;}','',$listrow[contents]);
			$listrow[contents] = str_replace('td {font-size:9pt;}','',$listrow[contents]);
			$listrow[contents] = str_replace('&nbsp;','',$listrow[contents]);
			$listrow[contents] = trim($listrow[contents]);


			if($con_cutwidth) $listrow[cutcontents] = cutstring($listrow[contents],$con_cutwidth);	// 내용을 넓이에 맞게 자른다.
			else $listrow[cutcontents] = $listrow[contents];

			/* MEDIPIX 내용글 자르기 추가 (08.04.18) */

			// 답글인 경우 re 이미지 포함
			if($listrow[indent] > 0) {
				$listrow[linktitle] = "<img src='/$INDIR/$BDIR/skin/".$this->config[skin]."/skin_images/re.gif' border='0'>".$listrow[linktitle];
				for($i=0;$i<$listrow[indent];$i++) $listrow[linktitle] = "&nbsp;&nbsp;".$listrow[linktitle];
			}

			// 비밀글일 경우 아이콘 추가
			if($listrow[secret]) {
				$listrow[linktitle] = $listrow[linktitle]." ".$secretimg;
			}

			$listrow[ititle] = $listrow[cuttitle];

			// 새글일 경우 NEW 아이콘 추가
			if($this->config[new_time]) {
				if((mktime()-strtotime($listrow[wdate_org])) < $this->config[new_time]*60*60) {
					$listrow[linktitle] = $listrow[linktitle]." ".$newimg;
					$listrow[ititle] = $listrow[cuttitle]." ".$newimg;
					$listrow[newimg] = $newimg;
				}
			}

			$listrow[test11] = $this->config[new_time]*60*60 ;
			$listrow[test22] = (mktime()-strtotime($listrow[wdate]));


			// Cool 카운터 색상 변환
			if($this->config[cool_count]) {
				if($this->config[cool_count] <= $listrow[view]) $listrow[viewcount] = "<font color='red'>".$listrow[view]."</font>";
				else $listrow[viewcount] = $listrow[view];
			}
			else {
				$listrow[viewcount] = $listrow[view];
			}

			if($memberinfo[userlevel] <  "3"){
				if($listrow[vstate]!=1) $listrow[vstate_str] = "<font color='red'>[비승인]</font>";
			}
			if($this->config[kind] <> "counsel") {
				if($listrow[vstate]!=1) $listrow[vstate_str] = "<font color='red'>[비승인]</font>";
			}

			/* MEDIPIX 상담관련 리스트 표시 추가 -pooh (08.05.15) */
			if($this->config[kind] == "counsel")
			{
				if($listrow[recontents] != "") $listrow[result] = "답변완료";
				else $listrow[result] = "처리중";
			}
			else if($this->config[kind] == "reserve")
			{
				if($listrow[result] == "0") $listrow[result] = "예약대기";
				else if($listrow[result] == "1") $listrow[result] = "접수완료";
				else if($listrow[result] == "2") $listrow[result] = "취소완료";
				else if($listrow[result] == "3") $listrow[result] = "진료완료";
			}

			if($listrow[secret] == "0") $listrow[vsecret] = "공개";
			else if($listrow[secret] == "1") $listrow[vsecret] = "비공개";
			/* MEDIPIX 상담관련 리스트 표시 추가 (08.04.15) */

			$LIST[] = $listrow;

			$intTotalCount = $intTotalCount - 1;
		}

		return $LIST;
	}


	function getTotalCount() {
		if($this->code == "mypage") {
			$SQL = "select count(*) counter from amboard_".$this->gtable." where 1 $this->searchsql ";
		}
		else{
			$SQL = "select count(*) counter from amboard_".$this->gtable." where code='$this->code' $this->searchsql ";
		}
		$countrow = mysql_fetch_array(mysql_query($SQL,$this->connect));
		return $countrow[counter];
	}

	function getPageing() {
		return $this->pageing;
	}

	function getViewLink($no) {
		return "sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=view&no=".$no."&".$this->sortpara;
	}

	function getWriteLink() {
		return $this->writeLink;
	}

	function getListLink() {
		return $this->listLink;
	}

	function getDeleteSelLink() {
		return $this->deleteSelLink;
	}


	function getSearchListLink() {
		return $this->slistLink;
	}

	function getCommentCount($no) {
		$SQL = "select count(*) counter from amboard_".$this->gtable."_comment where code='$this->code' and fno='$no' ";
		$countrow = mysql_fetch_array(mysql_query($SQL,$this->connect));
		return $countrow[counter];
	}

	function setSearch($search_array) {

	}

	function setPage($pagename="") {
		$this->pageing = $this->pageobj->setPage($pagename);
		return $this->pageing;
	}

	function bprint() {
		global $_REQUEST;
		global $BROOT;
		global $INDIR;
		global $connect;

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

		//	일정관리용 함수 뿌리기
		$bobj = new amboard_diary();
		$DIARY = $bobj->amboard_diary();

		$compiles = new skinCompile($this->config[skin],"list.html");
		$compiles->skindir = "/$INDIR/mpboard/skin";
		$compiles->compiledir = "/$INDIR/mpboard/compile";
		$compiles->init();
		if($compiles->update()) {
			//echo "새로생성";
		}
		else {
			//echo "변경없음";
		}

		//include $BROOT."/skin/".$this->config[skin]."/list.html";
		include $BROOT."/compile/".$this->config[skin]."/list.html";

	}


}

?>
