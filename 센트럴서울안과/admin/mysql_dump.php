<?
require_once "inc/config.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";

$date = date("Ymd_Hi",time());

header("Content-disposition: filename=".$DB_NAME."_".$date.".sql");
header("Content-type: application/octetstream");
header("Pragma: no-cache");
header("Expires: 0");

$mysqldbobj = new mysqldb($DB_HOST,$DB_USER,$DB_PW);
$mysqldbobj->selectdb($DB_NAME);

$mysqldbobj->dump_db();

exit;
?>
