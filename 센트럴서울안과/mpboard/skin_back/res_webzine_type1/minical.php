<?
//--------------------------------------------------------------------
//  JJ21 Calendar
//
//  - calendar.php / calendar.css
//
//  - parameters: $year, $month
//
//  - Usages
//      * http://your domain/calendar.php
//      * Calendar size can be adjusted by changing $cellh, $cellw
//      * Text size by editing calendar.css
//
//  - History
//      * Ver. 1.0/ 2000. 11. 15.
//
//  - Programmed by Sungpil Kim(spkim@dreamwiz.com)
//--------------------------------------------------------------------

$cellh  = 40;             // Height & Width of a cell
$cellw  = 80;
$tablew = $cellw*7;

//--------------------------------------------------------------------
//  메시지를 출력하고 한단계 back
//--------------------------------------------------------------------
function ErrorMsg($msg)
{
  echo " <script>                ";
  echo "   window.alert('$msg'); ";
  echo "   history.go(-1);       ";
  echo " </script>               ";

  exit;
}

function SkipOffset($height, $width, $no)
{
  for ($i = 1; $i <= $no; $i++) {	  
    echo "  <td height='30' valign='top' bgcolor='#f1f1e1'>&nbsp;</td> \n";
  }
}

//---- 오늘 날짜
$thisyear  = date('Y');  // 2000
$thismonth = date('n');  // 1, 2, 3, ..., 12
$today     = date('j');  // 1, 2, 3, ..., 31

//------ $year, $month 값이 없으면 현재 날짜
if (!$year) {
  $year = $thisyear;
}

if (!$month) {
  $month = $thismonth;
}

//------ 날짜의 범위 체크
if ( ($year > 9999) or ($year < 0) ){
  ErrorMsg("연도는 0~9999년만 가능합니다.");
}

if ( ($month > 12) or ($month < 0) ){
  ErrorMsg("달은 1~12만 가능합니다.");
}

$maxdate = date(t, mktime(0, 0, 0, $month, 1, $year));   // the final date of $month

$prevmonth = $month - 1;
$nextmonth = $month + 1;
$prevyear = $year;
$nextyear = $year;
if ($month == 1) {
  $prevmonth = 12;
  $prevyear = $year - 1;
} elseif ($month == 12) {
  $nextmonth = 1;
  $nextyear = $year + 1;
}

// Style에서 띄어쓰면 안됨
echo("
<html>
<head>
<title>+++++일자 선택+++++</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<link href='skin_css/html_style.css' rel='stylesheet' type='text/css'>
<script language='javascript'>
function setDay(wyear,wmonth,wday)
{
	opener.document.wform.wyear.value = wyear;
	opener.document.wform.wmonth.value = wmonth;
	opener.document.wform.wday.value = wday;

	window.close();
}
</script>
</head>
<body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>

<table width='250' height='200' border='0' cellpadding='0' cellspacing='1'>
  <tr bgcolor='#99CC33'> 
    <td height='31' colspan='7'><font color='#000000'>&nbsp; &nbsp;<a href=$PHP_SELF?year=$prevyear&month=$prevmonth>◀</a> $year 년&nbsp;&nbsp;$month 월&nbsp;&nbsp;$today 일 <a href=$PHP_SELF?year=$nextyear&month=$nextmonth>▶</a></font></td>
  </tr>
  <tr> 
    <td width='34' height='19' bgcolor='#FF9900'><div align='center'><font color='#FFFFFF' size='-2'>SUN</font></div></td>
    <td width='36' bgcolor='83B61B'>&nbsp; <font color='#FFFFFF' size='-2'>MON</font></td>
    <td width='35' bgcolor='83B61B'> <div align='center'><font color='#FFFFFF' size='-2'>&nbsp;TUE</font></div></td>
    <td width='34' bgcolor='83B61B'> <div align='center'><font color='#FFFFFF' size='-2'>&nbsp;WED</font></div></td>
    <td width='35' bgcolor='83B61B'> <div align='center'><font color='#FFFFFF' size='-2'>THU</font></div></td>
    <td width='37' bgcolor='83B61B'> <div align='center'><font color='#FFFFFF' size='-2'>&nbsp;FRI</font></div></td>
    <td width='39' bgcolor='#24A8FF'><div align='center'><font color='#FFFFFF' size='-2'>&nbsp;SAT</font></div></td>
  </tr>
");

echo("
<TR>
  <!-- 날짜 테이블 -->
");

$date   = 1;
$offset = 0;

while ($date <= $maxdate) {
  if ( $date == $today  &&  $year == $thisyear &&  $month == $thismonth) {
    $cstyle = 'today';
  } else {
    $cstyle = 'date';
  }

  if ($date == '1') {
    $offset = date('w', mktime(0, 0, 0, $month, $date, $year));  // 0: sunday, 1: monday, ..., 6: saturday
    SkipOffset($cellh, $cellw, $offset);
    echo "  <TD align='center' height='30' valign='middle' bgcolor='#F0F0F0'><a href=\"javascript:setDay('$year','$month','$date')\"><font color='#2E892C'>$date</TD> \n";
  } else {
    echo "  <TD align='center' height='30' valign='middle' bgcolor='#F0F0F0'><a href=\"javascript:setDay('$year','$month','$date')\"><font color='#2E892C'>$date</TD> \n";
  }

  $date++;
  $offset++;

  if ($offset == 7) {
    echo "</TR> \n";
    if ($date <= $maxdate) {
      echo "<TR> \n";
    }
    $offset = 0;
  }

} // end of while

if ($offset != 0) {
  SkipOffset($cellh, $cellw, (7-$offset));
  echo "</TR> \n";
}

echo("
<!-- 날짜 테이블 끝 -->

</TABLE>
</DIV>

</BODY>
</HTML>
")

?>