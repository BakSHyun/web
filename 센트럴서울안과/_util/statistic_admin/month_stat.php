<style>
.admin_table_type1 tbody th{
	font-size:14px ;
}
h1, h2, h3, h4, h5, h6, th, td {
    font-weight: normal;
    font-size:14px ;
	}
	.admin_table_type1 tbody td {
    border-bottom: none;
	}
</style>
<div id='admin_sub_wrap'>	
	<h2>[월별통계]</h2>
	<?
	$mplogobj = new mplog($connect);
	?>
		<table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1">
		  <tr align="center" bgcolor="#F7F7F7">
			<th width="100">날짜</th>
			<th>접속자수</th>
		  </tr>
		  <?
			if($year) $month_array = $mplogobj->getMonthsList($year);
			else $month_array = $mplogobj->getMonthTotalList();

			$array_tmp = $month_array;
			if(is_array($array_tmp)) {
				arsort($array_tmp);
				if(list($key, $value)=each($array_tmp)) {
				$max_value = $value;
				}
			  }

			if(is_array($month_array)) {
				reset($month_array);
				while(list($key, $value)=each($month_array)) {
					$percent = round($value[percent], 1);
					if($max_value[percent]) $percent2 = ((99*$percent)/$max_value[percent]);
					else $percent2 = 0;
		  ?>
		  <tr>
			<td align="center">&nbsp;<?=$key?>월</td>
			<td>
				<table width="<?=$percent2?>%" class="type2">
				<td>
				<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="#CCCCCC" class="type2" align="center">
					<tr height="12">
					  <td bgcolor="#0da27a">
					  </td>
					</tr>
				</table>
				</td>
				<td width="100">
				<?=$value[counter]?>&nbsp;(<?=round($value[percent], 1)?>%)
				</td>
				</tr>
				</table>
			</td>
		  </tr>
		  <?
			   }
		  }
		  ?>
		</table>
		<br>
		</div>