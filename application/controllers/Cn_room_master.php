<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_room_master extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_room_master');
	}

   public function room_list()
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
                      OR Ward_name LIKE '%" . $searchValue . "%'
                      OR room_name LIKE '%" . $searchValue . "%'
                      OR room_type LIKE '%" . $searchValue . "%')";
    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
                floor_name AS fr_name
               ,BC_name AS bc_name
               ,room_name AS r_name
               ,case when bed_number is null then 
                concat('<label class=\"add_bed_name\" bed_id=\"', bed_id, '\" style=\"color:blue;font-size:15px;margin: 0px 10px;\">ADD</label>')
                    else bed_number end as bed_number

               ,CONCAT( 
                    '<i class=\"fa fa-trash delete_record\" bed_id=\"', bed_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                    '<i class=\"fa fa-edit edit_record\" bed_id=\"', bed_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
                ) AS action
            FROM bed_master
            JOIN room_master ON bed_room_id = room_id
            join floor_master on room_floor_id=floor_id
            JOIN billing_class on room_billing_class_id=BC_id
        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE r_name != ''
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

public function room_action()
  {
    $this->session_validate();
    $data = array(); // Initialize $data array

    if (!empty($_POST)) {
    	 $floor_id = $this->input->post('floor_id');
         $bc_id  = $this->input->post('bc_id');
         $room_name = $this->input->post('room_number');
         $bed_strength = $this->input->post('bed_strength');

        

        if (!empty($_POST['bed_id'])) {

            $bed_id = $_POST['bed_id'];

            $record_data1 = array(
                
                'bed_floor_id' => $floor_id,
                'bed_billing_class_id' => $bc_id,
                'bed_number' => $bed_strength,

            );

            $record_check1 = $this->db->query("SELECT * FROM bed_master WHERE bed_id='" . $_POST['bed_id'] . "'")->result_array();

            if (!empty($record_check1)) {
                $duplicate_check1 = $this->db->query("SELECT * FROM bed_master WHERE bed_number='" . $record_data1['bed_number'] . "' AND bed_id!='" . $bed_id . "'")->result_array();
                if (empty($duplicate_check1)) {
                	
                    $this->db->where('bed_id', $bed_id);
                    $this->db->update('bed_master', $record_data1);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>Room  Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same Room Name Already Exist</b>',
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

            $record_data = array(
                'room_name' => $room_name,
                'room_floor_id' => $floor_id,
                'room_billing_class_id' => $bc_id,
                'room_bed_strength' => $bed_strength,
            );

            $duplicate_check = $this->db->query("SELECT * FROM room_master WHERE room_name='" . $record_data['room_name'] . "'")->result_array();
             

            if (!empty($duplicate_check)) {
               
               $this->db->query("DELETE from room_master where room_name='".$record_data['room_name'] ."'");
             }

               $this->db->insert('room_master', $record_data);

               $last_id=$this->db->insert_id();

                for($i=0;$i<$bed_strength;$i++){

                    $this->db->query("INSERT into bed_master(bed_room_id,bed_billing_class_id,bed_floor_id)values($last_id,'".$record_data['room_billing_class_id']."','".$record_data['room_floor_id']."')");
                }
                $data['status'] = true;
                $data['swall'] = array(
                    'title' => 'Record Added!',
                    'text' => '<b>Room Name Added Successfully..!</b>',
                    'type' => 'success'
                );
             
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
 public function room_delete(){
		$this->session_validate();
		if (!empty($_POST['bed_id'])) {
			$bed_id=$_POST['bed_id'];

			$this->db->query("DELETE from bed_master where bed_id=".$bed_id);
			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Bed Deleted Successfully..!</b>',
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


	public function room_by_id(){
		$this->session_validate();
		if(!empty($_POST['bed_id'])){
			$bed_id=$_POST['bed_id'];
			$data['record']=$this->db->query(" SELECT 
                                                 bed_id as id
                                                ,bed_number AS b_number
                                                ,bed_floor_id as floor_id
                                                ,bed_billing_class_id as billing_class_id
                                                ,room_name as r_name
                                                FROM bed_master 
                                                JOIN room_master on bed_room_id=room_id
                                                where bed_id=".$bed_id)->row_array();
			$this->json_output($data);
		}
	}

	public function room_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT room_id as id,room_name as name FROM room_master ")->result_array();
		echo json_encode($data);
	}

    public function OT_room_all(){
        $this->session_validate();
        $data['record']=$this->db->query(" SELECT room_id as id,room_name as name FROM room_master where room_billing_class_id=19")->result_array();
        echo json_encode($data);
    }

    public function room_by_ward_id(){

        $this->session_validate();
        if(!empty($_POST['ward_id'])){
            $ward_id=$_POST['ward_id'];
            $data['record']=$this->db->query("  SELECT room_id AS id,room_name as name
                                                FROM room_master    
                                                where room_billing_class_id=".$ward_id)->result_array();
            $this->json_output($data);
        }

    }

    public function add_bed_name_action(){
    $this->session_validate();
        if (!empty($_POST)) {
                
             $bed_id= $this->input->post('b_id');
             $bed_name = $this->input->post('bed_number');

             $result=$this->db->query("UPDATE bed_master set bed_number='".$bed_name."' where bed_id='".$bed_id."'");

             $data['swall']=array(
                    'title'=>'Record Updated!',
                    'text'=>'<b>Bed Name Updated Successfully..!</b>',
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
    

}
?>