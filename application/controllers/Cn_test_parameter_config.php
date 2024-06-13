<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_test_parameter_config extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_test_parameter_config');
	}

	public function test_parameter_config_list(){
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
							services_name as service_name
							,TP_name as name
							,TP_min as min_value
							,TP_max as max_value
							,concat('<i class=\"fa fa-edit edit_record\" TP_id=\"',TP_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" TP_id=\"',TP_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') as action
						from test_parameter_config
						join services
							on TP_service_name=services_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by  service_name,name";
			
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

	public function test_parameter_config_action(){	
		$this->session_validate();
		if (!empty($_POST)) {

			$record_data = array(
			'TPC_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
			'TPC_service_id' =>!empty($_POST['service_name'])?$_POST['service_name']:'',
			'TPC_parameter_id' =>!empty($_POST['parameter_name'])?$_POST['parameter_name']:'',
			);

			if (!empty($_POST['TPC_id'])) {
				$record_check=$this->db->query("SELECT * FROM test_parameter_config where TP_id='".$_POST['TPC_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM test_parameter_config where 	TPC_department_id='".$record_data['TPC_department_id']."' and 	TPC_service_id='".$record_data['TPC_service_id']."' and  TPC_parameter_id='".$record_data['TPC_parameter_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('TP_id',$_POST['TP_id']);
						$this->db->update('test_parameter_config',$record_data);
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
				$duplicate_check=$this->db->query("	SELECT * FROM test_parameter_config where 	TPC_department_id='".$record_data['TPC_department_id']."' and 	TPC_service_id='".$record_data['TPC_service_id']."' and  TPC_parameter_id='".$record_data['TPC_parameter_id']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('test_parameter_config',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Test Parameter Config Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Config Already Exist</b>',
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

	public function test_parameter_config_delete(){
		$this->session_validate();
		if (!empty($_POST['TP_id'])) {
			$TP_id=$_POST['TP_id'];

			$this->db->query("DELETE from test_parameter_config where TP_id=".$TP_id);

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

	public function test_parameter_config_by_id(){
		$this->session_validate();
		if(!empty($_POST['TP_id'])){
			$PC_id=$_POST['TP_id'];
			
			$data['record']=$this->db->query("	SELECT 
														TP_id  as id
														,TP_name as name
														,TP_service_name as service_name
														,TP_min as min_value
														,TP_max as max_value
												FROM test_parameter_config
												where TP_id=".$PC_id)->row_array();
			$this->json_output($data);
		}
	}

	public function test_parameter_config_all(){
		$this->session_validate();
		$data=$this->db->query("SELECT test_parameter_config_name as name FROM test_parameter_config ")->result_array();
		echo json_output($data);
	}

	public function test_parameter_config_by_dept(){

			$this->session_validate();
			if(!empty($_POST['d_id'])){

			$department_id=$_POST['d_id'];
			$data['record']=$this->db->query("	SELECT 
														test_parameter_config_name as name
														,test_parameter_config_id as id
												FROM test_parameter_config
												join department
													on test_parameter_config_department_id=department_id
												where test_parameter_config_department_id=".$department_id)->result_array();
				echo json_encode($data);
			}



	}

	



}

?>