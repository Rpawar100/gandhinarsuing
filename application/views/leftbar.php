<style>
	/* width */
	::-webkit-scrollbar {
		width: 2px;
	}

	/* Track */
	::-webkit-scrollbar-track {
		background: #f1f1f1; 
	}

.btn-primary {
    color: #fff;
    background-color: #0b5b82 !important;
    border-color: #0b5b82 !important;
}

	/* Handle */
	::-webkit-scrollbar-thumb {
		background: #888; 
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
		background: #555; 
	}



	.nav > li > a{
		font-family: Palatino Linotype;
		font-size:16px;
		color:darkslategray;
		font-weight:500;
	}
	.metismenu .collapse.in{
		background-color:white;
	}
	#wrapper{
		background-color:white;
	}
	.navbar-static-side{
		border-right:1px solid lightskyblue;
	}
	/* stroke */
	nav.stroke ul li a,
	nav.fill ul li a {
		position: relative;
	}
	nav.stroke ul li a:after,
	nav.fill ul li a:after {
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		margin: auto;
		width: 0%;
		content: '.';
		color: transparent;
		background: #003A66;
		height: 1px;
	}
	nav.stroke ul li a:hover:after {
		width: 100%;
	}
	nav.fill ul li a {
		transition: all 2s;
	}
	nav.fill ul li a:after {
		text-align: left;
		content: '.';
		margin: 0;
		opacity: 0;
	}
	nav.fill ul li a:hover {
		color: #fff;
		z-index: 1;
	}
	nav.fill ul li a:hover:after {
		z-index: -10;
		animation: fill 1s forwards;
		-webkit-animation: fill 1s forwards;
		-moz-animation: fill 1s forwards;
		opacity: 1;
	}
	@-webkit-keyframes fill {
		0% {
			width: 0%;
			height: 1px;
		}
		50% {
			width: 100%;
			height: 1px;
		}
		100% {
			width: 100%;
				height: 100%;
				background: #0b5b82;
		}
	}
	.navbar-default .nav > li > a:hover, {
		background-color:none;
	}
	.dropdown-divider {
		height: 0;
		margin: .5rem 0;
		overflow: hidden;
		border-top: 1px solid #e9ecef;
	}

	.nav > li.active {
   
    	background: #60aad9;
	}
	thead>tr>th{
				background-color: #60aad9 !important;
				color: white !important;
			}
</style>

<nav class="navbar-static-side fill" role="navigation">
	<div class="sidebar-collapse" >
		<ul class="nav metismenu" id="side-menu" style="overflow-y: auto;">
			<li class="nav-header" style="padding:10px;background:#f7f5f5;">
				<div class="dropdown profile-element" style="text-align:center"> 
					
					<img alt="image" class="rounded-circle" src="<?=base_url('assets')?>/images/synergy_logo.png" style="width:100px;text-align:center;padding: 10px;"><br>
					<span style="color: black;font-family: cursive;font-size: medium;">Healthtech Simplified</span>
				</div>		
			</li>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)){?>
			<li id="dash_tab" >
				<a href="<?=base_url()?>dashboard" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
			</li>

			<li id="masters_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Masters</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="department_tab">
						<a href="<?=base_url()?>department" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Department</span></a>
					</li>

					<li id="sub_department_tab">
						<a href="<?=base_url()?>sub-department" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Sub-Department</span></a>
					</li>
					<li id="role_tab">
						<a href="<?=base_url()?>role" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Role</span></a>
					</li>
					<li id="designation_tab">
						<a href="<?=base_url()?>designation" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Designation</span></a>
					</li>
					<li id="specialization_tab" >
						<a href="<?=base_url()?>specialization" tabindex="-1"><i class="fa fa-gift"></i> <span class="nav-label">Specialization</span></a>
					</li>
					<li id="occupation_tab" >
						<a href="<?=base_url()?>occupation" tabindex="-1"><i class="fa fa-gift"></i> <span class="nav-label">Occupation</span></a>
					</li>
					<li id="floor_master_tab">
						<a href="<?=base_url()?>floor-" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Floor Master</span></a>
					</li>
					<li id="billing_class_tab">
						<a href="<?=base_url()?>billing-class" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Billing Class Master</span></a>
					</li>
					<li id="room_master_tab">
						<a href="<?=base_url()?>room-master" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Room Master</span></a>
					</li>
					<!--
					<li id="room_type_tab">
						<a href="<?=base_url()?>room-type" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Room Type</span></a>
					</li>-->
					<li id="bed_master_tab">
						<a href="<?=base_url()?>bed-master" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Bed Master</span></a>
					</li>
					<li id="visitor_reason_tab">
						<a href="<?=base_url()?>visitor-reason" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Visitor Reason</span></a>
					</li>
					<li id="user_tab">
						<a href="<?=base_url()?>user" tabindex="-1"><i class="fa fa-address-book-o"></i> <span class="nav-label">User Master</span></a>
					</li>
					<li id="doctor_tab">
						<a href="<?=base_url()?>doctor" tabindex="-1"><i class="fa fa-address-book-o"></i> <span class="nav-label">Doctor Master</span></a>
					</li>
					<li id="complaint_tab">
						<a href="<?=base_url()?>complaint" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">Complaints</span></a>
					</li>
					
					<li id="vendor_master_tab">
						<a href="<?=base_url()?>vendor-master" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Vendor Master</span></a>
					</li>
					
					
					<li id="patient_category_tab">
						<a href="<?=base_url()?>patient-category" tabindex="-1"><i class="fa fa-cubes"></i> <span class="nav-label">Patient Category</span></a>
					</li>
					<li id="patient_company_tab">
						<a href="<?=base_url()?>patient-company" tabindex="-1"><i class="fa fa-play"></i> <span class="nav-label">Patient Company</span></a>
					</li>




					
				</ul>
			</li>



			
			<!--
			
			<li id="task_taskassign_tab" >
				<a href="<?=base_url()?>task-taskassign" tabindex="-1"><i class="fa fa-gift"></i> <span class="nav-label">Task Task Assign</span></a>
			</li>-->
			<?php }?>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)||in_array("2", $role_array)){?>


			<li id="masters_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Visitor</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="visitor_dashboard_tab">
						<a href="<?=base_url()?>visitor-dashboard" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Visitor Dashboard</span></a>
					</li>
					<li id="visitor_tab">
						<a href="<?=base_url()?>visitor" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Visitor</span></a>
					</li>
					<li id="visitor_pass_tab">
						<a href="<?=base_url()?>visitor-pass" tabindex="-1"><i class="fa fa-address-book-o"></i> <span class="nav-label">Visitor Pass</span></a>
					</li>
				</ul>
			</li>
			
			
			<?php }?>
			<?php $role_array=$this->session->userdata('role');if (in_array("10", $role_array)){?>

			<li id="nursing_dashboard_tab" >
			<a href="<?=base_url()?>nursing-dashboard" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Nursing Dashboard</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>discharge-gynaecology" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Discharge Gynaechology</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>doctor-initial-assessment" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Doctor Initial Assessment</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>initial-nursing-assessment" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Initial Nursing Assessment</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>nursing-care-plan" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Nursing Care Plan</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>intake-output-record" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Intake Output Record</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>patient-assessment-form" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Patient Assessment Form</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>indwelling-lines-checklist" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Indwelling Lines Checklist</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>restraint-monitoring" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Restraint Monitoring</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>uti-bundle-checklist" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Uti Bundle Checklist</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>blood-transfusion" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Blood Transfusion</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>pain-re-assessment" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Pain Re Assessment</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>clasbsi-bundle-checklist" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Clasbsi Bundle Checklist</span></a>
			</li>

			<li id="discharge_gynaecology" >
			<a href="<?=base_url()?>mews" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Mews</span></a>
			</li>

			
			<?php }?>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)){?>
			
			
			<li id="department_assignment_tab">
				<a href="<?=base_url()?>department-assignment" tabindex="-1"><i class="fa fa-address-book-o"></i> <span class="nav-label">Dept. Assignment</span></a>
			</li>
			<li id="role_assignment_tab">
				<a href="<?=base_url()?>role-assignment" tabindex="-1"><i class="fa fa-address-book-o"></i> <span class="nav-label">Role Assignment</span></a>
			</li>
			
			<li id="receipt_tab">
				<a href="<?=base_url()?>receipt" tabindex="-1"><i class="fa fa-address-book-o"></i> <span class="nav-label">Receipt</span></a>
			</li>
			<li id="patient_tab">
				<a href="<?=base_url()?>patient" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Patient</span></a>
			</li>
			<li id="service_provider_tab">
				<a href="<?=base_url()?>service-provider" tabindex="-1"><i class="fa fa-address-book"></i> <span class="nav-label">Service Provider</span></a>
			</li>
			<li id="service_group_tab">
				<a href="<?=base_url()?>service-group" tabindex="-1"><i class="fa fa-address-book"></i> <span class="nav-label">Service Group</span></a>
			</li>
			
			<li id="packages_tab">
				<a href="<?=base_url()?>packages" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Packages</span></a>
			</li>
			<li id="package_service_assignment_tab">
				<a href="<?=base_url()?>package-service-assignment" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Package Service Assignment</span></a>
			</li>
			
			
			<li id="masters_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Services</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="services_tab">
						<a href="<?=base_url()?>services" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Service Master</span></a>
					</li>
					<li id="rate_config_tab">
						<a href="<?=base_url()?>rate-config" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Rate Config</span></a>
					</li>
					<li id="test_parameter_tab">
						<a href="<?=base_url()?>test-parameter" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Test Parameter</span></a>
					</li>
					<li id="rate_type_tab" >
						<a href="<?=base_url()?>rate-type" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Rate Type</span></a>
					</li>
				</ul>
			</li>



			
			
			
			
			
			<?php }?>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)||in_array("3", $role_array)){?>
			<li id="dash_tab" >
				<a href="<?=base_url()?>dashboard" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
			</li>
			<li id="opd_appointment_tab">
				<a href="<?=base_url()?>opd-appointment" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">OPD Registration</span></a>
			</li>
			<li id="opd_appointment_tab">
				<a href="<?=base_url()?>ipd-appointment" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">IPD Registration</span></a>
			</li>
			<li id="diagnosis_appt_tab">
				<a href="<?=base_url()?>diagnosis-appointment" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">Diagnosis Registration</span></a>
			</li>

			<li id="masters_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Billing</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="opd_billing_tab">
						<a href="<?=base_url()?>opd-billing" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">OPD Billing</span></a>
					</li>
					<li id="ipd_billing_tab">
						<a href="<?=base_url()?>ipd-billing" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">IPD Billing</span></a>
					</li>
					<li id="diagnosis_billing_tab">
						<a href="<?=base_url()?>diagnosis-billing" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">Diagnosis Billing</span></a>
					</li>
				</ul>
			</li>



			<?php }?>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)||in_array("5", $role_array)){?>
			
			<li id="casualty_appt_tab">
				<a href="<?=base_url()?>casualty-appointment" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">Emergency Registration</span></a>
			</li>
			<?php }?>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)||in_array("6", $role_array)){?>
			
			
			<li id="doctor_dashboard_tab">
				<a href="<?=base_url()?>doctor-dashboard" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">Doctor Dashboard</span></a>
			</li>
			<li id="ipd_dashboard_tab">
				<a href="<?=base_url()?>ipd-dashboard" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">IPD Dashboard</span></a>
			</li>
			<li id="masters_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Opration Theatre</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="OT_tab">
						<a href="<?=base_url()?>ot-registration" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">OT Registration</span></a>
					</li>
					<li id="equipment_group_tab">
						<a href="<?=base_url()?>equipment-group" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Equipment Group</span></a>
					</li>
				</ul>
			</li>
			
			
			<?php }?>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)||in_array("7", $role_array)||in_array("8", $role_array)||in_array("9", $role_array)){?>
			<li id="lab_technician_tab">
				<a href="<?=base_url()?>lab-technician" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">LIS Dashboard</span></a>
			</li>
			<?php }?>


			

			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)){?>

			<li id="mrd_tab">
				<a href="<?=base_url()?>mrd" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">MRD</span></a>
			</li>
			<li id="mrd_doc_tab">
				<a href="<?=base_url()?>mrd-doc" tabindex="-1"><i class="fa fa-file-text"></i> <span class="nav-label">MRD DOCS</span></a>
			</li>
			<li id="legal_tab" >
				<a href="<?=base_url()?>legal-licensing" tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Legal Licensing</span></a>
			</li>
			<li id="interview_form_tab">
				<a href="<?=base_url()?>interview-form" tabindex="-1"><i class="fa fa-address-book-o"></i> <span class="nav-label">Interview Form</span></a>
			</li> 
			

			<li id="doctor_fee_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Inventory Managment</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="equipment_tab">
						<a href="<?=base_url()?>equipment" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Equipment</span></a>
					</li>
					<li id="purchase_master_tab">
						<a href="<?=base_url()?>purchase-master" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Purchase/GRN</span></a>
					</li>
					<li id="purchase_register_tab">
						<a href="<?=base_url()?>purchase-register" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Purchase Register</span></a>
					</li>
					<li id="asset_managment_tab">
						<a href="<?=base_url()?>asset-managment" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Asset Managment</span></a>
					</li>
					<li id="facility_management_tab">
						<a href="<?=base_url()?>facility-management" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Facility Managment</span></a>
					</li>
					<li id="canteen_management_tab">
						<a href="<?=base_url()?>canteen-management" tabindex="-1"><i class="fa fa-cube"></i> <span class="nav-label">Canteen Management</span></a>
					</li>
					<li id="hospital_income_report_tab">
						<a href="<?=base_url()?>hospital-income-report" tabindex="-1"><span class="nav-label">Hospital Income Report</span></a>
					</li>
					<li id="hospital_expenses_report_tab">
						<a href="<?=base_url()?>hospital-expenses-report" tabindex="-1"><span class="nav-label">Hospital Expenses Report</span></a>
					</li>

						<!-- 1. radiology income , pathelogy income,pharmacy income,ipd incoeme,opd income,cateen income -->

					<!-- expenses 1. salary expenses,rent and infra exp,fixed asset purchase,maintainance exp,
						facility mana exp,employee welfare exp,patient welfare exp, -->


					
					
				</ul>
			</li>
			<?php } ?> 

			<li id="doctor_fee_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Account</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="doctor_calculation_tab">
						<a href="<?=base_url()?>doctor_calculation" tabindex="-1"><span class="nav-label">Doctor Calculation</span></a>
					</li>

					<li id="opd_report">
						<a href="<?=base_url()?>opd_payment_calc" tabindex="-1"><span class="nav-label">OPD Report</span></a>
					</li>
					
				
					
				</ul>
			</li>
			<?php $role_array=$this->session->userdata('role');if (in_array("1", $role_array)){?>
			<li id="report_tab">
				<a href="#" tabindex="-1"><i class="fa fa-file"></i> <span class="nav-label">Report</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse" >
					<li id="bank_statement_report">
						<a href="<?=base_url()?>bank-statement-report" tabindex="-1"><span class="nav-label">Bank Statement</span></a>
					</li>
					<li id="revenue_report">
						<a href="<?=base_url()?>revenue-report" tabindex="-1"><span class="nav-label">Revenue</span></a>
					</li>
					<li id="transaction_report">
						<a href="<?=base_url()?>transaction-report" tabindex="-1"><span class="nav-label">Tran. Completed</span></a>
					</li>
					<li id="transaction_initiate_report">
						<a href="<?=base_url()?>transaction-initiate-report" tabindex="-1"><span class="nav-label">Tran. Initiated</span></a>
					</li>
					<li id="referral_transaction_report">
						<a href="<?=base_url()?>referral-transaction-report" tabindex="-1"><span class="nav-label">Referral Transaction</span></a>
					</li>
					<li id="course_report">
						<a href="<?=base_url()?>course-report" tabindex="-1"><span class="nav-label">Course</span></a>
					</li>
					<li id="video_course_report">
						<a href="<?=base_url()?>video-course-report" tabindex="-1"><span class="nav-label">Video Course</span></a>
					</li>
					<li id="notes_course_report">
						<a href="<?=base_url()?>notes-course-report" tabindex="-1"><span class="nav-label">Notes Course</span></a>
					</li>
					<li id="user_report">
						<a href="<?=base_url()?>user-report" tabindex="-1"><span class="nav-label">User-ALL</span></a>
					</li>
					<li id="user_inactive_report">
						<a href="<?=base_url()?>user-inactive-report" tabindex="-1"><span class="nav-label">User-Inactive</span></a>
					</li>
					<li id="user_kyc_report">
						<a href="<?=base_url()?>user-kyc-report" tabindex="-1"><span class="nav-label">User KYC</span></a>
					</li>
					<li id="withdraw_report">
						<a href="<?=base_url()?>withdraw-report" tabindex="-1"><span class="nav-label">Withdraw</span></a>
					</li>
					<li id="GST_report">
						<a href="<?=base_url()?>GST-report" tabindex="-1"><span class="nav-label">GST</span></a>
					</li>
					<li id="user_referral_report">
						<a href="<?=base_url()?>user-referral-report" tabindex="-1"><span class="nav-label">User Referral</span></a>
					</li>
					
				</ul>
			</li>
			<?php }?>
			<li id="notifi_tab">
				<a href="<?=base_url()?>notification" tabindex="-1"><i class="fa fa-bell"></i> <span class="nav-label">My Expensses</span></a>
			</li>
			<li id="notifi_tab">
				<a href="<?=base_url()?>notification" tabindex="-1"><i class="fa fa-bell"></i> <span class="nav-label">Notification</span></a>
			</li>
		</ul>
	</div>
</nav>
<div id="page-wrapper" class="gray-bg">
	<div class="row border-bottom">
    	<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0px;box-shadow: 0px 2px 5px lightgray;padding-right: 2%;">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:;"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
            	<li>
            		<span>Welcome to  Gandhi Nursing Home</span>
        		</li>
          		<?php $user_type=$this->session->userdata('user_type');if($user_type=='1'){?>
          		<li>
        			<a href="<?=base_url()?>setting" style="color: black;padding: 7px">
                		<img src="<?=base_url('assets')?>/images/setting.png" alt="settnig" height="42" width="42">
            		</a>
        		</li>
        		<?php }?>
        		<li>
        			<a data-target="#password_modal" data-toggle="modal" style="color: black;padding: 7px">
                		<img src="<?=base_url('assets')?>/images/password_change.jpg" alt="Password Change" height="42" width="42">
            		</a>
        		</li>
        		<li>
            		<a href="<?=site_url('logout'); ?>" style="color: black;padding: 7px">
                		<img src="<?=base_url('assets')?>/images/logout.png" alt="लॉग आऊट" height="42" width="42">
            		</a>
        		</li>
		    </ul>
		</nav>
	</div>
	<div class="modal fade" id="password_modal" role="dialog">
    	<div class="modal-dialog">
      		<div class="modal-content">
	      		<form method="post" id="update_password" enctype="multipart/form-data">
	        		<div class="modal-header">
	          			<h4 class="modal-title">Change Password</h4>
	          			<button type="button" class="close" data-dismiss="modal">&times;</button>
	      			</div>
		      		<div class="modal-body" style="padding-bottom: 0px;">
		        		<div class="col-lg-12">
		             		<div class="row" style="margin-bottom:20px;"> 
		                			<label class="col-lg-5 control-label">New Password <b style="float: right;">:</b> </label>
		                			<div class="col-lg-7">                    
		                    			<input class="form-control" type="password" name="password_header" id="password_header" required="">
		                			</div>
		            		</div>
		            		<div class="row" > 
		                		<label class="col-lg-5 control-label">Confirm Password <b style="float: right;">:</b></label>
		                		<div class="col-lg-7">                    
		                     		<input class="form-control" type="password" name="confirm_password_header" id="confirm_password_header" required="">
		                		</div>
		            		</div>
		        		</div>
		      		</div>
		      		<div class="modal-footer" style="border-top:0px!important;">
		          		<button type="submit" class="btn btn-info update_current_user_password" data-dismiss="modal">Update</button>
		          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
	      		</form>
      		</div>
    	</div>
	</div>
