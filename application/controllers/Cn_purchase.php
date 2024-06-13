<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_purchase extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_purchase');
	}

	

	public function purchase_list(){
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
			$searchQuery.= " AND (name like '%".$searchValue."%'
						or gst_number like '%".$searchValue."%'
						
						)";
		}

		

		$result_query="	SELECT
						*
					from (
						SELECT
							purchase_id  as id
							,purchase_date as pdate
							,purchase_number as pnumber
						    ,purchase_status as pstatus
						    ,purchase_invoice_number as invoice_number
						    ,purchase_invoice_date as invoice_date
						    ,purchase_taxable_amount as taxable_amount
						    ,purchase_cgst as cgst
						    ,purchase_sgst as sgst
						    ,purchase_igst as igst
						    ,purchase_gross_total as gross_total
						    ,purchase_vendor_id as vendor_id
							,concat('<i class=\"fa fa-plus edit_record\" purchase_id=\"',purchase_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-edit edit_record\" purchase_id=\"',purchase_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" purchase_id=\"',purchase_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>')
								as action
						FROM purchase
					) result_data
					where id>0
					".$searchQuery."
					order by id desc
					LIMIT ".$length." OFFSET ".$start;

		$result_data = $this->db->query($result_query)->result_array();
		
		$result_count_query="	SELECT
						*
					from (
						SELECT
							purchase_id  as id
							,purchase_date as pdate
							,purchase_number as pnumber
						    ,purchase_status as pstatus
						    ,purchase_invoice_number as invoice_number
						    ,purchase_invoice_date as invoice_date
						    ,purchase_taxable_amount as taxable_amount
						    ,purchase_cgst as cgst
						    ,purchase_sgst as sgst
						    ,purchase_igst as igst
						    ,purchase_gross_total
						FROM purchase
						
					) result_data
					where id>0
					".$searchQuery;
					
		$result_count_data = $this->db->query($result_count_query)->result_array();

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result_count_data),
			"iTotalDisplayRecords" => count($result_count_data),
			"aaData" => $result_data,
		);
		echo json_encode($response);
	}

	public function purchase_action(){	
		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['purchase_id'])) {
				$record_data = array(
					'purchase_date' =>!empty($_POST['purchase_date'])?$_POST['purchase_date']:'',
					'purchase_number' =>!empty($_POST['purchase_number'])?$_POST['purchase_number']:'',
					'purchase_status' =>!empty($_POST['purchase_status'])?$_POST['purchase_status']:'0',
					'purchase_invoice_number' =>!empty($_POST['invoice_number'])?$_POST['invoice_number']:'',
					'purchase_invoice_date' =>!empty($_POST['invoice_date'])?$_POST['invoice_date']:'',
					'purchase_taxable_amount' =>!empty($_POST['taxable_amount'])?$_POST['taxable_amount']:'',
					'purchase_cgst' =>!empty($_POST['purchase_cgst'])?$_POST['purchase_cgst']:'',
					'purchase_sgst' =>!empty($_POST['purchase_sgst'])?$_POST['purchase_sgst']:'',
					'purchase_igst' =>!empty($_POST['purchase_igst'])?$_POST['purchase_igst']:'',
					'purchase_gross_total' =>!empty($_POST['gross_total'])?$_POST['gross_total']:'',
					'purchase_vendor_id' =>!empty($_POST['vendor_name'])?$_POST['vendor_name']:'',
					
				);
				$this->db->where('purchase_id',$_POST['purchase_id']);
				$this->db->update('purchase',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Updated!',
					'text'=>'<b>Purchase Updated Successfully..!</b>',
					'type'=>'success'
				);
			}else{
				$check_duplicate=$this->db->query("	SELECT * FROM purchase where purchase_number='".$_POST['purchase_number']."'")->row_array();
				if(empty($check_duplicate)){
					$record_data = array(
						'purchase_date' =>!empty($_POST['purchase_date'])?$_POST['purchase_date']:'',
						'purchase_number' =>!empty($_POST['purchase_number'])?$_POST['purchase_number']:'',
						'purchase_status' =>!empty($_POST['purchase_status'])?$_POST['purchase_status']:'0',
						'purchase_invoice_number' =>!empty($_POST['invoice_number'])?$_POST['invoice_number']:'',
						'purchase_invoice_date' =>!empty($_POST['invoice_date'])?$_POST['invoice_date']:'',
						'purchase_taxable_amount' =>!empty($_POST['taxable_amount'])?$_POST['taxable_amount']:'',
						'purchase_cgst' =>!empty($_POST['purchase_cgst'])?$_POST['purchase_cgst']:'',
						'purchase_sgst' =>!empty($_POST['purchase_sgst'])?$_POST['purchase_sgst']:'',
						'purchase_igst' =>!empty($_POST['purchase_igst'])?$_POST['purchase_igst']:'',
						'purchase_gross_total' =>!empty($_POST['gross_total'])?$_POST['gross_total']:'',
						'purchase_vendor_id' =>!empty($_POST['vendor_name'])?$_POST['vendor_name']:'',
					);
					$this->db->insert('purchase',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>Purchase Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Purchase Entry!',
						'text'=>'<b>This Purchase is Already Added.</b>',
						'type'=>'warning'
					);
				}
			}
		}else{
			$data['swall']=array(
				'title'=>'Oops!',
				'text'=>'<b>Something Went Wrong..!</b>',
				'type'=>'warning'
			);
		}
		$this->json_output($data);
	}

	public function purchase_delete(){
		$this->session_validate();
		if (!empty($_POST['vendor_id'])) {
			$visitor_id=$_POST['vendor_id'];

			$this->db->query("DELETE from vendor where vendor_id=".$vendor_id);

			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Vendor Deleted Successfully..!</b>',
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

	

	public function purchase_by_id(){
		$this->session_validate();
		if(!empty($_POST['vendor_id'])){
			$vendor_id=$_POST['vendor_id'];
			$data['record']=$this->db->query("	SELECT 
													vendor_id as id
													,vendor_name as name
													,vendor_gst_number as gst_number
												    ,vendor_address as address
												FROM vendor where vendor_id=".$vendor_id)->row_array();
			$this->json_output($data);
		}
	}
	
}

?>