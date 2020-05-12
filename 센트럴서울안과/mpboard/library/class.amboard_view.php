<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_view.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 게시물 뷰 부분을 관리한다.
//				 class.amboard.php , class.filetool.php , class.filemanager.php , class.dbutil.php 클래스 파일을 필요로 한다.
//
//

class amboardView extends amboard {

	var $tdclass;
	var $fileobj;
	var $bsort;
	var $bfsort;
	var $sortpara;

	var $skinpage;

	/* Public Method */
	function amboardView($connect) {
		global $sno;

		$this->amboard($connect);
		$this->sno = $sno;
	}


	function init() {

		global $no;
		global $bsort;
		global $bfsort;


		global $no_new;


		//국원석사이트 기존웹문서 불러오기위한 작업
		if($no_new){
			$no=$no_new;
		}

//		echo "기본:".$no;


		$this->bsort = $bsort;
		$this->bfsort = $bfsort;
		$this->sortpara = "bsort=".$bsort."&bfsort=".$bfsort;

		if(!$no) {
			$this->error(11);
			exit;
		}

		$this->slistLink = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara.$this->catepara."&abmode=list"."&".$this->sortpara; // MEDIPIX 분류 설정 (08.05.15)
		$this->listLink = "$PHP_SELF?".$this->gpara."&".$this->addpara."&abmode=list"."&".$this->sortpara;
		$this->modifyLink = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara.$this->catepara."&abmode=modify&no=".$no."&".$this->sortpara; // MEDIPIX 분류 설정 (08.05.15)
		$this->replyLink = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara.$this->catepara."&abmode=reply&no=".$no."&".$this->sortpara; // MEDIPIX 분류 설정 (08.05.15)
		$this->deleteLink = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara.$this->catepara."&abmode=deletedb&no=".$no."&".$this->sortpara; // MEDIPIX 분류 설정 (08.05.15)


		$this->skinpage[view] = "view.html";
		$this->skinpage[passwdform] = "passwdform.html";
	}

	function getViewData($no) {

		global $bsort;
		global $bfsort;
		global $INDIR;

		$this->setViewCount($no);
 		$SQL = "select * from amboard_".$this->gtable." where code='$this->code' and no='$no' ";
		$rowdata = mysql_fetch_array(mysql_query($SQL,$this->connect));

		//echo $SQL;
		// 제목은 HTML 테그를 막는다.
		$ctitle = $rowdata[title];
		$ctitle = str_replace("<", "&lt;", $ctitle);
		$ctitle = str_replace(">", "&gt;", $ctitle);
		$rowdata[title] = $ctitle;

		if($rowdata[html] == 0 || $rowdata[device] =="mobile") {
			//$rowdata[contents]=htmlspecialchars($rowdata[contents]);
			//$rowdata[contents]=ereg_replace(" ","&nbsp;",$rowdata[contents]);
			//$rowdata[contents]=ereg_replace("	"," &nbsp;&nbsp;&nbsp;&nbsp;",$rowdata[contents]);
			$rowdata[contents]=nl2br($rowdata[contents]);
			$rowdata[recontents]=nl2br($rowdata[recontents]);
		} else {
			// javascript 와 iframe 테그는 사용하지 못하게 한다.

			if($this->code == 'community03'){
			$rowdata[contents];
			}else{
			$rowdata[contents] = eregi_replace("<script","&lt;script",$rowdata[contents]);
			$rowdata[contents] = eregi_replace("</script>","&lt;/script&gt;",$rowdata[contents]);

			$rowdata[contents] = eregi_replace("<iframe","&lt;iframe",$rowdata[contents]);
			$rowdata[contents] = eregi_replace("</iframe>","&lt;/iframe&gt;",$rowdata[contents]);
			}


			/* MEDIPIX 내용에서 금지태그 막기 (08.05.02) */
			/*
			$disable_tags = "table|td|tr|tbody"; //금지 태그
			$tags = explode("|", $disabled_tags);
			for($i=0; $i < sizeof($tags); $i++) {
				$ntags[] = "@<".$tags[$i]."[^>]*?>@si";
				$ntags[] = "@</".$tags[$i].">@si";
			}
			$rowdata[contents] = preg_replace($ntags,"", $rowdata[contents]);
			*/
			/* MEDIPIX 내용에서 금지태그 막기 (08.05.02) */

		}
		//$rowdata[contents] = "";

		// 첨부파일이 있을경우 설정
		$fileinfo = $this->getFileData($no);
		$firstfileinfo = $fileinfo[0];	// 첫번째 파일정보를 구한다.
		$filepathinfo = pathinfo($firstfileinfo[name]);

		$firstfileinfo2 = $fileinfo[1];	// 두번째 파일정보를 구한다.
		$filepathinfo2 = pathinfo($firstfileinfo2[name]);

		// 파일확장자가 이미지 확장자이면...
		if(!strcasecmp($filepathinfo[extension], "gif") || !strcasecmp($filepathinfo[extension], "jpg") || !strcasecmp($filepathinfo[extension], "png")) {
			$rowdata[addimgfile] = "/$INDIR/mpboard/imgview.php?no=".$firstfileinfo[no]."&group=".$this->group."&code=".$this->code;
		}

		if($rowdata[vstate]!=1) $rowdata[vstate_str] = "<font color='red'>[비승인]</font>";

		// 최고 관리자가 아니면, 아이피 뒷자리는 xxx 표시로 변경 한다.
		if($_SESSION[userlevel]> "1") {
			$ip_array = explode(".",$rowdata[ip]);
			$rowdata[ip] = $ip_array[0].".".$ip_array[1].".xxx.xxx";
		}

		return $rowdata;
	}

	function setViewCount($no) {
		global $_COOKIE;
		global $group;
		global $code;
		global $no;

		$viewcount_cookie_data = $group."_".$code."_".$no;
		if($_COOKIE[viewcount_cookie]!=$viewcount_cookie_data) {
			$SQL = "update amboard_".$this->gtable." set view=view+1 where code='$this->code' and no='$no' ";
			mysql_query($SQL,$this->connect);
		}
	}


	function next($no,$limit=1) {

		global $PHP_SELF;
		global $INDIR;

		$memberinfo = $this->getAuth();
		// 관리자를 제외한 일반 유저는 승인된 글이거나 자신의글만 볼수있다.
		//if($memberinfo[userlevel] != 1) $vstate_sql = " and (vstate='1' or userid='".$memberinfo[userid]."') ";
		/* MEDIPIX 1이하의 레벨이 적용되도록 수정 (08.05.07) */
		if($memberinfo[userlevel] > 1) $vstate_sql = " and (vstate='1' or userid='".$memberinfo[userid]."') ";
        if($this->code =="mypage") {
		$SQL = "select no,ino from amboard_".$this->gtable." where 1 and no='$no' ".$vstate_sql." ";
		}else{
		$SQL = "select no,ino from amboard_".$this->gtable." where code='$this->code' and no='$no' ".$vstate_sql." ";
		}
		$rowdata = mysql_fetch_array(mysql_query($SQL,$this->connect));
		$next_ino = $rowdata[ino];

		$SQL="select * from amboard_".$this->gtable." where code='$this->code' and ino>$next_ino and wmode<>'1' ".$vstate_sql." order by ino asc limit $limit";
		$result_np=mysql_query($SQL,  $this->connect );

		$count = 0;
		while($row_np=mysql_fetch_array($result_np)) {
			$nextdata[$count][no] = $row_np[no];
			$nextdata[$count][name] = $row_np[name];
			$nextdata[$count][wdate] = $row_np[wdate];
			$nextdata[$count][title] = $row_np[title];
			$nextdata[$count][subtitle] = $row_np[subtitle];
			$nextdata[$count][cuttitle] = $row_np[title];
			$nextdata[$count][viewlink] = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=view&no=".$nextdata[$count][no]."&".$this->sortpara;
			$nextdata[$count][linktitle] = "<a href='$PHP_SELF?".$nextdata[$count][viewlink]."' class='$this->linkclass'>".$nextdata[$count][cuttitle]."</a>";
			$nextdata[$count][homepage] = $row_np[homepage];
			$nextdata[$count][email] = $row_np[email];
			$nextdata[$count][keyword] = $row_np[keyword];

			// 첨부파일이 있을경우 설정
			$fileinfo = $this->getFileData($nextdata[$count][no]);
			$firstfileinfo = $fileinfo[0];	// 첫번째 파일정보를 구한다.
			$filepathinfo = pathinfo($firstfileinfo[name]);

			// 파일확장자가 이미지 확장자이면...
			if(!strcasecmp($filepathinfo[extension], "gif") || !strcasecmp($filepathinfo[extension], "jpg") || !strcasecmp($filepathinfo[extension], "png")) {
				$nextdata[$count][addimgfile] = "/$INDIR/mpboard/imgview.php?no=".$firstfileinfo[no]."&group=".$this->group."&code=".$this->code."&mode=thumbs";
			} else {
				$nextdata[$count][addimgfile] = "/$INDIR/mpboard/skin/".$this->config[skin]."/skin_images/imgerror.gif";
			}

			$count++;

		}

		return $nextdata;
	}

	function pre($no,$limit=1) {

		global $PHP_SELF;
		global $INDIR;

		$memberinfo = $this->getAuth();
		/* MEDIPIX 1이하의 레벨이 적용되도록 수정 (08.05.07) */
		//if($memberinfo[userlevel] != 1) $vstate_sql = " and (vstate='1' or userid='".$memberinfo[userid]."') ";
		if($memberinfo[userlevel] > 1) $vstate_sql = " and (vstate='1' or userid='".$memberinfo[userid]."') ";

		if($this->code =="mypage") {
		$SQL = "select no,ino from amboard_".$this->gtable." where 1 and no='$no' ".$vstate_sql." ";
		}else {
        $SQL = "select no,ino from amboard_".$this->gtable." where code='$this->code' and no='$no' ".$vstate_sql." ";
		}
		$rowdata = mysql_fetch_array(mysql_query($SQL,$this->connect));
		$pre_ino = $rowdata[ino];

		$SQL="select * from amboard_".$this->gtable." where code='$this->code' and ino<$pre_ino and wmode<>'1' ".$vstate_sql." order by ino desc limit $limit";
		$result_np=mysql_query($SQL,  $this->connect );

		$count = 0;
		while($row_np=mysql_fetch_array($result_np))	{
			$pretdata[$count][no] = $row_np[no];
			$pretdata[$count][name] = $row_np[name];
			$pretdata[$count][wdate] = $row_np[wdate];
			$pretdata[$count][title] = $row_np[title];
			$pretdata[$count][subtitle] = $row_np[subtitle];
			$pretdata[$count][cuttitle] = $row_np[title];
			$pretdata[$count][viewlink] = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=view&no=".$pretdata[$count][no]."&".$this->sortpara;
			$pretdata[$count][linktitle] = "<a href='$PHP_SELF?".$pretdata[$count][viewlink]."' class='$this->linkclass'>".$pretdata[$count][cuttitle]."</a>";
			$pretdata[$count][homepage] = $row_np[homepage];
			$pretdata[$count][email] = $row_np[email];
			$pretdata[$count][keyword] = $row_np[keyword];

			// 첨부파일이 있을경우 설정
			$fileinfo = $this->getFileData($pretdata[$count][no]);
			$firstfileinfo = $fileinfo[0];	// 첫번째 파일정보를 구한다.
			$filepathinfo = pathinfo($firstfileinfo[name]);

			// 파일확장자가 이미지 확장자이면...
			if(!strcasecmp($filepathinfo[extension], "gif") || !strcasecmp($filepathinfo[extension], "jpg") || !strcasecmp($filepathinfo[extension], "png")) {
				$pretdata[$count][addimgfile] = "/$INDIR/mpboard/imgview.php?no=".$firstfileinfo[no]."&group=".$this->group."&code=".$this->code."&mode=thumbs";
			} else {
				$pretdata[$count][addimgfile] = "/$INDIR/mpboard/skin/".$this->config[skin]."/skin_images/imgerror.gif";
			}

			$count++;

		}

		return $pretdata;
	}

	function bprint() {
		global $_REQUEST;
		global $BROOT;
		global $INDIR;
		global $connect;

		global $group;
		global $code;

		if(is_array($this->globalvar)) while(list($key, $value)=each($this->globalvar)) {
			global $$value;
		}

		if(is_array($_REQUEST)) while(list($key, $value)=each($_REQUEST)) {
			$$key = $value;
		}

		$compiles = new skinCompile($this->config[skin],$this->skinpage[view]);
		$compiles->skindir = "/$INDIR/mpboard/skin";
		$compiles->compiledir = "/$INDIR/mpboard/compile";
		$compiles->init();
		if($compiles->update()) {
			//echo "새로생성";
		} else {
			//echo "변경없음";
		}

		include $BROOT."/compile/".$this->config[skin]."/".$this->skinpage[view];

		$this->pwprint();
	}


	function pwprint() {
		global $_REQUEST;
		global $BROOT;
		global $INDIR;

		global $group;
		global $code;
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

		$compiles = new skinCompile($this->config[skin],$this->skinpage[passwdform]);
		$compiles->skindir = "/$INDIR/mpboard/skin";
		$compiles->compiledir = "/$INDIR/mpboard/compile";
		$compiles->init();

		if($compiles->update()) {
			//echo "새로생성";
		} else {
			//echo "변경없음";
		}

		include $BROOT."/compile/".$this->config[skin]."/".$this->skinpage[passwdform];
	}

}
?>
