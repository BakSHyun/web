<?
$description = "병원홈페이지를 전문으로 제작하는 메디픽스 입니다.";
$keyword = "병원홈페이지,메디픽스";
$author = "메디픽스";
$email = "design@medipix.co.kr";



$pageArray = explode("/", $_SERVER['PHP_SELF']);
$curPage = "/" .$pageArray[count($pageArray)-2] . "/" . $pageArray[count($pageArray)-1];


$SQL = "select * from mpkeyword where url='$curPage'";

$result = mysql_query($SQL,$connect);
$row = mysql_fetch_array($result);

if(is_array($row)) while(list($key, $value)=each($row)) {
		$$key = $row[$key];
}

?>
<?
	if($contents){

	$contents= strip_tags($contents);
	$contents= stripslashes($contents);
	$contents= str_replace("\n","",$contents);
	$contents= str_replace("\r","",$contents);

//	$contents = $userMessage = ereg_replace('<([^>]|\n)*>', '', $contents);


?>
<META NAME="Description" CONTENT="<?=$contents?>">
<?}?>
<META NAME="Description" CONTENT="<?=$description?>">
<META NAME="subject" CONTENT="<?=$title?>">
<META NAME="Keyword" CONTENT="<?=$keyword?>">
<META NAME="Author" CONTENT="<?=$author?>">
<META NAME="Email" CONTENT="<?=$email?>"">
