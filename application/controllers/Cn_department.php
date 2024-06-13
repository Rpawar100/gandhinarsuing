<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_department extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_department');
	}

	public function department_list(){
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
			$searchQuery.= " AND name like '%".$searchValue."%'";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							department_name as name
							,department_type as d_type
							,department_section as section_name
							,case 
								when count is NULL then 0 
								else count 
							end as count
							,case 
								when visit_count is NULL then 0 
								else visit_count 
							end as visit_count
							,case 
								when user_count is NULL then 0 
								else user_count 
							end as user_count
							,case 
								when services_count is NULL then 0 
								else services_count 
							end as services_count
							,case 
								when count is NULL  and visit_count is NULL and user_count is NULL and services_count is NULL
								then concat('<i class=\"fa fa-edit edit_record\" d_id=\"',department_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" d_id=\"',department_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>')
							else
								concat('<i class=\"fa fa-edit edit_record\" d_id=\"',department_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from department
						left join (SELECT sub_department_department_id,count(*) as count FROM sub_department group by 1) as sub_department_data
							on sub_department_department_id=department_id
						left join (SELECT visitor_department_id,count(*) as visit_count FROM visitor group by 1) as vistor_data
							on visitor_department_id=department_id
						left join (SELECT UDA_department_id,count(*) as user_count FROM user_department_assign group by 1) as user_data
							on UDA_department_id=department_id
						left join (SELECT services_department_id,count(*) as services_count FROM services group by 1) as services_data
							on services_department_id=department_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					order by name";
		
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

	public function department_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'department_name' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
				'department_type' =>!empty($_POST['d_type'])?$_POST['d_type']:'',
				'department_section' =>!empty($_POST['section_name'])?implode(',', $_POST['section_name']):'Other',
			);
			if (!empty($_POST['d_id'])) {
				$record_check=$this->db->query("SELECT * FROM department where department_id='".$_POST['d_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM department where department_name='".$record_data['department_name']."' and department_type='".$record_data['department_type']."' and department_id!='".$_POST['d_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('department_id',$_POST['d_id']);
						$this->db->update('department',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Department Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Department Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM department where department_name='".$record_data['department_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('department',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Department Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Department Name Already Exist</b>',
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

	public function department_delete(){
		$this->session_validate();
		if (!empty($_POST['d_id'])) {
			$department_id=$_POST['d_id'];

			$this->db->query("DELETE from department where department_id=".$department_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Department Deleted Successfully..!</b>',
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

	public function department_by_id(){
		$this->session_validate();
		if(!empty($_POST['d_id'])){
			$department_id=$_POST['d_id'];
			$data['record']=$this->db->query("	SELECT 
														department_name as name
														,department_type as d_type
														,department_section as section_name
												FROM department where department_id=".$department_id)->row_array();
			$this->json_output($data);
		}
	}

	public function department_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT department_id as id,department_name as name FROM department ")->result_array();
		echo json_encode($data);
	}

	public function section_all()
	{
		$this->session_validate();
		$data['record']=$this->db->query("SELECT section_id as id,section_name as name FROM section")->result_array();
		echo json_encode($data);

	}

	public function department_by_section()
	{
		$this->session_validate();
		if(!empty($_POST['section_name'])){
			$section_name=$_POST['section_name'];

			$section_data=$this->db->query("SELECT section_name FROM section where section_id='".$section_name."'")->row_array();

			$data['record']=$this->db->query("	SELECT 	
															department_id as id
															,department_name as name
													FROM department where department_section LIKE '%".$section_data['section_name']."%'")->result_array();

			$this->json_output($data);
		}

	}
}

?>