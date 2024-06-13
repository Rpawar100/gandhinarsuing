<?php

class My_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
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

    public function sms($no,$msg,$id)
    {
        $id = $id;
        $ch = curl_init();
        $message = urlencode($msg);
        curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=28QHnbg118a&MobileNo=91".$no."&SenderID=".$id."&Message=".$message."&ServiceName=TEMPLATE_BASED");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output =curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function sendEmail($recipeinets, $from, $subject, $message,$content,$filename) {      
    die;  
        $config['protocol'] = 'smtp';        
        $config['wordwrap'] = FALSE;        
        $config['mailtype'] = 'html';        
        $config['charset'] = 'utf-8';        
        $config['crlf'] = "\r\n";        
        $config['smtp_host'] = 'pop.gmail.com';        
        $config['smtp_user'] = 'rushi@lazoo.in';        
        $config['smtp_pass'] = 'lazoo@55555#';        
        $config['smtp_port'] = 25;        
        $config['newline'] = "\r\n";        
        $config['smtp_crypto'] = 'tls';        
        $this->load->library('email', $config);        
        $this->email->initialize($config);        
        $this->email->from($from['email'], $from['name']);        
        $this->email->subject($subject);        
        $this->email->to($recipeinets);        
        $this->email->message($message);   
        if (!empty($content)) {//for attachment
            $this->email->attach($content, 'attachment', $filename, 'application/pdf');
        }
        echo "<pre>";print_r($this->email());die;
        return $this->email->send();    
    }

   
    

}

?>
