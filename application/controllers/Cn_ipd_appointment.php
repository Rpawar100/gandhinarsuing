<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_ipd_appointment extends MY_Controller {
  
  
function __construct(){
    parent::__construct();
            $this->load->database();

  }

  public function get_inprocess_appointment_count() {
    $this->db->where('appointment_status', 'Inprocess');
    $this->db->from('appointment');
    $count = $this->db->count_all_results();
    return $count;
}

  
  public function index(){   
    $this->session_validate();
    $data['inprocess_count'] = $this->get_inprocess_appointment_count();
    
    $query = $this->db->query("
                        SELECT COUNT(*) AS total_ipd_appointments
                        FROM appointment
                        WHERE DATE(appointment_created_at) = CURDATE()
                        AND appointment_section_id = 2
               ");

    $result = $query->row();

    $data['total_ipd_new_appointments'] = $result->total_ipd_appointments;


      $query = $this->db->query("
            SELECT COUNT(*) AS total_completed_appointments
            FROM appointment
            WHERE appointment_section_id = 2
            AND appointment_status = 'Completed'
        ");

      $result = $query->row();

      $data['total_completed_appointments'] = ($result !== null) ? $result->total_completed_appointments : 0;



    $this->load->view('vw_ipd_appointment',$data);
  }

  public function ipd_appointment_list(){
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
                or uhid like '%".$searchValue."%'
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

    $result_query=" SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
          from (
            SELECT
              appointment_id as id
              ,appointment_patient_id as pid
              ,appointment_no as appointment_no
              ,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
              ,concat('<a style=\"font-size:initial;font-weight:bolder; color:blue;\" >',P_grn,'</a>') as uhid
              ,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
              ,P_gender as p_gender
              ,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
              ,P_mobile_number
              ,department_name as d_name
              ,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
              ,patient_category_name as category_name
              ,patient_company_name as company_name
              ,'-' as print_label
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
                when appointment_status='Waiting' or appointment_status='Schedule' or appointment_status='Pending'
                then concat('<i class=\"fa fa-times cancel_record\" appoint_id=\"',appointment_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-eye payment_receipt\" data_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'\" pdf_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'?action=PDF\" style=\"color:blue;font-size:20px;margin: 0px 10px;\"></i>')
                else concat('<i class=\"fa fa-eye payment_receipt\" data_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'\" pdf_url=\"https://aqdsoft.in/opd-appointment-bill/',appointment_id,'?action=PDF\" style=\"color:blue;font-size:20px;margin: 0px 10px;\"></i>')
              end as action
              ,CASE 
                when amount is NULL then  

                concat('<label appoint_id=\"',appointment_id,'\" appoint_id=\"',appointment_id,'\" style=\"font-size:initial;font-weight:bolder; color:orange;\">0.00</label>')
                else 
                  concat('<label class=\"view_services\" appoint_id=\"',appointment_id,'\" style=\"font-size:initial;font-weight:bolder; color:orange;\">',amount,'</label>')
              end as amount
              ,concat('<label class=\"view_received_amount\" appoint_id=\"',appointment_id,'\"  style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_received_amount,'</label>') AS received_amt
              
              ,concat('<label class=\"pay_bill\" appoint_id=\"',appointment_id,'\" balalnce_amt=\"',(amount - appointment_received_amount),'\" style=\"font-size:initial;font-weight:bolder; color:red;\">',(amount - appointment_received_amount),'</label>') AS balance_amt

              ,case 
                when amount=(amount - appointment_received_amount) then concat('<label style=\"font-size:initial;font-weight:bolder; color:red;\">Unpaid</label>')

                 when amount < (amount - appointment_received_amount) then concat('<label  style=\"font-size:initial;font-weight:bolder; color:green;\">Advanced Received</label>')

                 when amount > (amount - appointment_received_amount) then concat('<label  style=\"font-size:initial;font-weight:bolder; color:green;\">Partial Paid</label>')

                 WHEN amount = 0 AND (amount - appointment_received_amount) = 0 THEN 
                  CONCAT('<label  style=\"font-size:initial;font-weight:bolder; color:green;\">Paid</label>')

              end as pay_status

            from appointment
            join patient
              on  appointment_patient_id=P_id
            join department
              on  appointment_department_id=department_id
            join user
              on appointment_doctor_id=user_id
            join patient_category
              on appointment_patient_category_id=patient_category_id
            join patient_company
              on appointment_patient_company_id=patient_company_id

            LEFT JOIN
              (SELECT ASA_appointment_id, sum(ASA_service_amount) as amount FROM appointment_services_assign GROUP BY ASA_appointment_id) as amount_data
              ON ASA_appointment_id = appointment_id

            where appointment_section_id='2'
          ) result_data,(SELECT @sr_no:= 0) AS a
          where appointment_no!=''
          ".$searchQuery."
          order by appointment_no desc
          LIMIT ".$length." OFFSET ".$start;

          

    $result_data = $this->db->query($result_query)->result_array();
    
    $result_count_query=" SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
          from (
            SELECT
              appointment_id as id
              ,appointment_patient_id as pid
              ,appointment_no as appointment_no
              ,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
              ,concat('<a style=\"font-size:initial;font-weight:bolder; color:blue;\" >',P_grn,'</a>') as uhid
              ,concat(P_name_prefix,' ',P_first_name,' ',P_last_name) as p_name
              ,P_gender as p_gender
              ,concat(SUBSTRING_INDEX(calculate_age(P_dob), '-', 1),' Year')as age
              ,P_mobile_number
              ,department_name as d_name
              ,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
              ,patient_category_name as category_name
              ,patient_company_name as company_name
              ,'-' as print_label
              ,'-' as received_amt
              ,'-' as balance_amt
  
              ,CASE 
                when amount is NULL then 0 
                else amount 
              end as amount
            from appointment
            join patient
              on  appointment_patient_id=P_id
            join department
              on  appointment_department_id=department_id
            join user
              on appointment_doctor_id=user_id
            join patient_category
              on appointment_patient_category_id=patient_category_id
            join patient_company
              on appointment_patient_company_id=patient_company_id

            LEFT JOIN
              (SELECT ASA_appointment_id, sum(ASA_service_amount) as amount FROM appointment_services_assign GROUP BY ASA_appointment_id) as amount_data
              ON ASA_appointment_id = appointment_id
            where appointment_section_id='2') result_data,(SELECT @sr_no:= 0) AS a
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

  public function ipd_appointment_action(){ 
    $this->session_validate();
    if (!empty($_POST)) {
      $user_id=$this->session->userdata('id');
      if (!empty($_POST['patient_id'])) {
        $record_data = array(
          'appointment_patient_id' =>!empty($_POST['patient_id'])?$_POST['patient_id']:'',
          'appointment_timestamp' =>!empty($_POST['appointment_slot'])?str_replace('T',' ',$_POST['appointment_slot']):'',
          'appointment_department_id' =>!empty($_POST['d_name'])?$_POST['d_name']:'',
          'appointment_doctor_id' =>!empty($_POST['consulting_doctor'])?$_POST['consulting_doctor']:'',
          'appointment_secondary_doctor' =>!empty($_POST['secondary_doctor'])?$_POST['secondary_doctor']:'',
          'appointment_status' =>'Schedule',
          'appointment_pay_status' =>'Unpaid',
          'appointment_section_id' =>'2',
          'appointment_type'=>'New',
          'appointment_patient_category_id' =>!empty($_POST['patient_category'])?$_POST['patient_category']:'',
          'appointment_patient_company_id' =>!empty($_POST['patient_company'])?$_POST['patient_company']:'',

          'appointment_employee_id' =>!empty($_POST['employee_id'])?$_POST['employee_id']:'',
          'appointment_employee_name' =>!empty($_POST['employee_name'])?$_POST['employee_name']:'',
          'appointment_employee_relationship' =>!empty($_POST['employee_relationship'])?$_POST['employee_relationship']:'',

          'appointment_insurance_policy_company' =>!empty($_POST['insurance_policy_company'])?$_POST['insurance_policy_company']:'',
          'appointment_insurance_policy_no' =>!empty($_POST['insurance_policy_no'])?$_POST['insurance_policy_no']:'',
          'appointment_health_card_no' =>!empty($_POST['health_card_no'])?$_POST['health_card_no']:'',

          'appointment_referral_name' =>!empty($_POST['Referral_name'])?$_POST['Referral_name']:'',
          'appointment_contact' =>!empty($_POST['Referral_contact'])?$_POST['Referral_contact']:'',
          
          'appointment_referance_hospital' =>!empty($_POST['ref_hospital'])?$_POST['ref_hospital']:'',
          'appointment_referance_doctor' =>!empty($_POST['ref_doctor'])?$_POST['ref_doctor']:'',

          'appointment_relative_name' =>!empty($_POST['relative_name'])?$_POST['relative_name']:'',
          'appointment_relative_relationship' =>!empty($_POST['relative_relationship'])?$_POST['relative_relationship']:'',
          'appointment_relative_contact' =>!empty($_POST['relative_contact'])?$_POST['relative_contact']:'',
          'appointment_mlc_status' =>!empty($_POST['MLC'])?$_POST['MLC']:'',
          'appointment_created_by' =>$user_id,
        );

          $IBA_floor_number= !empty($_POST['floor_number'])?$_POST['floor_number']:'';
          $IBA_ward_number =!empty($_POST['ward_number'])?$_POST['ward_number']:'';
          $IBA_room_number =!empty($_POST['room_number'])?$_POST['room_number']:'';
          $IBA_bed_number = !empty($_POST['bed_number'])?$_POST['bed_number']:'';

        $appointment_check=$this->db->query("SELECT * from user where user_id='".$record_data['appointment_doctor_id']."'")->row_array();

        $old_appointment_check=$this->db->query("SELECT 
                            date_format(max(appointment_timestamp),'%Y-%m-%d') as appointment_datetime 
                            ,DATEDIFF(date_format(now(),'%Y-%m-%d'),date_format(max(appointment_timestamp),'%Y-%m-%d')) as day_diff
                            ,case 
                              when DATEDIFF(date_format(now(),'%Y-%m-%d'),date_format(max(appointment_timestamp),'%Y-%m-%d')) >user_case_paper_validity then 'New' else 'Follow-Up' end as status
                          from appointment 
                          join user on user_id=appointment_doctor_id
                          where appointment_type='New' 
                          and appointment_status='Completed' 
                          and appointment_section_id='1' 
                          and  appointment_patient_id='".$record_data['appointment_patient_id']."'
                          and appointment_doctor_id='".$record_data['appointment_doctor_id']."'")->row_array();
        $insert_status='False';
        if(!empty($old_appointment_check)){
          if($old_appointment_check['status']=='Follow-Up'){
            switch ($appointment_check['user_followup_charges_type']) {
              case 'After-the-first-consultation':
                  $record_data['appointment_type']=$old_appointment_check['status'];
                break;
              case 'After-no-of-free-visits':
                  $appointment_count=$this->db->query("SELECT count(*) as count from appointment
                                      where appointment_status='Completed' 
                                      and appointment_section_id='1' 
                                      and appointment_patient_id='".$record_data['appointment_patient_id']."'
                                      and appointment_doctor_id='".$record_data['appointment_doctor_id']."'
                                      and date_format(appointment_timestamp,'%Y-%m-%d')>date_format('".$old_appointment_check['appointment_datetime']."','%Y-%m-%d')>
                                      ")->row_array();
                  if($appointment_count['count']<$appointment_check['user_free_visit']){
                    $record_data['appointment_type']='Free-Follow-Up';
                  }else{
                    $record_data['appointment_type']='Follow-Up';
                  }
                break;
              case 'After-no-of-free-days':
                  if($old_appointment_check['day_diff']<$appointment_check['user_free_days']){
                    $record_data['appointment_type']='Free-Follow-Up';
                  }else{
                    $record_data['appointment_type']='Follow-Up';
                  }
                break;
              case 'After-no-of-free-visits-and-no-of-free-days':
                  $appointment_count=$this->db->query("SELECT count(*) as count from appointment
                                      where appointment_status='Completed' 
                                      and appointment_section_id='1' 
                                      and appointment_patient_id='".$record_data['appointment_patient_id']."'
                                      and appointment_doctor_id='".$record_data['appointment_doctor_id']."'
                                      and date_format(appointment_timestamp,'%Y-%m-%d')>date_format('".$old_appointment_check['appointment_datetime']."','%Y-%m-%d')>
                                      ")->row_array();
                  if($old_appointment_check['day_diff']<$appointment_check['user_free_days'] && $appointment_count['count']<$appointment_check['user_free_visit']){
                    $record_data['appointment_type']='Free-Follow-Up';
                  }else{
                    $record_data['appointment_type']='Follow-Up';
                  }
                break;
            }
          }
        }
        $price='0';
        $service_id='0';
        $rate_config_id='0';
        $rate_type_id='0';
        
        $company_data=$this->db->query("SELECT * from patient_company where patient_company_id='".$record_data['appointment_patient_company_id']."'")->row_array();
        if($record_data['appointment_type']=='New'){
          $service_check=$this->db->query(" SELECT 
                              * 
                            from services 
                            where services_department_id='".$record_data['appointment_department_id']."'
                            and services_status='1'
                            and services_group_id='1'")->row_array();
          if(empty($service_check)){
            $data['swall']=array(
              'title'=>'Consultation Service Not Found for this Department!',
              'text'=>'<b>Please Contact Admin.Service and service Rate Not Found for this Department!</b>',
              'type'=>'warning'
            );
          }else{
            $insert_status='True';
            $rate_config_check=$this->db->query("SELECT * FROM rate_config where rate_config_services_id='".$service_check['services_id']."'")->result_array();

            if(!empty($rate_config_check)){
              $doctor_rate_check=$this->db->query("SELECT * FROM rate_config where (rate_config_doctor_id='0' or rate_config_doctor_id='".$record_data['appointment_doctor_id']."') and (rate_config_rate_type_id='0' or rate_config_rate_type_id='".$company_data['patient_company_rate_type_id']."') and rate_config_services_id='".$service_check['services_id']."' order by rate_config_rate_type_id desc,rate_config_doctor_id desc")->row_array();
              if(!empty($doctor_rate_check)){
                $service_id=$service_check['services_id'];
                $rate_config_id=$doctor_rate_check['rate_config_id'];
                $price=$doctor_rate_check['rate_config_amount'];  
              }else{
                $service_id=$service_check['services_id'];
                $rate_config_id='0';
                $price=$service_check['services_rate']; 
              }
            }else{
              $service_id=$service_check['services_id'];
              $rate_config_id='0';
              $price=$service_check['services_rate'];
            }
          }
        }else if($record_data['appointment_type']=='Follow-Up'){
          $service_check=$this->db->query(" SELECT 
                              * 
                            from services 
                            where services_department_id='".$record_data['appointment_department_id']."'
                            and services_status='1'
                            and services_group_id='2'")->row_array();
          if(empty($service_check)){
            $data['swall']=array(
              'title'=>'Consultation Service Not Found for this Department!',
              'text'=>'<b>Please Contact Admin.Service and service Rate Not Found for this Department!</b>',
              'type'=>'warning'
            );
          }else{
            $insert_status='True';
            $rate_config_check=$this->db->query("SELECT * FROM rate_config where rate_config_services_id='".$service_check['services_id']."'")->result_array();

            if(!empty($rate_config_check)){
              $doctor_rate_check=$this->db->query("SELECT * FROM rate_config where (rate_config_doctor_id='0' or rate_config_doctor_id='".$record_data['appointment_doctor_id']."') and (rate_config_rate_type_id='0' or rate_config_rate_type_id='".$company_data['patient_company_rate_type_id']."') and rate_config_services_id='".$service_check['services_id']."' order by ,rate_config_rate_type_id desc ,rate_config_doctor_id desc")->row_array();
              if(!empty($doctor_rate_check)){
                $service_id=$service_check['services_id'];
                $rate_config_id=$doctor_rate_check['rate_config_id'];
                $price=$doctor_rate_check['rate_config_amount'];  
              }else{
                $service_id=$service_check['services_id'];
                $rate_config_id='0';
                $price=$service_check['services_rate']; 
              }
            }else{
              $service_id=$service_check['services_id'];
              $rate_config_id='0';
              $price=$service_check['services_rate'];
            }
          }
        }else{
          $service_check=$this->db->query(" SELECT 
                              * 
                            from services 
                            where services_department_id='".$record_data['appointment_department_id']."'
                            and services_status='1'
                            and services_group_id='2'")->row_array();
          if(empty($service_check)){
            $data['swall']=array(
              'title'=>'Consultation Service Not Found for this Department!',
              'text'=>'<b>Please Contact Admin.Service and service Rate Not Found for this Department!</b>',
              'type'=>'warning'
            );
          }else{
            $insert_status='True';
            $service_id=$service_check['services_id'];
            $rate_config_id='0';
            $price='0';
          }
          $price='0';
        }
        if($insert_status=='True'){
          $result=$this->db->insert('appointment',$record_data);
          $appointment_id=$this->db->insert_id();
          $appointment_no='IPD-'.sprintf("%010d", $appointment_id);
          $this->db->query("UPDATE appointment set appointment_status=case when date_format(appointment_timestamp,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') then 'Waiting' else 'Schedule' end,appointment_amount=0,appointment_no='".$appointment_no."' where appointment_id='".$appointment_id."'");

          $this->db->query("UPDATE bed_master set bed_appointment_id='".$appointment_id."' where bed_id='".$IBA_bed_number."'");


          $this->db->query("INSERT INTO ipd_bed_allocation (IBA_floor_id,IBA_billing_class_id,IBA_room_id, IBA_bed_id,IBA_appointment_id) VALUES ('".$IBA_floor_number."','".$IBA_ward_number."','".$IBA_room_number."','".$IBA_bed_number."','".$appointment_id."')");
          $data['status']=true;
          $data['swall']=array(
            'title'=>'Record Added!',
            'text'=>'<b>IPD Appointment Booked Successfully..!</b>',
            'type'=>'success'
          );  
        }
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

  public function ipd_payment_receipt(){
    $this->session_validate();
    if (!empty($_POST['appointment_id'])) {

      

      $receipt_appointment_id=$_POST['appointment_id'];
      $receipt_type=$_POST['payment_mode'];
      $receipt_amount=$_POST['service_charge'];
      $up_service=implode(",",$_POST['up_service']);

      
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
          

          //$this->db->query("UPDATE appointment set appointment_receipt_id='".$receipt_id."',appointment_received_amount='".$total_amount."' where appointment_id=".$receipt_appointment_id);

          $this->db->query("UPDATE appointment set appointment_received_amount=appointment_received_amount+ ".$record_data['receipt_amount']." where appointment_id=".$receipt_appointment_id);

          $up_query="
              UPDATE appointment_services_assign 
              SET ASA_receipt_id = '".$receipt_id."', ASA_payment_status = '0' 
              WHERE ASA_id IN (".$up_service.")";
         

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






  public function opd_appointment_cancel(){
    $this->session_validate();
    if (!empty($_POST['appoint_id'])) {
      $appoint_id=$_POST['appoint_id'];
      $reason=$_POST['reason'];

      $this->db->query("UPDATE appointment set appointment_status='Cancelled',appointment_cancel_remark='".$reason."' where appointment_id=".$appoint_id);

      $data['swall']=array(
        'title'=>'Record Cancelled!',
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

  

  public function opd_appointment_bill()
  {
    $rid=$this->uri->segment(2);
    $action=$this->input->get('action');
    $query="SELECT      
            concat('OPDR-',lpad(receipt_id,6,0)) as receipt_id
            ,appointment_no
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
            ,receipt_transaction_number as transaction_number
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
            where appointment_id='".$rid."'";
    $data['record']=$this->db->query($query)->row_array();
    
    $services_query="SELECT 
          services_name 
          ,ASA_service_amount
          ,department_name
          FROM appointment_services_assign 
          join services on services_id=ASA_services_id
          join department on services_department_id=department_id
          where ASA_appointment_id='".$data['record']['appointment_id']."'";
    $data['services']=$this->db->query($services_query)->result_array();
    $data['print']='False';
    if($action=='PDF'){
      $file_name=$rid.'='.date('Ymdhis').'.pdf';
      $pdfFilePath = '/home/autoqed/public_html/hospital/uploads/receipt/'.$file_name;
      shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/opd-appointment-bill/'.$rid.'?action=View" '.$pdfFilePath); 
      $responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/receipt/'.$file_name);
      $this->json_output($responce);
    }else{
      if($action=='Print'){
        $data['print']='True';
      }
      $this->load->view('vw_opd_receipt',$data);
    }
  }

  public function appointment_refund_request(){
    $this->session_validate();
    if (!empty($_POST['appointment_id'])) {
      $appointment_id=$_POST['appointment_id'];
      $status=$_POST['status'];
      if($status=='Request'){
        $this->db->query("UPDATE appointment set appointment_pay_status='Refund Request' where appointment_id='".$appointment_id."' and appointment_pay_status='Paid'");
        $data['swall']=array(
          'title'=>'Refund Requested!',
          'text'=>'<b>Refund Request has ben submitted Successfully..!</b>',
          'type'=>'success'
        );
      }else if($status=='Paid'){
        $this->db->query("UPDATE appointment set appointment_pay_status='Refund Paid' where appointment_id='".$appointment_id."' and appointment_pay_status='Refund Approved'");
        $data['swall']=array(
          'title'=>'Refund Paid!',
          'text'=>'<b>Refund Request Amount has ben Paid Successfully..!</b>',
          'type'=>'success'
        );
      }else if($status=='Approved'){
        $this->db->query("UPDATE appointment set appointment_pay_status='Refund Approved' where appointment_id='".$appointment_id."' and appointment_pay_status='Refund Request'");
        $data['swall']=array(
          'title'=>'Refund Paid!',
          'text'=>'<b>Refund Request Amount has ben Approved Successfully..!</b>',
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


  function generate_opd_casepaper()
  {
    $id=$this->uri->segment(2);
    $action=$this->input->get('action');
    $query="SELECT      
            
            concat(P_name_prefix,' ',P_first_name,' ',P_middle_name,' ',P_last_name) as patient_name
            ,concat(SUBSTRING_INDEX(calculate_age(P_dob),'-',1),' years') as patient_age
            ,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
            ,P_grn as uhid
            ,P_gender as gender
            ,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
            ,department_name
            from appointment
            join user
              on appointment_doctor_id= user_id
            join patient
              on appointment_patient_id=P_id
            join department on appointment_department_id=department_id
            where appointment_id='".$id."'";
    $data['record']=$this->db->query($query)->row_array();

    $data['print']='False';
          if($action=='PDF'){
            $file_name=$id.'='.date('Ymdhis').'.pdf';
            $pdfFilePath = '/home/autoqed/public_html/hospital/uploads/casepaper/'.$file_name;
            shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/generate-opd-casepaper/'.$id.'?action=View" '.$pdfFilePath); 
            $responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/casepaper/'.$file_name);
            $this->json_output($responce);
          }else{
            if($action=='Print'){
              $data['print']='True';
            }
            $this->load->view('vw_casepaper',$data);
          }

  }

  function generate_opd_label()
  {
    $id=$this->uri->segment(2);
    $action=$this->input->get('action');

    $query="SELECT      
            
            concat(P_name_prefix,' ',P_first_name,' ',P_middle_name,' ',P_last_name) as patient_name
            ,concat(SUBSTRING_INDEX(calculate_age(P_dob),'-',1),' years') as patient_age
            ,patient_category_name as category_name
            ,concat('Dr.',user_first_name,' ',user_middle_name,' ',user_last_name) as doctor_name
            ,patient_company_name as company_name
            ,P_grn as uhid
            ,P_gender as gender
            ,P_mobile_number as mobile_number
            ,receipt_type as payment_mode
            ,date_format(receipt_timestamp,'%d-%m-%Y %h:%i %p') as receipt_timestamp
            ,receipt_transaction_number as transaction_number
            ,receipt_amount as bill_amount
            ,appointment_id
            ,date_format(appointment_timestamp,'%d-%m-%Y %h:%i %p') as appointment_datetime
            ,department_name
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
            join department on appointment_department_id=department_id
            where appointment_id='".$id."'";
    $data['record']=$this->db->query($query)->row_array();


      $data['print']='False';
            if($action=='PDF'){
              $file_name=$id.'='.date('Ymdhis').'.pdf';
              $pdfFilePath = '/home/autoqed/public_html/hospital/uploads/label/'.$file_name;
              shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/generate-opd-label/'.$id.'?action=View" '.$pdfFilePath); 
              $responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/label/'.$file_name);
              $this->json_output($responce);
            }else{
              if($action=='Print'){
                $data['print']='True';
              }
              $this->load->view('vw_label',$data);
            }

  }

  
  public function patient_oppintment_detail()
  {
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
            join patient
              on  appointment_patient_id=P_id
            join department
              on  appointment_department_id=department_id
            join user
              on appointment_doctor_id=user_id
            join patient_category
              on appointment_patient_category_id=patient_category_id
            join patient_company
              on appointment_patient_company_id=patient_company_id
            where appointment_patient_id='".$p_id."' ")->result_array();

    }else{

      $data['swall']=array(
        'title'=>'Oops!',
        'text'=>'<b>Something Went Wrong..!</b>',
        'type'=>'warning'
      );

    }
    
    $this->json_output($data);
  }

  public function patient_services(){

    $this->session_validate();
    if (!empty($_POST['appoint_id'])) {
      $appoint_id=$_POST['appoint_id'];

      
      $query="SELECT
              ASA_id as id
              ,ASA_service_amount as samount
              ,services_name as name
              ,department_name as dname
              ,services_id as sid
              ,case when ASA_payment_status='Paid' then ''
                else concat('<label style=\"font-size:initial;font-weight:bolder; color:red;\">Cancel</label>') end as sstatus
              from appointment_services_assign
              JOIN services on ASA_services_id=services_id
              join department on services_department_id=department_id
              where ASA_appointment_id='".$appoint_id."' AND (ASA_status IS NULL or ASA_status='Pending')";

              
      $data['record']=$this->db->query($query)->result_array();

      $this->json_output($data);

      
    }
  }

    public function ipd_bill_received_amount(){

       $this->session_validate();
      if (!empty($_POST['appoint_id'])) {
        $appoint_id=$_POST['appoint_id'];

        $query="SELECT
                appointment_id
                ,appointment_no
                ,receipt_id
                ,receipt_type as mode
                ,receipt_type as mode
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

    public function ipd_appointment_bill()
  {
    $rid=$this->uri->segment(2);
    $action=$this->input->get('action');
    $query="SELECT      
            appointment_no
            ,CONCAT(LEFT(appointment_no, 3), 'R-', LPAD(receipt_id, 6, '0')) AS receipt_id
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
            ,receipt_transaction_number as transaction_number
            ,receipt_amount as bill_amount
            ,receipt_cash_amount as cash_amount
            ,receipt_bank_amount as bank_amount
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
            where receipt_id='".$rid."'";
    $data['record']=$this->db->query($query)->row_array();
    
    
    $data['print']='False';
    if($action=='PDF'){
      $file_name=$rid.'='.date('Ymdhis').'.pdf';
      $pdfFilePath = '/home/autoqed/public_html/hospital/uploads/receipt/'.$file_name;
      shell_exec('wkhtmltopdf  --page-width 210mm -O portrait "https://aqdsoft.in/ipd-appointment-bill/'.$rid.'?action=View" '.$pdfFilePath); 
      $responce=array("status"=>"True","message"=>'https://aqdsoft.in/uploads/receipt/'.$file_name);
      $this->json_output($responce);
    }else{
      if($action=='Print'){
        $data['print']='True';
      }
      $this->load->view('vw_ipd_receipt',$data);
    }
  }

  public function bed_availability()
  {
      
        $floor_no=$_POST['floor_no'];
        $billing=$_POST['billing'];
        $room_no=$_POST['room_no'];

         $query = $this->db->query("
        SELECT *
        FROM bed_master
        WHERE bed_room_id = ?
        AND bed_billing_class_id = ?
        AND bed_floor_id = ?
    ", array($room_no, $billing, $floor_no));

       $bed_data = $query->result_array();  

    if (!empty($bed_data)) {
        $response = array(
            'success' => true,
            'message' => 'Data retrieved successfully',
            'data' => $bed_data
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'No data found'
        );
    }

    echo json_encode($response);


   }


}

?>