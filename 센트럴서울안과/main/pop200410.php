<!--

※사용방법
1. Edit_Plus사용시 "컨트롤+H" 를 눌러 찾을 말에 "_exps200410" 입력 "원하는 단어 입력(다른 팝업과 중복이 안되는 네이밍)" 후 모두 바꿈을 눌러 단어 변경을 합니다.
2. 이미지 크기는 /* 팝업 레이어 스타일 */ 주석이 달린 곳의 width 값을 변경해 주면 됩니다.
3. 팝업의 위치변경은 /* 팝업 레이어 스타일 */ 주석이 달린 곳의 margin-left의 값을 변경해 주면 됩니다.
4. 하단 텍스트 영역 배경색상은 /* 닫기버튼 영역 배경색 변경 스타일 */ 주석이 달린 곳에서 변경이 가능합니다.
5. /* 오늘하루 안보기 스크립트 */ 스크립트는 하단에 위치해야 하므로 변경하지 마세요. (상단에 넣으면 "오늘 하루 안보기"가 동작하지 않습니다.)
6. 팝업을 올렸는데 "텍스트" 부분의 한글이 깨져서 안나오면 Edit_Plus에서 파일 인코딩을 바꾸면 됩니다. (문서-파일인코딩-인코딩변환 // euc-kr==ANSI , UTF-8==UTF-8 ===> 텍스트 깨지면 현재 인코딩과 다른걸로 변경하면 됩니다.)

-->



<script language="JavaScript">
/* 쿠키 스크립트 */
function setCookie_exps200410( name, value, expiredays ) {
	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

/* 팝업 닫기 스크립트 */
function closePop_exps200410() {
	if ( document.pop_form_exps200410.chkbox_exps200410.checked ) {
		setCookie_exps200410( "ckv_exps200410", "done" , 1 );
	}
	document.all['layer_container_exps200410'].style.visibility = "hidden";
}

function bluring() {
	if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG")
	document.body.focus();
}
document.onfocusin=bluring;
</script>

<style type="text/css">
#layer_container_exps200410{position:absolute; top:287px; left:50%; z-index:9999999; visibility: visible; overflow:hidden; width:360px; margin-left:-241px} /* 팝업 레이어 스타일 */
#layer_container_exps200410 img{border:0;}
.pop_close_exps200410{width:100%}
.pop_close_exps200410 td{background-color:#2f2f2f; height:30px;} /* 닫기버튼 영역 배경색 변경 스타일 */
.pop_close_exps200410 td label{display:inline-block; padding-left:5px}
.pop_close_exps200410 td a{text-decoration:none}
.pop_close_exps200410 td span{color:#ffffff; font-size:12px;} /* 글자색상 변경 스타일 */

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
$todate_exps200410 = date("YmdHi");
$starttime_exps200410 = "201701011200";
$endtime_exps200410 = "201706162359";
if($starttime_exps200410) {
	if($starttime_exps200410 <= $todate_exps200410) $popupstart_exps200410 = true;
	else $popupstart_exps200410 = false;
} else {
	$popupstart_exps200410 = true;
}

if($endtime_exps200410) {
	if($endtime_exps200410 >= $todate_exps200410) $popupend_exps200410 = true;
	else $popupend_exps200410 = false;
} else {
	$popupend_exps200410 = true;
}
?>
<div id="layer_container_exps200410">
	<form name="pop_form_exps200410">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="bottom">
					<div class="pager_sty_ctr">
						<dl class="rollpop_inner_exps200410">
							<dd><img src="img/popup_200410.jpg" /></dd>
							<!-- <dd><a href="#"><img src="img/sample_popup01.jpg" /></a></dd> -->
						</dl>
					</div>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" align="center" class="pop_close_exps200410">
			<tr>
				<td style="padding-left:8px;">
					<input type="checkbox" name="chkbox_exps200410" value="checkbox" id="chk_label_exps200410"/>
					<label for="chk_label_exps200410"><span>이 창을 열지 않습니다.</span></label>
				</td>
				<td style="padding-right:8px; text-align:right;">
					<a href="javascript:closePop_exps200410();">
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
if ( cookiedata.indexOf("ckv_exps200410=done") < 0 ) {
	document.all['layer_container_exps200410'].style.visibility = "visible";
} else {
	document.all['layer_container_exps200410'].style.visibility = "hidden";
}

/* BX슬라이더 사용하여 롤링팝업 
$(document).ready(function(){
	$('.rollpop_inner_exps200410').bxSlider({
		mode: 'horizontal',
		controls:false,
		auto:true,
		pager:true,
		//pagerCustom: '#bx-pager',
		adaptiveHeight: true,
		pause:5000
	});
});
*/
</script>

