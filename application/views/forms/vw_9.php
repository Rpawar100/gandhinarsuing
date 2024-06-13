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
        
        td{
            border: 1px solid black;
            padding: 10px 5px;
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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>Informed Consent For Surgery</b></h4>
                    </div>
                </div><br>
                <div class="row" style="font-size: 14px">
                    <div class="col-lg-12">
                        <div class="row">
                            <label class="col-lg-12">Patient Full Name : <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-3">UHID No. : <b><?=!empty($record['uhid'])?$record['uhid']:'-'?></b></label>
                            <label class="col-lg-1"></label>
                            <label class="col-lg-5">Date : <b><?=date("d-m-Y") ?></b></label>
                            <label class="col-lg-3">Time : <b><?=date("h:i A") ?></b></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-3">Gender : <b><?=!empty($record['gender'])?$record['gender']:'-'?></b></label>
                             <label class="col-lg-1"></label>
                            <label class="col-lg-5">Date of Birth : <b><?=!empty($record['patient_dob'])?$record['patient_dob']:'-'?></b></label>
                            <label class="col-lg-3">Age : <b><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></b></label>
                        </div>
                        <hr style="    margin: 10px;border: 1px solid lightgray;">
                        <div class="row">
                           <label class="col-lg-12">I,<?=!empty($record['patient_name'])?$record['patient_name']:'-'?> patient, Or (representative of patient_________________________________________________),
                            have(Plase tick the correct option above and below) 
                            Read I been expaliuned this consent from in __________________________________________________________________________(name of language)
                            which i fully understand and understood the information provided about ___________________________________________________________________________________(full name of operation/procedure) given below in this concent form.
                           </label>
                           

                           
                        </div> 
                        <div class="row" style="margin-top:20px">
                            <label class="col-lg-12">Brief description of operation i procedure__________________________________________________________________________________<br>___________________________________________________________________________________________<br>___________________________________________________________________________________________________
                           </label>
                        </div>
                        <br>
                        <label>Intended Benefits</label>
                        <table style="width: 100%;font-size: 14px;">
                            <tr>
                                <td style="width: 25%">1.Relief from diagnosed illness</td>
                                <td style="width: 40%">2.</td>
                                
                            </tr>
                            <tr >
                                <td style="width: 25%">3.</td>
                                <td style="width: 40%">4.</td>
                                
                            </tr>
                             <tr >
                                <td style="width: 25%">5.</td>
                                <td style="width: 40%">6.</td>
                                
                            </tr>
                            
                        </table>
                        <br>
                        <label>I understand that all procedure carry certain risk. The potential risk and complication from this procedure are :</label>
                        <table style="width: 100%;font-size: 14px;">
                            <tr style="text-align: center;font-weight: bolder;">
                                <td style="width: 25%">1.Bleeding</td>
                                <td style="width: 40%">2.Infection</td>
                                
                            </tr>
                            <tr >
                                <td style="width: 25%">3.</td>
                                <td style="width: 40%">4.</td>
                                
                            </tr>
                            <tr>
                                <td style="width: 25%">5.</td>
                                <td style="width: 40%">6.</td>
                                
                            </tr>
                            <tr>
                                <td style="width: 25%">7.</td>
                                <td style="width: 40%">8.</td>
                                
                            </tr>
                             <tr>
                                <td style="width: 25%">9.</td>
                                <td style="width: 40%">10.</td>
                                
                            </tr>
                        </table>
                        <br>
                        <label>I have been expained the implicvations of not undergoing this procedure and the alternative methods of treatment like</label>
                        <table style="width: 100%;font-size: 14px;">
                            <tr>
                                <td style="width: 25%">1.</td>
                                <td style="width: 40%">2.</td>
                                
                            </tr>
                            <tr >
                                <td style="width: 25%">3.</td>
                                <td style="width: 40%">4.</td>
                                
                            </tr>
                        </table>
                        <br>
                        <label>
                            I am now aware of the intended benefits, possible risks & complication and available alternatives to the said operation/ procedure. I am also aware that results of any operation/ procedure can vary from patient to patient; and I declare that no guarantees have been made to me regarding success of this operation/procedure. I am aware that while majority of patients have an uneventful operation and recovery, few cases may be associated with complications. I em aware of the common risks and complications associated with this operation/ procedure and understand that It is not possible to list all possible risk and complications of any operation/procedure.
                            I also understand that sometimes a planned operations I procedure may need to be postponed or cancelled if patients clinical condition worsens or due to any unforeseen technical reasons. I am also aware that I can withdrew my consent at any point of time at my own risk and consequence, by submitting the withdrawal in writing.

                            I understand that if medical emergencies demand, further or alternative operative/procedural measures may need to be carried out, and in such case there may be difference in the planned and actual operation/ procedure. I am aware that I may require administration of blood and/or blood products during or after the operation/procedure as found necessary by the hicRED MINOT EntyshPROobtained).

                        </label>
                        <label > 
                            I am now also aware that during the course of this operation/procedure the doctor will be assisted by medical and parame
                            team, and that the doctor may seek consultation/assistance from relevant specialists if the need arises.
                        </label>
                        <label  style="margin-top:20px"> 
                           I agree to observing, photography (still video/televising) of the procedure (including relevant portions of my body) including
                            such acts. I also agree to my clinical details being shared for scientific publication if my identity is not disclosed.
                        </label>
                        <label  style="margin-top:20px"> 
                           I am also aware of the expected course after the operation/procedure and the care to be provided, and understand tha
                            sometimes admission to an intensive care unit and/or extension of duration of hospitalization may be required and/or there may b
                            respirement of extra medicine or treatments, thereby leading to increase in the treatment expenses, depending upon the body's
                            to treatment/procedure.
                        </label>
                        <label  style="margin-top:20px"> 
                          I authorize the hospital for disposal of any tissue or body part that may be removed from my body in the appropriate manner
                            during and for the purpose of conducting this operation/procedure.
                        </label>
                        <label  style="margin-top:20px"> 
                          I am also aware that the clinical details collected as part of my examination/treatment routine including physiological
                            parameters, investigations, may be used for the progress of advancing medical education and research, without breaching
                            confidentiality. If something unexpected happens and I need additional or different treatment(s) from the treatment planned, I agree
                            to accept any treatment which is necessary.
                        </label>
                        <label  style="margin-top:20px"> 
                         <b>Photography/Videography:</b> I do/do not consent to the photography or televising of the procedure(s) to be performed for the
                            purpose of advancing medical education and research, or its publication in scientific journals provided the patient identity is not
                            revealed by the pictures or description In the accompanying texts, in an effort to further medical science and education.
                        </label>
                        <label  style="margin-top:20px"> 
                            I declare that I have received & fully understood the information provided in this consent form, that I have been given an
                            opportunity to ask questions relating to my ailment, the operation/procedure being performed, its risks, consequences,
                            alternatives, potential complications and intended benefits and recovery and that all my questions have been answered to my entire
                            satisfaction and there are no misconceptions or false hopes in my mind. I further declare that all fields (of this form) requiring
                            insertion or completion were tilled In my presence at the time of my signing this form.
                        </label>
                        <label  style="margin-top:20px"> 
                            For the above mentioned operation(s)/procedure(s) that I have been made aware of, I give my consent voluntarily to
                            Dr._____________________________________________________________________________________
                            (name of doctor performing the operation/procedure) for
                            carrying out the said operation/procedure on myself or my above named patient being fully aware of the nature, potential
                            risks and complications. intended benefits and possible alternatives.
                            Patient<br>
                            1, the above named patient/named patients representative, do further hereby declare that l-am above 18 years of age on the
                            date of signing this form, mentally sound and I am giving consent without any fear, threat or false misconception.
                        </label>
                        <label  style="margin-top:20px">
                            Signed on _____/______/_______             at     AM?PM
                        </label>
                        <table style="width: 100%;font-size: 14px;">
                            <tr>
                                <td style="width: 25%"></td>
                                <td style="width: 40%">Signature/Thumb Impression</td>
                                <td style="width: 25%"></td>
                                
                            </tr>
                            <tr >
                                <td style="width: 25%">Surrogate/Guardian(if applicable#)</td>
                                <td style="width: 40%"></td>
                                <td style="width: 25%">(with name & relationship with patient)</td>
                                
                            </tr>
                             <tr >
                                <td style="width: 25%">Reason for surrogate concent</td>
                                <td style="width: 40%" colspan="2">Patient is unable to give concent beacuse:</td>
                                
                            </tr>
                        </table>
                        <br>
                        <table style="width: 100%;font-size: 14px;">
                            <tr>
                                <td style="width: 25%">Witness</td>
                                <td style="width: 40%"></td>
                                <td style="width: 25%"></td>
                                
                            </tr>
                            <tr >
                                <td style="width: 25%">Interpreter(if applicable)</td>
                                <td style="width: 40%"></td>
                                <td style="width: 25%"></td>
                                
                            </tr>
                        </table>
                        <label  style="margin-top:20px">
                            #Only if Patient is a minor or unable to give consent
                            I, the undersigned doctor have explained the nature. potential risks and complication, intended benefits. expected post-
                            procedure course, and possible alternatives to the planned operations/ procedure, lo the patient/patient representative. I am
                            confident that he/she has understood the information fully described in this document.
                        </label>
                        <label  style="margin-top:20px">
                            Consent obtained by,
                            Dr.________________________________ Designation & Dept._____________ Signature_______________
                            <br>

                        </label>
                    </div>
                </div>
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