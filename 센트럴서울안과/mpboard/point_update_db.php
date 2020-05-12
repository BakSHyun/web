<?
// 외부에서의 접근을 막는다.
if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}
	
	// 포인트 객체 생성
	$bpointobj = new amboardPoint($connect);
	$bpointobj->addpara = $addpara;			// 추가적으로 파라메타가 필요한 경우
	$bpointobj->init();
	

	if($sql=$bpointobj->update()) {
		msgback("추천하셨습니다.");
	} else {
		msgback("이미 추천하시 게신물 입니다.");
	}
	
	
	echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?sno=$sno&group=$group&code=$code&category=$category&abmode=view&no=$no&$bpointobj->searchpara&$bpointobj->addpara\">";
?>