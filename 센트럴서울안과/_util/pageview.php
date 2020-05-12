<?
	//관리자 통계 유입
	$mplogobj = new mplog($connect);
	$mplogarray = $mplogobj->getInfo();

	$mplogobj->accessInput($mplogarray,$_SESSION['amlog_session']);

	$amlog_session = $mplogarray[year].$mplogarray[month].$mplogarray[day].$mplogarray[hour].$mplogarray[i].$mplogarray[s];
	$_SESSION['amlog_session'] = $amlog_session;
	//관리자 통계 유입


	if(!isset($_COOKIE['pv_chk'])){
		
		/*해당날짜 있는지 확인*/		
		$pv_date=date("Y-m-d", time());
		$pv_time_now=date("G", time());
		$pv_sql1=mysql_query("select count(pv_idx) from pageview_check where pv_date='".$pv_date."' ");
		$pv_row1=mysql_fetch_array($pv_sql1);

		if($pv_row1[0]<1){
			$pv_sql2=mysql_query("insert into pageview_check set pv_date = '".$pv_date."', pv_time = '0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|0|' ");
		}

		/*시간 업데이트*/
		$pv_sql3=mysql_query("select pv_time from pageview_check where pv_date='".$pv_date."' ");
		$pv_row3=mysql_fetch_array($pv_sql3);
		$pv_time=$pv_row3[0];
		$pv_time=explode('|',$pv_time);

		$pv_num=$pv_time_now-1;
		$pv_time[$pv_num]=$pv_time[$pv_num]+1;
		$pv_time2=implode('|',$pv_time);

		$pv_sql3=mysql_query("update pageview_check set pv_time='".$pv_time2."' where pv_date='".$pv_date."' ");

		/*쿠키생성*/
		$pv_chk_cookie_name='pv_chk';
		$pv_chk_cookie_value='1';
		setcookie($pv_chk_cookie_name,$pv_chk_cookie_value,time()+(3600),'/');

	}



?>