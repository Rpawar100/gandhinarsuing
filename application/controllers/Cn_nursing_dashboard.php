<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_nursing_dashboard extends MY_Controller
{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$this->load->view('vw_nursing_dashboard');	
		
	}
}

?>