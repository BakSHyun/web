<?
require_once "../../admin/inc/config.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpboard/inc/sys.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/<?=$INDIR?>/admin/input.css" rel="stylesheet" type="text/css">
<title>게시판 최근글 추가 소스</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {color: #ff8040}
-->
</style></head>

<body>
    <table width="100%"  border="0" cellspacing="0" cellpadding="5" class="type2">
      <tr>
        <td>
	    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
	      <tr>
	        <td>
	        
			<a href="boardsource.php?group=<?=$group?>&code=<?=$code?>" class="a">[게시판 설정 코드]</a>
			<a href="boardnewsource.php?group=<?=$group?>&code=<?=$code?>" class="a"><b>[게시판 최근글 설정 코드]</b></a>
			
	        </td>
	      </tr>
	    </table>
        </td>
      </tr>
    </table>
    <table width="100%"  border="0" cellspacing="0" cellpadding="5" class="type2">
    	<form name="skinform" method="post" action="<?=$PHP_SELF?>">
    		<input type="hidden" name="group" value="<?=$group?>">
    		<input type="hidden" name="code" value="<?=$code?>">
      <tr>
        <td>
        	최근글 스킨 선택 : 
	      <?
	      $dirarray = dirList($_SERVER[DOCUMENT_ROOT]."/$INDIR/mpboard/skin_newlist/");
	      ?>
	      <select name="skin" id="skin" class="input">
	      <?if(is_array($dirarray)) while(list($key, $value)=each($dirarray)) {?>
	      	<option value="<?=$value?>" <?if($skin == $value) echo "selected";?>><?=$value?></option>
	      <?}?>
	      </select>
	      <input type="submit" value="확인" class="input">
	      
	      <img src="/<?=$INDIR?>/admin/img/ihelp.gif" align="absmiddle" border="0" style="cursor:hand" Onclick="layerinfox('게시판 최근글 스킨경로는 <b>/mpboard/skin_newlist/</b> 에 위치해 있.<br><br>스킨추가 이곳  이름의 스킨 디랙토리를 생성후 스킨을 업로드 하시면 됩니다.','divlayerinfo')">
        </td>
      </tr>
    	</form>
    </table>
    
    
<?
if($skin) {
?>
    <table width="100%"  border="0" cellspacing="0" cellpadding="5" class="type2">
      <tr>
        <td>
        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
          <tr>
            <td align="left">&lt;?<br>
              // 파일 최상단에 넣어 주세요             <br>
      <font color="#0000ff">require_once</font> <font color="#ff8040">$_SERVER[DOCUMENT_ROOT]</font>.&quot;/amconfig.php&quot;;<br>
      <font color="#0000ff">require_once</font> <font color="#ff8040">$_SERVER[DOCUMENT_ROOT]</font>.&quot;/&quot;.<span class="style1">$INDIR</span>.&quot;/mpboard/inc/sys.php&quot;;<br>
      ?&gt;<br>
      		</td>
      	  </tr>
      	</table>
        </td>
      </tr>
      <tr>
        <td>
        <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="white" class="type2" align="center">
          <tr>
            <td align="left">
&lt;?<br>
// 게시판 최근글이 보여질부분에 넣어 주세요 <br>
      <font color="#ff8040">$group</font> = &quot;<?=$group?>&quot;;<br>
      <font color="#ff8040">$code</font> = &quot;<?=$code?>&quot;;<br>
      <font color="#ff8040">$skin</font> = &quot;<?=$skin?>&quot;;<br>
      <font color="#ff8040">$line</font> = 3; &nbsp;&nbsp;&nbsp;&nbsp;// 원하시는 최근글의 갯수로 수정해 주세요<br>
      <font color="#ff8040">$cutwidth</font> = 180; &nbsp;&nbsp;&nbsp;&nbsp;// 제목글 넓이를 수정해주세요<br>
      <font color="#ff8040">$contentscutwidth</font> = 300; &nbsp;&nbsp;&nbsp;&nbsp;// 내용글 넓이를 수정해주세요($LDATA[linkcontents])<br>
      <br>
      <span class="style1">$blistsort</span> = 1; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// 링크된 게시판 기본 소트 : 1, 수정된 소트 : 2<br>
      <span class="style1">$bfsort</span> = &quot;ino&quot;; &nbsp;&nbsp;&nbsp;// ino: 기본정렬 , point : 점수 , download : 다운로드 , view : 보기<br>
      <span class="style1">$bsort</span> = &quot;desc&quot;; &nbsp;&nbsp;&nbsp;// desc : 내림차순 , asc : 오름차순<br>      <br>
      <font color="#ff8040">$boardurl</font> = &quot;/&quot;.<span class="style1">$INDIR</span>.&quot;/mpboard/<?=$code?>.html&quot;;      &nbsp;&nbsp;&nbsp;// 게시판 코드을 삽입한 페이지로 수정해 주세요<br>
      <font color="#0000ff">include</font> <font color="#ff8040">$_SERVER[DOCUMENT_ROOT]</font>.&quot;/&quot;.<span class="style1">$INDIR</span>.&quot;/mpboard/newlist.php&quot;;<br>
      ?&gt;</td>
          </tr>

        </table></td>
      </tr>
      <tr>
        <td align="center">위의 코드를 게시판 최근글을 보여 주고 싶은 파일에 복사하여 붙여 넣으시면 됩니다. </td>
      </tr>
    </table>
    <br>
    <center>
    <img src="/<?=$INDIR?>/admin/img/btn_submit.gif" style="cursor:hand" Onclick="javascript:window.close();">
	</center>
<?
}
?>
</body>
</html>
<div id="divlayerinfo"></div>