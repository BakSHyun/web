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
	<h2>[접속통계]</h2>

<table class='admin_table_type1'>
	<caption>접속통계</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
			<?
			if(!$year) $year = date("Y");
			if(!$month) $month = date("m");
			$mplogobj = new mplog($connect);
			?>
			<br>
			<table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1">
				<tr align="center">
					<?
					$year_array = $mplogobj->getYearsList();
					if(is_array($year_array)) {
						reset($year_array);
						while(list($key, $value)=each($year_array)) {
					?>
					<td>
						<a class="a" style="font-size:18px" href="<?=$PHP_SELF?>?group=&m1=statistics&m2=access_stat&year=<?=$key?>&month=<?=$month?>"><?=$key?>년 (<?=$value?> hits)</a>
					</td>
					<?
						}
					}
					?>
				</tr>
			</table>
			<br>
			<table width="98%"  cellpadding="2" cellspacing="0" class="admin_table_type1" align="center">
				<tr align="center" bgcolor="#F7F7F7">
					<th width="100">월별</th>
					<?
					$month_array = $mplogobj->getMonthsList($year);
					if(is_array($month_array)) {
						reset($month_array);
						while(list($key, $value)=each($month_array)) {
					?>
					<th><a class="a" href="<?=$PHP_SELF?>?group=&m1=statistics&m2=access_stat&year=<?=$year?>&month=<?=$key?>"><?=$key?>월</a></th>
					<?
						}
					}
					?>
				</tr>
				<tr align="center">
					<td>접속자수</td>
					<?
					if(is_array($month_array)) {
						reset($month_array);
						while(list($key, $value)=each($month_array)) {
					?>
					<td>&nbsp;<?=$value[counter]?></td>
					<?
						}
					}
					?>
				</tr>
			</table>

			<br>
			<table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1" >
				<tr align="center" bgcolor="#F7F7F7">
					<th width="100">날짜</th>
					<th>접속자수</th>
				</tr>
				<?
				$day_array = $mplogobj->getDaysList($year,$month);

				$array_tmp = $day_array;
				if(is_array($array_tmp)) {
					arsort($array_tmp);
					if(list($key, $value)=each($array_tmp)) {
						$max_value = $value;
					}
				}

				if(is_array($day_array)) {
					reset($day_array);
					while(list($key, $value)=each($day_array)) {
						$percent = round($value[percent], 1);
						if($max_value[percent]) $percent2 = ((99*$percent)/$max_value[percent]);
						else $percent2 = 0;
				?>
				<tr>
					<td align="center">&nbsp;<a class="a" href="<?=$PHP_SELF?>?group=&m1=statistics&m2=hour_stat&year=<?=$year?>&month=<?=$month?>&day=<?=$key?>"><?=$year."-".$month."-".$key?></a></td>
					<td>
						<table width="<?=$percent2?>%" class="type2">
							<tr height="12">
								<td>
									<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="#CCCCCC" class="type2" align="center">
										<tr height="12">
											<td bgcolor="#16A20D">
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
