<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $MROOT."/inc/sys.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";

##########[    함      수     ]##########
## 권한표시 chk-1 있음 chk-0 업음
function auth_print($chk) {
	if($chk==1 || $chk==2 ) {
		echo '<span style="">'.iconv("EUC-KR","UTF-8","O").'</span>';
	}	else {
		echo '<span style="">'.iconv("EUC-KR","UTF-8","X").'</span>';
	}
}
#########################################
?>
<?
	
$where = "where 1";

if($search_value) {
	$field=array("name");
	$where .= " and (";
	while (list ($key, $val) = each ($field)) {
		$where .= " $val like '%". $search_value ."%' or";		
	}
	$where .= ")";
	$where = str_replace("or)",")",$where);
}

$sql="select * from amgroup $where";
//$where.=" and bno=$bno";
//$sql="select * from amgroup_board $where ";
$result=mysql_query($sql);
?>
			<table border="0" cellpadding="2" cellspacing="0" style="width:100%" >
				<colgroup >
					<col width=140>					
					<col width=30>
					<col width=30>
					<col width=30>
					<col width=30>
					<col width=30>
					<col width=30>
					<col width=30>
					<col width=30>				
<?
$empty=1;
while( $row=mysql_fetch_array($result) ) { 
	
	$mgbsql="select * from amgroup_board where bno=$bno and mgno=$row[mgno] limit 1";
	$mgbresult=mysql_query($mgbsql);
	if($mgbrow=@mysql_fetch_array($mgbresult)) {
	
	$view[write] = $mgbrow[writeauth];
	$view[modify] = $mgbrow[modifyauth];
	$view[delete] = $mgbrow[deleteauth];							
	$view[rewrite] = $mgbrow[rewriteauth] ;
	$view[view] = $mgbrow[viewauth];
	$view[comment] = $mgbrow[commentauth];
	$view[point] = $mgbrow[pointauth];
	$view[upload] = $mgbrow[uploadauth];		
	
	
		$mgsql="select * from amgroup where mgno=$row[mgno] limit 1";
		$mgresult=mysql_query($mgsql);
		$mgrow=mysql_fetch_array($mgresult);	
	if($mgbrow[usebasicauth]) { // 기본권한사용	
		$view[write] = $mgrow[writeauth];
		$view[modify] = $mgrow[modifyauth];
		$view[delete] = $mgrow[deleteauth];							
		$view[rewrite] = $mgrow[rewriteauth] ;
		$view[view] = $mgrow[viewauth];
		$view[comment] = $mgrow[commentauth];
		$view[point] = $mgrow[pointauth];
		$view[upload] = $mgrow[uploadauth];	
	}
	
	
	$empty=0;
	?>
					<tr onchoice="" onmouseover='totallist_mouseover(this)' onmouseout='totallist_mouseout(this)' align="center">
						<td align="left"><?=iconv("EUC-KR","UTF-8",$mgrow[name])?><br><input type="button" value="<?=iconv("EUC-KR","UTF-8","권한관리")?>" onclick="modify_auth(<?=$row[mgno]?>);return false;" style="color:#444444;font-size:12px;border:1px solid #999999;vertical-align:middle;line-height:15px;cursor:pointer;cursor:hand"></td>
						<td><? auth_print($view[view]); ?></td>
						<td><? auth_print($view[write]); ?></td>
						<td><? auth_print($view[rewrite]); ?></td>
						<td><? auth_print($view[comment]); ?></td>
						<td><? auth_print($view[point]); ?></td>
						<td><? auth_print($view[upload]); ?></td>
						<td><? auth_print($view[modify]); ?></td>
						<td><? auth_print($view[delete]); ?></td>					
					</tr>	
	<?
	}
}
?>
<?
if($empty) 
iconv("EUC-KR","UTF-8","검색결과가 없습니다.");
?>
			</table>