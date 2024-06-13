<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_package_service_assignment extends MY_Controller {
    function __construct(){
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->view('vw_package_service_assignment');
    }

    public function PSA_list()
{
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
            $searchQuery .= " AND (p_name LIKE '%" . $searchValue . "%'
                   OR p_amount LIKE '%" . $searchValue . "%'
                   OR s_name LIKE '%" . $searchValue . "%'
                   OR s_amount LIKE '%" . $searchValue . "%')";
        }
       $result_query = "
    SELECT
        @sr_no:=@sr_no+1 sr_no, 
        result_data.*
    FROM (
        SELECT 
            PSA_id 
           ,package_name AS p_name
           ,services_name AS s_name
           ,package_amount AS p_amount
           ,services_rate  AS s_amount
           ,CONCAT(
                '<i class=\"fa fa-trash delete_record\" psa_id=\"', PSA_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                '<i class=\"fa fa-edit edit_record\" psa_id=\"', PSA_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
            ) AS action
        FROM package_service_assignment 
        JOIN package ON PSA_package_id = package_id
        JOIN services ON PSA_service_id = services_id
    ) result_data,
    (SELECT @sr_no:= 0) AS a
    WHERE PSA_id!=''
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


public function psa_action()
{
    $this->session_validate();
    $data = array();

    if (!empty($_POST)) {
        $package_id = $this->input->post('p_name');
        $p_amount = $this->input->post('p_amount');
        $service_ids = $this->input->post('s_name');
        $s_amount = $this->input->post('s_amount');

        $record_data = array(
            'PSA_package_id' => $package_id,
            'PSA_service_id' => $service_ids
            
        );

        if (!empty($_POST['psa_id'])) {
            $package_service_id = $_POST['psa_id'];

            $record_check = $this->db->where('PSA_id', $package_service_id)
                                     ->get('package_service_assignment')
                                     ->result_array();

            if (!empty($record_check)) {
                $this->db->where('PSA_id', $package_service_id)
                         ->update('package_service_assignment', $record_data);

                $data['status'] = true;
                $data['swall'] = array(
                    'title' => 'Record Updated!',
                    'text' => '<b>Package Services Updated Successfully..!</b>',
                    'type' => 'success'
                );
            } else {
                $data['swall'] = array(
                    'title' => 'Missing Entry',
                    'text' => '<b>Record Entry Is Not Available.</b>',
                    'type' => 'warning'
                );
            }
        } else {
            $duplicate_check = $this->db->where('PSA_package_id', $package_id)
                                        ->where('PSA_service_id', $record_data['PSA_service_id'])
                                        ->get('package_service_assignment')
                                        ->result_array();

            if (empty($duplicate_check)) {
                $this->db->insert('package_service_assignment', $record_data);
                $data['status'] = true;
                $data['swall'] = array(
                    'title' => 'Record Added!',
                    'text' => '<b>Package Services Added Successfully..!</b>',
                    'type' => 'success'
                );
            } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same Package and Service Already Exist</b>',
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

    public function packages_all(){
        $this->session_validate();
        $data['record']=$this->db->query("SELECT package_id as id,package_name as name ,package_amount as amount FROM package")->result_array();
        $this->json_output($data);
    } 
    
    public function services_all()
    {
        $this->session_validate();
        $data['record']=$this->db->query("SELECT services_id as id,services_name as name, services_rate as rate FROM services")->result_array();
        echo json_encode($data);

    }

    public function psa_delete(){
        $this->session_validate();
        if (!empty($_POST['psa_id'])) {
            $package_service_id=$_POST['psa_id'];

            $this->db->query("DELETE from package_service_assignment where PSA_id=".$package_service_id);

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

    public function package_services_by_id(){
        $this->session_validate();
        if(!empty($_POST['psa_id'])){
            $PSA=$_POST['psa_id'];
            $data['record']=$this->db->query(" SELECT 
                                               PSA_id AS id,
                                               PSA_package_id AS pname,
                                               package_amount AS  pamount,
                                               PSA_service_id AS name,
                                               services_rate AS  amount
                                               FROM package_service_assignment 
                                               JOIN package ON PSA_package_id = package_id
                                               JOIN services ON PSA_service_id = services_id
                                               where  PSA_id=".$PSA)->row_array();
            $this->json_output($data);
        }
    }


}
?>