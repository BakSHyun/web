			<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="img/spacer.gif" width="50" height="50"></td>
              </tr>
              <tr>
                <td align="center"><span class="style8">[시간대별통계]</span></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
            </table>

<?
$mplogobj = new mplog($connect);
?>
	<table width="98%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
	  <tr align="center" bgcolor="#F7F7F7">
	    <td width="100">날짜</td>
        <td>접속자수</td>
	  </tr>
	  <?

	    if($year && $month && $day) $day_array = $mplogobj->getHoursList($year,$month,$day);
	    else $day_array = $mplogobj->getHoursTotalList();

	    $array_tmp = $day_array;
	    if(is_array($array_tmp)) {
		    arsort($array_tmp);
		    if(list($key, $value)=each($array_tmp)) {
	  	  	$max_value = $value;
		    }
		  }

        if(is_array($day_array)) {
        	reset($day_array);
        	ksort($day_array);
        	while(list($key, $value)=each($day_array)) {
        		$percent = round($value[percent], 1);
        		if($max_value[percent]) $percent2 = ((99*$percent)/$max_value[percent]);
        		else $percent2 = 0;

	  ?>
	  <tr>
	    <td align="center">&nbsp;<?=$key?> 시</td>
        <td>
	        <table width="<?=$percent2?>%" class="type2">
	        <td>
	        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="#CCCCCC" class="type2" align="center">
	        	<tr height="12">
	        	  <td bgcolor="#E7E7F7">
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