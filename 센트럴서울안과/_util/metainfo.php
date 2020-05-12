<?
$description=$adm_sql[adm_meta_description];
$keyword=$adm_sql[adm_meta_keywords];
$author=$adm_sql[adm_sms_id];
$title=$adm_sql[adm_meta_title];
$subject=$adm_sql[adm_meta_subject];
$robot="all";


$url_self=$_SERVER['PHP_SELF'];
$result=mysql_query("select * from `mpkeyword` where url='".$url_self."' ");
$row=mysql_fetch_array($result);


if($row[subject]){
	$subject =$row[subject];
}

if($row[title]){
	$title =$row[title];
}

if($row[keyword]){
	$keyword =$row[keyword];
}

if($row[contents]){
	$description =$row[contents];
}

?>
<META NAME="subject" CONTENT="<?=$subject?>">
<META NAME="title" CONTENT="<?=$title?>">
<META NAME="keyword" CONTENT="<?=$keyword?>">
<META NAME="description" CONTENT="<?=$description?>">
<META NAME="robot" CONTENT="<?=$robot?>">
<title><?=$title?></title>
