<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_discharge_gynaecology extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		 
      $this->load->view('vw_discharge_Gynaecology');
     // $this->load->view('vw_Doctor_initial_assessment_gynaecology');

      

	}

	public function discharge_gynaecology_action()
{
    $this->session_validate();
    $data = array(); 

    if (!empty($_POST)) {
        $Discharge_Type = $this->input->post('dsc_type');
        $Consultant_Name = $this->input->post('consultant_name');
        $Admission_Diagnosis = $this->input->post('admission_diagnosis');
        $C_O = $this->input->post('c_o');
        $LMP = $this->input->post('lmp');
        $EDD = $this->input->post('edd');
        $O_H = $this->input->post('o_h');
        $M_L = $this->input->post('m_l');
        $P_M_H = $this->input->post('p_m_h');
        $P_SX_H = $this->input->post('p_sx_h');
        $F_h = $this->input->post('f_h');
        $Allergy_History = $this->input->post('allergy_history');
        $General_Condition = $this->input->post('general_condition');
        $B_P = $this->input->post('b_p');

        $P = $this->input->post('p');
        $SPO_2 = $this->input->post('SPO_2');
        $CVS = $this->input->post('cvs');
        $CNS = $this->input->post('cns');
        $RS = $this->input->post('rs');
        $Uterus = $this->input->post('uterus');
        $FSH = $this->input->post('fsh');
        $Foetal_Movement = $this->input->post('foetal_movement');
        $NST = $this->input->post('nst');
        $Per_Vaginum = $this->input->post('Plv');
        $Date = $this->input->post('date');
        $HB = $this->input->post('h_b');
        $WBC = $this->input->post('wbc');
        $P_L = $this->input->post('p_l');
        $Uric_Acid = $this->input->post('uric_acid');
        $SGOT = $this->input->post('sgot');
        $SGPT = $this->input->post('sgpt');
        $HIV = $this->input->post('hiv');
        $HBSAG = $this->input->post('hbsag');
        $Urine_Albumin = $this->input->post('urine_albumin');
        $Serium_Cr = $this->input->post('serium_cr');
        $Peripheral_Smear = $this->input->post('peripheral_smear');
        $Rbc_Morphology = $this->input->post('rbc_morphology');
        $Wbc_Morphology = $this->input->post('wbc_morphology');
        $Platelets_On_Smear = $this->input->post('platelets_on_smear');
        $USG = $this->input->post('USG');
        $D_ate = $this->input->post('Date');
        $Time = $this->input->post('Time');
        $Procedure_name = $this->input->post('procedure_name');
        $Indication = $this->input->post('indication');
        $Gender = $this->input->post('Gender');
        $Time = $this->input->post('time');
        $k_g = $this->input->post('k_g');
        $D_Ate = $this->input->post('D_ate');

        $Intra_Operative_Findings = $this->input->post('intra_operative_findings');
        $Course_In_Hospital = $this->input->post('course_in_hospital');
        $Medical_During_Hospital = $this->input->post('medical_during_hospital');
        $Advice = $this->input->post('advice');
        $In_Case_Of = $this->input->post('in_case_of');
        $Contact_Dr = $this->input->post('contact_dr');



        $record_data = array(
            'dsg_discharge_type' => $Discharge_Type,
            'dsg_consultant_name' => $Consultant_Name,
            'dsg_admission_diagnosis' => $Admission_Diagnosis,
            'dsg_co' => $C_O,
            'dsg_lmp' => $LMP ,
            'dsg_edd' => $EDD,
            'dsg_oh' => $O_H,
            'dsg_ml' => $M_L,
            'dsg_pmh' => $P_M_H,
            'dsg_psxh' => $P_SX_H,
            'dsg_fh' => $F_h,
            'dsg_allergy_history' => $Allergy_History,
            'dsg_general_condition	' => $General_Condition,
            'dsg_bp' => $B_P,
            'dsg_p' => $P,
            'dsg_spo2' => $SPO_2,
            'dsg_cvs' => $CVS,
            'dsg_cns' => $CNS,
            'dsg_rs' => $RS,
            'dsg_uterus' => $Uterus,
            'dsg_fsh' => $FSH,
            'dsg_foetal_movement' => $Foetal_Movement,
            'dsg_nst' => $NST,
            'dsg_plv' => $Per_Vaginum,
            'dsg_investigation_date' => $Date,
            'dsg_hb' => $HB,
            'dsg_wbc' => $WBC,
            'dsg_pl' => $P_L,
            'dsg_uric_acide' => $Uric_Acid,
            'dsg_sgot' => $SGOT,
            'dsg_sgpt' => $SGPT,
            'dsg_hiv' => $HIV,
            'dsg_hbsag' => $HBSAG,
            'dsg_urine_albumin' => $Urine_Albumin,
            'dsg_serium_cr' => $Serium_Cr,
            'dsg_peripheral_smear' => $Peripheral_Smear,
            'dsg_rcb_morphology	' => $Rbc_Morphology,
            'dsg_wbc_morphology' => $Wbc_Morphology,
            'dsg_platelets_on_smear	' => $Platelets_On_Smear,
            'dsg_usg' => $USG,
            'dsg_procedure_date' => $D_ate,
            'dsg_procedure_time' => $Time,
            'dsg_procedure_name' => $Procedure_name,
            'dsg_indication' => $Indication,
            'dsg_nb_gender_type' => $Gender,
            'dsg_nb_time' => $Time,
            'dsg_nb_kg' => $k_g,
            'dsg_nb_date' => $D_Ate,
            'dsg_intra_operative_findings	' => $Intra_Operative_Findings,
            'dsg_course_in_hospital' => $Course_In_Hospital,
            'dsg_medical_during_hospital' => $Medical_During_Hospital,
            'dsg_advice' => $Advice,
            'dsg_in_case_of' => $In_Case_Of,
            'dsg_contact_dr' => $Contact_Dr,


        );

        $this->db->insert('discharge_summary_gynaecology', $record_data);
        $data['status'] = true;
        $data['swall'] = array(
            'title' => 'Record Added!',
            'text' => '<b>Discharge GynaecologySummary Added Successfully..!</b>',
            'type' => 'success'
        );
    } else {
        $data['swall'] = array(
            'title' => 'Oops!',
            'text' => '<b>Something Went Wrong..!</b>',
            'type' => 'warning'
        );
    }

    $this->json_output($data);
}
}
?>
