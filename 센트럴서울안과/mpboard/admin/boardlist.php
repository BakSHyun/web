<div id='admin_sub_wrap'>
<script>
$(function() {
	$('.tr_bf').bind({
		mouseenter : function(){$(this).addClass('over').next().show(); },
		mouseleave : function(){$(this).removeClass('over').next().hide();	}
	});

});
</script>
	<h2>게시판 리스트</h2>
	<p class='desc'>현재그룹 : <strong class='red'><?=$group?></strong></p>

	<table class='admin_table_type1' summary='관리자 게시판 리스트입니다.'>
		<caption>관리자 게시판 리스트</caption>
		<colgroup>
			<col style="width:80px;" />
			<col style="width:100px;" />
			<col style="width:100px;" />
			<!-- <col style="width:45px;" /> -->
			<col style="width:60px;" />
			<col style="width:30px;" />
			<col style="width:30px;" />
			<col style="width:30px;" />
			<col style="width:30px;" />
			<col style="width:30px;" />
			<col style="width:30px;" />
		</colgroup>
		<thead>
			<tr>
				<th>코 드</th>
				<th>이 름</th>
				<th>스 킨</th>
				<!-- <th>등록수</th> -->
				<th>공개/비공개</th>
				<th>수 정</th>
				<th>카테고리</th>
				<th>비우기</th>
				<th>삭 제</th>
				<th>엑셀저장</th>
				<th>RSS</th>
			</tr>
		</thead>
		<tbody>
		  <?
		  $SQL = "select * from amboard_config where gcode='$group' order by name asc";
		  $result = mysql_query($SQL,$connect);

		  $SQL="select count(*) counter from amboard_config where gcode='$group'";
		  $bcounter = mysql_fetch_array(mysql_query($SQL,$connect));

		  $totalcount = $bcounter[counter];

		  while($row=mysql_fetch_array($result)) {
				//$SQL="select count(*) counter from amboard_".$row[gtable]." where code='".$row[code]."'";
				//$tcounter = mysql_fetch_array(mysql_query($SQL,$connect));
		  ?>
			<tr class='tr_bf'>
				<td><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=board&m2=board_source&code=<?=$row[code]?>" ><strong><?=$row[code]?></strong> <img src='./img/comm/setting_icon.gif' alt='설정'></a></td>
				<td><a href="/mpboard/index.php?group=<?=$group?>&code=<?=$row[code]?>" target="_blank" class="a1"><?=$row[name]?></a> </td>
				<td><?=$row[skin]?></td>
				<!-- <td><?=$tcounter[counter]?></td> -->
				<td><?if($row[secret_type] == "0" || $row[secret_type] == ""){ echo "공개";}?><?if($row[secret_type] =="1"){ echo "선택";}?><?if($row[secret_type] =="2"){ echo "비공개";}?></td>
				<td><div class='icon_type1'><a href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=configupdate&no=<?=$row[no]?>"><i class="fa fa-wrench"></i></a></div></td>
				<td><div class='icon_type1'><a href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=boardcategory&no=<?=$row[no]?>&code=<?=$row[code]?>"><i class="fa fa-sitemap"></i></a></div></td>
				<td><div class='icon_type1'><a OnClick="goURL('<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=boardempty&code=<?=$row[code]?>','해당게시판의 모든게시물과 관련자료가 모두지워집니다.\n계속 하시겠습니까?')"><i class="fa fa-trash-o"></i></a></div></td>
				<td><div class='icon_type1 col1'><a OnClick="goURL('<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=boarddelete&code=<?=$row[code]?>&no=<?=$row[no]?>','해당게시판의 모든게시물과 관련자료가 모두지워집니다.\n계속 하시겠습니까?')"><i class="fa fa-times"></i></a></div></td>
				<td><div class='icon_type1 col3'><a OnClick="goURL('excel_save_content.php?code=<?=$row[code]?>','해당게시판의 게시판에 글의 내용을 저장 하시겠습니까?')"><i class="fa fa-download"></i></a></div></td>
				<td><div class='icon_type1 col2'><a OnMouseOver="layerinfo('게시판 RSS 링크주소','divlayerinfo')" OnMouseOut="layerinfo('','divlayerinfo')" href="/mpboard/rss.php?group=<?=$group?>&code=<?=$row[code]?>" target="_blank" class="a1"><i class="fa fa-rss-square"></i></a></div></td>
			</tr>
			<tr style='display:none;'>
				<td colspan='20' class='hide_td'>
					읽기/쓰기권한 : <?=$row[view_auth]?> / <?=$row[write_auth]?><i class="fa fa-ellipsis-h"></i>
					마케팅툴 사용여부 : <?if($row[specail_board]){ echo "사용";}?><i class="fa fa-ellipsis-h"></i>
					기능구분 : <?=$row[kind]?><i class="fa fa-ellipsis-h"></i>
					페이지 목록수 : <?=$row[list_num]?>개<i class="fa fa-ellipsis-h"></i>
					리스트 정렬 : <? if($row[sort_check]){?><?=$row[sort_check]?>|<?=$row[sort_item]?>|<?=$row[sort_order]?><?}?><i class="fa fa-ellipsis-h"></i>
					카테고리 사용 : <?if($row[category]){ echo "사용";}?><i class="fa fa-ellipsis-h"></i>
					분류사용 : <? if($row[cate_num]>0){?><?=$row[cate_num]?>개<?}?><i class="fa fa-ellipsis-h"></i>
					날짜/조회변경 : <?if($row[date_edit]){ echo "사용";}?><i class="fa fa-ellipsis-h"></i>
					작성/답변시 SMS전송 : <? if($row[write_confirm_sms_use] || $row[sms_use]){?><?=$row[write_confirm_sms_use]?>/<?=$row[sms_use]?><?}?>
				</td>
			</tr>
		  <?
			$totalcount--;
		  }
		  ?>
		</tbody>
	</table>

	<ul class='admin_btn_list'>
		<li><div class='btn_type1'><a href="<?$PHP_SELF?>?group=<?=$group?>&m1=board&m2=configinsert" class="a1">
	    게시판 생성</a></div></li>
	</ul>

</div>