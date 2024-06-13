<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_visitor_reason extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_visitor_reason');
	}

	public function visitor_reason_list(){
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
							reason_name as name
							,case 
								when count is NULL then 0 
								else count 
							end as count
							,case 
								when count is NULL 
								then concat('<i class=\"fa fa-edit edit_record\" vr_id=\"',reason_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" vr_id=\"',reason_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							else
								concat('<i class=\"fa fa-edit edit_record\" vr_id=\"',reason_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from reason
						left join (SELECT visitor_reason_id,count(*) as count FROM visitor group by 1) as visitor_data
							on visitor_reason_id=reason_id
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

	public function visitor_reason_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'reason_name' =>!empty($_POST['vr_name'])?$_POST['vr_name']:'',
			);

			if (!empty($_POST['vr_id'])) {
				$record_check=$this->db->query("SELECT * FROM reason where reason_id='".$_POST['vr_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM reason where reason_name='".$record_data['reason_name']."' and reason_id!='".$_POST['vr_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('reason_id',$_POST['vr_id']);
						$this->db->update('reason',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Visitor Reason Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Visitor Reason Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM reason where reason_name='".$record_data['reason_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('reason',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Visitor Reason Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Visitor Reason Name Already Exist</b>',
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

	public function visitor_reason_delete(){
		$this->session_validate();
		if (!empty($_POST['vr_id'])) {
			$reason_id=$_POST['vr_id'];

			$this->db->query("DELETE from reason where reason_id=".$reason_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Visitor Reason Deleted Successfully..!</b>',
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

	public function visitor_reason_by_id(){
		$this->session_validate();
		if(!empty($_POST['vr_id'])){
			$reason_id=$_POST['vr_id'];
			$data['record']=$this->db->query("	SELECT 
														reason_name as name
												FROM reason where reason_id=".$reason_id)->row_array();
			$this->json_output($data);
		}
	}

	public function visitor_reason_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT reason_id as id,reason_name as name FROM reason ")->result_array();
		echo json_encode($data);
	}
}

?>