<div id='admin_sub_wrap' style='min-height:1100px;'>
	<h2>대쉬보드</h2>

	<? include_once "graph.php"; ?>

	<div id='ws_wrap'>
		<div id='ws1' class='ws_box'>
			<h4>최근 게시물</h4>
			<div class='ws_table_type1'>
				<table>
					<colgroup>
						<col style="width:100px;" />
						<col style="width:*;" />
						<col style="width:80px;" />
						<col style="width:80px;" />
					</colgroup>
					<thead>
						<tr>
							<th>게시판</th>
							<th>제목</th>
							<th>작성자</th>
							<th>작성일</th>
						</tr>
					</thead>
					<tbody>
<?
			$query = "select * from amboard_basic where del_state <> 'Y' and code <>'' order by wdate desc limit 5";
			$result = mysql_query($query);
			while($row=mysql_fetch_array($result)) {
				if($row[code]){
					$code_name = mysql_result(mysql_query("select name from amboard_config where code= '$row[code]'",$connect),0,0);
					//echo "select name from amboard_config where code= '$row[code]'";
				}
?>
						<tr>
							<th><?=$code_name?></th>
							<td><?=$row[title]?></td>
							<th><?=$row[name]?></th>
							<th><?=substr($row[wdate],2,8)?></th>
						</tr>
<? } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div id='ws3' class='ws_box'>
			<h4>최근 예약</h4>
			<div class='ws_table_type1'>
				<table>
					<colgroup>
						<col style="width:*px;" />
						<col style="width:60px;" />
						<col style="width:120px;" />
						<col style="width:120px;" />
						<col style="width:60px;" />
					</colgroup>
					<thead>
						<tr>
							<th>지점</th>
							<th>예약자</th>
							<th>연락처</th>
							<th>예약일</th>
							<th>예약시간</th>
						</tr>
					</thead>
					<tbody>
<?
			$query = "select * from mpreserve order by wdate desc limit 5";
			$result = mysql_query($query);
			while($row=mysql_fetch_array($result)) {
					$branch = mysql_result(mysql_query("select name from mpreserve_config where code= '$row[code]'",$connect),0,0);
?>
						<tr>
							<th><?=$branch?></th>
							<th><?=$row[name]?></th>
							<th><?=$row[hphone1]?>-<?=$row[hphone2]?>-<?=$row[hphone3]?></th>
							<th><?=$row[resdate]?></th>
							<th><?=$row[restime]?></th>
						</tr>
<? } ?>
					</tbody>
				</table>
			</div>
		</div>
<!--		<div id='ws2' class='ws_box'>
			<h4>신규 가입자</h4>
			<div class='ws_table_type1'>
				<table>
					<colgroup>
						<col style="width:70px;" />
						<col style="width:100px;" />
						<col style="width:90px;" />
						<col style="width:60px;" />
					</colgroup>
					<thead>
						<tr>
							<th>아이디</th>
							<th>이름</th>
							<th>연락처</th>
							<th>가입일</th>
						</tr>
					</thead>
					<tbody>
<?
			$query = "select * from ammember order by regdate desc limit 5";
			$result = mysql_query($query);
			while($row=mysql_fetch_array($result)) {
?>
						<tr>
							<th><?=$row[id]?></th>
							<th><?=$row[name]?></th>
							<th><?=$row[htel]?></th>
							<th><?=substr($row[regdate],2,8)?></th>
						</tr>
<? } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div id='ws4' class='ws_box'>
			<h4>메디픽스 공지사항</h4>
				<iframe src="http://medipix.co.kr" frameborder="0" width="100%" height="130" allowTransparency="true"
				 name="ifrm" id="auto_iframe" marginwidth="0" marginheight="0" scrolling="no"
				allowtransparency="true"></iframe>
		</div>
-->
	</div>

</div>