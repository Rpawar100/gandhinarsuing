<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_complaint extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_complaint');
	}

	public function complaint_list(){
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
							complaint_name as name
							,concat('<i class=\"fa fa-edit edit_record\" complaint_id=\"',complaint_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" complaint_id=\"',complaint_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')  as action 
						from complaint
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

	public function complaint_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'complaint_name' =>!empty($_POST['complaint_name'])?$_POST['complaint_name']:'',
			);

			if (!empty($_POST['complaint_id'])) {
				$record_check=$this->db->query("SELECT * FROM complaint where complaint_id='".$_POST['complaint_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM complaint where complaint_name='".$record_data['complaint_name']."' and complaint_id!='".$_POST['complaint_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('complaint_id',$_POST['complaint_id']);
						$this->db->update('complaint',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>complaint Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Complaint Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM complaint where complaint_name='".$record_data['complaint_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('complaint',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>complaint Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same complaint Name Already Exist</b>',
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

	public function complaint_delete(){
		$this->session_validate();
		if (!empty($_POST['complaint_id'])) {
			$complaint_id=$_POST['complaint_id'];

			$this->db->query("DELETE from complaint where complaint_id=".$complaint_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>complaint Deleted Successfully..!</b>',
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

	public function complaint_by_id(){
		$this->session_validate();
		if(!empty($_POST['complaint_id'])){
			$complaint_id=$_POST['complaint_id'];
			$data['record']=$this->db->query("	SELECT 
														complaint_name as name
												FROM complaint where complaint_id=".$complaint_id)->row_array();
			$this->json_output($data);
		}
	}

	public function complaint_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT complaint_id as id,complaint_name as name FROM complaint ")->result_array();
		$this->json_output($data);
	}
}

?>