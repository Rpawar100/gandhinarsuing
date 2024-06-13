<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_clinical_examination_print extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_clinical_examination_print');
	}




}
?>