	<div id='sub_portal'>
		<h2>망막 센터 메뉴 더보기</h2>
		<p>
			<span class='select_wrap'>
			<select id='select_portal'>
				<? $urls = explode('/',$PHP_SELF); ?>
				<option value="retina1.php" <?= $urls[3] == 'retina1.php' ? 'selected="selected"' : '' ;?>>Dr. 황종욱</option>
				<option value="retina2.php" <?= $urls[3] == 'retina2.php' ? 'selected="selected"' : '' ;?>>CS원스톱 망막치료시스템</option>
				<option value="retina3.php" <?= $urls[3] == 'retina3.php' ? 'selected="selected"' : '' ;?>>황반변성 클리닉</option>
				<option value="retina4.php" <?= $urls[3] == 'retina4.php' ? 'selected="selected"' : '' ;?>>당뇨망막 클리닉</option>
				<option value="retina5.php" <?= $urls[3] == 'retina5.php' ? 'selected="selected"' : '' ;?>>Constellation 유리체절제술</option>
				<option value="retina6.php" <?= $urls[3] == 'retina6.php' ? 'selected="selected"' : '' ;?>>안구내 항체 주입술</option>
				<option value="retina7.php" <?= $urls[3] == 'retina7.php' ? 'selected="selected"' : '' ;?>>범망막 광응고술(PRP)</option>
				<option value="retina8.php" <?= $urls[3] == 'retina8.php' ? 'selected="selected"' : '' ;?>>OCT Angiography 망막검사</option>
				<option value="retina9.php" <?= $urls[3] == 'retina9.php' ? 'selected="selected"' : '' ;?>>형광안저촬영</option>
			</select>
			</span>
		</p>
	</div>