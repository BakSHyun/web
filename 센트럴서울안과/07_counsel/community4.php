<? include "../inc/head.php" ?>
<style>
#bbs_list_wrap { width: 1200px !important;   margin: 10px auto !important;}  
</style>
<div class="sub_wrap">
	<div class="pagenavi">HOME > 커뮤니티 > <strong>채용안내</strong></div>
	<? include "../inc/left.php" ?>
<?

if(!$group) $group = "basic";

if(!$code) $code = "community04";

include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";

?>



</div>

<? include "../inc/foot.php" ?>