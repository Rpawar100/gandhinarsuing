<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_patient_category extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_patient_category');
	}

	public function patient_category_list(){
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
									or type like '%".$searchValue."%')";
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							patient_category_name as name
							,patient_category_type as type
							,case when count is NULL then 0 else count end as count
							,case
								when count is NULL then concat('<i class=\"fa fa-edit edit_record\" pc_id=\"',patient_category_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" pc_id=\"',patient_category_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') 
								else concat('<i class=\"fa fa-edit edit_record\" pc_id=\"',patient_category_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') 
							end as action
						from patient_category
						left join (SELECT patient_company_patient_category_id,count(*) as count FROM patient_company group by 1) as patient_company_data
						on patient_company_patient_category_id=patient_category_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					Order by name,type";
			
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

	public function patient_category_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
				
			$record_data = array(
				'patient_category_name' =>!empty($_POST['pc_name'])?$_POST['pc_name']:'',
				'patient_category_type' =>!empty($_POST['pc_type'])?$_POST['pc_type']:'',
			);

			if (!empty($_POST['pc_id'])) {
				$record_check=$this->db->query("SELECT * FROM patient_category where patient_category_id='".$_POST['pc_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM patient_category where patient_category_name='".$record_data['patient_category_name']."' and patient_category_type='".$record_data['patient_category_type']."' and patient_category_id!='".$_POST['pc_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('patient_category_id',$_POST['pc_id']);
						$this->db->update('patient_category',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Patient Category Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Patient Category Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM patient_category where patient_category_name='".$record_data['patient_category_name']."' and patient_category_type='".$record_data['patient_category_type']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('patient_category',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Patient Category Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Patient Category Name Already Exist</b>',
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

	public function patient_category_delete(){
		$this->session_validate();
		if (!empty($_POST['pc_id'])) {
			$patient_category_id=$_POST['pc_id'];

			$this->db->query("DELETE from patient_category where patient_category_id=".$patient_category_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Patient Category Deleted Successfully..!</b>',
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

	public function patient_category_by_id(){
		$this->session_validate();
		if(!empty($_POST['pc_id'])){
			$patient_category_id=$_POST['pc_id'];
			$data['record']=$this->db->query("	SELECT 
														patient_category_name as name
														,patient_category_type as type
												FROM patient_category
												where patient_category_id=".$patient_category_id)->row_array();
			$this->json_output($data);
		}
	}

	public function patient_category_all(){
		$this->session_validate();
		$data['record']=$this->db->query("SELECT patient_category_id as id ,patient_category_name as name,patient_category_type as type FROM patient_category ")->result_array();
		echo json_encode($data);
	}

}

?>