<?
//
//
//  @ Project : amsolution
//  @ File Name : class.amboard_write.php
//  @ Date : 2005-03-16
//  @ Author : kim kyoung ho
//	@ Documemt : amboard 의 글쓰기, 답글, 수정 부분을 관리한다.
//				 class.amboard.php , class.filetool.php , class.filemanager.php , class.dbutil.php 클래스 파일을 필요로 한다.
//
//

class amboardWrite extends amboard {
	
	var $slistLink;
	var $addpara;
	var $dbobj;
	var $fileobj;
	var $subfields;
	
	var $bsort;
	var $bfsort;
	var $sortpara;
	
	
	/* Public Method */
	function amboardWrite($connect) {
		global $sno;
		
		$this->sno = $sno;
		$this->amboard($connect);
		
	}
	
	
	function init() {
		global $bsort;
		global $bfsort;
		
		$this->bsort = $bsort;
		$this->bfsort = $bfsort;
		$this->sortpara = "bsort=".$bsort."&bfsort=".$bfsort;
				
		$this->dbobj = new dbUtil($this->connect);
		$this->fileobj = new fileManager($this->connect,"amboard_".$this->gtable."_file",$this->upload);
		$this->fileobj->init();
		$this->slistLink = "$PHP_SELF?sno=".$this->sno."&".$this->gpara."&".$this->addpara.$this->searchpara."&abmode=list"."&".$this->sortpara."&".$this->catepara;
	}
	
	function getWiteData() {
		
		global $no;
		
		$SQL = "select * from amboard_".$this->gtable." where code='$this->code' and no='$no'";
		$result = mysql_query($SQL,$this->connect);
		$row=mysql_fetch_array($result);
		if($row[html] == "1") $row[htmlchecked] = "checked";
		if($row[secret] == "1") $row[secretchecked] = "checked";
		/* MEDIPIX 이메일 분리 (08.05.16) */
		if($row[email] != "")
		{
			$arr_email = explode("@",$row[email]);
			$row[email1] = $arr_email[0];
			$row[email2] = $arr_email[1];
		}
		/* MEDIPIX 이메일 분리 (08.05.16) */
		
		return $row;
	}

	function addfield($fields,$values,$type=1) {
		$this->dbobj->addfield($fields,$values,$type);
	}
	
	function subfield($fields,$values,$type=1) {
		
		$fieldvalue[fields] = $fields;
		$fieldvalue[values] = $values;
		$fieldvalue[type] = $type;
		
		$this->subfields[] = $fieldvalue;

	}
	
	// 기본 글입력
	function write($debug=false) {
		
		// vstate 값이 없을경우 기본 승인/비승인 설정을 적용한다.
		if($this->dbobj->darray[vstate]=="''") $this->dbobj->addfield("vstate",$this->config[vstate],1);
		
		$this->dbobj->setTable("amboard_".$this->gtable);
		$this->dbobj->insert($debug);
		$maxno = $this->getMax();
		$this->dbobj->addfield("ino",$maxno);
		$this->dbobj->update("no=$maxno");
		$this->subwrite($maxno);
		$this->fileupload($maxno);

	}
	
	// 추가 데이타 입력
	function subwrite($fno) {
		if(is_array($this->subfields)) while(list($key, $value)=each($this->subfields)) {
			//echo $value[fields].":".$value[values];
			
			$subdbobj = new dbUtil($this->connect);
			$subdbobj->setTable("amboard_".$this->gtable."_add");
			
			$subdbobj->addfield("fno",$fno,1);
			$subdbobj->addfield("code",$this->code,1);
			$subdbobj->addfield("fname",$value[fields],$value[type]);
			$subdbobj->addfield("fvalue",$value[values],$value[type]);
			
			$subdbobj->insert();
		}
		
	}
	
	// 글수정
	function modify($where,$debug=false) {
		
		global $no;
		global $checkvalue;
		
		$this->dbobj->setTable("amboard_".$this->gtable);
		$this->dbobj->update($where,$debug);
		$this->submodify($no);
		$this->opt2update($no);
		$this->fileupload($no);

		if($checkvalue) {
			$array_novalue = explode("|",$checkvalue);
			$nocount = count($array_novalue);
			$this->fileobj->filekeydelete($array_novalue);
			//echo "여기1";
		}
		//echo "여기2";
		//exit;
	}
	
	// 추가 데이타 수정
	function submodify($fno) {
 		if(is_array($this->subfields)) while(list($key, $value)=each($this->subfields)) {
			//echo $value[fields].":".$value[values];
			
			$subdbobj = new dbUtil($this->connect);
			$subdbobj->setTable("amboard_".$this->gtable."_add");
			
			$subdbobj->addfield("fno",$fno,1);
			$subdbobj->addfield("code",$this->code,1);
			$subdbobj->addfield("fname",$value[fields],$value[type]);
			$subdbobj->addfield("fvalue",$value[values],$value[type]);
						
			$SQL="select fno,fname from amboard_".$this->gtable."_add where fno='$fno' and code='".$this->code."' and fname='".$value[fields]."' ";
			$result = mysql_query($SQL,  $this->connect );
			$row = mysql_fetch_array($result);
			if($row) {
				$subdbobj->update("fno='$fno' and code='".$this->code."' and fname='".$value[fields]."'");
			} else {
				$subdbobj->insert();
			}
		}
	}
	
	// 답글 입력
	function reply($no, $debug=false) {
		$this->dbobj->setTable("amboard_".$this->gtable);
		$data = $this->getReplyIndex($no);
		
		if($data[indent]==0) {
			$relation = $no;
			if($data[secret] == "1") {
				$this->dbobj->darray["secret"] = 1;
				$this->dbobj->darray["passwd"] = "'".$data[passwd]."'";
			}
		} else {
			$relation = $data[relation];
		}
		$ino = $data[ino];
		$indent = $data[indent]+1;
		
		$this->updateReplyIndex($ino);
		$this->dbobj->addfield("relation",$relation);
		$this->dbobj->addfield("indent",$indent);
		$this->dbobj->addfield("ino",$ino);
		$this->dbobj->insert($debug);
		
		$maxno = $this->getMax();
		$this->fileupload($maxno);
	}
	
	// 게시물 내용 메일발송
	function boardmail($mailinfo, $debug=false) {
		global $INDIR;
		
		$mailobj = new mailtool();
		$mailobj->readhtml($mailinfo[mailskin]);
		
		$mailobj->mailcontents = str_replace("=\"./images", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("=\"./css", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("='./images", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("='./css", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("=./images", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("=./css", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
			
		$mailobj->mailcontents = str_replace("=\"images", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("=\"css", "=\"http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("='images", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("='css", "='http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("=images", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/images", $mailobj->mailcontents);
		$mailobj->mailcontents = str_replace("=css", "=http://".$_SERVER[HTTP_HOST]."/".$INDIR."/mpboard/mailhtml/css", $mailobj->mailcontents);
		
		$mailobj->mailsend($mailinfo);
		
	}
	
	// 게시물 삭제
	function delete($no) {
		$data = $this->getReplyIndex($no);
		$ino = $data[ino];
		
		$SQL="delete from amboard_".$this->gtable." where code='".$this->code."' and no='$no'" ;
		mysql_query($SQL,  $this->connect );
		
		$SQL="update amboard_".$this->gtable." set ino=ino-1 where code='".$this->code."' and ino>=$ino";
		mysql_query($SQL, $this->connect);
		
		$this->filedelete($no);
	}
	
	function pointupdate($debug=false) {
		$this->dbobj->setTable("amboard_".$this->gtable);
		$this->dbobj->update($debug);
	}
	
	function getMax() {
		$SQL = "select max(no) lastno from amboard_".$this->gtable;
		$row = mysql_fetch_array(mysql_query($SQL,$this->connect));
		if($row) $maxno = $row[lastno];
		return $maxno;
	}
	
	function getReplyIndex($no) {
		$SQL="select ino,indent,relation,passwd,secret from amboard_".$this->gtable." where code='".$this->code."' and no=$no";
		echo $SQL;
		$row=mysql_fetch_array(mysql_query($SQL, $this->connect ));
		return $row;
	}

	function updateReplyIndex($ino) {
		$SQL="update amboard_".$this->gtable." set ino=ino+1 where code='".$this->code."' and ino>=$ino";
		mysql_query($SQL, $this->connect);
	}
		
	// 첨부파일 업로드
	function fileupload($no) {
		global $_FILES;

		$size = sizeof($_FILES);

	
		if(is_array($_FILES)) {
			reset($_FILES);
			while(list($key, $value)=each($_FILES)) {
			//for($i=0; $i<$size; $i++) {
				$num = str_replace("file","",$key);
				$vopt2 = "opt2".$num;	// $opt21
				global $$vopt2;
				//배열 $infos 의 정보 : fno, opt1, opt2, opt3
				$infos[fno] = $no;
				$infos[vname] = "file".$num;
				$infos[opt1] = $this->code;
				$infos[opt2] = $$vopt2;
				$infos[opt3] = "";
				
				if($_FILES["file".$num]['name']) $this->fileobj->fileupload("file".$num,$infos,"0777");
			//}
			}
		}
    }

	// 이미지 코멘트 수정
    function opt2update($no) {
          global $_REQUEST;
          $opt2 = $_REQUEST[opt2];
		  $opt2count = count($opt2);
		  //for($h=0; $h <= $opt2count; $h++){
		  if(is_array($opt2)) while(list($key, $value)=each($opt2)) {
			$num = $h +1;
			$filenum = "file".$num;
			$optobj = new dbUtil($this->connect);
			$optobj->setTable("amboard_".$this->gtable."_file");
			$optobj->addfield("opt2",$value);
			$optobj->update("no='$key' and fno='$no'");
		  }
	}


	// 첨부파일 삭제
	function filedelete($no) {
		
		$infos[fno] = $no;
		
		$this->fileobj->filedelete($infos);
	}

	function bprint() {
		global $_REQUEST;
		global $BROOT;
		global $INDIR;
		
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
		
		$compiles = new skinCompile($this->config[skin],"write.html");
		$compiles->skindir = "/$INDIR/mpboard/skin";
		$compiles->compiledir = "/$INDIR/mpboard/compile";
		$compiles->init();
		if($compiles->update()) {
			//echo "새로생성";
		} else {
			//echo "변경없음";
		}
		
		include $BROOT."/compile/".$this->config[skin]."/write.html";
	}
}

?>
