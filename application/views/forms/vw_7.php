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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>Restraint Monitoring</b></h4>
                    </div>
                </div><br>
                <div class="row" style="font-size: 16px">
                    <div class="col-lg-12">
                        <div class="row">
                            <label class="col-lg-6">Patient's Full Name: <b><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></b></label>
                            <label class="col-lg-2">UHID No. : <b><?=!empty($record['uhid'])?$record['uhid']:'-'?></b></label>
                            <label class="col-lg-2">Date: <b><?=date("d-m-Y") ?></b></label>
                            <label class="col-lg-2">Time : <b><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></b></label>
                        </div>
                        
                        <hr style="    margin: 10px;border: 1px solid lightgray;">
                        <div class="row" style="margin-top: 35px;">
                            <label class="col-lg-6">Device Applied:______________________________________________</label>
                            <label class="col-lg-3">Date :</label>
                            <label class="col-lg-3">Time :</label>
                        </div>
                         <div class="row" style="margin-top: 20px;">
                            <label class="col-lg-6">New Order Required:__________________________________________</label>
                            <label class="col-lg-3">Date : <b></b></label>
                            <label class="col-lg-3">Time : <b></b></label>
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
                <br>
                <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">        
                     <caption style="text-align:center;color:black"><b>Patient Care & Outgoing Monitoring</b></caption>
                    <tr>
                      <th style="border-right: 1px solid #ddd;">_____</th>
                      <th style="border-right: 1px solid #ddd;">08</th>
                      <th style="border-right: 1px solid #ddd;">09</th>
                      <th style="border-right: 1px solid #ddd;">10</th>
                      <th style="border-right: 1px solid #ddd;">11</th>
                      <th style="border-right: 1px solid #ddd;">12</th>
                      <th style="border-right: 1px solid #ddd;">01</th>
                      <th style="border-right: 1px solid #ddd;">02</th>
                      <th style="border-right: 1px solid #ddd;">03</th>
                      <th style="border-right: 1px solid #ddd;">04</th>
                      <th style="border-right: 1px solid #ddd;">05</th>
                      <th style="border-right: 1px solid #ddd;">06</th>
                      <th style="border-right: 1px solid #ddd;">07</th>
                      <th style="border-right: 1px solid #ddd;">08</th>
                      <th style="border-right: 1px solid #ddd;">09</th>
                      <th style="border-right: 1px solid #ddd;">10</th>
                      <th style="border-right: 1px solid #ddd;">11</th>
                      <th style="border-right: 1px solid #ddd;">12</th>
                      <th style="border-right: 1px solid #ddd;">01</th>
                      <th style="border-right: 1px solid #ddd;">02</th>
                      <th style="border-right: 1px solid #ddd;">03</th>
                      <th style="border-right: 1px solid #ddd;">04</th>
                      <th style="border-right: 1px solid #ddd;">06</th>
                      <th style="border-right: 1px solid #ddd;">07</th>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Position</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Circulation</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Skin Integrity</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Temperature</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Fluid Needs</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Fluid Needs</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Toileting Needs</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Nutrition Offered</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Eval Restrint Removal</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Restraints Status + on-off</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Catheter Check</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;">Oedema</td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                </table>
                <br>
                <div class="row" style="margin-top: 20px;">
                    <label class="col-lg-12">
                        <b>Documentation Standards</b><br>
                        Documentation of assessment / care / monitoring is completed by entering a tick mark when the following criteria are met. If criteria not met, an asterist (*) is entered and a note written.
                        Assessment is ongoing; documentation is required at least every two hours.
                        Position : Proper alignment of the restrained limb is maintained.
                        Circulation : Nail bed blanches is less than 3 seconds and pulse present above and below restraint
                        Fluid Needs: Fluids administered as per physician order (oral or parenteral). If patient is not on restriction, fluids offered every hour. If the patient is NBM, oral care provied 4 hourly.
                        Toileting Needs: Elimination needs attended to, either by foley catheter (only if ordered for other medical necessity) or by offering bed pan or assistance to bathroom / bedside commode chair.
                        Nutrition Offered: Nutritional Needs met as per physician order, if oral intake allowed, patient offered and assisted with meals and snacks.
                        Skin Integrity: Skin integrity around / under the device and at all bony prominence indicates no pressure or reddened areas developed.
                        Temperature: Patient's skin comfortable to the touch, patient temperature checked as per physician orders and room temperature maintained as appropriate to patient's condition.
                        Evaluation for reduction or removal : The use of restraints is evaluated frequently (at least every 2 hours) and ended at the earliest at the earliest possible time.
                    </label>
                </div>
                <br>
                <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                    <tr>
                      <th style="border-right: 1px solid #ddd;">Morning duty name of staff nurse</th>
                      <th style="border-right: 1px solid #ddd;">Sign</th>
                      <th style="border-right: 1px solid #ddd;">Afternoon duty name of staff nurse</th>
                      <th style="border-right: 1px solid #ddd;">Sign</th>
                    </tr>
                    <tr>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                      <td style="border-right: 1px solid #ddd;"></td>
                    </tr>
                     <tr>
                      <td style="border-right: 1px solid #ddd;" colspan="4">Sign of sister in charge of the ward</td>
                      
                    </tr>

                </table>

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