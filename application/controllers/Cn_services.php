<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_services extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_services');
	}

	public function services_list(){
		$this->session_validate();
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
			$searchQuery.= " AND (name like '%".$searchValue."%'
								or  d_name like '%".$searchValue."%'
								or  sd_name like '%".$searchValue."%'
								or  sg_name like '%".$searchValue."%'
							)";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							 services_name as name
							,services_rate as rate
							,department_name as d_name
							,FLOOR(services_tat / 1440) as days
						  	,FLOOR((services_tat % 1440) / 60) as hours
						  	,services_tat % 60 as minutes
							,case when services_sub_department_id='0' then 'All Sub-Department' else sub_department_name end as sd_name
							,SG_name as sg_name
							, case when services_sample_type='0' or services_sample_type is null  then 'Not Applicable' else services_sample_type
								end as sample_type
							,concat('<i class=\"fa fa-edit edit_record\" s_id=\"',services_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" s_id=\"',services_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
							,CASE 
							        WHEN services_status='1' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" checked  s_id=\"',services_id,'\" value=\"',services_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" s_id=\"',services_id,'\" value=\"',services_status,'\"><span class=\"slider round\"></span></label>')
							    END AS services_status
							
						from services
						join department 
							on services_department_id=department_id
						left join sub_department
							on services_sub_department_id=sub_department_id
						join services_group
							on services_group_id=SG_id
						
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

	public function services_action(){	
		$this->session_validate();
		if (!empty($_POST)) {

			$days=!empty($_POST['days'])?$_POST['days']:'0';
			$hours=!empty($_POST['hours'])?$_POST['hours']:'0';
			$minutes=!empty($_POST['minutes'])?$_POST['minutes']:'0';

			$totalMinutes = ($days * 24 * 60) + ($hours * 60) + $minutes;

			if (!empty($_POST['s_id'])) {
					
					$record_check=$this->db->query("SELECT * FROM services where services_id='".$_POST['s_id']."'")->result_array();
					if(!empty($record_check)){
						$record_data = array(
							'services_group_id' =>!empty($_POST['sg_name'])?$_POST['sg_name']:'',
							'services_name' =>!empty($_POST['service_name'])?$_POST['service_name']:'',
							'services_tat' =>!empty($totalMinutes)?$totalMinutes:'0',
							'services_rate' =>!empty($_POST['service_default_rate'])?$_POST['service_default_rate']:'',

						);
						$duplicate_check=$this->db->query("	SELECT * FROM services 
															where services_department_id='".$record_check[0]['services_department_id']."' 
															and services_sub_department_id='".$record_check[0]['services_sub_department_id']."' 
															and services_group_id='".$record_data['services_group_id']."' 
															and services_name='".$record_data['services_name']."' and services_tat='".$record_data['services_tat']."' 
															and services_id !='".$_POST['s_id']."'")->result_array();
						if(empty($duplicate_check)){
							$this->db->where('services_id',$_POST['s_id']);
							$this->db->update('services',$record_data);
							$data['status']=true;
							$data['swall']=array(
								'title'=>'Record Updated!',
								'text'=>'<b>Service Name Updated Successfully..!</b>',
								'type'=>'success'
							);
						}else{
							$data['swall']=array(
								'title'=>'Duplicate Entry',
								'text'=>'<b>Record with Same Service Name Already Exist</b>',
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
					$record_data = array(
						'services_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
						'services_sub_department_id' =>!empty($_POST['sd_name'])?$_POST['sd_name']:'',
						'services_group_id' =>!empty($_POST['sg_name'])?$_POST['sg_name']:'',
						'services_name' =>!empty($_POST['service_name'])?$_POST['service_name']:'',
						'services_tat' =>!empty($totalMinutes)?$totalMinutes:'0',
						'services_rate' =>!empty($_POST['service_default_rate'])?$_POST['service_default_rate']:'',
						'services_input_method' =>!empty($_POST['service_input_method'])?$_POST['service_input_method']:'',
						'services_sample_type' =>!empty($_POST['sample_type'])?$_POST['sample_type']:'',


						
					);
					$duplicate_check=$this->db->query("	SELECT * FROM services 
															where services_department_id='".$record_data['services_department_id']."' 
															and services_sub_department_id='".$record_data['services_sub_department_id']."' 
															and services_group_id='".$record_data['services_group_id']."' 
															and services_name='".$record_data['services_name']."' and services_rate='".$record_data['services_tat']."' and services_input_method='".$record_data['services_input_method']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->insert('services',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Added!',
							'text'=>'<b>Services Added Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$this->db->where('services_id',$duplicate_check[0]['services_id']);
						$this->db->update('services',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Services Updated Successfully..!</b>',
							'type'=>'success'
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

	public function services_delete(){
		$this->session_validate();
		if (!empty($_POST['s_id'])) {
			$s_id=$_POST['s_id'];

			$this->db->query("DELETE from services where services_id=".$s_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Service  Deleted Successfully..!</b>',
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

	public function services_by_id(){
		$this->session_validate();
		if(!empty($_POST['s_id'])){
			$s_id=$_POST['s_id'];
			$data['record']=$this->db->query("	SELECT 
														services_name as name
														,department_id as d_id
														,CASE when sub_department_id is null then '0'else sub_department_id end as sd_id
														,SG_id as sg_id
														,services_rate as rate
														,FLOOR(services_tat / 1440) as days
													  	,FLOOR((services_tat % 1440) / 60) as hours
													  	,services_tat % 60 as minutes
														from services
														join department 
															on services_department_id=department_id
														left join sub_department
															on services_sub_department_id=sub_department_id
														join services_group
															on services_group_id=SG_id
												 where services_id=".$s_id)->row_array();
			$this->json_output($data);
		}
	}

	public function change_services_status()
	{
		if (!empty($_POST)) {
			$services_status=$_POST['status'];
			if($services_status==0)
				$status=1;
			else
				$status=0;
			$s_id=$_POST['s_id'];
			$this->db->query("update services set services_status='".$status."' where services_id='".$s_id."'");
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Services  Status Updated Successfully..!</b>',
				'type'=>'success'
			);
			$this->json_output($data);
		}

	}

	public function services_by_department_id(){
		$this->session_validate();
		if(!empty($_POST['d_id'])){
			$d_id=$_POST['d_id'];
			$data['record']=$this->db->query("	SELECT 
														services_id as id
														,services_name as name
														,services_rate as rate
														from services
												 where services_status='1' and services_department_id=".$d_id)->result_array();
			$this->json_output($data);
		}
	}

	public function services_by_sub_department_id(){
		$this->session_validate();
		if(!empty($_POST['sd_id'])){
			$sd_id=$_POST['sd_id'];
			$data['record']=$this->db->query("SELECT 
														services_id as id
														,services_name as name
														from services
												 			where services_status='1' and services_sub_department_id=".$sd_id)->	result_array();
			
			$this->json_output($data);
		}
	}

	public function services_all(){
		$this->session_validate();
		$data['record']=$this->db->query("SELECT 
												services_id as id
												,services_name as name
												from services
										 			where services_status='1'")->result_array();
		
		$this->json_output($data);
		
	}

	public function services_diagnosis(){
		$this->session_validate();
		$data['record']=$this->db->query("SELECT 
												services_id as id
												,services_name as name
												from services
										 			where services_department_id in(17,19)and services_status='1'")->result_array();
		
		$this->json_output($data);
		
	}

}

?>