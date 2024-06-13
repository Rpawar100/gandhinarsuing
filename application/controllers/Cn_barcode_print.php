<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_barcode_print extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		/*
		if (!extension_loaded('tsclibnet')) {
            dl('tsclibnet.dll');
        }*/
	}
	
	public function index(){   
		//$this->session_validate();
		//$this->load->view('vw_test_parameter');
	}

	public function barcode_print(){
		phpinfo();
		
		/*
		 echo "This is a TSCLIBNET.Dll test in PHP 5.0.";
              $TSCObj = new COM ("TSCSDK.driver");
              $TSCObj->openport ("TSC TTP-2410MT");
              
              $TSCObj->sendcommand("SIZE 100 mm, 60 mm");
              $TSCObj->sendcommand("DIRECTION 1");
              
              //$TSCObj->downloadpcx("G:\Program Files\Apache Software Foundation\Apache2.2\htdocs\UL.PCX","UL.PCX");

              $TSCObj->clearbuffer();
              //$TSCObj->sendcommand("PUTPCX 10,200,\"UL.PCX\"");
              $TSCObj->sendcommand("TEXT 100,200,\"0\",0,12,12,\"12345\"");
              
              $TSCObj->printerfont("100", "50", "4", "0", "1", "1", "TEST PRINTOUT");
              $TSCObj->windowsfont(100, 250, 48, 0, 3, 1, "arial", "WINDOWS FONT TEST");

              $TSCObj->barcode("100", "100", "128", "50", "1", "0", "2", "2", "123456789");
              $TSCObj->printlabel("1","1");
              $TSCObj->closeport();

		*/
	}






}

?>