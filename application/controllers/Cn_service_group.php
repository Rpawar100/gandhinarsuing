<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_service_group extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_service_group');
	}

	public function service_group_list(){
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
							SG_name as name
							,case 
								when count is NULL then 0 
								else count 
							end as count
							,case 
								when count is NULL 
								then concat('<i class=\"fa fa-edit edit_record\" sg_id=\"',SG_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" sg_id=\"',SG_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							else
								concat('<i class=\"fa fa-edit edit_record\" sg_id=\"',SG_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from services_group
						left join (SELECT services_group_id,count(*) as count FROM services group by 1) as services_data
							on services_group_id=SG_id
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

	public function service_group_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'sg_name' =>!empty($_POST['sg_name'])?$_POST['sg_name']:'',
			);

			if (!empty($_POST['sg_id'])) {
				$record_check=$this->db->query("SELECT * FROM services_group where sg_id='".$_POST['sg_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM services_group where sg_name='".$record_data['sg_name']."' and sg_id!='".$_POST['sg_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('sg_id',$_POST['sg_id']);
						$this->db->update('services_group',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Services Group Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Services Group Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM services_group where sg_name='".$record_data['sg_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('services_group',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Services Group Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Services Group Already Exist</b>',
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

	public function service_group_delete(){
		$this->session_validate();
		if (!empty($_POST['sg_id'])) {
			$sg_id=$_POST['sg_id'];

			$this->db->query("DELETE from services_group where SG_id=".$sg_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Service Group Deleted Successfully..!</b>',
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

	public function service_group_by_id(){
		$this->session_validate();
		if(!empty($_POST['sg_id'])){
			$sg_id=$_POST['sg_id'];
			$data['record']=$this->db->query("	SELECT 
														SG_name as name
												FROM services_group where SG_id=".$sg_id)->row_array();
			$this->json_output($data);
		}
	}

	public function service_group_all(){
		$this->session_validate();
		$data['record']=$this->db->query("SELECT SG_id as id,SG_name as name FROM services_group")->result_array();

		echo json_encode($data);
	}
}

?>