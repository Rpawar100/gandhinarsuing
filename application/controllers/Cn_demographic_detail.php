<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_demographic_detail extends MY_Controller {
	
	function __construct(){
		parent::__construct();

	}
	
	public function index(){   
			
		$id=$this->uri->segment(2);


			$query="SELECT 
						appointment_id as id
						,appointment_no as appointment_no
						,date_format(appointment_timestamp,'%d-%m-%Y') as appointment_datetime
						,P_id as patient_id
						,P_grn as uhid
						,concat(P_name_prefix,'. ',P_first_name,' ',P_last_name) as p_name
						,P_gender as p_gender
						,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
						,P_mobile_number
						,department_name as d_name
						,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
						,patient_category_name as category_name
						,patient_company_name as company_name
						,appointment_amount as amount
						,appointment_status as status
						,LEFT(appointment_no,3) as reference
						,Case when appointment_mlc_status='YES' then concat('<label style=\"font-size:initial;font-weight:bolder; color:red;\">MLC Patient</label>')
								else ''
								end as mlc_status
						,concat('<i class=\"fa fa-file show_record\" appointment_id=\"',appointment_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from appointment
						join patient
							on appointment_patient_id =P_id
						join patient_category 
							on patient_category_id=appointment_patient_category_id
						join patient_company
							on patient_company_id=appointment_patient_company_id
						join department
							on 	appointment_department_id=department_id
						join user
							on appointment_doctor_id=user_id

							where appointment_id='".$id."'";

			$data['record']=$this->db->query($query)->row_array();

			$query1="SELECT 
						appointment_id as id
						,date_format(appointment_timestamp,'%d-%m-%Y') as appo_date
						,'OPD' as visit_details
						,department_name as d_name
						,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
						,'NA' as diagnosis
						,concat('<i class=\"fa fa-file show_record\" appointment_id=\"',appointment_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from appointment
						join department
							on 	appointment_department_id=department_id
						join user
							on appointment_doctor_id=user_id
							where appointment_patient_id=(SELECT appointment_patient_id from appointment where appointment_id='".$id."') AND date_format(appointment_timestamp,'%d-%m-%Y') = DATE_FORMAT(CURRENT_DATE() - INTERVAL 1 DAY, '%d-%m-%Y')
								ORDER BY appointment_timestamp DESC";
			
			$data['last_visit']=$this->db->query($query1)->result_array();
			

			
			$this->load->view('vw_demographic_detail',$data);
	}

	public function complaints_all()
	{

		$data['record']=$this->db->query("SELECT complaint_id as id,complaint_name as name from complaint")->result_array();

		$this->json_output($data);

	}

	public function prescription_all()
	{
		 $this->db->close();

	    $this->load->database('pos');

	    $query = $this->db->query("SELECT id, product_name as name from pos_products");
	    $data['record'] = $query->result_array();

		$this->json_output($data);

	}

	public function prescription_action(){

		 //echo $prescription_data[0][1];

		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			$prescription_data=json_decode($_POST['tableData']);

			foreach ($prescription_data as $prescription_entry) {
				
				 $record_data = array(
                'P_drug_name' => $prescription_entry[0],
                'P_unit' => $prescription_entry[1],
                'P_route' => $prescription_entry[2],
                'P_morning' => $prescription_entry[3],
                'P_afternoon' => $prescription_entry[4],
                'P_evening' => $prescription_entry[5],
                'P_night' => $prescription_entry[6],
                'P_duration' => $prescription_entry[7],
                'P_duration_type' => $prescription_entry[8],
                'P_total_quantity' => $prescription_entry[9],
                'P_start_date' => $prescription_entry[10],
                'P_end_date' => $prescription_entry[11],
                'P_instruction' => $prescription_entry[12],
                'P_advice' => $prescription_entry[13],
                'P_remark' => $prescription_entry[14],
                'P_appointment_id' => $prescription_entry[15],
                'P_status' => 'Pending',
                
            	);

            	$this->db->insert('prescription',$record_data);
			}

			$data['status']=true;
			$data['swall']=array(
				'title'=>'Record Added!',
				'text'=>'<b>Prescription Added Successfully..!</b>',
				'type'=>'success'
			);

		}
		else {
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);

	}


	public function clinical_examinition_action(){

		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');

			
			$record_data = array(

				'CE_appointment_id' => !empty($_POST['appointment_id']) ? $_POST['appointment_id'] : '',
				'CE_medical_history' => !empty($_POST['medical_history']) ? $_POST['medical_history'] : '',
				'CE_surgical_history' => !empty($_POST['surgical_history']) ? $_POST['surgical_history'] : '',
				'CE_smoking' => !empty($_POST['smoking']) ? $_POST['smoking'] : '',
				'CE_smoking_since' => !empty($_POST['smoking_since']) ? $_POST['smoking_since'] : '',
				'CE_alcohol' => !empty($_POST['alcohol']) ? $_POST['alcohol'] : '',
				'CE_alcohol_since' => !empty($_POST['alcohol_since']) ? $_POST['alcohol_since'] : '',
				'CE_tobacco' => !empty($_POST['tobacco']) ? $_POST['tobacco'] : '',
				'CE_tobacco_since' => !empty($_POST['tobacco_since']) ? $_POST['tobacco_since'] : '',
				
				'CE_diet' => !empty($_POST['Diet']) ? $_POST['Diet'] : '',



				'CE_built' => !empty($_POST['built']) ? $_POST['built'] : '',
				'CE_lean' => !empty($_POST['lean']) ? $_POST['lean'] : '',
				'CE_average' => !empty($_POST['average']) ? $_POST['average'] : '',
				'CE_healthy' => !empty($_POST['healthy']) ? $_POST['healthy'] : '',
				'CE_obese' => !empty($_POST['obese']) ? $_POST['obese'] : '',
				'CE_cns' => !empty($_POST['cns']) ? $_POST['cns'] : '',
				'CE_cvs' => !empty($_POST['cvs']) ? $_POST['cvs'] : '',
				'CE_rs' => !empty($_POST['rs']) ? $_POST['rs'] : '',
				'CE_pa_inspection' => !empty($_POST['inspection']) ? $_POST['inspection'] : '',
				'CE_pa_palpation' => !empty($_POST['palpation']) ? $_POST['palpation'] : '',
				'CE_pa_percusion' => !empty($_POST['percusion']) ? $_POST['percusion'] : '',
				'CE_pa_auscultation' => !empty($_POST['auscultation']) ? $_POST['auscultation'] : '',
				'CE_local_examination' => !empty($_POST['local_examiniation']) ? $_POST['local_examiniation'] : '',
				'CE_rectal_examination' => !empty($_POST['per_rectal_examination']) ? $_POST['per_rectal_examination'] : '',
				'CE_provisional' => !empty($_POST['provisional']) ? $_POST['provisional'] : '',
				'CE_differential_diagnosis' => !empty($_POST['differential_diagnosis']) ? $_POST['differential_diagnosis'] : '',
				'CE_final_diagnosis' => !empty($_POST['final_diagnosis']) ? $_POST['final_diagnosis'] : '',
				'CE_immediate_mgnt' => !empty($_POST['immediate_management']) ? $_POST['immediate_management'] : '',
				'CE_preventive_measures' => !empty($_POST['preventive_measures']) ? $_POST['preventive_measures'] : '',
				'CE_plan_of_care' => !empty($_POST['plan_of_care']) ? $_POST['plan_of_care'] : '',
				'CE_nutritional_status' => !empty($_POST['nutritional_status']) ? $_POST['nutritional_status'] : '',

			   
			    'CE_complaint' => !empty($_POST['cliex_complaint_name']) ? implode(',', $_POST['cliex_complaint_name']) : '',
			    'CE_temperature' => !empty($_POST['temperature']) ? $_POST['temperature'] : '',
			    'CE_PR' => !empty($_POST['PR']) ? $_POST['PR'] : '',
			    'CE_RR' => !empty($_POST['RR']) ? $_POST['RR'] : '',
			    'CE_Systolic_BP' => !empty($_POST['systolic_bp']) ? $_POST['systolic_bp'] : '',
			    'CE_Diastolic_BP' => !empty($_POST['diastolic_bp']) ? $_POST['diastolic_bp'] : '', 
			    'CE_heart_rate' => !empty($_POST['heart_rate']) ? $_POST['heart_rate'] : '',
			    'CE_SpO2' => !empty($_POST['spO2']) ? $_POST['spO2'] : '',
			    'CE_height' => !empty($_POST['height']) ? $_POST['height'] : '',
			    'CE_weight' => !empty($_POST['weight']) ? $_POST['weight'] : '',
			    'CE_BMI' => !empty($_POST['BMI']) ? $_POST['BMI'] : '',
			    'CE_BSA' => !empty($_POST['BSA']) ? $_POST['BSA'] : '',
			    'CE_BMI_Remark' => !empty($_POST['BMI_Remark']) ? $_POST['BMI_Remark'] : '',
			    'CE_CVP' => !empty($_POST['CVP']) ? $_POST['CVP'] : '',
			    'CE_examination_details' => !empty($_POST['examination_details']) ? $_POST['examination_details'] : '',
			    
			);

			$this->db->insert('clinical_examination', $record_data);



			$data['status']=true;
			$data['swall']=array(
				'title'=>'Record Added!',
				'text'=>'<b>Clinical Examinition Added Successfully..!</b>',
				'type'=>'success'
			);

		}
		else {
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);




	}

	public function get_test_report_list()
	{

		$this->session_validate();
		
		if (!empty($_POST)) {	
			
			$appointment_id= $_POST['appointment_id'];
			$result_query="SELECT 
						ASA_id
						,appointment_no as appointment_no
						,appointment_id as appointment_id 
						,appointment_status
						,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
						,ASA_status
						,services_name
						,sub_department_name
						,ASA_services_id
                        ,case
							when (ASA_status='Completed')  and services_input_method ='DATA'
								then concat('<label class=\"generate_report\" style=\"font-size:initial;font-weight:bolder; color:black;\"  appointment_id=\"',appointment_id,'\"  data_url=\"https://aqdsoft.in/generate-lis-report/',ASA_id,'\" file_data=\"\" pdf_url=\"https://synergy.autoqed.com/hospitals/generate-lis-report/',ASA_id,'?action=PDF\">View Report</label>')
							when (ASA_status='Dispatched') and services_input_method in ('FILE','DATA')
								then concat('<label class=\"generate_report\" style=\"font-size:initial;font-weight:bolder; color:black;\"  appointment_id=\"',appointment_id,'\" file_data=\"',ASA_service_report,'\">View Report</label>') 
							else ''
						end as generate_report
					FROM appointment
					join appointment_services_assign on ASA_appointment_id=appointment_id
					join services on services_id=ASA_services_id
					join sub_department on services_sub_department_id=sub_department_id
					 where appointment_id ='".$appointment_id."'";

					$data = $this->db->query($result_query)->result_array();

		}else{

			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);

	}

	public function LOT_task_action()
	{
		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');

			$record_data = array(
			    'LOT_appointment_id' => !empty($_POST['appointment_id']) ?($_POST['appointment_id']) : '',
			    'LOT_task' => !empty($_POST['IT_task']) ? $_POST['IT_task'] : '',
			    'LOT_Date' => !empty($_POST['IT_date']) ? $_POST['IT_date'] : '',
			    'LOT_description' => !empty($_POST['IT_description']) ? $_POST['IT_description'] : '',
			    'LOT_time' => !empty($_POST['IT_time']) ? $_POST['IT_time'] : '',
			    
			);


			if (!empty($_POST['LOT_id'])) {
			
				$this->db->where('LOT_id',$_POST['LOT_id']);
				$this->db->update('line_of_treatment',$record_data);

				$data['status']=true;
							$data['swall']=array(
								'title'=>'Record Updated!',
								'text'=>'<b>Sub Department Name Updated Successfully..!</b>',
								'type'=>'success'
							);

			}else{
				$this->db->insert('line_of_treatment', $record_data);

				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>Task Added Added Successfully..!</b>',
					'type'=>'success'
				);
			}


			
		}
		else {
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);


	}

	public function LOT_task_list(){


		
		$opd_id=!empty($this->input->post('opdid'))?$this->input->post('opdid'):$this->input->post('opdid');


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
							 LOT_task as task
							,LOT_date as lot_date
							,LOT_description as description
							,LOT_time as lot_time 
							,concat('<i class=\"fa fa-edit edit_record\" LOT_id=\"',LOT_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" LOT_id=\"',LOT_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
							,concat('<label class=\"add_remark\" LOT_id=\"',LOT_id,'\"  style=\"color:royalblue;font-size:14px;margin: 0px 10px;\">Add Remark</label>') as remark
						from line_of_treatment
						where LOT_appointment_id='".$opd_id."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where task!=''
					".$searchQuery;
			
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

	public function LOT_task_delete(){

		$this->session_validate();
		if (!empty($_POST['LOT_id'])) {
			$LOT_id=$_POST['LOT_id'];

			$this->db->query("DELETE from line_of_treatment where LOT_id=".$LOT_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Task Deleted Successfully..!</b>',
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

	public function LOT_task_by_id(){
		$this->session_validate();
		if(!empty($_POST['LOT_id'])){
			$LOT_id=$_POST['LOT_id'];
			$data['record']=$this->db->query("	SELECT 
														 LOT_task as task
														,LOT_date as lot_date
														,LOT_description as description
														,LOT_time as lot_time 
												FROM line_of_treatment
												where LOT_id=".$LOT_id)->row_array();

			$this->json_output($data);
		}
	}

	public function LOT_remark_action(){

		$this->session_validate();
		$user_id=$this->session->userdata('id');

		if (!empty($_POST)) {

			$LOT_id=$_POST['LOT_id'];
			$LOT_remark=$_POST['LOT_remark'];

			$record_data = array(
			    'RLOT_LOT_id' => $LOT_id,
			    'RLOT_remark' => $LOT_remark,
			   
			);

			$this->db->insert('remark_line_of_treatment', $record_data);

				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>Task Remark Added Added Successfully..!</b>',
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


	function show_discharge_summery(){

			$this->load->view('vw_discharge_summary');

	}


	public function add_other_services_action(){	
		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['opd_id'])) {
				
				$appointment_id=$_POST['opd_id'];

				$company=$this->db->query("SELECT 
								appointment_patient_company_id as company_id
								from appointment
								where appointment_id='".$appointment_id."'")->row_array();
				
				$company_id=$company['company_id'];

				$rate_type=$this->db->query("SELECT 
								rate_type_id as type_id
								from patient_company
								join rate_type on patient_company_rate_type_id=rate_type_id
								where patient_company_id='".$company_id."'")->row_array();

				$rate_type_id = $rate_type['type_id'];
		        $doctor_id=$user_id;
		        $tableData=json_decode($_POST['tableData']);
				$service_list = implode( ",", $tableData );
		        $query1="INSERT INTO appointment_services_assign
							SELECT
							    null as id
							    ,CURRENT_TIMESTAMP as time
							    ,'".$appointment_id."' as appointment_id
							    ,services_id
							    ,CASE 
							    	WHEN rate_config_amount IS NULL THEN services_rate
							        ELSE rate_config_amount 
							    END as services_rate
							    ,'".$rate_type_id."' as type_id
							    ,'".$doctor_id."' as doctor_id
							    
							    ,'' as emergency
							    ,'' as clinical_details
							    ,CASE 
							    	WHEN rate_config_id IS NULL THEN '0' 
							    	ELSE rate_config_id 
							    END as rate_config_id
							    ,'' as report
							    ,'' as upload_timestamp
							    ,'' as uploaded_user_id
							    ,'' as approved_timestamp
							    ,'' as approved_user_id
							    ,'' as rejected_reason
							    ,'Pending' as status
							FROM
							    services
							LEFT JOIN
							    rate_config ON rate_config_services_id = services_id AND rate_config_rate_type_id = '".$rate_type_id."'
							WHERE
							    services_id IN (".$service_list.")";

				$this->db->query($query1);

				

				$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Services Added Successfully..!</b>',
						'type'=>'success'
					);
				
			}
			else
			{
				$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Please Select Patient..!</b>',
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

	public function product_type_all()
	{

	$data['record']=$this->db->query("SELECT product_id as id,product_name as name from product where product_type='Consumable'")->result_array();

	$this->json_output($data);

	}



	public function unit_by_product(){

		$this->session_validate();
		if(!empty($_POST['product_id'])){
			$product_id=$_POST['product_id'];
			$data['record']=$this->db->query("SELECT 
														unit_id as id
														,unit_name as name	
												FROM unit
												join product on unit_id=product_unit_id 
												where product_id=".$product_id)->result_array();

			$this->json_output($data);
		}


	}

	public function add_consumable_action(){

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			$user_id=$this->session->userdata('id');
			$prescription_data=json_decode($_POST['tableData']);
			$appointment_id=$_POST['opd_id'];

			foreach ($prescription_data as $prescription_entry) {
				
				 $record_data = array(
                'P_drug_name' => $prescription_entry[0],
                'P_unit' => $prescription_entry[1],
                'P_total_quantity' => $prescription_entry[2],
                'P_appointment_id' => $appointment_id,
                
            	);

            	$this->db->insert('prescription',$record_data);
			}

			$data['status']=true;
			$data['swall']=array(
				'title'=>'Record Added!',
				'text'=>'<b>Consumable Added Successfully..!</b>',
				'type'=>'success'
			);

		}
		else {
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);

	}

	public function get_consumable_list(){

		$this->session_validate();
		
		if (!empty($_POST)) {	
			
			$appointment_id= $_POST['appointment_id'];
			$result_query="SELECT 
						P_id 
						,P_drug_name
						,date_format(P_inserted_timestamp,'%d-%m-%Y %h:%i %p') as insert_datetime
						,product_name
                       	,concat('<label class=\"change_consumable_state\" P_id=\"',P_id,'\" P_status=\"',P_status,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',P_status,'</label>') as consumable_status
					FROM prescription
					join product on product_id=P_drug_name
					where P_appointment_id ='".$appointment_id."'";

					$data = $this->db->query($result_query)->result_array();

		}else{

			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);
	}

	public function change_consumable_state(){

		$this->session_validate();
		if (!empty($_POST['p_id'])) {
			$p_id=$_POST['p_id'];
			$p_status=$_POST['p_status'];

			switch ($p_status) {
				case 'Pending':
					$this->db->query("Update prescription set P_status='Cancelled' where P_id =".$p_id);
					break;
				case 'Dispatched':
					$this->db->query("Update prescription set P_status='Completed' where P_id =".$p_id);
					break;
			
			}

			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Status Updated Successfully..!</b>',
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

	public function get_services_list(){

		
		$this->session_validate();
		
		if (!empty($_POST)) {	
			
			$appointment_id= $_POST['appointment_id'];
			$result_query="SELECT 
						ASA_id
						,date_format(ASA_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
						,ASA_status
						,services_name
						,concat('<label class=\"change_service_state\" 	ASA_id=\"',	ASA_id,'\" ASA_status=\"',ASA_status,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',ASA_status,'</label>') as service_status
					FROM appointment_services_assign
					join services on services_id=ASA_services_id 
						where ASA_appointment_id='".$appointment_id."'";
					

					$data = $this->db->query($result_query)->result_array();

		}else{

			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);

	}

	public function change_service_state(){

		$this->session_validate();
		if (!empty($_POST['ASA_id'])) {
			$ASA_id=$_POST['ASA_id'];

			$this->db->query("Update appointment_services_assign set ASA_status='Cancelled' where ASA_id =".$ASA_id);
					
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Status Updated Successfully..!</b>',
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

	public function patient_prescription_all(){

		$this->session_validate();
		
		if (!empty($_POST)) {	
			
			$appointment_id= $_POST['appointment_id'];
			$result_query="SELECT 
						P_id 
						,P_drug_name
						,date_format(P_inserted_timestamp,'%d-%m-%Y %h:%i %p') as insert_datetime
						,P_unit as unit
						,P_route as route
						,P_morning as morning 
						,P_afternoon as afternoon 
						,P_evening as evening 
						,P_night as night
						,P_duration as duration  
						,P_duration_type as duration_type
						,P_total_quantity as total_quantity
						,P_start_date as start_date
						,P_end_date as end_date
						,P_instruction as instruction
						,P_advice as advice
						,P_remark as remark
 						,product_name
                       	,concat('<label class=\"change_prescription_state\" P_id=\"',P_id,'\" P_status=\"',P_status,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',P_status,'</label>') as status
					FROM autoqed_hmis.prescription
					join autoqed_pos_prod.pos_products on pos_products.id=P_drug_name
					where P_appointment_id ='".$appointment_id."'";

					$data = $this->db->query($result_query)->result_array();

		}else{

			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);
	}

	
	public function change_prescription_state(){

		$this->session_validate();
		if (!empty($_POST['p_id'])) {
			$p_id=$_POST['p_id'];
			$p_status=$_POST['p_status'];

			switch ($p_status) {
				case 'Pending':
					$this->db->query("Update prescription set P_status='Cancelled' where P_id =".$p_id);
					break;
				case 'Dispatched':
					$this->db->query("Update prescription set P_status='Completed' where P_id =".$p_id);
					break;
			
			}

			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Status Updated Successfully..!</b>',
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

	public function get_bed_list(){

		$this->session_validate();
		if (!empty($_POST['appointment_id'])) {
			$appointment_id=$_POST['appointment_id'];

			
			$query="SELECT 
						IBA_id as id
						,bed_number as name
						,date_format(IBA_start_date,'%Y-%m-%d %h:%i %p') as start_date
						,case when date_format(IBA_end_date,'%Y-%m-%d %h:%i %p') is null then '-' else date_format(IBA_end_date,'%Y-%m-%d %h:%i %p') end as end_date

						from ipd_bed_allocation
						join bed_master on IBA_bed_id=bed_id where IBA_appointment_id='".$appointment_id."'";

			$data['result']=$this->db->query($query)->result_array();	

		}else{
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);



	}

	public function transfer_bed_action(){

		$this->session_validate();
		if (!empty($_POST['appointment_id'])) {
			$appointment_id=$_POST['appointment_id'];

			$IBA_id=$_POST['IBA_id'];





			$this->db->query('UPDATE ipd_bed_allocation SET IBA_end_date=CURRENT_TIMESTAMP WHERE IBA_appointment_id="'.$appointment_id.'"');
			
			$record_data = array(
			    'IBA_floor_id' => !empty($_POST['floor_number']) ?($_POST['floor_number']) : '',
			    'IBA_ward_id' => !empty($_POST['ward_number']) ? $_POST['ward_number'] : '',
			    'IBA_room_id' => !empty($_POST['room_number']) ? $_POST['room_number'] : '',
			    'IBA_bed_id' => !empty($_POST['bed_number']) ? $_POST['bed_number'] : '',
			    'IBA_appointment_id' => !empty($_POST['appointment_id']) ? $_POST['appointment_id'] : '',
			    'IBA_start_date' =>date('Y-m-d H:i:s'),
			    
			);
			 $this->db->insert('ipd_bed_allocation', $record_data);
			 $IBA_id=$this->db->insert_id();
			 $this->db->query("UPDATE bed_master set bed_appointment_id	= 0 where bed_appointment_id='".$appointment_id."'");
			 $this->db->query("UPDATE bed_master set bed_appointment_id	='".$appointment_id."'  where bed_id='".$record_data['IBA_bed_id']."'");




			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Bed Transfer Successfully..!</b>',
				'type'=>'success',
				'IBA_id'=> $IBA_id
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

	public function generate_discharge_report(){

		$id=$this->uri->segment(2);
	    $action=$this->input->get('action');
	    $query="SELECT      
	            
	            appointment_id
	            ,appointment_no as p_visit_number
	            ,concat(P_name_prefix,' ',P_first_name,' ',P_middle_name,' ',P_last_name) as patient_name
	            ,concat(SUBSTRING_INDEX(calculate_age(P_dob),'-',1),' years') as patient_age
	            ,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
	            ,P_grn as uhid
	            ,P_gender as gender
	            ,P_mobile_number as mobile_number
	            ,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
	            ,department_name
	            ,date_format(D_advice_date,'%d-%m-%Y %h:%i %p') as advice_date
	            ,date_format(D_timestamp,'%d-%m-%Y %h:%i %p') as discharge_date
	            ,D_discharge_type as discharge_type
	            ,D_condition_on_discharge as condition_on_discharge
	            ,D_condition_on_discharge as condition_on_discharge
	            ,D_final_diagnosis as final_diagnosis
	            ,D_surgery_performed as surgery_performed
	            ,D_history_of_chief_complaints as history_of_chief_complaints
	            ,D_examination_findings as examination_findings
	            ,D_treatment as treatment 
	            ,D_course_in_hospital as course_in_hospital
	            ,D_treatment_on_discharge as treatment_on_discharge
	            ,D_treatment_on_discharge as D_diet
	            
	            from appointment
	            join user
	              on appointment_doctor_id= user_id
	            join patient
	              on appointment_patient_id=P_id
	            join department on appointment_department_id=department_id
	            join discharge on D_appointment_id=appointment_id
	            where appointment_id='".$id."'";
	    $data['record']=$this->db->query($query)->row_array();

	    $query1="SELECT 
	    				P_id as id
	    				,concat(date_format(P_start_date,'%d-%m-%Y'),' To ',date_format(P_end_date,'%d-%m-%Y')) as p_date
	    				,P_drug_name as drug_name
	    				,P_route as route
	    				,concat(P_morning,'-',P_afternoon,'-',P_evening,'-',P_night) as Frequency
	    				,'0' as Dosage
	    				,P_duration as duration
	    				,P_total_quantity as total_quantity
	    				,P_instruction as instruction
	    				,P_remark as remark
	    				from prescription
	    				where P_appointment_id='".$id."'";
	    $data['prescription']=$this->db->query($query1)->result_array();


	    				
	    $data['print']='False';
	          if($action=='PDF'){
	            $file_name=$id.'='.date('Ymdhis').'.pdf';
	            $pdfFilePath = '/home/autoqed/public_html/hospital/uploads/casepaper/'.$file_name;
	            shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/generate-opd-casepaper/'.$id.'?action=View" '.$pdfFilePath); 
	            $responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/casepaper/'.$file_name);
	            $this->json_output($responce);
	          }else{
	            if($action=='Print'){
	              $data['print']='True';
	            }
	            $this->load->view('vw_discharge_summary',$data);
	          }
	}

	public function discharge_form_action(){

		$this->session_validate();
		if (!empty($_POST['appointment_id'])) {
			$appointment_id=$_POST['appointment_id'];

			$record_data = array(
			    
				'D_advice_date' => !empty($_POST['advice_date']) ?($_POST['advice_date']) : '',
				'D_condition_on_discharge' => !empty($_POST['D_condition_on_discharge']) ?($_POST['D_condition_on_discharge']) : '',
				'D_discharge_type' => !empty($_POST['discharge_type']) ?($_POST['discharge_type']) : '',
				'D_condition_on_discharge' => !empty($_POST['advice_date']) ?($_POST['advice_date']) : '',
				'D_department' => !empty($_POST['']) ?($_POST['']) : '',
				'D_approval_doctor' => !empty($_POST['']) ?($_POST['']) : '',
				'D_final_diagnosis' => !empty($_POST['finalDiagnosis']) ?($_POST['finalDiagnosis']) : '',
				'D_surgery_performed' => !empty($_POST['surgeryPerformed']) ?($_POST['surgeryPerformed']) : '',
				'D_history_of_chief_complaints' => !empty($_POST['chief_complaints']) ?($_POST['chief_complaints']) : '',
				'D_physiotherapy' => !empty($_POST['Physiotherapy']) ?($_POST['finalDiagnosis']) : '',
				'D_past_history' => !empty($_POST['Past_History']) ?($_POST['Past_History']) : '',
				'D_personal_history' => !empty($_POST['Personal_History']) ?($_POST['Personal_History']) : '',
				'D_family_history' => !empty($_POST['Family_History']) ?($_POST['Family_History']) : '',
				'D_examination_findings' => !empty($_POST['Examination_Findings']) ?($_POST['Examination_Findings']) : '',
				'D_investigation' => !empty($_POST['Investigation']) ?($_POST['Investigation']) : '',
				'D_treatment' => !empty($_POST['treatment_Surgery']) ?($_POST['treatment_Surgery']) : '',
				'D_course_in_hospital' => !empty($_POST['CourseInHospital']) ?($_POST['CourseInHospital']) : '',
				'D_treatment_on_discharge' => !empty($_POST['TreatmentOnDischarge']) ?($_POST['TreatmentOnDischarge']) : '',
				'D_advice_on_discharge' => !empty($_POST['Advice_On_Discharge']) ?($_POST['Advice_On_Discharge']) : '',
				'D_management' => !empty($_POST['Management']) ?($_POST['Management']) : '',
				'D_diet' => !empty($_POST['Diet']) ? $_POST['Diet'] : '',
			    'D_follow_up_date' =>!empty($_POST['follow_up_date']) ? $_POST['follow_up_date'] : '',
			    'D_appointment_id' =>$appointment_id,
			    
			);
			 $this->db->insert('discharge', $record_data);
			 
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Discharge Info inserted Successfully..!</b>',
				'type'=>'success',
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


	public function present_illness_form_action(){

		$this->session_validate();

		
		
		if (!empty($_POST['opdid'])) {
			$appointment_id=$this->session->userdata('appointment_id');

			$record_data = array(
			    'PI_compalint_id' => !empty($_POST['complaint_name']) ? implode(',', $_POST['complaint_name']) : '',
			    'PI_compalint_detail' => !empty($_POST['complaint_details']) ? $_POST['complaint_details'] : '',
			    'PI_appointment_id' => !empty($_POST['appointment_id']) ? $_POST['appointment_id'] : '',
			    
			);

			$this->db->insert('present_illness', $record_data);
			$data['status']=true;
			$data['swall']=array(
				'title'=>'Record Added!',
				'text'=>'<b>Present Illness Added Successfully..!</b>',
				'type'=>'success'
			);

		}
		else {
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);
		



	}


	public function patient_refer_action(){	
		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['opd_id'])) {
				
				$opd_appointment_id=$_POST['opd_id'];

				$query="SELECT 
								appointment_patient_id as patient_id
								,appointment_doctor_id as consulting_doctor
								,appointment_patient_category_id as patient_category
								,appointment_patient_company_id as patient_company
								,appointment_employee_id as employee_id
								,appointment_employee_name as employee_name
								,appointment_employee_relationship as employee_relationship
								,appointment_insurance_policy_company as insurance_policy_company
								,appointment_insurance_policy_no as insurance_policy_company
								,appointment_health_card_no as health_card_no
								,appointment_referance_hospital as ref_hospital
								,appointment_referance_doctor as ref_doctor
								,appointment_relative_name as relative_name
								,appointment_relative_relationship as relative_relationship
								from appointment
								where  appointment_id='".$opd_appointment_id."'";

						$result=$this->db->query($query)->row_array();


				$record_data = array(
					'appointment_patient_id' =>!empty($result['patient_id'])?$result['patient_id']:'',
					'appointment_timestamp' =>date('Y-m-d H:i:s'),
					'appointment_department_id' =>!empty($_POST['PR_d_name'])?$_POST['PR_d_name']:'',
					'appointment_doctor_id' =>!empty($_POST['PR_user_id'])?$_POST['PR_user_id']:'0',
					'appointment_status' =>'Schedule',
					'appointment_pay_status' =>'Unpaid',
					'appointment_section_id' =>'1',
					'appointment_type'=>'New',
					'appointment_patient_category_id' =>!empty($result['patient_category'])?$result['patient_category']:'',
					'appointment_patient_company_id' =>!empty($result['patient_company'])?$result['patient_company']:'',

					'appointment_employee_id' =>!empty($result['employee_id'])?$result['employee_id']:'',
					'appointment_employee_name' =>!empty($result['employee_name'])?$result['employee_name']:'',
					'appointment_employee_relationship' =>!empty($result['employee_relationship'])?$result['employee_relationship']:'',

					'appointment_insurance_policy_company' =>!empty($result['insurance_policy_company'])?$result['insurance_policy_company']:'',
					'appointment_insurance_policy_no' =>!empty($result['insurance_policy_no'])?$result['insurance_policy_no']:'',
					'appointment_health_card_no' =>!empty($result['health_card_no'])?$result['health_card_no']:'',
					
					'appointment_referance_hospital' =>!empty($result['ref_hospital'])?$result['ref_hospital']:'',
					'appointment_referance_doctor' =>!empty($result['ref_doctor'])?$result['ref_doctor']:'',
					'appointment_relative_name' =>!empty($result['relative_name'])?$result['relative_name']:'',
					'appointment_relative_relationship' =>!empty($result['relative_relationship'])?$result['relative_relationship']:'',
					'appointment_visit_detail' =>$opd_appointment_id,
					'appointment_created_by' =>$user_id,
				);

				$this->db->insert('appointment',$record_data);
				$appointment_id=$this->db->insert_id();

				

				$appointment_no='OPD-'.sprintf("%010d", $appointment_id);
				$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') then 'Waiting' else 'Schedule' end,appointment_amount=(SELECT sum(ASA_service_amount) as amount FROM appointment_services_assign where ASA_appointment_id='".$appointment_id."'),appointment_no='".$appointment_no."' where	appointment_id='".$appointment_id."'");

				$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Appointment Added Successfully..!</b>',
						'type'=>'success'
					);
				
			}
			else
			{
				$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Please Select Patient..!</b>',
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


	public function patient_refer_list(){

		$this->session_validate();

		if (!empty($_POST['appointment_id'])) {
			$appointment_id=$_POST['appointment_id'];

			$query="SELECT 
							
							date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_slot
							,department_name as dname
							,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
							from appointment
							join department on appointment_department_id=department_id
							join user on appointment_doctor_id=user_id
							where appointment_visit_detail='".$appointment_id."'";

						

			$data['record']=$this->db->query($query)->result_array();

		}
		else {
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);


	}

	public function print_ICA(){

		$id=$this->uri->segment(2);
		$action=$this->input->get('action');

		$doctor_name=$_SESSION['name'];

		$query="SELECT clinical_examination.*,
	            
	            P_grn as uhid
	            ,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
	            ,concat(P_name_prefix,' ',P_first_name,' ',P_middle_name,' ',P_last_name) as patient_name
	            ,P_gender as gender 
	            ,date_format(CE_timestamp,'%d-%m-%Y %h:%i %p') as ce_datetime
	            ,concat(SUBSTRING_INDEX(calculate_age(P_dob),'-',1),' years') as patient_age
	            ,date_format(CE_timestamp,'%d-%m-%Y %h:%i %p') as ce_timestamp
	            ,concat(user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
	            ,department_name as dept_name
	            from clinical_examination
	            JOIN appointment on CE_appointment_id=appointment_id
	            join user on appointment_doctor_id=user_id
	            join department on appointment_department_id=department_id
	            JOIN patient on appointment_patient_id=P_id

	            where CE_appointment_id='".$id."'";

	         $data['ICA']=$this->db->query($query)->row_array();
	        // print_r($data);die();
	         $data['doctor_name']=$doctor_name;

	      

		$data['print']='False';
	          if($action=='PDF'){
	            $file_name=$id.'='.date('Ymdhis').'.pdf';
	            $pdfFilePath = '/home/autoqed/public_html/hospital/uploads/casepaper/'.$file_name;
	            shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/generate-opd-casepaper/'.$id.'?action=View" '.$pdfFilePath); 
	            $responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/casepaper/'.$file_name);
	            $this->json_output($responce);
	          }else{
	            if($action=='Print'){
	              $data['print']='True';
	            }
	            $this->load->view('vw_clinical_examination_print',$data);
	          }


	}

	public function concent_all()
	{

			
		$query="SELECT form_id as id
						,form_name as name
						from form 
						where form_type='Consent'";
		

		$data['record']=$this->db->query($query)->result_array();

		$this->json_output($data);

	}

	public function load_concent_form()
	{
		$id=$this->uri->segment(2);
		$form_array=explode('-', $id);

		$form_id=$form_array[0];
		$appointment_id=$form_array[1];
				
		$action=$this->input->get('action');
		
		$query="SELECT      
						P_grn as uhid
						,concat(P_name_prefix,P_first_name,' ',P_middle_name,' ',P_last_name) as patient_name
						,P_gender as gender
						,concat(SUBSTRING_INDEX(calculate_age(P_dob),'-',1),' years') as patient_age
						,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
						,date_format(P_dob,'%d-%m-%Y') as patient_dob

						from appointment
						join user
							on appointment_doctor_id= user_id
						join patient
							on appointment_patient_id=P_id
								where appointment_id='".$appointment_id."'";
		
		$data['record']=$this->db->query($query)->row_array();
		
		$data['print']='False';
		if($action=='PDF'){
			$file_name=$rid.'='.date('Ymdhis').'.pdf';
			$pdfFilePath = '/home/autoqed/public_html/hospital/uploads/receipt/'.$file_name;
			shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/opd-appointment-bill/'.$rid.'?action=View" '.$pdfFilePath); 
			$responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/receipt/'.$file_name);
			$this->json_output($responce);
		}else{
			if($action=='Print'){
				$data['print']='True';
			}
			$this->load->view('forms/vw_'.$form_id,$data);
		}
	}

	public function favourite_service_action(){

		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
		
			$record_data = array(

				'FS_service_id' => !empty($_POST['FI_service_name']) ? $_POST['FI_service_name'] : '',
				'FS_user_id' => !empty($user_id) ? $user_id : '',    
			);
			
			$this->db->insert('favourite_services', $record_data);

			$data['status']=true;
			$data['swall']=array(
				'title'=>'Record Added!',
				'text'=>'<b>Favourite Service Added Successfully..!</b>',
				'type'=>'success'
			);

		}
		else {
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);

	}

	public function get_favourite_service(){

		$user_id=$this->session->userdata('id');

		$data['result']=$this->db->query("SELECT 
											FS_id as id
											,FS_service_id as sid
											,services_name as name 
											,department_id as did
											,department_name as dname
											from favourite_services
											join services on FS_service_id=services_id
											join department on services_department_id = department_id  where FS_user_id='".$user_id."'")->result_array();

		
		$this->json_output($data);
		
	}

	public function favorite_service_delete(){

		$user_id=$this->session->userdata('id');
		$fs_id=$this->input->post('fs_id');
		$this->db->query("DELETE from favourite_services where FS_id ='".$fs_id."'");

		$data['status']=true;
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Favourite Service Removed Successfully..!</b>',
				'type'=>'success'
			);

		
		$this->json_output($data);
		
	}


	public function get_ICA_details(){

		$opdid=$this->input->post('opdid');

		$data['result']=$this->db->query("SELECT * from clinical_examination where CE_appointment_id='".$opdid."'")->row_array();

		$this->json_output($data);

	}

	public function consultation_status_action(){

		$opdid=$this->input->post('opdid');

		$this->db->query("UPDATE appointment SET appointment_status ='Completed' where appointment_id='".$opdid."'");

		$data['status']=true;
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Appointment Completed Successfully..!</b>',
				'type'=>'success'
			);

		$this->json_output($data);



	}

	
}

?>