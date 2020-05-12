<?
require_once $RROOT."/inc/sys.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."/".$INDIR."/amlibrary/ajax/ajax.php";

if($m2 == "resconfiglist")
{
	include $RROOT."/admin/resconfiglist.php";
}
else if($m2 == "resconfiginsert" || $m2 == "resconfigupdate")
{
	include $RROOT."/admin/resconfig.php";
}
else if($m2 == "resconfiginsertdb" || $m2 == "resconfigupdatedb")
{
	include $RROOT."/admin/resconfigdb.php";
}
else if($m2 == "resconfigdelete")
{
	include $RROOT."/admin/regconfiglistdel.php";
}
else if($m2 == "reslist")
{
	include $RROOT."/admin/reslist.php";
}
else if($m2 == "resview")
{
	include $RROOT."/admin/resview.php";
}
else if($m2 == "resstate")
{
	include $RROOT."/admin/resstate.php";
}
else if($m2 == "reslistdel")
{
	include $RROOT."/admin/reslistdel.php";
}
else if($m2 == "resdel")
{
	include $RROOT."/admin/resdel.php";
}
else if($m2 == "resclosetime")
{
	include $RROOT."/admin/resclosetime.php";
}
else if($m2 == "resclosetimedb")
{
	include $RROOT."/admin/resclosetimedb.php";
}
else if($m2 == "reserve_source")
{
	include $RROOT."/admin/reserve_source.php";
}
else
{
	include $RROOT."/admin/reslist.php";
}

?>