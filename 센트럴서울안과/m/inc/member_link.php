	<div id='sub_portal'>
		<h2>회원서비스 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="login.php" <?= $urls[3] == 'login.php' ? 'selected="selected"' : '' ;?>>회원 로그인</option>
				<option value="join.php" <?= $urls[3] == 'join.php' ? 'selected="selected"' : '' ;?>>회원가입</option>
			</select>
			</span>
		</p>
	</div>