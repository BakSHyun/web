<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_slist.php
//  @ Date : 2005-10-08
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 최근게시물 정보를 불러온다.
//
//

class sboardlist extends am {

	var $connect;
	var $blist;
	var $bsort;
	var $bfsort;
	var $blistsort;
	var $linkclass;
	var $mypage;   //08.06.05 mypage를 위한 변수 추가
	var $mp;     //08.06.05 mypage를 위한 변수 추가

	function sboardlist($connect) {
		$this->connect = $connect;
		$this->bsort = "desc";
		$this->bfsort = "ino";
		$this->blistsort = 1;
	}

	function getListData($group,$code,$line,$cutwidth=0,$cate1,$category) {
		global $boardurl;
		global $skin;
		global $INDIR;
		global $contentscutwidth;

		$this->blist=null;

		$upload = "/".$INDIR."/mpboard/upload/";
		if($code) $code_where = $this->getCodeWhere($code);

		$SQL ="select * from amboard_config  where gcode='$group' $code_where order by no";
		$result = mysql_query($SQL,$this->connect);
		$row = mysql_fetch_array($result);

		$gtable = $row[gtable];

		if(!$gtable) return;

		if($cate1){ $cate1_where = "and cate1='$cate1' "; }else{ $cate1_where=""; };
		if($category){ $category_where = "and category='$category' "; }else{ $category_where=""; };

		if($this->mp == 'mypage') {
			$SQL = "select * from amboard_".$gtable." where 1 $code_where and wmode<>'1' and vstate='1' and userid = '".$this->mypage."' and userid !='' order by ".$this->bfsort." ".$this->bsort." limit ".$line."";
		}else{
			//$SQL = "select * from amboard_".$gtable." where 1 $code_where $cate1_where $category_where and vstate='1' and del_state <> 'Y' order by etc1 desc, ".$this->bfsort." ".$this->bsort." limit ".$line."";
			$SQL = "select * from amboard_".$gtable." where 1 $code_where $cate1_where $category_where and vstate='1' and del_state <> 'Y' order by ino desc, ".$this->bfsort." ".$this->bsort." limit ".$line."";
		}

		//echo $SQL;
		$listresult = mysql_query($SQL,$this->connect);
		while($listrow=mysql_fetch_array($listresult)) {

			$config = $this->getConfig($listrow[code]);

			$fileinfo = $this->getFileData($listrow[no],$gtable,$upload);
			$firstfileinfo0 = $fileinfo[0];	// 첫번째 파일정보를 구한다.
			$filepathinfo0 = pathinfo($firstfileinfo0[name]);


//			if($firstfileinfo0[vname] == 'file1'){
//			echo $firstfileinfo0[vname];
				// 파일확장자가 이미지 확장자이면...
				if(!strcasecmp($filepathinfo0[extension], "gif") || !strcasecmp($filepathinfo0[extension], "jpg") || !strcasecmp($filepathinfo0[extension], "png")) {
					$listrow[addimgfile] = "/".$INDIR."/mpboard/imgview.php?no=".$firstfileinfo0[no]."&group=".$group."&code=".$code."&mode=";
				} else {
					$listrow[addimgfile] = "/".$INDIR."/mpboard/skin_newlist/".$skin."/skin_images/imgerror.gif";
				}
//			}


			$firstfileinfo1 = $fileinfo[1];	// 두번째 파일정보를 구한다.
			$filepathinfo1 = pathinfo($firstfileinfo1[name]);

//			echo $firstfileinfo1[vname]."asd";

			
			if($firstfileinfo1[vname] == 'file2'){  //vname == file2 일경우 해당 file2 이미지 
				// 파일확장자가 이미지 확장자이면...
				if(!strcasecmp($filepathinfo1[extension], "gif") || !strcasecmp($filepathinfo1[extension], "jpg") || !strcasecmp($filepathinfo1[extension], "png")) {
					$listrow[addimgfile1] = "/".$INDIR."/mpboard/imgview.php?no=".$firstfileinfo1[no]."&group=".$group."&code=".$code."&mode=";
				} else {
					$listrow[addimgfile1] = "/".$INDIR."/mpboard/skin_newlist/".$skin."/skin_images/imgerror.gif";
				}
			}else{  //vname != file2 일경우 file1 이미지 
				// 파일확장자가 이미지 확장자이면...
				if(!strcasecmp($filepathinfo0[extension], "gif") || !strcasecmp($filepathinfo0[extension], "jpg") || !strcasecmp($filepathinfo0[extension], "png")) {
					$listrow[addimgfile1] = "/".$INDIR."/mpboard/imgview.php?no=".$firstfileinfo0[no]."&group=".$group."&code=".$code."&mode=";
				} else {
					$listrow[addimgfile1] = "/".$INDIR."/mpboard/skin_newlist/".$skin."/skin_images/imgerror.gif";
				}
			}

			// 파일다운로드 수
			$listrow[addfilecount] = $firstfileinfo[count];
			if($filecount > 3) $filecount = 3;
			$listrow[fileicon] = "<img src='/$BDIR/icon/disk_".$filecount.".gif' border='0'>";



			// 추가입력필드값 정보 ([필드명]='값' 형태의 배열로 입력된다)
			$listrow[addfieldvalue] = $this->getAddFieldValue($listrow[no],$gtable,$code);

//			echo $listrow[title];


			//echo "<br />";
			if($cutwidth) $listrow[cuttitle] = utf8_cutstr($listrow[title],$cutwidth);	// 제목을 넓이에 맞게 자른다.
			else $listrow[cuttitle] = $listrow[title];
//			echo $listrow[cuttitle];
			//echo "<br />";

			$listrow[boardurl] = $boardurl;
			if($this->blistsort == 1) {
				$listrow[viewlink] = "group=$group&code=".$listrow[code]."&no=".$listrow[no]."&bsort=".$this->bsort."&bfsort=".$this->bfsort."&abmode=view";
			} else {
				$listrow[viewlink] = "group=$group&code=".$listrow[code]."&no=".$listrow[no]."&bsort=desc&bfsort=ino&abmode=view";
			}
			$listrow[linktitle] = "<a href='$boardurl?$listrow[viewlink]' class='$this->linkclass'>".$listrow[cuttitle]."</a>";


			/* MEDIPIX 내용글 자르기 추가 (08.04.18) */

			$listrow[contents] = strip_tags($listrow[contents]);

			//echo "여기:".$contentscutwidth;
			if($contentscutwidth) $listrow[cutcontents] = utf8_cutstr($listrow[contents],$contentscutwidth);	// 제목을 넓이에 맞게 자른다.

			$listrow[linkcontents] = "<a href='$boardurl?$listrow[viewlink]' class='$this->linkclass'>".$listrow[cutcontents]."</a>";

			/* MEDIPIX 내용글 자르기 추가 (08.04.18) */

			$listrow[wdate_time] = $listrow[wdate];
			$listrow[wdate] = substr($listrow[wdate], 0, 10);

			if($listrow[category] == 0) $listrow[category_name]="일반";
			else {
				$categorydata = $this->getCategory($gtable,$code,$listrow[category]);
				$listrow[category_name] = $categorydata[cname];
			}
			// 답글인 경우 re 이미지 포함
			if($listrow[indent] > 0) {
				$listrow[linktitle] = "<img src='/".$INDIR."/mpboard/skin_newlist/".$skin."/skin_images/re.gif' border='0'>".$listrow[linktitle];
				for($i=0;$i<$listrow[indent];$i++) $listrow[linktitle] = "&nbsp;&nbsp;".$listrow[linktitle];
			}


//			// 새글일 경우 NEW 아이콘 추가
//
//			$newimg = "<img src='/$INDIR/$BDIR/mpboard/skin/".$config[skin]."/skin_images/new.gif' border='0' align='absmiddle'>";
//
//			if($config[new_time]) {
//				if((mktime()-strtotime($listrow[wdate_time])) < $config[new_time]*60*60) {
//					$listrow[linktitle] = $listrow[linktitle]." ".$newimg;
//					$listrow[ititle] = $listrow[cuttitle]."aaa ".$newimg;
//					$listrow[newimg] = $newimg;
//				}
//			}

			// 새글일 경우 NEW 아이콘 추가
			if($config[new_time]) {

				$check_time=(time()-strtotime($listrow[wdate_time]))/60/60;
					if($check_time <= 24) {
					//$listrow[newimg] = "<img src='/".$INDIR."/mpboard/skin_newlist/".$skin."/skin_images/new.gif' border='0'>";
					$listrow[newimg] = " <img src='/".$INDIR."/mpboard/skin_newlist/".$skin."/skin_images/new.gif' border='0'>";
					$listrow[linktitle] = $listrow[linktitle]." ".$listrow[newimg];
				}
			}


			$this->blist[] = $listrow;
		}

		return $this->blist;
	}

	function getCodeWhere($code) {
		if($code) {
			$code_array = explode(",",$code);
			if(is_array($code_array)) {
				while(list($key, $cvalue)=each($code_array)) {
					if($code_where) $code_where .= " or code='$cvalue' ";
					else $code_where = " code='$cvalue' ";
				}
				$code_where = " and (" . $code_where . ") ";
			} else {
				$code_where = " and code='$code' ";
			}
		}

		return $code_where;
	}

	/* 게시판 카테고리 정보를 불러온다. */
	function getCategory($gtable,$code,$no) {
		if($code) $code_where = $this->getCodeWhere($code);

		$SQL="select * from amboard_".$gtable."_category where 1 $code_where and no='".$no."' ";
		$result = mysql_query($SQL,$this->connect);
		if($row=mysql_fetch_array($result)) {
			$cadata[no] = $row[no];
			$cadata[code] = $row[code];
			$cadata[cname] = $row[cname];
		}
		return $cadata;
	}


	/* 게시물의 파일정보를 불러온다. */
	function getFileData($no,$gtable,$upload) {

		$this->fileobj = new fileManager($this->connect,"amboard_".$gtable."_file",$upload);
		$this->fileobj->downfile = $this->downfile;
		$this->fileobj->viewfile = $this->viewfile;
		$this->fileobj->init();

		$infos[fno] = $no;

		$fileinfo = $this->fileobj->getFileData($infos);

		return $fileinfo;
	}

	function getTotalCount($gtable,$code) {

		if($code) $code_where = $this->getCodeWhere($code);

		$SQL = "select count(*) counter from amboard_".$gtable." where 1 $code_where ";
		$countrow = mysql_fetch_array(mysql_query($SQL,$this->connect));
		return $countrow[counter];
	}

	/* 게시판 기본설정을 불러온다. */
	function getConfig($code) {

		$SQL = "select * from amboard_config where code='$code'";
		$result = mysql_query($SQL,$this->connect);
		$row = mysql_fetch_array($result);
		return $row;
	}

	/* 추가로 입력된 데이타필드정보를 불러온다. */
	function getAddFieldValue($fno,$gtable,$code) {

		$SQL = "select * from amboard_".$gtable."_add where code='".$code."' and fno='".$fno."' ";
		$result = mysql_query($SQL,$this->connect);
		while($row=mysql_fetch_array($result)) {
			$key = $row[fname];
			$value = $row[fvalue];
			$fvalue[$key] = $value;
		}
		return $fvalue;
	}

	function bprint($skin,$skinfile) {
		global $_REQUEST;

		global $group;
		global $code;
		global $INDIR;

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

		$compiles = new skinCompile($skin,$skinfile);
		$compiles->skindir = "/".$INDIR."/mpboard/skin_newlist";
		$compiles->compiledir = "/".$INDIR."/mpboard/compile_newlist";
		$compiles->init();
		if($compiles->update()) {
			//echo "새로생성";
		} else {
			//echo "변경없음";
		}

		include $_SERVER[DOCUMENT_ROOT].$compiles->compiledir."/".$skin."/$skinfile";
	}
}

?>