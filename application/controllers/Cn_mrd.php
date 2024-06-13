<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_mrd extends MY_Controller {
    function __construct(){
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->view('vw_mrd');
    }

    public function mrd_list()
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
            $searchQuery .= " AND (app_no LIKE '%" . $searchValue . "%'
                   OR mrdDocId LIKE '%" . $searchValue . "%'
                   OR mrdurl LIKE '%" . $searchValue . "%')";
        }
       $result_query = "
    SELECT
        @sr_no:=@sr_no+1 sr_no, 
        result_data.*
    FROM (
        SELECT 
            mrd_id 
           ,appointment_no AS app_no
           ,mrd_doc_name
           ,CASE 
            WHEN mrd_mrd_doc_id = 0 
            OR mrd_mrd_doc_id IS NULL
            OR mrd_doc_name = '' THEN 'Other' 
            ELSE mrd_doc_name 
            END AS mrdDocId
           ,mrd_url AS mrdurl

           ,CASE
           WHEN mrd_status IS NULL
           THEN
           CONCAT(
               
                '<i class=\"fa fa-times change_state\" m_id=\"', mrd_id, '\" m_status=\"\"  style=\"color:red;cursor: pointer;font-size:20px;margin: 0px 10px;\"></i>',

                '<i class=\"fa fa-edit edit_record\" m_id=\"', mrd_id, '\" style=\"color:royalblue;cursor: pointer;font-size:20px;margin: 0px 10px;\"></i>')


            ELSE   CONCAT(
            '<lable class=\"change_state\" m_id=\"', mrd_id, '\" m_status=\"', mrd_status, '\" style=\"color:red;cursor: pointer;\"><b>Cancelled</b></lable>'
        )                          
            END AS action 
           
        FROM mrd
        JOIN appointment ON appointment_id =mrd_appoinment_id 
        LEFT JOIN mrd_document ON mrd_mrd_doc_id = mrd_doc_id
         

    ) result_data,
    (SELECT @sr_no:= 0) AS a
    WHERE mrd_id!=''
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




public function mrd_action()
{
    $this->session_validate();
    $user_id=$_SESSION['id'];

    $data = array();

    if (!empty($_POST)) {
        // Get form data
        $appo_no = $this->input->post('app_no');
        $mrddoc_id = $this->input->post('mrdDocId');
        $mrd_name = $this->input->post('mrdname');


   if (!empty($_FILES['mrdurl']['name'][0])) {
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/hospital/uploads/mrd_docs/';
            $uploadedFiles = [];

            foreach ($_FILES['mrdurl']['name'] as $key => $fileName) {
                $tempFilePath = $_FILES['mrdurl']['tmp_name'][$key];
                $fileUrl =base_url().'/uploads/mrd_docs/' . $fileName; // Construct the URL

                $uploadedFiles[] = $fileUrl;

                move_uploaded_file($tempFilePath, $uploadDirectory . $fileName);
            }

            $mrdurl = implode(',', $uploadedFiles);
        } else {
            $mrdurl = '';
        }
      
        $record_data = array(
            'mrd_appoinment_id' => $appo_no,
            'mrd_mrd_doc_id' => $mrddoc_id,
            'mrd_url' => $mrdurl,
        );

        if (!empty($_POST['m_id'])) {
            $mrd_id = $_POST['m_id'];

            $record_check = $this->db->get_where('mrd', array('mrd_id' => $mrd_id))->row_array();

            if (!empty($record_check)) {
                $duplicate_check = $this->db->get_where('mrd', array('mrd_appoinment_id' => $record_data['mrd_appoinment_id'], 'mrd_id!=' => $mrd_id))->result_array();

                if (empty($duplicate_check)) {
                    $record_data['mrd_updated_by_id'] = $user_id;
                    $record_data['mrd_updated_by_timestamp'] = date('Y-m-d H:i:s');

                    // Update the record
                    $this->db->where('mrd_id', $mrd_id);
                    $this->db->update('mrd', $record_data);

                    $data['status'] = true;
                    $data['swall'] = array(
                        'title' => 'Record Updated!',
                        'text' => '<b>mrd Updated Successfully..!</b>',
                        'type' => 'success'
                    );
                } else {
                    $data['swall'] = array(
                        'title' => 'Duplicate Entry',
                        'text' => '<b>Record with Same mrd Already Exist</b>',
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
            $record_data['mrd_updated_by_timestamp'] = null;

            $duplicate_check = $this->db->get_where('mrd', array('mrd_appoinment_id' => $record_data['mrd_appoinment_id']))->result_array();

            if (empty($duplicate_check)) {
                $this->db->insert('mrd', $record_data);

                $data['status'] = true;
                $data['swall'] = array(
                    'title' => 'Record Added!',
                    'text' => '<b>mrd Added Successfully..!</b>',
                    'type' => 'success'
                );
            } else {
                $data['swall'] = array(
                    'title' => 'Duplicate Entry',
                    'text' => '<b>Record with Same mrd Already Exist</b>',
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



    public function Appoinment_all(){
        $this->session_validate();
        $data['record']=$this->db->query(
            "SELECT 
            appointment_id as id
           ,appointment_no as name 
            FROM appointment
            where appointment_no like '%OPD%' 
            and  appointment_status
            In ('Pending' , 'Completed')
            ")->result_array();
        $this->json_output($data);
    } 
    
    public function Mrd_doc_all()
    {
        $this->session_validate();
        $data['record']=$this->db->query("SELECT mrd_doc_id as id,mrd_doc_name as name FROM mrd_document")->result_array();
        echo json_encode($data);

    }


public function mrd_status() {
    $this->session_validate();
    $data = array();

    if (!empty($_POST['m_id'])) {
        $mrd_id = $_POST['m_id'];
        $mrd_status = $_POST['m_status'];
        
        switch ($mrd_status) {
            case 'Cancelled':
                // Update mrd_status, mrd_cancel_by_id, and mrd_cancel_timestamp
                $this->db->query("UPDATE mrd SET mrd_status = NULL, mrd_cancel_by_id = " . $_SESSION['id'] . ", mrd_cancel_timestamp = NOW() WHERE mrd_id=" . $mrd_id);
                $status_message = 'Record UnCancelled Successfully..!';
                break;
            case '':
                // Update mrd_status
                $this->db->query("UPDATE mrd SET mrd_status = 'Cancelled', mrd_cancel_by_id = " . $_SESSION['id'] . ", mrd_cancel_timestamp = NOW() WHERE mrd_id=" . $mrd_id);
                $status_message = 'Record Cancelled Successfully..!';
                break;
        }

        $data['swall'] = array(
            'title' => 'Record Updated!',
            'text' => '<b>' . $status_message . '</b>',
            'type' => 'success'
        );
    } else {
        $data['swall'] = array(
            'title' => 'Oops!',
            'text' => '<b>Something Went Wrong..!</b>',
            'type' => 'warning'
        );
    }
    $this->json_output($data);
}




    public function mrd_by_id()
{
    $this->session_validate();
    if (!empty($_POST['m_id'])) {
        $mrd = $_POST['m_id'];
        $data['record'] = $this->db->query("SELECT 
                                               mrd_id AS id
                                               ,mrd_appoinment_id AS app_no
                                               ,mrd_mrd_doc_id AS mrdDocId
                                               ,mrd_url AS mrdurll
                                             FROM mrd 
                                             WHERE mrd_id=" . $mrd)->row_array();

        $data['record']['mrdurll'] = isset($data['record']['mrdurll']) ? $data['record']['mrdurll'] : '';

        $this->json_output($data);
    }
}


}
?>
