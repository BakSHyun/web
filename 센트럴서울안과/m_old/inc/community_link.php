	<div id='sub_portal'>
		<h2>커뮤니티 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="community1.php" <?= $urls[3] == 'community1.php' ? 'selected="selected"' : '' ;?>>진료 상담</option>
				<option value="community2.php" <?= $urls[3] == 'community2.php' ? 'selected="selected"' : '' ;?>>진료 예약</option>
				<option value="community3.php" <?= $urls[3] == 'community3.php' ? 'selected="selected"' : '' ;?>>언론속의 센트럴</option>
                <option value="community4.php" <?= $urls[3] == 'community4.php' ? 'selected="selected"' : '' ;?>>모바일 비용문의</option>
                <option value="community5.php" <?= $urls[3] == 'community5.php' ? 'selected="selected"' : '' ;?>>약도 MMS 전송</option>
			</select>
			</span>
		</p>
	</div>