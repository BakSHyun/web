<script>
document.rcform.html.checked=true;	// 에디터 사용시 html 사용을 강제로 체크한다.
</script>

<script>


function view_mms() {
	var f = document.rcform;
	if(f.send_sms.checked) {
		mms.style.display = "";
	}
	else {
		mms.style.display = "none";
	}
}

function phone_layer_vh(obj) {
	var f = document.rcform;
	if(obj.checked) {
		phone_layer.style.display = "";
	}
	else {
		phone_layer.style.display = "none";
	}
}


function CheckMsg()
{
	var str,msg;
	var len = 0;
	var temp;
	var count = 0;

	msg = document.rcform.etc19.value;
	str = new String(msg);
	len = str.length;

	for (k=0 ; k<len ; k++){
		temp = str.charAt(k);

		if (escape(temp).length > 4) {
			count += 2;
		}
		else if (temp == 'r' && str.charAt(k+1) == 'n') {
			// rn일 경우
			count += 2;
		}
		else if (temp != 'n') {
			count++;
		}
	}

	document.rcform.byte.value = count;

	if(count > 80) {
		document.rcform.etc19.blur();
		document.rcform.etc19.focus();
		alert("메시지 내용은 80바이트까지만 가능합니다.");
		CutChar();
	}
}

function CutChar()
{
	var str,msg;
	var len=0;
	var temp;
	var count;
	count = 0;

	msg = document.rcform.etc19.value;
	str = new String(msg);
	len = str.length;

	for(k=0 ; k<len ; k++) {
		temp = str.charAt(k);

		if(escape(temp).length > 4) {
			count += 2;
		}
		else if (temp == 'r' && str.charAt(k+1) == 'n') {
			// rn일 경우
			count += 2;
		}
		else if(temp != 'n') {
			count++;
		}
		if(count > 80) {
			str = str.substring(0,k);
			break;
		}
	}
	document.rcform.etc19.value = str;
	CheckMsg(str);
}


</script>

<?
	if($code =="counsel"){
		$subject="온라인상담";
	} else if($code =="payment"){
		$subject="비용문의";
	} else if($code =="event_page"){
		$subject="이벤트";
	}else if($code =="online1"){
		$subject="내원상담";
	}else if($code =="online2"){
		$subject="전화문의";
	}else if($code =="online3"){
		$subject="수술완료,수신거부";
	}
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
	<tr>
		<td align="center"><span class="style8">[<?=$subject?>]</span></td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
</table>

<form name="rcform" method="post" action="<?=$PHP_SELF?>" Onsubmit="return formCheck(this)">
<input type="hidden" name="group" value="<?=$group?>" />
<input type="hidden" name="code" value="<?=$code?>" />
<input type="hidden" name="m1" value="<?=$m1?>">
<input type="hidden" name="m2" value="crm_writedb">
<input type="hidden" name="no" value="<?=$no?>">
<input type="hidden" name="search_para" value="<?=$search_para?>">

<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" align="center">
	<tr>
		<td width="10%" height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">이름</td>
		<td width="40%" class="fonttype1" style="padding-left:10px">
			<input type="text" name="name" value="<?=$row[name]?>" size="30" class="fonttype1" />
		</td>
<?
if($_SESSION[userid]=='mantop1'){
	$cate1='강남점';
}else if($_SESSION[userid]=='4000'){
	$cate1='대구점';
}else if($_SESSION[userid]=='mantop2'){
	$cate1='부산점';
}


?>
		<td width="10%" align="center" bgcolor="#F6FAFC" class="fonttype2">지점</td>
		<td width="40%" class="fonttype1" style="padding-left:10px">
			<input type="hidden" name="cate1_input" value="<?=$cate1?>"  class="fonttype1" /><?=$cate1?>
		</td>
	</tr>
	<tr>
		<td height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">핸드폰</td>
		<td class="fonttype1" style="padding-left:10px">
			<input type="text" name="hphone1" value="<?=$row[hphone1]?>" size="8" class="fonttype1" />
			-
			<input type="text" name="hphone2" value="<?=$row[hphone2]?>" size="8" class="fonttype1" />
			-
			<input type="text" name="hphone3" value="<?=$row[hphone3]?>" size="8" class="fonttype1" />

		</td>
		<td align="center" bgcolor="#F6FAFC" class="fonttype2">상담희망시간</td>
		<td class="fonttype1" style="padding-left:10px">
			<select name="etc2" id='res_time_table'>
			<option value="">시간선택</option>
			<option value="09:00 ~ 11:00" >09:00 ~ 11:00</option>
			<option value="11:00 ~ 13:00" >11:00 ~ 13:00</option>
			<option value="13:00 ~ 15:00" >13:00 ~ 15:00</option>
			<option value="15:00 ~ 17:00" >15:00 ~ 17:00</option>
			<option value="17:00 ~ 19:00" >17:00 ~ 19:00</option>
			</select>
		</td>
	</tr>
	<tr>
		<td height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">이메일</td>
		<td class="fonttype1" style="padding-left:10px">
			<input type="text" name="email" value="<?=$row[email]?>" size="30" class="fonttype1" />
			<!-- <input type="checkbox" name="send_email" value="Y" checked /> 이메일 발송 -->
		</td>
		<td align="center" bgcolor="#F6FAFC" class="fonttype2">&nbsp;</td>
		<td class="fonttype1" style="padding-left:10px">
			<?=$row[etc1]?>
		</td>
	</tr>
	<!--
<tr>
        <td height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">관리</td>
        <td class="fonttype1" colspan="3" style="padding-left:10px">
        	<select name="etc4" class="fonttype1">
        		<option value="관리중" <? if($row[etc4] == "관리중") { echo "selected"; } ?>>관리중</option>
						<option value="완료" <? if($row[etc4] == "완료") { echo "selected"; } ?>>완료</option>
					</select>
        </td>
</tr>
-->
	<tr>
		<td height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">항목</td>
		<td class="fonttype1" colspan="3" style="padding-left:10px">
			<table class='bbs_write'>
				<colgroup>
				<col style="width:125PX;" />
				<col style="width:110px"; />
				<col style="width:*"; />
				</colgroup>
				<tr>
					<th rowspan='5'>항목설정</th>
					<th class='type3'>남성수술</th>
					<td>
						<p><input type="checkbox" name="etc1[]" value="조루"  /> 조루</p>
						<p><input type="checkbox" name="etc1[]" value="발기부전"  /> 발기부전</p>
						<p><input type="checkbox" name="etc1[]" value="귀두확대술"/> 귀두확대</p>
						<p><input type="checkbox" name="etc1[]" value="음경확대술"/> 음경확대</p>
						<p><input type="checkbox" name="etc1[]" value="음경길이연장"/> 음경길이연장</p>
						<p><input type="checkbox" name="etc1[]" value="음경만곡증"/> 음경만곡증</p>
						<p><input type="checkbox" name="etc1[]" value="바세린제거"/> 바세린제거</p>
						<p><input type="checkbox" name="etc1[]" value="레이저포경수술"/> 포경수술</p>
						<p><input type="checkbox" name="etc1[]" value="무도정관수술"/> 정관수술</p>
						<p><input type="checkbox" name="etc1[]" value="남성재수술"/> 남성재수술</p>
					</td>
				</tr>
				<tr>
					<th class='type3'>남성지방흡입</th>
					<td>
						<p><input type="checkbox" name="etc1[]" value="남성가슴성형"  /> 남성가슴성형</p>
						<p><input type="checkbox" name="etc1[]" value="남성복부성형"  /> 남성복부성형</p>
					</td>
				</tr>
				<tr>
					<th class='type3'>남성비만/체형</th>
					<td>
						<p><input type="checkbox" name="etc1[]" value="여유증"/> 여유증</p>
						<p><input type="checkbox" name="etc1[]" value="하이데프 체형성형"/> 갑바성형</p>
						<p><input type="checkbox" name="etc1[]" value="복부지방흡입"  /> 복부지방흡입</p>
						<p><input type="checkbox" name="etc1[]" value="하이데프 복근성형"/> 하이데프 복근성형</p>
					</td>
				</tr>
				<tr>
					<th class='type3'>남성클리닉</th>
					<td>
						<p><input type="checkbox" name="etc1[]" value="성병종합검진"/> 성병종합검진</p>
						<p><input type="checkbox" name="etc1[]" value="전립선질환"/> 전립선</p>
						<p><input type="checkbox" name="etc1[]" value="남성갱년기"/> 남성갱년기</p>
					</td>
				</tr>
			</table>

		</td>
	</tr>
	<tr>
		<td height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">제목</td>
		<td class="fonttype1" colspan="3" style="padding-left:10px">
			<?=$row[title]?>
		</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#F6FAFC" class="fonttype2">내용</td>
		<td class="fonttype1" colspan="3" style="padding:10px">
			<textarea name="contents" id="contents" rows="30" style="width:650px"    editor="webnote"><?=$contents?></textarea>
		</td>
	</tr>
<? if($row[etc1]){?>
	<tr>
		<td height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">추가정보1</td>
		<td class="fonttype1" colspan="3" style="padding-left:10px">
			<?=$row[etc1]?>
		</td>
	</tr>
<?}?>
<? if($row[etc2]){?>
	<tr>
		<td height="30" align="center" bgcolor="#F6FAFC" class="fonttype2">추가정보2</td>
		<td class="fonttype1" colspan="3" style="padding-left:10px">
			<?=$row[etc2]?>
		</td>
	</tr>
<?}?>
	<? if($code =="counsel" || $code =="payment"){?>
	<tr>
		<td align="center" bgcolor="#F6FAFC" class="fonttype2">답변</td>
		<td class="fonttype1" colspan="3" style="padding:10px"><textarea name="recontents" id="recontents" rows="30" style="width:650px"    editor="webnote"><?=$recontents?></textarea></td>
	</tr>
	<?}?>
</table>

<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" align="center">
	<tr>
		<td width="10%" align="center" bgcolor="#F6FAFC" class="fonttype2">방문경로</td>
		<td width="90%" class="fonttype1" colspan="3" style="padding:10px">
			<select name="etc6" class="fonttype1">
			<option value="" >--경로--</option>
			<option value="인터넷" <? if($row[etc6] == "인터넷") { echo "selected"; } ?>>인터넷</option>
			<option value="신문" <? if($row[etc6] == "신문") { echo "selected"; } ?>>신문</option>
			<option value="현수막" <? if($row[etc6] == "현수막") { echo "selected"; } ?>>현수막</option>
			<option value="1899" <? if($row[etc6] == "1899") { echo "selected"; } ?>>1899</option>
			<option value="간판" <? if($row[etc6] == "간판") { echo "selected"; } ?>>간판</option>
			<option value="지인소개" <? if($row[etc6] == "지인소개") { echo "selected"; } ?>>지인소개</option>
			<option value="외래전환" <? if($row[etc6] == "외래전환") { echo "selected"; } ?>>외래전환</option>
			</select>
			<? if($row[etc5] != "") { echo "/ " . $row[etc5]; } ?>
		</td>
	</tr>
	<tr>
		<td width="10%" align="center" bgcolor="#F6FAFC" class="fonttype2">상태</td>
		<td width="90%" class="fonttype1" colspan="3" style="padding:10px">
			<select name="etc3" class="fonttype1">
			<option value="" >--상태--</option>

			<option value="상" <? if($row[etc3] == "상") { echo "selected"; } ?>>상</option>
			<option value="중" <? if($row[etc3] == "중") { echo "selected"; } ?>>중</option>
			<option value="하" <? if($row[etc3] == "하") { echo "selected"; } ?>>하</option>
			<option value="비용부담" <? if($row[etc3] == "비용부담") { echo "selected"; } ?>>비용부담</option>
			<option value="전화안받음" <? if($row[etc3] == "전화안받음") { echo "selected"; } ?>>전화안받음</option>
			<option value="전화거절" <? if($row[etc3] == "전화거절") { echo "selected"; } ?>>전화거절</option>
			<option value="단순문의" <? if($row[etc3] == "단순문의") { echo "selected"; } ?>>단순문의</option>
			<option value="수술예약" <? if($row[etc3] == "수술예약") { echo "selected"; } ?>>수술예약</option>
			<option value="예약취소" <? if($row[etc3] == "예약취소") { echo "selected"; } ?>>예약취소</option>

			<option value="수술완료" <? if($row[etc3] == "수술완료") { echo "selected"; } ?>>수술완료</option>
			<option value="상담예약" <? if($row[etc3] == "상담예약") { echo "selected"; } ?>>상담예약</option>
			<option value="내원상담완료" <? if($row[etc3] == "내원상담완료") { echo "selected"; } ?>>내원상담완료</option>
			<option value="결번" <? if($row[etc3] == "결번") { echo "selected"; } ?>>결번</option>
			<option value="상담전화아님" <? if($row[etc3] == "상담전화아님") { echo "selected"; } ?>>상담전화아님</option>
			<option value="컴플레인" <? if($row[etc3] == "컴플레인") { echo "selected"; } ?>>컴플레인</option>
			<option value="바빠서통화곤란" <? if($row[etc3] == "바빠서통화곤란") { echo "selected"; } ?>>바빠서통화곤란</option>
			<option value="전원꺼짐" <? if($row[etc3] == "전원꺼짐") { echo "selected"; } ?>>전원꺼짐</option>
			</select>
			<? if($row[etc5] != "") { echo "/ " . $row[etc5]; } ?>
		</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#F6FAFC" class="fonttype2">상담관리</td>
		<td class="fonttype1" colspan="3" style="padding:10px">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="670">
						<textarea name="comment" id="comment" class="fonttype1" rows="3" style="width:650px"><?=$comment?></textarea>
					</td>
					<td>
						<input type="image" src="/<?=$INDIR?>/admin/img/btn_submit.gif" />
					</td>
				</tr>
				<?
				while($row_cmt=mysql_fetch_array($result_cmt)) {
					$row_cmt[comment] = nl2br($row_cmt[comment]);
				?>
				<tr><td height="10"></td></tr>
				<tr><td height="1" bgcolor="#999999" colspan="2"></td></tr>
				<tr><td height="10"></td></tr>
				<tr>
					<td class="fonttype1">
						<?=$row_cmt[comment]?>
						<? if($row_cmt[code] != "yourbiz") { ?>
						<br />[<?=$row_cmt[wdate]?>]
						<? } ?>
					</td>
					<td><span style="cursor:pointer" onclick="cmtModify(<?=$row_cmt[no]?>)">수정</span> <span style="cursor:pointer" onclick="cmtDelete(<?=$row_cmt[no]?>)">삭제</span></td>
				</tr>
				<?
				}
				?>
			</table>
			<!--<textarea name="recontents" id="recontents" rows="45" style="width:650px"><?=$recontents?></textarea>-->
		</td>
	</tr>
</table>
<table width="100%" border="0" align="center">
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<td align="center">
			<input type="image" src="/<?=$INDIR?>/admin/img/btn_write.gif" border="0">
			&nbsp;&nbsp;
			<a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_list&sno=<?=$sno?>&<?=$search_para?>"><img src="/<?=$INDIR?>/admin/img/btn_list.gif" border="0"></a>
		</td>
	</tr>
</table>
</form>
