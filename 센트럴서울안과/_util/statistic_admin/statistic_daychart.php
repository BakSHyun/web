<div id='admin_sub_wrap'>

	<h2>일간 접속자 통계</h2>

		<?
			// 접속자 통계
			$n_year=date("Y", time()); 
			$n_mon=date("n", time()); 
			$mlow; 
			$mhigh;
			for($m=0;$m<12;$m++){
				if(strlen($n_mon)<2){ $n_mon='0'.$n_mon; }
				$n_qry=mysql_query("select pv_time from pageview_check where pv_date like '%".$n_year."-".$n_mon."%' order by pv_date asc");
				$mlow=0; 
				$mhigh=0; 
				$n=1;
				while($n_row=mysql_fetch_array($n_qry)){ 
					$n_num=array_sum(explode('|',$n_row[0])); 
					if($n==1){ 
						$mlow=$n_num; 
						$mhigh=$n_num; 
					}else{ 
						if($n_num<$mlow){ 
							$mlow=$n_num; 
						} 
						if($n_num>$mhigh){ 
							$mhigh=$n_num; 
						} 
					} $n++; 
				}
				$m_stat[$m][0]=$n_mon; 
				$m_stat[$m][1]=$mlow; 
				$m_stat[$m][2]=$mhigh;
				$n_mon--; 
				if($n_mon==0){ $n_mon=12; $n_year--; }
			}
			$m_stat=array_reverse($m_stat); 
			$pv_sql=mysql_query("select * from pageview_check order by pv_date desc limit 7"); 
			$i=0;
			while($pv_row=mysql_fetch_array($pv_sql)){ 
				$pv_arr[$i][0]=substr($pv_row[1],5,10); 
				$pv_arr[$i][1]=$pv_row[2]; 
				$pv_arr[$i][2]=array_sum(explode('|',$pv_row[2])); 
				$i++; 
			}
			$pv_times=explode('|',$pv_arr[0][1]); 
		?>

		<script type="text/javascript" src="/admin/js/canvasjs.min.js"></script>
		<script type="text/javascript">
		  window.onload = function () {

			CanvasJS.addColorSet("sub_graph_sets", ["#3d71f3"]);
			
			var chart2 = new CanvasJS.Chart("sub_graph",
			{
		      colorSet : "sub_graph_sets",
			  animationEnabled: true,     
			  data: [
			  {        
				type: "line",  
				dataPoints: [
				{label: "01시", y: <?=$pv_times[0]?>} ,     
				{label: "02시", y: <?=$pv_times[1]?>} ,     
				{label: "03시", y: <?=$pv_times[2]?>} ,     
				{label: "04시", y: <?=$pv_times[3]?>} ,     
				{label: "05시", y: <?=$pv_times[4]?>} ,     
				{label: "06시", y: <?=$pv_times[5]?>} ,     
				{label: "07시", y: <?=$pv_times[6]?>} ,     
				{label: "08시", y: <?=$pv_times[7]?>} ,     
				{label: "09시", y: <?=$pv_times[8]?>} ,     
				{label: "10시", y: <?=$pv_times[9]?>} ,     
				{label: "11시", y: <?=$pv_times[10]?>} ,     
				{label: "12시", y: <?=$pv_times[11]?>} ,     
				{label: "13시", y: <?=$pv_times[12]?>} ,     
				{label: "14시", y: <?=$pv_times[13]?>} ,     
				{label: "15시", y: <?=$pv_times[14]?>} ,     
				{label: "16시", y: <?=$pv_times[15]?>} ,     
				{label: "17시", y: <?=$pv_times[16]?>} ,     
				{label: "18시", y: <?=$pv_times[17]?>} ,     
				{label: "19시", y: <?=$pv_times[18]?>} ,     
				{label: "20시", y: <?=$pv_times[19]?>} ,     
				{label: "21시", y: <?=$pv_times[20]?>} ,     
				{label: "22시", y: <?=$pv_times[21]?>} ,     
				{label: "23시", y: <?=$pv_times[22]?>},
				{label: "24시", y: <?=$pv_times[23]?>}
				]
			  }
			  ]
			});

			chart2.render();

		}
		</script>

	<div id="sub_graph" style="height:400px;width:100%;">
	</div>

</div>