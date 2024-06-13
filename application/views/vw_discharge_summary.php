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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
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
                        <h4 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px dotted darkgrey;"><b>Clinical Discharge Summary</b></h4>
                    </div>
                </div><br>
                
                 <div class="row" style="font-size: 13px; border: 1px solid black;">

                <div class="row" style="font-size: 13px; margin: 10px;">
                    <div class="row-lg-12">
                        <div class="row">
                            <label class="col-lg-2">Patient UHID<i style="float:right;">:</i></label>
                            <label class="col-lg-2"><?=!empty($record['uhid'])?$record['uhid']:'-'?></label>
                            <label class="col-lg-2">Patient Visit No<i style="float:right;">:</i></label>
                           <label class="col-lg-2"><?=!empty($record[''])?$record['']:'-'?></label>
                           <label class="col-lg-2">Admission Date & Time<i style="float:right;">:</i></label>
                            <label class="col-lg-2"><?=!empty($record[''])?$record['']:'-'?></label>
                        </div>
                        
                    </div>
                    <div class="row-lg-12">
                        <div class="row">
                            <label class="col-lg-2">Patient Name<i style="float:right;">:</i></label>
                            <label class="col-lg-3"><?=!empty($record['patient_name'])?$record['patient_name']:'-'?></label>
                            <label class="col-lg-1">Sex<i style="float:right;">:</i></label>
                            <label class="col-lg-1"><?=!empty($record['gender'])?$record['gender']:'-'?></label>
                            <label class="col-lg-1">Age<i style="float:right;">:</i></label>
                            <label class="col-lg-1"><?=!empty($record['patient_age'])?$record['patient_age']:'-'?></label>
                            <label class="col-lg-1">Mobile No<i style="float:right;">:</i></label>
                            <label class="col-lg-2"><?=!empty($record['mobile_number'])?$record['mobile_number']:'-'?></label>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="row" style="margin: 0px 10px;" >
                        <h5 style="margin: 0px;text-align:center;padding: 10px;border-top: 1px solid black;"><b><?=!empty($test_value[0]['service_name'])?$test_value[0]['service_name']:''?></label></b></h5>
                </div>
                <div class="row" style="padding: 0px px;">
                    <div class="row">
                           <label class="col-lg-3">Advice Date & Time<i style="float:right;">:</i></label>
                            <label class="col-lg-3"><?=!empty($record['advice_date'])?$record['advice_date']:'-'?></label>
                            <label class="col-lg-3">Discharge Date & Time<i style="float:right;">:</i></label>
                           <label class="col-lg-3"><?=!empty($record['discharge_date'])?$record['discharge_date']:'-'?></label>      
                    </div>   
                </div>
                <div class="col-lg-7">
                   <div class="row">
                        <label class="row-lg-8">Type Of Discharge<i style="float:right;">:</i></label>
                    <label class="row-lg-4"><?=!empty($record['discharge_type'])?$record['discharge_type']:'-'?></label>
                   </div>
                   <div class="row">
                       <label class="row-lg-8">Condition On Discharge<i style="float:right;">:</i></label>
                       <label class="row-lg-4"><?=!empty($record['condition_on_discharge'])?$record['condition_on_discharge']:'-'?></label
                   </div>
                    <div class="row">
                        <label class="row-lg-8">Department Name<i style="float:right;">:</i></label>
                        <label class="row-lg-4"><?=!empty($record['department_name'])?$record['department_name']:'-'?></label>      
                    </div>  
                </div>

             </div>


            </div>
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Final Diagnosis</b></h5>  
               </div>
               <div class="row"> 
               <label class="row-lg-8"><?=!empty($record['final_diagnosis'])?$record['final_diagnosis']:'-'?></label>
                </div>
            </div> 
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Surgery/Proc Performed</b></h5>  
               </div>
               <div class="row"> 
               <label class="row-lg-8"><?=!empty($record['surgery_performed'])?$record['surgery_performed']:'-'?></label>
                </div>
            </div> 
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Cheif Complaints</b></h5>  
               </div>  
            </div> 
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>History Of Cheif Complaints</b></h5>  
               </div>
               <div class="row"> 
               <label class="row-lg-8"><?=!empty($record['history_of_chief_complaints'])?$record['history_of_chief_complaints']:'-'?></label>
                </div>
            </div> 
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Examination</b></h5>  
               </div>
               <div class="row"> 
               <label class="row-lg-8"><?=!empty($record['examination_findings'])?$record['examination_findings']:'-'?></label>
               </div>
            </div> 
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Treatment/Surgery</b></h5>  
               </div>
               <div class="row"> 
               <label class="row-lg-8"><?=!empty($record['treatment'])?$record['treatment']:'-'?></label>
                </div>
               
            </div>
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Course In Hospital</b></h5>  
               </div>
               <div class="row"> 
                  <label class="row-lg-8"><?=!empty($record['course_in_hospital'])?$record['course_in_hospital']:'-'?></i></label>
               </div>
                  
            </div> 
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Treatment On Discharge</b></h5>  
               </div> 
               <div class="row"> 
               <label class="row-lg-8"><?=!empty($record['treatment_on_discharge'])?$record['treatment_on_discharge']:'-'?></i></i></label>
                </div>
               
            </div>
            <div class="row">
               <div class="row-lg-12" style="padding-bottom: 5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Diet</b></h5>  
               </div>
               <div class="row"> 
               <label class="row-lg-8"><?=!empty($record['D_diet'])?$record['D_diet']:'-'?></label>
               </div>  
            </div>
           
       <table>
        <thead>
            <style="text-align: left;"><b>Prescription</b></style>
   
            <tr>
                <th>Sr. No.</th>
                <th>Start Date-End Date</th>
                <th>Drug Name</th>
                <th>Route</th>
                <th>Frequency Dosage & Duration</th>
                <th>Dosage</th>
                <th>Duration</th>
                <th>Total Quantity</th>
                <th>Instruction</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            <?php foreach ($prescription as $pre) { ?>
                <tr>
                    <td><?= $counter ?></td>
                    <td><?= $pre['p_date'] ?></td>
                    <td><?= $pre['drug_name'] ?></td>
                    <td><?= $pre['route'] ?></td>
                    <td><?= $pre['Frequency'] ?></td>
                    <td><?= $pre['Dosage'] ?></td>
                    <td><?= $pre['duration'] ?></td>
                    <td><?= $pre['total_quantity'] ?></td>
                    <td><?= $pre['instruction'] ?></td>
                    <td><?= $pre['remark'] ?></td>
                </tr>
                <?php $counter++; ?>
            <?php } ?>
        </tbody>
    </table>
        <div class="row">
               <div class="row-lg-12" style="padding-top:5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Follow Up Date</b></h5>
                 <?=!empty($record['follow_up_date'])?$record['follow_up_date']:'-'?>  
               </div>  
        </div>
        
        <div class="row">
               <div class="row-lg-12" style="padding-top:5px;">
                 <h5 style="margin: 10px;text-align:left;padding-bottom: 10px;border-bottom: 1px dotted black;"><b>Follow Up </b></h5>  
               </div>

        </div>
        <div class="col-lg-10" style="text-align:right;padding-top:15px;">
          <div class="row">
            <div class="row-lg-8"></div>
            <label class="row-lg-2">Consulting Doctor<i style="float:right;">:</i></label>
            <label class="row-lg-2"><?=!empty($record['doctor_name'])?$record['doctor_name']:'-'?></label>
          </div>
          <div class="row">
            <div class="row-lg-8"></div>
            <label class="row-lg-2">Department<i style="float:right;">:</i></label>
            <label class="row-lg-2"><?=!empty($record['department_name'])?$record['department_name']:'-'?></label>
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


