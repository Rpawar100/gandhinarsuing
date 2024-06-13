<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_room_type extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_room_type');
	}

	public function room_type_list()
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
        $searchQuery .= " AND r_type LIKE '%" . $searchValue . "%'";
    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
                room_type AS r_type,
                CONCAT(
                    '<i class=\"fa fa-trash delete_record\" r_id=\"', room_type_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                    '<i class=\"fa fa-edit edit_record\" r_id=\"', room_type_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
                ) AS action
            FROM room_type
        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE r_type != ''
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
	 public function room_type_action()
  {
    $this->session_validate();
    $data = array(); 

    if (!empty($_POST)) {
        $room_type = $this->input->post('room_type');
       

        $record_data = array(
            'room_type' => $room_type,
        );

        if (!empty($_POST['r_id'])) {
            $room_type_id = $_POST['r_id'];

            $record_check = $this->db->query("SELECT * FROM room_type WHERE room_type_id='" . $_POST['r_id'] . "'")->result_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->query("SELECT * FROM room_type WHERE room_type='" . $record_data['room_type'] . "' AND room_type_id!='" . $room_type_id . "'")->result_array();
                if (empty($duplicate_check)) {
                	
                    $this->db->where('room_type_id', $room_type_id);
                    $this->db->update('room_type', $record_data);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>Room Type Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same Room Type Already Exist</b>',
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
            $duplicate_check = $this->db->query("SELECT * FROM room_type WHERE room_type='" . $record_data['room_type'] . "'")->result_array();
             if (empty($duplicate_check)) {
                $this->db->insert('room_type', $record_data);
                 $data['status'] = true;
                $data['swall'] = array(
                     'title' => 'Record Added!',
                    'text' => '<b>Room Type Added Successfully..!</b>',
                     'type' => 'success'
                );
             } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same Room Type Already Exist</b>',
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
	public function room_type_delete(){
		$this->session_validate();
		if (!empty($_POST['r_id'])) {
			$room_type_id=$_POST['r_id'];

			$this->db->query("DELETE from room_type where room_type_id=".$room_type_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Room Type Deleted Successfully..!</b>',
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

	public function room_type_by_id(){
		$this->session_validate();
		if(!empty($_POST['r_id'])){
			$room_type_id=$_POST['r_id'];
			$data['record']=$this->db->query("	SELECT 
												room_type as r_type
												FROM room_type where room_type_id=".$room_type_id)->row_array();
			$this->json_output($data);
		}
	}
    
    public function room_type_all(){
        $this->session_validate();
        $data['record']=$this->db->query("  SELECT room_type_id as id, room_type as name FROM room_type ")->result_array();
        echo json_encode($data);
    }
	 
}
?>