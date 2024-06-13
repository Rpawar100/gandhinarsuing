<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_specialization extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_specialization');
	}

	public function specialization_list(){
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
			$searchQuery.= " AND name like '%".$searchValue."%'";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							specialization_name as name
							,case 
								when count is NULL then 0 
								else count 
							end as count
							,case 
								when count is NULL 
								then concat('<i class=\"fa fa-edit edit_record\" s_id=\"',specialization_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" s_id=\"',specialization_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							else
								concat('<i class=\"fa fa-edit edit_record\" s_id=\"',specialization_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from specialization
						left join (SELECT specialization_id as user_specialization_id,count(*) as count FROM specialization join user on FIND_IN_SET(specialization_id, user_specialization_id) > 0 group by 1) as specialization_data
							on user_specialization_id=specialization_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					Order by name ";
			
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

	public function specialization_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'specialization_name' =>!empty($_POST['s_name'])?$_POST['s_name']:'',
			);

			if (!empty($_POST['s_id'])) {
				$record_check=$this->db->query("SELECT * FROM specialization where specialization_id='".$_POST['s_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM specialization where specialization_name='".$record_data['specialization_name']."' and specialization_id!='".$_POST['s_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('specialization_id',$_POST['s_id']);
						$this->db->update('specialization',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Specialization Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Specialization Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM specialization where specialization_name='".$record_data['specialization_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('specialization',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Specialization Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Specialization Name Already Exist</b>',
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

	public function specialization_delete(){
		$this->session_validate();
		if (!empty($_POST['s_id'])) {
			$specialization_id=$_POST['s_id'];

			$this->db->query("DELETE from specialization where specialization_id=".$specialization_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Specialization Deleted Successfully..!</b>',
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

	public function specialization_by_id(){
		$this->session_validate();
		if(!empty($_POST['s_id'])){
			$specialization_id=$_POST['s_id'];
			$data['record']=$this->db->query("	SELECT 
														specialization_name as name
												FROM specialization where specialization_id=".$specialization_id)->row_array();
			$this->json_output($data);
		}
	}

	public function specialization_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT specialization_id as id,specialization_name as name FROM specialization ")->result_array();
		echo json_encode($data);
	}
}

?>