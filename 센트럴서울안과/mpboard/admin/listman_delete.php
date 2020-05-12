<?
include "boardempty.php";
//컨피그에서 제거
$SQL = "delete from amboard_config where no='".$no."'";
mysql_query($SQL);
//트리에서제거

//부모노드 cno
$SQL = "select no,pno from amcategory_manage where code='".$code."'";
$row = mysql_fetch_array(mysql_query($SQL));
$SQL="select * from amcategory_manage where no=".$row[pno]." LIMIT 1";
$result=mysql_query($SQL);	
$prow=mysql_fetch_array($result);
	
// pno노드 cno에서 자신 지우기
$cnolist=explode("|",$prow[cno]);
$newcno="";

while($cnotmp=each($cnolist)) {
	if($cnotmp[value]!=$row[no]) {
		$newcno.=$cnotmp[value]."|";
	}
}
$newcno=substr($newcno,0,strlen($newcno)-1);

$SQL="UPDATE `amcategory_manage` SET cno='".$newcno."' where no=".$prow[no];
mysql_query($SQL);
if ( !mysql_affected_rows() ) echo $SQL."folder disconnect(move) error!!";


//자신제거
$SQL = "delete from amcategory_manage where code='".$code."'";
mysql_query($SQL);


?>