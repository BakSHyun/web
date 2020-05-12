<?
 //  MEDIPIX 엑셀파일저장 추가 (08.04.15)


$filename = "reserve".date("Ymd").".xls";

header( "Content-type: application/vnd.ms-excel" );
header("Content-Disposition: attachment; filename=$filename");
header("Content-Description: PHP4 Generated Data");

//header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
//header("Pragma: public");

// 파일 최상단에 넣어 주세요
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";
?>
<?
$sql = "SELECT resstate, code, restime, resdate, name, userid, email, hphone1, hphone2, hphone3, wdate, contents FROM `mpreserve`
ORDER BY resdate DESC, restime DESC";
$stmt = mysql_query("$sql") or die(mysql_error());
?>
<meta http-equiv="Content-Language" content="ko">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">

<table border="1" bgcolor="b9f7ff">
<?
  echo "<tr>";
      echo "<td align='center'>예약현황</td>";
      echo "<td align='center'>구분</td>";
      echo "<td align='center'>예약시간</td>";
      echo "<td align='center'>이름</td>";
	  echo "<td align='center'>E-mail</td>";
      echo "<td align='center'>전화번호</td>";
	  echo "<td align='center'>작성날짜</td>";
      echo "<td align='center'>메모</td>";
echo "</tr>";
echo "</table>";

echo "<table border='1'>";
  while ($row = mysql_fetch_row($stmt)){
	  $branch = mysql_result(mysql_query("select name from mpreserve_config where code= '$row[1]'",$connect),0,0);
echo "<tr>";
  if($row[0] == 1){
     echo "<td>예약확인</td>";
  }else if($row[0] == 2){
     echo "<td>진료완료</td>";
  }else if($row[0] == 9){
     echo "<td>예약취소</td>";
  }else{
     echo "<td>예약대기</td>";
  }
     echo "<td align='center'>$branch</td>";   //지점구분
     echo "<td align='center'  bgcolor='b3bbf9'>$row[3]&nbsp;&nbsp;$row[2]</td>";    // 예약날짜 + 시간
  if($row[5] != ""){
	 echo "<td align='center' bgcolor='ffffcc'>$row[4] ($row[5]) </td>";                                  //이름 + 아이디'
  }else{
    echo "<td align='center' bgcolor='ffffcc'>$row[4]</td>";
  }

	 echo "<td align='center'>$row[6]</td>";                                   //이메일
	 echo "<td align='center'  bgcolor='ffa980'>$row[7] - $row[8] - $row[9] </td>";       //전화번호

	 echo "<td align='center'>$row[10]</td>";                                 //작성날짜
	 echo "<td>$row[11]</td>";                                 //contents


 echo "</tr>";
 }
 ?>
    </table>
