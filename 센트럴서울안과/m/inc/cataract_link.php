	<div id='sub_portal'>
		<h2>노안 백내장 클리닉 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="cataract1.php" <?= $urls[3] == 'cataract1.php' ? 'selected="selected"' : '' ;?>>백내장 수술 선택가이드</option>
				<option value="cataract9.php" <?= $urls[3] == 'cataract9.php' ? 'selected="selected"' : '' ;?>>레이저 백내장 수술</option>
				<option value="cataract2.php" <?= $urls[3] == 'cataract2.php' ? 'selected="selected"' : '' ;?>>노안 백내장 수술 클리닉</option>
				<option value="cataract3.php" <?= $urls[3] == 'cataract3.php' ? 'selected="selected"' : '' ;?>>인증과 수상 연혁</option>
				<option value="cataract4.php" <?= $urls[3] == 'cataract4.php' ? 'selected="selected"' : '' ;?>>최첨단 장비</option>
				<option value="cataract5.php" <?= $urls[3] == 'cataract5.php' ? 'selected="selected"' : '' ;?>>프리미엄급 인공수정체</option>
				<option value="cataract6.php" <?= $urls[3] == 'cataract6.php' ? 'selected="selected"' : '' ;?>>의사들과 가족들이 수술받는 병원</option>
				<option value="cataract7.php" <?= $urls[3] == 'cataract7.php' ? 'selected="selected"' : '' ;?>>고객안심시스템</option>
			</select>
			</span>
		</p>
	</div>