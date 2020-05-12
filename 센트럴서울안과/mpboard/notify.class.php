<?php

/**
 * CNotify.class.php
 *
 * @author softfarm
 * @copyright 2008
 * @license softfarm
 * @version 1.0.1
 */



define(DELIMITER_CHAR,"\t");
define(HOST,"gx.askro.kr");
define(PORT,"9995");
define(REQ_CHAR,"R");
define(END_CHAR,'E');
define(FAULT_CHAR,'F');
define(CRITICAL_CHAR,'C');
define(DELI_NULL,"\0");
define(NOTIPACKET,"319");

class CNotify {

	var $m_fp;
	var $m_bConnected = false;
	var $m_CommBuf;
	var $m_nReqNum;
	var $m_sParam;
	
	function CNotify() {
	
		$this->m_fp = @fsockopen(HOST,PORT, $errno, $errstr);
		if($this->m_fp){
			$this->m_bConnected = true;
		}  
 	    $this->$m_sParam = array();

	    socket_set_blocking($this->m_fp, false); //non
	}
	function send(){	

		$this->m_CommBuf = sprintf("%s%d",REQ_CHAR,NOTIPACKET);
	
		for($i=0;$i<sizeof($this->m_sParam);$i++){
			
			$this->m_CommBuf .= DELIMITER_CHAR.$this->m_sParam[$i];
		}

        $this->m_CommBuf .= DELI_NULL;			

		@fputs ($this->m_fp,$this->m_CommBuf);

		$this->closeSocket();		
	}

	function isConneted(){

		return $m_bConnected;
	}

	function closeSocket(){

		if($this->IsConneted()){
			@fclose($fp);
		}
	}

	function addParam($sParam){

		$this->m_sParam[] = $sParam;
	}

	function setReqNum($nReqNum){

		$this->m_ReqNum = nReqNum;
	}

	function getError(){

		echo sprintf("errno [%s], errstr [%s]",$errno,$errstr);

	}

}

