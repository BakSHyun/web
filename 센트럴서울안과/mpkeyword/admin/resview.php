<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
	<tr>
		<td align="center"><span class="style8">[예약 정보]</span></td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
</table>

<?
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

<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" align="center">
<form name="formres" method="post" action="<?=$PHP_SELF?>">
<input type="hidden" name="asumode" value="<?=$asumode?>">
<input type="hidden" name="asrmode" value="resstate">
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
	<tr>
		<td width="100" height="28" align="center" bgcolor="#F6FAFC" class="type">예약현황</td>
		<td style="padding-left:10px">
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
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">메일/SMS 발송</td>
		<td style="padding-left:10px" class="type2">
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
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">지점</td>
		<td style="padding-left:10px" class="type2"><?=$branch?></td>
	</tr>
	<tr>
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">예약시간</td>
		<td style="padding-left:10px; color:#564DD1; font-weight:bold" class="type2"><?=$row[resdate]?> / <?=$row[restime]?></td>
	</tr>
	<tr>
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">이름</td>
		<td style="padding-left:10px" class="type2"><?=$row[name]?> <?=$id?></td>
	</tr>
	<tr>
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">이메일</td>
		<td style="padding-left:10px" class="type2"><?=$row[email]?></td>
	</tr>
	<tr>
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">핸드폰번호</td>
		<td style="padding-left:10px" class="type2"><?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></td>
	</tr>
	<tr>
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">IP</td>
		<td style="padding-left:10px" class="type2"><?=$row[ip]?></td>
	</tr>
	<tr>
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">작성날짜</td>
		<td style="padding-left:10px" class="type2"><?=$row[wdate]?></td>
	</tr>
	<tr>
		<td height="28" align="center" bgcolor="#F6FAFC" class="type">메모</td>
		<td style="padding-left:10px" class="type2"><?=$contents?></td>
	</tr>
</table>
<br>
<table width="100%" border="0" align="center">
	<tr>
		<td>&nbsp;</td>
		<td align="right">
			<input type="image" src="/<?=$INDIR?>/admin/img_old/btn_submit.gif" border="0" align="absmiddle">
			<a href="<?=$PHP_SELF?>?asumode=reserve&asrmode=reslist&sno=<?=$sno?>&<?=$search_para?>&<?=$order_para?>" class="a1"><img src="/<?=$INDIR?>/admin/img_old/btn_list.gif" border="0" align="absmiddle"></a></td>
	</tr>
</form>
</table>