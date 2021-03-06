<!DOCTYPE html>
<html lang='ko'>
<head>
<meta charset="utf-8"/>
<meta name='author' content='조성민' />
<meta name='keywords' content='센트럴 서울 안과' />
<meta name='description' content='센트럴 서울 안과' />
<meta name="viewport" content="width=640px, maximum-scale=5.0, minimum-scale=0.5; user-scalable=yes" />
<title>:: 센트럴 서울 안과 모바일 ::</title>

<link rel="stylesheet" type="text/css" href="../css/common.css">
<link rel='stylesheet' href='../css/sub.css' media='all' />
<style type="text/css">
	@import url(http://fonts.googleapis.com/earlyaccess/nanummyeongjo.css);
	@import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);
	@import url(http://fonts.googleapis.com/earlyaccess/nanumgothiccoding.css);

	*{padding:0;margin:0;font-family:'Nanum Gothic';}
	img{display:block;margin:0 auto;}
	.wrapper{width:100%}
	.landing_vi{max-width: 100%;min-width: 640px;}
	.cnt{}
	.cnt p{width:640px; margin:0 auto;}

	.counsel{width:640px;margin:0 auto; background:url('img/m_img22.jpg') no-repeat left top;height:602px;position:relative;}
	.counsel .name{width:425px;height:42px;position:absolute;top:17px; left:165px;}
	.counsel .telarea{position:absolute;top:74px; left:165px;font-size:22px;font-weight:bold;}
	.counsel .telarea .phone1{width:125px;height:42px;}
	.cntarea{position:absolute;top:132px; left:165px;}
	.cntarea .content01{width:425px;height:230px;}
	.agreearea{position:absolute;top:377px; left:40px;}
	.agreearea .agree{width:550px; height:160px;overflow-y:scroll;  font-size: 20px;  color: #898989;}


</style>
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="../js/jquery.easing.1.3.min.js" type="text/javascript"></script>
<script src="../js/common.js" type="text/javascript"></script>
<script language="JavaScript">

function checkForm(cf) {
	if(!cf.agree.checked){
		alert("작성을 위해서 이용자 약관에 동의해 주시기 바랍니다.");
		return false;
	}
	if(cf.name.value=="") {
		alert("이름을 입력하세요");
		cf.name.focus();
		return false;
	}
	if(cf.hphone1.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone1.focus();
		return false;
	}
	if(cf.hphone2.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone2.focus();
		return false;
	}
	if(cf.hphone3.value=="") {
		alert("휴대전화번호를 입력하세요");
		cf.hphone3.focus();
		return false;
	}
	

	return true;
}

function gosite(){

}
</script>
</head>


<body>

	  <div id='head_wrap' style="width:100%; text-align:center;">
		  <div class='head_box'>
             <div>
				 <!--홈으로 <strong><a href='/m'><img src='../img/common/home_icon.jpg' alt='홈으로'/></a></strong> -->
				 <div style="text-align:center;"><a href="/m"><img src='../img/common/logo.jpg' alt='센트럴 서울 안과'/></a></div>
				 <!--<span id='total_toggle'><img src='../img/common/sitemap_btn.jpg' alt='전체메뉴보기'/></span> -->
			 </div>
<div style="width:100%; height:73px; background:#102552; text-align:center;">
			 
			 <ul style="width:640px; text-align:center; margin: 0 auto; ">
			 	<li><a href='tel:027922226'><img src='../img/common/head_tel_bg.jpg' alt='전화문의'/></a></li>
				<li><a href='tel:027922226'><img src='../img/common/head_btn2.jpg' alt='전화문의'/></a></li>
			 </ul>
		  </div>
	  </div></div>









<div style="text-align:center; margin: 0 auto;"><img src="../ICL/img/151201_Ebanner.jpg" alt="안내렌즈삽입 이벤트" width="100%"/></div>
<div style="text-align:center; margin: 0 auto;"><img src='../ICL/img/ICL.jpg' alt='ICL' style="width:100%;" /></div>







<form action="../landing/save_event_all.php" method="post" enctype="multipart/form2-data" name="wform2" onSubmit="return checkForm(this)">
    <input type="hidden" name="group" value="basic">
    <input type="hidden" name="code" value="landing02">
    <input type="hidden" name="vstate" value="1">
    <input type="hidden" name="etc19" value="해당사항없음">
    <input type="hidden" name="cate1_input" value="MOBILE">
    <input type="hidden" name="cate2_input" value="<?=$nf_kwd?>">
    <input type="hidden" name="gourl" value="<?=$PHP_SELF?>?<?=$_SERVER[" QUERY_STRING "]?>">
    <div class="wrapper">
		<div style="margin:0 auto; width:640px;"><img src="../ICL/img/dbtitle.jpg" alt="ICL 무료검사이벤트 신청하기"/></div>
        <div class="counsel">
            <div class="counsel_cnt">
                <input type="text" class="name" name="name" />
                <p class="telarea">
                    <input type="text" class="phone1" name="hphone1" /> -
                    <input type="text" class="phone1" name="hphone2" /> -
                    <input type="text" class="phone1" name="hphone3" />
                </p>
                <p class="cntarea">
                    <textarea name="contents" id="" class="content01"></textarea>
                </p>
                <p class="agreearea">
                    <textarea name="" id="" class="agree">센트럴서울안과는 귀하의 개인정보보호를 매우 중요시하며, 개인정보보호방침을 통하여 귀하께서 제공하시는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다. ▶ 개인정보 수집에 대한 동의 센트럴서울안과는 귀하께 회원가입시 개인정보보호방침 또는 이용약관의 내용을 공지 하며 회원가입버튼을 클릭하면 개인정보 수집에 대해 동의하신 것으로 봅니다. ▶ 개인정보의 수집목적 및 이용목적 센트럴서울안과는 다음과 같은 목적을 위하여 개인정보를 수집하고 있습니다. - 센트럴서울안과 및 제휴사이트 서비스를 위한 회원 가입 및 이용아이디 발급 - 서비스의 이행 ( 경품 등 우편물 배송 및 예약에 관한 사항) - 장애처리 및 개별 회원에 대한 개인 맞춤서비스 - 서비스 이용에 대한 통계 수집 - 기타 새로운 서비스 및 정보 안내 단, 이용자의 기본적 인권 침해의 우려가 있는 민감한 개인정보는 수집하지 않습니다. 센트럴서울안과는 상기 범위내에서 보다 풍부한 서비스를 제공하기 위해 이용자의 자의에 의한 추가 정보를 수집합니다. ▶ 수집하는 개인정보 항목 회사는 회원가입, 상담, 서비스 신청 등등을 위해 아래와 같은 개인정보를 수집하고 있습니다. - 수집항목 : 이름 , 생년월일 , 성별 , 로그인ID , 비밀번호 , 자택 전화번호 , 자택 주소 , 휴대전화번호 , 이메일 , , 서비스 이용기록 , 접속 로그 , 쿠키 , 접속 IP 정보 , 결제기록 - 개인정보 수집방법 : 홈페이지(회원가입,게시판,쇼핑몰) ▶ 쿠키에 의한 개인정보 수집 센트럴서울안과는 귀하에 대한 정보를 저장하고 수시로 찾아내는 '쿠키(cookie)'를 사용합니다. 쿠키는 웹사이트가 귀하의 컴퓨터 브라우저(넷스케이프, 인터넷 익스플로러 등)로 전송하는 소량의 정보입니다. 귀하께서 웹사이트에 접속을 하면 센트럴서울안과 웹서버는 귀하의 브라우저에 있는 쿠키의 내용을 읽고, 귀하의 추가정보를 귀하의 컴퓨터에서 찾아 접속에 따른 아이디등의 추가 입력 없이 서비스를 제공할 수 있습니다. 쿠키는 귀하의 컴퓨터는 식별하지만 귀하를 개인적으로 식별하지는 않습니다. 또한 귀하는 쿠키에 대한 선택권이 있습니다. 웹브라우저의 옵션을 조정함으로써 모든 쿠키를 다 받아들이거나, 쿠키가 설치될 때 통지를 보내도록 하거나, 아니면 모든 쿠키를 거부할 수 있는 선택권을 가질 수 있습니다. ▶ 개인정보의 제3자에 대한 제공 센트럴서울안과는 귀하의 개인정보를
                        <개인정보의 수집목적 및 이용목적> 에서 고지한 범위내에서 사용하며, 동 범위를 초과하여 이용하거나 타인 또는 타기업·기관에 제공하지 않습니다. 그러나 보다 나은 서비스 제공을 위하여 귀하의 개인정보를 제휴사에게 제공하거나 또는 제휴사와 공유할 수 있습니다. 단, 개인정보를 제공하거나 공유할 경우에는 사전에 귀하께 고지하여 드립니다. ▶ 개인정보의 열람·정정 귀하는 언제든지 등록되어 있는 귀하의 개인정보를 열람하거나 정정하실 수 있습니다. 개인정보 열람 및 정정을 하고자 할 경우에는
                            <회원정보수정> 을 클릭하여 직접 열람 또는 정정하거나, 개인정보관리책임자에게 E-mail로 연락하시면 조치하여 드립니다. 귀하가 개인정보의 오류에 대한 정정을 요청한 경우, 정정을 완료하기 전까지 당해 개인정보를 이용하지 않습니다. ▶ 개인정보 수집, 이용, 제공에 대한 동의철회 회원 가입 등을 통해 개인정보의 수집, 이용, 제공에 대해 귀하께서 동의하신 내용을 귀하는 언제든지 철회하실 수 있습니다. 동의철회는 웹사이트 및 개인정보관리책임자에게 E-mail등으로 연락하시면 즉시 개인정보의 삭제 등 필요한 조치를 하겠습니다. ▶ 개인정보의 보유기간 및 이용기간 귀하의 개인정보는 다음과 같이 개인정보의 수집목적 또는 제공받은 목적이 달성되면 파기됩니다. - 회원 가입정보의 경우, 회원 가입을 탈퇴하거나 회원에서 제명된 때 - 예약의 경우, 예약에 따른 검진 및 처리가 만료된 때 위 보유기간에도 불구하고 계속 보유하여야 할 필요가 있을 경우에는 귀하의 동의를 받습니다. ▶ 개인정보보호를 위한 기술적 대책 센트럴서울안과는 귀하의 개인정보를 취급함에 있어 개인정보가 분실, 도난, 누출, 변조 또는 훼손되지 않도록 안전성 확보를 위하여 다음과 같은 기술적 대책을 강구하고 있습니다. 귀하의 개인정보는 비밀번호에 의해 보호되며, 파일 및 전송 데이터를 암호화하거나 파일 잠금기능(Lock)을 사용하여 중요한 데이터는 별도의 보안기능을 통해 보호되고 있습니다. 센트럴서울안과는 회원인증과 관련 암호알고리즘을 이용하여 네트워크 상의 개인정보를 안전하게 전송할 수 있는 인증 및 보안장치를 채택하고 있으며 시스템상 사정에 의해 미시행시 도우미에 의한 의사 확인을 시행하고 있습니다. 해킹 등에 의해 귀하의 개인정보가 유출되는 것을 방지하기 위해, 외부로부터의 침입을 차단하는 장치를 이용하고 있으며, 각 서버마다 침입탐지시스템을 설치하여 24시간 침입을 감시하고 있습니다. ▶ 의견수렴 및 불만처리 센트럴서울안과는 개인정보보호와 관련하여 귀하가 의견과 불만을 제기할 수 있는 창구를 개설하고 있습니다. 개인정보와 관련한 불만이 있으신 분은 센트럴서울안과의 개인정보 관리책임자에게 의견을 주시면 접수 즉시 조치하여 처리결과를 통보해 드립니다. ▶ 14세 미만 어린이들에 대한 보호정책 센트럴서울안과는 14세 미만 어린이들에 대한 회원미가입 정책과 함께 개인정보를 부모의 동의 없이 제3자와 공유하지 않으며 사용자에 관한 정보를 매매하거나 대여하지 않습니다. ▶ 개인정보의 파기절차 및 방법 회사는 원칙적으로 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체없이 파기합니다. 파기절차 및 방법은 다음과 같습니다. ο 파기절차 회원님이 회원가입 등을 위해 입력하신 정보는 목적이 달성된 후 별도의 DB로 옮겨져(종이의 경우 별도의 서류함) 내부 방침 및 기타 관련 법령에 의한 정보보호 사유에 따라(보유 및 이용기간 참조) 일정 기간 저장된 후 파기되어집니다. 별도 DB로 옮겨진 개인정보는 법률에 의한 경우가 아니고서는 보유되어지는 이외의 다른 목적으로 이용되지 않습니다. ο 파기방법 - 전자적 파일형태로 저장된 개인정보는 기록을 재생할 수 없는 기술적 방법을 사용하여 삭제합니다. ▶ 개인정보 관리책임자 센트럴서울안과는 개인정보에 대한 의견수렴 및 불만처리의 정책을 담당하는 개인정보정책 담당 관리책임자를 지정하고 있습니다. 본 정책에 대한 불만사항이 있으시다면 아래 연락처로 문의 하시면 친절히 처리하여 드리겠습니다. [ 개인정보정책 책임자 ] 성 명 : 최재완 소 속 : 센트럴서울안과 / TEL : 02)792-2226 [ 개인정보정책 담당자 ] 성 명 : 최재완 소 속 : 센트럴서울안과 / TEL : 02)792-2226 [ 시행일 ] 본 개인정보보호정책은 2011년 11월 24일부터 시행합니다.

                    </textarea>
                    <br/>


                    <!--개인정보취급방침

온라인문의 및 상담 관련부분 수집하는 개인정보의 항목


ο 수집항목 : 이름 , 휴대전화번호 , 접속 IP 정보

ο 개인정보 수집방법 : 홈페이지(http://www.cseye.net/으로 변경) , 온라인을 통한 회원가입개인정보의 수집 및 이용목적회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다.

ο 서비스 제공에 관한 계약 이행 및 서비스 제공정보제공 , 물품배송 또는 청구지 등 발송 , 요금추심

ο 회원 관리회원제 서비스 이용에 따른 본인확인 , 개인 식별 , 불량회원의 부정 이용 방지와 비인가 사용 방지 , 가입 의사 확인 , 연령확인 , 만14세 미만 아동 개인정보 수집 시 법정 대리인 동의여부 확인 , 불만처리 등 민원처리 , 고지사항 전달

ο 마케팅 및 광고에 활용신규 서비스(제품) 개발 및 특화 , 이벤트 등 광고성 정보 전달 , 인구통계학적 특성에 따른 서비스 제공 및 광고 게재 , 접속 빈도 파악 또는 회원의 서비스 이용에 대한 통계

개인정보의 보유 및 이용기간원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.

보존 항목 : 예약 및 상담보존 근거 : 회사내부방침보존 기간 : 회원탈퇴시까지 -->

                    <input type="checkbox" name="agree" style="vertical-align: -6px;  width: 22px;height: 22px;margin-top: 10px;" /> 개인정보 취급방침 동의
                </p>
            </div>
        </div>
        <div style="width:258px; margin:15px auto;">
            <input type="image" class="btn01" width="258" height="56" src="img/m_btn1.jpg" alt="신청하기" />
        </div>
    </div>
</form>








<div style="width:100%; background:#2b4987; text-align:center;">
        <div style="margin:0 auto; width:483px;">
		   <ul>
		      <li style="float:left;"><a href='../01_intro/intro5.php'><img src='../img/common/foot_btn1.jpg' alt='오시는길'/></a></li>
			  <!--<li><a href='../03_community/community1.php'><img src='../img/common/foot_btn2.jpg' alt='비용문의'/></a></li>-->
			  <li  style="float:left;"><a href='../03_community/community2.php'><img src='../img/common/foot_btn3.jpg' alt='모바일예약'/></a></li>
			  <li><a href='../03_community/community5.php'><img src='../img/common/foot_btn4.jpg' alt='모바일상담'/></a></li>
		   </ul>
		</div>
		</div>
<div style="width:100%; background:#3c3c3c; text-align:center;">

	    <div id='foot_wrap'>
		    <img src='../img/common/foot_addr.jpg' alt='센트럴서울안과 주소 : 서울특별시 용산구 이촌동 300-27 한강쇼핑센터 2층 대표자명 : 최재완 , 황종욱  I  사업자등록번호 : 106-90-76793'>
		</div>
		</div>

</body>
</html>
