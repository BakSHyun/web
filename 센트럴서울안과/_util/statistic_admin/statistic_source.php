<div id='admin_sub_wrap'>

	<h2>접속 / 통계 삽입 소스</h2>


	<div id='reserve_search_wrap' style='padding:25px;'>
		<h5><i class="fa fa-pencil"></i> 공통 삽입 - 파일 최상단에 넣어 주세요</h5>
		<div class='source_area'>
			<p><span class='brown'>&lt;?</span> <span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER</span><span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>'/amconfig.php'</span><span class='brown'>;</span> <span class='brown'>?&gt;</span></p>
		</div>
	</div>

	<div id='reserve_search_wrap' style='padding:25px;'>
		<h5><i class="fa fa-pencil"></i> 접속 &amp; 유입 통계 소스</h5>
		<div class='source_area'>
			<p><span class='brown'>&lt;?</span> </p>

			<p><span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER<span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>"/"</span><span class='brown'>.</span>$<span class='dark_cyon'>INDIR</span>.<span class='magenta'>"/_util/pageview.php"</span><span class='brown'>;</span> <span class='green'>// 접속 통계</span></p>
			<p><span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER<span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>"/"</span><span class='brown'>.</span>$<span class='dark_cyon'>INDIR</span>.<span class='magenta'>"/_util/statistics.php"</span><span class='brown'>;</span> <span class='green'>// 유입 통계</span></p>

			<p><span class='brown'>?&gt;</span> </p>
		</div>
	</div>

</div>