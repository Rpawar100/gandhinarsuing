<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_test_parameter extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_test_parameter');
	}

	public function test_parameter_list(){
		$this->session_validate();
		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length']; 
		$columnIndex = $_POST['order'][0]['column']; 
		$columnName = $_POST['columns'][$columnIndex]['data']; 
		$columnSortOrder = $_POST['order'][0]['dir']; 
		$searchValue = $_POST['search']['value']; 
		$searchQuery = "";

		for ($i=0; $i <count($_POST['columns']) ; $i++) { 
			if (!empty($_POST['columns'][$i]['search']['value'])) {
				$searchQuery.="AND ".$_POST['columns'][$i]['data']." like '".$_POST['columns'][$i]['search']['value']."%'";
			}
		}	

		if($searchValue != ''){
			$searchQuery.= " AND (services_name like '%".$searchValue."%' 
									or TP_name like '%".$searchValue."%'
									or TP_tat like '%".$searchValue."%')";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							services_name as service_name
							,TP_name as name
							,TP_unit as unit
							,TP_method as method
							,concat('<label class=\"add_PR\" TP_id=\"',TP_id,'\" style=\"color:royalblue;\">Add</label>') as add_rangep
							,concat('<i class=\"fa fa-edit edit_record\" TP_id=\"',TP_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" TP_id=\"',TP_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') as action
						from test_parameter
						join services
							on TP_service_name=services_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by ".$columnName." ".$columnSortOrder;
			
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


	public function get_parameter_range_list(){
		$this->session_validate();
		if(!empty($_POST['TP_id'])){
			$TP_id=$_POST['TP_id'];
			
			$data=$this->db->query("	SELECT 
														PR_id as id
														,PR_gender as gender
														,PR_min_age as min_age
														,PR_max_age as max_age
														,PR_min_value as min_value
														,PR_max_value as max_value
														,PR_critical_min_value as critical_min_value
														,PR_critical_max_value as critical_max_value
														,concat('<i class=\"fa fa-edit edit_PR_record\" PR_id=\"',PR_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_PR_record\" PR_id=\"',PR_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') as PR_action
												FROM parameter_range
												where PR_TP_id=".$TP_id)->result_array();
			$this->json_output($data);
		}

	}

	public function test_parameter_action(){	
		$this->session_validate();
		if (!empty($_POST)) {


			

			$record_data = array(
				'TP_service_name' =>!empty($_POST['service_name'])?$_POST['service_name']:'',
				'TP_name' =>!empty($_POST['parameter_name'])?$_POST['parameter_name']:'',
				'TP_unit' =>!empty($_POST['unit'])?$_POST['unit']:'',
				'TP_method' =>!empty($_POST['method'])?$_POST['method']:'',
			);

			if (!empty($_POST['TP_id'])) {
				$record_check=$this->db->query("SELECT * FROM test_parameter where TP_id='".$_POST['TP_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM test_parameter where TP_service_name='".$record_data['TP_service_name']."' and TP_name='".$record_data['TP_name']."' and  TP_unit='".$record_data['TP_unit']."' and  TP_method='".$record_data['TP_method']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('TP_id',$_POST['TP_id']);
						$this->db->update('test_parameter',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Record Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Test Parameter Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM test_parameter where TP_service_name='".$record_data['TP_service_name']."' and TP_name='".$record_data['TP_name']."' and  TP_unit='".$record_data['TP_unit']."' and TP_method='".$record_data['TP_method']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('test_parameter',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Test Parameter Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Test Parameter Company Name Already Exist</b>',
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

	

	public function parameter_range_action(){	
		$this->session_validate();
		if (!empty($_POST)) {

			$record_data = array(
				'PR_gender' =>!empty($_POST['gender'])?$_POST['gender']:'',
				'PR_min_age' =>!empty($_POST['min_age'])?$_POST['min_age']:'',
				'PR_max_age' =>!empty($_POST['max_age'])?$_POST['max_age']:'',
				'PR_min_value' =>!empty($_POST['min_value'])?$_POST['min_value']:'',
				'PR_max_value' =>!empty($_POST['max_value'])?$_POST['max_value']:'',
				'PR_critical_min_value' =>!empty($_POST['min_critical_value'])?$_POST['min_critical_value']:'',
				'PR_critical_max_value' =>!empty($_POST['max_critical_value'])?$_POST['max_critical_value']:'',
				'PR_TP_id' =>!empty($_POST['PR_TP_id'])?$_POST['PR_TP_id']:'',
			);

			if (!empty($_POST['PR_id'])) {
				$record_check=$this->db->query("SELECT * FROM parameter_range where PR_id='".$_POST['PR_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM parameter_range where PR_gender='".$record_data['PR_gender']."' and PR_min_age='".$record_data['PR_min_age']."' and  PR_max_age='".$record_data['PR_max_age']."' and  PR_min_value='".$record_data['PR_min_value']."' and PR_max_value='".$record_data['PR_max_value']."' and PR_critical_min_value='".$record_data['PR_critical_min_value']."' and PR_critical_max_value ='".$record_data['PR_critical_max_value']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('PR_id',$_POST['PR_id']);
						$this->db->update('parameter_range',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Record Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Test Parameter Range Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM parameter_range where PR_gender='".$record_data['PR_gender']."' and PR_min_age='".$record_data['PR_min_age']."' and  PR_max_age='".$record_data['PR_max_age']."' and  PR_min_value='".$record_data['PR_min_value']."' and PR_max_value='".$record_data['PR_max_value']."' and PR_critical_min_value='".$record_data['PR_critical_min_value']."' and PR_critical_max_value ='".$record_data['PR_critical_max_value']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('parameter_range',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Test Parameter Range Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Test Parameter Company Name Already Exist</b>',
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

	public function test_parameter_delete(){
		$this->session_validate();
		if (!empty($_POST['TP_id'])) {
			$TP_id=$_POST['TP_id'];

			$this->db->query("DELETE from test_parameter where TP_id=".$TP_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Test Parameter Deleted Successfully..!</b>',
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

	public function parameter_range_delete(){
		$this->session_validate();
		if (!empty($_POST['PR_id'])) {
			$PR_id=$_POST['PR_id'];

			$this->db->query("DELETE from parameter_range where PR_id=".$PR_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Parameter Range Deleted Successfully..!</b>',
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

	public function test_parameter_by_id(){
		$this->session_validate();
		if(!empty($_POST['TP_id'])){
			$TP_id=$_POST['TP_id'];
			
			$data['record']=$this->db->query("	SELECT 
														TP_id  as id
														,TP_name as name
														,TP_service_name as service_name
														,TP_unit as unit
														,TP_method as method
												FROM test_parameter
												where TP_id=".$TP_id)->row_array();
			$this->json_output($data);
		}
	}

	public function test_parameter_all(){
		$this->session_validate();
		$data=$this->db->query("SELECT test_parameter_name as name FROM test_parameter ")->result_array();
		echo json_output($data);
	}



		public function test_parameter_by_appointment_id(){
			$this->session_validate();
			if(!empty($_POST['s_id'])){

			$s_id=$_POST['s_id'];
			$a_id=$_POST['a_id'];
			$data['record']=$this->db->query("	SELECT 
														TP_id as id
														,TP_name as name
														,TR_value as value
														,TP_unit as unit
														,case when PR_min_value is NOT NULL then concat(PR_min_value,' - ',PR_max_value) else 'NA' end as data_range
														,case when PR_critical_min_value is NOT NULL then concat(PR_critical_min_value,' - ',PR_critical_max_value) else 'NA' end as critical_range
												FROM  test_parameter
												join (SELECT SUBSTRING_INDEX(calculate_age(patient.P_dob),'-',1) as P_age,P_gender FROM appointment join patient on appointment_patient_id=P_id where appointment_id='".$a_id."') as range_data
												left join test_report on TP_id=TR_TP_id and TR_appointment_id='".$a_id."'
												left join parameter_range
												on P_gender=PR_gender
												and P_age between PR_min_age and PR_max_age
												and PR_TP_id=TP_id
												where TP_service_name='".$s_id."'")->result_array();
				$this->json_output($data);
			}
	}

	public function parameter_range_by_id(){
			$this->session_validate();
			if(!empty($_POST['PR_id'])){

			$PR_id=$_POST['PR_id'];
			$data['record']=$this->db->query("	SELECT 
														PR_id as id
														,PR_gender as gender
														,PR_min_age as min_age
														,PR_max_age as max_age
														,PR_min_value as min_value
														,PR_max_value as max_value
														,PR_critical_min_value as critical_min_value
														,PR_critical_max_value as critical_max_value
												FROM parameter_range
												where PR_id=".$PR_id)->row_array();
				$this->json_output($data);
			}
	}




}

?>