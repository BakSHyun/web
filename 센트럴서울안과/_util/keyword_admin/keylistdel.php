<?

for($i=0;$i<count($delno);$i++)
{
	$query = "delete from mpkeyword where no = $delno[$i]";
	mysql_query($query,$connect);
}

?>
<script type="text/javascript">
<!--
	alert ('�����Ϸ� �Ǿ����ϴ�.');
//-->
</script>
<?
echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?m1=$m1&m2=keylist\">";
?>