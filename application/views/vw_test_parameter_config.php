<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Test Parameter Config</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Select Department<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <select class="form-control"  name="d_name" id="d_name" required=""> 
                </select>
                <input type="hidden" name="TPC_id" id="TPC_id">
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Select Service<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
               <select class="form-control"  name="service_name" id="service_name" required="">
               </select>
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Parameter Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
               <select class="form-control"  name="parameter_name" id="parameter_name" required="">
               </select>
            </div>
          </div>
          
          <hr>
          <div class="row" style="margin: 0px;">
              <button type="reset" class=" col-lg-5 btn btn-danger" >Reset</button>
              <div class="col-lg-2"></div>
              <button type="submit" class=" col-lg-5 btn btn-primary" >Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Test Parameter Config List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Service Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Test Parameter Config</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Min Value</th>
                <th nowrap="nowrap" >Max Value</th>
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
  $('#patient_company_tab').addClass('active');
  get_list();
  department_all();
  reset_form();

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
        'url':'<?=base_url()?>test-parameter-config-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Department Name",data:"service_name",mSearch:false},
        {title: "Service Name",data:"service_name",mSearch:false},
        {title: "Parameter Name",data:"name",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4] },
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

  function department_all() {
    $.ajax({
      url:'<?=base_url()?>department-all',
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
     $.ajax({
      url:'<?=base_url()?>services-by-department-id',
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
          $("#service_name").html(html);
          empty_enable_disable('#service_name','1','0');
        }else{
          location.reload();
        }
      }
    })   
  })

  $('#service_name').change(function(){
     var s_id=$(this).val();
     $.ajax({
      url:'<?=base_url()?>test-parameter-by-service-id',
      method:'post',
      data:{s_id:s_id},
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Service</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"' rate='"+data['record'][i]["rate"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#parameter_name").html(html);
          empty_enable_disable('#parameter_name','1','0');
        }else{
          location.reload();
        }
      }
    })   
  })

  function reset_form(){
    $('.record_form_title').html('Add Test Parameter Config');
    empty_enable_disable('#service_name','0','0');
    empty_enable_disable('#parameter_name','0','0');
    $('#d_name').val('');
    $('#service_name').val('');
    $('#parameter_name').val('');
  

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
        url:'<?=base_url()?>test-parameter-config-action',
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
          }else{
            location.reload();
          }
        },
      });
    }
  });

  $(document).on('click','.delete_record',function () {
    TP_id=$(this).attr('TP_id');
    if (TP_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>test-parameter-delete',
          method:'post',
          data:{PC_id:PC_id},
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
    TP_id=$(this).attr('TP_id');
    if (TP_id) {
      $.ajax({
        url:'<?=base_url()?>test-parameter-by-id',
        method:'post',
        data:{TP_id:TP_id},
        async: false,
        success:function (data) {

          console.log(data)
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Test Parameter Config');
            $('#service_name').val(data['record']['service_name']);
            $('#parameter_name').val(data['record']['name']);
            $('#min_value').val(data['record']['min_value']);
            $('#max_value').val(data['record']['max_value']);
            $('#TP_id').val(TP_id);
           
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
