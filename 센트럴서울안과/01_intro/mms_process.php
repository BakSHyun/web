<?php
	/* �ۼ���:��ū���� ����� ��(sms@goodinternet.co.kr)
	* �ۼ�����:2011�� 06�� 30��
	* �ۼ�����: �� ���α׷��� ��ū���� MMS ȣ���ÿ��� php �����α׷� ���� �����̴�.
	*              �� ���������� ������ ����� �ڵ�����ȣ, �޴»�� �ڵ�����ȣ,���۳���,�̹������� mms_main.php����
	*              ���� �޾� ���� MMS ������ ����Դϴ�..
	*              �� ���α׷��� �����Ϸ��� �������� �� ���α׷��� mms_process.php,nusoap_tong.php
	*              ������ ���ε��ϰ� mms_process.php ���Ͽ� ��ū���̿��� �����Ͻ� Mms ���̵�� �н����带
	*              �Է��ϸ� �˴ϴ�.
	*/
	include_once('nusoap_tong.php');

	$rcv_number = $hphone1.$hphone2.$hphone3;

//echo $rcv_number;
//exit;

	$snd_number='027922226';		//������ ��� ��ȣ�� ����
	//$rcv_number=$_POST["rcv_number"];			//�޴� ��� ��ȣ�� ����
	$mms_title = '��Ʈ�� ���� �Ȱ� ���ô±�';					//MMS �޼��� ����
	//$mms_content=$_POST["mms_content"];		//���� ������ ����

	$mms_content = "���ô� �� �ȳ� ��\n[��Ʈ������Ȱ�]\n\n[���߱���]\n����ö: 4ȣ��,�߾Ӽ� ���̿� 4���ⱸ ���� 150M��\n\n����:100��,6211��,2016, 3012�� ���̿� ������ ������ �Ѱ����μ��� 2��\n\n[�ڰ���]\n�׺���̼�- ��걸���̵� 300-27. �Ѱ����μ��� �Է�\n�Ѱ��ùΰ��� �������� ������ ���� �� ���̿����� ����3��\n\n���������� �����Ǿ��ִ� ����� �Ѱ��ùΰ����� �̿����ּ���\n\n�Ѱ��ùΰ��� ���� �̿�� ������ �����Ͻø� ���ᵵ�� ���帳�ϴ�.\n���� ��ȭ : 02-792-2226";


	$path = "../img/sub/";											 // �������� MMS �߼� �̹��� ���� ������
	$filename1 = "mms_sendimg.jpg";									// MMS �߼��� ù��° �����̸�
	//$filename2 = "goodinternet.jpg";						// MMS �߼��� �ι�° �����̸�

	// * MMS �� ������ �� �ִ� ������ JPG,BMP,SIS(�̹�������) , MMF(���������) �� �����մϴ�.

	/******���� ���� ����************/
	$mms_id="cseye";            //���Բ��� �ο� ������ mms_id
	$mms_pwd="cseye";       //���Բ��� �ο� ������ mms_pwd
	/**********************************/

	$userdefine = $mms_id;         //������Ҹ� ���� �־��ִ� ������ ���ǰ�, ����� ���Ƿ� �������ֽø� �˴ϴ�. ���� �Ǵ� ���ڷ� �־��ּž� �մϴ�. ����ڰ� ������ �� �ִ� ���� �־��ּ���.

	// ����(����) ���۽ÿ��� �޴� ��� ��ȣ�� �޸�(,)�� �����մϴ�.


	$mms = new MMS(); //MMS ��ü ����

	/*�ϳ��� �̹����� ȣ�� ��� �߼��մϴ�*/
	$result=$mms->SendMMS1($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1);// 8���� ���ڷ� �Լ��� ȣ���մϴ�.

	/*�ΰ��� �̹����� ȣ�� ��� �߼��մϴ�*/
	//$result=$mms->SendMMS2($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1,$path,$filename2);// 10���� ���ڷ� �Լ��� ȣ���մϴ�.

	/*�ϳ��� �̹����� ����ð��� �߼��մϴ�*/
	//$result=$mms->SendMMSReserve1($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1,$reserve_date,$reserve_time,$userdefine);// 11���� ���ڷ� �Լ��� ȣ���մϴ�.

	/*�ΰ��� �̹����� ����ð��� �߼��մϴ�*/
	//$result=$mms->SendMMSReserve2($mms_id,$mms_pwd,$snd_number,$rcv_number,$mms_title,$mms_content,$path,$filename1,$path,$filename2,$reserve_date,$reserve_time,$userdefine);// 13���� ���ڷ� �Լ��� ȣ���մϴ�.

	/*�ܿ����� ������ ���*/
	//$result=$mms->GetRemainCount($mms_id,$mms_pwd);		$funcMode = 1;
	//+) funcMode�� �޼ҵ���� �� ��ȯ���� ���� �ٸ� �޽����� ���� ���ؼ� ���Դϴ�.

	/*���� ���*/
	//$result=$mms->ReserveCancle($mms_id,$mms_pwd,$userdefine);		$funcMode = 2;


	/*����� �˸°� ó���մϴ�.*/
	/*���۰�� ó��
	*1 : �߼ۼ���
	*1~N : �޸��� �����Ͽ� ���� �߼��� �Ͽ��� ��쿡�� ������ ���� ���ڷ� ���ϵ˴ϴ�.
	*0 : MMS�߼� ���ɷ� ����
	*-1 : �߸��� mms_id�� �н����� �Է�
	*     (mms_id�� �н����带 �ٽ� �ѹ� Ȯ�����ֽñ� �ٶ��ϴ�.  mms_id,�н������ �α��ζ� id�� password�� �ƴϸ�,
	*      sms, LMS, MMS���� ���� ��û�ÿ� ������ ���̵�� �н������Դϴ�.)
	*-2 : mms ���̵� ����
	*-3 : �߼� ��� ����
	*      (�����ڹ�ȣ�� "���ڰ� �ƴ� ��"�Ͻ�, �����ڹ�ȣ ����� ������ �߸��� ���Ͻ�, �߼����Ѽ����Ͻ� �� ��ȯ)
	*-4 : �ؽ�����
	*-5 : �߸��� mms_id�� �н����� �Է�
	*     (mms_id�� �н����带 �ٽ� �ѹ� Ȯ�����ֽñ� �ٶ��ϴ�.  mms_id,�н������ �α��ζ� id�� password�� �ƴϸ�,
	*      sms, LMS, MMS���� ���� ��û�ÿ� ������ ���̵�� �н������Դϴ�.)
	*-8 : �߽��� ��ȭ��ȣ ����
	*-9 : ���۳��� ����
	*-10: ���� ��¥ �̻�
	*      (����߼����ڰ� YYMMDD ������ �ƴ� ��� ��ȯ)
	*-11: ���� �ð� �̻�
	*	   (����ð��� hhmmss ������ �ƴ� ��� ��ȯ)
	*-12: ���� ���ɽð� ����
	*      (���� �߼۽ð��� ���� �ð����� �������� Ȯ�� ��Ź�帳�ϴ�.)
	*-13: ���� ���Ǽ��� �������� ����
	*-14: URL/MMS/LMS ���񽺸� ��û���� ����
	*-15 : �̹��� ���忡 ����
	*-16 : �߸��� ���� Ȯ����
	*-23: ���ip�� �ƴ� ��� ��ȯ
	*      (Ȩ������ > ���ڸ޼��� >���񽺰��� > ���� ��û���� > �߼۰���ip��� ������ Ȯ�����ֽñ� �ٶ��ϴ�.)
	*-50: �߸��� ��ȭ��ȣ

	*/

echo "<script language='javascript'>";

	if ($result > 0) {
		if ($funcMode == "1")
			echo "alert('�ܿ��� : ".$result."��');";
		elseif ($funcMode == "2")
			echo "alert('".$result."�� ������� ����');";
		else
			echo "alert('������ �޴������� �൵�� �����Ͽ����ϴ�');";
	}
	elseif ($result == "0") {
		if ($funcMode == "2") {
			echo "alert('���೻���� ����');";
		}
		else {
			echo "alert('�ܿ�������');";
		}
	}
	elseif ($result == "-1") {
		echo "alert('�߸��� mms_id�� �н����� �Է�.');";
	}
	elseif ($result == "-2") {
		echo "alert('MMS ���̵� ����.');";
	}
	elseif ($result == "-3") {
		echo "alert('�߼� ��� ����');";
	}
	elseif ($result == "-5") {
		echo "alert('�߸��� mms_id�� �н����� �Է�.');";
	}
	elseif ($result == "-8") {
		echo "alert('�߽��� ��ȭ��ȣ ����.');";
	}
	elseif ($result == "-9") {
		echo "alert('���۳��� ����.');";
	}
	elseif ($result == "-10") {
		echo "alert('���� ��¥ �̻�.');";
	}
	elseif ($result == "-11") {
		echo "alert('���� �ð� �̻�.');";
	}
	elseif ($result == "-12") {
		echo "alert('���� ���� �ð��� �������ϴ�.���� �ð� ���ķ� ���� �Ͻʽÿ�.');";
	}
	elseif ($result == "-13") {
		echo "alert('���� ���Ǽ��� �������� �ʾҽ��ϴ�.');";
	}
	elseif ($result == "-14") {
		echo "alert('URL/ MMS/LMS ���񽺸� ��û���� ����.');";
	}
	elseif ($result=="-15") {
		echo "alert('�̹��� ���� ����');";
	}
	elseif ($result=="-16") {
		echo "alert('�߸��� ���� Ȯ����');";
	}
	elseif ($result == "-23") {
		echo "alert('�����Ͻ� ���ip ��Ͽ� �����ϴ�.');";
	}
	elseif ($result == "-50") {
		echo "alert('��ȭ��ȣ�̻�');";
	}
	else {
		echo "alert('Error Code ".$result."  ');";
	}
	echo "history.go(-1);";
	echo "</script>";

?>
