<?
require_once $DROOT."/".$AMDIR."/admincheck.php";

if($asrmode == "keywrite" || $asrmode == "keymodify")
{
	include $DROOT."/mpkeyword/admin/keywrite.php";
}
else if($asrmode == "keywritedb" || $asrmode == "keymodifydb")
{
	include $DROOT."/mpkeyword/admin/keywritedb.php";
}
else if($asrmode == "keylist")
{
	include $DROOT."/mpkeyword/admin/keylist.php";
}
else if($asrmode == "keylistdel")
{
	include $DROOT."/mpkeyword/admin/keylistdel.php";
}
else
{
	include $DROOT."/mpkeyword/admin/keylist.php";
}

?>