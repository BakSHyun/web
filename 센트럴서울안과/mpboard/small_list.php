<?
require_once $_SERVER[DOCUMENT_ROOT]."/mpboard/inc/sys.php";


/* 
	그룹에속해 있는 전체게시판이나 하나의 게시판의 목록을 원하는 정렬로 일부갯수를 불러온다.
	$code 값이 있을경우 하나의 게시판을 불러 오며, 값이 없을경우 그룹전체의 게시판에서 정보를 불러 온다.
*/ 
function sboardlist($group,$code,$bsort,$bfsort,$line,$cutwidth=0) {
	
	global $connect;
	
	$upload = "/mpboard/upload/";
	if($code) $code_where = " and code='$code' ";

	$SQL ="select * from amsolution_group where gcode='$group'";
	$result = mysql_query($SQL,$connect);
	$row = mysql_fetch_array($result);
	
	$gtable = $row[gtable];

	$SQL = "select * from amboard_".$gtable." where 1 $code_where and wmode<>'1' and vstate='1' order by $bfsort $bsort limit ".$line."";
	$listresult = mysql_query($SQL,$connect);
	while($listrow=mysql_fetch_array($listresult)) {
		
		$config = getConfig($listrow[code]);
		
		$fileinfo = getFileData($listrow[no],$gtable,$upload);
		$firstfileinfo = $fileinfo[0];	// 첫번째 파일정보를 구한다.
		$filepathinfo = pathinfo($firstfileinfo[name]);
		
		// 파일확장자가 이미지 확장자이면...
		if(!strcasecmp($filepathinfo[extension], "gif") || !strcasecmp($filepathinfo[extension], "jpg") || !strcasecmp($filepathinfo[extension], "png")) {
			$listrow[addimgfile] = "/mpboard/imgview.php?no=".$firstfileinfo[no]."&group=".$group;
		}
		
		// 파일다운로드 수
		$listrow[addfilecount] = $firstfileinfo[count];
		if($filecount > 3) $filecount = 3;
		$listrow[fileicon] = "<img src='/$BDIR/icon/disk_".$filecount.".gif' border='0'>";
		
		$newimg = "<img src='/$BDIR/skin/".$config[skin]."/skin_images/new.gif' border='0'>";
		
		// 추가입력필드값 정보 ([필드명]='값' 형태의 배열로 입력된다)
		$listrow[addfieldvalue] = getAddFieldValue($listrow[no],$group,$code);
		
		if($cutwidth) $listrow[cuttitle] = cutstring($listrow[title],$cutwidth);	// 제목을 넓이에 맞게 자른다.
		else $listrow[cuttitle] = $listrow[title];
		
		$listrow[viewlink] = "group=$group&code=".$listrow[code]."&no=".$listrow[no]."&bsort=$bsort&bfsort=$bfsort&abmode=view";
		$listrow[linktitle] = "<a href='$PHP_SELF?$listrow[viewlink]' class='$this->linkclass'>".$listrow[cuttitle]."</a>";
		$listrow[wdate] = substr($listrow[wdate], 0, 10);
		
		// 새글일 경우 NEW 아이콘 추가
		if($config[new_time]) {
			if((mktime()-strtotime($listrow[wdate])) < $config[new_time]*60*60) {
				$listrow[linktitle] = $listrow[linktitle]." ".$newimg;
			}
		}

		$LIST[] = $listrow;
	}
	

	return $LIST;
}

/* 게시물의 파일정보를 불러온다. */
function getFileData($no,$gtable,$upload) {
	
	global $connect;
	
	$this->fileobj = new fileManager($connect,"amboard_".$gtable."_file",$upload);
	$this->fileobj->downfile = $this->downfile;
	$this->fileobj->viewfile = $this->viewfile;
	$this->fileobj->init();
	
	$infos[fno] = $no;
	
	$fileinfo = $this->fileobj->getFileData($infos);
	
	return $fileinfo;
}

/* 게시판 기본설정을 불러온다. */
function getConfig($code) {
	
	global $connect;
	
	$SQL = "select * from amboard_config where code='$code'";
	$result = mysql_query($SQL,$connect);
	$row = mysql_fetch_array($result);
	return $row;
}

/* 추가로 입력된 데이타필드정보를 불러온다. */
function getAddFieldValue($fno,$gtable,$code) {
	
	global $connect;
	
	$SQL = "select * from amboard_".$gtable."_add where code='".$code."' and fno='".$fno."' ";
	$result = mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result)) {
		$key = $row[fname];
		$value = $row[fvalue];
		$fvalue[$key] = $value;
	}
	return $fvalue;
}

?>