<?php include_once  APPPATH.'views/header.php';?>
<?php include_once  APPPATH.'views/leftbar.php';?>
<style>
 
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" id="user_form_page">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Doctor Registration</h3>
        <button class="btn btn-primary pull-right show-user-btn" onclick="show_user_list()"><i class="fa fa-plus"></i> Show List</button>
      </div>
      <div class="ibox-content" style="padding: 0px;">
        <form method="post"  enctype="multipart/form-data" id="record_form">
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div  class="card-header collapsed" data-toggle="collapse" href="#collapseone">
                        <a class="card-title">
                           <h3 style="margin: 0px;">Personal Information</h3>
                        </a>
                    </div>
                    <div id="collapseone" class="card-body collapse show" data-parent="#accordion">
                        <div class="row" style="padding:5px;">
                          <label class="control-label col-lg-3">Designation<a style="color: red">*</a></label>
                          <label class="control-label col-lg-3">First Name<a style="color: red">*</a></label>
                          <label class="control-label col-lg-3">Father Name<a style="color: red">*</a> </label>
                          <label class="control-label col-lg-3">Last Name<a style="color: red">*</a></label>
                        </div>
                        <div class="row" style="padding:5px;">
                            <input class="form-control" type="hidden" id="user_id" name="user_id">
                            <div class="col-lg-3">
                                  <select class="form-control" name="designation" id="designation" required="">
                                     <option value='3' selected>Doctor</option>
                                     <option value='2'>RMO</option>
                                  </select>
                              </div>  
                            <div class="col-lg-3">
                                <input class="form-control" type="text" id="first_name" name="first_name" required="" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" id="father_name" name="father_name" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" id="last_name" name="last_name" required="" oninput="this.value = this.value.toUpperCase()"> 
                            </div>
                        </div>
                        <div class="row" style="padding:5px;">
                          <label class="control-label select_slot col-lg-3">Date Of Birth<a style="color: red">*</a></label>
                          <label class="control-label col-lg-3">Gender<a style="color: red">*</a></label>
                          <label class="control-label col-lg-3">Marital Status</label>
                          <label class="control-label col-lg-3">Blood Groups</label>
                        </div>
                        <div class="row" style="padding:5px;">
                        
                            <div class="col-lg-3">
                                <input class="form-control" type="date" id="dob_date" name="dob_date" required="">
                            </div>
                            <div class="col-lg-3 select_slot">
                                <select class="form-control" name="gender" id="gender" required="">
                                    <option value="" selected="" disabled="">----Select----</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Transgender">Transgender</option>
                                </select>
                            </div>
                            <div class="col-lg-3 select_slot">
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="" selected="" disabled="">----Select----</option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                    <option value="Widow">Widow</option>
                                </select>
                            </div>
                            <div class="col-lg-3 select_slot">
                                <select class="form-control" name="blood_group" id="blood_group">
                                    <option value="" selected="" disabled="">----Select----</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                       
                        </div>
                        <div class="row" style="padding:5px;">
                          <label class="control-label col-lg-3">Mobile Number<a style="color: red">*</a></label>
                          <label class="control-label col-lg-3">Alt. Mobile Number</label>
                          <label class="control-label col-lg-3">Email Address<a style="color: red">*</a> </label>
                          <label class="control-label select_slot col-lg-3">Photo</label>
                        </div>
                        <div class="row" style="padding:5px;">
                            <div class="col-lg-3">
                                <input class="form-control" type="text" id="mobile_number" name="mobile_number" minlength="10" maxlength="10" required="">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" id="alt_mobile_number" name="alt_mobile_number" minlength="10" maxlength="10">           
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="email" id="email" name="email" oninput="this.value = this.value.toUpperCase()">
                            </div>
                             <div class="col-lg-3">
                              <input class="form-control" type="file" id="photo" name="photo" accept="image/png, image/jpeg">
                            </div>
                        </div>
                        <div class="row" style="padding:5px;">
                          
                          <label class="control-label col-lg-3 doctor_info">Doctor Type</label>
                          <label class="control-label col-lg-3 doctor_info">Case Paper Validity (Days) </label>
                          <label class="control-label col-lg-3 doctor_info">Follow up Charges </label>
                          <div class="row col-lg-3">
                            <div class="col-lg-6">
                                <label class="control-label no_of_free_visits_div">No. of free visits</label>
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label no_of_free_visits_div">No. of free days</label>
                            </div>
                          </div>
                        </div>
                        <div class="row" style="padding:5px;">
                            
                            <div class="col-lg-3 doctor_info">
                              <select class="form-control selectpicker"  id="doctor_type" name="doctor_type[]" data-live-search="true" multiple>
                                <option value="In-House">In-House</option>
                                <option value="Visiting">Visiting</option>
                                <option value="Referral">Referral</option>
                                <option value="Diagnositic Referral">Diagnositic Referral</option>
                                <option value="Anesthetist">Anesthetist</option>
                                <option value="Surgeon">Surgeon</option>
                                <option value="Radiologist">Radiologist</option>
                                <option value="Consultant">Consultant</option>
                                <option value="Consultant">LIS Reporting</option>
                                <option value="Consultant">Panel</option>
                                <option value="Consultant">Unit</option>
                              </select>
                            </div>
                            <div class="col-lg-3 doctor_info">
                              <input class="form-control" type="text" id="case_paper_validity" name="case_paper_validity">
                            </div>
                            <div class="col-lg-3 doctor_info">
                              <select class="form-control doctor_info"  id="follow_up_charges" name="follow_up_charges">
                                <option selected value="Not-applicable">Not applicable</option>
                                <option  value="After-the-first-consultation">After the first consultation</option>
                                <option  value="After-no-of-free-visits">After no of free visits</option>
                                <option  value="After-no-of-free-days">After no of free days</option>
                                <option  value="After-no-of-free-visits-and-no-of-free-days">After no of free visits and no of free days</option>
                              </select>
                            </div>
                            <div class="row col-lg-3">
                                <div class="col-lg-6">
                                  <input class="form-control no_of_free_visits_div" type="text" id="no_of_free_visits" name="no_of_free_visits">
                                </div>
                                <div class="col-lg-6">
                                  <input class="form-control no_of_free_days_div" type="text" id="no_of_free_days" name="no_of_free_days">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding:5px;">
                          <label class="control-label col-lg-3 doctor_info">Payout</label>
                          <label class="control-label col-lg-3 salary_div">Enter Salary</label>
                          <label class="control-label col-lg-3 Min_Amount_div">Enter Value</label>
                          <label class="control-label col-lg-3 on_call_div">Enter Fee</label>

                          <label class="control-label col-lg-2 commission_div">OPD Share (%)</label>
                          <label class="control-label col-lg-2 commission_div">IPD Share (%)</label>
                          <label class="control-label col-lg-2 commission_div">DIAGNO Share (%)</label>
                          <label class="control-label col-lg-2 commission_div">PHARMA Share (%)</label>
                        </div>
                        <div class="row" style="padding:5px;">
                            <div class="col-lg-3 doctor_info">
                              <select class="form-control"  id="payment_method" name="payment_method">
                                <option selected="" disabled="" value="">Select Payment Method</option>
                                <option value="Salary">Salary</option>
                                <option value="Min_Amount">Min_Amount</option>
                                <option value="Commission">Share</option>
                                <option value="On_Call">On_Call</option>
                              </select>
                            </div>
                            <div class="col-lg-3 salary_div">
                                <input class="form-control" type="text" id="salary" name="salary">
                            </div>
                            <div class="col-lg-3 Min_Amount_div">
                                <input class="form-control" type="text" id="Min_Amount" name="Min_Amount">
                            </div>
                           
                            <div class="col-lg-3 on_call_div">
                                <input class="form-control" type="text" id="on_call_value" name="on_call_value">
                            </div>

                            <div class="col-lg-2 commission_div">
                                <input class="form-control" type="text" id="opd_commission" name="opd_commission">
                            </div>
                            <div class="col-lg-2 commission_div">
                                <input class="form-control" type="text" id="ipd_commission" name="ipd_commission">
                            </div>
                            <div class="col-lg-2 commission_div">
                                <input class="form-control" type="text" id="diagno_commission" name="diagno_commission">
                            </div>
                            <div class="col-lg-2 commission_div">
                                <input class="form-control" type="text" id="pharma_commission" name="pharma_commission">
                            </div>
                        </div>
                        <div class="row" style="padding:5px;">
                          <label class="control-label col-lg-3">Specialization<a style="color: red">*</a> </label>
                          
                        </div>
                        <div class="row" style="padding:5px;">
                            
                            <div class="col-lg-3">
                              <select class="form-control selectpicker"  name="Specialization[]" id="Specialization" data-live-search="true" multiple > 
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapsetwo">
                        <a class="card-title">
                           <h3 style="margin: 0px;">Address Information</h3>
                        </a>
                    </div>
                    <div id="collapsetwo" class="card-body collapse show" data-parent="#accordion">
                      <div class="row" style="padding:5px;">
                        <label class="control-label col-lg-3">Permanant Address<a style="color: red">*</a></label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-12">
                              <input class="form-control" type="text" id="p_address" name="p_address" placeholder="Permanant Address" style="height:70px" oninput="this.value = this.value.toUpperCase()">
                          </div>
                      </div>
                      <div class="row" style="padding:5px;">
                        <label class="control-label col-lg-3">Permanant Area<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Permanant Taluka<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Permanant District<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Permanant State<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">Permanant Pincode<a style="color: red">*</a></label>
                      </div>
                       <div class="row" style="padding:5px;">
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="p_area" name="p_area" placeholder="Permanant Area" required="" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="p_taluka" name="p_taluka" placeholder="Permanant Taluka" required="" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="p_district" name="p_district" placeholder="Permanant District" required="" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="p_state" name="p_state" placeholder="Permanant State" required="" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="p_pincode" name="p_pincode" placeholder="Permanant Pincode" maxlength="6" required="">
                              <div id="area_list" style="font-size:18px;display:none;position: absolute;z-index: 1;background: white;bottom: 40px;">
                               
                              </div>
                          </div>
                      </div>
                      <div class="row" style="padding:10px;">
                        <label class="control-label col-lg-3">Current Address</label>
                        <input type="checkbox" id="same_address" name="same_address"  style="margin-bottom:5px"><label class="control-label col-lg-3"> Same as Permanant Address</label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-12">
                              <input class="form-control" type="text" id="c_address" name="c_address" placeholder="Current Address" style="height:70px" oninput="this.value = this.value.toUpperCase()">
                          </div>
                      </div>
                      <div class="row" style="padding:5px;">
                        <label class="control-label col-lg-3">Current Area </label>
                        <label class="control-label col-lg-2">Current Taluka<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Current District</label>
                        <label class="control-label col-lg-2">Current State</label>
                        <label class="control-label col-lg-3">Current Pincode</label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="c_area" name="c_area" placeholder="Current Area" oninput="this.value = this.value.toUpperCase()" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="c_taluka" name="c_taluka" placeholder="Current Area" oninput="this.value = this.value.toUpperCase()" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="c_district" name="c_district" placeholder="Current District" oninput="this.value = this.value.toUpperCase()" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="c_state" name="c_state" placeholder="Current State" oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="c_pincode" name="c_pincode" placeholder="Current Pincode">
                          </div>
                      </div>  
                    </div>
                    
                </div>
            </div>
            
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapsefive">
                        <a class="card-title">
                          <h3 class="patient_details_title" style="margin: 0px;">Bank Details</h3>
                        </a>
                    </div>
                    <div id="collapsefive" class="card-body collapse show" data-parent="#accordion">
                      <div class="row" style="padding:5px;">
                        <label class="control-label select_slot col-lg-3">Bank Name<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">Account Number<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">IFSC Code<a style="color: red">*</a> </label>
                        <label class="control-label col-lg-3">Bank Branch<a style="color: red">*</a> </label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="bank_name" name="bank_name" oninput="this.value = this.value.toUpperCase()">
                          </div>
                         
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="bank_account_no" name="bank_account_no">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="ifsc_code" name="ifsc_code" oninput="this.value = this.value.toUpperCase()">
                          </div>
                           <div class="col-lg-3">
                              <input class="form-control" type="text" id="branch_name" name="branch_name" oninput="this.value = this.value.toUpperCase()">
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapsesix">
                        <a class="card-title">
                          <h3 class="patient_details_title" style="margin: 0px;">KYC Details</h3>
                        </a>
                    </div>
                    <div id="collapsesix" class="card-body collapse show" data-parent="#accordion">
                      <div class="row" style="padding:5px;">
                        <label class="control-label select_slot col-lg-3">Aadhar Card No.<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">Aadhar Photo(Front Side+Back Side)<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">PAN Card No.<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">PAN Photo<a style="color: red">*</a></label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-3">
                            <input class="form-control" type="text" id="aadhaar_number" name="aadhaar_number">
                          </div>
                          <div class="col-lg-3">
                            <input class="form-control" type="file" id="aadhar_photo" name="aadhar_photo">
                            <input type="hidden" name="aadhar_url" id="aadhar_url">
                          </div>
                          <div class="col-lg-3">
                           <input class="form-control" type="text" id="pan_number" name="pan_number">
                          </div>
                          <div class="col-lg-3">
                            <input class="form-control" type="file" id="pan_photo" name="pan_photo">
                            <input type="hidden" name="pan_photo_url" id="pan_photo_url">
                          </div>
                      </div>
                      <div class="row" style="padding:5px;">
                        <div class="row col-lg-10"></div>
                        <div class="col-lg-2">
                            <div class="row" style="padding:5px;">
                                <button class="btn btn-danger col-lg-12" type="reset">Reset</button>
                            </div>
                            <div class="row" style="padding:5px;">
                                <button class="btn btn-primary col-lg-12" type="submit">Submit</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12" id="user_list_page">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Doctor List</h3>
          <button class="btn btn-primary pull-right add-user-btn" onclick="show_user_form()"><i class="fa fa-plus"></i> Add Doctor </button>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Department</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Sub-Department</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Classification</th>
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

<div class="modal fade" id="user_details_modal" role="dialog">
  <div class="modal-dialog " style="min-width: 1000px;">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pull-right">User Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 16px;padding-bottom: 10px;">
                <div class="row">
                    <div class="col-lg-5" style="text-align: center;align-self: center;">
                        <img id="view_user_image" src="" style="max-height: 160px;padding: 5px;border: 2px solid black;border-radius: 15px;" > 
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <span class="col-lg-3" style="padding: 0px;" >User Reg Date</span>
                            <label  class="col-lg-9 view_user_reg_date"></label>
                        </div>
                        <div class="row">
                            <span class="col-lg-3" style="padding: 0px;" >User Gender</span>
                            <label  class="col-lg-9 view_user_gender"></label>
                        </div>
                        <div class="row">
                            <span class="col-lg-3" style="padding: 0px;" >User DOB</span>
                            <label  class="col-lg-9 view_user_DOB"></label>
                        </div>
                        <div class="row">
                            <span class="col-lg-3" style="padding: 0px;" >User Email</span>
                            <label  class="col-lg-9 view_user_email"></label>
                        </div>
                        <div class="row">
                            <span class="col-lg-3" style="padding: 0px;" >App Version</span>
                            <label  class="col-lg-9 view_user_version"></label>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-5" style="padding: 0px;text-align: center;">
                        <label  class="view_user_name"></label><br>
                        <label  class="view_user_mob_no"></label>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-info user_details">More Details</button>
                    </div>
                </div>

                <div class="row course_details" >
                    <span class="col-lg-12" style="padding: 10px;border-top: 1px solid black;border-bottom: 1px solid black;text-align: center;font-weight: bold" >Course Details</span>
                    <div class="col-lg-12" style="padding-top: 20px;padding-left: 0px;padding-right: 0px;max-height: 370px; overflow-y: auto;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" nowrap="nowrap">Sr. No.</th>
                                        <th style="text-align: center;" nowrap="nowrap">Exam Name</th>
                                        <th style="text-align: center;" nowrap="nowrap">Start Date</th>
                                        <th style="text-align: center;" nowrap="nowrap">End Date</th>
                                    </tr>
                                </thead>
                                <tbody class="child_table" style="text-align:center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer row">
                <div class="col-lg-12" style="text-align: center;">
                    <button class="btn btn-danger change_password" type="submit">Change Password</button>
                    <button class="btn btn-primary add_course" type="submit">Add Course</button>
                    <button class="btn btn-default close_view_client_btn" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#doctor_tab').addClass('active');
  
  get_list();
  $('#user_form_page').hide();
  $('.other_doc_name_div').hide();
  $('#doctor_type').selectpicker();
  role_designation_all();
  department_all();

  $('.salary_div').hide();
   $('.Min_Amount_div').hide();
   $('.commission_div').hide();
   $('.on_call_div').hide();

  $('.no_of_free_visits_div').hide();
  $('.no_of_free_days_div').hide();

  specialization_all();
    $('#Specialization').selectpicker();
  function show_user_form(){
    $('#user_list_page').hide();
    $('#user_form_page').show()
  }

  function show_user_list(){
    $('#user_form_page').hide();
    $('#user_list_page').show();
   }


  

   $('#other_doc_type').change(function(){
        var document_name=$(this).val();
        if(document_name=='OTHER'){   
            $('.other_doc_name_div').show();
        }
        else{
            $('.other_doc_name_div').hide();
            } 
    })

    $('#same_address').on('change', function(){
        if($(this).prop('checked')){
        
        //empty_disable_enable('#c_address','0');
        //empty_disable_enable('#c_area','0');
        //empty_disable_enable('#c_taluka','0');
        //empty_disable_enable('#c_district','0');
        //empty_disable_enable('#c_state','0');
        //empty_disable_enable('#c_pincode','0');

        var c_address=$('#p_address').val();
        $('#c_address').val(c_address);
        var c_area=$('#p_area').val();
        $('#c_area').val(c_area);
        var c_taluka=$('#p_taluka').val();
        $('#c_taluka').val(c_taluka);
        var c_dist=$('#p_district').val();
        $('#c_district').val(c_dist);
        var c_state=$('#p_state').val();
        $('#c_state').val(c_state);
        var c_pincode=$('#p_pincode').val();
        $('#c_pincode').val(c_pincode);

        
        } else {
            empty_disable_enable('#c_address','1');
            empty_disable_enable('#c_area','1');
            empty_disable_enable('#c_taluka','1');
            empty_disable_enable('#c_district','1');
            empty_disable_enable('#c_state','1');
            empty_disable_enable('#c_pincode','1');
        }
    });


    $('#follow_up_charges').change(function(){

       
        empty_enable_disable('#no_of_free_visits','0','1');
        empty_enable_disable('#no_of_free_days','0','1');
      

        var type=$(this).val();
        switch(type){
        
        case 'Not-applicable' : 
            $('.no_of_free_visits_div').hide();
            $('.no_of_free_days_div').hide();
          break;
        case 'After-the-first-consultation' :
            
             $('.no_of_free_visits_div').show();
             $('.no_of_free_days_div').show();
             empty_enable_disable('#no_of_free_visits','0','1');
             empty_enable_disable('#no_of_free_days','0','1');
          break;
        case 'After-no-of-free-visits' :
            empty_enable_disable('#no_of_free_visits','1','1');
            empty_enable_disable('#no_of_free_days','0','1');
          break;
        case 'After-no-of-free-days' :
            empty_enable_disable('#no_of_free_visits','0','1');
            empty_enable_disable('#no_of_free_days','1','1');
          break;
         case 'After-no-of-free-visits-and-no-of-free-days' :
             empty_enable_disable('#no_of_free_visits','1','1');
            empty_enable_disable('#no_of_free_days','1','1');
          break;               
        }
  }) 



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
        'url':'<?=base_url()?>user-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "User Name",data:"name",mSearch:true},
        {title: "Designaton",data:"designation",mSearch:false},
        {title: "Mobile Number",data:"mobile_number",mSearch:false},
        {title: "Email Address",data:"user_email",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
        {title: "Status",data:"user_status",mSearch:false},


         
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3] },
                 {
                  'targets': [0,1, 2, 3, 4], 
                   'createdCell':  function (td, cellData, rowData, row, col) {
                        id=rowData.id;
                        $(td).attr('class', 'view_user'); 
                        $(td).attr('user_id',id); 
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


 $(document).on('click','.view_user',function(){
  
   user_id=$(this).attr('user_id');
    window.open('<?=base_url()?>user-details/'+user_id, '_blank');
 });

 function updateConfirmationDate() {
        var joinDate =$('#date_of_join').val();
        var probationPeriod = $('#probation_period').val();

        if (joinDate !== '' && probationPeriod !== '') {
            var startDate = new Date(joinDate);
            startDate.setMonth(startDate.getMonth() + parseInt(probationPeriod));
            var confirmationDate = startDate.toISOString().split('T')[0];
            $('#confirmation_date').val(confirmationDate);
        }
    }

    function print(){

         $.ajax({
          url:'<?=base_url()?>barcode-print',
          method:'post',
          async: false,
          dataType: 'json',
          data:{text:'12345',font:'arial',barcode:'123456789'},
          success:function (data) { 
           
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


              var html3="<option value='' selected disable>Select Department</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html3+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#d_name").html(html3);
            }else{
              location.reload();
            }
          }
        })
  }


  $('#payment_method').change(function(){

    

    
    var payment_method=$(this).val();
       $('.salary_div').hide();
       $('.Min_Amount_div').hide();
       $('.commission_div').hide();
       $('.on_call_div').hide();


 
    switch(payment_method){

        case 'Salary':
            $('.salary_div').show();
        break ;
        
        case 'Min_Amount':
            $('.Min_Amount_div').show();
        break ;

        case 'Commission':
            $('.commission_div').show();
        break;

        case 'On_Call':
            $('.on_call_div').show();
        break;
    

    }

  })

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
                  empty_enable_disable('#sd_name','1','1');
                  $('#sub_department').html('');
                  html='';
                  html='<option value="" selected="" disabled=""> Select Sub Department</option>';
                  html+='<option value="0">All Sub-Department</option>'; 
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>'; 
                  } 
                  $('#sd_name').html(html);      
            },
        });  

   })



  function specialization_all(){
    $.ajax({
          url:'<?=base_url()?>specialization-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){
              var html2="";
              for (var i = 0; i <data['record'].length; i++){    
                  html2+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#Specialization").html(html2);
              $('#Specialization').selectpicker('refresh');
            }else{
              location.reload();
            }
          }
        })

  }

  function role_designation_all() {

        $.ajax({
          url:'<?=base_url()?>department-role-designation-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){

              
              var html="<option value='' selected='' disable=''>Select Role</option>";
              for (var i = 0; i <data['role'].length; i++){    
                  html+="<option value='"+data['role'][i]["id"]+"'>"+data['role'][i]["name"]+"</option>";  
              }
              $("#role").html(html);

              

               
            
            }else{
              location.reload();
            }
          }
        })
    
  }

  $('#department').change(function(){
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
                  $('#sub_department').html(html); 

                 

                    
            },
        });  

   })

  function reset_form(){
    //$('.record_form_title').html('Add Sub-Department');
    $('#role').val('');
    $('#designation').val('');
  
    $('#first_name').val('');
    $('#father_name').val('');
    $('#last_name').val('');
    $('#dob_date').val('');
    $('#gender').val('');
    $('#marital_status').val('');
    $('#blood_group').val('');
    $('#mobile_number').val('');
    $('#alt_mobile_number').val('');
    $('#email').val('');
    $("#doctor_type").val('default').selectpicker("refresh");
    $('#payment_method').val('');
    $('#Salary').val('');
    $('#Min_Amount').val('');
    $('#opd_commission').val('');
    $('#ipd_commission').val('');
    $('#diagno_commission').val('');
    $('#pharma_commission').val('');
    $('#on_call_value').val('');
    $("#Specialization").val('default').selectpicker("refresh");
    $('#date_of_join').val('');
    $('#probation_period').val('');
    $('#confirmation_date').val('');
    $('#uan_number').val('');




    $('#c_state').val('');
    $('#c_district').val('');
    $('#c_taluka').val('');
    $('#c_area').val('');
    $('#c_pincode').val('');
    $('#c_address').val('');
    $('#p_state').val('');
    $('#p_district').val('');
    $('#p_taluka').val('');
    $('#p_area').val('');
    $('#p_pincode').val('');
    $('#p_address').val('');
    $('#qualification').val('');
    $('#med_reg_mo').val('');
    $('#work_experience').val('');
    $('#bank_name').val('');
    $('#bank_account_no').val('');
    $('#ifsc_code').val('');
    $('#branch_name').val('');
    $('#aadhaar_number').val('');
    $('#pan_number').val('');
    $('#same_address').val('');
    
    //empty_disable_enable('#c_area','1');
    //empty_disable_enable('#c_taluka','1');
    //empty_disable_enable('#c_district','1');
    //empty_disable_enable('#c_state','1');
    //empty_disable_enable('#c_pincode','1');
    $('#other_doc_type').val('');
    $('#other_doc_name').val('');
    $('#other_doc_number').val('');
    $('#d_name').val('');
    $('#sd_name').val('');
    $('#doctor_type').val('');
    $('#case_paper_validity').val('');
    $('#follow_up_charges').val('');
    $('#no_of_free_days').val('');
    $('#no_of_free_visits').val('');
    $('#user_number').val('');
    $('#aadhar_photo').val('');
    $('#pan_photo').val('');

    

    
    //empty_disable_enable('#d_name','1');
  }

  $('#record_form').on('reset',function(event){
    reset_form();
  });

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    
    
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>user-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              reset_form();
              get_list();

              $('#user_id').val(data['user_id']);
              var uid=$('#user_id').val();
              console.log(uid);
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

  $('#user_dept_assign_form').on('submit',function(event){
    event.preventDefault(); 
    user_id=$('#user_id').val();
    var form = $( "#user_dept_assign_form" );
    var formData = new FormData(this);
    formData.append('user_id',user_id);
    
    
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>assign-department',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              //reset_form();
              //get_list();
              //$('#user_id').val(data['user_id']);
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
    user_id=$(this).attr('user_id');
    if (user_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>user-delete',
          method:'post',
          data:{user_id:user_id},
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

  
  $(document).on('click','.edit_record',function () {
    show_user_form();
    user_id=$(this).attr('user_id');
    //alert(user_id);
    
    if (user_id) {
      $.ajax({
        url:'<?=base_url()?>user-by-id',
        method:'post',
        data:{user_id:user_id},
        async: false,
        dataType:'json',
        success:function (data) {

         console.log('data',data);


          
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit User');
            
             $('#user_id').val(user_id);
            //$('#role').val(data['record'][0]['role']);
            $('#role').val(data['record']['role']);
            $('#designation').val(data['record'][0]['designation']);
            $('#department').val(data['record'][0]['department']);
            $('#sub_department').val(data['record'][0]['sub_department']);

           
            $('#first_name').val(data['record'][0]['name']);
            $('#father_name').val(data['record'][0]['middle_name']);
            $('#last_name').val(data['record'][0]['last_name']);


            $('#mother_name').val(data['record'][0]['mother_name']);
            $('#dob_date').val(data['record'][0]['dob']);
            $('#gender').val(data['record'][0]['gender']);
            $('#marital_status').val(data['record'][0]['marital_status']);
            $('#blood_group').val(data['record'][0]['blood_group']);
            $('#mobile_number').val(data['record'][0]['mobile_number']);
            $('#alt_mobile_number').val(data['record'][0]['alt_mobile_number']);


            
            $('#email').val(data['record'][0]['email']);
            $('#date_of_join').val(data['record'][0]['date_of_join']);
            $('#qualification').val(data['record'][0]['qualification']);
            $('#photo').val(data['record'][0]['photo']);
            $('#work_experience').val(data['record'][0]['experiance']);
            $('#med_reg_mo').val(data['record'][0]['medical_reg_number']);
           
           var values=data['record'][0]['Specialization'];
           var element=document.getElementById('Specialization');
            for (var i = 0; i < element.options.length; i++) {
               element.options[i].selected = values.indexOf(element.options[i].value) >= 0;
            }

            //$('#Specialization').val(data['record'][0]['Specialization']);
            
            $('#p_address').val(data['record'][0]['permanant_address']);
            $('#p_area').val(data['record'][0]['p_area']);
            $('#p_taluka').val(data['record'][0]['p_taluka']);
            $('#p_district').val(data['record'][0]['p_dist']);
            $('#p_state').val(data['record'][0]['p_state']);
            $('#p_pincode').val(data['record'][0]['p_pincode']);

            $('#c_address').val(data['record'][0]['current_address']);
            $('#c_area').val(data['record'][0]['c_area']);
            $('#c_taluka').val(data['record'][0]['c_taluka']);
            $('#c_district').val(data['record'][0]['c_dist']);
            $('#c_state').val(data['record'][0]['c_state']);
            $('#c_pincode').val(data['record'][0]['c_pincode']);


            $('#bank_name').val(data['record'][0]['bank_name']);
            $('#bank_account_no').val(data['record'][0]['account_number']);
            $('#ifsc_code').val(data['record'][0]['ifsc_code']);
            $('#branch_name').val(data['record'][0]['branch_name']);

            $('#aadhaar_number').val(data['record'][0]['aadhaar_number']);
            $('#pan_number').val(data['record'][0]['pan_number']);


            $('input[name=user_id]').val(data['user_info']['user_id']);
            
            
            checkIfImageExists(data['record'][0]['aadhaar_front_photo'], (exists) => {
                if (exists) {
                    $('#aadhar_front_url').val(data['record'][0]['aadhaar_front_photo']);
                  } else {
                    $('#aadhar_front_url').val('https://aqdsoft.in/uploads/user/Aadhaar/default_aadhar_front_photo.png');
                  }
              });

            checkIfImageExists(data['user_info']['aadhaar_back_photo'], (exists) => {
                if (exists) {
                    $('#aadhar_back_url').val(data['record'][0]['aadhaar_back_photo']);
                  } else {
                    $('#aadhar_back_url').val('https://aqdsoft.in/uploads/user/Aadhaar/default_aadhar_back_photo.png');
                  }
              });
            checkIfImageExists(data['user_info']['other_doc_photo'], (exists) => {
                if (exists) {
                    $('#other_doc_url').val(data['record'][0]['other_doc_photo']);
                  } else {
                    $('#other_doc_url').val('https://aqdsoft.in/uploads/user/Aadhaar/default_pan_photo.png');
                  }
              });


           
           // empty_disable_enable('#d_name','0');
            //$('#d_name').val(data['record']['d_id']);
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
    

  $(document).on('click','.change_status',function () {
   
    user_id=$(this).attr('user_id');
    user_status=$(this).val();
    if (user_id) {
      if (confirm('Are Your Sure Want To chage This User status ?')==true) {
        if(user_status=='Inactive')
          $(this).val('Active');
        else
          $(this).val('Inactive');
        $.ajax({
          url:'<?=base_url()?>chage-user-status',
          method:'post',
          data:{user_id:user_id,user_status:user_status},
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
        if(user_status=='Inactive')
          $(this).prop("checked", false);
        if(user_status=='Active')
          $(this).prop("checked", true);
      }
    }
  });

  $('#p_pincode').on('input', function(){
        var pincode = $(this).val();
        if(pincode.length >= 6){ 
            console.log(pincode);
            $.ajax({
                url:'<?=base_url()?>get-pincode',
                method:'post',
                data:{pincode:pincode},
                async: false,
                success: function(data){
                    if(data.status=='Success'){

                        console.log(data.list);
                         $('#area_list').show();
                        html="";
                         for (var i=0;i<data.list.length;i++){
                           html += '<div class="add_address" style="border: 0.5px solid #9f9e9e; padding-left: 10px;" area="' + data.list[i]['Name'] + '" taluka="' + data.list[i]['Taluk'] + '" dist="' + data.list[i]['District'] + '" state="' + data.list[i]['State'] + '">' + data.list[i]['Name'] + '</div>';


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
            $('#area_list').html('');;
        }
    });

  

  $(document).on('click','.add_address',function () {
    area=$(this).attr('area');
    taluka=$(this).attr('taluka');
    dist=$(this).attr('dist');
    state=$(this).attr('state');
    $('#area_list').hide();


    $('#p_area').val(area.toUpperCase());
    $('#p_taluka').val(taluka.toUpperCase());
    $('#p_district').val(dist.toUpperCase());
    $('#p_state').val(state.toUpperCase());
})
</script>
