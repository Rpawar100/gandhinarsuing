<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_service_provider extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_service_provider');
	}

	public function service_provider_list(){
		$this->session_validate();
		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length']; 
		$searchValue = $_POST['search']['value']; 
		$searchQuery = "";

		for ($i=0; $i <count($_POST['columns']) ; $i++) { 
			if (!empty($_POST['columns'][$i]['search']['value'])) {
				$searchQuery.="AND ".$_POST['columns'][$i]['data']." like '".$_POST['columns'][$i]['search']['value']."%'";
			}
		}	

		if($searchValue != ''){
			$searchQuery.= " AND (name like '%".$searchValue."%' 
									or d_name like '%".$searchValue."%'
									or type like '%".$searchValue."%')";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							concat(user_first_name,' ',	user_middle_name,' ',user_last_name) as name
							,user_company as company_name
							,user_mobile_number as mobile_number
							,user_email as user_email
							,concat('<i class=\"fa fa-edit edit_record\" user_id=\"',user_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" user_id=\"',user_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
							,CASE 
							        WHEN user_status='Active' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" checked  user_id=\"',user_id,'\" value=\"',user_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" user_id=\"',user_id,'\" value=\"',user_status,'\"><span class=\"slider round\"></span></label>')
							    END AS user_status
						from user where user_type='External'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					LIMIT ".$length." OFFSET ".$start;
			
		$result_data = $this->db->query($result_query)->result_array();
		
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result_data),
			"iTotalDisplayRecords" => count($result_data),
			"aaData" => $result_data,
			
		);
		echo json_encode($response);
	}

	public function service_provider_action(){	
		$this->session_validate();
		if (!empty($_POST)) {

			if (!empty($_POST['user_id'])) {
				$record_data = array(
					'user_company' =>!empty($_POST['company_name'])?$_POST['company_name']:'',
					'user_type' =>!empty($_POST['user_type'])?$_POST['user_type']:'',
					'user_first_name' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
					'user_middle_name' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
					'user_last_name' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
					'user_mobile_number' =>!empty($_POST['mobile_number'])?$_POST['mobile_number']:'',
					'user_alt_mobile_number' =>!empty($_POST['alt_mobile_number'])?$_POST['alt_mobile_number']:'',
					'user_email' =>!empty($_POST['email'])?$_POST['email']:'',
					'user_photo' =>!empty($_POST['photo'])?$_POST['photo']:'',

					'user_current_state' =>!empty($_POST['c_state'])?$_POST['c_state']:'',
					'user_current_district' =>!empty($_POST['c_district'])?$_POST['c_district']:'',
					'user_current_taluka' =>!empty($_POST['c_taluka'])?$_POST['c_taluka']:'',
					'user_current_area' =>!empty($_POST['c_area'])?$_POST['c_area']:'',
					'user_current_pincode' =>!empty($_POST['c_pincode'])?$_POST['c_pincode']:'',
					'user_current_address' =>!empty($_POST['c_address'])?$_POST['c_address']:'',
					'user_permanent_state' =>!empty($_POST['p_state'])?$_POST['p_state']:'',
					'user_permanent_district' =>!empty($_POST['p_district'])?$_POST['p_district']:'',

					'user_permanent_area' =>!empty($_POST['p_area'])?$_POST['p_area']:'',
					'user_permanent_pincode' =>!empty($_POST['p_pincode'])?$_POST['p_pincode']:'',
					'user_permanant_address' =>!empty($_POST['p_address'])?$_POST['p_address']:'',
					'user_permanent_taluka' =>!empty($_POST['p_taluka'])?$_POST['p_taluka']:'',
					'user_bank_name' =>!empty($_POST['bank_name'])?$_POST['bank_name']:'',
					'user_bank_account_number' =>!empty($_POST['bank_account_no'])?$_POST['bank_account_no']:'',
					'user_ifsc_code' =>!empty($_POST['ifsc_code'])?$_POST['ifsc_code']:'',
					'user_branch_name' =>!empty($_POST['branch_name'])?$_POST['branch_name']:'',

				);
				$this->db->where('user_id',$_POST['user_id']);
				$this->db->update('user',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Updated!',
					'text'=>'<b>User Updated Successfully..!</b>',
					'type'=>'success'
				);
			}else{
				$record_data = array(
					'user_company' =>!empty($_POST['company_name'])?$_POST['company_name']:'',
					'user_type' =>!empty($_POST['user_type'])?$_POST['user_type']:'',
					'user_first_name' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
					'user_middle_name' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
					'user_last_name' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
					'user_mobile_number' =>!empty($_POST['mobile_number'])?$_POST['mobile_number']:'',
					'user_alt_mobile_number' =>!empty($_POST['alt_mobile_number'])?$_POST['alt_mobile_number']:'',
					'user_email' =>!empty($_POST['email'])?$_POST['email']:'',
					'user_photo' =>!empty($_POST['photo'])?$_POST['photo']:'',

					'user_current_state' =>!empty($_POST['c_state'])?$_POST['c_state']:'',
					'user_current_district' =>!empty($_POST['c_district'])?$_POST['c_district']:'',
					'user_current_taluka' =>!empty($_POST['c_taluka'])?$_POST['c_taluka']:'',
					'user_current_area' =>!empty($_POST['c_area'])?$_POST['c_area']:'',
					'user_current_pincode' =>!empty($_POST['c_pincode'])?$_POST['c_pincode']:'',
					'user_current_address' =>!empty($_POST['c_address'])?$_POST['c_address']:'',
					'user_permanent_state' =>!empty($_POST['p_state'])?$_POST['p_state']:'',
					'user_permanent_district' =>!empty($_POST['p_district'])?$_POST['p_district']:'',
					'user_permanent_taluka' =>!empty($_POST['p_taluka'])?$_POST['p_taluka']:'',
					'user_permanent_area' =>!empty($_POST['p_area'])?$_POST['p_area']:'',
					'user_permanent_pincode' =>!empty($_POST['p_pincode'])?$_POST['p_pincode']:'',
					'user_permanant_address' =>!empty($_POST['p_address'])?$_POST['p_address']:'',
	
					'user_bank_name' =>!empty($_POST['bank_name'])?$_POST['bank_name']:'',
					'user_bank_account_number' =>!empty($_POST['bank_account_no'])?$_POST['bank_account_no']:'',
					'user_ifsc_code' =>!empty($_POST['ifsc_code'])?$_POST['ifsc_code']:'',
					'user_branch_name' =>!empty($_POST['branch_name'])?$_POST['branch_name']:'',

					'user_password' =>!empty($_POST['mobile_number'])?$_POST['mobile_number']:'',
				);
				$this->db->insert('user',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>Service Provider Added Successfully..!</b>',
					'type'=>'success'
				);
			}
		}else{
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);
	}

	public function service_provider_delete(){
		$this->session_validate();
		if (!empty($_POST['user_id'])) {
			$user_id=$_POST['user_id'];

			$this->db->query("DELETE from user where user_id=".$user_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Service Provider Deleted Successfully..!</b>',
				'type'=>'success'
			);
		}else{
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);
	}      

	public function service_provider_by_id(){
		$this->session_validate();
		if(!empty($_POST['user_id'])){
			$user_id=$_POST['user_id'];
			
			$data['record']=$this->db->query("	SELECT 
														user_company as company_name
														,user_first_name as name
														,user_middle_name as middle_name
														,user_last_name as last_name
														
														,user_mobile_number as mobile_number
														,user_alt_mobile_number as alt_mobile_number
														,user_email as email
														
														,user_photo as photo
														,user_experiance as experiance
														,user_specialization_id as Specialization
														
														,user_permanant_address as p_address
														,user_permanent_area as p_area
														,user_permanent_taluka as p_taluka
														,user_permanent_district as p_dist
														,user_permanent_state as p_state
														,user_permanent_pincode as p_pincode
														,user_current_address as c_address
														,user_current_area as c_area
														,user_current_taluka as c_taluka
														,user_current_district as c_dist
														,user_current_state as c_state
														,user_current_pincode as c_pincode
														,user_bank_name as bank_name
														,user_bank_account_number as account_number
														,user_ifsc_code as ifsc_code
														,user_branch_name as branch_name
														
												FROM user
													
												where user_id=".$user_id)->result_array();
			echo json_encode($data);
		}
	}

	public function department_role_designation_all(){
		$this->session_validate();
		$data['role']=$this->db->query("SELECT role_id as id,role_name as name FROM role")->result_array();
		$data['designation']=$this->db->query("SELECT designation_id as id,designation_name as name FROM designation")->result_array();
		echo json_encode($data);
	}

	public function change_service_provider_status()
	{
		if (!empty($_POST)) {
			$user_status=$_POST['user_status'];
			if($user_status=='Inactive')
				$status='Active';
			else
				$status='Inactive';
			$user_id=$_POST['user_id'];
			$this->db->query("update user set user_status='".$status."' where user_id='".$user_id."'");
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Service Provider Status Updated Successfully..!</b>',
				'type'=>'success'
			);
			$this->json_output($data);
		}

	}

	
}

?>