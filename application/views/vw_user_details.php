<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<style type="text/css">
	.name{
		background:#18ddb5;
		color:black;
		padding: 10px 20px 10px 25px;
	}
	.count{
		background:white;
		text-align: center;
		border: 2px solid #1ab394;
		padding: 10px 20px;
	}

	.name.active{
		background:teal;
		color:white;
		padding: 10px 20px 10px 25px;
	}
	.count.active{
		background:white;
		text-align: center;
		border: 2px solid teal;
		padding: 10px 20px;
	}
	#datatable_list_info{
		width: 100%;
    	font-size: large;
    	text-align: center;
    	background: #fed00547;
    	padding: 7px 0px;
    	font-weight: bold;
	}
</style>

<div class="wrapper wrapper-content animated fadeInRight" style="padding:0px;">
	<div class="row">
		<div class="col-lg-6" style="padding:0px">
			<div class="card">
				<div class="card-body" style="padding: 0px;">
					<h2 class="text-center" style="margin-top: 10px">Personal Details</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6" style="padding-left: px; padding-right: 0px;">
					<div class="card" style="min-height: 400px;">
						<div class="card-body">
							<div class="row " style="padding-left: 30%;padding-bottom: 10px;">
								<img src="<?=!empty($user_details['user_photo'])?$user_details['user_photo']:''?>" style="width: 111px;border: 2px solid black; padding: 0px;border-radius: 10px;height: 111px;"> 
							</div>			
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Reg.Date<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_reg_timestamp'])?$user_details['user_reg_timestamp']:'Not Mention'?></label>
							</div>				
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Name<label class=" pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_name'])?$user_details['user_name']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Gender<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_gender'])?$user_details['user_gender']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class=" col-lg-4" style="padding-right: 0px;" >Mobile<label class="pull-right">:</label></span>		
								<label  class="col-lg-8"><?=!empty($user_details['user_mobile_number'])?$user_details['user_mobile_number']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class=" col-lg-4" style="padding-right: 0px;" >Alt. Mobile<label class="pull-right">:</label></span>		
								<label  class="col-lg-8"><?=!empty($user_details['user_alt_mobile_number'])?$user_details['user_alt_mobile_number']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;width: 100%;">Email<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_email'])?$user_details['user_email']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Birth Date<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_dob'])?$user_details['user_dob']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Marital Status<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_marital_status'])?$user_details['user_marital_status']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Blood Group<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_blood_group'])?$user_details['user_blood_group']:'Not Mention'?></label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6" style="padding-left: 0px;" >
					<div class="card" style="min-height: 400px;" >
						<div class="card-body">
							
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Current Address<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_current_address'])?$user_details['user_current_address']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Current Area<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_current_area'])?$user_details['user_current_area']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Current Taluka<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_current_taluka'])?$user_details['user_current_taluka']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Current District<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_current_district'])?$user_details['user_current_district']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Current State<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_current_state'])?$user_details['user_current_state']:'Not Mention'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;" >Current Pincode<label class="pull-right">:</label></span>
									<label  class="col-lg-8"><?=!empty($user_details['user_current_pincode'])?$user_details['user_current_pincode']:'-'?></label>
							</div>
							<br>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Permanant Address<label class="pull-right">:</label></span>
								<label  class="col-lg-8"><?=!empty($user_details['user_permanant_address'])?$user_details['user_permanant_address']:'No Refferal'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Permanent Area<label class="pull-right">:</label></span>
									<label  class="col-lg-8"><?=!empty($user_details['user_permanent_area'])?$user_details['user_permanent_area']:'-'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Permanent Taluka<label class="pull-right">:</label></span>
									<label  class="col-lg-8"><?=!empty($user_details['user_permanent_taluka'])?$user_details['user_permanent_taluka']:'-'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Permanent District<label class="pull-right">:</label></span>
									<label  class="col-lg-8"><?=!empty($user_details['user_permanent_district'])?$user_details['user_permanent_district']:'-'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Permanent State<label class="pull-right">:</label></span>
									<label  class="col-lg-8"><?=!empty($user_details['user_permanent_state'])?$user_details['user_permanent_state']:'-'?></label>
							</div>
							<div class="row">
								<span class="col-lg-4" style="padding-right: 0px;">Permanent pincode<label class="pull-right">:</label></span>
									<label  class="col-lg-8"><?=!empty($user_details['user_permanent_pincode'])?$user_details['user_permanent_pincode']:'-'?></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6" style="padding:0px">
			<div class="card">
				<div class="card-body" style="padding: 0px;">
					 <div class="row">
					<div class="col-lg-6">
					    <h2 style="margin: 10px">KYC - Details</h2>
				    </div>
				    <!--
					<div class="col-lg-6">
						<h2 class="pull-right" style="margin: 0px">Status:- <button class="change_status" style="padding: 12px 20px; font-size: large;background-color:<?=$user_details['colour']?> "><?=$user_details['user_KYC_status']?></button></h2>
					</div>-->
				</div>
			  </div>
			</div>
			<div class="row">
     		<div class="col-lg-6" style="padding-left: 15px; padding-right: 0px;">
			<div class="card" style="min-height: 400px;">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
								<h3 class="">Pan Details</h3>
					    </div>
					    <div class="col-lg-6">
								<i class="fa fa-edit edit_PAN_details "   style="color:royalblue;font-size:20px; float: right;"></i>
						</div>
					</div>
					<hr style="margin-top: 0px">
					<div class="row">
						<span class="col-lg-4" style="padding-right: 0px;" >Pan Name<label class="pull-right">:</label></span>
						<label  class="col-lg-8 view_user_PAN_name"><?=!empty($user_details['user_PAN_name'])?$user_details['user_PAN_name']:'Not Mention'?></label>
					</div>
					<div class="row">
						<span class="col-lg-4" style="padding-right: 0px;" >Pan Date<label class="pull-right">:</label></span>			
						<label  class="col-lg-8 "><?=!empty($user_details['view_user_PAN_DOB'])?$user_details['view_user_PAN_DOB']:'Not Mention'?></label>
					</div>
					<div class="row">
						<span class="col-lg-4" style="padding-right: 0px;" >Pan Number<label class="pull-right">:</label></span>
						<label  class="col-lg-8 "><?=!empty($user_details['pan_number'])?$user_details['pan_number']:'Not Mention'?>
						</label>
					</div>
					<div class="row">
						<span class="col-lg-4" style="padding-right: 0px;" >Pan Image<label class="pull-right">:</label></span>
						
						<?php if(!empty($user_details['photo_url'])){ ?>
						<button style="margin: 0px 12px;" data-toggle="modal" class=" view_image"  data-target="#view_image_modal"   id="btn">View PAN</button>
					<?php }else{?>
						<label  class="col-lg-8 ">Not Mention</label>
					<?php }?>
						 <input type="button" style="background-color:#1ab394 ;" value=" " class="view_image"  id="btn" />
					</div>
					<!--
					<?php if($user_details['user_KYC_status']=='Rejected'){ ?>
					<div class="row">
						<span class="col-lg-6" style="padding-right: 0px;" >Reject Reason<label class="pull-right">:</label></span>
						<label  class="col-lg-12"><?=!empty($user_details['user_PAN_reject_comment'])?$user_details['user_PAN_reject_comment']:'Not Mention'?></label>
					</div>
					<?php }?>-->
				</div>
			</div>
		</div>
		<div class="col-lg-6" style="padding-left: 0px;">
			<div class="card" style="min-height: 400px;" >
				<div class="card-body" >
					<div class="row">
						<div class="col-lg-6">
							<h3 class="">Bank Details</h3>
						</div>
						
						<div class="col-lg-3">
							<i class="fa fa-edit edit_bank_detail"  style="color:royalblue;font-size:20px;float: right;"></i>
						</div>
					</div>
					<hr style="margin-top: 0px">
					<div class="row">
						<span class="col-lg-6" style="padding-right: 1px;" >Holder Name<label class="pull-right">:</label></span>
						
						<label  class="col-lg-6 viewuser_bank_acc_holder_name"><?=!empty($user_details['user_name'])?$user_details['user_name']:'Not Mention'?></label>
					</div>
					<div class="row">
						<span class="col-lg-6" style="padding-right: 1px;" >Bank Name<label class="pull-right">:</label></span>
						
						<label  class="col-lg-6 view_user_bank_name"><?=!empty($user_details['user_bank_name'])?$user_details['user_bank_name']:'Not Mention'?></label>
					</div>
					<div class="row">
						<span class="col-lg-6" style="padding-right: 1px;" >Branch Name<label class="pull-right">:</label></span>
						
						<label  class="col-lg-6 view_user_bank_branch"><?=!empty($user_details['user_branch_name'])?$user_details['user_branch_name']:'Not Mention'?></label>
					</div>
					<div class="row">
						<span class="col-lg-6" style="padding-right: 1px;" >Account Number<label class="pull-right">:</label></span>
						
						<label  class="col-lg-6 view_user_bank_acc_no"><?=!empty($user_details['user_bank_account_number'])?$user_details['user_bank_account_number']:'Not Mention'?></label>
					</div>
					<div class="row">
						<span class="col-lg-6" style="padding-right: 1px;" >IFSC Code<label class="pull-right">:</label></span>
					
						<label  class="col-lg-6 view_user_bank_IFSC_code"><?=!empty($user_details['user_ifsc_code'])?$user_details['user_ifsc_code']:'Not Mention'?></label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="view_image_modal" class="view_image" role="dialog">
   	<div class="modal-dialog modal-md">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h4 class="modal-title pull-right">PAN Iamge</h4>
   				<button type="button" class="close" data-dismiss="modal">&times;</button>
   			</div>
   			<div class="modal-body" style="font-size: 16px;padding-bottom: 10px;">
   				<div class="row">
   					<div class="col-lg-12" style="text-align: center;align-self: center;">
   						<img id="view_pan_image"  class="pan_img"  src="<?=$user_details['photo_url']?>" style="width: 100%;padding: 10px;border-radius: 0px;"> 
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
</div>

<div class="row" style="margin: 15px 0px;">
	<div class="col-lg-12">
		<div class="row">
		<div class="col-lg-2">
			<div class="row change_menu" id="dept_assign">
				<h3 class="col-lg-9 name active" >Dept.Assigned</h3>
				<!--<h3 class="col-lg-3 count active"><?=$user_summary['course_view']?></h3>-->
			</div>
			<div class="row change_menu" id="role_assign">
				<h3 class="col-lg-9 name">Role Assigned</h3>
				<!--<h3 class="col-lg-3 count"><?=$user_summary['video_views']?></h3>-->
			</div>
			<div class="row change_menu" id="qualification_list">
				<h3 class="col-lg-9 name">Qualification List</h3>
				<!--<h3 class="col-lg-3 count"><?=$user_summary['notes_view']?></h3>-->
			</div>
			<div class="row change_menu" id="work_experience_list">
				<h3 class="col-lg-9 name">Work Experience</h3>
				<!--<h3 class="col-lg-3 count"><?=$user_summary['practise_test_view']?></h3>-->
			</div>
			<div class="row change_menu" id="reference_list">
				<h3 class="col-lg-9 name">Reference List</h3>
				<!--<h3 class="col-lg-3 count"><?=$user_summary['live_test_view']?></h3>-->
			</div>
			
			<div class="row change_menu" id="document_list">
				<h3 class="col-lg-9 name">Upload Documents</h3>
				<!--<h3 class="col-lg-3 count"><?=$user_summary['transaction_view']?></h3>-->
			</div>
			<div class="row change_menu" id="family_details_list">
				<h3 class="col-lg-9 name">Family Details</h3>
				<!--<h3 class="col-lg-3 count"><?=$user_summary['withdraw_view']?></h3>-->
			</div>
			<div class="row change_menu" id="bank_details_list">
				<h3 class="col-lg-9 name">Bank Details</h3>
				<!--<h3 class="col-lg-3 count"><?=$user_summary['withdraw_view']?></h3>-->
			</div>
   		</div>
   		<div class="col-lg-10">
   			<div class="col-lg-12" style="padding-right:0px;">
   				<div class="ibox-title"  style="padding-top: 10px !important;">
        			<h3 class="record_form_title">User Details </h3>
        			<button class="btn btn-primary modal_btn pull-right " id="add-info-btn"><i class="fa fa-plus"></i>Add New</button>
      			</div>
   				<div class="ibox-content">
   					<div class="table-responsive" style="padding-top: 15px;">
   						<table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
   							
   						</table>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
 	</div>
</div> 

<div class="modal fade" id="add_info_model" role="dialog">
	<div class="modal-dialog " style="min-width: max-content;">
		<div class="modal-content" style="width: 700px;">
			<form method="post" id="add_info_form" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="add-info-modal-title">Assign Department</h4>
					<input type="hidden" class="form-control" name="user_id" id="user_id" value="">
					<button type="button" class="pull-right close_model">&times;</button>
				</div>
				<div class="assign-department-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Department Name<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input type="hidden" class="form-control add-info-input assign-department" name="DA_id" id="DA_id" value="">
							<input type="hidden" class="form-control add-info-input assign-department" name="user_id" id="user_id" value="<?=$user_details['user_id']?>">
							<select class="form-control add-info-input assign-department" name="d_name" id="d_name">
                    		</select>
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Sub-Department Name<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							 <select class="form-control add-info-input assign-department" type="text" name="sd_name" id="sd_name"  required="" > 
                			</select>
						</div>
					</div>						
				</div>
				<div class="assign-role-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Select Role<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							 <select class="form-control assign-role add-info-input" type="text" name="role_id[]" id="role_id"  required="" data-live-search="true" multiple> 
                			</select>
						</div>
					</div>						
				</div>
				<div class="qualification-list-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Registration No<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control add-info-input qualification-list" type="text" name="registration_no" id="registration_no">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Registration Univeristy<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control add-info-input qualification-list" type="text" name="registration_univeristy" id="registration_univeristy">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Valid UpTo<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control add-info-input qualification-list" type="date" name="valid_upto" id="valid_upto">
						</div>
					</div>						
				</div>
				<div class="reference-list-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Name of Referance<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control add-info-input reference-list" type="text" name="name_of_referance" id="name_of_referance">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Reference Employer<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control add-info-input reference-list" type="text" name="reference_employer" id="reference_employer">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Reference Designation<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
						    <input class="form-control add-info-input reference-list" type="text" name="reference_designation" id="reference_designation" >
						   
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Reference Department<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
						    <input class="form-control add-info-input reference-list" type="text" name="reference_department" id="reference_department" >
						   
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Reference Contact No<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
						    <input class="form-control add-info-input reference-list" type="text" name="reference_contact_no" id="reference_contact_no" >
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Reference Mail-ID<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
						    <input class="form-control add-info-input reference-list" type="text" name="reference_email_id" id="reference_email_id" >
						</div>
					</div>						
				</div>
				<div class="document-list-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Name of Document<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control add-info-input document-list" type="text" name="name_of_document" id="name_of_document">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Document Number<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control add-info-input document-list" type="text" name="document_number" id="document_number">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Document Photo<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
						    <input class="form-control add-info-input document-list" type="file" name="document_photo" id="document_photo"  >
						   
						</div>
					</div>
				</div>
				<div class="work-experience-list-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Employer Name<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control work-experience-list add-info-input " type="text" name="employer_name" id="employer_name">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Designation<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input class="form-control work-experience-list add-info-input " type="text" name="designation" id="designation">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Period<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8 row">
						    <div class="col-lg-5">
						        <input class="form-control work-experience-list add-info-input " type="date" name="from_date" id="from_date" >
						    </div>
						    <div class="col-lg-2" style="margin-top:5px;">
						    	<span class="to-text">To</span>
						    </div>
						    <div class="col-lg-5">
						        <input class="form-control work-experience-list add-info-input " type="date" name="to_date" id="to_date" >
						    </div>
						   
						</div>
					</div>						
				</div>
				<div class="family-details-list-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">First Name<a style="color: red">*</a></label>
						<label class="control-label col-lg-4">Middel Name<a style="color: red">*</a></label>
						<label class="control-label col-lg-4">Last Name<a style="color: red">*</a></label>
						
					</div>
					<div class="row" style="margin:10px 0px;">
						
						<div class="col-lg-4">
							<input class="form-control family-details-list add-info-input" type="text" name="first_name" id="first_name">
						</div>
						<div class="col-lg-4">
							<input class="form-control family-details-list add-info-input" type="text" name="middle_name" id="middle_name">
						</div>
						<div class="col-lg-4">
							<input class="form-control family-details-list add-info-input" type="text" name="last_name" id="last_name">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Relation<a style="color: red">*</a></label>
						<label class="control-label col-lg-4">Contact Number<a style="color: red">*</a></label>
						<label class="control-label col-lg-4">Address<a style="color: red">*</a></label>
					</div>
					<div class="row" style="margin:10px 0px;">
						
						<div class="col-lg-4">
							<select class="form-control family-details-list add-info-input"  name="relation" id="relation">
								<option value="Father">Father</option>
								<option value="Mother">Mother</option>
								<option value="Sister">Sister</option>
								<option value="Father">Father</option>
							</select>
						</div>
						<div class="col-lg-4">
							<input class="form-control family-details-list add-info-input" type="text" name="contact_number" id="contact_number">
						</div>
						<div class="col-lg-4">
							<input class="form-control family-details-list add-info-input" type="text" name="address" id="address">
						</div>
					</div>
				</div>
				<div class="bank-details-list-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Account Holder Name<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input type="text" class="form-control bank-details-list" name="account_holder_name" id="account_holder_name" value="">
							
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Account Number<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input type="text" class="form-control bank-details-list" name="account_number" id="account_number" value="">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">IFSC Code<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							 <input type="text" class="form-control bank-details-list" name="ifsc_code" id="ifsc_code" value="">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Branch<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							 <input type="text" class="form-control bank-details-list" name="branch" id="branch" value="">
						</div>
					</div>						
				</div>
				<div class="modal-footer">
					<button type="submit"  class="btn btn-primary pull-right" >Submit</button>
					<button type="button" class="btn btn-default pull-left close_model">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--
<div class="modal fade" id="add_bank_account_model" role="dialog">
	<div class="modal-dialog " style="min-width: max-content;">
		<div class="modal-content" style="width: 700px;">
			<form method="post" id="add_bank_account_form" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="add-info-modal-title">Add New Bank</h4>
					<input type="hidden" class="form-control" name="user_id" id="user_id" value="">
					<button type="button" class="pull-right close_model">&times;</button>
				</div>
				<div class="assign-department-modal-body modal-body" style="display: none;">
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Account Holder Name<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="account_holder_name" id="account_holder_name" value="">
							
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Account Number<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="account_number" id="account_number" value="">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">IFSC Code<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							 <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" value="">
						</div>
					</div>
					<div class="row" style="margin:10px 0px;">
						<label class="control-label col-lg-4">Branch<a style="color: red">*</a><b class="pull-right">:</b></label>
						<div class="col-lg-8">
							 <input type="text" class="form-control" name="branch" id="branch" value="">
						</div>
					</div>						
				</div>
				
				<div class="modal-footer">
					<button type="submit"  class="btn btn-primary pull-right" >Submit</button>
					<button type="button" class="btn btn-default pull-left close_model">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>-->

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
	$('#user_tab').addClass('active');
	var url = window.location.pathname;
	user_id=url.substring(url.lastIndexOf('/') + 1);
	$('#user_id').val(user_id);

	active_tab='dept_assign';
	change_tab(active_tab);
	
	$('.change_menu').on('click',function(){
		active_tab=$(this).attr('id');
		change_tab(active_tab);
	});	

	function change_tab(tab_name){
		$('h3').removeClass('active');
		$('#'.concat(tab_name)).find('h3').addClass('active');
		active_tab=tab_name;
		get_user_details_list();
		$('.modal-body').hide();
		$('.add-info-input').attr('disabled','true');


		switch(active_tab){
			case 'dept_assign':	
				department_all();
				$('.record_form_title').html('Assign Department');
				$('.add-info-modal-title').html('Assign New Department');
				$('.assign-department-modal-body').show();
				$('.assign-department').attr('disabled','false');
				$('#add_info_form').attr('url','<?=base_url()?>assign-department-action');
			break;
			case 'role_assign':	
				role_all();
				$('#role_id').selectpicker();
				$('.record_form_title').html('Assign Role');
				$('.add-info-modal-title').html('Assign New Role');
				$('.assign-role-modal-body').show();
				$('.assign-role').removeAttr('disabled');
				$('#add_info_form').attr('url','<?=base_url()?>role-assignment-action');
			break;
			case 'qualification_list':	
				$('.record_form_title').html('Qualification List');
				$('.add-info-modal-title').html('Add New Qualification');
				$('.qualification-list-modal-body').show();
				$('.qualification-list').removeAttr('disabled');
				$('#add_info_form').attr('url','<?=base_url()?>qualification-action');
			break;
			case 'work_experience_list':
				$('.record_form_title').html('Work Experiance List');
				$('.add-info-modal-title').html('Add New Work Experiance');
				$('.work-experience-list-modal-body').show();
				$('.work-experience-list').removeAttr('disabled');
				$('#add_info_form').attr('url','<?=base_url()?>work-experience-action');	
			break;
			case 'reference_list':
				$('.record_form_title').html('Reference List');
				$('.add-info-modal-title').html('Add New Reference');
				$('.reference-list-modal-body').show();
				$('.reference-list').removeAttr('disabled');
				$('#add_info_form').attr('url','<?=base_url()?>referance-action');	
			break;
			case 'document_list':	
				$('.record_form_title').html('Document List');
				$('.add-info-modal-title').html('Add New Document');
				$('.document-list-modal-body').show();
				$('.document-list').removeAttr('disabled');
				$('#add_info_form').attr('url','<?=base_url()?>document-action');
			break;
			case 'family_details_list':	
				$('.record_form_title').html('Family Member List');
				$('.add-info-modal-title').html('Add New Family Member');
				$('.family-details-list-modal-body').show();
				$('.family-details-list').removeAttr('disabled');
				$('#add_info_form').attr('url','<?=base_url()?>family-action');
			break;
		case 'bank_details_list':	
				$('.record_form_title').html('Bank Details List');
				$('.add-info-modal-title').html('Add Bank Details');
				$('.bank-details-list-modal-body').show();
				$('.bank-details-list').removeAttr('disabled');
				$('#add_info_form').attr('url','<?=base_url()?>bank-account-action');
			break;
		}
	}

	$('.close_model').click(function(){
    	$('#add_info_model').modal('hide');
    })

	$('#add-info-btn').on('click',function(){
		$('#add_info_model').modal('show');
	});


   	function get_user_details_list(){
   		var columns_data='';
		if ($.fn.DataTable.isDataTable('#datatable_list'))
		{
			var table = $('#datatable_list').DataTable();
			table.destroy();
			table.clear();
			table.state.clear();
		}

   		switch (active_tab) {
     		case "dept_assign":
		       	columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
			 			{title: "Department Name",data:"d_name",mSearch:true},\
			 			{title: "Sub-Department Name",data:"sd_name",mSearch:true},\
			 			{title: "Assigned DateTime",data:"date_time",mSearch:true},\
			 			{title: "Action",data:"action"},\
			 			{title: "Status",data:"status"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			]}]');
         		break;
     		case "role_assign":

     			columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
			 			{title: "Role",data:"name",mSearch:true},\
			 			{title: "Assigned DateTime",data:"date_time",mSearch:true},\
			 			{title: "Action",data:"action"},\
			 			{title: "Status",data:"status"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			]}]');
        		
         		break;
     		case "qualification_list":

     				columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
			 			{title: "Timestamp",data:"date_time",mSearch:true},\
			 			{title: "Registration No",data:"reg_no",mSearch:true},\
			 			{title: "University",data:"university",mSearch:true},\
			 			{title: "Valid Upto",data:"valid_up_to",mSearch:true},\
			 			{title: "Action",data:"action"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			]}]');
        		
         		break;
     		case "work_experience_list":

     				columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
			 			{title: "Employer Name",data:"name",mSearch:true},\
			 			{title: "Designation",data:"designation",mSearch:true},\
			 			{title: "From Date",data:"from_date",mSearch:true},\
			 			{title: "To Date",data:"to_date",mSearch:true},\
			 			{title: "Action",data:"action"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			]}]');
        		
         		break;
     		case "reference_list":

     				columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
			 			{title: "Name of Referance",data:"name",mSearch:true},\
			 			{title: "Reference Employer",data:"employer",mSearch:true},\
			 			{title: "Reference Designation",data:"designation",mSearch:true},\
			 			{title: "Reference Department",data:"department",mSearch:true},\
			 			{title: "Reference Contact No",data:"contact_no",mSearch:true},\
			 			{title: "Reference Mail-ID",data:"email",mSearch:true},\
			 			{title: "Action",data:"action"},\
			 			]}]');
        		
         		break;
     		case "document_list":

     			columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
			 			{title: "Document Name",data:"name",mSearch:true},\
			 			{title: "Document Number",data:"doc_number",mSearch:true},\
			 			{title: "Document Photo",data:"doc_url",mSearch:true},\
			 			{title: "Action",data:"action"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			]}]');
        		
         		break;
         	case "family_details_list":	

         		columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
			 			{title: "Contact Person Name",data:"name",mSearch:true},\
			 			{title: "Person Relation",data:"relation",mSearch:true},\
			 			{title: "Contact Person Contact No",data:"contact_number",mSearch:true},\
			 			{title: "Address",data:"address"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			]}]');
         		
         		break; 
         	case "bank_details_list":

         		columns_data= eval('[{"COLUMNS":[{title: "Id",data:"sr_no",mSearch:false},\
         				{title: "Account Holder Name",data:"name",mSearch:true},\
			 			{title: "Account Number",data:"account_number",mSearch:true},\
			 			{title: "IFSC Code",data:"ifsc_code",mSearch:true},\
			 			{title: "Branch",data:"branch_name"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			{title: "blank",data:"blank"},\
			 			]}]');
         		
         		break;     
        }	

		var table=$('#datatable_list').DataTable({
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			'autoWidth':true,
			'searching': true,
			'stateSave': true,
			'ajax': {
				'url':'<?=base_url()?>get-user-details-list',
				'data':{active_tab:active_tab,user_id:user_id},
				"dataSrc": function ( json ) {
                //Make your callback here.
                if(active_tab=='dept_assign' || active_tab=='refferal_list' || active_tab=='transaction_list' || active_tab=='withdraw_list')
                {
                	total=json.total_amount;
                }
                return json.aaData;
            } 
			},
			'columns': columns_data[0].COLUMNS,
				dom: '<"html5buttons"B>lTfgitp',
				 'columnDefs':[
			            	{
					           'targets':[0,1,2,3,4,5,6,7],
					            "orderable": false,
				                'createdCell':  function (td, cellData, rowData, row, col) {
				                $(td).attr('style', 'white-space: nowrap;'); 
				            	}
			            	}
			 ],
			"drawCallback": function( settings ) {
				/*
				if(active_tab=='dept_assign' || active_tab=='refferal_list' || active_tab=='transaction_list' || active_tab=='withdraw_list')
                {
                	$('.dataTables_info').append('&nbsp;&nbsp;&nbsp;[ Total Amount = Rs.'+total+' ]');
                }*/

    		}
    	});

		table
    	switch(active_tab){
    		case "dept_assign":
    			
	    			table.columns(4).visible(false);
	    			table.columns(6).visible(false);
    				table.columns(7).visible(false);
	    			
	    	break;
    		case "role_assign":
    				
    				table.columns(3).visible(false);
    				table.columns(5).visible(false);
	    			table.columns(6).visible(false);
    				table.columns(7).visible(false);
	    			
	    	break;
	    	case "qualification_list":
	    			table.columns(6).visible(false);
    				table.columns(7).visible(false);
	    	break;
	    	case "work_experience_list":
	    			table.columns(6).visible(false);
    				table.columns(7).visible(false);
	    	break;
	    	case "live_test_list":
	    		/*
	    			table.columns(4).visible(true);
	    			table.columns(5).visible(true);
	    			table.columns(6).visible(true);
    				table.columns(7).visible(true);
	    			table.columns(8).visible(false);*/
	    	break;
	    	case "refferal_list":
	    		/*
	    			table.columns(4).visible(true);
	    			table.columns(5).visible(true);
	    			table.columns(6).visible(true);
    				table.columns(7).visible(true);
	    			table.columns(8).visible(true);
	    			table.columns(9).visible(false);
	    			table.columns(10).visible(false); */
	    	break;
	    	case "document_list":
	    		
	    			table.columns(5).visible(false);
	    			table.columns(6).visible(false);
    				table.columns(7).visible(false);
	    			
	    	break;
	    	case "family_details_list":
	    			
	    			table.columns(5).visible(false);
	    			table.columns(6).visible(false);
    				table.columns(7).visible(false);
	    			
	    	break;
	    	case "bank_details_list":
	    			
	    			table.columns(5).visible(false);
	    			table.columns(6).visible(false);
    				table.columns(7).visible(false);
	    			
	    	break;
    	}
	}

	function department_all() {
    $.ajax({
      url:'<?=base_url()?>department-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Department</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#d_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  	function role_all() {
    $.ajax({
      url:'<?=base_url()?>role-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#role_id").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  	$('#d_name').change(function(){
        var d_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>sub-department-by-dept",
            method:'post',
            async: false,
            dataType: 'json',
            data:{d_id:d_id},
            success:function(data)
            {   

                  console.log(data);
                  $('#sub_department').html('');
                  html='';
                  html='<option value="" selected="" disabled=""> Select Sub Department</option>';
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>'; 
                  } 
                  $('#sd_name').html(html);      
            },
        });  

   })


	$(document).on('click','.edit_PAN_details',function(){
		$('#user_PAN_details_model').modal('show');
	});

	$(document).on('click','.edit_bank_detail',function(){
		$('#user_bank_detail_modal').modal('show');
	});

	$(document).on('click','.add_bank_detail',function(){
		$('#add_bank_account_model').modal('show');
	});


	$(document).on('click','.change_status',function(){
		$('#modalConfirmYesNo').modal('show');
	});

   	$(document).on('click','.change_status',function () {
    UDA_id=$(this).attr('UDA_id');
    UDA_status=$(this).val();
    if (UDA_id) {
      if (confirm('Are Your Sure Want To chage This status ?')==true) {
        if(UDA_status=='Inactive')
          $(this).val('Active');
        else
          $(this).val('Inactive');
        $.ajax({
          url:'<?=base_url()?>change-department-assign-status',
          method:'post',
          data:{UDA_id:UDA_id,UDA_status:UDA_status},
          async: false,
          success:function (data) { 
            if(data){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
            }
          }
        })
      }
      else
      {
        if(UDA_status=='0')
          $(this).prop("checked", false);
        if(UDA_status=='1')
          $(this).prop("checked", true);
      }
    }
  }); 

	$('#add_info_form').on('submit',function(event){
		event.preventDefault(); 
		var form = $("#add_info_form");
		var formData = new FormData(this);
		url=$('#add_info_form').attr('url');
			$.ajax({
				url:url,
				method:'post',
				data:formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
				 if(typeof(data)=='object'){
		            if(data['swall']['type']=='success'){
		            	$('.add-info-input').val('');
		            	$('#add_info_model').modal('hide');
		            	get_user_details_list();
		            }
		            swal({
		              html:true,
		              title:data['swall']['title'],
		              text:data['swall']['text'],
		              type:data['swall']['type']
		            });
		          }else{
		            location.reload();
		          }
				},
			});
	});
	 
	$(document).on('click','.close_model',function () {
		$('#user_PAN_details_model').modal('hide');
		$('#user_bank_detail_modal').modal('hide');
		$('#view_refferal_course_model').modal('hide');
	});

	function checkIfImageExists(url, callback) {
	  const img = new Image();
	  img.src = url;
	  
	  if (img.complete) {
	    callback(true);
	  } else {
	    img.onload = () => {
	      callback(true);
	    };
	    
	    img.onerror = () => {
	      callback(false);
	    };
	  }
	}

	$('#myElement').click(function() {
    location.reload();
 });

	$('#submit_bank_details').on('submit',function(event){
		event.preventDefault(); 
		var form = $( "#submit_bank_details" );
		var formData = new FormData(this);
			$.ajax({
				url:'<?=base_url()?>update-user-bank-detail',
				method:'post',
				data:formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
					
						if(data['swall']['type']=='success')
						{
							$('#user_bank_detail_modal').modal('hide');
							location.reload();
						}

						swal({
							html:true,
							title:data['swall']['title'],
							text:data['swall']['text'],
							type:data['swall']['type']
						});

						
					
				},
			});
		
	});

	$('#add_bank_account_form').on('submit',function(event){
		event.preventDefault(); 
		var form = $("#add_bank_account_form");
		var formData = new FormData(this);
		formData.append('user_id', user_id);
			$.ajax({
				url:'<?=base_url()?>add-bank-account-action',
				method:'post',
				data:formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
					
						if(data['swall']['type']=='success')
						{
							$('#user_bank_detail_modal').modal('hide');
							
						}

						swal({
							html:true,
							title:data['swall']['title'],
							text:data['swall']['text'],
							type:data['swall']['type']
						});	
					
				},
			});
		
	});


	

	$(document).on('click','.change_RA_status',function () {
    RA_id=$(this).attr('RA_id');
    status=$(this).val();
    if (RA_id) {
      if (confirm('Are Your Sure Want To chage This Service status ?')==true) {
        $.ajax({
          url:'<?=base_url()?>change-role-assignment-status',
          method:'post',
          data:{RA_id:RA_id,status:status},
          async: false,
          success:function (data) { 
            if(data){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
            }
          }
        })
      }
      else
      {
        if(status=='Inactive')
          $(this).prop("checked", false);
        if(status=='Active')
          $(this).prop("checked", true);
      }
    }
  });
</script>