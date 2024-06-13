<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cn_legal_licensing extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){   
		$this->session_validate();
		$this->load->view('vw_legal_licensing');
	}

	public function legal_licensing_list(){
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
			$searchQuery.= " AND (license_name like '%".$searchValue."%'
						or license_number like '%".$searchValue."%'
						or license_issue_by like '%".$searchValue."%'
						or reason like '%".$searchValue."%'
						or license_remark like '%".$searchValue."%'
					)";
		}

		$result_query="	SELECT
						*
					from (
						SELECT
							license_id as id
							,license_name as name
						    ,license_number as number
						    ,license_issue_by as issue_by
							,license_remark as remark						 
						    ,insert_name
						    ,case when update_name is NULL then '-' else update_name end as update_name
						    ,case 
						    	when update_name is NULL then '-'
						        else  date_format(license_updated_at,'%d-%m-%Y %h:%i %p')
							end as updated_timestamp
							,case 
								when license_validity is NOT NULL 
								then concat('<a href=\"#\" class=\"get_license_details\" l_id=\"',license_id,'\" title=\"License History\" data-toggle=\"modal\" data-target=\"#license_history\">',license_validity,'</a>')
								else '-'
							end as license_validity			
							,case 
								when license_process_doc_url is NOT NULL 
								then concat('<a href=\"#\" class=\"license_process_document\" l_id=\"',license_id,'\" ><i class=\"fa fa-eye\" l_id=\"',license_id,'\" title=\"View License Process Document\"></i></a>')
								else '-'
							end as license_process_doc	
							,concat('<i class=\"fa fa-plus add_license_required_doc\" l_id=\"',license_id,'\" style=\"color:green;font-size:20px;margin: 0px 10px;\" title=\"Add Required Document\" data-toggle=\"modal\" data-target=\"#required_documents\"></i>') as required_document
							,case 
								when date_format(license_created_at,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') 
								then concat('<i class=\"fa fa-edit edit_record\" l_id=\"',license_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\" title=\"Update License\"></i><i class=\"fa fa-trash delete_record\" l_id=\"',license_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\" title=\"Delete License\"></i><i class=\"fa fa-plus add_license_validity_record\" l_id=\"',license_id,'\" style=\"color:green;font-size:20px;margin: 0px 10px;\" title=\"Add License Validity\" data-toggle=\"modal\" data-target=\"#exampleModalLong\"></i>')
								else ''
							end as action
							
						FROM license
						left join (select user_id as insert_id,concat(user_first_name,' ',user_last_name) as insert_name from user) as insert_user_data
							on insert_id=license_created_by
						left join (select user_id as update_id,concat(user_first_name,' ',user_last_name) as update_name from user) as update_user_data
							on update_id=license_updated_by_updated_by
						left join ( select LD_license_id as license_details_id,concat(LD_issue_date,' - ',LD_valid_upto) as license_validity from license_details group by license_details_id ORDER BY LD_valid_upto DESC ) as license_details_data
							on license_details_id = license_id	
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
							license_id as id
							,license_name as name
						    ,license_number as number
						    ,license_issue_by as issue_by
							,license_remark as remark						 
						    ,insert_name
						    ,case when update_name is NULL then '-' else update_name end as update_name
						    ,case 
						    	when update_name is NULL then '-'
						        else  date_format(license_updated_at,'%d-%m-%Y %h:%i %p')
							end as updated_timestamp
							,case 
								when license_validity is NOT NULL 
								then concat('<a href=\"#\" class=\"get_license_details\" l_id=\"',license_id,'\" title=\"License History\" data-toggle=\"modal\" data-target=\"#license_history\">\"',license_validity,'\"</a>')
								else '-'
							end as license_validity	
							,case 
								when license_process_doc_url is NOT NULL 
								then concat('<a href=\"#\" class=\"license_process_document\" l_id=\"',license_id,'\" ><i class=\"fa fa-eye\" l_id=\"',license_id,'\" title=\"View License Process Document\"></i></a>')
								else '-'
							end as license_process_doc	
							,concat('<i class=\"fa fa-plus add_license_required_doc\" l_id=\"',license_id,'\" style=\"color:green;font-size:20px;margin: 0px 10px;\" title=\"Add Required Document\" data-toggle=\"modal\" data-target=\"#required_documents\"></i>') as required_document
							,case 
								when date_format(license_created_at,'%Y-%m-%d')=date_format(now(),'%Y-%m-%d') 
								then concat('<i class=\"fa fa-edit edit_record\" l_id=\"',license_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\" title=\"Update License\"></i><i class=\"fa fa-trash delete_record\" l_id=\"',license_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\" title=\"Delete License\"></i><i class=\"fa fa-plus add_license_validity_record\" l_id=\"',license_id,'\" style=\"color:green;font-size:20px;margin: 0px 10px;\" title=\"Add License Validity\" data-toggle=\"modal\" data-target=\"#exampleModalLong\"></i>')
								else ''
							end as action
						FROM license
						left join (select user_id as insert_id,concat(user_first_name,' ',user_last_name) as insert_name from user) as insert_user_data
							on insert_id=license_created_by
						left join (select user_id as update_id,concat(user_first_name,' ',user_last_name) as update_name from user) as update_user_data
							on update_id=license_updated_by_updated_by
						left join ( select LD_license_id as license_details_id,concat(LD_issue_date,' - ',LD_valid_upto) as license_validity from license_details group by license_details_id ORDER BY LD_valid_upto DESC ) as license_details_data
							on license_details_id = license_id
					) result_data
					where id>0
					".$searchQuery;
		//,case when license_validity is NULL then '-' else license_validity end as license_validity				
		$result_count_data = $this->db->query($result_count_query)->result_array();

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => count($result_count_data),
			"iTotalDisplayRecords" => count($result_count_data),
			"aaData" => $result_data,
		);
		echo json_encode($response);
	}

	public function legal_licensing_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['l_id'])) {
				$record_data = array(  
					'license_name' =>!empty($_POST['l_name'])?$_POST['l_name']:'',
					'license_number' =>!empty($_POST['l_number'])?$_POST['l_number']:'',
					'license_issue_by' =>!empty($_POST['l_issue_by'])?$_POST['l_issue_by']:'0',
					'license_remark' =>!empty($_POST['l_remark'])?$_POST['l_remark']:'0',
					'license_updated_at' =>date('Y-m-d H:i:s'),
					'license_updated_by_updated_by' =>$user_id,
				);
				$this->db->where('license_id',$_POST['l_id']);
				$this->db->update('license',$record_data);
				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Updated!',
					'text'=>'<b>License Updated Successfully..!</b>',
					'type'=>'success'
				);
			}else{        
				$license_number=$this->db->query("	SELECT * FROM license where license_number='".$_POST['l_number']."'")->row_array();
				if(empty($license_number)){
					$record_data = array(
						'license_name' =>!empty($_POST['l_name'])?$_POST['l_name']:'',
						'license_number' =>!empty($_POST['l_number'])?$_POST['l_number']:'',
						'license_issue_by' =>!empty($_POST['l_issue_by'])?$_POST['l_issue_by']:'0',
						'license_remark' =>!empty($_POST['l_remark'])?$_POST['l_remark']:'0',
						'license_created_at' =>date('Y-m-d H:i:s'),
						'license_created_by' =>$user_id,
					);
					$this->db->insert('license',$record_data);
					$license_id = $this->db->insert_id();
					
					$NewFileName;
					if($_FILES['l_process_doc_url']['name']!='')
					{ 
						$this->load->helper('string'); 
						$FileName = $_FILES['l_process_doc_url']['name']; 
						$SplitFileName = explode(".", $FileName);
						//$RowName = $SplitFileName[0];
						$RowName = str_replace(" ","_", $SplitFileName[0]);
						$FileExt = $SplitFileName[1];  
						$RandomNo = mt_rand(100000, 999999);
						//random_string('alnum',5);  
						
						$NewFileName = $RowName."_".$RandomNo.".".$FileExt; 
						   
						 $config['upload_path'] = './uploads/license/license_process_docs';
						 $config['allowed_types'] = 'pdf';
						 $config['max_size']    = '1000000';
						 //$config['max_width']  = '1024';
						 //$config['max_height']  = '768';
						 $config['overwrite'] = FALSE;
						 $config['remove_spaces'] = TRUE;
						 $config['encrypt_name'] = FALSE;
						 $config['file_name'] = $NewFileName;
							    
						$this->load->library('upload');
						$this->upload->initialize($config);	
						
						$field_name = "l_process_doc_url";
						if (  $this->upload->do_upload($field_name) )
						 {
							$record_data = array( 
								'license_process_doc_url' =>$NewFileName
							);
							$this->db->where('license_id',$license_id);
							$this->db->update('license',$record_data);
						
						 }else{
							$error = array('error' => $this->upload->display_errors());
							print_r($error);
						} 
					}
					
					$data['status']=true;
					$data['swall']=array(
						'title'=>'Record Added!',
						'text'=>'<b>License Added Successfully..!</b>',
						'type'=>'success'
					);
				}else{
					$data['swall']=array(
						'title'=>'Duplicate License Entry!',
						'text'=>'<b>This License Number is Already Created.</b>',
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

	public function legal_licensing_delete(){
		$this->session_validate();
		if (!empty($_POST['l_id'])) {
			$license_id=$_POST['l_id'];

			$this->db->query("DELETE from license where id=".$license_id);
			$this->db->query("DELETE from license_details where LD_license_id=".$license_id);
			
			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>License Deleted Successfully..!</b>',
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

	public function legal_licensing_by_id(){
		$this->session_validate();
		if(!empty($_POST['l_id'])){
			$license_id=$_POST['l_id'];
			$data['record']=$this->db->query("	SELECT 
													license_name as name
													,license_number as number
													,license_issue_by as issue_by
													,license_remark as remark
												FROM license where license_id=".$license_id)->row_array();
			$this->json_output($data);
		}
	}
	
	public function legal_licensing_details_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['ld_l_id'])) {
				$license_details_data = array(
					'LD_issue_date' =>$_POST['ld_issue_date'],
					'LD_valid_upto' =>$_POST['ld_valid_date'],
					'LD_license_id' =>$_POST['ld_l_id'],
				);
				$this->db->insert('license_details',$license_details_data);
				$license_details_id = $this->db->insert_id();
				
				$NewFileName;
				if($_FILES['ld_license_url']['name']!='')
				{ 
					$this->load->helper('string'); 
					$FileName = $_FILES['ld_license_url']['name']; 
					$SplitFileName = explode(".", $FileName);
					//$RowName = $SplitFileName[0];
					$RowName = str_replace(" ","_", $SplitFileName[0]);
					$FileExt = $SplitFileName[1];  
					$RandomNo = mt_rand(100000, 999999);
					//random_string('alnum',5);  
					
					$NewFileName = $RowName."_".$RandomNo.".".$FileExt; 
					   
					 $config['upload_path'] = './uploads/license/license_certificate';
					 $config['allowed_types'] = 'pdf';
					 $config['max_size']    = '1000000';
					 //$config['max_width']  = '1024';
					 //$config['max_height']  = '768';
					 $config['overwrite'] = FALSE;
					 $config['remove_spaces'] = TRUE;
					 $config['encrypt_name'] = FALSE;
					 $config['file_name'] = $NewFileName;
							
					$this->load->library('upload');
					$this->upload->initialize($config);	
					
					$field_name = "ld_license_url";
					if (  $this->upload->do_upload($field_name) )
					 {
						$record_data = array( 
							'LD_license_url' =>$NewFileName
						);
						$this->db->where('LD_id',$license_details_id);
						$this->db->update('license_details',$record_data);
					
					 }else{
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
					} 
				}

				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>License Validity Added Successfully..!</b>',
					'type'=>'success'
				);
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
	
	public function license_details_history(){
		$this->session_validate();
		if(!empty($_POST['l_id'])){
			$license_id=$_POST['l_id'];
			$data['record']=$this->db->query("	SELECT 
												LD_id as ld_id
												,LD_issue_date as issue_date
												,LD_valid_upto as valid_upto										
												,case when LD_license_url is NOT NULL 
													then concat('<a href=\"#\" class=\"license_cerrtificate\" l_id=\"',ld_id,'\" ><i class=\"fa fa-eye\" l_id=\"',ld_id,'\" title=\"View License Certificate\"></i></a>')
													else '-'
													end as license_url		
											FROM license_details where LD_license_id=".$license_id." ORDER BY LD_valid_upto DESC")->result_array();
			//$output = null;
			$i=1;
			$output = '<table class="table table-bordered">
			<thead>
			  <tr>
				<th>Sr.No</th>
				<th>Issue Date</th>
				<th>Valid Upto</th>
				<th>License Certificate</th>
			  </tr>
			</thead>
			<tbody>';
			  
			foreach ($data as $key)
			{
				foreach ($key as $value)
				{
					$output .= '<tr>
								<td>'.$i.'</td>
								<td>'.$value['issue_date'].'</td>
								<td>'.$value['valid_upto'].'</td>
								<td>'.$value['license_url'].'</td>
							  </tr>';
					$i=$i+1;		  
				}
			}
			$output .= '</tbody></table>';
			echo $output;
		}
	}
	
	public function license_required_doc_action(){	
		$this->session_validate();
		if (!empty($_POST)) {
			$user_id=$this->session->userdata('id');
			if (!empty($_POST['lrd_id'])) {
				
			
			}else{	
			
				$license_details_data = array(
					'LRD_name' =>$_POST['lrd_name'],
					'LRD_license_id' =>$_POST['lrd_l_id'],
				);
				$this->db->insert('license_required_doc',$license_details_data);
				$lrd_id = $this->db->insert_id();
				
				$NewFileName;
				if($_FILES['lrd_doc_url']['name']!='')
				{ 
					$this->load->helper('string'); 
					$FileName = $_FILES['lrd_doc_url']['name']; 
					$SplitFileName = explode(".", $FileName);
					//$RowName = $SplitFileName[0];
					$RowName = str_replace(" ","_", $SplitFileName[0]);
					$FileExt = $SplitFileName[1];  
					$RandomNo = mt_rand(100000, 999999);
					//random_string('alnum',5);  
					
					$NewFileName = $RowName."_".$RandomNo.".".$FileExt; 
					   
					 $config['upload_path'] = './uploads/license/license_required_doc';
					 $config['allowed_types'] = 'pdf';
					 $config['max_size']    = '1000000';
					 //$config['max_width']  = '1024';
					 //$config['max_height']  = '768';
					 $config['overwrite'] = FALSE;
					 $config['remove_spaces'] = TRUE;
					 $config['encrypt_name'] = FALSE;
					 $config['file_name'] = $NewFileName;
							
					$this->load->library('upload');
					$this->upload->initialize($config);	
					
					$field_name = "lrd_doc_url";
					if (  $this->upload->do_upload($field_name) )
					 {
						$record_data = array( 
							'LRD_doc_url' =>$NewFileName
						);
						$this->db->where('LRD_id',$lrd_id);
						$this->db->update('license_required_doc',$record_data);
					
					 }else{
						$error = array('error' => $this->upload->display_errors());
						print_r($error);
					} 
				}

				$data['status']=true;
				$data['swall']=array(
					'title'=>'Record Added!',
					'text'=>'<b>Document Added Successfully..!</b>',
					'type'=>'success'
				);
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
	
	public function license_required_doc_list(){
		$this->session_validate();
		if(!empty($_POST['l_id'])){
			$license_id=$_POST['l_id'];
			$data['record']=$this->db->query("	SELECT 
												LRD_id as lrd_id
												,LRD_name as document_name										
												,case when LRD_doc_url is NOT NULL 
													then concat('<a href=\"#\" class=\"license_required_doc\" l_id=\"',lrd_id,'\" ><i class=\"fa fa-eye\" l_id=\"',lrd_id,'\" title=\"View License Required Doc\"></i></a>')
													else '-'
													end as document_url
												,concat('<i class=\"fa fa-edit edit_document\" l_id=\"',lrd_id,'\" style=\"color:royalblue;font-size:20px;margin: 0px 10px;\" title=\"Update Document\"></i><i class=\"fa fa-trash delete_document\" l_id=\"',lrd_id,'\" style=\"color:red;font-size:20px;margin: 0px 10px;\" title=\"Delete Document\"></i>') as action
											FROM license_required_doc where LRD_license_id=".$license_id." ORDER BY LRD_timestamp DESC")->result_array();
			//$output = null;
			
			$i=1;
			$output = '<table class="table table-bordered">
			<thead>
			  <tr>
				<th>Sr.No</th>
				<th>Document Name</th>
				<th>Document Link</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>';
			  
			foreach ($data as $key)
			{
				foreach ($key as $value)
				{
					$output .= '<tr>
								<td>'.$i.'</td>
								<td>'.$value['document_name'].'</td>
								<td>'.$value['document_url'].'</td>
								<td>'.$value['action'].'</td>
							  </tr>';
					$i=$i+1;		  
				}
			}
			$output .= '</tbody></table>';
			echo $output;
		}
	}
	
	public function required_document_delete(){
		$this->session_validate();
		if (!empty($_POST['l_id'])) {
			$license_id=$_POST['l_id'];

			$this->db->query("DELETE from license_required_doc where LRD_id=".$license_id);
			
			$data['swall']=array(
				'title'=>'Record Deleted!',
				'text'=>'<b>Document Deleted Successfully..!</b>',
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
	
	

	
}


?>

 