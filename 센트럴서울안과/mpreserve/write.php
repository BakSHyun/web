<?

if(!$ryear || !$rmonth || !$rday || !$rtime)
{
	msgback("예약시간이 넘어오지 않았습니다.");
	exit;
}

if($rmonth < 10) $rmonth2 = "0".$rmonth;
else $rmonth2 = $rmonth;
if($rday < 10) $rday2 = "0".$rday;
else $rday2 = $rday;
$resdate = $ryear."-".$rmonth2."-".$rday2;
$restime = $rtime;

$config = $mpreserve->config;

$mpreserveskin = $mpreserve->config[skin];

include($RROOT."/skin/$mpreserveskin/write.html");

?>