<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_patient_company extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_patient_company');
	}

	public function patient_company_list(){
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
			$searchQuery.= " AND (company_name like '%".$searchValue."%' 
									or rate_type_name like '%".$searchValue."%'
									or category_name like '%".$searchValue."%')";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							patient_company_name as company_name
							,rate_type_name as rate_type_name
							,patient_category_name as category_name
							,concat('<i class=\"fa fa-edit edit_record\" PC_id=\"',patient_company_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" PC_id=\"',patient_company_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') as action
						from patient_company
						join rate_type
							on patient_company_rate_type_id=rate_type_id
						join patient_category
							on patient_company_patient_category_id=patient_category_id 
					) result_data,(SELECT @sr_no:= 0) AS a
					where company_name!=''
					".$searchQuery."
					order by  category_name,rate_type_name,company_name";
			
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

	public function patient_company_action(){	
		$this->session_validate();
		if (!empty($_POST)) {

			$record_data = array(
				'patient_company_name' =>!empty($_POST['PC_name'])?$_POST['PC_name']:'',
				'patient_company_rate_type_id' =>!empty($_POST['PC_rate_type_name'])?$_POST['PC_rate_type_name']:'',
				'patient_company_patient_category_id' =>!empty($_POST['PC_patient_category_name'])?$_POST['PC_patient_category_name']:'',
			);

			if (!empty($_POST['PC_id'])) {
				$record_check=$this->db->query("SELECT * FROM patient_company where patient_company_id='".$_POST['PC_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM patient_company where patient_company_name='".$record_data['patient_company_name']."' and  patient_company_rate_type_id='".$record_data['patient_company_rate_type_id']."' and  patient_company_patient_category_id='".$record_data['patient_company_patient_category_id']."' and patient_company_id!='".$_POST['PC_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('patient_company_id',$_POST['PC_id']);
						$this->db->update('patient_company',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Patient Company Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Patient Company Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM patient_company where patient_company_name='".$record_data['patient_company_name']."' and  patient_company_rate_type_id='".$record_data['patient_company_rate_type_id']."' and  patient_company_patient_category_id='".$record_data['patient_company_patient_category_id']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('patient_company',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Patient Company Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Patient Company Name Already Exist</b>',
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

	public function patient_company_delete(){
		$this->session_validate();
		if (!empty($_POST['PC_id'])) {
			$PC_id=$_POST['PC_id'];

			$this->db->query("DELETE from patient_company where patient_company_id=".$PC_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Patient Company Deleted Successfully..!</b>',
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

	public function patient_company_by_id(){
		$this->session_validate();
		if(!empty($_POST['PC_id'])){
			$PC_id=$_POST['PC_id'];
			
			$data['record']=$this->db->query("	SELECT 
														patient_company_id as id
														,patient_company_name as name
														,patient_company_rate_type_id as rate_type_id
														,patient_company_patient_category_id as patient_category_id
												FROM patient_company
												
												where patient_company_patient_category_id=".$PC_id)->result_array();
			$this->json_output($data);
		}
	}

	public function patient_company_all(){
		$this->session_validate();
		$data=$this->db->query("SELECT patient_company_name as name FROM patient_company ")->result_array();
		echo json_output($data);
	}

	public function patient_company_by_dept(){

			$this->session_validate();
			if(!empty($_POST['d_id'])){

			$department_id=$_POST['d_id'];
			$data['record']=$this->db->query("	SELECT 
														patient_company_name as name
														,patient_company_id as id
												FROM patient_company
												join department
													on patient_company_department_id=department_id
												where patient_company_department_id=".$department_id)->result_array();
				echo json_encode($data);
			}



	}

	



}

?>