	<div id='sub_portal'>
		<h2>시력교정, 각막 센터 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="myopia1.php" <?= $urls[3] == 'myopia1.php' ? 'selected="selected"' : '' ;?>>Dr. 김균형</option>
				<!--<option value="myopia7.php" <?= $urls[3] == 'myopia7.php' ? 'selected="selected"' : '' ;?>>CS 엑스퍼트 라섹</option>-->
				<option value="myopia2.php" <?= $urls[3] == 'myopia2.php' ? 'selected="selected"' : '' ;?>>CS 고도, 초고도근시 클리닉</option>
				<option value="myopia3.php" <?= $urls[3] == 'myopia3.php' ? 'selected="selected"' : '' ;?>>안전한 안내렌즈삽입술이란</option>
				<option value="myopia4.php" <?= $urls[3] == 'myopia4.php' ? 'selected="selected"' : '' ;?>>고도, 초고도근시와 백내장</option>
				<option value="myopia5.php" <?= $urls[3] == 'myopia5.php' ? 'selected="selected"' : '' ;?>>고도, 초고도근시와 녹내장</option>
				<option value="myopia6.php" <?= $urls[3] == 'myopia6.php' ? 'selected="selected"' : '' ;?>>고도, 초고도근시와 망막질환</option>
			</select>
			</span>
		</p>
	</div>
