<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_role extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_role');
	}

	public function role_list(){
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
							role_name as name
							,case 
								when active_count is NULL then 0 
								else active_count 
							end as active_count
							,case 
								when inactive_count is NULL then 0 
								else inactive_count 
							end as inactive_count
							,case 
								when active_count is NULL and inactive_count is NULL
								then concat('<i class=\"fa fa-edit edit_record\" r_id=\"',role_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" r_id=\"',role_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>')
							else
								concat('<i class=\"fa fa-edit edit_record\" r_id=\"',role_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from role
						left join (SELECT RA_role_id as active_id,count(*) as active_count FROM role_assignment where RS_status='Active' group by 1) as active_role_data
							on active_id=role_id
						left join (SELECT RA_role_id as inactive_id,count(*) as inactive_count  FROM role_assignment where RS_status='Inactive' group by 1) as inactive_role_data
							on inactive_id=role_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					Order by name";
			
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

	public function role_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'role_name' =>!empty($_POST['r_name'])?$_POST['r_name']:'',
			);
			if (!empty($_POST['r_id'])) {
				$record_check=$this->db->query("SELECT * FROM role where role_id='".$_POST['r_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM role where role_name='".$record_data['role_name']."' and role_id!='".$_POST['r_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('role_id',$_POST['r_id']);
						$this->db->update('role',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Role Name Updated Successfully..!</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM role where role_name='".$record_data['role_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('role',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Role Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Role Name Already Exist</b>',
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

	public function role_delete(){
		$this->session_validate();
		if (!empty($_POST['r_id'])) {
			$role_id=$_POST['r_id'];

			$this->db->query("DELETE from role where role_id=".$role_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Role Deleted Successfully..!</b>',
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

	public function role_by_id(){
		$this->session_validate();
		if(!empty($_POST['r_id'])){
			$role_id=$_POST['r_id'];
			$data['record']=$this->db->query("	SELECT role_name as name FROM role where role_id=".$role_id)->row_array();
			$this->json_output($data);
		}
	}

	public function role_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT role_id as id ,role_name as name FROM role ")->result_array();
		$this->json_output($data);
	}
}

?>