         <table width="625" border="0" cellspacing="0" cellpadding="0">
         <tr>
                 <td align="center">&nbsp;</td>
         </tr>
         <tr>
                 <td align="center"><span class="style8">&nbsp;</span></td>
         </tr>
         <tr>
                 <td align="center">&nbsp;</td>
         </tr>
         </table>

         <?
         $dir_array = dirList($_SERVER["DOCUMENT_ROOT"]."/$INDIR/");	// 웹루트에 있는 디랙토리 리스트를 가져온다.
         ?>
         <table width="98%"  border="0">
         <tr>
                 <td align="center">
<?
	if ($_SESSION['userlevel'] < "1") {
?>
                         <table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" align="center">
                         <tr align="center" bgcolor="#F6FAFC">
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

                         		if($value=="amlog") $amloginclude = true;
                         	}
                         }
                         ?>

                         </table>
                         <br>
                         <table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" class="type2" align="center">
                         <tr>
                                 <td width="200" height="26" bgcolor="#F6FAFC" align="center" class="type">설치방식</td>
                                 <td align="center" class="type2">
                                         <?if($ftpuse) {?>
                                         FTP 설치모드
                                         <?} else {?>
                                         Web 설치모드
                                         <?}?>
                                 </td>
                         </tr>
                         </table>
<?}?>
                         <?if(!$ftpuse && !is_file($_SERVER["DOCUMENT_ROOT"]."/".$INDIR."/amconfig.php")) {?> <br>
                         <table border="1" width="450" cellpadding="2" cellspacing="0" bordercolor="#B0C8CF" bordercolordark="white" class="type2" align="center">
                         <tr align="center">
                                 <td height="26" align="left">
                                         Web 설치모드 시에는 아래의 소스코드 내용을 복사하여 amconfig.php 로 웹루트에 저장하시기 바랍니다.<br>
                                         이작업은 사이트 운영시에 문제가 발생하므로 반드시 하셔야 합니다.<br>
                                         <br>
                                         <table width="100%"  border="0" cellspacing="0" cellpadding="5" class="type">
                                         <tr>
                                                 <td bgcolor="#F6FAFC">
                                                         &lt;<a>?</a><br>
                                                         #########################################################<br>
                                                         # mpsolution Include file<br>
                                                         #########################################################<br>
                                                         <p>require_once $_SERVER[&quot;DOCUMENT_ROOT&quot;].&quot;/<?=$INDIR?>/admin/inc/config.php&quot;;<br>
                                                         <?if($amloginclude){?> require_once $_SERVER[&quot;DOCUMENT_ROOT&quot;].&quot;/<?=$INDIR?>/amlog/log.php&quot;;<br><?}?>

                                                         ?&gt;</p>
                                                 </td>
                                         </tr>
                                         </table>
                                 </td>
                         </tr>
                         </table>
                         <?}?>
                         <br>
                 </td>
         </tr>
         </table>
