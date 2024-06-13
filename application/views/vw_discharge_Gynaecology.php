<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<style >
     .container{
          width: 100%;
          max-width: 1200px; 
          margin: 0 auto; 
          padding: 20px; 
          box-sizing: border-box; 

          background-color: #fff; 
          border: 1px solid #ccc;
          border-radius: 8px; 
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
</style>

<form method="post" enctype="multipart/form-data" name="discharge_gynaecology_summary"id="discharge_gynaecology_summary">
<div class="container">

        <div class="row">
            <div class="col-lg-12" style="padding-bottom: 5px;">
                <h2 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px dotted darkgrey;">
                    <b>Obstetrics & Gynaecology Discharge Summary</b>
                </h2>
            </div>
        </div>
        <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;"><b>Discharge Type:-</b></label>
            <div class="col-lg-3">
                <select class="form-control border border-secondary border-2" name="dsc_type" id="dsc_type">
                    <option>Select Discharge Type</option>
                    <option>Recovered</option>
                    <option>Not Recovered</option>
                    <option>Death</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;"><b>Consultant Name:-</b></label>
            <div class="col-lg-3">
                <input class="form-control border border-secondary border-2" type="text" name="consultant_name" id="consultant_name"
                    maxlength="50">
            </div>
        </div>
        <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;"><b>Admission Diagnosis:-</b></label>
            <div class="col-lg-6">
                <textarea id="admission_diagnosis" name="admission_diagnosis" class="form-control border border-secondary border-2"
                    rows="1" cols="100"></textarea>
            </div>
        </div>
        <div>
            <div>
                <label class="control-label col-lg-6">
                    <h3>Brief History and Physical Examination on Admission:-</h3>
                </label>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>C/O:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="c_o"
                        id="c_o" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>LMP:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="lmp"
                        id="lmp" maxlength="50">
                </div>
            </div>

            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>EDD:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="edd"
                        id="edd" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>O/H:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="o_h"
                        id="o_h" maxlength="50">
                </div>
            </div>

            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>M/L:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="m_l"
                        id="m_l" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>P/m/H:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="p_m_h"
                        id="p_m_h" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>P/SX/H:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="p_sx_h"
                        id="p_sx_h" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>F/H:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="f_h"
                        id="f_h" maxlength="50">
                </div>
            </div>

            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>Allergy History:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="allergy_history"
                        id="allergy_history" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>On Examination:-General
                        Condition:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="general_condition"
                        id="general_condition" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-2" style="border:0px;"><b>BP:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="b_p"
                        id="b_p" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>P:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="p"
                        id="p" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>SPO 2:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="SPO_2"
                        id="SPO_2" maxlength="50">
                </div>
            </div>
        </div>
        <div>
            <label class="form-control col-lg-6">
                <h3>SYSTEMIC EXAMINATION:-</h3>
            </label>
        </div>
        <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-2" style="border:0px;"><b>CVS:-</b></label>
            <div class="col-lg-2">
                <input class="form-control border border-secondary border-2" type="text" name="cvs" id="cvs"
                    maxlength="50">
            </div>
            <label class="form-control col-lg-2" style="border:0px;"><b>CNS:-</b></label>
            <div class="col-lg-2">
                <input class="form-control border border-secondary border-2" type="text" name="cns" id="cns"
                    maxlength="50">
            </div>
            <label class="form-control col-lg-2" style="border:0px;"><b>RS:-</b></label>
            <div class="col-lg-2">
                <input class="form-control border border-secondary border-2" type="text" name="rs" id="rs"
                    maxlength="50">
            </div>
        </div>
        <div>
            <label class="form-control col-lg-6">
                <h3>PER ABDOMEN:-</h3>
            </label>
        </div>
        <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-2" style="border:0px;"><b>Uterus:-</b></label>
            <div class="col-lg-2">
                <input class="form-control border border-secondary border-2" type="text" name="uterus" id="uterus"
                    maxlength="50">
            </div>
            <label class="form-control col-lg-2" style="border:0px;"><b>FSH:-</b></label>
            <div class="col-lg-2">
                <input class="form-control border border-secondary border-2" type="text" name="fsh" id="fsh"
                    maxlength="50">
            </div>
            <label class="form-control col-lg-2" style="border:0px;"><b>Foetal Movement:-</b></label>
            <div class="col-lg-2">
                <input class="form-control border border-secondary border-2" type="text" name="foetal_movement" id="foetal_movement"
                    maxlength="50">
            </div>
        </div>
        <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-2" style="border:0px;"><b>NST:-</b></label>
            <div class="col-lg-2">
                <input class="form-control border border-secondary border-2" type="text" name="nst" id="nst"
                    maxlength="50">
            </div>
            <label class="form-control col-lg-2" style="border:0px;"><b>Plv:-(Per Vaginum):-</b></label>
            <div class="col-lg-6">
                <textarea id="Plv" name="Plv" class="form-control border border-secondary border-2"
                    rows="1" cols="100"></textarea>
            </div>

        </div>
        <div>
            <div>
                <label class="form-control col-lg-6">
                    <h3>INVESTIGATION:-</h3>
                </label>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-2" style="border:0px;"><b>Date:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="date" name="date"
                        id="date" maxlength="50">

                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>HB:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="h_b"
                        id="h_b" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>WBC:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="wbc"
                        id="wbc" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-2" style="border:0px;"><b>P/L:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="p_l"
                        id="p_l" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>Uric Acid:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="uric_acid"
                        id="uric_acid" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>SGOT:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="sgot"
                        id="sgot" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-2" style="border:0px;"><b>SGPT:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="sgpt"
                        id="sgpt" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>HIV:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="hiv"
                        id="hiv" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>HBSAG:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="hbsag"
                        id="hbsag" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-2" style="border:0px;"><b>Urine Albumin:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="urine_albumin"
                        id="urine_albumin" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>Serium Cr:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="serium_cr"
                        id="serium_cr" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>Peripheral Smear:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="peripheral_smear"
                        id="peripheral_smear" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-2" style="border:0px;"><b>RBC Morphology:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="rbc_morphology"
                        id="rbc_morphology" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>WBC Morphology:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="wbc_morphology"
                        id="wbc_morphology" maxlength="50">
                </div>
                <label class="form-control col-lg-2" style="border:0px;"><b>Platelets On Smear:-</b></label>
                <div class="col-lg-2">
                    <input class="form-control border border-secondary border-2" type="text" name="platelets_on_smear"
                        id="platelets_on_smear" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">

                <label class="form-control col-lg-2" style="border:0px;"><b>USG:-</b></label>
                <div class="col-lg-6">
                    <textarea id="USG" name="USG" class="form-control border border-secondary border-2"
                        rows="1" cols="100"></textarea>
                </div>
            </div>
        </div>
        <div>
            <div>
                <label class="form-control col-lg-6">
                    <h3>DETAILS OF THE PROCEDURE:-</h3>
                </label>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>Date:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="date" name="Date"
                        id="date" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>Time:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="time" name="time"
                        id="time" maxlength="50">
                </div>

            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>Procedure Name:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="procedure_name"
                        id="procedure_name" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>Indication:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="indication"
                        id="indication" maxlength="50">
                </div>
            </div>
            <div>
                <label class="form-control col-lg-6"><b>Details Of New Born:-</b> </label>
            </div>

            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>Gender:-</b></label>

                <div class="col-lg-1">
                    <label>
                        <input type="radio" name="Gender" value="Male"><b>Male</b>
                    </label>
                </div>
                <div class="col-lg-1">
                    <label>
                        <input type="radio" name="Gender" value="Female"><b>Female</b>
                    </label>
                </div>
                <div class="col-lg-1">
                    <label>
                        <input type="radio" name="Gender" value="Other"><b>Other</b>
                    </label>
                </div>

                <label class="form-control col-lg-3" style="border:0px;"><b>K.G:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="text" name="k_g"
                        id="k_g" maxlength="50">
                </div>
            </div>
            <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-3" style="border:0px;"><b>Date:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="date" name="D_ate"
                        id="Date" maxlength="50">
                </div>
                <label class="form-control col-lg-3" style="border:0px;"><b>Time:-</b></label>
                <div class="col-lg-3">
                    <input class="form-control border border-secondary border-2" type="time" name="Time"
                        id="Time" maxlength="50">
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4 custom-space">
                    <label>
                        <h3>Intra Operative Findings:</h3>
                    </label>
                    <div>
                        <textarea id="intra_operative_findings" name="intra_operative_findings"
                            class="form-control border border-secondary border-2" rows="2" cols="100"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 custom-space">
                    <label >
                        <h3>Course In Hospital:</h3>
                    </label>
                    <div>
                        <textarea id="course_in_hospital" name="course_in_hospital" class="form-control border border-secondary border-2"
                            rows="2" cols="100"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 custom-space">
                    <label >
                        <h3>Medical During Hospital:</h3>
                    </label>
                    <div>
                        <textarea id="medical_during_hospital" name="medical_during_hospital"
                            class="form-control border border-secondary border-2" rows="2" cols="100"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <label class="form-control col-lg-6"><b>Discharge Medication and Advice:-</b> </label>
            </div>            
        </div>
        <div class="row">
                <div class="col-lg-4 custom-space">
                    <label>
                        <h3>Advice:</h3>
                    </label>
                    <div>
                        <textarea id="advice" name="advice"
                            class="form-control border border-secondary border-2" rows="2" cols="100"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 custom-space">
                    <label for="FollowUp">
                        <h3>In Case Of :</h3>
                    </label>
                    <div>
                        <textarea id="in_case_of" name="in_case_of" class="form-control border border-secondary border-2"
                            rows="2" cols="100"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 custom-space">
                    <label for="SpecialRemark">
                        <h3>Contact Dr:</h3>
                    </label>
                    <div>
                        <textarea id="contact_dr" name="contact_dr"
                            class="form-control border border-secondary border-2" rows="2" cols="100"></textarea>
                    </div>
                </div>
     </div>
     <div class="row col-lg-3" style="text-align:center;margin-top: 15px;">
              <button type="submit" class=" col-lg-5 btn btn-primary" >Submit</button>
     </div>
</div>
            
 </div>
</form>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
     $('#discharge_gynaecology').addClass('active');

     $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>discharge-gynaecology-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              // reset_form();
              // get_list();
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
</script>