<script>

function formcheck(cf) {
	
	if(cf.group.value == "") {
		alert("그룹코드를 입력해 주세요");
		cf.group.focus();
		return false;
	}
	if(cf.gname.value == "") {
		alert("그룹이름을 입력해 주세요");
		cf.gname.focus();
		return false;
	}
	if(cf.gtable.value == "") {
		alert("그룹테이블을 입력해 주세요");
		cf.gtable.focus();
		return false;
	}	
	return true;
}

function gtableSet(gform,gtable) {
	gform.gtable.value=gtable;
	
	if(gtable=="") gform.gtable.readOnly = false;
	else gform.gtable.readOnly = true;
}

</script>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center"><span class="style8">[그룹 관리]</span></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
            </table>

<?
if($asgmode == "modify") {
	$SQL="select * from amsolution_group where no='$gno' ";
	$result = mysql_query($SQL,$connect);
	$row=mysql_fetch_array($result);
	
	$asgmode = "update";
} else {
	$asgmode = "insert";
}
?>
            
            <table width="100%"  border="0" align="center">
              <tr>
                <td align="center">
                  <form name="formgroup" method="post" action="<?=$PHP_SELF?>" onSubmit="return formcheck(this);">
                    <input type="hidden" name="m1" value="creategroupdb">
                    <input type="hidden" name="asgmode" value="<?=$asgmode?>">
                    <input type="hidden" name="gno" value="<?=$gno?>">
                    <table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" align="center">
                      <tr>
                        <td width="87" align="right" bgcolor="#F6FAFC" class="type">그룹코드</td>
                        <td align="left"><input name="group" type="text" class="input" size="15" value="<?=$row[gcode]?>" <?if($asgmode=="update") echo "readonly style='background:#DDDDDD'";?> style="ime-mode:disabled">
                        </td>
                      </tr>
                      <tr>
                        <td width="87" align="right" bgcolor="#F6FAFC" class="type">그룹이름</td>
                        <td align="left"><input name="gname" type="text" id="gname" class="input" size="15" value="<?=$row[gname]?>"></td>
                      </tr>
                      <tr>
                        <td width="87" align="right" bgcolor="#F6FAFC" class="type">그룹테이블</td>
                        <td align="left" class="type2">
						  <input name="gtable" type="text" id="gtable" class="input" size="15" value="<?=$row[gtable]?>" <?if($asgmode=="update") echo "readonly style='background:#DDDDDD'";?> style="ime-mode:disabled">
						  
						  <?if($asgmode!="update") {?>
							<?
							$SQL = "select gtable from amsolution_group group by gtable";
							$gresult = mysql_query($SQL,$connect);
							?>
							테이블선택:
						  <select name="sgtable" id="sgtable" class="input" OnChange="gtableSet(formgroup,this.options[this.selectedIndex].value)">
                            <option value="">테이블생성</option>
							<?
							while($grow=mysql_fetch_array($gresult)) {
							?>
                            <option value="<?=$grow[gtable]?>" <?if($row[gtable] == $grow[gtable]) echo "selected";?>><?=$grow[gtable]?></option>
							<?
							}
							?>
                          </select>
                          
                          
                          <img src="/<?=$INDIR?>/admin/img_old/ihelp.gif" align="absmiddle" border="0" style="cursor:hand" Onclick="layerinfox('그룹을 생성하면 기본적으로 테이블을 생성하거나 기존 테이블을 선택해야 합니다.<br><br>게시판의 경우 테이블 하나에서 여러개의 게시판을 생성하여 사용할수 있도록 되어있고, 그래서 기본적으로 그룹을 기준으로 해당 그룹 테이블에 게시판을 생성하게 됩니다.<br><br><font color=\'#DD0000\'>※ 주의 : 여러개의 그룹을 하나의 테이블에 지정하는 것은 그리 효율적이지 못합니다.<br>만일 여러개의 그룹에 많은 수의 게시판이 존재하게 되면 하나의 테이블에서 처리하는 데이터의 양이 많아 지므로 속도저하의 원인이 될수 있습니다.</font>','divlayerinfo')">
                          
                          <?}?>
                          
                          
					    </td>
                      </tr>
                    </table>
                    <br>
                    <input name="image" type="image" src="/<?=$INDIR?>/admin/img/btn_submit.gif" align="absmiddle">
&nbsp;&nbsp;                    <a href="<?$PHP_SELF?>?group=<?=$group?>&m1=grouplist" class="a1"><img src="/<?=$INDIR?>/admin/img/btn_grouplist.gif" border="0" align="absmiddle"></a>                  
                  </form></td>
              </tr>
            </table>
