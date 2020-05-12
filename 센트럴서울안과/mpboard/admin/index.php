<?
require_once $BROOT."/inc/sys.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";

switch($m2){
	case "list":
		include $BROOT."/admin/boardlist.php";
		break;
	case "configinsert":
		include $BROOT."/admin/boardconfig.php";
		break;
	case "configupdate":
		include $BROOT."/admin/boardconfig.php";
		break;
	case "configinsertdb":
		include $BROOT."/admin/boardconfig_db.php";
		break;
	case "configupdatedb":
		include $BROOT."/admin/boardconfig_db.php";
		break;
	case "configfilter":
		include $BROOT."/admin/boardfilter.php";
		break;
	case "configfilterdb":
		include $BROOT."/admin/boardfilter_db.php";
		break;
	case "boardempty":
		include $BROOT."/admin/boardempty.php";
		break;
	case "boarddelete":
		include $BROOT."/admin/boarddelete.php";
		break;
	case "boardcategory":
		include $BROOT."/admin/boardcategory.php";
		break;
	case "categoryinsertdb":
		include $BROOT."/admin/boardcategory_db.php";
		break;
	case "categoryupdatedb":
		include $BROOT."/admin/boardcategory_db.php";
		break;
	case "categorydeletedb":
		include $BROOT."/admin/boardcategory_db.php";
		break;
	case "categoryindexdb":
		include $BROOT."/admin/boardcategory_db.php";
		break;
	case "board_source":
		include $BROOT."/admin/board_source.php";
		break;
	default:
		include $BROOT."/admin/boardlist.php";
		break;
}
?>