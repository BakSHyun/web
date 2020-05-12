<script language="javascript">

function allCheck(cform){
	var objCheck;
	objCheck = document.getElementsByName("delno[]");
	if(cform.allch.checked){
		if(objCheck.length){
			for(i=0;i<objCheck.length;i++)
				objCheck[i].checked = 'on';
		}
	}else{
		if(objCheck.length){
			for(i=0;i<objCheck.length;i++)
				objCheck[i].checked = '';
		}
	}
}


//선택한것 삭제
function quedel(){
	var objCheck, chkVal;
	var objCheck = document.getElementsByName("delno[]");

	myform = document.cform;

	for(var i=0;i<objCheck.length;i++){
		if(objCheck[i].checked){
			chkVal = true;
		}

	}

	if(chkVal) {
		if(confirm("선택항목을 삭제하시겠습니까?")){
			myform.m2.value = 'crm_listdel';
			myform.submit();
		}
		else {
			return false;
		}
	}else{
		alert("삭제하실 항목을 선택해 주세요");
		return false;
	}

}

//게시판 내용 복사
function checkcrm_copy(cform) {
	var objCheck, chkVal;
	objCheck = document.getElementsByName("delno[]");
	for(var i=0;i<objCheck.length;i++){
		if(objCheck[i].checked){
			chkVal = true;
		}

	}

	if(chkVal) {
		if(confirm("선택항목을 복사하시겠습니까?")){
			//alert ('복사합니다!');
			cform.m2.value = 'crm_copy';
			cform.submit();
		}else {
			return false;
		}
	}else{
		alert("복사할 게시물을 선택하세요");
		return false;
	}
}
//게시판 내용 복사 종료

//게시판 내용 이동
function checkcrm_change(cform) {
	var objCheck, chkVal;
	objCheck = document.getElementsByName("delno[]");
	alert ('이동합니다!');
	for(var i=0;i<objCheck.length;i++){
		if(objCheck[i].checked){
			chkVal = true;
		}

	}

	if(chkVal) {
		if(confirm("선택항목을 이동하시겠습니까? 이동하신 게시물은 현재 게시판에서 사라집니다!!!")){
			cform.m2.value = 'crm_change';
			cform.submit();
		}else{
			return false;
		}
	}else{
		alert("이동할 게시물을 선택하세요");
		return false;
	}

}

$(function() {
	$( ".search_date" ).datepicker({
		defaultDate: "+1w",
		dateFormat: "yy-mm-dd",
		dayNames: [ "일", "월", "화", "수", "목", "금", "토" ],
		dayNamesMin: [ "일", "월", "화", "수", "목", "금", "토" ],
		monthNamesShort: [ "1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월" ],
		crm_changeYear: true
	});
});

</script>

<script type="text/javascript">
<!--

//날짜로 검색해서 엑셀 저장
function use_value1(abc)
{
	cform2.search_y_1.value = abc;
	//alert (cform2.search_y_1.value);
}
function use_value2(abc)
{
	cform2.search_m_1.value = abc;
	//alert (cform2.search_y_1.value);
}
function use_value3(abc)
{
	cform2.search_d_1.value = abc;
	//alert (cform2.search_y_1.value);
}
function use_value4(abc)
{
	cform2.search_y_2.value = abc;
	//alert (cform2.search_y_1.value);
}
function use_value5(abc)
{
	cform2.search_m_2.value = abc;
	//alert (cform2.search_y_1.value);
}
function use_value6(abc)
{
	cform2.search_d_2.value = abc;
	//alert (cform2.search_y_1.value);
}

function excel_list_reserve() {
	myform = document.cform2;

	code_val= '<?=$code?>';

	if (code_val =="")
	{
		alert ('게시판이 선택되지 않아 데이터를 저장할 수 없습니다.\n게시판을 선택후 엑셀저장을 해주세요');
		return;
	}
	if (!myform.search_date1.value || !myform.search_date2.value)
	{
		alert ('엑셀 저장하실 범위를 선택해주세요');
		return;
	}

	if(confirm('선택하신날짜로 데이터를 엑셀로 다운받으시겠습니까?')) {
		myform.action="/<?=$INDIR?>/_util/crm_admin/excel_save_event.php";
		myform.code="<?=$code?>";
		myform.submit();
	}
	else
	{
		return;
	}
}
//-->
</script>
<?
//$search_para = "search_code=$search_code";
$res = mysql_query("select no,cname from amboard_basic_category where code='$code' order by ino asc");
while($row_cat = mysql_fetch_array($res)) {
	$cat_no = $row_cat[no];
	$categoryArray[$cat_no] = $row_cat[cname];
}
if(is_array($search_etc3)) $implode_etc3 = implode("/", $search_etc3);
if(is_array($search_etc7)) $implode_etc7 = implode("/", $search_etc7);
$search_para = "search_etc4=$search_etc4&search_cate2=$search_cate2&search_key=$search_key&search_value=$search_value&implode_etc3=$implode_etc3&implode_etc7=$implode_etc7&search_call=$search_call&search_admin=$search_admin&search_referer=$search_referer&search_date1=$search_date1&search_date2=$search_date2&search_position=$search_position";
if($implode_etc3 != "") $search_etc3 = explode("/", $implode_etc3);
if($implode_etc7 != "") $search_etc7 = explode("/", $implode_etc7);
if(!$orderby) $orderby = "wdate";


if($code){
	$res = mysql_query("select name from amboard_config where code='$code'");
	$subject = mysql_result($res, 0, 0);
}

?>

<div id='admin_sub_wrap'>
	<h2><?=$subject?> 리스트</h2>

	<form name="formsearch" method="post" action="<?=$PHP_SELF?>">
	<input type="hidden" name="group" value="<?=$group?>" />
	<input type="hidden" name="code" value="<?=$code?>" />
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="<?=$m2?>">
	<input type="hidden" name="sno" value="<?=$sno?>">
	<div id='reserve_search_wrap2'>
	<ul class='reserve_search_wrap2'>
		<li class='reserve_search_wrap2_li'>
			<i class="fa fa-calendar"></i>
		</li>
		<li class='reserve_search_wrap2_li'>
			<input type='text' class='text2 search_date' name='search_date1' value='<?=$search_date1?>'>
			~
			<input type='text' class='text2 search_date' name='search_date2' value='<?=$search_date2?>'>
		</li>
		<li class='reserve_search_wrap2_li'>
			<? $res = mysql_query("select id,name from ammember where level='1' or level='2' order by no asc"); ?>
			<select name="search_admin" class="select1">
				<option value="">-상담자-</option>
				<?
				while($row_mem = mysql_fetch_array($res)) {
				?>
				<option value="<?=$row_mem[id]?>" <? if($search_admin == $row_mem[id]) { echo "selected"; } ?>><?=$row_mem[name]?></option>
				<?
				}
				?>
			</select>
		</li>
		<li class='reserve_search_wrap2_li'>
			<select name="search_referer" class="select1">
				<option value="">접속경로</option>
				<option value="NV" <? if($search_referer == "NV") { echo "selected"; } ?>>네이버</option>
				<option value="DM" <? if($search_referer == "DM") { echo "selected"; } ?>>다음</option>
				<option value="OV" <? if($search_referer == "OV") { echo "selected"; } ?>>오버추어</option>
				<option value="GL" <? if($search_referer == "GL") { echo "selected"; } ?>>구글</option>
				<option value="FV" <? if($search_referer == "FV") { echo "selected"; } ?>>즐겨찾기</option>
			</select>
		</li>
		<li class='reserve_search_wrap2_li'>
			<select name="search_position" class="select1">
				<option value="">등록위치</option>
				<option value="실시간비용상담(퀵)" <? if($search_position == "실시간비용상담(퀵)") { echo "selected"; } ?>>실시간비용상담(퀵)</option>
				<option value="전화상담신청(퀵)" <? if($search_position == "전화상담신청(퀵)") { echo "selected"; } ?>>전화상담신청(퀵)</option>
				<option value="카카오톡상담(퀵)" <? if($search_position == "카카오톡상담(퀵)") { echo "selected"; } ?>>카카오톡상담(퀵)</option>
				<option value="서브상단" <? if($search_position == "서브상단") { echo "selected"; } ?>>서브상단</option>
				<option value="서브하단" <? if($search_position == "서브하단") { echo "selected"; } ?>>서브하단</option>
				<option value="전화상담신청" <? if($search_position == "전화상담신청") { echo "selected"; } ?>>전화상담신청</option>
				<option value="메인페이지" <? if($search_position == "메인페이지") { echo "selected"; } ?>>메인페이지</option>
			</select>
		</li>
		<!-- <li class='reserve_search_wrap2_li'>
			<select name="search_etc3" class="select1">
				<option value="" >--처리상태--</option>
				<option value="상" <? if($search_etc3 == "상") { echo "selected"; } ?>>상</option>
				<option value="중" <? if($search_etc3 == "중") { echo "selected"; } ?>>중</option>
				<option value="하" <? if($search_etc3 == "하") { echo "selected"; } ?>>하</option>
				<option value="비용부담" <? if($search_etc3 == "비용부담") { echo "selected"; } ?>>비용부담</option>
				<option value="전화안받음" <? if($search_etc3 == "전화안받음") { echo "selected"; } ?>>전화안받음</option>
				<option value="전화거절" <? if($search_etc3 == "전화거절") { echo "selected"; } ?>>전화거절</option>
				<option value="단순문의" <? if($search_etc3 == "단순문의") { echo "selected"; } ?>>단순문의</option>
				<option value="수술예약" <? if($search_etc3 == "수술예약") { echo "selected"; } ?>>수술예약</option>
				<option value="예약취소" <? if($search_etc3 == "예약취소") { echo "selected"; } ?>>예약취소</option>
				<option value="수술완료" <? if($search_etc3 == "수술완료") { echo "selected"; } ?>>수술완료</option>
				<option value="상담예약" <? if($search_etc3 == "상담예약") { echo "selected"; } ?>>상담예약</option>
				<option value="내원상담완료" <? if($search_etc3 == "내원상담완료") { echo "selected"; } ?>>내원상담완료</option>
				<option value="결번" <? if($search_etc3 == "결번") { echo "selected"; } ?>>결번</option>
				<option value="상담전화아님" <? if($search_etc3 == "상담전화아님") { echo "selected"; } ?>>상담전화아님</option>
				<option value="컴플레인" <? if($search_etc3 == "컴플레인") { echo "selected"; } ?>>컴플레인</option>
				<option value="바빠서통화곤란" <? if($search_etc3 == "바빠서통화곤란") { echo "selected"; } ?>>바빠서통화곤란</option>
				<option value="전원꺼짐" <? if($search_etc3 == "전원꺼짐") { echo "selected"; } ?>>전원꺼짐</option>
			</select>
		</li> -->
		<!-- <li class='reserve_search_wrap2_li'>
			<span id="cover_search_keyword" class="basic_color" style="position:absolute;padding:3px 0 0 3px;font-family:Verdana,Thahoma;font-size:9pt;color:#999" onclick="this.style.display = 'none'; document.formsearch.search_keyword.focus()"><? if(!$search_keyword) { ?>키워드값<? } ?></span>
			<input type="text" name="search_keyword" value="<?=$search_keyword?>" size="30" class="text1" onfocus="cover_search_keyword.style.display = 'none'">
		</li> -->
		<li class='reserve_search_wrap2_li'>
			<select name="search_key" class="select1">
				<option value="name" <? if($search_key == "name") { echo "selected"; } ?>>이름</option>
				<option value="email" <? if($search_key == "email") { echo "selected"; } ?>>이메일</option>
				<option value="hp" <? if($search_key == "hp") { echo "selected"; } ?>>핸드폰</option>
			</select>
		</li>
		<li class='reserve_search_wrap2_li'><input type="text" name="search_value" value="<?=$search_value?>" class="text1"></li>
		<li class='reserve_search_wrap2_li'><input type="image" src="/<?=$INDIR?>/admin/img/comm/search_btn.gif"></li>
	</ul>
	</div>

	<div id='reserve_search_wrap3'>
	<ul>
		<li>
			<input type="checkbox" name="search_etc3[]" value="상" id="sl_상" <? if(is_array($search_etc3)) { if(in_array("상", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_상">상</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="중" id="sl_중" <? if(is_array($search_etc3)) { if(in_array("중", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_중">중</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="하" id="sl_하" <? if(is_array($search_etc3)) { if(in_array("하", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_하">하</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="비용부담" id="sl_비용부담" <? if(is_array($search_etc3)) { if(in_array("비용부담", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_비용부담">비용부담</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="전화안받음" id="sl_전화안받음" <? if(is_array($search_etc3)) { if(in_array("전화안받음", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_전화안받음">전화안받음</label>
		</li>
	</ul>
	<ul>
		<li>
			<input type="checkbox" name="search_etc3[]" value="전화거절" id="sl_전화거절" <? if(is_array($search_etc3)) { if(in_array("전화거절", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_전화거절">전화거절</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="단순문의" id="sl_단순문의" <? if(is_array($search_etc3)) { if(in_array("단순문의", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_단순문의">단순문의</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="수술예약" id="sl_수술예약" <? if(is_array($search_etc3)) { if(in_array("수술예약", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_수술예약">수술예약</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="예약취소" id="sl_예약취소" <? if(is_array($search_etc3)) { if(in_array("예약취소", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_예약취소">예약취소</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="수술완료" id="sl_수술완료" <? if(is_array($search_etc3)) { if(in_array("수술완료", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_수술완료">수술완료</label>
		</li>
	</ul>
	<ul>
		<li>
			<input type="checkbox" name="search_etc3[]" value="상담예약" id="sl_상담예약" <? if(is_array($search_etc3)) { if(in_array("상담예약", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_상담예약">상담예약</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="내원상담완료" id="sl_내원상담완료" <? if(is_array($search_etc3)) { if(in_array("내원상담완료", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_내원상담완료">내원상담완료</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="결번" id="sl_결번" <? if(is_array($search_etc3)) { if(in_array("결번", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_결번">결번</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="상담전화아님" id="sl_상담전화아님" <? if(is_array($search_etc3)) { if(in_array("상담전화아님", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_상담전화아님">상담전화아님</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="컴플레인" id="sl_컴플레인" <? if(is_array($search_etc3)) { if(in_array("컴플레인", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_컴플레인">컴플레인</label>
		</li>
	</ul>
	<ul>
		<li>
			<input type="checkbox" name="search_etc3[]" value="바빠서통화곤란" id="sl_바빠서통화곤란" <? if(is_array($search_etc3)) { if(in_array("바빠서통화곤란", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_바빠서통화곤란">바빠서통화곤란</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="전원꺼짐" id="sl_전원꺼짐" <? if(is_array($search_etc3)) { if(in_array("전원꺼짐", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_전원꺼짐">전원꺼짐</label>
		</li>
		<!--<li>
			<input type="checkbox" name="search_etc3[]" value="결번" id="sl_결번" <? if(is_array($search_etc3)) { if(in_array("결번", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_결번">결번</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="상담전화아님" id="sl_상담전화아님" <? if(is_array($search_etc3)) { if(in_array("상담전화아님", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_상담전화아님">상담전화아님</label>
		</li>
		<li>
			<input type="checkbox" name="search_etc3[]" value="컴플레인" id="sl_컴플레인" <? if(is_array($search_etc3)) { if(in_array("컴플레인", $search_etc3)) { echo "checked"; } } ?> />
			<label for="sl_컴플레인">컴플레인</label>
		</li>-->
	</ul>
	</div>

</form>

	<form name="cform"  method="post" action="<?=$PHP_SELF?>" onsubmit="return quedel(this)">
	<input type="hidden" name="group" value="<?=$group?>" />
	<input type="hidden" name="code" value="<?=$code?>" />
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="">
	<input type="hidden" name="search_para" value="<?=$search_para?>">
	<input type="hidden" name="checkvalue" value="">
	<input type="hidden" name="sel" value="">
	<table class='admin_table_type1' summary='관리자 게시판 리스트입니다.'>
		<caption>관리자 게시판 리스트</caption>
		<colgroup>
			<col style="width:40px;" />
			<col style="width:40px;" />
			<col style="width:*;" />
			<col style="width:200px;" />
			<col style="width:200px;" />
			<? if($code <>"counsel"){?>
			<col style="width:100px;" />
			<? } ?>
			<col style="width:140px;" />
			<col style="width:120px;" />
			<col style="width:140px;" />
			<col style="width:130px;" />
			<col style="width:130px;" />
			<col style="width:100px;" />

		</colgroup>
		<thead>
			<tr>
				<th><input type="checkbox" name="allch" value="1" onClick="allCheck(cform);"></th>
				<th>번 호</th>
				<? if($code =="event_friends" || $code =="event_new"){?>
					<th>경로</th>
					<? if($code =="event_friends"){?>
						<th>구환</th>
					<?} else{?>
						<th>직원</th>
					<?}?>
					<th>소개 환자</th>
					<th>연락처</th>
					<th>예약일</th>
					<th>내원 여부</th>
					<th>치료 동의</th>
				<?} else{?>
					<? if($code =="counsel01"){?>
					<th>제 목</th>
					<?} else{?>
					<th>경 로</th>
					<?}?>
					<th>상세경로</th>
					<th>키워드</th>
					<? if($code <>"counsel"){?>
					<th>상담분야</th>
					<?}?>
					<th>이름</th>
					<th>연락처</th>
					<th>예약일</th>
				<?}?>
				<th>처리상태</th>
				<th>접수일</th>
				<th>상담사</th>
			</tr>
		</thead>
		<tbody>
		<?
		$where = "where del_state!='Y' ";

			if($cate1) $where .= "and cate1 = '$cate1' ";

			if($search_key =="hp"){
				$search_value =substr($search_value,-4);
				$search_key ="hphone3";
			}
			if($code) $where .= "and code='$code' ";
			if($search_etc4) $where .= "and etc4 = '$search_etc4' ";
			if($search_clinic) $where .= "and clinic like '%$search_clinic%' ";
			if($search_keyword) $where .= "and keyword like '%$search_keyword%' ";
			if($search_value) $where .= "and $search_key like '%$search_value%' ";
			if($search_position) $where .= "and position = '$search_position' ";
			if(is_array($search_etc3)) foreach($search_etc3 as $etc_value) $etc3Array[] = "etc3 = '$etc_value'";
			if(is_array($search_etc7)) foreach($search_etc7 as $etc_value) $etc7Array[] = "etc7 = '$etc_value'";

			if(count($etc3Array) > 0) $where .= "and (" . implode(" or ", $etc3Array) . ")";
			if(count($etc7Array) > 0) $where .= "and (" . implode(" or ", $etc7Array) . ")";

			if($search_date1 && $search_date2) $where .= "and wdate >= '$search_date1 00:00:00' and wdate <= '$search_date2 23:59:59' ";
			if($search_call) $where .= "and call_id = '$search_call' ";
			if($search_admin) $where .= "and admin_id = '$search_admin' ";
			if($search_referer) {
				$where .= "and referer_page like '%$search_referer%' ";
			}

			$query = "select count(*) counter from amboard_basic $where";
			//echo $query;
			$bcounter = mysql_fetch_array(mysql_query($query,$connect));
			$totalcount = $bcounter[counter];

			$pageobj = new pageing($sno);
			$pageobj->linkclass = "a";
			$pageobj->totalcount = $totalcount;
			$pageobj->listnum = 20;
			$pageobj->pagenum = 10;
			$pageobj->addpara = "group=$group&code=$code&m1=$m1&m2=$m2&$search_para";
			$PAGEING = $pageobj->setPage();


			if($sno == 0) {
				$page = 0;
				$sno = 0;
			}
			else $page = ($sno / $pageobj->listnum);

			$query = "select * from amboard_basic $where order by wdate desc limit $sno, ".$pageobj->listnum." ";

			//echo $query;
			$result = mysql_query($query,$connect);

if($code){

			while($row=mysql_fetch_array($result)) {

				$keywordArray = explode("_", $row[keyword]);
				$row[keyword] = $keywordArray;
				if($row[keyword][0] == "NV") $row[keyword][0] = "<font color='blue'>네이버</font> <span style='font-size:8pt;color:#999999'>" . $row[keyword][2] . "</span>";
				else if($row[keyword][0] == "DM") $row[keyword][0] = "<font color='blue'>다음</font> <span style='font-size:8pt;color:#999999'>" . $row[keyword][2] . "</span>";
				else if($row[keyword][0] == "OV") $row[keyword][0] = "<font color='blue'>오버추어</font> <span style='font-size:8pt;color:#999999'>" . $row[keyword][2] . "</span>";
				else if($row[keyword][0] == "GL") $row[keyword][0] = "<font color='blue'>구글</font>";
				else $row[keyword][0] = "<font color='blue'>즐겨찾기</font>";

				// 정리됨
				$row[wdate] = $row[wdate];
				$row[device] == "desk" ? $row[device] = "fa-desktop" : $row[device] = "fa-tablet" ;
				$row[recontents] != "" ? $row[result] = "<img src='/admin/img/stat1.gif' alt='완료'>" : $row[result] = "<img src='/admin/img/stat2.gif' alt='대기'>" ;

				if($code =="customer01_03"){
					if($row[etc2]){
						$row[etc2]=$row[etc2];
					} else{
						$row[etc2] = $categoryArray[$row[category]];
					}

				}

			?>
			<tr>
				<td><input type="checkbox" name="delno[]" value="<?=$row[no]?>"></td>
				<td><?=$totalcount?></td>
				<? if($code =="counsel01"){?>
					<td><?if($row[vstate] =="0"){?><font color="RED"><strong>[비승인]</strong></font> <?}?><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_modify&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$search_para?>" class="a"><?=$row[title]?></a></td>
				<?} else{?>
					<td><?=$row[position]?></td>
				<? } ?>
				<? if($code =="event_friends"){?>
					<td><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_modify&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$search_para?>" class="a"><?=$row[name]?></a></td>
					<td><?=$row[crm1]?></td>
					<td><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_modify&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$search_para?>" class="a"><?=$row[crm2]?>-<?=$row[crm3]?>-<?=$row[crm4]?></a></td>
					<td><? if ($row[wyear]){?><?=$row[wyear]?>년 <?=$row[wmonth]?>월 <?=$row[wday]?>일 <?=$row[whour]?> <?=$row[wmin]?><?}?></td>
					<td><?=$row[crm5]?></td>
					<td><?=$row[crm6]?></td>
				<?} else if($code =="event_new"){?>
					<td><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_modify&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$search_para?>" class="a"><?=$row[crm1]?></a></td>
					<td><?=$row[name]?></td>
					<td><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_modify&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$search_para?>" class="a"><?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></a></td>
					<td><? if ($row[wyear]){?><?=$row[wyear]?>년 <?=$row[wmonth]?>월 <?=$row[wday]?>일 <?=$row[whour]?> <?=$row[wmin]?><?}?></td>
					<td><?=$row[crm5]?></td>
					<td><?=$row[crm6]?></td>
				<?} else{?>
					<td><?=$row[etc1]?></td>
					<td><span class="fa <?=$row[device]?>"></span> <?=$row[etc6]?> <?=$row[keyword][0]?></td>
					<? if($code <>"counsel"){?>
					<td><?=$row[cate1]?></td>
					<? } ?>
					<td><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_modify&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$search_para?>" class="a"><?=$row[name]?></a></td>
					<td><a href="<?=$PHP_SELF?>?group=<?=$group?>&code=<?=$code?>&m1=<?=$m1?>&m2=crm_modify&no=<?=$row[no]?>&sno=<?=$sno?>&<?=$search_para?>" class="a"><?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></a></td>
					<td><? if ($row[wyear]){?><?=$row[wyear]?>년 <?=$row[wmonth]?>월 <?=$row[wday]?>일 <?=$row[whour]?> <?=$row[wmin]?><?}?></td>
				<? } ?>
				<td><?=$row[etc3]?></td>
				<td><?=$row[wdate]?></td>
				<td><?=$row[admin_name]?></td>

			</tr>
		  <?
			$totalcount--;
		  }
} else{
		  ?>
		<tr>
			<td colspan="20">
				<font color="red"><strong>선택된 게시판이 없습니다.&nbsp;&nbsp;&nbsp;   왼쪽 리스트에서 선택해주세요!!</strong></font>
			<td>
		</tr>
<?}?>
		</tbody>
	</table>

	</form>


	<? if($code){?>
	<form name="cform2"  method="post" action="<?=$PHP_SELF?>" onsubmit="return quedel()">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="crm_excel">
	<input type="hidden" name="code" value="<?=$code?>">
	<input type="hidden" name="search_para" value="<?=$search_para?>">
	<ul class='admin_btn_list'>
		<li><div class='btn_type1'><a Onclick="quedel();" class="a1">선택 삭제</a></div></li>
		<li><div class='btn_type1'><a Onclick="excel_list_reserve();" class="a1">엑셀 저장</a></div></li>
		<li><input type='text' class='text2 search_date' name='search_date1' value='<?=$search_date1?>'> ~ <input type='text' class='text2 search_date' name='search_date2' value='<?=$search_date2?>'></li>
		<li><i class="fa fa-calendar"></i></li>
	</ul>
	</form>
	<?}?>

	<ul class='bbs_paging2'>
		<li><?=$PAGEING[start]?></li>
		<li><?=$PAGEING[pregroup]?></li>
		<li><?=$PAGEING[nextgroup]?></li>
		<li><?=$PAGEING[end]?></li>
	</ul>
	<ul class='bbs_paging'>
		<?=$PAGEING[page]?>
	</ul>
<? include '../admin/sms_send.php'; ?>

</div>
