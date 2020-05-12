<meta charset='utf-8'/>
<?


require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";

$nums = mysql_fetch_array(mysql_query("select no+1 from amboard_basic order by no desc limit 1"));

if(!$_SESSION['userid']){ $_SESSION['userid']= 'guest'; }


for ( $i = 0; $i < count($name); $i++){
 if ( ord($name[$i]) >= 128 )
 {
  //msg ('한글');
  //exit;
 } else{
  echo "<script>alert('영문이름은 스팸정책으로 인하여 사용하실 수 없습니다. 작성자를 한글로 작성해주세요. 감사합니다.'); history.go(-1);</script>";
  exit;
 }
}

if(preg_match('/iphone|ipod|ios|blackberry|android|windows ce|lg|mot|samsung|sonyericsson|nokia/i', $_SERVER['HTTP_USER_AGENT'])){
	$device="mobile";
}else{
	$device="desk";
}

if($_SESSION['nvkwd']) $keyword = $_SESSION['nvkwd'];

if($_SESSION['userlevel'] < "1") {
?>
<script>
	//alert("<?=$_SESSION['nvkwd']?>");
	//alert("<?=$keyword?>");
</script>
<?
}

$mail_time = date("Y-m-d H:i:s");
$SQL1 = "insert into amboard_basic set
ino = '".$nums[0]."',
cate1 = '".$cate1."',
cate2 = '".$cate2_input."',
cate3 = '".$cate3."',
gcode = '".$gcode."',
code = '".$code."',
userid = '".$_SESSION['userid']."',
name = '".$name."',
title = '".$title."',
contents = '".$contents."',
hphone1 = '".$hphone1."',
hphone2 = '".$hphone2."',
hphone3 = '".$hphone3."',
html = '1',
email = '".$email."',
etc1 = '".$etc1."',
etc2 = '".$etc2."',
category = '".$category_input."',
position='".$position."',
referer_page='".$gourl."',
device='".$device."',
keyword='".$keyword."',
vstate = '1',
wdate = '".$mail_time."',
ip = '".$_SERVER['REMOTE_ADDR']."'
";
//echo $SQL1;
mysql_query($SQL1);
//exit;


?>





<?
echo "<script>alert('상담이 등록되었습니다.'); location.replace('../07_counsel/community8.php'); </script>";

?>