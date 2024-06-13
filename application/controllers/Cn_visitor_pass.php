<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_visitor_pass extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();

		$count['record']=$this->db->query("SELECT count(*) as count from visitor_pass")->row_array();
		$count['active']=$this->db->query("SELECT count(*) as acount from visitor_pass where VP_status='Active'")->row_array();
		$count['discarded']=$this->db->query("SELECT count(*) as dcount from visitor_pass where VP_status='Discarded'")->row_array();
		$this->load->view('vw_visitor_pass',$count);
	}

	public function visitor_pass_list(){
		$this->session_validate();
		$active_tab=!empty($this->input->post('active_tab'))?$this->input->post('active_tab'):$this->input->post('active_tab');


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
			$searchQuery.= " AND pass_no like '%".$searchValue."%' 
			AND date_time like '%".$searchValue."%' AND user_name like '%".$searchValue."%'";
		}

		


		switch ($active_tab) {

			case 'all':
						$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							VP_no as pass_no
							,date_format(VP_timestamp,'%d-%m-%Y %h:%i %p') as date_time
							,VP_discarded_reason as reason 
							,'' as action
							,VP_discarded_user_id
							,Case when VP_discarded_user_id is null then 'NA' else concat(user_first_name,' ',user_middle_name,' ',user_last_name) end as user_name
						from visitor_pass
						left join user on VP_discarded_user_id=user_id
					) result_data,(SELECT @sr_no:= 0) AS a
					where pass_no!=''
					".$searchQuery."
					order by pass_no ";
			break;
			case 'active':
						$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							VP_no as pass_no
							,date_format(VP_timestamp,'%d-%m-%Y %h:%i %p') as date_time
							,VP_discarded_reason as reason 
							,'' as action
							,VP_discarded_user_id
							,Case when VP_discarded_user_id is null then 'NA' else concat(user_first_name,' ',user_middle_name,' ',user_last_name) end as user_name
						from visitor_pass
						left join user on VP_discarded_user_id=user_id
						where VP_status='Active'
					) result_data,(SELECT @sr_no:= 0) AS a
					where pass_no!=''
					".$searchQuery."
					order by pass_no ";
			break;
			case 'discarded':
			$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							VP_id as id
							,VP_no as pass_no
							,date_format(VP_timestamp,'%d-%m-%Y %h:%i %p') as date_time
							,VP_discarded_reason as reason 
							,VP_discarded_user_id
							,Case when VP_discarded_user_id is null then 'NA' else concat(user_first_name,' ',user_middle_name,' ',user_last_name) end as user_name
							,concat('<i class=\"fa fa-times cancel_record\" VP_id=\"',VP_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>') as action
						from visitor_pass
						left join user on VP_discarded_user_id=user_id
						where VP_status='Discarded'
					) result_data,(SELECT @sr_no:= 0) AS a
					where pass_no!=''
					".$searchQuery."
					order by pass_no ";
			break;



		}
			
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

	public function visitor_pass_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			
			$vp_count=$this->input->post('pass_count');
			if (!empty($vp_count)){

				$last_record=$this->db->query("SELECT VP_no as last_vp_no from visitor_pass where VP_id=(SELECT MAX(VP_id) from visitor_pass)")->row_array();

				$last_vp_no=$last_record['last_vp_no'];

				for($i=1;$i<=$vp_count;$i++){

					$this->db->query("INSERT into visitor_pass(	VP_timestamp,VP_no)values(CURRENT_TIMESTAMP,'".($last_vp_no + $i)."')");
				}
				$data['swall']=array(
				'title'=>'Record Added!',
				'text'=>'<b>visitor Passes Added Successfully..!</b>',
				'type'=>'success'
			);




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


	public function discard_pass_form(){
		$this->session_validate();
		if (!empty($_POST['pass_number'])) {
			$pass_number=$_POST['pass_number'];
			$discard_reason=$_POST['discard_reason'];

			$check_status=$this->db->query("SELECT 	VP_id from visitor_pass where VP_no='".$pass_number."' && vp_status='Discarded'")->row_array();
			if(empty($check_status)){

				$patient_visit_status=$this->db->query("SELECT * from visitor where visitor_pass_number='".$pass_number."' && visitor_status='In'")->row_array();
				
				if(!empty($patient_visit_status)){
					$this->db->query("UPDATE visitor set visitor_status='Out' where visitor_pass_number='".$pass_number."'");
				}

				$this->db->query("UPDATE visitor_pass set VP_status='Discarded',	VP_discarded_reason='".$discard_reason."',VP_discarded_timestamp= CURRENT_TIMESTAMP where VP_no='".$pass_number."'");

				$data['swall']=array(
				'title'=>'Success!',
				'text'=>'<b>Pass Discarded Successfully..!</b>',
				'type'=>'success'
				);



			}
			else{
				$data['swall']=array(
					'title'=>'Error!',
					'text'=>'<b>Pass Already Discarded..!</b>',
					'type'=>'warning'
				);
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



	public function visitor_pass_by_id(){
		$this->session_validate();
		if(!empty($_POST['d_id'])){
			$visitor_pass_id=$_POST['d_id'];
			$data['record']=$this->db->query("	SELECT 
														visitor_pass_name as name
												FROM visitor_pass where visitor_pass_id=".$visitor_pass_id)->row_array();
			$this->json_output($data);
		}
	}

	public function visitor_pass_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT visitor_pass_id as id,visitor_pass_name as name FROM visitor_pass ")->result_array();
		$this->json_output($data);
	}

	public function cancel_discarded_pass()
	{
		$this->session_validate();
		if(!empty($_POST['VP_id'])){
			$VP_id=$_POST['VP_id'];
			$data['record']=$this->db->query("UPDATE visitor_pass set VP_status='Active' ,VP_discarded_reason=null,VP_discarded_user_id=0 where VP_id=".$VP_id);

			$data['swall']=array(
					'title'=>'Done!',
					'text'=>'<b>Pass Activated.</b>',
					'type'=>'success'
				);
			$this->json_output($data);
		}	


	}
}

?>