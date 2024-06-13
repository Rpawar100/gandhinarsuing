<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_mrd_doc extends MY_Controller {
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){   
        $this->session_validate();
        $this->load->view('vw_mrd_doc');
    }

    public function mrd_doc_list()
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
        $searchQuery .= " AND mrd_name LIKE '%" . $searchValue . "%'";
    }

    $result_query = "
        SELECT
            @sr_no:=@sr_no+1 sr_no, 
            result_data.*
        FROM (
            SELECT 
                mrd_doc_name AS mrd_name,
                CONCAT(
                    '<i class=\"fa fa-trash delete_record\" m_id=\"', mrd_doc_id, '\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>',
                    '<i class=\"fa fa-edit edit_record\" m_id=\"', mrd_doc_id, '\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>'
                ) AS action
            FROM mrd_document
        ) result_data,
        (SELECT @sr_no:= 0) AS a
        WHERE mrd_name!= ''
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
     public function mrd_doc_action()
  {
    $this->session_validate();
    $data = array(); 

    if (!empty($_POST)) {
        $mrd_doc_name = $this->input->post('mrd_name');
       

        $record_data = array(
            'mrd_doc_name' => $mrd_doc_name,
        );

        if (!empty($_POST['m_id'])) {
            $mrd_id = $_POST['m_id'];

            $record_check = $this->db->query("SELECT * FROM mrd_document WHERE mrd_doc_id='" . $_POST['m_id'] . "'")->result_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->query("SELECT * FROM mrd_document WHERE mrd_doc_name='" . $record_data['mrd_doc_name'] . "' AND mrd_doc_id!='" . $mrd_id . "'")->result_array();
                if (empty($duplicate_check)) {
                    
                    $this->db->where('mrd_doc_id', $mrd_id);
                    $this->db->update('mrd_document', $record_data);
                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>mrd doc Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same mrd doc Name Already Exist</b>',
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
            $duplicate_check = $this->db->query("SELECT * FROM mrd_document WHERE mrd_doc_name='" . $record_data['mrd_doc_name'] . "'")->result_array();
             if (empty($duplicate_check)) {
                $this->db->insert('mrd_document', $record_data);
                 $data['status'] = true;
                $data['swall'] = array(
                     'title' => 'Record Added!',
                    'text' => '<b>MRD doc Added Successfully..!</b>',
                     'type' => 'success'
                );
             } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same mrd doc Name Already Exist</b>',
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
    public function mrd_doc_delete(){
        $this->session_validate();
        if (!empty($_POST['m_id'])) {
            $mrd_id=$_POST['m_id'];

            $this->db->query("DELETE from mrd_document where mrd_doc_id=".$mrd_id);

            $data['swall']=array(
                'title'=>'Record Deleted!',
                'text'=>'<b>MRD doc Deleted Successfully..!</b>',
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

    public function mrd_doc_by_id(){
        $this->session_validate();
        if(!empty($_POST['m_id'])){
            $mrd_id=$_POST['m_id'];
            // echo($mrd_id);
            // die();
            $data['record']=$this->db->query("  SELECT 
                                                 mrd_doc_name as mrd_name       
                                                FROM mrd_document where mrd_doc_id=".$mrd_id)->row_array();
            $this->json_output($data);
        }
    }

     public function mrd_doc_all(){
        $this->session_validate();
        $data['record']=$this->db->query("  SELECT mrd_doc_id as id,mrd_doc_name as name FROM mrd_document ")->result_array();
        echo json_encode($data);
    }

}
?>
