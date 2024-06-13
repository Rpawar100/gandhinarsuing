<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_role_assignment extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_role_assignment');
	}

	public function role_assignment_list(){
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
			$searchQuery.= " AND name like '%".$searchValue."%' or role_name like '%".$searchValue."%'";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							RA_id
							,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as name
							,role_name as role_name
							,CASE 
							        WHEN RS_status='Active' THEN concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" checked  RA_id=\"',RA_id,'\" value=\"',RS_status,'\"><span class=\"slider round\"></span></label>')
							        ELSE
							            concat('<label class=\"switch\"><input type=\"checkbox\" class=\"change_status\" RA_id=\"',RA_id,'\" value=\"',RS_status,'\"><span class=\"slider round\"></span></label>')
							    END AS status
						from role_assignment
						join user 
							on RA_user_id=user_id
						join role
							on RA_role_id=role_id
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

	public function role_assignment_action(){	
		$this->session_validate();
	
		if (!empty($_POST)) {

			

			$record_data = array(
				'RA_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
				'RA_role_id' =>!empty($_POST['role_id'])?implode(',',$_POST['role_id']):'',
			);

			if (!empty($_POST['RA_id'])) {
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
				
				$role_list = implode( ",", $_POST['role_id']);
				
				$query1="SELECT * FROM role_assignment WHERE RA_user_id = '".$record_data['RA_user_id']."' AND RA_role_id IN (".$role_list.")";
				$duplicate_check = $this->db->query($query1)->result_array();
				if(empty($duplicate_check)){

					$user_id = !empty($_POST['user_id']) ? $_POST['user_id'] : '';
    				$role_ids = !empty($_POST['role_id']) ? $_POST['role_id'] : '';
			        foreach ($role_ids as $role_id) {
			            $record_data1 = array(
			                'RA_user_id' => $user_id,
			                'RA_role_id' => $role_id,
			                'RA_strat_timestamp' => date('Y-m-d H:i:s'),

			            );
			            $this->db->insert('role_assignment',$record_data1);
			        }

					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Role Assignment Added Successfully..!</b>',
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

	public function change_role_assignment_status()
	{
		if (!empty($_POST)) {
			$status=$_POST['status'];
			if($status=='Inactive')
				$status='Active';
			else
				$status='Inactive';
			$RA_id=$_POST['RA_id'];
			$this->db->query("update role_assignment set RS_status='".$status."' ,RA_end_timestamp = date('Y-m-d H:i:s') where RA_id='".$RA_id."'");
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Status Updated Successfully..!</b>',
				'type'=>'success'
			);
			$this->json_output($data);
		}
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
			$data['record']=$this->db->query("SELECT role_name as name FROM role where role_id=".$role_id)->row_array();
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