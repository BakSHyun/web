<?

include "boardempty.php";

$SQL = "delete from amboard_config where no='".$no."'";
mysql_query($SQL,$connect);

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=$group&m1=$m1&m2=list\">";
?>