<script language="javascript">
function allCheck(cform)
{
	var objCheck;
	objCheck = document.getElementsByName("delno[]");
	if(cform.allch.checked)
	{
		if(objCheck.length)
		{
			for(i=0;i<objCheck.length;i++)
				objCheck[i].checked = 'on';
		}
	}
	else
	{
		if(objCheck.length)
		{
			for(i=0;i<objCheck.length;i++)
				objCheck[i].checked = '';
		}
	}
}

function quedel()
{
	var objCheck, chkVal;
	objCheck = document.getElementsByName("delno[]");
	if(objCheck.length)
	{
		for(i=0;i<objCheck.length;i++)
			if(objCheck[i].checked) chkVal = true;

		if(chkVal)
		{
			if(confirm("선택항목을 삭제하시겠습니까?"))
				return true;
			else
				return false;
		}
		else
		{
			alert("삭제하실 항목을 선택해 주세요");
			return false;
		}
	}
	else
	{
		//alert("삭제하실 항목을 선택해 주세요");
		return false;
	}
}
</script>

<?
$search_para = "search_key=$search_key&search_value=$search_value";
?>

<div id='admin_sub_wrap'>
	<h2>키워드 리스트</h2>

	<div id='reserve_search_wrap' style='padding:25px;'>
		<div class='source_area'>
			<p><span class='green'>// 위의 코드를 메타태그 적용할곳 또는 헤드파일에 복사하여 붙여 넣으시면 됩니다.</span></p>
			<p><span class='brown'>&lt;?</span></p>
			<p><span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER</span><span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>'/$INDIR/admin/inc/metainfo.php'</span><span class='brown'>;</span></p>
			<p><span class='brown'>?&gt;</span></p>
		</div>
	</div>

<form name="formsearch" method="post" action="<?=$PHP_SELF?>">
<input type="hidden" name="asumode" value="<?=$asumode?>">
<input type="hidden" name="asrmode" value="<?=$asrmode?>">
<input type="hidden" name="sno" value="<?=$sno?>">
	<div id='reserve_search_wrap'>
	<ul>
		<li>
			<select name="search_key" class="select1">
				<option value="title" <? if($search_key == "title") { echo "selected"; } ?>>타이틀
				<option value="url" <? if($search_key == "url") { echo "selected"; } ?>>URL
					<option value="keyword" <? if($search_key == "keyword") { echo "selected"; } ?>>키워드
			</select>
		</li>
		<li><input type="text" name="search_value" value="<?=$search_value?>" size="20" class="text1"></li>
		<li><div class='btn_type2'><a onclick='javascript:formsearch.submit();'>검색</a></div></li>
	</ul>
	</div>
</form>

<form name="cform"  method="post" action="<?=$PHP_SELF?>" onsubmit="return quedel()">
<input type="hidden" name="asumode" value="<?=$asumode?>">
<input type="hidden" name="asrmode" value="keylistdel">



<table class='admin_table_type1' summary='관리자 키워드 리스트입니다.'>
	<caption>관리자 키워드 리스트</caption>
	<colgroup>
		<col style="width:50px;" />
		<col style="width:30px;" />
		<col style="width:150px;" />
		<col style="width:250px;" />
		<col style="width:*;" />
		<col style="width:120px;" />
	</colgroup>
	<thead>
		<tr>
			<th>번호</td>
			<th><input type="checkbox" name="allch" value="1" onClick="allCheck(cform);"></th>
			<th>타이틀</th>
			<th>URL</th>
			<th>키워드</th>
			<th>등록일</th>
		</tr>
	</thead>
	<tbody>
	<?
	$where = "where 1 ";

	if($search_value)
		$where .= "and $search_key like '%$search_value%'";

	$query = "select count(*) counter from mpkeyword $where";
	$bcounter = mysql_fetch_array(mysql_query($query,$connect));
	$totalcount = $bcounter[counter];

	$pageobj = new pageing($sno);
	$pageobj->linkclass = "a";
	$pageobj->totalcount = $totalcount;
	$pageobj->listnum = 20;
	$pageobj->pagenum = 10;
	$pageobj->addpara = "group=$group&asumode=$asumode&asmmode=$asmmode&$search_para";
	$PAGEING = $pageobj->setPage();

	if($sno == 0) {
		$page = 0;
		$sno = 0;
	}
	else $page = ($sno / $pageobj->listnum);

	$query = "select * from mpkeyword $where order by no desc limit $sno, ".$pageobj->listnum." ";
	//echo $query;
	$result = mysql_query($query,$connect);

	while($row=mysql_fetch_array($result)) {
		$listno = $totalcount - ($pageobj->listnum*($page));
	?>
	<tr>
		<td align="center"><?=$listno?></td>
		<td align="center"><input type="checkbox" name="delno[]" value="<?=$row[no]?>"></td>
		<td align="center"><a href="<?=$PHP_SELF?>?asumode=<?=$asumode?>&asrmode=keymodify&no=<?=$row[no]?>"><?=$row[title]?></a></td>
		<td align="center"><a href="<?=$PHP_SELF?>?asumode=<?=$asumode?>&asrmode=keymodify&no=<?=$row[no]?>"><?=$row[url]?></a></td>
		<td align="center"><?=$row[keyword]?></td>
		<td align="center"><?=$row[wdate]?></td>
	</tr>
	<?
		$totalcount--;
	}
	?>
	</tbody>
</table>

<table width="100%" border="0" align="center">
	<tr>
		<td align="right">
		<input type="image" src="/<?=$INDIR?>/admin/img_old/btn_seldel.gif" border="0"></td>
	</tr>
</form>
</table>

<ul class='bbs_paging'><!-- 페이징  -->
	<li><?=$PAGEING[start]?></li>
	<li><?=$PAGEING[pregroup]?></li>
	<li><?=$PAGEING[pre]?></li>
	<?=$PAGEING[page]?>
	<li><?=$PAGEING[next]?></li>
	<li><?=$PAGEING[nextgroup]?> </li>
	<li><?=$PAGEING[end]?></li>
</ul>