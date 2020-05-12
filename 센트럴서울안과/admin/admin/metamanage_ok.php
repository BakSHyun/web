<?
$ftpobj = new kftp($_SERVER["SERVER_NAME"],$FTP_USER_,$FTP_PW_,false);
$ftpobj->ftp_connect();
$ftpobj->chdir("admin");
$buffer = $ftpobj->fread("inc/metainfo.php");	

$buffer = "<?
\$description = \"$description\";
\$keyword = \"$keyword\";
\$author = \"$author\";
\$email = \"$email\";
?>

<META NAME=\"Description\" CONTENT=\"$description\">
<META NAME=\"Keyword\" CONTENT=\"$keyword\">
<META NAME=\"Author\" CONTENT=\"$author\">
<META NAME=\"Email\" CONTENT=\"$email\">
";

$ftpobj->fwrite("inc/metainfo.php",$buffer);
gourl($PHP_SELF."?group=$group&m1=metamanage");
?>