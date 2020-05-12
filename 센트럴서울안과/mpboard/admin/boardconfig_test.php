<!DOCTYPE html>
<html lang='ko'>
<head>
<meta name="Robots" content="noindex,nofollow,noimageindex,noarchive">
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta charset='utf-8'/>
<title>::::::::: 관리자 모드 :::::::::</title>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script>
function formCheck(cf){
	alert('1');
	if(cf.gtable.value == "") {
		alert("게시판 테이블을 새로 생성하시려면 테이블 명을 입력해 주세요");
		cf.gtable.focus();
		return false;
	}
	alert('2');
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
var board_no=<?=$no?>;


$(document).ready(function(){
$('#cate_num').change(function(){
$('.cate_nums').hide();
for(var i=1;i<=$(this).val();i++){
$('#cate'+i).show();
}
});
});

/*게시판 이용권한 toggle*/
function use_view(useauth){
if (useauth != 10){
	$('#use_config1, #use_config2').show();
}
else{
	$('#use_config1, #use_config2').hide();
}
}

</script>

<div id='admin_sub_wrap'>
	<h2>게시판 등록</h2>

	<form name="bcform" method="post" action="<?=$PHP_SELF?>" Onsubmit="return formCheck()">


	<ul class='admin_btn_list'>
		<li><div class='btn_type1'><a href="<?=$PHP_SELF?>?group=<?=$group?>&m1=<?=$m1?>&m2=list">취 소</a></div></li>
		<li><input type='image' src='./img/comm/admin_cfm_btn.gif' alt='등록'></li>
	</ul>
	</form>

</div>
