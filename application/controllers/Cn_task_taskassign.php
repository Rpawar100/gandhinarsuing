<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_task_taskassign extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_task_taskassign');
	}

	public function task_list(){
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
							task_name as name
							,concat('<i class=\"fa fa-edit edit_record\" task_id=\"',task_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" task_id=\"',task_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							 as action
						from task
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by name ";
			
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

	public function task_record_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'task_name' =>!empty($_POST['task_name'])?$_POST['task_name']:'',
			);

			if (!empty($_POST['task_id'])) {
				$record_check=$this->db->query("SELECT * FROM occupation where occupation_id='".$_POST['o_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM occupation where occupation_name='".$record_data['occupation_name']."' and occupation_id!='".$_POST['o_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('occupation_id',$_POST['o_id']);
						$this->db->update('occupation',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Occupation Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Occupation Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM task where task_name ='".$record_data['task_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('task',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Task Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Task Name Already Exist</b>',
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

	public function occupation_delete(){
		$this->session_validate();
		if (!empty($_POST['o_id'])) {
			$occupation_id=$_POST['o_id'];

			$this->db->query("DELETE from occupation where occupation_id=".$occupation_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Occupation Deleted Successfully..!</b>',
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

	public function occupation_by_id(){
		$this->session_validate();
		if(!empty($_POST['o_id'])){
			$occupation_id=$_POST['o_id'];
			$data['record']=$this->db->query("	SELECT 
														occupation_name as name
												FROM occupation where occupation_id=".$occupation_id)->row_array();
			$this->json_output($data);
		}
	}

	public function task_all(){
		$this->session_validate();
		$data['record']=$this->db->query("SELECT task_id as id,task_name as name FROM task")->result_array();
		$this->json_output($data);
	}

	
}

?>