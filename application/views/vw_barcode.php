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
                            
                             <img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=<?=!empty($record['barcode'])?$record['barcode']:'-'?>&code=Code128&translate-esc=on'/>
                            <label><?=!empty($record['service_name'])?$record['service_name']:'-'?> - <?=!empty($record['sample_type'])?$record['sample_type']:'-'?> / <?=!empty($record['ref'])?$record['ref']:'-'?><br><?=!empty($record['p_name'])?$record['p_name']:'-'?> - <?=!empty($record['age'])?$record['age']:'-'?> </label> <?=!empty($record['p_gender'])?$record['p_gender']:'-'?> </label>
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