<?php
/*************************************************************************
 *�ۼ��� : 2006-09-19  
 *��  �� : ��ū���̿��� �����ϴ� SMS XML �����񽺸� ȣ��
 *�ۼ��� : ������ (dev@tongkni.co.kr)
 *************************************************************************/
include_once('nusoap_tong.php');

$snd_number=$_POST[snd_number];  //������ ��� ��ȣ�� ����
$rcv_number=$_POST[rcv_number];    //�޴� ��� ��ȣ�� ����
$sms_content=$_POST[sms_content];  //���� ������ ����
$reserve_date=$_POST[reserve_date]; //���� ���ڸ� ����
$reserve_time=$_POST[reserve_time];  //���� �ð��� ����

/******���� ���� ����************/
$sms_id="mediphics";            //���Բ��� �ο� ������ sms_id
$sms_pwd="684768";       //���Բ��� �ο� ������ sms_pwd
/**********************************/
$callbackURL = "sms.tongkni.co.kr";


$sms = new SMS(); //SMS ��ü ����

//$result=$sms->SendSMS($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content);// 5���� ���ڷ� �Լ��� ȣ���մϴ�.

/*���� �������� �����Ͻǰ��*/
$result=$sms->SendSMSReserve($sms_id,$sms_pwd,$snd_number,$rcv_number,$sms_content,$reserve_date,$reserve_time);// 7���� ���ڷ� �Լ��� ȣ���մϴ�.

/*�ݹ� �������� �����Ͻǰ��*/
//$result=$sms->SendSMSCallBack($sms_id,$sms_pwd,$snd_number,$rcv_number,$callbackURL,$sms_content);// 6���� ���ڷ� �Լ��� ȣ���մϴ�.

/*�ݹ� ���� �������� �����Ͻǰ��*/
//$result=$sms->SendSMSCallBackReserve($sms_id,$sms_pwd,$snd_number,$rcv_number,$callbackURL,$sms_content,$reserve_date,$reserve_time);// 9���� ���ڷ� �Լ��� ȣ���մϴ�.

/*�ܿ����� ������ ���*/
//$result=$sms->GetRemainCount($sms_id,$sms_pwd);

/*����� �˸°� ó���մϴ�.*/
/*
*	�����	
*	1: ����
*  1~N: N�� ����(���� ���۽�)
*	0: �߼۷� ����
*	-1: ���̵� �̻�
*	-2: ��ȭ��ȣ �̻� ����
*	-3: ���� ���۽� ��ü�ǻ�
*/	
if ($result > 0) {
	echo "<script language='javascript'>";
	echo "alert('���� ����');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="0") {
	echo "<script language='javascript'>";
	echo "alert('�ܿ�������');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="-1") {
	echo "<script language='javascript'>";
	echo "alert('���̵�/�н����� �̻�');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="-3") {
	echo "<script language='javascript'>";
	echo "alert('���߹߼۽���');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} elseif ($result=="-50") {
	echo "<script language='javascript'>";
	echo "alert('��ȭ��ȣ�̻�');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
} else {
	echo "<script language='javascript'>";
	echo "alert('Error Code ".$result."  ');";
	echo "location.href='sms_main.php'";
	echo "</script>";	
}
	
?>



