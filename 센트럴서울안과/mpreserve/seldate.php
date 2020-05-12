<?

$config = $mpreserve->config;

if(!$AUTH[write])
{
	msgback("예약 권한이 없습니다.");
	//msg("의료법상 로그인 후 사진및상담 열람이 가능합니다.\\n허유재병원은 의료법을 준수합니다.\\n온라인예약 이용을 위해 로그인을 하여 주십시요.");
	//gourl("/10_member/login.html?return_url=" . $PHP_SELF);
	exit;
}


//처음 접속했을경우 예약 시간이 뜨도록

$possibility_day	= $config[reservation_possibility_day];
$branch_tel			= $config[branch_tel];


if($possibility_day =="7"){
	$possibility_day_week = $possibility_day+2;
}


if (!$rday)
{
	//토요일이고 처음 들어올경우 일요일에 선택이 되지 않도록 하기위하여 요일을 알아내서 +2 를 해준다
	$today= date('Y-n-j');
	$weekday = date(w,strtotime('$today'));


	//echo "111:".$row[reservation_possibility_day];

	if ($weekday == 6)
	{
		$ryear =	date("Y", mktime(0,0,0,date("m"),date("d")+$possibility_day_week, date("Y")));
		$rmonth =	date("n", mktime(0,0,0,date("m"),date("d")+$possibility_day_week, date("Y")));
		$rday=		date("d", mktime(0,0,0,date("m"),date("d")+$possibility_day_week, date("Y")));
	}
	else {
		$ryear =	date("Y", mktime(0,0,0,date("m"),date("d")+$possibility_day, date("Y")));
		$rmonth =	date("n", mktime(0,0,0,date("m"),date("d")+$possibility_day, date("Y")));
		$rday=		date("d", mktime(0,0,0,date("m"),date("d")+$possibility_day, date("Y")));
	}

	$rdate_static=$ryear."-".$rmonth."-".$rday;

	//처음인지 아닌지 구분하기 위한 체크값
	$check_bit="0";
}
else{

	//토요일이고 처음 들어올경우 일요일에 선택이 되지 않도록 하기위하여 요일을 알아내서 +2 를 해준다
	$today= date('Y-n-j');
	$weekday = date(w,strtotime('$today'));


	if ($weekday == 6)
	{
		$ryear_static =		date("Y", mktime(0,0,0,date("m"),date("d")+$possibility_day_week, date("Y")));
		$rmonth_static =	date("n", mktime(0,0,0,date("m"),date("d")+$possibility_day_week, date("Y")));
		$rday_static=		date("d", mktime(0,0,0,date("m"),date("d")+$possibility_day_week, date("Y")));


	}
	else {
		$ryear_static =		date("Y", mktime(0,0,0,date("m"),date("d")+$possibility_day, date("Y")));
		$rmonth_static =	date("n", mktime(0,0,0,date("m"),date("d")+$possibility_day, date("Y")));
		$rday_static=		date("d", mktime(0,0,0,date("m"),date("d")+$possibility_day, date("Y")));
	}

	$rdate_static=$ryear_static."-".$rmonth_static."-".$rday_static;

	//처음인지 아닌지 구분하기 위한 체크값
	$check_bit="1";
}



$viewtime = "1";

if($rmonth < 10) $rmonth2 = "0".$rmonth;
else $rmonth2 = $rmonth;
if($rday < 10) $rday2 = "0".$rday;
else $rday2 = $rday;
$rdate = $ryear."-".$rmonth2."-".$rday2;



if($check_bit=="1"){ // 처음 들어왔을경우 시간을 뿌리지 않기 위한 체크
	$timelist = $mpreserve->gettimelist($rdate);
}

$mpreserveskin = $mpreserve->config[skin];
if($skinmode == "mobile"){
	$mpreserveskin = $mpreserveskin."_mobile";
}
//include($RROOT."/skin/$mpreserveskin/seldate.html");
//echo "222:".$config[reservation_possibility_day];


$compiles = new skinCompile($mpreserveskin,"seldate.html");
$compiles->skindir = "/$INDIR/mpreserve/skin";
$compiles->compiledir = "/$INDIR/mpreserve/compile";
$compiles->init();
if($compiles->update()) {
	//echo "새로생성";
} else {
	//echo "변경없음";
}

include $RROOT."/compile/".$mpreserveskin."/seldate.html";






?>
