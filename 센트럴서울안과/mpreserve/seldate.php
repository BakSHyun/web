<?

$config = $mpreserve->config;

if(!$AUTH[write])
{
	msgback("���� ������ �����ϴ�.");
	//msg("�Ƿ���� �α��� �� �����׻�� ������ �����մϴ�.\\n�����纴���� �Ƿ���� �ؼ��մϴ�.\\n�¶��ο��� �̿��� ���� �α����� �Ͽ� �ֽʽÿ�.");
	//gourl("/10_member/login.html?return_url=" . $PHP_SELF);
	exit;
}


//ó�� ����������� ���� �ð��� �ߵ���

$possibility_day	= $config[reservation_possibility_day];
$branch_tel			= $config[branch_tel];


if($possibility_day =="7"){
	$possibility_day_week = $possibility_day+2;
}


if (!$rday)
{
	//������̰� ó�� ���ð�� �Ͽ��Ͽ� ������ ���� �ʵ��� �ϱ����Ͽ� ������ �˾Ƴ��� +2 �� ���ش�
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

	//ó������ �ƴ��� �����ϱ� ���� üũ��
	$check_bit="0";
}
else{

	//������̰� ó�� ���ð�� �Ͽ��Ͽ� ������ ���� �ʵ��� �ϱ����Ͽ� ������ �˾Ƴ��� +2 �� ���ش�
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

	//ó������ �ƴ��� �����ϱ� ���� üũ��
	$check_bit="1";
}



$viewtime = "1";

if($rmonth < 10) $rmonth2 = "0".$rmonth;
else $rmonth2 = $rmonth;
if($rday < 10) $rday2 = "0".$rday;
else $rday2 = $rday;
$rdate = $ryear."-".$rmonth2."-".$rday2;



if($check_bit=="1"){ // ó�� ��������� �ð��� �Ѹ��� �ʱ� ���� üũ
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
	//echo "���λ���";
} else {
	//echo "�������";
}

include $RROOT."/compile/".$mpreserveskin."/seldate.html";






?>
