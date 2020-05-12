<?
//MEDIPIX 사이트정보 를 읽어오기위하여 추가(08.04.15)
//require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php";
//MEDIPIX 사이트정보 를 읽어오기위하여 추가(08.04.15)
?>
<?
if($m2 == "resconfiginsert") $m2 = "resconfiginsertdb";
if($m2 == "resconfigupdate") $m2 = "resconfigupdatedb";

$manage_auth = "1"; // MEDIPIX 게시판관리권한 설정 (08.04.14)
$write_auth = "10";

if($m2 == "resconfigupdatedb") {
	$SQL = "select * from mpreserve_config where no='$no'";
	$result = mysql_query($SQL,$connect);
	$row = mysql_fetch_array($result);

	if(is_array($row)) while(list($key, $value)=each($row)) {
			$$key = $row[$key];
	}

	$arr_conf_items = explode("|", $conf_items);
	$conf_items_1 = $arr_conf_items[0];
	$conf_items_2 = $arr_conf_items[1];
	$conf_items_3 = $arr_conf_items[2];
	$conf_items_4 = $arr_conf_items[3];

	$arr_smsmail_use = explode("|", $smsmail_use);
	$smsmail_use_1 = $arr_smsmail_use[0];
	$smsmail_use_2 = $arr_smsmail_use[1];
	$smsmail_use_3 = $arr_smsmail_use[2];
	$smsmail_use_4 = $arr_smsmail_use[3];
	//$smsmail_use_phonenum = $arr_smsmail_use[4];

}
else if($m2 == "resconfiginsertdb") {
	$time0 = "";
	$time1 = "10:00|11:00|12:00|14:00|15:00|16:00|17:00";
	$time2 = "10:00|11:00|12:00|14:00|15:00|16:00|17:00";
	$time3 = "10:00|11:00|12:00|14:00|15:00|16:00|17:00";
	$time4 = "10:00|11:00|12:00|14:00|15:00|16:00|17:00";
	$time5 = "10:00|11:00|12:00|14:00|15:00|16:00|17:00";
	$time6 = "10:00|11:00|12:00|14:00";

	$numofper0 = "";
	$numofper1 = "20|20|20|20|20|20|20";
	$numofper2 = "20|20|20|20|20|20|20";
	$numofper3 = "20|20|20|20|20|20|20";
	$numofper4 = "20|20|20|20|20|20|20";
	$numofper5 = "20|20|20|20|20|20|20";
	$numofper6 = "20|20|20|20";


	$conf_items_1 = "Y";
	$conf_items_2 = "Y";
	$conf_items_3 = "Y";
	$conf_items_4 = "Y";

	$smsmail_use_2 = "Y";
	$smsmail_use_3 = "Y";
	$reservation_possibility_day = "1";
	$sms_type ="sms";
}

?>
<script>
function formCheck(cf) {
	<? if($m2 == "resconfiginsertdb") {
		?>
		if(cf.code.value == "") {
			alert("지점코드를 입력해주세요");
			cf.code.focus();
			return false;
		}
		<? }
	?>
	if(cf.name.value == "") {
		alert("지점이름을 입력해주세요");
		cf.name.focus();
		return false;
	}


	if(cf.smsmail_use_1.checked == true && 	cf.smsmail_use_phonenum.value == "")
	{
		alert("SMS를 받을 관리자의 핸드폰번호를 입력해주세요");
		cf.smsmail_use_phonenum.focus();
		return false;
	}
}
</script>
<div id='admin_sub_wrap'>
	<h2>[예약 설정]</h2>

	<table class='admin_table_type2' summary='온라인예약-설정'>
	<form name="rcform" method="post" action="<?=$PHP_SELF?>" Onsubmit="return formCheck(this)">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="<?=$m2?>">
	<input type="hidden" name="no" value="<?=$no?>">


	<colgroup>
		<col style="width:150px;" />
		<col style="width:*;" />
	</colgroup>
	<tbody>
		<? if($m2 == "resconfiginsertdb") { ?>
		<tr>
			<th>지점코드</th>
			<td><input name="code" type="text" class="input" id="code" value="<?=$code?>"></td>
		</tr>
		<? } ?>
		<tr>
			<th>지점이름</th>
			<td><input name="name" type="text" class="input" id="name" value="<?=$name?>"></td>
		</tr>
		<tr>
			<th>스킨</th>
			<td>

				<?$dirarray = dirList($DROOT."/".$INDIR."/mpreserve/skin/");?>
				<select name="skin" id="skin" class="input">
				<?if(is_array($dirarray)) while(list($key, $value)=each($dirarray)) {?>
				<option value="<?=$value?>" <?if($skin == $value) echo "selected";?>><?=$value?></option>
				<?}?>
				</select>

				<img src="/<?=$INDIR?>/admin/img/ihelp.gif" align="absmiddle" border="0" style="cursor:hand" Onclick="layerinfox('게시판 스킨경로는 <b>/mpboard/skin/</b> 에 위치해 있습니다.<br><br>스킨추가시에 이곳에 원하는 이름의 스킨 디랙토리를 생성후 스킨을 업로드 하시면 됩니다.','divlayerinfo')">
			</td>
		</tr>
		<tr>
			<th>예약가능시간</th>
			<td>
				<table class='admin_table_type2' summary='온라인예약-설정'>
					<tr>
						<td width="100" align="center" bgcolor="#F6FAFC" rowspan="4">일요일</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="time0" type="text"id="time0" value="<?=$time0?>" size="60"> <font color='red'>*</font> | 로 구분</td>
					</tr>
					<tr>
						<td><input name="numofper0" type="text" class="input" id="numofper0" value="<?=$numofper0?>" size="30"> <font color='red'>*</font> | 로 구분 <? if($m2 <> "resconfiginsertdb"){?><input type="button" value="설정" onclick="popUpWindow('/mpreserve/admin/numofper.php?code=<?=$code?>&week=0', 'numofper', 300, 320, 100, 100, 'no', 'no')" /><?}?> &nbsp;시간별 각각 인원설정</td>
					</tr>
					<tr>
						<td>
							진료스케줄 :
							<select name="time0_am" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time0_am == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time0_am == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time0_am == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time0_am == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 20151222 제니 선생님별예약 수정
							오후 :
							<select name="time0_pm" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time0_pm == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time0_pm == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time0_pm == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time0_pm == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							-->
							&nbsp;&nbsp;&nbsp;&nbsp;※스케줄표시 연동용 선택
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"> 일요일 비고 <input name="time0_txt" type="text" class="input" id="time0_txt" value="<?=$time0_txt?>" size="60"> <font color='red'>*</font></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#F6FAFC" rowspan="4">월요일</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="time1" type="text" class="input" id="time1" value="<?=$time1?>" size="60"> <font color='red'>*</font> | 로 구분</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"><input name="numofper1" type="text" class="input" id="numofper1" value="<?=$numofper1?>" size="30"> <font color='red'>*</font> | 로 구분 <? if($m2 <> "resconfiginsertdb"){?><input type="button" value="설정" onclick="popUpWindow('/mpreserve/admin/numofper.php?code=<?=$code?>&week=1', 'numofper', 300, 320, 100, 100, 'no', 'no')" /><?}?> &nbsp;시간별 각각 인원설정</td>
					</tr>
					<tr>
						<td>
							진료스케줄 :
							<select name="time1_am" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time1_am == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time1_am == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time1_am == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time1_am == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 20151222 제니 선생님별예약 수정
							오후 :
							<select name="time1_pm" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time1_pm == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time1_pm == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time1_pm == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time1_pm == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							-->
							&nbsp;&nbsp;&nbsp;&nbsp;※스케줄표시 연동용 선택
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"> 월요일 비고 <input name="time1_txt" type="text" class="input" id="time1_txt" value="<?=$time1_txt?>" size="60"> <font color='red'>*</font></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#F6FAFC" rowspan="4">화요일</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="time2" type="text" class="input" id="time2" value="<?=$time2?>" size="60"> <font color='red'>*</font> | 로 구분</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"><input name="numofper2" type="text" class="input" id="numofper2" value="<?=$numofper2?>" size="30"> <font color='red'>*</font> | 로 구분 <? if($m2 <> "resconfiginsertdb"){?><input type="button" value="설정" onclick="popUpWindow('/mpreserve/admin/numofper.php?code=<?=$code?>&week=2', 'numofper', 300, 320, 100, 100, 'no', 'no')" /><?}?> &nbsp;시간별 각각 인원설정</td>
					</tr>
					<tr>
						<td>
							진료스케줄 :
							<select name="time2_am" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time2_am == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time2_am == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time2_am == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time2_am == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 20151222 제니 선생님별예약 수정
							오후 :
							<select name="time2_pm" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time2_pm == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time2_pm == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time2_pm == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time2_pm == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							-->
							&nbsp;&nbsp;&nbsp;&nbsp;※스케줄표시 연동용 선택
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"> 화요일 비고 <input name="time2_txt" type="text" class="input" id="time2_txt" value="<?=$time2_txt?>" size="60"> <font color='red'>*</font></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#F6FAFC" rowspan="4">수요일</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="time3" type="text" class="input" id="time3" value="<?=$time3?>" size="60"> <font color='red'>*</font> | 로 구분</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"><input name="numofper3" type="text" class="input" id="numofper3" value="<?=$numofper3?>" size="30"> <font color='red'>*</font> | 로 구분 <? if($m2 <> "resconfiginsertdb"){?><input type="button" value="설정" onclick="popUpWindow('/mpreserve/admin/numofper.php?code=<?=$code?>&week=3', 'numofper', 300, 320, 100, 100, 'no', 'no')" /><?}?> &nbsp;시간별 각각 인원설정</td>
					</tr>
					<tr>
						<td>
							진료스케줄 :
							<select name="time3_am" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time3_am == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time3_am == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time3_am == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time3_am == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 20151222 제니 선생님별예약 수정
							오후 :
							<select name="time3_pm" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time3_pm == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time3_pm == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time3_pm == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time3_pm == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							-->
							&nbsp;&nbsp;&nbsp;&nbsp;※스케줄표시 연동용 선택
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"> 수요일 비고 <input name="time3_txt" type="text" class="input" id="time3_txt" value="<?=$time3_txt?>" size="60"> <font color='red'>*</font></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#F6FAFC" rowspan="4">목요일</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="time4" type="text" class="input" id="time4" value="<?=$time4?>" size="60"> <font color='red'>*</font> | 로 구분</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"><input name="numofper4" type="text" class="input" id="numofper4" value="<?=$numofper4?>" size="30"> <font color='red'>*</font> | 로 구분 <? if($m2 <> "resconfiginsertdb"){?><input type="button" value="설정" onclick="popUpWindow('/mpreserve/admin/numofper.php?code=<?=$code?>&week=4', 'numofper', 300, 320, 100, 100, 'no', 'no')" /><?}?> &nbsp;시간별 각각 인원설정</td>
					</tr>
					<tr>
						<td>
							진료스케줄 :
							<select name="time4_am" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time4_am == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time4_am == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time4_am == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time4_am == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 20151222 제니 선생님별예약 수정
							오후 :
							<select name="time4_pm" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time4_pm == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time4_pm == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time4_pm == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time4_pm == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							-->
							&nbsp;&nbsp;&nbsp;&nbsp;※스케줄표시 연동용 선택
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"> 목요일 비고 <input name="time4_txt" type="text" class="input" id="time4_txt" value="<?=$time4_txt?>" size="60"> <font color='red'>*</font></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#F6FAFC" rowspan="4">금요일</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="time5" type="text" class="input" id="time5" value="<?=$time5?>" size="60"> <font color='red'>*</font> | 로 구분</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"><input name="numofper5" type="text" class="input" id="numofper5" value="<?=$numofper5?>" size="30"> <font color='red'>*</font> | 로 구분 <? if($m2 <> "resconfiginsertdb"){?><input type="button" value="설정" onclick="popUpWindow('/mpreserve/admin/numofper.php?code=<?=$code?>&week=5', 'numofper', 300, 320, 100, 100, 'no', 'no')" /><?}?> &nbsp;시간별 각각 인원설정</td>
					</tr>
					<tr>
						<td>
							진료스케줄 :
							<select name="time5_am" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time5_am == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time5_am == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time5_am == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time5_am == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 20151222 제니 선생님별예약 수정
							오후 :
							<select name="time5_pm" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time5_pm == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time5_pm == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time5_pm == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time5_pm == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							-->
							&nbsp;&nbsp;&nbsp;&nbsp;※스케줄표시 연동용 선택
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"> 금요일 비고 <input name="time5_txt" type="text" class="input" id="time5_txt" value="<?=$time5_txt?>" size="60"> <font color='red'>*</font></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#F6FAFC" rowspan="4">토요일</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="time6" type="text" class="input" id="time6" value="<?=$time6?>" size="60"> <font color='red'>*</font> | 로 구분</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"><input name="numofper6" type="text" class="input" id="numofper6" value="<?=$numofper6?>" size="30"> <font color='red'>*</font> | 로 구분 <? if($m2 <> "resconfiginsertdb"){?><input type="button" value="설정" onclick="popUpWindow('/mpreserve/admin/numofper.php?code=<?=$code?>&week=6', 'numofper', 300, 320, 100, 100, 'no', 'no')" /><?}?> &nbsp;시간별 각각 인원설정</td>
					</tr>
					<tr>
						<td>
							진료스케줄 :
							<select name="time6_am" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time6_am == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time6_am == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time6_am == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time6_am == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<!-- 20151222 제니 선생님별예약 수정
							오후 :
							<select name="time6_pm" class="input">
								<option value="">=선택=</option>
								<option value="진료" <? if($time6_pm == "진료") { echo "selected"; } ?>>진료</option>
								<option value="수술" <? if($time6_pm == "수술") { echo "selected"; } ?>>수술</option>
								<option value="당직" <? if($time6_pm == "당직") { echo "selected"; } ?>>당직</option>
								<option value="휴진" <? if($time6_pm == "휴진") { echo "selected"; } ?>>휴진</option>
							</select>
							-->
							&nbsp;&nbsp;&nbsp;&nbsp;※스케줄표시 연동용 선택
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" class="type2"> 토요일 비고 <input name="time6_txt" type="text" class="input" id="time6_txt" value="<?=$time6_txt?>" size="60"> <font color='red'>*</font></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#FFFFFF" class="type2"> 통합 비고 <textarea rows="5" cols="70" name="time_note"><?=$time_note?></textarea> <font color='red'>*</font></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<th>예약가능일설정</th>
			<td class="type2"><input name="reservation_possibility_day" type="text" class="input" id="reservation_possibility_day" value="<?=$reservation_possibility_day?>" size="4" maxlength="2"> 일 <font color='red'>*</font> 당일예약은 불가능 최소 1일 후부터가능</td>
		</tr>
		<tr>
			<th>지점연락처</th>
			<td class="type2"><input name="branch_tel" type="text" class="input" id="branch_tel" value="<?=$branch_tel?>" size="20" maxlength="20">  <font color='red'>*</font> 지점에 해당하는 전화번호를 적어주세요</td>
		</tr>
		<tr>
			<th>항목설정</th>
			<td class="type2">
				<input name="conf_items_1__" type="checkbox" class="input" value="Y" checked disabled >이름
				<input type="hidden" name="conf_items_1" value="Y">
				<input name="conf_items_2__" type="checkbox" class="input" value="Y" checked disabled >연락처
				<input type="hidden" name="conf_items_2" value="Y">
				<input name="conf_items_3" type="checkbox" class="input" id="conf_items_3" value="Y" <? if($conf_items_3 == "Y") { echo "checked"; } ?>>이메일
				<input name="conf_items_4" type="checkbox" class="input" id="conf_items_4" value="Y" <? if($conf_items_4 == "Y") { echo "checked"; } ?>>메모
			</td>
		</tr>
		<tr>
			<th>SMS/메일 설정</th>
			<td>
				<table width="100%" cellpadding="2" cellspacing="1" bgcolor="#B0C8CF" class="type2">
					<tr>
						<td width="140" align="center" bgcolor="#F6FAFC" class="type">예약시 관리자에게</td>
						<td bgcolor="#FFFFFF" class="type2"><input name="smsmail_use_1" type="checkbox" class="input" id="smsmail_use_1" value="Y" <? if($smsmail_use_1 == "Y") { echo "checked"; } ?>>SMS&nbsp;&nbsp;&nbsp;<font  color="blue">SMS수신관리자 휴대폰번호</font> : <input type="text" name="smsmail_use_phonenum" value="<?=$smsmail_use_phonenum?>" size="15">여러명일경우 | 구분자를 사용하여 입력해주세요</td>
					</tr>
					<tr>
						<td align="center" bgcolor="#F6FAFC" class="type">예약확인시 예약자에게</td>
						<td bgcolor="#FFFFFF" class="type2">
							<input name="smsmail_use_2" type="checkbox" class="input" id="smsmail_use_2" value="Y" <? if($smsmail_use_2 == "Y") { echo "checked"; } ?>>SMS
							<input name="smsmail_use_3" type="checkbox" class="input" id="smsmail_use_3" value="Y" <? if($smsmail_use_3 == "Y") { echo "checked"; } ?>>MAIL
							<input name="smsmail_use_4" type="checkbox" class="input" id="smsmail_use_4" value="Y" <? if($smsmail_use_4 == "Y") { echo "checked"; } ?>>예약알림SMS
							&nbsp;&nbsp;&nbsp;
							<select name="resssms" id="resssms" class="input">
							<option value="1" <? if($resssms == "1") echo "selected";?>>하루 전</option>
							<option value="2" <? if($resssms == "2") echo "selected";?>>이틀 전</option>
							<option value="3" <? if($resssms == "3") echo "selected";?>>삼일 전</option>
							</select>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<th>권한설정</th>
			<td>
				<table cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" class="type2">
					<tr>
						<td width="100" height="26" bgcolor="#F6FAFC">&nbsp;</td>
						<td width="119" height="26" align="center" bgcolor="#F6FAFC" class="type">레벨선택</td>
					</tr>
					<tr>
						<td bgcolor="#F6FAFC" class="type"> ● 관리 권한 </td>
						<td align="center">
							<select name="manage_auth" id="manage_auth" class="input">
							<?
							$SQL = "select * from ammember_level where 1 order by level asc";
							$result = mysql_query($SQL,$connect);
							while($row = mysql_fetch_array($result)) {
							?>
							<option value="<?=$row[level]?>" <?if($manage_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
							<?
							}
							?>
							<option value="10" <?if($manage_auth == "10") echo "selected";?>>비회원</option>
							</select>
						</td>
					</tr>
					<tr>
						<td bgcolor="#F6FAFC" class="type"> ● 글쓰기 권한 </td>
						<td align="center">
							<select name="write_auth" id="write_auth" class="input">
							<?
							$SQL = "select * from ammember_level where 1 order by level asc";
							$result = mysql_query($SQL,$connect);
							while($row = mysql_fetch_array($result)) {
							?>
							<option value="<?=$row[level]?>" <?if($write_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
							<?
							}
							?>
							<option value="10" <?if($write_auth == "10") echo "selected";?>>비회원</option>
							</select>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</form>
<ul class='admin_btn_list'>
		<?
		if($m2 == "resconfiginsertdb") {
		?>
			<li><div class='btn_type3'><a Onclick='javascript:rcform.submit();'>등록</a></div></li>
		<?
		}
		else {
		?>
			<li><div class='btn_type3'><a Onclick='javascript:rcform.submit();'>수정</a></div></li>
		<?
		}
		?>
		<li><div class='btn_type4'><a href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=resconfiglist">목록</a></div></li>
</ul>