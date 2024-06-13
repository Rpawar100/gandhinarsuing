<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authentication
$route['default_controller'] = 'Cn_authentication';
$route['login'] = 'Cn_authentication/login';
$route['logout'] = 'Cn_authentication/logout';
// $route['change-language'] = 'Cn_authentication/change_language'; 

//Dashboard
$route['dashboard'] = 'Cn_dashboard';

$route['purchase-register'] = 'Cn_purchase_register';
$route['department-list'] = 'Cn_department/department_list';

$route['asset-managment'] = 'Cn_asset_managment';
$route['department-list'] = 'Cn_department/department_list';

$route['facility-management'] = 'Cn_facility_management';
$route['canteen-management'] = 'Cn_canteen_management';

$route['hospital-income-report'] = 'Cn_hospital_income';

$route['hospital-expenses-report'] = 'Cn_hospital_expenses';










// Departement 
$route['department'] = 'Cn_department';
$route['department-list'] = 'Cn_department/department_list';
$route['department-action'] = 'Cn_department/department_action';
$route['department-delete'] = 'Cn_department/department_delete';
$route['department-by-id'] = 'Cn_department/department_by_id';
$route['department-all'] = 'Cn_department/department_all';
$route['section-all'] = 'Cn_department/section_all';
$route['department-by-section'] = 'Cn_department/department_by_section';

// Sub-Departement 
$route['sub-department'] = 'Cn_sub_department';
$route['sub-department-list'] = 'Cn_sub_department/sub_department_list';
$route['sub-department-action'] = 'Cn_sub_department/sub_department_action';
$route['sub-department-delete'] = 'Cn_sub_department/sub_department_delete';
$route['sub-department-by-id'] = 'Cn_sub_department/sub_department_by_id';
$route['sub-department-by-dept'] = 'Cn_sub_department/sub_department_by_dept';
$route['sub-department-all'] = 'Cn_sub_department/sub_department_all';

$route['barcode-print'] = 'Cn_barcode_print/barcode_print';


// Role 
$route['role'] = 'Cn_role';
$route['role-list'] = 'Cn_role/role_list';
$route['role-action'] = 'Cn_role/role_action';
$route['role-delete'] = 'Cn_role/role_delete';
$route['role-by-id'] = 'Cn_role/role_by_id';
$route['role-all'] = 'Cn_role/role_all';

// designation
$route['designation'] = 'Cn_designation';
$route['designation-list'] = 'Cn_designation/designation_list';
$route['designation-action'] = 'Cn_designation/designation_action';
$route['designation-delete'] = 'Cn_designation/designation_delete';
$route['designation-by-id'] = 'Cn_designation/designation_by_id';
$route['designation-all'] = 'Cn_designation/designation_all';


// Departement 
$route['specialization'] = 'Cn_specialization';
$route['specialization-list'] = 'Cn_specialization/specialization_list';
$route['specialization-action'] = 'Cn_specialization/specialization_action';
$route['specialization-delete'] = 'Cn_specialization/specialization_delete';
$route['specialization-by-id'] = 'Cn_specialization/specialization_by_id';
$route['specialization-all'] = 'Cn_specialization/specialization_all';


// Visitor Reason
$route['visitor-reason'] = 'Cn_visitor_reason';
$route['visitor-reason-list'] = 'Cn_visitor_reason/visitor_reason_list';
$route['visitor-reason-action'] = 'Cn_visitor_reason/visitor_reason_action';
$route['visitor-reason-delete'] = 'Cn_visitor_reason/visitor_reason_delete';
$route['visitor-reason-by-id'] = 'Cn_visitor_reason/visitor_reason_by_id';
$route['visitor-reason-all'] = 'Cn_visitor_reason/visitor_reason_all';


// Visitor 
$route['visitor'] = 'Cn_visitor';
$route['visitor-list'] = 'Cn_visitor/visitor_list';
$route['visitor-action'] = 'Cn_visitor/visitor_action';
$route['visitor-delete'] = 'Cn_visitor/visitor_delete';
$route['visitor-by-id'] = 'Cn_visitor/visitor_by_id';
$route['visitor-update-status'] = 'Cn_visitor/visitor_update_status';
$route['visitor-summary-count'] = 'Cn_visitor/visitor_summary_count';
$route['visitor-dashboard'] = 'Cn_visitor/visitor_dashboard';

// Visitor Pass 
$route['visitor-pass'] = 'Cn_visitor_pass';
$route['visitor-pass-action'] = 'Cn_visitor_pass/visitor_pass_action';
$route['visitor-pass-list'] = 'Cn_visitor_pass/visitor_pass_list';
$route['discard-pass-form'] = 'Cn_visitor_pass/discard_pass_form';
$route['cancel-discarded-pass'] = 'Cn_visitor_pass/cancel_discarded_pass';

// Visitor Reason
$route['occupation'] = 'Cn_occupation';
$route['occupation-list'] = 'Cn_occupation/occupation_list';
$route['occupation-action'] = 'Cn_occupation/occupation_action';
$route['occupation-delete'] = 'Cn_occupation/occupation_delete';
$route['occupation-by-id'] = 'Cn_occupation/occupation_by_id';
$route['occupation-all'] = 'Cn_occupation/occupation_all';

//User

$route['user'] = 'Cn_user';
$route['user-list'] = 'Cn_user/user_list';
$route['user-action'] = 'Cn_user/user_action';
$route['user-delete'] = 'Cn_user/user_delete';
$route['user-by-id'] = 'Cn_user/user_by_id';
$route['department-role-designation-all'] = 'Cn_user/department_role_designation_all';
$route['chage-user-status'] = 'Cn_user/chage_user_status';
$route['get-pincode'] = 'Cn_user/get_pincode';
$route['doctor-by-section-id'] = 'Cn_user/doctor_by_section_id';
$route['department-by-doctor-id'] = 'Cn_user/department_by_doctor_id';
$route['doctor-by-department-id'] = 'Cn_user/doctor_by_department_id';
$route['doctors-by-sub-department-id'] = 'Cn_user/doctors_by_sub_department_id';
$route['user-details/(:num)'] = 'Cn_user/user_details/$1';
$route['users-all'] = 'Cn_user/users_all';
$route['doctors-all'] = 'Cn_user/doctors_all';
$route['qualification-action'] = 'Cn_user/qualification_action';
$route['referance-action'] = 'Cn_user/referance_action';
$route['document-action'] = 'Cn_user/document_action';
$route['family-action'] = 'Cn_user/family_action';
$route['CMA-doctor-list'] = 'Cn_user/CMA_doctor_list';
$route['bank-account-action'] = 'Cn_user/add_bank_account_action';







$route['doctor'] = 'Cn_doctor';

// interview form

$route['interview-form'] = 'Cn_interview_form';
$route['interview-action'] = 'Cn_interview_form/interview_action';
$route['interview-list'] = 'Cn_interview_form/interview_list';
$route['schedule-interview-action'] = 'Cn_interview_form/schedule_interview_action';
$route['get-interview-detail'] = 'Cn_interview_form/get_interview_detail';
$route['interview-feedback-action'] = 'Cn_interview_form/interview_feedback_action';
$route['get-candidate-detail'] = 'Cn_interview_form/get_candidate_detail';
$route['evaluation-form-action'] = 'Cn_interview_form/evaluation_form_action';









// User details
$route['assign-department-action'] = 'Cn_user/assign_department_action';
$route['assign-department-delete'] = 'Cn_user/assign_department_delete';
$route['user-department-assign-list'] = 'Cn_user/user_department_assign_list';
$route['user-doctors-by-service'] = 'Cn_user/user_doctors_by_service';
$route['change-department-assign-status'] = 'Cn_user/change_department_assign_status';
$route['get-user-details-list'] = 'Cn_user/get_user_details_list';



//Service Provider

$route['service-provider'] = 'Cn_service_provider';
$route['service-provider-list'] = 'Cn_service_provider/service_provider_list';
$route['service-provider-action'] = 'Cn_service_provider/service_provider_action';
$route['service-provider-delete'] = 'Cn_service_provider/service_provider_delete';
$route['service-provider-by-id'] = 'Cn_service_provider/service_provider_by_id';
$route['department-role-designation-all'] = 'Cn_service_provider/department_role_designation_all';
$route['change-service-provider-status'] = 'Cn_service_provider/change_service_provider_status';


//service group

$route['service-group'] = 'Cn_service_group';
$route['service-group-list'] = 'Cn_service_group/service_group_list';
$route['service-group-action'] = 'Cn_service_group/service_group_action';
$route['service-group-delete'] = 'Cn_service_group/service_group_delete';
$route['service-group-by-id'] = 'Cn_service_group/service_group_by_id';
$route['change-service-group-status'] = 'Cn_service_group/change_service_group_status';
$route['service-group-all'] = 'Cn_service_group/service_group_all';


//services

$route['services'] = 'Cn_services';
$route['services-list'] = 'Cn_services/services_list';
$route['services-action'] = 'Cn_services/services_action';
$route['services-delete'] = 'Cn_services/services_delete';
$route['services-all'] = 'Cn_services/services_all';
$route['services-by-id'] = 'Cn_services/services_by_id';
$route['change-services-status'] = 'Cn_services/change_services_status';
$route['services-by-department-id'] = 'Cn_services/services_by_department_id';
$route['services-by-sub-department-id'] = 'Cn_services/services_by_sub_department_id';
$route['services-diagnosis'] = 'Cn_services/services_diagnosis';


// Test Parameter
$route['test-parameter'] = 'Cn_test_parameter';
$route['test-parameter-list'] = 'Cn_test_parameter/test_parameter_list';
$route['test-parameter-action'] = 'Cn_test_parameter/test_parameter_action';
$route['test-parameter-delete'] = 'Cn_test_parameter/test_parameter_delete';
$route['test-parameter-by-id'] = 'Cn_test_parameter/test_parameter_by_id';
$route['test-parameter-all'] = 'Cn_test_parameter/test_parameter_all';
$route['test-parameter-by-appointment-id'] = 'Cn_test_parameter/test_parameter_by_appointment_id';
$route['parameter-range-action'] = 'Cn_test_parameter/parameter_range_action';
$route['get-parameter-range-list'] = 'Cn_test_parameter/get_parameter_range_list';
$route['parameter-range-delete'] = 'Cn_test_parameter/parameter_range_delete';
$route['parameter-range-by-id'] = 'Cn_test_parameter/parameter_range_by_id';



// Route Type 
$route['rate-type'] = 'Cn_rate_type';
$route['rate-type-list'] = 'Cn_rate_type/rate_type_list';
$route['rate-type-action'] = 'Cn_rate_type/rate_type_action';
$route['rate-type-delete'] = 'Cn_rate_type/rate_type_delete';
$route['rate-type-by-id'] = 'Cn_rate_type/rate_type_by_id';
$route['rate-type-all'] = 'Cn_rate_type/rate_type_all';

// Patient Category
$route['patient-category'] = 'Cn_patient_category';
$route['patient-category-list'] = 'Cn_patient_category/patient_category_list';
$route['patient-category-action'] = 'Cn_patient_category/patient_category_action';
$route['patient-category-delete'] = 'Cn_patient_category/patient_category_delete';
$route['patient-category-by-id'] = 'Cn_patient_category/patient_category_by_id';
$route['patient-category-all'] = 'Cn_patient_category/patient_category_all';


// Patient Company 
$route['patient-company'] = 'Cn_patient_company';
$route['patient-company-list'] = 'Cn_patient_company/patient_company_list';
$route['patient-company-action'] = 'Cn_patient_company/patient_company_action';
$route['patient-company-delete'] = 'Cn_patient_company/patient_company_delete';
$route['patient-company-by-id'] = 'Cn_patient_company/patient_company_by_id';


//Rate Config
$route['rate-config'] = 'Cn_rate_config';
$route['rate-config-list'] = 'Cn_rate_config/rate_config_list';
$route['rate-config-action'] = 'Cn_rate_config/rate_config_action';
$route['rate-config-delete'] = 'Cn_rate_config/rate_config_delete';
$route['rate-config-by-id'] = 'Cn_rate_config/rate_config_by_id';


//Patient
$route['patient'] = 'Cn_patient';
$route['patient-list'] = 'Cn_patient/patient_list';
$route['patient-action'] = 'Cn_patient/patient_action';
$route['patient-delete'] = 'Cn_patient/patient_delete';
$route['patient-by-id'] = 'Cn_patient/patient_by_id';
$route['search-patient-form'] = 'Cn_patient/search_patient_form';

// patient demographics details

$route['demographic-detail/(:num)'] = 'Cn_demographic_detail/index/$1';
$route['complaints-all'] = 'Cn_demographic_detail/complaints_all';
$route['prescription-all'] = 'Cn_demographic_detail/prescription_all';
$route['prescription-action'] = 'Cn_demographic_detail/prescription_action';
$route['clinical-examinition-action'] = 'Cn_demographic_detail/clinical_examinition_action';
$route['investigation-test-list'] = 'Cn_demographic_detail/investigation_test_list';
$route['LOT-task-action'] = 'Cn_demographic_detail/LOT_task_action';
$route['LOT-task-list'] = 'Cn_demographic_detail/LOT_task_list';
$route['LOT-task-delete'] = 'Cn_demographic_detail/LOT_task_delete';
$route['LOT-task-by-id'] = 'Cn_demographic_detail/LOT_task_by_id';
$route['get-test-report-list'] = 'Cn_demographic_detail/get_test_report_list';
$route['LOT-remark-action'] = 'Cn_demographic_detail/LOT_remark_action';
$route['show-discharge-summery'] = 'Cn_demographic_detail/show_discharge_summery';
$route['add-other-services-action'] = 'Cn_demographic_detail/add_other_services_action';
$route['product-type-all'] = 'Cn_demographic_detail/product_type_all';
$route['add-consumable-action'] = 'Cn_demographic_detail/add_consumable_action';
$route['unit-by-product'] = 'Cn_demographic_detail/unit_by_product';
$route['get-consumable-list'] = 'Cn_demographic_detail/get_consumable_list';
$route['change-consumable-state'] = 'Cn_demographic_detail/change_consumable_state';
$route['get-services-list'] = 'Cn_demographic_detail/get_services_list';
$route['change-service-state'] = 'Cn_demographic_detail/change_service_state';
$route['patient-prescription-all'] = 'Cn_demographic_detail/patient_prescription_all';
$route['change-prescription-state'] = 'Cn_demographic_detail/change_prescription_state';
$route['get-bed-list'] = 'Cn_demographic_detail/get_bed_list';
$route['transfer-bed-action'] = 'Cn_demographic_detail/transfer_bed_action';
$route['generate-discharge-report/(:num)'] = 'Cn_demographic_detail/generate_discharge_report/$1';
$route['discharge-form-action'] = 'Cn_demographic_detail/discharge_form_action';
$route['present-illness-form-action'] = 'Cn_demographic_detail/present_illness_form_action';
$route['patient-refer-action'] = 'Cn_demographic_detail/patient_refer_action';
$route['patient-refer-list'] = 'Cn_demographic_detail/patient_refer_list';
$route['print-ICA/(:num)'] = 'Cn_demographic_detail/print_ICA/$1';
$route['concent-all'] = 'Cn_demographic_detail/concent_all';

$route['load-concent-form/(:any)'] = 'Cn_demographic_detail/load_concent_form/$1';
$route['favourite-service-action'] = 'Cn_demographic_detail/favourite_service_action';
$route['get-favourite-service'] = 'Cn_demographic_detail/get_favourite_service';
$route['favorite-service-delete'] = 'Cn_demographic_detail/favorite_service_delete';
$route['get-ICA-details'] = 'Cn_demographic_detail/get_ICA_details';
$route['consultation-status-action'] = 'Cn_demographic_detail/consultation_status_action';
















//opd Appointment
$route['opd-appointment'] = 'Cn_opd_appointment';
$route['opd-appointment-list'] = 'Cn_opd_appointment/opd_appointment_list';
$route['opd-appointment-action'] = 'Cn_opd_appointment/opd_appointment_action';
$route['opd-appointment-cancel'] = 'Cn_opd_appointment/opd_appointment_cancel';
$route['opd-appointment-receipt'] = 'Cn_opd_appointment/opd_appointment_receipt';
$route['opd-appointment-bill/(:num)'] = 'Cn_opd_appointment/opd_appointment_bill/$1';
$route['opd-appointment-by-id'] = 'Cn_opd_appointment/opd_appointment_by_id';
$route['generate-opd-casepaper/(:num)'] = 'Cn_opd_appointment/generate_opd_casepaper/$1';
$route['appointment-refund-request'] = 'Cn_opd_appointment/appointment_refund_request';
$route['generate-opd-label/(:num)'] = 'Cn_opd_appointment/generate_opd_label/$1';
$route['patient-oppintment-detail'] = 'Cn_opd_appointment/patient_oppintment_detail';
$route['change-refund-request-status'] = 'Cn_opd_appointment/change_refund_request_status';
$route['change-all-appointment-status'] = 'Cn_opd_appointment/change_all_appointment_status';
$route['get-unpaid-services'] = 'Cn_opd_appointment/get_unpaid_services';


// daigno appointment
$route['casualty-appointment'] = 'Cn_casualty_appointment';
$route['casualty-appointment-list'] = 'Cn_casualty_appointment/casualty_appointment_list';
$route['casualty-appointment-action'] = 'Cn_casualty_appointment/casualty_appointment_action';
$route['casualty-appointment-cancel'] = 'Cn_casualty_appointment/casualty_appointment_cancel';



//Ipd appointment

$route['ipd-appointment'] = 'Cn_ipd_appointment';
$route['ipd-appointment-list'] = 'Cn_ipd_appointment/ipd_appointment_list';
$route['ipd-appointment-action'] = 'Cn_ipd_appointment/ipd_appointment_action';
$route['patient-services'] = 'Cn_ipd_appointment/patient_services';
$route['ipd-payment-receipt'] = 'Cn_ipd_appointment/ipd_payment_receipt';
$route['ipd-bill-received-amount'] = 'Cn_ipd_appointment/ipd_bill_received_amount';
$route['ipd-appointment-bill/(:num)'] = 'Cn_ipd_appointment/ipd_appointment_bill/$1';

$route['bed-availability'] = 'Cn_ipd_appointment/bed_availability';



$route['opd-billing'] = 'Cn_opd_billing';
$route['ipd-billing'] = 'Cn_ipd_billing';
$route['diagnosis-billing'] = 'Cn_diagnosis_billing';





//diagnosis Appointment
$route['diagnosis-appointment'] = 'Cn_diagnosis_appointment';
$route['diagnosis-appointment-list'] = 'Cn_diagnosis_appointment/diagnosis_appointment_list';
$route['diagnosis-appointment-action'] = 'Cn_diagnosis_appointment/diagnosis_appointment_action';
$route['diagnosis-appointment-cancel'] = 'Cn_diagnosis_appointment/diagnosis_appointment_cancel';
$route['diagnosis-appointment-receipt'] = 'Cn_diagnosis_appointment/diagnosis_appointment_receipt';
$route['diagnosis-appointment-by-id'] = 'Cn_diagnosis_appointment/diagnosis_appointment_by_id';
$route['diagnosis-appointment-form-doctor'] = 'Cn_diagnosis_appointment/diagnosis_appointment_form_doctor';
$route['diagnosis-appointment-detail'] = 'Cn_diagnosis_appointment/diagnosis_appointment_detail';
$route['diagnosis-appointment-receipt'] = 'Cn_diagnosis_appointment/diagno_appointment_receipt';
$route['diagnosis-bill-received-amount'] = 'Cn_diagnosis_appointment/diagno_bill_received_amount';




// Doctor Dashboard
$route['doctor-dashboard'] = 'Cn_doctor_dashboard';
$route['all-appointment-list'] = 'Cn_doctor_dashboard/all_appointment_list';




// complaint
$route['complaint'] = 'Cn_complaint';
$route['complaint-list'] = 'Cn_complaint/complaint_list';
$route['complaint-action'] = 'Cn_complaint/complaint_action';
$route['complaint-delete'] = 'Cn_complaint/complaint_delete';
$route['complaint-by-id'] = 'Cn_complaint/complaint_by_id';

// Department Assignment
$route['department-assignment'] = 'Cn_department_assignment';


// lis Dashboard
$route['lab-technician'] = 'Cn_lab_technician';
$route['lab-technician-appointment-list'] = 'Cn_lab_technician/lab_technician_appointment_list';
$route['test-value-action'] = 'Cn_lab_technician/test_value_action';
$route['upload-report-action'] = 'Cn_lab_technician/upload_report_action';
$route['generate-lis-report/(:num)'] = 'Cn_lab_technician/generate_lis_report/$1';
$route['change-appointment-status'] = 'Cn_lab_technician/change_appointment_status';
$route['lis-appointment-detail'] = 'Cn_lab_technician/lis_appointment_detail';
$route['generate-diagno-barcode/(:num)'] = 'Cn_lab_technician/generate_diagno_barcode/$1';








// role Assignment
$route['role-assignment'] = 'Cn_role_assignment';
$route['role-assignment-action'] = 'Cn_role_assignment/role_assignment_action';
$route['role-assignment-list'] = 'Cn_role_assignment/role_assignment_list';
$route['change-role-assignment-status'] = 'Cn_role_assignment/change_role_assignment_status';



// legal-licensing
$route['legal-licensing'] = 'Cn_legal_licensing';
$route['legal-licensing-list'] = 'Cn_legal_licensing/legal_licensing_list';
$route['legal-licensing-action'] = 'Cn_legal_licensing/legal_licensing_action';
$route['legal-licensing-details-action'] = 'Cn_legal_licensing/legal_licensing_details_action';
$route['legal-licensing-delete'] = 'Cn_legal_licensing/legal_licensing_delete';
$route['required-document-delete'] = 'Cn_legal_licensing/required_document_delete';
$route['legal-licensing-by-id'] = 'Cn_legal_licensing/legal_licensing_by_id';
$route['license-details-history'] = 'Cn_legal_licensing/license_details_history';
$route['license-required-doc-action'] = 'Cn_legal_licensing/license_required_doc_action';
$route['license-required-doc-list'] = 'Cn_legal_licensing/license_required_doc_list';

// pathologist
$route['pathologist'] = 'Cn_pathologist';
$route['pathologist-appointment-list'] = 'Cn_pathologist/pathologist_appointment_list';



// pathologist
$route['radiologist'] = 'Cn_radiologist';


//Packages
$route['packages'] = 'Cn_packages';
$route['package-action'] = 'Cn_packages/package_action';
$route['package-list'] = 'Cn_packages/package_list';
$route['package-delete'] = 'Cn_packages/package_delete';
$route['package-by-id'] = 'Cn_packages/package_by_id';

//Package_service_assignment
$route['package-service-assignment'] = 'Cn_package_service_assignment';
$route['PSA-list'] = 'Cn_package_service_assignment/PSA_list';
$route['psa-action'] = 'Cn_package_service_assignment/psa_action';
$route['packages-all'] = 'Cn_package_service_assignment/packages_all';
$route['services-all'] = 'Cn_package_service_assignment/services_all';
$route['package-services-by-id'] = 'Cn_package_service_assignment/package_services_by_id';
$route['psa-delete'] = 'Cn_package_service_assignment/psa_delete';

//Floor Master
$route['floor-master'] = 'Cn_floor_master';
$route['floor-list'] = 'Cn_floor_master/floor_list';
$route['Floor-action'] = 'Cn_floor_master/Floor_action';
$route['floor-delete'] = 'Cn_floor_master/floor_delete';
$route['floor-by-id'] = 'Cn_floor_master/floor_by_id';
$route['floor-all'] = 'Cn_floor_master/floor_all';



//Ward Master
$route['billing-class'] = 'Cn_billing_class';
$route['billing-class-list'] = 'Cn_billing_class/billing_class_list';
$route['billing-class-action'] = 'Cn_billing_class/billing_class_action';
$route['billing-class-delete'] = 'Cn_billing_class/billing_class_delete';
$route['billing-class-by-id'] = 'Cn_billing_class/billing_class_by_id';
$route['billing-class-all'] = 'Cn_billing_class/billing_class_all';


//Room Master
$route['room-master'] = 'Cn_room_master';
$route['room-list'] = 'Cn_room_master/room_list';
$route['room-action'] = 'Cn_room_master/room_action';
$route['room-delete'] = 'Cn_room_master/room_delete';
$route['room-by-id'] = 'Cn_room_master/room_by_id';
$route['room-all'] = 'Cn_room_master/room_all';
$route['OT-room-all'] = 'Cn_room_master/OT_room_all';
$route['room-by-ward-id'] = 'Cn_room_master/room_by_ward_id';
$route['add-bed-name-action'] = 'Cn_room_master/add_bed_name_action';


//Room Type
$route['room-type'] = 'Cn_room_type';
$route['room-type-list'] = 'Cn_room_type/room_type_list';
$route['room-type-action'] = 'Cn_room_type/room_type_action';
$route['room-type-delete'] = 'Cn_room_type/room_type_delete';
$route['room-type-by-id'] = 'Cn_room_type/room_type_by_id';
$route['room-type-all'] = 'Cn_room_type/room_type_all';



//Bed Master
$route['bed-master'] = 'Cn_bed_master';
$route['bed-list'] = 'Cn_bed_master/bed_list';
$route['bed-action'] = 'Cn_bed_master/bed_action';
$route['bed-delete'] = 'Cn_bed_master/bed_delete';
$route['bed-by-id'] = 'Cn_bed_master/bed_by_id';
$route['bed-by-room-id'] = 'Cn_bed_master/bed_by_room_id';





//Vendor Master
$route['vendor-master'] = 'Cn_vendor';
$route['vendor-list'] = 'Cn_vendor/vendor_list';
$route['vendor-action'] = 'Cn_vendor/vendor_action';
$route['vendor-delete'] = 'Cn_vendor/vendor_delete';
$route['vendor-by-id'] = 'Cn_vendor/vendor_by_id';
$route['vendor-all'] = 'Cn_vendor/vendor_all';



//Vendor Master
$route['purchase-master'] = 'Cn_purchase';
$route['purchase-action'] = 'Cn_purchase/purchase_action';
$route['purchase-list'] = 'Cn_purchase/purchase_list';


//ot registration

$route['ot-registration'] = 'Cn_OT_registration';
$route['check-OT-booking'] = 'Cn_OT_registration/check_OT_booking';
$route['check-OT-by-time'] = 'Cn_OT_registration/check_OT_by_time';
$route['OT-book-action'] = 'Cn_OT_registration/OT_book_action';
$route['booked-ot-list'] = 'Cn_OT_registration/booked_ot_list';
$route['ot-delete'] = 'Cn_OT_registration/ot_delete';
$route['ot-by-id'] = 'Cn_OT_registration/ot_by_id';
$route['ot-list-bymonth'] = 'Cn_OT_registration/ot_list_bymonth';



// MRD Document
$route['mrd-doc'] = 'Cn_mrd_doc';
$route['mrd-doc-list'] = 'Cn_mrd_doc/mrd_doc_list';
$route['mrd-doc-action'] = 'Cn_mrd_doc/mrd_doc_action';
$route['mrd-doc-delete'] = 'Cn_mrd_doc/mrd_doc_delete';
$route['mrd-doc-by-id'] = 'Cn_mrd_doc/mrd_doc_by_id';
$route['mrd-doc-all'] = 'Cn_mrd_doc/mrd_doc_all';

// MRd
$route['mrd'] = 'Cn_mrd';
$route['mrd-list'] = 'Cn_mrd/mrd_list';
$route['mrd-action'] = 'Cn_mrd/mrd_action';
$route['Mrd-doc-all'] = 'Cn_mrd/Mrd_doc_all';
$route['Appoinment-all'] = 'Cn_mrd/Appoinment_all';
$route['mrd-status'] = 'Cn_mrd/mrd_status';
$route['mrd-by-id'] = 'Cn_mrd/mrd_by_id';

// ipd dashboard
$route['ipd-dashboard'] = 'Cn_ipd_dashboard';
$route['get-allocation-count/(:num)'] = 'Cn_ipd_dashboard/get_allocation_count/$1';
$route['get-allocation-data'] = 'Cn_ipd_dashboard/get_allocation_data';
$route['search-by'] = 'Cn_ipd_dashboard/search_by';




//Equipment
$route['equipment'] = 'Cn_equipment';
$route['equipment-list'] = 'Cn_equipment/equipment_list';
$route['equipment-action'] = 'Cn_equipment/equipment_action';
$route['equipment-delete'] = 'Cn_equipment/equipment_delete';
$route['equipment-by-id'] = 'Cn_equipment/equipment_by_id';
$route['equipment-all'] = 'Cn_equipment/equipment_all';



//Equipment Group
$route['equipment-group'] = 'Cn_equipment_group';
$route['equipment-group-list'] = 'Cn_equipment_group/equipment_group_list';
$route['equipment-group-action'] = 'Cn_equipment_group/equipment_group_action';
$route['equipment-group-delete'] = 'Cn_equipment_group/equipment_group_delete';
$route['equipment-group-by-id'] = 'Cn_equipment_group/equipment_group_by_id';
$route['equipment-group-all'] = 'Cn_equipment_group/equipment_group_all';

//Discharge Gynaecology
$route['discharge-gynaecology'] = 'Cn_discharge_gynaecology';
$route['discharge-gynaecology-action'] = 'Cn_discharge_gynaecology/discharge_gynaecology_action';

//Discharge Gynaecology
$route['doctor_calculation'] = 'Cn_doctor_calculation';
$route['CMA-list'] = 'Cn_doctor_calculation/CMA_list';

$route['opd_payment_calc'] = 'Cn_opd_payment_calc';
$route['opd-payment-calc-list'] = 'Cn_opd_payment_calc/opd_payment_calc_list';

//Doctor Initial Assessment
$route['doctor-initial-assessment'] = 'Cn_doctor_initial_assessment';

//initial_nursing_assessment
$route['initial-nursing-assessment'] = 'Cn_initial_nursing_assessment';

// nursing care plan
$route['nursing-care-plan'] = 'Cn_nursing_care_plan';

// nursing care plan
$route['intake-output-record'] = 'Cn_intake_output_record';
$route['intake-output-record-action'] = 'Cn_intake_output_record/intake_output_record_action';



// nursing care plan
$route['patient-assessment-form'] = 'Cn_patient_assessment_form';

// nursing care plan
$route['indwelling-lines-checklist'] = 'Cn_indwelling_lines_checklist';

// restraint_monitoring
$route['restraint-monitoring'] = 'Cn_restraint_monitoring';

// restraint_monitoring
$route['uti-bundle-checklist'] = 'Cn_uti_bundle_checklist';

// restraint_monitoring
$route['uti-bundle-checklist'] = 'Cn_uti_bundle_checklist';

// blood_transfusion
$route['blood-transfusion'] = 'Cn_blood_transfusion';

// pain_re_assessment
$route['pain-re-assessment'] = 'Cn_pain_re_assessment';

// pain_re_assessment
$route['clasbsi-bundle-checklist'] = 'Cn_clasbsi_bundle_checklist';

// pain_re_assessment
$route['mews'] = 'Cn_mews';


// task assign
$route['task-taskassign'] = 'Cn_task_taskassign';
$route['task-record-action'] = 'Cn_task_taskassign/task_record_action';
$route['task-list'] = 'Cn_task_taskassign/task_list';
$route['task-all'] = 'Cn_task_taskassign/task_all';
$route['task-all'] = 'Cn_task_taskassign/get_task_assign_list';


// task assign
$route['nursing-dashboard'] = 'Cn_nursing_dashboard';

//receipt
$route['receipt']='Cn_receipt';
$route['get-receipt-list']='Cn_receipt/get_receipt_list';
$route['receipt-action']='Cn_receipt/receipt_action';










//$route['CMA-list'] = 'Cn_doctor_calculation/CMA_list';












