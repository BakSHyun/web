<div id='admin_sub_wrap'>
	<h2>[방문기록]</h2>

<table class='admin_table_type1'>
	<caption>관리자 게시판 리스트</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>


<?
$mplogobj = new mplog($connect);
?>
	<thead>
		<tr>
			<th width="200" align="center">구분</th>
			<th align="center">내용</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td align="right">&nbsp;전체 접속수 </td>
			<td>&nbsp;<b><?=$mplogobj->getTotalCount()?></b> hits</td>
		</tr>
		<tr>
			<td align="right">&nbsp;오늘 방문수 </td>
			<td>&nbsp;<b><?=$mplogobj->getTodayCount()?></b> hits</td>
		</tr>
		<tr>
			<td align="right">&nbsp;어제 방문수 </td>
			<td>&nbsp;<b><?=$mplogobj->getYesterdayCount()?></b> hits</td>
		</tr>
		<tr>
			<td align="right">&nbsp;최고 방문수 </td>
			<td>&nbsp;<b><?=$mplogobj->getMaxCount()?></b> hits</td>
		</tr>
		<tr>
			<td align="right">&nbsp;최저 방문수 </td>
			<td>&nbsp;<b><?=$mplogobj->getMinCount()?></b> hits</td>
		</tr>
		<tr>
			<td align="right">&nbsp;마지막 접속 </td>
			<td>&nbsp;<b><?=$mplogobj->getEndDate()?></b></td>
		</tr>
		<tr>
			<td align="right">&nbsp;접속 시작일 </td>
			<td>&nbsp;<b><?=$mplogobj->getStartDate()?></b></td>
		</tr>
		<tr>
			<td align="right">&nbsp;전체 통계일 </td>
			<td>&nbsp;<b><?=$mplogobj->getTotalDays()?></b> days</td>
		</tr>
	</tbody>
</table>
</div>