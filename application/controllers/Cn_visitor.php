<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_visitor extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_visitor');
	}

	public function visitor_list(){
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
			$searchQuery.= " AND (name like '%".$searchValue."%'
						or mobile like '%".$searchValue."%'
						or dept like '%".$searchValue."%'
						or reason like '%".$searchValue."%'
						or in_timestamp like '%".$searchValue."%'
						or out_timestamp like '%".$searchValue."%'
						or pass_number like '%".$searchValue."%'
						or status like '%".$searchValue."%'
						or insert_name like '%".$searchValue."%'
						or update_name like '%".$searchValue."%'
						or updated_timestamp like '%".$searchValue."%'
						)";
		}

		switch ($active_tab) {

			case 'today_count_summary':

				$searchQuery.=" and in_timestamp=CURRENT_DATE";
			break;
			case 'in_count_summary':
					$searchQuery.="and status='IN'";
			break;
		}

		$result_query="	SELECT
						*
					from (
						SELECT
							visitor_id as id
							,visitor_name as name
						    ,visitor_mobile_number as mobile
							,case when department_name is NULL then 'NA' else department_name end as dept
							,case when section_name is NULL then 'Other' else section_name end as section
							,case when user_first_name is NULL then 'NA' else concat('Dr.',user_first_name,' ',user_last_name) end as doctor
							,visitor_reason as reason
						    ,date_format(visitor_insert_timestamp,'%d-%m-%Y %h:%i %p') as in_timestamp
						    ,case 
						    	when visitor_out_timestamp is NOT NULL then date_format(visitor_out_timestamp,'%d-%m-%Y %h:%i %p')
						        else concat('<i class=\"fa fa-edit mark_visitor_out\" v_id=\"',visitor_id,'\" style=\"color:royalblue;font-size:16px;margin: 0px 10px;\"> Mark as Out</i>')
							end as out_timestamp
						    ,visitor_pass_number as pass_number
						    ,visitor_status as status
						    ,insert_name
						    ,case when update_name is NULL then '-' else update_name end as update_name
						    ,case 
						    	when update_name is NULL then '-'
						        else  date_format(visitor_update_timestamp,'%d-%m-%Y %h:%i %p')
							end as updated_timestamp
							,case 
								when date_format(visitor_insert_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') and visitor_status='In'
								then concat('<i class=\"fa fa-edit edit_record\" v_id=\"',visitor_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" v_id=\"',visitor_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>')
								else ''
							end as action
						FROM visitor
						left join section on section_id=visitor_section_id
						left join user on user_id=visitor_doctor_id
						left join department on department_id=visitor_department_id
						left join (select user_id as insert_id,concat(user_first_name,' ',user_last_name) as insert_name from user) as insert_user_data
							on insert_id=visitor_insert_by
						left join (select user_id as update_id,concat(user_first_name,' ',user_last_name) as update_name from user) as update_user_data
							on update_id=visitor_updated_by
					) result_data
					where id>0
					".$searchQuery."
					order by id desc
					LIMIT ".$length." OFFSET ".$start;

		$result_data = $this->db->query($result_query)->result_array();
		
		$result_count_query="	SELECT
						*
					from (
						SELECT
							visitor_id as id
							,visitor_name as name
						    ,visitor_mobile_number as mobile
							,case when department_name is NULL then 'NA' else department_name end as dept
							,case when section_name is NULL then 'Other' else section_name end as section
							,case when user_first_name is NULL then 'NA' else concat('Dr.',user_first_name,' ',user_last_name) end as doctor
							,visitor_reason as reason
						    ,date_format(visitor_insert_timestamp,'%d-%m-%Y %h:%i %p') as in_timestamp
						    ,case 
						    	when visitor_out_timestamp is NOT NULL then date_format(visitor_out_timestamp,'%d-%m-%Y %h:%i %p')
						        else concat('<i class=\"fa fa-edit mark_visitor_out\" v_id=\"',visitor_id,'\" style=\"color:royalblue;font-size:16px;margin: 0px 10px;\"> Mark as Out</i>')
							end as out_timestamp
						    ,visitor_pass_number as pass_number
						    ,visitor_status as status
						    ,insert_name
						    ,case when update_name is NULL then '-' else update_name end as update_name
						    ,case 
						    	when update_name is NULL then '-'
						        else  date_format(visitor_update_timestamp,'%d-%m-%Y %h:%i %p')
							end as updated_timestamp
							,case 
								when date_format(visitor_insert_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') and visitor_status='In'
								then concat('<i class=\"fa fa-edit edit_record\" v_id=\"',visitor_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" v_id=\"',visitor_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>')
								else ''
							end as action
						FROM visitor
						left join section on section_id=visitor_section_id
						left join user on user_id=visitor_doctor_id
						left join department on department_id=visitor_department_id
						left join (select user_id as insert_id,concat(user_first_name,' ',user_last_name) as insert_name from user) as insert_user_data
							on insert_id=visitor_insert_by
						left join (select user_id as update_id,concat(user_first_name,' ',user_last_name) as update_name from user) as update_user_data
							on update_id=visitor_updated_by
					) result_data
					where id>0
					".$searchQuery;
					
		$result_count_data = $this->db->query($result_count_query)->result_array();

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result_count_data),
			"iTotalDisplayRecords" => count($result_count_data),
			"aaData" => $result_data,
		);
		echo json_encode($response);
	}

	public function visitor_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$reason=$this->db->query("	SELECT reason_name FROM reason where reason_id=".$_POST['r_name'])->row_array();
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['v_id'])) {
				$record_data = array(
					'visitor_name' =>!empty($_POST['v_name'])?$_POST['v_name']:'',
					'visitor_mobile_number' =>!empty($_POST['v_mobile'])?$_POST['v_mobile']:'',
					'visitor_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'0',
					'visitor_section_id' =>!empty($_POST['section_name'])?$_POST['section_name']:'0',
					'visitor_doctor_id' =>!empty($_POST['doctor_name'])?$_POST['doctor_name']:'0',
					'visitor_reason_id' =>!empty($_POST['r_name'])?$_POST['r_name']:'',
					'visitor_reason' =>!empty($reason)?$reason['reason_name']:'',
					'visitor_updated_by' =>$user_id,
					'visitor_update_timestamp' =>date('Y-m-d H:i:s'),
				);
				$this->db->where('visitor_id',$_POST['v_id']);
				$this->db->update('visitor',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Updated!',
					'text'=>'<b>Visitor Updated Successfully..!</b>',
					'type'=>'success'
				);
			}else{
				$pass_check=$this->db->query("	SELECT * FROM visitor where visitor_status='In' and visitor_pass_number='".$_POST['v_pass']."'")->row_array();
				if(empty($pass_check)){
					$record_data = array(
						'visitor_name' =>!empty($_POST['v_name'])?$_POST['v_name']:'',
						'visitor_mobile_number' =>!empty($_POST['v_mobile'])?$_POST['v_mobile']:'',
						'visitor_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'0',
						'visitor_section_id' =>!empty($_POST['section_name'])?$_POST['section_name']:'0',
						'visitor_doctor_id' =>!empty($_POST['doctor_name'])?$_POST['doctor_name']:'0',
						'visitor_reason_id' =>!empty($_POST['r_name'])?$_POST['r_name']:'',
						'visitor_reason' =>!empty($reason)?$reason['reason_name']:'',
						'visitor_pass_number' =>!empty($_POST['v_pass'])?$_POST['v_pass']:'',
						'visitor_insert_by' =>$user_id,
						'visitor_insert_timestamp' =>date('Y-m-d H:i:s'),
						'visitor_status' =>'In',
					);
					$this->db->insert('visitor',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Visitor Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Pass Entry!',
						'text'=>'<b>This Pass is Already assign to Another Visitor.</b>',
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

	public function visitor_delete(){
		$this->session_validate();
		if (!empty($_POST['v_id'])) {
			$visitor_id=$_POST['v_id'];

			$this->db->query("DELETE from visitor where visitor_id=".$visitor_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Visitor Deleted Successfully..!</b>',
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

	public function visitor_update_status(){
		$this->session_validate();
		if (!empty($_POST['v_id'])) {
			$record_data = array(
					'visitor_status' =>'Out',
					'visitor_out_timestamp' =>date('Y-m-d H:i:s'),
				);
			$this->db->where('visitor_id',$_POST['v_id']);
			$this->db->update('visitor',$record_data);
			$data['swall']=array(
				'title'=>'Record Updated!',
				'text'=>'<b>Visitor Mark As Out from facility Successfully..!</b>',
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

	public function visitor_by_id(){
		$this->session_validate();
		if(!empty($_POST['v_id'])){
			$visitor_id=$_POST['v_id'];
			$data['record']=$this->db->query("	SELECT 
													visitor_name as name
													,visitor_mobile_number as mobile
													,visitor_department_id as dept
													,visitor_section_id as section
													,visitor_doctor_id as doctor
													,visitor_reason_id as reason
													,visitor_pass_number as pass_number
												FROM visitor where visitor_id=".$visitor_id)->row_array();
			$this->json_output($data);
		}
	}

	public function visitor_summary_count(){
		$this->session_validate();
		$data['in_count']=$this->db->query("SELECT count(*) as count FROM visitor where visitor_status='In'")->row_array();
		$data['total_pass']=$this->db->query("SELECT count(*) as count FROM visitor_pass ")->row_array();
		$data['available_pass']=$this->db->query("SELECT count(*) as count FROM visitor_pass where VP_status='Active'")->row_array();
		$data['discarded_pass']=$this->db->query("SELECT count(*) as count FROM visitor_pass where VP_status='Discarded'")->row_array();
		$data['today_count']=$this->db->query("SELECT count(*) as count FROM visitor where date_format(visitor_insert_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d')")->row_array();
		$data['total_visitor']=$this->db->query("SELECT count(*) as count FROM visitor")->row_array();
		$this->json_output($data);
	}

	public function visitor_dashboard(){
		$this->session_validate();

		if (!empty($_GET['daterange'])) {
			$date_array=explode('to', $_GET['daterange']);
			$start=date('Y-m-d',strtotime($date_array[0]));
			$end=date('Y-m-d',strtotime($date_array[1]));
		}
		else
		{
			$start=date('Y-m-d', strtotime("-1 month"));
			$end=date('Y-m-d');
		}

		$graph_count=$this->db->query("SELECT 
				date_field as x
				,case when d_y is NULL then '0' else d_y end as d_y
				,case when u_y is NULL then '0' else u_y end as u_y
				,case when a_y is NULL then '0' else a_y end as a_y

			from (
				select * from 
				(select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) date_field from
				 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
				 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
				 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
				 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
				 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
				where date_field BETWEEN '".$start."' AND '".$end."'
			) as date_data
			left join (
				SELECT 
					date_format(visitor_insert_timestamp,'%Y-%m-%d') as d_date
					,count(*)  as d_y 
				from visitor
				where date_format(visitor_insert_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
				group by 1
			) as temp_data_d
				on date_field=d_date
			left join (
				SELECT 
					date_format(visitor_insert_timestamp,'%Y-%m-%d') as a_date
					,ceil((count(*)/1000)*100)  as a_y 
				from visitor
				where date_format(visitor_insert_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
				group by 1
			) as temp_data_a
				on date_field=a_date
			left join (
				SELECT 
					date_format(visitor_out_timestamp,'%Y-%m-%d') as u_date
					, count(*)  as u_y 
				from visitor
				where date_format(visitor_out_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
				group by 1
			) as temp_data_u
				on date_field=u_date	
			order by date_field")->result_array();
		$data['graph_count']=json_encode($graph_count);

		$data['reason_count']=$this->db->query("	SELECT 
											visitor_reason as name
											,count(*) as count
										FROM visitor
										where date_format(visitor_insert_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
										group by 1
										order by count desc")->result_array();

		$data['department_count']=$this->db->query("	SELECT 
											department_name as name
											,count(*) as count
										FROM visitor
										join department on visitor_department_id=department_id
										where date_format(visitor_insert_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
										group by 1
										order by count desc")->result_array();

		$data['section_count']=$this->db->query("	SELECT 
											section_name as name
											,count(*) as count
										FROM visitor
										join section on visitor_section_id=section_id
										where date_format(visitor_insert_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
										group by 1
										order by count desc")->result_array();

		$data['doctor_count']=$this->db->query("	SELECT 
											concat('Dr.',user_first_name,' ',user_last_name) as name
											,count(*) as count
										FROM visitor
										join user on visitor_doctor_id=user_id
										where date_format(visitor_insert_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
										group by 1
										order by count desc")->result_array();

		$data['user_count']=$this->db->query("	SELECT 
											concat(user_first_name,' ',user_last_name) as name
											,count(*) as count
										FROM visitor
										join user on visitor_insert_by=user_id
										where date_format(visitor_insert_timestamp,'%Y-%m-%d')   BETWEEN '".$start."' AND '".$end."'
										group by 1
										order by count desc")->result_array();
		$this->load->view('vw_visitor_dashboard',$data);
	}
	
}

?>