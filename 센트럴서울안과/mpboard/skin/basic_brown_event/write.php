<?
include $_SERVER["DOCUMENT_ROOT"] ."/".$INDIR."/amlibrary/ajax/ajax.php";  //ajax ���̺귯���� �߰� ���� include  (�Խ��� ���͸� ���ؼ� ) 08 .12. 02

// �Խù� ����,���� ��ü ����
$bwriteobj = new amboardWrite($connect);
$bwriteobj->addpara = $addpara;			// �߰������� �Ķ��Ÿ�� �ʿ��� ���
$bwriteobj->init();

$AUTH = $bwriteobj->getAuth(); // MEDIPIX ���ǻ��׹���� ������ ���� ���� �̵� (08.05.19)

// ���ǻ��� �Խ����� ��� ���� �������� �ٷ� �̵��ϰ� ��ũ�� ������ �����Ƿ� ���Ե�� ���� ������ ������ �ش�.
if($bwriteobj->config[kind] == "inquire" && !$AUTH[manage]) {	//�޵��Ƚ� �޵��Ƚ� �������߰��� ���� ���ǹ� ���� �߰� (08.05.07)
	$_SESSION[write_check] = "ok";	// ���Ե�� ���� äũ ����
}

// �Խù��� ȸ�������� ã������ ȸ����ü�� �����Ѵ�.
$memberobj = new ammemberRegister($connect);
$memberobj->init();

$LINK[slist] = $bwriteobj->slistLink;
$LINK[addpara] = $bwriteobj->addpara;
$CALIST = $bwriteobj->getCategoryData();			// ī�װ�����Ÿ
$CATE_STATE = $bwriteobj->config[category];			// ī�װ� ���,�̻��
$FILE_STATE = $bwriteobj->config[upload_state];		// ���Ͼ��ε� ��뿩��
$FILE_NUM = $bwriteobj->config[upload_num];			// ���Ͼ��ε� ����
$FILE_ADD = $bwriteobj->config[upload_add];			// ���Ͼ��ε� ����
$CONFIG = $bwriteobj->config;						// �Խ��� ȯ�漳�� ����Ÿ
$ADDFIELD = $bwriteobj->getAddField();				// �߰��Է� �ʵ� ������ �ҷ��´�.
$MEMINFO = $memberobj->getData($_SESSION[userid]);		// �Խù� �ۼ����� ȸ�������� �ҷ��´�.
$SELSKIN = $bwriteobj->config[skin];
$SECRET_TYPE = $bwriteobj->config[secret_type];		//�޵��Ƚ� ����/��������� �߰� (08.04.21)
$SMS_USE = $bwriteobj->config[sms_use];		//�޵��Ƚ� sms�߼ۿ��� �߰� -pooh (08.05.15)
$date_edit = $bwriteobj->config[date_edit];		//�޵��Ƚ� ��¥,��ȸ�� ���� ���� �߰� (08.12.05)

/* MEDIPIX �з� ���� (08.05.09) */
$CATE_NUM = $bwriteobj->config[cate_num];
$CATE1_NAME = $bwriteobj->config[cate1_name];
$CATE1_ITEM = explode("|",$bwriteobj->config[cate1_item]);
$CATE2_NAME = $bwriteobj->config[cate2_name];
$CATE2_ITEM = explode("|",$bwriteobj->config[cate2_item]);
$CATE3_NAME = $bwriteobj->config[cate3_name];
$CATE3_ITEM = explode("|",$bwriteobj->config[cate3_item]);
/* MEDIPIX �з� ���� (08.05.09) */

$EDITMODE = $bwriteobj->config[editmode];

if($abmode == "write") {
	
	if(!$AUTH[write]) {
		msgback("�۾��� ������ �����ϴ�.");
		exit;
	}
	
	if($_SESSION[userid]) {
		if($MEMINFO[nicname]) $BDATA[name] = $MEMINFO[nicname];
		else $BDATA[name] = $MEMINFO[name];
		
		$BDATA[email] = $MEMINFO[email];
	}
	$BDATA[vstate] = $bwriteobj->config[vstate];
	$KIND_MODE = $bwriteobj->config[kind];
	$abmodef = "writedb";
}

if($abmode == "modify") {
	
	if(!$AUTH[write]) {
		msgback("�۾��� ������ �����ϴ�.","-2");
		exit;
	}
	
	// GET ��� ������ ���´�.
	if ($REQUEST_METHOD!="POST") {
		echo "
		<br><br><br><br>
		<center>
		�ùٸ� ������ �ƴմϴ�.
		</center>
		";
		exit;
	}
	
	// �ٸ� ȣ��Ʈ������ ������ ���´�.
	if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
		echo "
		<br><br><br><br>
		<center>
		�ùٸ� ������ �ƴմϴ�.
		</center>
		";
		exit;
	}

	$KIND_MODE = $bwriteobj->config[kind]; // MEDIPIX �������õ� �Խ��� �з� �߰� (08.05.02)
	$abmodef = "modifydb";
	$BDATA = $bwriteobj->getWiteData();
	$FLIST = $bwriteobj->getFileData($no);	// ���� ����
	$ADDFIELDVALUE = $bwriteobj->getAddFieldValue($no);
	
	
	// �������� ��忡�� ���� html ����� ������� ���� ����Ÿ �̸� ���������� HTML ������� ��ȯ�Ѵ�.
	if($BDATA[html] == 0 && $EDITMODE == "webedit") {
		$BDATA[contents]=ereg_replace(" ","&nbsp;",$BDATA[contents]);
		$BDATA[contents]=nl2br($BDATA[contents]);
	}
}

if($abmode == "reply") {

	// �ٸ� ȣ��Ʈ������ ������ ���´�.
	if(!$_SERVER["HTTP_REFERER"] || !ereg(str_replace(".","\\.",$_SERVER["HTTP_HOST"]), $_SERVER["HTTP_REFERER"])) {
		echo "
		<br><br><br><br>
		<center>
		�ùٸ� ������ �ƴմϴ�.
		</center>
		";
		exit;
	}
	
	if(!$AUTH[rewrite]) {
		msgback("��۾��� ������ �����ϴ�.");
		exit;
	}

	$abmodef = "replydb";
	$BDATA = $bwriteobj->getWiteData();
	$BDATA[contents] = $BDATA[contents]."\n\n================== [�亯��] ======================\n\n";
	$BDATA[name] = $_SESSION[username];
	$BDATA[email] = $MEMINFO[email]; 
	$BDATA[passwd] = "";
	$BDATA[htmlchecked] = "";
	$BDATA[secretchecked] = "";
	$BDATA[category] = "";
	
}

if($_SESSION[userid]) {
	$LOGIN_USER = $bwriteobj->getLoninInfo();
}

$bwriteobj->assign("category");
$bwriteobj->assign("LINK");
$bwriteobj->assign("KIND_MODE");
$bwriteobj->assign("BDATA");
$bwriteobj->assign("CALIST");
$bwriteobj->assign("FLIST");
$bwriteobj->assign("abmodef");
$bwriteobj->assign("CATE_STATE");
$bwriteobj->assign("FILE_STATE");
$bwriteobj->assign("FILE_NUM");
$bwriteobj->assign("FILE_ADD");
$bwriteobj->assign("LOGIN_USER");
$bwriteobj->assign("VMODE_STATE");
$bwriteobj->assign("AUTH");
$bwriteobj->assign("ADDFIELD");
$bwriteobj->assign("ADDFIELDVALUE");
$bwriteobj->assign("MEMINFO");
$bwriteobj->assign("CONFIG");
$bwriteobj->assign("SECRET_TYPE");		//�޵��Ƚ� ����/��������� �߰� (08.04.21)
$bwriteobj->assign("SMS_USE");			//�޵��Ƚ� sms�߼ۿ��� �߰� -pooh (08.05.15)
/* MEDIPIX �з� ���� (08.05.09) */
$bwriteobj->assign("CATE_NUM");
$bwriteobj->assign("CATE1_NAME");
$bwriteobj->assign("CATE1_ITEM");
$bwriteobj->assign("CATE2_NAME");
$bwriteobj->assign("CATE2_ITEM");
$bwriteobj->assign("CATE3_NAME");
$bwriteobj->assign("CATE3_ITEM");
/* MEDIPIX �з� ���� (08.05.09) */

$bwriteobj->getHead();
$bwriteobj->bprint();
$bwriteobj->getBottom();


if($EDITMODE == "webedit") {
	$editpicup = $bwriteobj->config[editpicup];
	$editpicmanage = $bwriteobj->config[editpicmanage];
	
	$edit_dir = "/".$INDIR."/webedit/";						// ������ ���
	$textarea_obj = "document.wform.contents";		// �� ������ Textarea ��ü
	$editobj_name = "eobj";									// ������ ��ü �̸�
	if($editpicmanage=="yes") {		// �����Ϳ��� �̹��������� ����Ұ��
		if($_SESSION['userid']) $amimage_use = "yes";							// AMIMAGE ���� ��뿩�� (ȸ���α��νÿ��� ��밡��)
		else $amimage_use = "no";
	} else {
		$amimage_use = "no";
	}
	if($editpicup=="yes") {		// �����Ϳ��� �Ϲ� �̹��� ���ε� ����Ұ��
		$image_use = "yes";
	} else {
		$image_use = "no";
	}
	include $_SERVER[DOCUMENT_ROOT]."/".$INDIR."/webedit/setedit.php";
	?>
	<script>
		document.wform.html.checked=true;	// ������ ���� html ����� ������ üũ�Ѵ�.
	</script>
	<?
}
?>
<div id="dbgo" style="display:none;position:absolute;left:100px;top;100px;z-index:3"></div>