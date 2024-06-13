<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_vendor extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_vendor');
	}

	public function vendor_list(){
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
							vendor_id as id
							,vendor_name as name
							,vendor_gst_number as gst_number
						    ,vendor_address as address
							,concat('<i class=\"fa fa-edit edit_record\" vendor_id=\"',vendor_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" vendor_id=\"',vendor_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>')
								as action
						FROM vendor
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
							vendor_id as id
							,vendor_name as name
							,vendor_gst_number as gst_number
						    ,vendor_address as address
							,concat('<i class=\"fa fa-edit edit_record\" vendor_id=\"',vendor_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\"></i><i class=\"fa fa-trash delete_record\" vendor_id=\"',vendor_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\"></i>')
								as action
						FROM vendor
						
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

	public function vendor_action(){	
		$this->session_validate();

		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['vendor_id'])) {
				$record_data = array(
					'vendor_name' =>!empty($_POST['vendor_name'])?$_POST['vendor_name']:'',
					'vendor_gst_number' =>!empty($_POST['vendor_gst_number'])?$_POST['vendor_gst_number']:'',
					'vendor_address' =>!empty($_POST['vendor_address'])?$_POST['vendor_address']:'0',
					'vendor_created_by' =>$user_id,
					
				);
				$this->db->where('vendor_id',$_POST['vendor_id']);
				$this->db->update('vendor',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Updated!',
					'text'=>'<b>Vendor Updated Successfully..!</b>',
					'type'=>'success'
				);
			}else{
				$check_duplicate=$this->db->query("	SELECT * FROM vendor where vendor_name='".$_POST['vendor_name']."' and vendor_gst_number='".$_POST['vendor_gst_number']."'")->row_array();
				if(empty($check_duplicate)){
					$record_data = array(
						'vendor_name' =>!empty($_POST['vendor_name'])?$_POST['vendor_name']:'',
						'vendor_gst_number' =>!empty($_POST['vendor_gst_number'])?$_POST['vendor_gst_number']:'',
						'vendor_address' =>!empty($_POST['vendor_address'])?$_POST['vendor_address']:'0',
						'vendor_created_by' =>$user_id,
					);
					$this->db->insert('vendor',$record_data);
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>vendor Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate Vendor Entry!',
						'text'=>'<b>This Vendor is Already Added.</b>',
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

	public function vendor_delete(){
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

	

	public function vendor_by_id(){
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


	public function vendor_all(){
		$this->session_validate();
		$data['record']=$this->db->query("SELECT vendor_id as id,vendor_name as name FROM vendor")->result_array();
		echo json_encode($data);
	}


	
}

?>