<?
require_once "../../admin/inc/config.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpreserve/inc/sys.php";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/<?=$INDIR?>/admin/input.css" rel="stylesheet" type="text/css">
<title>예약 추가 소스</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {color: #ff8040}
-->
</style></head>

<body>
    <table width="100%"  border="0" cellspacing="0" cellpadding="5" class="type2">
      <tr>
        <td>
	    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
	      <tr>
	        <td>
	        
			<b>[예약 설정 코드]</b>
			
	        </td>
	      </tr>
	    </table>
        </td>
      </tr>
    </table>
    <table width="100%"  border="0" cellspacing="0" cellpadding="5" class="type2">
      <tr>
        <td>
        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
          <tr>
            <td align="left">&lt;?<br>
              // 파일 최상단에 넣어 주세요             <br>
      <font color="#0000ff">require_once</font> <font color="#ff8040">$_SERVER[DOCUMENT_ROOT]</font>.&quot;/amconfig.php&quot;;<br>
      ?&gt;<br>
      		</td>
      	  </tr>
      	</table>
        </td>
      </tr>
      <tr>
        <td>
        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
          <tr>
            <td align="left">
&lt;?<br>
// 예약이 보여질부분에 넣어 주세요 <br>
      <font color="#0000ff">if(</font><font color="#008000">!</font><font color="#ff8040">$code</font><font color="#0000ff">)</font> <font color="#ff8040">$code</font> = &quot;<?=$code?>&quot;;<br>
      <font color="#0000ff">include</font> <font color="#ff8040">$_SERVER[DOCUMENT_ROOT]</font>.&quot;/&quot;.<span class="style1">$INDIR</span>.&quot;/mpreserve/reserve.php&quot;;<br>
      ?&gt;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center">위의 코드를 예약을 보여 주고 싶은 파일에 복사하여 붙여 넣으시면 됩니다. </td>
      </tr>
    </table>
    <br>
    <center>
    <img src="/<?=$INDIR?>/admin/img/btn_submit.gif" style="cursor:hand" Onclick="javascript:window.close();">
	</center>
</body>
</html>
