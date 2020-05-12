<?

if(!$_POST["name"])
{
	msgback("이름이 넘어오지 않았습니다.");
	exit;
}

if(!$_POST["hphone1"] || !$_POST["hphone2"] || !$_POST["hphone3"])
{
	msgback("연락처가 넘어오지 않았습니다.");
	exit;
}

$reslist = $mpreserve->getconfirmlist($name, $hphone1, $hphone2, $hphone3);

$mpreserveskin = $mpreserve->config[skin];

include($RROOT."/skin/$mpreserveskin/confirmlist.html");

?>