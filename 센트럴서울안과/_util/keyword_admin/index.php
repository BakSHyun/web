<?
require_once $DROOT."/".$AMDIR."/admincheck.php";

switch($m2){

	case "keylist" :
		include $DROOT . "/_util/keyword_admin/keylist.php";
		break;

	case "keyword_source" :
		include $DROOT . "/_util/keyword_admin/keyword_source.php";
		break;
	case "keylistdel" :
		include $DROOT . "/_util/keyword_admin/keylistdel.php";
		break;

	case "keywritedb" :
		include $DROOT . "/_util/keyword_admin/keywritedb.php";
		break;

	case "keymodifydb" :
		include $DROOT . "/_util/keyword_admin/keywritedb.php";
		break;

	case "keywrite" :
		include $DROOT . "/_util/keyword_admin/keywrite.php";
		break;

	case "keymodify" :
		include $DROOT . "/_util/keyword_admin/keywrite.php";
		break;

	case "metatag" :
		include $DROOT . "/_util/keyword_admin/metahelp.php";
		break;

	default :
		include $DROOT . "/_util/keyword_admin/keylist.php";
		break;
}

?>
