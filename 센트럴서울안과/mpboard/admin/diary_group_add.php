<?
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
// 다이어리 그룹원추가 검색폼
?>

<script>
function group_add(a){
	list = opener.document.getElementById('group_list');

	list.value = list.value + ',' +a;
	window.close();


}


</script>
<form method="post" action="<?=$PHP_SELF?>">
<input type="hidden" name="gcode" value="<?=$gcode?>">
<select name="search" class="input">
	<option value="name">이름</option>
	<option value="id">아이디</option>
	    <option value="jumin">주민번호</option>
      </select>
      <input name="search_value" type="text" size="15" class="input">
	  <input type="image" src="/<?=$INDIR?>/admin/img/btn_search.gif">
	  </td>
</form>

<?
if($search){
?>

	<table>
		<tr>
			
<?
	if($search != "jumin") $where = " and $search = '$search_value'";
	else $where = " and jumin = PASSWORD('$search_value')";
	$SQL = "SELECT * FROM ammember where 1 and gcode = '$gcode' $where";
	$result = mysql_query($SQL,$connect);

	while($row = mysql_fetch_array($result)){
?>
			<Td><?=$row[id]?></td>
			<td><?=$row[name]?></td>
			<td><a style="cursor:hand" onclick="group_add('<?=$row[id]?>')">선택</td>
<?
	}
}
?>