<?
require_once $RROOT."/inc/sys.php";
require_once $DROOT."/".$AMDIR."/admincheck.php";

switch($m2){
	case "daychart" : 
		include $DROOT . "/_util/statistic_admin/statistic_daychart.php";
		break;

	case "monthchart" : 
		include $DROOT . "/_util/statistic_admin/statistic_monthchart.php";
		break;

	case "statistics" : 
		include $DROOT . "/_util/statistic_admin/statistic_list.php";
		break;

	case "statistics_source" : 
		include $DROOT . "/_util/statistic_admin/statistic_source.php";
		break;

	case "visit_history_stat" :
		include $DROOT . "/_util/statistic_admin/visit_history_stat.php";
		break;

	case "month_stat" :
		include $DROOT . "/_util/statistic_admin/month_stat.php";
		break;

	case "day_stat" :
		include $DROOT . "/_util/statistic_admin/day_stat.php";
		break;

	case "week_stat" :
		include $DROOT . "/_util/statistic_admin/week_stat.php";
		break;

	case "hour_stat" :
		include $DROOT . "/_util/statistic_admin/hour_stat.php";
		break;

	case "referer_stat" :
		include $DROOT . "/_util/statistic_admin/referer_stat.php";
		break;

	case "ip_stat" :
		include $DROOT . "/_util/statistic_admin/ip_stat.php";
		break;

	case "browser_stat" :
		include $DROOT . "/_util/statistic_admin/browser_stat.php";
		break;

	case "os_stat" :
		include $DROOT . "/_util/statistic_admin/os_stat.php";
		break;

	case "search_stat" :
		include $DROOT . "/_util/statistic_admin/search_stat.php";
		break;

	case "access_stat" :
		include $DROOT . "/_util/statistic_admin/access_stat.php";
		break;

	default : 
		include $DROOT . "/_util/statistic_admin/statistic_list.php";
		break;
}

?>
