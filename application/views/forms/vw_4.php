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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>Restraint Consent</b></h4>
                    </div>
                </div><br>
                <div class="row" style="font-size: 16px">
                    <div class="col-lg-12">
                        <div class="row">
                            <label class="col-lg-6">रूग्णाचे संपूर्ण नांव : <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b></label>
                            <label class="col-lg-3">वय : <b><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></b></label>
                            <label class="col-lg-3">लिंग : <b><?=!empty($record['gender'])?$record['gender']:'-'?></b></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-5">यु.एच.आय.डी.क्र. : <b><?=!empty($record['uhid'])?$record['uhid']:'-'?></b></label>
                            <label class="col-lg-4"></label>
                            <label class="col-lg-3">दि : <b><?=date("d-m-Y") ?></b></label>
                        </div>
                        <hr style="    margin: 10px;border: 1px solid lightgray;">
                        <div class="row" style="margin-top: 75px;">
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b> the undersigned has been explained about the irritable nature of the patient following the disease condition which is required in the interest of the patient safety. I hereby give consent to restrain the patient by using Chemical/Physical/Both mode of restraint.</label><br><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी खाली सही करणार श्री. / श्रीमती / कुमारी मला, माझे पेशंट <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b>  यांना त्यांच्या हालचालींना प्रतिबंध करण्यासाठी त्याचे हात पाय बांधणे
                            किंवा झोपेचे औषध देवून शांत ठेवणे हे गरजेचे आहे याची कल्पना डॉक्टरांनी दिली असून माझी त्यास संमती आहे.</label>
                           <br><br>
                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-8">Patient Relative Name & Sign. : _______________________</label>
                            <label class="col-lg-4">Date : _________________</label>
                        </div> 
                        <br>
                        <br>
                        <div class="row" style="margin-top: 75px;">
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b> the undersigned has been explained about the irritable nature of the patient following the disease condition which is required in the interest of the patient safety. I hereby give consent to restrain the patient by using Chemical/Physical/Both mode of restraint.</label><br><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी खाली सही करणार श्री. / श्रीमती / कुमारी मला, माझे पेशंट <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b>  यांना त्यांच्या हालचालींना प्रतिबंध करण्यासाठी त्याचे हात पाय बांधणे
                            किंवा झोपेचे औषध देवून शांत ठेवणे हे गरजेचे आहे याची कल्पना डॉक्टरांनी दिली असून माझी त्यास संमती आहे.</label>
                           <br><br>
                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-8">Patient Relative Name & Sign. : _______________________</label>
                            <label class="col-lg-4">Date : _________________</label>
                        </div>
                        <br>
                        <br>
                        <div class="row" style="margin-top: 75px;">
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b> the undersigned has been explained about the irritable nature of the patient following the disease condition which is required in the interest of the patient safety. I hereby give consent to restrain the patient by using Chemical/Physical/Both mode of restraint.</label><br><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी खाली सही करणार श्री. / श्रीमती / कुमारी मला, माझे पेशंट <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b>  यांना त्यांच्या हालचालींना प्रतिबंध करण्यासाठी त्याचे हात पाय बांधणे
                            किंवा झोपेचे औषध देवून शांत ठेवणे हे गरजेचे आहे याची कल्पना डॉक्टरांनी दिली असून माझी त्यास संमती आहे.</label>
                           <br><br>
                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-8">Patient Relative Name & Sign. : _______________________</label>
                            <label class="col-lg-4">Date : _________________</label>
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