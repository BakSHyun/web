
<script language="javascript">
<!--

function check_service_kind(e) {
	if (e == "count")	{
		window.menu1.style.display = "block";
		window.menu2.style.display = "none";
		window.menu3.style.display = "none";
	}
	else if (e == "report")	{
		window.menu1.style.display = "none";
		window.menu2.style.display = "block";
		window.menu3.style.display = "block";
	}
	else if(e == "reserve" || e == "remain")	{
		window.menu1.style.display = "none";
		window.menu2.style.display = "none";
		window.menu3.style.display = "none";
	}

	document.smsReport_process.report_kind.value = e;
}

function check_service_kind2(e) {
	document.smsReport_process.mode.value = e;
}
function frm_submit() {
	var kind = document.smsReport_process.report_kind.value;
	var askmonth = document.smsReport_process.askmonth.value;
	var firstdate = document.smsReport_process.firstdate.value;
	var seconddate = document.smsReport_process.seconddate.value;
	var mode = document.smsReport_process.mode.value;
	//var URL = "./admin/smsReport_process.php?kind="+kind+"&askmonth="+askmonth+"&firstdate="+firstdate+"&seconddate="+seconddate+"&mode="+mode;

	$.ajax({
		type:"get",
		url : "./admin/smsReport_process.php",
		data:{ kind : kind, askmonth : askmonth, firstdate : firstdate, seconddate : seconddate, mode : mode },
		success : function(result){
			$('#sms_inquiry').html(result);
		}
	});


}
-->
</script>

<?
	$modifyDate = date("Y-m")."-01";
	$modifyDate = strtotime($modifyDate);
	$totdays = date("t", $modifyDate);
?>


<div id='admin_sub_wrap'>
<? include '../admin/sms_send.php'; ?>
	<h2>SMS 발송내역 조회</h2>

	<form name="smsReport_process" method="post" >
	<input type="hidden" name="report_kind" value="count">
	<input type="hidden" name="mode" value="0">

	<div id='reserve_search_wrap' style='overflow:hidden;'>
	<ul style='width:95%;'>
		<li>
			<select onchange="check_service_kind(this.value)">
				<option value="count" selected>월 카운트 조회</option>
				<option value="report">상세 리스트 조회 </option>
				<option value="remain">잔여일 조회</option>
			</select>
		</li>
		<li><div class='btn_type2'><a onclick='javascript:frm_submit();'>조회하기</a></div></li>
	</ul>
	<ul style='width:95%;margin-top:10px;'>
		<li id="menu1" style='display:block;'>
			조회 월 <input type="text" name="askmonth" size="6" maxlength="6" value="<?=date("Ym")?>" class='text1'>&nbsp;&nbsp;&nbsp;<font color="red">*</font> YYYYMM 형식으로 입력&nbsp;&nbsp;&nbsp;<font color="red">*</font> 최근 6개월 이내의 정보만 조회가능합니다.
		</li>
		<li id="menu2" style='display:none;'>
			조회 기간 <input type="text" name="firstdate" size="8" maxlength="8" value="<?=date("Ym")?>01" class='text1'> ~ <input type="text" name="seconddate" size="8" maxlength="8" value="<?=date("Ym")?><?=$totdays?>" class='text1'>&nbsp;&nbsp;&nbsp;<font color="red">*</font> YYYYMMDD 형식으로 입력&nbsp;&nbsp;&nbsp;<font color="red">*</font> 조회기간은 두개의 입력일자의 월이 같아야 합니다.
		</li>
	<ul style='width:95%;margin-top:10px;'>
	</ul>
		<li id="menu3" style='display:none;'>
			<input type="radio" name="mode1" value="0" onclick="check_service_kind2('0')" checked> 전체조회&nbsp;&nbsp;&nbsp;<input type="radio" name="mode1" value="1" onclick="check_service_kind2('1')"> 성공 내역 조회&nbsp;&nbsp;&nbsp;<input type="radio" name="mode1" value="2" onclick="check_service_kind2('2')"> 실패 내역 조회
		</li>
	</ul>
	</div>
	</form>

	<div id='sms_inquiry'></div>
	<!--<iframe name="content" id="content" src="" frameborder="0" width="100%"></iframe>-->

</div>