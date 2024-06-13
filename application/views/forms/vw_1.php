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
                        <hr style="    margin: 10px;border: 1px solid lightgray;">
                        <div class="row">
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My / the patient's doctor <b><?=!empty($record['doctor_name'])?$record['doctor_name']:'-'?></b>  has advised me that due to my / the patient's medical condition, the chances for my/the patient's improvement or recovery will be significantly helped by receiving blood products by transfusion : such as packed red blood cell, fresh frozen plasma, platelet or cryoprecipitate. </label><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The doctor has explained the benefits that are expected from my/the patient being transfused and as well as, the risk. I understand that although the blood products to be administered have been prepared and tested in accordance with strict scientific rules established, there is still a very small chance the blood products will be incompatible with my/the patient's body and a transfusion reaction (Hemolytic transfusion reaction) can Occur. Although transfusion reactions can be treated successfully. I understand that on very rare occasions they can be fatal. I understand that allergic reactions to blood products with hives, itching and fever are more common but can be treated and many not even require the transfusion to be stopped. </label><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I have had an opportunity to ask question regarding transfusion of blood products for myself or for the patient and with my signature i give consent to administering blood products for myself or for the patient. I agree this informed consent may serve for consent to give additional necessary blood products for a time certain to end within next 24 hrs. </label><br><br>
                            <label class="col-lg-12" style="margin-top: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी, श्री/श्रीमती/कु. <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b> मला डॉक्टर <b><?=!empty($record['doctor_name'])?$record['doctor_name']:'-'?></b> यांनी मला रक्‍त/रक्‍त घटक घेण्याचा सल्ला दिला आहे. रक्त घेण्यासंबंधीच्या माझ्या शंकांचे समाधान झाले असून या संबंधीचे फायदे व त्यांशी संलग्न होणारे दुष्परिणाम याबद्दल कल्पना मला दिली आहे. वरील सर्व बाबींचा विचार करून मी रक्त/रक्त घटक घेण्याचा निर्णय घेतला असून त्यासंबंधीची संमती मी डॉक्टर व त्यांच्या सहकार्यांना देत आहे.</label><br><br>
                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-7">Patient Name : <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b></label>
                            <label class="col-lg-5">Patient Sign : ___________________</label>
                        </div> 
                        <div class="row" style="margin-top: 10px;">
                            <label class="col-lg-7">Relative's Name : _____________________</label>
                            <label class="col-lg-5">Relative's Sign : _________________</label>
                        </div>  
                        <div class="row" style="margin-top: 10px;">
                            <label class="col-lg-10">Relationship with Patient : _____________________</label>
                            <label class="col-lg-2"></label>
                        </div>  
                        <div class="row" style="margin-top: 10px;">
                            <label class="col-lg-7">Doctor's Name : _____________________</label>
                            <label class="col-lg-5">Doctor's Sign : _________________</label>
                        </div>  
                        <div class="row" style="margin-top: 20px;border: 1px solid black;height: 150;">
                            <label class="col-lg-12">Paste blood bag sticker here</label>
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