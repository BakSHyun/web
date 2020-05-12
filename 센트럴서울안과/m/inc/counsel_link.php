	<div id='sub_portal'>
		<h2>고객 만족 센터 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="counsel1.php" <?= $urls[3] == 'counsel1.php' ? 'selected="selected"' : '' ;?>>모바일 상담</option>
				<option value="counsel2.php" <?= $urls[3] == 'counsel2.php' ? 'selected="selected"' : '' ;?>>모바일 예약</option>
				<option value="counsel3.php" <?= $urls[3] == 'counsel3.php' ? 'selected="selected"' : '' ;?>>카카오톡상담</option>
				<option value="counsel4.php?cate1=<?=urlencode("백내장")?>" <?= $urls[3] == 'counsel4.php' ? 'selected="selected"' : '' ;?>>수술 체험기</option>
				<option value="counsel5.php" <?= $urls[3] == 'counsel5.php' ? 'selected="selected"' : '' ;?>>언론속 센트럴서울안과</option>
				<option value="counsel6.php" <?= $urls[3] == 'counsel6.php' ? 'selected="selected"' : '' ;?>>CS EYE 소식</option>
				<option value="counsel7.php" <?= $urls[3] == 'counsel7.php' ? 'selected="selected"' : '' ;?>>채용 안내</option>
				<option value="community7.php" <?= $urls[3] == 'community7.php' ? 'selected="selected"' : '' ;?>>영상체험인터뷰</option>
				<option value="community8.php" <?= $urls[3] == 'community8.php' ? 'selected="selected"' : '' ;?>>진행중인 이벤트</option>
			</select>
			</span>
		</p>
	</div>
