<div id='admin_sub_wrap'>
	<h2>지점 리스트</h2>


	<table class='admin_table_type1' summary='관리자 지점설정 리스트입니다.'>
		<caption>관리자 예약 리스트</caption>
		<colgroup>
			<col style="width:50px;" />
			<col style="width:180px;" />
			<col style="width:*;" />
			<col style="width:100px;" />
			<col style="width:100px;" />
			<col style="width:100px;" />
			<col style="width:70px;" />
			<col style="width:70px;" />
		</colgroup>
		<thead>
			<tr>
				<th>번호</td>
				<th>코드(code)복사 <img src="/<?=$INDIR?>/admin/img/ihelp.gif" align="absmiddle" border="0" style="cursor:hand" Onclick="layerinfox('관리자에서 생성된 지점별 예약을 사이트에<br>적용 시키기위한 코드를 생성해준다.<br>아래코드를 클릭후 팝업창에 뜨는 내용을<br> 원하는 페이지에 복사한다.','divlayerinfo')"></th>
				<th>지점명</th>
				<th>스킨</th>
				<th>SMS수신관리자</th>
				<th>예약가능일</th>
				<th>수정</th>
				<th>삭제</th>
			</tr>
		</thead>
		<tbody>
	<?
	$SQL = "select * from mpreserve_config";
	$result = mysql_query($SQL,$connect);

	$SQL="select count(*) counter from mpreserve_config";
	$bcounter = mysql_fetch_array(mysql_query($SQL,$connect));

	$totalcount = $bcounter[counter];

	while($row=mysql_fetch_array($result)) {
		if($row[numofper] == "") $numofper = "무제한";
		else $numofper = $row[numofper]."명";

	$arr_smsmail_use = explode("|", $row[smsmail_use]);
	$smsmail_use_1 = $arr_smsmail_use[0];
	$smsmail_use_2 = $arr_smsmail_use[1];
	$smsmail_use_3 = $arr_smsmail_use[2];
	$smsmail_use_4 = $arr_smsmail_use[3];
	$smsmail_use_phonenum = $arr_smsmail_use[4];
	?>
	<tr>
		<td><?=$totalcount?></td>
		<td><a style="cursor:hand" Onclick="popUpWindow('/<?=$INDIR?>/mpreserve/admin/reservesource.php?code=<?=$row[code]?>','reservesource', 540, 380, 20, 20, 'yes','no')"><b><?=$row[code]?> <font color="red">설정소스</font></b></a></td>
		<td> <a href="/<?=$INDIR?>/mpreserve/index.php?group=<?=$group?>&code=<?=$row[code]?>" target="_blank" class="a1"><?=$row[name]?>&nbsp;&nbsp; <? if($row[branch_tel]){?>(<?=$row[branch_tel]?>)<?}?></a></td>
		<td><?=$row[skin]?>&nbsp;</td>
		<td><font color="blue"><strong><?=$smsmail_use_phonenum?></strong></font></td>
		<td><?=$row[reservation_possibility_day]?>일후</td>
		<td><a href="<?=$PHP_SELF?>?m1=<?=$m1?>&m2=resconfigupdate&no=<?=$row[no]?>"><img src="/<?=$INDIR?>/admin/img/btn_modify.gif" width="48" height="20" border="0"></a></td>
		<td><img src="/<?=$INDIR?>/admin/img/btn_delete.gif" width="48" height="20" border="0" style="cursor:hand" OnClick="goURL('<?=$PHP_SELF?>?m1=<?=$m1?>&m2=resconfigdelete&code=<?=$row[code]?>&no=<?=$row[no]?>','해당지점의 모든게시물과 관련자료가 모두지워집니다.\n계속 하시겠습니까?')"></td>
	</tr>
	<?
	$totalcount--;
	}
	?>
	</tbody>
</table>
<br>
	<ul class='admin_btn_list'>
		<li><div class='btn_type3'><a href="<?$PHP_SELF?>?m1=reserve&m2=resconfiginsert">지점추가</a></div></li>
	</ul>
</div>