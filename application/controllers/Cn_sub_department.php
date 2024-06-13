<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_sub_department extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_sub_department');
	}

	public function sub_department_list(){
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
			$searchQuery.= " AND (name like '%".$searchValue."%' 
									or d_name like '%".$searchValue."%')";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							sub_department_name as name
							,department_name as d_name
							,concat('<i class=\"fa fa-edit edit_record\" sd_id=\"',sub_department_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" sd_id=\"',sub_department_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from sub_department
						join department
							on sub_department_department_id=department_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by d_name,name";
			
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

	public function sub_department_action(){	
		$this->session_validate();
		if (!empty($_POST)) {

				if (!empty($_POST['sd_id'])) {
					$record_check=$this->db->query("SELECT * FROM sub_department where sub_department_id='".$_POST['sd_id']."'")->result_array();
					if(!empty($record_check)){
						$record_data = array(
							'sub_department_name' =>!empty($_POST['sd_name'])?$_POST['sd_name']:'',
						);
						$duplicate_check=$this->db->query("	SELECT * FROM sub_department 
															where sub_department_name='".$record_data['sub_department_name']."' 
															and sub_department_department_id='".$record_check[0]['sub_department_department_id']."'")->result_array();
						if(empty($duplicate_check)){
							$this->db->where('sub_department_id',$_POST['sd_id']);
							$this->db->update('sub_department',$record_data);
							$data['status']=true;
							$data['swall']=array(
								'title'=>'Record Updated!',
								'text'=>'<b>Sub Department Name Updated Successfully..!</b>',
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
					$record_data = array(
						'sub_department_name' =>!empty($_POST['sd_name'])?$_POST['sd_name']:'',
						'sub_department_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
					);
					$duplicate_check=$this->db->query("	SELECT * FROM sub_department 
															where sub_department_name='".$record_data['sub_department_name']."' 
															and sub_department_department_id='".$record_data['sub_department_department_id']."' ")->result_array();
					if(empty($duplicate_check)){
						$this->db->insert('sub_department',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Added!',
							'text'=>'<b>Sub Department Name Added Successfully..!</b>',
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

	public function sub_department_delete(){
		$this->session_validate();
		if (!empty($_POST['sd_id'])) {
			$sub_department_id=$_POST['sd_id'];

			$this->db->query("DELETE from sub_department where sub_department_id=".$sub_department_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Sub Department Deleted Successfully..!</b>',
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

	public function sub_department_by_id(){
		$this->session_validate();
		if(!empty($_POST['sd_id'])){
			$sub_department_id=$_POST['sd_id'];
			$data['record']=$this->db->query("	SELECT 
														sub_department_name as name
														,department_id as d_id
												FROM sub_department
												join department
													on department_id=sub_department_department_id
												where sub_department_id=".$sub_department_id)->row_array();

			$this->json_output($data);
		}
	}
	
	public function sub_department_by_dept(){

			$this->session_validate();
			if(!empty($_POST['d_id'])){

			$department_id=$_POST['d_id'];
			$data['record']=$this->db->query("	SELECT 
														sub_department_name as name
														,sub_department_id as id
												FROM sub_department
												join department
													on sub_department_department_id=department_id
												where sub_department_department_id=".$department_id)->result_array();
				echo json_encode($data);
			}
	}

	public function sub_department_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT sub_department_id as id,sub_department_name as name FROM sub_department ")->result_array();
		echo json_encode($data);
	}


}

?>