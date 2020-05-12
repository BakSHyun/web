<div id='admin_sub_wrap'>

	<h2>회원 설정 소스</h2>

	<div id='reserve_search_wrap' style='padding:25px;'>
		<h5><i class="fa fa-pencil"></i> 공통 삽입 - 파일 최상단에 넣어 주세요</h5>
		<div class='source_area'>
			<p><span class='brown'>&lt;?</span> <span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER</span><span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>'/amconfig.php'</span><span class='brown'>;</span> <span class='brown'>?&gt;</span></p>
			<p><span class='brown'>&lt;?</span> <span class='blue'>require_once $</span><span class='dark_cyon'>_SERVER</span><span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>'/mpboard/inc/sys.php'</span><span class='brown'>;</span> <span class='green'>// 최신게시물 적용시</span> <span class='brown'>?&gt;</span></p>
		</div>
	</div>

	<div id='reserve_search_wrap' style='padding:25px;'>
		<h5><i class="fa fa-pencil"></i> 게시판 삽입 - 해당부분에 해당 소스를 삽입하여 주세요</h5>
		<div class='source_area'>
			<p><span class='brown'>&lt;?</span></p>

			<p><span class='blue'>if</span><span class='brown'>(!</span><span class='blue'>$</span><span class='dark_cyon'>group</span><span class='brown'>)</span> <span class='blue'>$</span><span class='dark_cyon'>group</span> = <span class='magenta'>"basic"</span><span class='brown'>;</span></p>
			<p><span class='blue'>if</span><span class='brown'>(!</span><span class='blue'>$</span><span class='dark_cyon'>code</span><span class='brown'>)</span> <span class='blue'>$</span><span class='dark_cyon'>code</span> = <span class='magenta'>"<?=$code?>"</span><span class='brown'>;</span></p>
			<p><span class='blue'>include $</span><span class='dark_cyon'>_SERVER<span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>"/"</span><span class='brown'>.</span>$<span class='dark_cyon'>INDIR</span>.<span class='magenta'>"/mpboard/board.php"</span><span class='brown'>;</span></p>
			<p><span class='brown'>?&gt;</span></p>
		</div>
	</div>

	<div id='reserve_search_wrap' style='padding:25px;'>
		<h5><i class="fa fa-pencil"></i> 최근게시물 삽입 - 해당부분에 해당 소스를 삽입하여 주세요</h5>
		<div class='source_area'>
			<p><span class='brown'>&lt;?</span></p>

			<p><span class='blue'>$</span><span class='dark_cyon'>group</span> = <span class='magenta'>"basic"</span><span class='brown'>;</span></p>
			<p><span class='blue'>$</span><span class='dark_cyon'>code</span> = <span class='magenta'>"<?=$code?>"</span><span class='brown'>;</span></p>
			<p><span class='blue'>$</span><span class='dark_cyon'>skin </span> = <span class='magenta'>"default"</span><span class='brown'>;</span></p>
			<p><span class='blue'>$</span><span class='dark_cyon'>line </span> = <span class='magenta'>3</span><span class='brown'>;</span> <span class='green'>// 최근 게시물 갯수</span></p>
			<p><span class='blue'>$</span><span class='dark_cyon'>cutwidth </span> = <span class='magenta'>180</span><span class='brown'>;</span> <span class='green'>// 제목글 길이</span></p>
			<p><span class='blue'>$</span><span class='dark_cyon'>contentscutwidth </span> = <span class='magenta'>"300"</span><span class='brown'>;</span> <span class='green'>// 내용글 길이</span>X</p>
			<p>&nbsp;</p>

			<p><span class='blue'>$</span><span class='dark_cyon'>blistsort </span> = <span class='magenta'>1</span><span class='brown'>;</span> <span class='green'>// 링크된 게시판 정렬. 기본 : 1, 수정 : 2</span></p>
			<p><span class='blue'>$</span><span class='dark_cyon'>bfsort </span> = <span class='magenta'>"ino"</span><span class='brown'>;</span> <span class='green'>// ino: 기본정렬 , point : 점수 , download : 다운로드 , view : 보기</span></p>
			<p><span class='blue'>$</span><span class='dark_cyon'>bsort </span> = <span class='magenta'>"desc"</span><span class='brown'>;</span> <span class='green'>// desc : 내림차순 , asc : 오름차순</span></p>
			<p>&nbsp;</p>

			<p><span class='blue'>$</span><span class='dark_cyon'>boardurl  </span> = <span class='magenta'>"/"</span><span class='brown'>.</span><span class='dark_cyon'>$INDIR</span><span class='brown'>.</span><span class='magenta'>"/경로/주소.php"</span><span class='brown'>;</span> <span class='green'>// 게시판 URL 삽입</span></p>
			<p><span class='blue'>include $</span><span class='dark_cyon'>_SERVER<span class='brown'>[DOCUMENT_ROOT].</span><span class='magenta'>"/"</span><span class='brown'>.</span>$<span class='dark_cyon'>INDIR</span>.<span class='magenta'>"/mpboard/newlist.php"</span><span class='brown'>;</span></p>
			<p><span class='brown'>?&gt;</span></p>
		</div>
	</div>

</div>