<?
$config = $mpreserve->config;
$mpreserveskin = $mpreserve->config[skin];
if($skinmode == "mobile"){ 
	$mpreserveskin = $mpreserveskin."_mobile";
}
include($RROOT."/skin/$mpreserveskin/result.html");

?>