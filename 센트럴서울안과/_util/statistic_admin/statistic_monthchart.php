<div id='admin_sub_wrap'>

	<h2>주간 접속자 통계</h2>

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
			$pv_arr=array_reverse($pv_arr);
			$pv_arr_max=max($pv_arr[0][2],$pv_arr[1][2],$pv_arr[2][2],$pv_arr[3][2],$pv_arr[4][2],$pv_arr[5][2],$pv_arr[6][2]);
			$pv_arr_min=min($pv_arr[0][2],$pv_arr[1][2],$pv_arr[2][2],$pv_arr[3][2],$pv_arr[4][2],$pv_arr[5][2],$pv_arr[6][2]);

		?>

		<script type="text/javascript" src="/admin/js/canvasjs.min.js"></script>
		<script type="text/javascript">
		  window.onload = function () {

			CanvasJS.addColorSet("sub_graph_sets", ["#1946b8"]);
			
			var chart2 = new CanvasJS.Chart("sub_graph",
			{
		      colorSet : "sub_graph_sets",
			  animationEnabled: true,     
			  data: [
			  {        
				type: "line",  
				name: "주간 접속자",        
				showInLegend: false,
				dataPoints: [
				<?
					for($i=0;$i<7;$i++){
						$pv_max="";
						$pv_min="";
						if( $pv_arr[$i][2] == $pv_arr_max ){
							$pv_max=', indexLabel: "최고",markerColor: "#7901e9", markerType: "triangle", markerSize: "15" ';
						}else if( $pv_arr[$i][2] == $pv_arr_min ){
							$pv_min=', indexLabel: "최저",markerColor: "red", markerType: "cross", markerSize: "10" ';
						}
						echo "{label: '".$pv_arr[$i][0]."', y: ".$pv_arr[$i][2]." ".$pv_max.$pv_min."} ";
						if($i != 6){ echo ", "; }
					}
				?>
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