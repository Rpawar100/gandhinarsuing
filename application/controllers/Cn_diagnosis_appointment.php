<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_diagnosis_appointment extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_diagnosis_appointment');
	}

	public function diagnosis_appointment_list(){
		$this->session_validate();
		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length']; 
		$searchValue = $_POST['search']['value']; 
		$searchQuery = "";

		if (!empty($_POST['daterangeinput'])) {
			$date_array=explode('to', $_POST['daterangeinput']);
			$from_date=date('Y-m-d',strtotime($date_array[0]));
			$to_date=date('Y-m-d',strtotime($date_array[1]));
		}
		else
		{
			$from_date=date('Y-m-d', strtotime("-1 month"));
			$to_date=date('Y-m-d');
		}
		$data['from_date']=date('d-m-Y',strtotime($from_date));
		$data['to_date']=date('d-m-Y',strtotime($to_date));

		for ($i=0; $i <count($_POST['columns']) ; $i++) { 
			if (!empty($_POST['columns'][$i]['search']['value'])) {
				$searchQuery.="AND ".$_POST['columns'][$i]['data']." like '".$_POST['columns'][$i]['search']['value']."%'";
			}
		}	

		if($searchValue != ''){
			$searchQuery.= " AND (appointment_no like '%".$searchValue."%' 
								or appointment_datetime like '%".$searchValue."%'
								or p_name like '%".$searchValue."%'
								or P_mobile_number like '%".$searchValue."%'
								or d_name like '%".$searchValue."%'
								or doctor_name like '%".$searchValue."%'
								or category_name like '%".$searchValue."%'
								or company_name like '%".$searchValue."%'
								or amount like '%".$searchValue."%'
								or status like '%".$searchValue."%'
								or pay_status like '%".$searchValue."%'')";
		}

		$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') then 'Waiting' else appointment_status end where appointment_status='Schedule'");

		$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')<date_format(now(),'%Y-%m-%d') then 'Pending' else appointment_status end where appointment_status in ('Waiting','Schedule')");

		$result_query="SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT
							appointment_id as id
							,appointment_patient_id as pid
							,appointment_no as appointment_no
							,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
							,P_grn as uhid
							,concat(P_name_prefix,'. ',P_first_name,' ',P_last_name) as p_name
							,P_gender as p_gender
							,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
							,P_mobile_number
							,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
							,patient_category_name as category_name
							,patient_company_name as company_name
							

							,case 
								when amount is NULL then  
				                concat('<label appoint_id=\"',appointment_id,'\" appoint_id=\"',appointment_id,'\" style=\"font-size:initial;font-weight:bolder; color:orange;\">0.00</label>')
				                else 
				                  concat('<label class=\"view_services\" appoint_id=\"',appointment_id,'\" style=\"font-size:initial;font-weight:bolder; color:orange;\">',amount,'</label>')
				              end as amount


							,concat('<label class=\"view_received_amount\" appoint_id=\"',appointment_id,'\"  style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_received_amount,'</label>') AS received_amt

							

							 ,Case when appointment_received_amount=0.00 and appointment_pay_status='Unpaid' then

								concat('<label class=\"pay_bill\" appoint_id=\"',appointment_id,'\" balalnce_amt=\"',appointment_amount,'\" style=\"font-size:initial;font-weight:bolder; color:red;\">',appointment_amount,'</label>')


							else concat('<label class=\"pay_bill\" appoint_id=\"',appointment_id,'\" balalnce_amt=\"',(amount - (appointment_received_amount)),'\" style=\"font-size:initial;font-weight:bolder; color:red;\">',(amount - (appointment_received_amount)),'</label>') 

							end AS balance_amt
							
							,(select LEFT(child.appointment_no,2) from appointment as child where child.appointment_id= parent.appointment_visit_detail) as reference
							,case 
								when appointment_status='Cancelled' then ''
								else concat('<a class=\"print_casepaper\" style=\"font-size:initial;font-weight:bolder; color:blue;\"  content_url=\"https://aqdsoft.in/generate-opd-casepaper/',appointment_id,'?action=Print\">Case Paper</a>') 
							end as case_paper
							,case 
								when appointment_status='Cancelled' then ''
								else concat('<a class=\"print_label\" style=\"font-size:initial;font-weight:bolder; color:blue;\"  content_url=\"https://aqdsoft.in/generate-opd-label/',appointment_id,'?action=Print\">Label</a>') 
							end as label
							,case 
								when appointment_status='Cancelled' then concat('<label style=\"font-size:initial;font-weight:bolder; color:red;\">',appointment_status,'</label>')
								when appointment_status='Schedule' then concat('<label style=\"font-size:initial;font-weight:bolder; color:gray;\">',appointment_status,'</label>')
								when appointment_status='Waiting' then concat('<label style=\"font-size:initial;font-weight:bolder; color:darkorange;\">',appointment_status,'</label>')
								when appointment_status='Pending' then concat('<label style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',appointment_status,'</label>')
								when appointment_status='Completed' then concat('<label style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_status,'</label>')
								else concat('<label style=\"font-size:initial;font-weight:bolder; color:black;\">',appointment_status,'</label>')
							end as status
							,case 
								when appointment_pay_status='Paid'  and appointment_status='Cancelled' then concat('<label class=\"refund_request\" status=\"Request\" appointment_id=\"',appointment_id,'\" style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_pay_status,'</label>')
								when appointment_pay_status='Refund Approved'  and appointment_status='Cancelled' then concat('<label class=\"refund_request\" status=\"Paid\" appointment_id=\"',appointment_id,'\" style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_pay_status,'</label>')
								when appointment_pay_status='Paid' then concat('<label style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_pay_status,'</label>')
								when appointment_pay_status='Refund Paid' then concat('<a style=\"font-size:initial;font-weight:bolder; color:darkorange;\" >',appointment_pay_status,'</a>')
								when appointment_pay_status='Refund Rejected' then concat('<a style=\"font-size:initial;font-weight:bolder; color:red;\" >',appointment_pay_status,'</a>')
								when appointment_status='Cancelled' and appointment_pay_status='Unpaid' then ''
								else concat('<a class=\"collect_payment\" style=\"font-size:initial;font-weight:bolder; color:red;\" appoint_id=\"',appointment_id,'\" appoint_charges=\"',appointment_amount,'\">',appointment_pay_status,'</a>')
							end as pay_status
							,case 
								when appointment_status='Waiting' or appointment_status='Schedule' or appointment_status='Pending'
								then concat('<i class=\"fa fa-times cancel_record\" appoint_id=\"',appointment_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-eye payment_receipt\" data_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'\" pdf_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'?action=PDF\" style=\"color:blue;font-size:20px;margin: 0px 10px;\"></i>')
								else concat('<i class=\"fa fa-eye payment_receipt\" data_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'\" pdf_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'?action=PDF\" style=\"color:blue;font-size:20px;margin: 0px 10px;\"></i>')
							end as action
						from appointment as parent
						join patient
							on 	parent.appointment_patient_id=P_id
						left join user
							on parent.appointment_doctor_id=user_id
						join patient_category
							on parent.appointment_patient_category_id=patient_category_id
						join patient_company
							on parent.appointment_patient_company_id=patient_company_id

						LEFT JOIN
			              (SELECT ASA_appointment_id, sum(ASA_service_amount) as amount FROM appointment_services_assign WHERE ASA_status IS NULL or ASA_status='Pending' GROUP BY ASA_appointment_id) as amount_data
			              ON ASA_appointment_id = appointment_id

						where appointment_section_id='3' and date_format(appointment_timestamp,'%Y-%m-%d') between '".$from_date."' and '".$to_date."'
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
							,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
							,concat(P_name_prefix,'. ',P_first_name,' ',P_last_name) as p_name
							,P_mobile_number
							,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
							,patient_category_name as category_name
							,patient_company_name as company_name
							,appointment_amount as amount
							,appointment_status as status
							,'' as  pay_status
							,'' as action
						from appointment
						join patient
							on 	appointment_patient_id=P_id
						left join user
							on appointment_doctor_id=user_id
						join patient_category
							on appointment_patient_category_id=patient_category_id
						join patient_company
							on appointment_patient_company_id=patient_company_id
						where appointment_section_id='3' and date_format(appointment_timestamp,'%Y-%m-%d') between '".$from_date."' and '".$to_date."'
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


	public function diagnosis_appointment_action(){	
		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['patient_id'])) {
				$record_data = array(
					'appointment_patient_id' =>!empty($_POST['patient_id'])?$_POST['patient_id']:'',
					'appointment_timestamp' =>!empty($_POST['appointment_slot'])?str_replace('T',' ',$_POST['appointment_slot']):'',
					'appointment_department_id' =>'0',
					'appointment_doctor_id' =>!empty($_POST['consulting_doctor'])?$_POST['consulting_doctor']:'0',
					'appointment_doctor_contact' =>!empty($_POST['doctor_contact'])?$_POST['doctor_contact']:'0',
					'appointment_status' =>'Schedule',
					'appointment_pay_status' =>'Unpaid',
					'appointment_section_id' =>'3',
					'appointment_type'=>'New',
					'appointment_patient_category_id' =>!empty($_POST['patient_category'])?$_POST['patient_category']:'',
					'appointment_patient_company_id' =>!empty($_POST['patient_company'])?$_POST['patient_company']:'',

					'appointment_employee_id' =>!empty($_POST['employee_id'])?$_POST['employee_id']:'',
					'appointment_employee_name' =>!empty($_POST['employee_name'])?$_POST['employee_name']:'',
					'appointment_employee_relationship' =>!empty($_POST['employee_relationship'])?$_POST['employee_relationship']:'',

					'appointment_insurance_policy_company' =>!empty($_POST['insurance_policy_company'])?$_POST['insurance_policy_company']:'',
					'appointment_insurance_policy_no' =>!empty($_POST['insurance_policy_no'])?$_POST['insurance_policy_no']:'',
					'appointment_health_card_no' =>!empty($_POST['health_card_no'])?$_POST['health_card_no']:'',
					
					'appointment_referance_hospital' =>!empty($_POST['ref_hospital'])?$_POST['ref_hospital']:'',
					'appointment_referance_doctor' =>!empty($_POST['ref_doctor'])?$_POST['ref_doctor']:'',
					'appointment_relative_name' =>!empty($_POST['relative_name'])?$_POST['relative_name']:'',
					'appointment_relative_contact' =>!empty($_POST['relative_contact'])?$_POST['relative_contact']:'',
					'appointment_relative_relationship' =>!empty($_POST['relative_relationship'])?$_POST['relative_relationship']:'',
					'appointment_created_by' =>$user_id,
				);

				$this->db->insert('appointment',$record_data);
				$appointment_id=$this->db->insert_id();
				

				$company_id=$_POST['patient_company'];

				$rate_type=$this->db->query("SELECT 
								rate_type_id as type_id
								from patient_company
								join rate_type on patient_company_rate_type_id=rate_type_id
								where patient_company_id='".$company_id."'")->row_array();

				$rate_type_id = $rate_type['type_id'];
		        $doctor_id=$_POST['consulting_doctor'];
		        $tableData=json_decode($_POST['tableData']);

				$service_list = implode( ",", $tableData );
		        $query="INSERT INTO appointment_services_assign
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
							    ,'' as payment_status
							    ,'' as receipt_id
							FROM
							    services
							LEFT JOIN
							    rate_config ON rate_config_services_id = services_id AND rate_config_rate_type_id = '".$rate_type_id."'
							WHERE
							    services_id IN (".$service_list.")";

				$this->db->query($query);

				$appointment_no='DIAGNO-'.sprintf("%06d", $appointment_id);
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

	public function diagnosis_appointment_form_doctor(){	
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

				
				//$emergency = implode( ",", $tableData );
				
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
							    ,null as clinical_details
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
							    ,'' as payment_status
							    ,'' as receipt_id
							FROM
							    services
							LEFT JOIN
							    rate_config ON rate_config_services_id = services_id AND rate_config_rate_type_id = '".$rate_type_id."'
							WHERE
							    services_id IN (".$service_list.")";

				

				$this->db->query($query1);

				$serviceDetailsArray = json_decode($_POST['serviceDetailsArray'], true);
				if ($serviceDetailsArray !== null) {
					    
				    foreach ($serviceDetailsArray as $sd) {
				    	
				    	//echo $sd['clinicalDetails'];

				    	$this->db->query("UPDATE appointment_services_assign set ASA_emergency ='".$sd['emergency']."',ASA_clinical_details='".$sd['clinicalDetails']."' where ASA_services_id='".$sd['serviceId']."' and ASA_appointment_id='".$appointment_id."'");

						}
				}

				/*
				$appointment_no='DIAGNO-'.sprintf("%06d", $appointment_id);
				$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') then 'Waiting' else 'Schedule' end,appointment_amount=(SELECT sum(ASA_service_amount) as amount FROM appointment_services_assign where ASA_appointment_id='".$appointment_id."'),appointment_no='".$appointment_no."' where	appointment_id='".$appointment_id."'"); */

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


	public function diagnosis_appointment_cancel(){
		$this->session_validate();
		if (!empty($_POST['appoint_id'])) {
			$appoint_id=$_POST['appoint_id'];
			$reason=$_POST['reason'];

			$this->db->query("UPDATE appointment set appointment_status='Cancelled',appointment_cancel_remark='".$reason."' where appointment_id=".$appoint_id);

			$this->db->query("UPDATE appointment_services_assign set ASA_status='Cancelled' where ASA_appointment_id=".$appoint_id);

			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Appointment Cancelled Successfully..!</b>',
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

	public function diagnosis_appointment_receipt(){
		$this->session_validate();
		if (!empty($_POST['appointment_id'])) {

			$receipt_appointment_id=$_POST['appointment_id'];
			$receipt_type=$_POST['payment_mode'];
			$receipt_amount=$_POST['service_charge'];
			$up_service=implode( ",",$_POST['up_service'] );

			$appointment_check=$this->db->query("SELECT * from appointment  where appointment_id=".$receipt_appointment_id)->row_array();
			if(!empty($appointment_check)){
				
				$record_data = array(
					'receipt_appointment_id' =>!empty($_POST['appointment_id'])?$_POST['appointment_id']:'',
					'receipt_type' =>!empty($_POST['payment_mode'])?$_POST['payment_mode']:'',
					'receipt_amount' =>!empty($_POST['service_charge'])?$_POST['service_charge']:'',
					'receipt_cash_amount' =>!empty($_POST['cash_amount'])?$_POST['cash_amount']:'',
					'receipt_bank_amount' =>!empty($_POST['bank_amount'])?$_POST['bank_amount']:'',
					'receipt_transaction_number' =>isset($_POST['transaction_number'])&&!empty($_POST['transaction_number'])?$_POST['transaction_number']:'',
					'receipt_patient_id' =>!empty($appointment_check['appointment_patient_id'])?$appointment_check['appointment_patient_id']:'',
				);
				$result=$this->db->insert('receipt',$record_data);
				$receipt_id=$this->db->insert_id();
				

				$this->db->query("UPDATE appointment set appointment_received_amount=appointment_received_amount+ ".$record_data['receipt_amount'].",appointment_pay_status='Paid' where appointment_id=".$receipt_appointment_id);

					$up_query="
					    UPDATE appointment_services_assign 
					    SET ASA_receipt_id = '".$receipt_id."', ASA_payment_status = 'Paid' 
					    WHERE ASA_id IN (".$up_service.")
					";

					$this->db->query($up_query);

				$data['swall']=array(
					'title'=>'Payment Collection Done',
					'text'=>'<b>Payment Receipt Created Successfully.<br>Receipt No.:'.$receipt_id.'</b>',
					'type'=>'success'
				);
				
			}else{
				$data['swall']=array(
					'title'=>'Invalid Data!',
					'text'=>'<b>Invalid Appointment ID</b>',
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

	public function diagnosis_appointment_detail(){

		$this->session_validate();
		if (!empty($_POST['p_id'])) {
			$p_id=$_POST['p_id'];
			


			$data=$this->db->query("SELECT
							appointment_id as id
							,appointment_no as appointment_no
							,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
							,P_grn as uhid
							,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
							,P_gender as p_gender
							,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
							,P_mobile_number as mobile_number
							,department_name as d_name
							,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
							,patient_category_name as category_name
							,patient_company_name as company_name
							,case when appointment_visit_detail=0  then 'Direct'
								else 'NA' end as visit_detail
							,case 
								when appointment_status='Cancelled' then ''
								else concat('<a class=\"print_casepaper\" style=\"font-size:initial;font-weight:bolder; color:blue;\"  content_url=\"https://aqdsoft.in/generate-opd-casepaper/',appointment_id,'?action=Print\">Case Paper</a>') 
							end as case_paper
							,case 
								when appointment_status='Cancelled' then ''
								else concat('<a class=\"print_label\" style=\"font-size:initial;font-weight:bolder; color:blue;\"  content_url=\"https://aqdsoft.in/generate-opd-label/',appointment_id,'?action=Print\">Label</a>') 
							end as label
							
						from appointment
						left join patient
							on 	appointment_patient_id=P_id
						left join user
							on appointment_doctor_id=user_id
						left join patient_category
							on appointment_patient_category_id=patient_category_id
						left join patient_company
							on appointment_patient_company_id=patient_company_id
						left join appointment_services_assign
						 	on appointment_id=ASA_appointment_id
						left join services 
							on services_id=ASA_services_id
						left join department
							on 	department_id=services_department_id
						where appointment_patient_id='".$p_id."' AND appointment_no LIKE '%DIAGNO%'")->result_array();



		}else{

			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);

		}
		$this->json_output($data);
	}

	public function diagno_appointment_receipt(){
		$this->session_validate();
		if (!empty($_POST['appointment_id'])) {

			$receipt_appointment_id=$_POST['appointment_id'];
			$service_charge=$_POST['service_charge'];
			$up_service=implode( ",",$_POST['up_service'] );

			
			//$payment_amt=$_POST['payment_amt']; 

			

			$appointment_check=$this->db->query("SELECT * from appointment  where appointment_id=".$receipt_appointment_id)->row_array();
			if(!empty($appointment_check)){
				
					$record_data = array(
						'receipt_appointment_id' =>!empty($_POST['appointment_id'])?$_POST['appointment_id']:'',
						'receipt_type' =>!empty($_POST['payment_mode'])?$_POST['payment_mode']:'',
						'receipt_amount' =>!empty($_POST['service_charge'])?$_POST['service_charge']:'',
						'receipt_cash_amount' =>!empty($_POST['cash_amount'])?$_POST['cash_amount']:'',
						'receipt_bank_amount' =>!empty($_POST['bank_amount	'])?$_POST['bank_amount']:'',
						'receipt_transaction_number' =>isset($_POST['transaction_number'])&&!empty($_POST['transaction_number'])?$_POST['transaction_number']:'',
						'receipt_patient_id' =>!empty($appointment_check['appointment_patient_id'])?$appointment_check['appointment_patient_id']:'',
					);
					$result=$this->db->insert('receipt',$record_data);
					$receipt_id=$this->db->insert_id();

					$this->db->query("UPDATE appointment set appointment_received_amount=appointment_received_amount+ ".$record_data['receipt_amount'].",appointment_pay_status='Paid' where appointment_id=".$receipt_appointment_id);

					$up_query="
					    UPDATE appointment_services_assign 
					    SET ASA_receipt_id = '".$receipt_id."', ASA_payment_status = 'Paid' 
					    WHERE ASA_id IN (".$up_service.")
					";

					

					$this->db->query($up_query);

					
					$data['swall']=array(
						'title'=>'Payment Collection Done',
						'text'=>'<b>Paymnet Receipt Created Successfully.<br>Receipt No.:'.$receipt_id.'</b>',
						'type'=>'success'
					);
				
			}else{
				$data['swall']=array(
					'title'=>'Invalid Data!',
					'text'=>'<b>Invalid Appointment ID</b>',
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

	public function diagno_bill_received_amount(){

       $this->session_validate();
      if (!empty($_POST['appoint_id'])) {
        $appoint_id=$_POST['appoint_id'];

        $query="SELECT
                appointment_id
                ,appointment_no
                ,receipt_id
                ,CONCAT(LEFT(appointment_no, 3), 'R-', LPAD(receipt_id, 6, '0')) AS receipt_id
                ,receipt_amount as amount
                ,date_format(receipt_timestamp,'%d-%m-%Y %h:%i %p') as rdate
                ,concat('<i class=\"fa fa-print payment_receipt\" data_url=\"https://aqdsoft.in/ipd-appointment-bill/',receipt_id,'\" pdf_url=\"https://aqdsoft.in/ipd-appointment-bill/',receipt_id,'?action=PDF\" style=\"color:blue;font-size:20px;margin: 0px 10px;\"></i>') as print_bill


                from appointment
                JOIN receipt on appointment_id=receipt_appointment_id
                where appointment_id='".$appoint_id."'";

                
        $data['record']=$this->db->query($query)->result_array();

        $this->json_output($data);

      }
    

    }
}

?>