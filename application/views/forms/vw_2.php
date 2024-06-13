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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>General Consent Form</b></h4>
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
                            <ul>
                                <li>I am asking for medical care and treatment at this facility and agree to accept services which may diagnose my medical conditions, procedures to treat my conditions and medical care.</li>
                                <li>I understand that my agreement to accept these services is called a general consnet and that includes any routine procedures or treatments such as blood drawing, physical examination, administration of medication, taking X-rays, ECG, use of local anaesthesia and other non invasive procedures.</li>
                                <li>I understand that these services will be provided to me by physician, nurses, hysician assistant and other healthcare providers.</li>
                                <li>I do acknowledge that informed consents may be needed for some specific diagnosis and surgical procedures.</li>
                                <li>I do acknowledge that the result of medical treatment including the surgical procedures, if any required, may not be adequately predicted neither the hospital nor the attending medical staff can give or is allowed to give full guarantee or confirmation on the outcome of the treatment I receive.</li>
                                <li>I understand that my agreement to accept this services will remain in effect unless I say that, 'I no longer want the services' or until my treatment is completed.</li>
                                <li>Financial Agreement: I agree that by signing, as a patient or representative of the patient, I obliged to pay the hospital bill for the services rendered. Furthermore it is clearly understood by the understanding that the estimated charges may differ from the final bill depending upon the actual services rendered. It is understood that the running bill of hospital should be settled within the specified period of time during the stay at the hospital.</li>
                                <li>Further if covered under insurance company, I agree to fully settle my treatment clain through issuing a written guarantee of payment (COP). • I consent to receive required medicines from the hospital pharmacy.</li>
                                <li>I acknowledge receiving the handouts of patient's rights and responsibilities that would help me understand clearly and was informed that I could raise any queries for any doubts I have related to the same.</li>
                                <li>Personal Valuables: it is understood that during hospitalization we are not supposed to bring any valuable to the hospital and hospital shall not be held responsible or liable for any loss or damage of these items.</li>
                            </ul>
                            <table style="width: 100%;font-size: 14px;">
                                <tr style="text-align: center;font-weight: bolder;">
                                    <td style="width: 25%">Person</td>
                                    <td style="width: 40%">Name</td>
                                    <td style="width: 15%">Signature</td>
                                    <td style="width: 10%">Date</td>
                                    <td style="width: 10%">Time</td>
                                </tr>
                                <tr >
                                    <td style="width: 25%">Patient Service Executive</td>
                                    <td style="width: 40%"></td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 10%"></td>
                                </tr>
                                 <tr >
                                    <td style="width: 25%">Patient / Legal Guardian / Representative</td>
                                    <td style="width: 40%"></td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 10%"></td>
                                </tr>
                                 <tr >
                                    <td style="width: 25%">Specify Relationship with the Patient</td>
                                    <td style="width: 40%"></td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 10%"></td>
                                </tr>
                                 <tr >
                                    <td style="width: 25%">Reason : Why patient is unable to sign the consent form</td>
                                    <td style="width: 40%"></td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 10%"></td>
                                </tr>
                                 <tr >
                                    <td style="width: 25%">Witness</td>
                                    <td style="width: 40%"></td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 10%"></td>
                                </tr>
                            </table>
                        </div> 
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