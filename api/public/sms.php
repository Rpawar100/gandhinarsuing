<?php
$app->get('/mandai_aadat_sms_api',function($request,$response) {
	echo "Mandai Aadat SMS Api is Working Fine ";
});

$app->post('/get_message_type', function($request,$response){
	$data = $request->getParsedBody();

	$user_m_key=$data['m_key'];
	$type=$data['type'];
	require 'db_connect.php';

	$key_result=$pdo->query("SELECT * FROM user join client on client_id=user_client_id WHERE BINARY user_m_key='".$user_m_key."' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);
	
	if(!empty($key_result)){

		if($key_result[0]['user_default_language']=='Marathi'){
			$sms_result=$pdo->query("SELECT 
										MT_id as id
										,MT_marathi_name as name
										,MT_date_filter as date_filter
										,MT_member_filter as member_filter
									FROM message_type where MT_type='SMS'")->fetchAll(PDO::FETCH_ASSOC);
			$whatsapp_result=$pdo->query("SELECT 
										MT_id as id
										,MT_marathi_name as name
										,MT_date_filter as date_filter
										,MT_member_filter as member_filter
									FROM message_type where MT_type='WHATSAPP'")->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$sms_result=$pdo->query("SELECT 
										MT_id as id
										,MT_english_name as name
										,MT_date_filter as date_filter
										,MT_member_filter as member_filter
									FROM message_type where MT_type='SMS'")->fetchAll(PDO::FETCH_ASSOC);
			$whatsapp_result=$pdo->query("SELECT 
										MT_id as id
										,MT_english_name as name
										,MT_date_filter as date_filter
										,MT_member_filter as member_filter
									FROM message_type where MT_type='WHATSAPP'")->fetchAll(PDO::FETCH_ASSOC);
		}
		$user = array
		(
			"status" => "True",
			"messages" => "",
			"sms"=>$sms_result,
			"whatsapp"=>$whatsapp_result,
		);
	}else{
		$user = array
		(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	} 
	return $response->withStatus(200)
	->withHeader('Content-Type', 'application/json')
	->write(json_encode($user),JSON_FORCE_OBJECT);                
});

$app->post('/get_message_list', function($request,$response){
	$data = $request->getParsedBody();

	$user_m_key=$data['m_key'];
	$type=$data['type'];
	$start_date=$data['start_date'];
	$end_date=$data['end_date'];
	$member_id=$data['member_id'];
	require 'db_connect.php';

	$key_result=$pdo->query("SELECT * FROM user join client on client_id=user_client_id WHERE BINARY user_m_key='".$user_m_key."' and user_m_key != '' ")->fetchAll(PDO::FETCH_ASSOC);
	
	if(!empty($key_result)){

		$type_result=$pdo->query("SELECT * FROM message_type WHERE BINARY MT_id='".$type."' and MT_id != '' ")->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($type_result)){
			$fetch_user_cond="";
			if($key_result[0]['user_fetch_data']=='USER'){
				switch ($type_result[0]['MT_user_cond']) {
					case 'inward':
							$fetch_user_cond=" and inward_user_id='".$key_result[0]['user_id']."' ";
						break;
					case 'outward':
							$fetch_user_cond=" and outward_user_id='".$key_result[0]['user_id']."' ";
						break;
					case 'ledger':
							$fetch_user_cond=" and ledger_user_id in (0,".$key_result[0]['user_id'].") ";
						break;	
					case 'transaction':
							$fetch_user_cond=" and transaction_user_id='".$key_result[0]['user_id']."' ";
						break;							
					default:
							$fetch_user_cond="";
						break;
				}
			}
			$member_cond='';
			switch ($type) {
				case '1':
				case '2':
					$type_data=$pdo->query("SELECT 
													ledger_id as id	
												    ,ledger_name as name 
												    ,ledger_mobile_number as mobile_number
												    ,'TEXT' as method
													,CASE
												    	when '".$key_result[0]['user_default_language']."'='Marathi' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('प्रिय ग्राहक,\n\nकृपया लक्षात ठेवा की आपल्या बिलची असलेली रक्कम ₹ ',FORMAT((ledger_balance*-1),2,'en_IN'),' अद्यतित आहे. कृपया वेळीच भुक्तान करा.\n\nधन्यवाद,\n','".$key_result[0]['client_gala_name']."') 
														when '".$key_result[0]['user_default_language']."'='English' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('Dear Customer,\n\nPlease be aware that the outstanding amount of ₹ ',FORMAT((ledger_balance*-1),2,'en_IN'),' or your bill is due. Kindly make the payment promptly.\n\nThank you,\n','".$key_result[0]['client_gala_name']."') 
												        else ''
													end as text
												    ,'' as image
												FROM ledger
												where ledger_client_id='".$key_result[0]['client_id']."'
												and ledger_group_id='6' 
												".$fetch_user_cond." 
												and ledger_balance<0")->fetchAll(PDO::FETCH_ASSOC);
					break;
				case '3':
				case '5':
					if($type=='3'){
						$member_cond=" and ledger_id='".$member_id."' ";
					}
					$inward_data=$pdo->query("SELECT
												inward.*
												,date_format(inward_date,'%d-%m-%Y') as inward_date
												,ledger_name
												,ledger_mobile_number
												,CASE
													when '".$key_result[0]['user_default_language']."'='Marathi' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('प्रिय शेतकरी,\n\nकृपया,\nदि.',DATE_FORMAT(inward_date, '%D %b %Y'),' रोजी आपण पाठवलेल्या मालाच्या विक्रीचा तपशील संलग्न पट्टीमध्ये बघा.\n\nधन्यवाद,\n','".$key_result[0]['client_gala_name']."') 
													when '".$key_result[0]['user_default_language']."'='English' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('Dear Farmer,\n\nPlease check the details of the sold goods On ',DATE_FORMAT(inward_date, '%D %b %Y'),' in the attached patti.\n\nThank you.\n','".$key_result[0]['client_gala_name']."') 
													else ''
												end as text
												,case 
													when transpoter_name is NULL then '-'
													else transpoter_name 
												end as transpoter_name
												,case 
													when inward_input_type='0' and inward_ledger_id!='0' then 'True'
													else 'False'
												end as edit_status
											FROM inward 
											left join ledger 
												on ledger_id=inward_ledger_id
											left join (select ledger_id as transpoter_id,ledger_name as transpoter_name from ledger where ledger_group_id='5' and ledger_client_id='".$key_result[0]['client_id']."' ) as transpoter_data 
												on transpoter_id=inward_transpoter_id
											where inward_client_id='".$key_result[0]['client_id']."' 
											".$fetch_user_cond."
											".$member_cond."
											and inward_type='Cash'
											and inward_ledger_id!='0'
											and inward_date between '".$start_date."' and '".$end_date."'")->fetchAll(PDO::FETCH_ASSOC);

					$type_data = array();
					for($z=0;$z<count($inward_data);$z++){
						$ImageFileURL='';
						if($inward_data[$z]['text']!=''){
							$inward_array=array();
							$inward_id=$inward_data[$z]['inward_id'];
							$inward_item_data=$pdo->query("SELECT 
																inward_item.*
																,case
																		when '".$key_result[0]['user_default_language']."'='English' then material_name_E
																		else material_name_M
																end as material_name
																,case
																		when '".$key_result[0]['user_default_language']."'='English' then unit_name
																		else unit_code
																end as unit_name
																,material_mathadi_status
																,sum(II_item) as II_item,sum(II_weight) as II_weight,sum(II_total) as II_total
															FROM inward_item 
															join material on material_id=II_material_id
															join unit on unit_id=II_unit_id
															where II_client_id='".$key_result[0]['client_id']."' and II_inward_id='".$inward_id."' group by  II_material_id,II_rate")->fetchAll(PDO::FETCH_ASSOC);
							
							$html='';
							$item_cond='';
							$item_summary_cond='';
							$rate_cond='';
							$rate_summary_cond='';
							$item_head_cond='';
							$weight_width_cond='25%';
							$total_width_cond='30%';
							$colspan_cond='2';
							if($key_result[0]['client_item_status']=='1'){
								$item_summary_cond='<th style="text-align: center;border: 1px solid #000;">'.$inward_data[0]['inward_total_item'].'</th>';
								$item_head_cond='<th style="text-align: center;border: 1px solid #000;width: 10%">'.($key_result[0]['user_default_language'] == 'English' ? 'Item' : 'नग').'</th>';
								$weight_width_cond='20%';
								$total_width_cond='25%';
								$colspan_cond='3';
							}
							$mathadi_calculation_status='False';
							for($i=0;$i<count($inward_item_data);$i++){
								if($inward_item_data[$i]['material_mathadi_status']=='1' && $mathadi_calculation_status=='False'){
									$mathadi_calculation_status='True';
								}
								if($key_result[0]['client_item_status']=='1'){
									$item_cond='<td style="text-align: center;border: 1px solid #000;width: 10%">'.$inward_item_data[$i]['II_item'].'</td>';
								}

								if($key_result[0]['client_rate_transform']=='1'){
									$rate_cond='<td style="text-align: center;border: 1px solid #000;width: 15%">'.($inward_item_data[$i]['II_rate']*10).($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>';
									$rate_summary_cond='<th style="text-align: center;border: 1px solid #000;width: 15%">'.($key_result[0]['user_default_language'] == 'English' ? '10 Kg. Rate' : '१० कि. दर').'</th>';
								}else{
									$rate_cond='<td style="text-align: center;border: 1px solid #000;width: 15%">'.$inward_item_data[$i]['II_rate'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>';
									$rate_summary_cond='<th style="text-align: center;border: 1px solid #000;width: 15%">'.($key_result[0]['user_default_language'] == 'English' ? 'Rate' : 'दर').'</th>';
								}
									$html=$html.'<tr>
												<td style="text-align: center;border: 1px solid #000;width: 5%">'.($i+1).'</td>
												<td style="text-align: center;border: 1px solid #000;width: 25%">'.$inward_item_data[$i]['material_name'].'</td>                   
												'.$item_cond.'
												<td style="text-align: center;border: 1px solid #000;width: '.$weight_width_cond.';padding: 0px !important" >'.$inward_item_data[$i]['II_weight'].' '.$inward_item_data[$i]['unit_name'].' </td>
												'.$rate_cond.'
												<td style="text-align: right;border: 1px solid #000;width: '.$total_width_cond.';padding-right:3px;" >'.$inward_item_data[$i]['II_total'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
											</tr>';

							}
							$html_data='	<!DOCTYPE html>
												<html lang="en">
												    <head>
												        <meta name="viewport" content="width=device-width, initial-scale=1.0">
												        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
												        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
												        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
												        <style type="text/css">
												            .col-lg-12 {
												                width: 100%;
												            }
												            .col-lg-6 {
												                width: 50%;
												            }
												            .col-lg-3 {
												                width: 25%;
												            }
												            th,td{
												                padding: 4px 0px;
												                white-space: nowrap;
												            }
												        </style>
												    </head>
												    <body style="font-size: 12px; background: white;">
												        <section class="sheet" style="margin: 0px;box-shadow:none;">
												            <div style="padding-bottom: 5px;">
												                <img alt="Sale" src="'.$key_result[0]['client_sale_header'].'" style="max-width:100%;">
												            </div>
												            <div class="col-lg-12" style="padding-bottom: 5px;">
												                <div class="col-lg-6" style="float: left;">
												                    <label style="color: red !important;">'.($key_result[0]['user_default_language'] == 'English' ? 'Bill No.' : 'पट्टी नं.').' : <b style="color: black !important;">'.$inward_data[0]['inward_serial_number'].'</b></label>
												                </div>
												                <div class="col-lg-6" style="float: right;">
												                    <label style="color: red !important;">'.($key_result[0]['user_default_language'] == 'English' ? 'Date' : 'दिनांक').' : <b style="color: black !important;">'.$inward_data[0]['inward_date'].'</b></label>
												                </div>
												            </div>
												            <div class="col-lg-12" style="padding-bottom: 5px;">
												                <div class="col-lg-12">
												                    <label style="color: red !important;">'.($key_result[0]['user_default_language'] == 'English' ? 'Farmer' : 'मालधन्याचे नाव').' : <b style="color: black !important;">'.$inward_data[0]['ledger_name'].'</b></label>
												                </div>
												            </div>
												            <div class="col-lg-12" style="padding-bottom: 5px;">
												                <div class="col-lg-12">
												                    <label style="color: red !important;">'.($key_result[0]['user_default_language'] == 'English' ? 'Transpoter' : 'हुंडेकरी नाव').' : <b style="color: black !important;">'.$inward_data[0]['transpoter_name'].'</b></label>
												                </div>
												            </div>
												            <div class="col-lg-12" style="padding-bottom: 15px;">
												                <table style="border: 1px solid #000;width: 100%; max-width: 100%;">
												                    <tr style="color: red !important;">
												                        <th style="text-align: center;border: 1px solid #000;width: 5%">'.($key_result[0]['user_default_language'] == 'English' ? 'Sr.' : 'नं.').'</th>
												                        <th style="text-align: center;border: 1px solid #000;width: 25%">'.($key_result[0]['user_default_language'] == 'English' ? 'Material Desc.' : 'मालाचे वर्णन').'</th>                  
												                        '.$item_head_cond.' 
												                        <th style="text-align: center;border: 1px solid #000;width: '.$weight_width_cond.';padding: 0px !important" >'.($key_result[0]['user_default_language'] == 'English' ? 'Weight' : 'वजन').'</th>
												                        '.$rate_summary_cond.'
												                        <th style="text-align: center;border: 1px solid #000;width: '.$total_width_cond.';padding: 0px !important" >'.($key_result[0]['user_default_language'] == 'English' ? 'Total Amount' : 'एकूण रक्कम').'</th>
												                    </tr>'.$html.'
												                    <tr>
												                        <th colspan="2" style="text-align: center;border: 1px solid #000;"><b style="color: red !important">'.($key_result[0]['user_default_language'] == 'English' ? 'Total' : 'एकूण').'</b></th>
												                        '.$item_summary_cond.'
												                        
												                        <th style="text-align: center;border: 1px solid #000;">'.$inward_data[0]['inward_total_weight'].'</th>
												                        <th style="text-align: center;border: 1px solid #000;"></th>
												                        <th style="text-align: right;border: 1px solid #000;padding-right:3px;">'.$inward_data[0]['inward_total_amount'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</th>
												                    </tr>
												                    '.($mathadi_calculation_status=="True" ? '
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Hamali' : 'हमाली').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$inward_data[0]['inward_total_hamali'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Bharai' : 'भराई').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$inward_data[0]['inward_total_bharai'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Tolai' : 'तोलाई').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$inward_data[0]['inward_total_tolai'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Mapai' : 'मापाई').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$inward_data[0]['inward_total_mapai'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    ' : '').'
												                    '.($key_result[0]['client_porterage_status']=="1" ? '
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Porterage' : 'रोख हमाली').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$inward_data[0]['inward_porterage'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    ' : '').'
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Freight' : 'मोटर भाडे').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$inward_data[0]['inward_freight'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Other Exp.' : 'अनु. खर्च').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$inward_data[0]['inward_total_other_exp'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkblue !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Total Exp.' : 'एकूण खर्च').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;font-weight:bolder;" >'.$inward_data[0]['inward_total_expenses'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkblue !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Round Off' : 'राउन्डिंग ऑफ').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;font-weight:bolder;" >'.$inward_data[0]['inward_round_off'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                    <tr>
												                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
												                        <td style="font-weight: bold;color :darkblue !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Net Amount' : 'नक्की रक्कम').'</td>
												                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;font-weight:bolder;" >'.$inward_data[0]['inward_net_amount'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												                    </tr>
												                </table>
												            </div>
												        </section>
												    </body>
												</html>';
							$file_name=$inward_id.'-'.date('Y-m-d-H-i-s');
							$ImageFilePath =  '/home/mandai/public_html/aadat/uploads/share_pdf/'.$file_name.'.jpeg';
							$HTMLFilePath =  '/home/mandai/public_html/aadat/uploads/share_pdf/'.$file_name.'.html';

							$ImageFileURL =  'https://mandai.in/aadat/uploads/share_pdf/'.$file_name.'.jpeg';
							$HTMLFileURL =  'https://mandai.in/aadat/uploads/share_pdf/'.$file_name.'.html';
							$fp = fopen($HTMLFilePath,"a");
							fwrite($fp,$html_data);
							fclose($fp);
							shell_exec('wkhtmltoimage --width 500 --javascript-delay 1000 --enable-plugins '.$HTMLFileURL.' '.$ImageFilePath);
						}
						$inward_array = array
					    (
					      	"id" => $inward_data[$z]['inward_id'],
					      	"name" => $inward_data[$z]['ledger_name'],
					      	"mobile_number" => $inward_data[$z]['ledger_mobile_number'],
					      	"method" => 'TEXT_IMAGE',
					      	"text" => $inward_data[$z]['text'],
					      	"image" => $ImageFileURL,
					    );
					    array_push($type_data,$inward_array);
					    
					}
					break;
				case '4':
							$type_data=$pdo->query("SELECT
														inward_id as id
														,ledger_name as name
														,ledger_mobile_number as mobile_number
														,'TEXT' as method
														,CASE
													    	when '".$key_result[0]['user_default_language']."'='Marathi' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('प्रिय शेतकरी,\n\nकृपया लक्ष द्या,\nदि.',DATE_FORMAT(inward_date, '%D %b %Y'),' रोजी आपण पाठवलेल्या मालाच्या विक्रीचा तपशील खालील प्रमाणे.\n',summary,'\n\nधन्यवाद,\n','".$key_result[0]['client_gala_name']."') 
															when '".$key_result[0]['user_default_language']."'='English' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('Dear Farmer,\n\nPlease take Note,\nOn ',DATE_FORMAT(inward_date, '%D %b %Y'),' , we are providing you with the details of the goods sold as follows:\n',summary,'\n\nThank you.\n','".$key_result[0]['client_gala_name']."') 
													        else ''
														end as text
														,'' as image
													from (SELECT
															inward_id
															,inward_date
															,ledger_name
															,ledger_mobile_number
															,group_concat(summary) as summary
														from (	SELECT
																	inward_id
																	,inward_date
																	,ledger_name
																	,ledger_mobile_number
																	,case 
																		when @inward=inward_id then @row_number:=@row_number+1
																	    else  @row_number:=1
																	end as number
																	,@inward:=inward_id
																	,concat('\n',@row_number,') ',material_name,' = ',II_weight,' ',unit,' X Rs.',II_rate,' = Rs.',FORMAT(II_total,2,'en_IN')) as summary
																from (	SELECT 
																			inward_id
		    																,inward_date
																			,ledger_name
																			,ledger_mobile_number
		    																,case 
		    																	when '".$key_result[0]['user_default_language']."'='English' then material_name_E
		    																    else material_name_M
																			end as material_name
		    																,II_weight
		    																,II_rate
		    																,II_total 
		    																,case 
		    																	when '".$key_result[0]['user_default_language']."'='English' then unit_name
		    																    else unit_code
																			end as unit
																		FROM inward
																		join inward_item 
																			on II_inward_id=inward_id 
																		join material 
																			on material_id=II_material_id 
																		join unit 
																			on unit_id=II_unit_id     
																		join ledger on ledger_id=inward_ledger_id
																		where inward_client_id='".$key_result[0]['client_id']."'
																		and inward_type='Cash'
																		and inward_date between '".$start_date."' and '".$end_date."'
																		".$fetch_user_cond." 
																) as data
																,(select @row_number:=0 , @inward:=0) 
															as temp) as raw_data
															group by 1,2,3,4
													)as inward_data")->fetchAll(PDO::FETCH_ASSOC);
					break;
				case '7':
							$type_data=$pdo->query("SELECT
														outward_id as id
														,ledger_name as name
														,ledger_mobile_number as mobile_number
														,'TEXT' as method
														,CASE
													    	when '".$key_result[0]['user_default_language']."'='Marathi' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('प्रिय ग्राहक,\n\nकृपया लक्ष द्या,\nदि.',DATE_FORMAT(outward_date, '%D %b %Y'),' रोजी आपण घेतलेल्या मालाचा तपशील खालील प्रमाणे.\n',summary,'\n\nधन्यवाद,\n','".$key_result[0]['client_gala_name']."') 
															when '".$key_result[0]['user_default_language']."'='English' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('Dear Customer,\n\nPlease take Note,\nOn ',DATE_FORMAT(outward_date, '%D %b %Y'),' ,we are providing you with the details of the goods Purchased by you as follows:\n',summary,'\n\nThank you.\n','".$key_result[0]['client_gala_name']."') 
													        else ''
														end as text
														,'' as image
													from (SELECT
															outward_id
															,outward_date
															,ledger_name
															,ledger_mobile_number
															,group_concat(summary) as summary
														from (	SELECT
																	outward_id
																	,outward_date
																	,ledger_name
																	,ledger_mobile_number
																	,case 
																		when @outward=outward_id then @row_number:=@row_number+1
																	    else  @row_number:=1
																	end as number
																	,@outward:=outward_id
																	,concat('\n',@row_number,') ',material_name,' = ',OI_weight,' ',unit,' X Rs.',OI_rate,' = Rs.',FORMAT(OI_total,2,'en_IN')) as summary
																from (	SELECT 
																			outward_id
		    																,outward_date
																			,ledger_name
																			,ledger_mobile_number
		    																,case 
		    																	when '".$key_result[0]['user_default_language']."'='English' then material_name_E
		    																    else material_name_M
																			end as material_name
		    																,OI_weight
		    																,OI_rate
		    																,OI_total 
		    																,case 
		    																	when '".$key_result[0]['user_default_language']."'='English' then unit_name
		    																    else unit_code
																			end as unit
																		FROM outward
																		join outward_item 
																			on OI_outward_id=outward_id 
																		join material 
																			on material_id=OI_material_id 
																		join unit 
																			on unit_id=OI_unit_id     
																		join ledger on ledger_id=outward_ledger_id
																		where outward_client_id='".$key_result[0]['client_id']."'
																		and outward_type='Credit'
																		and outward_date between '".$start_date."' and '".$end_date."'
																		".$fetch_user_cond." 
																) as data
																,(select @row_number:=0 , @outward:=0) 
															as temp) as raw_data
															group by 1,2,3,4
													)as outward_data")->fetchAll(PDO::FETCH_ASSOC);
					break;	
				case '8':
				case '6':
						if($type=='6'){
							$member_cond=" and ledger_id='".$member_id."' ";
						}

						$outward_data=$pdo->query("SELECT 
														outward.*
														,date_format(outward_date,'%d-%m-%Y') as outward_date
														,outward_ledger_id
														,ledger_name
														,ledger_mobile_number
														,CASE
															when '".$key_result[0]['user_default_language']."'='Marathi' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('प्रिय ग्राहक,\n\nकृपया,\nदि.',DATE_FORMAT(outward_date, '%D %b %Y'),' रोजी आपण घेतलेल्या मालाच्या खरेदीचा तपशील संलग्न पट्टीमध्ये बघा.\n\nधन्यवाद,\n','".$key_result[0]['client_gala_name']."') 
															when '".$key_result[0]['user_default_language']."'='English' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('Dear Customer,\n\nPlease check the details of the Purchased goods On ',DATE_FORMAT(outward_date, '%D %b %Y'),' in the attached Bill.\n\nThank you.\n','".$key_result[0]['client_gala_name']."') 
															else ''
														end as text
													FROM outward 
													left join ledger on ledger_id=outward_ledger_id
													where outward_client_id='".$key_result[0]['client_id']."' 
														".$fetch_user_cond." 
														and outward_type='Credit'
														and outward_ledger_id!='0'
														and outward_date between '".$start_date."' and '".$end_date."'
														".$member_cond)->fetchAll(PDO::FETCH_ASSOC);

						$type_data = array();
						for($z=0;$z<count($outward_data);$z++){
							$ImageFileURL='';
							if($outward_data[$z]['text']!=''){
								$outward_array=array();
								$outward_id=$outward_data[$z]['outward_id'];

								$outward_item_data=$pdo->query("SELECT outward_item.*,case
																when '".$key_result[0]['user_default_language']."'='English' then material_name_E
																else material_name_M
															end as material_name
															,case
																when '".$key_result[0]['user_default_language']."'='English' then unit_name
																else unit_code
															end as unit_name
															,material_mathadi_status
															,sum(OI_item) as OI_item,sum(OI_weight) as OI_weight,sum(OI_total) as OI_total
									FROM outward_item 
									join material on material_id=OI_material_id
									join unit on unit_id=OI_unit_id
									where OI_client_id='".$key_result[0]['client_id']."' and OI_outward_id='".$outward_id."' group by  OI_id")->fetchAll(PDO::FETCH_ASSOC);

								$html='';
								$item_cond='';
								$rate_cond='';
								$rate_summary_cond='';
								$item_summary_cond='';
								$item_head_cond='';
								$weight_width_cond='25%';
								$total_width_cond='30%';
								$colspan_cond='2';
								if($key_result[0]['client_item_status']=='1'){
									$item_summary_cond='<th style="text-align: center;border: 1px solid #000;">'.$outward_data[0]['outward_total_item'].'</th>';
									$item_head_cond='<th style="text-align: center;border: 1px solid #000;width: 10%">'.($key_result[0]['user_default_language'] == 'English' ? 'Item' : 'नग').'</th>';
									$weight_width_cond='20%';
									$total_width_cond='25%';
									$colspan_cond='3';

								}

								if($key_result[0]['client_rate_transform']=='1'){
									$rate_summary_cond='<th style="text-align: center;border: 1px solid #000;width: 15%">'.($key_result[0]['user_default_language'] == 'English' ? '10 Kg. Rate' : '१० कि. दर').'</th>';
								}else{
									$rate_summary_cond='<th style="text-align: center;border: 1px solid #000;width: 15%">'.($key_result[0]['user_default_language'] == 'English' ? 'Rate' : 'दर').'</th>';
								}
								$mathadi_calculation_status='False';
								for($i=0;$i<count($outward_item_data);$i++){
									if($outward_item_data[$i]['material_mathadi_status']=='1' && $mathadi_calculation_status=='False'){
										$mathadi_calculation_status='True';
									}

									if($key_result[0]['client_item_status']=='1'){
										$item_cond='<td style="text-align: center;border: 1px solid #000;width: 10%">'.$outward_item_data[$i]['OI_item'].'</td>';
									}
									if($key_result[0]['client_rate_transform']=='1'){
										$rate_cond='<td style="text-align: center;border: 1px solid #000;width: 15%">'.($outward_item_data[$i]['OI_rate']*10).($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>';
									}else{
										$rate_cond='<td style="text-align: center;border: 1px solid #000;width: 15%">'.$outward_item_data[$i]['OI_rate'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>';
									}
										$html=$html.'<tr>
													<td style="text-align: center;border: 1px solid #000;width: 5%">'.($i+1).'</td>
													<td style="text-align: center;border: 1px solid #000;width: 25%">'.$outward_item_data[$i]['material_name'].'</td>                   
													'.$item_cond.'
													<td style="text-align: center;border: 1px solid #000;width: '.$weight_width_cond.';padding: 0px !important" >'.$outward_item_data[$i]['OI_weight'].' '.$outward_item_data[$i]['unit_name'].' </td>
													'.$rate_cond.'
													<td style="text-align: right;border: 1px solid #000;width: '.$total_width_cond.';padding-right:3px;" >'.$outward_item_data[$i]['OI_total'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
												</tr>';
								}
								if($outward_data[0]['outward_ledger_id']=='0'){
									$cancel_html='<section class="sheet" style="margin: 0px;position: absolute;background: #00000061;width: 100%; vertical-align: text-bottom;text-align: center;font-size: 100px;color: red;padding-top: 300px;padding-bottom: 175px;"><label style="transform: rotate(-30deg);font-family: emoji;">CANCEL</label></section>';
								}else{
									$cancel_html='';
								}
								
								$html_data='<!DOCTYPE html>
													<html lang="en">
													    <head>
													        <meta name="viewport" content="width=device-width, initial-scale=1.0">
													        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
													        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
													        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
													        <style type="text/css">
													            .col-lg-12 {
													                width: 100%;
													            }
													            .col-lg-6 {
													                width: 50%;
													            }
													            .col-lg-3 {
													                width: 25%;
													            }
													            th,td{
													                padding: 4px 0px;
													                white-space: nowrap;
													            }
													        </style>
													    </head>
													    <body style="font-size: 12px; background: white;">
													        <section class="sheet" style="margin: 0px;box-shadow:none;">
													            <div style="padding-bottom: 5px;">
													                <img alt="Sale" src="'.$key_result[0]['client_sale_header'].'" style="max-width:100%;">
													            </div>
													            <div class="col-lg-12" style="padding-bottom: 5px;">
													                <div class="col-lg-6" style="float: left;">
													                    <label style="color: red !important;">'.($key_result[0]['user_default_language'] == 'English' ? 'Bill No.' : 'बिल नं.').' : <b style="color: black !important;">'.$outward_data[0]['outward_serial_number'].'</b></label>
													                </div>
													                <div class="col-lg-6" style="float: right;">
													                    <label style="color: red !important;">'.($key_result[0]['user_default_language'] == 'English' ? 'Date' : 'दिनांक').' : <b style="color: black !important;">'.$outward_data[0]['outward_date'].'</b></label>
													                </div>
													            </div>
													            <div class="col-lg-12" style="padding-bottom: 5px;">
													                <div class="col-lg-12">
													                    <label style="color: red !important;">'.($key_result[0]['user_default_language'] == 'English' ? 'Buyer' : 'खरेदीदार').' : <b style="color: black !important;">'.$outward_data[0]['ledger_name'].'</b></label>
													                </div>
													            </div>
													            <div class="col-lg-12" style="padding-bottom: 15px;">
													                <table style="border: 1px solid #000;width: 100%; max-width: 100%;">
													                    <tr style="color: red !important;">
													                        <th style="text-align: center;border: 1px solid #000;width: 5%">'.($key_result[0]['user_default_language'] == 'English' ? 'Sr.' : 'नं.').'</th>
													                        <th style="text-align: center;border: 1px solid #000;width: 25%">'.($key_result[0]['user_default_language'] == 'English' ? 'Material Desc.' : 'मालाचे वर्णन').'</th>                   
													                        '.$item_head_cond.'
													                        <th style="text-align: center;border: 1px solid #000;width: '.$weight_width_cond.';padding: 0px !important" >'.($key_result[0]['user_default_language'] == 'English' ? 'Weight' : 'वजन').'</th>
													                        '.$rate_summary_cond.'
													                        <th style="text-align: center;border: 1px solid #000;width: '.$total_width_cond.';padding: 0px !important" >'.($key_result[0]['user_default_language'] == 'English' ? 'Total Amount' : 'एकूण रक्कम').'</th>
													                    </tr>'.$html.'
													                    <tr>
													                        <th colspan="2" style="text-align: center;border: 1px solid #000;"><b style="color: red !important">'.($key_result[0]['user_default_language'] == 'English' ? 'Total' : 'एकूण').'</b></th>
													                        '.$item_summary_cond.'
													                        <th style="text-align: center;border: 1px solid #000;">'.$outward_data[0]['outward_total_weight'].'</th>
													                        <th style="text-align: center;border: 1px solid #000;"></th>
													                        <th style="text-align: right;border: 1px solid #000;padding-right:3px;">'.$outward_data[0]['outward_total_amount'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</th>
													                    </tr>
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Main. fee as per 1 ₹ per 100' : 'शे. १ रु. प्रमाणे बाजार फी').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$outward_data[0]['outward_total_sez_fee'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Main. fee as per 0.05 ₹ per 100' : 'शे. 5 पैसे प्रमाणे देखरेख फी').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.round($outward_data[0]['outward_total_storage_fee'],2).($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                    '.($mathadi_calculation_status=="True" ? '
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Lavi' : 'लेव्ही').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$outward_data[0]['outward_total_lavi'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                     ' : '').'
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Comission' : 'कमिशन रक्कम').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$outward_data[0]['outward_total_comission'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Hamali' : 'हमाली').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$outward_data[0]['outward_hamali'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkgreen !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Freight' : 'मोटर भाडे').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;" >'.$outward_data[0]['outward_freight'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkblue !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Round Off' : 'राउन्डिंग ऑफ').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;font-weight:bolder;" >'.$outward_data[0]['outward_round_off'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                    <tr>
													                        <td style="border: none;border-right: 1px solid black !important" colspan="2"></td>
													                        <td style="font-weight: bold;color :darkblue !important; border: 1px solid #000;text-align: left;padding-left:10px;" colspan="'.$colspan_cond.'">'.($key_result[0]['user_default_language'] == 'English' ? 'Net Amount' : 'नक्की रक्कम').'</td>
													                        <td style="border: 1px solid #000;text-align: right;padding-right:3px;font-weight:bolder;" >'.$outward_data[0]['outward_net_amount'].($key_result[0]['user_default_language'] == 'English' ? ' ₹' : ' रु.').'</td>
													                    </tr>
													                </table>
													            </div>
													        </section>
													        '.$cancel_html.'
													    </body>
													</html>';

								$file_name=$outward_id.'-'.date('Y-m-d-H-i-s');
								
								$ImageFilePath =  '/home/mandai/public_html/aadat/uploads/share_pdf/'.$file_name.'.jpeg';
								$HTMLFilePath =  '/home/mandai/public_html/aadat/uploads/share_pdf/'.$file_name.'.html';

								$ImageFileURL =  'https://mandai.in/aadat/uploads/share_pdf/'.$file_name.'.jpeg';
								$HTMLFileURL =  'https://mandai.in/aadat/uploads/share_pdf/'.$file_name.'.html';

								$fp = fopen($HTMLFilePath,"a");
								fwrite($fp,$html_data);
								fclose($fp);
								shell_exec('wkhtmltoimage --width 500 --javascript-delay 1000 --enable-plugins '.$HTMLFileURL.' '.$ImageFilePath);

							}
							$outward_array = array
						    (
						      	"id" => $outward_data[$z]['outward_id'],
						      	"name" => $outward_data[$z]['ledger_name'],
						      	"mobile_number" => $outward_data[$z]['ledger_mobile_number'],
						      	"method" => 'TEXT_IMAGE',
						      	"text" => $outward_data[$z]['text'],
						      	"image" => $ImageFileURL,
						    );
						    array_push($type_data,$outward_array);
						}
					break;
				case '11':
				case '12':
				case '13':
				case '14':
					if($type=='12' || $type=='14'){
						$member_cond=" and ledger_id='".$member_id."' ";
					}
					$type_data=$pdo->query("SELECT 
													transaction_id as id	
												    ,ledger_name as name 
												    ,ledger_mobile_number as mobile_number
												    ,'TEXT' as method
													,CASE
													    	when '".$key_result[0]['user_default_language']."'='Marathi' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('प्रिय सदस्य,\n\nआपण दि.',DATE_FORMAT(transaction_date, '%D %b %Y'),' रोजी रक्कम Rs.',FORMAT(transaction_amount,2,'en_IN'),' भरल्याबद्दल धन्यवाद.\nतुमचे पेमेंट यशस्वीरित्या प्राप्त झाले आहे आणि तुमच्या खात्यात अपडेट झाले आहे.\n\nआपला आभारी,\n','".$key_result[0]['client_gala_name']."') 
															when '".$key_result[0]['user_default_language']."'='English' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('Dear Member,\n\nThank you for your payment of Rs.',FORMAT(transaction_amount,2,'en_IN'),' On ',DATE_FORMAT(transaction_date, '%D %b %Y'),'.\nYour payment has been successfully received and updated in your account.\n\nThanking you.\n','".$key_result[0]['client_gala_name']."') 
													        else ''
														end as text
												    ,'' as image
												FROM transaction 
												join ledger 
													on ledger_id=transaction_ledger_id
												where transaction_client_id='".$key_result[0]['client_id']."'
												and ledger_group_id in (4,5,6)
												and transaction_type='Receipt'
												and transaction_date between '".$start_date."' and '".$end_date."'
												".$fetch_user_cond." ".$member_cond)->fetchAll(PDO::FETCH_ASSOC);
					break;	
				case '15':
				case '16':
				case '17':
				case '18':
					if($type=='16' || $type=='18'){
						$member_cond=" and ledger_id='".$member_id."' ";
					}
					$type_data=$pdo->query("SELECT 
													transaction_id as id	
												    ,ledger_name as name 
												    ,ledger_mobile_number as mobile_number
												    ,case when transaction_bill_image!='' and ('".$type."'='17' || '".$type."'='18') then 'TEXT_IMAGE' else 'TEXT' end as method
													,CASE
													    	when '".$key_result[0]['user_default_language']."'='Marathi' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('प्रिय सदस्य,\n\nतुमची रक्कम Rs.',FORMAT(transaction_amount,2,'en_IN'),' चे पेमेंट दि.',DATE_FORMAT(transaction_date, '%D %b %Y'),' रोजी अदा करण्यात आले आहे.\nकृपया याची पुष्टी करा आणि कोणतीही समस्या आल्यास आम्हाला कळवा.\n\nआपला आभारी,\n','".$key_result[0]['client_gala_name']."') 
															when '".$key_result[0]['user_default_language']."'='English' and ledger_mobile_number!='' and ledger_mobile_number is NOT NULL  then concat('Dear Member,\n\nYour Payment of Rs.',FORMAT(transaction_amount,2,'en_IN'),' has been Paid on On ',DATE_FORMAT(transaction_date, '%D %b %Y'),'.\nPlease confirm the same and let us know in case of any issue.\n\nThanking you.\n','".$key_result[0]['client_gala_name']."') 
													        else ''
														end as text
												    ,transaction_bill_image as image
												FROM transaction 
												join ledger 
													on ledger_id=transaction_ledger_id
												where transaction_client_id='".$key_result[0]['client_id']."'
												and ledger_group_id in (4,5,6)
												and transaction_type='Payment'
												and transaction_date between '".$start_date."' and '".$end_date."'
												".$fetch_user_cond." ".$member_cond)->fetchAll(PDO::FETCH_ASSOC);
					break;					
				default:
						$type_data=array();
					break;
			}

		}else{
			$user = array
			(
				"status" => "False",
				"messages" => "Invalid Message Type Selected !",
			);
		}
		
		$user = array
		(
			"status" => "True",
			"messages" => "",
			"list"=>$type_data,
		);
	}else{
		$user = array
		(
			"status" => "False",
			"messages" => "Session Expires !",
		);
	} 
	return $response->withStatus(200)
	->withHeader('Content-Type', 'application/json')
	->write(json_encode($user),JSON_FORCE_OBJECT);                
});

?>