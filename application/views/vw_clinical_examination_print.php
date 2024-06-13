<?php 
setlocale(LC_MONETARY, 'en_IN');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bill Receipt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>@page { size: A4 }</style>
    <style type="text/css">
        label{
            font-weight: normal;
        }
        .row{
            margin: 0px;
        }
        
            .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
                float: left;
            }
            .col-lg-12 {
                width: 100%;
            }
            .col-lg-11 {
                width: 91.66666667%;
            }
            .col-lg-10 {
                width: 83.33333333%;
            }
            .col-lg-9 {
                width: 75%;
            }
            .col-lg-8 {
                width: 66.66666667%;
            }
            .col-lg-7 {
                width: 58.33333333%;
            }
            .col-lg-6 {
                width: 50%;
            }
            .col-lg-5 {
                width: 41.66666667%;
            }
            .col-lg-4 {
                width: 33.33333333%;
            }
            .col-lg-3 {
                width: 25%;
            }
            .col-lg-2 {
                width: 16.66666667%;
            }
            .col-lg-1 {
                width: 8.33333333%;
            }
       
    </style>
</head>
<body style="background: white">
            <div style="height: 143mm;padding: 5mm;">
                <div>
                    <img alt="OPD Bill Receipt" src="<?=base_url('assets')?>/images/receipt_header.png" style="margin:6px;max-width:100%;">
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-bottom: 5px;">
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>INITIAL CLINICAL ASSESSMENT</b></h4>
                    </div>
                </div><br>
                <div class="row" style="font-size: 13px">
                    <div class="col-lg-7">
                        <div class="row">
                            <label class="col-lg-4">UHID<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($ICA['uhid'])?$ICA['uhid']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Patient Name<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($ICA['patient_name'])?$ICA['patient_name']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Patient Age<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($ICA['patient_age'])?$ICA['patient_age']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Doctor Name<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($ICA['doctor_name'])?$ICA['doctor_name']:'-'?></label>
                        </div>
                        
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <label class="col-lg-5">Date-Time<i style="float:right;">:</i></label>
                            <label class="col-lg-7"><?=!empty($ICA['ce_datetime'])?$ICA['ce_datetime']:'-'?></label>
                        </div> 
                        <div class="row">
                            <label class="col-lg-5">Gender<i style="float:right;">:</i></label>
                            <label class="col-lg-7"><?=!empty($ICA['gender'])?$ICA['gender']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-5">Department<i style="float:right;">:</i></label>
                            <label class="col-lg-7"><?=!empty($ICA['dept_name'])?$ICA['dept_name']:'-'?></label>
                        </div>
                        
                    </div>
                </div>
                <br>
                <hr style="margin: 5px;">
                
                        <fieldset style="border: 1px solid black">
                        <div class="row" style="margin:10px 0px;padding-left: 5px">
                            <h4><u>Past Medical History</u></h4>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                              <label class="control-label col-lg-2">Medical<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-4">
                                  <label class="control-label col-lg-2" id="medical_history"><?=!empty($ICA['CE_medical_history'])?$ICA['CE_medical_history']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">Surgical<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-4">
                                  <label class="control-label col-lg-2" id="surgical_history"><?=!empty($ICA['CE_surgical_history'])?$ICA['CE_surgical_history']:'-'?></label>
                              </div>   
                        </div>
                      </fieldset>
                      <br>
                      <fieldset style="border: 1px solid black">
                        <div class="row" style="margin:10px 0px;padding-left: 5px">
                          <h4><u>Personal History</u><h4>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-2">Smoking<b class="pull-right">:</b> </label>
                          <div class="col-lg-2">
                            <label class="control-label col-lg-2" id="smoking"><?=!empty($ICA['CE_smoking'])?$ICA['CE_smoking']:'-'?></label>
                          </div>
                          <label class="control-label col-lg-2">Since <b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label col-lg-2" id="smoking_since"><?=!empty($ICA['CE_smoking_since'])?$ICA['CE_smoking_since']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-2">Alcohol<b class="pull-right">:</b> </label>
                          <div class="col-lg-2">
                            <label class="control-label col-lg-2" id="alcohol"><?=!empty($ICA['CE_alcohol'])?$ICA['CE_alcohol']:'-'?></label>
                          </div>
                          <label class="control-label col-lg-2">Since <b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label col-lg-2" id="alcohol_since"><?=!empty($ICA['CE_alcohol_since'])?$ICA['CE_alcohol_since']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-2">Tobacco<b class="pull-right">:</b> </label>
                          <div class="col-lg-2">
                            <label class="control-label col-lg-2" id="tobacco"><?=!empty($ICA['CE_tobacco'])?$ICA['CE_tobacco']:'-'?></label>
                          </div>
                          
                          <label class="control-label col-lg-2">Since <b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label col-lg-2" id="tobacco_since"><?=!empty($ICA['CE_tobacco_since'])?$ICA['CE_tobacco_since']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-2">Diet<b class="pull-right">:</b> </label>
                          <div class="col-lg-2">
                            <label class="control-label col-lg-2" id="diet"><?=!empty($ICA['CE_diet'])?$ICA['CE_diet']:'-'?></label>
                          </div>
                         
                        </div>
                      </fieldset>
                      <br>
                      <fieldset style="border: 1px solid black">
                        <div class="row" style="margin:10px 0px;">
                              
                              <label class="control-label col-lg-2">Temperature (°C)<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="temperature"><?=!empty($ICA['CE_temperature'])?$ICA['CE_temperature']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">PR (bpm) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="PR"><?=!empty($ICA['CE_PR'])?$ICA['CE_PR']:'-'?></label>
                              </div>
                             
                        </div>
                        <div class="row" style="margin:10px 0px;">
                             <label class="control-label col-lg-2">RR (p/min) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                 <label class="control-label col-lg-2" id="RR"><?=!empty($ICA['CE_RR'])?$ICA['CE_RR']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">Systolic Bp (mmHg) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="systolic_bp"><?=!empty($ICA['CE_Systolic_BP'])?$ICA['CE_Systolic_BP']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">Diastolic BP (mmHg) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                  <label class="control-label col-lg-2" id="diastolic_bp"><?=!empty($ICA['CE_heart_rate'])?$ICA['CE_heart_rate']:'-'?></label>
                              </div>
                              
                        </div>
                        <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-2">Heart Rate (bpm) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="heart_rate"><?=!empty($ICA['CE_heart_rate'])?$ICA['CE_heart_rate']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">SpO2 (%) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="SpO2"><?=!empty($ICA['CE_SpO2'])?$ICA['CE_SpO2']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">Height (Cm) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="height"><?=!empty($ICA['CE_height'])?$ICA['CE_height']:'-'?></label>
                              </div>
                              
                        </div>
                        <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-2">Weight (Kg) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="weight"><?=!empty($ICA['CE_weight'])?$ICA['CE_weight']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">BMI<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="BMI"><?=!empty($ICA['CE_BMI'])?$ICA['CE_BMI']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-2">BSA (p/m2)<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;" >
                                <label class="control-label col-lg-2" id="BSA"><?=!empty($ICA['CE_BSA'])?$ICA['CE_BSA']:'-'?></label>
                              </div>
                              
                        </div>
                        <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-2">BMI Remark<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;" >
                                <label class="control-label col-lg-2" id="BMI_Remark"><?=!empty($ICA['CE_BMI_Remark'])?$ICA['CE_BMI_Remark']:'-'?></label>
                              </div>
                              <!--
                              <label class="control-label col-lg-2">CVP<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-2" style="display: flex;">
                                <label class="control-label col-lg-2" id="CVP"><?=!empty($ICA['CE_CVP'])?$ICA['CE_CVP']:'-'?></label>
                              </div>-->
                              
                        </div>
                        <div class="row" style="margin:10px 0px;">
                              <label class="control-label col-lg-2">Examination Details<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                              <div class="col-lg-10">
                                <label class="control-label col-lg-2" id="examination_details"><?=!empty($ICA['CE_examination_details'])?$ICA['CE_examination_details']:'NA'?></label>
                              </div>  
                        </div>  
                      </fieldset>
                      <br>
                      <fieldset style="border: 1px solid black;">
                        <div class="row" style="margin:10px 0px;padding-left: 5px">
                          <h4><u>General Examination Details</u><h4>
                        </div>
                        <div class="row" style="margin:10px 0px;padding-left: 5px">
                          <label class="control-label col-lg-2">Built<b class="pull-right">:</b> </label>
                          <div class="col-lg-2">
                            <label class="control-label col-lg-2" id="built"><?=!empty($ICA['CE_built'])?$ICA['CE_built']:'-'?></label>
                          </div>
                          <div class="col-lg-2">
                            <label>Lean<b class="pull-right">:</b></label>
                            <label class="control-label" id="Lean"><?=!empty($ICA['CE_lean'])?$ICA['CE_lean']:'-'?></label>
                          </div>
                          <div class="col-lg-2">
                            <label for="Lean">Average<b class="pull-right">:</b></label>
                            <label class="control-label" id="Average"><?=!empty($ICA['CE_average'])?$ICA['CE_average']:'-'?></label>
                          </div>
                          <div class="col-lg-2">
                            <label>Healthy<b class="pull-right">:</b></label>
                            <label class="control-label" id="Healthy"><?=!empty($ICA['CE_healthy'])?$ICA['CE_healthy']:'-'?></label>
                          </div>
                          <div class="col-lg-2">
                            <label for="Obese">Obese</label>
                            <label class="control-label" id="Obese"><?=!empty($ICA['CE_obese'])?$ICA['CE_obese']:'-'?></label>
                          </div>
                        </div>
                        
                      </fieldset>
                      <fieldset style="border: 1px solid black;margin-top: 20px">
                        <div class="row" style="margin:10px 0px;">
                          <h4><u>Systemic Examination Details</u><h4>
                        </div> 
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">CNS<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label col-lg-2" id="cns"><?=!empty($ICA['CE_cns'])?$ICA['CE_cns']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">CVS<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label col-lg-2" id="cvs"><?=!empty($ICA['CE_cvs'])?$ICA['CE_cvs']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">RS<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label col-lg-2" id="rs"><?=!empty($ICA['CE_rs'])?$ICA['CE_rs']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">PA<b class="pull-right">:</b> </label>
                          <div class="col-lg-8">
                            <div class="row">
                              <label class="control-label col-lg-3">Inspection<b class="pull-right">:</b> </label>
                              <div class="col-lg-3">
                                <label class="control-label" id="inspection"><?=!empty($ICA['CE_pa_inspection'])?$ICA['CE_pa_inspection']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-3">Palpation<b class="pull-right">:</b> </label>
                              <div class="col-lg-3">
                                <label class="control-label" id="palpation"><?=!empty($ICA['CE_pa_palpation'])?$ICA['CE_pa_palpation']:'-'?></label>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                           
                              <label class="control-label col-lg-3">Percusion<b class="pull-right">:</b> </label>
                              <div class="col-lg-3">
                                <label class="control-label" id="percusion"><?=!empty($ICA['CE_pa_percusion'])?$ICA['CE_pa_percusion']:'-'?></label>
                              </div>
                              <label class="control-label col-lg-3">Auscultation<b class="pull-right">:</b> </label>
                              <div class="col-lg-3">
                                <label class="control-label" id="auscultation"><?=!empty($ICA['CE_pa_auscultation'])?$ICA['CE_pa_auscultation']:'-'?></label>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">Local Examiniation:Genitals & Hernimal Sites<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label" id="local_examiniation"><?=!empty($ICA['CE_local_examination'])?$ICA['CE_local_examination']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">Per Rectal Examination<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label" id="per_rectal_examination"><?=!empty($ICA['CE_rectal_examination'])?$ICA['CE_rectal_examination']:'-'?></label>
                          </div>
                        </div>
                        
                      </fieldset>
                      <fieldset style="border: 1px solid black;margin-top: 20px">
                        <div class="row" style="margin:10px 0px;">
                            <h4><u>Diagnosis</u><h4>
                        </div> 
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">A) Provisional<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label" id="provisional"><?=!empty($ICA['CE_provisional'])?$ICA['CE_provisional']:'-'?></label>
                          </div>
                        </div> 
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">B) Differential Diagnosis<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label" id="differential_diagnosis"><?=!empty($ICA['CE_differential_diagnosis'])?$ICA['CE_differential_diagnosis']:'-'?></label>
                          </div>
                        </div>
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">B) Final Diagnosis<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label" id="final_diagnosis"><?=!empty($ICA['CE_final_diagnosis'])?$ICA['CE_final_diagnosis']:'-'?></label>
                          </div>
                        </div>
                      </fieldset>
                      <fieldset style="border: 1px solid black;margin-top: 20px">
                        <div class="row" style="margin:10px 0px;">
                              <label class="control-label col-lg-2">Plan Of Care<b class="pull-right">:</b> </label>
                        </div> 
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">A) Immediate Management<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                            <label class="control-label" id="immediate_management"><?=!empty($ICA['CE_immediate_mgnt'])?$ICA['CE_immediate_mgnt']:'-'?></label>
                          </div>
                        </div> 
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">B) Preventive Measures if any<b class="pull-right">:</b> </label>
                          <div class="col-lg-4">
                             <label class="control-label" id="preventive_measures"><?=!empty($ICA['CE_preventive_measures'])?$ICA['CE_preventive_measures']:'-'?></label>
                          </div>
                        </div>
                        
                      </fieldset>
                      <fieldset style="border: 1px solid black;margin-top: 20px">
                        <div class="row" style="margin:10px 0px;">
                            <h4><u>Treatment</u><h4>
                        </div> 
                        <div class="row" style="margin:10px 0px;">
                            <label class="control-label" id="treatment"><?=!empty($ICA['CE_plan_of_care'])?$ICA['CE_plan_of_care']:'-'?></label>
                        </div> 
                      </fieldset>
                      <fieldset style="border: 1px solid black;margin-top: 20px">
                        <div class="row" style="margin:10px 0px;">
                            <h4><u>Nutritional status</u><h4>
                        </div> 
                        <div class="row" style="margin:10px 0px;">
                          <label class="control-label" id="nutritional_status"><?=!empty($ICA['CE_nutritional_status'])?$ICA['CE_nutritional_status']:'-'?></label>
                        </div> 
                        
                      </fieldset>
                       <fieldset style="border: 1px solid black;margin-top: 20px">
                        <div class="row" style="margin:10px 0px;">
                            <h4><u>Patient Education & Counselling</u><h4>
                        </div> 
                        <div class="row">
                            <label class="col-lg-3">Patient/Relative Name<i>:</i></label>
                            <label class="col-lg-9"><?=!empty($ICA['patient_name'])?$ICA['patient_name']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-3">Relation<i class="pull-right">:</i></label>
                            <input class="form-control" type="text" name="relation" id="relation">
                        </div> 
                        <div class="row">
                           <label class="col-lg-3">Timestamp<i class="pull-right">:</i></label>
                           <label class="col-lg-3"><?=!empty($ICA['ce_datetime'])?$ICA['ce_datetime']:'-'?></label>
                        </div> 
                        <div class="row">
                            <label class="col-lg-3">Signature<i class="pull-right">:</i></label>
                            <label class="col-lg-3"><i>:</i></label>
                            <label class="col-lg-3">Doctor Name<i style="float:right;">:</i></label>
                            <label class="col-lg-3"><?=!empty($ICA['doctor_name'])?$ICA['doctor_name']:'-'?></label>                            
                        </div> 
                        
                      </fieldset>
                <br>
                <hr style="margin: 5px;">
            </div>

</body>
</html>
<script src="<?php echo base_url()?>assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript">
    status='<?=!empty($print)?$print:'False'?>';
    base_url='<?php echo base_url()?>/receipt';
    console.log("Status "+status);
    if (status=='True') {
        window.print();
        window.onafterprint = function(){
            window.location.href = base_url;
        }
        window.onaftercancel = function(){
            window.location.href = base_url;
        }
    }
</script>