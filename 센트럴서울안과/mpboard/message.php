<?
switch ($msgmode) {
	
	case "run_n" :
		?>
		<script>
		alert("비승인 상태의 게시판 입니다.");
		</script>
		<?
	break;
	
	case "run_s" :
		?>
		<script>
		alert("운영 정지중인 게시판 입니다.");
		</script>
		<?
	break;
	
}
?>