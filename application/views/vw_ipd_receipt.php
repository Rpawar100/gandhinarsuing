<?php 
setlocale(LC_MONETARY, 'en_IN');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bill Receipt</title>
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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px solid black;"><b>Bill Receipt</b></h4>
                    </div>
                </div><br>
                <div class="row" style="font-size: 13px">
                    <div class="col-lg-7">
                        <div class="row">
                            <label class="col-lg-4">Appointment No.<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($record['appointment_no'])?$record['appointment_no']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Patient Name<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Patient Age<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Category<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($record['category_name'])?$record['category_name']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Doctor<i style="float:right;">:</i></label>
                            <label class="col-lg-8"><?=!empty($record['doctor_name'])?$record['doctor_name']:'-'?></label>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <label class="col-lg-5">Date-Time<i style="float:right;">:</i></label>
                            <label class="col-lg-7"><?=!empty($record['appointment_timestamp'])?$record['appointment_timestamp']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-5">UHID<i style="float:right;">:</i></label>
                            <label class="col-lg-7"><?=!empty($record['uhid'])?$record['uhid']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-5">Gender<i style="float:right;">:</i></label>
                            <label class="col-lg-7"><?=!empty($record['gender'])?$record['gender']:'-'?></label>
                        </div>
                        <div class="row">
                            <label class="col-lg-5">Company<i style="float:right;">:</i></label>
                            <label class="col-lg-7"><?=!empty($record['company_name'])?$record['company_name']:'-'?></label>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin: 0px 15px;" >
                        <h5 style="margin: 0px;text-align:center;padding: 10px;border-top: 1px solid black;"><b>Payment Details</b></h5>
                </div>
                <div class="row" style="padding: 0px 10px;">
                    <label class="col-lg-1" style="font-weight: bolder;padding:0px;text-align: center;">Sr.No.</label>
                    <label class="col-lg-2" style="font-weight: bolder;padding:0px;text-align: center;">Timestamp</label>
                    <label class="col-lg-2" style="font-weight: bolder;padding:0px;text-align: center;">Receipt No.</label>
                    <label class="col-lg-1" style="font-weight: bolder;padding:0px;text-align: center;">Cash Amount</label>
                    <label class="col-lg-1" style="font-weight: bolder;padding:0px;text-align: center;">Bank Amount</label>
                    <label class="col-lg-1" style="font-weight: bolder;padding:0px;text-align: center;">Mode</label>
                    <label class="col-lg-2" style="font-weight: bolder;padding:0px;text-align: center;">Total </label>
                    <label class="col-lg-2" style="font-weight: bolder;padding:0px;text-align: center;">Ref.No.</label>
                </div>
                <hr style="margin: 5px;">
                 <div class="row" style="padding: 0px 10px;">
                    <label class="col-lg-1"style="padding:0px;text-align: center;">1</label>
                    <label class="col-lg-2"style="padding:0px;text-align: center;"><?=!empty($record['receipt_timestamp'])?$record['receipt_timestamp']:'-'?></label>
                    <label class="col-lg-2"style="padding:0px;text-align: center;"><?=!empty($record['receipt_id'])?$record['receipt_id']:'-'?></label>
                    <label class="col-lg-1"style="padding:0px;text-align: center;"><?=!empty($record['cash_amount'])?$record['cash_amount']:'-'?></label>
                    <label class="col-lg-1"style="padding:0px;text-align: center;"><?=!empty($record['bank_amount'])?$record['bank_amount']:'-'?></label>
                    <label class="col-lg-1"style="padding:0px;text-align: center;"><?=!empty($record['payment_mode'])?$record['payment_mode']:'-'?></label>
                    <label class="col-lg-2"style="padding:0px;text-align: center;">Rs.<?=!empty($record['bill_amount'])?$record['bill_amount']:'-'?></label>
                    <label class="col-lg-2"style="padding:0px;text-align: center;"><?=!empty($record['transaction_number'])?$record['transaction_number']:'-'?></label>
                </div>
            
            </div>

</body>
</html>
<script src="<?php echo base_url()?>assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript">
    status='<?=!empty($print)?$print:'False'?>';
    base_url='<?php echo base_url()?>/receipt';
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