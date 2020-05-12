<?
 //  MEDIPIX 엑셀파일저장 추가 (08.04.15)

//게시판에 글 작성한 사람들이 e-mail주소만 가지고 옮
$filename = "email".date("Ymd").".xls";
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
$sql = "SELECT DISTINCT email, name FROM `amboard_basic`  WHERE email != ' 'order by email asc";
$stmt = mysql_query("$sql") or die(mysql_error()); 
?>
<meta http-equiv="Content-Language" content="ko"> 
<META http-equiv="Content-Type" content="text/html; charset=euc-kr"> 

<table>
<?
  echo "<tr>";
      echo "<td>e-mail</td>";
      echo "<td>이름</td>";
 echo "</tr>";
  
  while ($row = mysql_fetch_row($stmt)){
	 echo "<td>$row[0]</td>";                                 //e-mail주소
     echo "<td>$row[1]</td>";                                 //이름
 echo "</tr>";
 } 
 ?>
    </table>
