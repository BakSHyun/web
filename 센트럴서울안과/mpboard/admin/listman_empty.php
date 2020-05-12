<?
$SQL="select no,gtable,code from amboard_config where gcode='".$group."' and code='".$code."'";
$result=mysql_query($SQL,$connect);
if($row=mysql_fetch_array($result)) {

	$tablename = "amboard_".$row[gtable]."_file";
	$dir = "/amboard/upload/";
	
	$fileobj = new fileManager($connect,$tablename,$dir);
	
	$infos[opt1] = $code;
	$fileobj->filedelete($infos);
	
	$SQL = "delete from amboard_".$row[gtable]."_comment where code='".$code."'";
	mysql_query($SQL,$connect);
	
	$SQL = "delete from amboard_".$row[gtable]."_category where code='".$code."'";
	mysql_query($SQL,$connect);
	
	$SQL = "delete from amboard_".$row[gtable]."_add where code='".$code."'";
	mysql_query($SQL,$connect);
	
	$SQL = "delete from amboard_".$row[gtable]."_field where code='".$code."'";
	mysql_query($SQL,$connect);
	
	$SQL = "delete from amboard_".$row[gtable]." where code='".$code."'";
	mysql_query($SQL,$connect);
}



?>
