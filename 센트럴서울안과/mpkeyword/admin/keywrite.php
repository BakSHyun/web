<?
//MEDIPIX 사이트정보 를 읽어오기위하여 추가(08.04.15)
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php";
//MEDIPIX 사이트정보 를 읽어오기위하여 추가(08.04.15)
?>
<?
if($asrmode == "keywrite") $asrmode = "keywritedb";
if($asrmode == "keymodify") $asrmode = "keymodifydb";

$manage_auth = "1"; // MEDIPIX 게시판관리권한 설정 (08.04.14)
$write_auth = "10";

if($asrmode == "keymodifydb") {
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
	<h2>[키워드 <? if($asrmode == "keymodifydb") { ?>수정<? } else { ?>등록<? } ?>]</h2>


<table class='admin_table_type2' summary='키워드-정보'>
<form name="rcform" method="post" action="<?=$PHP_SELF?>" Onsubmit="return formCheck(this)">
<input type="hidden" name="asumode" value="<?=$asumode?>">
<input type="hidden" name="asrmode" value="<?=$asrmode?>">
<input type="hidden" name="no" value="<?=$no?>">

	<colgroup>
		<col style="width:250px;" />
		<col style="width:*;" />
	</colgroup>
	<tbody>

	<tr>
		<th>타이틀</th>
		<td><input name="title" type="text" size="70"  id="title" value="<?=$title?>"></td>
	</tr>
	<tr>
		<th>URL</th>
        <td>http://<?=$_SERVER["HTTP_HOST"]?><input name="url" type="text" size="50"  id="url" value="<?=$url?>">
			<br /><font color="red">도메인 뒤부터 입력하세요</font>
		</td>
	</tr>
	<tr>
		<th>키워드</th>
		<td><input name="keyword" type="text"  id="keyword1" value="<?=$keyword?>" size="100">
			<br /><font color="red">검색되야할 주요 키워드를 입력하세요 구분자는 ,를 사용하세요</font>
		</td>
	</tr>
	<tr>
		<th>컨텐츠 </th>
		<td><font color="red">검색될 컨텐츠를 html 을 제외한 텍스트만 입력해주세요</font><br />
			<textarea name="contents" style="height:250px;width:600px"><?=$row[contents]?></textarea>
		</td>
	</tr>
	</tbody>
</table>



<table width="100%" border="0" align="center">
	<tr>
		<td height="20"></td>
	</tr>
<tr>
        <td align="center">
                <?
                if($asrmode == "keywritedb") {
                ?>
                <input type="image" src="/<?=$INDIR?>/admin/img_old/btn_register.gif" border="0">
                <?
                }
                else {
                ?>
                <input type="image" src="/<?=$INDIR?>/admin/img_old/btn_update.gif" border="0">
                <?
                }
                ?>
                <a href="<?=$PHP_SELF?>?group=<?=$group?>&asumode=<?=$asumode?>&asrmode=keylist"><img src="/<?=$INDIR?>/admin/img_old/btn_cancel.gif" border="0"></a>
        </td>
</tr>
</table>
</form>
