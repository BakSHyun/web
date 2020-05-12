<?
if($m2 == "keywrite") $m2 = "keywritedb";
if($m2 == "keymodify") $m2 = "keymodifydb";

$manage_auth = "1"; // MEDIPIX 게시판관리권한 설정 (08.04.14)
$write_auth = "10";

if($m2 == "keymodifydb") {
	$SQL = "select * from mpkeyword where no='$no'";
	$result = mysql_query($SQL,$connect);
	$row = mysql_fetch_array($result);

	if(is_array($row)) while(list($key, $value)=each($row)) {
			$$key = $row[$key];
	}

	/*
	$keywordArray = explode("|", $keyword);
	$keyword1 = $keywordArray[0];
	$keyword2 = $keywordArray[1];
	$keyword3 = $keywordArray[2];
	$keyword4 = $keywordArray[3];
	$keyword5 = $keywordArray[4];
	$keyword6 = $keywordArray[5];
	*/
}
?>
<script>
function formCheck(cf) {
	if(cf.title.value == "") {
		alert("타이틀을 입력해주세요");
		cf.title.focus();
		return false;
	}
}
</script>

<div id='admin_sub_wrap'>
	<h2>[키워드 <? if($m2 == "keymodifydb") { ?>수정<? } else { ?>등록<? } ?>]</h2>


<table class='admin_table_type2' summary='키워드-정보'>
<form name="rcform" method="post" action="<?=$PHP_SELF?>" Onsubmit="return formCheck(this)">
<input type="hidden" name="m1" value="<?=$m1?>">
<input type="hidden" name="m2" value="<?=$m2?>">
<input type="hidden" name="no" value="<?=$no?>">

	<colgroup>
		<col style="width:250px;" />
		<col style="width:*;" />
	</colgroup>
	<tbody>

	<tr>
		<th>SUBJECT</th>
		<td><input name="subject" type="text" size="70"  id="title" value="<?=$subject?>"></td>
	</tr>
	<tr>
		<th>TITLE</th>
		<td><input name="title" type="text" size="70"  id="title" value="<?=$title?>"></td>
	</tr>
	<tr>
		<th>URL</th>
        <td>http://<?=$_SERVER["HTTP_HOST"]?><input name="url" type="text" size="50"  id="url" value="<?=$url?>">
			<br /><font color="red">도메인 뒤부터 입력하세요</font>
		</td>
	</tr>
	<tr>
		<th>keyword</th>
		<td><input name="keyword" type="text"  id="keyword1" value="<?=$keyword?>" size="100">
			<br /><font color="red">검색되야할 주요 키워드를 입력하세요 구분자는 ,를 사용하세요</font>
		</td>
	</tr>
	<tr>
		<th>description </th>
		<td>
			<table>
				<tr>
					<td colspan="2" style="padding-left: 0;"><font color="red">검색될 컨텐츠를 html 을 제외한 텍스트만 입력해주세요</font></td>
				</tr>
				<tr>
					<td style="padding-left: 0;"><textarea name="contents" style="height:250px;width:600px;border:1px solid #c3c3c3;"><?=$row[contents]?></textarea></td>
					<td><strong>Meta Description</strong> : 웹페이지에 대한 간략한 설명을 나타내며 단순 키워드만을 나열하는 것은 피해야 합니다. 검색결과에 표시되는 분량은 영문 기준 최대 160자 이므로 한글은 40~50글자 이내에서 1~2개의 핵심 키워드를 넣어 의미있는 문장으로 구성하는게 좋다고 합니다.</td>
				</tr>
			</table>
		</td>
	</tr>
	</tbody>
</table>

<ul class='admin_btn_list'>
	<li><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=keylist&sno=<?=$sno?>&<?=$search_para?>"><img src='/admin/img/comm/admin_list_btn.gif' alt='목록으로'></a></li>
	<li><input type="image" src="/<?=$INDIR?>/admin/img/btn_write.gif" border="0"></li>
</ul>

</form>
