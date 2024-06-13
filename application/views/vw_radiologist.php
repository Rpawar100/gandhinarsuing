<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" id="opd_appointment_table">
      <div class="ibox-title"  style="padding-top: 10px !important;padding-right: 20px;">
          <div class="row" >
            <div class="col-lg-4">
                <h2><b>Radiologist Dashboard</b></h2>
            </div>
            <div class="col-lg-3">
                <form action="" style="width: 100%">
                  <input type="hidden" name="daterange" id="daterangeinput" value="<?=!empty($_GET['daterange'])? $_GET['daterange']:''?>">
                  <div id="daterangepicker" class="" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; ">
                      <i class="fa fa-calendar"></i>&nbsp;
                      <span><?=!empty($_GET['daterange'])? substr_replace($_GET['daterange'],' to ',10,2):''?></span> 
                      <i class="fa fa-caret-down"></i>
                  </div>
                </form>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
            </div>
          </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Number</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Date-Time</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Patient Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Patient Mobile No.</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Doctor Name</th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;"></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="test_value_modal" role="dialog">
  <div class="modal-dialog " style="min-width: 800px;">
    <div class="modal-content">
      <form method="post" id="test_value_action" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Add Test Value</h4>
          <button type="button" class="pull-right close_model">&times;</button>
          <input type="hidden" name="appointment_id" id="appointment_id" required="">
          <input type="hidden" name="service_id" id="service_id" required="">
        </div>
        <div class="modal-body" id="TP_list" style="font-size: medium;padding: 0px;">
          

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Submit And Generate Report</button>
          <button type="button" class="btn btn-default pull-left close_model">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="upload_report_modal" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content">
      <form method="post" id="upload_report_action" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Upload File</h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" id="TP_list" style="font-size: medium;">
          <div class="row" style="margin:10px 0px;">
            <label class="control-label col-lg-6">Upload File<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-6">
              <input class="form-control" type="file" name="report_file" id="report_file" accept="application/pdf" required="">
              <input type="hidden" name="ASA_id" id="ASA_id" required="">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Submit</button>
          <button type="button" class="btn btn-default pull-left close_model">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="show_report_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 1000px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row" style="margin-bottom: 15px;">
              <div class="col-lg-12" >
                <h2  style="margin: 0px;float: left;">Test Report</h2>
                <button type="button" style="float: right;" class="close_report_model" data-dismiss="modal">&times;</button>
                <button type="button" style="float: right;margin-right:50px;" class="btn btn-success download_report" content_url=""  ><i class="fa fa-download"></i>&nbsp;&nbsp;&nbsp;Download Bill Receipt</button>
                <button type="button" style="float: right;margin-right:50px;" class="btn btn-primary print_report" content_url=""><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Print Bill Receipt</button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12" id="report_data" style="height: 700px;overflow-y: auto;padding: 0px;">

              </div>
            </div>
          </div>
      </div>
   </div>           
</div>

<div class="modal fade" id="approved_report_model" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content" style="width:800px">
        <div class="modal-header text-center">
            <h2 class="modal-title" >Test Report</h2>
        </div>
        <div class="modal-body" style="padding: 0px;">
          <div class="row col-lg-12">
            <!--
              <div class="col-lg-6" style="text-align: center;padding: 10px">
                  <h2 id="pan_number"></h2>
                  <img src="" id="pan_img" style="width:300px;height: 220px;">
              </div>
              <div class="col-lg-6" style="text-align: center;padding: 10px">
                  <h2 id="gst_number"></h2>
                  <img src="" id="gst_img" style="width:300px;height: 220px;">
              </div>-->
          </div>
          <div class="row">
            <div class="col-lg-12" style="text-align: center;padding: 30px">
              <label style="font-size: x-large;margin: 30px;margin-top: 0px;">Would you like to Approved / Reject this Request ?</label>
              <textarea type="text" style="width: 100%;color: red;font-weight: bolder;padding: 10px;" id="reject_remark" rows="3" name="reject_remark" maxlength="500" placeholder="If Rejecting Reqest.Please mention Remark Here !"></textarea> <br><br>
            <button type="button" class="btn update_status" id="Approved_status_update" style="width:32%;color: white;background-color: darkorange;" ASA_id="'+ASA_id+'" report_status="Approved" >Approved !</button>
            <button type="button" class="btn update_status" style="width:32%;color: white;background-color: red;" ASA_id="'+ASA_id+'" report_status="Rejected" >Reject ?</button>
            <button type="button" class="btn" style="width:32%;color: black;background-color: lightgray;" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
</div>




<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#radiologist_tab').addClass('active');

  get_list();

    function get_list(){
      daterangeinput=$('#daterangeinput').val();

      if ($.fn.DataTable.isDataTable('#datatable_list'))
      {
        var table = $('#datatable_list').DataTable();
        table.destroy();
        table.clear();
        table.state.clear();
      }
        
      var table=$('#datatable_list').DataTable({
        'processing': true,
        'serverSide': true,
        'orderable':false,
        'serverMethod': 'post',
        'autoWidth':true,
        'stateSave': true,
        'ajax': {
          'url':'<?=base_url()?>radiologist-appointment-list',
          'data':{daterangeinput:daterangeinput},
        },
        'columns': [
          {title: "Id",data:"ASA_id",mSearch:false},
          {title: "Number",data:"appointment_no",mSearch:true},
          {title: "Date-Time",data:"appointment_datetime",mSearch:true},
          {title: "Patient Name",data:"p_name",mSearch:true},
          {title: "Patient Mobile No.",data:"P_mobile_number",mSearch:true},
          {title: "Age",data:"age",mSearch:true},
          {title: "Gender",data:"p_gender",mSearch:true},
          {title: "Doctor Name",data:"doctor_name",mSearch:true},
          {title: "Test Name",data:"services_name",mSearch:true},
          {title: "View Report",data:"generate_report",mSearch:true},
          {title: "Appointment Status",data:"status",mSearch:true},
        ],
        

        dom: '<"html5buttons"B>lTfgitp',
              'columnDefs': [
                  { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9] },
                  {
                          'targets':[0,1,2,3,4,5,6,7,8,9],
                          'createdCell':  function (td, cellData, rowData, row, col) {
                          id=rowData.ASA_id;
                          $(td).attr('ASA_id',id); 
                          $(td).attr('style', 'white-space: nowrap;'); 
                        }
                  }
              ],
        });

      $('#datatable_list tfoot tr th').each( function () {
          var title = $(this).text();
          if(title!="")
          { 
            $(this).html( '<input type="text" style="text-align: center;border: 1px solid #304050;height:30px;width:100%;" placeholder="'+title+'" /> ' );  
          }
      } );
      $('#datatable_list thead tr th').each( function () {
          $(this).css("text-wrap","nowrap");
        });

      table.columns().every( function () {
        var that = this;
        $( 'input[type=text]', this.footer() ).on( 'keyup', function (e) {
          if (that.search() !== this.value) {
            that
            .search(this.value)
            .draw();
          }
        });
      });
    }

  
  
 
    function  reset_form(){
      $('#test_value').val("");
    }



    $(document).on('click','.add_test_value',function () {

      $('#appointment_id').val($(this).attr('appointment_id'));
      $('#service_id').val($(this).attr('services_id'));
      $('#test_value_modal').modal('show');

      appointment_id=$(this).attr('appointment_id');
      service_id=$(this).attr('services_id');
      if (service_id) {
        $.ajax({
          url:'<?=base_url()?>test-parameter-by-appointment-id',
          method:'post',
          data:{s_id:service_id,a_id:appointment_id},
          async: false,
          success:function (data) {

            console.log(data);
            html="";
            if(typeof(data)=='object'){
             html+='<div class="row" style="margin:0px;font-weight:bolder;border: 1px solid lightgray;">\
                        <label class="control-label col-lg-4" style="margin: 0px;padding: 8px 0px;white-space: nowrap;text-align: center;border: 1px solid lightgray;">Parameter</label>\
                        <label class="control-label col-lg-4" style="margin: 0px;padding: 8px 0px;white-space: nowrap;text-align: center;border: 1px solid lightgray;">Input Value</label>\
                        <label class="control-label col-lg-2" style="margin: 0px;padding: 8px 0px;white-space: nowrap;text-align: center;border: 1px solid lightgray;">Normal Range</label>\
                        <label class="control-label col-lg-2" style="margin: 0px;padding: 8px 0px;white-space: nowrap;text-align: center;border: 1px solid lightgray;">Critical range</label>\
                    </div>'; 
             for (i=0;i<data['record'].length;i++){


                html+='<div class="row" style="margin:0px;border: 1px solid lightgray;">\
                      <label class="control-label col-lg-4" style="margin: 0px;padding: 8px 12px;    border: 1px solid lightgray;">'+data['record'][i]['name']+' </label>\
                      <div class="col-lg-4" style="    border: 1px solid lightgray;">\
                        <input class="form-control" style="text-align: right;padding-right: 75px;border:none;border-bottom: 1px solid black;" type="text" name="'+data['record'][i]['id']+'" value="'+data['record'][i]['value']+'" id="'+data['record'][i]['id']+'" required="">\
                        <label style="position: absolute;right: 20px;top: 8px;margin:0px;">'+data['record'][i]['unit']+'</label>\
                      </div>\
                        <label class="control-label col-lg-2" style="margin: 0px;padding: 8px 0px;text-align: center;    border: 1px solid lightgray;">'+data['record'][i]['data_range']+'</label>\
                        <label class="control-label col-lg-2" style="margin: 0px;padding: 8px 0px;text-align: center;    border: 1px solid lightgray;">'+data['record'][i]['critical_range']+'</label>\
                    </div>';

              }

              $('#TP_list').html(html);

              //$('#service_name').val(data['record']['service_name']);
              
             
            }else{
              location.reload();
            }
          }
        })
      }else{
        alert("Something Went Wrong..!");
        location.reload();
      }



    });



    
    
    $(document).on('click','.close_model',function () {
      $('#upload_report_modal').modal('hide');
      $('#test_value_modal').modal('hide');
      $('#upload_file_modal').modal('hide');

    });


    $(document).on('click','.change_report_status',function(){
        ASA_id=$(this).attr('ASA_id');
        report_status=$(this).attr('report_status');
      if (report_status=='Pending') {
        $('#Approved_status_update').show();
        $('#approved_report_model').modal('show');
        $('.update_status').attr('ASA_id',ASA_id);
        //var pan_number=$(this).attr('user_PAN_number');
        //var gst_number=$(this).attr('user_GST_number');
        //var pan_img=$(this).attr('user_PAN_image');
        //var gst_img=$(this).attr('user_GST_image');
        
        //$('#pan_number').html("PAN Number : "+pan_number);
        //$('#gst_number').html("GST Number : "+gst_number);
        //$('#pan_img').attr('src',pan_img);
        //$('#gst_img').attr('src',gst_img);

      }else{
        swal({
            html:true,
            title:"Invalid",
            text:"Invalid request Details..!",
          type:"warning"
        });
      }
    });
    

  
 $(document).on('click','.generate_report',function () {
      data_url=$(this).attr('data_url');
      pdf_url=$(this).attr('pdf_url');
      $('#report_data').html('');
      document.getElementById("report_data").innerHTML='<object style=\"width: 100%;height: 100%;\" data="'+data_url+'?action=View" ></object>';
      $('.download_report').attr('content_url',pdf_url);
      $('.print_report').attr('content_url',data_url+'?action=Print');
      $('#show_report_modal').modal('show');
    });

  $(document).on('click','.print_report',function () {
      url=$(this).attr('content_url');
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");

    });

 $(document).on('click','.download_report',function () {
      pdf=$(this).attr('content_url');
      $.ajax({
        url:pdf,
        method:'get',
        async: false,
        success:function (data) {
          if(data.status=='True'){
            window.open(data.message);
          }else{
            alert(data.message);
          }
        }
      })
    });

  $(document).on('click','.update_status',function(){
        ASA_id=$(this).attr('ASA_id');
        report_status=$(this).attr('report_status');
        flag=true;
        reason=$("#reject_remark").val();
        if(report_status=='Rejected' && reason.length<10 )
        {
          flag=false;
          alert("Please Mention Reject Reason.\nMinimum 10 Character.");
        }

        if(flag)
        {
          $.ajax({
            url:'<?=base_url()?>change-report-status',
            method:'post',
            data:{ASA_id:ASA_id,report_status:report_status,reason:reason},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  get_list();
                }
                $('#approved_kyc_model').modal('hide');
                swal({
                          html:true,
                          title:data['swall']['title'],
                          text:data['swall']['text'],
                          type:data['swall']['type'],
                        });
            }
        })
    }
    });


</script>
