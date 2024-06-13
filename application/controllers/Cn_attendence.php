<?php 
class Cn_attendence extends My_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('vw_attendence');
	}

	public function get_attendence_list()
	{
		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length']; 
		$columnIndex = $_POST['order'][0]['column']; 
		$columnName = $_POST['columns'][$columnIndex]['data']; 
		$columnSortOrder = $_POST['order'][0]['dir']; 
		$searchValue = $_POST['search']['value']; 
		
		$searchQuery = "";

		for ($i=0; $i <count($_POST['columns']) ; $i++) { 
			if (!empty($_POST['columns'][$i]['search']['value'])) {
				$searchQuery.="AND ".$_POST['columns'][$i]['data']." like '%".$_POST['columns'][$i]['search']['value']."%'";
			}
		}

		if($searchValue != ''){
			$searchQuery.= " AND (b_name like '%".$searchValue."%'";
		}

		$result_query=" SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
						 attendence_id as id
						 ,attendence_date as adate
						 ,batch_name as b_name
						 ,student_name as s_name
						 ,case 
							when attendence_status='Present' then concat('<label class=\"switch\"><input type=\"checkbox\" class=\"changed_status\" checked  attendence_id=\"',attendence_id,'\" value=\"',attendence_status,'\"><span class=\"slider round\"></span></label>')
							else concat('<label class=\"switch\"><input type=\"checkbox\" class=\"changed_status\" attendence_id=\"',attendence_id,'\" value=\"',attendence_status,'\"><span class=\"slider round\"></span></label>')
						end as status
						FROM attendence
						 join batch on attendence_batch_id = batch_id 
						 join student on attendence_student_id=student_id
						) result_data,(SELECT @sr_no:= 0) AS a
					where id!=''
					".$searchQuery;

        $result = $this->db->query($result_query)->result_array();
		$data=array_slice($result, $start,$length);
		
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result),
			"iTotalDisplayRecords" => count($result),
			"aaData" => $data,
			
		);
		echo json_encode($response);
	}

	
     public function batch_student_all()
	{
			
			$data['result']=$this->db->query("SELECT batch_id as id , batch_name as name from student_course_batch_assignment JOIN batch ON SCBA_batch_id=batch_id JOIN student on SCBA_student_id=student_id;")->result_array();
			
			$this->json_output($data);	
	}

	public function get_students_by_batch(){
	    $this->session_validate();
	    
			    if(!empty($_POST['B_id'])){
			        $B_id = $_POST['B_id'];
			        $data['record'] = $this->db->query("
												            SELECT 
												                 student_id  as id
												                ,student_name as name
												            FROM
												                student_course_batch_assignment
												            JOIN
												                student ON SCBA_student_id = student_id
												            JOIN
												                batch ON SCBA_batch_id = batch_id
												            WHERE batch_id = ".$B_id
											       	    )->result_array();

			        
			        $this->json_output($data);	
			    }
	}



	public function chage_student_status()
	{
		
		$student_id=$this->input->post('student_id');
		$student_status=$this->input->post('student_status');
		$adate=$this->input->post('adate');
		$batch_id=$this->input->post('batch_id');

		$query="INSERT into attendence (attendence_batch_id,attendence_date,	attendence_student_id,attendence_status) values('".$batch_id."','".$adate."','".$student_id."','".$student_status."')";

		$this->db->query($query);

		$data['status']=true;
				$data['swall']=array(
					'title'=>'Done!',
					'text'=>'<b>Student Attendance Mark Successfully..!</b>',
					'type'=>'success'
		);

		$this->json_output($data);
	}


	public function chaged_status()
	{
		if (!empty($_POST)) {
			$status=$_POST['status'];
			if($status=='Absent')
				$status='Present';
			else
				$status='Absent';
			$attendence_id=$_POST['attendence_id'];
			$this->db->query("UPDATE attendence set attendence_status='".$status."' where attendence_id='".$attendence_id."'");
			$data['swall']=array(
				'title'=>'Done!',
				'text'=>'<b>Status Updated Successfully..!</b>',
				'type'=>'success'
			);
			
			$this->json_output($data);
		}
	}

}
?>