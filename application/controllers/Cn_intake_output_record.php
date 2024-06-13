<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_intake_output_record extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}

	public function index(){   
	  $this->session_validate();
      // $this->load->view('vw_discharge_Gynaecology');
      $this->load->view('vw_intake_output_record');
	}

    public function intake_output_record_action(){
        $this->session_validate();
        if (!empty($_POST)) {
            $intake_data=json_decode($_POST['tableData']);
            
            foreach ($intake_data as $intake_entry) {

                $record_data = array(
                    'intake_time' => $intake_entry->{'time'},
                    'intake_oral' => $intake_entry->{'oral'},
                    'intake_rt' => $intake_entry->{'rt'},
                    'intake_iv' => $intake_entry->{'iv'},
                    'intake_other' => $intake_entry->{'other'},
                    'intake_running_total' => $intake_entry->{'running_total'},
                    'intake_urine' => $intake_entry->{'urine'},
                    'intake_rt_asp' => $intake_entry->{'rt_asp'},
                    'intake_otherr' => $intake_entry->{'o_ther'},
                    'intake_runningtotal' => $intake_entry->{'runningtotal'},
                    'intake_initial' => $intake_entry->{'initial'},
                    'intake_total_intake' => $intake_entry->{'intake'},
                    'intake_total_output' => $intake_entry->{'output'},
                );

                $this->db->insert(' intake_output_record',$record_data);
            }

            $data['status']=true;
            $data['swall']=array(
                'title'=>'Record Added!',
                'text'=>'<b>Intake Added Successfully..!</b>',
                'type'=>'success'
            );

        }
        else {
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
