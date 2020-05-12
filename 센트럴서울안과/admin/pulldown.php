<?
$SQL = "select gcode from amsolution_group where 1 group by gcode";
$result = mysql_query($SQL,$connect);
?>
<select name="menu1" onChange="javascript:location.href=this.options[this.selectedIndex].value">
  <?
  while($row=mysql_fetch_array($result)) {
  	$SQL = "select * from amsolution_group where gcode='".$row[gcode]."'";
	$gresult = mysql_query($SQL,$connect);
	$grow = mysql_fetch_array($gresult);
  ?>
  <option value="<?=$PHP_SELF?>?group=<?=$grow[gcode]?>&m1=<?=$m1?>&asbmode=<?=$asbmode?>" <?if($group==$grow[gcode]) echo "selected";?>><?=$grow[gname]?></option>
  <?
  }
  ?>
</select>