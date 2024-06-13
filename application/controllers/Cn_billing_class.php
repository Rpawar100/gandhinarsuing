<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_billing_class extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_billing_class');
	}

	public function billing_class_list()
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
        $searchQuery .= " AND (ward_name LIKE '%" . $searchValue . "%'
                      OR floor_no LIKE '%" . $searchValue . "%')";
    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
                 BC_name AS id
                ,BC_name AS name
                ,CONCAT(
                    '<i class=\"fa fa-trash delete_record\" BC_id=\"', BC_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                    '<i class=\"fa fa-edit edit_record\" BC_id=\"', BC_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
                ) AS action
            FROM billing_class
        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE name != ''
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

public function billing_class_action()
  {
    $this->session_validate();
    $data = array(); // Initialize $data array

    if (!empty($_POST)) {
        $bc_name = $this->input->post('bc_name');

        $record_data = array(
            'BC_name' => $bc_name,
        );

        if (!empty($_POST['bc_id'])) {
            $bc_id = $_POST['bc_id'];

            $record_check = $this->db->query("SELECT * FROM billing_class WHERE BC_id='" . $_POST['bc_id'] . "'")->result_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->query("SELECT * FROM billing_class WHERE BC_name='" . $record_data['BC_name'] . "' AND BC_id!='" . $bc_id . "'")->result_array();
                if (empty($duplicate_check)) {
                	
                    $this->db->where('BC_id', $bc_id);
                    $this->db->update('billing_class', $record_data);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>Billing Class Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same Billing Class Already Exist</b>',
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
            $duplicate_check = $this->db->query("SELECT * FROM billing_class WHERE BC_name='" . $record_data['BC_name'] . "'")->result_array();
             if (empty($duplicate_check)) {
                $this->db->insert('billing_class', $record_data);
                 $data['status'] = true;
                $data['swall'] = array(
                     'title' => 'Record Added!',
                    'text' => '<b>Billing Class Added Successfully..!</b>',
                     'type' => 'success'
                );
             } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same Ward Name Already Exist</b>',
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

public function billing_class_delete(){
		$this->session_validate();
		if (!empty($_POST['BC_id'])) {
			$BC_id=$_POST['BC_id'];

			$this->db->query("DELETE from billing_class where BC_id=".$BC_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Billing Class Deleted Successfully..!</b>',
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


	public function billing_class_by_id(){
		$this->session_validate();
		if(!empty($_POST['BC_id'])){
			$BC_id=$_POST['BC_id'];
			$data['record']=$this->db->query("	SELECT BC_id as id
			                                    ,BC_name as name
												FROM billing_class where BC_id=".$BC_id)->row_array();
			$this->json_output($data);
		}
	}

    public function ward_by_floor_id(){
        $this->session_validate();
        if(!empty($_POST['floor_id'])){
            $floor_id=$_POST['floor_id'];
            $data['record']=$this->db->query(" SELECT ward_id as id,
                                                ward_name as name
                                                FROM ward_master where ward_floor_id=".$floor_id)->result_array();
            $this->json_output($data);
        }
    }
   

 public function billing_class_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT BC_id as id,BC_name as name FROM billing_class")->result_array();
		 $this->json_output($data);
	}

}
?>