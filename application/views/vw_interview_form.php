<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<style>

    table {
    width: 100%;
    border: 2px solid black;
    margin-top: 20px;
    padding: 20px;
    }

    th,
    td {

        border: 2px solid black;
        padding: 8px;
        text-align: left;
    }

    .container {
        width: 110%;
        max-width: 1300px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
     
     label{
        font-weight: bolder;
        font-size: 16px;
     }

    #title {
        text-align: center;
        margin-left: 450px;
    }
  
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" id="candidate_form_page">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        
        <button class="btn btn-primary pull-right show-user-btn" onclick="show_user_list()"><i class="fa fa-plus"></i> Show List</button>
      </div>
      <div class="ibox-content" style="padding: 0px;">
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div  class="card-header collapsed" data-toggle="collapse" href="#collapseone">
                        <a class="card-title">
                           <h3 style="margin: 0px;">Interview Form</h3>
                        </a>
                    </div>
                    <div id="collapseone" class="card-body collapse show" data-parent="#accordion">
                      <form method="post"  enctype="multipart/form-data" id="record_form">
                        <div class="row" style="padding:5px;">
                          <label class="control-label col-lg-2">Candidate First Name<a style="color: red">*</a></label>
                          <label class="control-label col-lg-2">Candidate Father Name<a style="color: red">*</a> </label>
                          <label class="control-label col-lg-2">Candidate Last Name<a style="color: red">*</a></label>
                          <label class="control-label col-lg-2">Applying For<a style="color: red">*</a></label>
                          <label class="control-label col-lg-2">Select Department<a style="color: red">*</a></label>
                          <label class="control-label col-lg-2">Contact Number<a style="color: red">*</a> </label>
                        
                        </div>
                        <div class="row" style="padding:5px;">    
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="first_name" name="first_name" required="" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="father_name" name="father_name" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="last_name" name="last_name" required="" oninput="this.value = this.value.toUpperCase()"> 
                            </div>
                            <div class="col-lg-2">
                                  <select class="form-control" name="applying_for" id="applying_for" required="">
                                     <option value="" selected="" disabled="">Select Role</option>
                                  </select>
                            </div>
                            <div class="col-lg-2">
                                  <select class="form-control" name="dept_id" id="dept_id" required="">
                                     <option value="" selected="" disabled="">Department</option>
                                  </select>
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="contact_number" name="contact_number" oninput="this.value = this.value.toUpperCase()" maxlength="10">
                            </div>
                            
                               
                        </div>
                        <div class="row" style="padding:5px;">
                          <label class="control-label col-lg-2">Date Of Birth<a style="color: red">*</a></label>
                          <label class="control-label col-lg-2">Email Address<a style="color: red">*</a></label>
                          <label class="control-label col-lg-2">Date of Interview</label>
                          <label class="control-label select_slot col-lg-2">Remark<a style="color: red">*</a></label>

                          
                        </div>
                        <div class="row" style="padding:5px;">    
                            <div class="col-lg-2">
                                <input class="form-control" type="date" id="date_of_birth" name="date_of_birth" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="email_address" name="email_address" required="" oninput="this.value = this.value.toUpperCase()"> 
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="date" id="date_of_interview" name="date_of_interview" required="">
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" id="remark" name="remark" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <button class="btn-primary" type="submit">Save</button>
                            
                        </div>
                      </form>
                        <div style="padding:5px;margin-top: 25px;">
                            <h3>Qualification</h3>
                            <div class="row" style="padding:5px;">
                                <label class="control-label col-lg-2">Degree</label>
                                <label class="control-label col-lg-2">Registration Number</label>
                                <label class="control-label col-lg-2">University/Council Name</label>
                                <label class="control-label col-lg-2">Valid Upto</label>
                            </div>
                            <div class="row" style="padding:5px;">
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="degree" name="degree" oninput="this.value = this.value.toUpperCase()"> 
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="registration_no" name="registration_no"  oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="university" name="university"  oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control" type="date" id="valid_upto" name="valid_upto">
                                </div>

                                <input class="form-control" type="button" style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD" onclick="add_qualification()">
                            </div>
                            
                            <div class="row" style="margin-top:20px;padding-left: 30px;padding-right: 15px;">
                              <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                                  <thead>
                                      <tr>
                                          <th style="border-right: 1px solid white;">Degree</th>
                                          <th style="border-right: 1px solid white;">Registration</th>
                                          <th style="border-right: 1px solid white;">University/Council Name</th>
                                          <th style="border-right: 1px solid white;">Valid Upto</th>
                                          <th style="border-right: 1px solid white;">Remark</th>
                                      </tr>
                                  </thead>
                                  <tbody id="qualification_list">
                                  </tbody>
                              </table>
                            </div>

                            <h3 style="margin-top:25px">Experience</h3>
                            <div class="row" style="padding:5px;">
                                <label class="control-label col-lg-2">Organization Name</label>
                                <label class="control-label col-lg-2">Department</label>
                                <label class="control-label col-lg-2">Designation</label>
                                <label class="control-label col-lg-2">From Date</label>
                                <label class="control-label col-lg-2">To Date</label>
                            </div>
                            <div class="row" style="padding:5px;">
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="organization_name" name="organization_name" required="" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="department" name="department" required="" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" id="designation" name="designation" required="" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control" type="date" id="from_date" name="from_date" required="" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control" type="date" id="to_date" name="to_date" required="">
                                </div>
                                <input class="form-control" type="button" style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD" onclick="add_experience()" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="row" style="margin-top:20px;padding-left: 30px;padding-right: 15px;">
                              <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                                  <thead>
                                      <tr>
                    
                                          <th style="border-right: 1px solid white;">Organization Name</th>
                                          <th style="border-right: 1px solid white;">Year Of Experience</th>
                                          <th style="border-right: 1px solid white;">From Date</th>
                                          <th style="border-right: 1px solid white;">To Date</th>
                                          <th style="border-right: 1px solid white;">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody id="experience_list">
                                  </tbody>
                              </table>
                            </div>

                            <h3 style="margin-top:25px">Professional References</h3>
                            <div class="row" style="padding:5px;">
                                <label class="control-label col-lg-3">Name</label>
                                <label class="control-label col-lg-3">Designation</label>
                                <label class="control-label col-lg-3">Contact No.</label>
                            </div>
                            <div class="row" style="padding:5px;">
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" id="references_name" name="references_name" required="" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" id="references_designation" name="references_designation" required="" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" id="references_contact_number" name="references_contact_number" required="" oninput="this.value = this.value.toUpperCase()">
                                </div>
                               
                                <input class="form-control" type="button" style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD" onclick="add_references()">
                            </div>
                            <div class="row" style="margin-top:20px;padding-left: 30px;padding-right: 15px;">
                              <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                                  <thead>
                                      <tr>
                                          <th style="border-right: 1px solid white;">Name</th>
                                          <th style="border-right: 1px solid white;">Designation</th>
                                          <th style="border-right: 1px solid white;">Contact No.</th>
                                          <th style="border-right: 1px solid white;">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody id="references_list">
                                  </tbody>
                              </table>
                            </div>
                         </div>
                         <br>
                         <br>
                         
                        </div> 

                    </div>
                </div>
            </div>
      </div>
    </div>
    <div class="col-lg-12" id="candidate_list_page">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Candidate List</h3>
          <button class="btn btn-primary pull-right" onclick="show_user_form()"><i class="fa fa-plus"></i> Add </button>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
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
<div class="modal fade" id="schedule_interview_model" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content">
      <form method="post"  enctype="multipart/form-data" id="schedule_interview_form">
        <div class="modal-header">
          <h4 class="modal-title">Schedule Interview</h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" id="TP_list" style="font-size: medium;">
          <div class="row" style="margin:10px 0px;">
            <label class="form-control col-lg-6" style="border:0px;">Select User</label>
            <div class="col-lg-6">
                <select class="form-control" id="user_id" name="user_id">
                </select>
                <input type="hidden" id="interview_id" name="interview_id">
                <input type="hidden" id="interview_round" name="interview_round">
            </div>
          </div>
          <div class="row" style="margin:10px 0px;">
            <label class="form-control col-lg-6" style="border:0px;">Select Date and Time</label>
            <div class="col-lg-6">
                <input class="form-control" type="datetime-local" id="schedule_datetime" name="schedule_datetime">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left close_model">Close</button>
          <button type="submit" class="btn btn-primary pull-right" >Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="interview_detail_model" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content">
      <form method="post"  enctype="multipart/form-data" id="">
        <div class="modal-header">
          <h4 class="modal-title">Interview Details</h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" id="TP_list" style="font-size: medium;">
          <div class="row" style="margin:10px 0px;">
            <label class="col-lg-6"  cstyle="border:0px;">interviewer Name</label>
            <label class="col-lg-6" id="user_name" cstyle="border:0px;"></label>
          </div>
          <div class="row" style="margin:10px 0px;">
            <label class="col-lg-6"  cstyle="border:0px;">interview Date&Time</label>
            <label class="col-lg-6" id="s_datetime" style="border:0px;"></label>
          </div>
          <div class="row" style="margin:10px 0px;">
            <label class="col-lg-6"  cstyle="border:0px;">Round</label>
            <label class="col-lg-6" id="s_round" style="border:0px;"></label>
          </div>
          <div class="row" style="margin:10px 0px;">
            <label class="col-lg-6"  cstyle="border:0px;">IS_remark</label>
            <label class="col-lg-6" id="s_remark" style="border:0px;"></label>
          </div>
          <div class="row" style="margin:10px 0px;">
            <label class="col-lg-6"  cstyle="border:0px;">IS_status</label>
            <label class="col-lg-6" id="s_status" style="border:0px;"></label>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left close_model">Close</button>
          <button type="submit" class="btn btn-primary pull-right" >Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="interview_feedback_model" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content">
      <div class="container">
        <form method="post" enctype="multipart/form-data" name="evaluation_form" id="evaluation_form">
            <table>
                <tbody>
                    <tr>
                        <td colspan="12">
                            <label class="control-label" ><h2>Candidate Evaluation Form</h2></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                        <td colspan="3">
                            <label class="control-label"style="color: red;">Date:</label>
                        </td>
                        <td colspan="3">
                            <input type="date" class="form-control border-secondary border-2" name="date" id="date">
                        </td>
                    </tr>
                   <tr>
                       <td colspan="1">
                         <label class="control-label"style="color: red;">Name:</label>
                       </td>
                       <td colspan="5">
                         <input type="text" name="cname" id="cname" class="form-control border-secondary border-2">
                         <input type="hidden" name="is_id" id="is_id">
                       </td>
                        <td colspan="1">
                         <label class="control-label"style="color: red;">Qualification:</label>
                        </td> 
                        <td colspan="5">
                         <input type="text" name="Qualification" id="Qualification" class="form-control border-secondary border-2">
                       </td>
                   </tr> 
                   <tr>
                       <td colspan="1">
                           <label class="control-label"style="color: red;">Position Applied:</label>
                       </td>
                       <td colspan="11">
                           <input type="text" name="Position_Applied" id="Position_Applied" class="form-control border-secondary border-2" >
                       </td>
                   </tr>
                   <tr>
                       <td colspan="1">
                         <label class="control-label"style="color: red;">Experience In Years:</label>
                       </td>
                       <td colspan="5">
                           <input type="text" name="experience_in_years" id="experience_in_years" class="form-control border-secondary border-2" >
                       </td>
                        <td colspan="1">
                         <label class="control-label"style="color: red;">Department:</label>
                       </td>
                       <td colspan="5">
                           <input type="text" name="r_department" id="r_department" class="form-control border-secondary border-2">
                       </td>
                   </tr> 
                   <tr>
                       <td colspan="2">
                            <label class="control-label">Score:</label> 
                       </td> 
                       <td colspan="2">1</td>
                       <td colspan="2">2</td>
                       <td colspan="2">3</td>
                       <td colspan="2">4</td>
                       <td colspan="2">5</td>
                   </tr>
                   <tr>
                       <td colspan="2"> 
                           <label class="control-label"> Communication:</label>        
                        </td> 
                   </tr>
                   <tr>
                       <td colspan="2">
                           How were the candidate's Communication Skills During the interview?
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" Communication_Skills" id="Communication_Skills" value="1">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" Communication_Skills" id="Communication_Skills" value="2">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" Communication_Skills" id="Communication_Skills" value="3">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" Communication_Skills" id="Communication_Skills" value="4">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" Communication_Skills" id="Communication_Skills" value="5">
                       </td>
                   </tr>
                  <tr>
                       <td colspan="12"></td>
                   </tr> 
                    <tr>
                       <td colspan="2"> 
                           <label class="control-label"> Job Knowlegde:</label>        
                        </td> 
                   </tr>
                    <tr>
                       <td colspan="2">
                           Has the candidate  acquired  necessary skills?
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" necessary_skills" id="necessary_skills" value="1">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" necessary_skills" id="necessary_skills" value="2">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" necessary_skills" id="necessary_skills" value="3">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" necessary_skills" id="necessary_skills" value="4">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" necessary_skills" id="necessary_skills" value="5">
                       </td>
                   </tr>
                  <tr>
                       <td colspan="12"></td>
                   </tr>
                    <tr>
                       <td colspan="2">
                           <label class="control-label">Education:</label>
                       </td> 
                       
                   </tr>
                   <tr>
                       <td colspan="2">
                           Appropriate educational qualifications for the post?
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" educational_qualifications" id="educational_qualifications" value="1">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" educational_qualifications" id="educational_qualifications" value="2">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" educational_qualifications" id="educational_qualifications" value="3">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" educational_qualifications" id="educational_qualifications" value="4">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" educational_qualifications" id="educational_qualifications" value="5">
                       </td>
                   </tr>
                  <tr>
                       <td colspan="12"></td>
                   </tr>
                    <tr>
                       <td colspan="2">
                           <label class="control-label">Candidate Enthusiasm:</label>
                       </td> 
                      
                   </tr>
                   <tr>
                       <td colspan="2">
                           How much interest did the candidate show in the position?
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" position_interest" id="position_interest" value="1">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" position_interest" id="position_interest" value="2">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" position_interest" id="position_interest" value="3">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" position_interest" id="position_interest" value="4">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" position_interest" id="position_interest" value="5">
                       </td>
                   </tr>
                  <tr>
                       <td colspan="12"></td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <label class="control-label">Overall Appearence:</label>
                       </td>  
                   </tr>
                   <tr>
                       <td colspan="2">
                          Grooming/Body language
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" body_language" id="body_language" value="1">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" body_language" id="body_language" value="2">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" body_language" id="body_language" value="3">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" body_language" id="body_language" value="4">
                       </td>
                       <td colspan="2">
                           <input type="radio" name=" body_language" id="body_language" value="5">
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                            <label class="control-label">Total Score:</label> 
                       </td> 
                       <td colspan="10">
                           <input type=" text" class="form-control" name="total_score" id="total_score">
                       </td>
                     
                   <tr>
                       <td colspan="12"></td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <label class="control-label"style="color: red;">Current Salary:</label>
                       </td>
                       <td colspan="4">
                           <input type="text" name="Current_Salary" id="Current_Salary" class="form-control border-secondary border-2" >
                       </td>
                       <td colspan="2">
                           <label class="control-label"style="color: red;">Expected Salary:</label>
                       </td>
                       <td colspan="4">
                           <input type="text" name="Expected_Salary" id="Expected_Salary" class="form-control border-secondary border-2" >
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <label class="control-label">Recommendation:</label>
                       </td>
                       <td colspan="10">
                           <label class="control-label">Yes</label>
                           <input type="radio" name=" Recommendation" id="Recommendation" value="Yes">
                           <label class="control-label">No</label>
                           <input type="radio" name=" Recommendation" id="Recommendation" value="No">
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <label class="control-label">Remark:</label>
                       </td>
                       <td colspan="10">
                           <textarea  name="Remark" id="remark" class=" form-control border-secondary border-2 " rows="2"></textarea>
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <label class="control-label">Candidate Evaluation Form:</label>
                       </td>
                       <td colspan="10">
                           <label class="control-label" id="NCP_form" style="color:red;"><u>Click To Fill</u></label>
                       </td>
                   </tr>
                </tbody>
            </table>
            <br>
            <button class="btn-primary pull-right" type="submit">Submit</button>
        </form>
      </div>
     
    </div>
  </div>
</div>
<div class="modal fade" id="NCP_model" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content">
      <div class="container">
        <fieldset style="border: 2px solid black">
            <form method="post" enctype="multipart/form-data" name="" id="">
               
               <label class="control-label" style="margin-left:10px;">Credentials Submitted to the Office:</label>
               <div class="row" style="margin-top:20px;">
                    <div class="col-lg-1">
                        <label class="control-label">Certification:-</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" class="form-control" name="certification" id="certification" value="Yes">
                    </div>
                     <div class="col-lg-2">Year of Passing</div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <label class="control-label">Diploma:-</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" class="form-control" name="Diploma" id="Diploma" value="Yes">
                    </div>
                     <div class="col-lg-2">Year of Passing</div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <label class="control-label">Degree:-</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" class="form-control" name="Degree" id="Degree" value="Yes">
                    </div>
                     <div class="col-lg-2">Year of Passing</div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <label class="control-label">Post Graduation:-</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" class="form-control" name="Post_Graduation" id="Post_Graduation" value="Yes">
                    </div>
                     <div class="col-lg-2">Year of Passing</div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <label class="control-label">Additional Qualification:-</label>
                    </div>
                    <div class="col-lg-1">
                        <input type="checkbox" class="form-control" name="Additional_Qualification" id="Additional_Qualification" value="Yes">
                    </div>
                    <div class="col-lg-2">Year of Passing</div>
                </div>
                
                <label class="control-label" >Registration:  </label>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-1">
                        <input type="checkbox" class="form-control" name="degree_council_check" id="degree_council_check" value="Yes">
                    </div>
                    <div class="col-lg-2">
                        <label class="control-label">
                            Degree : Council
                        </label>
                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control border-secondary border-2" name="degree_council" id="degree_council">
                    </div>
                    <div class="col-lg-1">
                        <label class="control-label">No:</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control border-secondary border-2" name="degree_council_no" id="degree_council_no">
                    </div>

                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-1">
                        <input type="checkbox" class="form-control" name="Diploma_council_check" id="Diploma_council_check" value="Yes">
                    </div>
                    <div class="col-lg-2">
                        <label class="control-label">
                            Diploma : Council
                        </label>
                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control border-secondary border-2" name="diploma_council" id="diploma_council">
                    </div>
                    <div class="col-lg-1">
                        <label class="control-label">No:</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control border-secondary border-2" name="diploma_council_no" id="diploma_council_no">
                    </div>

                </div>
                
                <label class="control-label" >Special training:  </label>
                
                <table>
                    <tbody>
                        <tr>
                            <td colspan="3"><label class="control-label">Subject/Topic</label></td>
                            <td colspan="3"><label class="control-label">Duration of training</label></td>
                            <td colspan="3"><label class="control-label">Training authority</label></td>
                            <td colspan="3"><label class="control-label">Other details</label></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <input type="text" class="form-control border-secondary border-2" name="Subject_Topic" id="Subject_Topic">
                            </td>
                            <td colspan="3">
                                <input type="text" class="form-control border-secondary border-2" name="Duration_of_training" id="Duration_of_training">
                            </td>
                            <td colspan="3">
                                <input type="text" class="form-control border-secondary border-2" name="Training_authority" id="Training_authority">
                            </td>
                            <td colspan="3">
                                <input type="text" class="form-control border-secondary border-2" name="Other_details" id="Other_details">
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                <div class="row" style="margin-top:30px; margin-right: 10px; margin-left: 10px;">
                        <label class="control-label">
                            After evaluating the credentials of _________________ his/her request for privileges and the need of
                            the hospital, following privileges of patient care have been granted to him/her. These privileges may
                            be modified as per requirement.
                        </label>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <label class="control-label">Department</label>
                            </td>
                            <td colspan="6">
                                <label class="control-label">Privileges applied for</label>
                            </td>
                            <td colspan="3" rowspan="1">
                                <label class="control-label">Privileges granted</label>
                            </td>
                        </tr>
                        <tr> 
                            <td colspan="9"></td>
                            <td colspan="1"><label class="control-label">Yes</label></td>
                            <td colspan="1"><label class="control-label">No</label></td>
                            <td colspan="1"><input type="date" class="form-control border-secondary border-2" name="date" id="date">   
                        </tr>
                    </tbody>
                </table>
                
                
            </form>
        </fieldset>
      </div>
    </div>
  </div>
</div>



<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#interview_form_tab').addClass('active');

  $('#candidate_form_page').hide();
  
  get_list();
  role_all();
  department_all();
  user_all();
  const  qualification_data = [];

  const currentDate = new Date();
  const formattedDate = currentDate.toISOString().split('T')[0];
  $('#date_of_interview').val(formattedDate);
  $('#date').val(formattedDate);


  
  function show_user_form(){

    $('#candidate_list_page').hide();
    $('#candidate_form_page').show()
  }

  function show_user_list(){
    $('#candidate_form_page').hide();
    $('#candidate_list_page').show();
   }


   $('#designation').change(function(){
        var designation=$(this).val();
        if(designation=='3'){   
            $('.doctor_info').show();
        }
        else{
            $('.doctor_info').hide();
            } 
    })

   $('#other_doc_type').change(function(){
        var document_name=$(this).val();
        if(document_name=='OTHER'){   
            $('.other_doc_name_div').show();
        }
        else{
            $('.other_doc_name_div').hide();
            } 
    })


   $('#NCP_form').click(function(){

    $('#NCP_model').modal('show');

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
        'url':'<?=base_url()?>interview-list',
      },
      'columns': [
        {title: "Sr.No",data:"sr_no",mSearch:false},
        {title: "Candidate Name",data:"full_name",mSearch:true},
        {title: "Contact Number",data:"contact",mSearch:true},
        {title: "Department",data:"dept_name",mSearch:true},

        {title: "Apply For",data:"apply_for",mSearch:true},
        {title: "Status",data:"status",mSearch:false},
        {title: "Details",data:"detail",mSearch:false}, 
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6] },
                 {
                  'targets': [0,1,2,3,4], 
                   'createdCell':  function (td, cellData, rowData, row, col) {
                        id=rowData.id;
                        $(td).attr('class', 'view_candidate'); 
                        $(td).attr('candidate_id',id); 
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


  $('#view_candidate').click(function(){

    alert('ssafa');
  })

  $(document).on('click','.view_candidate',function(){
  
   var c_id=$(this).attr('candidate_id');
   alert(c_id);

    //window.open('<?=base_url()?>user-details/'+user_id, '_blank');
 });


  function reset_form(){

    $('#first_name').val('');
    $('#date_of_birth').html('');
    $('#contact_number').html('');
    $('#email_address').html('');
    $('#father_name').val('');
    $('#last_name').val('');
    $('#applying_for').val('');
    $('#date_of_interview').val('');
    $('#remark').val('');
    $('#second_round').val('');
    $('#salary_offered').val('');
    $('#date_of_joining').val('');
    $('#joining_remark').val('');
    $('#qualification_list').html('');
    $('#experience_list').html('');
    $('#references_list').html('');
    $('#degree').html('');

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
          $("#applying_for").html(html);
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
          var html="<option value='' selected='' disabled=''>Select Department</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#dept_id").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  
  function add_qualification() {
     
      var degree = $("#degree").val();
      var registration_no = $("#registration_no").val();
      var university = $("#university").val();
      var valid_upto = $("#valid_upto").val();
    
      if (registration_no && university && valid_upto) {
          
            var qualification_entry = [
                registration_no,university,valid_upto
            ];

              qualification_data.push(qualification_entry);

            var html = '<tr style="font-size: 18px;">\
                          <td style="border-right:1px solid lightgray">' + degree + '</td>\
                          <td style="border-right:1px solid lightgray">' + registration_no + '</td>\
                          <td style="border-right:1px solid lightgray">' + university + '</td>\
                          <td style="border-right:1px solid lightgray">' + valid_upto + '</td>\
                          <td style="border-right:1px solid lightgray"><i class="fa fa-times delete_qualification"></i></td>\
                      </tr>';

            $('#qualification_list').append(html);
         
            reset_qualification();
          
      } else {
          alert("Please Enter value of all Qualification fields.");
      }
  }

  $('#qualification_list').on('click', '.delete_qualification', function() {
    var rowIndex = $(this).closest('tr').index();
    qualification_data.splice(rowIndex, 1);
    $(this).closest('tr').remove();
  });

  function reset_qualification(){

    $('#registration_no').val('');
    $('#university').val('');
    $('#valid_upto').val('');
  }

  
  const experience_data=[];
  function add_experience() {
      var organization_name = $("#organization_name").val();
      var designation = $("#designation").val();
      var from_date = $("#from_date").val();
      var to_date = $("#to_date").val();
      if (organization_name && designation && from_date && to_date ) {
          
            var experience_entry = [
                organization_name,designation,from_date,to_date
            ];

              experience_data.push(experience_entry);

            var html = '<tr style="font-size: 18px;">\
                          <td style="border-right:1px solid lightgray">' + organization_name + '</td>\
                          <td style="border-right:1px solid lightgray">' + designation + '</td>\
                          <td style="border-right:1px solid lightgray">' + from_date + '</td>\
                           <td style="border-right:1px solid lightgray">' + to_date + '</td>\
                          <td style="border-right:1px solid lightgray"><i class="fa fa-times delete_experience"></i></td>\
                      </tr>';

            $('#experience_list').append(html);
            reset_experience();
          
      } else {
          alert("Please Enter value of all Experience fields.");
      }
  }

  $('#experience_list').on('click', '.delete_experience', function() {
    var rowIndex = $(this).closest('tr').index();
    experience_data.splice(rowIndex, 1);
    $(this).closest('tr').remove();
  });

  function reset_experience(){
    $('#organization_name').val('');
    $('#designation').val('');
    $('#from_date').val('');
    $('#to_date').val('');
  }

  const reference_data=[];
  function add_references() {
      var references_name = $("#references_name").val();
      var references_designation = $("#references_designation").val();
      var references_contact_number = $("#references_contact_number").val();
      if (references_name && references_designation && references_contact_number) {
          
            var reference_entry = [
                references_name,references_designation,references_contact_number
            ];

              reference_data.push(reference_entry);

            var html = '<tr style="font-size: 18px;">\
                          <td style="border-right:1px solid lightgray">' + references_name + '</td>\
                          <td style="border-right:1px solid lightgray">' + references_designation + '</td>\
                          <td style="border-right:1px solid lightgray">' + references_contact_number + '</td>\
                          <td style="border-right:1px solid lightgray"><i class="fa fa-times delete_reference"></i></td>\
                      </tr>';

            $('#references_list').append(html);
            reset_reference();
          
      } else {
          alert("Please Enter value of all Reference fields.");
      }
  }

  $('#references_list').on('click', '.delete_reference', function() {
    var rowIndex = $(this).closest('tr').index();
    experience_data.splice(rowIndex, 1);
    $(this).closest('tr').remove();
  });

  function reset_reference(){
    $('#references_name').val('');
    $('#references_designation').val('');
    $('#references_contact_number').val('');
  }

$('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    formData.append('qualification_data', JSON.stringify(qualification_data));
    formData.append('experience_data', JSON.stringify(experience_data));
    formData.append('reference_data', JSON.stringify(reference_data));
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>interview-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              reset_form();
              reset_qualification();
              reset_experience();
              reset_reference();
              
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


$(document).on('click', '.interview_schedule', function () {

    
    var interview_schedule=$(this).attr('interview_status');
    
    switch(interview_schedule){

        case 'Pending':
        case '1st_round_selected':
        case '2st_round_selected':
                    var cid=$(this).attr('cid');
                    $('#interview_id').val(cid);
                    $('#interview_round').val(interview_schedule);
                    $('#schedule_interview_model').modal('show');
            break;

        case '1st_round_schedule':
        case '2st_round_schedule':
        case '3st_round_schedule':
                
                var is_id=$(this).attr('is_id');
                candidate_evaluation_form(is_id);  
            break;

    }

});



 function candidate_evaluation_form(is_id){

    var is_id=is_id;
    $('#interview_feedback_model').modal('show');
    $.ajax({
      url:'<?=base_url()?>get-candidate-detail',
      method:'post',
      async: false,
      dataType: 'json',
      data:{is_id:is_id},
      success:function (data) { 
        if(typeof(data)=='object'){
         
            $('#cname').val(data['result']['name']);
            $('#Qualification').val(data['result']['degree']);
            $('#Position_Applied').val(data['result']['r_name']);
            $('#experience_in_years').val(data['result']['exprience']);
            $('#r_department').val(data['result']['dept_name']);
            $('#is_id').val(is_id);


        }else{
          //location.reload();
        }
      }

  })



 }


 function user_all() {
    $.ajax({
      url:'<?=base_url()?>users-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select User</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#user_id").html(html);
        }else{
          location.reload();
        }
      }
    })
  }


  

  $('#schedule_interview_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#schedule_interview_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>schedule-interview-action',
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


  function reset_evaluation_form(){

    $('#date').val('');
    $('#cname').val('');
    $('#Qualification').val('');
    $('#Position_Applied').val('');
    $('#experience_in_years').val('');
    $('#r_department').val('');
    $('#total_score').val('');

    /*
    $('input[name="Communication_Skills"]').attr('checked', false);
    $('input[name="necessary_skills"]').attr('checked', false);
    $('input[name="educational_qualifications"]').attr('checked', false);
    $('input[name="position_interest"]').attr('checked', false);
    $('input[name="body_language"]').attr('checked', false);
    $('input[name="Recommendation"]').attr('checked', false);
    $('input[name="remark"]').attr('checked', false); */

  }

  $(document).on('click', '.interview_detail', function () {

    var iid=$(this).attr('iid');
    $('#interview_detail_model').modal('show');
     $.ajax({
      url:'<?=base_url()?>get-interview-detail',
      method:'post',
      async: false,
      dataType: 'json',
      data:{iid:iid},
      success:function (data) { 
        if(typeof(data)=='object'){
         
         $('#user_name').text("");
         $('#s_datetime').text("");
         $('#s_round').text("");
         $('#s_remark').text("");
          $('#s_status').text("");
         $('#user_name').text(data['result']['user_name']);
         $('#s_datetime').text(data['result']['schedule_date']);
         $('#s_round').text(data['result']['type']);
         $('#s_remark').text(data['result']['remark']);
         $('#s_status').text(data['result']['status']);
        }else{
          //location.reload();
        }
      }

  })

  })

   $('#evaluation_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $("#evaluation_form");
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>evaluation-form-action',
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
              reset_evaluation_form();
              
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

/*
  $(document).on('click','.update_status',function(){
        

        IS_id=$(this).attr('IS_id');
        IS_status=$(this).attr('IS_status');
        feedback_status=$(this).attr('feedback_status');
        remark=$('#fremark').val();

        if(IS_id)
        {
          $.ajax({
            url:'<?=base_url()?>interview-feedback-action',
            method:'post',
            data:{IS_id:IS_id,IS_status:IS_status,feedback_status:feedback_status,remark:remark},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  get_list();
                  $('#interview_feedback_model').modal('hide');
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

*/
  


 
</script>
