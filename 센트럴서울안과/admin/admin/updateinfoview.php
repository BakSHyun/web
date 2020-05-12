			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center"><span class="style8">[설치솔루션확인]</span></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
            </table>
            
            <?
            require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/updateinfo.php";
            $dir_array = dirList($_SERVER["DOCUMENT_ROOT"]."/$INDIR/");	// 웹루트에 있는 디랙토리 리스트를 가져온다.
            ?>
			<table width="100%" border="0">
              <tr>
                <td align="center">
                <table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" class="type2" align="center">
                  <tr bgcolor="#F6FAFC">
                    <td width="200" height="26" align="center" class="type">설치솔루션</td>
                    <td align="center" class="type">버젼</td>
                  </tr>
			<?
			$INSTALL_DROOT = "\$_SERVER[\"DOCUMENT_ROOT\"]"."/".$INDIR;	// 시스템루트경로
			
        	if(is_array($dir_array)) {
        		reset($dir_array);
                while(list($key, $value)=each($dir_array)) {
					$verinfo_ver = $value."_ver";
					if($$verinfo_ver) {
			?>
                  <tr align="center">
                    <td height="26" align="center" class="type2"><?=$value?></td>
                    <td align="left" class="type2">&nbsp;<?=$$verinfo_ver?></td>
                  </tr>
			<?
					}
					
					if($value=="amlog") $amloginclude = "require_once $INSTALL_DROOT.\"/amlog/log.php\";\n<br>";
            	}
            }
			?>

                </table>
                <br>
                <table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" class="type2" align="center">
                  <tr>
                    <td width="200" height="26" align="center" bgcolor="#F6FAFC" class="type">설치방식</td>
                    <td align="center" class="type">
                    <?if($ftpuse) {?>
                    FTP 설치모드
                    <?} else {?>
                    Web 설치모드
                    <?}?>
                    </td>
                  </tr>
                </table>
                <?if(!$ftpuse && !is_file($_SERVER["DOCUMENT_ROOT"]."/amconfig.php")) {?> <br>
                <table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" align="center">
                  <tr>
                    <td height="26" align="left" class="type2">Web 설치모드 시에는 아래의 소스코드 내용을 복사하여 amconfig.php 로 웹루트에 저장하시기 바랍니다.<br>
                    	이작업은 사이트 운영시에 문제가 발생하므로 반드시 하셔야 합니다.<br>
                    <br>
                    <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                      <tr>
                        <td bgcolor="#F6FAFC" class="type2">
							&lt;<a>?</a><br>
							###########################<br>
							# amsolution Include file<br>
							###########################
							<p>include $_SERVER[&quot;DOCUMENT_ROOT&quot;].&quot;/<?=$INDIR?>/admin/inc/config.php&quot;;<br>
								<?=$amloginclude?>
							  ?&gt;</p>						
						</td>
                      </tr>
                    </table> </td>
                  </tr>
                </table>                
                <?}?>
                <br>
                </td>
              </tr>
            </table>
            
           
