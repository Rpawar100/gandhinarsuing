<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_pathologist extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_pathologist');
	}

	public function pathologist_appointment_list(){
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
								or age like '%".$searchValue."%'
								or p_gender like '%".$searchValue."%'
								or doctor_name like '%".$searchValue."%'
								or P_mobile_number like '%".$searchValue."%'
								or services_name like '%".$searchValue."%')";
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
						,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
						,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
						,P_gender as p_gender
						,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
						,P_mobile_number
						,services_id
						
						,services_name
						
					
					,case 
						when (ASA_status='Waiting_for_approval' or ASA_status='Rejected' or ASA_status='Completed') then concat('<label class=\"generate_report\" style=\"font-size:initial;font-weight:bolder; color:black;\"  appointment_id=\"',appointment_id,'\" ASA_id=\"',ASA_id,'\" ASA_status=\"',ASA_status,'\"  data_url=\"https://aqdsoft.in/generate-lis-report/',ASA_id,'\" pdf_url=\"https://aqdsoft.in/generate-lis-report/',ASA_id,'?action=PDF\" >View Report</label>')
						else ''
					end as generate_report

					,case 
							when (ASA_status='Rejected' or ASA_status='Completed') then concat('<label class=\"generate_report\" style=\"font-size:initial;font-weight:bolder; color:black;\"  appointment_id=\"',appointment_id,'\" ASA_id=\"',ASA_id,'\" ASA_status=\"',ASA_status,'\"  data_url=\"https://aqdsoft.in/generate-lis-report/',ASA_id,'\" pdf_url=\"https://aqdsoft.in/generate-lis-report/',ASA_id,'?action=PDF\" >View Report</label>')
							else ''
						end as 

					FROM appointment
					join appointment_services_assign 
						on ASA_appointment_id=appointment_id
					join patient on P_id=appointment_patient_id
					join user on user_id=appointment_doctor_id
					join services on services_id=ASA_services_id
					where  appointment_status!='Cancelled' and ASA_services_id in (
												SELECT 
													services_id 
												FROM services 
												where services_department_id in (select 
																						department_id 
																					from department 
																					where department_section like '%Diagnostics%')	
											group by 1)
					and appointment_pay_status='Paid'
					and appointment_section_id='3' and date_format(appointment_timestamp,'%Y-%m-%d') between '".$from_date."' and '".$to_date."') result_data,(SELECT @sr_no:= 0) AS a
			where appointment_no!=''
			";

		
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
							FROM appointment
							join appointment_services_assign 
								on ASA_appointment_id=appointment_id
							join patient on P_id=appointment_patient_id
							join user on user_id=appointment_doctor_id
							join services on services_id=ASA_services_id
							where  appointment_status!='Cancelled' and ASA_services_id in (
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
							and appointment_pay_status='Paid'
							and appointment_section_id='1' and date_format(appointment_timestamp,'%Y-%m-%d') between '".$from_date."' and '".$to_date."'
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

	
	
	

}

?>