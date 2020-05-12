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
	<h2>[방문 ip별]</h2>

<?
$mplogobj = new mplog($connect);
?>
	<table width="98%" cellpadding="2" cellspacing="0" class="admin_table_type1" >
	  <tr align="center" bgcolor="#F7F7F7">
	    <th>접속 IP 주소</th>
        <th>접속수</th>
	  </tr>
	  <?
	    $week_array = $mplogobj->getIpList();

        if(is_array($week_array)) {

			$totalcount = sizeof($week_array);

			$pageobj = new pageing($sno);
			$pageobj->linkclass = "a";
			$pageobj->totalcount = $totalcount;
			$pageobj->listnum = 20;
			$pageobj->pagenum = 10;
			$pageobj->addpara = "group=$group&asumode=$asumode&asmmode=$asmmode&aslmode=$aslmode";
			$PAGEING = $pageobj->setPage();

			if($sno == 0) {
				$page = 0;
				$sno = 0;
			} else $page = ($sno / $pageobj->listnum);

        	$acount = 0;

        	reset($week_array);
        	arsort ($week_array);
        	while(list($key, $value)=each($week_array)) {
        		$acount++;
        		if(!$key) $key = "[직접주소입력 및 즐겨찾기로 방문]";
        		else $key = "<font color='blue'>".$key."</font>";
        		if(($acount <= $sno+$pageobj->listnum) && ($acount > $sno)) {
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
	  }
	  ?>
	</table>
	<br>
	<ul class="total_paigng">
		<li><?=$PAGEING[start]?></li> <li><?=$PAGEING[pregroup]?></li> <li><?=$PAGEING[pre]?></li>  <?=$PAGEING[page]?>  <li><?=$PAGEING[next]?></li>  <li><?=$PAGEING[nextgroup]?></li> <li><?=$PAGEING[end]?></li> <li><?=$PAGEING[now]?></li>
		</ul>

	</div>