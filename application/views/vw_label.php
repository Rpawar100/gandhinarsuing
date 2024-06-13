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
    <style>@page { size: 100mm 50mm }</style>
    <style type="text/css">
        label{
            font-weight: bolders;
            font-family: inherit;
            margin: 2px;
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
            <div style="padding-top: 5px;">
                <div class="row" style="font-size: 15px;">
                    <div class="col-lg-12">
                        <div class="row" style="text-align: center;">
                            <label>UHID<i style="float:right;">:</i></label>
                            <label><?=!empty($record['uhid'])?$record['uhid']:'-'?></label>
                        </div>
                        <div class="row" style="text-align: center;">
                            <label>Patient Name<i style="float:right;">:</i></label>
                            <label><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></label>
                        </div>
                        
                        <div class="row" style="text-align: center;">
                            <label>Consulting Doctor<i style="float:right;">:</i></label>
                            <label><?=!empty($record['doctor_name'])?$record['doctor_name']:'-'?></label>
                        </div>
                        <div class="row" style="text-align: center;">
                            <label>Mobile Number<i style="float:right;">:</i></label>
                            <label><?=!empty($record['mobile_number'])?$record['mobile_number']:'-'?></label>
                        </div>
                        <div class="row" style="text-align: center;">
                            <label>Date-Time<i style="float:right;">:</i></label>
                            <label><?=!empty($record['appointment_datetime'])?$record['appointment_datetime']:'-'?></label>
                        </div>
                        <div class="row" style="text-align: center;">
                            <label>Patient Age<i style="float:right;">:</i></label>
                            <label><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></label>
                        </div>
                        <div class="row" style="text-align: center;">
                            <label>Department<i style="float:right;">:</i></label>
                            <label><?=!empty($record['department_name'])?$record['department_name']:'-'?></label>
                        </div>
                        
                    </div>
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