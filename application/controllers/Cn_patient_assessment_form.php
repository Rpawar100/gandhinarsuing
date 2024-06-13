<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_patient_assessment_form extends MY_Controller {

	
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_patient_assessment_form');
	}


}

?>