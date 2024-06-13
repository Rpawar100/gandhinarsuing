<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_doctor_calculation extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_doctor_calculation');
	}

   public function CMA_list()
{
    $this->session_validate();

    $doctor_id=!empty($this->input->post('doctor_id'))?$this->input->post('doctor_id'):$this->input->post('doctor_id');
    $start_date=!empty($this->input->post('start_date'))?$this->input->post('start_date'):$this->input->post('start_date');
    $end_date=!empty($this->input->post('end_date'))?$this->input->post('end_date'):$this->input->post('end_date');
    $section=!empty($this->input->post('section'))?$this->input->post('section'):$this->input->post('section');

    /*
    if($section=='0'){

    } */


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
        $searchQuery .= " AND (floor_no LIKE '%" . $searchValue . "%'
                      OR ward_name LIKE '%" . $searchValue . "%'
                      OR room_name LIKE '%" . $searchValue . "%'                      
                      OR bed_no LIKE '%" . $searchValue . "%')";
    }

    $result_query=" SELECT
                        @sr_no:=@sr_no+1 sr_no, 
                        result_data.*
                    from (

                        SELECT 
                        appointment_timestamp 
                        ,appointment_no ,'OPD' as type 
                        ,appointment_amount 
                        ,user_opd_commission
                        ,ROUND(appointment_amount*(user_opd_commission/100) ,2) as commission
                        ,concat(P_first_name,' ',P_last_name) as patient_name
                        ,patient_category_name as category
                        ,patient_company_name as company 
                        from appointment
                        join user on appointment_doctor_id=user_id
                        join patient on appointment_patient_id=P_id
                        join patient_category on appointment_patient_category_id=patient_category_id 
                        join patient_company on appointment_patient_company_id= patient_company_id
                        where appointment_status='Completed'
                        and appointment_doctor_id='".$doctor_id."'
                        and appointment_section_id ='".$section."'
                        and date_format(appointment_timestamp,'%Y-%m-%d') between '".$start_date."' and '".$end_date."'
 
                    ) result_data,(SELECT @sr_no:= 0) AS a
                    where appointment_timestamp!=''
                    ".$searchQuery."
                    Order by appointment_timestamp";

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




}
?>