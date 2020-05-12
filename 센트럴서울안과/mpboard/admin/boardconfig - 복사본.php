<?
//require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/admin/inc/siteinfo.php";

if($m2 == "configinsert") $m2 = "configinsertdb";
if($m2 == "configupdate") $m2 = "configupdatedb";

$list_num = "12";
$page_num = "10";
$cut_width = "0";
$new_time = "24";
$cool_count = "0";
$upload_num = "1";
$upload_btsize = "0";
$upload_bwsize = "0";
$upload_size = "3";

$manage_auth = "1";
$use_auth = "10";
$write_auth = "10";
$rewrite_auth = "10";
$view_auth = "10";
$comment_auth = "10";
$point_auth = "10";
$upload_auth = "10";

if($m2 == "configupdatedb") {
	$SQL = "select * from amboard_config where no='$no'";
	$result = mysql_query($SQL,$connect);
	$row = mysql_fetch_array($result);

	if(is_array($row)) while(list($key, $value)=each($row)) {
			$$key = $row[$key];
	}

	// 일정관리 설정 불러옴
	$SQL_diary = "select * from amboard_diary_config where code='$code'";
	$result1 = mysql_query($SQL_diary,$connect);
	$row1 = mysql_fetch_array($result1);
}

if($m2 == "configinsertdb") {
	$SQL = "select * from amsolution_group where gcode='$group'";
	$result = mysql_query($SQL,$connect);
	$row = mysql_fetch_array($result);

	$gtable = $row[gtable];
}


?>

<script>
function formCheck(cf){
	if(cf.gtable.value == "") {
		alert("게시판 테이블을 새로 생성하시려면 테이블 명을 입력해 주세요");
		cf.gtable.focus();
		return false;
	}
	if(cf.name.value == "") {
		alert("게시판이름을 입력해 주세요");
		cf.name.focus();
		return false;
	}

	if(!CheckBoxRadioCheck(cf.group_type,"운영방식을 선택해주세요")) return false
		if(!CheckBoxRadioCheck(cf.popup,"팝업설정을 선택해 주세요")) return false
}

function gtableSet(gform,gtable) {
		gform.gtable.value=gtable;

	if(gtable=="") gform.gtable.readOnly = false;
		else gform.gtable.readOnly = true;
	}

	function cate_view(catenum){
	cate1.style.display = "none";
	cate2.style.display = "none";
	cate3.style.display = "none";


	for(i=1;i<=catenum;i++)
		eval("cate"+i+".style.display = 'block'");

}

var group_member_list_search=""; //검색어
var group_member_list_viewfield=""; //보여지는필드네임
var board_no="<?=$no?>";


	$(document).ready(function(){
		$('#cate_num').change(function(){
			$('.cate_nums').hide();
			for(var i=1;i<=$(this).val();i++){
				$('#cate'+i).show();
			}
		});
	});

	/*게시판 이용권한 toggle*/
	function use_view(useauth){ if (useauth != 10){ $('#use_config1, #use_config2').show(); }else{ $('#use_config1, #use_config2').hide(); } }

</script>

<div id='admin_sub_wrap'>
	<h2>게시판 등록</h2>

	<form name="bcform" method="post" action="<?=$PHP_SELF?>" Onsubmit="return formCheck(this)">
	<?if($m2!="configinsertdb") {?><input type="hidden" name="gtable" value="<?=$gtable?>"><?}?>
	<input type="hidden" name="group" value="<?=$group?>">
	<input type="hidden" name="m1" value="<?=$m1?>">
	<input type="hidden" name="m2" value="<?=$m2?>">
	<input type="hidden" name="no" value="<?=$no?>">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<p class='desc'><strong>기본정보</strong></p>
	<table class='admin_table_type2' summary='게시판 등록 - 기본정보'>
		<caption>기본정보</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
		<tbody>
			<?if($m2=="configinsertdb") {?>
			<tr>
				<th>그룹구분</th>
				<td colspan='3'>
					<input name="gtable" type="text" id="gtable" class="text1" value="<?=$gtable?>" readonly>
					<?
					$SQL = "select gtable from amsolution_group group by gtable";
					$gresult = mysql_query($SQL,$connect);
					?>
					&nbsp;&nbsp;
					테이블선택:
					<select name="sgtable" id="sgtable" class="input" OnChange="gtableSet(bcform,this.options[this.selectedIndex].value)">
					<option value="">테이블생성</option>
					<? while($grow=mysql_fetch_array($gresult)) { ?>
					<option value="<?=$grow[gtable]?>" <?if($row[gtable] == $grow[gtable]) echo "selected";?>><?=$grow[gtable]?></option>
					<? } ?>
					</select>
				</td>
			</tr>
			<? } ?>
			<tr>
				<th>게시판 코드</th>
				<td><input name="code_tmp" type="text" class="text1" id="code_tmp" value="<?=$code?>" <? if($m2=="configupdatedb"){ echo "readonly";}?>></td>
				<th>게시판 이름</th>
				<td><input name="name" type="text" class="text1" id="name" value="<?=$name?>"></td>
			</tr>
			<tr>
				<th>스킨 선택</th>
				<td>
					<?$dirarray = dirList($DROOT."/".$INDIR."/mpboard/skin/");?>
					<select name="skin" id="skin" class="input">
					<?if(is_array($dirarray)) while(list($key, $value)=each($dirarray)) {?>
					<option value="<?=$value?>" <?if($skin == $value) echo "selected";?>><?=$value?></option>
					<?}?>
					</select>
				</td>
				<th>기능 구분</th>
				<td>
					<input name="kind" type="radio" id="kind" value="" <?if($kind=="") echo "checked"?> onclick="javascript:document.getElementById('diary_config').style.display='none';document.getElementById('list_config').style.display='';
					document.getElementById('inquire_config').style.display='none';"> 일반게시판 방식 &nbsp;
					<input name="kind" type="radio" id="kind" value="counsel" <?if($kind=="counsel") echo "checked"?> onclick="document.getElementById('diary_config').style.display='none';document.getElementById('inquire_config').style.display='none';document.getElementById('list_config').style.display='';"> 상담게시판 방식 &nbsp;<br />
					<input name="kind" type="radio" id="kind" value="diary" <?if($kind=="diary") echo "checked"?> onclick="	document.getElementById('diary_config').style.display='';document.getElementById('list_config').style.display='none';document.getElementById('inquire_config').style.display='none';">일정관리 방식
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="kind" type="radio" id="kind" value="inquire" <?if($kind=="inquire") echo "checked"?> onclick="	document.getElementById('diary_config').style.display='none';document.getElementById('inquire_config').style.display='';">문의사항
					방식<img src="/<?=$INDIR?>/admin/img/ihelp.gif" align="absmiddle" border="0" style="cursor:hand" Onclick="layerinfox('생성되는 게시판이 일반게시판이 아닌 문의사항용으로 사용할때를 말합니다. <br><br>문의사항 방식으로 설정할경우 관리자외의 일반 사용자는 글쓰기 폼만 나타나며, 관리자만 일반 게시판 처럼 리스트와 내용 보기가 가능합니다. <br><br>만일 관리자가 문의사항 게시물에 답변을 하게 되면, 문의자가 문의사항 등록시에 입력한 이메일로 답변 내용이 자동 메일이 발송됩니다.<br><br><font color=\'#CC3300\'>※ 주의 : 이때 사용되는 게시판에서 이메일은 필수 입력으로 설정되야 합니다.</font>','divlayerinfo')">&nbsp;
				</td>
			</tr>

			<!--<tr>
				<th>추가 정보</th>
				<td colspan="3">

					<span id="inquire_config" style="display:<?if($kind=="inquire"){?><?}else{?>none<?}?>">
					<table width="100%" align="center">
						<tr>
							<td width="120" align="center" bgcolor="#F6FAFC" class="type">글작성 완료시 <br />메세지 설정</td>
							<td class="type2">글 작성 완료 시 보여질 alert 창 메세지를 입력하여 주세요 <br>
								<textarea name="inquire_ment" cols="50%"><?=$inquire_ment?></textarea>
							</td>
						</tr>
					</table>
					</span>

					<span id="diary_config" style="display:<?if($kind=="diary"){?><?}else{?>none<?}?>">
					<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" bordercolordark="white"  class="type2" align="center">
						<tr>
							<td width="120" align="center" bgcolor="#F6FAFC" class="type">운영방식 설정	 </td>
							<td class="type2">
								<input type="radio" name="group_type" value="0" <?if($row1[group_type]=="0"){?> checked<?}?>>전체
								<input type="radio" name="group_type" value="1" <?if($row1[group_type]=="1"){?> checked<?}?>>그룹
							</td>
						</tr>
						<tr>
							<td width="120" align="center" bgcolor="#F6FAFC" class="type">그룹원설정</td>
							<td class="type2">
								콤마(,)로 구분하여 아이디를 작성해 주세요 예)admin,master<br>
								<textarea name="group_list" cols="80%"><?=$row1[group_list]?></textarea>
								<a style="cursor:hand" onclick="javascript:popUpWindow('/<?=$INDIR?>/mpboard/admin/diary_group_add.php?gcode=<?=$gcode?>','diary_group', '500','500','yes' ,'yes', 'yes','yes')">추가</a>

							</td>

						</tr>
						<tr>
							<td width="120" align="center" bgcolor="#F6FAFC" class="type">팝업설정</td>
							<td class="type2">
								<input type="radio" name="popup" <?if($row1[popup]=="1"){?>checked<?}?> value="1">주요글 팝업띄움
								<input type="radio" name="popup" <?if($row1[popup]=="0"){?>checked<?}?> value="0">주요글 팝업띄우지 않음&nbsp;&nbsp;<font color="blue">(팝업은 일정하루전부터 띄워집니다.)</font>
							</td>
						</tr>
						<tr>
							<td width="120" align="center" bgcolor="#F6FAFC" class="type">기념일 설정</td>
							<td class="type2">
								<input type="radio" name="birth" <?if($row1[birth]=="1"){?>checked<?}?> value="1">기념일 리스트출력
								<input type="radio" name="birth" <?if($row1[birth]=="0"){?>checked<?}?> value="0">기념일 리스트출력하지 않음
							</td>
						</tr>
					</table>
					</span>

				</td>
			</tr>-->



		</tbody>
	</table>

	<p class='desc'><strong>리스트정보</strong></p>
	<table class='admin_table_type2' summary='게시판 등록 - 리스트정보'>
		<caption>리스트정보</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
		<tbody>
			<tr>
				<th>페이지 목록</th>
				<td><input name="list_num" type="text" class="text2" id="list_num" value="<?=$list_num?>"></td>
				<th>페이지 그룹</th>
				<td><input name="page_num" type="text" class="text2" id="page_num" value="<?=$page_num?>"></td>
			</tr>
			<!--<tr>
				<th>제목글 자르기</th>
				<td><input name="cut_width" type="text" class="text2" id="cut_width" value="<?=$cut_width?>"> (0 일경우 자르지 않음)</td>
				<th>내용 자르기</th>
				<td><input name="contents_cut_width" type="text" id="contents_cut_width" value="<?=$contents_cut_width?>" class="text2"></td>
			</tr>
			<tr>
				<th>리스트 항목</th>
				<td colspan='3'>
					<input name="list_no" type="checkbox" id="list_no" value="1" <?if($list_no == "1" or $list_no == '') echo "checked"?>> 번호<span class='blank'></span>
					<input name="list_title" type="checkbox" id="list_title" value="1" <?if($list_title == "1" or $list_title == '') echo "checked"?>> 제목<span class='blank'></span>
					<input name="list_writer" type="checkbox" id="list_writer" value="1" <?if($list_writer  == "1" or $list_writer  == '') echo "checked"?>> 작성자<span class='blank'></span>
					<input name="list_date" type="checkbox" id="list_date" value="1" <?if($list_date == "1") echo "checked"?>> 날짜<span class='blank'></span>
					<input name="list_recom" type="checkbox" id="list_recom" value="1" <?if($list_recom == "1") echo "checked"?>> 답변여부<span class='blank'></span>
					<input name="list_hit" type="checkbox" id="list_hit" value="1" <?if($list_hit == "1") echo "checked"?>> 조회수<span class='blank'></span>
					<input name="list_open" type="checkbox" id="list_open" value="1" <?if($list_open == "1") echo "checked"?>> 공개여부<span class='blank'></span>
					<input name="list_stay" type="checkbox" id="list_stay" value="1" <?if($list_stay == "1") echo "checked"?>> 지점
				</td>
			</tr>-->
			<tr>
				<th>리스트 정렬</th>
				<td colspan='3'>
					<input name="sort_check" type="checkbox" id="sort_check" value="1" <?if($sort_check == "1") echo "checked"?>> 사용
					<span class='blank'>|</span>
					항목 :
					<select name="sort_item" id="sort_item" class="input">
					<option value="no" <?if($sort_item == "no") echo "selected"?>>번호</option>
					<option value="category" <?if($sort_item == "category") echo "selected"?>>카테고리</option>
					<option value="name" <?if($sort_item == "name") echo "selected"?>>이름</option>
					<option value="userid" <?if($sort_item == "userid") echo "selected"?>>아이디</option>
					<option value="title" <?if($sort_item == "title") echo "selected"?>>제목</option>
					<option value="view" <?if($sort_item == "view") echo "selected"?>>조회수</option>
					<option value="wdate" <?if($sort_item == "wdate") echo "selected"?>>날짜</option>
					</select>
					<span class='blank'></span>
					순서 :
					<select name="sort_order" id="sort_order" class="input">
					<option value="desc" <?if($sort_order == "desc") echo "selected"?>>내림차순</option>
					<option value="asc" <?if($sort_order == "asc") echo "selected"?>>올림차순</option>
					</select>
				</td>
			</tr>
			<!--
			<tr>
				<th>자료/포인트 표시</th>
				<td colspan='3'><input type="checkbox" name="upload_listview" value="1" <?if($upload_listview == "1") echo "checked"?>> / <input name="point_listview" type="checkbox" id="point_listview" value="1" <?if($point_listview == "1") echo "checked"?>></td>
			</tr>
			-->
		</tbody>
	</table>

	<p class='desc'><strong>권한설정</strong></p>
	<table class='admin_table_type2' summary='게시판 등록 - 권한설정'>
		<caption>권한설정</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
		<tbody>
			<tr>
				<th>게시판 승인여부</th>
				<td>
					<input name="run" type="radio" value="y" <?if($run=="y" || !$run) echo "checked";?>>
					승인
					&nbsp;&nbsp;
					<input name="run" type="radio" value="n" <?if($run=="n") echo "checked";?>>
					비승인
					&nbsp;&nbsp;
					<input name="run" type="radio" value="s" <?if($run=="s") echo "checked";?>>
					정지
				</td>
				<th>게시물 승인여부</th>
				<td>
					<input name="vstate" type="radio" value="1" <?if($vstate=="1" || !$vstate) echo "checked";?>>
					기본 승인
					&nbsp;&nbsp;
					<input name="vstate" type="radio" value="0" <?if($vstate=="0") echo "checked";?>>
					기본 비승인
					&nbsp;&nbsp;<br>
				</td>
			</tr>
			<tr>
				<th>게시판 이용권한</th>
				<td>
					<select name="use_auth" id="use_auth" class="input" onchange="use_view(this.value)">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($use_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($use_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
				<th>관리 권한</th>
				<td>
					<select name="manage_auth" id="manage_auth" class="input">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($manage_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($manage_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
			</tr>
			<tr id='use_config1' style='display:<?=$use_auth < 10 ? "block" : "none" ;?>;'>
				<th><strong class='red'>* 이용권한</strong></th>
				<td>
					<strong class='blue'>레벨이하 접근시 메세지</strong>를 입력<br>
					<textarea name="useauth_ment" class='area1'><?=$useauth_ment?></textarea>
				</td>
				<th><strong class='red'>* 로그인 필요시</strong></th>
				<td>
					<strong class='blue'>이동전 알림메세지</strong>를 입력<br>
					<textarea name="useauth_login_ment" class='area1'><?=$useauth_login_ment?></textarea>
				</td>
			</tr>
			<tr id='use_config2' style='display:<?=$use_auth < 10 ? "block" : "none" ;?>;'>
				<th><strong class='red'>* 로그인 필요시</strong></th>
				<td colspan='3'>
					<strong class='blue'>로그인페이지 경로</strong>를 입력 (기본 회원경로는 웹: /member/, 모바일: /m/member/ 입니다.)<br>
					<input type="text" id="useauth_addr"  name="useauth_addr" class='text3' value="<?=$useauth_addr?>">
				</td>
			</tr>
			<tr>
				<th>글쓰기 권한</th>
				<td>
					<select name="write_auth" id="write_auth" class="input">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($write_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($write_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
				<th>글보기 권한</th>
				<td>
					<select name="view_auth" id="view_auth" class="input">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($view_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($view_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>답변글 권한</th>
				<td>
					<select name="rewrite_auth" id="rewrite_auth" class="input">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($rewrite_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($rewrite_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
				<th>코멘트 권한</th>
				<td>
					<select name="comment_auth" id="comment_auth" class="input">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($comment_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($comment_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>글점수 권한</th>
				<td>
					<select name="point_auth" id="point_auth" class="input">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($point_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($point_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
				<th>업로드 권한</th>
				<td>
					<select name="upload_auth" id="upload_auth" class="input">
					<?
					$SQL = "select * from ammember_level where 1 order by level asc";
					$result = mysql_query($SQL,$connect);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row[level]?>" <?if($upload_auth == "$row[level]") echo "selected";?>><?=$row[name]?></option>
					<? } ?>
					<option value="10" <?if($upload_auth == "10") echo "selected";?>>비회원</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>

	<p class='desc'><strong>분류설정</strong></p>
	<table class='admin_table_type2' summary='게시판 등록 - 분류설정'>
		<caption>분류설정</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
		<tbody>
			<tr>
				<th>분류 갯수</th>
				<td>
					<select name="cate_num" id='cate_num'>
					<option value="0">미사용
					<option value="1" <? if($cate_num == "1") { echo "selected"; } ?>>1
					<option value="2" <? if($cate_num == "2") { echo "selected"; } ?>>2
					<option value="3" <? if($cate_num == "3") { echo "selected"; } ?>>3
					</select>
				</td>
				<th>카테고리 사용</th>
				<td>
					<input name="category" type="checkbox" id="category" value="1" <?if($category == "1") echo "checked"?>>
				</td>
			</tr>
			<tr id="cate1" class='cate_nums' style='display:<?=$cate_num >=1 ? "block" : "none" ;?>;'>
				<th><strong class='red'>* 분류 세부설정 1</strong></th>
				<td colspan='3'>
					<input name="cate1_name" type="text" class="text2" id="cate1_name" value="<?=$cate1_name?>">
					<input name="cate1_item" type="text" class="text5" id="cate1_item"value="<?=$cate1_item?>" size="50"> <font color='red'>*</font> | 로 구분
				</td>
			</tr>
			<tr id="cate2" class='cate_nums' style='display:<?=$cate_num >=2 ? "block" : "none" ;?>;'>
				<th><strong class='red'>* 분류 세부설정 2</strong></th>
				<td colspan='3'>
					<input name="cate2_name" type="text" class="text2" id="cate2_name" value="<?=$cate2_name?>">
					<input name="cate2_item" type="text" class="text5" id="cate2_item" value="<?=$cate2_item?>" size="50"> <font color='red'>*</font> | 로 구분
				</td>
			</tr>
			<tr id="cate3" class='cate_nums' style='display:<?=$cate_num >=3 ? "block" : "none" ;?>;'>
				<th><strong class='red'>* 분류 세부설정 3</strong></th>
				<td colspan='3'>
					<input name="cate3_name" type="text" class="text2" id="cate3_name" value="<?=$cate3_name?>">
					<input name="cate3_item" type="text" class="text5" id="cate3_item" value="<?=$cate3_item?>" size="50"> <font color='red'>*</font> | 로 구분
				</td>
			</tr>
		</tbody>
	</table>

	<p class='desc'><strong>기능설정</strong></p>
	<table class='admin_table_type2' summary='게시판 등록 - 기능설정'>
		<caption>기능설정</caption>
		<colgroup>
			<col style="width:150px;" />
			<col style="width:250px;" />
			<col style="width:150px;" />
			<col style="width:250px;" />
		</colgroup>
		<tbody>
			<tr>
				<th>파일 업로드/다운로드</th>
				<td>
					<input name="upload_state" type="checkbox" id="upload_state" value="1" <?if($upload_state == "1") echo "checked"?>>
					 <input name="upload_num" type="text" class="text2" id="upload_num" value="<?=$upload_num?>">
					개 업로드 <span class='blank'></span> <input name="download_state" type="checkbox" id="download_state" value="1" <?if($download_state == "1") echo "checked"?>> 표시
				</td>
				<th>이미지파일뷰</th>
				<td>
					<input name="img_view" type="checkbox" id="img_view" value="1" <?if($img_view == "1") echo "checked"?>><span class='blank'></span>게시물 내용에표시
				</td>
			</tr>
			<tr>
				<th>용량제한</th>
				<td colspan='3'>
					게시판 최대용량 : <input name="upload_btsize" type="text" class="text4" id="upload_btsize" size="5" value="<?=$upload_btsize?>"> MB<span class='blank'>|</span>게시물 최대용량 : <input name="upload_bwsize" type="text" class="text4" id="upload_bwsize" size="5" value="<?=$upload_bwsize?>"> MB<span class='blank'>|</span>업로드 최대용량 : <input name="upload_size" type="text" class="text4" id="upload_size" size="5" value="<?=$upload_size?>"> MB					  <span class='blank'></span><strong class='red'>(* 0 은 무제한)</strong>
				</td>
			</tr>
			<!-- <tr>
				<th>네이버 신디케이션</th>
				<td colspan='3'>
					<input name="naver_syndi" type="checkbox" value="Y"  <?if($naver_syndi == "Y") echo "checked"?>> 사용 / 경로 : <input name="naver_syndi_path" type="text" class="text5" id="naver_syndi_path" size="50" value="<?=$naver_syndi_path?>"> 도메인뒤 부터 입력해주세요 예) /01_info/counsel01.html
				</td>
			</tr> -->
			<tr>
				<th>코멘트/포인트 사용</th>
				<td>
					<input name="comment" type="checkbox" id="comment" value="1" <?if($comment == "1") echo "checked"?>><span class='blank'>/</span><input name="point" type="checkbox" id="point" value="1" <?if($point == "1") echo "checked"?>>
				</td>
				<th>관리자 날짜 / 조회수 변경 </th>
				<td>
					<input name="date_edit" type="checkbox" id="date_edit" value= "1" <?if($date_edit == "1") echo "checked"?>>
				</td>
			</tr>
			<tr>
				<th>작성시 알림 SMS</th>
				<td colspan='3'>
					<input name="write_confirm_sms_use" type="checkbox" id="write_confirm_sms_use" value="1" <?if($write_confirm_sms_use == "1") echo "checked"?>> 사용
					<span class='blank'>|</span><? if (($write_confirm_sms_use == "1") && ($SITE_INFO[sms_id]=="" || $SITE_INFO[sms_pwd]=="")){?><strong  class="red">SMS 접속정보가 필요합니다.</strong><?} ?>&nbsp;번호:&nbsp;<input name="write_confirm_sms_num" type="text" class="text5" id="write_confirm_sms_num" value="<?=$write_confirm_sms_num?>" size="50"><!-- <input name="write_confirm_sms_num" type="text" class="text2" id="write_confirm_sms_num" value="<?=$write_confirm_sms_num?>" onkeyup="if(this.value.match(/[^0-9]/)) { window.alert('숫자만 입력하세요'); this.value = ''; return false; };" size="50"> --><br>(SMS수신받을 번호를 입력하세요), 여러사람일경우 * | 로 구분
				</td>
			</tr>
			<tr>
				<th>답변시 알림 SMS</th>
				<td>
					<input name="sms_use" type="checkbox" id="sms_use" value="1" <?if($sms_use == "1") echo "checked"?>> 사용
				</td>
				<th><font color="red">상담 및 견적리스트사용</font></th>
				<td>
					<input name="specail_board" type="checkbox" id="specail_board" value="1" <?if($specail_board == "1") echo "checked"?>> 사용
				</td>
			</tr>
			<tr>
				<th>RSS 여부</th>
				<td>
					<input name="rssopen" type="checkbox" id="rssopen" value="1" <?if($rssopen == "1") echo "checked"?>><span class='blank'></span>
					제공 게시물 수 : <input name="rsscount" type="text" id="rsscount" value="<?=$rsscount?>" class="text4" size="3"> 개
				</td>
				<th>공개/비공개</th>
				<td>
					<input type="radio" name="secret_type" value="0" <?if($secret_type == "0" || $secret_type == ""){?> checked<?}?>> 공개<span class='blank'></span>
					<input type="radio" name="secret_type" value="1" <?if($secret_type == "1"){?> checked<?}?>> 선택<span class='blank'></span>
					<input type="radio" name="secret_type" value="2" <?if($secret_type == "2"){?> checked<?}?>> 비공개
				</td>
			</tr>
			<tr>
				<th>웹에디터</th>
				<td>
					<input name="editmode" type="checkbox" id="editmode" value="webedit" <?if($editmode == "webedit") echo "checked"?>> 웹에디터 사용<br>
					<input name="editpicup" type="checkbox" id="editpicup" value="yes" <?if($editpicup == "yes") echo "checked"?>> 사진업로드 지원<br>
					<input name="editpicmanage" type="checkbox" id="editpicmanage" value="yes" <?if($editpicmanage == "yes") echo "checked"?>> 이미지관리 지원
				</td>
				<th>스팸글 방지</th>
				<td>
					<input name="auth_code_board_state" type="checkbox" id="auth_code_board_state" value="Y" <?if($auth_code_board_state == "Y") echo "checked"?>> 게시물 글쓰기 스팸글 방지
					<br>
					<input name="auth_code_comment_state" type="checkbox" id="auth_code_comment_state" value="Y" <?if($auth_code_comment_state == "Y") echo "checked"?>> 코멘트 글쓰기 스팸글 방지
				</td>
			</tr>
		</tbody>
	</table>

	<ul class='admin_btn_list'>
		<li><div class='btn_type1'><a href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=list">취 소</a></div></li>
		<? if($m2 == "configinsertdb") { ?>
		<li><input type='image' src='./img/comm/admin_cfm_btn.gif' alt='등록'></li>
		<? }else{ ?>
		<li><input type='image' src='./img/comm/admin_mod_btn.gif' alt='수정'></li>
		<? } ?>
	</ul>
	</form>

</div>