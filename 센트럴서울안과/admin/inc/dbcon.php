<?
$connect = mysql_connect($DB_HOST, $DB_USER, $DB_PW) or exit('mysql_connect error');
mysql_query("set names utf8");
@mysql_select_db($DB_NAME,$connect);
?>