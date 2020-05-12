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
	<h2>[검색어별]</h2>
<?
$mplogobj = new mplog($connect);
?>
	<table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1">
	  <tr align="center" bgcolor="#F7F7F7">
	    <th>검색어</th>
        <th>검색수</th>
	  </tr>
	  <?
	    $search_array = $mplogobj->getSearchList();

        if(is_array($search_array)) {
        	arsort ($search_array);
        	reset($search_array);
        	while(list($key, $value)=each($search_array)) {
        		if(!$key) continue;
	  ?>
	  <tr OnmouseOver="this.style.background='#EEEEFF'" OnmouseOut="this.style.background='#FFFFFF'">
	    <td align="center" style="border-bottom:1px solid #ddd">&nbsp;<?=$key?></td>
        <td width="100" style="border-bottom:1px solid #ddd">
        <?=$value[counter]?>
        </td>
	  </tr>
	  <?
	  	   }
	  }
	  ?>
	</table>
</div>