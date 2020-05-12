<?
require_once "../../admin/inc/config.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";
//require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpreserve/inc/sys.php";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="/<?=$INDIR?>/admin/input.css" rel="stylesheet" type="text/css">
<title>메타태그적용 소스</title>
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
</style>
</head>

<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="5" class="type2">
	<tr>
		<td>
			<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
				<tr>
					<td>

						<b>[메타태그적용 코드]</b>

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
					<td align="left">
						&lt;?<br>
						// 파일 최상단에 넣어 주세요<br>
						<font color="#0000ff">require_once</font> <font color="#ff8040">$_SERVER[DOCUMENT_ROOT]</font>.&quot;/$INDIR/admin/inc/metainfo.php&quot;;<br>
						?&gt;<br>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center"><strong>위의 코드를 메타태그 적용할곳 또는 헤드파일에 복사하여 붙여 넣으시면 됩니다. </strong></td>
	</tr>
</table>
<br>
<center>
<img src="/<?=$INDIR?>/admin/img/btn_submit.gif" style="cursor:hand" Onclick="javascript:window.close();">
</center>
</body>
</html>
