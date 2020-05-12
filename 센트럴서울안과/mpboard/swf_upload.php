<?
include "../admin/inc/config.php";
$folder_name = $BROOT."/upload/".$_GET["browser_id"];
if(!is_dir($folder_name)) mkdir($folder_name, 0777); 
chmod($folder_name, 0777);

move_uploaded_file($_FILES['Filedata']['tmp_name'], $folder_name."/".$_GET["upload_id"]."__swfupload__".iconv("utf-8","euc-kr",$_FILES['Filedata']['name']));
?>