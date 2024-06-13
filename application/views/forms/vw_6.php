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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>Personal Belongings Declaration Form</b></h4>
                    </div>
                </div><br>
                <div class="row" style="font-size: 16px">
                    <div class="col-lg-12">
                        <div class="row" style="margin-top: 75px;">
                            
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I मी_____________________________________________________________________________</label><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;relation with the patient रूग्णाशी नाते___________________________________________________________</label><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Of patient Name रूग्णाचे नांव <b> <?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b></label><br><br>
                            <label class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADM No. ए. डी. एम.नं.:_________________ Billing Class बिलींग क्लास :__________________ Bed No. बेड नं. :___________________</label><br><br>

                            <label class="col-lg-12">here by Declare that we have received following belongings of patient in our custody.</label><br>
                            आम्ही येथे जाहिर करतो की रुग्णाच्या खालील वस्तू आमच्याकडे जमा केल्या होत्या.<br><br>

                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-6">1.Mobile Phone मोबाईल फोन _____________________________________</label>
                            <label class="col-lg-6">2.Jewellery दागिने ______________________________________________</label>
                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-6">3.Charger चार्जर _____________________________________</label>
                            <label class="col-lg-6">4.Wrist Watch घड्याळ ______________________________________________</label>
                        </div> 
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-6">5.Money रक्कम _____________________________________</label>
                            <label class="col-lg-6">6.Other ornaments इतर दागिने ________________________________</label>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-6">7.Any Other items याशिवाय इतर गोष्टी____________________________</label>
                        </div>   
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-12">Hospital will not be responsible for any loss, theft or any damage of the patient's or relative personal belongings as mentioned above.
                            रूग्ण अथवा रूग्णाच्या नातेवाईकांच्या वर उल्लेखलेल्या कोणत्याही वस्तू हरवल्या, फुटल्या अथवा कोणत्याही प्रकारची हानी झाल्यास हॉस्पिटल जबाबदार राहणार नाही.</label><br>

                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-12">Patient Name रूग्णाचे नांव <b> <?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b></label><br>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-4">Date दिनांक : _________________</label>
                            <label class="col-lg-4">Time वेळ  _________________</label>
                            <label class="col-lg-4">Signature सही: _________________</label>
                        </div>
                        <div class="row" style="margin-top: 20px;">    
                            <label class="col-lg-12">Relative's Name नातेवाईकांचे नांव _____________________________________</label>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-4">Date दिनांक : _________________</label>
                            <label class="col-lg-4">Time वेळ  _________________</label>
                            <label class="col-lg-4">Signature सही: _________________</label>
                        </div> 
                         <div class="row" style="margin-top: 20px;">    
                            <label class="col-lg-12">Received by स्वीकारणार _____________________________________</label>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-4">Date दिनांक : _________________</label>
                            <label class="col-lg-4">Time वेळ  _________________</label>
                            <label class="col-lg-4">Signature सही: _________________</label>
                        </div> 
                    </div>

                    <div class="col-lg-12">
                        <div class="row" style="font-size: 16px">
                            <br>
                            <br>
                            <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>BILLING DECLARATION / बिलाचे घोषणापत्र</b></h4>


                            <div class="row" style="margin-top: 75px;">
                                 <label class="col-lg-12">My Total Bill as on today is Rs.___________ & till date I have paid Rs.
                                  __________ I hereby declare to pay the remaining bill at earliest.</label>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                 <label class="col-lg-12">माझे आजपर्यंतचे बिल रू.___________ झाले असून आम्ही रू
                                  __________ भरले आहेत.बाकीचे बिले भरण्याची मी हमी देतो.</label>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                 <label class="col-lg-6">Date दिनांक :_________________</label>
                                 <label class="col-lg-6">Patient or relative Sign नातेवाईकाची सही :_________________</label>
                            </div>
                            <br>
                            <div class="row" style="margin-top: 20px;">
                                 <label class="col-lg-12">My Total Bill as on today is Rs.___________ & till date I have paid Rs.
                                  __________ I hereby declare to pay the remaining bill at earliest.</label>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                 <label class="col-lg-12">माझे आजपर्यंतचे बिल रू.___________ झाले असून आम्ही रू
                                  __________ भरले आहेत.बाकीचे बिले भरण्याची मी हमी देतो.</label>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                 <label class="col-lg-6">Date दिनांक :_________________</label>
                                 <label class="col-lg-6">Patient or relative Sign नातेवाईकाची सही :_________________</label>
                            </div>
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