<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_doctor_initial_assessment extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_doctor_initial_assessment');
	}


}

?>