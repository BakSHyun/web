<div id='admin_sub_wrap'>

	<h2>예약 설정 소스</h2>

	<div id='reserve_search_wrap' style='padding:25px;'>
		<h5><i class="fa fa-pencil"></i> 공통 삽입 - 파일 최상단에 넣어 주세요</h5>
		<div class='source_area'>
			<p><span class='brown'>&lt;?</span> <span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER</span><span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>'/amconfig.php'</span><span class='brown'>;</span> <span class='brown'>?&gt;</span></p>
		</div>
	</div>

	<div id='reserve_search_wrap' style='padding:25px;'>
		<h5><i class="fa fa-pencil"></i> 예약이 보여질 부분에 넣어주세요</h5>
		<div class='source_area'>
			<p><span class='brown'>&lt;?</span></p>

			<p><span class='blue'>if</span><span class='brown'>(!</span><span class='blue'>$</span><span class='dark_cyon'>code</span><span class='brown'>)</span> <span class='blue'>$</span><span class='dark_cyon'>code</span> = <span class='magenta'>"코드값"</span><span class='brown'>;</span></p>

			<p><span class='blue'>if</span><span class='brown'>(!</span><span class='blue'>$</span><span class='dark_cyon'>mode</span><span class='brown'>)</span> <span class='blue'>$</span><span class='dark_cyon'>mode</span> = <span class='magenta'>"seldate"</span><span class='brown'>;</span> <span class='green'>// 예약하기</span></p>
			<p><span class='blue'>if</span><span class='brown'>(!</span><span class='blue'>$</span><span class='dark_cyon'>mode</span><span class='brown'>)</span> <span class='blue'>$</span><span class='dark_cyon'>mode</span> = <span class='magenta'>"confirm"</span><span class='brown'>;</span> <span class='green'>// 예약확인</span></p>

			<p><span class='blue'>include $</span><span class='dark_cyon'>_SERVER<span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>"/"</span><span class='brown'>.</span>$<span class='dark_cyon'>INDIR</span>.<span class='magenta'>"/mpreserve/reserve.php"</span><span class='brown'>;</span></p>
			<p><span class='brown'>?&gt;</span></p>
		</div>
	</div>

</div>