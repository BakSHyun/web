<script language="Javascript" src="/webnote/webnote.js"></script>

<div id='admin_sub_wrap'>
	<h2>[예약 정보]</h2>
<?

$uquery = mysql_query("update mpreserve set view=view+1 where no=$no ");

$query = "select * from mpreserve where no=$no";
$result = mysql_query($query,$connect);
$row = mysql_fetch_array($result);

$result = mysql_query("select name from mpreserve_config where code = '$row[code]'");
$branch = mysql_result($result,0,0);

if($row[userid]) $id = "(".$row[userid].")";
$contents = stripslashes($row[contents]);
$contents = nl2br($contents);

$mpreserve = new mpreserve($row[code]);
$config = $mpreserve->config;

$search_para = "search_code=$search_code&search_ryear=$search_ryear&search_rmonth=$search_rmonth&search_rday=$search_rday&search_key=$search_key&search_value=$search_value";
$order_para = "orderby=$orderby";
?>
<script type="text/javascript">
<!--
	function view_mms() {
	var f = document.formres;
	if(f.send_sms.checked) {
		mms.style.display = "";
	}
	else {
		mms.style.display = "none";
	}
}
//-->
</script>
<script type="text/javascript">
<!--
function resDelete(cno) {
	if(confirm("예약을 삭제하시겠습니까?")) {
		document.formres.m2.value = "resdel";
		document.formres.no.value = cno;
		document.formres.submit();
	}
}

//-->
</script>
<? include '../admin/sms_send.php'; ?>

<table class='admin_table_type2' summary='온라인예약-정보'>
<form name="formres" method="post" action="<?=$PHP_SELF?>">
<input type="hidden" name="m1" value="<?=$m1?>">
<input type="hidden" name="m2" value="resstate">
<input type="hidden" name="no" value="<?=$no?>">
<input type="hidden" name="sno" value="<?=$sno?>">
<input type="hidden" name="search_code" value="<?=$search_code?>">
<input type="hidden" name="search_ryear" value="<?=$search_ryear?>">
<input type="hidden" name="search_rmonth" value="<?=$search_rmonth?>">
<input type="hidden" name="search_rday" value="<?=$search_rday?>">
<input type="hidden" name="search_key" value="<?=$search_key?>">
<input type="hidden" name="search_value" value="<?=$search_value?>">
<input type="hidden" name="orderby" value="<?=$orderby?>">
<input type="hidden" name="code" value = "<?=$row[code]?>">
	<colgroup>
		<col style="width:250px;" />
		<col style="width:*;" />
	</colgroup>
	<tbody>
	<tr>
		<th>예약현황</th>
		<td>
			<select name="resstate" class="input">
				<option value="">예약대기
				<option value="1" style="color:#333399" <? if($row[resstate] == "1") { echo "selected"; } ?>>예약확인
				<option value="2" style="color:#333333" <? if($row[resstate] == "2") { echo "selected"; } ?>>진료완료
				<option value="9" style="color:#CC3333" <? if($row[resstate] == "9") { echo "selected"; } ?>>예약취소
			</select>
		</td>
	</tr>
	<? if($config[mail_user] || $config[sms_user]) { ?>
	<tr>
		<th>메일/SMS 발송</th>
		<td>
			<? if($config[mail_user]) { ?>
			<input type="checkbox" name="sendmail" value="Y" checked> 메일 발송
			<? } ?>
			<? if($config[sms_user]) { ?>
			<input type="checkbox" name="sendsms" value="Y" checked> SMS 발송
			<? } ?>
			<? if($config[resssms_user]) { ?>
            <input type="checkbox" name="resssms_check" value="Y"> 예약알림 SMS발송
			&nbsp;&nbsp;
			<select name="resssms" id="resssms" class="input">
			<option value="1" <? if($config[resssms] == "1") echo "selected";?>>하루 전</option>
			<option value="2" <? if($config[resssms] == "2") echo "selected";?>>이틀 전</option>
			<option value="3" <? if($config[resssms] == "3") echo "selected";?>>삼일 전</option>
			</select>
            &nbsp;&nbsp;
		   	<select name="resssms_time" id="resssms_time" class="input">
            <option value= "090000" >9시</option>
			<option value= "100000" >10시</option>
			<option value= "110000" >11시</option>
			<option value= "120000" >12시</option>
			<option value= "130000" >13시</option>
			<option value= "140000" >14시</option>
			<option value= "150000" >15시</option>
			<option value= "160000" >16시</option>
			<option value= "170000" >17시</option>
			<option value= "180000" >18시</option>
            <option value= "190000" >19시</option>
			<option value= "200000" >20시</option>
			</select>
            <? } ?>
		</td>
	</tr>
	<? } ?>
	<tr>
		<th>진료구분</th>
		<td><?=$row[etc1]?></td>
	</tr>
	<tr>
		<th>예약시간</th>
		<td><strong class='blue'><input type='text' name='resdate' value="<?=$row[resdate]?>" size="7"> / <input type='text' name='restime' value="<?=$row[restime]?>" size="4"></strong> <font color="red">(시간을 변경하실경우 기존의 형식과 같은형태로 입력해주세요!!)</font></td>
	</tr>
	<tr>
		<th>이름</th>
		<td><strong class='blue'><?=$row[name]?> <?=$id?></strong></td>
	</tr>
	<tr>
		<th>이메일</th>
		<td><strong class='blue'><?=$row[email]?>&nbsp;</strong></td>
	</tr>
	<tr>
		<th>핸드폰번호</th>
		<td><strong class='blue'><?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></strong></td>
	</tr>
	<tr>
		<th>작성자 IP</th>
		<td><?=$row[ip]?>&nbsp;</td>
	</tr>
	<tr>
		<th>작성날짜</th>
		<td><strong class='blue'><?=$row[wdate]?></strong></td>
	</tr>
	<tr>
		<th>접속방법</th>
		<td><strong class='blue'><a href="<?=$row[mp_reffer]?>" target="_new"><?=$row[mp_reffer]?></a></strong></td>
	</tr>
	<tr>
		<th>메모</th>
		<td><?=$contents?></td>
	</tr>
	<tr>
		<th>답변</th>
		<td><textarea name="etc5" editor="webnote" style="height:250px;width:600px"><?=$row[etc5]?></textarea></td>
	</tr>
</table>
<br>
<ul class='admin_btn_list'>
	<li><div class='btn_type3'><a href="<?=$PHP_SELF?>?m1=<?=$m1?>&m2=reslist&sno=<?=$sno?>&<?=$search_para?>&<?=$order_para?>">목록</a></div></li>
	<li><div class='btn_type4'><a Onclick='javascript:formres.submit();'>확인</a></div></li>
	<li><div class='btn_type4'><a Onclick='resDelete(<?=$row[no]?>)'>삭제</a></div></li>
</ul>
</form>
</div>