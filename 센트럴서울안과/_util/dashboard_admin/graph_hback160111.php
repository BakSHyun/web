<?
	//키워드 집계

	$st_total=mysql_fetch_array(mysql_query('select sum(st_cnt) from statistic_check'));
	$st_qry1=mysql_query('select st_n, sum(st_cnt) from statistic_check group by st_n');
	while($st_row1=mysql_fetch_array($st_qry1)){
		switch($st_row1[0]){
			case '네이버' : $cnt_naver=$st_row1[1]; break;
			case '다음' : $cnt_daum=$st_row1[1]; break;
			case '구글' : $cnt_google=$st_row1[1]; break;
			case '직접입력' : $cnt_dir=$st_row1[1]; break;
		}
	}
	$cnt_etc=$st_total[0]-$cnt_naver-$cnt_daum-$cnt_google-$cnt_dir;

	$st_row2=array();
	$st_qry22=mysql_query('select st_kw, sum(st_cnt) from statistic_check group by st_kw order by sum(st_cnt) desc limit 7');
	$ss=0;
	while($st_qry2=mysql_fetch_array($st_qry22)){
		$st_row2[$ss][0]=$st_qry2[0];
		$st_row2[$ss][1]=$st_qry2[1];
		$ss++;
	}

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
?>
<script type="text/javascript" src="/admin/js/canvasjs.min.js"></script>
<script type="text/javascript">
  window.onload = function () {

	CanvasJS.addColorSet("portal_sets", ["#2db400","#608efc","#d5412b","#e2e2e2","#c1c1c1" ]);
	CanvasJS.addColorSet("portal_sets2", ["#591E23","#D94E67","#F2D8A7","#f2ae72","#d96459","#A68572","#73503C" ]);


    var chart4 = new CanvasJS.Chart("visit_portal",
    {
      colorSet : "portal_sets",
      title:{
        text: "사이트별 누적 유입량"
      },
      data: [
      {
       type: "doughnut",
       dataPoints: [
       <? if($cnt_naver){?> {  y: <?=$cnt_naver?>, legendText: "네이버", indexLabel: "네이버" }, <?}?>
       <? if($cnt_daum){?> {  y: <?=$cnt_daum?>, legendText: "다음", indexLabel: "다음" },<?}?>
       <? if($cnt_google){?> {  y: <?=$cnt_google?>, legendText: "구글", indexLabel: "구글" },<?}?>
       <? if($cnt_dir){?> {  y: <?=$cnt_dir?>, legendText: "직접유입", indexLabel: "직접유입" }, <?}?>
       <? if($cnt_etc){?> {  y: <?=$cnt_etc?>, legendText: "기타", indexLabel: "기타" } <?}?>
       ]
     }
     ]
   });

    var chart5 = new CanvasJS.Chart("visit_kw",
    {
      colorSet : "portal_sets2",
      title:{
        text: "키워드별 누적 집계량"
      },
      data: [
      {
       type: "doughnut",
       dataPoints: [
       <? if($st_row2[0][1]){?>{  y: <?=$st_row2[0][1]?>, indexLabel: "<?=$st_row2[0][0]?>" },<?}?>
       <? if($st_row2[1][1]){?>{  y: <?=$st_row2[1][1]?>, indexLabel: "<?=$st_row2[1][0]?>" },<?}?>
       <? if($st_row2[2][1]){?>{  y: <?=$st_row2[2][1]?>, indexLabel: "<?=$st_row2[2][0]?>" },<?}?>
       <? if($st_row2[3][1]){?>{  y: <?=$st_row2[3][1]?>, indexLabel: "<?=$st_row2[3][0]?>" },<?}?>
       <? if($st_row2[4][1]){?>{  y: <?=$st_row2[4][1]?>, indexLabel: "<?=$st_row2[4][0]?>" },<?}?>
       <? if($st_row2[5][1]){?>{  y: <?=$st_row2[5][1]?>, indexLabel: "<?=$st_row2[5][0]?>" },<?}?>
       <? if($st_row2[6][1]){?>{  y: <?=$st_row2[6][1]?>, indexLabel: "<?=$st_row2[6][0]?>" }<?}?>
       ]
     }
     ]
   });

	var chart = new CanvasJS.Chart("graph_week",
	{
	  title:{
		text: "주간 접속자"
	  },
	  animationEnabled: true,
	  toolTip: {
		shared: false
	  },
	  data: [
	  {
		type: "spline",
		name: "주간 접속자",
		showInLegend: false,
		dataPoints: [
		{label: "<?=$pv_arr[0][0]?>", y: <?=$pv_arr[0][2]?>} ,
		{label: "<?=$pv_arr[1][0]?>", y: <?=$pv_arr[1][2]?>} ,
		{label: "<?=$pv_arr[2][0]?>", y: <?=$pv_arr[2][2]?>} ,
		{label: "<?=$pv_arr[3][0]?>", y: <?=$pv_arr[3][2]?>} ,
		{label: "<?=$pv_arr[4][0]?>", y: <?=$pv_arr[4][2]?>} ,
		{label: "<?=$pv_arr[5][0]?>", y: <?=$pv_arr[5][2]?>} ,
		{label: "<?=$pv_arr[6][0]?>", y: <?=$pv_arr[6][2]?>}
		]
	  }
	  ]
	});

	var chart2 = new CanvasJS.Chart("graph_day",
	{
	  title:{
		text: "일간 접속자"
	  },
	  animationEnabled: true,
	  axisY:{
		//titleFontFamily: "arial",
		titleFontSize: 12,
		includeZero: false
	  },
	  toolTip: {
		shared: false
	  },
	  data: [
	  {
		type: "spline",
		name: "일간 접속자",
		color:"#f3766f",
		showInLegend: false,
		dataPoints: [
		{label: "00시", y: <?=$pv_times[0]?>} ,
		{label: "01시", y: <?=$pv_times[1]?>} ,
		{label: "02시", y: <?=$pv_times[2]?>} ,
		{label: "03시", y: <?=$pv_times[3]?>} ,
		{label: "04시", y: <?=$pv_times[4]?>} ,
		{label: "05시", y: <?=$pv_times[5]?>} ,
		{label: "06시", y: <?=$pv_times[6]?>} ,
		{label: "07시", y: <?=$pv_times[7]?>} ,
		{label: "08시", y: <?=$pv_times[8]?>} ,
		{label: "09시", y: <?=$pv_times[9]?>} ,
		{label: "10시", y: <?=$pv_times[10]?>} ,
		{label: "11시", y: <?=$pv_times[11]?>} ,
		{label: "12시", y: <?=$pv_times[12]?>} ,
		{label: "13시", y: <?=$pv_times[13]?>} ,
		{label: "14시", y: <?=$pv_times[14]?>} ,
		{label: "15시", y: <?=$pv_times[15]?>} ,
		{label: "16시", y: <?=$pv_times[16]?>} ,
		{label: "17시", y: <?=$pv_times[17]?>} ,
		{label: "18시", y: <?=$pv_times[18]?>} ,
		{label: "19시", y: <?=$pv_times[19]?>} ,
		{label: "20시", y: <?=$pv_times[20]?>} ,
		{label: "21시", y: <?=$pv_times[21]?>} ,
		{label: "22시", y: <?=$pv_times[22]?>} ,
		{label: "23시", y: <?=$pv_times[23]?>}
		]
	  }
	  ]
	});

	var chart3 = new CanvasJS.Chart("graph_month",
	{
		title: {
			text: "월별 접속자"
		},
        animationEnabled: true,
		axisY: {
			includeZero: false,
		},
		toolTip: {
			content: "{x}월 </br> 최소: {y[0]}, 최다: {y[1]}"
		},
		data: [
		{
			type: "rangeColumn",
			showInLegend: false,
			dataPoints: [
				{ label: '<?=$m_stat[0][0]?> 월', y: [<?=$m_stat[0][1]?>, <?=$m_stat[0][2]?>]},
				{ label: '<?=$m_stat[1][0]?> 월', y: [<?=$m_stat[1][1]?>, <?=$m_stat[1][2]?>]},
				{ label: '<?=$m_stat[2][0]?> 월', y: [<?=$m_stat[2][1]?>, <?=$m_stat[2][2]?>]},
				{ label: '<?=$m_stat[3][0]?> 월', y: [<?=$m_stat[3][1]?>, <?=$m_stat[3][2]?>]},
				{ label: '<?=$m_stat[4][0]?> 월', y: [<?=$m_stat[4][1]?>, <?=$m_stat[4][2]?>]},
				{ label: '<?=$m_stat[5][0]?> 월', y: [<?=$m_stat[5][1]?>, <?=$m_stat[5][2]?>]},
				{ label: '<?=$m_stat[6][0]?> 월', y: [<?=$m_stat[6][1]?>, <?=$m_stat[6][2]?>]},
				{ label: '<?=$m_stat[7][0]?> 월', y: [<?=$m_stat[7][1]?>, <?=$m_stat[7][2]?>]},
				{ label: '<?=$m_stat[8][0]?> 월', y: [<?=$m_stat[8][1]?>, <?=$m_stat[8][2]?>]},
				{ label: '<?=$m_stat[9][0]?> 월', y: [<?=$m_stat[9][1]?>, <?=$m_stat[9][2]?>]},
				{ label: '<?=$m_stat[10][0]?> 월', y: [<?=$m_stat[10][1]?>, <?=$m_stat[10][2]?>]},
				{ label: '<?=$m_stat[11][0]?> 월', y: [<?=$m_stat[11][1]?>, <?=$m_stat[11][2]?>]}
			]
		}
		]
	});

	chart.render();
	chart2.render();
	chart3.render();
	chart4.render();
	chart5.render();

}
</script>
<ul class='ws_pragh_visit_wrap'>
	<li id="visit_portal_wrap"><div id="visit_portal"></div></li>
	<li id="visit_kw_wrap"><div id="visit_kw"></div></li>
	<li id="graph_month"></li>
</ul>

<div class='ws_pragh_wrap'>
	<div id="graph_week" style="height:220px;width:36%;">
	</div>
	<div id="graph_day" style="height:220px;width:60%;">
	</div>
</div>