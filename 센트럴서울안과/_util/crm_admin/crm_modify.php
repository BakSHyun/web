<script language="Javascript" src="/webnote/webnote.js"></script>
<?
$SQL = "select * from amboard_basic where no='$no' limit 1";
$row = mysql_fetch_array(mysql_query($SQL));


$viewDate = date("Y-m-d H:i:s");
$SQL1 = "update amboard_basic set rdate='$viewDate',view=view+1 where no='$no'";
$view = mysql_query($SQL1);


$row[html] ="1";

if($row[html] == 0) {
	$row[contents] = htmlspecialchars($row[contents]);
	$row[contents] = ereg_replace(" ","&nbsp;",$row[contents]);
	$row[contents] = ereg_replace("	"," &nbsp;&nbsp;&nbsp;&nbsp;",$row[contents]);
	$contents = nl2br($row[contents]);
	//$contents = ($row[contents]);
}
else {
	$row[contents] = eregi_replace("<script","&lt;script",$row[contents]);
	$row[contents] = eregi_replace("</script>","&lt;/script&gt;",$row[contents]);
	$row[contents] = eregi_replace("<iframe","&lt;iframe",$row[contents]);
	$contents = eregi_replace("</iframe>","&lt;/iframe&gt;",$row[contents]);
}
$recontents = stripslashes($row[recontents]);
$etc20 = stripslashes($row[etc20]);

$res = mysql_query("select no,cname from amboard_basic_category where code='$code' order by ino asc");
while($row_cat = mysql_fetch_array($res)) {
	$cat_no = $row_cat[no];
	$categoryArray[$cat_no] = $row_cat[cname];
}

if($cmtMode != "modify") {
	$search_para = "search_etc4=$search_etc4&search_clinic=$search_clinic&search_cate1=$search_cate1&search_key=$search_key&search_value=$search_value&implode_etc3=$implode_etc3&search_call=$search_call&search_admin=$search_admin&search_referer=$search_referer";
}

$cate2Array = explode("_", $row[cate2]);
$row[cate2] = $cate2Array;
if($row[cate2][0] == "NV") $row[cate2][0] = "<font color='blue'>네이버</font> <span style='font-size:8pt;color:#999999'>" . $row[cate2][1] . "</span>";
else if($row[cate2][0] == "DM") $row[cate2][0] = "<font color='blue'>다음</font> <span style='font-size:8pt;color:#999999'>" . $row[cate2][1] . "</span>";
else if($row[cate2][0] == "OV") $row[cate2][0] = "<font color='blue'>오버추어</font> <span style='font-size:8pt;color:#999999'>" . $row[cate2][1] . "</span>";
else if($row[cate2][0] == "GL") $row[cate2][0] = "<font color='blue'>구글</font>";
else $row[cate2][0] = "<font color='blue'>즐겨찾기</font>";
?>
<script>
document.rcform.html.checked=true;	// 에디터 사용시 html 사용을 강제로 체크한다.
</script>

<div id='admin_sub_wrap'>
	<h2>CRM 관리</h2>

	<? include '../admin/sms_send.php'; ?>

	<form name="rcform" method="post" action="<?=$PHP_SELF?>" Onsubmit="return formCheck(this)">
	<input type="hidden" name="group" value="<?=$group?>" />
	<input type="hidden" name="code" value="<?=$code?>" />
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="crm_modifydb">
	<input type="hidden" name="no" value="<?=$no?>">
	<input type="hidden" name="search_para" value="<?=$search_para?>">

	<p class='desc'><strong>기본정보</strong></p>
	<table class='admin_table_type2' summary='게시판 등록 - 기본정보'>
		<caption>기본정보</caption>
		<colgroup>
		<col style="width:120px;" />
		<col style="width:350px;" />
		<col style="width:120px;" />
		<col style="width:350px;" />
		</colgroup>
		<tbody>
		<tr>
			<th>옵션</th>
			<td>
				<strong><input type="radio"  id="vstate" name='vstate' value="0" <?if($row[vstate] =="0") echo "checked";?>/>비승인 &nbsp;&nbsp;&nbsp;<input type="radio"  id="vstate" name='vstate' value="1" <?if($row[vstate] =="1") echo "checked";?>/>승인</strong></font>
			</td>
			<th>공개/비공개</th>
			<td><strong><input type="radio"  id="secret" name='secret' value="0" <?if($row[secret] =="0") echo "checked";?>/>공개 &nbsp;&nbsp;&nbsp;<input type="radio"  id="secret" name='secret' value="1" <?if($row[secret] =="1") echo "checked";?>/>비공개</strong></td>
		</tr>
		<tr>
			<th>이름</th>
			<td>
				<?=$row[name]?>
				<? if($row[cate1] != "") { echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;진료과목 : <strong>" . $row[cate1] . "</strong>"; } ?>
				<? if($row[admin_id] != "") { echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;상담자 : <strong>" . $row[admin_name] . "</strong>"; } ?>
			</td>
			<th>작성일</th>
			<td><?=$row[wdate]?></td>
		</tr>
		<tr>
			<th>핸드폰</th>
			<td><input name="hphone1" type="text" class="text2" id="hphone1" value="<?=$row[hphone1]?>"> - <input name="hphone2" type="text" class="text2" id="hphone2" value="<?=$row[hphone2]?>"> - <input name="hphone3" type="text" class="text2" id="hphone3" value="<?=$row[hphone3]?>"><? if($code =="counsel01"){?>&nbsp; <input type="checkbox" id="" name="send_sms" value="Y"/><font color="RED"> <strong>답변완료 SMS 발송</strong></font><?}?></td>
			<th>아이피</th>
			<td><?=$row[ip]?></td>
		</tr>
		<tr>
			<th>이메일</th>
			<td><input name="email" type="text" class="text1" id="email" value="<?=$row[email]?>"></td>
			<th>DB클릭한 시간</th>
			<td><?=$row[rdate]?></td>
		</tr>
		<? if ($row[referer_page]){?>
		<tr>
			<th>접속주소</th>
			<td><a href="<?=$row[referer_page]?>" target="_new"><?=$row[referer_page]?></a></td>
			<th>위치</th>
			<td><?=$row[position]?></td>
		</tr>
		<?}?>
		<? if ($code =="customer01_03" || $code =="event_friends" || $code =="event_new"){?>
		<tr>
			<th>예약일</th>
			<td colspan='3'>
				<input name="wmonth" type="text" class="text2" id="wmonth" value="<?=$row[wmonth]?>">월 &nbsp;<input name="wday" type="text" class="text2" id="wday" value="<?=$row[wday]?>">일&nbsp;&nbsp;
				<select id="whour" name="whour">
				<option value="" >시간<?=$row[whour]?></option>
				<option value="9시" <? if($row[whour] =="9시"){ echo "selected";}?>>9시</option>
				<option value="10시" <? if($row[whour] =="10시"){ echo "selected";}?>>10시</option>
				<option value="11시" <? if($row[whour] =="11시"){ echo "selected";}?>>11시</option>
				<option value="12시" <? if($row[whour] =="12시"){ echo "selected";}?>>12시</option>
				<option value="13시" <? if($row[whour] =="13시"){ echo "selected";}?>>13시</option>
				<option value="14시" <? if($row[whour] =="14시"){ echo "selected";}?>>14시</option>
				<option value="15시" <? if($row[whour] =="15시"){ echo "selected";}?>>15시</option>
				<option value="16시" <? if($row[whour] =="16시"){ echo "selected";}?>>16시</option>
				<option value="17시" <? if($row[whour] =="17시"){ echo "selected";}?>>17시</option>
				<option value="18시" <? if($row[whour] =="18시"){ echo "selected";}?>>18시</option>
				<option value="19시" <? if($row[whour] =="19시"){ echo "selected";}?>>19시</option>
				<option value="20시" <? if($row[whour] =="20시"){ echo "selected";}?>>20시</option>
				<option value="21시" <? if($row[whour] =="21시"){ echo "selected";}?>>21시</option>
				</select>
				&nbsp;&nbsp;
				<select id="wmin" name="wmin">
				<option value="" >분</option>
				<option value="" <? if($row[wmin] ==""){ echo "selected";}?>>정각</option>
				<option value="30분" <? if($row[wmin] =="30분"){ echo "selected";}?>>30분</option>
				</select>
			</td>
		</tr>
		<?}?>
		<? if ($row[title]){?>
		<tr>
			<th>제목</th>
			<td colspan='3'><font color="RED">  <?=$row[title]?></td>
		</tr>
		<?}?>
		<? if($code =="event_friends" || $code =="event_new"){?>
		<tr>
			<th>내원 여부</th>
			<td colspan='3'>
				<select id="crm5" name="crm5">
				<option value="" >선택</option>
				<option value="내원" <? if($row[crm5] =="내원"){ echo "selected";}?>>내원</option>
				<option value="미내원" <? if($row[crm5] =="미내원"){ echo "selected";}?>>미내원</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>치료 동의</th>
			<td colspan='3'>
				<select id="crm6" name="crm6">
				<option value="" >선택</option>
				<option value="동의" <? if($row[crm5] =="동의"){ echo "selected";}?>>동의</option>
				<option value="미동의" <? if($row[crm5] =="미동의"){ echo "selected";}?>>미동의</option>
				</select>

			</td>
		</tr>
		<?}?>
		<tr>
			<th>내용</th>
			<td colspan='3'>
			<?
				//echo 'select rname from amboard_basic_file where opt1="'.$code.'" and fno="'.$row[no].'" ';
				$f_sql=mysql_fetch_array(mysql_query('select rname from amboard_basic_file where opt1="'.$code.'" and fno="'.$row[no].'" '));
				if($f_sql[0]){
			?>
					<img src='/mpboard/upload/<?=$f_sql[0]?>' style='max-width:100%;'><br><br>
			<?
				}
			?>
			<?=$contents?>
			</td>
		</tr>
		<? if ($code =="counsel01"){?>
		<tr>
			<th>답변</th>
			<td colspan='3'><textarea name="recontents" id="recontents" rows="30" style="width:100%" editor="webnote"><?=$recontents?></textarea></td>
		</tr>
		<?}?>
		<? if($row[etc5]){?>
			<tr>
				<th>추가정보1</th>
				<td colspan='3'>
					<?=$row[etc5]?>
				</td>
			</tr>
		<?}?>
		<? if($row[etc8]){?>
			<tr>
				<th>추가정보2</th>
				<td colspan='3'>
					<?=$row[etc8]?>
				</td>
			</tr>
		<?}?>
		</tbody>
	</table>

	<ul class='admin_btn_list'>
		<li><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_list&sno=<?=$sno?>&<?=$search_para?>"><img src='/admin/img/comm/admin_list_btn.gif' alt='목록으로'></a></li>
		<li><input type="image" src="/<?=$INDIR?>/admin/img/btn_write.gif" border="0"></li>
	</ul>
	</form>

	<script type="text/javascript">
	<!--
	function cmtDelete(cno) {
		if(confirm("삭제하시겠습니까?")) {
			document.commentform.cmtMode.value = "delete";
			document.commentform.cno.value = cno;
			document.commentform.submit();
		}
	}

	function cmtModify(cno) {
		document.commentform.cmtMode.value = "modify";
		document.commentform.cno.value = cno;
		document.commentform.action = "<?=$PHP_SELF?>";
		document.commentform.submit();
	}
	//-->
	</script>
	<script language="JavaScript">
	<!--
	function formCheck1(cf) {
/*
	if(cf.comment.value=="") {
		alert("상담내용을 입력하세요");
		cf.comment.focus();
		return false;
	}
		*/
		return true;
	}
	//-->

	</script>
	<?
	$result_cmt = mysql_query("select * from amboard_basic_comment where fno=$no order by wdate asc");

	if($cmtMode == "modify") {
		$comment = mysql_result(mysql_query("select comment from amboard_basic_comment where no=$cno"), 0, 0);
	}
	?>

	<p class='desc'><strong>상담내역</strong></p>
	<?
	while($row_cmt=mysql_fetch_array($result_cmt)) {
		$row_cmt[comment] = nl2br($row_cmt[comment]);
	?>
	<div class='comment_list'>
		<p><!-- 경로 : <strong><?=$row_cmt[crm1]?></strong> |  -->상태 : <strong><?=$row_cmt[crm2]?></strong>  | 등록자 : <strong><?=$row_cmt[name]?></strong> | <?=$row_cmt[wdate]?></p>
		<ul>
			<? if($row_cmt[crm2] <>"SMS 발송"){?><li><span style="cursor:pointer" onclick="cmtModify(<?=$row_cmt[no]?>)"><i class="fa fa-wrench"></i></span></li><?}?>
			<li><span style="cursor:pointer" onclick="cmtDelete(<?=$row_cmt[no]?>)"><i class="fa fa-times"></i></span></li>
		</ul>
		<?=$row_cmt[comment]?>
	</div>
	<? } ?>

	<p class='desc'><strong>관리 작성/내역</strong></p>
	<form name="commentform" method="post" action="/<?=$INDIR?>/_util/crm_admin/crm_comment.php"  Onsubmit="return formCheck1(this)">
	<input type="hidden" name="group" value="<?=$group?>" />
	<input type="hidden" name="code" value="<?=$code?>" />
	<input type="hidden" name="m1" value="<?=$m1?>" />
	<input type="hidden" name="m2" value="<?=$m2?>" />
	<input type="hidden" name="no" value="<?=$no?>" />
	<input type="hidden" name="sno" value="<?=$sno?>" />
	<input type="hidden" name="search_para" value="<?=$search_para?>" />
	<input type="hidden" name="cmtMode" value="<?=$cmtMode?>" />
	<input type="hidden" name="cno" value="<?=$cno?>" />
	<table class='admin_table_type2' summary='게시판 등록 - 기본정보'>
		<caption>기본정보</caption>
		<colgroup>
		<col style="width:120px;" />
		<col style="width:350px;" />
		<col style="width:120px;" />
		<col style="width:350px;" />
		</colgroup>
		<tbody>
		<tr>
			<th>상태</th>
			<td>
				<select name="crm2" class="fonttype1">
				<option value="" >-- 상태 선택 --</option>
				<option value="예약" <? if($row[etc3] == "예약") { echo "selected"; } ?>>예약</option>
				<option value="미예약" <? if($row[etc3] == "미예약") { echo "selected"; } ?>>미예약</option>
				<option value="부재" <? if($row[etc3] == "부재") { echo "selected"; } ?>>부재</option>
				<option value="기타" <? if($row[etc3] == "기타") { echo "selected"; } ?>>기타</option>

				<!-- <option value="" >-- 상태 선택 --</option>
				<option value="확인" <? if($row[etc3] == "확인") { echo "selected"; } ?>>확인</option>
				<option value="1차 부재" <? if($row[etc3] == "1차 부재") { echo "selected"; } ?>>1차 부재</option>
				<option value="2차 부재" <? if($row[etc3] == "2차 부재") { echo "selected"; } ?>>2차 부재</option>
				<option value="3차 부재" <? if($row[etc3] == "3차 부재") { echo "selected"; } ?>>3차 부재</option>
				<option value="완료" <? if($row[etc3] == "완료") { echo "selected"; } ?>>완료</option>
				</select> -->
			</td>
		</tr>
		<tr>
			<th>상담내용</th>
			<td colspan='3'>
				<textarea name="comment" class='area1' id="comment"><?=$comment?></textarea>
			</td>
		</tr>
		</tbody>
	</table>

	<ul class='admin_btn_list'>
		<li><input type="image" src="/<?=$INDIR?>/admin/img/btn_memo.gif" border="0"></li>
	</ul>
	</form>

</div>
