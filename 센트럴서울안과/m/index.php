<?
	$query_string = ($_SERVER["QUERY_STRING"] == ""?"":"?".$_SERVER["QUERY_STRING"]);
	header("Location: ./main/main.php".$query_string);
?>
