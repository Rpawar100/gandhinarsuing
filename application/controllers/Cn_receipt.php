<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_receipt extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_receipt');
	}

	public function receipt_list(){
		$this->session_validate();
		$draw = $_POST['draw'];
		$start = $_POST['start'];
		$length = $_POST['length']; 
		$searchValue = $_POST['search']['value']; 
		$searchQuery = "";




		for ($i=0; $i <count($_POST['columns']) ; $i++) { 
			if (!empty($_POST['columns'][$i]['search']['value'])) {
				$searchQuery.="AND ".$_POST['columns'][$i]['data']." like '%".$_POST['columns'][$i]['search']['value']."%'";
			}
		}	

		if($searchValue != ''){
			$searchQuery.= " AND name like '%".$searchValue."%' or role_name like '%".$searchValue."%'";
		}

		if (!empty($_GET['daterange'])) {
			$date_array=explode('to', $_GET['daterange']);
			$startd=date('Y-m-d',strtotime($date_array[0]));
			$endd=date('Y-m-d',strtotime($date_array[1]));
		}
		else
		{
			$startd=date('Y-m-d', strtotime("-1 month"));
			$endd=date('Y-m-d');
		}

		$result_query="	SELECT
						@sr_no:=@sr_no+1 sr_no, 
						result_data.*
					from (
						SELECT 
							receipt_id as id
							,date_format(receipt_timestamp,'%d-%m-%Y %h:%i %p') as receipt_timestamp
							,receipt_type as type
							,receipt_amount as amount
							,receipt_transaction_number	as transaction_number
							,appointment_no as appointment_id
							,case 
								when appointment_pay_status='Paid' then concat('<label style=\"font-size:initial;font-weight:bolder; color:green;\">',appointment_pay_status,'</label>')
								when appointment_pay_status='Refund Request' then concat('<label class=\"refund_request\" status=\"Request\" appointment_id=\"',appointment_id,'\" style=\"font-size:initial;font-weight:bolder; color:orange;\">',appointment_pay_status,'</label>')
								when appointment_pay_status='Refund Approved' then concat('<label style=\"font-size:initial;font-weight:bolder; color:blue;\">',appointment_pay_status,'</label>')
							end as pay_status
							
							,concat(P_first_name,' ',P_middle_name,' ',P_last_name) as name
							,concat('<i class=\"fa fa-print print_record\" receipt_id=\"',appointment_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i>') as action
						from receipt
						join appointment 
							on receipt_appointment_id=appointment_id
						join patient
							on receipt_patient_id=P_id
						where date_format(receipt_timestamp,'%Y-%m-%d') between '".$startd."' and '".$endd."'
					) result_data,(SELECT @sr_no:= 0) AS a
					where name!=''
					".$searchQuery."
					Order by name";
		
		
		$result = $this->db->query($result_query)->result_array();


		$result_data=array_slice($result,$start,$length);

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result),
			"iTotalDisplayRecords" => count($result),
			"aaData" => $result_data,
			
		);
		echo json_encode($response);
	}
}

?>