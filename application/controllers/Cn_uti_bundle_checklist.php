<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_uti_bundle_checklist extends MY_Controller {

	
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_uti_bundle_checklist');
	}


}

?>