<?
if($abmode == "writedb") {
	 /*	발송된 sms정보 db에 저장 (08.12.15) */
	            $sms_time = date("Y-m-d H:i:s");
	                $SQL1 = "insert sms_log (";
					$SQL1 = $SQL1."smsto_name,";
                    $SQL1 = $SQL1."smsto_number,"; 
					$SQL1 = $SQL1."smsform_name,";
					$SQL1 = $SQL1."smsform_number,";
				    $SQL1 = $SQL1."sms_contents,";
				    $SQL1 = $SQL1."sms_time";
				    $SQL1 = $SQL1.") values (";
                    $SQL1 = $SQL1."'$SITE_INFO[name]',";
					$SQL1 = $SQL1."'$rcv_number',";
					$SQL1 = $SQL1."'$name',";
					$SQL1 = $SQL1."'$snd_number',";
					$SQL1 = $SQL1."'$sms_content',";
					$SQL1 = $SQL1."'$sms_time')";
					mysql_query($SQL1,$connect);  
   
       //    echo $SQL1."<br>";
	
	/*  발송된 sms정보 db에 저장 (08.12.15) */  
 }else {  //회원상담에서 sms  
                $sms_time = date("Y-m-d H:i:s");
	                $SQL1 = "insert sms_log (";
					$SQL1 = $SQL1."smsto_name,";
                    $SQL1 = $SQL1."smsto_number,"; 
					$SQL1 = $SQL1."smsform_name,";
					$SQL1 = $SQL1."smsform_number,";
				    $SQL1 = $SQL1."sms_contents,";
				    $SQL1 = $SQL1."sms_time";
				    $SQL1 = $SQL1.") values (";
                    $SQL1 = $SQL1."'$name',";
					$SQL1 = $SQL1."'$rcv_number',";
					$SQL1 = $SQL1."'$SITE_INFO[name]',";
					$SQL1 = $SQL1."'$snd_number',";
					$SQL1 = $SQL1."'$sms_content',";
					$SQL1 = $SQL1."'$sms_time')";
					mysql_query($SQL1,$connect);  
	}
?>