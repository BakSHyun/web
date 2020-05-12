<? include "../inc/head.php" ?>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 고객센터 > <strong>로그인</strong></div>
	<? include "../inc/left.php" ?>
			
	<div class="sub_cnt">	
	<img src="../img/board/board_img07.jpg" alt="회원가입" />
	<div class="" style="width:700px;margin:0 auto; ">
<?

if(!$group) $group = "basic";

if(!$skin) $skin = "default_big_hong"; //해당 스킨명 입력

if(!$retuen_mode) $retuen_mode = "1"; // 로그인후 이동페이지 설정 -> 0 일경우 현재페이지 리플래쉬, 1 일경우 이전페이지로 이동

if(!$joinpage) $joinpage = "/member/join.php"; // 회원가입 페이지 주소를 입력

if(!$modifypage) $modifypage = "/member/edit.php"; // 회원정보수정 페이지 주소를 입력

if(!$idpwsearchpage) $idpwsearchpage = "/member/idpw.php"; // 회원정보찾기 페이지 주소를 입력

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/ammember/login.php";

?>
</div>
	</div>
</div>
<? include '../inc/foot.php' ?>
