<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_dashboard extends MY_Controller
{
	
	function __construct(){
		parent::__construct();

	}




       public function index() {

            $this->load->database();

             $query = $this->db->query("
                 SELECT COUNT(*) AS total_appointments
                 FROM appointment
                 WHERE DATE(appointment_timestamp) = CURDATE()
                 AND appointment_status = 'Completed'
            ");

            $result = $query->row();

            $data['total_appointments'] = $result->total_appointments;



               $query = $this->db->query("
                    SELECT SUM(appointment_amount) AS total_income
                    FROM appointment
                    WHERE appointment_section_id = 3
                 ");

             $result = $query->row();

             $data['total_income_of_dignosius'] = $result->total_income;


                 $query = $this->db->query("
                        SELECT COUNT(*) AS total_appointments
                        FROM appointment
                        WHERE DATE(appointment_created_at) = CURDATE()
                        AND appointment_section_id = 1
               ");

             $result = $query->row();

             $data['total_opd_appointments'] = $result->total_appointments;


              $query = $this->db->query("
                        SELECT COUNT(*) AS total_appointments
                        FROM appointment
                        WHERE DATE(appointment_created_at) = CURDATE()
                        AND (appointment_status = 'Pending' OR appointment_status = 'Inprocess')
                        AND appointment_section_id = 1
                       ");

              $result = $query->row();

              $data['total_followup_opd_appointments'] = $result->total_appointments;


               $query = $this->db->query("
                        SELECT COUNT(*) AS total_ipd_appointments
                        FROM appointment
                        WHERE DATE(appointment_created_at) = CURDATE()
                        AND appointment_section_id = 2
               ");

             $result = $query->row();

             $data['total_ipd_appointments'] = $result->total_ipd_appointments;

           
             $query = $this->db->query("
                        SELECT COUNT(*) AS total_followup_ipd_appointments
                        FROM appointment
                        WHERE DATE(appointment_created_at) = CURDATE()
                        AND (appointment_status = 'Pending' OR appointment_status = 'Inprocess')
                        AND appointment_section_id = 2
                       ");

              $result = $query->row();

              $data['total_followup_ipd_appointments'] = $result->total_followup_ipd_appointments;


                 $query = $this->db->query("
                       SELECT SUM(appointment_amount) AS total_opd_monthly_income
                       FROM appointment
                       WHERE YEAR(appointment_created_at) = YEAR(CURDATE())
                       AND MONTH(appointment_created_at) = MONTH(CURDATE())
                       AND appointment_section_id = 1
               ");

            $result = $query->row();

            $data['total_opd_monthly_income'] = $result->total_opd_monthly_income;

            
             $query = $this->db->query("
                      SELECT SUM(appointment_amount) AS total_todays_opd_income
                      FROM appointment
                      WHERE DATE(appointment_created_at) = CURDATE()
                      AND appointment_section_id = 1
                 ");

            $result = $query->row();

            $data['total_todays_opd_income'] = $result->total_todays_opd_income;

            
              $query = $this->db->query("
                       SELECT SUM(appointment_amount) AS total_ipd_monthly_income
                       FROM appointment
                       WHERE YEAR(appointment_created_at) = YEAR(CURDATE())
                       AND MONTH(appointment_created_at) = MONTH(CURDATE())
                       AND appointment_section_id = 2
               ");

            $result = $query->row();

            $data['total_ipd_monthly_income'] = $result->total_ipd_monthly_income;


            
             $query = $this->db->query("
                      SELECT SUM(appointment_amount) AS total_todays_ipd_income
                      FROM appointment
                      WHERE DATE(appointment_created_at) = CURDATE()
                      AND appointment_section_id = 2
                  ");

              $result = $query->row();

             $data['total_todays_ipd_income'] = $result->total_todays_ipd_income;








            $this->load->view('vw_dashboard', $data);
       }

       
	

     


}

?>