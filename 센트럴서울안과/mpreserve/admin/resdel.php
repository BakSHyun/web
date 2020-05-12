<?
	$query = "delete from mpreserve where no = $no";
	mysql_query($query,$connect);

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?m1=$m1&m2=reslist\">";
?>