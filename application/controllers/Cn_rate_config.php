<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_rate_config extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_rate_config');
	}

	public function rate_config_list(){
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
			$searchQuery.= " AND (rcm_name like '%".$searchValue."%' 
									or d_name like '%".$searchValue."%'
									or s_name like '%".$searchValue."%'
									or rt_name like '%".$searchValue."%'
									or doctor_name like '%".$searchValue."%')";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							rate_config_method as rcm_name
							,department_name as d_name
							,services_name as s_name
							,case when rate_config_rate_type_id='0' then 'Default' else rate_type_name end as rt_name
							,case when user_id is NOT null then concat('Dr.',user_first_name,' ',user_last_name) else '-' end as doctor_name
							,rate_config_amount as c_amount
							,services_rate as d_amount
							,case when rate_config_day is null then '-' else rate_config_day end as day
							,concat('<i class=\"fa fa-edit edit_record\" rc_id=\"',rate_config_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" rc_id=\"',rate_config_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') as action
						from rate_config
						join department
							on rate_config_department_id=department_id
						join services
							on rate_config_services_id=services_id
						left join rate_type
							on rate_config_rate_type_id=rate_type_id
						left join user on user_id=rate_config_doctor_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where rcm_name!=''
					".$searchQuery."
					LIMIT ".$length." OFFSET ".$start;
			
		$result_data = $this->db->query($result_query)->result_array();
		$result_count_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							rate_config_method as rcm_name
							,department_name as d_name
							,services_name as s_name
							,case when rate_config_rate_type_id='0' then 'Default' else rate_type_name end as rt_name
							,case when user_id is NOT null then concat('Dr.',user_first_name,' ',user_last_name) else '-' end as doctor_name
							,rate_config_amount as c_amount
							,services_rate as d_amount
							,case when rate_config_day is null then 'NA' else rate_config_day end as day
							,concat('<i class=\"fa fa-edit edit_record\" rc_id=\"',rate_config_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" rc_id=\"',rate_config_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') as action
						from rate_config
						join department
							on rate_config_department_id=department_id
						join services
							on rate_config_services_id=services_id
						left join rate_type
							on rate_config_rate_type_id=rate_type_id
						left join user on user_id=rate_config_doctor_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where rcm_name!=''
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

	public function rate_config_action(){	
		$this->session_validate();
		

		if (!empty($_POST)) {
			

			$doctor_id=!empty($_POST['doctor_name'])?$_POST['doctor_name']:'0';
			$rc_id=$_POST['rc_id'];
			
			
			if (!empty($rc_id)) {

				echo" for edit";
				$record_data = array(

				    'rate_config_amount' =>!empty($_POST['config_rate'])?$_POST['config_rate']:'',
					'rate_config_day' =>!empty($_POST['day'])?implode(',',$_POST['day']):'',
				);
				$this->db->where('rate_config_id',$rc_id);
				$this->db->update('rate_config',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Updated!',
					'text'=>'<b>Configuration Updated Successfully..!</b>',
					'type'=>'success'
				);
			}else{


				$record_data = array(
					'rate_config_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
					'rate_config_services_id' =>!empty($_POST['s_name'])?$_POST['s_name']:'',
					'rate_config_rate_type_id' =>!empty($_POST['rt_name'])?$_POST['rt_name']:'',
					'rate_config_amount' =>!empty($_POST['config_rate'])?$_POST['config_rate']:'',
					'rate_config_doctor_id' =>!empty($_POST['doctor_name'])?$_POST['doctor_name']:'0',
					'rate_config_day' =>!empty($_POST['day'])?implode(',',$_POST['day']):'',
					'rate_config_method' =>!empty($_POST['rcm_name'])?$_POST['rcm_name']:'',
				);

				$duplicate_verify=$this->db->query("SELECT 
									* 
								from rate_config 
								where  rate_config_department_id='".$_POST['d_name']."' 
								and rate_config_services_id='".$_POST['s_name']."'
								and rate_config_rate_type_id='".$_POST['rt_name']."'
								and rate_config_doctor_id='".$doctor_id."'
								and rate_config_method='".$_POST['rcm_name']."'
								")->result_array();
				
				if(empty($duplicate_verify)){
					$result=$this->db->insert('rate_config',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Configuration Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$this->db->where('services_id',$duplicate_check[0]['rate_config_id']);
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

	public function rate_config_delete(){
		$this->session_validate();
		if (!empty($_POST['rc_id'])) {
			$rc_id=$_POST['rc_id'];

			$this->db->query("DELETE from rate_config where rate_config_id=".$rc_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Rate Config Deleted Successfully..!</b>',
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

	public function rate_config_by_id(){
		$this->session_validate();
		if(!empty($_POST['rc_id'])){
			$rc_id=$_POST['rc_id'];
			$data['record']=$this->db->query("	SELECT 	
														
														rate_config_department_id as d_name
														,services_name as s_name
														,rate_config_rate_type_id as rt_name
														,services_rate as d_amount
														,rate_config_amount as c_amount
														,rate_config_day as days
														,case when user_id is NOT null then concat('Dr.',user_first_name,' ',user_last_name) else '-' end as doctor_name
														,rate_config_method as rcm_name
												FROM rate_config
												join services on rate_config_services_id=services_id
												left join user on user_id=rate_config_doctor_id
												where rate_config_id=".$rc_id)->row_array();
			$this->json_output($data);
		}
	}

}

?>