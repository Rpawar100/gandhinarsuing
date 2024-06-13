<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$app->get('/synergy_api', function ($request, $response) {
	echo "Synergy Api is Working Fine ";
});

$app->post('/check_key', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$version = $data['version'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT user_id, user_m_key, user_photo, concat(user_first_name,' ',user_last_name) as user_name,user_email,0 as user_role_id, user_designation_name FROM user WHERE user_m_key='" . $user_m_key . "' and user_m_key != '' and user_status='Active' ")->fetchAll(PDO::FETCH_ASSOC);


	if (!empty($key_result)) {
		$pdo->query("UPDATE user SET user_app_version='" . $version . "',user_last_timestamp=CURRENT_TIMESTAMP WHERE user_id='" . $key_result[0]['user_id'] . "'");
		$role_data = $pdo->query("SELECT RA_role_id FROM role_assignment WHERE RA_user_id='" . $key_result[0]['user_id'] . "'  and RS_status='Active' ")->fetchAll(PDO::FETCH_ASSOC);

		$user = array(
			"status" => "True",
			"messages" => "Valid Session!",
			"current_version" => "1.1",
			"data" => $key_result[0],
			"role_array" => $role_data,
		);
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}
	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/user_login', function ($request, $response) {
	$data = $request->getParsedBody();

	$username = $data['username'];
	$password = md5($data['password']);
	$user_mobile_token = $data['token'];
	$re_login = $data['re_login'];
	$user_id = $data['user_id'];

	require 'db_connect.php';
	if ($re_login == '1') {
			$pdo->query("UPDATE user set user_m_key='' where user_id='" . $user_id . "'");
	}

	$key_result = $pdo->query("SELECT user_id,user_m_key,user_photo,concat(user_first_name,' ',user_last_name) as user_name,0 as user_role_id,user_email,user_designation_name FROM user WHERE user_mobile_number='" . $username . "' and user_password='" . $password . "' and user_status='Active' ")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($key_result)) {
		if ($key_result[0]['user_m_key'] == '') {

			$key1  = random(10);
			$key2  = $key_result[0]['user_id'];
			$key3  = random(10);
			$key4  = $type;
			$arr = array($key1, $key2, $key3, $key4);
			$secure_key = implode($arr);
			$role_data = $pdo->query("SELECT RA_role_id FROM role_assignment WHERE RA_user_id='" . $key_result[0]['user_id'] . "'  and RS_status='Active' ")->fetchAll(PDO::FETCH_ASSOC);
			$pdo->query("UPDATE user SET user_m_key='" . $secure_key . "',user_mobile_token='" . $user_mobile_token . "' WHERE user_id='" . $key_result[0]['user_id'] . "'");
			$user = array(
				"status" => "True",
				"messages" => "Login Sucessfully.",
				"m_key" => $secure_key,
				"user_data" => $key_result[0],
				"current_version" => "1.1",
				"role_array" => $role_data,
			);
		} else {
			$user = array(
				"status" => "Relogin",
				"messages" => "User is Already Login using this Credentials.\nWould you Like to Logout and Re-Login here?",
				"user_id" => $key_result[0]['user_id'],
			);
		}
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Invalid Username or Password !!",
		);
	}

	$response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/user_logout', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);
	if (!empty($key_result)) {
		$key_sql_verify_result = $pdo->query("UPDATE user set user_m_key='Logout',user_mobile_token='',user_last_timestamp=CURRENT_TIMESTAMP where user_id='" . $key_result[0]['user_id'] . "'")->fetchAll(PDO::FETCH_ASSOC);
		$user = array(
			"status" => "True",
			"messages" => "Logout Sucessfully !",
		);
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}
	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/dashboard', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != ''")->fetchAll(PDO::FETCH_ASSOC);


	if (!empty($key_result)) {

		$department = $pdo->query("SELECT UDA_department_id FROM user_department_assign WHERE UDA_user_id ='" . $key_result[0]['user_id'] . "'")->fetchAll(PDO::FETCH_ASSOC);

		$count_ipd = $pdo->query("SELECT count(*) as count 
															FROM appointment 
															WHERE appointment_doctor_id = '" . $key_result[0]['user_id'] . "' 
																and appointment_section_id = 1
																and (appointment_status = 'Pending' OR appointment_status = 'Waiting')
	  														and date_format(appointment_created_at,'%Y-%m-%d') between '" . $data['start_date'] . "' and '" . $data['end_date'] ."'")->fetchAll(PDO::FETCH_ASSOC);

		$count_opd = $pdo->query("SELECT count(*) as count 
															FROM appointment 
															WHERE appointment_doctor_id = '" . $key_result[0]['user_id'] . "' 
																and appointment_section_id = 2
																and (appointment_status = 'Pending' OR appointment_status = 'Waiting')
	  														and date_format(appointment_created_at,'%Y-%m-%d') between '" . $data['start_date'] . "' and '" . $data['end_date'] ."'")->fetchAll(PDO::FETCH_ASSOC);

		$count_casuality = $pdo->query("SELECT count(*) as count 
															FROM appointment 
															WHERE appointment_doctor_id = '" . $key_result[0]['user_id'] . "' 
																and appointment_section_id = 5
																and (appointment_status = 'Pending' OR appointment_status = 'Waiting')
	  														and date_format(appointment_created_at,'%Y-%m-%d') between '" . $data['start_date'] . "' and '" . $data['end_date'] ."'")->fetchAll(PDO::FETCH_ASSOC);

		$count_ipd_completed = $pdo->query("SELECT count(*) as count 
															FROM appointment 
															WHERE appointment_doctor_id = '" . $key_result[0]['user_id'] . "' 
																and appointment_section_id = 1
																and appointment_status = 'Completed'
	  														and date_format(appointment_created_at,'%Y-%m-%d') between '" . $data['start_date'] . "' and '" . $data['end_date'] ."'")->fetchAll(PDO::FETCH_ASSOC);

		$count_opd_completed = $pdo->query("SELECT count(*) as count 
															FROM appointment 
															WHERE appointment_doctor_id = '" . $key_result[0]['user_id'] . "' 
																and appointment_section_id = 2
																and appointment_status = 'Completed'
	  														and date_format(appointment_created_at,'%Y-%m-%d') between '" . $data['start_date'] . "' and '" . $data['end_date'] ."'")->fetchAll(PDO::FETCH_ASSOC);

		$count_casuality_completed = $pdo->query("SELECT count(*) as count 
															FROM appointment 
															WHERE appointment_doctor_id = '" . $key_result[0]['user_id'] . "' 
																and appointment_section_id = 5
																and appointment_status = 'Completed'
	  														and date_format(appointment_created_at,'%Y-%m-%d') between '" . $data['start_date'] . "' and '" . $data['end_date'] ."'")->fetchAll(PDO::FETCH_ASSOC);

		$appointment_list = $pdo->query("SELECT appointment_id,
																						appointment_type,
																						appointment_status,
																						appointment_section_id,
																						P_grn,
																						CONCAT(P_name_prefix,' ', P_first_name,' ', P_middle_name,' ', P_last_name) as patient_full_name,
																						P_gender,
																						TIMESTAMPDIFF(YEAR, P_dob, CURDATE()) AS patient_age,
																						DATE_FORMAT(appointment_timestamp, '%d-%m-%Y %h:%i %p') as appointment_timestamp,
																						appointment_amount  
																		FROM appointment JOIN patient ON appointment_patient_id=P_id 
																		WHERE appointment_doctor_id = '" . $key_result[0]['user_id'] . "' 
																			and date_format(appointment_created_at,'%Y-%m-%d') between '" . $data['start_date'] . "' 
																			and '" . $data['end_date'] . "'")->fetchAll(PDO::FETCH_ASSOC);

		$user = array(
			"status" => "True",
			"messages" => "Data Found.",
			"count_ipd" => (string) $count_ipd[0]['count'],
			"count_opd" => (string) $count_opd[0]['count'],
			"count_casuality" => (string) $count_casuality[0]['count'],
			"count_ipd_completed" => (string) $count_ipd_completed[0]['count'],
			"count_opd_completed" => (string) $count_opd_completed[0]['count'],
			"count_casuality_completed" => (string) $count_casuality_completed[0]['count'],
			"appointment_list" => $appointment_list,
		);
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}

	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/demographic', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$patient_grn = $data['p_grn'];
	$patient_appointment = $data['p_appoinment'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user
															WHERE BINARY user_m_key='" . $user_m_key . "' 
																and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);

	

	if (!empty($key_result)) {

			$department = $pdo->query("SELECT UDA_department_id 
															 		 FROM user_department_assign 
																	WHERE UDA_user_id ='" . $key_result[0]['user_id'] . "'")->fetchAll(PDO::FETCH_ASSOC);

			$patient_details = $pdo->query("SELECT CONCAT(P_name_prefix,' ', P_first_name,' ', P_middle_name,' ', P_last_name) as patient_full_name, 
																					   TIMESTAMPDIFF(YEAR, P_dob, CURDATE()) as patient_age, 
						   															 P_gender,
																					 	 patient_company_name,
																					 	 P_id,
																					   (SELECT department_name FROM department WHERE department_id = appointment_department_id) AS department_name,
																					   (SELECT CONCAT(user_first_name, ' ', user_middle_name, ' ', user_last_name) FROM appointment 
																					   				 LEFT JOIN user ON appointment_doctor_id = user_id 
																		   				 			 WHERE appointment_id = $patient_appointment) AS doctor_full_name,	
																					   (SELECT appointment_timestamp FROM appointment WHERE appointment_id = $patient_appointment) AS appointment_timestamp
																			FROM patient
																					 LEFT JOIN appointment ON P_id = appointment_patient_id
																					 LEFT JOIN patient_company ON appointment_patient_company_id = patient_company_id
																			WHERE P_grn='" . $patient_grn . "'")->fetchAll(PDO::FETCH_ASSOC);

			
		$count_ipd = $pdo->query("SELECT count(*) as count 
																  FROM appointment JOIN patient ON appointment_patient_id=P_id 
																 WHERE P_grn='" . $patient_grn . "' 
																 	 and appointment_section_id = 1")->fetchAll(PDO::FETCH_ASSOC);

		$count_opd = $pdo->query("SELECT count(*) as count 
																  FROM appointment JOIN patient ON appointment_patient_id=P_id 
																 WHERE P_grn='" . $patient_grn . "' 
																 	 and appointment_section_id = 2")->fetchAll(PDO::FETCH_ASSOC);

		$count_casuality = $pdo->query("SELECT count(*) as count 
																  		FROM appointment JOIN patient ON appointment_patient_id=P_id 
																 		 WHERE P_grn='" . $patient_grn . "' 
																 	 and appointment_section_id = 5")->fetchAll(PDO::FETCH_ASSOC);

		$appointment_list = $pdo->query("SELECT appointment_type,
																						appointment_id,
																						DATE_FORMAT(appointment_timestamp, '%d-%m-%Y %h:%i %p') as appointment_timestamp, 
																						CONCAT(user_first_name, ' ', user_middle_name, ' ', user_last_name) as doctor_full_name,
																						department_name
																			 FROM appointment JOIN patient ON appointment_patient_id = P_id 
																												left JOIN user ON appointment_doctor_id = user_id
																												left JOIN department ON appointment_department_id = department_id 
																												left JOIN appointment_services_assign ON appointment.appointment_id = ASA_appointment_id
																			 WHERE appointment_patient_id = '" . $patient_details[0]['P_id'] . "'")->fetchAll(PDO::FETCH_ASSOC);

		$user = array(
			"status" => "True",
			"messages" => "Data Found.",
			"patient_full_name" => (string) $patient_details[0]['patient_full_name'],
			"patient_company_name" => (string) $patient_details[0]['patient_company_name'],
			"patient_doctor_name" => (string) $patient_details[0]['doctor_full_name'],
			"department_name" => (string) $patient_details[0]['department_name'],
			"department_name" => (string) $patient_details[0]['department_name'],
			"appointment_timestamp" => (string) $patient_details[0]['appointment_timestamp'],
			"patient_age" => (string) $patient_details[0]['patient_age'],
			"P_gender" => (string) $patient_details[0]['P_gender'],
			"count_ipd" => (string) $count_ipd[0]['count'],
			"count_opd" => (string) $count_opd[0]['count'],
			"count_casuality" => (string) $count_casuality[0]['count'],
			"appointment_list" => $appointment_list,
		);
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		); 
	}

	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/reports', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$appointment_id = $data['appointment_id'];

	require 'db_connect.php';

	if($appointment_id != ""){
		$investigation_report_list = $pdo->query("SELECT ASA_service_report FROM appointment_services_assign WHERE ASA_appointment_id = '".$appointment_id."'")->fetchAll(PDO::FETCH_ASSOC);

		$user = array(
			"status" => "True",
			"messages" => "Data Found.",
			"report_list" => $investigation_report_list,
		);

	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		); 
	}

	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/present_illness', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$appointment_id = $data['appointment_id'];
	$action = $data['action'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($key_result)) {
		switch ($action) {

			case "LIST":
				$illness_list = $pdo->query("SELECT PI_id, PI_compalint_detail as detail, complaint_name as complaint  
					 														 FROM present_illness JOIN complaint ON PI_compalint_id = complaint_id
					 														WHERE PI_appointment_id = '" . $appointment_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Present Illness Found",
					"illness_list" => $illness_list,
				);
				break;

			case "ADD":
				$complaint_id = $data['complaint_id'];
				$complaint_detail = $data['complaint_detail'];

				$illness_list = $pdo->query("SELECT * 
																			 FROM present_illness 
								 											WHERE PI_appointment_id = '" . $appointment_id . "' and PI_compalint_id = '" . $complaint_id . "' and PI_compalint_detail = '" . $complaint_detail . "'")->fetchAll(PDO::FETCH_ASSOC);
				if (empty($illness_list)) {
					$pdo->query("INSERT INTO present_illness (PI_appointment_id, PI_compalint_id, PI_compalint_detail) 
														VALUES ('" . $appointment_id . "','" . $complaint_id . "','" . $complaint_detail . "')");

					$user = array(
						"status" => "True",
						"messages" => "Complaint Added Successfully",
					);
				} else {
					$user = array(
						"status" => "True",
						"messages" => "Already Present",
					);
				}
				break;

			case 'DROPDOWN':
				$complaint_search = $data['complaint_search'];
				$data_list = $pdo->query("SELECT complaint_name AS name, complaint_id AS id FROM complaint WHERE complaint_name LIKE '%" . $complaint_search . "%'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "DROPDOWN DATA FOUND",
					"list" => $data_list,
				);
				break;

			case "DELETE":
				$present_illness_id = $data['present_illness_id'];

				$illness_list = $pdo->query("SELECT * FROM present_illness 
						 																	WHERE PI_appointment_id = '" . $appointment_id . "' and PI_id = '" . $present_illness_id . "'")->fetchAll(PDO::FETCH_ASSOC);
				if (!empty($illness_list)) {
					$pdo->query("DELETE FROM present_illness  WHERE PI_id = '" . $present_illness_id . "'");

					$user = array(
						"status" => "True",
						"messages" => "Deleted Successfully",
					);
				} else {
					$user = array(
						"status" => "True",
						"messages" => "Invalid Present Illness ID",
					);
				}
				break;

			default:
				$user = array(
					"status" => "False",
					"messages" => "Invalid Action",
				);
				break;
		}
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}



	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

// MUST ADD EXAMINATION DETAILS COLUMN & APPOINTMENT_ID COLUMN.
$app->post('/clinical_examination', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$CE_appointment_id = $data['CE_appointment_id'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($key_result)) {

	// $CE_id = $data['CE_id'];
	$CE_appointment_id = $data['CE_appointment_id'];
	$CE_timestamp = $data['CE_timestamp'];
	$CE_medical_history = $data['CE_medical_history'];
	$CE_surgical_history = $data['CE_surgical_history'];
	$CE_smoking = $data['CE_smoking'];
	$CE_smoking_since = $data['CE_smoking_since'];
	$CE_alcohol = $data['CE_alcohol'];
	$CE_alcohol_since = $data['CE_alcohol_since'];
	$CE_tobacco = $data['CE_tobacco'];
	$CE_tobacco_since = $data['CE_tobacco_since'];
	$CE_diet = $data['CE_diet'];
	$CE_complain = $data['CE_complain'];
	$CE_temperature = $data['CE_temperature'];
	$CE_PR = $data['CE_PR'];
	$CE_RR = $data['CE_RR'];
	$CE_Systolic_BP = $data['CE_Systolic_BP'];
	$CE_Diastolic_BP = $data['CE_Diastolic_BP'];
	$CE_heart_rate = $data['CE_heart_rate'];
	$CE_SpO2 = $data['CE_SpO2'];
	$CE_height = $data['CE_height'];
	$CE_weight = $data['CE_weight'];
	$CE_BMI = $data['CE_BMI'];
	$CE_BSA = $data['CE_BSA'];
	$CE_BMI_Remark = $data['CE_BMI_Remark'];
	$CE_CVP = $data['CE_CVP'];
	$CE_built = $data['CE_built'];
	$CE_lean = $data['CE_lean'];
	$CE_average = $data['CE_average'];
	$CE_healthy = $data['CE_healthy'];
	$CE_obese = $data['CE_obese'];
	$CE_cns = $data['CE_cns'];
	$CE_cvs = $data['CE_cvs'];
	$CE_rs = $data['CE_rs'];
	$CE_pa_inspection = $data['CE_pa_inspection'];
	$CE_pa_palpation = $data['CE_pa_palpation'];
	$CE_pa_percusion = $data['CE_pa_percusion'];
	$CE_pa_auscultation = $data['CE_pa_auscultation'];
	$CE_local_examination = $data['CE_local_examination'];
	$CE_rectal_examination = $data['CE_rectal_examination'];
	$CE_provisional = $data['CE_provisional'];
	$CE_differential_diagnosis = $data['CE_differential_diagnosis'];
	$CE_final_diagnosis = $data['CE_final_diagnosis'];
	$CE_immediate_mgnt = $data['CE_immediate_mgnt'];
	$CE_preventive_measures = $data['CE_preventive_measures'];
	$CE_plan_of_care = $data['CE_plan_of_care'];
	$CE_nutritional_status = $data['CE_nutritional_status'];

		// $pdo->query("INSERT INTO clinical_examination (
		// 								CE_appointment_id, CE_timestamp, CE_medical_history, CE_surgical_history, CE_smoking, CE_smoking_since, CE_alcohol, CE_alcohol_since, CE_tobacco, CE_tobacco_since, CE_diet, CE_complain, CE_temperature, CE_PR, CE_RR, CE_Systolic_BP, CE_Diastolic_BP, CE_heart_rate, CE_SpO2, CE_height, CE_weight, CE_BMI, CE_BSA, CE_BMI_Remark, CE_CVP, CE_built, CE_lean, CE_average, CE_healthy, CE_obese, CE_cns, CE_cvs, CE_rs, CE_pa_inspection, CE_pa_palpation, CE_pa_percusion, CE_pa_auscultation, CE_local_examination, CE_rectal_examination, CE_provisional, CE_differential_diagnosis, CE_final_diagnosis, CE_immediate_mgnt, CE_preventive_measures, CE_plan_of_care, CE_nutritional_status) 
		// 						VALUES ('".'$CE_appointment_id'."', CURRENT_TIMESTAMP, '".'$CE_medical_history'."', '".'$CE_surgical_history'."', '".'$CE_smoking'."', '".'$CE_smoking_since'."', '".'$CE_alcohol'."', '".'$CE_alcohol_since'."', '".'$CE_tobacco'."', '".'$CE_tobacco_since'."', '".'$CE_diet'."', '".'$CE_complain'."', '".'$CE_temperature'."', '".'$CE_PR'."', '".'$CE_RR'."', '".'$CE_Systolic_BP'."', '".'$CE_Diastolic_BP'."', '".'$CE_heart_rate'."', '".'$CE_SpO2'."', '".'$CE_height'."', '".'$CE_weight'."', '".'$CE_BMI'."', '".'$CE_BSA'."', '".'$CE_BMI_Remark'."', '".'$CE_CVP'."', '".'$CE_built'."', '".'$CE_lean'."', '".'$CE_average'."', '".'$CE_healthy'."', '".'$CE_obese'."', '".'$CE_cns'."', '".'$CE_cvs'."', '".'$CE_rs'."', '".'$CE_pa_inspection'."', '".'$CE_pa_palpation'."', '".'$CE_pa_percusion'."', '".'$CE_pa_auscultation'."', '".'$CE_local_examination'."', '".'$CE_rectal_examination'."', '".'$CE_provisional'."', '".'$CE_differential_diagnosis'."', '".'$CE_final_diagnosis'."', '".'$CE_immediate_mgnt'."', '".'$CE_preventive_measures'."', '".'$CE_plan_of_care'."', '".'$CE_nutritional_status'."')
		// ");


					$pdo->query("INSERT INTO  clinical_examination (
													 CE_appointment_id, CE_medical_history
													) VALUES (
													'" . $CE_appointment_id . "', '" . $CE_medical_history . "'
													)
												");

		$user = array(
			"status" => "False",
			"messages" => "Examinations Added Successfully",
		);
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}



	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/service', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$appointment_id = $data['appointment_id'];
	$action = $data['action'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($key_result)) {
		switch ($action) {

			case "LIST":
				$service_list = $pdo->query("SELECT ASA_id AS id, ASA_service_amount AS service_amount, ASA_status AS service_status, services_id, services_name, ASA_status, department_name
											FROM appointment_services_assign JOIN services ON ASA_services_id = services_id JOIN department ON services_department_id = department_id
											WHERE ASA_appointment_id='" . $data["appointment_id"] . "'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Service Found",
					"illness_list" => $service_list,
				);
				break;

			case 'ADD':

				$appointment_id = $data['appointment_id'];
				$service_id = $data['Serviceid'];
				$doctor_id = $data['doctor_id'];


				$current_day = $pdo->query("SELECT DATE_FORMAT(CURRENT_TIMESTAMP, '%a') as DF")->fetchAll(PDO::FETCH_ASSOC);
				$day_of_week = $current_day[0]["DF"];

				$rate_config_data = $pdo->query("SELECT
													CASE 
														when rate_config_id IS NULL then '0' 
														ELSE rate_config_id END AS rate_config_id, 
													CASE 
														when rate_config_id IS NULL then services_rate 
														ELSE rate_config_amount END AS service_amount
														FROM services 
													LEFT JOIN rate_config ON services_id = rate_config_services_id 
														AND rate_config_doctor_id='" . $doctor_id . "'
													    AND rate_config_day LIKE '%$day_of_week%'
													WHERE services_id = '" . $service_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				$patient_company = $pdo->query("SELECT 
														patient_company_rate_type_id as rate_type_id
														FROM appointment
														JOIN patient_company ON appointment_patient_company_id = patient_company_id
														WHERE appointment_id='" . $appointment_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				$rate_type_id = $patient_company[0]["rate_type_id"];


				$rate_config_data = $pdo->query("INSERT INTO appointment_services_assign
													VALUES(
														null
														, CURRENT_TIMESTAMP
														, '" . $appointment_id . "'
														, '" . $service_id . "'
														, '" . $rate_config_data[0]["service_amount"] . "'
														, '" . $rate_type_id . "'
														, '" . $doctor_id . "'
														, '" . $rate_config_data[0]["rate_config_id"] . "'
														, ''
														, null
														, null
														, null
														, null
														, ''
														, 'Pending'
													)")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Service added successfully.",
				);

				break;

			case 'DEPARTMENT':
				$service_search = $data['department_search'];
				$data_list = $pdo->query("SELECT department_id as id,department_name as name 
  														 FROM department 
  														 WHERE department_section like '%Diagnostics%' AND department_name LIKE '%" . $service_search . "%'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Department List Found",
					"list" => $data_list,
				);
				break;

			case 'SERVICE':
				$department_id = $data['departmentid'];
				$data_list = $pdo->query("SELECT services_id as id, services_name as name 
  														 FROM services 
  														 WHERE services_department_id='" . $department_id . "'")->fetchAll(PDO::FETCH_ASSOC);
				
				$user = array(
					"status" => "True",
					"messages" => "DROPDOWN DATA FOUND",
					"list" => $data_list,
				);
				break;

			case 'CANCEL':
				$rate_config_data = $pdo->query("UPDATE appointment_services_assign
														SET ASA_status = 'Cancelled'
														WHERE ASA_id='" . $data['id'] . "'")->fetchAll(PDO::FETCH_ASSOC);
				$user = array(
					"status" => "True",
					"messages" => "Cancelled Successfully",
				);
				break;

			case 'DELETE':
				$rate_config_data = $pdo->query("DELETE FROM appointment_services_assign
																							 WHERE ASA_id='" . $data['id'] . "'")->fetchAll(PDO::FETCH_ASSOC);
				$user = array(
					"status" => "True",
					"messages" => "Deleted Successfully",
				);
				break;

			default:
				$user = array(
					"status" => "False",
					"messages" => "Invalid Action",
				);
				break;
		}
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}



	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/consumable', function ($request, $response) {

	$data = $request->getParsedBody();
	$user_m_key = $data['m_key'];
	$action = $data['action'];
	$appointment_id = $data['appointment_id'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($key_result)) {

		switch ($action) {

			case 'LIST':

				$data_list = $pdo->query("SELECT 
											P_id as id,
											product_name as product_name,
											P_total_quantity as qty,
											P_inserted_timestamp as timestamp,
											P_status,
											P_unit
											FROM prescription
											JOIN product ON P_drug_name = product_id
											WHERE P_appointment_id = '" . $appointment_id . "' AND product_type='Consumable'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Data Found.",
					"data" => $data_list,
				);


				break;

			case 'CONSUMABLE':
				$consumable_search = $data['consumable_search'];

				$data_list = $pdo->query("SELECT product_id as id,product_name as name from product where product_name LIKE '%" . $consumable_search . "%' AND product_type='Consumable' group by product_name")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Data Found.",
					"data" => $data_list,
				);
				break;

			case 'UNIT':

				$product_id = $data['product_id'];

				$data_list = $pdo->query("SELECT unit_id as id, unit_name as name 
																		FROM unit JOIN product ON unit_id=product_unit_id 
																	 WHERE product_id='" . $product_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Data Found.",
					"data" => $data_list,
				);
				break;

			case 'ADD':
				$appointment_id = $data['appointment_id'];
				$product_id = $data['product_id'];
				$unit_id = $data['unit_id'];
				$qty = $data['qty'];

				$data_list = $pdo->query("INSERT INTO prescription
											VALUES(
												null
												, ''
												, '" . $appointment_id . "'
												, '" . $product_id . "'
												, '" . $unit_id . "'
												, ''
												, null
												, null
												, null
												, null
												, null
												, ''
												, '" . $qty . "'
												, null
												, null
												, ''
												, ''
												, ''
												, 'Pending'
												, CURRENT_TIMESTAMP
											)")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Consumable added successfully.",
				);
				break;

			case 'CANCEL':

				$data_list = $pdo->query("UPDATE prescription
											SET P_status = 'Cancelled'
											WHERE P_id='" . $data['id'] . "'")->fetchAll(PDO::FETCH_ASSOC);
				
				$user = array(
					"status" => "True",
					"messages" => "Consumable Cancelled.",
				);

				break;

			case 'DELETE':

				$data_list = $pdo->query("DELETE FROM prescription
																				WHERE P_id='" . $data['id'] . "'")->fetchAll(PDO::FETCH_ASSOC);
				
				$user = array(
					"status" => "True",
					"messages" => "Consumable Deleted Successfully.",
				);

				break;
		}
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}



	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);   
});		

$app->post('/prescription', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$appointment_id = $data['appointment_id'];
	$action = $data['action'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($key_result)) {
		switch ($action) {

			case "LIST":
				$prescription_list = $pdo->query("SELECT * FROM  prescription 
 																					WHERE  P_appointment_id = '" . $appointment_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Prescription List",
					"prescription_list" => $prescription_list,
				);
				break;

			case "ADD":
				$drug_name = $data['drug_name'];
				$unit = $data['unit'];
				$route = $data['route'];
				$morning = $data['morning'];
				$afternoon = $data['afternoon'];
				$evening = $data['evening'];
				$night = $data['night'];
				$duration = $data['duration'];
				$duration_type = $data['duration_type'];
				$total_quantity = $data['total_quantity'];
				$start_date = $data['start_date'];
				$end_date = $data['end_date'];
				$instruction = $data['instruction'];
				$advice = $data['advice'];
				$remark = $data['remark'];

				$illness_list = $pdo->query("SELECT * FROM prescription  
								 																	WHERE P_appointment_id = '" . $appointment_id . "' and 
								 																				P_drug_name = '" . $drug_name . "'")->fetchAll(PDO::FETCH_ASSOC);
				if (empty($illness_list)) {

					$pdo->query("INSERT INTO  prescription (P_appointment_id,P_drug_name,P_unit,P_route,P_morning,P_afternoon,P_evening,P_night,P_duration,P_duration_type,P_total_quantity,P_start_date,P_end_date,P_instruction,P_advice,P_remark,P_inserted_timestamp) VALUES ('" . $appointment_id . "','" . $drug_name . "','" . $unit . "','" . $route . "','" . $morning . "','" . $afternoon . "','" . $evening . "','" . $night . "','" . $duration . "','" . $duration_type . "','" . $total_quantity . "','" . $start_date . "','" . $end_date . "','" . $instruction . "','" . $advice . "','" . $remark . "',CURRENT_TIMESTAMP)");

					$user = array("status" => "True", "messages" => "Prescription added Successfully",);
				} else {
					$user = array("status" => "True", "messages" => "Already Present",);
				}
				break;

			case "UPDATE":
				$prescription_id = $data['prescription_id'];
				$drug_name = $data['drug_name'];
				$unit = $data['unit'];
				$route = $data['route'];
				$morning = $data['morning'];
				$afternoon = $data['afternoon'];
				$evening = $data['evening'];
				$night = $data['night'];
				$duration = $data['duration'];
				$duration_type = $data['duration_type'];
				$total_quantity = $data['total_quantity'];
				$start_date = $data['start_date'];
				$end_date = $data['end_date'];
				$instruction = $data['instruction'];
				$advice = $data['advice'];
				$remark = $data['remark'];

				$illness_list = $pdo->query("SELECT * FROM prescription  
						 																	WHERE P_appointment_id = '" . $appointment_id . "' and P_id = '" . $prescription_id . "'")->fetchAll(PDO::FETCH_ASSOC);
				if (!empty($illness_list)) {
					$pdo->query("UPDATE prescription  
												  SET P_drug_name = '" . $drug_name . "', P_unit = '" . $unit . "', P_route = '" . $route . "', P_morning = '" . $morning . "', P_afternoon = '" . $afternoon . "', P_evening = '" . $evening . "', P_night = '" . $night . "', P_duration = '" . $duration . "', P_duration_type = '" . $duration_type . "', P_total_quantity = '" . $total_quantity . "', P_start_date = '" . $start_date . "', P_end_date = '" . $end_date . "', P_instruction = '" . $instruction . "', P_advice = '" . $advice . "', P_remark = '" . $remark . "'
											    WHERE P_appointment_id = '" . $appointment_id . "' and P_id = '" . $prescription_id . "'");

					$user = array(
						"status" => "True",
						"messages" => "Prescription Updated Successfully",
					);
				} else {
					$user = array(
						"status" => "True",
						"messages" => "Invalid Prescription ID",
					);
				}
				break;

			case "DELETE":
				$prescription_id = $data['prescription_id'];

				$illness_list = $pdo->query("SELECT * FROM prescription  
						 																	WHERE P_appointment_id = '" . $appointment_id . "' and 
						 																				P_id = '" . $prescription_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				if (!empty($illness_list)) {
					$pdo->query("DELETE FROM prescription  WHERE P_id = '" . $prescription_id . "'");

					$user = array(
						"status" => "True",
						"messages" => "Deleted Successfully",
					);
				} else {
					$user = array(
						"status" => "True",
						"messages" => "Invalid Present Illness ID",
					);
				}
				break;
		
			default:
				$user = array(
					"status" => "True",
					"messages" => "Invalid Action",
				);
				break;
		}
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}

	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

// ASA_rate_config_id yet to set
$app->post('/investigation', function ($request, $response) {
	$data = $request->getParsedBody();

	$user_m_key = $data['m_key'];
	$appointment_id = $data['appointment_id'];
	$action = $data['action'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($key_result)) {
		switch ($action) {

			case 'DEPARTMENT':
				$service_search = $data['department_search'];
				$data_list = $pdo->query("SELECT department_id as id,department_name as name 
  														 FROM department 
  														 WHERE department_section like '%Diagnostics%' AND department_name LIKE '%" . $service_search . "%'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "DROPDOWN DATA FOUND",
					"list" => $data_list,
				);
				break;

			case 'SERVICE':
				$department_id = $data['department_id'];

				$data_list = $pdo->query("SELECT services_id as id, services_name as name 
  														 			FROM services 
  																 WHERE services_department_id='" . $department_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "DROPDOWN DATA FOUND",
					"list" => $data_list,
				);
				break;

			case "LIST":
				$investigation_list = $pdo->query("SELECT ASA_id, services_name FROM appointment_services_assign JOIN services ON ASA_services_id = services_id 
 																												WHERE ASA_appointment_id = '" . $appointment_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				$user = array(
					"status" => "True",
					"messages" => "Investigation List",
					"investigation_list" => $investigation_list,
				);
				break;

				//  MUST ADD "RATE TYPE", "AMOUNT" & "RATE CONFIG ID" IN API

			case "ADD":
				$services_id = $data['services_id'];

				$investigation_list = $pdo->query("SELECT * FROM appointment_services_assign 
								 																	WHERE ASA_appointment_id = '" . $appointment_id . "' and 
								 																				ASA_services_id = '" . $services_id . "' and 
								 																				ASA_doctor_id = '" . $key_result[0]['user_id'] . "'")->fetchAll(PDO::FETCH_ASSOC);
				if (empty($investigation_list)) {

					$result = $pdo->query("SELECT services_rate FROM services WHERE services_id = '" . $services_id . "'")->fetchAll(PDO::FETCH_ASSOC);
					$service_rate =  $result[0]["services_rate"];

					$rate_row = $pdo->query("SELECT rate_type_id 
																			 FROM appointment 
																			 JOIN patient_company ON appointment_patient_company_id = patient_company_id 
																			 JOIN rate_type ON patient_company_rate_type_id = rate_type_id 
																			 WHERE appointment_id = '" . $appointment_id . "'")->fetchAll(PDO::FETCH_ASSOC);


					$pdo->query("INSERT INTO  appointment_services_assign (
													 ASA_timestamp,
													 ASA_appointment_id, 
													 ASA_doctor_id,
													 ASA_services_id,
													 ASA_service_amount,
													 ASA_rate_type_id
													) VALUES (
													CURRENT_TIMESTAMP,
													'" . $appointment_id . "',
													'" . $key_result[0]['user_id'] . "',
													'" . $services_id . "',
													'" . $service_rate . "',
													'" . $rate_row[0]["rate_type_id"] . "'
													)
												");

					$user = array(
						"status" => "True",
						"messages" => "Investigation Added Successfully",
					);
				} else {
					$user = array(
						"status" => "True",
						"messages" => "Already Present",
					);
				}
				break;

			case "DELETE":
			
				$investigation_id = $data['investigation_id'];

				$investigation_list = $pdo->query("SELECT * FROM appointment_services_assign 
								 																	WHERE ASA_appointment_id = '" . $appointment_id . "' and 
								 																				ASA_id = '" . $investigation_id . "'")->fetchAll(PDO::FETCH_ASSOC);

				if (!empty($investigation_list)) {
					$pdo->query("DELETE FROM appointment_services_assign  WHERE ASA_id = '" . $investigation_id . "'");

					$user = array(
						"status" => "True",
						"messages" => "Deleted Successfully",
					);
				} else {
					$user = array(
						"status" => "True",
						"messages" => "Invalid Investigation ID",
					);
				}
				break;

			default:
				$user = array(
					"status" => "True",
					"messages" => "Invalid Action",
				);
				break;
		}
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}

	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/get_ot_rooms', function ($request, $response) {

	$data = $request->getParsedBody();
	$user_m_key = $data['m_key'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);


	if (!empty($key_result)) {

		$data_list = $pdo->query("SELECT 
									room_id as id,
									room_name as OT_name
									FROM room_master
									WHERE room_room_type_id = '1'")->fetchAll(PDO::FETCH_ASSOC);

		$user = array(
			"status" => "True",
			"messages" => "Data Found.",
			"data" => $data_list,
		);
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}

	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/ot_schedule', function ($request, $response) {

	$data = $request->getParsedBody();
	$user_m_key = $data['m_key'];
	$range = $data['range'];

	require 'db_connect.php';

	$key_result = $pdo->query("SELECT * FROM user WHERE BINARY user_m_key='" . $user_m_key . "' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);


	if (!empty($key_result)) {

		switch ($range) {

			case 'month-wise':

				$data_list = $pdo->query("SELECT 
											ot_id,
											count(*) as ot_appointments
											FROM operation_theater
											WHERE ot_inserted_timestamp LIKE '%'".$data['date']."'%'")->fetchAll(PDO::FETCH_ASSOC);

				break;
		}



		$user = array(
			"status" => "True",
			"messages" => "Data Found.",
			"data" => $data_list,
		);
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	}

	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});

$app->post('/dropdown_list', function ($request, $response) {
	$data = $request->getParsedBody();
	require 'db_connect.php';

	$m_key = $data['m_key'];
	$type = $data['type'];
	$id = $data['id'];
	$result = $pdo->query("SELECT * FROM user WHERE user_m_key='" . $m_key . "' and user_m_key!=''")->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($result)) {
		switch ($type) {
			case 'Section':
				$list = $pdo->query("SELECT section_id as id,section_name as name,case when section_name in ('OPD','IPD') then 'True' else 'False' end as doctor_list_visible  from section")->fetchAll(PDO::FETCH_ASSOC);
				break;
			case 'Doctor':
				$list = $pdo->query("SELECT user_id as id,concat(user_first_name,' ',user_last_name) as name from user join user_department_assign on UDA_user_id=user_id where UDA_department_id in (select department_id from department where department_section like '%OPD%')")->fetchAll(PDO::FETCH_ASSOC);
				break;
			case 'Department':
				$list = $pdo->query("SELECT department_id as id,department_name as name from user_department_assign join department on UDA_department_id=department_id where UDA_user_id='" . $id . "'")->fetchAll(PDO::FETCH_ASSOC);
				break;
			case 'Reason':
				$list = $pdo->query("SELECT reason_id as id,reason_name as name from reason ")->fetchAll(PDO::FETCH_ASSOC);
				break;
			case 'Complaint':
				$list = $pdo->query("SELECT complaint_id as id,complaint_name as name from complaint ")->fetchAll(PDO::FETCH_ASSOC);
				break;

			case 'Investigation_Department':
				$list = $pdo->query("SELECT department_id as id,department_name as name 
  														 FROM department 
  														 WHERE department_section like '%Diagnostics%'")->fetchAll(PDO::FETCH_ASSOC);
				break;

			case 'Investigation_Sub_Department':
				$list = $pdo->query("SELECT sub_department_id as id, sub_department_name as name 
  														 FROM sub_department WHERE sub_department_department_id='" . $id . "'")->fetchAll(PDO::FETCH_ASSOC);
				break;

			case 'Investigation_Service':
				$list = $pdo->query("SELECT services_id as id, services_name as name 
  														 FROM services 
  														 WHERE services_sub_department_id='" . $id . "'")->fetchAll(PDO::FETCH_ASSOC);
				break;

			case 'Prescription_Medicines':
				$list = $pdo->query("SELECT product_id as id, product_name as name 
  														 FROM product 
  														 WHERE product_name LIKE '%" . $data['search_string'] . "%'")->fetchAll(PDO::FETCH_ASSOC);
				break;

			case 'Floor_List':
				$list = $pdo->query("SELECT floor_id as id, floor_name as name 
  													 FROM floor_master")->fetchAll(PDO::FETCH_ASSOC);
				break;

			case 'Floor_List':
				$list = $pdo->query("SELECT floor_id as id, floor_name as name 
  													 FROM floor_master")->fetchAll(PDO::FETCH_ASSOC);
				break;

			case 'Room_List':
				$list = $pdo->query("SELECT room_id as id, room_name as name 
  													 FROM room_master 
  													 WHERE room_floor_id='" . $id . "'")->fetchAll(PDO::FETCH_ASSOC);
				break;

			default:
				$list = array();
				break;
		}


		if (count($list) > 0) {
			$user = array(
				"status" => "True",
				"messages" => "Found",
				"list" => $list,
			);
		} else {
			$user = array(
				"status" => "True",
				"messages" => "Data Not Found",
				"list" => $list,
			);
		}
	} else {
		$user = array(
			"status" => "False",
			"messages" => "Key Not Found !",
		);
	}
	return $response->withStatus(200)
		->withHeader('Content-Type', 'application/json')
		->write(json_encode($user), JSON_FORCE_OBJECT);
});


function random($length)
{
	$key = '';
	$keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
	return $key;
};

