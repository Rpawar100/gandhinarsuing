<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_ipd_dashboard extends MY_Controller {
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){   
        $this->session_validate();
        $this->load->view('vw_ipd_dashboard');
	     //$this->load->view('vw_evaluation_form');
	   //  $this->load->view('vw_Credentials_form');
    }

    public function get_allocation_count($billingClassId){
        $this->session_validate();
        $this->db->where('IBA_billing_class_id', $billingClassId);
        $count = $this->db->count_all_results('ipd_bed_allocation');

        $data['count'] = $count;
        $this->json_output($data);
    }

    public function get_allocation_data() {
        $this->session_validate();

        $billingClassId = $this->input->post('billingClassId');
       
         $result_query = "SELECT
						    IBA_floor_id,
						    IBA_bed_id,
						    CONCAT(floor_name, '-', bed_number) AS fb_name,
						    IBA_appointment_id,
						    CONCAT(P_name_prefix, '.', P_first_name, ' ', P_last_name) AS patient_name,
						    P_grn AS UHID,
						    CONCAT(user_first_name, ' ', user_last_name) AS doctor_name,
						    patient_company_name,
						    appointment_timestamp AS admit_date
						FROM
						    ipd_bed_allocation
						JOIN floor_master ON IBA_floor_id = floor_id
						JOIN bed_master ON IBA_bed_id = bed_id
						JOIN appointment ON IBA_appointment_id = appointment_id
						JOIN patient ON appointment_patient_id = P_id
						JOIN user ON appointment_doctor_id = user_id
						JOIN patient_company ON appointment_patient_company_id = patient_company_id
						WHERE
						    IBA_billing_class_id = " . $billingClassId;


    $allocationData = $this->db->get('ipd_bed_allocation')->result_array();

        $this->json_output($allocationData);
    }
}
?>
