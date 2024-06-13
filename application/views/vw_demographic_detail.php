 <?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<link href="<?=base_url('assets')?>/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">


<style>

  .menu-content {
    display: none;
    } 

    .menu-content.active {
    display: block;
    }

    fieldset {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;

}



table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>



<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-2 #ffffff text-light" style="padding-right: 0px;padding-left: 0px;">
      <nav class="navbar-static-side fill" role="navigation" style="width:inherit;">
        <div class="sidebar-collapse" >
          <ul class="nav metismenu" id="side-menu" style="overflow-y: auto;">
            <li class="nav-header" style="background-color: #22486b;color: white;padding-top: 10px;">
              <div class="dropdown profile-element" style="text-align:center;padding: 10px;" > 
               
                <h3><?= $record['p_name']?></h3>
                <h3><?= $record['age']?>/<?= $record['p_gender']?></h3>
                <h3>UHID:<?= $record['uhid']?></h3> 
                <h3>Dept:<?= $record['d_name']?></h3>
                <h3>Consultant's Name:<br><?= $record['doctor_name']?></h3>
                <h3>Category:<?= $record['category_name']?></h3>
                <!-- <h3 >Visit Type:</h3> -->
                <h3><?= $record['mlc_status']?></h3>

              </div>    
            </li>
            
            <li id="dash_tab" class="menu-item" data-target="demographic_detail">
              <a  tabindex="-1"><i class="fa fa-th-large"></i> <span class="nav-label">Patient Details</span></a>
            </li>
            
            <li id="department_tab" class="menu-item" data-target="hisory_of_present_illness">
              <a id="hisory_of_present_illness_btn" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Present Illness</span></a>
            </li>
            <li id="department_tab" class="menu-item" data-target="clinical_examinition" >
              <a id="clinical_examinition_btn" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Initial Clinical Assessment</span></a>
            </li>
            <li id="sub_department_tab" class="menu-item" data-target="investigation">
              <a id="investigation_btn" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Investigation</span></a>
            </li>
           
            <li id="designation_tab" class="menu-item" data-target="prescription">
              <a id="prescription_btn" tabindex="-1"><i class="fa fa-tv"></i> <span class="nav-label">Prescription</span></a>
            </li>
            <li id="specialization_tab" class="menu-item" data-target="services">
              <a id="services_btn" tabindex="-1"><i class="fa fa-gift"></i> <span class="nav-label">Services</span></a>
            </li>
            <!--
            <li id="line_of_treatment_tab" class="menu-item" data-target="line_of_treatment">
              <a id="line_of_treatment_btn" tabindex="-1"><i class="fa fa-gift"></i> <span class="nav-label">Line Of Treatment</span></a>
            </li>-->

            <?php if ($record['reference'] =='IPD') { ?>

            <li id="discharge_summary_tab" class="menu-item" data-target="discharge_summary">
              <a id="discharge_summary_btn" tabindex="-1"><i class="fa fa-gift"></i> <span class="nav-label">Discharge Summary</span></a>
            </li>
            <li id="consumable_tab" class="menu-item" data-target="consumable">
              <a id="consumable_btn" tabindex="-1">
                <i class="fa fa-gift"></i>
                  <span class="nav-label">Consumable</span>
              </a> 
            </li>
            <li id="opration_theatre_tab" class="menu-item" data-target="opration_theatre">
              <a id="opration_theatre_btn" tabindex="-1">
                <i class="fa fa-gift"></i>
                  <span class="nav-label">Opration Theatre</span>
              </a> 
            </li>
            <li id="bed_transfer_tab" class="menu-item" data-target="bed_transfer">
              <a id="bed_transfer_btn" tabindex="-1">
                <i class="fa fa-gift"></i>
                  <span class="nav-label">Bed Transfer</span>
              </a> 
            </li>
           
            <li id="patient_refer_tab" class="menu-item" data-target="patient_refer">
              <a id="patient_refer_btn" tabindex="-1">
                <i class="fa fa-gift"></i>
                  <span class="nav-label">Patient Refer</span>
              </a> 
            </li>
            <li id="nutrition_tool_tab" class="menu-item" data-target="nutrition_tool">
              <a id="nutrition_tool_btn" tabindex="-1">
                <i class="fa fa-gift"></i>
                  <span class="nav-label">Nutrition Tool</span>
              </a> 
            </li>
            <li id="concent_form_tab" class="menu-item" data-target="concent_form">
              <a id="concent_form_btn" tabindex="-1">
                <i class="fa fa-gift"></i>
                  <span class="nav-label">Concent Form</span>
              </a> 
            </li>
          <?php } ?>
          </ul>
        </div>
      </nav>
    </div>
    <div class="col-lg-10">
      <div class="ibox-content" style="padding: 0px;">
        <div class="menu-content" id="demographic_detail">
          <div id="accordion" class="accordion">
              <div class="card mb-0">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-lg-6">
                        <a class="card-title">
                           <h3 style="margin: 0px;">Patient Details</h3>
                        </a>
                      </div>
                      <div class="col-lg-6">
                        <input type="checkbox" id="cons_status" name="cons_status" value="">
                        <b><label for="complete_consultation" style="color:green;">Consultation Completed</label></b>
                        <button type="button" onclick="consultation_status_action()" style="padding: 5px 10px; font-size: 14px;">Save</button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body" style="font-size:16px;">
                    <div class="row">
                        <div class="col-lg-4">
                            <div style="background-color: #8080800f;padding: 20px;height: 350px;text-align: center;">
                                <p><?= $record['p_name']?><p>
                                <p><?= $record['age']?>/<?= $record['p_gender']?></p>
                                <p>Category/Company:<?= $record['category_name']?>/<?= $record['company_name']?></p>
                                <P>Visit Date:<?= $record['appointment_datetime']?></P>
                                <div class="col-lg-12">
                                    <hr style="border-top: 1px solid #bbb;">
                                    <p>Allergies :</p>
                                    <input type="radio" id="Yes" name="Allergies" id="Allergies" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="No" name="Allergies" id="Allergies" value="No">
                                    <label for="No">No</label>
                                    <input type="radio" id="Not_known" name="Allergies" value="Not_known">
                                    <label for="No">Not Known</label>
                                    <p class="allergies_cls">Enter Allergies <input class="form-control col-lg-12" type="text" id="allergies" name="allergies"><p>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div style="background-color: #8080800f;padding: 20px;height: 350px;">
                                <form method="post"  enctype="multipart/form-data" id="add_service_form">
                                 <div class="row" style="margin:10px 0px;">
                                    <label class="control-label col-lg-4">Last Visit Date-Dept.<a style="color: red">*</a> <b class="pull-right">:</b></label>
                                        <label class="control-label col-lg-8">NA</label>
                                 </div>
                                 <div class="row" style="margin:10px 0px;">
                                    <label class="control-label col-lg-4">Last Visit Diagnosis<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                        <label class="control-label col-lg-4">Not Known Diagnosis.</label>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div style="min-height: 300px;margin-top: 15px;">
                        <div class="row col-lg-12">
                            <div class="col-lg-3">
                                    <p>Last Visit</p>
                                </div>
                                <div class="col-lg-3" style="background-color:skyblue;">
                                    <h5>OPD | 2</h5>
                                </div>
                                <div class="col-lg-3" style="background-color:greenyellow;">
                                    <h5>IPD | 0</h5>
                                </div>
                                <div class="col-lg-3" style="background-color:yellow;">
                                    <h5>CASUALTY | 0</h5>
                                </div>
                        </div>
                        <div class="row col-lg-12">
                            <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                              <thead>
                                  <tr>
                                      <th style="border-right: 1px solid white;">Visit Date</th>
                                      <th style="border-right: 1px solid white;">Visit Details</th>
                                      <th style="border-right: 1px solid white;">Department</th>
                                      <th style="border-right: 1px solid white;">Consultant's Name</th>
                                      <th style="border-right: 1px solid white;">Diagnosis</th>
                                      <th style="border-right: 1px solid white;">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php if (empty($last_visit)): ?>
                                  <tr>
                                      <td colspan="6">This is the first visit</td>
                                  </tr>
                              <?php else: ?>
                                  <?php foreach ($last_visit as $rec): ?>
                                      <tr pid="<?= $rec['id'] ?>">
                                          <td style="border-right: 1px solid lightgray"><?= $rec['appo_date'] ?></td>
                                          <td style="border-right: 1px solid lightgray"><?= $rec['visit_details'] ?></td>
                                          <td style="border-right: 1px solid lightgray"><?= $rec['d_name'] ?></td>
                                          <td style="border-right: 1px solid lightgray"><?= $rec['doctor_name'] ?></td>
                                          <td style="border-right: 1px solid lightgray"><?= $rec['diagnosis'] ?></td>
                                          <td style="border-right: 1px solid lightgray"><?= $rec['action'] ?></td>
                                      </tr>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="menu-content" id="hisory_of_present_illness">
          <div id="accordion" class="accordion">
              <div class="card mb-0">
                  <div class="card-header">
                      <a class="card-title">
                         <h3 style="margin: 0px;">History Of Present Illness</h3>
                      </a>
                  </div>
                  <div class="card-body">
                    <form method="post"  enctype="multipart/form-data" id="present_illness_form">
                      <div class="row" style="margin:10px 0px;">
                        <label class="form-control col-lg-2" style="border:0px;">Complaints<a style="color: red">*</a><b class="pull-right">:</b></label>
                        <div class="col-lg-4">
                          <select class="form-control selectpicker" name="complaint_name[]" id="complaint_name" data-live-search="true" multiple>
                              <option selected="" disabled="">Select Complaint</option>
                              
                          </select>
                        </div>
                      </div>
                      <div class="row" style="margin:10px 0px;">
                        <label class="form-control col-lg-2" style="border:0px;">Complaints Details<a style="color: red">*</a><b class="pull-right">:</b></label>
                        <div class="col-lg-4">
                          <textarea id="complaint_details" name="complaint_details" rows="3" cols="100">
                          </textarea>
                        </div>
                      </div>
                      
                      <button type="button" onclick="present_illness_action()" style="padding: 5px 10px; font-size: 14px;">Save</button>
                      
                    </form> 
                  </div>
              </div>
          </div>
        </div> 
        <div class="menu-content" id="clinical_examinition">
          <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header">
                        <a class="card-title">
                          <?php if ($record['reference']=='OPD'){ ?>
                           <h3 style="margin: 0px;">OPD ASSESSMENT FORM</h3>
                          <?php } else {?>
                            <h3 style="margin: 0px;">INITIAL CLINICAL ASSESSMENT</h3>
                          <?php }?>  
                        </a>
                        <button class="btn-primary pull-right" onclick="print_ICA()">Print</button>
                    </div>
                    <div class="card-body">
                      <form method="post"  enctype="multipart/form-data" id="clinical_examinition_action">
                        <fieldset style="border: 1px solid black">
                          <div class="row" style="margin:10px 0px;padding-left: 5px">
                            <h3><u>Past Medical History</u></h3>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">Medical<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" name="medical_history" id="medical_history">
                                </div>
                                <label class="control-label col-lg-2">Surgical<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" id="surgical_history" name="surgical_history">
                                </div>   
                          </div>
                        </fieldset>
                        <br>
                        <fieldset style="border: 1px solid black">
                          <div class="row" style="margin:10px 0px;padding-left: 5px">
                            <h3><u>Personal History</u></h3>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-2">Smoking<b class="pull-right">:</b> </label>
                            <div class="col-lg-2">
                              <input type="checkbox" id="smoking" name="smoking" value="Yes">
                              <label for="smoking">Yes</label>
                            </div>
                            <div class="col-lg-2">
                              <input type="checkbox" id="smoking" name="smoking" value="No">
                              <label for="smoking">No</label>
                            </div>
                            <label class="control-label col-lg-2">Since <b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="smoking_since" name="smoking_since">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-2">Alcohol<b class="pull-right">:</b> </label>
                            <div class="col-lg-2">
                              <input type="checkbox" id="alcohol" name="alcohol" value="Yes">
                              <label for="alcohol">Yes</label>
                            </div>
                            <div class="col-lg-2">
                              <input type="checkbox" id="alcohol" name="alcohol" value="No">
                              <label for="alcohol">No</label>
                            </div>
                            <label class="control-label col-lg-2">Since <b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="alcohol_since" name="alcohol_since">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-2">Tobacco<b class="pull-right">:</b> </label>
                            <div class="col-lg-2">
                              <input type="checkbox" id="tobacco" name="tobacco" value="Yes">
                              <label for="tobacco">Yes</label>
                            </div>
                            <div class="col-lg-2">
                              <input type="checkbox" id="tobacco" name="tobacco" value="No">
                              <label for="alcohol">No</label>
                            </div>
                            <label class="control-label col-lg-2">Since <b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="tobacco_since" name="tobacco_since">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-2">Diet<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="Diet" name="Diet">
                            </div>
                          </div>
                        </fieldset>
                        <br>
                        <fieldset style="border: 1px solid black">
                          <h3><u>Examination</u></h3>
                          <div class="row" style="margin:10px 0px;">
                               
                                <label class="control-label col-lg-2">Temperature (°C)<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="temperature" name="temperature">
                                </div>
                                <label class="control-label col-lg-2">PR(p/min)<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="PR" name="PR">
                                </div>
                                 <label class="control-label col-lg-2">RR(bpm)<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="RR" name="RR">
                                </div>
                               
                          </div>
                          <div class="row" style="margin:10px 0px;">
                              
                                <label class="control-label col-lg-2">Systolic Bp (mmHg) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="systolic_bp" name="systolic_bp">
                                </div>
                                <label class="control-label col-lg-2">Diastolic BP (mmHg) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="diastolic_bp" name="diastolic_bp BP">
                                </div>
                                <label class="control-label col-lg-2">Heart Rate (bpm)  <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="heart_rate" name="heart_rate">
                                </div>
                                
                          </div>
                          <div class="row" style="margin:10px 0px;">
                              
                                <label class="control-label col-lg-2">SpO2 (%) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="spO2" name="spO2">
                                </div>
                                <label class="control-label col-lg-2">Height (Cm) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="height" name="height">
                                </div>
                                 <label class="control-label col-lg-2">Weight (Kg) <a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="weight" name="weight">
                                </div>
                                
                          </div>
                          <div class="row" style="margin:10px 0px;">
                             
                                <label class="control-label col-lg-2">BMI<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;">
                                    <input class="form-control" type="text" id="BMI" name="BMI">
                                </div>
                                <label class="control-label col-lg-2">BSA (p/m2)<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;" >
                                    <input class="form-control" type="text" id="BSA" name="BSA">
                                </div>
                                <label class="control-label col-lg-2">BMI Remark <b class="pull-right">:</b> </label>
                                <div class="col-lg-2" style="display: flex;" >
                                    <input class="form-control" type="text" id="BMI_Remark" name="BMI_Remark">
                                </div>
                                
                          </div>
                         
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">Examination Details<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <div class="col-lg-10">
                                     <textarea class="form-control" name="examination_details" id="examination_details" style="padding:5px">
                                       
                                     </textarea>
                                </div>  
                          </div>  
                        </fieldset>
                        <br>
                        <fieldset style="border: 1px solid black;">
                          <div class="row" style="margin:10px 0px;padding-left: 5px">
                            <h3><u>General Examination Details</u></h3>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">Built<b class="pull-right">:</b> </label>
                            
                            <div class="col-lg-2">
                              <input type="checkbox" id="lean" name="lean" value="Yes">
                              <label for="Lean">Lean</label>
                            </div>
                            <div class="col-lg-2">
                              <input type="checkbox" id="average" name="average" value="Yes">
                              <label for="Lean">Average</label>
                            </div>
                            <div class="col-lg-2">
                              <input type="checkbox" id="healthy" name="healthy" value="Yes">
                              <label for="Lean">Healthy</label>
                            </div>
                            <div class="col-lg-2">
                              <input type="checkbox" id="obese" name="obese" value="Yes">
                              <label for="Obese">Obese</label>
                            </div>
                          </div>
                          
                        </fieldset>
                        <fieldset style="border: 1px solid black;margin-top: 20px">
                          <div class="row" style="margin:10px 0px;">
                            <h3><u>Systemic Examination Details</u></h3>
                          </div> 
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">CNS<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="cns" name="cns">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">CVS<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="cvs" name="cvs">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">RS<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="rs" name="rs">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">PA<b class="pull-right">:</b> </label>
                            <div class="col-lg-8">
                              <div class="row">
                                <label class="control-label col-lg-3">Inspection<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" id="inspection" name="inspection">
                                </div>
                                <label class="control-label col-lg-3">Palpation<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" id="palpation" name="palpation">
                                </div>
                                
                              </div>
                              <br>
                              <div class="row">
                             
                                <label class="control-label col-lg-3">Percusion<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" id="percusion" name="percusion">
                                </div>
                                <label class="control-label col-lg-3">Auscultation<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" id="auscultation" name="auscultation">
                                </div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">Local Examination:Genitals & Hernial Sites<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="local_examiniation" name="local_examiniation">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">Per Rectal Examination<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="per_rectal_examination" name="per_rectal_examination">
                            </div>
                          </div>
                          
                        </fieldset>
                        <fieldset style="border: 1px solid black;margin-top: 20px">
                          <div class="row" style="margin:10px 0px;">
                                 <h3><u>Nutritional Status</u></h3>
                          </div> 
                          <div class="row" style="margin:10px 0px;">
                            <textarea class="form-control" name="nutritional_status" id="nutritional_status" style="padding:5px"></textarea>
                          </div> 
    
                        </fieldset>

                        <fieldset style="border: 1px solid black;margin-top: 20px">
                          <div class="row" style="margin:10px 0px;">
                                <h3><u>Diagnosis</u></h3>
                          </div> 
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">A) Provisional<a style="color: red">*</a><b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="provisional" name="provisional">
                            </div>
                          </div> 
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">B) Differential<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="differential_diagnosis" name="differential_diagnosis" required="">
                            </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">C) Final<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="final_diagnosis" name="final_diagnosis" >
                            </div>
                          </div>
                        </fieldset>
                        <fieldset style="border: 1px solid black;margin-top: 20px">
                          <div class="row" style="margin:10px 0px;">
                                <h3><u>Plan Of Care</u></h3>
                          </div> 
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">A) Immediate Management<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="immediate_management" name="immediate_management">
                            </div>
                          </div> 
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">B) Preventive Measures if any<b class="pull-right">:</b> </label>
                            <div class="col-lg-4">
                              <input class="form-control" type="text" id="preventive_measures" name="preventive_measures">
                            </div>
                          </div>
                          
                          
                        </fieldset>
                        
                        <fieldset style="border: 1px solid black;margin-top: 20px">
                          <div class="row" style="margin:10px 0px;">
                            <h3><u>Treatment</u></h3>
                          </div> 
                          <div class="row" style="margin:10px 0px;">
                            <textarea class="form-control" name="plan_of_care" style="padding:5px"></textarea>
                          </div> 
                        </fieldset>
                        <?php if($record['reference']=='OPD'){ ?>
                        <fieldset style="border: 1px solid black;margin-top: 20px">
                          <div class="row" style="margin:10px 0px;">
                              <h3><u>Suggested IPD</u></h3>
                              <div class="col-lg-4">
                                <input type="radio" id="suggested_ipd" name="suggested_ipd" value="Yes" >
                                <label for="suggested_ipd" style="margin-right: 10px;font-size: 18px;">Yes</label>
                                <input type="radio" id="suggested_ipd" name="suggested_ipd" value="No">
                                <label for="suggested_ipd" style="margin-right: 10px;font-size: 18px;">No</label>
                              </div>
                          </div>
                          <div class="row suggested_dept_cls" style="margin:10px 0px;">
                              <label class="control-label col-lg-4">Department<b class="pull-right">:</b> </label>
                              <div class="col-lg-8" >
                                <input type="radio" id="suggested_department" name="suggested_department" value="ICU" style="padding: 6px;font-size: large;">
                                <label for="suggested_department" style="margin-right: 10px;font-size: 18px;">ICU</label>
                                <input type="radio" id="suggested_department" name="suggested_department" value="CCU" style="padding: 6px;font-size: large;">
                                <label for="suggested_department" style="margin-right: 10px;font-size: 18px;">CCU</label>
                                <input type="radio" id="suggested_department" name="suggested_department" value="NICU" style="padding: 6px;font-size: large;">
                                <label for="suggested_department" style="margin-right: 10px;font-size: 18px;">NICU</label>
                                <input type="radio" id="suggested_department" name="suggested_department" value="PICU" style="padding: 6px;font-size: large;">
                                <label for="suggested_department" style="margin-right: 10px;font-size: 18px;">PICU</label>
                                <input type="radio" id="suggested_department" name="suggested_department" value="Ward" style="padding: 6px;font-size: large;">
                                <label for="suggested_department" style="margin-right: 10px;font-size: 18px;">Ward</label>
                                <input type="radio" id="suggested_department" name="suggested_department" value="Daycare" style="padding: 6px;font-size: large;">
                                <label for="suggested_department" style="margin-right: 10px;font-size: 18px;">Daycare</label>
                                
                              </div>
                          </div>
                        </fieldset>
                         <?php } ?>
                        
                        <div class="row" style="margin: 10px 0px;">
                            <div class="col-lg-10"></div>
                            <button class="btn btn-primary col-lg-2" type="submit">Save</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
          </div>        
        </div>
        <div class="menu-content" id="investigation">
            <div class="accordion report_form">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Investigation</h3>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right" id="show_reports_btn">
                                    <i class="fa fa-plus"></i> Show Reports
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <form method="post"  enctype="multipart/form-data" id="diagnosis_appointment_form_doctor">
                      <div class="row">
                        <div class="col-lg-12">  
                          <div class="row" style="margin: 0px;">
                            <label class="form-control col-lg-2" style="border:0px;" >Department<a style="color: red">*</a></label>
                            <label class="form-control col-lg-2" style="border:0px;">Select Service<a style="color: red">*</a></label>
                            <label class="form-control col-lg-2" style="border:0px;" ></label>
                            <label class="form-control col-lg-4" style="border:0px;" >Clinical Details</label>
                            <label class="form-control col-lg-2" style="border:0px;" ></label>
                          </div>
                          <div class="row" style="margin: 0px;">
                             <div class="col-lg-2">
                                <select class="form-control" name="d_name" id="d_name">
                                  <option value="" selected="" disabled="">Select Department</option>
                                </select>
                                <input type="hidden" name="opd_id" id="opd_id">
                             </div>
                             <div class="col-lg-2">
                               <select class="form-control selectpicker" name="service_name" id="service_name" data-live-search="true">
                                  <option value="" selected="" disabled="">Select Service</option>
                                </select>
                             </div>
                             <div class="col-lg-2" style="font-size: 20px">
                              <input type="checkbox" id="emergency" name="emergency" onchange="updateStatus()">
                              <label for="emergency">Emergency</label>
                             </div>
                             <div class="col-lg-4">
                               <input class="form-control" type="text" name="clinical_details" id="clinical_details">
                             </div>
                             <div class="col-lg-1">
                              <i class="fa-solid fa-star favourite_service" style="FONT-SIZE: 22PX;"></i>
                             </div> 

                             <div class="col-lg-1">
                              <input class="form-control" type="button" style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD" onclick="add_record()" id="add_daigno_services">
                             </div>
                          </div>
                          <div class="row" style="margin-top:20px;">
                              <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                                  <thead>
                                      <tr>
                                          <th style="border-right: 1px solid white;">Dept. Name</th>
                                          <th style="border-right: 1px solid white;">Service Name</th>
                                          <th style="border-right: 1px solid white;">Clinical Details</th>
                                          <th style="border-right: 1px solid white;">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody id="service_list">
                                  </tbody>
                              </table>
                          </div> 
                        </div>
                      </div>
                      <div class="row" style="margin: 10px 0px;">
                        <div class="col-lg-10">
                        </div>
                       
                      </div>
                      <div class="row" style="margin: 10px 0px;">
                        <div class="col-lg-10">
                        </div>
                        <button class="btn btn-primary col-lg-2" type="submit">Save</button>
                      </div>
                    </form>  
                    </div>
                </div>
            </div>
            <div class="accordion report_list">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Investigation</h3>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right" id="add_reports_btn">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row">

                        <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                              <thead>
                                  <tr>
                                      <th style="border-right: 1px solid white;">Visit Date</th>
                                      <th style="border-right: 1px solid white;">Sub Department</th>
                                      <th style="border-right: 1px solid white;">Status</th>
                                      <th style="border-right: 1px solid white;">Service Name</th>
                                      <th style="border-right: 1px solid white;">Image View</th>
                                  </tr>
                              </thead>
                              <tbody id="test_report_list">
                                
                              </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-content" id="prescription">
            <div class="accordion prescription_form">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Prescription</h3>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right" onclick="show_prescription_list()">
                                    <i class="fa fa-plus"></i> Slow List
                                </button>
                            </div>  
                        </div>
                    </div>
                    <div class="card-body">
                        <span style="font-size: 3em;">R<sub>x</sub></span>
                        <form method="post"  enctype="multipart/form-data" id="prescription_action">
                          <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12">  
                              <div class="row" style="margin: 0px;">
                                <label class="form-control col-lg-2" style="border:0px;" >Drug Name<a style="color: red">*</a></label>
                                <label class="form-control col-lg-2" style="border:0px;">Unit<a style="color: red">*</a></label>
                                <label class="form-control col-lg-2" style="border:0px;">Route<a style="color: red">*</a></label>
                                <label class="form-control col-lg-6" style="border:0px;">Frequency<a style="color: red">*</a></label>
                              </div>
                              <div class="row" style="margin: 0px;">
                                 <div class="col-lg-2">
                                     <select class="form-control selectpicker" name="drug_name" id="drug_name" data-live-search="true"> 
                                     </select>
                                    
                                 </div>
                                 <div class="col-lg-2">
                                    <select class="form-control selectpicker" name="unit" id="unit" data-live-search="true">
                                        <option value="" selected disabled>Select Unit</option>
                                        <option value="100 Ml">100 Ml</option>
                                        <option value="125 Ml">125 Ml</option>
                                        <option value="500 Ml">500 Ml</option>
                                        <option value="500 GML">500 GML</option>
                                        <option value="60 Test">60 Test</option>
                                        <option value="96 Test">96 Test</option>

                                     </select>
                                 </div>
                                 
                                 <div class="col-lg-2">
                                   <select class="form-control" name="route" id="route">
                                      <option value="" selected="" disabled="">Select Route</option>
                                      <option value="Eye Drop">Eye Drop</option>
                                        <option value="Oral">Oral</option>
                                        <option value="Rectal">Rectal</option>
                                        <option value="Intravenous">Intravenous</option>
                                        <option value="Intra-arterial">Intra-arterial</option>
                                    </select>

                                 </div>
                                 <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="M" id="M" placeholder="Morning">
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="A" id="A" placeholder="Afternoon">
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="E" id="E" placeholder="Evening">
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text" name="N" id="N" placeholder="Night">
                                        </div>
                                    </div>
                                 </div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12">  
                              <div class="row" style="margin: 0px;">
                                <label class="form-control col-lg-2" style="border:0px;" >Duration<a style="color: red">*</a></label>
                                <label class="form-control col-lg-2" style="border:0px;">Total Qnty.<a style="color: red">*</a></label>
                                <label class="form-control col-lg-2" style="border:0px;">Start Date<a style="color: red">*</a></label>
                                <label class="form-control col-lg-2" style="border:0px;">End Date<a style="color: red">*</a></label>
                                <label class="form-control col-lg-4" style="border:0px;">Instruction<a style="color: red">*</a></label>
                              </div>
                              <div class="row" style="margin: 0px;">
                                <div class="col-lg-2 input-group">
                                    <div class="input-group-append">
                                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Enter value">
                                    </div>
                                    <select class="form-control" name="duration_type" id="duration_type">
                                        <option selected="Days" value="Days">Days</option>
                                        <option value="Weeks">Weeks</option>
                                        <option value="Months">Months</option>
                                    </select>
                                </div>
                                 <div class="col-lg-2">
                                    <input class="form-control" name="total_qnty" id="total_qnty" type="text">
                                 </div>
                                 <div class="col-lg-2">
                                   <input class="form-control" type="date"  name="start_date" id="start_date">
                                 </div>
                                 <div class="col-lg-2">
                                   <input class="form-control" type="date"  name="end_date" id="end_date">
                                 </div>
                                 <div class="col-lg-4">
                                    <select class="form-control" name="instrction" id="instrction">
                                      <option value="" selected="" disabled="">Select</option>
                                      <option value="Before Lunch">Before Lunch</option>
                                        <option value="After Lunch">After Lunch</option>
                                        <option value="Before Breakfast">Before Breakfast</option>
                                        <option value="After Breakfast">After Breakfast</option>
                                        <option value="Before Dinner">Before Dinner</option>
                                        <option value="After Dinner">After Dinner</option>
                                    </select>
                                 </div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-12">  
                              <div class="row" style="margin: 0px;">
                                <label class="form-control col-lg-5" style="border:0px;" >Advice<a style="color: red">*</a></label>
                                <label class="form-control col-lg-5" style="border:0px;">Diet Remark
                              </div>
                              <div class="row" style="margin: 0px;">
                                <div class="col-lg-5">
                                  <textarea class="form-control" rows="1" name="advice" id="advice"></textarea>
                                </div>
                                <div class="col-lg-5">
                                  <textarea class="form-control" rows="1" name="diet_remark" id="diet_remark"></textarea>
                                </div>
                                <div class="col-lg-2">
                                 <button type="button" class="btn btn-primary" style=" margin-left: 5px;" onclick="add_prescription()">Add</button>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                          <div class="row" style="margin-top: 20px;">
                            <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                                <thead>
                                    <th style="border-right: 1px solid white;"></th>
                                    <th style="border-right: 1px solid white;">Drug</th>
                                    <th style="border-right: 1px solid white;">Unit</th>
                                    <th style="border-right: 1px solid white;">Route</th>
                                    <th style="border-right: 1px solid white;">Frequency</th>
                                    <th style="border-right: 1px solid white;color: reh">Duration*</th>
                                    <th style="border-right: 1px solid white;color: reh">Duration Type*</th>
                                    <th style="border-right: 1px solid white;color: reh">Total Qnty.</th>
                                    <th style="border-right: 1px solid white;">Start date/End Date</th>
                                    <th style="border-right: 1px solid white;">End Date</th>
                                    <th style="border-right: 1px solid white;">Instruction</th>
                                    <th style="border-right: 1px solid white;">Advice</th>
                                    <th style="border-right: 1px solid white;">Diet Remark</th>
                                  

                                </thead>
                                <tbody id="prescription_list">
                                </tbody>
                            </table>
                          </div>
                          <div class="row">
                            <div class="col-lg-10">
                            </div>
                            <div class="col-lg-2" style="margin-top: 20px;">
                                 <button class="btn btn-primary col-lg-12" type="submit">Submit</button>
                            </div>
                          </div>
                        </form>  
                    </div>
                </div>
            </div>
            <div class="accordion prescription_list">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Prescription List</h3>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right" onclick="show_add_prescription()">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                              <thead>
                                  <tr>
                                      <th style="border-right: 1px solid white;">Drug Name</th>
                                      <th style="border-right: 1px solid white;">Unit</th>
                                      <th style="border-right: 1px solid white;">Route</th>
                                      <th style="border-right: 1px solid white;">Morning</th>
                                      <th style="border-right: 1px solid white;">Afternoon</th>
                                      <th style="border-right: 1px solid white;">Evening</th>
                                      <th style="border-right: 1px solid white;">Night</th>
                                      <th style="border-right: 1px solid white;">Duration</th>
                                      <th style="border-right: 1px solid white;">Type</th>
                                      <th style="border-right: 1px solid white;">Total Qnty</th>
                                      <th style="border-right: 1px solid white;">Start Date</th>
                                      <th style="border-right: 1px solid white;">End Date</th>
                                      <th style="border-right: 1px solid white;">Instruction</th>
                                      <th style="border-right: 1px solid white;">Advice</th>
                                      <th style="border-right: 1px solid white;">Diet Remark</th>
                                      <th style="border-right: 1px solid white;">Status</th>
                                  </tr>
                              </thead>
                              <tbody id="patient_prescription_list">
                                
                              </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-content" id="services">
            <div class="accordion add_services">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Services</h3>
                                </a>
                            </div>
                             <div class="col-md-4">
                                <button class="btn btn-primary float-right" onclick="show_services_list()">
                                    <i class="fa fa-plus"></i> Show List
                                </button>
                            </div> 
                        </div>
                    </div>
                    <div class="card-body">
                      <form method="post"  enctype="multipart/form-data" id="other_services_form" >
                        <fieldset style="border: 1px solid black;">
                          <div class="row" style="margin: 10px 0px;" >
                            <label class="col-lg-3" for="html">Select Department</label>
                            <label class="col-lg-3" for="html">Select Service</label>
                          </div>
                          <div class="row" style="margin: 10px 0px;" > 
                            <div class="col-lg-3">
                              <select class="form-control" name="s_d_name" id="s_d_name">
                                <option value="" selected="" disabled="">Select Department</option>
                              </select>
                            </div>
                           
                            <div class="col-lg-3">
                              <select class="form-control selectpicker" name="s_service_name" id="s_service_name" data-live-search="true">
                                <option value="" selected="" disabled="">Select Services</option>
                              </select>

                            </div>
                            <input class="form-control col-lg-1" type="button" style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD" onclick="add_other_services()">
                          </div>
                          <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                            <thead style="background-color:#efeeee ">
                                <th style="border-right: 1px solid white;">Department</th>
                                <th style="border-right: 1px solid white;">Service Name</th>
                                <th style="border-right: 1px solid white;">Action</th>
                            </thead>
                            <tbody id="other_services_list">
                             
                            </tbody>
                          </table>
                        </fieldset>
                        <div class="row" style="margin: 10px 0px;">
                          <div class="col-lg-10">
                          </div>
                          <button class="btn btn-primary col-lg-2" type="submit">Add Services</button>
                        </div>
                      </form>
                    </div> 
                </div>
            </div>
            <div class="accordion services_list">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Services List</h3>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right" onclick="show_add_services()">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                              <thead>
                                  <tr>
                                      <th style="border-right: 1px solid white;">Date</th>
                                      <th style="border-right: 1px solid white;">services Name</th>
                                      <th style="border-right: 1px solid white;">Status</th>
                                  </tr>
                              </thead>
                              <tbody id="services_list">
                                
                              </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="menu-content" id="line_of_treatment">
            <div class="accordion">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Line Of Treatment</h3>
                                </a>
                            </div>  
                        </div>
                    </div>
                    <div class="card-body">
                       <div class="row">
                          <div class="col-lg-6">
                            <form method="post" enctype="multipart/form-data" id="">
                              <div class="row" style="margin: 0px;">
                                <label class="form-control col-lg-5" style="border:0px;">Select Date<a style="color: red">*</a><b class="pull-right">:</b></label>
                                <div class="col-lg-7">
                                  <input class="form-control"  type="date" name="IT_date" id="IT_date" required="">
                                  <input class="form-control"  type="hidden" name="LOT_id" id="LOT_id">
                                </div>
                              </div>
                              <div class="row" style="margin: 0px;">
                                <label class="form-control col-lg-5" style="border:0px;">Enter Task<a style="color: red">*</a><b class="pull-right">:</b></label>
                                <div class="col-lg-7">
                                  <input class="form-control" type="text" name="IT_task" id="IT_task" required="" >
                                </div>
                              </div>
                              <div class="row" style="margin: 0px;">
                                <label class="form-control col-lg-5" style="border:0px;">Enter Description<a style="color: red">*</a><b class="pull-right">:</b></label>
                                <div class="col-lg-7">
                                  <input class="form-control" type="text" name="IT_description" id="IT_description">
                                </div>
                              </div>
                              <div class="row" style="margin: 0px;">
                                <label class="form-control col-lg-5" style="border:0px;">Enter Time<a style="color: red">*</a><b class="pull-right">:</b></label>
                                <div class="col-lg-7">
                                  <input class="form-control" type="text" name="IT_time" id="IT_time" required="" >
                                </div>
                              </div>
                              <hr>
                              <div class="row" style="margin: 0px;">
                                  <button type="reset" class=" col-lg-5 btn btn-danger" >Cancel</button>
                                  <div class="col-lg-2"></div>
                                  <button type="submit" class=" col-lg-5 btn btn-primary" >Add</button>
                              </div>
                            </form>
                          </div>
                          <div class="col-lg-6">
                            <div class="table-responsive" >
                              <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
                                <tfoot>
                                  <tr>
                                    <th nowrap="nowrap" ></th>
                                    <th nowrap="nowrap" style="width: fit-content !important;"></th>
                                    <th nowrap="nowrap" style="width: fit-content !important;"></th>
                                    <th nowrap="nowrap" ></th>
                                    <th nowrap="nowrap" ></th>
                                    <th nowrap="nowrap" ></th>
                                    <th nowrap="nowrap" ></th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                       </div>
                    </div> 
                </div>
            </div>
        </div>-->
        <div class="menu-content" id="discharge_summary">
            <div class="accordion">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Discharge Summary</h3>
                                </a>
                            </div>

                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary" onclick="generate_discharge_report()">
                                    Print
                                </button>
                            </div>  
                        </div>

                        


                    </div>
                    <div class="card-body">
                      <div class="row">
                      </div>
                      <form method="post" enctype="multipart/form-data" id="discharge_action">

                        <div class="row">
                          <div class="col-lg-3">
                              <div class="form-group row">
                                  <label for="datetimepicker" class="col-sm-3 col-form-label">Advice Date:</label>
                                  <div class="col-sm-9">
                                      <input type="datetime-local" class="form-control" id="advice_date" name="advice_date">
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-3">
                              <div class="form-group row">
                                  <label for="Discharge" class="col-sm-6 col-form-label">Condition On Discharge</label>
                                  <div class="col-sm-6">
                                      <select class="form-control border border-secondary border-2" name="D_condition_on_discharge"
                                          id="disc_condition">
                                      <option selected="" disabled="">Select Condition</option>
                                      <option value="Recover">Recover</option>
                                      <option value="Not-Recover">Not-Recover</option>
                                      
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-check form-check-inline">
                                  

                                  <input type="radio" id="Expired" name="discharge_type" value="Expired">
                                  <label for="Expired">Expired</label>
                              </div>
                              <div class="form-check form-check-inline">
                                  
                                  <input type="radio" id="Discharge" name="discharge_type" value="Discharge">
                                  <label for="Discharge">Discharge</label> 
                              </div>
                              <div class="form-check form-check-inline">
                                  
                                  <input type="radio" id="Physical_Discharge" name="discharge_type" value="Physical Discharge">
                                  <label for="Physical_Discharge">Physical Discharge</label>
                              </div>
                              <div class="form-check form-check-inline">
                                  
                                  <input type="radio" id="Physical_Discharge" name="discharge_type" value="Cancel Discharge">
                                  <label for="Physical_Discharge">Cancel Discharge</label>
                              </div>

                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group row">
                                    <label for="datetimepicker" class="col-sm-3 col-form-label">Discharge Date:</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" class="form-control" id="datetimepicker" name="datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group row">
                                    <label for="floor_no" class="col-sm-6 col-form-label">Approval Doctor</label>
                                    <div class="col-sm-6">
                                        <select class="form-control border border-secondary border-2" name="h_transfer"
                                            id="h_transfer"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checklistModal">
                                    Discharge Checklist
                                </button>
                            </div>
                            <fieldset>
                                <legend>Provisional Diagnosis (ICD 10 CM)</legend>
                                
                                    <label for="searchBox">Search Diagnosis</label>
                                    <input type="text" id="searchBox" name="searchBox" placeholder="By name or ICD Code">
                                    <button type="submit">&#128269;</button>
                                    <table id="provisionalDiagnosisTable">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Add your table rows here dynamically based on search results -->
                                            <!-- <tr>
                                                <td>001</td>
                                                <td>Sample Description 1</td>
                                                <td>Type A</td>
                                            </tr>
                                            <tr>
                                                <td>002</td>
                                                <td>Sample Description 2</td>
                                                <td>Type B</td>
                                            </tr> -->
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                
                            </fieldset>

                            <fieldset>
                                <legend>Final Diagnosis (ICD 10 CM)</legend>
                                
                                    <label for="searchBox">Search Diagnosis</label>
                                    <input type="text" id="searchBox" name="searchBox" placeholder="By name or ICD Code">
                                    <button type="submit">&#128269;</button>
                                    <table id="finalDiagnosisTable">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Add your table rows here dynamically based on search results -->
                                            <!-- <tr>
                                                <td>001</td>
                                                <td>Sample Description 1</td>
                                                <td>Type A</td>
                                            </tr>
                                            <tr>
                                                <td>002</td>
                                                <td>Sample Description 2</td>
                                                <td>Type B</td>
                                            </tr> -->
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="finalDiagnosis"><b>Final Diagnosis:</b></label>
                                <div>
                                    <textarea id="finalDiagnosis" name="finalDiagnosis" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <label for="surgeryPerformed"><b>Surgery/Proc Performed:</b></label>
                                <div>
                                    <textarea id="surgeryPerformed" name="surgeryPerformed" rows="3" cols="96"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="finalDiagnosis"><b>Chief Complaints:</b></label>
                                <div>
                                    <textarea id="finalDiagnosis" name="chief_complaints" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="Physiotherapy"><b>Physiotherapy:</b></label>
                                <div>
                                    <textarea id="Physiotherapy" name="Physiotherapy" rows="3" cols="96"></textarea>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="finalDiagnosis"><b>Past History:</b></label>
                                <div>
                                    <textarea id="finalDiagnosis" name="Past_History" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <label for="surgeryPerformed"><b>Personal History:</b></label>
                                <div>
                                    <textarea id="surgeryPerformed" name="Personal_History" rows="3" cols="96"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="FamilyHistory"><b>Family History:</b></label>
                                <div>
                                    <textarea id="FamilyHistory" name="Family_History" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <label for="ExaminationFindings"><b>Examination Findings:</b></label>
                                <div>
                                    <textarea id="ExaminationFindings" name="Examination_Findings" rows="3" cols="96"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="Investigation"><b>Investigation:</b></label>
                                <div>
                                    <textarea id="Investigation" name="Investigation" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <label for="FinalDiagnosis"><b>Final Diagnosis:</b></label>
                                <div>
                                    <textarea id="FinalDiagnosis" name="FinalDiagnosis" rows="3" cols="96"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="Treatment/Surgery"><b>Treatment/Surgery:</b></label>
                                <div>
                                    <textarea id="treatmentSurgery1" name="treatmentSurgery1" rows="3" cols="96"></textarea>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <label for="CourseInHospital"><b>Course In Hospital:</b></label>
                                <div>
                                    <textarea id="CourseInHospital" name="CourseInHospital" rows="3" cols="96"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="TreatmentOnDischarge"><b>Treatment On Discharge:</b></label>
                                <div>
                                    <textarea id="TreatmentOnDischarge" name="TreatmentOnDischarge" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="surgeryPerformed"><b>Advice On Discharge:</b></label>
                                <div>
                                    <textarea id="surgeryPerformed" name="Advice_On_Discharge" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="Management"><b>Management:</b></label>
                                <div>
                                    <textarea id="Management" name="Management" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="Diet"><b>Diet:</b></label>
                                <div>
                                    <textarea id="Diet" name="Diet" rows="3" cols="96"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <fieldset>
                            <legend>Prescription</legend>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" id="searchBox" name="searchBox" placeholder="Type Generic Name Search">
                                    <button type="">&#128269;</button>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" id="searchBox" name="searchBox"
                                        placeholder="Type Fevorite Generic Name To Search">
                                    <button type="">&#11088;</button>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label>Templates:</label>
                                        <select class="form-control border border-secondary border-2" style=width:30px; " name="
                                            template_name" id="template_name"></select>
                                        <div class="input-group-append">
                                            <button type="" style="color:blue;">Fill</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="prescriptionTable">
                                <thead>
                                    <tr>
                                        <th>Drug</th>
                                        <th>Route</th>
                                        <th>Frequency</th>
                                        <th>Duration</th>
                                        <th>Total Qty.</th>
                                        <th>Start/End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add your table rows here dynamically based on search results -->
                                    <!-- <tr>
                                            <td>001</td>
                                            <td>Sample Description 1</td>
                                            <td>Type A</td>
                                        </tr>
                                        <tr>
                                            <td>002</td>
                                            <td>Sample Description 2</td>
                                            <td>Type B</td>
                                        </tr> -->
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>  
                        </fieldset>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="instructionsLanguage"><b>Instructions Printing Language:</b></label>
                            </div>
                            <label for="englishRadio"><b>English</b></label>
                            <div class="col-lg-2">
                                <input type="radio" id="englishRadio" name="language" value="english">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 custom-space">
                                <label><b>Follow Up Date:</b></label>
                                <div>
                                    <input class="form-control" type="date"  name="follow_up_date">
                                </div>
                            </div>
                            <div class="col-lg-3 custom-space">
                                <label for="FollowUp"><b>Follow Up Advice:</b></label>
                                <div>
                                    <textarea id="follow_up" name="follow_up_advice" class="form-control border border-secondary border-2" rows="2"
                                        cols="100"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 custom-space">
                                <label for="SpecialRemark"><b>Special Remark:</b></label>
                                <div>
                                    <textarea id="SpecialRemark" name="specialremark" class="form-control border border-secondary border-2"
                                        rows="2" cols="100"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="DeschargeDetails"><b>Discharge Details:</b></label>
                                <div>
                                    <textarea id="discharge_details" name="discharge_details"
                                        class="form-control border border-secondary border-2" rows="2" cols="100"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="DeschargeDetails"><b>When To Seak Advice:</b></label>
                                <div>
                                    <textarea id="discharge_details" name="seak_advice"
                                        class="form-control border border-secondary border-2" rows="2" cols="100"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="margin: 0px;">
                            <div class="col-lg-10"></div>
                            <button type="submit" class=" col-lg-2 btn btn-primary" >Save</button>
                        </div>
                      </form> 
                    </div> 
                </div>
            </div>
        </div>
        <div class="menu-content" id="consumable">
            <div class="accordion add_consumable_form">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Consumable</h3>
                                </a>
                            </div> 
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right"   onclick="show_consumable_list()">
                                    <i class="fa fa-plus"></i> Show List
                                </button>
                            </div> 
                        </div>
                    </div>
                    <div class="card-body">
                      <form method="post"  enctype="multipart/form-data" id="consumable_form">
                        <div class="row">
                          <div class="col-lg-12">  
                            <div class="row" style="margin: 0px;">
                              <label class="form-control col-lg-3" style="border:0px;" >Select Consumable<a style="color: red">*</a></label>
                              <label class="form-control col-lg-3" style="border:0px;" >Select Unit<a style="color: red">*</a></label>
                              <label class="form-control col-lg-3" style="border:0px;">Enter Quantity<a style="color: red">*</a></label>
                            </div>
                            <div class="row" style="margin: 0px;">
                               <div class="col-lg-3">
                                  <select class="form-control" name="product_id" id="product_id">
                                  </select>
                               </div>
                               <div class="col-lg-3">
                                  <select class="form-control" name="product_unit" id="product_unit" disabled>
                                    <option selected="" disabled="">Select Unit</option>
                                  </select>
                               </div>
                               <div class="col-lg-3">
                                  <input class="form-control" type="text" name="product_qnty" id="product_qnty">
                               </div>
                               <div class="col-lg-3">
                                <input class="form-control" type="button" style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD" onclick="add_consumable()">
                               </div>
                            </div>
                                <div class="row" style="margin-top:20px;">
                                <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                                    <thead>
                                        <tr>
                                            <th style="border-right: 1px solid white;">Product Name</th>
                                            <th style="border-right: 1px solid white;">Unit</th>
                                            <th style="border-right: 1px solid white;">Quantities</th>
                                            <th style="border-right: 1px solid white;">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="product_list">
                                    </tbody>
                                </table>
                            </div> 
                          </div>
                        </div>
                        <div class="row" style="margin: 10px 0px;">
                          <div class="col-lg-10">
                          </div>
                        </div>
                        <div class="row" style="margin: 10px 0px;">
                          <div class="col-lg-10">
                          </div>
                          <button class="btn btn-primary col-lg-2" type="submit">Submit</button>
                        </div>
                      </form>  
                      </div>
                    </div> 
                </div>
            
            <div class="accordion consumable_list">
               <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Consumables List</h3>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right" onclick="show_add_consumable()">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                              <thead>
                                  <tr>
                                      <th style="border-right: 1px solid white;">Date</th>
                                      <th style="border-right: 1px solid white;">Consumable Name</th>
                                      <th style="border-right: 1px solid white;">Status</th>
                                  </tr>
                              </thead>
                              <tbody id="consumable_list">
                                
                              </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-content" id="opration_theatre">
            <div class="accordion">
               <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Operation Theater</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="ibox-title"  style="padding-top: 10px !important;">
                            <h3 class="record_form_title">New Schedule</h3>
                          </div>
                          <div class="ibox-content">
                            <form method="post"  enctype="multipart/form-data" id="check_OT_by_time_form">
                              <div class="row">
                                <label class="form-control col-lg-2" style="border:0px;">Select Operation Theatre</label>
                                <label class="form-control col-lg-2" style="border:0px;">Select Date</label>
                                <label class="form-control col-lg-2" style="border:0px;">From Time</label>
                                <label class="form-control col-lg-2" style="border:0px;">To Time</label>
                              </div>
                              <div class="row">
                                <div class="col-lg-2">
                                  <select class="form-control" name="ot_room" id="ot_room">
                                  </select>
                                </div>
                                <div class="col-lg-2">
                                  <input class="form-control" type="date" id="ot_date" name="ot_date">
                                </div>
                                <div class="col-lg-2">
                                  <input class="form-control" type="time" id="from_time" name="from_time">
                                </div>
                                <div class="col-lg-2">
                                  <input class="form-control" type="time" id="to_time" name="to_time">
                                </div>
                                <div class="col-lg-2">
                                   <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Check</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                      <div class="ibox-title "  style="padding-top: 10px !important;">
                        <h3 class="ot_record_form_title">Booked OT List</h3>
                      </div>
                      <div class="ibox-content">
                        <div id='OT_form'style="margin-top:10px;">
                          <form method="post"  enctype="multipart/form-data" id="OT_book_action">
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Select Surgery Name<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                              <div class="col-lg-10">
                                <input class="form-control" style="width:100%" type="text"  name="surgery_name" id="surgery_name"> 
                                <input class="form-control"  type="hidden"  name="ot_id" id="ot_id"> 
                                <input class="form-control"  type="hidden"  name="schedule_start_time" id="schedule_start_time"> 
                                <input class="form-control"  type="hidden"  name="schedule_end_time" id="schedule_end_time"> 
                              </div>
                            </div>
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Primary Surgeon<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control selectpicker" id="primary_surgeon" name="primary_surgeon" data-live-search="true">
                                  <option value="" selected="" disabled="">Select Primary Surgeon</option>
                                </select>
                              </div>
                              <div class="col-lg-2"><label style="width:100%">Unit<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control">
                                  <option value="" selected="" disabled="">Select Unit</option>
                                </select>
                              </div>
                            </div>
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Secondary Surgeon<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control selectpicker" id="secondary_surgeon" name="secondary_surgeon" data-live-search="true">
                                  <option value="" selected="" disabled="">Select Secondary Surgeon</option>
                                </select>
                              </div>
                            </div> 
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Primary Nurse<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control" id="primary_nurse" name="primary_nurse">
                                  <option value="" selected="" disabled="">Select Primary Nurse</option>
                                  <option value="1">Sakshi Chavan</option>
                                  <option value="2">Hema Jadhav</option>
                                  <option value="3">Sneha Patil</option>
                                </select>
                              </div>
                            </div> 
                            
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Equipment<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control" style="width:100%" type="text"  name="equipment" id="equipment">
                                </select>
                              </div>
                            </div> 
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Operation Type<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control" name="operation_type" id="operation_type">
                                    <option value="" selected="" disabled="">Select Operation Type</option>
                                    <option value="Major">Major</option>
                                    <option value="Minor">Minor</option>
                                    <option value="Super Major">Super Majors</option>
                                    <option value="General">General</option>
                                </select>
                              </div>
                            </div>
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Anesthesia Status<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <input type="radio" id="Yes" name="anesthesia_status"  value="Yes">
                                <label for="html">Yes</label>
                                <input type="radio" id="No" name="anesthesia_status" value="No">
                                <label for="css">No</label>
                              </div>
                            </div>
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Anesthetist<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <input class="form-control" style="width:100%" type="text"  name="anesthetist" id="anesthetist">
                              </div>
                            </div>
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Anesthesia Type<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control" name="anesthesia_type" id="anesthesia_type">
                                  <option value="" selected="" disabled="">Select Anesthesia Type</option>
                                  <option value="Propofol">Propofol</option>
                                  <option value="Halothane">Halothane</option>
                                  <option value="Fentanyl">Fentanyl</option>
                                </select>
                               </div>
                            </div> 
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">On Call Doctor<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <select class="form-control" id="On_call_doctor" name="On_call_doctor">
                                  <option value="" selected="" disabled="">Select On Call Doctor</option>
                                </select>
                              </div>
                            </div>  
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Remark<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <input class="form-control" style="width:100%" type="text"  name="remark" id="remark">
                              </div>
                            </div>  
                            <div class="row" style="padding:5px;">
                              <div class="col-lg-2"><label style="width:100%">Diagnosis<i style="float:right;">:</i></label></div>
                              <div class="col-lg-4">
                                <textarea id="diagnosis" name="diagnosis" rows="2" cols="70">
                                </textarea>
                              </div>
                            </div>
                            <div id="after_ot_form">
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Patient_ In Time<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="datetime-local"  name="patient_in_timestamp" id="patient_in_timestamp">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Antibiotic Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="datetime-local"  name="antibiotic_timestamp" id="antibiotic_timestamp">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Incision Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="datetime-local"  name="incision_timestamp" id="incision_timestamp">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Antibiotic Used<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="text"  name="antibiotic_used" id="antibiotic_used">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Patient Out Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="datetime-local"  name="patient_out_timestamp" id="patient_out_timestamp">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Cleaning Start Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="datetime-local"  name="cleaning_start_timestamp" id="cleaning_start_timestamp">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Cleaning End Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="datetime-local"  name="cleaning_end_timestamp" id="cleaning_end_timestamp">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Implant Used<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="text"  name="implant_used" id="implant_used">
                                </div>
                              </div>
                              <div class="row" style="padding:5px;">
                                <div class="col-lg-2"><label style="width:100%">Implant Type<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                                <div class="col-lg-4">
                                  <input class="form-control" style="width:100%" type="text"  name="implant_type" id="implant_type">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Submit</button>
                              <button type="button" class="btn btn-default pull-left close_ot_model">Close</button>
                            </div>
                          </form>
                        </div>
                        <div class="table-responsive all_ot_list" >
                          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
                            <tfoot>
                              <tr>
                                <th nowrap="nowrap" ></th>
                                <th nowrap="nowrap" style="width: fit-content !important;">UHID</th>
                                <th nowrap="nowrap" style="width: fit-content !important;">Room Name</th>
                                <th nowrap="nowrap" style="width: fit-content !important;">Operation Name</th>
                                <th nowrap="nowrap" style="width: fit-content !important;">Operation Type</th>
                                <th nowrap="nowrap" style="width: fit-content !important;">Primary Surgent</th>
                                <th nowrap="nowrap" style="width: fit-content !important;">Schedule Date</th>
                                <th nowrap="nowrap" style="width: fit-content !important;">From Time</th>
                                <th nowrap="nowrap" style="width: fit-content !important;">To Time</th>
                                <th nowrap="nowrap" ></th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-content" id="bed_transfer">    
            <div class="accordion consumable_list">
               <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Bed Transfer</h3>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right" id="transfer_bed_btn">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                              <thead>
                                  <tr>
                                      <th style="border-right: 1px solid white;">Bed No</th>
                                      <th style="border-right: 1px solid white;">Start Date</th>
                                      <th style="border-right: 1px solid white;">End Date</th>
                                  </tr>
                              </thead>
                              <tbody id="bed_list">
                                
                              </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-content" id="patient_refer">    
            <div class="accordion">
               <div class="card mb-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="card-title">
                                    <h3 style="margin: 0px;">Patient Refer</h3>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                      <form method="post"  enctype="multipart/form-data" id="patient_refer_form">
                        <div class="row">
                          <div class="col-lg-12">  
                            <div class="row" style="margin: 0px;">
                              <label class="form-control col-lg-3" style="border:0px;" >Select Department<a style="color: red">*</a></label>
                              <label class="form-control col-lg-3" style="border:0px;">Select Doctor<a style="color: red">*</a></label>
                              <label class="form-control col-lg-3" style="border:0px;">Enter Date and Time<a style="color: red">*</a></label>
                            </div>
                            <div class="row" style="margin: 0px;">
                               <div class="col-lg-3">
                                  <select class="form-control" name="PR_d_name" id="PR_d_name">
                                    <option value="" selected="" disabled="">Select Department</option>
                                  </select>
                                  <input type="hidden" name="opd_id" id="opd_id">
                               </div>
                               <div class="col-lg-3">
                                  <select class="form-control" name="PR_user_id" id="PR_user_id">
                                    <option value="" selected="" disabled="">Select Doctor</option>
                                  </select>
                               </div>
                               <div class="col-lg-3">
                                <input class="form-control" type="datetime-local" id="PR_appointment_slot" name="PR_appointment_slot"  required="" oninput="this.value = this.value.toUpperCase()">
                               </div>
                               <div class="col-lg-3">
                                <button class="btn btn-primary col-lg-3" type="submit">Save</button>
                               </div>
                            </div>
                            
                          </div>
                        </div>
                      </form>
                      <br>
                      <div class="row">
                        <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                              <thead>
                                  <tr>
                                      <th style="border-right: 1px solid white;">Department Name</th>
                                      <th style="border-right: 1px solid white;">Doctor Name</th>
                                      <th style="border-right: 1px solid white;">Date Time</th>
                                  </tr>
                              </thead>
                              <tbody id="patient_refer_list">
                                
                              </tbody>
                        </table>
                      </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-content" id="concent_form">    
            <div class="accordion">
               <div class="card mb-0">
                    <div class="card-body">
                      <form method="post"  enctype="multipart/form-data" id="patient_refer_form">
                        <div class="row">
                          <div class="col-lg-12">  
                            <div class="row" style="margin: 0px;">
                               <label class="form-control col-lg-2" style="border:0px;" >Select Consent Form<a style="color: red">*</a></label>
                               <div class="col-lg-3">
                                  <select class="form-control" name="form_id" id="form_id">
                                    <option value="" selected="" disabled="">Select Concent Form</option>
                                  </select>
                               </div>
                               <div class="col-lg-1"></div>
                               <!-- <div class="col-lg-3">
                                <button type="button" style="float: right;margin-right:50px;display: none;width: 100%;" class="btn btn-success download_concent_form" content_url=""  ><i class="fa fa-download"></i>&nbsp;&nbsp;&nbsp;Download Form</button>
                              </div> -->
                               <div class="col-lg-3">
                                 <button type="button" style="float: right;margin-right:50px;display: none;width: 100%;" class="btn btn-primary print_concent_form" content_url=""><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Print Form</button>
                               </div>
                            </div>
                            <div class="row" style="border: 1px solid lightgray;">
                              <div class="col-lg-12" id="form_data" style="height: 700px;overflow-y: auto;padding: 0px;"></div>
                            </div>
                          </div>
                        </div>
                      </form>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-content" id="nutrition_tool">    
            <div class="accordion">
               <div class="card mb-0">
                    <div class="card-body">
                      <form method="post"  enctype="multipart/form-data" id="nutrition_tool_form">
                        <fieldset style="border: 1px solid black">
                          <div class="row" style="margin:10px 0px;padding-left: 5px">
                            <h3><u>Antenatal Nutrition Assessment Form</u></h3>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-3">Initial Weight<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <label class="control-label col-lg-3">50 Kg</label>

                                <label class="control-label col-lg-3">Current Weight<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" name="current_weight">
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-3">Initial BMI<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <label class="control-label col-lg-3">223</label>

                                <label class="control-label col-lg-3">Current BMI<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" name="current_weight">
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-3">Height<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <label class="control-label col-lg-3">223</label>
                          </div>
                        </fieldset>
                        <ul>
                          <li>PRE NATAL VISIT – 1 ST /2 ND /3 RD / MORE THAN 3 TIMES</li>
                          <li>FAMILY HISTORY OF - DIABETIS/HYPERTENSION/CARDIAC PROBLEMS/NO ANY</li>
                          <li>CO-MORBIDITY – DIABETIS/HTN/CARDIAC PROBLEM/OTHER DISEASE/NO ANY</li>
                          <li>FOOD ALLERY IF ANY – YES/NO</li>
                          <li>FOOD HABIT – VEG/NON-VEG/ OVA VEG</li>`
                        </ul>
                        <fieldset style="border: 1px solid black">
  
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-3">Initial Weight<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <label class="control-label col-lg-3">50 Kg</label>

                                <label class="control-label col-lg-3">Current Weight<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" name="current_weight">
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-3">Initial BMI<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <label class="control-label col-lg-3">223</label>

                                <label class="control-label col-lg-3">Current BMI<b class="pull-right">:</b> </label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" name="current_weight">
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-3">Height<a style="color: red">*</a> <b class="pull-right">:</b> </label>
                                <label class="control-label col-lg-3">223</label>
                          </div>
                        </fieldset>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-2" style="border:0px;" >1. ANEMIA</label>
                          <div class="col-lg-2">
                            <input type="radio" id="Yes" name="anemia" value="Yes">
                            <label for="html">Yes</label>
                            <input type="radio" id="No" name="anemia" value="No">
                            <label for="css">No</label>
                          </div>
                          <label class="control-label col-lg-2" style="border:0px;" >Hb%-</label>
                          <div class="col-lg-6">
                              <input class="form-control" type="text" name="Hb" id="Hb">
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >2. HISTORY OF WEIGHT GAIN OR WEIGHT LOSS IN PAST 6 MONTHS</label>
                          <div class="col-lg-6">
                              <input class="form-control" type="text" name="history_weight" id="history_weight">
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >4. GI SYMPTOMS –</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="NAUSEA" name="GI_SYMPTOMS" value="NAUSEA">
                              <label for="vehicle1"> NAUSEA</label>
                              <input type="checkbox" id="VOMMITING" name="GI_SYMPTOMS" value="VOMMITING">
                              <label for="vehicle2"> VOMMITING</label>
                              <input type="checkbox" id="ABDOMINAL_DISTENSTION" name="GI_SYMPTOMS" value="ABDOMINAL_DISTENSTION">
                              <label for="vehicle3"> ABDOMINAL DISTENSTION</label>
                              <input type="checkbox" id="DIARHHOEA" name="GI_SYMPTOMS" value="DIARHHOEA">
                              <label for="vehicle3"> DIARHHOEA</label>
                              
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >4. FREQUENCY OF MEAL –</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="BREAKFAST" name="FREQUENCY_OF_MEAL" value="BREAKFAST">
                              <label for="vehicle1"> BREAKFAST</label>
                              <input type="checkbox" id="SNACKS" name="FREQUENCY_OF_MEAL" value="SNACKS">
                              <label for="vehicle2"> SNACKS</label>
                              <input type="checkbox" id="LUNCH" name="FREQUENCY_OF_MEAL" value="LUNCH">
                              <label for="vehicle3"> LUNCH</label>
                              <input type="checkbox" id="SNACKS" name="FREQUENCY_OF_MEAL" value="SNACKS">
                              <label for="vehicle3"> SNACKS</label>
                              <input type="checkbox" id="vehicle3" name="FREQUENCY_OF_MEAL" value="I_have a boat">
                              <label for="vehicle3"> I have a boat</label>
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >4. MILK PRODUCT –</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="MORNING" name="MILK_PRODUCT" value="MORNING">
                              <label for="MORNING">MORNING</label>
                              <input type="checkbox" id="BREAKFAST" name="MILK_PRODUCT" value="BREAKFAST">
                              <label for="BREAKFAST">BREAKFAST</label>
                              <input type="checkbox" id="LUNCH" name="MILK_PRODUCT" value="LUNCH">
                              <label for="LUNCH">LUNCH</label>
                              <input type="checkbox" id="DINNER" name="MILK_PRODUCT" value="DINNER">
                              <label for="DINNER">DINNER</label>
                              <input type="checkbox" id="NEVER" name="MILK_PRODUCT" value="NEVER">
                              <label for="NEVER">NEVER</label>
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >4. MILK PRODUCT –</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="MORNING" name="FRUITS_SALAD_SPROUT" value="MORNING">
                              <label for="MORNING">MORNING</label>
                              <input type="checkbox" id="BREAKFAST" name="FRUITS_SALAD_SPROUT" value="BREAKFAST">
                              <label for="BREAKFAST">BREAKFAST</label>
                              <input type="checkbox" id="LUNCH" name="FRUITS_SALAD_SPROUT" value="LUNCH">
                              <label for="LUNCH">LUNCH</label>
                              <input type="checkbox" id="DINNER" name="FRUITS_SALAD_SPROUT" value="DINNER">
                              <label for="DINNER">DINNER</label>
                              <input type="checkbox" id="NEVER" name="FRUITS_SALAD_SPROUT" value="NEVER">
                              <label for="NEVER">NEVER</label>
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >4. VEGETABLE</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="BREAKFAST" name="VEGETABLE" value="BREAKFAST">
                              <label for="BREAKFAST">BREAKFAST</label>
                              <input type="checkbox" id="LUNCH" name="VEGETABLE" value="LUNCH">
                              <label for="LUNCH">LUNCH</label>
                              <input type="checkbox" id="DINNER" name="VEGETABLE" value="DINNER">
                              <label for="DINNER">DINNER</label>
                              <input type="checkbox" id="NEVER" name="VEGETABLE" value="NEVER">
                              <label for="NEVER">NEVER</label>
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >4. OIL FRIED ITEM/FAST FOOD/OUTSIDE FOOD</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="YES" name="OIL_FRIED_ITEM_FAST_FOOD_OUTSIDE_FOOD" value="YES">
                              <label for="YES">YES</label>
                              <input type="checkbox" id="NO" name="OIL_FRIED_ITEM_FAST_FOOD_OUTSIDE_FOOD" value="NO">
                              <label for="NO">NO</label>
                              <input type="checkbox" id="SOMETIMES" name="OIL_FRIED_ITEM_FAST_FOOD_OUTSIDE_FOOD" value="SOMETIMES">
                              <label for="SOMETIMES">SOMETIMES</label>
                             
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >4. FOOD SUPPLEMENT</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="PROTEIN" name="FOOD_SUPPLEMENT" value="PROTEIN">
                              <label for="YES">PROTEIN</label>
                              <input type="checkbox" id="FOLIC" name="FOOD_SUPPLEMENT" value="FOLIC">
                              <label for="NO">FOLIC</label>
                              <input type="checkbox" id="ACID" name="FOOD_SUPPLEMENT" value="ACID">
                              <label for="SOMETIMES">ACID</label>
                              <input type="checkbox" id="IRON" name="FOOD_SUPPLEMENT" value="IRON">
                              <label for="SOMETIMES">IRON</label>
                              <input type="checkbox" id="CALCIUM" name="FOOD_SUPPLEMENT" value="CALCIUM">
                              <label for="SOMETIMES">CALCIUM</label>
                              <input type="checkbox" id="MULTIVITAMIN" name="FOOD_SUPPLEMENT" value="MULTIVITAMIN">
                              <label for="SOMETIMES">MULTIVITAMIN</label>
                              <input type="checkbox" id="OMEGA_3" name="FOOD_SUPPLEMENT" value="OMEGA_3">
                              <label for="SOMETIMES">OMEGA 3</label>

                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >NUTRITIONAL STATUS</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="GOOD" name="NUTRITIONAL_STATUS" value="GOOD">
                              <label for="YES">GOOD</label>
                              <input type="checkbox" id="POOR" name="NUTRITIONAL_STATUS" value="POOR">
                              <label for="POOR">POOR</label>
                          </div>  
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6" style="border:0px;" >NUTRITION INTERVENTION REQUIRED</label>
                          <div class="col-lg-6">
                              <input type="checkbox" id="GOOD" name="NUTRITION_INTERVENTION_REQUIRED" value="Yes">
                              <label for="YES">GOOD</label>
                              <input type="checkbox" id="POOR" name="NUTRITION_INTERVENTION_REQUIRED" value="No">
                              <label for="POOR">POOR</label>
                          </div>  
                        </div>
                        
                        <fieldset style="border: 1px solid black">
  
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-6">Is the BMI of patient&lt; 20.5 kg/m 2</label>
                                <div class="col-lg-6">
                                    <input type="checkbox" id="Yes" name="BMI" value="Yes">
                                    <label for="YES">Yes</label>
                                    <input type="checkbox" id="No" name="BMI" value="No">
                                    <label for="POOR">No</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-6">Did the patient lose weight in the past 3 months? <b class="pull-right">:</b> </label>
                                <div class="col-lg-6">
                                    <input type="checkbox" id="Yes" name="lose_weight" value="Yes">
                                    <label for="YES">Yes</label>
                                    <input type="checkbox" id="No" name="lose_weight" value="No">
                                    <label for="No">No</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-6">Was the patient’s food intake reduced in the past week?</label>

                                <div class="col-lg-6">
                                    <input type="checkbox" id="Yes" name="food_intake_reduced" value="Yes">
                                    <label for="YES">Yes</label>
                                    <input type="checkbox" id="No" name="food_intake_reduced" value="No">
                                    <label for="No">No</label>
                                </div>  
                          </div>
                           <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-6">Is the patient critically ill?</label>

                                <div class="col-lg-6">
                                    <input type="checkbox" id="Yes" name="patient_critically" value="Yes">
                                    <label for="YES">Yes</label>
                                    <input type="checkbox" id="No" name="patient_critically" value="No">
                                    <label for="No">No</label>
                                </div>  
                          </div>
                        </fieldset>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <h3>Nutrition Screening [Inpatients]</h3>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">

                          <label class="control-label col-lg-4">None</label>
                          <label class="control-label col-lg-2">0</label>
                          <label class="control-label col-lg-4">None</label>
                          <label class="control-label col-lg-2">0</label>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">Mild
                            Weight loss &gt;5% in 3 months
                            OR
                            50–75% of the normal food intake in the last
                            week
                          </label>
                          <label class="control-label col-lg-2">1</label>
                          <label class="control-label col-lg-4">Mild stress metabolism
                            Patient is mobile
                            Increased protein requirement can be covered with
                            oral nutrition
                            Hip fracture, chronic disease especially with
                            complications e.g., liver cirrhosis, COPD, diabetes,
                            cancer, chronic hemodialysis</label>
                          <label class="control-label col-lg-2">1</label>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">
                            Moderate
                            Weight loss &gt;5% in 2 months
                            OR
                            BMI 18.5–20.5 kg/m 2  AND reduced general
                            condition
                            OR
                            25–50% of the normal food intake in the last
                            week
                          </label>
                          <label class="control-label col-lg-2">2</label>
                          <label class="control-label col-lg-4">
                            Moderate stress metabolism
                            Patient is bedridden due to illness
                            Highly increased protein requirement, may be
                            covered with ONS
                            Stroke, hematologic cancer, severe pneumonia,
                            extended abdominal surgery
                          </label>
                          <label class="control-label col-lg-2">2</label>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">
                           Severe
                            Weight loss &gt;5% in 1 month
                            OR
                            BMI &lt;18.5 kg/m 2  AND reduced general
                            condition
                            OR
                            0–25% of the normal food intake in the last
                            week
                          </label>
                          <label class="control-label col-lg-2">3</label>
                          <label class="control-label col-lg-4">
                            Severe stress metabolism
                            Patient is critically ill (intensive care unit)
                            Very strongly increased protein requirement can
                            only be achieved with (par)enteral nutrition
                            APACHE-II &gt;10, bone marrow transplantation,
                            head traumas
                          </label>
                          <label class="control-label col-lg-2">3</label>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6">
                           Total(A)
                          </label>
                          <
                          <label class="control-label col-lg-6">
                            TOTAL (B)
                          </label>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-6">
                            Age < 70 Year : 0pt<br>> 70 yaers : 1pt 
                                

                          </label>
                          
                          <label class="control-label col-lg-6">
                            TOTAL (B)
                          </label>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <h3>The Mini Nutritional Assessment SF.[Geriatric patients]</h3>
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">Mild
                            Screening<br>
                            A. Has the food intake declined over the past 3 months due to loss of appetite, digestive
                            problems, chewing o swallowing difficulties
                            O = severe loss of appetite<br>
                            1 = moderate loss of appetite<br>
                            2 = no loss of appetite<br>
                          </label>
                          <div class="col-lg-2">
                              <input type="text" id="Yes" name="digestive_problems"> 
                          </div>
                          <label class="control-label col-lg-4">Mild
                            B. Weight loss during last 3 months<br>
                            0 = weight loss more than 3 kg (6.6 lbs)<br>
                            1 = does not Know<br>
                            2 = weight loss between 1 &amp; 3 kg (2.2 &amp; 6.6 lbs)<br>
                            3 = no weight loss<br>
                          </label>
                          <div class="col-lg-2">
                              <input type="text" id="Yes" name="weight_loss"> 
                          </div>     
                          
                        </div>
                        
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">Mild
                            C. Mobility<br>
                            0 = bed or chair bound<br>
                            1 = able to get out of bed/chair but does not go out<br>
                            2 = goes out<br>
                          </label>
                          <div class="col-lg-2">
                              <input type="text" id="Yes" name="mobility"> 
                          </div>
                          <label class="control-label col-lg-4">Mild
                            D. Has suffered psychological stress or acute disease in the past 3 months<br>
                            0 = yes<br>
                            2 = no<br>
                          </label> 
                          <div class="col-lg-2">
                              <input type="text" id="Yes" name="mobility"> 
                          </div>    
                        </div>
                        
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">Mild
                            E. Neuropsychological Problems<br>
                            0 = severe dementia or depression<br>
                            1 = mild dementia<br>
                            2 = no psychological problems<br>
                          </label>
                          <div class="col-lg-2">
                              <input type="text" id="Yes" name="mobility"> 
                          </div>   
                          <label class="control-label col-lg-4">
                            F. Body Mass Index (BMI) (weight in kg)/(height in m-)<br>
                            0 = BMI less than 19<br>
                            1 = BMI 19 to less than 21<br>
                            2 = BMI 21+ to less than 23<br>
                            3 = BMI 23 or greater<br>
                            If BMI is not available, replace question F1 with F2. Do not answer F2 if F1 is already completed<br>
                            F2 Calf circumference (CC) in cm<br>
                            0 = CC less than 31<br>
                            3 = CC 31 or greater<br>
                          </label>
                          <div class="col-lg-2">
                              <input type="text" id="Yes" name="mobility"> 
                          </div>     
                        </div>
                        <div class="row col-lg-12" style="margin:10px 0px;">
                          <label class="control-label col-lg-4">
                            Screening score (subtotal max 14 points)<br>
                            12-14 points –Normal nutritional status - not at risk<br>
                            no need to complete assessment<br>
                            8-11 points –at risk of malnutrition- -continue assessment<br>
                            0-7 Points - malnourished<br>
                          </label>
                          <div class="col-lg-6">
                              <input type="text" id="Yes" name="mobility"> 
                          </div>    
                        </div>
                        <fieldset style="border: 1px solid black">
  
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">1.MEDICAL HISTORY
                                  Weight change____kg in last 6 months
                                   0% (7) <br>
                                   <3% (6)<br>
                                   3-&lt;5% (5)<br>
                                   5-7% (4)<br>
                                   7-10% (3)<br>
                                   10-&lt;15% (2)<br>
                                   ≥15% (1)<br> 
                                  If weight is trending up add 1 point, if weight i trending down within 1 month, minus 1
                                  point
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="MH" name="MH">
                                </div>
                                <label class="control-label col-lg-4">
                                  2. DIETARY INTAKE IN PAST TWO WEEKS<br>
                                   Good- full share of usual meal (7)<br>
                                   Good - &gt; ¾ to &lt;1 share of meal (6)<br>
                                   Borderline – ½ to ¾ meal but increasing (5)<br>
                                   Borderline ½ - ¾ usual meal with no change or decreasing (4)<br>
                                   Poor &lt; ½ of usual meal but increasing (3)<br>
                                   Poor &lt; ½ of usual meal with no change or decreasing (2)<br>
                                   Starvation &lt; ¼ of usual meal (1)<br>
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="MH" name="MH">
                                </div> 
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">
                                  3.GASTROINTESTINAL SYMPTOMS
                                  Nausea_____ Vomiting______, Diarrhea______, Anorexia_______
                                   no symptoms (7)
                                   Very few intermittent symptoms 1x/ day (6)
                                   Some symptoms 2-3x/day – improving (5)
                                   Some symptoms 2-3x/day – no change (4)
                                   Some symptoms 2-3x/day – getting worse (3)
                                   Some or all symptoms &gt; 3x/ day (1-2)
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="GS" name="GS">
                                </div>
                                <label class="control-label col-lg-4">
                                  4.FUNCTIONAL CAPACITY(NUTRITION RELATED FUNCTIONAL IMPAIRMENT)
                                   No impairment in strength, stamina &amp; full functional capacity (6-7)
                                   Mild to moderate loss of strength, stamina or some loss of daily activities (3-5)
                                   Severe loss of function, stamina and strength(Bedridden) (1-2)
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="FC" name="FC">
                                </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">
                                  5. DISEASED STATE AFFECTING NUTRITIONAL REQUIREMENT
                                  Primary diagnosis ____________________________________
                                   No increase in metabolic demand (no or low stress) (6-7)
                                   mild to moderate increase in metabolic demand (moderate stress) (3-5)
                                   Drastic change in metabolic demand (High stress) (1-2)
                                </label>
                                <div class="col-lg-2">
                                    <input  class="form-control" type="text" id="NUTRITIONAL" name="NUTRITIONAL">
                                </div> 
                                <label class="control-label col-lg-4">
                                  6.PHYSICAL EXAMINATION
                                  1.Loss of subcutaneous fat (below eye, triceps, biceps, chest)
                                   No depletion in all areas(6-7)
                                   Mild to moderate depletion(3-5)
                                   Severe depletion(1-2)
                                  2.Muscle wasting(deltoids, Quadriceps, calf, Interosseous – at least 3 areas)
                                   No depletion in all areas(6-7)
                                   Mild to moderate depletion(3-5)
                                   Severe depletion(1-2)
                                  3.Edema
                                   no edema(6-7)
                                   Mild to moderate edema(3-5)
                                   Severe Edema(1-2)
                                </label>
                                <div class="col-lg-2">
                                    <input  class="form-control" type="text" id="PH" name="PH">
                                </div>  
                          </div>
                          <div class="row" style="margin:10px 0px;">
                            <label class="control-label col-lg-4">
                                  7.SUBJECTIVE GLOBAL ASSESSMENT RATING(OVERALL SGA SCORE)
                                   SGA A. Well nourished (29-35)
                                   SGA B. Moderately (or suspected of being malnourished) malnourished(15-28)
                                   SGA C. Severely malnourished(7-14)
                                </label>
                                <div class="col-lg-2">
                                    <input  class="form-control" type="text" id="SUBJECTIVE_GLOBA" name="SUBJECTIVE_GLOBA">
                                </div> 
                          </div>
                          
                        </fieldset>
                        <fieldset style="border: 1px solid black">
  
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Height (cm)
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="height" name="height">
                                </div>
                                <label class="control-label col-lg-4">
                                 Weight(kg)
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="weight" name="weight">
                                </div> 
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Pre-pregnancy weight (kg)-
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="pre_pregnancy_weight" name="pre_pregnancy_weight">
                                </div>
                                <label class="control-label col-lg-4">
                                 Pre-pregnant BMI (kg/sq.m)-
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="pre_pregnant_bmi" name="pre_pregnant_bmi">
                                </div> 
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Haemoglobin (gm/dl
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="Haemoglobin" name="Haemoglobin">
                                </div>
                                
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Anaemia
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="anaemia" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="No" name="anaemia" value="No">
                                    <label for="No">No</label>
                                </div>
                                <label class="control-label col-lg-4">Nutritional supplement
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="ns" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="No" name="ns" value="No">
                                    <label for="No">No</label>
                                </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Weight gain during pregnancy
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Adequate" name="wgdp" value="Adequate">
                                    <label for="Yes">Adequate</label>
                                    <input type="radio" id="Inadequate" name="wgdp" value="Inadequate">
                                    <label for="No">Inadequate</label>
                                </div>
                                <label class="control-label col-lg-4">Nausea/vomiting
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="nv" value="Absent">
                                    <label for="Absent">Absent</label>
                                    <input type="radio" id="No" name="ns" value="Present">
                                    <label for="Present">Present</label>
                                </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Smoking
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="ns" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="No" name="ns" value="No">
                                    <label for="No">No</label>
                                </div>
                                <label class="control-label col-lg-4">Substance abuse
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="ns" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="No" name="ns" value="No">
                                    <label for="No">No</label>
                                </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Adolescent pregnancy
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="ns" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="No" name="ns" value="No">
                                    <label for="No">No</label>
                                </div>
                                <label class="control-label col-lg-4">Milk production
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="nv" value="Absent">
                                    <label for="Absent">Absent</label>
                                    <input type="radio" id="No" name="ns" value="Present">
                                    <label for="Present">Present</label>
                                </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Adolescent pregnancy
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="ns" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="No" name="ns" value="No">
                                    <label for="No">No</label>
                                </div>
                                <label class="control-label col-lg-4">Milk production
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Yes" name="nv" value="Absent">
                                    <label for="Absent">Absent</label>
                                    <input type="radio" id="No" name="ns" value="Present">
                                    <label for="Present">Present</label>
                                </div>
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">Weight of the Infant
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="Adequate" name="wi" value="Adequate">
                                    <label for="Adequate">Adequate</label>
                                    <input type="radio" id="No" name="ns" value="Inadequate">
                                    <label for="No">Inadequate</label>
                                </div>
                                
                          </div>

                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">PHYSICALLY ACTIVE
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="PHYSICALLY_ACTIVE" value="Most of the days">
                                    <label for="Adequate">Most of the days</label>
                                    <input type="radio" id="No" name="PHYSICALLY_ACTIVE" value="Rarely">
                                    <label for="Rarely">Rarely</label>
                                    <input type="radio" id="No" name="PHYSICALLY_ACTIVE" value="Some days">
                                    <label for="No">Some days</label>
                                </div> 
                                <label class="control-label col-lg-4">EAT FRUITS
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="EAT_FRUITS" value="Most of the days">
                                    <label for="Adequate">Most of the days</label>
                                    <input type="radio" id="No" name="EAT_FRUITS" value="Rarely">
                                    <label for="Rarely">Rarely</label>
                                    <input type="radio" id="No" name="EAT_FRUITS" value="Some days">
                                    <label for="No">Some days</label>
                                </div> 
                          </div>

                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">EAT VEGETABES
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="EAT_VEGETABES" value="Most of the days">
                                    <label for="Adequate">Most of the days</label>
                                    <input type="radio" id="No" name="EAT_VEGETABES" value="Rarely">
                                    <label for="Rarely">Rarely</label>
                                    <input type="radio" id="No" name="EAT_VEGETABES" value="Some days">
                                    <label for="No">Some days</label>
                                </div> 
                                <label class="control-label col-lg-4">WATER INTAKE
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="WATER_INTAKE" value="Most of the days">
                                    <label for="Adequate">Most of the days</label>
                                    <input type="radio" id="No" name="WATER_INTAKE" value="Rarely">
                                    <label for="Rarely">Rarely</label>
                                    <input type="radio" id="No" name="WATER_INTAKE" value="Some days">
                                    <label for="No">Some days</label>
                                </div> 
                          </div>

                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">EATING OUT FREQUENCY
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="EAT_VEGETABES" value="Most of the days">
                                    <label for="Adequate">Less frequent</label>
                                    <input type="radio" id="No" name="EAT_VEGETABES" value="Rarely">
                                    <label for="Rarely">Most of the days</label>
                                    <input type="radio" id="No" name="EAT_VEGETABES" value="Very Rare">
                                    <label for="No">Very Rare</label>
                                </div> 
                                <label class="control-label col-lg-4">BEVERAGES CONSUMPTION(soda/Juices)
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="BEVERAGES_CONSUMPTION" value="Most of the days">
                                    <label for="Adequate">Most of the days</label>
                                    <input type="radio" id="Rarely" name="BEVERAGES_CONSUMPTION" value="Rarely">
                                    <label for="Rarely">Rarely</label>
                                    <input type="radio" id="Some days" name="BEVERAGES_CONSUMPTION" value="Some days">
                                    <label for="No">Some days</label>
                                </div> 
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-4">WATCH TV MORE THAN 2 HOURS
                                </label>
                                <div class="col-lg-2">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="BEVERAGES_CONSUMPTION" value="Most of the days">
                                    <label for="Adequate">Most of the days</label>
                                    <input type="radio" id="Rarely" name="BEVERAGES_CONSUMPTION" value="Rarely">
                                    <label for="Rarely">Rarely</label>
                                    <input type="radio" id="Some days" name="BEVERAGES_CONSUMPTION" value="Some days">
                                    <label for="No">Some days</label>
                                </div>

                                <div class="col-lg-3">
                                  <label class="control-label">PRESENT CALORIE CONSUMPTION
                                  </label>
                                  <input class="form-control" type="text" name="" id="" > Kcal
                                </div>
                                <div class="col-lg-3">
                                  <label class="control-label">PRESENT PROTEIN CONSUMPTION
                                  </label>
                                  <input class="form-control" type="text" name="" id="" > Kcal
                                </div> 
                            </div>
                            <div class="row" style="margin:10px 0px;">
                              <label class="control-label col-lg-4">OTHER INAPPROPRIATE NUTRITION BEHAVIOUR
                              </label>
                              <div class="col-lg-6">
                                <input class="form-control" type="text" name="" id="" >
                              </div>  
                            </div>
                            <div class="row" style="margin:10px 0px;">
                              <label class="control-label col-lg-4">DIETARY INTERVENTION AND EDUCATION
                              </label>
                              <div class="col-lg-6">
                                <input class="form-control" type="text" name="" id="" >
                              </div>  
                            </div>
                        </fieldset>


                        <h3>PEDRIATRICS NUTRITIONAL ASSESSMENT</h3>
                        <fieldset style="border: 1px solid black">
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">Length/Height (cm)
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="height" name="height">
                                </div>
                                <label class="control-label col-lg-2">
                                 Weight(kg)
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="weight" name="weight">
                                </div> 
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">IBW-
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="IBW" name="IBW">
                                </div>
                                <label class="control-label col-lg-2">
                                 BMI -
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="BMI" name="BMI">
                                </div>
                                <label class="control-label col-lg-2">
                                 IBW/BMI percentile
                                </label>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="IBW_BMI" name="IBW_BMI">
                                </div> 
                          </div>
                          <h4>GENERAL ASSESSMENT</h4>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">Percent weight gain/loss
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="ercent_weight_gain" value="gained_ weight">
                                    <label for="Adequate">Gained weight</label>
                                    <input type="radio" id="No" name="ercent_weight_gain" value="lost_weight">
                                    <label for="Rarely">Lost weight</label>
                                    <input type="radio" id="No" name="ercent weight gain" value="no_change">
                                    <label for="No">No change</label>
                                </div>
                                <label class="control-label col-lg-2">Appearance
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="PHYSICALLY_ACTIVE" name="ercent_weight_gain" value="gained_ weight">
                                    <label for="Adequate">Healthy</label>
                                    <input type="radio" id="No" name="ercent_weight_gain" value="Healthy">
                                    <label for="Rarely">Overweight</label>
                                    <input type="radio" id="No" name="ercent weight gain" value="Overweight">
                                    <label for="No">Underweight</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">Food Allergies/Intolerance
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Food_Allergies_Intolerance" name="food_allergies_intolerance" value="No_known">
                                    <label for="Adequate">No known</label>
                                    <input type="radio" id="No" name="food_allergies_intolerance" value="lost_weight">
                                    <label for="Rarely">Known</label>
                                    
                                </div>
                                <label class="control-label col-lg-2">Hair
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Dry" name="Hair" value="Dry">
                                    <label for="Dry">Dry</label>
                                    <input type="radio" id="No" name="ercent_weight_gain" value="Normal">
                                    <label for="Normal">Normal</label>
                                    <input type="radio" id="No" name="ercent_weight_gain" value="Thin">
                                    <label for="Thin">Thin</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">Skin
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Dry" name="Skin" value="Dry">
                                    <label for="Dry">Dry</label>
                                    <input type="radio" id="No" name="Skin" value="Normal">
                                    <label for="Normal">Normal</label>
                                    <input type="radio" id="No" name="Skin" value="Pale">
                                    <label for="Thin">Pale</label>
                                    <input type="radio" id="No" name="Skin" value="Pigmentation">
                                    <label for="Pigmentation">Pigmentation</label>
                                </div> 
                                <label class="control-label col-lg-2">Hair
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Dry" name="Hair" value="Dry">
                                    <label for="Dry">Dry</label>
                                    <input type="radio" id="No" name="Hair" value="Normal">
                                    <label for="Normal">Normal</label>
                                    <input type="radio" id="No" name="Hair" value="Redness">
                                    <label for="Redness">Redness</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">Lips
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Angular stomatitis" name="Lips" value="Angular stomatitis">
                                    <label for="Angular stomatitis">Angular stomatitis</label>
                                    <input type="radio" id="No" name="Lips" value="Dry">
                                    <label for="Normal">Dry</label>
                                    <input type="radio" id="No" name="Lips" value="Normal">
                                    <label for="Thin">Normal</label>
                                </div> 
                                <label class="control-label col-lg-2">Tongue
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Dry" name="Tongue" value="Dry">
                                    <label for="Dry">Dry</label>
                                    <input type="radio" id="No" name="Tongue" value="Glossitis">
                                    <label for="Glossitis">Glossitis</label>
                                    <input type="radio" id="No" name="Tongue" value="Normal">
                                    <label for="Redness">Normal</label>
                                </div>   
                          </div>
                          <h3>Diet and Physical activity</h3>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">FRUIT INTAKE
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="Lips" value="Daily">
                                    <label for="Angular stomatitis">Daily</label>
                                    <input type="radio" id="Never" name="Lips" value="Never">
                                    <label for="Normal">Never</label>
                                    <input type="radio" id="Occasionally" name="Lips" value="Occasionally">
                                    <label for="Thin">Occasionally</label>
                                </div> 
                                <label class="control-label col-lg-2">FRUIT JUICE
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="Tongue" value="Daily">
                                    <label for="Dry">Daily</label>
                                    <input type="radio" id="Never" name="Tongue" value="Never">
                                    <label for="Glossitis">Never</label>
                                    <input type="radio" id="Occasionally" name="Tongue" value="Occasionally">
                                    <label for="Redness">Occasionally</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">EAT VEGETABES
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="Lips" value="Daily">
                                    <label for="Angular stomatitis">Daily</label>
                                    <input type="radio" id="Never" name="Lips" value="Never">
                                    <label for="Normal">Never</label>
                                    <input type="radio" id="Occasionally" name="Lips" value="Occasionally">
                                    <label for="Thin">Occasionally</label>
                                </div> 
                                <label class="control-label col-lg-2">FISH
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="Tongue" value="Daily">
                                    <label for="Dry">Daily</label>
                                    <input type="radio" id="Never" name="Tongue" value="Never">
                                    <label for="Glossitis">Never</label>
                                    <input type="radio" id="Occasionally" name="Tongue" value="Occasionally">
                                    <label for="Redness">Occasionally</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">MILK CONSUMPTION
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="MILK_CONSUMPTION" value="Daily">
                                    <label for="Angular stomatitis">Daily</label>
                                    <input type="radio" id="Never" name="MILK_CONSUMPTION" value="Never">
                                    <label for="Normal">Never</label>
                                    <input type="radio" id="Occasionally" name="MILK_CONSUMPTION" value="Occasionally">
                                    <label for="Thin">Occasionally</label>
                                </div> 
                                <label class="control-label col-lg-2">FISH
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="FISH" value="Daily">
                                    <label for="Dry">Daily</label>
                                    <input type="radio" id="Never" name="FISH" value="Never">
                                    <label for="Glossitis">Never</label>
                                    <input type="radio" id="Occasionally" name="FISH" value="Occasionally">
                                    <label for="Redness">Occasionally</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">EAT OUT
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="MILK_CONSUMPTION" value="Daily">
                                    <label for="Angular stomatitis">Daily</label>
                                    <input type="radio" id="Never" name="MILK_CONSUMPTION" value="Never">
                                    <label for="Normal">Never</label>
                                    <input type="radio" id="Occasionally" name="MILK_CONSUMPTION" value="Occasionally">
                                    <label for="Thin">Occasionally</label>
                                </div> 
                                <label class="control-label col-lg-2">SKIPPING MEALS
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="FISH" value="Daily">
                                    <label for="Dry">Daily</label>
                                    <input type="radio" id="Never" name="FISH" value="Never">
                                    <label for="Glossitis">Never</label>
                                    <input type="radio" id="Occasionally" name="FISH" value="Occasionally">
                                    <label for="Redness">Occasionally</label>
                                </div>   
                          </div>
                          <div class="row" style="margin:10px 0px;">
                                <label class="control-label col-lg-2">TIME SPENT FOR OUTDOOR PLAY
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Daily" name="TIME_SPENT_FOR_OUTDOOR_PLAY" value="Daily">
                                    <label for="Angular stomatitis">Daily</label>
                                    <input type="radio" id="Weekly" name="TIME_SPENT_FOR_OUTDOOR_PLAY" value="Weekly">
                                    <label for="Normal">Weekly</label>
                                    
                                </div> 
                                <label class="control-label col-lg-2">SPENDING TIME INFRONT OF TV/COMPUTER FOR MORE THAN 1 HOUR
                                </label>
                                <div class="col-lg-4">
                                    <input type="radio" id="Yes" name="INFRONT" value="Yes">
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="Never" name="INFRONT" value="No">
                                    <label for="No">No</label>
                                </div>   
                          </div>
                        </fieldset>

                      </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="LOT_remark_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 700px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row" style="margin-bottom: 15px;">
              <div class="col-lg-12" >
                <h2  style="margin: 0px;float: left;">Add Remark</h2>
                <button type="button" style="float: right;" class="close_report_model" data-dismiss="modal">&times;</button>
                     </div>
            </div>
            <div class="row" >
              <div class="col-lg-12" style="text-align: center;padding: 30px">
                <label style="font-size: x-large;margin: 30px;margin-top: 0px;">Add Remark For this Task</label>
                <textarea type="text" style="width: 100%;color: red;font-weight: bolder;padding: 10px;" id="LOT_remark" rows="3" name="LOT_remark" maxlength="500"></textarea> <br><br>
              <button type="button" class="btn update_status" id="
              " style="width:32%;color: white;background-color: darkorange;" LOT_id="'+LOT_id+'" >Add !</button>
              
              <button type="button" class="btn" style="width:32%;color: black;background-color: lightgray;" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
      </div>
   </div>           
</div>

<div id="show_report_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 1000px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row" style="margin-bottom: 15px;">
              <div class="col-lg-12" >
                <h2  style="margin: 0px;float: left;">Test Report</h2>
                <button type="button" style="float: right;" class="close_report_model" data-dismiss="modal">&times;</button>
                <button type="button" style="float: right;margin-right:50px;" class="btn btn-success download_report" content_url=""  ><i class="fa fa-download"></i>&nbsp;&nbsp;&nbsp;Download Bill Receipt</button>
                <button type="button" style="float: right;margin-right:50px;" class="btn btn-primary print_report" content_url=""><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Print Bill Receipt</button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12" id="report_data" style="height: 700px;overflow-y: auto;padding: 0px;">

              </div>
            </div>
            
          </div>
      </div>
   </div>           
</div>


<div class="modal fade" id="favourite_service_modal" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;max-width: 1000px;">
    <div class="modal-content">
      <form method="post"  enctype="multipart/form-data" id="favourite_service_form">
        <div class="modal-header">
          <h4 class="modal-title">Favourite Investigation</h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" id="TP_list" style="font-size: medium;">
            <div class="row" style="margin: 0px;">
              <label class="form-control col-lg-4" style="border:0px;" >Department<a style="color: red">*</a></label>
              <label class="form-control col-lg-4" style="border:0px;">Select Service<a style="color: red">*</a></label>
            </div>
            <div class="row" style="margin: 0px;">
               <div class="col-lg-5">
                  <select class="form-control" name="FI_d_name" id="FI_d_name">
                    <option value="" selected="" disabled="">Select Department</option>
                  </select>
                  <input type="hidden" name="opd_id" id="opd_id">
               </div>
               <div class="col-lg-5">
                 <select class="form-control selectpicker" name="FI_service_name" id="FI_service_name" data-live-search="true">
                    <option value="" selected="" disabled="">Select Service</option>
                  </select>
               </div>
               <div class="col-lg-2">
                <button type="submit" class="btn btn-primary pull-right add_favourite_investigation" >Save</button>
               </div> 
            </div>
            <br>
            <div class="row" style="margin: 0px;">
              <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                  <thead>
                      <tr>
                          <th style="border-right: 1px solid white;"></th>
                          <th style="border-right: 1px solid white;">Dept. Name</th>
                          <th style="border-right: 1px solid white;">Service Name</th>
                          <th style="border-right: 1px solid white;">Action</th>
                      </tr>
                  </thead>
                  <tbody id="FS_list">
                  </tbody>
              </table>
            </div>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left close_model">Close</button>
        </div>
      </form>
    </div>
  </div>
</div> 

<div class="modal fade" id="transfer_bed_modal" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content">
      <form method="post"  enctype="multipart/form-data" id="transfer_bed_form">
        <div class="modal-header">
          <h4 class="modal-title">Select Bed</h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" id="TP_list" style="font-size: medium;">
          <div class="row" style="margin: 10px 0px;">
            <label class="form-control col-lg-6" style="border:0px;">Floor Number</label>
            <div class="col-lg-6">
              <select class="form-control" name="floor_number" id="floor_number" required="">
              <option value="" selected="" disabled="">Select Floor</option>
             
              </select>
              <input type="hidden" id='IBA_id' name='IBA_id'>
            </div>
          </div>
          <div class="row" style="margin: 10px 0px;">
            <label class="form-control col-lg-6" style="border:0px;">Ward Number</label>
            <div class="col-lg-6">
              <select class="form-control" name="ward_number" id="ward_number" required="">
              <option value="" selected="" disabled="">Select Ward No.</option>
              
              </select>
            </div>
          </div>
          <div class="row" style="margin: 10px 0px;">
            <label class="form-control col-lg-6" style="border:0px;">Room Number</label>
            <div class="col-lg-6">
              <select class="form-control" name="room_number" id="room_number" required="">
              <option value="" selected="" disabled="">Select Room</option>
              
              </select>
            </div>
          </div>
          <div class="row" style="margin: 10px 0px;">
            <label class="form-control col-lg-6" style="border:0px;">Bed Number</label>
            <div class="col-lg-6">
              <select class="form-control" name="bed_number" id="bed_number" required="">
              <option value="" selected="" disabled="">Select Bed</option>
              
              </select>
            </div>
          </div> 
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Submit</button>
          <button type="button" class="btn btn-default pull-left close_model">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php include_once  APPPATH.'views/footer.php'; ?>
<script src="<?=base_url('assets')?>/js/fullcalendar/moment.min.js"></script>
<script src="<?=base_url('assets')?>/js/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript">
  $('#doctor_dashboard_tab').addClass('active');
  $('#complaint_name').selectpicker();
  $('#drug_name').selectpicker();
  $('#service_name').selectpicker();
  $('.allergies_cls').hide();
  $('.suggested_dept_cls').hide();


  
  $('.report_form').hide();

  $('.add_consumable_form').hide();
  $('.add_services').hide();
  $('.prescription_form').hide();

  

  $('#cons_status').change(function () {
      if ($(this).prop('checked')) {
        $('#cons_status').val('Yes');
      } else {
        $('#cons_status').val('No');
      }
  });

  /*
  function get_ICA_details(){

    $.ajax({
          url:'<?=base_url()?>get-ICA-details',
          method:'post',
          async: false,
          dataType: 'json',
          data:{opdid:opdid},
          success:function (data) { 
            if(typeof(data)=='object'){


              $('#medical_history').val(data['result']['CE_medical_history']);
              $('#surgical_history').val(data['result']['CE_surgical_history']);
              
              $('#smoking').val(data['result']['CE_smoking']);
              $('#smoking_since').val(data['result']['CE_smoking_since']);
              $('#alcohol').val(data['result']['CE_alcohol']);
              $('#alcohol_since').val(data['result']['CE_alcohol_since']);

              $('#tobacco').val(data['result']['CE_tobacco']);
              $('#tobacco_since').val(data['result']['CE_tobacco_since']);

              $('#Diet').val(data['result']['CE_diet']);
              $('#temperature').val(data['result']['CE_temperature']);
              $('#PR').val(data['result']['CE_PR']);
              $('#RR').val(data['result']['CE_RR']);
              $('#systolic_bp').val(data['result']['CE_Systolic_BP']);
              $('#diastolic_bp').val(data['result']['CE_Diastolic_BP']);
              $('#heart_rate').val(data['result']['CE_heart_rate']);
              $('#spO2').val(data['result']['CE_SpO2']);
              $('#height').val(data['result']['CE_height']);
              $('#weight').val(data['result']['CE_weight']);
             

            }else{
              //location.reload();
            }
          }
        })  



  }
  */
  

   $('input[type=radio][name=Allergies]').change(function() {
    if (this.value == 'Yes') {
        $('.allergies_cls').show();
    }
    else if (this.value == 'No') {
        $('.allergies_cls').hide();
    }
});


   $('input[type=radio][name=suggested_ipd]').change(function() {
    if (this.value == 'Yes') {
        $('.suggested_dept_cls').show();
    }
    else if (this.value == 'No') {
        $('.suggested_dept_cls').hide();
    }
});


   



  

  var opdid=<?= $record['id']?>;


  $('#PR_appointment_slot').val(moment().format('YYYY-MM-DDTHH:mm'));
  $('#PR_appointment_slot').attr('min',moment().format('YYYY-MM-DDTHH:mm'));
  complaints_all();
  get_department();
  doctors_all();
  prescription_all();
  investigation_test_list();
  //get_IT_list();
  department_all();

  get_test_report_list();
  product_type_all();
  consumable_all();
  services_all();
  patient_prescription_all();
  get_bed_list();
  floor_all();
  patient_refer_list();
  equipment_group_all();
  concent_all();

 


  

 
  $(document).ready(function() {

        var oid=<?= $record['id']?>;
        $('#opd_id').val(oid);

          $("#demographic_detail").addClass("active");
           $(".menu-item").click(function() {
                $(".menu-content").removeClass("active");
               // background-color: cyan;
                var targetDivId = $(this).data("target");
                $("#" + targetDivId).addClass("active");

                $(".menu-item").removeClass("active-button");
                $(this).addClass("active-button");
           });

          

}); 

  function present_illness_action(){

      var complaint_name=$('#complaint_name').val();
      var complaint_details=$('#complaint_details').val();

      $.ajax({
        url:'<?=base_url()?>present-illness-form-action',
        method:'post',
        data:{opdid:opdid,complaint_name:complaint_name,complaint_details:complaint_details},
        async: false,
        
        success:function(data){
          if(typeof(data)=='object'){
       
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      });
 }
  

  $(document).on('click','.add_remark',function(){

    $lot_id=$(this).attr('LOT_id');
    $lot_remark=$(this).attr('LOT_remark');
    $('.update_status').attr('LOT_id',$lot_id);
    $('#LOT_remark').text($lot_remark);
    $('#LOT_remark_modal').modal('show');
  })

  $('#show_reports_btn').click(function(argument) {
    $('.report_form').hide();
    $('.report_list').show();
  })
  $('#add_reports_btn').click(function(argument) {
    $('.report_list').hide();
    $('.report_form').show();
    
  })


  
  function show_add_consumable(){

     $('.consumable_list').hide();
    $('.add_consumable_form').show();
  }

  function show_consumable_list(){

    $('.add_consumable_form').hide();
    $('.consumable_list').show();

  }



  function show_services_list(){

    $('.add_services').hide();
    $('.services_list').show();

  }

  function show_add_services(){

    $('.services_list').hide();
    $('.add_services').show();
  }




function print_ICA(){

   
    //alert(patient_id);
    var rid=opdid;

    url = '<?=base_url()?>print-ICA/' + rid + '?action=Print';
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");


}



function show_add_prescription(){

     $('.prescription_list').hide();
    $('.prescription_form').show();
  }

function show_prescription_list(){

    $('.prescription_form').hide();
    $('.prescription_list').show();

  }

$('#transfer_bed_btn').click(function(){
   $('#transfer_bed_modal').modal('show');
})



  $('#service_list').on('click', '.delete_item', function() {
    var rowIndex = $(this).closest('tr').index();
    tableData.splice(rowIndex, 1);
    $(this).closest('tr').remove();
});

  function calculateBMI() {
            var heightInput = $('#height');
            var weightInput = $('#weight');
            var bmiInput = $('#BMI');

            var height = parseFloat(heightInput.val()) / 100;
            var weight = parseFloat(weightInput.val());

            if (!isNaN(height) && !isNaN(weight) && height > 0 && weight > 0) {
                var bmi = weight / (height * height);
                bmi = parseFloat(bmi.toFixed(2));
                bmiInput.val(bmi);
            } else {
                bmiInput.val('');
            }
        }

  $('#height, #weight').on('input', calculateBMI);


   function updateTotalQuantity() {
            var morning = parseFloat($('#M').val()) || 0;
            var afternoon = parseFloat($('#A').val()) || 0;
            var evening = parseFloat($('#E').val()) || 0;
            var night = parseFloat($('#N').val()) || 0;
            var duration = parseFloat($('#duration').val()) || 1; 

            var totalQuantity = morning + afternoon + evening + night;
            totalQuantity *= duration;

            $('#total_qnty').val(totalQuantity);
        }

     $('#M, #A, #E, #N, #duration').on('input', updateTotalQuantity);


      function calculateEndDate() {
            var duration = parseInt($('#duration').val()) || 0;
            var currentDate = new Date();

            if (!isNaN(duration) && duration > 0) {
                var endDate = new Date(currentDate);
                endDate.setDate(currentDate.getDate() + duration);
                var formattedEndDate = endDate.toISOString().split('T')[0];
                $('#end_date').val(formattedEndDate);
            } else {
                $('#end_date').val('');
            }
        }
    




    var currentDate = new Date();
    var formattedCurrentDate = currentDate.toISOString().split('T')[0];
    $('#start_date').val(formattedCurrentDate);

    $('#duration').on('input', calculateEndDate);




/////////////////////////////////////////////////////////////////////////////


/*
  function get_IT_list(){
    if ($.fn.DataTable.isDataTable('#datatable_list'))
    {
      var table = $('#datatable_list').DataTable();
      table.destroy();
      table.clear();
      table.state.clear();
    }
      
    var table=$('#datatable_list').DataTable({
      'processing': true,
      'serverSide': true,
      'orderable':false,
      'serverMethod': 'post',
      'autoWidth':true,
      'stateSave': true,
      'ajax': {
        'url':'<?=base_url()?>LOT-task-list',
        'data':{opdid:opdid}
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Time",data:"lot_time",mSearch:false},
        {title: "Task",data:"task",mSearch:true},
        {title: "Task Date",data:"lot_date",mSearch:false},
        {title: "Description",data:"description",mSearch:false},
        {title: "Remark",data:"remark",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6] },

                {
                          'targets':[0,1,2,3,4,5,6],
                          'createdCell':  function (td, cellData, rowData, row, col) {
                          $(td).attr('style', 'white-space: nowrap;'); 
                        }
                  }
            ],
      });

    $('#datatable_list tfoot tr th').each( function () {
      var title = $(this).text();
      if(title!="")
      { 
        $(this).html( '<input type="text" style="fit-content;" placeholder="'+title+'" /> ' );  
      }
    } );

    table.columns().every( function () {
      var that = this;
      $( 'input[type=text]', this.footer() ).on( 'keyup', function (e) {
        if (that.search() !== this.value) {
          that
          .search(this.value)
          .draw();
        }
      });
    });
  }*/

  function prescription_all() {

        $.ajax({
          url:'<?=base_url()?>prescription-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){


              var html='<option selected="" disabled="">Select Drug</option>';
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#drug_name").html(html);
              $('#drug_name').selectpicker('refresh');
            }else{
              location.reload();
            }
          }
        })  
  }

  function complaints_all() {

        $.ajax({
          url:'<?=base_url()?>complaints-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){


              var html="";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#complaint_name").html(html);
              $('#complaint_name').selectpicker('refresh');

              var html1="";
              for (var i = 0; i <data['record'].length; i++){    
                  html1+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#cliex_complaint_name").html(html1);
              $('#cliex_complaint_name').selectpicker('refresh');

            }else{
              location.reload();
            }
          }
        })  
  }

  

  function concent_all() {

        $.ajax({
          url:'<?=base_url()?>concent-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){


              var html="<option selected='' disabled=''>Select Form</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#form_id").html(html);
              

            }else{
              location.reload();
            }
          }
        })  
  }


   $(document).on('click','.print_concent_form',function () {
      url=$(this).attr('content_url');
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");

    });

// $(document).on('click','.download_concent_form',function () {
//       pdf=$(this).attr('content_url');
//       $.ajax({
//         url:pdf,
//         method:'get',
//         async: false,
//         success:function (data) {
//           if(data.status=='True'){
//             window.open(data.message);
//           }else{
//             alert(data.message);
//           }
//         }
//       })
//     });

  $('#form_id').change(function(){

      fid=$(this).val();

      data_url='<?=base_url()?>load-concent-form/'+fid+'-'+opdid;
      //pdf_url=$(this).attr('pdf_url');
      $('#form_data').html('');
      document.getElementById("form_data").innerHTML='<object style=\"width: 100%;height: 100%;\" data="'+data_url+'?action=View" ></object>';
      // $('.download_concent_form').attr('content_url',data_url+'?action=PDF');
      $('.print_concent_form').attr('content_url',data_url+'?action=Print');
      // $('.download_concent_form').show();
      $('.print_concent_form').show();
  })


  function equipment_group_all(){

    $.ajax({
          url:'<?=base_url()?>equipment-group-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){


              var html="";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#equipment").html(html);
             

            }else{
              location.reload();
            }
          }
        })  



  }

  

  $(document).on('click','.favourite_service',function () {

    $('#favourite_service_modal').modal('show');
    get_favourite_service();
  })


  function investigation_test_list(){

   var opd_id= $('#opd_id').val();
    if (opd_id) {
      $.ajax({
        url:'<?=base_url()?>investigation-test-list',
        method:'post',
        data:{appointment_id:opd_id},
        async: false,
        success:function (data) { 
            console.log(data);
           if(typeof(data)=='object'){
            
          }else{
            //location.reload();
          }
        }
      })
      
    }else{
      //alert("Something Went Wrong..!");
      //location.reload();
    }
  }

  function get_test_report_list(){

        $.ajax({
            url:"<?php echo base_url();?>get-test-report-list",
            method:'post',
            dataType: 'json',
            data:{appointment_id:opdid},
            success:function(data){

              console.log(data);
            
              
               html="";
                for (i=0;i<data.length;i++){

                    html+='<tr>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['appointment_datetime']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['sub_department_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['ASA_status']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['services_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['generate_report']+'</td>\
                                    </tr>'; 

                }
                
                $('#test_report_list').html(html);
              
            },
        });  


  }


 function patient_refer_list(){

     $.ajax({
            url:"<?php echo base_url();?>patient-refer-list",
            method:'post',
            dataType: 'json',
            data:{appointment_id:opdid},
            success:function(data){

              console.log(data);
            
              
               html="";
                for (i=0;i<data['record'].length;i++){

                    html+='<tr>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['dname']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['doctor_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['appointment_slot']+'</td>\
                                    </tr>'; 

                }
                
                $('#patient_refer_list').html(html);
              
            },
        });  

 }


function floor_all() {

        $.ajax({
          url:'<?=base_url()?>floor-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){

              var html='<option selected="" disabled="">Select Floor</option>';
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#floor_number").html(html);

            }else{
              location.reload();
            }
          }
        })  
  }

  $('#floor_number').change(function(){
        var floor_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>ward-by-floor-id",
            method:'post',
            dataType: 'json',
            data:{floor_id:floor_id},
            success:function(data)
            {   
               
              console.log(data);

               $('#ward_number').html('');
                html='<option value="" selected="" disabled="">Select Ward</option>';
                for (var i=0;i<data['record'].length;i++)
                { 
                    html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                } 
                $('#ward_number').html(html);
            },
        });  
    })

  $('#ward_number').change(function(){
        var ward_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>room-by-ward-id",
            method:'post',
            dataType: 'json',
            data:{ward_id:ward_id},
            success:function(data)
            {   
               
              console.log("room is");
              console.log(data);
              
               $('#room_number').html('');
                html='<option value="" selected="" disabled="">Select Room</option>';
                for (var i=0;i<data['record'].length;i++)
                { 
                    html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                } 
                $('#room_number').html(html);
            },
        });  
    })

  $('#room_number').change(function(){
        var room_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>bed-by-room-id",
            method:'post',
            dataType: 'json',
            data:{room_id:room_id},
            success:function(data)
            {   
               
               $('#bed_number').html('');
                html='<option value="" selected="" disabled="">Select Room</option>';
                for (var i=0;i<data['record'].length;i++)
                { 
                    html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                } 
                $('#bed_number').html(html);
            },
        });  
    })




  $(document).on('click','.generate_report',function () {
      data_url=$(this).attr('data_url');
      pdf_url=$(this).attr('pdf_url');
      file_data=$(this).attr('file_data');
    console.log(data_url);
     console.log(pdf_url);
      console.log(file_data);
      $('#report_data').html('');

      if(file_data=="FILE"){
        $('#report_data').html('<iframe src="' + file_data + '" style="width: 100%; height: 500px;"></iframe>');
      }else{
        document.getElementById("report_data").innerHTML='<object style=\"width: 100%;height: 100%;\" data="'+data_url+'?action=View" ></object>';
        $('.download_report').attr('content_url',pdf_url);
        $('.print_report').attr('content_url',data_url+'?action=Print');
      }
     
      $('#show_report_modal').modal('show');
    });

  // $('#complaint_name').on('change', function() {
  //        var html="";   
  //        var complaints_name = $("#complaint_name option:selected").text();

  //        var html='\n'+complaints_name+':';

  //        $('#complaint_details').append(html);
  //   });

  $('#complaint_name').on('change', function () {
    var selectedOptions = $("#complaint_name option:selected").map(function () {
        return $(this).text()+' :';
    }).get().join('\n');

    $('#complaint_details').val(selectedOptions);
});




  function updateStatus() {
    var checkbox = document.getElementById("emergency");

    if (checkbox.checked) {
      $('#emergency').val('Yes');

    } else {
      $('#emergency').val('No');
    }
  }

  var fs_id="";
  var fs_text="";
  var fs_dept_id="";
  var fs_dept_text="";
  
  var  tableData = [];
  var serviceDetailsArray = [];
  function add_record() {

     var deptValue = ($("#d_name").val() !== '') ? $("#d_name").val() : fs_dept_id;
      var deptText = ($("#d_name option:selected").text() !== 'Select Department') ? $("#d_name option:selected").text() : fs_dept_text;
      var clinical_details = $("#clinical_details").val();
      var emergency = $("#emergency").val();
      var serviceNameValue = ($("#service_name").val() == null) ? fs_id: $("#service_name").val();
      var serviceNameText = ($("#service_name option:selected").text() !== 'Select Service') ? $("#service_name option:selected").text() : fs_text;  
      var servicerate = $("#service_name option:selected").attr("rate");

         
          /*if(tableData.includes(serviceNameValue))
          {
            alert("Duplicate Service !");
          }else{*/

            tableData.push(serviceNameValue);

            var serviceDetails = {
                serviceId: serviceNameValue,
                emergency: emergency,
                clinicalDetails: clinical_details
            };

            serviceDetailsArray.push(serviceDetails);

          var html = '<tr style="font-size: 18px;">\
                          <td style="border-right:1px solid lightgray">' + deptText + '</td>\
                          <td style="border-right:1px solid lightgray">' + serviceNameText + '</td>\
                          <td style="border-right:1px solid lightgray">' + clinical_details + '</td>\
                          <td style="border-right:1px solid lightgray"><i class="fa fa-times delete_item"></i></td>\
                      </tr>';

          $('#service_list').append(html);
          $('#d_name').val("");
          $("#emergency").removeAttr("checked");
          $('#emergency').val('No');
          $('#clinical_details').val("");
          empty_enable_disable('#service_name','0','1');

         
      
  }

  var  tableData1 = [];
  function add_other_services() {

      var deptValue = $("#s_d_name").val();
      var deptText = $("#s_d_name option:selected").text();
      var serviceNameValue = $("#s_service_name").val();
      var serviceNameText = $("#s_service_name option:selected").text();
      var servicerate = $("#s_service_name option:selected").attr("rate");

      if (deptValue && serviceNameValue) {
          
          if(tableData1.includes(serviceNameValue))
          {
            alert("Duplicate Service !");
          }else{

            tableData1.push(serviceNameValue);

          var html = '<tr style="font-size: 18px;">\
                          <td style="border-right:1px solid lightgray">' + deptText + '</td>\
                          <td style="border-right:1px solid lightgray">' + serviceNameText + '</td>\
                          <td style="border-right:1px solid lightgray"><i class="fa fa-times delete_item"></i></td>\
                      </tr>';

          $('#other_services_list').append(html);
          $('#s_d_name').val("");
          empty_enable_disable('#s_service_name','0','1');

          }
      } else {
          alert("Please select values for all fields.");
      }
  }



  function reset_product(){

      $("#product_id").val('');
      $("#product_unit").val('');
      $("#product_qnty").val('');


  }

  const  consumable_tableData = [];
  function add_consumable(){


      var productValue =$("#product_id").val();
      var productText = $("#product_id option:selected").text();
      var productUnit = $("#product_unit option:selected").text();
      var productqnty = $("#product_qnty").val();
     

      if (productValue && productUnit && productqnty) {
          

          if(consumable_tableData.includes(productValue))
          {
            alert("Duplicate Service !");
          }else{

            var  consumable_entry = [
              productValue,productUnit,productqnty
          ];

        consumable_tableData.push(consumable_entry);

          var html = '<tr style="font-size: 18px;">\
                          <td style="border-right:1px solid lightgray">' + productText + '</td>\
                          <td style="border-right:1px solid lightgray">' + productUnit + '</td>\
                          <td style="border-right:1px solid lightgray">' + productqnty + '</td>\
                          <td style="border-right:1px solid lightgray"><i class="fa fa-times delete_item"></i></td>\
                      </tr>';

          $('#product_list').append(html);
          reset_product();
         

          }
      } else {
          alert("Please select values for all fields.");
      }


  }

  function get_department() {
        $.ajax({
          url:'<?=base_url()?>department-by-section',
          method:'post',
          async: false,
          data:{section_name:'3'},
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){
              var html="<option value='' selected disable>Select Department</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#d_name").html(html);

              var html1="<option value='' selected disable>Select Department</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html1+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#FI_d_name").html(html1);
            }else{
              location.reload();
            }
          }
        })
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
            $("#s_d_name").html(html);


             var html1="<option value='' selected disable>Select Department</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html1+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#PR_d_name").html(html);
           

          }else{
            location.reload();
          }
        }
      })
    }
  $('#s_d_name').change(function(){
        var d_id=$(this).val();
        $.ajax({
              url:"<?php echo base_url();?>services-by-department-id",
              method:'post',
              dataType: 'json',
              data:{d_id:d_id},
              success:function(data)
              {   

                 $('#service_name').html('');
                  html='<option value="" selected="" disabled="">Select Service</option>';
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                  } 
                  empty_enable_disable('#s_service_name','1','1');
                  $('#s_service_name').html(html);
                  $('#s_service_name').selectpicker('refresh');
              },
          });  
    })
  

  $('#d_name').change(function(){
        var d_id=$(this).val();
        $.ajax({
              url:"<?php echo base_url();?>services-by-department-id",
              method:'post',
              dataType: 'json',
              data:{d_id:d_id},
              success:function(data)
              {   

                 $('#service_name').html('');
                  html='<option value="" selected="" disabled="">Select Service</option>';
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                  } 
                  empty_enable_disable('#service_name','1','1');
                  $('#service_name').html(html);
                  $('#service_name').selectpicker('refresh');
              },
          });  
    })

  $('#FI_d_name').change(function(){
        var d_id=$(this).val();
        $.ajax({
              url:"<?php echo base_url();?>services-by-department-id",
              method:'post',
              dataType: 'json',
              data:{d_id:d_id},
              success:function(data)
              {   

                 $('#FI_service_name').html('');
                  html='<option value="" selected="" disabled="">Select Service</option>';
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                  } 
                  empty_enable_disable('#FI_service_name','1','1');
                  $('#FI_service_name').html(html);
                  $('#FI_service_name').selectpicker('refresh');
              },
          });  
    })
  
  $('#PR_d_name').change(function(){
        var d_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>doctor-by-department-id",
            method:'post',
            dataType: 'json',
            data:{d_id:d_id},
            success:function(data)
            {   
               $('#sd_name').html('');
                html='<option value="" selected="" disabled="">Select Doctor </option>';
                for (var i=0;i<data['record'].length;i++)
                { 
                    html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                } 
      
                $('#PR_user_id').html(html);
            },
        });  
    })

  //investigation-test-list
  function doctors_all() {
      $.ajax({
        url:'<?=base_url()?>doctors-all',
        method:'post',
        async: false,
        dataType: 'json',
        success:function (data) { 
          if(typeof(data)=='object'){
            var html="<option value='' selected disable>Select Doctor</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html+="<option value='"+data['record'][i]["id"]+"' type='"+data['record'][i]["type"]+"'>"+data['record'][i]["name"]+"</option>";  
            }
            $("#consulting_doctor").html(html);
             $('#consulting_doctor').selectpicker('refresh');
          }else{
            location.reload();
          }
        }
      })
    }


   function product_type_all() {
        $.ajax({
          url:'<?=base_url()?>product-type-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){
              var html="<option value='' selected disable>Select Consumable</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#product_id").html(html);
            }else{
              location.reload();
            }
          }
        })
    }


    $('#product_id').change(function(){
        var product_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>unit-by-product",
            method:'post',
            dataType: 'json',
            data:{product_id:product_id},
            success:function(data)
            {   
               $('#product_unit').html('');
                html='<option value="" selected="" disabled="">Select product</option>';
                for (var i=0;i<data['record'].length;i++)
                { 
                    html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>';
                } 
                empty_enable_disable('#product_unit','1','1');
                $('#product_unit').html(html);
            },
        });  
    })


  $('#diagnosis_appointment_form_doctor').on('submit',function(event){
      event.preventDefault(); 
      var opd_id= $('#opd_id').val();
        if(opd_id){
          var form = $("#diagnosis_appointment_form_doctor");
          var formData = new FormData(this);
        formData.append('tableData', JSON.stringify(tableData));
        formData.append('serviceDetailsArray', JSON.stringify(serviceDetailsArray));


          if(form.valid()==true){
            $.ajax({
              url:'<?=base_url()?>diagnosis-appointment-form-doctor',
              method:'post',
              data:formData,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data){
                if(typeof(data)=='object'){
                  if(data['swall']['type']=='success'){
                    //reset_patient_details_form();
                    //reset_search_patient_form();
                    //reset_diagnosis_appointment_form();
                    //show_diagnosis_appointment_list();
                  }
                  swal({
                    html:true,
                    title:data['swall']['title'],
                    text:data['swall']['text'],
                    type:data['swall']['type']
                  });
                }/*else{
                  location.reload();
                }*/
             records = [];
             $("#service_list").empty();   
              },
            });
          }
        }else{
          //collapseOne.classList.add('show');
       
        }
    });


  $('#other_services_form').on('submit',function(event){
      event.preventDefault(); 
      var opd_id= $('#opd_id').val();
     

       if(opd_id){
          var form = $("#other_services_form");
          var formData = new FormData(this);
        formData.append('opd_id',opd_id);
        formData.append('tableData', JSON.stringify(tableData1));

          if(form.valid()==true){
            $.ajax({
              url:'<?=base_url()?>add-other-services-action',
              method:'post',
              data:formData,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data){
                if(typeof(data)=='object'){
                  if(data['swall']['type']=='success'){
                    
                    show_services_list();
                    services_all();
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
             
             $("#other_services_list").empty();  
             tableData1 = []; 
              },
            });
          }
        }else{
         collapseOne.classList.add('show');
       
        } 

     
       
    });

  $('#consumable_form').on('submit',function(event){
      event.preventDefault(); 
      var opd_id= $('#opd_id').val();
       if(opd_id){
          var form = $("#consumable_form");
          var formData = new FormData(this);
        formData.append('opd_id',opd_id);
        formData.append('tableData', JSON.stringify(consumable_tableData));

          if(form.valid()==true){
            $.ajax({
              url:'<?=base_url()?>add-consumable-action',
              method:'post',
              data:formData,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data){
                if(typeof(data)=='object'){
                  if(data['swall']['type']=='success'){
                    
                    show_consumable_list();
                    consumable_all();
                  }
                  swal({
                    html:true,
                    title:data['swall']['title'],
                    text:data['swall']['text'],
                    type:data['swall']['type']
                  });
                }/*else{
                  location.reload();
                }*/
             records = [];
             $("#product_list").empty();   
              },
            });
          }
        }else{
          //collapseOne.classList.add('show');
       
        }
    });


    const  prescription_data = [];
  function add_prescription() {
      var drug_id = $("#drug_name").val();
      var drug_Text = $("#drug_name option:selected").text();
      var unit = $("#unit").val();
      var route = $("#route").val();
      var freq_m = $("#M").val();
      var freq_a = $("#A").val();
      var freq_e = $("#E").val();
      var freq_n = $("#N").val();
      var duration = $("#duration").val();
      var duration_type = $("#duration_type").val();
      var total_qnty = $("#total_qnty").val();
      var start_date = $("#start_date").val();
      var end_date = $("#end_date").val();
      var instruction = $("#instrction").val();
      var advice = $("#advice").val();
      var diet_remark = $("#diet_remark").val();
      var opd_id=$('#opd_id').val();

      if (drug_id && unit) {
           
          var prescription_entry = [
              drug_id, unit, route, freq_m, freq_a,
              freq_e, freq_n, duration, duration_type,
              total_qnty, start_date, end_date, instruction, advice, diet_remark,opd_id
          ];

        prescription_data.push(prescription_entry);


          var html = '<tr style="font-size: 18px;">\
                  <td style="border-right:1px solid lightgray"><i class="fa fa-times delete_prescription_item"></i></td>\
                          <td style="border-right:1px solid lightgray">' + drug_Text + '</td>\
                          <td style="border-right:1px solid lightgray">' + unit + '</td>\
                          <td style="border-right:1px solid lightgray">' + route + '</td>\
                          <td style="border-right:1px solid lightgray">' + freq_m +freq_a+freq_e+freq_n+'</td>\
                          <td style="border-right:1px solid lightgray">' + duration + '</td>\
                          <td style="border-right:1px solid lightgray">' + duration_type + '</td>\
                          <td style="border-right:1px solid lightgray">' + total_qnty + '</td>\
                          <td style="border-right:1px solid lightgray">' + start_date + '</td>\
                          <td style="border-right:1px solid lightgray">' + end_date + '</td>\
                          <td style="border-right:1px solid lightgray">' + instruction + '</td>\
                          <td style="border-right:1px solid lightgray">' + advice + '</td>\
                          <td style="border-right:1px solid lightgray">' + diet_remark + '</td>\
                      </tr>';

          $('#prescription_list').append(html);
          
          reset_prescription();

         
      } else {
          alert("Please select values for all fields.");
      }
  }

  function reset_prescription(){

 
     $("#drug_name").val('default').selectpicker("refresh");
     $("#unit").val('default').selectpicker("refresh");
     $("#route").val("");
     $("#M").val("");
     $("#A").val("");
     $("#E").val("");
     $("#N").val("");
     $("#duration").val("");
     $("#duration_type").val("");
     $("#total_qnty").val("");
     $("#start_date").val("");
     $("#end_date").val("");
     $("#instrction").val("");
     $("#advice").val("");
     $("#diet_remark").val("");


  }

   $('#prescription_list').on('click', '.delete_prescription_item', function() {
    var rowIndex = $(this).closest('tr').index();
    tableData.splice(rowIndex, 1);
    $(this).closest('tr').remove();
  });

   $('#other_services_list').on('click', '.delete_item', function() {
    var rowIndex = $(this).closest('tr').index();
    tableData.splice(rowIndex, 1);
    $(this).closest('tr').remove();
  });

  $('#product_list').on('click', '.delete_item', function() {
    var rowIndex = $(this).closest('tr').index();
    tableData.splice(rowIndex, 1);
    $(this).closest('tr').remove();
  });


   $('#prescription_action').on('submit',function(event){
        event.preventDefault(); 
      var opd_id= $('#opd_id').val();
        if(opd_id){
          var form = $("#prescription_action");
          var formData = new FormData(this);
        formData.append('tableData', JSON.stringify(prescription_data));

          if(form.valid()==true){
            $.ajax({
              url:'<?=base_url()?>prescription-action',
              method:'post',
              data:formData,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data){
                if(typeof(data)=='object'){
                  if(data['swall']['type']=='success'){
                    
                  }
                  swal({
                    html:true,
                    title:data['swall']['title'],
                    text:data['swall']['text'],
                    type:data['swall']['type']
                  });
                }/*else{
                  location.reload();
                }*/
             records = [];
             $("#prescription_list").empty();   
              },
            });
          }
        }else{
          //collapseOne.classList.add('show');
       
        }
    });

   /*
   function reset_clinical_examinition_form(){


    $('#medical_history').val('');
    $('#surgical_history').val('');
    $('#smoking').val('');
    $('#smoking_since').val('');
    $('#alcohol').val('');
    $('#alcohol_since').val('');
    $('#tobacco').val('');
    $('#tobacco_since').val('');
    $('#diet').val('');
    $('#diet_since').val('');
    $('#built').val('');
    $('#lean').val('');
    $('#average').val('');
    $('#healthy').val('');
    $('#obese').val('');
    $('#cns').val('');
    $('#cvs').val('');
    $('#rs').val('');
    $('#inspection').val('');
    $('#palpation').val('');
    $('#percusion').val('');
    $('#auscultation').val('');
    $('#local_examiniation').val('');
    $('#per_rectal_examination').val('');
    $('#provisional').val('');
    $('#differential_diagnosis').val('');
    $('#final_diagnosis').val('');
    $('#immediate_management').val('');
    $('#preventive_measures').val('');
    $('#plan_of_care').val('');
    $('#nutritional_status').val('');
    $('#cliex_complaint_name').val('');
    $('#temperature').val('');
    $('#PR').val('');
    $('#RR').val('');
    $('#systolic_bp').val('');
    $('#diastolic_bp').val('');
    $('#heart_rate').val('');
    $('#spO2').val('');
    $('#height').val('');
    $('#weight').val('');
    $('#BMI').val('');
    $('#BSA').val('');
    $('#BMI_Remark').val('');
    $('#CVP').val('');


   }
  */

   $('#clinical_examinition_action').on('submit',function(event){

      alert('sdsad');
        event.preventDefault(); 
        var opd_id= $('#opd_id').val();
        if(opd_id){
          var form = $("#clinical_examinition_action");
          var formData = new FormData(this);
          formData.append('appointment_id',opdid);
          
          if(form.valid()==true){
            $.ajax({
              url:'<?=base_url()?>clinical-examinition-action',
              method:'post',
              data:formData,
              cache: false,
              contentType: false,
              processData: false,
              success:function(data){
                if(typeof(data)=='object'){
                  if(data['swall']['type']=='success'){
                    
                    
                  }
                  swal({
                    html:true,
                    title:data['swall']['title'],
                    text:data['swall']['text'],
                    type:data['swall']['type']
                  });
                }/*else{
                  location.reload();
                }*/
             records = [];
             $("#").empty();   
              },
            });
          }
        }else{
          //collapseOne.classList.add('show');
       
        }
    });

    function reset_IT_form(){

          $('#IT_date').val('');
          $('#IT_task').val('');
          $('#IT_description').val('');
          $('#IT_time').val('');

    }


  $('#discharge_action').on('submit',function(event){
    event.preventDefault(); 
    var form = $("#discharge_form");
    var formData = new FormData(this);
    formData.append('appointment_id',opdid);
      $.ajax({
        url:'<?=base_url()?>discharge-form-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){

            //reset_discharge_form();
           
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      });

      
  });

   $('#LOT_task_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $("#LOT_task_form");
    var formData = new FormData(this);
    formData.append('appointment_id',opdid);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>LOT-task-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              reset_IT_form();
              get_IT_list();
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
    }
  });


   $(document).on('click','.delete_record',function () {
    LOT_id=$(this).attr('LOT_id');
    if (LOT_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>LOT-task-delete',
          method:'post',
          data:{sd_id:sd_id},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
              get_IT_list();
            }else{
              location.reload();
            }
          }
        })
      }
    }else{
      alert("Something Went Wrong..!");
      location.reload();
    }
  });

  $(document).on('click','.edit_record',function () {
    LOT_id=$(this).attr('LOT_id');
    if (LOT_id) {
      $.ajax({
        url:'<?=base_url()?>LOT-task-by-id',
        method:'post',
        data:{LOT_id:LOT_id},
        async: false,
        success:function (data) {
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Task');
            $('#IT_date').val(data['record']['lot_date']);
            $('#IT_task').val(data['record']['task']);
            $('#IT_description').val(data['record']['description']);
            $('#IT_time').val(data['record']['lot_time']);
            $('#LOT_id').val(LOT_id);

          }else{
            location.reload();
          }
        }
      })
    }else{
      alert("Something Went Wrong..!");
      location.reload();
    }
  });

  function reset_LOT_remark_modal()
  {
    $('#LOT_remark').val('');

  }

  $(document).on('click','.update_status',function(){
        LOT_id=$(this).attr('LOT_id');
        LOT_remark=$('#LOT_remark').val();
        if(LOT_id)
        {
          $.ajax({
            url:'<?=base_url()?>LOT-remark-action',
            method:'post',
            data:{LOT_id:LOT_id,LOT_remark:LOT_remark},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  
                  reset_LOT_remark_modal();
                  $('#LOT_remark_modal').modal('hide');
                }
                swal({
                          html:true,
                          title:data['swall']['title'],
                          text:data['swall']['text'],
                          type:data['swall']['type'],
                        });
            }
        })
    }
    });



   function consumable_all(){

        $.ajax({
            url:"<?php echo base_url();?>get-consumable-list",
            method:'post',
            dataType: 'json',
            data:{appointment_id:opdid},
            success:function(data){

              console.log(data);
               html="";
                for (i=0;i<data.length;i++){

                    html+='<tr>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['insert_datetime']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['product_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['consumable_status']+'</td>\
                                    </tr>'; 

                }
                $('#consumable_list').html(html);
              
            },
        });  


  }

  $(document).on('click','.change_consumable_state',function(){
        p_id=$(this).attr('p_id');
        p_status=$(this).attr('p_status');

        var P_text="";
        if(p_status=='Pending'){
          P_text='Are You Sure Want To Cancel This Consumable ?';
        }else if(p_status=='Dispatched'){
          P_text='Are You Sure Want To Completed This Consumable ?';
        }
       
        if(p_id)
        {
          if (confirm(P_text)==true) {
          $.ajax({
            url:'<?=base_url()?>change-consumable-state',
            method:'post',
            data:{p_id:p_id,p_status:p_status},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  
                  consumable_all();
                }
                swal({
                          html:true,
                          title:data['swall']['title'],
                          text:data['swall']['text'],
                          type:data['swall']['type'],
                        });
            }
        })
          }
        }
    });

  $(document).on('click','.change_prescription_state',function(){
        p_id=$(this).attr('p_id');
        p_status=$(this).attr('p_status');

        var P_text="";
        if(p_status=='Pending'){
          P_text='Are You Sure Want To Cancel This Prescription ?';
        }else if(p_status=='Dispatched'){
          P_text='Are You Sure Want To Completed This Prescription ?';
        }
       
        if(p_id)
        {
          if (confirm(P_text)==true) {
          $.ajax({
            url:'<?=base_url()?>change-prescription-state',
            method:'post',
            data:{p_id:p_id,p_status:p_status},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  
                  patient_prescription_all();
                }
                swal({
                          html:true,
                          title:data['swall']['title'],
                          text:data['swall']['text'],
                          type:data['swall']['type'],
                        });
            }
        })
          }
        }
    });

  function services_all(){
        $.ajax({
            url:"<?php echo base_url();?>get-services-list",
            method:'post',
            dataType: 'json',
            data:{appointment_id:opdid},
            success:function(data){

              console.log(data);
               html="";
                for (i=0;i<data.length;i++){

                    html+='<tr>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['appointment_datetime']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['services_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['service_status']+'</td>\
                                    </tr>'; 

                }
                $('#services_list').html(html);
              
            },
        });  


  }

  $(document).on('click','.change_service_state',function(){
        ASA_id=$(this).attr('asa_id');
        ASA_status=$(this).attr('asa_status');
        if(ASA_id)
        {
          if (confirm('Are you sure Want to cancel this service !')==true) {
          $.ajax({
            url:'<?=base_url()?>change-service-state',
            method:'post',
            data:{ASA_id:ASA_id},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  
                  services_all();
                }
                swal({
                          html:true,
                          title:data['swall']['title'],
                          text:data['swall']['text'],
                          type:data['swall']['type'],
                        });
            }
        })
          }
        }
    });

  function patient_prescription_all(){

        $.ajax({
            url:"<?php echo base_url();?>patient-prescription-all",
            method:'post',
            dataType: 'json',
            data:{appointment_id:opdid},
            success:function(data){

              console.log(data);
               html="";
                for (i=0;i<data.length;i++){

                    html+='<tr>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['product_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['unit']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['route']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['morning']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['afternoon']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['evening']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['night']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['duration']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['duration_type']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['total_quantity']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['start_date']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['end_date']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['instruction']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['advice']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['remark']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['status']+'</td>\
                                    </tr>'; 

                }
                $('#patient_prescription_list').html(html);
              
            },
        });  


  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  get_list();
  OT_room_all();
  ot_doctors_all();

  $('#primary_surgeon').selectpicker();
  $('#secondary_surgeon').selectpicker();
  $('#s_service_name').selectpicker();



  $('#OT_form').hide();
  $('#after_ot_form').hide();

  function get_list(){
    if ($.fn.DataTable.isDataTable('#datatable_list'))
    {
      var table = $('#datatable_list').DataTable();
      table.destroy();
      table.clear();
      table.state.clear();
    }
      
    var table=$('#datatable_list').DataTable({
      'processing': true,
      'serverSide': true,
      'orderable':false,
      'serverMethod': 'post',
      'autoWidth':true,
      'stateSave': true,
      'ajax': {
        'url':'<?=base_url()?>booked-ot-list',
        'data':{opd_id:opdid},
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "UHID",data:"uhid",mSearch:true},
        {title: "Room No",data:"room_name",mSearch:false},
        {title: "Operation Name",data:"name",mSearch:false},
        {title: "Operation Type",data:"operation_type",mSearch:false},
        {title: "Primary Surgent",data:"primary_surgent",mSearch:false},
        {title: "Schedule Date",data:"schedule_date",mSearch:false},
        {title: "From Time",data:"from_time",mSearch:false},
        {title: "To Time",data:"to_time",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9] },
                {
                  'targets': [0,1,2,3,4,5,6,7,8,9], 
                   'createdCell':  function (td, cellData, rowData, row, col) {
                        $(td).attr('style', 'white-space: nowrap;'); 
                    }
                }
            ],
      });

    $('#datatable_list tfoot tr th').each( function () {
      var title = $(this).text();
      if(title!="")
      { 
        $(this).html( '<input type="text" style="fit-content;" placeholder="'+title+'" /> ' );  
      }
    } );

    table.columns().every( function () {
      var that = this;
      $( 'input[type=text]', this.footer() ).on( 'keyup', function (e) {
        if (that.search() !== this.value) {
          that
          .search(this.value)
          .draw();
        }
      });
    });
  }

 

 $('.check-OT-btn').click(function(){

  $('#check_OT_by_time_modal').modal('show');
 })

 $('.close_model').click(function(){
  $('#from_time').val('');
  $('#to_time').val('');
  $('#check_OT_by_time_modal').modal('hide');
  
 })

 $('.close_ot_model').click(function(){


    show_default();
    show_OT_calender();
    reset_OT_book_form();
    $('#after_ot_form').hide();

 })

 function show_default(){

  $('.all_ot_list').show();
 }

 function OT_room_all() {
    $.ajax({
      url:'<?=base_url()?>OT-room-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="";
           html+='<option selected="" disabled="">Select Operation Theater</option>'; 
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#ot_room").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  $('#ot_room').change(function(){
    if(selected_date){
      var booking_ot=$('#ot_room').val();
      check_OT_bookings(booking_ot,selected_date);
    }

  })
  var selected_date='';

  $(document).on('click', '.fc-day', function(){
    $('.fc-day').removeAttr('style');
    $(this).css('background-color', 'khaki');
    var booking_ot=$('#ot_room').val();
    var booking_date=$(this).attr('data-date');
    selected_date=booking_date;
    
    check_OT_bookings(booking_ot,booking_date);
   
  });

  function check_OT_bookings(booking_ot,booking_date){
    $.ajax({
      url:'<?=base_url()?>check-OT-booking',
      method:'post',
      async: false,
      dataType: 'json',
      data:{OT_room:booking_ot,booking_date,booking_date},
      success:function (data) { 
         html="";
              if(typeof(data)=='object'){
                 for (i=0;i<data['record'].length;i++){
                  html+=
                        '<div class="row">\
                          <label class="col-lg-4">Date<b class="pull-right">:</b></label>\
                          <label class="col-lg-6">'+data['record'][i]['booked_date']+'</label>\
                        </div>\
                        <div class="row">\
                          <label class="col-lg-4">Room No.<b class="pull-right">:</b></label>\
                          <label class="col-lg-6">'+data['record'][i]['room_no']+'</label>\
                        </div>\
                        <div class="row">\
                        <label class="col-lg-4">UHID <b class="pull-right">:</b></label>\
                        <label class="col-lg-6">'+data['record'][i]['uhid']+'</label>\
                        </div>\
                        <div class="row">\
                          <label class="col-lg-4">Patient Name <b class="pull-right">:</b></label>\
                          <label class="col-lg-6">'+data['record'][i]['patient_name']+'</label>\
                        </div>\
                        <div class="row">\
                          <label class="col-lg-4">From Time <b class="pull-right">:</b></label>\
                          <label class="col-lg-2">'+data['record'][i]['booked_from_time']+'</label>\
                          <label class="col-lg-2">To Time <b class="pull-right">:</b></label>\
                          <label class="col-lg-4">'+data['record'][i]['booked_to_time']+'</label>\
                        </div><br>\
                        '
                    }
                    

              }else{
                //html+='No booking available';
              }
              $('#booked_ot_list').html(html);
      }
    })
  }

  function show_ot_form(){
    $('#calendar').hide();
    $('.all_ot_list').hide();

    
    $('#OT_form').show();
        
  }

  $('#check_OT_by_time_form').on('submit',function(event){
    event.preventDefault(); 

    var form = $( "#check_OT_by_time_form");
    var formData = new FormData(this);


    var ot_room=$('#ot_room').val();
    var selected_date=$('#ot_date').val();
    
    if(ot_room && selected_date ){
      $.ajax({
      url:'<?=base_url()?>check-OT-by-time',
      method:'post',
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        if(typeof(data)=='object'){


          if(data['swall']['type']=='warning'){
              swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }else{

            show_ot_form();
           
            $('#check_OT_by_time_modal').modal('hide');
            $('#schedule_start_time').val(data['swall']['from_time']);
            $('#schedule_end_time').val(data['swall']['to_time']);
            $('.ot_record_form_title').html('OT Notes');

            


          }

        }else{

            
        }
      },
    });
    }else{

      alert('Please Select Room and Date')
    }

  });

   function ot_doctors_all(){
        $.ajax({
        url:'<?=base_url()?>doctor-by-section-id',
        method:'post',
        async: false,
        dataType: 'json',
        data:{section_name:2},
        success:function (data) {

          if(typeof(data)=='object'){

            var html="<option value='' selected disable>Select Doctor</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html+="<option value='"+data['record'][i]["id"]+"' type='"+data['record'][i]["type"]+"'>"+data['record'][i]["name"]+"</option>";  
            }
            $("#primary_surgeon").html(html);

            var html1="<option value='' selected disable>Select Secondary Doctor</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html1+="<option value='"+data['record'][i]["id"]+"' type='"+data['record'][i]["type"]+"'>"+data['record'][i]["name"]+"</option>";  
            }
            $("#secondary_surgeon").html(html1);



          }else{
            location.reload();
          }
        }
      })
    }

    function  reset_OT_book_form(){

      $('.record_form_title').html('Booked OT List');
      $('#ot_room').val('');
      $("#primary_surgeon").val('default').selectpicker("refresh");
      $("#secondary_surgeon").val('default').selectpicker("refresh");
      $('#surgery_name').val('');
      $('#primary_surgeon').val('');
      $('#secondary_surgeon').val('');
      $('#primary_nurse').val('');
      $('#scrub_nurse').val('');
      $('#equipment').val('');
      $('#operation_type').val('');
      $('#anesthesia_status').val('');
      $('#anesthetist').val('');
      $('#anesthesia_type').val('');
      $('#On_call_doctor').val('');
      $('#remark').val('');
      $('#diagnosis').val('');
      $('#ot_id').val('');
      $('#after_ot_form').hide();

      $('#patient_in_timestamp').val('');
      $('#antibiotic_timestamp').val('');
      $('#incision_timestamp').val('');
      $('#antibiotic_used').val('');
      $('#patient_out_timestamp').val('');
      $('#cleaning_start_timestamp').val('');
      $('#cleaning_end_timestamp').val('');
      $('#implant_used').val('');
      $('#implant_type').val('');


      
    }

  function show_OT_calender(){

      $('#OT_form').hide();
      $('#calendar').show();
   

  }


  $('#OT_book_action').on('submit',function(event){

    event.preventDefault(); 
    var form = $( "#OT_book_action");
    var formData = new FormData(this);
    var ot_room=$('#ot_room').val();
    formData.append('ot_room',ot_room);
    formData.append('schedule_date',selected_date);
    formData.append('opd_id',opdid);


    if(ot_room){
        $.ajax({
        url:'<?=base_url()?>OT-book-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){

            reset_OT_book_form();
            show_OT_calender();
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      });
    }else{
      alert('Please Select OT Room');
    }
   
    
  });

  $(document).on('click','.delete_record',function () {
      ot_id=$(this).attr('ot_id');
      if (ot_id) {
        if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
          $.ajax({
            url:'<?=base_url()?>ot-delete',
            method:'post',
            data:{ot_id:ot_id},
            async: false,
            success:function (data) { 
               if(typeof(data)=='object'){
                swal({
                  html:true,
                  title:data['swall']['title'],
                  text:data['swall']['text'],
                  type:data['swall']['type']
                });
                get_list();
              }else{
                location.reload();
              }
            }
          })
        }
      }else{
        alert("Something Went Wrong..!");
        location.reload();
      }
    });


  $(document).on('click','.edit_record',function () {
    show_ot_form();
    $('#after_ot_form').show();
    //ot_id=$(this).attr('ot_id');
    // if (ot_id) {
    //   $.ajax({
    //     url:'<?=base_url()?>ot-by-id',
    //     method:'post',
    //     data:{ot_id:ot_id},
    //     async: false,
    //     success:function (data) {  

    //       if(typeof(data)=='object'){
            
    //         $('.record_form_title').html('Edit OT');
    //         $('#ot_room').val(data['record']['ot_room_id']);
    //         $('#surgery_name').val(data['record']['ot_operation_name']);
    //         $('#primary_surgeon').selectpicker('val',data['record']['ot_primary_surgent']);
    //         $('#secondary_surgeon').selectpicker('val',data['record']['ot_secondary_surgent']);
    //         $('#primary_nurse').val(data['record']['ot_nurse']);
    //         $('#scrub_nurse').val(data['record']['ot_scrub_nurse']);
    //         $('#equipment').val(data['record']['ot_equipment']);
    //         $('#operation_type').val(data['record']['ot_operation_type']);
    //         $('#anesthetist').val(data['record']['ot_anesthesia']);
    //         $('#anesthesia_type').val(data['record']['ot_anesthesia_type']);
    //         $('#On_call_doctor').val(data['record']['ot_on_call_doctor']);
    //         $('#remark').val(data['record']['ot_remark']);
    //         $('#diagnosis').val(data['record']['ot_diagnosis']);

    //         $('#patient_in_timestamp').val(data['record']['ot_patient_in_timestamp']);
    //         $('#antibiotic_timestamp').val(data['record']['ot_patient_antibiotic_timestamp']);
    //         $('#incision_timestamp').val(data['record']['ot_incision_timestmap']);
    //         $('#antibiotic_used').val(data['record']['ot_antibiotic_used']);
    //         $('#patient_out_timestamp').val(data['record']['ot_patient_out_timestamp']);
    //         $('#cleaning_start_timestamp').val(data['record']['ot_cleaning_start_timestamp']);
    //         $('#cleaning_end_timestamp').val(data['record']['ot_cleaning_end_timestamp']);
    //         $('#implant_used').val(data['record']['ot_implant_used']);
    //         $('#implant_type').val(data['record']['ot_implant_type']);

    //         $('#ot_id').val(ot_id);
           
    //       }else{
    //         //location.reload();
    //       } 
    //     }
    //   })
    // }else{
    //   alert("Something Went Wrong..!");
    //   location.reload();
    // } 
  

  });



  ////////////////////////////////////////////////////////////////////////////////////

  function get_bed_list(){

    $.ajax({
      url:'<?=base_url()?>get-bed-list',
      method:'post',
      async: false,
      dataType: 'json',
      data:{appointment_id:opdid},
      success:function (data) { 
        

        console.log(data);
        
        html="";
        for (var i=0;i<data['result'].length;i++){

            html+='<tr>\
                              <td style="border-right:1px solid lightgray">'+data['result'][i]['name']+'</td>\
                              <td style="border-right:1px solid lightgray">'+data['result'][i]['start_date']+'</td>\
                              <td style="border-right:1px solid lightgray">'+data['result'][i]['end_date']+'</td>\
                            </tr>'; 

        }
        $('#bed_list').html(html);
      }
    })

  
  }


  function reset_transfer_bed(){

    $('#floor_number').val('');
    $('#ward_number').val('');
    $('#room_number').val('');
    $('#bed_number').val('');
  }

 

  $('#transfer_bed_form').on('submit',function(event){

    event.preventDefault(); 
    var form = $( "#transfer_bed_form");
    var formData = new FormData(this);
    formData.append('appointment_id',opdid);
    
      $.ajax({
        url:'<?=base_url()?>transfer-bed-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){

            $('#transfer_bed_modal').modal('hide');
            reset_transfer_bed();
            get_bed_list();
            $('#IBA_id').val(data['swall']['IBA_id']);
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      });
  });



  function generate_discharge_report(){

    url = '<?=base_url()?>generate-discharge-report/' + opdid + '?action=Print';
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");


  }



  /////////////////////////////////////////////////////////////////////////
  
  

  /////////////////////////////////////////////////////////////////////

  


  function reset_patient_refer(){

    $('#PR_d_name').val('');
    $('#PR_user_id').val('');
    $('#datetime-local').val(''); 


  }


  $('#patient_refer_form').on('submit',function(event){

    event.preventDefault(); 
    alert('sadas');

    
    var form = $("#patient_refer_form");
    var formData = new FormData(this);
    formData.append('opd_id',opdid);
      $.ajax({
        url:'<?=base_url()?>patient-refer-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){

            reset_patient_refer();
            patient_refer_list();

            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      }); 
  });


function get_favourite_service(){

  $.ajax({
      url:'<?=base_url()?>get-favourite-service',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        
        html="";
        for (var i=0;i<data['result'].length;i++){

            html+='<tr>\      <td style="border-right:1px solid lightgray"><input type="checkbox" class="favoriteServiceCheckbox" data-service-id="' + data['result'][i]['sid'] + '" data-service-text="' + data['result'][i]['name'] + '" data-dept-text="' + data['result'][i]['dname'] + '" data-dept-id="' + data['result'][i]['did'] + '"></td>\
                              <td style="border-right:1px solid lightgray">'+data['result'][i]['dname']+'</td>\
                              <td style="border-right:1px solid lightgray">'+data['result'][i]['name']+'</td>\
                              <td style="border-right:1px solid lightgray"><i class="fa fa-trash fs_delete_item" aria-hidden="true" fs_id="'+data['result'][i]['id']+'"></i></td>\
                            </tr>'; 

        }
        $('#FS_list').html(html); 
      }
    })


}

$('#favourite_service_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $("#favourite_service_form");
    var formData = new FormData(this);
      $.ajax({
        url:'<?=base_url()?>favourite-service-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){

            get_favourite_service();
           
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      }); 
  });


  $('#FS_list').on('click', '.delete_item', function() {
      var rowIndex = $(this).closest('tr').index();
      tableData.splice(rowIndex, 1);
      $(this).closest('tr').remove();
  });

   $(document).on('click','.fs_delete_item',function () {
    var fs_id=$(this).attr('fs_id');

    if (fs_id) {
      if (confirm('Are You Sure Want To Delete This Favorite Service ?')==true) {
        $.ajax({
          url:'<?=base_url()?>favorite-service-delete',
          method:'post',
          data:{fs_id:fs_id},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
              get_favourite_service();
            }else{
              //location.reload();
            }
          }
        })
      }
    }else{
      alert("Something Went Wrong..!");
      location.reload();
    }
  });

   

   
   $(document).on('change', '.favoriteServiceCheckbox', function() {
    if ($(this).is(':checked')) {
      var serviceId = $(this).attr('data-service-id');
      var servicetext = $(this).attr('data-service-text');
      var depttext = $(this).attr('data-dept-text');
      var deptid = $(this).attr('data-dept-id');

      
      fs_id=serviceId;
      fs_text=servicetext;
      fs_dept_text=depttext;
      fs_dept_id=deptid;

      //console.log(fs_id,fs_text,fs_dept_text,fs_dept_id);
      add_record();

    }
}); 

   function consultation_status_action(){

    var cons_status=$('#cons_status').val();
    if(cons_status=='Yes'){
     $.ajax({
          url:'<?=base_url()?>consultation-status-action',
          method:'post',
          data:{opdid:opdid},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
              get_favourite_service();
            }else{
              //location.reload();
            }
          }
        })
        
    }

   }

   


    
</script>
