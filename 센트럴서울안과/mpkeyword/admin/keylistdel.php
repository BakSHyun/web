<?

for($i=0;$i<count($delno);$i++)
{
	$query = "delete from mpkeyword where no = $delno[$i]";
	mysql_query($query,$connect);
}

echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?asumode=$asumode&asrmode=keylist\">";
?>