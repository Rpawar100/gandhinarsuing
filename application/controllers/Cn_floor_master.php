<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_floor_master extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_floor_master');
	}

	public function floor_list()
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
        $searchQuery .= " AND floor_no LIKE '%" . $searchValue . "%'";
    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
                floor_id as id
                ,floor_name AS fr_no,
                CONCAT(
                    '<i class=\"fa fa-trash delete_record\" fr_id=\"', floor_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                    '<i class=\"fa fa-edit edit_record\" fr_id=\"', floor_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
                ) AS action
            FROM floor_master
        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE fr_no != ''
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
	 public function Floor_action()
  {
    $this->session_validate();
    $data = array(); 
    $floor_no = $this->input->post('floor_no');

    if (!empty($_POST)) {
       
       

        $record_data = array(
            'floor_name' => $floor_no,
        );

        if (!empty($_POST['fr_id'])) {
            $floor_id = $_POST['fr_id'];

            $record_check = $this->db->query("SELECT * FROM floor_master WHERE floor_id='" . $_POST['fr_id'] . "'")->result_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->query("SELECT * FROM floor_master WHERE floor_no='" . $record_data['floor_no'] . "' AND floor_id!='" . $floor_id . "'")->result_array();
                if (empty($duplicate_check)) {
                	
                    $this->db->where('floor_id', $floor_id);
                    $this->db->update('floor_master', $record_data);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>Floor Name Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same Floor Name Already Exist</b>',
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
            $duplicate_check = $this->db->query("SELECT * FROM floor_master WHERE floor_name='". $record_data['floor_name'] . "'")->result_array();
             if (empty($duplicate_check)) {
                $this->db->insert('floor_master', $record_data);
                 $data['status'] = true;
                $data['swall'] = array(
                     'title' => 'Record Added!',
                    'text' => '<b>Floor Added Successfully..!</b>',
                     'type' => 'success'
                );
             } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same Floor Name Already Exist</b>',
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
	public function floor_delete(){
		$this->session_validate();
		if (!empty($_POST['fr_id'])) {
			$floor_id=$_POST['fr_id'];

			$this->db->query("DELETE from floor_master where floor_id=".$floor_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Floor Deleted Successfully..!</b>',
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

	public function floor_by_id(){
		$this->session_validate();
		if(!empty($_POST['fr_id'])){
			$floor_id=$_POST['fr_id'];
			$data['record']=$this->db->query("	SELECT 
														floor_no as fr_no
												FROM floor_master where floor_id=".$floor_id)->row_array();
			$this->json_output($data);
		}
	}

	 public function floor_all(){
		$this->session_validate();
		$data['record']=$this->db->query("	SELECT floor_id as id,floor_name as name FROM floor_master ")->result_array();
		echo json_encode($data);
	}

}
?>