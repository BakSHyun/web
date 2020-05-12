<meta charset='utf-8'/>
<?
// 외부에서의 접근을 막는다.
if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
	echo "
	<br><br><br><br>
	<center>
	올바른 접속이 아닙니다.
	</center>
	";
	exit;
}


$adm_sql="update admin_config set
				adm_phone='".$adm_phone."',
				adm_email='".$adm_email."',
				adm_sms_id='".$adm_sms_id."',
				adm_sms_pw='".$adm_sms_pw."',
				adm_ip_block='".$adm_ip_block."',
				adm_meta_subject='".$adm_meta_subject."',
				adm_meta_title='".$adm_meta_title."',
				adm_meta_keywords='".$adm_meta_keywords."',
				adm_meta_description='".$adm_meta_description."',
				adm_meta_Copyright='".$adm_meta_Copyright."',
				implant_count='".$implant_count."' ";
mysql_query($adm_sql);

echo "<script>alert('정보가 수정 되었습니다.');</script>";
echo "<META http-equiv=\"Refresh\" content=\"0; URL=$PHP_SELF?group=basic&site_mod=list\">";

?>
