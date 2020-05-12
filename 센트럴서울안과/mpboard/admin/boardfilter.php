<?
	$sql="select * from amboard_filter where 1 ";
	$result=mysql_query($sql);
	while ( $row=mysql_fetch_array($result) ) {
		${"f".$row[mode]."_str"}=$row[filterstr];
		${"f".$row[mode]."_no"}=$row[no];
		${"f".$row[mode]."_stat"}=$row[state];	
	}
?>
<div id='admin_sub_wrap'>
	<h2>게시판 필터 설정</h2>

	<form name="fform" method="post" action="<?=$PHP_SELF?>" >
	<input type="hidden" name="group" value="<?=$group?>">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="<?=$m2?>db">
	<table class='admin_table_type2' summary='게시판 등록 - 필터'>
		<caption>필터</caption>
		<colgroup>
			<col style="width:300px;" />
			<col style="width:*;" />
		</colgroup>
		<tbody>
		  <tr>
			<th>입력 불가능한 내용</th>
			<td>
				<select name="fcontents_stat" class="input" />
					<option value="1" <? if($fcontents_stat==1) echo "selected"; ?> >사용중</option>
					<option value="0" <? if($fcontents_stat==0) echo "selected"; ?> >미사용중</option>
				</select>
			</td>
		  </tr>
		  <tr>
			<td colspan='2'><textarea name="fcontents_str" class="area1" id="impname"><?=$fcontents_str?></textarea></td>
		  </tr>
		  <tr>
			<th>입력불가능한 이름, ID</th>
			<td>
				<select name="fname_stat" class="input" />
					<option value="1" <? if($fname_stat==1) echo "selected"; ?> >사용중</option>
					<option value="0" <? if($fname_stat==0) echo "selected"; ?> >미사용중</option>
				</select>
			</td>
		  </tr>
		  <tr>
			<td colspan='2'><textarea name="fname_str" class="area1" id="impid"><?=$fname_str?></textarea></td>
		  </tr>
		</tbody>
	</table>

	<ul class='admin_btn_list'>
		<li><div class='btn_type1'><a href="/admin/index.php?group=basic&m1=board">취 소</a></div></li>
		<li><input type='image' src='./img/comm/admin_cfm_btn.gif' alt='등록'></li>
	</ul>
    </form>

</div>