	<div id='sub_portal'>
		<h2>병원소개 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="intro1.php" <?= $urls[3] == 'intro1.php' ? 'selected="selected"' : '' ;?>>병원소개</option>
				<option value="intro2.php" <?= $urls[3] == 'intro2.php' ? 'selected="selected"' : '' ;?>>의료진소개</option>
				<option value="intro3.php" <?= $urls[3] == 'intro3.php' ? 'selected="selected"' : '' ;?>>진료안내</option>
				<option value="intro4.php" <?= $urls[3] == 'intro4.php' ? 'selected="selected"' : '' ;?>>둘러보기</option>
				<option value="intro5.php" <?= $urls[3] == 'intro5.php' ? 'selected="selected"' : '' ;?>>오시는길</option>
			</select>
			</span>
		</p>
	</div>