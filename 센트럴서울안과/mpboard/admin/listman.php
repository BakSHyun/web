<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
//require_once $BROOT."/inc/sys.php";
include $_SERVER["DOCUMENT_ROOT"] ."/".$INDIR."/amlibrary/ajax/ajax.php";
?>
<script type='text/javascript' src='/<?=$INDIR?>/amlibrary/script/document.js'></script>

<?
//조건 인클루드
if( $mode=='delete' ) include "listman_delete.php";
if( $mode=='empty' ) include "listman_empty.php";
?>

<?
//조건 자체처리

//deep수정 재귀함수(노드,변화값) <폴더옮기기 하위함수>
function ch_deep($ch_node,$ch_deep) {
	//ch_node의 deep을 ch_deep 적용하여 바꾸기
	$SQL="UPDATE `amcategory_manage` SET deep=(deep+". $ch_deep.") where no=".$ch_node;
	Mysql_query($SQL);
	//if ( !mysql_affected_rows() ) echo $SQL."folder ch_deep error!!";
	
	//ch_node쿼리
	$SQL="select cno from amcategory_manage where no=".$ch_node." LIMIT 1";	
	$result=mysql_query($SQL);
	if ( $row=mysql_fetch_array($result) ) {		
		if( $row[cno] ) {
			$cnolist=explode("|",$row[cno]);
			while($cnotmp=each($cnolist)) {
				ch_deep($cnotmp[value],$ch_deep);
			}		
		}
	} else { 
		//echo "Folder plus(move) DB fault!!";
		return;
	}	
	//cno재귀함수
	
}

//폴더 옮기기
if( $folder_move_source && $folder_move_object ) {
	//전상위폴더 cno 삭제
	
	// pno노드번호알아내기 + 불러오기 &deep
	$SQL="select pno,deep from amcategory_manage where no=".$folder_move_source." LIMIT 1";
	$result=mysql_query($SQL);	
	$row=mysql_fetch_array($result);
	//옮기기temp-deep
	$deeptmp=$row[deep];
	
	
	$SQL="select * from amcategory_manage where no=".$row[pno]." LIMIT 1";
	$result=mysql_query($SQL);	
	$row=mysql_fetch_array($result);
		
	// pno노드 cno에서 자신 지우기
	$cnolist=explode("|",$row[cno]);
	$newcno="";
	
	while($cnotmp=each($cnolist)) {
		if($cnotmp[value]!=$folder_move_source) {
			$newcno.=$cnotmp[value]."|";
		}
	}
	$newcno=substr($newcno,0,strlen($newcno)-1);
	
	$SQL="UPDATE `amcategory_manage` SET cno='".$newcno."' where no=".$row[no];
	mysql_query($SQL);
	if ( !mysql_affected_rows() ) echo $SQL."folder disconnect(move) error!!";
	
	//폴더연결 CNO추가
	$SQL="select * from amcategory_manage where no=".$folder_move_object." LIMIT 1";
	$result=mysql_query($SQL);	
	if ( $row=mysql_fetch_array($result) ) {		
		if($row[cno]) $bar="|"; else $bar="";
		$SQL="UPDATE `amcategory_manage` SET cno=concat(cno,'".$bar."','".$folder_move_source."') where no=".$folder_move_object;
		mysql_query($SQL);
		if ( !mysql_affected_rows() ) echo $SQL."folder connect(move) error!!";		
		
		//옮기기temp-deep(최종 목적노드-소스노드+1)
		$deeptmp=$row[deep]-$deeptmp+1;
		//deep 재귀함수(노드,변화값)
		ch_deep($folder_move_source,$deeptmp);
		
		// pno 
		$SQL="UPDATE `amcategory_manage` SET pno=".$folder_move_object.", deep=".($row[deep]+1)." where no=".$folder_move_source;
		mysql_query($SQL);
		//if ( !mysql_affected_rows() ) echo $SQL."<br>add error!!";
		
		// deep
	} else { 
		echo "Folder plus(move) DB fault!!";
	}	
}

//이름바꾸기
if( $folder_name_db_no && $folder_name_db_name ) {
	$SQL="UPDATE `amcategory_manage` SET name='".$folder_name_db_name."' where no=".$folder_name_db_no;
	mysql_query($SQL);
	//if ( !mysql_affected_rows() ) echo $SQL."name change error!!";	
}

//폴더더하기
if( $folder_add ) {	
	$SQL="select * from amcategory_manage where no=".$folder_add." LIMIT 1";
	$result=mysql_query($SQL);	
	if ( $row=mysql_fetch_array($result) ) {		
		//새폴더추가
		$SQL="INSERT INTO `amcategory_manage` (`pno` , `deep` , `ino` , `code` , `name` , `filepath` , `cno` , `show` ) VALUES ('".$row[no]."', '".($row[deep]+1)."', '0', '', '', '', '', '1')";
		mysql_query($SQL);
		if ( !mysql_affected_rows() ) echo $SQL."<br>add error!!";
		
		//새폴더번호알아내기
		$SQL="SELECT no FROM `amcategory_manage` ORDER BY no DESC";
		$newno=mysql_query($SQL);	
		$newnorow=mysql_fetch_array($newno);		
		
		//새폴더연결		
		if($row[cno]) $bar="|"; else $bar="";
		$SQL="UPDATE `amcategory_manage` SET cno=concat(cno,'".$bar."','".$newnorow[no]."') where no=".$folder_add;
		mysql_query($SQL);
		if ( !mysql_affected_rows() ) echo $SQL."folder connect error!!";
	} else { 
		echo "Folder plus DB fault!!";
	}
}

if( $folder_del ) {	
	// cno가 있을시 if문 나감	
	if(!$canyoufolderdel) {
		// pno노드번호알아내기 + 불러오기
		$SQL="select pno from amcategory_manage where no=".$folder_del." LIMIT 1";
		$result=mysql_query($SQL);	
		$row=mysql_fetch_array($result);	
		
		$SQL="select * from amcategory_manage where no=".$row[pno]." LIMIT 1";
		$result=mysql_query($SQL);	
		$row=mysql_fetch_array($result);
			
		// pno노드 cno에서 자신 지우기
		$cnolist=explode("|",$row[cno]);
		$newcno="";
		
		while($cnotmp=each($cnolist)) {
			if($cnotmp[value]!=$folder_del) {
				$newcno.=$cnotmp[value]."|";
			}
		}
		$newcno=substr($newcno,0,strlen($newcno)-1);
		
		$SQL="UPDATE `amcategory_manage` SET cno='".$newcno."' where no=".$row[no];
		mysql_query($SQL);
		if ( !mysql_affected_rows() ) echo $SQL."folder disconnect error!!";
		
		// 자신(폴더)제거
		$SQL="DELETE FROM `amcategory_manage` where no=".$folder_del;
		mysql_query($SQL);
		if ( !mysql_affected_rows() ) echo $SQL."folder delete error!!";
	}	
}
?>

<?
$ADMINDIR="/".$INDIR."/amboard/admin/";


// 트리숨기기 DB처리
if($hidetree) {
	$SQL="update `amcategory_manage` set `show` = '2' where `no` =" .$hidetree." LIMIT 1";
	$result=mysql_query($SQL);
	if(!(mysql_affected_rows()==1) ) echo "DB입력실패!!";
}

// 트리보이기 DB처리
if($showtree) {
	$SQL="update `amcategory_manage` set `show` = '1' where `no` =" .$showtree." LIMIT 1";
	$result=mysql_query($SQL);
	if(!(mysql_affected_rows()==1) ) echo "DB입력실패!!";	
}
?>

<?
//□ 게시판 수정사항 □
function tableline($code) {	
	
	$SQL = "select * from amboard_config where code='$code'";	
	$result = mysql_query($SQL);			
	$row=mysql_fetch_array($result);
	
	// 등록수 쿼리
	$SQL="select count(*) counter from amboard_".$row[gtable]." where code='".$row[code]."'";
	$tcounter = mysql_fetch_array(mysql_query($SQL));			
	
	//파일 사이즈 (gtable, gcode 필수)쿼리
	$SQL="select SUM(size) filesize from amboard_".$row[gtable]."_file where opt1='".$row[code]."'";
	$bsize = mysql_fetch_array(mysql_query($SQL));	
	
	$infoman="";
	// 정보 테이블
	
	$infoman.= "<table width=100% class=type2 border=0 cellpadding=0 cellspacing=0>";
	
	// 아이콘 ^_^			
	
	// 테이블 이름
	$infoman.= "<tr><td align=center width=70 bgcolor=#DDEEF8>";	
	$infoman.= "게시판";
	$infoman.= "</td>";
	$infoman.= "<td width=100 align=center bgcolor=#F5F5F5>";	
	$infoman.= $row[name];
	$infoman.= "</td></tr>";
	
	
	// 테이블
	$infoman.= "<tr><td align=center width=70 bgcolor=#DDEEF8>";
	//$infoman.= iconv("EUC-KR","UTF-8","테이블");
	$infoman.= "테이블";
	$infoman.= "</td>";
	$infoman.= "<td width=100 align=center bgcolor=#F5F5F5>";
	//$infoman.= iconv("EUC-KR","UTF-8",$row[gtable]);
	$infoman.= $row[gtable];
	$infoman.= "</td></tr>";
	
	
	// 스킨
	$infoman.= "<tr><td align=center bgcolor=#DDEEF8>";
	//$infoman.= iconv("EUC-KR","UTF-8","스킨");
	$infoman.= "스킨";
	$infoman.= "</td>";
	$infoman.= "<td align=center  bgcolor=#F5F5F5>";
	//$infoman.= iconv("EUC-KR","UTF-8",$row[skin]);
	$infoman.= $row[skin];
	$infoman.= "</td></tr>";
	
	// 등록수
	$infoman.= "<tr><td align=center bgcolor=#DDEEF8>";
	//$infoman.= iconv("EUC-KR","UTF-8","등록수");
	$infoman.= "등록수";
	$infoman.= "</td>";
	$infoman.= "<td align=center bgcolor=#F5F5F5>";
	$infoman.= $tcounter[counter];
	$infoman.= "</td></tr>";
	
	// 사용량
	if(!$bsize[filesize]) $bsize[filesize]="-";	
	else $bsize[filesize].= " Byte";
	$infoman.= "<tr><td align=center bgcolor=#DDEEF8>";
	//$infoman.= iconv("EUC-KR","UTF-8","사용량");
	$infoman.= "사용량";
	$infoman.= "</td>";
	$infoman.= "<td align=center bgcolor=#F5F5F5>";
	$infoman.= $bsize[filesize];
	$infoman.= "</td>";
	
	$infoman.= "</tr></table>";
	
	
	return $infoman;
	
}
?>


<?
//리스트 출력 재귀함수
function tree($treenode) {		
	global $folder_name;
	// deep 최대값(레이아웃때문에 필요함)
	$SQL="select max(deep) max from amcategory_manage where 1";
	$result=mysql_query($SQL);
	$row=mysql_fetch_array($result);
	$treemax=$row[max];		
	
	// 특정 노드 쿼리문
	$SQL="select * from amcategory_manage where no=$treenode";
	$result=mysql_query($SQL);
	if( $row=mysql_fetch_array($result) ) {   // 각 라인 출력		
		// gcode 쿼리
		$SQL="select no,gcode from amboard_config where code='".$row[code]."' LIMIT 1";
		$result=mysql_query($SQL);
		$grow=mysql_fetch_array($result);
		$gcode=$grow[gcode];
		$gno=$grow[no];
		
		// 테이블
		ECHO "<table cellpadding=0 cellspacing=0 border=0 class=type2><tr height=22>";
		
		
		// 깊이만큼 공백주기 
		for($row[deep];$row[deep] >= 1; $row[deep]--) { 
		//// deep 레이아웃관련보정
		$treemax--;
		?> <td width=16> </td> <?	
		}
		
		
		// 깊이만큼 공백주기 (마지막: [+][-]버튼 or 공백) 자식노드의 존재유무에 따라
		if($row[show]==1 && $row[cno]) {
		?> <td width=10><img OnClick="hidetree(<?=$row[no]?>)"  height=10 width=10 src="../amboard/icon/minus.gif"></td> <?		
		} else if($row[show]==2) {
		?> <td width=10><img OnClick="showtree(<?=$row[no]?>)"  height=10 width=10 src="../amboard/icon/plus.gif"></td> <?		
		} else {
		?> <td width=10> </td> <?	
		}		
		
		// 폴더 그림
		if($row[show]) {
		?> <td><img id=bbsimglist<?=$row[no]?> height=16 src="../amboard/icon/folder.png" style="cursor:hand" <?
			// 폴더 드래그했을때			
			?> OnMouseOver="movingenter(<?=$row[no]?>); " <?								
			?> OnMouseOut="movingleave(<?=$row[no]?>); " <?											
			// 폴더 눌렀을때 메뉴
			if($row[cno]) {
				$delno="";
			} else {
				$delno=$row[no];
			}						
			$menutmp="<table border=0 cellpadding=0 class=type>";			
			$menutmp.="<tr><td onclick=\'folder_add(".$row[no].")\' style=\'Cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img height=16 src=\'../amboard/icon/folder_gray.png\'> 하위폴더생성</td></tr>";
			$menutmp.="<tr><td onclick=\'paper_add(".$row[no].")\' style=\'Cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img height=16 src=\'../amboard/icon/page_white_gray.png\'> 하위게시판생성</td></tr>";
			if($row[no]!=1) $menutmp.="<tr><td onclick=folder_move_start(".$row[no].",\'".$row[name]."\') style=\'Cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img height=16 src=\'../amboard/icon/folder_go_gray.png\'> 폴더이동</td></tr>";
			if($row[no]!=1) $menutmp.="<tr><td onclick=\'folder_del(".$delno.")\' style=\'Cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img height=16 src=\'../amboard/icon/folder_delete_gray.png\'> 폴더삭제</td></tr>";
			$menutmp.="<tr><td onclick=\'folder_name(".$row[no].")\' style=\'Cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img height=16 src=\'../amboard/icon/folder_edit_gray.png\'> 이름바꾸기</td></tr>";
			$menutmp.="<tr><td height=2 bgcolor=#dddddd></td></tr>";
			$menutmp.="<tr><td height=16 Onclick=layermenu(\'\',\'divlayermenu\'); style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/cancel_gray.png\'> 창닫기</td></tr> ";
			
			$menutmp.="</table>";						
			?> OnClick="menuormove(<?=$row[no]?>,'<?=iconv('EUC-KR','UTF-8',$menutmp)?>','divlayermenu')"></td> <?			
		} else {
		?> <td><img style="cursor:hand" height=16 src="../amboard/icon/page_white.png" <?
			// 문서 드래그했을때						
			// 문서 눌렀을때 메뉴
			$menutmp="<table bOrder=0 cellpadding=0 class=type>";			
			$menutmp.="<tr><td height=16 Onclick=paper_linkcode(\'".$gcode."\',\'".$row[code]."\') style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/link.png\'> 링크코드</td></tr> ";						
			$menutmp.="<tr><td height=16 Onclick=paper_view(\'".$gcode."\',\'".$row[code]."\') style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/zoom.png\'> 보기[새창]</td></tr> ";									
			$menutmp.="<tr><td height=16 Onclick=paper_rss(\'".$gcode."\',\'".$row[code]."\') style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'/ams/amsolution/img/rss.gif\'> RSS 링크코드</td></tr> ";
			$menutmp.="<tr><td height=16 Onclick=loadEdit(".$gno.") style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/edit.png\'> 게시판 설정</td></tr> ";			
			$menutmp.="<tr><td height=16 Onclick=loadCategory(".$gno.",\'".$row[code]."\') style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/category.png\'> 내부카테고리 설정</td></tr> ";						
			$menutmp.="<tr><td onclick=page_move_start(".$row[no].",\'".$row[name]."\') style=\'Cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img height=16 src=\'../amboard/icon/page_go_gray.png\'> 게시판이동</td></tr>";
			$menutmp.="<tr><td height=16 Onclick=paper_empty(\'".$gcode."\',\'".$row[code]."\',".$gno.") style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/bin_closed.png\'> 비우기</td></tr> ";
			$menutmp.="<tr><td height=16 Onclick=paper_delete(\'".$gcode."\',\'".$row[code]."\',".$gno.") style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/cross.png\'> 삭제</td></tr> ";
			$menutmp.="<tr><td height=2 bgcolor=#dddddd></td></tr>";
			$menutmp.="<tr><td height=16 Onclick=layermenu(\'\',\'divlayermenu\'); style=\'cursor:hand\' onMouseOut=\'menuout(this);\' onMouseOver=\'menuover(this);\'><img border=0 src=\'../amboard/icon/cancel_gray.png\'> 창닫기</td></tr> ";
			$menutmp.="</table>";						
			// 오버시 테이블정보			
			?> OnMouseOver="layerinfo('<?=iconv('EUC-KR','UTF-8',tableline($row[code]) )?>','divlayerinfo')" <?
			?> OnMouseOut="layerinfo('','divlayerinfo')" <?				
			?> OnClick="layermenu('<?=iconv('EUC-KR','UTF-8',$menutmp)?>','divlayermenu')" ></td>  <?
		}		
		//echo tableline($row[code]);
		// 폴더 & 게시판 이름		
		ECHO "<td width=180>";
		//ECHO $folder_name . " " . $row[no];
		?> <input  type=text class=input <? if($folder_name!=$row[no]) echo "style=border:; readonly";?> size=<?=strlen($row[name])+2?> id=bbstextlist<?=$row[no]?> value=<?=iconv("EUC-KR","UTF-8",$row[name])?> > <?
		if($folder_name==$row[no]) {
		?> <img onclick="folder_name_db(<?=$row[no]?>)" style="Cursor:hand" OnMouseOver="layerinfo('<?=iconv('EUC-KR','UTF-8','확인')?>','divlayerinfo')" OnMouseOut="layerinfo('','divlayerinfo')" src="../amboard/icon/accept.png"> <?
		?> <img onclick="reloading()" style="Cursor:hand" OnMouseOver="layerinfo('<?=iconv('EUC-KR','UTF-8','취소')?>','divlayerinfo')" OnMouseOut="layerinfo('','divlayerinfo')" src="../amboard/icon/cancel.png"> <?
		}
		ECHO "</td>";		
	} else {
		echo iconv("EUC-KR","UTF-8","DB오류발생");
	}	
		

		
	//■ 게시판 수정사항 ■■■■■■■■■■■■■■■■■■■■■■■■
	if($row[code]) {	
	//	tableline($row[code]);
	}	
	//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■		
	
	ECHO "</tr></table>";
	// 자식 노드들 재귀 함수 호출부분
	if($row[cno] && ($row[show]==1) ) {
		$cnodelist=explode("|",$row[cno]);	
		while( $cnode=each($cnodelist) ) {			
			tree($cnode[value]);			
		}
	}	
}

tree(1);
?>
<br>

<div id='divlayermove'></div>
<div id='divlayerinfo'></div>
<div id='divlayermenu'></div>
