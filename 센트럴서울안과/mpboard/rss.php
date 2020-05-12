<?
header("Cache-Control: no-cache, must-revalidate");
header("Content-Type: text/xml; charset=utf-8");

require_once "../admin/inc/config.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpboard/library/class.amboard_slist.php";

$slistobj = new sboardlist($connect);
$bconfig = $slistobj->getConfig($code);

if($bconfig[rssopen]==1) $open = true;
else $open = false;

if($bconfig[view_auth]>=10) $open = true;
else $open = false;


$counter = $bconfig[rsscount];

$rssobj = new rss($INDIR);
$rssobj->setTitle($bconfig[name]);
$rssobj->setLink("http://".$_SERVER["HTTP_HOST"].$listpage);
$rssobj->setDescription("");
$rssobj->setLanguage("kor");

if($open) {
	$LIST = $slistobj->getListData($group,$code,$counter,0);
	if(is_array($LIST)) foreach ($LIST as $LDATA) {
		
		$itemobj = new item();
		
		$LDATA[viewlink] = str_replace("&","&amp;",$LDATA[viewlink]);
		if($LDATA[secret]!='1') {
			$itemobj->setTitle($LDATA[title]);
			$itemobj->setLink("http://".$_SERVER["HTTP_HOST"].$viewpage."?".$LDATA[viewlink]);
			$itemobj->setAuthor($LDATA[name]);
			$itemobj->setDescription($LDATA[contents]);
			$itemobj->setPubdate(date("r", strtotime($LDATA[wdate_time])));
			$itemobj->setCategory($LDATA[category_name]);
			$rssobj->setItem($itemobj);
		}
	}
}

$rssobj->printRss();
?>