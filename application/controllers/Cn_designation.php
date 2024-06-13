<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_designation extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_designation');
	}

	public function designation_list(){
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
							designation_name as name
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
								then concat('<i class=\"fa fa-edit edit_record\" d_id=\"',designation_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" d_id=\"',designation_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							else
								concat('<i class=\"fa fa-edit edit_record\" d_id=\"',designation_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from designation
						left join (SELECT user_designation_id as active_id,count(*) as active_count FROM user where user_status='Active' group by 1) as active_designation_data
							on active_id=designation_id
						left join (SELECT user_designation_id as inactive_id,count(*) as inactive_count  FROM user where user_status='Inactive' group by 1) as inactive_designation_data
							on inactive_id=designation_id
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

	public function designation_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'designation_name' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
			);

			if (!empty($_POST['d_id'])) {
				$record_check=$this->db->query("SELECT * FROM designation where designation_id='".$_POST['d_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM designation where designation_name='".$record_data['designation_name']."' and designation_id!='".$_POST['d_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('designation_id',$_POST['d_id']);
						$this->db->update('designation',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Designation Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Designation Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM designation where designation_name='".$record_data['designation_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('designation',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Designation Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Designation Name Already Exist</b>',
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

	public function designation_delete(){
		$this->session_validate();
		if (!empty($_POST['d_id'])) {
			$designation_id=$_POST['d_id'];

			$this->db->query("DELETE from designation where designation_id=".$designation_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Designation Deleted Successfully..!</b>',
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

	public function designation_by_id(){
		$this->session_validate();
		if(!empty($_POST['d_id'])){
			$designation_id=$_POST['d_id'];
			$data['record']=$this->db->query("	SELECT 
														designation_name as name
												FROM designation where designation_id=".$designation_id)->row_array();
			$this->json_output($data);
		}
	}

	public function designation_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT designation_id as id,designation_name as name FROM designation ")->result_array();
		$this->json_output($data);
	}
}

?>