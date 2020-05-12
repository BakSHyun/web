<?
$ftpobj = new kftp($_SERVER["SERVER_NAME"],$FTP_USER_,$FTP_PW_,false);
$ftpobj->ftp_connect();
$ftpobj->chdir("admin");
$buffer = $ftpobj->fread("inc/siteinfo.php");	

$buffer = "<?
\$SITE_INFO[title] = \"$title\";
\$SITE_INFO[url] = \"$url\";
\$SITE_INFO[name] = \"$name\";
\$SITE_INFO[email] = \"$email\";
\$SITE_INFO[phone] = \"$phone\";
\$SITE_INFO[hphone] = \"$hphone\";

\$SITE_INFO[sms_id] = \"$sms_id\";
\$SITE_INFO[sms_pwd] = \"$sms_pwd\";

\$SITE_INFO[logger_id] = \"$logger_id\";
\$SITE_INFO[logger_pwd] = \"$logger_pwd\";
?>
";
$ftpobj->fwrite("inc/siteinfo.php",$buffer);
gourl($PHP_SELF."?group=$group&m1=sitemanage");
?>
