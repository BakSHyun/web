<?

if(!$_POST["name"])
{
	msgback("�̸��� �Ѿ���� �ʾҽ��ϴ�.");
	exit;
}

if(!$_POST["hphone1"] || !$_POST["hphone2"] || !$_POST["hphone3"])
{
	msgback("����ó�� �Ѿ���� �ʾҽ��ϴ�.");
	exit;
}

$reslist = $mpreserve->getconfirmlist($name, $hphone1, $hphone2, $hphone3);

$mpreserveskin = $mpreserve->config[skin];

include($RROOT."/skin/$mpreserveskin/confirmlist.html");

?>