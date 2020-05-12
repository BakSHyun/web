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

class amboard extends am {

	var $connect;

	var $group;
	var $code;
	var $abmode;
	var $gpara;
	var $sno;

	var $config;

	var $upload;		// 파일업로드 디랙토리
	var $downfile;		// 다운로드 파일관리 파일의 경로
	var $viewfile;		// 파일 뷰 파일경로

	var $listLink;
	var $writeLink;
	var $modifyLink;
	var $replyLink;
	var $deleteLink;

	var $searchpara;

	var $catepara; // MEDIPIX 분류 설정 (08.05.15)

	/* Public Method */
	function amboard($connect) {

		global $INDIR;

		global $abmode;
		global $group;
		global $code;
		global $field;
		global $search;
		global $category;

		/* MEDIPIX 분류 설정 (08.05.15) */
		global $cate1;
		global $cate2;
		global $cate3;
		/* MEDIPIX 분류 설정 (08.05.15) */

		$this->connect = $connect;
		$this->group = $group;
		$this->code = $code;

		$this->gpara = "group=$group&code=$code&category=$category";
		$this->config = $this->getConfig($this->code);
		$this->gtable = $this->config[gtable];			// 테이블 구분이름
		$this->upload = "/$INDIR/mpboard/upload/";
		$this->downfile = "/$INDIR/mpboard/filedown.php";
		$this->viewfile = "/$INDIR/mpboard/imgview.php";

		if($field && $search) $this->searchpara = "&field=$field&search=$search";

		$this->catepara = "&cate1=$cate1&cate2=$cate2&cate3=$cate3"; // MEDIPIX 분류 설정 (08.05.15)

		$memberinfo = $this->getAuth();
		// 게시판이 비승인상태이거나 운영정지중일때 메세지 출력 (관리자만 접근이 가능하다. message.php 에서 메세지를 관리한다.)
		if($memberinfo[userlevel]!=1) {
			if($this->config[run] == "n") {gourl($PHP_SELF."?group=$group&code=$code&abmode=message&msgmode=run_n");}
			if($this->config[run] == "s") {gourl($PHP_SELF."?group=$group&code=$code&abmode=message&msgmode=run_s");}
		}

	}

	/* 권한 설정부분을 불러온다. */
	function getAuth() {
		global $_SESSION;

		$userlevel = $_SESSION['userlevel'];
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
		if(!$userlevel) $userlevel = 10;

		$manage_auth = $this->config[manage_auth]; // MEDIPIX 게시판관리권한 추가 (08.04.15)
		$write_auth = $this->config[write_auth];
		$rewrite_auth = $this->config[rewrite_auth];
		$view_auth = $this->config[view_auth];
		$comment_auth = $this->config[comment_auth];
		$point_auth = $this->config[point_auth];
		$upload_auth = $this->config[upload_auth];

		/* MEDIPIX 게시판관리권한 추가 (08.04.15) */
		if($userlevel <= $manage_auth) {
			$memauth[manage] = 1;
		}
		/* MEDIPIX 게시판관리권한 추가 */
		if($userlevel <= $write_auth) {
			$memauth[write] = 1;
			$memauth[modify] = 1;
			$memauth[delete] = 1;
		}
		if($userlevel <= $rewrite_auth) {
			$memauth[rewrite] = 1;
		}
		if($userlevel <= $view_auth) {
			$memauth[view] = 1;
		}
		if($userlevel <= $comment_auth) {
			$memauth[comment] = 1;
		}
		if($userlevel <= $point_auth) {
			$memauth[point] = 1;
		}
		if($userlevel <= $upload_auth) {
			$memauth[upload] = 1;
		}

		if($userlevel <= 1) { // MEDIPIX 메디픽스 최고관리자 권한으로 인하여 == 를 <= 로 바꿈 메디픽스 최고관리자는 레벨 0 (08.04.15)
			$memauth[manage] = 2; // MEDIPIX 게시판관리권한 추가 (08.04.15)
			$memauth[write] = 2;
			$memauth[rewrite] = 2;
			$memauth[view] = 2;
			$memauth[comment] = 2;
			$memauth[point] = 2;
			$memauth[upload] = 2;
			$memauth[modify] = 2;
			$memauth[delete] = 2;
		}

		$memauth[userlevel] = $userlevel;
		$memauth[userid] = $userid;
		$memauth[username] = $username;

		return $memauth;
	}

	function getUserPoint($userid) {
		$SQL = "select sum(point) pointsum,sum(download) downloadsum,sum(view) viewsum from amboard_".$this->gtable." where userid='".$userid."'";
		$result = mysql_query($SQL,$this->connect);
		$row = mysql_fetch_array($result);

		return $row;
	}

	function getLoninInfo() {
		global $_SESSION;

		$SQL = "select no,id,name,nicname,jumin,email,level from ammember where id='".$_SESSION[userid]."'";
		$result = mysql_query($SQL,$this->connect);
		$row = mysql_fetch_array($result);

		return $row;
	}

	/* 게시판 기본설정을 불러온다. */
	function getConfig() {
		global $skinmode;
		$SQL = "select * from amboard_config where gcode='$this->group' and code='$this->code'";
		$result = mysql_query($SQL,$this->connect);
		$row = mysql_fetch_array($result);
		if($skinmode == "mobile"){
			$row['skin'] .= "_mobile";
		}else if($skinmode != ""){
			$row['skin'] = $skinmode;
		}
		if( $_SESSION['userlevel'] == '-1'){
			echo "스킨 : ".$row['skin'] ;
		}
		return $row;
	}

	/* 게시판 Head 파일인쿠르드 정보를 불러온다. */
	function getHead() {
		//$headhtml = "head";
		$SQL = "select page_top_file, page_top_db from amboard_config where gcode='$this->group' and code='$this->code'";
		$result = mysql_query($SQL,$this->connect);
		$row = mysql_fetch_array($result);

		if($row[page_top_file]) include $_SERVER[DOCUMENT_ROOT]."/".$row[page_top_file];
		echo $row[page_top_db];
	}

	/* 게시판 Bottom 파일인쿠르드 정보를 불러온다. */
	function getBottom() {
		//$bottomhtml = "bottom";
		$SQL = "select page_bottom_file, page_bottom_db from amboard_config where gcode='$this->group' and code='$this->code'";
		$result = mysql_query($SQL,$this->connect);
		$row = mysql_fetch_array($result);

		if($row[page_bottom_file]) include $_SERVER[DOCUMENT_ROOT]."/".$row[page_bottom_file];
		echo $row[page_bottom_db];
	}

	function getFileData($no) {
		$this->fileobj = new fileManager($this->connect,"amboard_".$this->gtable."_file",$this->upload);
		$this->fileobj->downfile = $this->downfile;
		$this->fileobj->viewfile = $this->viewfile;
		$this->fileobj->init();

		$infos[fno] = $no;
		$infos[opt1] = $this->code;

		$fileinfo = $this->fileobj->getFileData($infos);

		return $fileinfo;
	}

	/* 게시판 카테고리 정보들을 배열로 불러온다. */
	function getCategoryData() {
		$SQL="select * from amboard_".$this->gtable."_category where code='".$this->code."' order by ino asc";
		$result = mysql_query($SQL,$this->connect);
		while($row=mysql_fetch_array($result)) {
			$cadata[no] = $row[no];
			$cadata[code] = $row[code];
			$cadata[cname] = $row[cname];

			$listdata[] = $cadata;
		}

		return $listdata;
	}

	/* 게시판 카테고리 정보를 불러온다. */
	function getCategory($no) {
		$SQL="select * from amboard_".$this->gtable."_category where no='".$no."'";
		$result = mysql_query($SQL,$this->connect);
		if($row=mysql_fetch_array($result)) {
			$cadata[no] = $row[no];
			$cadata[code] = $row[code];
			$cadata[cname] = $row[cname];

		}

		return $cadata[cname];
	}

	/* 추가 입력 필드정보를 불러온다. */
	function getAddField() {
		$SQL = "select * from amboard_".$this->gtable."_field where code='".$this->code."' ";
		$result = mysql_query($SQL,$this->connect);
		while($row=mysql_fetch_array($result)) {
			$fvalue[] = $row;
		}
		return $fvalue;
	}

	/* 추가로 입력된 데이타필드정보를 불러온다. */
	function getAddFieldValue($fno) {
		$SQL = "select * from amboard_".$this->gtable."_add where code='".$this->code."' and fno='".$fno."' ";
		$result = mysql_query($SQL,$this->connect);
		while($row=mysql_fetch_array($result)) {
			$key = $row[fname];
			$value = $row[fvalue];
			$fvalue[$key] = $value;
		}
		return $fvalue;
	}

}
?>