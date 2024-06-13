<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_patient extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_patient');
	}

	public function patient_list(){
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
							or reg_date like '%".$searchValue."%' 
							or grn like '%".$searchValue."%' 
							or dob like '%".$searchValue."%' 
							or age like '%".$searchValue."%' 
							or gender like '%".$searchValue."%' 
							or marital_status like '%".$searchValue."%' 
							or occupation_name like '%".$searchValue."%' 
							or identity_type like '%".$searchValue."%' 
							or identity_number like '%".$searchValue."%' 
							or mobile_number like '%".$searchValue."%' 
							or alt_mobile_number like '%".$searchValue."%' 
							or email like '%".$searchValue."%' 
							or pincode like '%".$searchValue."%' 
							or state like '%".$searchValue."%' 
							or district like '%".$searchValue."%' 
							or taluka like '%".$searchValue."%' 
							or area like '%".$searchValue."%' 
							or address like '%".$searchValue."%')";
		}

		$result_query="	SELECT
						*
					from (
						SELECT 
							P_id as id
							,date_format(P_reg_date,'%d-%m-%Y') as reg_date
							,P_grn as grn
							,case when P_middle_name='' then concat(P_name_prefix,'. ',P_first_name,' ',P_last_name) else concat(P_name_prefix,'. ',P_first_name,' ',P_middle_name,' ',P_last_name) end as name
							,P_mother_name as mother_name
							,date_format(P_dob,'%d-%m-%Y') as dob
							,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
							,P_gender as gender
							,P_marital_status as marital_status
							,occupation_name
							,P_identity_type as identity_type
							,P_identity_number as identity_number
							,P_mobile_number as mobile_number
							,P_alt_mobile_number as alt_mobile_number
							,P_email as email
							,P_pincode as pincode
							,P_state as state
							,P_district as district
							,P_taluka as taluka
							,P_area as area
							,P_address as address
							,case
								when P_grn is NOT NULL then concat('<i class=\"fa fa-edit edit_record\" p_id=\"',P_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" p_id=\"',P_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') 
								else concat('<i class=\"fa fa-edit edit_record\" p_id=\"',P_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') 
							end as action
						from patient
						left join occupation
						on P_occupation_id=occupation_id
					) result_data
					where id>0
					".$searchQuery."
					order by id desc
					LIMIT ".$length." OFFSET ".$start;
			
		$result_data = $this->db->query($result_query)->result_array();
			
		$result_count_query="	SELECT
						*
					from (
						SELECT
							 P_id as id
							,date_format(P_reg_date,'%d-%m-%Y') as reg_date
							,P_grn as grn
							,case when P_middle_name='' then concat(P_name_prefix,'. ',P_first_name,' ',P_last_name) else concat(P_name_prefix,'. ',P_first_name,' ',P_middle_name,' ',P_last_name) end as name
							,P_mother_name as mother_name
							,date_format(P_dob,'%d-%m-%Y') as dob
							,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
							,P_gender as gender
							,P_marital_status as marital_status
							,occupation_name
							,P_identity_type as identity_type
							,P_identity_number as identity_number
							,P_mobile_number as mobile_number
							,P_alt_mobile_number as alt_mobile_number
							,P_email as email
							,P_pincode as pincode
							,P_state as state
							,P_district as district
							,P_taluka as taluka
							,P_area as area
							,P_address as address
							,case
								when P_grn is NOT NULL then concat('<i class=\"fa fa-edit edit_record\" p_id=\"',P_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" p_id=\"',P_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') 
								else concat('<i class=\"fa fa-edit edit_record\" p_id=\"',P_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') 
							end as action
						from patient
						left join occupation
						on P_occupation_id=occupation_id
					) result_data
					where id>0
					".$searchQuery;
			
		$result_count_data = $this->db->query($result_count_query)->result_array();
			
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result_count_data),
			"iTotalDisplayRecords" => count($result_count_data),
			"aaData" => $result_data,
			
		);
		echo json_encode($response);
	}

	public function patient_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'P_name_prefix' =>!empty($_POST['prefix'])?$_POST['prefix']:'',
				'P_first_name' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
				'P_middle_name' =>!empty($_POST['middle_name'])?$_POST['middle_name']:'',
				'P_last_name' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
				'P_mother_name' =>!empty($_POST['mother_name'])?$_POST['mother_name']:'',
				'P_father_name' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
				'P_dob' =>!empty($_POST['birth_date'])?$_POST['birth_date']:'',
				'P_gender' =>!empty($_POST['gender'])?$_POST['gender']:'',
				'P_identity_type' =>!empty($_POST['identity_type'])?$_POST['identity_type']:'',
				'P_identity_number' =>!empty($_POST['identity_number'])?$_POST['identity_number']:'',
				'P_occupation_id' =>!empty($_POST['occupation'])?$_POST['occupation']:'',
				'P_marital_status' =>!empty($_POST['marital_status'])?$_POST['marital_status']:'',
				'P_mobile_number' =>!empty($_POST['mobile_number'])?$_POST['mobile_number']:'',
				'P_alt_mobile_number' =>!empty($_POST['alt_mobile_number'])?$_POST['alt_mobile_number']:'',
				'P_email' =>!empty($_POST['email'])?$_POST['email']:'',
				'P_pincode' =>!empty($_POST['pincode'])?$_POST['pincode']:'',
				'P_state' =>!empty($_POST['state'])?$_POST['state']:'',
				'P_district' =>!empty($_POST['district'])?$_POST['district']:'',
				'P_taluka' =>!empty($_POST['taluka'])?$_POST['taluka']:'',
				'P_area' =>!empty($_POST['area'])?$_POST['area']:'',
				'P_address' =>!empty($_POST['per_address'])?$_POST['per_address']:'',
			);

			if (!empty($_POST['patient_id'])) {
				$record_check=$this->db->query("SELECT * FROM patient where P_id='".$_POST['patient_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM patient where P_first_name='".$record_data['P_first_name']."' and P_gender='".$record_data['P_gender']."' and P_last_name='".$record_data['P_last_name']."' and P_mobile_number='".$record_data['P_mobile_number']."'  and P_dob='".$record_data['P_dob']."' and P_id!='".$_POST['patient_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('P_id',$_POST['patient_id']);
						$this->db->update('patient',$record_data);
						$data['patient_id']=$_POST['patient_id'];
						$data['P_first_name']=$_POST['first_name'];
						$data['P_last_name']=$_POST['last_name'];
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Patient Details Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['patient_id']=$duplicate_check[0]['P_id'];
						$data['P_first_name']=$_POST['first_name'];
						$data['P_last_name']=$_POST['last_name'];
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Patient Details Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM patient where P_first_name='".$record_data['P_first_name']."' and P_gender='".$record_data['P_gender']."' and P_last_name='".$record_data['P_last_name']."' and P_mobile_number='".$record_data['P_mobile_number']."'  and P_dob='".$record_data['P_dob']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('patient',$record_data);
					$patient_id=$this->db->insert_id();
					$this->db->query("UPDATE patient set P_grn=LPAD(P_id, 6, '0') where P_id='".$patient_id."'");
					$data['patient_id']=$patient_id;
					$data['P_first_name']=$_POST['first_name'];
					$data['P_last_name']=$_POST['last_name'];
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Patient  Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['patient_id']=$duplicate_check[0]['P_id'];
					$data['P_first_name']=$_POST['first_name'];
					$data['P_last_name']=$_POST['last_name'];
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Patient Name Already Exist</b>',
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

	public function patient_delete(){
		$this->session_validate();
		if (!empty($_POST['p_id'])) {
			$patient_id=$_POST['p_id'];

			$this->db->query("DELETE from patient where P_id=".$patient_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Patient Deleted Successfully..!</b>',
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

	public function patient_by_id(){
		$this->session_validate();
		if(!empty($_POST['p_id'])){
			$p_id=$_POST['p_id'];
			$data['record']=$this->db->query("SELECT 
									 P_name_prefix as name_prefix
									,P_first_name as first_name
									,P_middle_name as middle_name
									,P_last_name as last_name
									,P_father_name as father_name
									,P_mother_name as mother_name
									,P_dob as dob
									,SUBSTRING_INDEX(SUBSTRING_INDEX(calculate_age(P_dob), '-', 3),'-',-1) as outputday
									,SUBSTRING_INDEX(SUBSTRING_INDEX(calculate_age(P_dob), '-', 2),'-',-1) as outputmonth
									,SUBSTRING_INDEX(calculate_age(P_dob), '-', 1) as outputyear
									,P_gender as gender
									,P_marital_status as marital_status
									,P_occupation_id as occupation_id
									,P_identity_type as identity_type
									,P_identity_number as identity_number
									,P_mobile_number as mobile_number
									,P_alt_mobile_number as alt_mobile_number
									,P_email as email
									,P_pincode as pincode
									,P_state as state
									,P_district as district
									,P_taluka as taluka
									,P_area as area
									,P_address as address
									FROM patient where P_id=".$p_id)->row_array();
			$this->json_output($data);
		}
	}

	public function search_patient_form(){

		$uhid=!empty($_POST['search_uhid'])?$_POST['search_uhid']:'0';
		$mobile_no=!empty($_POST['search_mobile_no'])?$_POST['search_mobile_no']:'0';
		$adhar_card=!empty($_POST['search_adhar_card'])?$_POST['search_adhar_card']:'0';
		$first_name=!empty($_POST['search_first_name'])?$_POST['search_first_name']:'0';
		$last_name=!empty($_POST['search_last_name'])?$_POST['search_last_name']:'0';
		
		$query="SELECT P_id as id 
						,P_grn as grn 
						,P_first_name as first_name 
						,P_middle_name as middle_name 
						,P_last_name as last_name 
						,P_mobile_number as mobile_number 
						,P_gender as gender 
						,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year') as age
						from patient where  P_mobile_number='".$mobile_no."' or (P_identity_number='".$adhar_card."' and P_identity_number!='') or P_first_name='".$first_name."' or P_last_name='".$last_name."' or P_grn='".$uhid."'";
		$result=$this->db->query($query)->result_array();
		echo json_encode($result);
	}

	
}

?>