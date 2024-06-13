<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_bed_master extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_bed_master');
	}

   public function bed_list()
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
        $searchQuery .= " AND (floor_no LIKE '%" . $searchValue . "%'
                      OR ward_name LIKE '%" . $searchValue . "%'
                      OR room_name LIKE '%" . $searchValue . "%'                      
                      OR bed_no LIKE '%" . $searchValue . "%')";
    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
               bed_floor_id AS fr_no
               ,ward_name AS w_name
               ,room_name AS r_name
               ,bed_name AS b_no
               ,floor_name AS floor_name
               ,CONCAT( 
                    '<i class=\"fa fa-trash delete_record\" b_id=\"', bed_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                    '<i class=\"fa fa-edit edit_record\" b_id=\"', bed_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
                ) AS action
            FROM bed_master
            JOIN floor_master ON bed_floor_id = floor_id
            JOIN ward_master ON bed_ward_id = ward_id
            JOIN room_master ON bed_room_id = room_id

        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE b_no != ''
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

public function bed_action()
  {
    $this->session_validate();
    $data = array(); // Initialize $data array

    if (!empty($_POST)) {
    	 $floor_no = $this->input->post('floor_no');
         $ward_name = $this->input->post('ward_name');
         $room_name = $this->input->post('room_name');
         $bed_no = $this->input->post('bed_no');


        $record_data = array(
            'bed_floor_id' => $floor_no,
            'bed_ward_id' => $ward_name,
            'bed_room_id' => $room_name,
            'bed_name' => $bed_no,

        );

        if (!empty($_POST['b_id'])) {
            $bed_id = $_POST['b_id'];

            $record_check = $this->db->query("SELECT * FROM bed_master WHERE bed_id='" . $_POST['b_id'] . "'")->result_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->query("SELECT * FROM bed_master WHERE bed_no='" . $record_data['bed_no'] . "' AND bed_id!='" . $bed_id . "'")->result_array();
                if (empty($duplicate_check)) {
                	
                    $this->db->where('bed_id', $bed_id);
                    $this->db->update('bed_master', $record_data);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>Bed  Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same Bed No Already Exist</b>',
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
            $duplicate_check = $this->db->query("SELECT * FROM bed_master WHERE bed_name='" . $record_data['bed_name'] . "'")->result_array();
             if (empty($duplicate_check)) {
                $this->db->insert('bed_master', $record_data);
                 $data['status'] = true;
                $data['swall'] = array(
                     'title' => 'Record Added!',
                    'text' => '<b>Bed No Added Successfully..!</b>',
                     'type' => 'success'
                );
             } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same Bed No Already Exist</b>',
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
 public function bed_delete(){
		$this->session_validate();
		if (!empty($_POST['b_id'])) {
			$bed_id=$_POST['b_id'];

			$this->db->query("DELETE from bed_master where bed_id=".$bed_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Bed  Deleted Successfully..!</b>',
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


	public function bed_by_id(){
		$this->session_validate();
		if(!empty($_POST['b_id'])){
			$bed_id=$_POST['b_id'];
			$data['record']=$this->db->query("	SELECT bed_no AS b_no
								                ,bed_floor_id   AS f_no
								                ,bed_ward_id   AS w_name
                                                ,bed_room_id   AS r_name  
								                FROM bed_master 	
                                                where bed_id=".$bed_id)->row_array();
			$this->json_output($data);
		}
	}

    public function bed_by_room_id(){
        $this->session_validate();
        if(!empty($_POST['room_id'])){
            $room_id=$_POST['room_id'];

            $data['record']=$this->db->query("SELECT bed_id AS id
                                                ,bed_number as name
                                                FROM bed_master     
                                                where bed_room_id='".$room_id."'")->result_array();
            $this->json_output($data);
        }
    }


}
?>