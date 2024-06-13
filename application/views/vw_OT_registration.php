<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link href="<?=base_url('assets')?>/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">New Schedule</h3>
      </div>
      <div class="ibox-content">
        <div class="row">
          <label class="form-control col-lg-2" style="border:0px;">Select Operation Theatre</label>
        </div>
        <div class="row">
          <div class="col-lg-2">
            <select class="form-control" name="ot_room" id="ot_room">
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add OT</h3>
      </div>
      <div class="ibox-content">
        <div id="calendar"></div>
        <div id='OT_form'style="margin-top:10px;">
          <form method="post"  enctype="multipart/form-data" id="OT_book_action">
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Select Surgery Name<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-10">
                <input class="form-control" style="width:100%" type="text"  name="surgery_name" id="surgery_name"> 
                <input class="form-control"  type="hidden"  name="ot_id" id="ot_id"> 
              </div>
            </div>
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Primary Surgeon<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <select class="form-control selectpicker" id="primary_surgeon" name="primary_surgeon" data-live-search="true">
                  <option value="" selected="" disabled="">Select Primary Surgeon</option>
                </select>
              </div>
              <div class="col-lg-2"><label style="width:100%">Unit<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <select class="form-control">
                  <option value="" selected="" disabled="">Select Unit</option>
                </select>
              </div>
            </div>
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Secondary Surgeon<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <select class="form-control selectpicker" id="secondary_surgeon" name="secondary_surgeon" data-live-search="true">
                  <option value="" selected="" disabled="">Select Secondary Surgeon</option>
                </select>
              </div>
            </div> 
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Primary Nurse<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <select class="form-control" id="primary_nurse" name="primary_nurse">
                  <option value="" selected="" disabled="">Select Primary Nurse</option>
                  <option value="1">Sakshi Chavan</option>
                  <option value="2">Hema Jadhav</option>
                  <option value="3">Sneha Patil</option>
                </select>
              </div>
            </div> 
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Scrub Nurse<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4"><input class="form-control" style="width:100%" type="text"  name="scrub_nurse" id="scrub_nurse"></div>
            </div>
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Equipment<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4"><input class="form-control" style="width:100%" type="text"  name="equipment" id="equipment"></div>
            </div> 
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Operation Type<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <select class="form-control" name="operation_type" id="operation_type">
                    <option value="" selected="" disabled="">Select Operation Type</option>
                    <option value="Major">Major</option>
                    <option value="Minor">Minor</option>
                    <option value="Super Major">Super Majors</option>
                    <option value="General">General</option>
                </select>
              </div>
            </div>
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Anesthesia Status<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <input type="radio" id="Yes" name="anesthesia_status"  value="Yes">
                <label for="html">Yes</label>
                <input type="radio" id="No" name="anesthesia_status" value="No">
                <label for="css">No</label>
              </div>
            </div>
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Anesthetist<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <input class="form-control" style="width:100%" type="text"  name="anesthetist" id="anesthetist">
              </div>
            </div>
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Anesthesia Type<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <select class="form-control" name="anesthesia_type" id="anesthesia_type">
                  <option value="" selected="" disabled="">Select Anesthesia Type</option>
                  <option value="Propofol">Propofol</option>
                  <option value="Halothane">Halothane</option>
                  <option value="Fentanyl">Fentanyl</option>
                </select>
               </div>
            </div> 
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">On Call Doctor<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <select class="form-control" id="On_call_doctor" name="On_call_doctor">
                  <option value="" selected="" disabled="">Select On Call Doctor</option>
                </select>
              </div>
            </div>  
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Remark<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <input class="form-control" style="width:100%" type="text"  name="remark" id="remark">
              </div>
            </div>  
            <div class="row" style="padding:5px;">
              <div class="col-lg-2"><label style="width:100%">Diagnosis<i style="color: red">*</i><i style="float:right;">:</i></label></div>
              <div class="col-lg-4">
                <textarea id="diagnosis" name="diagnosis" rows="2" cols="70">
                </textarea>
              </div>
            </div>
            <div id="after_ot_form">
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Patient_ In Time<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="datetime-local"  name="patient_in_timestamp" id="patient_in_timestamp">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Antibiotic Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="datetime-local"  name="antibiotic_timestamp" id="antibiotic_timestamp">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Incision Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="datetime-local"  name="incision_timestamp" id="incision_timestamp">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Antibiotic Used<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="text"  name="antibiotic_used" id="antibiotic_used">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Patient Out Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="datetime-local"  name="patient_out_timestamp" id="patient_out_timestamp">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Cleaning Start Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="datetime-local"  name="cleaning_start_timestamp" id="cleaning_start_timestamp">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Cleaning End Timestamp<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="datetime-local"  name="cleaning_end_timestamp" id="cleaning_end_timestamp">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Implant Used<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="text"  name="implant_used" id="implant_used">
                </div>
              </div>
              <div class="row" style="padding:5px;">
                <div class="col-lg-2"><label style="width:100%">Implant Type<i style="color: red">*</i><i style="float:right;">:</i></label></div>
                <div class="col-lg-4">
                  <input class="form-control" style="width:100%" type="text"  name="implant_type" id="implant_type">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Submit</button>
              <button type="button" class="btn btn-default pull-left close_ot_model">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">        
        <h3>OT List</h3>
        <button class="btn btn-primary pull-right check-OT-btn"><i class="fa fa-plus"></i> Add New</button>
        <!--<input class="form-control pull-right check-OT-btn" type="button" style="width:120px;height:40px;background-color:#1ab394;color:white;margin-top:20px;" value="Add New">-->
      </div>
      <div class="ibox-content">
        <div id="booked_ot_list">
          
        </div>
      </div>
    </div>
  </div>
  <div class="ibox-title all_ot_list"  style="padding-top: 10px !important;">
    <h3>Booked OT List</h3>
  </div>
  <div class="ibox-content all_ot_list">
    <div class="table-responsive" >
      <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
        <tfoot>
          <tr>
            <th nowrap="nowrap" ></th>
            <th nowrap="nowrap" style="width: fit-content !important;">UHID</th>
            <th nowrap="nowrap" style="width: fit-content !important;">Room Name</th>
            <th nowrap="nowrap" style="width: fit-content !important;">Operation Name</th>
            <th nowrap="nowrap" style="width: fit-content !important;">Operation Type</th>
            <th nowrap="nowrap" style="width: fit-content !important;">Primary Surgen</th>
            <th nowrap="nowrap" style="width: fit-content !important;">Schedule Date</th>
            <th nowrap="nowrap" style="width: fit-content !important;">From Time</th>
            <th nowrap="nowrap" style="width: fit-content !important;">To Time</th>
            <th nowrap="nowrap" ></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="check_OT_by_time_modal" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content">
      <form method="post"  enctype="multipart/form-data" id="check_OT_by_time_form">
        <div class="modal-header">
          <h4 class="modal-title">Enter Time</h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" id="TP_list" style="font-size: medium;">
          <div class="row" style="margin:10px 0px;">
            <label class="form-control col-lg-2" style="border:0px;">From Time</label>
            <div class="col-lg-4">
              <input class="form-control" type="time" id="from_time" name="from_time">
            </div>
            <label class="form-control col-lg-2" style="border:0px;">To Time</label>
            <div class="col-lg-4">
              <input class="form-control" type="time" id="to_time" name="to_time">
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Check</button>
          <button type="button" class="btn btn-default pull-left close_model">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script src="<?=base_url('assets')?>/js/fullcalendar/moment.min.js"></script>
<script src="<?=base_url('assets')?>/js/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript">
  $('#OT_tab').addClass('active');

  

  get_list();
  OT_room_all();
  doctors_all();

  $('#primary_surgeon').selectpicker();
  $('#secondary_surgeon').selectpicker();
  $('#OT_form').hide();
  $('#after_ot_form').hide();

  function get_list(){
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
        'url':'<?=base_url()?>booked-ot-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "UHID",data:"uhid",mSearch:true},
        {title: "Room No",data:"room_name",mSearch:false},
        {title: "Operation Name",data:"name",mSearch:false},
        {title: "Operation Type",data:"operation_type",mSearch:false},
        {title: "Primary Surgent",data:"primary_surgent",mSearch:false},
        {title: "Schedule Date",data:"schedule_date",mSearch:false},
        {title: "From Time",data:"from_time",mSearch:false},
        {title: "To Time",data:"to_time",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9] },
                {
                  'targets': [0,1,2,3,4,5,6,7,8,9], 
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
        $(this).html( '<input type="text" style="fit-content;" placeholder="'+title+'" /> ' );  
      }
    } );

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

 $(document).ready(function() {

  $('#calendar').fullCalendar({
      header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      droppable: true, 
      drop: function() {
          
          if ($('#drop-remove').is(':checked')) {
              $(this).remove();
          }
      },
      
      events: function(start, end, timezone, callback) {
        $.ajax({
            url:'<?=base_url()?>ot-list-bymonth',
            method:'post',
            dataType: 'json',
            success: function(data) {
              var events = [];

            for (var i = 0; i < data['record'].length; i++) {
                

              var dateString = data['record'][i]['schedule_date'];
              var dateParts = dateString.split('-'); 
              var d = parseInt(dateParts[0], 10);
              var m = parseInt(dateParts[1], 10) - 1; 
              var y = parseInt(dateParts[2], 10);
              

                events.push({
                    id: data['record'][i]['id'], 
                    title: data['record'][i]['name'] + ' - ' + data['record'][i]['room_name'],
                    start: new Date(y, m, d), 
                    allDay: false
                });
            }

            console.log(events);

            callback(events);
            }
        });
    }
  });


  });

 $('.check-OT-btn').click(function(){

  $('#check_OT_by_time_modal').modal('show');
 })

 $('.close_model').click(function(){

 
  $('#from_time').val('');
  $('#to_time').val('');
  $('#check_OT_by_time_modal').modal('hide');
  
 })

 $('.close_ot_model').click(function(){


    show_default();
    show_OT_calender();
    reset_OT_book_form();
    $('#after_ot_form').hide();

 })

 function show_default(){

  $('.all_ot_list').show();
 }

 function OT_room_all() {
    $.ajax({
      url:'<?=base_url()?>OT-room-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="";
           html+='<option selected="" disabled="">Select Operation Theater</option>'; 
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#ot_room").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  $('#ot_room').change(function(){
    if(selected_date){
      var booking_ot=$('#ot_room').val();
      check_OT_bookings(booking_ot,selected_date);
    }

  })
  var selected_date='';

  $(document).on('click', '.fc-day', function(){
    $('.fc-day').removeAttr('style');
    $(this).css('background-color', 'khaki');
    var booking_ot=$('#ot_room').val();
    var booking_date=$(this).attr('data-date');
    selected_date=booking_date;
    
    check_OT_bookings(booking_ot,booking_date);
   
  });

  function check_OT_bookings(booking_ot,booking_date){
    $.ajax({
      url:'<?=base_url()?>check-OT-booking',
      method:'post',
      async: false,
      dataType: 'json',
      data:{OT_room:booking_ot,booking_date,booking_date},
      success:function (data) { 
         html="";
              if(typeof(data)=='object'){
                 for (i=0;i<data['record'].length;i++){
                  html+=
                        '<div class="row">\
                          <label class="col-lg-4">Date<b class="pull-right">:</b></label>\
                          <label class="col-lg-6">'+data['record'][i]['booked_date']+'</label>\
                        </div>\
                        <div class="row">\
                          <label class="col-lg-4">Room No.<b class="pull-right">:</b></label>\
                          <label class="col-lg-6">'+data['record'][i]['room_no']+'</label>\
                        </div>\
                        <div class="row">\
                        <label class="col-lg-4">UHID <b class="pull-right">:</b></label>\
                        <label class="col-lg-6">'+data['record'][i]['uhid']+'</label>\
                        </div>\
                        <div class="row">\
                          <label class="col-lg-4">Patient Name <b class="pull-right">:</b></label>\
                          <label class="col-lg-6">'+data['record'][i]['patient_name']+'</label>\
                        </div>\
                        <div class="row">\
                          <label class="col-lg-4">From Time <b class="pull-right">:</b></label>\
                          <label class="col-lg-2">'+data['record'][i]['booked_from_time']+'</label>\
                          <label class="col-lg-2">To Time <b class="pull-right">:</b></label>\
                          <label class="col-lg-4">'+data['record'][i]['booked_to_time']+'</label>\
                        </div><br>\
                        '
                    }
                    

              }else{
                //html+='No booking available';
              }
              $('#booked_ot_list').html(html);
      }
    })
  }

  function show_ot_form(){
    $('#calendar').hide();
    $('.all_ot_list').hide();

    
    $('#OT_form').show();
        
  }

  $('#check_OT_by_time_form').on('submit',function(event){
    event.preventDefault(); 

    var form = $( "#check_OT_by_time_form");
    var formData = new FormData(this);
    var ot_room=$('#ot_room').val();
    formData.append('ot_room',ot_room);
    formData.append('ot_date',selected_date);

    
    if(ot_room && selected_date ){
      $.ajax({
      url:'<?=base_url()?>check-OT-by-time',
      method:'post',
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        if(typeof(data)=='object'){

          if(data['swall']['type']=='warning'){
              swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }else{

            show_ot_form();
            $('#check_OT_by_time_modal').modal('hide');
            $('#schedule_start_time').val(data['swall']['from_time']);
            $('#schedule_end_time').val(data['swall']['to_time']);
          }

        }else{

            
        }
      },
    });
    }else{

      alert('Please Select Room and Date')
    }

  });

   function doctors_all(){
        $.ajax({
        url:'<?=base_url()?>doctor-by-section-id',
        method:'post',
        async: false,
        dataType: 'json',
        data:{section_name:2},
        success:function (data) {

          if(typeof(data)=='object'){

            var html="<option value='' selected disable>Select Doctor</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html+="<option value='"+data['record'][i]["id"]+"' type='"+data['record'][i]["type"]+"'>"+data['record'][i]["name"]+"</option>";  
            }
            $("#primary_surgeon").html(html);

            var html1="<option value='' selected disable>Select Secondary Doctor</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html1+="<option value='"+data['record'][i]["id"]+"' type='"+data['record'][i]["type"]+"'>"+data['record'][i]["name"]+"</option>";  
            }
            $("#secondary_surgeon").html(html1);



          }else{
            location.reload();
          }
        }
      })
    }

    function  reset_OT_book_form(){



      $('#ot_room').val('');
      $("#primary_surgeon").val('default').selectpicker("refresh");
      $("#secondary_surgeon").val('default').selectpicker("refresh");
      $('#surgery_name').val('');
      $('#primary_surgeon').val('');
      $('#secondary_surgeon').val('');
      $('#primary_nurse').val('');
      $('#scrub_nurse').val('');
      $('#equipment').val('');
      $('#operation_type').val('');
      $('#anesthesia_status').val('');
      $('#anesthetist').val('');
      $('#anesthesia_type').val('');
      $('#On_call_doctor').val('');
      $('#remark').val('');
      $('#diagnosis').val('');
      $('#ot_id').val('');
      $('#after_ot_form').hide();

      $('#patient_in_timestamp').val('');
      $('#antibiotic_timestamp').val('');
      $('#incision_timestamp').val('');
      $('#antibiotic_used').val('');
      $('#patient_out_timestamp').val('');
      $('#cleaning_start_timestamp').val('');
      $('#cleaning_end_timestamp').val('');
      $('#implant_used').val('');
      $('#implant_type').val('');


      
    }

  function show_OT_calender(){

      $('#OT_form').hide();
      $('#calendar').show();
   

  }


  $('#OT_book_action').on('submit',function(event){

    event.preventDefault(); 
    var form = $( "#OT_book_action");
    var formData = new FormData(this);
    var ot_room=$('#ot_room').val();
    formData.append('ot_room',ot_room);
    formData.append('schedule_date',selected_date);
    if(ot_room){
        $.ajax({
        url:'<?=base_url()?>OT-book-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){

            reset_OT_book_form();
            show_OT_calender();
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      });
    }else{
      alert('Please Select OT Room');
    }
   
    
  });

  $(document).on('click','.delete_record',function () {
      ot_id=$(this).attr('ot_id');
      if (ot_id) {
        if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
          $.ajax({
            url:'<?=base_url()?>ot-delete',
            method:'post',
            data:{ot_id:ot_id},
            async: false,
            success:function (data) { 
               if(typeof(data)=='object'){
                swal({
                  html:true,
                  title:data['swall']['title'],
                  text:data['swall']['text'],
                  type:data['swall']['type']
                });
                get_list();
              }else{
                location.reload();
              }
            }
          })
        }
      }else{
        alert("Something Went Wrong..!");
        location.reload();
      }
    });


  $(document).on('click','.edit_record',function () {
    show_ot_form();
    $('#after_ot_form').show();
    ot_id=$(this).attr('ot_id');
    if (ot_id) {
      $.ajax({
        url:'<?=base_url()?>ot-by-id',
        method:'post',
        data:{ot_id:ot_id},
        async: false,
        success:function (data) {  

          if(typeof(data)=='object'){
            
            $('.record_form_title').html('Edit OT');
            $('#ot_room').val(data['record']['ot_room_id']);
            $('#surgery_name').val(data['record']['ot_operation_name']);
            $('#primary_surgeon').selectpicker('val',data['record']['ot_primary_surgent']);
            $('#secondary_surgeon').selectpicker('val',data['record']['ot_secondary_surgent']);
            $('#primary_nurse').val(data['record']['ot_nurse']);
            $('#scrub_nurse').val(data['record']['ot_scrub_nurse']);
            $('#equipment').val(data['record']['ot_equipment']);
            $('#operation_type').val(data['record']['ot_operation_type']);
            $('#anesthetist').val(data['record']['ot_anesthesia']);
            $('#anesthesia_type').val(data['record']['ot_anesthesia_type']);
            $('#On_call_doctor').val(data['record']['ot_on_call_doctor']);
            $('#remark').val(data['record']['ot_remark']);
            $('#diagnosis').val(data['record']['ot_diagnosis']);

            $('#patient_in_timestamp').val(data['record']['ot_patient_in_timestamp']);
            $('#antibiotic_timestamp').val(data['record']['ot_patient_antibiotic_timestamp']);
            $('#incision_timestamp').val(data['record']['ot_incision_timestmap']);
            $('#antibiotic_used').val(data['record']['ot_antibiotic_used']);
            $('#patient_out_timestamp').val(data['record']['ot_patient_out_timestamp']);
            $('#cleaning_start_timestamp').val(data['record']['ot_cleaning_start_timestamp']);
            $('#cleaning_end_timestamp').val(data['record']['ot_cleaning_end_timestamp']);
            $('#implant_used').val(data['record']['ot_implant_used']);
            $('#implant_type').val(data['record']['ot_implant_type']);

            $('#ot_id').val(ot_id);
           
          }else{
            //location.reload();
          } 
        }
      })
    }else{
      alert("Something Went Wrong..!");
      location.reload();
    } 
  

  });

 
  

</script>
