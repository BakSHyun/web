<?
include $_SERVER["DOCUMENT_ROOT"] ."/".$INDIR."/amlibrary/ajax/ajax.php";
$ADMINDIR="/".$INDIR."/amboard/admin/";

// 최초 업데이트시에 게시판은 있지만 카타로그에 아무 값도 없다면... 카타로그에  추가를 해준다.
$SQL = "select count(*) counter from amcategory_manage where code != '' ";
$resultc = mysql_query($SQL,$connect);
$rowc=mysql_fetch_array($resultc);
if($rowc[counter] == 0) {
	$SQL = "select * from amboard_config where 1 order by no asc ";
	$resultb = mysql_query($SQL,$connect);
	while($rowb=mysql_fetch_array($resultb)) {
		$SQL = "insert into amcategory_manage (pno,deep,code,name) values ('1','1','".$rowb[code]."','".$rowb[name]."') ";
		mysql_query($SQL,$connect);
	}
	$SQL = "select * from amcategory_manage where code != '' ";
	$resultc2 = mysql_query($SQL,$connect);
	while($rowc2=mysql_fetch_array($resultc2)) {
		if($cnos) {
			$cnos .= "|".$rowc2[no];
		} else {
			$cnos = $rowc2[no];
		}
	}
	$SQL = "update amcategory_manage set cno='".$cnos."'  where no='1' ";
	mysql_query($SQL,$connect);
}
?>
<script type='text/javascript' src='/<?=$INDIR?>/amlibrary/script/document.js'></script>

<script>	
var mv_state=0;
var mv_start;
var mv_end;
var on_leave_over=0;

function moving(cur) {		
	mv_state=cur;	
}

function movingstart(cur,no) {
	//드래그 시작 = 1
	if( cur==1) {		
		mv_start=no;		
	}
	mv_state=cur;	
}

function movingenter(no) {	
	if(mv_state==0) return;
	if(mv_state==1) {				
		eval("bbsimglist"+no).src = "../amboard/icon/folder_go.png";
		mv_end=no;	
	}		
}

function movingleave(no) {
	if(mv_state==0) return;
	if(mv_state==1) {	
		eval("bbsimglist"+no).src = "../amboard/icon/folder.png";			
		mv_end=no;	
	}		
}	

function movingend() {		
	//alert(mv_start + " " + mv_end);
	folder_move();
	mv_state=0;	
}

function movingchk(no) {
	if(mv_state==0) return;
	if(mv_state==1) {
		layermove_sub('divlayermove');		
	}	
}

function layermove_sub(objid) {	
	//alert(objid);	
	mx = event.x + document.body.scrollLeft+1;
	my = event.y + document.body.scrollTop-10;
	spaninfo = document.getElementById(objid);
	spaninfo.style.filter="Alpha(opacity=50)";	
	spaninfo.style.position="absolute";
	spaninfo.style.left=mx+"px";
	spaninfo.style.top=my+"px";
	spaninfo.style.zIndex = "1";		
}

function layermove(str,objid) {	
	var strhtml = "";	
	mx = event.x + document.body.scrollLeft+1;
	my = event.y + document.body.scrollTop-10;
	spaninfo = document.getElementById(objid);
	//spaninfo.style.filter="Alpha(opacity=0)";	
	spaninfo.style.position="absolute";
	spaninfo.style.left=mx+"px";
	spaninfo.style.top=my+"px";
	spaninfo.style.zIndex = "1";	
	if(str) spaninfo.style.display = "";
	else spaninfo.style.display = "none"
	
		
	strhtml += "<table border='0' cellspacing='0' cellpadding='0'>";
	strhtml += "<tr>";
  strhtml += "<td  valign='top' style='font-size:9pt'>"+str+"</td>";
	strhtml += "</tr>";
	strhtml += "</table>";
	
	spaninfo.innerHTML = strhtml;
}

function menuormove(no,menutmp,divmenu) {
	if(mv_state==1) {
		movingend()
	} else {
		layermenu(menutmp,divmenu);
	}
}

function reloading() {
	getHTMLContents('<?=$ADMINDIR?>listman.php','bbsList');
}
reloading();

var hiddentree="";
function hidetree(no) {	
	getHTMLContents('<?=$ADMINDIR?>listman.php?hidetree='+no,'bbsList');		
}

function showtree(no) {			
	getHTMLContents('<?=$ADMINDIR?>listman.php?showtree='+no,'bbsList');		
}

function page_move_start(no,name) {
	movingstart(1,no);		
	layermenu('','divlayermenu');	
	layermove('<img height=16 src=../amboard/icon/page_white.png>'+name,'divlayermove');	
}
function folder_move_start(no,name) {
	movingstart(1,no);	
	//alert('<img height=16 src=../amboard/icon/folder.png> '+name ,'divlayermove');	
	layermenu('','divlayermenu');	
	layermove('<img height=16 src=../amboard/icon/folder.png>'+name,'divlayermove');	
}
	
function folder_move() {
	//mv_start -> mv_end	
	if (mv_start==mv_end) return;	
	getHTMLContents('<?=$ADMINDIR?>listman.php?folder_move_source='+mv_start+'&folder_move_object='+mv_end,'bbsList');		
}

function folder_add(no) {
	getHTMLContents('<?=$ADMINDIR?>listman.php?folder_add='+no,'bbsList');		
}

//게시판설정 페이지(insert)로
function paper_add(no) {	
	document.location="<?=$PHP_SELF?>?m2next=tree&group=<?=$group?>&m1=<?=$m1?>&m2=configinsert&pno="+no;
}

function folder_name(no) {
	getHTMLContents('<?=$ADMINDIR?>listman.php?folder_name='+no,'bbsList');		
}

function folder_name_db(no) {			
	getHTMLContents('<?=$ADMINDIR?>listman.php?folder_name_db_no='+no+'&folder_name_db_name='+eval("bbstextlist"+no).value,'bbsList');
}

function focusman(obj) {
	alert("ddd");
	obj.focus();
}

function folder_del(no) {
	if(no) {
		getHTMLContents('<?=$ADMINDIR?>listman.php?folder_del='+no,'bbsList');						
	} else {
		alert("빈폴더가 아닙니다.");
	}
}

//페이퍼
function paper_view(gcode,code) {	
	popUpWindow('/ams/amboard/index.php?group='+gcode+'&code='+code,'boardview', 700,500 ,20 ,20 , 'yes','yes')
}
function paper_linkcode(gcode,code) {	
	popUpWindow('/ams/amboard/admin/boardsource.php?group='+gcode+'&code='+code,'boardsource', 540, 380, 20, 20, 'yes','no')
}
function paper_rss(gcode,code) {	
	popUpWindow('/<?=$INDIR?>/amboard/rss.php?group='+gcode+'&code='+code,'boardsource', 700, 500, 20, 20, 'yes','no')  
}
function paper_empty(gcode,code,no) {
	msg="해당게시판의 모든게시물과 관련자료가 모두지워집니다. \n계속 하시겠습니까?";
	recome("mode=empty&group="+gcode+"&code="+code+"&no="+no ,msg);	
}
function paper_delete(gcode,code,no) {
	msg="해당게시판의 모든게시물과 관련자료가 모두지워집니다. \n계속 하시겠습니까?";
	recome("mode=delete&group="+gcode+"&code="+code+"&no="+no ,msg);	
}

function menuover(td) {
	td.style.backgroundColor="334455";
	td.style.color="eeeeee";
}

function menuout(td) {
	td.style.backgroundColor="#F0F0F0";
	td.style.color="444444";
}

function recome(opt,message) {		
	//alert(opt);
	if(message != "") {
		if(confirm(message)) {
			getHTMLContents('<?=$ADMINDIR?>listman.php?'+opt,'bbsList');
			return;
		} else {			
			return;
		}
	}		
}

//카테고리 페이지로
function loadCategory(no,code) {	
	document.location="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=boardcategory&code="+code+"&no="+no;
}
//게시판설정 페이지로
function loadEdit(no) {	
	document.location="<?=$PHP_SELF?>?m2next=tree&group=<?=$group?>&m1=<?=$m1?>&m2=configupdate&no="+no;
}

</script>
<?=$gcode?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="img/spacer.gif" width="50" height="50"></td>
  </tr>
  <tr>
    <td align="center"><span class="style8">[게시판 트리]</span></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>	

<table onMousemove=movingchk(); onDragEnd=layermove('','divlayermove') width="98%" align="center" border="0" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
  <tr>
  	<td id=bbsList>
  		
  	</td>
  </tr>
  <tr>
  	<td id=bbsDb>
  	</td>
  </tr>  		
</table>
