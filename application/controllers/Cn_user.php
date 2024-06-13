<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_user extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_user');
	}

	public function user_list(){
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
							user_id as id
							,concat(user_first_name,' ',	user_middle_name,' ',user_last_name) as name
							,designation_name as designation
							,user_mobile_number as mobile_number
							,user_email as user_email
							,concat('<i class=\"fa fa-edit edit_record\" user_id=\"',user_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" user_id=\"',user_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
							,CASE 
							        WHEN user_status='Active' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" checked  user_id=\"',user_id,'\" value=\"',user_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" user_id=\"',user_id,'\" value=\"',user_status,'\"><span class=\"slider round\"></span></label>')
							    END AS user_status
						from user
						join designation 
							on user_designation_id=designation_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					LIMIT ".$length." OFFSET ".$start;
			
		$result_data = $this->db->query($result_query)->result_array();
		
		$result_coun_query="	SELECT
						result_data.*
					from (
						SELECT 
							user_id as id
							,concat(user_first_name,' ',	user_middle_name,' ',user_last_name) as name
							,designation_name as designation
							,user_mobile_number as mobile_number
							,user_email as user_email
							,concat('<i class=\"fa fa-edit edit_record\" user_id=\"',user_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" user_id=\"',user_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
							,CASE 
							        WHEN user_status='Active' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" checked  user_id=\"',user_id,'\" value=\"',user_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" user_id=\"',user_id,'\" value=\"',user_status,'\"><span class=\"slider round\"></span></label>')
							    END AS user_status
						from user
						join designation 
							on user_designation_id=designation_id
					) result_data
					where name!=''
					".$searchQuery;
			
		$result_coun_data = $this->db->query($result_coun_query)->result_array();

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result_data),
			"iTotalDisplayRecords" => count($result_coun_data),
			"aaData" => $result_data,
			
		);
		echo json_encode($response);
	}

	public function user_action(){	
		$this->session_validate();

		
		if (!empty($_POST)) {

			if(!empty($_FILES['aadhar_photo']['name']))
			{
				$image='aadhar_photo';
				$path='uploads/user/Aadhaar';
				$type='jpg|jpeg|png';
				$new_name='aadhar_photo-'.date('YmdHis');
				$error_msg='Something went wrong!';
				$aadhar_img_url=base_url().$path.'/'.$this->My_Model->uploadFile($path, $type, $image, $error_msg, $new_name);
			}
			else
			{
				if(!empty($_POST['aadhar_front_url']))
				{
					$aadhar_img_url=$_POST['aadhar_url'];
				}
				else
				{
					$aadhar_img_url='https://aqdsoft.in/uploads/user/Aadhaar/default_aadhar_front_photo.png';
				}				
			}

			

			if(!empty($_FILES['pan_photo']['name']))
			{
				$image='pan_photo';
				$path='uploads/user/PAN';
				$type='jpg|jpeg|png';
				$new_name='pan_photo-'.date('YmdHis');
				$error_msg='Something went wrong!';
				$pan_img_url=base_url().$path.'/'.$this->My_Model->uploadFile($path, $type, $image, $error_msg, $new_name);
			}
			else
			{
				if(!empty($_POST['other_doc_url']))
				{
					$pan_img_url=$_POST['other_doc_url'];
				}
				else
				{
					$pan_img_url='https://aqdsoft.in/uploads/user/Aadhaar/default_pan_photo.png';
				}
			}

			if(!empty($_POST['user_id'])) {
				$record_data = array(
					
					'user_designation_id' =>!empty($_POST['designation'])?$_POST['designation']:'',
				
					'user_first_name' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
					'user_middle_name' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
					'user_last_name' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
					'user_dob' =>!empty($_POST['dob_date'])?$_POST['dob_date']:'',
					'user_gender' =>!empty($_POST['gender'])?$_POST['gender']:'',
					'user_marital_status' =>!empty($_POST['marital_status'])?$_POST['marital_status']:'',
					'user_blood_group' =>!empty($_POST['blood_group'])?$_POST['blood_group']:'',
					'user_mobile_number' =>!empty($_POST['mobile_number'])?$_POST['mobile_number']:'',
					'user_alt_mobile_number' =>!empty($_POST['alt_mobile_number'])?$_POST['alt_mobile_number']:'',
					'user_email' =>!empty($_POST['email'])?$_POST['email']:'',
					'user_photo' =>!empty($targetfilepath)?$targetfilepath:'',

					'user_number' =>!empty($_POST['user_number'])?$_POST['user_number']:'',
					'user_specialization_id' => !empty($_POST['Specialization']) ? implode(',', $_POST['Specialization']) : '',
					'user_date_of_joined' =>!empty($_POST['date_of_join'])?$_POST['date_of_join']:'',
					'user_probation_period' =>!empty($_POST['probation_period'])?$_POST['probation_period']:'',
					'user_confirmation_date' =>!empty($_POST['confirmation_date'])?$_POST['confirmation_date']:'',
					'user_uan_number' =>!empty($_POST['uan_number'])?$_POST['uan_number']:'',




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
					
					'user_designation_id' =>!empty($_POST['designation'])?$_POST['designation']:'',
					'user_first_name' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
					'user_middle_name' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
					'user_last_name' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
					'user_dob' =>!empty($_POST['dob_date'])?$_POST['dob_date']:'',
					'user_gender' =>!empty($_POST['gender'])?$_POST['gender']:'',
					'user_marital_status' =>!empty($_POST['marital_status'])?$_POST['marital_status']:'',
					'user_blood_group' =>!empty($_POST['blood_group'])?$_POST['blood_group']:'',
					'user_mobile_number' =>!empty($_POST['mobile_number'])?$_POST['mobile_number']:'',
					'user_alt_mobile_number' =>!empty($_POST['alt_mobile_number'])?$_POST['alt_mobile_number']:'',
					'user_email' =>!empty($_POST['email'])?$_POST['email']:'',
					'user_photo' =>!empty($_POST['photo'])?$_POST['photo']:'',

					'user_case_paper_validity' =>!empty($_POST['case_paper_validity'])?$_POST['case_paper_validity']:'',
					'user_followup_charges_type' =>!empty($_POST['follow_up_charges'])?$_POST['follow_up_charges']:'',
					'user_free_days' =>!empty($_POST['no_of_free_days'])?$_POST['no_of_free_days']:'',
					'user_free_visit' =>!empty($_POST['no_of_free_visits'])?$_POST['no_of_free_visits']:'',

					'user_number' =>!empty($_POST['user_number'])?$_POST['user_number']:'',
					'user_specialization_id' => !empty($_POST['Specialization']) ? implode(',', $_POST['Specialization']) : '',
					'user_date_of_joined' =>!empty($_POST['date_of_join'])?$_POST['date_of_join']:'',
					'user_probation_period' =>!empty($_POST['probation_period'])?$_POST['probation_period']:'',
					'user_confirmation_date' =>!empty($_POST['confirmation_date'])?$_POST['confirmation_date']:'',
					'user_uan_number' =>!empty($_POST['uan_number'])?$_POST['uan_number']:'',

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

					'usert_payment_method' =>!empty($_POST['payment_method'])?$_POST['payment_method']:'',
					'user_min_amount' =>!empty($_POST['branch_name'])?$_POST['branch_name']:'',
					'user_opd_commission' =>!empty($_POST['opd_commission'])?$_POST['opd_commission']:'',
					'user_ipd_commission' =>!empty($_POST['ipd_commission'])?$_POST['ipd_commission']:'',
					'user_diagno_commission' =>!empty($_POST['diagno_commission'])?$_POST['diagno_commission']:'',
					'user_pharma_commission' =>!empty($_POST['pharma_commission'])?$_POST['pharma_commission']:'',
					


					
					'user_password' =>!empty($_POST['mobile_number'])?$_POST['mobile_number']:'',
				);
				$this->db->insert('user',$record_data);
				
				$insert_id = $this->db->insert_id();
				if($insert_id){

					$aadhar_no=$_POST['aadhaar_number'];
					$pan_no=$_POST['pan_number'];
					$query1="INSERT into user_document(document_name,document_number,document_url,document_user_id)
						values('Aadhaar','".$aadhar_no."','".$aadhar_img_url."','".$insert_id."')";
					$query2="INSERT into user_document(document_name,document_number,document_url,document_user_id)
						values('Pan','".$pan_no."','".$pan_img_url."','".$insert_id."')";
							
					$this->db->query($query1);
					$this->db->query($query2);

				}
				
				$data['user_id']=$insert_id;	
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>User Added Successfully..!</b>',
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

	public function user_delete(){
		$this->session_validate();
		if (!empty($_POST['user_id'])) {
			$user_id=$_POST['user_id'];

			$this->db->query("DELETE from user where user_id=".$user_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>User Deleted Successfully..!</b>',
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

	public function user_by_id(){
		$this->session_validate();
		if(!empty($_POST['user_id'])){
			$user_id=$_POST['user_id'];
			$data['record']=$this->db->query("	SELECT 
														designation_id as designation
														,user_first_name as name
														,user_middle_name as middle_name
														,user_last_name as last_name
														,user_mother_name as mother_name
														,user_dob as dob
														,user_gender as gender
														,user_marital_status as marital_status
														,user_blood_group as blood_group
														,user_mobile_number as mobile_number
														,user_alt_mobile_number as alt_mobile_number
														,user_email as email
														,user_date_of_joined as date_of_join
														,user_photo as photo
														,user_specialization_id as Specialization
														,user_permanant_address as permanant_address
														,user_permanent_area as p_area
														,user_permanent_taluka as p_taluka
														,user_permanent_district as p_dist
														,user_permanent_state as p_state
														,user_permanent_pincode as p_pincode
														,user_current_address as current_address
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
													join designation 
														on user_designation_id=designation_id
												where user_id=".$user_id)->result_array();
			$this->json_output($data);
		}
	}

	public function doctor_by_department_id(){
		$this->session_validate();
		if(!empty($_POST['d_id'])){
			$d_id=$_POST['d_id'];
			$data['record']=$this->db->query("SELECT 
					                  user_id as id
							  ,concat('Dr.',user_first_name,' ',user_last_name) as name
							   FROM user
							   join user_department_assign
							   on UDA_user_id=user_id
							   where UDA_department_id='".$d_id."' and user_designation_id='3' and UDA_status='1'")->result_array();
			$this->json_output($data);
		}
	}

	public function department_by_doctor_id(){
		$this->session_validate();
		if(!empty($_POST['doctor_name'])){
			$doctor_name=$_POST['doctor_name'];
			$data['record']=$this->db->query("	SELECT 
														department_id as id
														,department_name as name
												FROM user_department_assign
												join department
													on UDA_department_id=department_id
												where UDA_user_id='".$doctor_name."'")->result_array();
			$this->json_output($data);
		}
	}

	public function doctor_by_section_id(){
		$this->session_validate();
		if(!empty($_POST['section_name'])){
			$section_name=$_POST['section_name'];
			$section_data=$this->db->query("SELECT section_name from section where section_id='".$section_name."'")->row_array();
	
			$data['record']=$this->db->query("	SELECT 
														user_id as id
														,concat('Dr.',user_first_name,' ',user_last_name) as name
												FROM user
												join user_department_assign
													on UDA_user_id=user_id
												where UDA_department_id in (SELECT department_id from department where department_section like '%".$section_data['section_name']."%')  and UCASE(user_designation_name) like '%DOCTOR%' and UDA_status='1'")->result_array();
			$this->json_output($data);
		}
	}

	public function doctors_by_sub_department_id(){
			$this->session_validate();
			if(!empty($_POST['sd_id'])){
			$sd_id=$_POST['sd_id'];
			$data['record']=$this->db->query("	SELECT 
														user_id as id
														,concat(user_first_name,' ',user_middle_name,' ',user_last_name)as name
												FROM user_department_assign
												JOIN user on UDA_user_id=user_id
												where UDA_status='1' and UCASE(user_designation_name) like '%DOCTOR%'and UDA_sub_department_id=".$sd_id)->result_array();
				echo json_encode($data);
			}
	}

	public function department_role_designation_all(){
		$this->session_validate();
		$data['role']=$this->db->query("SELECT role_id as id,role_name as name FROM role")->result_array();
		$data['designation']=$this->db->query("SELECT designation_id as id,designation_name as name FROM designation")->result_array();
		echo json_encode($data);
	}

	public function chage_user_status()
	{
		$this->session_validate();
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
				'text'=>'<b>User Status Updated Successfully..!</b>',
				'type'=>'success'
			);
			$this->json_output($data);
		}

	}
	public function get_pincode()
	{			
			$this->session_validate();
				$pincode=$_POST['pincode'];

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'http://www.postalpincode.in/api/pincode/'.$pincode,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'GET',
				));

				$response = curl_exec($curl);

				curl_close($curl);
				$result=json_decode($response,true);
				if($result['Status']=='Success'){
					$data['status']='Success';
					$data['list']=$result['PostOffice'];
				}else{
					$data['status']='Failed';
					$data['swall']=array(
						'title'=>'Oops!',
						'text'=>'<b>Something went wrong!</b>',
						'type'=>'warning'
					);
				}
				$this->json_output($data);

	}

	public function user_details()
	{
		$this->session_validate();
		$user_id=$this->uri->segment(2);
		
		$query="SELECT user.*
							,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as user_name
							,document_number as pan_number
							,document_url as photo_url
							 from user 
							 	JOIN user_document on user_id=document_user_id
							 	where document_name='Pan' and user_id='".$user_id."'";
		$data['user_details']=$this->db->query($query)->row_array();
		//print_r($data['user_details']);
		$this->load->view('vw_user_details',$data);
	}

	public function assign_department_action()
	{
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'UDA_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
				'UDA_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
				'UDA_sub_department_id' =>!empty($_POST['sd_name'])?$_POST['sd_name']:'0',
				'UDA_start_timestamp' =>date('Y-m-d H:i:s'),

			);

			

			if($record_data['UDA_sub_department_id']=='0'){
				$this->db->query("DELETE from user_department_assign where UDA_user_id='".$record_data['UDA_user_id']."' and UDA_department_id ='".$record_data['UDA_department_id']."'");
			}

			$duplicate_check=$this->db->query("SELECT * from user_department_assign where UDA_user_id='".$record_data['UDA_user_id']."' and UDA_department_id ='".$record_data['UDA_department_id']."' and (UDA_sub_department_id='".$record_data['UDA_sub_department_id']."' or UDA_sub_department_id='0')")->result_array();	
			if(empty($duplicate_check)){
				$result=$this->db->insert('user_department_assign',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>Department Assigned Successfully..!</b>',
					'type'=>'success'
				);
			}else{
				$data['swall']=array(
					'title'=>'Duplicate Entry!',
					'text'=>'<b>Duplicate Department Assigned to User..!</b>',
					'type'=>'warning'
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

	public function user_department_assign_list()
	{	
		
		//echo $user_id;
		$this->session_validate();
		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length']; 
		$searchValue = $_POST['search']['value']; 
		$searchQuery = "";
		//$user_id = $_POST['user_id'];
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
							user_id as id
							,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as name
							,department_name as d_name

							,Case when sub_department_name is null then 'All Sub-Department' else sub_department_name end as sd_name
							,concat('<i class=\"fa fa-trash delete_record\" UDA_id=\"',UDA_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
							,CASE 
							        WHEN UDA_status='1' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" checked  UDA_id=\"',UDA_id,'\" value=\"',UDA_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" UDA_id=\"',UDA_id,'\" value=\"',UDA_status,'\"><span class=\"slider round\"></span></label>')
							    END AS status
						from user_department_assign
						join user 
							on UDA_user_id=user_id
						join department
							on UDA_department_id=department_id
						left join sub_department
							on UDA_sub_department_id =  sub_department_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery;
			
		$result = $this->db->query($result_query)->result_array();
		$result_data=array_slice($result, $start,$length);

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result),
			"iTotalDisplayRecords" => count($result),
			"aaData" => $result_data,
			
		);
		echo json_encode($response);
	}

	public function user_doctors_by_service()
	{
		$this->session_validate();
			if(!empty($_POST['s_id'])){

			$s_id=$_POST['s_id'];
			$data['record']=$this->db->query("SELECT 
													services_rate as rate
													,user_id as id
													,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as name
												FROM services
												join department_assignment
													on services_department_id=DA_department_id
												join user
													on DA_user_id = user_id
												where services_id =".$s_id)->result_array();
				echo json_encode($data);
			}
	}
	
	public function change_department_assign_status()
	{
		if (!empty($_POST)) {
			$UDA_status=$_POST['UDA_status'];
			if($UDA_status=='0')
				$status='1';
			else
				$status='0';
			$UDA_id=$_POST['UDA_id'];
			$this->db->query("update user_department_assign set UDA_status='".$status."' ,UDA_end_timestamp = date('Y-m-d H:i:s') where UDA_id='".$UDA_id."'");
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Status Updated Successfully..!</b>',
				'type'=>'success'
			);
			$this->json_output($data);
		}
	}

	public function users_all()
	{
		$this->session_validate();
		$data['record']=$this->db->query("SELECT user_id as id,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as name FROM user")->result_array();
		$this->json_output($data);

	}

	public function doctors_all()
	{
		$this->session_validate();
		$data['record']=$this->db->query("SELECT user_id as id,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as name FROM user where user_designation_id=3")->result_array();
		$this->json_output($data);

	}

	public function assign_department_delete(){
		$this->session_validate();
		if (!empty($_POST['UDA_id'])) {
			$UDA_id=$_POST['UDA_id'];

			$this->db->query("DELETE from user_department_assign where UDA_id=".$UDA_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Assigned Department Deleted Successfully..!</b>',
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


	public function get_user_details_list(){

		$this->session_validate();

		$active_tab=!empty($this->input->post('active_tab'))?$this->input->post('active_tab'):$this->input->post('active_tab');
		$user_id=!empty($this->input->post('user_id'))?$this->input->post('user_id'):$this->input->post('user_id');




		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length']; 
		$searchValue = $_POST['search']['value']; 
		$searchQuery = "";

		for ($i=0; $i <count($_POST['columns']) ; $i++) { 
			if (!empty($_POST['columns'][$i]['search']['value'])) {
				$searchQuery.="AND ".$_POST['columns'][$i]['data']." like '%".$_POST['columns'][$i]['search']['value']."%'";
			}
		}	

		if($searchValue != ''){
			$searchQuery.= " AND pass_no like '%".$searchValue."%' 
			AND date_time like '%".$searchValue."%' AND user_name like '%".$searchValue."%'";
		}

		


		switch ($active_tab) {

			case 'dept_assign':
						$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							user_id as id
							,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as name
							,department_name as d_name
							,date_format(UDA_start_timestamp,'%d-%m-%Y %h:%i %p') as date_time
							,Case when sub_department_name is null then 'All Sub-Department' else sub_department_name end as sd_name
							,concat('<i class=\"fa fa-trash delete_record\" UDA_id=\"',UDA_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
							,'0' as blank
							,CASE 
							        WHEN UDA_status='1' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" checked  UDA_id=\"',UDA_id,'\" value=\"',UDA_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" UDA_id=\"',UDA_id,'\" value=\"',UDA_status,'\"><span class=\"slider round\"></span></label>')
							    END AS status
						from user_department_assign
						join user 
							on UDA_user_id=user_id
						join department
							on UDA_department_id=department_id
						left join sub_department
							on UDA_sub_department_id =  sub_department_id
							where UDA_user_id='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery;

			break;
			case 'role_assign':
						$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							RA_id
							,role_name as name
							,date_format(RA_strat_timestamp,'%d-%m-%Y %h:%i %p') as date_time
							,'0' as blank
							,'NA' as action 
							,CASE 
							        WHEN RS_status='Active' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_RA_status\" checked  RA_id=\"',RA_id,'\" value=\"',RS_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_RA_status\" RA_id=\"',RA_id,'\" value=\"',RS_status,'\"><span class=\"slider round\"></span></label>')
							    END AS status
						from role_assignment
						join role
							on RA_role_id=role_id
							where RA_user_id ='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					Order by name";

			break;
			case 'qualification_list':
			$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							UQ_registration_no as reg_no
							,date_format(UQ_timestamp,'%d-%m-%Y %h:%i %p') as date_time
							,UQ_university as university
							,date_format(UQ_valid_up_to,'%d-%m-%Y') as valid_up_to
							,'0' as blank
							,concat('<i class=\"fa fa-trash delete_record\" UQ_id =\"',UQ_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from user_qualification
						where UQ_user_id='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where reg_no!=''
					".$searchQuery."
					order by reg_no ";

			break;
			case 'work_experience_list':
			$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							 WE_id as id
							,WE_employer_name as name
							,WE_designation as designation
							,date_format(WE_period_from,'%d-%m-%Y') as from_date
							,date_format(WE_period_to,'%d-%m-%Y') as to_date
							,'0' as blank
							,concat('<i class=\"fa fa-edit edit_record\" WE_id=\"',WE_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" WE_id=\"',WE_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from user_work_experience
						where WE_user_id='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by name ";

			break;
			case 'reference_list':
			$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							 UR_id as id
							,UR_name as name
							,UR_employer as employer
							,UR_designation as designation
							,UR_department as department
							,UR_contact_no as contact_no
							,UR_email_id as email
							,'0' as blank
							,concat('<i class=\"fa fa-edit edit_record\" UR_id=\"',UR_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" UR_id=\"',UR_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from user_reference_table
						where UR_user_id='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by name ";

			break;
			case 'document_list':
			$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							 document_id  as id
							,document_name as name
							,document_number as doc_number
							,document_url as doc_url
							,'0' as blank
							,concat('<i class=\"fa fa-edit edit_record\" document_id=\"',document_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" document_id=\"',document_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from user_document
						where document_user_id='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by name ";
			break;
			case 'family_details_list':
			$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							 UF_id as id
							,concat(UF_first_name,' ',UF_middle_name,' ',UF_last_name) as name
							,UF_relation as relation
							,UF_contact_number as contact_number
							,UF_address as address
							,'0' as blank
							,concat('<i class=\"fa fa-edit edit_record\" UF_id=\"',UF_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" UF_id=\"',UF_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from user_family
						where 	UF_user_id='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by name ";

			break;

			case 'bank_details_list':
			$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							 BAD_id as id
							,BAD_holder_name as name
							,BAD_account_number	 as account_number
							,BAD_ifsc_code as ifsc_code
							,BAD_branch_name as branch_name
							,'0' as blank
							,concat('<i class=\"fa fa-edit edit_record\" BAD_id=\"',BAD_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" BAD_id=\"',BAD_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from bank_account_details
						where BDA_user_id='".$user_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by name ";

			break;



		}
			
		$result = $this->db->query($result_query)->result_array();
		$result_data=array_slice($result, $start,$length);

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result),
			"iTotalDisplayRecords" => count($result),
			"aaData" => $result_data,
			
		);
		echo json_encode($response);


	}   


	public function qualification_action()
	{
		$this->session_validate();
	
		if (!empty($_POST)) {

			$record_data = array(
				'UQ_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
				'UQ_registration_no' =>!empty($_POST['registration_no'])?$_POST['registration_no']:'',
				'UQ_university' =>!empty($_POST['registration_univeristy'])?$_POST['registration_univeristy']:'',
				'UQ_valid_up_to' =>!empty($_POST['valid_upto'])?$_POST['valid_upto']:'',
				'UQ_timestamp' =>date('Y-m-d H:i:s'),
			);

			if (!empty($_POST['UQ_id'])) {
				$record_check=$this->db->query("SELECT * FROM role_assignment where RA_id='".$_POST['RA_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM role_assignment where RA_user_id='".$record_data['RA_user_id']."' and RA_role_id='".$record_data['RA_role_id']."' and RA_id!='".$_POST['RA_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('RA_id',$_POST['RA_id']);
						$this->db->update('role_assignment',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Role Assignment Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Role Name Already Exist</b>',
							'type'=>'warning'
						);
					}
				}else{
					$data['swall']=array(
						'title'=>'Missing Entry',
						'text'=>'<b>Record Entry Is Not Available.</b>',
						'type'=>'warning'
					);
				}
			}else{
				
			   $query1="SELECT * FROM user_qualification WHERE UQ_registration_no = '".$record_data['UQ_registration_no']."' AND UQ_university='".$record_data['UQ_university']."' AND UQ_valid_up_to='".$record_data['UQ_valid_up_to']."'";
				$duplicate_check = $this->db->query($query1)->result_array();
				if(empty($duplicate_check)){

    				
		            $this->db->insert('user_qualification',$record_data);
			      

					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Qualification Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Role Assignment Already Exist</b>',
						'type'=>'warning'
					);
				}
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

	public function work_experience_action()
	{
		$this->session_validate();
	
		if (!empty($_POST)) {

			$record_data = array(
				'WE_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
				'WE_employer_name' =>!empty($_POST['employer_name'])?$_POST['employer_name']:'',
				'WE_designation' =>!empty($_POST['designation'])?$_POST['designation']:'',
				'WE_period_from' =>!empty($_POST['from_date'])?$_POST['from_date']:'',
				'WE_period_to' =>!empty($_POST['to_date'])?$_POST['to_date']:'',
				'WE_timestamp' =>date('Y-m-d H:i:s'),
			);

			if (!empty($_POST['WE_id'])) {
				$record_check=$this->db->query("SELECT * FROM user_work_experience where RA_id='".$_POST['RA_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM role_assignment where RA_user_id='".$record_data['RA_user_id']."' and RA_role_id='".$record_data['RA_role_id']."' and RA_id!='".$_POST['RA_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('RA_id',$_POST['RA_id']);
						$this->db->update('role_assignment',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Role Assignment Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Role Name Already Exist</b>',
							'type'=>'warning'
						);
					}
				}else{
					$data['swall']=array(
						'title'=>'Missing Entry',
						'text'=>'<b>Record Entry Is Not Available.</b>',
						'type'=>'warning'
					);
				}
			}else{
				
			   $query1="SELECT * FROM user_work_experience WHERE WE_employer_name = '".$record_data['WE_employer_name']."' AND WE_designation='".$record_data['WE_designation']."' AND WE_period_from='".$record_data['WE_period_from']."' AND WE_period_to='".$record_data['WE_period_to']."'";
				$duplicate_check = $this->db->query($query1)->result_array();
				if(empty($duplicate_check)){

    				
		            $this->db->insert('user_work_experience',$record_data);
			      

					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Work Experience Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Role Assignment Already Exist</b>',
						'type'=>'warning'
					);
				}
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

	public function referance_action()
	{
		$this->session_validate();
	
		if (!empty($_POST)) {

			$record_data = array(
				'UR_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
				'UR_name' =>!empty($_POST['name_of_referance'])?$_POST['name_of_referance']:'',
				'UR_employer' =>!empty($_POST['reference_employer'])?$_POST['reference_employer']:'',
				'UR_designation' =>!empty($_POST['reference_designation'])?$_POST['reference_designation']:'',
				'UR_department' =>!empty($_POST['reference_department'])?$_POST['reference_department']:'',
				'UR_contact_no' =>!empty($_POST['reference_contact_no'])?$_POST['reference_contact_no']:'',
				'UR_email_id' =>!empty($_POST['reference_email_id'])?$_POST['reference_email_id']:'',
				'UR_timestamp' =>date('Y-m-d H:i:s'),
			);

			if (!empty($_POST['UR_id'])) {
				$record_check=$this->db->query("SELECT * FROM user_work_experience where RA_id='".$_POST['RA_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM role_assignment where RA_user_id='".$record_data['RA_user_id']."' and RA_role_id='".$record_data['RA_role_id']."' and RA_id!='".$_POST['RA_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('RA_id',$_POST['RA_id']);
						$this->db->update('role_assignment',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Reference Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Reference Already Exist</b>',
							'type'=>'warning'
						);
					}
				}else{
					$data['swall']=array(
						'title'=>'Missing Entry',
						'text'=>'<b>Record Entry Is Not Available.</b>',
						'type'=>'warning'
					);
				}
			}else{
				
			   $query1="SELECT * FROM user_reference_table WHERE UR_name ='".$record_data['UR_name']."' AND UR_employer='".$record_data['UR_employer']."' AND UR_designation='".$record_data['UR_designation']."' AND UR_department='".$record_data['UR_department']."'";
				$duplicate_check = $this->db->query($query1)->result_array();
				if(empty($duplicate_check)){

    				
		            $this->db->insert('user_reference_table',$record_data);
			      

					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Reference Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Reference Already Exist</b>',
						'type'=>'warning'
					);
				}
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

	public function document_action()
	{
		$this->session_validate();
	
		if (!empty($_POST)) {


			if(!empty($_FILES['document_photo']['name']))
			{
				$image='document_photo';
				$path='uploads/user/other_docs';
				$type='jpg|jpeg|png';
				$new_name='doc_photo-'.date('YmdHis');
				$error_msg='Something went wrong!';
				$doc_img_url=base_url().$path.'/'.$this->My_Model->uploadFile($path, $type, $image, $error_msg, $new_name);
			}
			else
			{
				if(!empty($_POST['doc_url']))
				{
					$doc_img_url=$_POST['document_photo'];
				}
							
			}


			$record_data = array(
				'document_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
				'document_name' =>!empty($_POST['name_of_document'])?$_POST['name_of_document']:'',
				'document_number' =>!empty($_POST['document_number'])?$_POST['document_number']:'',
				'document_url' =>$doc_img_url,
				'document_timestamp' =>date('Y-m-d H:i:s'),
			);

			if (!empty($_POST['document_id'])) {
				$record_check=$this->db->query("SELECT * FROM user_work_experience where RA_id='".$_POST['RA_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM role_assignment where RA_user_id='".$record_data['RA_user_id']."' and RA_role_id='".$record_data['RA_role_id']."' and RA_id!='".$_POST['RA_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('RA_id',$_POST['RA_id']);
						$this->db->update('role_assignment',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Document Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Document Already Exist</b>',
							'type'=>'warning'
						);
					}
				}else{
					$data['swall']=array(
						'title'=>'Missing Entry',
						'text'=>'<b>Record Entry Is Not Available.</b>',
						'type'=>'warning'
					);
				}
			}else{
				
			   $query1="SELECT * FROM user_document WHERE document_name ='".$record_data['document_name']."' AND document_number='".$record_data['document_number']."'";
				$duplicate_check = $this->db->query($query1)->result_array();
				if(empty($duplicate_check)){

    				
		            $this->db->insert('user_document',$record_data);
			      

					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Document Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Reference Already Exist</b>',
						'type'=>'warning'
					);
				}
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

	


	public function family_action()
	{
		$this->session_validate();
	
		if (!empty($_POST)) {

			$record_data = array(
				'UF_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
				'UF_first_name' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
				'UF_middle_name' =>!empty($_POST['middle_name'])?$_POST['middle_name']:'',
				'UF_last_name' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
				'UF_relation' =>!empty($_POST['relation'])?$_POST['relation']:'',
				'UF_contact_number' =>!empty($_POST['contact_number'])?$_POST['contact_number']:'',
				'UF_address' =>!empty($_POST['address'])?$_POST['address']:'',
				'UF_timestamp' =>date('Y-m-d H:i:s'),
			);

			if (!empty($_POST['UF_user_id'])) {
				$record_check=$this->db->query("SELECT * FROM user_work_experience where RA_id='".$_POST['RA_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM role_assignment where RA_user_id='".$record_data['RA_user_id']."' and RA_role_id='".$record_data['RA_role_id']."' and RA_id!='".$_POST['RA_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('RA_id',$_POST['RA_id']);
						$this->db->update('role_assignment',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Reference Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Reference Already Exist</b>',
							'type'=>'warning'
						);
					}
				}else{
					$data['swall']=array(
						'title'=>'Missing Entry',
						'text'=>'<b>Record Entry Is Not Available.</b>',
						'type'=>'warning'
					);
				}
			}else{
				
			   $query1="SELECT * FROM user_family WHERE UF_first_name ='".$record_data['UF_first_name']."' AND UF_middle_name='".$record_data['UF_middle_name']."' AND UF_last_name='".$record_data['UF_last_name']."' AND UF_relation='".$record_data['UF_relation']."'";
				$duplicate_check = $this->db->query($query1)->result_array();
				if(empty($duplicate_check)){

    				
		            $this->db->insert('user_family',$record_data);
			      

					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Family Details Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Reference Already Exist</b>',
						'type'=>'warning'
					);
				}
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


	public function CMA_doctor_list()
	{
		$this->session_validate();
		$data['record']=$this->db->query("SELECT user_id as id,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as name FROM user where user_designation_id =3 ")->result_array();
		$this->json_output($data);

	}

	

	public function add_bank_account_action(){	
		$this->session_validate();

		if (!empty($_POST)) {

			if(!empty($_POST['BDA_id'])) {
				
				$record_data = array(
					
					'BAD_holder_name' =>!empty($_POST['designation'])?$_POST['designation']:'',
					'BAD_account_number' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
					'BAD_ifsc_code' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
					'BAD_ifsc_branch' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
					
					
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
					
					'BAD_holder_name' =>!empty($_POST['account_holder_name'])?$_POST['account_holder_name']:'',
					'BAD_account_number' =>!empty($_POST['account_number'])?$_POST['account_number']:'',
					'BAD_ifsc_code' =>!empty($_POST['ifsc_code'])?$_POST['ifsc_code']:'',
					'BAD_branch_name' =>!empty($_POST['branch'])?$_POST['branch']:'',
					'BDA_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
					
				);
				$this->db->insert('bank_account_details',$record_data);
				
				$insert_id = $this->db->insert_id();
				
				
				$data['user_id']=$insert_id;	
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>Bank Account Added Successfully..!</b>',
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



	
	

	
	
}

?>