<?php 
setlocale(LC_MONETARY, 'en_IN');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Consent Form</title>
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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>Blood Transfusion Consent</b></h4>
                    </div>
                </div><br>
                <div class="row" style="font-size: 16px">
                    <div class="col-lg-12">
                        <div class="row">
                            <label class="col-lg-3">UHID No. : <b><?=!empty($record['uhid'])?$record['uhid']:'-'?></b></label>
                            <label class="col-lg-6"></label>
                            <label class="col-lg-3">Date : <b><?=date("d-m-Y") ?></b></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-6">Patient Name : <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b></label>
                            <label class="col-lg-3">Age : <b><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></b></label>
                            <label class="col-lg-3">Gender : <b><?=!empty($record['gender'])?$record['gender']:'-'?></b></label>
                        </div>
                        <hr style="margin: 10px;border: 1px solid lightgray;">
                        <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                        </table>
                     
                    </div>
                </div>
                <br>
                <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                    <tr>
                     <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                        <tr>
                            <td style="border-right: 1px solid #ddd;" rowspan="3">Monitored <br>Anaesthesia<br> intravenous agents<br> &  or inhaled gases<br><br><div style="height: 50px;width:60px;border: 1px solid black"></div></td>
                            <td style="border-right: 1px solid #ddd;">Expencted Result</td>
                            <td>Total unconscious state, possible placement of a tube into the trachea (Windpipe) or Pharynx</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Technique</td>
                            <td>Mouth or throat pain, hoarseness, injury to mouth or teeth,vocal cord injuries, awareness under anaesthesia, injury to blood vessels, vomiting, aspiration, pneumonia, loosening of teeth ordental prothesis</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Risks (includes but not limited to)</td>
                            <td>Mouth or throat pain, hoarseness, injury to mouth or teeth,
                                vocal cord injuries, awareness under anaesthesia, injury to blood
                                vessels, vomiting, aspiration, pneumonia, loosening of teeth or
                                dental prothesis-</td>
                        </tr>
                     </table>
                    </tr>
                    <tr>
                      <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                        <tr>
                            <td style="border-right: 1px solid #ddd;" rowspan="3">Spinal or Epidural<br>Anaesthesia<br> Anaesthesia includes<br> needle injection in to<br>spinal canal or epidural
                            space<br><br><div style="height: 50px;width:60px;border: 1px solid black"></div></td>
                            <td style="border-right: 1px solid #ddd;">Expencted Result</td>
                            <td>Temporary decreased or loss of feeling and / or movement to lower part of the body, variable degrees of awareness.</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Technique</td>
                            <td>Drug injected through a needle / catheter placed either directly into the fluid of the spinal canal or immediately outside the spinal canal.</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Risks (includes but not limited to)</td>
                            <td>Mouth or throat pain, hoarseness, injury to mouth or teeth,
                                vocal cord injuries, awareness under anaesthesia, injury to blood
                                vessels, vomiting, aspiration, pneumonia, loosening of teeth or
                                dental prothesis-</td>
                        </tr>
                     </table>
                    </tr>
                    <tr>
                      <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                        <tr>
                            <td style="border-right: 1px solid #ddd;" rowspan="3">Nerve Blocks<br>includes injections<br> near major or<br> minor nerves<br><br><div style="height: 50px;width:60px;border: 1px solid black"></div></td>
                            <td style="border-right: 1px solid #ddd;">Expencted Result</td>
                            <td>Temporary loss of feeling and / or movement of a specific limb or area, variable degrees of awareness.</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Technique</td>
                            <td>Drug injected near nerves providing loss of sensation to the area of operation</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Risks (includes but not limited to)</td>
                            <td>Convulsions, residual pain requiring additional anesthesia, failed
                                block infection, injury to blood vessels (hematoma), injury to lungs
                                (pneumothorax) weakness, persistent numbness, infection</td>
                        </tr>
                     </table>
                    </tr>
                    <tr>
                      <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                        <tr>
                            <td style="border-right: 1px solid #ddd;" rowspan="3">Intavenous<br>Regional <br>Anaesthesia<br><br><div style="height: 50px;width:60px;border: 1px solid black"></div></td>
                            <td style="border-right: 1px solid #ddd;">Expencted Result</td>
                            <td>Total unconscious state, possible placement of a tube into the trachea (Windpipe) or Pharynx.</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Technique</td>
                            <td>Drug injected into the blood stream & / or breathed into the lungs & / or by other routes</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Risks (includes but not limited to)</td>
                            <td>Mouth or throat pain, hoarseness, injury to mouth or teeth,
                            vocal cord injuries, awareness under anaesthesia, injury to blood
                            vessels, vomiting, aspiration, pneumonia, loosening of teeth or
                            dental prothesis</td>
                        </tr>
                     </table>
                    </tr>
                    <tr>
                      <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                        <tr>
                            <td style="border-right: 1px solid #ddd;" rowspan="3">Monitored Anaesthesia C<br>
                                are includes local anaesthesia<br>with or without intravenous sedatives<br> <br> <br><div style="height: 50px;width:60px;border: 1px solid black"></div></td>
                            <td style="border-right: 1px solid #ddd;">Expected Result</td>
                            <td>Reduce anxiety and pain,partial or total amnesia.<br> Variable degrees of awareness</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Technique</td>
                            <td>Drug injected into the blood stream & / or breathed into the lungs & / or by other routes producing a semi-conscious state  </td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Risks (includes but not limited to)</td>
                            <td>An unconscious state depressed  breathing ,injury to blood vesse</td>
                        </tr>
                     </table>
                    </tr>
                    <tr>
                      <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                        <tr>
                            <td style="border-right: 1px solid #ddd;" rowspan="3">Procedural Sedation<br>
                                (Moderate Sedation)<br> <br> <br><div style="height: 50px;width:60px;border: 1px solid black"></div></td>
                            <td style="border-right: 1px solid #ddd;">Expected Result</td>
                            <td>Drug-induced state of reduced awareness and descreased ability<br> to respond</td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Technique</td>
                            <td>Drug injected into the blood stream & / or breathed into the lungs & / or by other routes producing a semi-conscious state  </td>
                        </tr>
                        <tr>
                            
                            <td style="border-right: 1px solid #ddd;">Altered mental states, physical reaction,allergic reaction other problem may require emergency medical attention hospitalization <br>inability to operate any machinery or drive a vehicle for 4 hours after the procedure</td>
                        </tr>
                     </table>
                    </tr>
                </table>
                <br>
                <label class="col-lg-12">
                    <b>I understand that all forms of anaesthesia involve additional risks and hazards. I realize that anaesthesia may
                    have to be changed possibly without explanation to me when needed. Purseu to assessing my condition / patients
                    condition, the final choice of anaesthesia shall be determined by anesthesiologist based on the medical condition.<br><br>
                    I understand that the type of anaesthesia service provided for the desired operation, procedure, treatment is
                    determined by many factors including my/ my patients physical condition, the type of procedure to be performed,
                    as well as / my patients own desire.<br><br>
                    I also understand that my / my patients physical condition as well as the type and length surgery, will
                    influencethe intra-operative course and out come following anaesthesia.<br><br>
                    I have also been informed by my I my patient's doctor, that in addition to my primary condition, I also have the
                    following medical conditions and that the conditions can cause adverse effect like
                    </b>
                </label>
                <label class="col-lg-12">
                    ____________________________________________________________________________________________________________________________________________________________<br>______________________________________________________________________________________________________
                    ______________________________________________________<br>______________________________________________________________________________________________________
                    ______________________________________________________<br>______________________________________________________________________________________________________
                     ______________________________________________________<br>
                </label>
                <label class="col-lg-12">
                    <b>
                        During anaesthesia and surgery, the need for ICU care and ventilator support in the post operative period,
                        should the need arise has also been impressed up on and I give the consent for the same.<br><br>
                        I have been briefed anaesthetic management for the surgery requires intravascular cannulation and use of
                        various monitors that may have complications associated with them.<br><br>
                        I further understand and accept the extremely remote possibility that life-threatening complications may occur,
                        requiring further hospitalization.<br><br>
                        I have also been briefed about the possibility of administration of post-procedural analgesia ifthe need arises.
                    </b>
                </label>
                <label class="col-lg-12">
                    <b>
                        I have had enough opportunities to discuss my condition and treatment and all my questions have been
                        answered to my satisfaction I have been provided with enough information In a language that I can understand, to
                        make an informed decision and I agree to have the procedure.<br><br>
                        On the basis of the above statements, I have signed the consent knowingly, freely and voluntarily and agree to
                        bind by its terms.<br><br>
                        As a doctor, I declare that all the queries raised by the patient/ representative have been answered to his/her
                        satisfaction in a language that he/she can understand.
                    </b>
                </label>
                <br>
                <br>
                <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                    <tr>
                        <th  style="border-right: 1px solid #ddd;">Person</th>
                        <th  style="border-right: 1px solid #ddd;">Name</th>
                        <th  style="border-right: 1px solid #ddd;">Signature</th>
                        <th  style="border-right: 1px solid #ddd;">Date</th>
                        <th  style="border-right: 1px solid #ddd;">time</th>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">Patient :</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">Doctor :</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">Witness :</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">Interpreter(if applicable)</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                </table>
                <br>
                <label class="col-lg-12">
                    <b>
                        In case the patient is unable to give consent/ is a minor the legal guardian /representative shall give consent on
                        behalf of the patient and accordingly all understandings, consents and acknowledgments mentioned above shall
                        be deemed to be consented by the patient
                    </b>
                </label>
                <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                    <tr>
                        <th  style="border-right: 1px solid #ddd;">Person</th>
                        <th  style="border-right: 1px solid #ddd;">Name</th>
                        <th  style="border-right: 1px solid #ddd;">Signature</th>
                        <th  style="border-right: 1px solid #ddd;">Date</th>
                        <th  style="border-right: 1px solid #ddd;">time</th>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">Legal Guardian/<br>representative :</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">(Specify relationship)</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">Reason why patient <br>unable to sign the<br>concent form :</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                        <td style="border-right: 1px solid #ddd;">Interpreter(if applicable)</td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                        <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                </table>
                <br>
                <label class="col-lg-12">
                    <b>In the case of pregnant women I nursing mothers :</b><br>
                    I understand that anaesthetics and other medications may be harmful to a newborn children it may cause birth
                    defects or spontaneous abortion. Recognizing these risks, I accept full responsibility for informing the hospital of a
                    suspected or confirmed pregnancy. For the similar reasons, I understand that I must inform the hospital if I am a
                    nursing mother,
                    I acknowledge the preoperative fasting regulations and attest that they were followed. I here by consent to the
                    anaesthesia service and authorize that it be administered by anesthesiologist,
                    I also consent to alternative type of anaesthesia, if necessary, as deemed appropriate by the anesthesiologist at
                    this facility. I have infom1ed the doctor about all facts important to consider while managing my I patient's health
                    and previous medical history I allergies I specific conditions I disabilities irrespective of whether or not such
                    information would have any bearing or relevance to the procedure, diagnosis or treatment/ proposed I undertaken
                    at the hospital. I accept the fact that in case this statement is untrue, neither this hospital nor the doctors are
                    responsible for the caused consequences. I undertake the obligation to inform the doctor I surgeon and this
                    hospital in case of any change in a written form.
                    I shall not hold the hospital authorities legally or financially responsible for any kind of loss or damage sustained
                    by the procedure. I am also aware that the clinical details collected as part of my examination /treatment routine
                    including physiological parameters, investigations, may be used for the progress of advancing medical education
                    and research, without breaching confidentiality.
                    If something unexpected happens and I need additional or different treatment(s) from the treatment planned, I
                    agree to accept any treatment which is necessary. If any staff member is injured or exposed to patient's blood or
                    other body fluid then I give my consent to a sample of blood being collected for the purpose of testing for infectious
                    diseases, such as Hepatitis B, C, and HIV. I understand that no testing of the blood sample will be carried out
                    without prior discussion and my explicit consent.
                </label>

            </div>
</body>
</html>
<script src="<?php echo base_url()?>assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript">
    status='<?=!empty($print)?$print:'False'?>';
    base_url='<?php echo base_url()?>/demographic-detail';
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