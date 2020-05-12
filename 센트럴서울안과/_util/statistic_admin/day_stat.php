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
	<h2>[일별통계]</h2>

<?
$mplogobj = new mplog($connect);
?>
	<table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1">
	  <tr align="center" bgcolor="#F7F7F7">
	    <td width="100">날짜</td>
        <td>접속자수</td>
	  </tr>
	  <?
	    if($year && $month) $day_array = $mplogobj->getDaysList($year,$month);
	    else $day_array = $mplogobj->getDayTotalList();

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
	    <td align="center">&nbsp;<?=$key?>일</td>
        <td>
	        <table width="<?=$percent2?>%" class="type2">
	        <td>
	        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="#CCCCCC" class="type2" align="center">
	        	<tr height="12">
	        	  <td bgcolor="#0d8ba2">
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

	</style>