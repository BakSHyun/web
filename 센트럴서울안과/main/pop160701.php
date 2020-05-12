<!-- /////////////POPUP1 S ///////////////////--------------------------------------------------------------------------------------------------------------->

<!-- 주의사항 :
1. 코드정리 하지말기("이 창 열지 않기" 위에 이미지와 레이어 사이에 틈 생김)
2. div에 with값과 height값 꼭 주기 ("이 창 열지 않기" 부분의 테이블 width가 100%이기 때문에 div에 width값을 이미지 width랑 같은 값으로 줘야 모양이 딱 맞는다.)
3. 쿠키 코드는 div 밑에 넣기 (위에 넣으면 "이 창 열지 않기"가 안됨)
4. 팝업을 올렸는데 "이 창 열지 않기" 부분의 한글이 깨져서 안나오면 에디트플러스에서 파일 인코딩을 바꾼다.(보통 euc-kr로 설정하는데 에디트플러스에서는 "ANSI"가 euc-kr이다.)
-->



<!-- popup2 script -->
<script language="JavaScript">
function setCookie111( name, value, expiredays ) {
    var todayDate = new Date();
        todayDate.setDate( todayDate.getDate() + expiredays );
        document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    }

function closeWin_111() {
    if ( document.notice_form_111.chkbox111.checked ){
        setCookie111( "maindiv_111", "done" , 1 );
    }
    document.all['popup111'].style.visibility = "hidden";
}
</script>
<script language="JavaScript">
function bluring()
{
if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG")
document.body.focus();
}
document.onfocusin=bluring;

</script>


<!-- popup2 div S ---------------------------------------------------------------------------------------------------------------->
<div id="popup111" style="width:561px;  position:absolute;top: 283px; z-index:99999995; visibility: visible;right:50%; margin-right: 25px;">

	<form name="notice_form_111">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		  <td valign="bottom"><a href="http://cseye.net/m_old/landing/landing.html" target="_blank"><img src="img/pop160701.jpg" border="0"  /></a></td>
	  </tr>
	</table>
	<table width="561" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td style=" background-color:#000; height:30px; padding-left:8px;">
					<input type="checkbox" name="chkbox111" value="checkbox" />
					<span style="color:#fff;font-size:12px;">이 창을 열지 않습니다.</span> </td>
				<td style=" background-color:#000; height:30px; padding-right:8px; text-align:right;"><a href="javascript:closeWin_111();"><span style="font-weight:bold;font-size:12px;"><font color="#FFFFFF">[닫기]</font></span></a></td>
			</tr>
	</table>
  </form>
</div>
<!-- popup2 div E ---------------------------------------------------------------------------------------------------------------->


<!-- popup2 cookie -->

<!-- /////////////POPUP1 CODE E///////////////////// --------------------------------------------------------------------------------------------------------------->


<script language="Javascript">
cookiedata = document.cookie;
//alert(cookiedata);
if ( cookiedata.indexOf("maindiv_111=done") < 0 ){
    document.all['popup111'].style.visibility = "visible";
    }
    else {
        document.all['popup111'].style.visibility = "hidden";
}
</script>

<!-- 닫기 소스 -->
<script> 

	function ViewLayer(){
		document.getElementById("popup111").style.display='none'
		}

</script> 
