<?

class mpreserve
{
	var $tables; // 예약관련테이블
	var $config; // 예약설정
	var $code;

	function mpreserve($code)
	{
		$this->tables[config] = "mpreserve_config";
		$this->tables[close] = "mpreserve_close";
		$this->tables[reserve] = "mpreserve";
		$this->code = $code;
		$this->config = $this->getresconfig($code);
	}

	function getresconfig()
	{
		$query = "select * from ".$this->tables[config]." where code = '$this->code'";
		if($result = mysql_query($query))
		{
			$row = mysql_fetch_array($result);
			$arr_conf_items = explode("|",$row[conf_items]);
			$arr_smsmail_use = explode("|",$row[smsmail_use]);
			$row[item_name] = $arr_conf_items[0];
			$row[item_phone] = $arr_conf_items[1];
			$row[item_email] = $arr_conf_items[2];
			$row[item_memo] = $arr_conf_items[3];
			$row[sms_admin] = $arr_smsmail_use[0];
			$row[sms_user] = $arr_smsmail_use[1];
			$row[mail_user] = $arr_smsmail_use[2];
			$row[resssms_user] = $arr_smsmail_use[3];
			//$row[smsmail_use_phonenum] = $arr_smsmail_use[4];
			$row[keyword_trace_feature] = $arr_smsmail_use[4];
			//if(!$row[numofper]) $row[numofper] = 10000;
			return $row;
		}
	}

	function getresauth()
	{
		$query = "select * from ".$this->tables[config]." where code = '$this->code'";
		if($result = mysql_query($query))
		{
			$row = mysql_fetch_array($result);
			if($_SESSION[userlevel]) $row[userlevel] = $_SESSION[userlevel];
			else $row[userlevel] = 10;

			if($row[userlevel] <= $row[manage_auth]) $row[manage] = true;
			if($row[userlevel] <= $row[write_auth]) $row[write] = true;

			return $row;
		}
	}

	function gettimelist($rdate)
	{
		$week = date("w", strtotime($rdate));
		$query = "select time$week, numofper$week from ".$this->tables[config]." where code = '$this->code'";
		if($result = mysql_query($query))
		{
			$row = mysql_fetch_row($result);
			if($row[0]) $arr_time = explode("|", $row[0]);
			if($row[1]) {
				$arr_numofper = explode("|", $row[1]);
			} else{
				// 예약설정에서 시간별 인원수 설정값이 없는경우 임의로 설정
				for($i=0;$i < count($arr_time);$i++){
					$arr_numofper[$i]="10000";
				}
			}

			$i = 0;
			if(is_array($arr_time))
			{
				foreach($arr_time as $times)
				{
					$res_close = mysql_query("select count(*) from ".$this->tables[close]." where code='$this->code' and closedate = '$rdate' and closetime='$times'");
					$cnt_close = mysql_result($res_close,0,0);
					if($cnt_close > 0) {
						$restimes[$i][linkreserve] = "<font color='#D92323'>예약마감</font>";
						$restimes[$i][linkreserve2] = "<span class='small5_11' style='color:#FE6530'>예약마감</span>";
						$restimes[$i][linkreserve3] = "0";
					}
					else
					{
						$res_time = mysql_query("select count(*) from ".$this->tables[reserve]." where code='$this->code' and resdate = '$rdate' and restime='$times'");
						$cnt_time = mysql_result($res_time,0,0);
						if($cnt_time >= $arr_numofper[$i]) {
							$restimes[$i][linkreserve] = "<font color='#999999'>예약불가</font>";
							$restimes[$i][linkreserve2] = "<span class='small5_11' style='color:#FE6530'>예약마감</span>";
							$restimes[$i][linkreserve3] = "0";
						}
						else {
							$restimes[$i][linkreserve] = "<a href=\"javascript:gonext('$times')\" class='restype'>예약가능</a>";
							$restimes[$i][linkreserve2] = "<a href=\"javascript:sel_time('$times')\"><span class='small4_11'>예약가능</span></a>";
							$restimes[$i][linkreserve3] = "1";
						}
					}
					$restimes[$i][rtime] = $times;
					$i++;
				}
				return $restimes;
			}
		}
	}

	function getconfirmlist($name, $hphone1, $hphone2, $hphone3)
	{
		$query = "select * from ".$this->tables[reserve]." where name='$name' and hphone1='$hphone1' and hphone2='$hphone2' and hphone3='$hphone3'";
		if($result = mysql_query($query))
		{
			while($rows = mysql_fetch_array($result))
			{
				$rows[contents]=htmlspecialchars($rows[contents]);
				$rows[contents]=ereg_replace(" ","&nbsp;",$rows[contents]);
				$rows[contents]=ereg_replace("	"," &nbsp;&nbsp;&nbsp;&nbsp;",$rows[contents]);
				$rows[contents]=nl2br($rows[contents]);

				$LIST[] = $rows;
			}
			return $LIST;
		}
	}

	function write($pvars)
	{
		$res_close = mysql_query("select count(*) from ".$this->tables[close]." where code='$this->code' and closedate = '$pvars[resdate]' and closetime='$pvars[restime]'");
		$cnt_close = mysql_result($res_close,0,0);
		if($cnt_close > 0)
		{
			msg("해당 시간은 현재 예약이 가능하지 않습니다.");
			return false;
			//$restimes[$i][linkreserve] = "<font color='#D92323'>휴진</font>";
		}

		$week = date("w", strtotime($pvars[resdate]));
		$res_config = mysql_query("select time$week, numofper$week from ".$this->tables[config]." where code='$this->code'");
		$arr_time = explode("|", mysql_result($res_config,0,0));
		$time_key = array_search($pvars[restime], $arr_time);
		$arr_numofper = explode("|", mysql_result($res_config,0,1));

		if(!$arr_numofper){
			for($i=0;$i < count($arr_time);$i++){
				$arr_numofper[$i]="10000";
			}
		}

		$res_time = mysql_query("select count(*) from ".$this->tables[reserve]." where code='$this->code' and resdate = '$pvars[resdate]' and restime='$pvars[restime]'");
		$cnt_time = mysql_result($res_time,0,0);
		if($cnt_time >= $arr_numofper[$time_key])
		{
			msg("select count(*) from ".$this->tables[reserve]." where code='$this->code' and resdate = '$pvars[resdate]' and restime='$pvars[restime]'");
			msg("해당 시간은 현재 예약이 가능하지 않습니다.");
			return false;
		}

		$ip = $_SERVER["REMOTE_ADDR"];
		$wdate = date("Y-m-d H:i:s");
		if($pvars[email1] && $pvars[email2]) $email = $pvars[email1]."@".$pvars[email2];
		$contents = addslashes($pvars[contents]);

		//키워드 있을경우
		if($_SESSION['nvkwd']) $mpkeyword = $_SESSION['nvkwd'];
		if($_SESSION['ovkwd']) $mpkeyword = $_SESSION['ovkwd'];

		//접속경로
		if($_SESSION['reffer_session']){$mp_reffer =$_SESSION['reffer_session'];}

		$query = "insert into ".$this->tables[reserve]." ";
		$query .= "(code,category,name,userid,email,hphone1,hphone2,hphone3,contents,ip,resdate,restime,wdate,etc1,etc2,etc3,etc4,etc5,mpkeyword,mp_reffer) values ";
		$query .= "('".$this->code."','$pvars[category]','$pvars[name]','".$_SESSION[userid]."','$email','$pvars[hphone1]','$pvars[hphone2]','$pvars[hphone3]','$contents','$ip','$pvars[resdate]','$pvars[restime]','$wdate','$pvars[etc1]','$pvars[etc2]','$pvars[etc3]','$pvars[etc4]','$etc5','$mpkeyword','$mp_reffer')";

		if(!mysql_query($query))
		{
			msg("예약이 정상적으로 처리되지 못했습니다.");
			return false;
		}
		$res_max = mysql_query("select max(no) from ".$this->tables[reserve]);
		$maxno = mysql_result($res_max,0,0);
		$query = "update ".$this->tables[reserve]." set ino = $maxno where no = $maxno";
		if(!mysql_query($query))
		{
			msg("예약이 정상적으로 처리되지 못했습니다.");
			return false;
		}
		//global $mn=$maxno;

		//return true;
		return $maxno;
	}
}

?>