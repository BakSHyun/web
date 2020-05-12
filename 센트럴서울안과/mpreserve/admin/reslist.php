<script language="javascript">
function allCheck(cform){
	var objCheck;
	objCheck = document.getElementsByName("delno[]");
	if(cform.allch.checked)	{
		if(objCheck.length)		{
			for(i=0;i<objCheck.length;i++){
				objCheck[i].checked = 'on';
			}
		}
	}
	else{
		if(objCheck.length){
			for(i=0;i<objCheck.length;i++){
				objCheck[i].checked = '';
			}
		}
	}
}

function quedel(){
	var objCheck, chkVal;
	objCheck = document.getElementsByName("delno[]");
	myform = document.cform;

	if(objCheck.length){
		for(i=0;i<objCheck.length;i++)
			if(objCheck[i].checked) chkVal = true;

		if(chkVal){
			if(confirm("선택항목을 삭제하시겠습니까?")){
				myform.m2.value = 'reslistdel';
				myform.submit();
				//return true;
			}else{
				return false;
			}
		}else{
			alert("삭제하실 항목을 선택해 주세요");
			return false;
		}
	}else{
		return false;
	}
}

function excel_list_reserve() {
	myform = document.cform;

		if(confirm('\예약 현황을 엑셀 저장을 하시겠습니까?')==true) {
			myform.action="excel_save_reserve.php";
			myform.submit();
		}else{
			return;
	}

}

/* MEDIPIX 회원 sms발송 추가 (08.04.15) */
function smspopup_direct(cform,para,smsmode,msg) {

	popUpWindow('/<?=$INDIR?>/ammember/admin/smssendform.php?checkvalue='+para+"&smsmode="+smsmode+"&",'smspopup', 200, 580,250,300,'no','no');

}

/* MEDIPIX 회원 sms발송 추가 (08.04.15) */

</script>

<?
$search_para = "search_code=$search_code&search_ryear=$search_ryear&search_rmonth=$search_rmonth&search_rday=$search_rday&search_key=$search_key&search_value=$search_value";
$order_para = "orderby=$orderby";
if(!$orderby) $orderby = "wdate";
?>

<div id='admin_sub_wrap'>
<? include '../admin/sms_send.php'; ?>
	<h2>예약 리스트</h2>

	<form name="formsearch" method="post" action="<?=$PHP_SELF?>">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="<?=$m2?>">
	<input type="hidden" name="sno" value="<?=$sno?>">
	<div id='reserve_search_wrap'>
	<ul>
		<li>
			<select name="search_code" class="select1">
				<option value="">전체지점
				<?
				$result = mysql_query("select code,name from mpreserve_config order by no asc",$connect);
				while($row = mysql_fetch_array($result)){
				?>
				<option value="<?=$row[code]?>" <? if($search_code == $row[code]) { echo "selected"; } ?>><?=$row[name]?>
				<? } ?>
			</select>
		</li>
		<li>
			<select name="search_ryear" class="select1">
				<option value="">예약년
				<? for($i=2008;$i<=date("Y");$i++){ ?>
				<option value="<?=$i?>" <? if($search_ryear == $i) { echo "selected"; } ?>><?=$i?>
				<? } ?>
			</select>
		</li>
		<li>
			<select name="search_rmonth" class="select1">
				<option value="">예약월
				<? for($i=1;$i<=12;$i++){
					if($i < 10) $j = "0".$i;
					else $j = $i;
				?>
				<option value="<?=$j?>" <? if($search_rmonth == $j) { echo "selected"; } ?>><?=$j?>
				<? } ?>
			</select>
		</li>
		<li>
			<select name="search_rday" class="select1">
				<option value="">예약일
				<? for($i=1;$i<=31;$i++){
					if($i < 10) $j = "0".$i;
					else $j = $i;
				?>
				<option value="<?=$j?>" <? if($search_rday == $j) { echo "selected"; } ?>><?=$j?>
				<? } ?>
			</select>
		</li>
		<li>
			<select name="search_key" class="select1">
				<option value="name" <? if($search_key == "name") { echo "selected"; } ?>>이름
				<option value="email" <? if($search_key == "email") { echo "selected"; } ?>>이메일
			</select>
		</li>
		<li><input type="text" name="search_value" value="<?=$search_value?>" class="text1"></li>
		<li><div class='btn_type2'><a onclick='javascript:formsearch.submit();'>검색</a></div></li>
	</ul>
	</div>
	</form>

	<p class='desc'><strong>[정렬방식 :</strong>
		<a href="<?=$PHP_SELF?>?m1=<?=$m1?>&amp;m2=<?=$m2?>&amp;orderby=resdate&amp;<?=$search_para?>"><? if($orderby == "resdate") { echo "<b class='red'>"; } ?>예약일로 정렬 하기<? if($orderby == "resdate") { echo "</b>"; } ?></a> /
		<a href="<?=$PHP_SELF?>?m1=<?=$m1?>&amp;m2=<?=$m2?>&amp;orderby=wdate&amp;<?=$search_para?>"><? if($orderby == "wdate") { echo "<b class='red'>"; } ?>접수일로 정렬 하기<? if($orderby == "wdate") { echo "</b>"; } ?></a>
	<strong>]</strong></p>

	<form name="cform"  method="post" action="<?=$PHP_SELF?>" onsubmit="return quedel()">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="reslistdel">
	<table class='admin_table_type1' summary='관리자 예약 리스트입니다.'>
		<caption>관리자 예약 리스트</caption>
		<colgroup>
			<col style="width:50px;" />
			<col style="width:30px;" />
			<col style="width:100px;" />
			<col style="width:120px;" />
			<col style="width:120px;" />
			<col style="width:*;" />
			<col style="width:150px;" />
			<col style="width:100px;" />
			<col style="width:140px;" />
		</colgroup>
		<thead>
			<tr>
				<th>번호</td>
				<th><input type="checkbox" name="allch" value="1" onClick="allCheck(cform);"></th>
				<th>진료구분</th>
				<th>진료관심</th>
				<th>예약일</th>
				<th>예약시간</th>
				<th>이름</th>
				<th>핸드폰</th>
				<th>예약현황</th>
				<th>날짜</th>
			</tr>
		</thead>
		<tbody>
			<?
			$where = "where 1 ";

			if($search_code){ $where .= "and code = '$search_code'"; }
			if($search_ryear){ $where .= "and resdate like '$search_ryear%'"; }
			if($search_rmonth){ $where .= "and resdate like '%$search_rmonth%'"; }
			if($search_rday){ $where .= "and resdate like '%$search_rday'"; }
			if($search_value){ $where .= "and $search_key like '%$search_value%'"; }
			if($orderby == "wdate"){ $sqlorderby = "order by wdate desc";
			}else if($orderby == "resdate"){ $sqlorderby = "order by resdate desc, restime asc"; }

			$query = "select count(*) counter from mpreserve $where";
			$bcounter = mysql_fetch_array(mysql_query($query,$connect));
			$totalcount = $bcounter[counter];

			$pageobj = new pageing($sno);
			$pageobj->linkclass = "a";
			$pageobj->totalcount = $totalcount;
			$pageobj->listnum = 20;
			$pageobj->pagenum = 10;
			$pageobj->addpara = "group=$group&m1=$m1&m2=$m2&$search_para";
			$PAGEING = $pageobj->setPage();

			if($sno == 0) {
				$page = 0;
				$sno = 0;
			}
			else $page = ($sno / $pageobj->listnum);

			$query = "select * from mpreserve $where $sqlorderby limit $sno, ".$pageobj->listnum." ";
			$result = mysql_query($query,$connect);
			if(is_resource($result)){
				while($row=mysql_fetch_array($result)) {
					$listno = $totalcount - ($pageobj->listnum*($page));
					$branch = mysql_result(mysql_query("select name from mpreserve_config where code= '$row[code]'",$connect),0,0);
					$contents = stripslashes($row[contents]);
					if($row[resstate] == "1") $resstate = "<font color='#333399'>예약확인</font>";
					else if($row[resstate] == "2") $resstate = "<font color='#333333'>진료완료</font>";
					else if($row[resstate] == "9") $resstate = "<font color='#CC3333'>예약취소</font>";
					else $resstate = "예약대기";

					if(!$row[resdate] || $row[resdate]=="0000-00-00"){
						$row[resdate] ="이름을 클릭하세요";
						$row[restime] ="이름을 클릭하세요";
					}
					$check_time=(time()-strtotime($row[wdate]))/60/60;
					if( $check_time <= 24 && $row[view]==0) {
						$newimg = " <img src='/img/comm/new.gif' border='0' align='absmiddle' style='margin-left:5px;'>";
					} else{
						$newimg = "";
					}


				$keywordArray = explode("_", $row[mpkeyword]);
				$row[keyword] = $keywordArray;
				if($row[keyword][0] == "NV") $row[keyword][0] = "<font color='blue'>네이버</font> <span style='font-size:8pt;color:#999999'>" . $row[keyword][2]. "(".$row[keyword][1] . ")</span>";
				else if($row[keyword][0] == "DM") $row[keyword][0] = "<font color='blue'>다음</font> <span style='font-size:8pt;color:#999999'>" . $row[keyword][2] . "</span>";
				else if($row[keyword][0] == "OV") $row[keyword][0] = "<font color='blue'>오버추어</font> <span style='font-size:8pt;color:#999999'>" . $row[keyword][2] . "</span>";
				else if($row[keyword][0] == "GL") $row[keyword][0] = "<font color='blue'>구글</font>";
				else $row[keyword][0] = "<font color='blue'></font>";


				?>
				<tr>
					<td><?=$totalcount?></td>
					<td><input type="checkbox" name="delno[]" value="<?=$row[no]?>"></td>
					<td><?=$row[etc2]?></td>
					<td><?=$row[etc1]?></td>
					<td><?=$row[resdate]?></td>
					<td><?=$row[restime]?></td>
					<td><a href="<?=$PHP_SELF?>?m1=<?=$m1?>&m2=resview&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$order_para?>&<?=$search_para?>"><?=$row[name]?> <?=$newimg?></a> <?=$row[keyword][0]?></td>
					<td><img src="/<?=$INDIR?>/admin/img/phone.png" style="cursor:pointer;position:relative;margin-right:5px;top:-2px;" OnClick="smspopup_direct(cform,'<?=$row[id]?>','select','SMS을 발송할 회원을 선택해 주세요')" alt='SMS발송'> <?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></td>
					<td><?=$resstate?></td>
					<td><?=$row[wdate]?></td>
				</tr>
				<?
					$totalcount--;
				}
			}else{ ?>
			<tr><td colspan='9'>접수된 예약이 없습니다.</td></tr>
			<?}?>
		</tbody>
	</table>
	<ul class='admin_btn_list'>
		<li><div class='btn_type4'><a onclick='javascript:quedel();'>선택삭제</a></div></li>
		<li><div class='btn_type3'><a OnClick="excel_list_reserve();">엑셀저장</a></div></li>
	</ul>

	</form>
	<ul class='bbs_paging2'>
		<li><?=$PAGEING[start]?></li>
		<li><?=$PAGEING[pregroup]?></li>
		<li><?=$PAGEING[nextgroup]?></li>
		<li><?=$PAGEING[end]?></li>
	</ul>
	<ul class='bbs_paging'>
		<?=$PAGEING[page]?>
	</ul>
</div>