<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Visitor</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" >
            <div class="col-lg-6">
              <div class="row" >
                <label class="form-control col-lg-3" style="border:0px;">Name<a style="color: red">*</a></label>
                <label class="form-control col-lg-3" style="border:0px;">Mobile No.<a style="color: red">*</a></label>
                <label class="form-control col-lg-3" style="border:0px;">Section<a style="color: red">*</a></label>
                <label class="form-control col-lg-3" style="border:0px;">Doctor</label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row" >
                <label class="form-control col-lg-3" style="border:0px;">Department</label>
                <label class="form-control col-lg-4" style="border:0px;">Reason<a style="color: red">*</a></label>
                <label class="form-control col-lg-3" style="border:0px;">Pass No.<a style="color: red">*</a></label>
                <button type="reset" class=" col-lg-2 btn btn-danger" >Reset</button>
              </div>
            </div>
          </div>
          <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-6">
              <div class="row" >
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="v_name" id="v_name"  placeholder="Enter Name" maxlength="200" required="" >
                    <input class="form-control" type="hidden" name="v_id" id="v_id">
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="tel" name="v_mobile" id="v_mobile" maxlength="10" required="" placeholder="Enter Mobile No." pattern="[6-9]{1}[0-9]{9}" >
                </div>
                <div class="col-lg-3">
                  <select class="form-control" name="section_name" id="section_name" required></select>
                </div>
                <div class="col-lg-3">
                  <select class="form-control" name="doctor_name" id="doctor_name" ></select>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row" >
                <div class="col-lg-3">
                  <select class="form-control" name="d_name" id="d_name" ></select>
                </div>
                <div class="col-lg-4">
                  <select class="form-control" name="r_name" id="r_name" required></select>
                </div>
                <div class="col-lg-3">
                  <input class="form-control" type="number" name="v_pass" id="v_pass" step="1" placeholder="Pass No." min="1" max="999" required="" >
                </div>
            <button type="submit" class=" col-lg-2 btn btn-primary" >Submit</button>
              </div>
            </div>
          </div>
          <div class="row" style="margin-top: 5px;">
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <div class="row"> 
          <h3 class="col-lg-2" style="padding: 7px;padding-left: 15px;">Visitor List</h3>
          
          <div class="col-lg-2" style="background: lightgreen;border-radius: 10px 0px 0px 10px;" id="total_count_summary">
            <h3  style="margin: 10px;text-align: center;">Total Visitor : <b class="total_count_summary" style="font-size: x-large;">0</b></h3>
          </div>
          <div class="col-lg-2" style="background: lightskyblue;border-radius: 0px 0px 0px 0px;" id="today_count_summary">
            <h3  style="margin: 10px;text-align: center;">Today's Visitor : <b class="today_count_summary" style="font-size: x-large;">0</b></h3>
          </div>
          <div class="col-lg-2" style="background: lightgreen;border-radius: 0px 10px 10px 0px;" id="in_count_summary">
            <h3  style="margin: 10px;text-align: center;">Visitor In : <b class="in_count_summary" style="font-size: x-large;">0</b></h3>
          </div>
        </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Mobile No.</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Section</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Doctor</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Department</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Reason</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">In-Timestamp</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Out-Timestamp</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Pass Number</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Status</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Inserted By</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Updated By</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Updated Timestamp</th>
                <th nowrap="nowrap" ></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#visitor_tab').addClass('active');



  active_tab='total_count_summary';
  $('#total_count_summary').addClass('active');
  get_list();

  $('#total_count_summary').on('click',function(){
    change_tab('total_count_summary');
  });

  $('#today_count_summary').on('click',function(){
    change_tab('today_count_summary');
  });

  $('#in_count_summary').on('click',function(){
    change_tab('in_count_summary');
  });


  function change_tab(tab_name){
    $('#'.concat(active_tab)).removeClass('active');
    $('#'.concat(tab_name)).addClass('active');
    active_tab=tab_name;
    get_list();
  }
 
  reason_all();
  section_all();
  visitor_summary();
  empty_enable_disable('#d_name','0','1');
  empty_enable_disable('#doctor_name','0','1');




  

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
        'url':'<?=base_url()?>visitor-list',
        'data':{active_tab:active_tab},
      },
      'columns': [
        {title: "Id",data:"id",mSearch:false},
        {title: "Name",data:"name",mSearch:true},
        {title: "Mobile No.",data:"mobile",mSearch:true},
        {title: "Section",data:"section",mSearch:true},
        {title: "Doctor",data:"doctor",mSearch:true},
        {title: "Department",data:"dept",mSearch:true},
        {title: "Reason.",data:"reason",mSearch:true},
        {title: "In Timestamp",data:"in_timestamp",mSearch:true},
        {title: "Out Timestamp",data:"out_timestamp",mSearch:true},
        {title: "Pass No.",data:"pass_number",mSearch:true},
        {title: "Status",data:"status",mSearch:true},
        {title: "Inserted By",data:"insert_name",mSearch:true},
        {title: "Updated By",data:"update_name",mSearch:true},
        {title: "Updated Timestamp",data:"updated_timestamp",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14] }
                ,{
                    'targets':[1,2,3,4,5,6],
                    'createdCell':  function (td, cellData, rowData, row, col) {
                    $(td).attr('style', 'white-space: nowrap;text-align-last: left;'); 
                  }
                }
                ,{
                    'targets':[7,8,9,10,11,12,13,14],
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

  function reset_form(){
    $('.record_form_title').html('Add Visitor');
    $('#v_name').val('');
    $('#v_id').val('');
    $('#v_mobile').val('');
    $('#r_name').val('');
    $('#section_name').val('');
    empty_enable_disable('#v_pass','1','1');
    empty_enable_disable('#d_name','0','1');
    empty_enable_disable('#doctor_name','0','1');
    $("#doctor_name").html('');
    $("#d_name").html('');
  }

  $('#record_form').on('reset',function(event){
    reset_form();
  });

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>visitor-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              reset_form();
              visitor_summary();
              get_list();
            }
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }else{
            location.reload();
          }
        },
      });
    }
  });

  $('#section_name').change(function(){
    var section_name=$("#section_name option:selected").val();
    if(section_name=='1' || section_name=='2'){
      // empty_enable_disable('#d_name','1','1');
      empty_enable_disable('#doctor_name','1','1');
      doctor_by_section_id(section_name);
    }else{
      empty_enable_disable('#d_name','0','1');
      empty_enable_disable('#doctor_name','0','1');
      $("#doctor_name").html('');
      $("#d_name").html('');
    }
  });

  function section_all() {
    $.ajax({
      url:'<?=base_url()?>section-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Section</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#section_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  function doctor_by_section_id(section_name) {
    $.ajax({
      url:'<?=base_url()?>doctor-by-section-id',
      method:'post',
      data:{section_name:section_name},
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Doctor</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#doctor_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  $('#doctor_name').change(function(){
    var doctor_name=$("#doctor_name option:selected").val();
    empty_enable_disable('#d_name','1','1');
    department_by_doctor_id(doctor_name);
    
  });

  function department_by_doctor_id(doctor_name){
    $.ajax({
      url:'<?=base_url()?>department-by-doctor-id',
      method:'post',
      data:{doctor_name:doctor_name},
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Department</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#d_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  function reason_all() {
    $.ajax({
      url:'<?=base_url()?>visitor-reason-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Visit Reason</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#r_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  function visitor_summary() {
    $.ajax({
      url:'<?=base_url()?>visitor-summary-count',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          $(".in_count_summary").html(data['in_count']["count"]);
          $(".today_count_summary").html(data['today_count']["count"]);
          $(".total_count_summary").html(data['total_visitor']["count"]);
         
        }else{
          location.reload();
        }
      }
    })
  }

  $(document).on('click','.delete_record',function () {
    v_id=$(this).attr('v_id');
    if (v_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>visitor-delete',
          method:'post',
          data:{v_id:v_id},
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
    reset_form();
    v_id=$(this).attr('v_id');
    if (v_id) {
      $.ajax({
        url:'<?=base_url()?>visitor-by-id',
        method:'post',
        data:{v_id:v_id},
        async: false,
        success:function (data) {
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Visitor');
            $('#v_name').val(data['record']['name']);
            $('#v_id').val(v_id);
            $('#v_mobile').val(data['record']['mobile']);
            $('#section_name').val(data['record']['section']);
            if(data['record']['section']=='1'){
              empty_enable_disable('#doctor_name','1','1');
              doctor_by_section_id(data['record']['section']);
              $('#doctor_name').val(data['record']['doctor']);
              empty_enable_disable('#d_name','1','1');
              department_by_doctor_id(data['record']['doctor']);
              $('#d_name').val(data['record']['dept']);
            }
            $('#r_name').val(data['record']['reason']);
            empty_enable_disable('#v_pass','0','1');
            $('#v_pass').val(data['record']['pass_number']);
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

  $(document).on('click','.mark_visitor_out',function () {
    v_id=$(this).attr('v_id');
    if (v_id) {
      if (confirm('Is this Visitor Need to Mark AS Out from Facility ?')==true) {
        $.ajax({
          url:'<?=base_url()?>visitor-update-status',
          method:'post',
          data:{v_id:v_id},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
              visitor_summary();
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

</script>
