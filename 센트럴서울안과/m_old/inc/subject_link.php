	<div id='sub_portal'>
		<h2>센트럴 서울 클리닉 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="subject1.php" <?= $urls[3] == 'subject1.php' ? 'selected="selected"' : '' ;?>>노안/백내장 클리닉</option>
				<option value="subject2.php" <?= $urls[3] == 'subject2.php' ? 'selected="selected"' : '' ;?>>녹내장 클리닉</option>
				<option value="subject3.php" <?= $urls[3] == 'subject3.php' ? 'selected="selected"' : '' ;?>>망막 클리닉</option>
				<option value="subject4.php" <?= $urls[3] == 'subject4.php' ? 'selected="selected"' : '' ;?>>드림렌즈</option>
			</select>
			</span>
		</p>
	</div>
