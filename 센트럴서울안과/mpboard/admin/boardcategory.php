<?
	  $SQL = "select * from amboard_config where gcode='$group' and code='$code'";
	  $result = mysql_query($SQL,$connect);
	  $row = mysql_fetch_array($result);

	  $gtable = $row[gtable];
?>
<div id='admin_sub_wrap'>
	<h2>게시판 카테고리 등록</h2>

	<p class='desc'>게시판:<strong class='red'> <?=$row[name]?></strong><span class='blank'>/</span>코드:<strong class='red'> <?=$row[code]?></strong></p>
	<table class='admin_table_type1' summary='게시판 등록 - 카테고리'>
		<caption>카테고리</caption>
		<colgroup>
			<col style="width:70px;" />
			<col style="width:70px;" />
			<col style="width:90px;" />
			<col style="width:*;" />
			<col style="width:80px;" />
			<col style="width:80px;" />
			<col style="width:75px;" />
			<col style="width:75px;" />
			<col style="width:60px;" />
			<col style="width:60px;" />
		</colgroup>
		<thead>
			<tr>
				<th>번호</th>
				<th>순서</th>
				<th>카테고리그룹</th>
				<th>이름</th>
				<th>예비1</th>
				<th>예비2</th>
				<th>코드번호</th>
				<th>등록수</th>
				<th>수정</th>
				<th>삭제</th>
			</tr>
		</thead>
		<tbody>
	  <?
	  $SQL="select count(*) counter from amboard_".$gtable."_category where code='$code'";
	  $ccounter = mysql_fetch_array(mysql_query($SQL,$connect));
	  $totalcount = $ccounter[counter];

	  $SQL = "select * from amboard_".$gtable."_category where code='$code' order by ino asc,no asc";
	  $result = mysql_query($SQL,$connect);
	  while($row=mysql_fetch_array($result)) {
	  		$SQL="select count(*) counter from amboard_".$gtable." where code='".$row[code]."' and category='".$row[cname]."'";
	  		$tcounter = mysql_fetch_array(mysql_query($SQL,$connect));
	  ?>
    <form name="cform<?=$row[no]?>" id='cform<?=$row[no]?>' method="post" action="<?=$PHP_SELF?>" OnSubmit="return ">
	<input type="hidden" name="group" value="<?=$group?>">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="categoryupdatedb">
	<input type="hidden" name="code" value="<?=$code?>">
	<input type="hidden" name="cnameold" value="<?=$row[cname]?>">
	<input type="hidden" name="no" value="<?=$row[no]?>">
	  <tr>
	    <td><?=$totalcount?></td>
	    <td>
	      <a href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=categoryindexdb&code=<?=$code?>&no=<?=$row[no]?>&imode=u" class="a1">▲</a><br>
          <a href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=categoryindexdb&code=<?=$code?>&no=<?=$row[no]?>&imode=d" class="a1">▼</a>
        </td>
	    <td><input type="text" name="gname" value="<?=$row[gname]?>" class="text3"></td>
		<td><input type="text" name="cname" value="<?=$row[cname]?>" class="text3"></td>
		<td><input type="text" name="etc1" value="<?=$row[etc1]?>" class="text3"></td>
		<td><input type="text" name="etc2" value="<?=$row[etc2]?>" class="text3"></td>
	    <td><strong class='blue'><?=$row[no]?></strong></td>
	    <td><?=$tcounter[counter]?></td>
	    <td><div class='btn_type2'><a OnClick="javascript:$('#cform<?=$row[no]?>').submit();"><!-- <a OnClick="this.submit();"> -->수 정</a></div></td>
	    <td>
			<div class='btn_type4'><a OnClick="goURLPost('<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=categorydeletedb&code=<?=$code?>&no=<?=$row[no]?>','현재 카테고리를 삭제하시면 관련된 게시물검색에 제한이 생길수 있습니다.\n계속 하시겠습니까?')">삭 제</a></div>
		</td>
	  </tr>
	</form>
	  <?
	  	$totalcount--;
	  } ?>
		</tbody>
	</table>

    <form name="cform" method="post" action="<?=$PHP_SELF?>">
	<input type="hidden" name="group" value="<?=$group?>">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="categoryinsertdb">
	<input type="hidden" name="code" value="<?=$code?>">
	<ul class='admin_btn_list'>
		<li><div class='btn_type1'><a href="/admin/index.php?group=basic&m1=board">취 소</a></div></li>
		<li><input type='image' src='./img/comm/admin_cfm_btn.gif' alt='등록'></li>
		<li><input name="cname" type="text" id="cname" class="text"></li>
	</ul>
    </form>

</div>