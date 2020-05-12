<?
$mplogobj = new mplog($connect);
?>
			
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
	.total_paigng{
		width:600px;
		margin:0 auto;
	}
	.total_paigng:after {
		content:""; display:block;clear:both;
	}
	.total_paigng > li {
		float:left;
		margin:0 10px;
		font-size:16px;
	}
</style>
<div id='admin_sub_wrap'>
	<h2>[브라우저별]</h2>

	<table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1">
	  <tr align="center" bgcolor="#F7F7F7">
	    <th>브라우져 종류</th>
        <th>접속자수</th>
        <th align="center" width="80">관리</th>
	  </tr>
	  <?
	    $brower_array = $mplogobj->getBrowerList();

        if(is_array($brower_array)) {
        	arsort ($brower_array);
        	reset($brower_array);
        	while(list($key, $value)=each($brower_array)) {
	  ?>
	  <tr OnmouseOver="this.style.background='#EEEEFF'" OnmouseOut="this.style.background='#FFFFFF'">
	    <td align="center" style="border-bottom:1px solid #ddd">&nbsp;<?=$key?></td>
        <td width="100" style="border-bottom:1px solid #ddd">
        <?=$value[counter]?>
        </td>
        <td align="center" style="border-bottom:1px solid #ddd"><a style="cursor:hand" OnClick="goURL('<?=$PHP_SELF?>?.<?="group=$group&asumode=$asumode&aslmode=log_delete"?>&brower_str=<?=$key?>&delmode=brower','해당 브라우져의 의 로그 기록을 삭제 하시겠습니까?')">삭제</a></td>
	  </tr>
	  <?
	  	   }
	  }
	  ?>
	</table>
	<br>
	</div>