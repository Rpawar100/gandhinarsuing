<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_rate_type extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_rate_type');
	}

	public function rate_type_list(){
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
							rate_type_name as name
							,case 
								when count is NULL then 0 
								else count 
							end as count
							,case 
								when count is NULL 
								then concat('<i class=\"fa fa-edit edit_record\" rt_id=\"',rate_type_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" rt_id=\"',rate_type_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							else
								concat('<i class=\"fa fa-edit edit_record\" rt_id=\"',rate_type_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from rate_type
						left join (SELECT rate_config_rate_type_id,count(*) as count FROM rate_config group by 1) as rate_config_data
							on rate_config_rate_type_id=rate_type_id
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

	public function rate_type_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$record_data = array(
				'rate_type_name' =>!empty($_POST['rt_name'])?$_POST['rt_name']:'',
			);

			if (!empty($_POST['rt_id'])) {
				$record_check=$this->db->query("SELECT * FROM rate_type where rate_type_id='".$_POST['rt_id']."'")->result_array();
				if(!empty($record_check)){
					$duplicate_check=$this->db->query("	SELECT * FROM rate_type where rate_type_name='".$record_data['rate_type_name']."' and rate_type_id!='".$_POST['rt_id']."'")->result_array();
					if(empty($duplicate_check)){
						$this->db->where('rate_type_id',$_POST['rt_id']);
						$this->db->update('rate_type',$record_data);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Updated!',
							'text'=>'<b>Rate Type Name Updated Successfully..!</b>',
							'type'=>'success'
						);
					}else{
						$data['swall']=array(
							'title'=>'Duplicate Entry',
							'text'=>'<b>Record with Same Rate Type Name Already Exist</b>',
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
				$duplicate_check=$this->db->query("	SELECT * FROM rate_type where rate_type_name='".$record_data['rate_type_name']."'")->result_array();
				if(empty($duplicate_check)){
					$this->db->insert('rate_type',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Rate Type Name Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Entry',
						'text'=>'<b>Record with Same Rate Type Name Already Exist</b>',
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

	public function rate_type_delete(){
		$this->session_validate();
		if (!empty($_POST['rt_id'])) {
			$rate_type_id=$_POST['rt_id'];

			$this->db->query("DELETE from rate_type where rate_type_id=".$rate_type_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Rate Type Deleted Successfully..!</b>',
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

	public function rate_type_by_id(){
		$this->session_validate();
		if(!empty($_POST['rt_id'])){
			$rate_type_id=$_POST['rt_id'];
			$data['record']=$this->db->query("	SELECT 
														rate_type_name as name
												FROM rate_type where rate_type_id=".$rate_type_id)->row_array();
			$this->json_output($data);
		}
	}

	public function rate_type_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT rate_type_id as id,rate_type_name as name FROM rate_type ")->result_array();
		echo json_encode($data);
	}
}

?>