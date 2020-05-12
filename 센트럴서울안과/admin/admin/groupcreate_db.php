<?
require_once $BROOT."/inc/create_sql.php";

if($asgmode == "delete") {

	$dir = "/mpboard/upload/";

	$fileobj = new fileManager($connect,$tablename,$dir);

	// amboard_config 에 데이타가 없을경우 해당 테이블을 찾아 데이타가없을시에 관련테이블을 삭제 한다.
	$SQL="select gcode,gtable from amsolution_group where no='".$gno."' ";
	$row = mysql_fetch_array(mysql_query($SQL,$connect));
	$group = $row[gcode];
	$gtable = $row[gtable];

	$SQL="select no,gtable,code from amboard_config where gcode='".$group."' and gtable='".$gtable."'";
	$result=mysql_query($SQL,$connect);
	while($row=mysql_fetch_array($result)) {
		$infos[opt1] = $code;
		$fileobj->tablename = "amboard_".$row[gtable]."_file";
		$fileobj->filedelete($infos);

		$SQL = "delete from amboard_".$row[gtable]."_comment where code='".$row[code]."'";
		mysql_query($SQL,$connect);

		$SQL = "delete from amboard_".$row[gtable]."_category where code='".$row[code]."'";
		mysql_query($SQL,$connect);

		$SQL = "delete from amboard_".$row[gtable]."_add where code='".$row[code]."'";
		mysql_query($SQL,$connect);

		$SQL = "delete from amboard_".$row[gtable]."_field where code='".$row[code]."'";
		mysql_query($SQL,$connect);

		$SQL = "delete from amboard_".$row[gtable]." where code='".$row[code]."'";
		mysql_query($SQL,$connect);

		/*
		$SQL="select code from amboard_".$row[gtable]."";
		$erow=mysql_fetch_array(mysql_query($SQL,$connect));
		if(!$erow) {	// 만일 삭제된 그룹에 존재하는 테이블이 없을경우 관련 테이블을 삭제 한다.
			$SQL = "drop table amboard_".$row[gtable]."_file ,amboard_".$row[gtable]."_comment, amboard_".$row[gtable]."_category, amboard_".$row[gtable]."_add, amboard_".$row[gtable]."_field, amboard_".$row[gtable]." ";
			mysql_query($SQL,$connect);
		}
		*/

	}

	// 해당 그룹정보 삭제
	$SQL="delete from amsolution_group where no='$gno' ";
	mysql_query($SQL,$connect);

	// 해당 그룹의 테이블 정보 삭제
	$SQL="delete from amboard_config where gtable='".$gtable."' and gcode='".$group."' ";
	mysql_query($SQL,$connect);

	// 해당 회원의 그룹을 미지정으로 변경한다.
	$SQL="update ammember set gcode='' where gcode='".$group."' ";
	mysql_query($SQL,$connect);


	// 그룹관리에 해당 테이블이 존재하지 않으면 관련 게시판 테이블을 삭제한다.
	$SQL="select gtable from amsolution_group where gtable='$gtable' ";
	$row = mysql_fetch_array(mysql_query($SQL,$connect));
	if(!$row) {
		$SQL = "drop table `amboard_".$gtable."_file` ,`amboard_".$gtable."_comment`, `amboard_".$gtable."_category`, `amboard_".$gtable."_add`, `amboard_".$gtable."_field`, `amboard_".$gtable."` ";
		mysql_query($SQL,$connect);
	}



	// 그룹관리에 그룹이 존재 하지 않으면 관련 회원그룹 정보도 지워준다.
	$SQL="select gtable from amsolution_group where gcode='$group' ";
	$row = mysql_fetch_array(mysql_query($SQL,$connect));
	if(!$row) {

		$SQL="delete from ammember_config where gcode='$group' ";
		mysql_query($SQL,$connect);

		$SQL="delete from ammember_level where gcode='$group' ";
		mysql_query($SQL,$connect);

		$SQL="delete from ammember_field  where gcode='$group' ";
		mysql_query($SQL,$connect);
	}


}

if($asgmode == "insert") {

	if(!ereg("^[a-zA-Z0-9_]+$", $group)) {

?>
<script>
alert("그룹코드는 공백없이 숫자영문 조합 으로만 가능합니다.");
history.back(-1);
</script>
<?
		exit;
	}


	if(!ereg("^[a-zA-Z0-9_]+$", $gtable)) {
?>
<script>
alert("그룹테이블은 공백없이 숫자영문 조합 으로만 가능합니다.");
history.back(-1);
</script>
<?
		exit;
	}


	if($gtable != $sgtable) {
		mysql_query($board_table,$connect);
		mysql_query($boardadd_table,$connect);
		mysql_query($boardcategory_table,$connect);
		mysql_query($boardcomment_table,$connect);
		mysql_query($boardfield_table,$connect);
		mysql_query($boardfile_table,$connect);
	}

	$SQL="insert into amsolution_group(gcode,gname,gtable) values('$group','$gname','$gtable') ";
	mysql_query($SQL,$connect);

	// 그룹이 추가될경우 회원의 그룹 설정도 추가
	$SQL="INSERT INTO `ammember_config` (`gcode`, `skin`, `title`, `html`, `agreement`, `impname`, `impid`, `baselevel`, `page_top_file`, `page_top_db`, `page_bottom_file`, `page_bottom_db`) VALUES('$group', 'default', '', '', '', '웹마스터,마스터,웹관리자,관리자,웹운영자,운영자,운영진,테스트', 'root,bin,daemon,adm,lp,sync,shutdown,halt,mail,news,uucp,operator,games,gopher,ftp,nobody,vcsa,mailnull,rpm,rpc,xfs,rpcuser,nfsnobody,nscd,ident,radvd,named,pcap,mysql,postgres,oracle,dba,sa,administrator,master,webmaster,operator,admin,sysadmin,test,guest,anonymous,sysop,moderator,www', 9, '', '', '', '')";
	mysql_query($SQL,$connect);

	//그룹이 추가될경우 회원가입폼설정도 추가

	$SQL="INSERT INTO `ammember_field` (`findex`, `gcode`, `mode`, `ftype`, `fname`, `fsize`, `fclass`, `fvalue`, `fitem`, `inputfield`, `inputvalue`, `formlayout`, `ftitle`, `state`) VALUES
	( 1, '$group', 'b', 'text', 'name', '10', 'input', '', '', '', '', '', '이름', '1'),
	( 2, '$group', 'b', 'text', 'jumin', '10', 'input', '', '', '', '', '', '', '1'),
	( 3, '$group', 'b', 'text', 'nicname', '10', 'input', '', '', '', '', '', '별명', '0'),
	( 4, '$group', 'b', 'text', 'id', '10', 'input', '', '', '', '', '', '아이디', '1'),
	( 5, '$group', 'b', 'password', 'pw', '10', 'input', '', '', '', '', '', '비밀번호', '1'),
	( 6, '$group', 'b', 'text', 'sex', '10', 'input', '', '', '', '', '', '성별', '0'),
	( 7, '$group', 'b', 'text', 'file1', '10', 'input', '', '', '', '', '', '공개사진', '0'),
	( 8, '$group', 'b', 'text', 'email', '10', 'input', '', '', '', '', '', '이메일', '1'),
	( 9, '$group', 'b', 'text', 'post', '10', 'input', '', '', '', '', '', '우편번호', '0'),
	( 10, '$group', 'b', 'text', 'address', '10', 'input', '', '', '', '', '', '주소', '0'),
	( 11, '$group', 'b', 'text', 'tel', '10', 'input', '', '', '', '', '', '전화번호', '2'),
	( 12, '$group', 'b', 'text', 'htel', '10', 'input', '', '', '', '', '', '헨드폰', '2'),
	( 13, '$group', 'b', 'text', 'office', '10', 'input', '', '', '', '', '', '회사명', '0'),
	( 14, '$group', 'b', 'text', 'opost', '10', 'input', '', '', '', '', '', '직장우편번호', '0'),
	( 15, '$group', 'b', 'text', 'oaddress', '10', 'input', '', '', '', '', '', '직장주소', '0'),
	( 16, '$group', 'b', 'text', 'otel', '10', 'input', '', '', '', '', '', '직장전화번호', '0'),
	( 17, '$group', 'b', 'textarea', 'etc', '10', 'input', '', '', '', '', '', '자기소개', '0'),
	( 18, '$group', 'b', 'checkbox', 'infomail', '10', '', '', '', '', '', '', '사이트 정보 메일수신', '1'),
	( 19, '$group', 'b', 'checkbox', 'admail', '10', '', '', '', '', '', '', '관련 광고 메일수신', '1'),
	( 20, '$group', 'b', 'checkbox', 'infoopen', '10', '', '', '', '', '', '', '개인정보 공개여부', '0'),
	( 21, '$group', 'a', 'select', 'etc1', '10', '', '', '', '', '강남|목동|노원|신림|잠실|신촌|분당|일산|평촌', '', '예비필드1', '1'),
	( 22, '$group', 'a', 'select', 'etc2', '10', '', '', '', '', '111111111111', '', '예비필드2', '1'),
	( 23, '$group', 'a', 'select', 'etc3', '10', '', '', '', '', '', '', '예비필드3', '0'),
	( 24, '$group', 'a', 'select', 'etc4', '10', '', '', '', '', '', '', '예비필드4', '0'),
	( 25, '$group', 'a', 'select', 'etc5', '10', '', '', '', '', '', '', '예비필드5', '0');";
	mysql_query($SQL,$connect);

	/*
	$SQL="insert into ammember_config(gcode,skin,impname,impid,baselevel) VALUES ('$group', 'default', '웹마스터,마스터,관리자,운영자,테스트,admin,webmaster,master,administrator,test,www,mail', 'root,bin,daemon,adm,lp,sync,shutdown,halt,mail,news,uucp,operator,games,gopher,ftp,nobody,vcsa,mailnull,rpm,rpc,xfs,rpcuser,nfsnobody,nscd,ident,radvd,named,pcap,mysql,postgres,oracle,dba,sa,administrator,master,webmaster,operator,admin,sysadmin,test,guest,anonymous,sysop,moderator,www','9')";
	mysql_query($SQL,$connect);


	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '최고관리자', 1)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '운영자', 2)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '최우수정회원', 3)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '우수정회원', 4)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '장려회원', 5)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '정회원', 6)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '일반회원', 7)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '준회원', 8)";
	mysql_query($SQL,$connect);
	$SQL="INSERT INTO `ammember_level` VALUES ('', '$group', '준준회원', 9)";
	mysql_query($SQL,$connect);
	*/
}

if($asgmode == "update") {
	$SQL="update amsolution_group set gname='$gname' where gcode='$group' ";
	mysql_query($SQL,$connect);
}

gourl("$PHP_SELF?m1=grouplist");
?>
