<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_opd_payment_calc extends MY_Controller {


	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_opd_payment_calc');
	}

   public function opd_payment_calc_list()
{
    $this->session_validate();

    $doctor_id=!empty($this->input->post('doctor_id'))?$this->input->post('doctor_id'):$this->input->post('doctor_id');
    $start_date=!empty($this->input->post('start_date'))?$this->input->post('start_date'):$this->input->post('start_date');
    $end_date=!empty($this->input->post('end_date'))?$this->input->post('end_date'):$this->input->post('end_date');


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

                        P_grn as uhid
                        ,appointment_no
                        ,appointment_timestamp
                        ,date_format(appointment_timestamp,'%Y-%m-%d') as visit_date
                        ,concat(P_first_name,' ',P_last_name) as patient_name
                        ,P_mobile_number as mobile_number
                        ,P_gender as gender
                        ,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
                        ,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
                        ,department_name as d_name
                        ,patient_category_name as category
                        ,patient_company_name as company
                        ,'OPD' as type 
                        ,'-' as new_f
                        ,'-' as user_name
                        ,case when appointment_referral_name is null or appointment_referral_name=''  then 'NA' else appointment_referral_name
                            end as referral_name 
                        ,ROUND(appointment_amount*(user_opd_commission/100) ,2) as commission
                        ,'-' as narration
                        ,receipt_id as receipt_no

                        from appointment
                        join user on appointment_doctor_id=user_id
                        join patient on appointment_patient_id=P_id
                        join patient_category on appointment_patient_category_id=patient_category_id 
                        join patient_company on appointment_patient_company_id= patient_company_id
                        join receipt on appointment_id=receipt_appointment_id
                        join department on appointment_department_id=department_id
                        where appointment_status='Completed'
                        and appointment_doctor_id='".$doctor_id."'
                        and appointment_section_id = 1 
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