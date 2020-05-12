<? include "../inc/head.php"; ?>

    <div id='home_wrap'>
		<div id='back_btn'><a onclick='history.go(-1);'><img src='../img/common/back_btn.png' alt='뒤로가기'></a></div>
		<div id='home_btn'><a href='/m/'><img src='../img/common/home_btn.png' alt='메인페이지로 가기'></a></div>
		<h1>MMS 약도전송</h1>
	</div>

	<? include "../inc/community_link.php"; ?>

    <div id='sub_content'>
	  <div class='content'>
	  <img src="../img/sub/board_5.jpg" border="0"><br>
	  <br>

	<div style='text-align:center;'>
		<img src="../img/mms/mms_cell.png" alt='글쓰기'>
	</div>
		

<form name="frm_mms_process" method="post" action="mms_process.php" enctype="multipart/form-data"  onSubmit="return checkForm(this)">

	<table class='bbs_write' style='width:100%;'>
		<colgroup>
		<col style="width:30%;" />
		<col style="width:70%;" />
		</colgroup>
		<tbody>
			<tr>
				<td colspan='2'>
					<ul class='ic'>
						<li>
							<span class='select_wrap'>
							<select name='hphone1'>
								<option value="010">010</option>
								<option value="011">011</option>
								<option value="016">016</option>
								<option value="017">017</option>
								<option value="018">018</option>
								<option value="019">019</option>
							</select>
							</span>
						</li>
						<li class='ic_num'><div class='il noj'><span><label for='hphone2'>둘째자리</label><input type='text' name='hphone2' id='hphone2' title='두번째자리' maxlength='4'></span></div></li>
						<li class='ic_num'><div class='il noj'><span><label for='hphone3'>셋째자리</label><input type='text' name='hphone3' id='hphone3' title='세번째자리' maxlength='4'></span></div></li>
					</ul>
					<div class='clr'></div>
				</td>
			</tr>
		</tbody>
	</table>

	<div style='text-align:center;'>
		<input type="image" src="../img/board/bt.png" alt='글쓰기'>
	</div>


</form>

	  </div>
  </div>
<? include "../inc/foot.php"; ?>