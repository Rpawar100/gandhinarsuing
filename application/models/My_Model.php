<?php

class My_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }




public function get_services() {
        $query = $this->db->get('services'); 
        return $query->result();
    }


public function get_monthly_total() {
        // Get the first and last day of the current month
        $first_day_of_month = date('Y-m-01 00:00:00');
        $last_day_of_month = date('Y-m-t 23:59:59');

        // Build the query
        $this->db->select_sum('receipt_amount');
        $this->db->from('receipt');
        $this->db->where('receipt_timestamp >=', $first_day_of_month);
        $this->db->where('receipt_timestamp <=', $last_day_of_month);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->receipt_amount;
        } else {
            return 0;
        }
    }

public function get_todays_receipts() {
    // Build the query to retrieve today's data
    $this->db->select('*');
    $this->db->from('receipt');
    $this->db->where('DATE(FROM_UNIXTIME(receipt_timestamp))', date('Y-m-d'));
    $query = $this->db->get();

    // Execute the query and return the result
    return $query->result();
}

//function for inserting data into database
    public function add($table, $data) {
        $this->db->insert($table, $data);
        $this->db->trans_complete();
        return $this->db->insert_id();
    }

//function for delete data into database
    public function delete($table, $condition) {
        $this->db->where($condition);
        $this->db->delete($table);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

//function for  data fetching data from database
    public function getdata($table, $fields = '', $condition = '', $order_by = '', $limit = '') {
        $str_sql = '';
        if (is_array($fields)) {
#$fields passed as array
            $str_sql .= implode(",", $fields);
        } elseif ($fields != "") {
#$fields passed as string
            $str_sql .= $fields;
        } else {
            $str_sql .= '*';  #$fields passed blank
        }
        $this->db->select($str_sql);
        if (is_array($condition)) {  #$condition passed as array
            if (count($condition) > 0) {
                foreach ($condition as $field_name => $field_value) {
                    if ($field_name != '' && $field_value != '') {
                        $this->db->where($field_name, $field_value);
                    }
                }
            }
        } else if ($condition != "") { #$condition passed as string
            $this->db->where($condition);
        }
        if ($limit != "")
            $this->db->limit($limit);#limit is not blank

        if (is_array($order_by)) {
            $this->db->order_by($order_by[0], $order_by[1]);  #$order_by is not blank
        } else if ($order_by != "") {
            $this->db->order_by($order_by);  #$order_by is not blank
        }
        $this->db->from($table);  #getting record from table name passed
        $query = $this->db->get();

        return $query->result_array();
    }


//function for updating data into database
    public function update($table, $data, $condition) {
        $this->db->where($condition);
        $this->db->update($table, $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }



    public function uploadFile($path, $type, $file_name, $error_msg, $new_name) {

        $config['upload_path'] = $path; //'uploads/superadmin/';
        $config['allowed_types'] = $type; //'gif|jpg|png|jpeg';
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['max_size'] = 0;
        $config['encrypt_name'] = false;
        $config['file_name'] = $new_name;   
        $config['overwrite'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) { 
            $error = $this->upload->display_errors();
             
              $this->session->set_flashdata('error', $error_msg . " : " . $error);
              redirect($_SERVER['HTTP_REFERER']);
        } else {

            $upload_data = $this->upload->data()['file_name'];
        }

        if (!empty($upload_data)) {
            return $upload_data;
        } else {
            return 0;
        }
    }

    public function uploadMultipleFile($path, $type, $file_name, $error_msg,$new_name) {
        $count = count($_FILES[$file_name]['name']);
        for($i=0;$i<$count;$i++){
            if(!empty($_FILES[$file_name]['name'][$i])){
                $_FILES['file']['name'] = $_FILES[$file_name]['name'][$i];
                $_FILES['file']['type'] = $_FILES[$file_name]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$file_name]['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES[$file_name]['error'][$i];
                $_FILES['file']['size'] = $_FILES[$file_name]['size'][$i];
      
                $config['upload_path'] = $path; 
                $config['allowed_types'] = $type;
                $config['max_size'] = '1000';
                $config['file_name'] = $new_name.date('YmdHis'); 
                $this->load->library('upload',$config); 
        
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data['totalFiles'][] = $filename;
                }
            }
        }
        return  $data;

    }

}

?>
