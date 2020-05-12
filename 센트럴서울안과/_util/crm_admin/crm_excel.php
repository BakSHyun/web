<?
// MEDIPIX 엑셀파일저장 추가 (08.04.15)

$filename = "counsel_".date("Ymd").".xls";

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
	<tr>
		<td align="center"><strong>번호</strong></td>
		<td align="center"><strong>상태</strong></td>
		<td align="center"><strong>최종관리</strong></td>
		<td align="center"><strong>상담자</strong></td>
		<td align="center"><strong>유입경로</strong></td>
		<td align="center"><strong>키워드</strong></td>
		<td align="center"><strong>지점</strong></td>
		<td align="center"><strong>진료과목</strong></td>
		<td align="center"><strong>이름</strong></td>
		<td align="center"><strong>연락처</strong></td>
		<td align="center"><strong>이메일</strong></td>
		<td align="center"><strong>등록일</strong></td>
		<td align="center"><strong>답변일</strong></td>
		<td align="center"><strong>답변까지시간</strong></td>
		<td align="center"><strong>답변</strong></td>
		<td align="center"><strong>내용</strong></td>
	</tr>
<?
while($row=mysql_fetch_array($result)) {
	/* 코멘트 마지막 시간 */
	$res = mysql_query("select wdate from amboard_basic_comment where fno=$row[no] order by wdate desc limit 1");
	$rowCmt = mysql_fetch_array($res);
	/* 코멘트 마지막 시간 */
	/* 지점 */
	if($row[category]){
		$res = mysql_query("select cname from amboard_basic_category where code='$code' and no=$row[category]");
		$row[category] = mysql_result($res, 0, 0);
	}
	/* 지점 */
	if($rowCmt[wdate] > $row[etc5]) $row[etc5] = $rowCmt[wdate];
	if($row[rdate]) $row[rterm] = gmdate("G:i:s", (strtotime($row[rdate]) - strtotime($row[wdate])));
	$row[wdate] = substr($row[wdate], 2, 14);
	$row[rdate] = substr($row[rdate], 2, 14);
	$cate2Array = explode("_", $row[cate2]);
	$row[cate2] = $cate2Array;
	if($row[cate2][0] == "NV") $row[cate2][0] = "<font color='blue'>네이버</font> <span style='font-size:8pt;color:#999999'>" . $row[cate2][1] . "</span>";
	else if($row[cate2][0] == "DM") $row[cate2][0] = "<font color='blue'>다음</font> <span style='font-size:8pt;color:#999999'>" . $row[cate2][1] . "</span>";
	else if($row[cate2][0] == "OV") $row[cate2][0] = "<font color='blue'>오버추어</font> <span style='font-size:8pt;color:#999999'>" . $row[cate2][1] . "</span>";
	else if($row[cate2][0] == "GL") $row[cate2][0] = "<font color='blue'>구글</font>";
	else if($row[cate2][0] == "MP") $row[cate2][0] = "<font color='blue'>모바일</font>";
	else $row[cate2][0] = "<font color='blue'>즐겨찾기</font>";
	if($row[recontents] != "") $row[result] = "완료";
	$row[contents] = cutstring($row[contents], 550);
?>
	<tr>
		<td align="center"><?=$totalcount?></td>
		<td align="center"><?=$row[etc3]?></td>
		<td align="center"><?=$row[etc5]?></td>
		<td align="center"><?=$row[admin_name]?></td>
		<td align="center"><?=$row[cate2][0]?></td>
		<td align="center"><?=$row[cate2][2]?></td>
		<td align="center"><?=$row[category]?></td>
		<td align="center"><?=$row[cate1]?><?if ($code=="cost01") echo $row[etc1]?></td>
		<td align="center"><?=$row[name]?></td>
		<td align="center"><?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></td>
		<td align="center"><?=$row[email]?></td>
		<td align="center"><?=$row[wdate]?></td>
		<td align="center"><?=$row[rdate]?></td>
		<td align="center"><?=$row[rterm]?></td>
		<td align="center"><?=$row[result]?></td>
		<td align="center"><?=$row[contents]?></td>
	</tr>
<?
	$totalcount--;
}
?>
</table>