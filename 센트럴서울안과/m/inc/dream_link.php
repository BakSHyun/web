	<div id='sub_portal'>
		<h2>건조증, 드림렌즈 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="dream1.php" <?= $urls[3] == 'dream1.php' ? 'selected="selected"' : '' ;?>>드림렌즈</option>
				<option value="dream2.php" <?= $urls[3] == 'dream2.php' ? 'selected="selected"' : '' ;?>>드림렌즈 체험기</option>
				<option value="dream8.php" <?= $urls[3] == 'dream8.php' ? 'selected="selected"' : '' ;?>>안구건조증</option>
			</select>
			</span>
		</p>
	</div>