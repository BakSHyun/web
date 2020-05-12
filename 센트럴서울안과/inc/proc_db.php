<meta charset='utf-8'/>
<?

// 외부에서의 접근을 막는다.

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


if(!$name){
	echo "<script>alert('이름이 없으면 등록이 되지 않습니다. 감사합니다.'); history.go(-1);</script>";
}

if( is_numeric($hphone1) && is_numeric($hphone2) && is_numeric($hphone3))
{
	//echo  "' { $element } ' is numeric" ,  PHP_EOL  ;
}
else
{
	echo "<script>alert('전화번호는 스팸정책으로 인하여 숫자만 사용할 수 있습니다. 전화번호를 숫자로 작성해주세요. 감사합니다.'); history.go(-1);</script>";
	exit;
}


require_once $_SERVER[DOCUMENT_ROOT]."/amconfig.php";

if(preg_match('/iphone|ipod|ios|blackberry|android|windows ce|lg|mot|samsung|sonyericsson|nokia/i', $_SERVER['HTTP_USER_AGENT'])){
	$device="mobile";
}else{
	$device="desk";
}

$nums = mysql_fetch_array(mysql_query("select no+1 from amboard_basic order by no desc limit 1"));

if(!$_SESSION['userid']){ $_SESSION['userid']= 'guest'; }

if($cate2_input == "") $cate2_input = $_SESSION['nvkwd'];

if($_SESSION['nvkwd']) $keyword = $_SESSION['nvkwd'];

	//사이트 방문전 페이지를 저장 -2015.4.6
if($_SESSION['reffer_session']){
		$referer_page =$_SESSION['reffer_session'];
}


$mail_time = date("Y-m-d H:i:s");
$SQL1 = "insert into amboard_basic set
ino = '".$nums[0]."',
cate1 = '".$cate1."',
cate3 = '".$cate3."',
gcode = '".$gcode."',
code = '".$code."',
userid = '".$_SESSION['userid']."',
name = '".$name."',
contents = '".$cate3."에서의 상담요청입니다. <br/> 고객명 : " .$name. "<br/> 연락처 : ".$hphone1."-".$hphone2."-".$hphone3."<br />".$contents."<br />".$cate1." ',
title = '[".$cate3."] ".$name."님의 대한 상담상담요청입니다. 연락처 : ".$hphone1."-".$hphone2."-".$hphone3."',
hphone1 = '".$hphone1."',
hphone2 = '".$hphone2."',
hphone3 = '".$hphone3."',
position='".$position."',
sex = '".$sex."',
etc1 = '".$etc1."',
keyword = '".$keyword."',
referer_page = '".$referer_page."',
html = '1',
email = '".$email."',
cate2 = '".$cate2_input."',
category = '".$category_input."',
vstate = '1',
wdate = '".$mail_time."',
ip = '".$_SERVER['REMOTE_ADDR']."'
";
//echo $SQL1;
mysql_query($SQL1);
//exit;

				include_once('../mpboard/nusoap_tong.php');

				//$snd_number =str_replace("-","",$etc1);  //보내는 사람 번호를 받음
				$snd_number =$adm_sql[adm_phone];  //보내는 사람 번호를 받음
				//	$rcv_number="01088374565";
				$rcv_number="01052520421";    //받는 사람 번호를 받음
				$rcv_number2="01088058515";    //받는 사람 번호를 받음
				$rcv_number3="01033895890";    //받는 사람 번호를 받음
				$rcv_number4="01074751134";    //받는 사람 번호를 받음

				/******고객님 접속 정보************/
				$sms_id=$adm_sql[adm_sms_id];            //고객님께서 부여 받으신 sms_id
				$sms_pwd=$adm_sql[adm_sms_pw];       //고객님께서 부여 받으신 sms_pwd
				/**********************************/
				$callbackURL = $gourl;


				$msg = $position." 상담이 접수되었습니다.";

				$msg = "[".$adm_sql[adm_meta_title]."] ".$name."님 연락처 : ".$hphone1."-".$hphone2."-".$hphone3;
				$msg = $msg ." ".$position." 에 글이 등록되었습니다.";//.$SITE_INFO[url];

				//msg ($msg);

				$sms = new SMS(); //SMS 객체 생성

				$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$msg);// 5개의 인자로 함수를 호출합니다.
				$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number2,$msg);// 5개의 인자로 함수를 호출합니다.
				$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number3,$msg);// 5개의 인자로 함수를 호출합니다.
				$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number4,$msg);// 5개의 인자로 함수를 호출합니다.


				if ($result > 0) {
					echo "<script language='javascript'>";
				//	echo "alert('sms가 전송되었습니다.');";
					//	echo "location.href='sms_main.php'";
					echo "</script>";
				}
				elseif ($result=="0") {
					echo "<script language='javascript'>";
					echo "alert('잔여량부족');";
					//	echo "location.href='sms_main.php'";
					echo "</script>";
				}
				elseif ($result=="-1") {
					echo "<script language='javascript'>";
					echo "alert('아이디/패스워드 이상');";
					//	echo "location.href='sms_main.php'";
					echo "</script>";
				}
				elseif ($result=="-3") {
					echo "<script language='javascript'>";
//					echo "alert('다중발송실패');";
					//	echo "location.href='sms_main.php'";
					echo "</script>";
				}
				elseif ($result=="-50") {
					echo "<script language='javascript'>";
					echo "alert('전화번호이상');";
					//	echo "location.href='sms_main.php'";
					echo "</script>";
				}
				else {
					echo "<script language='javascript'>";
						echo "alert('Error Code ".$result."  ');";
					//	echo "location.href='sms_main.php'";
					echo "</script>";
				}

?>

<?
if($code == "quick_contact"){
echo "<script>alert('상담이 등록되었습니다. 남겨주신 연락처로 업무시간 중 연락드리겠습니다.'); history.go(-1);</script>";
}else{
echo "<script>alert('상담이 등록되었습니다.'); history.go(-1);</script>";
}
?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '487541084748222');
fbq('track', 'PageView');
fbq('track', 'CompleteRegistration');
</script>
<noscript>
<img height="1" width="1" src="https://www.facebook.com/tr?id=487541084748222&ev=PageView&noscript=1"/>
</noscript>