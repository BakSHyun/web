<!--

※사용방법
1. Edit_Plus사용시 "컨트롤+H" 를 눌러 찾을 말에 "_exps" 입력 "원하는 단어 입력(다른 팝업과 중복이 안되는 네이밍)" 후 모두 바꿈을 눌러 단어 변경을 합니다.
2. 이미지 크기는 /* 팝업 레이어 스타일 */ 주석이 달린 곳의 width 값을 변경해 주면 됩니다.
3. 팝업의 위치변경은 /* 팝업 레이어 스타일 */ 주석이 달린 곳의 margin-left의 값을 변경해 주면 됩니다.
4. 하단 텍스트 영역 배경색상은 /* 닫기버튼 영역 배경색 변경 스타일 */ 주석이 달린 곳에서 변경이 가능합니다.
5. /* 오늘하루 안보기 스크립트 */ 스크립트는 하단에 위치해야 하므로 변경하지 마세요. (상단에 넣으면 "오늘 하루 안보기"가 동작하지 않습니다.)
6. 팝업을 올렸는데 "텍스트" 부분의 한글이 깨져서 안나오면 Edit_Plus에서 파일 인코딩을 바꾸면 됩니다. (문서-파일인코딩-인코딩변환 // euc-kr==ANSI , UTF-8==UTF-8 ===> 텍스트 깨지면 현재 인코딩과 다른걸로 변경하면 됩니다.)

-->



<script language="JavaScript">
/* 쿠키 스크립트 */
function setCookie_exps( name, value, expiredays ) {
	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

/* 팝업 닫기 스크립트 */
function closePop_exps() {
	if ( document.pop_form_exps.chkbox_exps.checked ) {
		setCookie_exps( "ckv_exps", "done" , 1 );
	}
	document.all['layer_container_exps'].style.visibility = "hidden";
}

function bluring() {
	if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG")
	document.body.focus();
}
document.onfocusin=bluring;
</script>

<style type="text/css">
#layer_container_exps{position:absolute; top:110px; left:50%; z-index:999999; visibility: visible; overflow:hidden; width:500px; margin-left:-250px} /* 팝업 레이어 스타일 */
#layer_container_exps img{border:0;}
.pop_close_exps{width:100%}
.pop_close_exps td{background-color:#2f2f2f; height:30px;} /* 닫기버튼 영역 배경색 변경 스타일 */
.pop_close_exps td label{display:inline-block; padding-left:5px}
.pop_close_exps td a{text-decoration:none}
.pop_close_exps td span{color:#ffffff; font-size:12px;} /* 글자색상 변경 스타일 */

/* BX슬라이더를 이용한 롤링 팝업 */
.pager_sty_ctr .bx-wrapper .bx-pager, .bx-wrapper .bx-controls-auto {width:100%; height:15px;} /* 버튼 전체 넓이와 높이값 컨트롤 */
.pager_sty_ctr .bx-wrapper .bx-pager{position:absolute; text-align:left; top:20px; left:10px; padding:0; } /* 롤링팝업 버튼 위치값 컨트롤 */
.pager_sty_ctr .bx-wrapper .bx-pager.bx-default-pager a{float:left; background-color:#999999; margin: 0 4px; border-radius: 20px; width:10px; height:10px; text-indent:999px;} /* 버튼 스타일 컨트롤 */
.pager_sty_ctr .bx-wrapper .bx-pager.bx-default-pager a:hover, .pager_sty_ctr .bx-wrapper .bx-pager.bx-default-pager a.active{background-color:#262626} /* hover,active 버튼 스타일 컨트롤 */
/* 롤링팝업 사용시 좌,우 버튼 컨트롤 */
.pager_sty_ctr .bx-wrapper .bx-prev{/*width:50px; height:50px; left:50%; bottom:0 !important; margin-left:-546px;background: url('../img/main/mv_prev.png') no-repeat;display:inline-block;text-indent:99999px;*/}
.pager_sty_ctr .bx-wrapper .bx-next{/*width:50px; height:50px; right:50%; bottom:0 !important; margin-right:-653px;background: url('../img/main/mv_next.png') no-repeat;display:inline-block;text-indent:99999px;*/}
.rollpop_inner, dd{margin:0; padding:0;}
</style>

<?
//예약팝업
//YYYY-MM-DD-HH-mm
//년-월-일-시간-분
$todate_exps = date("YmdHi");
$starttime_exps = "201701011200";
$endtime_exps = "201706162359";
if($starttime_exps) {
	if($starttime_exps <= $todate_exps) $popupstart_exps = true;
	else $popupstart_exps = false;
} else {
	$popupstart_exps = true;
}

if($endtime_exps) {
	if($endtime_exps >= $todate_exps) $popupend_exps = true;
	else $popupend_exps = false;
} else {
	$popupend_exps = true;
}
?>
<div id="layer_container_exps">
	<form name="pop_form_exps">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="bottom">
					<div class="pager_sty_ctr">
						<dl class="rollpop_inner_exps_no">
							<dd><a href="../07_counsel/community3.php?sno=0&group=basic&code=community03&category=&&cate1=&cate2=&cate3=&abmode=view&no=84751&bsort=&bfsort="><img src="/main/img/popup200423.jpg" /></a></dd>
							<!-- <dd><a href="/m/07_counsel/counsel6.php?sno=0&group=basic&code=community03&category=&&cate1=&cate2=&cate3=&abmode=view&no=84678&bsort=&bfsort="><img src="/main/img/popup_200226.jpg" /></a></dd> -->
						</dl>
					</div>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" align="center" class="pop_close_exps">
			<tr>
				<td style="padding-left:8px;">
					<input type="checkbox" name="chkbox_exps" value="checkbox" id="chk_label_exps"/>
					<label for="chk_label_exps"><span>이 창을 열지 않습니다.</span></label>
				</td>
				<td style="padding-right:8px; text-align:right;">
					<a href="javascript:closePop_exps();">
						<span>[닫기]</span>
					</a>
				</td>
			</tr>
		</table>
	</form>
</div>

<script language="Javascript">
/* 오늘하루 안보기 스크립트 */
cookiedata = document.cookie;
if ( cookiedata.indexOf("ckv_exps=done") < 0 ) {
	document.all['layer_container_exps'].style.visibility = "visible";
} else {
	document.all['layer_container_exps'].style.visibility = "hidden";
}

/* BX슬라이더 사용하여 롤링팝업 */
$(document).ready(function(){
	$('.rollpop_inner_exps').bxSlider({
		mode: 'horizontal',
		controls:false,
		auto:true,
		pager:true,
		//pagerCustom: '#bx-pager',
		adaptiveHeight: true,
		pause:5000
	});
});

</script>

