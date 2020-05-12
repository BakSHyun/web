	<div id='sub_portal'>
		<h2>녹내장 센터 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="glaucoma9.php" <?= $urls[3] == 'glaucoma9.php' ? 'selected="selected"' : '' ;?>>CS 녹내장 클리닉 소개</option>
				<option value="glaucoma8.php" <?= $urls[3] == 'glaucoma8.php' ? 'selected="selected"' : '' ;?>>최소침습녹내장수술</option>
				<option value="glaucoma10.php" <?= $urls[3] == 'glaucoma10.php' ? 'selected="selected"' : '' ;?>>젠(XEN) 녹내장 스텐트 삽입술</option>
				<option value="glaucoma11.php" <?= $urls[3] == 'glaucoma11.php' ? 'selected="selected"' : '' ;?>>아이스텐트 (iStent) 수술</option>
				<!-- <option value="glaucoma12.php" <?= $urls[3] == 'glaucoma12.php' ? 'selected="selected"' : '' ;?>>마이크로펄스레이저 녹내장 수술</option> -->
				<!-- <option value="glaucoma13.php" <?= $urls[3] == 'glaucoma13.php' ? 'selected="selected"' : '' ;?>>백내장-녹내장 병합 수술</option> -->
				<option value="glaucoma4.php" <?= $urls[3] == 'glaucoma4.php' ? 'selected="selected"' : '' ;?>>녹내장이란</option>
				<option value="glaucoma6.php" <?= $urls[3] == 'glaucoma6.php' ? 'selected="selected"' : '' ;?>>녹내장의 증상과 분류</option>
				<option value="glaucoma7.php" <?= $urls[3] == 'glaucoma7.php' ? 'selected="selected"' : '' ;?>>녹내장 위험인자 및 유전성</option>
				<option value="glaucoma2.php" <?= $urls[3] == 'glaucoma2.php' ? 'selected="selected"' : '' ;?>>CS 녹내장 정밀 진단 프로그램</option>
				<option value="glaucoma3.php" <?= $urls[3] == 'glaucoma3.php' ? 'selected="selected"' : '' ;?>>CS 치료 프로그램</option>
				<!-- <option value="glaucoma1.php" <?= $urls[3] == 'glaucoma1.php' ? 'selected="selected"' : '' ;?>>Dr. 최재완</option> -->
			</select>
			</span>
		</p>
	</div>