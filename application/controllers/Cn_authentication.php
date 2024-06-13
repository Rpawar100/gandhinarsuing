<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_authentication extends MY_Controller {
	
	public function index(){   
		$this->load->view('vw_login');
	}

	public function login(){
		$m_key = $this->session->userdata('m_key');


		$this->form_validation->set_rules('user_username','trim|required');
		$this->form_validation->set_rules('user_password','password','trim|required');

		$user_username = trim($this->input->post('user_username'));
		$user_password = md5(trim($this->input->post('user_password')));

		$authenticate_result = $this->db->query('SELECT * from user  where user_mobile_number="'.$user_username.'" and user_password="'.$user_password.'" and user_status="Active"')->result_array();
		
		if(!empty($authenticate_result)){
			$user_id=$authenticate_result[0]['user_id'];
			$key1  = rand();
	        $key2  = $user_id;
	        $key3    = rand();

	        $arr = array($key1,$key2,$key3);
	        
			if($authenticate_result[0]['user_w_key']==''){
				$secure_key = implode($arr);
			}else{
				$secure_key = $authenticate_result[0]['user_w_key'];
			}
		
	        $role_array = $this->db->query('SELECT RA_role_id from role_assignment  where RA_user_id="'.$authenticate_result[0]['user_id'].'"  and RS_status="Active" order by RA_role_id')->result_array();
			$this->db->query('UPDATE user set user_w_key="'.$secure_key.'" where user_id="'.$user_id.'"');
			$this->session->set_userdata('wkey', $secure_key);
			$this->session->set_userdata('id', $authenticate_result[0]['user_id']);
			$this->session->set_userdata('role', array_column($role_array, 'RA_role_id'));
			$this->session->set_userdata('designation', $authenticate_result[0]['user_designation_name']);
			$this->session->set_userdata('photo', $authenticate_result[0]['user_photo']);
			$this->session->set_userdata('name', $authenticate_result[0]['user_name']);
			switch ($role_array[0]['RA_role_id']) {
				case '1':
						redirect('/dashboard');
					break;
				case '2':
						redirect('/visitor-dashboard');
					break;
				case '3':
						redirect('/opd-appointment');
					break;
				case '5':
						redirect('/diagnosis-appointment');
					break;
				case '6':
						redirect('/doctor-dashboard');
					break;
				case '7':
				case '8':
				case '9':
						redirect('/lab-technician');
					break;
				case '10':
						redirect('/nursing-dashboard');
					break;
					
				default:
						redirect('/profile');
					break;
			}
		}else{
			$this->session->set_flashdata('active',1);
			$this->session->set_flashdata('title',"Sorry!");
			$this->session->set_flashdata('text',"Invalid Credentials !");
			$this->session->set_flashdata('type',"warning");
			redirect('/');
		}
	}

	public function logout(){	
		$wkey=$this->session->userdata('wkey');
		$user_id=$this->session->userdata('id');
		$this->db->query("UPDATE user set user_w_key='' where user_w_key='".$wkey."' and user_id='".$user_id."'");
		$this->session_expired("Thank You!","You have been Logout Successfully..!!","success");
	}


	function update_password(){
		$data=array(
			"title"=>'OOPS!',
			"text"=>'Something went wrong..',
			"type"=>'warning');
		if(!empty($this->input->post('password'))){
			$user_id=$_SESSION['user_id'];
			$pass=md5($this->input->post('password'));
			$this->db->query('UPDATE user SET user_password="'.$pass.'" where user_id='.$user_id);
			$data=array('title'=>"Data Updated",
				'text'=>"Your Password has been Updated Successfully!",
				'type'=>"success");
		}
		$this->json_output($data);
	}
}    