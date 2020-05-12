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
	<h2>[운영체제별]</h2>

         <?
         $mplogobj = new mplog($connect);
         ?>
         <table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1" >
         <tr align="center" bgcolor="#F7F7F7">
                 <th>OS 종류</th>
                 <th>접속자수</th>
                 <th align="center" width="80">관리</th>
         </tr>
         <?
         $os_array = $mplogobj->getOsList();

         if(is_array($os_array)) {
         	arsort ($os_array);
         	reset($os_array);
         	while(list($key, $value)=each($os_array)) {
         ?>
         <tr>
                 <td align="center" style="border-bottom:1px solid #ddd">&nbsp;<?=$key?></td>
                 <td width="100" style="border-bottom:1px solid #ddd">
                         <?=$value[counter]?>
                 </td>
                 <td align="center" style="border-bottom:1px solid #ddd"><a style="cursor:hand" OnClick="goURL('<?=$PHP_SELF?>?.<?="group=$group&asumode=$asumode&aslmode=log_delete"?>&os_str=<?=$key?>&delmode=os','해당 OS 의 로그 기록을 삭제 하시겠습니까?')">삭제</a></td>
         </tr>
         <?
         	}
         }
         ?>
         </table>
         <br>
</div>