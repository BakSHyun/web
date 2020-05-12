<?

//for($i=0;$i<count($delno);$i++)
//{
	$query = "delete from mpreserve_config where no = $no";
	mysql_query($query,$connect);

//}

?>
<meta charset='utf-8'/>
<script type="text/javascript">
<!--
	alert ('삭제완료 되었습니다.');
//-->
</script>
<?
echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?m1=$m1&m2=resconfiglist\">";
?>