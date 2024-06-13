<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_canteen_management extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_canteen_managment');
	}

	

}

?>