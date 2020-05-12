<?
/*
// GET 방식 접근을 막는다.
if ($REQUEST_METHOD!="POST") {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}
*/
$passwdobj = new amboardPasswd($connect);
$passwdobj->addpara = $addpara;			// 추가적으로 파라메타가 필요한 경우

switch ($abmode) {
	case "commentmodifypasswd" :
		// 페스워드 확인 객체 생성
		
		$passwdobj->init();
		$passwdcheck = $passwdobj->passwdCheck($passwd,"comment",$writeuserid);
		if($passwdcheck) {
			?>
			<form name="passwdform" action="<?=$PHP_SELF?>#commentwriteform" method="post">
		    <input type="hidden" name="group" value="<?=$group?>">
		    <input type="hidden" name="code" value="<?=$code?>">
		    <input type="hidden" name="category" value="<?=$category?>">
		    <input type="hidden" name="sno" value="<?=$sno?>">
		    <input type="hidden" name="no" value="<?=$no?>">
		    <input type="hidden" name="cno" value="<?=$cno?>">
		    <input type="hidden" name="field" value="<?=$field?>">
		    <input type="hidden" name="search" value="<?=$search?>">
		    <input type="hidden" name="abmode" value="commentmodifyview">
		    <input type="hidden" name="acmode" value="commentupdate">
	    	<input type="hidden" name="bsort" value="<?=$bsort?>">
	    	<input type="hidden" name="bfsort" value="<?=$bfsort?>">
		    <?
		    $linkarray = explode("&",$passwdobj->addpara);
		    if(is_array($linkarray)) foreach ($linkarray as $linkdata) {
		    	$linkdataarray = explode("=",$linkdata);
		    ?>
		    <input type="hidden" name="<?=$linkdataarray[0]?>" value="<?=$linkdataarray[1]?>">
		    <?	
		    }
		    ?>
			</form>
			<script>
				document.passwdform.submit();
			</script>
			<?
		} else {
			?>
			<script>
			alert("비밀번호가 잘못되었습니다.");
			history.back(-1);
			</script>
			<?
		}
	break;
	
	case "commentdelpasswd" :
		// 페스워드 확인 객체 생성
		
		$passwdobj->init();
		$passwdcheck = $passwdobj->passwdCheck($passwd,"comment",$writeuserid);
		if($passwdcheck) {
			?>
			<form name="passwdform" action="<?=$PHP_SELF?>" method="post">
		    <input type="hidden" name="group" value="<?=$group?>">
		    <input type="hidden" name="code" value="<?=$code?>">
		    <input type="hidden" name="category" value="<?=$category?>">
		    <input type="hidden" name="sno" value="<?=$sno?>">
		    <input type="hidden" name="no" value="<?=$no?>">
		    <input type="hidden" name="cno" value="<?=$cno?>">
		    <input type="hidden" name="field" value="<?=$field?>">
		    <input type="hidden" name="search" value="<?=$search?>">
		    <input type="hidden" name="abmode" value="commentdelete">
	    	<input type="hidden" name="bsort" value="<?=$bsort?>">
	    	<input type="hidden" name="bfsort" value="<?=$bfsort?>">
		    <?
		    $linkarray = explode("&",$passwdobj->addpara);
		    if(is_array($linkarray)) foreach ($linkarray as $linkdata) {
		    	$linkdataarray = explode("=",$linkdata);
		    ?>
		    <input type="hidden" name="<?=$linkdataarray[0]?>" value="<?=$linkdataarray[1]?>">
		    <?	
		    }
		    ?>
			</form>
			<script>
				document.passwdform.submit();
			</script>
			<?
		} else {
			?>
			<script>
			alert("비밀번호가 잘못되었습니다.");
			history.back(-1);
			</script>
			<?
		}
	break;

	case "boardmodifypasswd" :
		// 페스워드 확인 객체 생성
		
		$passwdobj->init();
		$passwdcheck = $passwdobj->passwdCheck($passwd,"board",$writeuserid);
		if($passwdcheck) {
			?>
			<form name="passwdform" action="<?=$PHP_SELF?>" method="post">
		    <input type="hidden" name="group" value="<?=$group?>">
		    <input type="hidden" name="code" value="<?=$code?>">
		    <input type="hidden" name="category" value="<?=$category?>">
		    <input type="hidden" name="sno" value="<?=$sno?>">
		    <input type="hidden" name="no" value="<?=$no?>">
		    <input type="hidden" name="field" value="<?=$field?>">
		    <input type="hidden" name="search" value="<?=$search?>">
		    <input type="hidden" name="abmode" value="modify">
	    	<input type="hidden" name="bsort" value="<?=$bsort?>">
	    	<input type="hidden" name="bfsort" value="<?=$bfsort?>">
	    	<input type="hidden" name="cate1" value="<?=$cate1?>">
	    	<input type="hidden" name="cate2" value="<?=$cate2?>">
	    	<input type="hidden" name="cate3" value="<?=$cate3?>">
		    <?
		    $linkarray = explode("&",$passwdobj->addpara);
		    if(is_array($linkarray)) foreach ($linkarray as $linkdata) {
		    	$linkdataarray = explode("=",$linkdata);
		    ?>
		    <input type="hidden" name="<?=$linkdataarray[0]?>" value="<?=$linkdataarray[1]?>">
		    <?	
		    }
		    ?>
			</form>
			<script>
				document.passwdform.submit();
			</script>
			<?
		} else {
			?>
			<script>
			alert("비밀번호가 잘못되었습니다.");
			history.back(-1);
			</script>
			<?
		}
	break;

	case "boarddelpasswd" :
		// 페스워드 확인 객체 생성
		
		$passwdobj->init();
		$passwdcheck = $passwdobj->passwdCheck($passwd,"board",$writeuserid);
		if($passwdcheck) {
			?>
			<form name="passwdform" action="<?=$PHP_SELF?>" method="post">
		    <input type="hidden" name="group" value="<?=$group?>">
		    <input type="hidden" name="code" value="<?=$code?>">
		    <input type="hidden" name="category" value="<?=$category?>">
		    <input type="hidden" name="sno" value="<?=$sno?>">
		    <input type="hidden" name="no" value="<?=$no?>">
		    <input type="hidden" name="field" value="<?=$field?>">
		    <input type="hidden" name="search" value="<?=$search?>">
		    <input type="hidden" name="abmode" value="deletedb">
	    	<input type="hidden" name="bsort" value="<?=$bsort?>">
	    	<input type="hidden" name="bfsort" value="<?=$bfsort?>">
		    <?
		    $linkarray = explode("&",$passwdobj->addpara);
		    if(is_array($linkarray)) foreach ($linkarray as $linkdata) {
		    	$linkdataarray = explode("=",$linkdata);
		    ?>
		    <input type="hidden" name="<?=$linkdataarray[0]?>" value="<?=$linkdataarray[1]?>">
		    <?	
		    }
		    ?>
			</form>
			<script>
				document.passwdform.submit();
			</script>
			<?
		} else {
			?>
			<script>
			alert("비밀번호가 잘못되었습니다.");
			history.back(-1);
			</script>
			<?
		}
	break;
	
	
	case "boardsecretpasswd" :
		// 페스워드 확인 객체 생성
		
		$passwdobj->init();
		$passwdcheck = $passwdobj->passwdCheck($passwd,"board",$writeuserid);
		if($passwdcheck) {
			?>
			<form name="passwdform" action="<?=$PHP_SELF?>" method="post">
		    <input type="hidden" name="group" value="<?=$group?>">
		    <input type="hidden" name="code" value="<?=$code?>">
		    <input type="hidden" name="category" value="<?=$category?>">
		    <input type="hidden" name="sno" value="<?=$sno?>">
		    <input type="hidden" name="no" value="<?=$no?>">
		    <input type="hidden" name="field" value="<?=$field?>">
		    <input type="hidden" name="search" value="<?=$search?>">
		    <input type="hidden" name="abmode" value="view">
	    	<input type="hidden" name="bsort" value="<?=$bsort?>">
	    	<input type="hidden" name="bfsort" value="<?=$bfsort?>">
	    	<input type="hidden" name="secret" value="<?=$passwd?>">
		    <?
		    $linkarray = explode("&",$passwdobj->addpara);
		    if(is_array($linkarray)) foreach ($linkarray as $linkdata) {
		    	$linkdataarray = explode("=",$linkdata);
		    ?>
		    <input type="hidden" name="<?=$linkdataarray[0]?>" value="<?=$linkdataarray[1]?>">
		    <?	
		    }
		    ?>
			</form>
			<script>
				document.passwdform.submit();
			</script>
			<?
		} else {
			?>
			<script>
			alert("비밀번호가 잘못되었습니다.");
			history.back(-1);
			</script>
			<?
		}
	break;
	
	default:
		
	break;
}
?>