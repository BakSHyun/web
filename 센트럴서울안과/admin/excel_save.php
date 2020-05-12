<?
 //  MEDIPIX 엑셀파일저장 추가 (08.04.15)


$filename = "member_".date("Ymd").".xls";

header( "Content-type: application/vnd.ms-excel" );
header("Content-Disposition: attachment; filename=$filename");
header("Content-Description: PHP4 Generated Data");

/*
	 header("Content-type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=암거나(".date("Ymd").").xls");
     header("Content-Description: PHP4 Generated Data");
*/


header( "Content-type: application/vnd.ms-excel" );
header("Content-Disposition: attachment; filename=$filename");
//header("Expires: 0");
header("Content-Description: PHP4 Generated Data");

//header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
//header("Pragma: public");

// 파일 최상단에 넣어 주세요
require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";
?>
<?
// 회원관리 객체 생성
$memobj = new ammemberRegister($connect);

// 회원관리 초기설정
//$memobj->init();

$FIELDINFO = $memobj->getFieldInfo();


$sql = "SELECT id,name,nicname,birth,sex,email,post,address1,address2,area,tel,htel,office,opost,oaddress1,oaddress2,otel,etc,infoopen,infomail,admail FROM ammember";

$stmt = mysql_query("$sql") or die(mysql_error());
?>
<meta http-equiv="Content-Language" content="ko">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">

<table>
<?
  echo "<tr>";
  if($FIELDINFO[id][state] != 0){
  echo "<td>아이디</td>";
  }

  if($FIELDINFO[name][state] != 0){
  echo "<td>이름</td>";
  }

 if($FIELDINFO[nicname][state] != 0){
  echo "<td>별명</td>";
  }

 if($FIELDINFO[jumin][state] != 0){
  echo "<td>생년월일</td>";
  }

 if($FIELDINFO[sex][state] != 0){
  echo "<td>성별</td>";
  }

 if($FIELDINFO[email][state] != 0){
  echo "<td>이메일</td>";
  }

 if($FIELDINFO[post][state] != 0){
  echo "<td>우편번호</td>";
  }

 if($FIELDINFO[address][state] != 0){
  echo "<td>주소</td>";
  echo "<td>지역</td>";
  }

  if($FIELDINFO[tel][state] != 0){
  echo "<td>전화번호</td>";
  }

 if($FIELDINFO[htel][state] != 0){
  echo "<td>핸드폰</td>";
  }

 if($FIELDINFO[office][state] != 0){
  echo "<td>회사명</td>";
  }
  if($FIELDINFO[opost][state] != 0){
  echo "<td>회사우편번호</td>";
  }
  if($FIELDINFO[oaddress][state] != 0){
  echo "<td>회사주소</td>";
  }
  if($FIELDINFO[otel][state] != 0){
  echo "<td>회사전화</td>";
  }
  if($FIELDINFO[etc][state] != 0){
  echo "<td>자기소개</td>";
  }
   if($FIELDINFO[infoopen][state] != 0){
  echo "<td>사이트메일수신</td>";
  }
  if($FIELDINFO[infomail][state] != 0){
  echo "<td>광고메일수신</td>";
  }
  if($FIELDINFO[admail][state] != 0){
  echo "<td>정보공개</td>";
  }



  echo "</tr>";

  while ($row = mysql_fetch_row($stmt)){

  echo "<tr>";

  if($FIELDINFO[id][state] != 0){
  echo "<td>$row[0]</td>";
  }

 if($FIELDINFO[name][state] != 0){
  echo "<td>$row[1]</td>";
  }

 if($FIELDINFO[nicname][state] != 0){
  echo "<td>$row[2]</td>";
  }

 if($FIELDINFO[jumin][state] != 0){
  echo "<td>$row[3]</td>";
  }

 if($FIELDINFO[sex][state] != 0){
  echo "<td>$row[4]</td>";
  }

 if($FIELDINFO[email][state] != 0){
  echo "<td>$row[5]</td>";
  }

 if($FIELDINFO[post][state] != 0){
  echo "<td>$row[6]</td>";
  }

  if($FIELDINFO[address][state] != 0){
  echo "<td>$row[7] $row[8]</td>";
  echo "<td>$row[9] </td>";

  }

  if($FIELDINFO[tel][state] != 0){
  echo "<td>$row[10]</td>";
  }

  if($FIELDINFO[htel][state] != 0){
  echo "<td>$row[11]</td>";
  }

  if($FIELDINFO[office][state] != 0){
  echo "<td>$row[12]</td>";
  }
  if($FIELDINFO[opost][state] != 0){
  echo "<td>$row[13]</td>";
  }
  if($FIELDINFO[oaddress][state] != 0){
  echo "<td>$row[14] $row[15]</td>";
  }
  if($FIELDINFO[otel][state] != 0){
  echo "<td>$row[16]</td>";
  }
  if($FIELDINFO[etc][state] != 0){
  echo "<td>$row[17]</td>";
  }
   if($FIELDINFO[infoopen][state] != 0){
 if($row[18] == 1){
  echo "<td>O</td>";
 }else{
  echo "<td>X</td>";
 }
  }
  if($FIELDINFO[infomail][state] != 0){
  if($row[19] == 1){
  echo "<td>O</td>";
 }else{
  echo "<td>X</td>";
 }
  }
  if($FIELDINFO[admail][state] != 0){
  if($row[20] == 1){
  echo "<td>O</td>";
 }else{
  echo "<td>X</td>";
 }
  }


  echo "</tr>";
 }
 ?>

   </table>
