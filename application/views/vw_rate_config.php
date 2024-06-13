<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
       <div class="row">
          <div class="col-lg-2 "> <h3 class="record_form_title">Add Rate Configuration</h3></div>
          <div class="col-lg-2 config_type selected_config_type" type="Service-Wise" style="border: 1px solid rgb(47, 64, 80); text-align: center; border-radius: 20px 0px 0px 20px; background: rgb(47, 64, 80); color: rgb(255, 255, 255);"> <h3 style="margin: 5px;">Service-Wise</h3></div>
          <div class="col-lg-2 config_type" type="Doctor-Wise" style="border: 1px solid rgb(47, 64, 80); text-align: center; background: white; color: rgb(0, 0, 0);"><h3 style="margin: 5px;">Doctor-Wise</h3></div>
          <div class="col-lg-2" type="Room-Category-Wise" style="border: 1px solid #2f4050;text-align: center;border-radius: 0px 20px 20px 0px;"><h3 style="margin: 5px;">Room-Category-Wise</h3></div>
        </div>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-2" style="border:0px;">Department<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Service<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Rate Type<a style="color: red">*</a></label>
            <label class="form-control col-lg-2 search_doctor_div" style="border: 0px; display: none;">Doctor<a style="color: red">*</a></label>
             <label class="form-control col-lg-1 day_div" style="border: 0px; display: none;">Select Day</label>
            <label class="form-control col-lg-1" style="border:0px;">Default Rate<a style="color: red">*</a></label>
            <label class="form-control col-lg-1" style="border:0px;">Config Rate<a style="color: red">*</a></label>
            <button type="reset" class=" col-lg-1 btn btn-danger">Reset</button>
            
          </div>
          <div class="row" style="margin: 0px;margin-top: 5px;">
           
            <div class="col-lg-2">
                <input class="form-control" type="hidden" name="rc_id" id="rc_id">
                <select class="form-control" type="text" name="d_name" id="d_name" required="" ></select>
            </div>
            <div class="col-lg-2">
                <select class="form-control" type="text" name="s_name" id="s_name" required="" disabled="" ><option value="" selected="" disabled=""> Select Services</option></select>
            </div>
            <div class="col-lg-2">
                <select class="form-control" type="text" name="rt_name" id="rt_name" required=""></select>
            </div>
            <div class="col-lg-2 search_doctor_div" style="display: none;">
                <select class="form-control" type="text" name="doctor_name" id="doctor_name" required="" disabled="" ></select>
            </div>
            <div class="col-lg-1 day_div" style="display: none;">
                <select class="form-control selectpicker" type="text" name="day[]" id="day" data-live-search="true" multiple> 
                  <option value="Mon">Monday</option>
                  <option value="Tue">Tuesday</option>
                  <option value="Wed">Wednesday</option>
                  <option value="Thu">Thursday</option>
                  <option value="Fri">Friday</option>
                  <option value="Sun">Sunday</option>           
                </select>   
            </div>
            <div class="col-lg-1">
                <input class="form-control" type="number" min="1" step="0.1" name="default_rate" id="default_rate" required="" disabled="">
            </div>
            <div class="col-lg-1">
                <input class="form-control" type="number" min="0" step="0.1" name="config_rate" id="config_rate" required="">
            </div>
            <button type="submit" class=" col-lg-1 btn btn-primary">Submit</button>
          </div>
          
        </form>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Services List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Method</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Department</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Services Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Rate Type</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Doctor Name</th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
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
  $('#rate_config_tab').addClass('active');
  get_list();
  department_all();
  reset_form();
  rate_type_all();
  $('.search_doctor_div').hide();
  $('.day_div').hide();
  $('#day').selectpicker();

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
        'url':'https://aqdsoft.in/rate-config-list',
      },
      'columns': [
        {title: "Id",data:"sr_no",mSearch:false},
        {title: "Method",data:"rcm_name",mSearch:true},
        {title: "Department",data:"d_name",mSearch:true},
        {title: "Services Name",data:"s_name",mSearch:true},
        {title: "Rate Type",data:"rt_name",mSearch:true},
        {title: "Doctor",data:"doctor_name",mSearch:true},
        {title: "Day",data:"day",mSearch:true},
        // {title: "Room Category",data:"s_name",mSearch:true},
        {title: "Default Rate",data:"d_amount",mSearch:false},
        {title: "Config Rate",data:"c_amount",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8] },
            ],
      });

    $('#datatable_list tfoot tr th').each( function () {
      var title = $(this).text();
      var field_name = $(this).attr("search_id");
      if(title!=""){ 
        $(this).html( '<input type="text" style="fit-content;" id="'+field_name+'" placeholder="'+title+'" /> ' );  
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

  
  $(document).on('click','.config_type',function () {
    change_config_type($(this).attr('type'));
  });
  function change_config_type(type){
    reset_form();
    $('.config_type').removeClass('selected_config_type');
    $('.config_type').css("background","white");
    $('.config_type').css("color","black");
    $('[type="'+type+'"]').addClass('selected_config_type');
    $('[type="'+type+'"]').css("background","#2f4050");
    $('[type="'+type+'"]').css("color","white");
    rate_type_all();
    $('#search_method').val(type)
    if(type=='Service-Wise'){
      $('.search_doctor_div').hide();
       $('.day_div').hide();
    }else if(type=='Doctor-Wise'){
      $('.search_doctor_div').show();
      $('.day_div').show();
    }
  }

  function department_all() {
    $.ajax({
      url:'https://aqdsoft.in/department-all',
      method:'post',
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

  

  $('#d_name').change(function(){
      var d_id=$(this).val();
      service_all(d_id);
      if($('.selected_config_type').attr('type')=='Doctor-Wise'){
          doctor_all(d_id);
      }
      $('#search_department').val($('#d_name option:selected').text());
  })

  $('#s_name').change(function(){
      default_rate=$('#s_name option:selected').attr('rate');
      $('#default_rate').val(default_rate);
  })

  function rate_type_all() {
        $.ajax({
          url:'https://aqdsoft.in/rate-type-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){
              var html="<option value='' selected disable>Select Rate Type</option>";
              if($('.selected_config_type').attr('type')=='Doctor-Wise'){
                html+="<option value='0'>For All Rate Type</option>";
              }
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#rt_name").html(html);
            }else{
              location.reload();
            }
          }
        })
  }

  function service_all(d_id) {
    $.ajax({
      url:'https://aqdsoft.in/services-by-department-id',
      method:'post',
      data:{d_id:d_id},
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Service</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"' rate='"+data['record'][i]["rate"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#s_name").html(html);
          empty_enable_disable('#s_name','1','0');
        }else{
          location.reload();
        }
      }
    })
  }

  function doctor_all(d_id) {
    $.ajax({
      url:'https://aqdsoft.in/doctor-by-department-id',
      method:'post',
      data:{d_id:d_id},
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Doctor</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"' >"+data['record'][i]["name"]+"</option>";  
          }
          $("#doctor_name").html(html);
          empty_enable_disable('#doctor_name','1','0');
        }else{
          location.reload();
        }
      }
    })
  }

  function reset_form(){
    $('.record_form_title').html('Add Rate Configuration');
    empty_enable_disable('#d_name','1','1');


    html='<option value="" selected="" disabled=""> Select Services</option>';
    $('#s_name').html(html);      
    empty_enable_disable('#s_name','0','1');

    html='<option value="" selected="" disabled=""> Select Doctor</option>';
    $('#doctor_name').html(html);      
    empty_enable_disable('#doctor_name','0','1');
    $("#day").val('default').selectpicker("refresh");
    empty_enable_disable('#rt_name','1','1');
    empty_enable_disable('#default_rate','0','1');
    $('#config_rate').val('');

    $('#search_method').val();
    $('#search_department').val();
    $('#search_service').val();
    $('#search_rate_type').val();
    $('#search_doctor').val();
  }

  $('#record_form').on('reset',function(event){
    reset_form();
  });

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    formData.append('rcm_name',$('.selected_config_type').attr('type'));
    if(form.valid()==true){
      $.ajax({
        url:'https://aqdsoft.in/rate-config-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              reset_form();
              get_list();
            }
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }/*else{
            location.reload();
          }*/
        },
      });
    }
  });

  $(document).on('click','.delete_record',function () {
    rc_id=$(this).attr('rc_id');
    if (rc_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'https://aqdsoft.in/rate-config-delete',
          method:'post',
          data:{rc_id:rc_id},
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
    rc_id=$(this).attr('rc_id');
    if (rc_id) {
      $.ajax({
        url:'https://aqdsoft.in/rate-config-by-id',
        method:'post',
        data:{rc_id:rc_id},
        async: false,
        success:function (data) {
         
          if(typeof(data)=='object'){
            console.log(data);
            change_config_type(data['record']['rcm_name']);
            $('.record_form_title').html('Edit Rate Configuration');
            $('#d_name').val(data['record']['d_name']);
            empty_enable_disable('#d_name','0','0');
            html='';
            html+='<option value="0">'+data['record']['s_name']+'</option>'; 
            $('#s_name').html(html);  
            $('#rt_name').val(data['record']['rt_name']);
            empty_enable_disable('#rt_name','0','0');

            $('#default_rate').val(data['record']['d_amount']);
            $('#config_rate').val(data['record']['c_amount']);
            $('#rc_id').val(rc_id);

            var values=data['record']['days'];
            var element=document.getElementById('day');
            for (var i = 0; i < element.options.length; i++) {
               element.options[i].selected = values.indexOf(element.options[i].value) >= 0;
            }

            
            html='';
            html+='<option value="0">'+data['record']['doctor_name']+'</option>'; 
            $('#doctor_name').html(html);  

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
</script>
