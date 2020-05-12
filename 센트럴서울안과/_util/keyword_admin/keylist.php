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



//선택한것 삭제
function quedel(){
	var objCheck, chkVal;
	var objCheck = document.getElementsByName("delno[]");

	myform = document.cform;

	for(var i=0;i<objCheck.length;i++){
		if(objCheck[i].checked){
			chkVal = true;
		}

	}

	if(chkVal) {
		if(confirm("선택항목을 삭제하시겠습니까?")){
			myform.m2.value = 'keylistdel';
			myform.submit();
		}
		else {
			return false;
		}
	}else{
		alert("삭제하실 항목을 선택해 주세요");
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
			<p><span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER</span><span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>'/$INDIR/_util/metainfo.php'</span><span class='brown'>;</span></p>
			<p><span class='brown'>?&gt;</span></p>
		</div>
	</div>

<form name="formsearch" method="post" action="<?=$PHP_SELF?>">
<input type="hidden" name="m1" value="<?=$m1?>">
<input type="hidden" name="m2" value="<?=$m2?>">
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
<input type="hidden" name="m1" value="<?=$m1?>">
<input type="hidden" name="m2" value="">
<input type="hidden" name="checkvalue" value="">
<input type="hidden" name="sel" value="">


<table class='admin_table_type1' summary='관리자 키워드 리스트입니다.'>
	<caption>관리자 키워드 리스트</caption>
	<colgroup>
		<col style="width:50px;" />
		<col style="width:30px;" />
		<col style="width:200px;" />
		<col style="width:200px;" />
		<col style="width:250px;" />
		<col style="width:*;" />
		<col style="width:120px;" />
	</colgroup>
	<thead>
		<tr>
			<th>번호</td>
			<th><input type="checkbox" name="allch" value="1" onClick="allCheck(cform);"></th>
			<th>subject</th>
			<th>title</th>
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
		<td align="center"><a href="<?=$PHP_SELF?>?m1=<?=$m1?>&m2=keymodify&no=<?=$row[no]?>"><?=$row[subject]?></a></td>
		<td align="center"><a href="<?=$PHP_SELF?>?m1=<?=$m1?>&m2=keymodify&no=<?=$row[no]?>"><?=$row[title]?></a></td>
		<td align="center"><a href="<?=$PHP_SELF?>?m1=<?=$m1?>&m2=keymodify&no=<?=$row[no]?>"><?=$row[url]?></a></td>
		<td align="center"><?=$row[keyword]?></td>
		<td align="center"><?=$row[wdate]?></td>
	</tr>
	<?
		$totalcount--;
	}
	?>
	</tbody>
</table>

<ul class='admin_btn_list'>
	<li><div class='btn_type1'><a Onclick="quedel();" class="a1">선택 삭제</a></div></li>
</ul>
</form>

<ul class='bbs_paging2'>
	<li><?=$PAGEING[start]?></li>
	<li><?=$PAGEING[pregroup]?></li>
	<li><?=$PAGEING[nextgroup]?></li>
	<li><?=$PAGEING[end]?></li>
</ul>
<ul class='bbs_paging'>
	<?=$PAGEING[page]?>
</ul>