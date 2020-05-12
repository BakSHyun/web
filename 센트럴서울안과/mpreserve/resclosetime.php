<script language="JavaScript">
function view_time(ryear,rmonth,rday)
{
	var myform = document.rform;
	myform.ryear.value = ryear;
	myform.rmonth.value = rmonth;
	myform.rday.value = rday;
	myform.submit();
}

function setclose(restime,restype)
{
	var resform = document.rform;
	resform.rtime.value = restime;
	resform.rtype.value = restype;
	resform.m2.value = "resclosetimedb";
	resform.submit();
}
</script>

<style type="text/css">
<!--
.fonttype1 {
	font-family:Verdana;
	font-size:11px;
	color:#333333;
}
.fonttype2 {
	font-family:Verdana;
	font-size:15px;
	font-weight:bold;
	color:#003399;
}
.fonttype3 {
	font-family:Verdana;
	font-size:15px;
	color:#333333;
}
.fonttype4 {
	font-family:Verdana;
	font-size:9px;
	color:#333333;
}
//-->
</style>

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td><img src="img/spacer.gif" width="50" height="50"></td>
	</tr>
	<tr>
		<td align="center"><span class="style8">[휴진 설정]</span></td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
	</tr>
</table>

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table width="100%" cellpadding="0" cellspacing="0">
			<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data" name="rform">
			<input type="hidden" name="m1" value="<?=$m1?>">
			<input type="hidden" name="m2" value="<?=$m2?>">
			<input type="hidden" name="code" value="<?=$code?>">
			<input type="hidden" name="ryear" value="<?=$ryear?>">
			<input type="hidden" name="rmonth" value="<?=$rmonth?>">
			<input type="hidden" name="rday" value="<?=$rday?>">
			<input type="hidden" name="year" value="<?=$year?>">
			<input type="hidden" name="month" value="<?=$month?>">
			<input type="hidden" name="rtime" value="">
			<input type="hidden" name="rtype" value="">
			<input type="hidden" name="viewtime" value="1">
				<tr>
					<td height="30" style="font-size:15px" class="fonttype3">
						<?
						if(!$code)
						{
							$result = mysql_query("select code, name from mpreserve_config order by no asc",$connect);
							
							if(!mysql_num_rows($result))
							{
								echo "지점을 먼저 생성해 주세요.";
							}
							else if(mysql_num_rows($result) == 1)
							{
								$row = mysql_fetch_array($result);
								$code = $row[code];
							}
							else
							{
								while($rows = mysql_fetch_array($result))
								{
									echo "<input type='radio' name='code' value='$rows[code]' onclick=\"location.href='$PHP_SELF?m1=$m1&m2=$m2&code=$rows[code]'\">$rows[name]&nbsp;&nbsp;";
								}
							}
							echo "(* 지점을 선택하세요.)";
						}
						else
						{
							$branch = mysql_result(mysql_query("select name from mpreserve_config where code='$code'",$connect),0,0);
							echo "<b>[".$branch."]</b>";
						}
						?>
					</td>
				</tr>
				<? if($code) { ?>
				<tr>
					<td valign="top">
						<!-- 달력 -->
						<?
						if(!$year) $year = date('Y');
						if(!$month) $month = date('n');
						
						$ndate = $year.'-'.$month.'-1';
						$ndate2 = strtotime($ndate);
						$fweekday = date("w", $ndate2);
						$totdays = date("t", $ndate2); // 그달의 날짜수
						
						$fblank = $fweekday; // 달력 첫 공백
						
						if($month == 1)
						{
							$pre_year = $year - 1;
							$pre_month = 12;
						}
						else
						{
							$pre_year = $year;
							$pre_month = $month - 1;
						}
						
						if($month == 12)
						{
							$next_year = $year + 1;
							$next_month = 1;
						}
						else
						{
							$next_year = $year;
							$next_month = $month + 1;
						}
						
						$pre_month = "<a href='".$PHP_SELF."?m1=$m1&m2=$m2&code=$code&year=".$pre_year."&month=".$pre_month."'>".$pre_year."년 ".$pre_month."월</a>";
						$next_month = "<a href='".$PHP_SELF."?m1=$m1&m2=$m2&code=$code&year=".$next_year."&month=".$next_month."'>".$next_year."년 ".$next_month."월</a>";

						$cellwidth = 100 / 7;
						$arr_bgcolor = array("#FEECEC","#FDFDFD","#FDFDFD","#FDFDFD","#FDFDFD","#FDFDFD","#F2F2FE");
						?>
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fonttype1">
										<tr><td height="1" bgcolor="#333333" colspan="7"></td></tr>
										<tr>
											<td height="30" colspan="7" align="center">
												<span class="fonttype1"><?=$pre_month?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="fonttype2"><?=$year?>년 <?=$month?>월</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="fonttype1"><?=$next_month?></span>
											</td>
										</tr>
										<tr><td height="1" bgcolor="#CCCCCC" colspan="7"></td></tr>
										<tr>
											<td width="<?=$cellwidth?>%" height="28" align="center" bgcolor="<?=$arr_bgcolor[0]?>" class="fonttype3" style="color:#FE2828">일</td>
											<td width="<?=$cellwidth?>%" align="center" bgcolor="<?=$arr_bgcolor[1]?>" class="fonttype3">월</td>
											<td width="<?=$cellwidth?>%" align="center" bgcolor="<?=$arr_bgcolor[2]?>" class="fonttype3">화</td>
											<td width="<?=$cellwidth?>%" align="center" bgcolor="<?=$arr_bgcolor[3]?>" class="fonttype3">수</td>
											<td width="<?=$cellwidth?>%" align="center" bgcolor="<?=$arr_bgcolor[4]?>" class="fonttype3">목</td>
											<td width="<?=$cellwidth?>%" align="center" bgcolor="<?=$arr_bgcolor[5]?>" class="fonttype3">금</td>
											<td width="<?=$cellwidth?>%" align="center" bgcolor="<?=$arr_bgcolor[6]?>" class="fonttype3" style="color:#282DFE">토</td>
										</tr>
										<tr><td height="1" bgcolor="#CCCCCC" colspan="7"></td></tr>
										<?
										/*** 달력 프로그램 시작 ***/
										$day2 = 1;
										for($i=1; $i<=$totdays+$fblank; $i++)
										{
											if($i%7 == 1) echo "<tr>";
											if($i <= $fblank)	{ echo "<td height='100'>&nbsp;</td>"; }
											else
											{
												if($month < 10) $month2 = "0".$month;
												else $month2 = $month;
												if($day2 < 10) $day3 = "0".$day2;
												else $day3 = $day2;
												$ttime = $year.'-'.$month2.'-'.$day3;
												$week2 = date("w", strtotime($ttime));
												$ttime2 = date('Y-m-d');
												$bgcolor = "bgcolor = '$arr_bgcolor[$week2]'";
												
												if(strtotime($ttime) < strtotime($ttime2))
												{
													echo "
													<td height='100' align='center' $bgcolor valign='top'>
														<table width='100%' cellspacing='0' cellpadding='4'>
															<tr>
																<td class='fonttype3'>$day2</td>
															</tr>
															<tr>
																<td class='fonttype4'>";
													$res = mysql_query("select closetime from mpreserve_close where code='$code' and closedate='$ttime' order by closetime asc");
													while($rows = mysql_fetch_array($res))
														echo "<font color='#D92323'>".$rows[closetime]."</font><br>";
													echo "
																</td>
															</tr>
														</table>
													</td>
													";
												}
												else
												{
													echo "
													<td height='100' align='center' $bgcolor valign='top' style='cursor:hand' onmouseover=\"this.style.border='1px solid #3333CC'\" onmouseout=\"this.style.border='0px'\" onclick=\"view_time('$year','$month','$day2')\">
														<table width='100%' cellspacing='0' cellpadding='4'>
															<tr>
																<td class='fonttype3' style='color:#3333CC'>$day2</td>
															</tr>
															<tr>
																<td class='fonttype4'>";
													$res = mysql_query("select closetime from mpreserve_close where code='$code' and closedate='$ttime' order by closetime asc");
													while($rows = mysql_fetch_array($res))
														echo "<font color='#D92323'>".$rows[closetime]."</font><br>";
													echo "
																</td>
															</tr>
														</table>
													</td>
													";
												}
												$day2++;
											}
											if($i%7 == 0) echo "</tr><tr><td height='1' bgcolor='#CCCCCC' colspan='7'></td></tr>";
										}
										/*** 달력 프로그램 끝 ***/
										?>
									</table>
									<br>
								</td>
							</tr>
						</table>
						<!-- 달력 -->
					</td>
					<td width="10"></td>
					<td width="180" valign="top">
						<? if(!$viewtime) { ?>
						<span class="fonttype1" style="color:#3333CC">※ 휴진 설정하실 날짜를<br>선택해 주세요.</span>
						<? } else { ?>
						<table width="100%" cellspacing="1" cellpadding="4" bgcolor="#CCCCCC">
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%" cellspacing="0" cellpadding="0" class="fonttype1">
										<tr>
											<td height="30" colspan="2" style="font-size:12px; color:#3333CC">날짜 : <?=$ryear?>년 <?=$rmonth?>월 <?=$rday?>일</td>
										</tr>
										<tr><td height="1" colspan="2" bgcolor="#EEEEEE"></td></tr>
										<tr><td height="4" colspan="2"></td></tr>
										<tr>
											<td colspan="2">
												<table width="100%" cellspacing="1" cellpadding="0" class="fonttype1" bgcolor="#EEC9FD">
													<tr>
														<td width="60" height="26" bgcolor="#FAF1FE" align="center">시간</td>
														<td width="60" bgcolor="#FAF1FE" align="center">구분</td>
														<td width="60" bgcolor="#FAF1FE" align="center">설정</td>
													</tr>
													<?
													if($rmonth < 10) $rmonth2 = "0".$rmonth;
													else $rmonth2 = $rmonth;
													if($rday < 10) $rday2 = "0".$rday;
													else $rday2 = $rday;
													$rdate = $ryear."-".$rmonth2."-".$rday2;
													$week = date("w", strtotime($rdate));
													$query = "select time$week from mpreserve_config where code = '$code'";
													if($result = mysql_query($query))
													{
														$row = mysql_fetch_row($result);
														if($row[0]) $arr_time = explode("|", $row[0]);
														$i = 0;
														if(is_array($arr_time))
														{
															foreach($arr_time as $times)
															{
																$res_time = mysql_query("select count(*) from mpreserve_close where code='$code' and closedate='$rdate' and closetime='$times'");
																$cnt_time = mysql_result($res_time,0,0);
																if($cnt_time > 0)
																{
																	$resstate = "<font color='#D92323'>휴진</font>";
																	$setresstate = "취소";
																	$restype = "0";
																}
																else
																{
																	$resstate = "진료";
																	$setresstate = "<font color='#D92323'>설정</font>";
																	$restype = "1";
																}
																/*
																$res_time = mysql_query("select count(*) from ".$this->tables[reserve]." where code='$this->code' and resdate = '$rdate' and restime='$times'");
																$cnt_time = mysql_result($res_time,0,0);
																if($cnt_time >= $this->config[numofper]) $restimes[$i][linkreserve] = "<font color='#999999'>예약불가</font>";
																else $restimes[$i][linkreserve] = "<a href=\"javascript:gonext('$times')\" class='restype'>예약가능</a>";
																$restimes[$i][rtime] = $times;
																*/
																echo "
																<tr>
																	<td height='26' align='center' bgcolor='#FFFFFF'>$times</td>
																	<td align='center' bgcolor='#FFFFFF'>$resstate</td>
																	<td align='center' bgcolor='#FFFFFF' style=\"cursor:hand\" onmouseover=\"this.style.background='#FAF1FE'\" onmouseout=\"this.style.background='#FFFFFF'\" onclick=\"setclose('$times','$restype')\">$setresstate</td>
																</tr>
																";
																$i++;
															}
															echo "
															<tr>
																<td height='26' align='center' bgcolor='#FFFFFF' colspan='3'>
																	<span style='cursor:hand;color:#D92323' onclick=\"setclose('$times','allclose')\">전체 휴진</span>
																	|
																	<span style='cursor:hand' onclick=\"setclose('$times','allopen')\">전체 취소</span>
																</td>
															</tr>
															";
														}
														else
														{
															echo "
															<tr>
																<td height='26' align='center' bgcolor='#FFFFFF' colspan='3'>설정 가능한 시간이 없습니다.</td>
															</tr>
															";
														}
													}
													?>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<? } ?>
					</td>
				</tr>
				<? } ?>
			</form>
			</table>
		</td>
	</tr>
</table>