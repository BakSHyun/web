<?
if($abmode == "writedb") {
	 /*	�߼۵� sms���� db�� ���� (08.12.15) */
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
	
	/*  �߼۵� sms���� db�� ���� (08.12.15) */  
 }else {  //ȸ����㿡�� sms  
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