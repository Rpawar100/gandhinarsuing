<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" id="opd_appointment_table">
      <div class="ibox-title"  style="padding-top: 10px !important;padding-right: 20px;">
          <div class="row" >
            <div class="col-lg-4">
                <h2><b>LIS Dashboard</b></h2>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-2">
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
          <div class="row" style="margin-left: 10px;">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-3" style="background: lightskyblue; border-radius: 10px 0px 0px 10px;" id="pending">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($Pending['pcount']) ? $Pending['pcount'] : '0' ?></b><br>Pending</h3>
                </div>
                <div class="col-lg-3" style="background: lightgreen;" id="sample_collected">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($Sample_Collected['sccount']) ? $Sample_Collected['sccount'] : '0' ?></b><br>Sample Collected</h3>
                </div>
                <div class="col-lg-3" style="background: lightskyblue;" id="sample_received">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($Sample_Received['srcount']) ? $Sample_Received['srcount'] : '0' ?></b><br>Sample Received</h3>
                </div>
                <div class="col-lg-3" style="background: lightgreen;" id="in_process">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($In_Process['ipcount']) ? $In_Process['ipcount'] : '0' ?></b><br>In Process</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-3" style="background: lightskyblue;" id="waiting_for_approval">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($Waiting_for_Approval['wacount']) ? $Waiting_for_Approval['wacount'] : '0' ?></b><br>Waiting for Approval</h3>
                </div>
                <div class="col-lg-3" style="background: lightgreen;" id="rejected">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($Rejected['rcount']) ? $Rejected['rcount'] : '0' ?></b><br>Rejected</h3>
                </div>
                <div class="col-lg-3" style="background: lightskyblue; " id="completed">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($Completed['ccount']) ? $Completed['ccount'] : '0' ?></b><br>Approved</h3>
                </div>
                <div class="col-lg-3" style="background: lightgreen; border-radius: 0px 10px 10px 0px;" id="dispatched">
                    <h3 style="margin: 10px 0px; text-align: center;"><b class="" style="font-size: x-large;"><?= !empty($Dispatched['dcount']) ? $Dispatched['dcount'] : '0' ?></b><br>Dispatched</h3>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <!-- <th nowrap="nowrap" ></th> -->
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
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;"></th>
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

<div id="report_approval_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 1000px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row" style="margin-bottom: 15px;">
              <div class="col-lg-12" >
                <h2  style="margin: 0px;float: left;">Test Report</h2>
                <button type="button" style="float: right;" class="close_report_model" data-dismiss="modal">&times;</button>
                     </div>
            </div>
            <div class="row" >
	            <div class="col-lg-12" style="text-align: center;padding: 30px">
	              <label style="font-size: x-large;margin: 30px;margin-top: 0px;">Would you like to Approve / Reject this Report ?</label>
	              <textarea type="text" style="width: 100%;color: red;font-weight: bolder;padding: 10px;" id="reject_remark" rows="3" name="reject_remark" maxlength="500" placeholder="If Rejecting Reqest.Please mention Remark Here !"></textarea> <br><br>
	            <button type="button" class="btn update_status" id="Approved_status_update" style="width:32%;color: white;background-color:green;" ASA_id="'+ASA_id+'" ASA_status="'+ASA_status+'" appointment_status="Approved" >Approved !</button>
              <button type="button" class="btn update_status" style="width:32%;color: white;background-color:orange;" ASA_id="'+ASA_id+'" ASA_status="'+ASA_status+'" appointment_status="Approved" >Provisional Approval !</button>
	            <button type="button" class="btn update_status" style="width:32%;color: white;background-color: red;" ASA_id="'+ASA_id+'" ASA_status="'+ASA_status+'" appointment_status="Rejected" >Reject ?</button>
	            <button type="button" class="btn" style="width:32%;color: black;background-color: lightgray;" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
      </div>
   </div>           
</div>

<div id="change_appointment_status_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 500px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row">
	   					<div class="col-lg-12" style="text-align: center; padding: 30px 0;">
	   						<label style="font-size: x-large;margin: 30px;margin-top: 0px;" id="ASA_label"></label>
	   						<br>
							<button type="button" class="btn btn-primary update_status" id="Approved_status_update" style="width: 30%;height: 35%;margin-right: 15px;" ASA_id="'+ASA_id+'" ASA_status ="'+ASA_status+'" appointment_status="YES" >Yes</button>
							<button type="button" class="btn btn-danger update_status" style="width: 30%;height: 35%;margin-right: 15px;" ASA_id="'+ASA_id+'" appointment_status="NO">NO</button>
							<button type="button" class="btn btn-secondary" style="width: 30%;height: 35%;" data-dismiss="modal">Close</button>
	   					</div>
   					</div>
          </div>
      </div>
   </div>           
</div>

<div class="modal fade" id="patient_appointment_detail" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content" style="width: 1200px;">
        <div class="modal-header">
          <h4 class="modal-title PR_model_title">Patient Oppintment Details </h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" style="font-size: medium">
          <div class="row" style="margin:10px 0px;">
            <label class="control-label col-lg-2">Ptient Name<b class="pull-right">:</b></label>
            <label class="control-label col-lg-2" id="pname"></label>
            <label class="control-label col-lg-2">Mobile Number<b class="pull-right">:</b></label>
            <label class="control-label col-lg-2" id="mobile_no"></label>
            <label class="control-label col-lg-2">UHID<b class="pull-right">:</b></label>
            <label class="control-label col-lg-2" id="uhid"></label>
          </div>
          <div class="row" style="margin:20px 0px;overflow: auto;width:1140px">
            <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid white;">Sr.No</th>
                        <th style="border-right: 1px solid white;">Appointment  No.</th>
                        <th style="border-right: 1px solid white;">Date-Time</th>
                        <th style="border-right: 1px solid white;">Doctor Name</th>
                        <th style="border-right: 1px solid white;">Test Name</th>
                        <th style="border-right: 1px solid white;">Define TAT</th>
                        <th style="border-right: 1px solid white;">Actual TAT</th>
                        <th style="border-right: 1px solid white;">Upload By</th>
                        <th style="border-right: 1px solid white;">Upload TimeStamp</th>
                        <th style="border-right: 1px solid white;">Approved By</th>
                        <th style="border-right: 1px solid white;">Approved TimeStamp</th>
                        <th style="border-right: 1px solid white;">Appointment Status</th>
                        <th style="border-right: 1px solid white;">View Required</th>
                    </tr>
                </thead>
                <tbody id="PAD_list">
                  
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>





<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#lab_technician_tab').addClass('active');

	

  active_tab='pending';
  $('#pending').addClass('active');
  get_list();

 

  $('#pending').on('click',function(){
    change_tab('pending');
  });

  $('#sample_collected').on('click',function(){
    change_tab('sample_collected');
  });


  $('#sample_received').on('click',function(){
    change_tab('sample_received');
  });

  $('#in_process').on('click',function(){
    change_tab('in_process');
  });

  $('#rejected').on('click',function(){
    change_tab('rejected');
  });

  $('#waiting_for_approval').on('click',function(){
    change_tab('waiting_for_approval');
  });

  $('#completed').on('click',function(){
    change_tab('completed');
  });

  $('#dispatched').on('click',function(){
    change_tab('dispatched');
  });

  

   function change_tab(tab_name){
    $('#'.concat(active_tab)).removeClass('active');
    $('#'.concat(tab_name)).addClass('active');
    active_tab=tab_name;
    get_list();
  }




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
	        'url':'<?=base_url()?>lab-technician-appointment-list',
	        'data':{active_tab:active_tab,daterangeinput:daterangeinput},
	      },
	      'columns': [
	        // {title: "Id",data:"ASA_id",mSearch:false},
	        {title: "UHID",data:"uhid",mSearch:true},
	        {title: "Number",data:"appointment_no",mSearch:true},
	        {title: "Date-Time",data:"appointment_datetime",mSearch:true},
	        {title: "Patient Name",data:"p_name",mSearch:true},
	        {title: "Patient Mobile No.",data:"P_mobile_number",mSearch:true},
	        {title: "Age",data:"age",mSearch:true},
	        {title: "Gender",data:"p_gender",mSearch:true},
          {title: "Location",data:"location",mSearch:true},
	        {title: "Doctor Name",data:"doctor_name",mSearch:true},
	        {title: "Test Name",data:"services_name",mSearch:true},
          {title: "Clinical Details",data:"clinical_details",mSearch:true},
	        {title: "Defined TAT",data:"service_tat",mSearch:true},
	        {title: "Actual TAT ",data:"minutes_difference",mSearch:true},
	         {title: "Uploaded By",data:"uploaded_by",mSearch:true},
	          {title: "Uploaded Timestamp",data:"uploaded_date_time",mSearch:true},
	           {title: "Approved BY",data:"approved_by",mSearch:true},
	            {title: "Approved Timestamp",data:"approved_date_time",mSearch:true},
	             {title: "Referance",data:"refferal",mSearch:true},
	        {title: "Upload Data",data:"data",mSearch:true},
	        {title: "View Report",data:"generate_report",mSearch:true},
          {title: "Barcode",data:"barcode",mSearch:true},
	        {title: "Appointment Status",data:"status",mSearch:true},
	      ],
	      

	      dom: '<"html5buttons"B>lTfgitp',
	            'columnDefs': [
	                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20] },
	                {
                          'targets':[1],
                          'createdCell':  function (td, cellData, rowData, row, col) { 
                          id=rowData.pid;
                          estatus=rowData.estatus;
                          
                          $(td).attr('class','view_patient_detail'); 
                          $(td).attr('id',id); 
                          $(td).attr('style', 'white-space: nowrap;'); 
                          if(estatus=='Yes'){
                              
                              $(td).attr('style', 'background-color:#FF5349;'); 
                            }
                        }
                  },
	                {
	                        'targets':[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
	                        'createdCell':  function (td, cellData, rowData, row, col) {
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

  	$('.close_model').click(function(){

  		$('#patient_appointment_detail').modal('hide');

  	})

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

  	$(document).on('click','.upload_file',function () {
  			$('#ASA_id').val($(this).attr('asa_id'));
  			$('#upload_report_modal').modal('show');
  	})
  	
  	$(document).on('click','.close_model',function () {
  		$('#upload_report_modal').modal('hide');
    	$('#test_value_modal').modal('hide');
    	$('#upload_file_modal').modal('hide');

  	});

  	$('#test_value_action').on('submit',function(event){

  		
	    event.preventDefault(); 
	    var form = $( "#test_value_action" );
	    var formData = new FormData(this);
	    if(form.valid()==true){
	      $.ajax({
	        url:'<?=base_url()?>test-value-action',
	        method:'post',
	        data:formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        success:function(data){

	          if(typeof(data)=='object'){
	          	if(data['swall']['type']=='success'){

	              $('#test_value_modal').modal('hide');
	              get_list();
            	}

	            swal({
	              html:true,
	              title:data['swall']['title'],
	              text:data['swall']['text'],
	              type:data['swall']['type']
	            });
	            reset_form();
	          }else{
	            //location.reload();
	          }

	        },
	      });
	    }
  	});

  	$('#upload_report_action').on('submit',function(event){
	    event.preventDefault(); 
	    var form = $( "#upload_report_action");
	    var formData = new FormData(this);
	    if(form.valid()==true){
	      $.ajax({
	        url:'<?=base_url()?>upload-report-action',
	        method:'post',
	        data:formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        success:function(data){

	          if(typeof(data)=='object'){
	            if(data['swall']['type']=='success' || data['swall']['title']=='Duplicate Entry'){
	              $('#upload_report_modal').modal('hide');
	              get_list();
	             
	            }
	            swal({
	              html:true,
	              title:data['swall']['title'],
	              text:data['swall']['text'],
	              type:data['swall']['type']
	            });
	            reset_form();
	          }else{
	            //location.reload();
	          }

	        },
	      });
	    }
  	});


$(document).on('click','.print_barcode',function () {
      url=$(this).attr('content_url');
      $("<iframe>")       
        .hide()           
        .attr("src", url)
        .appendTo("body");

    });




 $(document).on('click','.generate_report',function () {
      data_url=$(this).attr('data_url');
      pdf_url=$(this).attr('pdf_url');
     	file_data=$(this).attr('file_data');
    console.log(data_url);
     console.log(pdf_url);
      console.log(file_data);
      $('#report_data').html('');

      if(file_data=="FILE"){
	     	$('#report_data').html('<iframe src="' + file_data + '" style="width: 100%; height: 500px;"></iframe>');
      }else{
      	document.getElementById("report_data").innerHTML='<object style=\"width: 100%;height: 100%;\" data="'+data_url+'?action=View" ></object>';
	      $('.download_report').attr('content_url',pdf_url);
	      $('.print_report').attr('content_url',data_url+'?action=Print');
      }
     
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

 $(document).on('click','.change_state',function () {
      ASA_id=$(this).attr('ASA_id');
      ASA_status=$(this).attr('ASA_status');

      switch(ASA_status){

      case 'Pending':
      case 'Schedule':
        $('#ASA_label').text('Is Sample Collected?');
      break;

    	case 'Sample_Collected':
        $('#ASA_label').text('Have You received Sample?');
        break;

      case 'Sample_Received':
        $('#ASA_label').text('Is Process Start ?');
        break;


      case 'Inprocess':
      case 'Rejected':
      $('#ASA_label').text('Would you like to Send For Approval?');
      break;

    	case 'Completed':
      $('#ASA_label').text('Would you like to Dispatched?');
      break;
      }


      $('.update_status').attr('ASA_status',ASA_status);
      $('.update_status').attr('ASA_id',ASA_id);
			$('#change_appointment_status_modal').modal('show');
    });

 $(document).on('click','.update_status',function(){
        ASA_id=$(this).attr('ASA_id');
        appointment_status=$(this).attr('appointment_status');
        ASA_status=$(this).attr('ASA_status');
        reason=$('#reject_remark').val();
        flag=true;
        if(appointment_status=='NO'){
          flag=false;
        }
        if(appointment_status=='Rejected' && reason.length<10 )
      	{
      		flag=false;
      		alert("Please Mention Reject Reason.\nMinimum 10 Character.");
      	}
        if(flag)
        {
          $.ajax({
            url:'<?=base_url()?>change-appointment-status',
            method:'post',
            data:{ASA_id:ASA_id,ASA_status:ASA_status,reason:reason,appointment_status:appointment_status},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  get_list();
                  reset_report_approval();
                  $('#change_appointment_status_modal').modal('hide');
                  $('#report_approval_modal').modal('hide');
                }
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

 $(document).on('click','.report_approval',function () {
      ASA_id=$(this).attr('ASA_id');
      ASA_status=$(this).attr('ASA_status');

      $('.update_status').attr('ASA_id',ASA_id);
      $('.update_status').attr('ASA_status',ASA_status);

      $('#report_approval_modal').modal('show');
    });

  function reset_report_approval(){

  		$('#reject_remark').val('');
  		
  }

  $(document).on('click','.view_patient_detail',function () {

      var pid=$(this).attr('id');
      $('#patient_appointment_detail').modal('show');
      $.ajax({
          url:'<?=base_url()?>lis-appointment-detail',
          method:'post',
          data:{p_id:pid},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){

                $('#pname').text(data[0]['p_name']);
                $('#mobile_no').text(data[0]['mobile_number']);
                $('#uhid').text(data[0]['uhid']);
             
                html="";
                for (i=0;i<data.length;i++){

                    html+='<tr class="" PR_id="'+data[i]['id']+'">\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+(i+1)+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['appointment_no']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['appointment_datetime']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['doctor_name']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['service_name']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['service_tat']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['required_difference']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['uploaded_by']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['uploaded_timestamp']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['approved_by']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['approved_timestamp']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['status']+'</td>\
                                      <td style="border-right:1px solid lightgray;white-space: nowrap">'+data[i]['generate_report']+'</td>\
                                    </tr>'; 

                }
                
                $('#PAD_list').html(html);

            }else{
              location.reload();
            }
          }
        })
      

    })


</script>
