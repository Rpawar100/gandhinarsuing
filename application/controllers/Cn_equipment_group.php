<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_equipment_group extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		 $this->load->view('vw_equipment_group');
        // $this->load->view('vw_discharge_summury');
     

	}

public function equipment_group_list()
{
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
            $searchQuery .= " AND equ_name LIKE '%" . $searchValue . "%'";

    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
                equipment_group_name AS equ_name
                ,CONCAT(
                    '<i class=\"fa fa-trash delete_record\" e_id=\"', equipment_group_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                    '<i class=\"fa fa-edit edit_record\" e_id=\"', equipment_group_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
                ) AS action
            FROM equipment_group
        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE equ_name!= ''
        " . $searchQuery;

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
	 public function equipment_group_action()
  {
    $this->session_validate();
    $data = array(); 

    if (!empty($_POST)) {
        $equipment_name = $this->input->post('equ_name');

       

        $record_data = array(
            'equipment_group_name' => $equipment_name,

        );

        if (!empty($_POST['e_id'])) {
            $equ_id = $_POST['e_id'];

            $record_check = $this->db->query("SELECT * FROM equipment_group WHERE equipment_group_id='" . $_POST['e_id'] . "'")->result_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->query("SELECT * FROM equipment_group WHERE equipment_group_name='" . $record_data['equipment_group_name'] . "' AND equipment_group_id!='" . $equ_id . "'")->result_array();
                if (empty($duplicate_check)) {
                	
                    $this->db->where('equipment_group_id', $equ_id);
                    $this->db->update('equipment_group', $record_data);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>Equipment Group Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same Equipment Group Name Already Exist</b>',
                        'type' => 'warning'
                    );
                }
            } else {
                $data['swall'] = array(
                    'title' => 'Missing Entry',
                    'text' => '<b>Record Entry Is Not Available.</b>',
                    'type' => 'warning'
                );
            }
        } else {
            $duplicate_check = $this->db->query("SELECT * FROM equipment_group WHERE equipment_group_name='" . $record_data['equipment_group_name'] . "'")->result_array();
             if (empty($duplicate_check)) {
                $this->db->insert('equipment_group', $record_data);
                 $data['status'] = true;
                $data['swall'] = array(
                     'title' => 'Record Added!',
                    'text' => '<b>Equipment  Group Added Successfully..!</b>',
                     'type' => 'success'
                );
             } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same Equipment Group Name Already Exist</b>',
                    'type' => 'warning'
                );
            }
        }
    } else {
        $data['swall'] = array(
            'title' => 'Oops!',
            'text' => '<b>Something Went Wrong..!</b>',
            'type' => 'warning'
        );
    }

    $this->json_output($data);
 }
	public function equipment_group_delete(){
		$this->session_validate();
		if (!empty($_POST['e_id'])) {
			$equ_id=$_POST['e_id'];

			$this->db->query("DELETE from equipment_group where equipment_group_id=".$equ_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Equipment Group Deleted Successfully..!</b>',
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

	public function equipment_group_by_id(){
		$this->session_validate();
		if(!empty($_POST['e_id'])){
			$equ_id=$_POST['e_id'];
            
			$data['record']=$this->db->query("	SELECT 
                                                 equipment_group_name as equ_name 
                                                FROM equipment_group where equipment_group_id=".$equ_id)->row_array();
			$this->json_output($data);
		}
	}

	 public function equipment_group_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT equipment_group_id as id,equipment_group_name as name FROM equipment_group ")->result_array();
		echo json_encode($data);
	}

}
?>