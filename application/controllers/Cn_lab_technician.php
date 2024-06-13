<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_lab_technician extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();

		$count['Schedule']=$this->db->query("SELECT count(*) as scount from appointment_services_assign where ASA_status='Schedule'")->row_array();
		$count['Pending']=$this->db->query("SELECT count(*) as pcount from appointment_services_assign where ASA_status='Pending'")->row_array();
		$count['Sample_Collected']=$this->db->query("SELECT count(*) as sccount from appointment_services_assign where ASA_status='Sample_Collected'")->row_array();

		$count['Sample_Received']=$this->db->query("SELECT count(*) as srcount from appointment_services_assign where ASA_status='Sample_Received'")->row_array();

		$count['In_Process']=$this->db->query("SELECT count(*) as ipcount from appointment_services_assign where ASA_status='Inprocess'")->row_array();
		$count['Rejected']=$this->db->query("SELECT count(*) as rcount from appointment_services_assign where ASA_status='Rejected'")->row_array();
		$count['Waiting_for_Approval']=$this->db->query("SELECT count(*) as wacount from appointment_services_assign where ASA_status='Waiting_for_Approval'")->row_array();
		$count['Completed']=$this->db->query("SELECT count(*) as ccount from appointment_services_assign where ASA_status='Completed'")->row_array();
		$count['Dispatched']=$this->db->query("SELECT count(*) as dcount from appointment_services_assign where ASA_status='Dispatched'")->row_array();
		
		$this->load->view('vw_lab_technician_appointment',$count);
	}

	public function lab_technician_appointment_list(){
		$this->session_validate();
		$active_tab=!empty($this->input->post('active_tab'))?$this->input->post('active_tab'):$this->input->post('active_tab');

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
								or age like '%".$searchValue."%'
								or p_gender like '%".$searchValue."%'
								or doctor_name like '%".$searchValue."%'
								or P_mobile_number like '%".$searchValue."%'
								or services_name like '%".$searchValue."%')";
		}

		
		switch ($active_tab) {

			case 'schedule':
				$searchQuery.=" and ASA_status='Schedule'";
			break;
			case 'pending':
					$searchQuery.=" and ASA_status='Pending'";
			break;
			case 'sample_collected':
					$searchQuery.=" and ASA_status='Sample_Collected'";
			break;
			case 'sample_received':
					$searchQuery.=" and ASA_status='Sample_Received'";
			break;
			case 'in_process':
					$searchQuery.=" and ASA_status='Inprocess'";
			break;
			case 'rejected':
					$searchQuery.=" and ASA_status='Rejected'";
			break;
			case 'waiting_for_approval':
					$searchQuery.=" and ASA_status='Waiting_for_approval'";
			break;
			case 'completed':
					$searchQuery.=" and ASA_status='Completed'";
			break;
			case 'dispatched':
					$searchQuery.=" and ASA_status='Dispatched'";
			break;
		} 




		$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') then 'Waiting' else appointment_status end where appointment_status='Schedule'");

		$this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')<date_format(now(),'%Y-%m-%d') then 'Pending' else appointment_status end where appointment_status in ('Waiting','Schedule')");
		$role_array=$this->session->userdata('role');

		if (in_array("1", $role_array)){
			$technician='True';
			$approver='True';
		}else{
			$technician='False';
			$approver='False';
		}

		if (in_array("8", $role_array)||in_array("9", $role_array)){
			$approver='True';
		}

		if (in_array("7", $role_array)){
			$technician='True';
		}
		
		$result_query="	SELECT
				@sr_no:=@sr_no+1 sr_no, 
				result_data.*
			from (
				SELECT 
						ASA_id
						,appointment_no as appointment_no
						,appointment_id as appointment_id 
						,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
						,P_id as pid
						,P_grn as uhid
						,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
						,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
						,P_gender as p_gender
						,concat('Dr.',appoint.user_first_name,' ',appoint.user_middle_name,' ',appoint.user_last_name) as doctor_name
						,P_mobile_number
						,services_id
						,services_name
						,ASA_emergency
						,Case when ASA_emergency='Yes' then 'Yes' else 'No' end as estatus
						,Case when ASA_clinical_details is null then 'NA' else ASA_clinical_details end as clinical_details
						,services_tat as service_tat
						,date_format(ASA_uploaded_timestamp,'%d-%m-%Y %h:%i %p') as uploaded_date_time
						,ASA_uploaded_user_id
						,(select LEFT(child.appointment_no,2) from appointment as child where child.appointment_id= appointment_visit_detail) as location
						,case
							when (ASA_uploaded_user_id !='0') then concat('Dr.',uploaded_b.user_first_name,' ',uploaded_b.user_middle_name,' ',uploaded_b.user_last_name) 
							else
								'-'
							end as uploaded_by
						,date_format(ASA_approved_timestamp,'%d-%m-%Y %h:%i %p') as approved_date_time
						,ASA_approved_user_id
						,case 
							when (ASA_approved_user_id !='0') then concat('Dr.',approved_b.user_first_name,' ',approved_b.user_middle_name,' ',approved_b.user_last_name) 
							else
								'-'
							end as approved_by

						,TIMESTAMPDIFF(MINUTE, ASA_uploaded_timestamp, ASA_approved_timestamp) AS minutes_difference
						,'' as refferal
						,ASA_status
						,case
							when (ASA_status='Inprocess' or ASA_status='Rejected') and services_input_method='DATA' and '".$technician."'='True' then  
								concat('<label class=\"add_test_value\" appointment_id=\"',appointment_id,'\" services_id=\"',services_id,'\" style=\"font-size:initial;font-weight:bolder; color:#0b8b27;\">Upload Data</label>') 
							when (ASA_status='Inprocess' or ASA_status='Rejected') and services_input_method='FILE' and '".$technician."'='True' then  
								concat('<a class=\"upload_file\" style=\"font-size:initial;font-weight:bolder; color:Blue;\" ASA_id=\"',ASA_id,'\" appointment_id=\"',appointment_id,'\" >Upload File</a>')
							else ''
						end as data
						,case
							when (ASA_status='Rejected' or ASA_status='Completed' or ASA_status='Waiting_for_approval') and ('".$approver."'='True' or '".$technician."'='True') and services_input_method ='DATA'
								then concat('<label class=\"generate_report\" style=\"font-size:initial;font-weight:bolder; color:black;\"  appointment_id=\"',appointment_id,'\"  data_url=\"https://aqdsoft.in/generate-lis-report/',ASA_id,'\" file_data=\"\" pdf_url=\"https://synergy.autoqed.com/hospitals/generate-lis-report/',ASA_id,'?action=PDF\">View Report</label>')
							when (ASA_status='Rejected' or ASA_status='Completed' or ASA_status='Waiting_for_approval') and ('".$approver."'='True' or '".$technician."'='True') and services_input_method ='FILE'
								then concat('<label class=\"generate_report\" style=\"font-size:initial;font-weight:bolder; color:black;\"  appointment_id=\"',appointment_id,'\" file_data=\"',ASA_service_report,'\">View Report</label>') 
							else ''
						end as generate_report 

						,case 
							when ASA_status='Schedule' or ASA_status='Pending' or ASA_status='Cancelled' then ''
								else concat('<a class=\"print_barcode\" style=\"font-size:initial;font-weight:bolder; color:blue;\"  content_url=\"https://aqdsoft.in/generate-diagno-barcode/',ASA_id,'?action=Print\">Barcode</a>') 
							end as barcode


						,case 
							when ASA_status='Cancelled' then concat('<label style=\"font-size:initial;font-weight:bolder; color:red;\">',appointment_status,'</label>')
							when ASA_status='Schedule' then concat('<label style=\"font-size:initial;font-weight:bolder; color:gray;\">',appointment_status,'</label>')
							when ASA_status='Pending' and '".$technician."'='True' then concat('<label class=\"change_state\" ASA_id=\"',ASA_id,'\" ASA_status=\"',ASA_status,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',ASA_status,'</label>')
							when ASA_status='Sample_Collected' and '".$technician."'='True' then concat('<label class=\"change_state\" ASA_status=\"',ASA_status,'\" ASA_id=\"',ASA_id,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',ASA_status,'</label>')
							when ASA_status='Sample_Received' and '".$technician."'='True' then concat('<label class=\"change_state\" ASA_status=\"',ASA_status,'\" ASA_id=\"',ASA_id,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',ASA_status,'</label>')
							when ASA_status='Inprocess' and '".$technician."'='True' then concat('<label class=\"change_state\" ASA_status=\"',ASA_status,'\" ASA_id=\"',ASA_id,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',ASA_status,'</label>')
							when ASA_status='Rejected' and '".$technician."'='True' then concat('<label class=\"change_state\" ASA_status=\"',ASA_status,'\" ASA_id=\"',ASA_id,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',ASA_status,'</label>')
							when ASA_status='Waiting_for_approval' and '".$approver."'='True' then concat('<label class=\"report_approval\" ASA_status=\"',ASA_status,'\" ASA_id=\"',ASA_id,'\" style=\"font-size:initial;font-weight:bolder; color:darkyellow;\">',ASA_status,'</label>')

							when ASA_status='Completed' and '".$technician."'='True' then concat('<label class=\"change_state\" ASA_status=\"',ASA_status,'\" ASA_id=\"',ASA_id,'\" style=\"font-size:initial;font-weight:bolder; color:green;\">',ASA_status,'</label>')

							else concat('<label style=\"font-size:initial;font-weight:bolder; color:black;\">',ASA_status,'</label>')
						end as status
					from appointment_services_assign
					join appointment on ASA_appointment_id=appointment_id
					join patient on P_id=appointment_patient_id
					join user as appoint on appoint.user_id=appointment_doctor_id
					left join user as uploaded_b on uploaded_b.user_id=ASA_uploaded_user_id
					left join user as approved_b on approved_b.user_id=ASA_approved_user_id
					join services on services_id=ASA_services_id
					where  ASA_status!='Cancelled' 
					and ASA_services_id in (
												SELECT 
													services_id 
												FROM services 
												where services_department_id in (select 
																						department_id 
																					from department 
																					where department_section like '%Diagnostics%')	
											group by 1)
					and (appointment_section_id='2' or (appointment_section_id in ('1','3','5') and  ASA_payment_status='Paid'))
					and date_format(appointment_timestamp,'%Y-%m-%d') between '".$from_date."' and '".$to_date."') result_data,(SELECT @sr_no:= 0) AS a
			where appointment_no!=''
			".$searchQuery."
					order by uhid desc
					LIMIT ".$length." OFFSET ".$start;


		
		$result_data = $this->db->query($result_query)->result_array();
		
		$result_count_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
								ASA_id
								,appointment_no as appointment_no 
								,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
								,concat(P_name_prefix,'. ',P_first_name,' ',P_last_name) as p_name
								,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
								,P_gender as p_gender
								,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
								,P_mobile_number
								,services_name
								,'' as  status
								,'' as report_file
								,ASA_status
							FROM appointment_services_assign 
							join appointment
								on ASA_appointment_id=appointment_id
							join patient on P_id=appointment_patient_id
							join user on user_id=appointment_doctor_id
							join services on services_id=ASA_services_id
							where  ASA_status!='Cancelled' and ASA_services_id in (
														SELECT 
															services_id 
														FROM services 
														where services_department_id in (
																							select 
																								department_id 
																							from department 
																							where department_section like '%Diagnostics%' 
																						) 
													group by 1)
							and (appointment_section_id='2' or (appointment_section_id in ('1','3','5') and  ASA_payment_status='Paid'))
							 and date_format(appointment_timestamp,'%Y-%m-%d') between '".$from_date."' and '".$to_date."'
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

	
	public function test_value_action(){

		$this->session_validate();
		if (!empty($_POST)) {

			$appointment_id=!empty($_POST['appointment_id'])?$_POST['appointment_id']:'0';
			$service_id=!empty($_POST['service_id'])?$_POST['service_id']:'0';
			
			if(!empty($service_id)){
				$parameter_data=$this->db->query("SELECT * from test_parameter where TP_service_name='".$service_id."'")->result_array();
				if(!empty($parameter_data)){
					for($i=0;$i<count($parameter_data);$i++){
						$check_data=$this->db->query("SELECT * from test_report where TR_appointment_id='".$appointment_id."' and TR_service_id='".$service_id."' and TR_TP_id='".$parameter_data[$i]['TP_id']."'")->result_array();
						$record_data = array(
							'TR_appointment_id' =>$appointment_id,
							'TR_service_id' =>$service_id,
							'TR_TP_id' =>$parameter_data[$i]['TP_id'],
							'TR_value' =>!empty($_POST[$parameter_data[$i]['TP_id']])?$_POST[$parameter_data[$i]['TP_id']]:'',
						);
						if(empty($check_data)){
							$this->db->insert('test_report',$record_data);
							$id=$this->db->insert_id();
						
						}else{
							$this->db->where('TR_id',$check_data[0]['TR_id']);
							$this->db->update('test_report',$record_data);

							$this->db->query("
											    UPDATE appointment_services_assign
											    SET ASA_status = 'Waiting_for_approval'
											    WHERE  ASA_appointment_id = '".$appointment_id."'
											        AND ASA_services_id = '".$service_id."'
											       
											");
						}
					}
					$data['status']=true;
						$data['swall']=array(
							'title'=>'Record Added!',
							'text'=>'<b>Test Value Added Successfully..!</b>',
							'type'=>'success'
						);

				}else{
					$data['swall']=array(
						'title'=>'Oops!',
						'text'=>'<b>Something Went Wrong..!</b>',
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
		
		}else{
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);

	}

	public function upload_report_action(){

		$this->session_validate();
		if (!empty($_POST)) {

			$ASA_id=!empty($_POST['ASA_id'])?$_POST['ASA_id']:'0';
			


			if(!empty($ASA_id)){

				if(!empty($_FILES['report_file']['name']))
				{
					$image='report_file';
					$path='uploads/report';
					$type='pdf';
					$new_name='Test_Report-'.date('YmdHis');
					$error_msg='Something went wrong!';
					$report_url=base_url().$path.'/'.$this->My_Model->uploadFile($path, $type, $image, $error_msg, $new_name);
				}
				else
				{
					$report_url=$_POST['report_url'];		
				}
				$check=$this->db->query("SELECT ASA_service_report from appointment_services_assign where ASA_id='".$ASA_id."'");

				if(empty($check)){

						$query="UPDATE appointment_services_assign 
						set ASA_service_report='".$report_url."' where ASA_id='".$ASA_id."'";
						$this->db->query($query);
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Report Added!',
							'text'=>'<b>Report Uploaded Successfully..!</b>',
							'type'=>'success'
						);
				}else{
					$query="UPDATE appointment_services_assign 
						set ASA_service_report='".$report_url."' where ASA_id='".$ASA_id."'";
						$this->db->query($query);
						$this->db->query(" UPDATE appointment_services_assign
									    SET ASA_status = 'Waiting_for_approval' WHERE ASA_id = '".$ASA_id."'");
									    
											
						$data['status']=true;
						$data['swall']=array(
							'title'=>'Report Added!',
							'text'=>'<b>Report Updated Successfully..!</b>',
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
			
		}else{
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);

	}

	public function generate_lis_report()
	{

		$this->session_validate();
		$id=$this->uri->segment(2);
		$action=$this->input->get('action');

		$record=$this->db->query("SELECT ASA_appointment_id,ASA_services_id from appointment_services_assign
										where ASA_id='".$id."'")->row_array();

		$appointment_id=$record['ASA_appointment_id'];
		$service_id=$record['ASA_services_id'];


		$query="SELECT      
						
						appointment_no
						,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_timestamp
						,concat(P_name_prefix,'.',P_first_name,' ',P_middle_name,' ',P_last_name) as patient_name
						,concat(SUBSTRING_INDEX(calculate_age(P_dob),'-',1),' years') as patient_age
						,patient_category_name as category_name
						,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
						,patient_company_name as company_name
						,P_grn as uhid
						,P_gender as gender
						,receipt_type as payment_mode
						,date_format(receipt_timestamp,'%d-%m-%Y %h:%i %p') as receipt_timestamp
						,receipt_transaction_number	as transaction_number
						,receipt_amount as bill_amount
						,appointment_id
						from appointment
						left join receipt
							on receipt_appointment_id=appointment_id
						join user
							on appointment_doctor_id= user_id
						join patient
							on appointment_patient_id=P_id
						join patient_company
							on appointment_patient_company_id =patient_company_id  
						join patient_category
							on patient_company_patient_category_id=patient_category_id	
						where appointment_id='".$appointment_id."'";
						$data['record']=$this->db->query($query)->row_array();



						$data['test_value']=$this->db->query("	SELECT 
														TP_id as id
														,TP_name as name
														,TR_value as value
														,TP_unit as unit
														,TP_service_name
                                                        ,services_name as service_name
														,case when PR_min_value is NOT NULL then concat(PR_min_value,' - ',PR_max_value) else 'NA' end as data_range
														,case when PR_critical_min_value is NOT NULL then concat(PR_critical_min_value,' - ',PR_critical_max_value) else 'NA' end as critical_range
												FROM  test_parameter
												join (SELECT SUBSTRING_INDEX(calculate_age(patient.P_dob),'-',1) as P_age,P_gender FROM appointment join patient on appointment_patient_id=P_id where appointment_id='".$appointment_id."') as range_data
												left join test_report on TP_id=TR_TP_id and TR_appointment_id='".$appointment_id."'
												left join parameter_range
												on P_gender=PR_gender
												and P_age between PR_min_age and PR_max_age
												and PR_TP_id=TP_id
												JOIN services on TP_service_name=services_id
												where TP_service_name='".$service_id."'")->result_array();



						$data['print']='False';
						if($action=='PDF'){
							$file_name=$id.'='.date('Ymdhis').'.pdf';
							$pdfFilePath = '/home/autoqed/public_html/hospital/uploads/report/'.$file_name;
							shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/generate-lis-report/'.$id.'?action=View" '.$pdfFilePath); 
							$responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/report/'.$file_name);
							$this->json_output($responce);
						}else{
							if($action=='Print'){
								$data['print']='True';
							}
							$this->load->view('vw_lis_report',$data);
						}
	}


	public function change_appointment_status()
	{
		$this->session_validate();
		$user_id=$_SESSION['id'];

		
		if (!empty($_POST)) 
		{
			

			$ASA_id=$_POST['ASA_id'];
			$ASA_status=$_POST['ASA_status'];

			
		

			switch($ASA_status){

				case 'Pending':
			
					$this->db->query("UPDATE appointment  join appointment_services_assign on appointment_id=ASA_appointment_id and ASA_id='".$ASA_id."' set appointment_status='Inprocess'");
					$this->db->query("UPDATE appointment_services_assign set ASA_status='Sample_Collected' where ASA_id='".$ASA_id."'");
				break;
				case 'Sample_Collected':
			
					$this->db->query("UPDATE appointment  join appointment_services_assign on appointment_id=ASA_appointment_id and ASA_id='".$ASA_id."' set appointment_status='Inprocess'");
					$this->db->query("UPDATE appointment_services_assign set ASA_status='Sample_Received',ASA_uploaded_timestamp=CURRENT_TIMESTAMP,ASA_uploaded_user_id='".$user_id."' where ASA_id='".$ASA_id."'");
				break;

				case 'Sample_Received':

					$this->db->query("UPDATE appointment  join appointment_services_assign on appointment_id=ASA_appointment_id and ASA_id='".$ASA_id."' set appointment_status='Inprocess'");
					$this->db->query("UPDATE appointment_services_assign set ASA_status='Inprocess',ASA_uploaded_timestamp=CURRENT_TIMESTAMP,ASA_uploaded_user_id='".$user_id."' where ASA_id='".$ASA_id."'");
				break;

				case 'Inprocess':
			
					$this->db->query("UPDATE appointment  join appointment_services_assign on appointment_id=ASA_appointment_id and ASA_id='".$ASA_id."' set appointment_status='Inprocess'");
					$this->db->query("UPDATE appointment_services_assign set ASA_status='Waiting_for_approval' where ASA_id='".$ASA_id."'");
				break;

				case 'Waiting_for_approval':
					
					$reason=!empty($_POST['reason'])?$_POST['reason']:'';
					$appointment_status=!empty($_POST['appointment_status'])?$_POST['appointment_status']:'';
					$this->db->query("UPDATE appointment  join appointment_services_assign on appointment_id=ASA_appointment_id and ASA_id='".$ASA_id."' set appointment_status='Inprocess'");

					if($appointment_status=="Approved"){

					  $this->db->query("UPDATE appointment_services_assign set ASA_status='Completed',ASA_approved_timestamp	=CURRENT_TIMESTAMP,ASA_approved_user_id='".$user_id."' where ASA_id='".$ASA_id."'");
					}else{

						$this->db->query("UPDATE appointment_services_assign set ASA_status='Rejected',ASA_rejected_reason='".$reason."' where ASA_id='".$ASA_id."'");

					}

					  $result=$this->db->query("SELECT ASA_appointment_id from appointment_services_assign where ASA_id='".$ASA_id."'")->row_array();
					  $appointment_id=$result['ASA_appointment_id'];

					  $result1=$this->db->query("SELECT * from appointment_services_assign where ASA_status='Completed' or ASA_status='Dispatched' and ASA_appointment_id='". $appointment_id."'")->result_array();
					  if($result1){

					  	$this->db->query("UPDATE appointment  join appointment_services_assign on appointment_id=ASA_appointment_id and ASA_id='".$ASA_id."' set appointment_status='Completed'");

					  }

					
				break;

				case 'Completed':

					$this->db->query("UPDATE appointment_services_assign set ASA_status='Dispatched' where ASA_id='".$ASA_id."'");
				break;

			}
			$data['swall']=array(
					'title'=>'Done!',
					'text'=>'<b>Status Has been Updated..!</b>',
					'type'=>'success',
				);
			$this->json_output($data);

			
		}

	}

	public function lis_appointment_detail(){

		$this->session_validate();
		if (!empty($_POST['p_id'])) {
			$p_id=$_POST['p_id'];

			$data=$this->db->query("SELECT
							appointment_id as id
							,appointment_no as appointment_no
							,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
							,P_grn as uhid
							,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
							,P_mobile_number as mobile_number
							,concat('Dr.',appoint.user_first_name,' ',appoint.user_middle_name,' ',appoint.user_last_name) as doctor_name
							,services_name as service_name
							,services_tat as service_tat
							,TIMESTAMPDIFF(MINUTE, ASA_uploaded_timestamp, ASA_approved_timestamp) AS required_difference
							,ASA_uploaded_user_id as uploaded_by
							,ASA_uploaded_timestamp as uploaded_timestamp
							,ASA_approved_user_id as approved_by
							,ASA_approved_timestamp	 as approved_timestamp
							,ASA_status	 as status
							,concat('<label class=\"generate_report\" style=\"font-size:initial;font-weight:bolder; color:blue;\"  appointment_id=\"',appointment_id,'\"  data_url=\"https://aqdsoft.in/generate-lis-report/',ASA_id,'\" file_data=\"\" pdf_url=\"https://synergy.autoqed.com/hospitals/generate-lis-report/',ASA_id,'?action=PDF\">View Report</label>')
							 as generate_report 
							,concat('Dr.',uploaded_b.user_first_name,' ',uploaded_b.user_middle_name,' ',uploaded_b.user_last_name) as uploaded_by
							,concat('Dr.',approved_b.user_first_name,' ',approved_b.user_middle_name,' ',approved_b.user_last_name) as approved_by
						
						from appointment
						left join patient
							on 	appointment_patient_id=P_id
						left join user as appoint on appoint.user_id=appointment_doctor_id
						join appointment_services_assign 
							on appointment_id=	ASA_appointment_id
						join user as uploaded_b on uploaded_b.user_id=ASA_uploaded_user_id
						join user as approved_b on approved_b.user_id=ASA_approved_user_id
                        join services
							on services_id=	ASA_services_id
						where appointment_patient_id='".$p_id."' and appointment_pay_status='Paid' and ASA_status='Completed'")->result_array();

		}else{

			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);

		}
		
		$this->json_output($data);



	}

	function generate_diagno_barcode()
	{

		
		$id=$this->uri->segment(2);
		$action=$this->input->get('action');


		$query="SELECT      
						ASA_id
						,concat(appointment_no,'-',ASA_id) as barcode
						,services_name as service_name
						,case when services_sample_type ='0' or services_sample_type is null then 'NA'
							else services_sample_type end as sample_type
						,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
						,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
						,P_gender as p_gender
						,appointment_visit_detail as reference
						,(select LEFT(child.appointment_no,2) from appointment as child where child.appointment_id= parent.appointment_visit_detail) as ref
						
						from appointment_services_assign
						join appointment as parent
							on parent.appointment_id=ASA_appointment_id
						join services
							on services_id=	ASA_services_id
						left join patient
							on 	appointment_patient_id=P_id
						where ASA_id='".$id."'";
		$data['record']=$this->db->query($query)->row_array();

		$barcodeString = $data['record']['barcode'];

		

			$data['print']='False';
						if($action=='PDF'){
							$file_name=$id.'='.date('Ymdhis').'.pdf';
							$pdfFilePath = '/home/autoqed/public_html/hospital/uploads/label/'.$file_name;
							shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/generate-diagno-barcode/'.$id.'?action=View" '.$pdfFilePath); 
							$responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/label/'.$file_name);
							$this->json_output($responce);
						}else{
							if($action=='Print'){
								$data['print']='True';
							}


							
							$this->load->view('vw_barcode',$data);
						}

	}
}

?>