<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" id="opd_appointment_tabel">
      <div class="ibox-title"  style="padding-top: 10px !important;padding-right: 20px;">
          <div class="row" >
            <div class="col-lg-4">
                <h2><b>OPD Registration List</b></h2>
            </div>
            <div class="col-lg-3">
                <form action="" style="width: 100%">
                  <input type="hidden" name="daterange" id="daterangeinput" value="<?=!empty($_GET['daterange'])? $_GET['daterange']:''?>">
                  <div id="daterangepicker" class="" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; ">
                      <i class="fa fa-calendar"></i>&nbsp;
                      <span><?=!empty($_GET['daterange'])? substr_replace($_GET['daterange'],' to ',10,2):''?></span> 
                      <i class="fa fa-caret-down"></i>
                  </div>
                </form>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
            </div>
            <div class="col-lg-3">
              <button class="btn btn-primary pull-right "  onclick="show_opd_appointment_form()" style="top: 0;"><i class="fa fa-plus"></i>Add New Registration</button>
            </div>
          </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">UHID</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Number</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Date-Time</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Patient Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Patient Mobile No.</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Doctor</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Category</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Company</th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Pay Status</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Appointment Status</th>
                <th nowrap="nowrap" ></th>
               
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row" id="opd_appointment_form">
    <div class="col-lg-12" >
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h2><b>New OPD Registration</b></h2> 
        <button class="btn btn-primary show-inward-table pull-right" onclick="show_opd_appointment_table()"><b>Registration List</b></button>
      </div>
        <div class="ibox-content" style="padding: 0px;">
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header">
                        <a class="card-title">
                           <h3 style="margin: 0px;">Search Patient</h3>
                        </a>
                    </div>
                    <div class="card-body">
                      <form method="post"  enctype="multipart/form-data" id="search_patient_form">
                        <div class="row" style="margin:  0px;">
                                                   
                        </div>
                        <div style="margin: 0px;margin-top: 5px;">
                         <div class="col-12">
                          <div class="row" style="display: flex; flex-wrap: nowrap;>
                            <label class="form-control col-4" style="border:0px; font-size: larger;">UHID:</label>
                            <div class="col-8">
                              <input class="form-control" type="text" name="search_uhid" id="search_uhid" oninput="this.value = this.value.toUpperCase()" placeholder="UHID">
                            </div>
                          </div>
                         </div><br>
                        <div class="col-12">
                          <div class="row" style="display: flex; flex-wrap: nowrap;>
                              <label class="form-control col-lg-2" style="border:0px;">Mobile Number :</label>
                             <div class="col-lg-3">
                               <input class="form-control" type="text" name="search_mobile_no" id="search_mobile_no" placeholder="Mobile No." minlength="10" maxlength="10">
                             </div>
                         </div>
                        </div><br>
                         <div class="col-12">
                          <div class="row" style="display: flex; flex-wrap: nowrap;>
                          <label class="form-control col-lg-2" style="border:0px;">Aadhar Card No :</label>
                             <div class="col-lg-3">
                               <input class="form-control" type="text" name="search_adhar_card" id="search_adhar_card" placeholder="Aadhar Card No." minlength="12" maxlength="12">
                             </div>
                         </div>
                     </div><br>
                         <div class="col-12">
                           <div class="row" style="display: flex; flex-wrap: nowrap;>
                          <label class="form-control col-lg-2" style="border:0px;">First Name :</label>
                          <div class="col-lg-3">
                            <input class="form-control" type="text" name="search_first_name" id="search_first_name" placeholder="First Name" oninput="this.value = this.value.toUpperCase()">
                           </div>
                         </div>
                     </div><br>
                         <div class="col-12">
                           <div class="row" style="display: flex; flex-wrap: nowrap;>
                              <label class="form-control col-lg-2" style="border:0px;">Last Name :</label>
                            <div class="col-lg-3">
                              <input class="form-control" type="text" name="search_last_name" id="search_last_name" placeholder="Last Name" oninput="this.value = this.value.toUpperCase()">
                            </div>
                         </div> 
                         </div><br>  
                           <button class="btn btn-danger col-lg-2" type="reset">Reset</button><br> 
                          <button class="btn btn-primary col-lg-2" type="submit">Search</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
                                
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header" id="headingOne" data-toggle="collapse" href="#collapseOne">
                        <a class="card-title">
                            <h3 class="patient_details_title" style="margin: 0px;">Add New Patient Details</h3>
                        </a>
                    </div>
                    <div class="card-body" style="padding-top: 0px;padding-bottom: 0px;">
                      <form method="post"  enctype="multipart/form-data" id="record_form">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" >
                          <div class="row" style="margin:0px;" >
                          </div>
                          <div class="row" style="margin: 0px;margin-top: 5px;">
                            <div class="col-12">
                            <div class="row" style="display: flex; flex-wrap: nowrap;>
                                <label class="form-control col-lg-2" style="border:0px;">Prefix :<a style="color: red">*</a></label>
                            <div class="col-lg-3">
                              <select class="form-control" name="prefix" id="prefix" required="">
                                <option value="" selected="" disabled="">Select Prefix</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss.">Miss.</option>
                                <option value="Mast.">Mast.</option>
                                <option value="Dr.">Dr. </option>
                              </select>
                            </div>
                           </div>
                           </div>
                            </div><br>
                           <div class="col-12">
                              <input class="form-control" type="hidden" name="patient_id" id="patient_id" >
                            <div class="row" style="display: flex; flex-wrap: nowrap;>
                            <label class="form-control col-lg-2" style="border:0px;">First Name :<a style="color: red">*</a></label>
                            <div class="col-lg-3">
                              <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" required="" oninput="this.value =                       this.value.toUpperCase()">
                           </div>
                           </div>
                           </div><br>
                           <div class="col-12">
                             <div class="row" style="display: flex; flex-wrap: nowrap;>
                            <label class="form-control col-lg-2" style="border:0px;">Middle Name :</label>
                            <div class="col-lg-3">
                              <input class="form-control" type="text" name="middle_name" id="middle_name" placeholder="Middle Name" oninput="this.value = this.value.toUpperCase()">
                           </div>
                           </div>
                           </div><br>
                           <div class="col-12">
                             <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;">Last Name :<a style="color: red">*</a></label>
                             <div class="col-lg-3">
                              <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" required="" oninput="this.value = this.value.toUpperCase()">
                             </div> 
                            </div>
                            </div><br> 
                           <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                  <label class="form-control col-lg-2" style="border:0px;">Mother's Name :</label>
                               <div class="col-lg-3">
                                <input class="form-control" type="text" name="mother_name" id="mother_name" placeholder="Mother's Name" oninput="this.value = this.value.toUpperCase()">
                              </div>
                             </div>
                             </div><br>
                           <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;">Father's Name :</label>
                               <div class="col-lg-3">
                              <input class="form-control" type="text" name="father_name" id="father_name" placeholder="Father's Name" oninput="this.value = this.value.toUpperCase()">
                              </div>
                              </div>
                             </div>
                          </div>
                          <div class="row" style="margin:0px;margin-top: 30px;" >
                            
                          </div>
                          <div class="row" style="margin:0px;margin-top: 5px;" >
                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;">Birth date :<a style="color: red">*</a></label>
                               <div class="col-lg-3">
                                  <input class="form-control" type="date" name="birth_date" id="birth_date" oninput="calculateAge()" required="">
                               </div>
                             </div>
                            </div><br><br>

                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                   <label class="form-control col-lg-2" style="border:0px;">Age :<a style="color: red">*</a></label>
                             <div class="col-lg-3">
                              <div class="form-row">
                                  <div class="col">
                                      <input type="text" class="form-control" id="outputyear" name="outputyear" placeholder="Year">
                                  </div>
                                  <div class="col">
                                      <input type="text" class="form-control" id="outputmonth" name="outputmonth" placeholder="Month">
                                  </div>
                                  <div class="col">
                                      <input type="text" class="form-control" id="outputday" name="outputday" placeholder="Day">
                                  </div>
                              </div>
                            </div>
                            </div>
                            </div><br><br>
                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                   <label class="form-control col-lg-2" style="border:0px;">Gender<a style="color: red">*</a></label>
                               <div class="col-lg-3">

                              <select class="form-control" name="gender" id="gender" required="">
                                <option value="" selected="" disabled="">Select Gender</option>
                                <option value="Male" >Male</option>
                                <option value="Female">Female</option>
                                <option value="Transgender">Transgender</option>
                                <option value="Not-Specify">Not Specify</option>
                              </select>
                            </div>
                            </div>
                            </div><br><br>
                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;">Marital Status</label>
                               <div class="col-lg-3">

                              <select class="form-control" name="marital_status" id="marital_status">
                                <option value="" selected="" disabled="">Select Marital Status</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widow">Widow</option>
                                <option value="Widower">Widower</option>
                              </select>
                            </div>
                             </div>
                            </div><br><br>
                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                   <label class="form-control col-lg-2" style="border:0px;">Identity Type</label>
                               <div class="col-lg-3">

                                <select class="form-control" name="identity_type" id="identity_type">
                                <option value="" selected="" disabled="">Select Document Type</option>
                                <option value="Aadhaar Card">Aadhar Card</option>
                                <option value="Pan Card">Pan Card</option>
                                <option value="Voter Id">Voter Id</option>
                                <option value="Passport">Passport</option>
                                <option value="Ration Card">Ration Card</option>
                                <option value="Driving Licence">Driving Licence</option>
                                <option value="Other">Other</option>
                              </select>
                            </div>
                             </div>
                            </div><br><br>



                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;">Identity Number</label>
                               <div class="col-lg-3">
                                <input class="form-control" type="text" name="identity_number" id="identity_number" placeholder="Identity Number">
                            </div>
                            </div>
                            </div>
                          </div><br><br>
                          <div class="row" style="margin:0px;margin-top: 30px;">
                          </div>
                          <div class="row" style="margin:0px;margin-top: 5px;">
                           <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                      <label class="form-control col-lg-2" style="border:0px;">Mobile Number<a style="color: red">*</a></label>
                              <div class="col-lg-3">
                              <input class="form-control" type="text" name="mobile_number" id="mobile_number" placeholder="Mobile Number" minlength="10" maxlength="10" required="">
                           </div>
                           </div>
                           </div><br><br>

                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                <label class="form-control col-lg-2" style="border:0px;">Alt. Mobile Number</label>
                              <div class="col-lg-3">
                                 <input class="form-control" type="text" name="alt_mobile_number" id="alt_mobile_number" placeholder="Alt Mobile No" minlength="10" maxlength="10">
                              </div>
                           </div>
                           </div><br><br>


                            <div class="col-12">
                              <div class="row" style="display: flex; flex-wrap: nowrap;>
                                <label class="form-control col-lg-2" style="border:0px;">Email Id</label>
                              <div class="col-lg-3">
                              <input class="form-control" type="text" name="email" id="email" placeholder="Email Address" oninput="this.value = this.value.toUpperCase()">
                           </div>
                           </div>
                           </div><br><br>


                           <div class="col-12">
                             <div class="row" style="display: flex; flex-wrap: nowrap;>
                                <label class="form-control col-lg-2" style="border:0px;">Occupation</label>
                              <div class="col-lg-3">
                                <select class="form-control"  name="occupation" id="occupation"></select>
                              </div>
                           </div>
                          </div><br><br>

                        <div class="col-12">
                             <div class="row" style="display: flex; flex-wrap: nowrap;>
                            <label class="form-control col-lg-10" style="border:0px;">Full Address<a style="color: red">*</a></label>
                            <div class="col-10">
                              <input class="form-control" type="text" id="per_address" name="per_address" required="" oninput="this.value = this.value.toUpperCase()">
                            </div>
                           <!--
                            <button class="btn btn-danger col-lg-2" type="reset">Reset All Details</button>-->
                          
                          </div>
                          </div>
                          <div class="row" style="margin:0px;margin-top: 5px;">
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="pincode" name="pincode" placeholder="Pincode" maxlength="6">
                                <div id="area_list" style="font-size:18px;display:none;font-size: 18px;position: absolute;z-index: 1;background: white;bottom: 40px;">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="area" name="area" placeholder="Area" required="" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="taluka" name="taluka" placeholder="Taluka" required="" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="district" name="district" placeholder="District" required="" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="state" name="state" placeholder="State" required="" oninput="this.value = this.value.toUpperCase()">
                            </div>

                            <!--
                            <button class="btn btn-primary col-lg-2 patient_details_submit_btn" type="submit">Save</button>
                            -->
                            
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>

            <form method="post"  enctype="multipart/form-data" id="opd_appointment_formdata">
            <div id="accordion" class="accordion" style="margin-top:10px;">
                <div class="card mb-0">
                    <div class="card-header">
                        <a class="card-title">
                          <h3 style="margin: 0px;">Add New Registartion</h3>
                        </a>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="row" style="margin: 10px 0px;">
                          </div>
                          <div class="row" style="margin: 10px 0px;">
                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                      <label class="form-control col-lg-2" style="border:0px;" >Department<a style="color: red">*</a></label>
                               <div class="col-lg-3">
                                <select class="form-control" name="d_name" id="d_name">
                                  <option value="" selected="" disabled="">Select Department</option>
                                </select>
                              </div>
                             </div>
                             </div><br><br>
                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;">Consultant Doctor</label>
                               <div class="col-lg-3">
                              <select class="form-control selectpicker" name="consulting_doctor" id="consulting_doctor" data-live-search="true"  name="user_id" >
                                <option value="" selected="" disabled="">Select Doctor</option>
                              </select>
                            </div>
                            </div>
                           </div><br><br>


                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                   <label class="form-control col-lg-2" style="border:0px;">Appointment Date<a style="color: red">*</a></label>
                               <div class="col-lg-3">
                              <input class="form-control" type="datetime-local" id="appointment_slot" name="appointment_slot"  required="" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            </div>
                           </div><br><br>


                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                  <label class="form-control col-lg-2" style="border:0px;">Patient Category<a style="color: red">*</a></label>
                               <div class="col-lg-3">

                              <select class="form-control" name="patient_category" id="patient_category" required="">
                                <option value="" selected="" disabled="">Select Patient Category</option>
                              </select>
                            </div>
                            </div>
                           </div><br><br>

                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                            <label class="form-control col-lg-2" style="border:0px;">Patient Company<a style="color: red">*</a></label>
                               <div class="col-lg-3">

                              <select class="form-control" name="patient_company" id="patient_company" required="">
                                <option value="" selected="" disabled="">Select Patient Company</option>
                              </select>
                            </div>
                            </div>
                           </div><br><br>

                          </div>
                          <div class="row" style="margin: 10px 0px;">
                            <div class="col-lg-2 emp_info_div">
                              <label class="form-control" style="border:0px;">Employee ID</label>
                            </div>
                            <div class="col-lg-2 emp_info_div">
                              <label class="form-control" style="border:0px;" >Employee Number</label>
                            </div>
                            <div class="col-lg-2 emp_info_div">
                              <label class="form-control" style="border:0px;">Employee Relationship</label>
                            </div>
                            <div class="col-lg-2 insurance-info-div">
                              <label class="form-control" style="border:0px;" >Insurance Company</label>
                            </div>
                            <div class="col-lg-2 insurance-info-div">
                              <label class="form-control" style="border:0px;">Insurance Policy No</label>
                            </div>
                            <div class="col-lg-2 health-card-info-div">
                              <label class="form-control" style="border:0px;">Health Card No</label>
                            </div>
                          </div>
                          <div class="row" style="margin: 10px 0px;">
                            <div class="col-lg-2 emp_info_div">
                              <input class="form-control" type="text" name="employee_id" id="employee_id" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2 emp_info_div">
                              <input class="form-control" type="text" name="employee_name" id="employee_name" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2 emp_info_div">
                              <input class="form-control" type="text" name="health_card_no" id="health_card_no" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2 insurance-info-div">
                              <input class="form-control" type="text" name="insurance_policy_company" id="insurance_policy_company" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2 insurance-info-div">
                               <input class="form-control" type="text" name="insurance_policy_no" id="insurance_policy_no" oninput="this.value = this.value.toUpperCase()">
                            </div> 
                            <div class="col-lg-2 ">
                              <input class="form-control health-card-info-div" type="text" name="health_card_no" id="health_card_no" oninput="this.value = this.value.toUpperCase()">
                            </div>
                          </div>
                          
                          <div class="row" style="margin: 10px 0px;">
                            
                          </div>
                          <div class="row" style="margin: 10px 0px;">
                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                  <label class="form-control col-lg-2" style="border:0px;">Referral Name</label>
                                 <div class="col-lg-3">
                                   <input class="form-control" type="text" name="Referral_name" id="Referral_name" oninput="this.value = this.value.toUpperCase()">
                                 </div>
                              </div>
                            </div><br><br>
                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;" >Referral Contact</label>
                                 <div class="col-lg-3">
                              <input class="form-control" type="text" name="Referral_contact" id="Referral_contact" oninput="this.value = this.value.toUpperCase()">
                            </div>
                           </div>
                            </div><br><br>

                           <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                 <label class="form-control col-lg-2" style="border:0px;">Referring Hospital</label>
                                 <div class="col-lg-3">
                              <input class="form-control" type="text" name="ref_hospital" id="ref_hospital" oninput="this.value = this.value.toUpperCase()">
                            </div>
                             </div>
                            </div><br><br>

                             <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                   <label class="form-control col-lg-2" style="border:0px;">Referring Doctor</label>
                                 <div class="col-lg-3">
                              <input class="form-control" type="text" name="ref_doctor" id="ref_doctor" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            </div>
                            </div><br><br>

                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                    <label class="form-control col-lg-2" style="border:0px;">Doctor Contact</label>
                                 <div class="col-lg-3">
                              <input class="form-control" type="text" name="ref_doctor_contact" id="ref_doctor_contact" oninput="this.value = this.value.toUpperCase()">
                            </div>
                           </div>
                            </div><br><br>


                            
                          </div>
                          <div class="row" style="margin: 10px 0px;">
                            
                          </div>
                          <div class="row" style="margin: 10px 0px;">
                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                    <label class="form-control col-lg-2" style="border:0px;">Relative Name</label>
                                 <div class="col-lg-3">
                               <input class="form-control" type="text" name="relative_name" id="relative_name" oninput="this.value = this.value.toUpperCase()">
                            </div>
                           </div>
                            </div><br><br>

                           <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                                        <label class="form-control col-lg-2" style="border:0px;">Relationship</label>
                                 <div class="col-lg-3">
                              <select class="form-control" name="relative_relationship" id="relative_relationship">
                               <option value="" selected="" disabled="">Select Relation</option>
                               <option value="Father">Father</option>
                               <option value="Mother">Mother</option>
                               <option value="Sister">Sister</option>
                               <option value="Brother">Brother</option>
                               <option value="Spouse">Spouse</option>
                               <option value="Other">Other</option>
                              </select>
                            </div>
                            </div>
                            </div><br><br>

                            <div class="col-12">
                               <div class="row" style="display: flex; flex-wrap: nowrap;>
                            <label class="form-control col-lg-2" style="border:0px;">Relative Contact</label>
                                 <div class="col-lg-3">

                               <input class="form-control" type="text" name="relative_contact" id="relative_contact" oninput="this.value = this.value.toUpperCase()">
                            </div>
                           </div>
                            </div><br><br>

                          </div>
                          
                        </div>
                       
                      </div>
                      <div class="row" style="margin: 10px 0px;">
                        <button class="btn btn-danger col-lg-2" type="reset">Reset All Details</button>
                      </div>
                      <div class="row" style="margin: 10px 0px;">
                        
                        <button class="btn btn-primary col-lg-2" type="submit">Save</button>
                      </div>
                    </div>
                </div>
            </div>
            </form>
          </div>                                    
        </div>
        </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="search_patient_modal" role="dialog">
      <div class="modal-dialog" style="min-width: 900px;">
        <div class="modal-content">
          <form method="post">
            <div class="modal-header">
              <h3 class="modal-title">Search Result</h3>
              <button type="button" class="pull-right close_search_patient_modal">&times;</button>
            </div>
            <div class="modal-body" style="font-size: medium;padding:0px">
                  <div class="row" style="margin:0px;">
                      <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                          <thead>
                              <tr>
                                  <th style="border-right: 1px solid white;">UHID</th>
                                  <th style="border-right: 1px solid white;">First Name</th>
                                  <th style="border-right: 1px solid white;">Middle Name</th>
                                  <th style="border-right: 1px solid white;">Last Name</th>
                                  <th style="border-right: 1px solid white;">Mobile Number</th>
                                  <th style="border-right: 1px solid white;">Gender</th>
                                  <th style="border-right: 1px solid white;">Age</th>
                                  <th >-</th>
                              </tr>
                          </thead>
                          <tbody id="search_patient_records">
                          </tbody>
                      </table>
                  </div>
              </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="pay_bill_modal" role="dialog">
  <div class="modal-dialog" style="min-width: max-content;">
    <div class="modal-content">
      <form method="post"  enctype="multipart/form-data" id="opd_appointment_receipt_form">
        <div class="modal-header">
          <h3 class="modal-title">OPD Bill Receipt</h3>
          <button type="button" class="pull-right close_paybill_model">&times;</button>
        </div>
        <div class="modal-body" style="font-size: medium">
          
          <div class="row" style="margin: 10px 0px;">
            <label class="control-label col-lg-5">Select Service<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="payment-options col-lg-7">
              <select class="form-control selectpicker"  name="up_service[]" id="up_service" multiple >
                             
              </select>
              <input class="form-control" type="hidden" name="appointment_id" id="appointment_id">
            </div>
          </div>
          <div class="row" style="margin: 10px 0px;">
            <label class="control-label col-lg-5">Service Charge<b class="pull-right">:</b></label>
            <div class="col-lg-7">
              <input class="form-control" type="text" name="service_charge" id="service_charge" readonly> 
              
            </div>
          </div>
          <div class="row" style="margin: 10px 0px;">
            <label class="control-label col-lg-5">Cash<b class="pull-right">:</b></label>
            <div class="col-lg-7">
              <input class="form-control" type="text" name="cash_amount" id="cash_amount"> 
              
            </div>
          </div>
          <div class="row" style="margin: 10px 0px;">
            <label class="control-label col-lg-5">Bank<b class="pull-right">:</b></label>
            <div class="col-lg-7">
              <input class="form-control" type="text" name="bank_amount" id="bank_amount"> 
              
            </div>
          </div>
          <div class="row" style="margin: 10px 0px;">
            <label class="control-label col-lg-5">Payment Mode<b class="pull-right">:</b></label>
            <div class="payment-options col-lg-7">
              <select class="form-control" name="payment_mode" id="payment_mode">
                <option value="" selected="" disabled="">Select Mode</option>
                <option value="Cash">Cash</option>
                <option value="UPI">UPI</option>
                <option value="Cash-UPI">Cash + UPI</option>
                <option value="Card">Card</option>
                <option value="Cash-Card">Cash + Card</option>
                <option value="Cheque">Cheque</option>
                <option value="Cash-Cheque">Cash + Cheque</option>
              </select>
            </div>
          </div>
          <div class="row transaction_number_div" style="margin: 10px 0px;">
            <label class="control-label col-lg-5">Transaction Remark<b class="pull-right">:</b></label>
            <div class="col-lg-7">
              <input class="form-control" type="text" name="transaction_number" id="transaction_number">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
          <button type="button" class="btn btn-default pull-left close_paybill_model">Close</button>
        </div> 
      </form>
    </div>
  </div>
</div> 

<div id="show_receipt_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 1000px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row" style="margin-bottom: 15px;">
              <div class="col-lg-12" >
                <h2  style="margin: 0px;float: left;">OPD Registartion Receipt</h2>
                <button type="button" style="float: right;" class="close_payment_receipt_model" data-dismiss="modal">&times;</button>
                <button type="button" style="float: right;margin-right:50px;" class="btn btn-success download_payment_receipt" content_url=""  ><i class="fa fa-download"></i>&nbsp;&nbsp;&nbsp;Download Bill Receipt</button>
                <button type="button" style="float: right;margin-right:50px;" class="btn btn-primary print_payment_receipt" content_url=""><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Print Bill Receipt</button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12" id="payment_receipt_data" style="height: 700px;overflow-y: auto;padding: 0px;">

              </div>
            </div>
          </div>
      </div>
   </div>           
</div>

<div id="cancel_appointment_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 700px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row" style="margin-bottom: 15px;">
              <div class="col-lg-12" >
                <h2  style="margin: 0px;float: left;">Cancel Appointment</h2>
                <button type="button" style="float: right;" class="close_report_model" data-dismiss="modal">&times;</button>
                     </div>
            </div>
            <div class="row" >
              <div class="col-lg-12" style="text-align: center;padding: 30px">
                <label style="font-size: x-large;margin: 30px;margin-top: 0px;">Do you want to Cancel this appointment  ?</label>
                <textarea type="text" style="width: 100%;color: red;font-weight: bolder;padding: 10px;" id="reject_remark" rows="3" name="cancel_remark" maxlength="500" placeholder="Please mention Remark Here !"></textarea> <br><br>
              <button type="button" class="btn btn-danger cancel_appoint" id="cancel_status_update" style="width:32%;" appoint_id="'+appoint_id+'"  appointment_status="Cancel" >Cancel</button>
              <button type="button" class="btn btn-secondary" style="width:32%;" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
      </div>
   </div>           
</div>

<div class="modal fade" id="patient_oppintment_detail" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content" style="width: 1200px;">
        <div class="modal-header">
          <h4 class="modal-title PR_model_title">Patient Oppintment Details </h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" style="font-size: medium">
          <div class="row" style="margin:10px 0px;">
            <label class="control-label col-lg-2">Ptient Name<b class="pull-right">:</b></label>
            <label class="control-label col-lg-2" id="pname"></label>
            <label class="control-label col-lg-2">Mobile Number<b class="pull-right">:</b></label>
            <label class="control-label col-lg-2" id="mobile_no"></label>
            <label class="control-label col-lg-2">UHID<b class="pull-right">:</b></label>
            <label class="control-label col-lg-2" id="uhid"></label>
          </div>
          <div class="row" style="margin:20px 0px;">
            <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid white;">Sr.No</th>
                        <th style="border-right: 1px solid white;">Number</th>
                        <th style="border-right: 1px solid white;">Visit Date</th>
                        <th style="border-right: 1px solid white;">Visit Type</th>
                        <th style="border-right: 1px solid white;">Doctor Name</th>
                        <th style="border-right: 1px solid white;">Department</th>
                        <th style="border-right: 1px solid white;">Category</th>
                        <th style="border-right: 1px solid white;">Company</th>
                        <th style="border-right: 1px solid white;">Label</th>
                        <th style="border-right: 1px solid white;">Case Paper</th>
                    </tr>
                </thead>
                <tbody id="PAD_list">
                  
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="view_services_modal" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="col-lg-8 modal-title PR_model_title">Services Details</h4>
          <button type="col-lg-4 button" style="float: right;margin-right:50px;" class="btn btn-primary print_payment_receipt" content_url="https://aqdsoft.in/opd-appointment-bill/200?action=Print">View Services</button>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" style="font-size: medium">
          <div class="row" style="margin:20px 0px;">
            <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid white;">Sr.No</th>
                        <th style="border-right: 1px solid white;">Services Name</th>
                        <th style="border-right: 1px solid white;">Service Amount</th>
                        <th style="border-right: 1px solid white;">Department</th>
                        <th style="border-right: 1px solid white;">Action</th>
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

<div class="modal fade" id="view_received_amount" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="col-lg-8 modal-title PR_model_title">Payment Received Details</h4>
          <button type="col-lg-4 button" style="float: right;margin-right:50px;" class="btn btn-primary print_payment_receipt" content_url="https://aqdsoft.in/opd-appointment-bill/200?action=Print">View Bills</button>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" style="font-size: medium">
          <div class="row" style="margin:20px 0px;">
            <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid white;">Sr.No</th>
                        <th style="border-right: 1px solid white;">Reciept No.</th>
                        <th style="border-right: 1px solid white;">Paid Amount</th>
                        <th style="border-right: 1px solid white;">Mode</th>
                        <th style="border-right: 1px solid white;">Date-Time</th>
                        <th style="border-right: 1px solid white;">Print</th>
                    </tr>
                </thead>
                <tbody id="received_amount_list">
                  
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>



<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
    $('#opd_appointment_tab').addClass('active');
    $('#opd_appointment_form').hide();
    $('#consulting_doctor').selectpicker();


    get_list();
    get_department();
    patient_category_all();
    occupation_all();


  function calculateAge() {

    var startDate = new Date(document.getElementById('birth_date').value);
    var endDate = new Date();
    var timeDifference = endDate - startDate;
    var daysDifference = timeDifference / (1000 * 60 * 60 * 24);
    var yearsDifference = Math.floor(daysDifference / 365);
    var remainingDays = daysDifference % 365;
    var monthsDifference = Math.floor(remainingDays / 30);
    var remainingDaysInMonth = remainingDays % 30;
    $('#outputyear').val(yearsDifference);
    $('#outputmonth').val(monthsDifference);
    $('#outputday').val(monthsDifference);
  }

  $('.close_model').click(function(){

  	$('#view_services_modal').modal('hide');
    $('#patient_oppintment_detail').modal('hide');
  })

  



  function show_opd_appointment_form(){


    reset_patient_details_form();
    reset_search_patient_form();
    reset_opd_appointment_form();
    $('#appointment_slot').val(moment().format('YYYY-MM-DDTHH:mm'));
    $('#appointment_slot').attr('min',moment().format('YYYY-MM-DDTHH:mm'));
    $('#opd_appointment_tabel').hide();
    $('#opd_appointment_form').show();
  }

  function show_opd_appointment_table(){
    $('#opd_appointment_form').hide();
    $('#opd_appointment_tabel').show(); 
  }

    function get_list(){
      daterangeinput=$('#daterangeinput').val();

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
          'url':'<?=base_url()?>opd-appointment-list',
          'data':{daterangeinput:daterangeinput},
        },
        'columns': [
          {title: "Sr.No",data:"sr_no",mSearch:false},
          {title: "Patient UHID",data:"uhid",mSearch:true},
          {title: "Number",data:"appointment_no",mSearch:true},
          {title: "Date-Time",data:"appointment_datetime",mSearch:true},
          {title: "Patient Name",data:"p_name",mSearch:true},
          {title: "Patient Mobile No.",data:"P_mobile_number",mSearch:true},
          {title: "Doctor Name",data:"doctor_name",mSearch:true},
          {title: "Category Name",data:"category_name",mSearch:true},
          {title: "Company Name",data:"company_name",mSearch:true},
          {title: "Bill Amt",data:"total_amount",mSearch:true},
          {title: "Received Amt",data:"received_amt",mSearch:true},
          {title: "Balance Amt",data:"balance_amt",mSearch:true},
          {title: "Label",data:"label",mSearch:true},
          {title: "Casepaper",data:"case_paper",mSearch:true},
          {title: "Pay Status",data:"pay_status",mSearch:true},
          {title: "Appointment Status",data:"status",mSearch:true},
          {title: "Action",data:"action",mSearch:true},
          
        ],
        

        dom: '<"html5buttons"B>lTfgitp',
              'columnDefs': [
                  { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16] },
                  {
                          'targets':[1],
                          'createdCell':  function (td, cellData, rowData, row, col) { 
                          id=rowData.pid;
                          $(td).attr('class', 'view_patient_detail'); 
                          $(td).attr('id',id); 
                          $(td).attr('style', 'white-space: nowrap;'); 
                        }
                  },
                  {
                          'targets':[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16],
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
            $(this).html( '<input type="text" style="text-align: center;border: 1px solid #304050;height:30px;width:100%;" placeholder="'+title+'" /> ' );  
          }
      } );
      $('#datatable_list thead tr th').each( function () {
          $(this).css("text-wrap","nowrap");
        });

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

   

    $('#prefix').change(function(){

      var prefix=$(this).val();
      if(prefix=='Mr.' || prefix=='Mast.'){
        $('#gender').val('Male');
      }else if(prefix=='Mrs.' ||prefix=='Miss.'){
         $('#gender').val('Female');
      }else{
        $('#gender').val('');
      }

    })

    

     $('#outputyear,#outputmonth, #outputday').on('input', function () {

     
        updateDateInput();
    });

  function updateDateInput() {
      var year='0';
      var month='1';
      var day='1';
      if ($('#outputyear').val()){
        year=$('#outputyear').val();
      }
      if ($('#outputmonth').val()){
        month=$('#outputmonth').val();
      }
      if ($('#outputday').val()){
        day=$('#outputday').val();
      }
        
        if (year && month && day) {
            var currentYear = new Date().getFullYear();
            var birthYear = currentYear - parseInt(year, 10);
            var dateString = birthYear + '-' + month.padStart(2, '0') + '-' + day.padStart(2, '0');
            $('#birth_date').val(dateString);
        }
    }

    function  reset_patient_details_form(){
        $('.patient_details_title').text("Add New Patient Details");
        $('#prefix').val("");
        $('#patient_id').val("");
        $('#first_name').val("");
        $('#middle_name').val("");
        $('#last_name').val("");
        $('#mother_name').val("");
        $('#father_name').val("");
        $('#birth_date').val("");
        $('#gender').val("");
        $('#marital_status').val("");
        $('#identity_type').val("");
        $('#identity_number').val("");
        $('#occupation').val("");
        $('#old_file_number').val("");
        $('#outputyear').val("");
        $('#outputmonth').val("");
        $('#outputday').val("");
        $('#mobile_number').val("");
        $('#alt_mobile_number').val("");
        $('#email').val("");
        $('#country').val("");
        $('#state').val("");
        $('#district').val("");
        $('#taluka').val("");
        $('#area').val("");
        $('#pincode').val("");
        $('#per_address').val("");
      
        $('.emp_info_div').hide();
        $('.insurance-info-div').hide();
        $('.health-card-info-div').hide();
        empty_enable_disable('.emp_info','0','1');
        empty_enable_disable('.insurance-info','0','1');
        empty_enable_disable('.health-card-info','0','1');

        collapseOne.classList.add('show');
    }
  
    function  reset_search_patient_form(){
        $('#search_uhid').val("");
        $('#search_mobile_no').val("");
        $('#search_adhar_card').val("");
        $('#search_first_name').val("");
        $('#search_last_name').val("");
    }

    function  reset_receipt_form(){
        $('#service_charge').val("");
        $('#appointment_id').val("");
        $('#payment_mode').val("");
        $('#cash_amount').val("");
        $('.transaction_number_div').hide();
        empty_enable_disable('#transaction_number','0','1');
    }

    function  reset_opd_appointment_form(){
        reset_patient_details_form();
        $('#service_list').html('');
        $('#consulting_doctor').val('');
        $('#consulting_doctor').selectpicker("refresh")
        $('#appointment_slot').val('');
        $('#Referral_name').val('');
        $('#Referral_contact').val('');
        $('#ref_hospital').val('');
        $('#ref_doctor').val('');
        $('#relative_name').val('');
        $('#relative_relationship').val('');
        empty_enable_disable('#sd_name','0','1');
        empty_enable_disable('#service_name','0','1');
        empty_enable_disable('#patient_company','0','1');
        $('#patient_category').val("");
        $('#d_name').val('');
        document.getElementById("record_form").style.pointerEvents = "auto";




        
    }

    $('#pincode').on('input', function(){
        var pincode = $(this).val();
        if(pincode.length == 6){ 
            console.log(pincode);
            $.ajax({
                url:'<?=base_url()?>get-pincode',
                method:'post',
                data:{pincode:pincode},
                async: false,
                success: function(data){
                    if(data.status=='Success'){
                         $('#area_list').show();
                        html="";
                         for (var i=0;i<data.list.length;i++){
                           html += '<div class="add_address" style="border: 0.5px solid lightgray; padding: 0px 20px;" area="' + data.list[i]['Name'] + '" taluka="' + data.list[i]['Taluk'] + '" dist="' + data.list[i]['District'] + '" state="' + data.list[i]['State'] + '">' + data.list[i]['Name'] + '</div>';
                         }
                        $('#area_list').html(html);
                         
                    }else{
                       swal({
                            html:true,
                            title:data['swall']['title'],
                            text:data['swall']['text'],
                            type:data['swall']['type']
                        }); 
                    }
                }
            });
        } else {
            $('#area_list').html('');
        }
    });

    $(document).on('click','.close_search_patient_modal',function () {
      $('#search_patient_modal').modal('hide');
    });

    $(document).on('click','.close_paybill_model',function () {
      $('#pay_bill_modal').modal('hide');
    });


    /*

    $(document).on('click','.collect_payment',function () {
      reset_receipt_form();
      var appoint_id=$(this).attr('appoint_id');
      var appoint_charges=$(this).attr('appoint_charges');

      $('#appointment_id').val(appoint_id);
      $('#service_charge').val(appoint_charges);
      $('#pay_bill_modal').modal('show');


    }); */


    $(document).on('click','.payment_receipt',function () {
      data_url=$(this).attr('data_url');
      pdf_url=$(this).attr('pdf_url');
      $('#payment_receipt_data').html('');
      document.getElementById("payment_receipt_data").innerHTML='<object style=\"width: 100%;height: 100%;\" data="'+data_url+'?action=View" ></object>';
      $('.download_payment_receipt').attr('content_url',pdf_url);
      $('.print_payment_receipt').attr('content_url',data_url+'?action=Print');
      $('#show_receipt_modal').modal('show');
    });

    $(document).on('click','.print_payment_receipt',function () {
      url=$(this).attr('content_url');
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");

    });

    $(document).on('click','.print_casepaper',function () {
      url=$(this).attr('content_url');
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");

    });

     $(document).on('click','.print_label',function () {
      url=$(this).attr('content_url');
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");

    });

    $(document).on('click','.download_payment_receipt',function () {
      pdf=$(this).attr('content_url');
      $.ajax({
        url:pdf,
        method:'get',
        async: false,
        success:function (data) {
          if(data.status=='True'){
            window.open(data.message);
          }else{
            alert(data.message);
          }
        }
      })
    });

    $('#payment_mode').change(function(){
      var payment_mode=$("#payment_mode option:selected").val();
      if(payment_mode=='Cash'){
        empty_enable_disable('#transaction_number','0','1');
        $('.transaction_number_div').hide();
      }else{
        empty_enable_disable('#transaction_number','1','1');
        $('.transaction_number_div').show();
      }
    }); 

    $(document).on('click','.add_address',function () {
      area=$(this).attr('area');
      taluka=$(this).attr('taluka');
      dist=$(this).attr('dist');
      state=$(this).attr('state');
      $('#area_list').hide();
      $('#area').val(area.toUpperCase());
      $('#taluka').val(taluka.toUpperCase());
      $('#district').val(dist.toUpperCase());
      $('#state').val(state.toUpperCase());
    });

    $('#search_patient_form').on('reset',function(event){
      reset_search_patient_form();
    });

    $('#record_form').on('reset',function(event){
      reset_patient_details_form();
    });

    $('#opd_appointment_formdata').on('reset',function(event){
      reset_opd_appointment_form();

    });
    

    function add_patient()
    {

      //event.preventDefault();
      var form = $( "#record_form" )[0];
      var formData = new FormData(form);
      if($(form).valid()==true){
      
        $.ajax({
          url:'<?=base_url()?>patient-action',
          method:'post',
          data:formData,
          cache: false,
          contentType: false,
          processData: false,
          success:function(data){

            console.log(data);

          
            if(typeof(data)=='object'){
              if(data['swall']['type']=='success' || data['swall']['title']=='Duplicate Entry'){
                $('#patient_id').val(data['patient_id']);
                $('.patient_details_submit_btn').text("Update Patient Details");
                $('.patient_details_title').text("Selected Patient Details : "+data['P_first_name']+" "+data['P_last_name']);
              }
            }
            add_appointment();
          },
        });
      }
      
    }

    function add_appointment(){
      var patient_id= $('#patient_id').val();
      var form = $("#opd_appointment_formdata")[0];
      var formData = new FormData(form);
      formData.append('patient_id', patient_id);
      if($(form).valid()==true){
        $.ajax({
          url:'<?=base_url()?>opd-appointment-action',
          method:'post',
          data:formData,
          cache: false,
          contentType: false,
          processData: false,
          success:function(data){
            if(typeof(data)=='object'){
              if(data['swall']['type']=='success'){
                reset_patient_details_form();
                reset_search_patient_form();
                reset_opd_appointment_form();
                get_list();
                show_opd_appointment_form();
              }
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
      else{
      collapseOne.classList.add('show');
      alert("Please Select Patient");
      }
    }



    $('#opd_appointment_formdata').on('submit',function(event){
      event.preventDefault();
      var patient_id= $('#patient_id').val();
      if(patient_id==''){
        add_patient();
      }else{
        add_appointment();
      }
    });



    $('#search_patient_form').on('submit',function(event){
      event.preventDefault(); 
      var form = $("#search_patient_form");
      var formData = new FormData(this);
      $.ajax({
          url:'<?=base_url()?>search-patient-form',
          method:'post',
          data:formData,
          dataType:'json',
          contentType: false,
          processData: false,
          success:function(data){
            if(data.length >0)
            {
              $('#search_patient_modal').modal('show');
              html="";
              for (i=0;i<data.length;i++)
                  { 
                       html+='<tr class="search_record" pid="'+data[i]['id']+'">\
                                <td style="border-right:1px solid lightgray">'+data[i]['grn']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['first_name']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['middle_name']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['last_name']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['mobile_number']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['gender']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['age']+'</td>\
                                <td style="border-right:1px solid lightgray"><label class="btn btn-primary search_record" pid="'+data[i]['id']+'">Select</label></td>\
                              </tr>'; 
                  } 
                  $('#search_patient_records').html(html);
                  document.getElementById("record_form").style.pointerEvents = "none";

            }
            else{
               swal({
                      html:true,
                      title:"Alert",
                      text:"Patient Not Found",
                      type:"warning"
                  });
            }
          },
      });
    });


    function check_service_amount(){

      var serviceCharge = parseFloat($('#service_charge').val()) || 0;

            var cashAmount = parseFloat($('[name="cash_amount"]').val()) || 0;
            var bankAmount = parseFloat($('[name="bank_amount"]').val()) || 0;
            var totalAmount = cashAmount + bankAmount;
            return totalAmount === serviceCharge;

    }

    $('#opd_appointment_receipt_form').on('submit',function(event){
      event.preventDefault(); 

      var result=check_service_amount();

      if(result){

      var form = $( "#opd_appointment_receipt_form" );
      var formData = new FormData(this);
      if(form.valid()==true){
        $.ajax({
          url:'<?=base_url()?>opd-appointment-receipt',
          method:'post',
          data:formData,
          cache: false,
          contentType: false,
          processData: false,
          success:function(data){

            if(typeof(data)=='object'){
              if(data['swall']['type']=='success'){
                reset_receipt_form();
                get_list();
                $('#pay_bill_modal').modal('hide');
              }
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
            }else{
              //location.reload();
            }

          },
        });
      }

      }
      else{

        alert('Total amount should be equal to service charge.');
      }
    });


    $(document).on('click', '.search_record', function() {
      var p_id=$(this).attr('pid');
      $.ajax({
              url:"<?php echo base_url();?>patient-by-id",
              method:'post',
              dataType: 'json',
              data:{p_id:p_id},
              success:function(data)
              {
                reset_patient_details_form();
                $('#patient_id').val(p_id);
                 $('#prefix').val(data['record']['name_prefix']);
                 $('#first_name').val(data['record']['first_name']);
                 $('#middle_name').val(data['record']['middle_name']);
                 $('#last_name').val(data['record']['last_name']);
                 $('#mother_name').val(data['record']['mother_name']);
                 $('#father_name').val(data['record']['father_name']);
                 $('#birth_date').val(data['record']['dob']);
                 
                  $('#outputday').val(data['record']['outputday']);
                  $('#outputmonth').val(data['record']['outputmonth']);
                  $('#outputyear').val(data['record']['outputyear']);

                 $('#gender').val(data['record']['gender']);
                 $('#marital_status').val(data['record']['marital_status']);
                 $('#identity_type').val(data['record']['identity_type']);
                 $('#identity_number').val(data['record']['identity_number']);
                 $('#occupation').val(data['record']['occupation_id']);
                 $('#mobile_number').val(data['record']['mobile_number']);
                 $('#alt_mobile_number').val(data['record']['alt_mobile_number']);
                 $('#email').val(data['record']['email']);

                 $('#state').val(data['record']['state']);
                 $('#district').val(data['record']['district']);
                 $('#taluka').val(data['record']['taluka']);
                 $('#area').val(data['record']['area']);
                 $('#pincode').val(data['record']['pincode']);
                 $('#per_address').val(data['record']['address']);
                 $('#search_patient_modal').modal('hide');
                 collapseOne.classList.remove('show');
                  $('.patient_details_submit_btn').text("Update Patient Details");
                  $('.patient_details_title').text("Selected Patient Details : "+data['record']['first_name']+" "+data['record']['last_name']);
                  
              },
          });    
    });

    function get_department() {
      $.ajax({
        url:'<?=base_url()?>department-by-section',
        method:'post',
        async: false,
        data:{section_name:'1'},
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

    function occupation_all() {
      $.ajax({
        url:'<?=base_url()?>occupation-all',
        method:'post',
        async: false,
        dataType: 'json',
        success:function (data) { 
          if(typeof(data)=='object'){
            var html="<option value='' selected disable>Select Occupation</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
            }
            $("#occupation").html(html);
          }else{
            location.reload();
          }
        }
      })
    }

    function patient_category_all() {
      $.ajax({
        url:'<?=base_url()?>patient-category-all',
        method:'post',
        async: false,
        dataType: 'json',
        success:function (data) { 
          if(typeof(data)=='object'){
            var html="<option value='' selected disable>Select Patient Category</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html+="<option value='"+data['record'][i]["id"]+"' type='"+data['record'][i]["type"]+"'>"+data['record'][i]["name"]+"</option>";  
            }
            $("#patient_category").html(html);
          }else{
            location.reload();
          }
        }
      })
    }

    $('#patient_category').change(function(){
      $('.emp_info_div').hide();
      $('.insurance-info-div').hide();
      $('.health-card-info-div').hide();
      empty_enable_disable('.emp_info','0','1');
      empty_enable_disable('.insurance-info','0','1');
      empty_enable_disable('.health-card-info','0','1');
      var categrory_type=$("#patient_category option:selected").attr('type');
      switch(categrory_type){
        case 'Staff / Employee' : 
          $('.emp_info_div').show();
          empty_enable_disable('.emp_info','1','1');
        break;
        case 'Insurance' : 
          $('.insurance-info-div').show();
          empty_enable_disable('.insurance-info','1','1');
        break;
        case 'Corporate Tie-Up' : 
          $('.health-card-info-div').show();
          empty_enable_disable('.health-card-info','1','1');
        break;          
      }

        var PC_id=$(this).val();
       
        $.ajax({
            url:"<?php echo base_url();?>patient-company-by-id",
            method:'post',
            async: false,
            dataType: 'json',
            data:{PC_id:PC_id},
            success:function(data)
            {   
                  $('#patient_company').html('');
                  html='';
                  var html="<option value='' selected disable>Select Company</option>";
                    for (var i = 0; i <data['record'].length; i++){    
                        html+="<option value='"+data['record'][i]['id']+"'>"+data['record'][i]['name']+"</option>";  
                  } 
                  empty_enable_disable('#patient_company','1','1');
                    $("#patient_company").html(html);
            },
        });  
    })
  
    $('#d_name').change(function(){
        var d_id=$(this).val();
        $.ajax({
        url:'<?=base_url()?>doctor-by-department-id',
        method:'post',
        async: false,
        dataType: 'json',
        data:{d_id:d_id},
        success:function (data) {

        console.log(data); 
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
    }) 

   

  

   $(document).on('click','.cancel_record',function () {

        var appoint_id=$(this).attr('appoint_id');
        $('.cancel_appoint').attr('appoint_id',appoint_id);
        $('#cancel_appointment_modal').modal('show');


     })

    $(document).on('click','.cancel_appoint',function () {
      appoint_id=$(this).attr('appoint_id');
      appointment_status=$(this).attr('appointment_status');
      reason=$('#reject_remark').val();

      if (appoint_id && reason!='') {
            $.ajax({
                url:'<?=base_url()?>opd-appointment-cancel',
                method:'post',
                dataType: 'json',
                async: false,
                data:{appoint_id:appoint_id,reason:reason},
                success:function (data) { 
                  if(typeof(data)=='object'){
                      swal({
                        html:true,
                        title:data['swall']['title'],
                        text:data['swall']['text'],
                        type:data['swall']['type']
                      });
                      $('#cancel_appointment_modal').modal('hide');
                      get_list();
                  }else{
                      location.reload();
                  }
                }
            })
          
      }else{
        alert("Something Went Wrong..!");
      }
    });


    $(document).on('click','.refund_request',function () {
    appointment_id=$(this).attr('appointment_id');
    status=$(this).attr('status');
    if(status=='Paid'){
      flag=confirm('Have You Paid Refund Amount to Patient?');
    }else{
      flag=confirm('Do you want to Intiate Refund Request?');
    }
    if (flag) {
        $.ajax({
          url:'<?=base_url()?>appointment-refund-request',
          method:'post',
          data:{appointment_id:appointment_id,status:status},
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
    }else{
      alert("Something Went Wrong..!");
      location.reload();
    }
  });



    $(document).on('click','.view_patient_detail',function () {

      var pid=$(this).attr('id');
      $('#patient_oppintment_detail').modal('show');

      $.ajax({
          url:'<?=base_url()?>patient-oppintment-detail',
          method:'post',
          data:{p_id:pid},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){

                $('#pname').text(data[0]['p_name']);
                $('#mobile_no').text(data[0]['mobile_number']);
                $('#uhid').text(data[0]['uhid']);
             
                html="";
                for (i=0;i<data.length;i++){

                    html+='<tr class="" PR_id="'+data[i]['id']+'">\
                                      <td style="border-right:1px solid lightgray">'+(i+1)+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['appointment_no']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['appointment_datetime']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['visit_detail']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['doctor_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['d_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['category_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['company_name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['case_paper']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data[i]['label']+'</td>\
                                    </tr>'; 

                }
                
                $('#PAD_list').html(html);

            }else{
              location.reload();
            }
          }
        })
      

    })

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

    $(document).on('click','.view_services',function(){
      $('#view_services_modal').modal('show');
      var appoint_id=$(this).attr('appoint_id');
      var appoint_id=$(this).attr('appoint_id');
      var content_url = "https://aqdsoft.in/opd-appointment-bill/" + appoint_id + "?action=Print";
      $('.print_payment_receipt').attr('content_url',content_url);

      $.ajax({
              url:"<?php echo base_url();?>patient-services",
              method:'post',
              dataType: 'json',
              data:{appoint_id:appoint_id},
              success:function(data)
              {
                html="";
                for (i=0;i<data['record'].length;i++){

                    html+='<tr class="" service_id="'+data['record'][i]['sid']+'">\
                                      <td style="border-right:1px solid lightgray">'+(i+1)+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['name']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['samount']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['dname']+'</td>\
                                      <td class="change_service_state" style="border-right:1px solid lightgray;color:red"  asa_id="'+data['record'][i]['id']+'">'+data['record'][i]['sstatus']+'</td>\
                                    </tr>'; 

                }
                
                $('#services_list').html(html);
                
                  
              },
          });  
    })



     $(document).on('click','.pay_bill',function(){

       $('#pay_bill_modal').modal('show');
       var appoint_id=$(this).attr('appoint_id');
       $('#appointment_id').val(appoint_id);
       //$('#service_charge').val($(this).attr('balalnce_amt'));
        $.ajax({
            url:'<?=base_url()?>get-unpaid-services',
            method:'post',
            data:{appoint_id:appoint_id},
            async: false,
            success:function(data){

              var html="<option value='0'>Select All</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"' samount='"+data['record'][i]["amount"]+"'>"+data['record'][i]["sname"]+"</option>";
              }
              $("#up_service").html(html);
              $('#up_service').selectpicker('refresh');

            
            },
          });

     })

    $("#up_service").change(function() {
    var selectedValue = $(this).val();

    if (selectedValue && selectedValue.includes('0')) {
        $("#up_service option[value='0']").prop("selected", false);

        $("#up_service option[value!='0']").prop("selected", true);

        $('#up_service').selectpicker('refresh');
    }
});



   $('#up_service').on('change', function() {
      var totalAmount = 0;

      $(this).find('option:selected').each(function() {
        totalAmount += parseFloat($(this).attr('samount')) || 0;
      });

      $('#service_charge').val(totalAmount);

    });


    $(document).on('click','.view_received_amount',function(){

       $('#view_received_amount').modal('show');
       var appoint_id=$(this).attr('appoint_id');
       
       $.ajax({
              url:"<?php echo base_url();?>ipd-bill-received-amount",
              method:'post',
              dataType: 'json',
              data:{appoint_id:appoint_id},
              success:function(data)
              {
                html="";
                for (i=0;i<data['record'].length;i++){

                    html+='<tr class="" service_id="'+data['record'][i]['sid']+'">\
                                      <td style="border-right:1px solid lightgray">'+(i+1)+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['receipt_id']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['amount']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['mode']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['rdate']+'</td>\
                                      <td style="border-right:1px solid lightgray">'+data['record'][i]['print_bill']+'</td>\
                                    </tr>';



                }
                
                $('#received_amount_list').html(html);
                
                  
              },
          });  
       

     })
</script>
