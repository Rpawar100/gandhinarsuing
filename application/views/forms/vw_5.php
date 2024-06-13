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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>Outgoing Consent / संमती पत्र</b></h4>
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
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी खाली सही करणार,</label><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी / माझा रूग्ण <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b> वय <b><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></label><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;हा सिनर्जी मल्टीस्पेशालिटी हॉस्पिटल मध्ये ऑडमिट असून, माझ्यावर/त्यांच्यावर संबंधित आजारासाठी उपचार सुरू आहे. तरी आम्हाला आमच्या रुग्णाच्या / माझ्या आजाराची आणि तब्येतीची पूर्ण 
                            कल्पना डॉक्टरांनी दिलेली आहे.</label><br><br>

                             <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;पुढील उपचारासाठी त्यांना_________________ही वैद्यकीय तपासणी करण्याचा सल्ला डॉक्टरांनी दिला आहे. तरी आमच्या रुग्णास स्वत:च्या जबाबदारी______________________________________येथे घेऊन जात आहोत. तरी जाता-येता वेळी रूग्णाच्या जीवितास काही बरे-वाईट किंवा मृत्यू ओढवल्यास त्यास आम्ही स्वत: जबाबदार राहू. ह्या हॉस्पिटल मध्ये काम करणारे डॉक्टर्स, नर्सेस व इतर कर्मचारी जबाबदार राहणार नाहीत. याची पूर्ण कल्पना डॉक्टरांनी आम्हाला दिली आहे
                            .</label><br><br>

                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-8">नातेवाईकाचे संपूर्ण नांव : _______________________</label>
                            <label class="col-lg-4">दिनांक : _________________</label>
                        </div>  
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-8">रूग्णाशी नाते : ______________________________</label>
                            <label class="col-lg-4">वेळ : _________________</label>
                        </div>  
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-12">नातेवाईकाची सही :</label>
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