<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_OT_registration extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_OT_registration');
	}

	public function booked_ot_list(){
		$this->session_validate();

		$rid=$_POST['opd_id'];
		//$rid=!empty($this->input->post('opd_id'))?$this->input->post('opd_id'):$this->input->post('opd_id');

		
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

		if($rid){
			$searchQuery.= " AND ot_appointment_id='".$rid."'";

		}



		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							ot_id as id
							,ot_appointment_id
							,ot_operation_name as name
							,ot_operation_type as operation_type
							,ot_primary_surgent as primary_surgent
							,date_format(ot_schedule_date,'%d-%m-%Y %h:%i %p') as schedule_date
							,ot_schedule_start_time as from_time
							,ot_schedule_end_time as to_time
							,P_grn as uhid
							,room_name
							,concat('<i class=\"fa fa-edit edit_record\" ot_id=\"',ot_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" ot_id=\"',ot_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from operation_theater
						left join patient on ot_patient_id=P_id 
						join room_master on ot_room_id=room_id
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
    


    public function ot_list_bymonth(){
    	$this->session_validate();

    	$query="SELECT 
							ot_id as id
							,ot_operation_name as name
							,date_format(ot_schedule_date,'%d-%m-%Y') as schedule_date
							,ot_schedule_start_time as from_time
							,ot_schedule_end_time as to_time
							,P_grn as uhid
							,room_name
						from operation_theater
						join patient on ot_patient_id=P_id
						left join room_master on ot_room_id=room_id";

			$data['record']=$this->db->query($query)->result_array();	
			$this->json_output($data);	


    }

	public function check_OT_booking(){
		 $this->session_validate();
		 if(!empty($_POST)){
		 	
		 	$booking_date=$_POST['booking_date'];
		 	$by_ot_room='';


		 	if(!empty($_POST['OT_room'])){
		 		$OT_room=$_POST['OT_room'];

		 		$by_ot_room="and ot_room_id='".$OT_room."'";

		 	}
		 	

		 	$query="SELECT operation_theater.*
		 									,P_id
		 									,P_grn as uhid
		 									,concat(P_name_prefix,' ',P_first_name,' ',P_middle_name,' ',P_last_name) as patient_name
		 									,room_name as room_no
		 									,ot_schedule_date as booked_date
		 									,ot_schedule_start_time as booked_from_time
		 									,ot_schedule_end_time as booked_to_time
		 									,room_id
		 									 FROM operation_theater 
		 									 join patient on ot_patient_id=P_id
		 									 join room_master on ot_room_id=room_id
		 									 where ot_schedule_date ='".$booking_date."'".$by_ot_room;
			$data['record']=$this->db->query($query)->result_array();		
			$this->json_output($data);
		 }
	}

	public function check_OT_by_time(){

		 $this->session_validate();
		 if(!empty($_POST)){
		 	
		 	$ot_room=$_POST['ot_room'];
		 	$ot_date=$_POST['ot_date'];
		 	
		 	$from_time=$_POST['from_time'];
		 	$to_time=$_POST['to_time'];

		 
		 	

		 	$query="SELECT * from operation_theater where ot_room_id ='".$ot_room."' and ot_schedule_date ='".$ot_date."' and '".$from_time."'  BETWEEN 	ot_schedule_start_time and ot_schedule_end_time";
		 	$data=$this->db->query($query)->result_array();
			 	if($data){


			 		 $data['swall']=array(
					 'title'=>'Oops!',
					 'text'=>'<b>Operation Theatre Already Booked in this slot ..!</b>',
					 'type'=>'warning'
					 );

		 		}else{
		 			 $data['swall']=array(
					 'type'=>'',
					 'from_time'=>$from_time,
					 'to_time'=>$to_time,

					 );


		 		}

		 	$this->json_output($data);


		 }
		 	

	}

	public function OT_book_action(){	
		$this->session_validate();
		if (!empty($_POST)) {

			$r_id=$_POST['ot_room'];
			$pid=$this->db->query("SELECT appointment_patient_id as id from appointment where appointment_id='".$r_id."'")->row_array();
			$patient_id=$pid['id'];


			$record_data = array(
				'ot_room_id' =>!empty($_POST['ot_room'])?$_POST['ot_room']:'',
				'ot_appointment_id' =>!empty($_POST['opd_id'])?$_POST['opd_id']:'',
				'ot_patient_id' =>$patient_id,
				'ot_operation_name' =>!empty($_POST['surgery_name'])?$_POST['surgery_name']:'',
				'ot_primary_surgent' =>!empty($_POST['primary_surgeon'])?$_POST['primary_surgeon']:'',
				'ot_secondary_surgent' =>!empty($_POST['secondary_surgeon'])?$_POST['secondary_surgeon']:'',
				'ot_nurse' =>!empty($_POST['primary_nurse'])?$_POST['primary_nurse']:'',
				'ot_scrub_nurse' =>!empty($_POST['scrub_nurse'])?$_POST['scrub_nurse']:'',
				'ot_equipment' =>!empty($_POST['equipment'])?$_POST['equipment']:'',
				'ot_operation_type' =>!empty($_POST['operation_type'])?$_POST['operation_type']:'',
				'ot_anethesia_status' =>!empty($_POST['anesthesia_status'])?$_POST['anesthesia_status']:'',
				'ot_anesthesia' =>!empty($_POST['anesthetist'])?$_POST['anesthetist']:'',
				'ot_anesthesia_type' =>!empty($_POST['anesthesia_type'])?$_POST['anesthesia_type']:'',
				'ot_on_call_doctor' =>!empty($_POST['On_call_doctor'])?$_POST['On_call_doctor']:'',
				'ot_remark' =>!empty($_POST['remark'])?$_POST['remark']:'',
				'ot_diagnosis' =>!empty($_POST['diagnosis'])?$_POST['diagnosis']:'',

				'ot_schedule_date' =>!empty($_POST['schedule_date'])?$_POST['schedule_date']:'',
				'ot_schedule_start_time' =>!empty($_POST['schedule_start_time'])?$_POST['schedule_start_time']:'',
				'ot_schedule_end_time' =>!empty($_POST['schedule_end_time'])?$_POST['schedule_end_time']:'',

				'ot_patient_in_timestamp' =>!empty($_POST['patient_in_timestamp'])?$_POST['patient_in_timestamp']:'',
				'ot_patient_antibiotic_timestamp' =>!empty($_POST['antibiotic_timestamp'])?$_POST['antibiotic_timestamp']:'',
				'ot_incision_timestmap' =>!empty($_POST['incision_timestamp'])?$_POST['incision_timestamp']:'',
				'ot_antibiotic_used' =>!empty($_POST['antibiotic_used'])?$_POST['antibiotic_used']:'',
				'ot_patient_out_timestamp' =>!empty($_POST['patient_out_timestamp'])?$_POST['patient_out_timestamp']:'',
				'ot_cleaning_start_timestamp' =>!empty($_POST['cleaning_start_timestamp'])?$_POST['cleaning_start_timestamp']:'',
				'ot_cleaning_end_timestamp' =>!empty($_POST['cleaning_end_timestamp'])?$_POST['cleaning_end_timestamp']:'',
				'ot_implant_used' =>!empty($_POST['implant_used'])?$_POST['implant_used']:'',
				'ot_implant_type' =>!empty($_POST['implant_type'])?$_POST['implant_type']:'',

			);

			if (!empty($_POST['ot_id'])) {
				 $record_check=$this->db->query("SELECT * FROM operation_theater where ot_id ='".$_POST['ot_id']."'")->result_array();
				 if(!empty($record_check)){
				 	
				 	
				 		$this->db->where('ot_id',$_POST['ot_id']);
				 		$this->db->update('operation_theater',$record_data);
				 		$data['status']=true;
				 		$data['swall']=array(
				 			'title'=>'Record Updated!',
				 			'text'=>'<b>Surgery Updated Successfully..!</b>',
				 			'type'=>'success'
				 		);
				 }else{
				 	$data['swall']=array(
				 		'title'=>'Missing Entry',
				 		'text'=>'<b>Record Entry Is Not Available.</b>',
				 		'type'=>'warning'
				 	);
				 }
			}else{
				
				$this->db->insert('operation_theater',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>Surgery Added Successfully..!</b>',
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

	public function ot_delete(){

		$this->session_validate();
		if (!empty($_POST['ot_id'])) {
			$ot_id=$_POST['ot_id'];

			$this->db->query("DELETE from operation_theater where ot_id=".$ot_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>OT Deleted Successfully..!</b>',
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

	public function ot_by_id(){
		$this->session_validate();
		if(!empty($_POST['ot_id'])){
			$ot_id=$_POST['ot_id'];

			$query="SELECT * from operation_theater where ot_id='".$ot_id."'";
			$data['record']=$this->db->query($query)->row_array();			
			$this->json_output($data);
			
		}
	}


	
}

?>