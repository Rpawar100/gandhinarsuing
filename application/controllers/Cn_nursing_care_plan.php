<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_nursing_care_plan extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_nursing_care_plan');
	}


}

?>