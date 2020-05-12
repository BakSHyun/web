<?

require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/mpreserve/inc/sys.php";
require_once $_SERVER[DOCUMENT_ROOT]."/$INDIR/ammember/inc/sys.php";

// javascript 와 iframe 테그는 사용하지 못하게 한다.
if(is_array($_REQUEST)) {
	reset($_REQUEST);
	while(list($key, $value)=each($_REQUEST)) {
		$$key = $_REQUEST[$key];
		$$key = eregi_replace("<script","&lt;script",$$key);
		$$key = eregi_replace("</script>","&lt;/script&gt;",$$key);
		$$key = eregi_replace("<iframe","&lt;iframe",$$key);
		$$key = eregi_replace("</iframe>","&lt;/iframe&gt;",$$key);
	}
}

$mpreserve = new mpreserve($code);

$AUTH = $mpreserve->getresauth();

switch($mode)
{
	case "reswrite" :
		include($RROOT."/write.php");
		break;
	
	case "reswritedb" :
		include($RROOT."/writedb.php");
		break;
		
	case "resresult" :
		include($RROOT."/result.php");
		break;
		
	case "confirm" :
		include($RROOT."/confirm.php");
		break;
	
	case "confirmlist" :
		include($RROOT."/confirmlist.php");
		break;
	
	case "rescancel" :
		include($RROOT."/rescancel.php");
		break;
	
	default :
		include($RROOT."/seldate.php");
		break;
}

?>