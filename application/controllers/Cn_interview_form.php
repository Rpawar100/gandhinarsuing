<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_interview_form extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_interview_form');
	}


	public function interview_list(){

	$this->session_validate();
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $length = $_POST['length'];
    $searchValue = $_POST['search']['value'];
    $searchQuery = "";

    for ($i = 0; $i < count($_POST['columns']); $i++) {
        if (!empty($_POST['columns'][$i]['search']['value'])) {
            $searchQuery .= " AND " . $_POST['columns'][$i]['data'] . " LIKE '" . $_POST['columns'][$i]['search']['value'] . "%'";
        }
    }

    if ($searchValue != '') {
            $searchQuery .= " AND (equ_name LIKE '%" . $searchValue . "%'
                   OR equ_qty LIKE '%" . $searchValue . "%')";

    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
                interview_id as id
                ,CONCAT(interview_first_name,' ',interview_father_name,' ',interview_last_name) as full_name
                ,role_name AS apply_for
                ,Case when department_name is null then '-' else department_name end as dept_name
                ,interview_contact as contact
                ,Case 
                	when interview_status ='Pending' or interview_status ='1st_round_selected' or interview_status ='2st_round_selected' then 
                			CONCAT('<i class=\"interview_schedule\" interview_status=\"',interview_status ,'\" cid=\"',interview_id ,'\" style=\"color:green;font-size:20px;margin: 0px 10px;\">', interview_status ,'</i>') 
                	when interview_status ='1st_round_schedule' or interview_status ='2st_round_schedule' or interview_status ='3st_round_schedule' then
                	  		CONCAT('<i class=\"interview_schedule\" interview_status=\"',interview_status ,'\" is_id=\"',	IS_id ,'\" style=\"color:green;font-size:20px;margin: 0px 10px;\">', interview_status ,'</i>') 
                	end as status


                ,CONCAT('<i class=\"interview_detail\"  iid=\"',interview_id ,'\" style=\"color:orange;font-size:20px;margin: 0px 10px;\">Show</i>') as detail 

            FROM Interview
            JOIN role on role_id=interview_applying_for
            left JOIN department on interview_department_id=department_id
            left JOIN interview_schedule on interview_id=IS_interview_id
        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE id!= ''
        ".$searchQuery;

    $result = $this->db->query($result_query)->result_array();
    $result_data = array_slice($result, $start, $length);

    $output = array(
        "draw" => $draw,
        "recordsTotal" => count($result),
        "recordsFiltered" => count($result),
        "data" => $result_data
    );

    $this->json_output($output);



	}

	public function interview_action(){

		$this->session_validate();

		if (!empty($_POST)) {
			
				$record_data = array(
					
					'interview_first_name' =>!empty($_POST['first_name'])?$_POST['first_name']:'',
					'interview_father_name' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
					'interview_last_name' =>!empty($_POST['last_name'])?$_POST['last_name']:'',
					'interview_applying_for' =>!empty($_POST['applying_for'])?$_POST['applying_for']:'',
					'interview_department_id' =>!empty($_POST['dept_id'])?$_POST['dept_id']:'',
					'interview_contact' =>!empty($_POST['department'])?$_POST['department']:'',
					'interview_date' =>!empty($_POST['date_of_interview'])?$_POST['date_of_interview']:'',
					'interview_dob' =>!empty($_POST['date_of_birth'])?$_POST['date_of_birth']:'',
					'interview_email' =>!empty($_POST['email_address'])?$_POST['email_address']:'',
					'interview_remark' =>!empty($_POST['remark'])?$_POST['remark']:'',
					'interview_joining_remark' =>!empty($_POST['joining_remark'])?$_POST['joining_remark']:'',
					
				);

				$this->db->insert('Interview',$record_data);
				$interview_id=$this->db->insert_id();

				$qualification_data=json_decode($_POST['qualification_data']);
				$experience_data=json_decode($_POST['experience_data']);
				$reference_data=json_decode($_POST['reference_data']);

				foreach ($qualification_data as $qualification_entry) {
				
				 $record_data = array(
                'UQ_user_id' => $interview_id,
                'UQ_registration_no' => $qualification_entry[0],
                'UQ_university' => $qualification_entry[1],
                'UQ_valid_up_to' => $qualification_entry[2],
                'UQ_type' => 'Candidate',
                
            	);

            	$this->db->insert('user_qualification',$record_data);
			 }

			 foreach ($experience_data as $experience_entry) {
				
				 $record_data = array(
                'WE_user_id' => $interview_id,
                'WE_employer_name' => $experience_entry[0],
                'WE_designation' => $experience_entry[1],
                'WE_period_from' => $experience_entry[2],
                'WE_period_to' => $experience_entry[3],
                'WE_type' => 'Candidate',
                
            	);

            	$this->db->insert('user_work_experience',$record_data);
			 }

			 foreach ($reference_data as $reference_entry) {
				
				 $record_data = array(
                'UR_user_id' => $interview_id,
                'UR_name' => $reference_entry[0],
                'UR_designation' => $reference_entry[1],
                'UR_contact_no' => $reference_entry[2],
                'UR_type' => 'Candidate',
            	);
            	$this->db->insert('user_reference_table',$record_data);
			 }
				
				$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Interview details Added Successfully..!</b>',
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

	public function schedule_interview_action(){

		$this->session_validate();
		$round=$_POST['interview_round'];

		if (!empty($_POST)) {
			
				$record_data = array(
					
					'IS_interview_id' =>!empty($_POST['interview_id'])?$_POST['interview_id']:'',
					'IS_user_id' =>!empty($_POST['user_id'])?$_POST['user_id']:'',
					'IS_date_time' =>!empty($_POST['schedule_datetime'])?$_POST['schedule_datetime']:'',
					
				);

				$this->db->insert('interview_schedule',$record_data);
				
				//$IS_id=$this->db->insert_id();

				switch($round){
				
					case 'Pending': $this->db->query("UPDATE Interview set interview_status='1st_round_schedule' where interview_id='".$record_data['IS_interview_id']."'");
					break;

					case '1st_round_selected': $this->db->query("UPDATE Interview set interview_status='2st_round_schedule' where interview_id='".$record_data['IS_interview_id']."'");
					break;
					case '2st_round_selected': $this->db->query("UPDATE Interview set interview_status='3st_round_schedule' where interview_id='".$record_data['IS_interview_id']."'");
					break;


				}


				$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Interview Schedule Successfully..!</b>',
						'type'=>'success'
					);
		}

		$this->json_output($data);


	}

	public function get_interview_detail(){

		$iid=$_POST['iid'];

		$query="SELECT 
					 
					 CONCAT(user_first_name,' ',user_middle_name,' ',user_last_name) as user_name
					,DATE_FORMAT(IS_date_time, '%Y-%m-%d %h:%i:%s %p') as schedule_date
					,IS_type as type
					,IS_remark as remark
					,IS_status as status
					FROM interview_schedule 
					JOIN user on user_id=IS_user_id
					where IS_interview_id='".$iid."'
					";

		$data['result']=$this->db->query($query)->row_array();

		$this->json_output($data);


	}

	public function interview_feedback_action(){

		$IS_id=$_POST['IS_id'];
		$IS_status=$_POST['IS_status'];
		$feedback_status=$_POST['feedback_status'];
		$remark=$_POST['remark'];


		switch ($IS_status) {
			case '1st_round_schedule':
				
				$this->db->query("UPDATE interview_schedule set IS_type='".$IS_status."',IS_remark='".$remark."',IS_status='".$feedback_status."'");

				if($feedback_status=='Selected'){

					$this->db->query("UPDATE Interview set interview_status='1st_round_selected' where interview_id=(SELECT IS_interview_id from interview_schedule where 	IS_id='".$IS_id."')");
				}else{

					$this->db->query("UPDATE Interview set interview_status='1st_round_rejected' where interview_id=(SELECT IS_interview_id from interview_schedule where 	IS_id='".$IS_id."')");	
				}

				break;

			case '2st_round_schedule':
				
				$this->db->query("UPDATE interview_schedule set IS_type='".$IS_status."',IS_remark='".$remark."',IS_status='".$feedback_status."'");

				if($feedback_status=='Selected'){

					$this->db->query("UPDATE Interview set interview_status='2st_round_selected' where interview_id=(SELECT IS_interview_id from interview_schedule where 	IS_id='".$IS_id."')");
				}else{

					$this->db->query("UPDATE Interview set interview_status='2st_round_rejected' where interview_id=(SELECT IS_interview_id from interview_schedule where 	IS_id='".$IS_id."')");	
				}

				break;
			
			default:
				// code...
				break;
		}
		$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Feedback Updated Successfully..!</b>',
						'type'=>'success'
					);
		$this->json_output($data);

	}

	public function get_candidate_detail(){

		$is_id=$_POST['is_id'];

		$query="SELECT 
					 
					CONCAT(interview_first_name,' ',interview_father_name,' ',interview_last_name) as name
					,UQ_degree as degree
					,role_name as r_name
					,concat(WE_period_from,' TO ',WE_period_to) as exprience
					,department_name as dept_name
					FROM interview_schedule 
					JOIN Interview on IS_interview_id=interview_id
					JOIN user_qualification on interview_id=UQ_user_id
					JOIN role on interview_applying_for=role_id
					JOIN user_work_experience on interview_id=WE_user_id
					JOIN department on interview_department_id=department_id
					where IS_id='".$is_id."'";
					

		$data['result']=$this->db->query($query)->row_array();

		$this->json_output($data);
	}

	public function evaluation_form_action(){

		$this->session_validate();

		if (!empty($_POST)) {
			
				$record_data = array(
					
					'IR_communication' =>!empty($_POST['Communication_Skills'])?$_POST['Communication_Skills']:'',
					'IR_job_knowledge' =>!empty($_POST['necessary_skills'])?$_POST['necessary_skills']:'',
					'IR_education' =>!empty($_POST['educational_qualifications'])?$_POST['educational_qualifications']:'',
					'IR_candidate_enthusiasm' =>!empty($_POST['position_interest'])?$_POST['position_interest']:'',
					'IR_overall_appearence' =>!empty($_POST['body_language'])?$_POST['body_language']:'',
					'IR_total_score' =>!empty($_POST['total_score'])?$_POST['total_score']:'',
					'IR_recommendation' =>!empty($_POST['Recommendation'])?$_POST['Recommendation']:'',
					'IR_remark' =>!empty($_POST['father_name'])?$_POST['father_name']:'',
					'IR_IS_id' =>!empty($_POST['is_id'])?$_POST['is_id']:'',

				);

				$this->db->insert('interview_record',$record_data);
				
				
				$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Interview Remark Added Successfully..!</b>',
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


}

?>