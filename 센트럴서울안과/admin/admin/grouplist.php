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
            
			<table width="100%"  border="0" align="center">
              <tr>
                <td align="center"><table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" align="center">
                  <tr bgcolor="#F6FAFC">
                    <td height="26" align="center" class="type">번호</td>
                    <td align="center" class="type">그룹코드</td>
                    <td align="center" class="type">그룹이름</td>
                    <td align="center" class="type">그룹테이블</td>
                    <td width="105" align="center" class="type">관리</td>
                  </tr>
                  <?
			$SQL = "select count(*) counter from amsolution_group";
			$result = mysql_query($SQL,$connect);
			$row=mysql_fetch_array($result);
			
			$tcount = $row[counter];
			
			$SQL = "select * from amsolution_group where 1";
			$result = mysql_query($SQL,$connect);
			while($row=mysql_fetch_array($result)) {
			?>
                  <tr <?if($row[gcode]=="basic") echo "bgcolor='#FFDDDD'";?>>
                    <td align="center" class="type2"><?=$tcount?></td>
                    <td align="center" class="type2"><?=$row[gcode]?></td>
                    <td align="center" class="type2"><?=$row[gname]?></td>
                    <td align="center" class="type2"><?=$row[gtable]?></td>
                    <td align="center" class="type2">
                      <a href="<?$PHP_SELF?>?group=<?=$group?>&m1=creategroup&asgmode=modify&gno=<?=$row[no]?>"><img src="img/btn_modify.gif" width="48" height="20" border="0"></a>
                      <?if($row[gcode]=="basic") {?>
                      <img src="img/btn_delete.gif" width="48" height="20" border="0" style="cursor:hand" OnClick="javascript:alert('basic 그룹은 삭제가 불가능 합니다.')">
                      <?} else {?>
                      <img src="img/btn_delete.gif" width="48" height="20" border="0" style="cursor:hand" OnClick="goURL('<?$PHP_SELF?>?group=<?=$row[gcode]?>&m1=creategroupdb&asgmode=delete&gno=<?=$row[no]?>','해당그룹 게시판 정보가 모두삭제 됩니다.\n해당그룹에 속해있는 회원은 미지정 그룹 회원으로 변경됩니다.\n그래도 그룹을 삭제사시겠습니까?');">
                      <?}?>
                    </td>
                  </tr>
                  <?
            	$tcount--;
        	}
            ?>
                </table>
                <br>
                <a href="<?$PHP_SELF?>?group=<?=$group?>&m1=creategroup" class="a1"><img src="img/btn_groupadd.gif" border="0"></a></td>
              </tr>
            </table>
