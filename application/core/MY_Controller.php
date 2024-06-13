<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();

	}    
	public function json_output($data){
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function random($length) {
		$key = '';
		$keys = array_merge(range(0, 9), range('a', 'z'),range('A', 'Z'));
		for ($i = 0; $i < $length; $i++) 
		{
		  $key .= $keys[array_rand($keys)];
		}
		return $key;
	}

	public function session_validate() {
    	$wkey=$this->session->userdata('wkey');
		$user_id=$this->session->userdata('id');
		$key_result=$this->db->query("SELECT * from user where user_w_key='".$wkey."' and user_id='".$user_id."' and user_status ='Active'")->result_array();
		if(!empty($key_result)){
			return True;
		}else{
			$this->session_expired('','','');
		}
    }

    public function session_expired($title,$text,$type) {
		$this->session->unset_userdata('id','');
		$this->session->unset_userdata('role','');
		$this->session->unset_userdata('photo','');
		$this->session->unset_userdata('name','');
		$this->session->unset_userdata('mobile_number','');
		$this->session->unset_userdata('email','');
		$this->session->unset_userdata('wkey','');
		$this->session->set_flashdata('active',1);

		if($title!='' && $text!='' && $type!=''){
			$this->session->set_flashdata('title',$title);
			$this->session->set_flashdata('text',$text);
			$this->session->set_flashdata('type',$type);
		}
		else{
			$this->session->set_flashdata('active',"1");
			$this->session->set_flashdata('title',"Sorry!");
			$this->session->set_flashdata('text',"Session Has been Expired !");
			$this->session->set_flashdata('type',"warning");
		}
		redirect('/');
    }


    public function notification($id,$title,$msg){
    	$Notification = array
	    (
	        'title'   => $title,
	        'body'  => $msg,
	        'sound'   => "default",
	        'color' =>"#FFFF00",
	        'tag'=> $title,
	        'image' => "",
	    );
	  
	    $data = array
	    (
	        'picture_url' => "",
	    );
	  
	    $fields = array
	    (
	         'to'=> $id,
	         'priority'=>"high",
	         'notification'=> $Notification,
	         'data'=> $data,
	    );
	    

	    $headers = array
	    (
	        'Authorization: key=AAAAb3s52_g:APA91bFX7qSxX3QKRkrvZH-IXaq3dwUTTU01xbodS8rIrcMAlz0izC1U4gkFlDZgSLJOoXk5Kj2PxMP_S65IAF3K5szWo86PpwxpoLs78a7ajik0H6ntUldriO0rA542U0PwkUf9OyaY',
	        'Content-Type: application/json',
	    );
	 
	    $ch = curl_init();
	    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
	    curl_setopt( $ch,CURLOPT_POST, true );
	    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
	    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
	    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
	    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
	    $result = curl_exec($ch);
	    curl_close($ch);
	   //print_r($result);die();
	    return ($result);
    }
}

?>
