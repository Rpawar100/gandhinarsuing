<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_doctor_dashboard extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();


		$count['opd_waiting']=$this->db->query("SELECT count(*) as opdw_count from appointment where appointment_status in ('Waiting','Inprocess') AND appointment_no LIKE '%OPD%' and date_format(appointment_timestamp,'%Y-%m-%d')=date_format(CURRENT_DATE,'%Y-%m-%d')")->row_array();

		$count['opd_pending']=$this->db->query("SELECT count(*) as opdp_count from appointment where appointment_status='Pending' AND appointment_no LIKE '%OPD%' and date_format(appointment_timestamp,'%Y-%m-%d')=date_format(CURRENT_DATE,'%Y-%m-%d')")->row_array();

		$count['opd_completed']=$this->db->query("SELECT count(*) as opdc_count from appointment where appointment_status='Completed' AND appointment_no LIKE '%OPD%' and date_format(appointment_timestamp,'%Y-%m-%d')=date_format(CURRENT_DATE,'%Y-%m-%d')")->row_array();
		
		$count['ipd_patient'] = $this->db->query("SELECT COUNT(*) as ipdp_count FROM appointment WHERE appointment_no LIKE '%IPD%'")->row_array();

		
		

		$this->load->view('vw_doctor_dashboard',$count);
	}


	public function all_appointment_list(){
		$this->session_validate();

		$active_tab=!empty($this->input->post('active_tab'))?$this->input->post('active_tab'):$this->input->post('active_tab');

		$search_date=!empty($this->input->post('search_date'))?$this->input->post('search_date'):$this->input->post('search_date');

		$user_id=$_SESSION['id'];
		$role_id=$_SESSION['role'];
		
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
			 $searchQuery.= " AND (
								 uhid like '%".$searchValue."%'
								or p_name like '%".$searchValue."%'
								or p_gender like '%".$searchValue."%'
								')";
		}


		$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') then 'Waiting' else appointment_status end where appointment_status='Schedule'");

		$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')<date_format(now(),'%Y-%m-%d') then 'Pending' else appointment_status end where appointment_status in ('Waiting','Schedule')");

		if($role_id[0]==6){

			$searchQuery.=" and appointment_doctor_id ='".$user_id."'";

		}

		if (empty($search_date)) {
			
			$search_date=date('Y-m-d');
		}
		


		
		switch ($active_tab) {

			case 'opd_waiting':
				$searchQuery.=" and appointment_status in ('Waiting','Inprocess') AND appointment_section_id='1'  and appointment_pay_status='Paid'  and  date_format(appointment_timestamp,'%Y-%m-%d')= '".$search_date."' ";
			break;

			case 'opd_completed':
					$searchQuery.=" and appointment_status='Completed' AND appointment_section_id='1' and appointment_pay_status='Paid'  and  date_format(appointment_timestamp,'%Y-%m-%d')= '".$search_date."' ";
			break;
			case 'ipd_patient':
					$searchQuery.=" and  appointment_section_id='2'";
			break;
			
			
		} 

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT
							appointment_id as id
							,appointment_patient_id as pid
							,appointment_no as appointment_no
							,appointment_doctor_id
							,appointment_section_id
							,appointment_pay_status
							,appointment_timestamp
							,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
							,concat('<a style=\"font-size:initial;font-weight:bolder; color:blue;\" >',P_grn,'</a>') as uhid
							,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
							,P_gender as p_gender
							,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
							,P_mobile_number
							,department_name as d_name
							,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
							,appointment_amount as amount
						
							,appointment_status
							,case 
								WHEN floor_name IS NULL THEN CONCAT('-','/', BC_name, '/', room_name, '/', bed_number)
						        WHEN BC_name IS NULL THEN CONCAT(floor_name, '/', '-', '/', room_name, '/', bed_number)
						        WHEN room_name IS NULL THEN CONCAT(floor_name, '/', BC_name, '/', '-', '/', bed_number)
						        WHEN bed_number IS NULL THEN CONCAT(floor_name, '/', BC_name, '/', room_name, '/', '-')
						       
						        ELSE CONCAT(floor_name, '/', BC_name, '/', room_name, '/', bed_number)
							end as location


							,case 
								when appointment_status='Cancelled' then concat('<label class=\"change_state\" appointment_id=\"',appointment_id,'\" appointment_status=\"',appointment_status,'\"  style=\"font-size:initial;font-weight:bolder; color:red;\">',appointment_status,'</label>')
								when appointment_status='Schedule' then concat('<label class=\"change_state\" appointment_id=\"',appointment_id,'\" appointment_status=\"',appointment_status,'\" style=\"font-size:initial;font-weight:bolder; color:gray;\">',appointment_status,'</label>')
								when appointment_status='Waiting' then concat('<label class=\"change_state\" appointment_id=\"',appointment_id,'\" appointment_status=\"',appointment_status,'\" style=\"font-size:initial;font-weight:bolder; color:darkorange;\">',appointment_status,'</label>')
								when appointment_status='Pending' then concat('<label class=\"change_state\" appointment_id=\"',appointment_id,'\" appointment_status=\"',appointment_status,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',appointment_status,'</label>')
								when appointment_status='Completed' then concat('<label style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_status,'</label>')
								else concat('<label style=\"font-size:initial;font-weight:bolder; color:black;\">',appointment_status,'</label>')
							end as status
							,'New' as appointment_type
							,LEFT(appointment_no,3) as reference
							
						from appointment
						join patient
							on 	appointment_patient_id=P_id
						join department
							on 	appointment_department_id=department_id
						join user
							on appointment_doctor_id=user_id


						left join ipd_bed_allocation on appointment_id=IBA_appointment_id
						left join floor_master on IBA_floor_id=floor_id
						left join billing_class on IBA_billing_class_id	= BC_id
						left join room_master on IBA_room_id=room_id
						left join bed_master on IBA_bed_id=bed_id
						
						 
					) result_data,(SELECT @sr_no:= 0) AS a
					where appointment_no!=''
					".$searchQuery."
					order by appointment_no desc
					LIMIT ".$length." OFFSET ".$start;


		
		 	
		$result_data = $this->db->query($result_query)->result_array();
		
		$result_count_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							appointment_no as appointment_no
							,appointment_doctor_id
							,appointment_timestamp
							,appointment_pay_status
							,appointment_section_id
							,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
							,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
							,P_mobile_number
							,department_name as d_name
							,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
							,patient_category_name as category_name
							,patient_company_name as company_name
							,appointment_amount as amount
							,appointment_status
							
							,case 
								WHEN floor_name IS NULL THEN CONCAT('-','/', BC_name, '/', room_name, '/', bed_number)
						        WHEN BC_name IS NULL THEN CONCAT(floor_name, '/', '-', '/', room_name, '/', bed_number)
						        WHEN room_name IS NULL THEN CONCAT(floor_name, '/', BC_name, '/', '-', '/', bed_number)
						        WHEN bed_number IS NULL THEN CONCAT(floor_name, '/', BC_name, '/', room_name, '/', '-')
						        ELSE CONCAT(floor_name, '/', BC_name, '/', room_name, '/', bed_number)
							end as location
							
							
						from appointment
						join patient
							on 	appointment_patient_id=P_id
						join department
							on 	appointment_department_id=department_id
						join user
							on appointment_doctor_id=user_id
						join patient_category
							on appointment_patient_category_id=patient_category_id
						join patient_company
							on appointment_patient_company_id=patient_company_id

						left join ipd_bed_allocation on appointment_id=IBA_appointment_id
						left join floor_master on IBA_floor_id=floor_id
						left join billing_class on IBA_billing_class_id	= BC_id
						left join room_master on IBA_room_id=room_id
						left join bed_master on IBA_bed_id=bed_id
					   
						
					) result_data,(SELECT @sr_no:= 0) AS a
					where appointment_no!=''
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

	

}

?>