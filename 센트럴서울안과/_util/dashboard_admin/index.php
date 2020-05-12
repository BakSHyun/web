<div id='admin_sub_wrap'>
<?

switch($m2){

	case "site_mod" : 
		include $DROOT . "/_util/dashboard_admin/site_mod.php";
		break;

	case "site_mod_db" : 
		include $DROOT . "/_util/dashboard_admin/site_mod_db.php";
		break;

	default : 
		if($code) include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/mpboard/board.php";
		else include $DROOT . "/_util/dashboard_admin/main.php";
		break;
}

?>
</div>