<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_packages extends MY_Controller {
    function __construct(){
        parent::__construct();
        
    }

    public function index()
    {
        $data['services'] = $this->My_Model->get_services();
        //print_r($data);die;
        $this->load->view('vw_packages', $data);
    }

    public function package_list()
    {
        $this->session_validate();
        $draw = $_POST['draw'];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $searchQuery = "";

        for ($i = 0; $i < count($_POST['columns']); $i++) {
            if (!empty($_POST['columns'][$i]['search']['value'])) {
                $searchQuery .= " AND " . $_POST['columns'][$i]['data'] . " like '" . $_POST['columns'][$i]['search']['value'] . "%'";
            }
        }

        if ($searchValue != '') {
            $searchQuery .= " AND (name LIKE '%" . $searchValue . "%'
                   OR d_name LIKE '%" . $searchValue . "%'
                   OR amount LIKE '%" . $searchValue . "%')";
        }
       $result_query = "
    SELECT
        @sr_no:=@sr_no+1 sr_no, 
        result_data.*
    FROM (
        SELECT 
            package_id AS id,
            package_name AS name,
            department_name AS d_name,
            package_amount AS amount,
            CONCAT(
                '<i class=\"fa fa-trash delete_record\" p_id=\"', package_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                '<i class=\"fa fa-edit edit_record\" p_id=\"', package_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
            ) AS action
        FROM package
        JOIN department ON package_department_id = department_id
        GROUP BY id
    ) result_data,
    (SELECT @sr_no:= 0) AS a
    WHERE name!=''
    ".$searchQuery;

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

  public function package_action()
  {
    $this->session_validate();
    $data = array(); // Initialize $data array

    if (!empty($_POST)) {
        $package_name = $this->input->post('package_name');
        $d_name = $this->input->post('d_name');
        $package_amount = $this->input->post('package_amount');

        $record_data = array(
            'package_name' => $package_name,
            'package_department_id' => $d_name,
            'package_amount' => $package_amount
        );

        if (!empty($_POST['p_id'])) {
            $package_id = $_POST['p_id'];

            $record_check = $this->db->query("SELECT * FROM package WHERE package_id='" . $_POST['p_id'] . "'")->result_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->query("SELECT * FROM package WHERE package_name='" . $record_data['package_name'] . "' AND package_id!='" . $package_id . "'")->result_array();
                if (empty($duplicate_check)) {
                	
                    $this->db->where('package_id', $package_id);
                    $this->db->update('package', $record_data);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>Package Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same Package Name Already Exist</b>',
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
            $duplicate_check = $this->db->query("SELECT * FROM package WHERE package_name='" . $record_data['package_name'] . "'")->result_array();
             if (empty($duplicate_check)) {
                $this->db->insert('package', $record_data);
                 $data['status'] = true;
                $data['swall'] = array(
                     'title' => 'Record Added!',
                    'text' => '<b>Package Added Successfully..!</b>',
                     'type' => 'success'
                );
             } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same Package Name Already Exist</b>',
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


    public function package_by_id(){
		$this->session_validate();
		if(!empty($_POST['p_id'])){
			$package_id=$_POST['p_id'];
			$data['record']=$this->db->query("	SELECT package_name as name,
			                                    package_department_id as d_name,
			                                    package_amount as amount
												FROM package where package_id=".$package_id)->row_array();
			$this->json_output($data);
		}
	}



    public function package_delete(){
		$this->session_validate();
		if (!empty($_POST['p_id'])) {
			$package_id=$_POST['p_id'];

			$this->db->query("DELETE from package where package_id=".$package_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>package Deleted Successfully..!</b>',
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

    public function packages_all(){
        $this->session_validate();
        $data['record']=$this->db->query("SELECT package_id as id,package_name as name FROM package")->result_array();
        $this->json_output($data);
    }    

}
?>






