<?
// MEDIPIX 엑셀파일저장 추가 (08.04.15)

$filename = $code.date("Ymd").".xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Description: PHP4 Generated Data");

// 파일 최상단에 넣어 주세요
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";
?>
<?
$paraArray = explode("&", $search_para);
foreach($paraArray as $paraValue) {
	$paraArray2 = explode("=", $paraValue);
	${$paraArray2[0]} = $paraArray2[1];
}

$where = "where code='$code' and del_state!='Y' ";

if($search_etc4) $where .= "and etc4 = '$search_etc4' ";
if($search_clinic) $where .= "and clinic like '%$search_clinic%' ";
if($search_cate2) $where .= "and cate2 like '%$search_cate2%' ";
if($search_value) $where .= "and $search_key like '%$search_value%' ";
if(is_array($search_etc3)) foreach($search_etc3 as $etc_value) $etc3Array[] = "etc3 = '$etc_value'";
if(count($etc3Array) > 0) $where .= "and (" . implode(" or ", $etc3Array) . ")";
if($search_y_1 && $search_m_1 && $search_d_1 && $search_y_2 && $search_m_2 && $search_d_2) $where .= "and (wdate >= '$search_y_1-$search_m_1-$search_d_1 00:00:00' and wdate <= '$search_y_2-$search_m_2-$search_d_2 23:59:59') ";
if($search_call) $where .= "and call_id = '$search_call' ";
if($search_admin) $where .= "and admin_id = '$search_admin' ";
if($search_referer) {
	if($search_referer == "KM") $where .= "and etc7 != '' ";
	else if($search_referer == "FV") $where .= "and cate2 = '' and etc7 = '' ";
	else $where .= "and cate2 like '%$search_referer%' ";
	//$where .= "and cate1 like '%$search_referer%' ";
}

$query = "select count(*) counter from amboard_basic $where";
$bcounter = mysql_fetch_array(mysql_query($query,$connect));
$totalcount = $bcounter[counter];

$query = "select * from amboard_basic $where order by ino desc";
$result = mysql_query($query,$connect);
?>
<meta http-equiv="Content-Language" content="ko">
<META http-equiv="Content-Type" content="text/html; charset=euc-kr">
<table border="1" style="font-size:9pt">
	<tr bgcolor="d1d1d1">
		<td align="center"><strong>번호</strong></td>
		<td align="center"><strong>제목</strong></td>
		<td align="center"><strong>작성자</strong></td>
		<td align="center"><strong>핸드폰</strong></td>
		<td align="center"><strong>이메일</strong></td>
		<td align="center"><strong>내용</strong></td>
		<td align="center"><strong>답변</strong></td>
		<? if($row[category]){?>
		<td align="center"><strong>카테고리</strong></td>
		<?}?>
		<? if($row[cate1]){?>
		<td align="center"><strong>추가항목1</strong></td>
		<?}?>
		<? if($row[cate2]){?>
		<td align="center"><strong>추가항목2</strong></td>
		<?}?>
		<? if($row[cate3]){?>
		<td align="center"><strong>추가항목3</strong></td>
		<?}?>
		<td align="center"><strong>작성일</strong></td>
	</tr>
<?
while($row=mysql_fetch_array($result)) {
	/* 지점 */
	if($row[category]){
		$res = mysql_query("select cname from amboard_basic_category where code='$code' and no=$row[category]");
		$row[category] = mysql_result($res, 0, 0);
	}
	/* 지점 */
	$row[contents] = cutstring($row[contents], 3000);
	$row[recontents] = cutstring($row[recontents], 3000);
?>
	<tr>
		<td align="center"><?=$totalcount?></td>
		<td align="center"><?=$row[title]?></td>
		<td align="center"><?=$row[name]?></td>
		<td align="center"><?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></td>
		<td align="center"><?=$row[email]?></td>
		<td align="center"><?=$row[contents]?></td>
		<td align="center"><?=$row[recontents]?></td>
		<? if($row[category]){?>
		<td align="center"><?=$row[category]?></td>
		<?}?>
		<? if($row[cate1]){?>
		<td align="center"><?=$row[cate1]?></td>
		<?}?>
		<? if($row[cate2]){?>
		<td align="center"><?=$row[cate2]?></td>
		<?}?>
		<? if($row[cate3]){?>
		<td align="center"><?=$row[cate3]?></td>
		<?}?>
		<td align="center"><?=$row[wdate]?></td>
	</tr>
<?
	$totalcount--;
}
?>
</table>