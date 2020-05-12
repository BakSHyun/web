<?
require_once $RROOT."/inc/sys.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";

if(!$m2) $m2="crm_list";

if($m2=="reserve" || $m2=="resview" || $m1=="reserve" || $m2=="reslist" || $m2=="resstate" || $m2=="reslistdel"|| $m2=="resdel"){
	//require_once $_SERVER[DOCUMENT_ROOT]."/mpreserve/reserve.php";
	include $RROOT."/admin/index.php";
} else{
	include_once $DROOT . "/_util/crm_admin/".$m2.".php";
}


?>
