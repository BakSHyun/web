<?
header ('HTTP/1.1 301 Moved Permanently');
$query_string = ($_SERVER["QUERY_STRING"] == ""?"":"?".$_SERVER["QUERY_STRING"]);
header ('Location: /m/07_counsel/counsel6.php'.$query_string);

?>