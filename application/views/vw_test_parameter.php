<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Test Parameter</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Service Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <select class="form-control"  name="service_name" id="service_name" required=""> 
                </select>
                <input type="hidden" name="TP_id" id="TP_id">
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Parameter Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
               <input class="form-control"  name="parameter_name" id="parameter_name" required="">
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Unit<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input class="form-control"  name="unit" id="unit" required="">
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Method<b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input class="form-control"  name="method" id="method">
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
        <h3>Test Parameter List</h3>
        
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Service Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Test Parameter</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Unit</th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" >Method</th>
                <th nowrap="nowrap" ></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="parameter_range_modal" role="dialog">
  <div class="modal-dialog " style="min-width: max-content;">
    <div class="modal-content" style="width: 1200px;">
      <form method="post" id="parameter_range_action" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title PR_model_title">Add Parameter Range</h4>
          <button type="button" class="pull-right close_model">&times;</button>
        </div>
        <div class="modal-body" style="font-size: medium">
          <div class="row" style="margin:10px 0px;">
            <label class="control-label col-lg-4">Select Gender<a style="color: red">*</a></label>
            <label class="control-label col-lg-2">Minimum Age<a style="color: red">*</a></label>
            <div class="col-lg-2">
              <input class="form-control" type="text" name="min_age" id="min_age" required="">
            </div>
            <label class="control-label col-lg-2">Maximum Age<a style="color: red">*</a></label>
            <div class="col-lg-2">
              <input class="form-control" type="text" name="max_age" id="max_age" required="">
            </div>
          </div>
          <div class="row" style="margin:10px 0px;">
            <div class="col-lg-4">
              <select class="form-control" name="gender" id="gender" required="">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Transgender">Transgender</option>
              </select>
              <input  type="hidden" name="PR_TP_id" id="PR_TP_id" required="">
              <input  type="hidden" name="PR_id" id="PR_id">
            </div>
            <label class="control-label col-lg-2">Minimum Value<a style="color: red">*</a></label>
            <div class="col-lg-2">
              <input class="form-control" type="text" name="min_value" id="min_value" required="">
            </div>
            <label class="control-label col-lg-2">Maximum Value<a style="color: red">*</a></label>
            <div class="col-lg-2">
              <input class="form-control" type="text" name="max_value" id="max_value" required="">
            </div>
          </div>
          <div class="row" style="margin:10px 0px;">
            <button type="reset" class=" col-lg-2 btn btn-danger pull-right">Reset</button>
            <button type="submit" class=" col-lg-2 btn btn-primary pull-right">Submit</button>
            <label class="control-label col-lg-2">Min.critical Value<a style="color: red">*</a></label>
            <div class="col-lg-2">
              <input class="form-control" type="text" name="min_critical_value" id="min_critical_value" required="">
            </div>
            <label class="control-label col-lg-2">Max.critical Value<a style="color: red">*</a></label>
            <div class="col-lg-2">
              <input class="form-control" type="text" name="max_critical_value" id="max_critical_value" required="">
            </div>
          </div>
          <div class="row" style="margin:20px 0px;">
            <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid white;">Sr.No</th>
                        <th style="border-right: 1px solid white;">Gender</th>
                        <th style="border-right: 1px solid white;">Min.Age</th>
                        <th style="border-right: 1px solid white;">Mix.Age</th>
                        <th style="border-right: 1px solid white;">Min Value</th>
                        <th style="border-right: 1px solid white;">Max Value</th>
                        <th style="border-right: 1px solid white;">Min. Critical Value</th>
                        <th style="border-right: 1px solid white;">Max. Critical Value</th>
                        <th style="border-right: 1px solid white;">Action</th>
                    </tr>
                </thead>
                <tbody id="PR_list">
                  
                </tbody>
              </table>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#test_parameter_tab').addClass('active');
  get_list();
  rate_type_all();
  patient_category_all();

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
        'url':'<?=base_url()?>test-parameter-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Service Name",data:"service_name",mSearch:false},
        {title: "Test Parameter",data:"name",mSearch:false},
        {title: "Unit",data:"unit",mSearch:true},
        {title: "Method",data:"method",mSearch:true},
        {title: "Range Parameter",data:"add_rangep",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [3,4,5,6] },

                {
                    'targets': [0,1,2,3,4,5,6],
                    'createdCell':  function (td, cellData, rowData, row, col) {
                      $(td).attr('style', 'white-space: nowrap;'); 
                  }
                },


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


  $(document).on('click','.add_PR',function () {
    var TP_id=$(this).attr('TP_id');
    $('#PR_TP_id').val(TP_id);
    $('#parameter_range_modal').modal('show');
    get_parameter_range_list(TP_id);
    

  })

  function get_parameter_range_list(TP_id){
    if (TP_id) {
      $.ajax({
        url:'<?=base_url()?>get-parameter-range-list',
        method:'post',
        data:{TP_id:TP_id},
        async: false,
        success:function (data) {
           html="";
          for (i=0;i<data.length;i++){

              html+='<tr class="" PR_id="'+data[i]['id']+'">\
                                <td style="border-right:1px solid lightgray">'+(i+1)+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['gender']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['min_age']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['max_age']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['min_value']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['max_value']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['critical_min_value']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['critical_max_value']+'</td>\
                                <td style="border-right:1px solid lightgray">'+data[i]['PR_action']+'</td>\
                              </tr>'; 

          }
          
          $('#PR_list').html(html);
        }
      })
    }else{
      alert("Something Went Wrong..!");
      location.reload();
    }
  }

  



  function rate_type_all() {

        $.ajax({
          url:'<?=base_url()?>services-diagnosis',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 

            if(typeof(data)=='object'){
           
              var html="<option value='' selected disable>Select Service Name</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#service_name").html(html);
            }else{
              location.reload();
            }
          }
        })
    
  }

  function patient_category_all() {

        $.ajax({
          url:'<?=base_url()?>patient-category-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 

            console.log(data)
            if(typeof(data)=='object'){
           
              var html="<option value='' selected disable>Select Patient Category</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#PC_patient_category_name").html(html);
            }else{
              location.reload();
            }
          }
        })
    
  }

  function reset_form(){
    $('.record_form_title').html('Add Test Parameter');
    $('#service_name').val('');
    $('#parameter_name').val('');
    $('#unit').val('');
    $('#tat').val('');
    $('#method').val('');

  }

  function reset_PR_form(){
    $('.record_form_title').html('Add Parameter Range');
    $('#gender').val('');
    $('#min_age').val('');
    $('#max_age').val('');
    $('#min_value').val('');
    $('#max_value').val('');
    $('#min_critical_value').val('');
    $('#max_critical_value').val('');

  }

  $('.close_model').click(function(){
    $('#parameter_range_modal').modal('hide');

  })

  $('#record_form').on('reset',function(event){
    reset_form();
  });

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>test-parameter-action',
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

  
  $('#parameter_range_action').on('submit',function(event){
    event.preventDefault(); 


    var min_age=$('#min_age').val();
    var maxage=$('#max_age').val();
    if(parseInt(min_age)>parseInt(maxage)){

      alert("Minimum age should be less than Maximum age");
      return;
    }
    var form = $( "#parameter_range_action" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>parameter-range-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              reset_PR_form();

              var PR_TP_id=$('#PR_TP_id').val();
              get_parameter_range_list(PR_TP_id);
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
          data:{TP_id:TP_id},
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

  $(document).on('click','.delete_PR_record',function () {
    PR_id=$(this).attr('PR_id');
    if (PR_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>parameter-range-delete',
          method:'post',
          data:{PR_id:PR_id},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
               var PR_TP_id=$('#PR_TP_id').val();
              get_parameter_range_list(PR_TP_id);
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
            $('.record_form_title').html('Edit Test Parameter');
            $('#service_name').val(data['record']['service_name']);
            $('#parameter_name').val(data['record']['name']);
            $('#unit').val(data['record']['unit']);
            $('#method').val(data['record']['method']);
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

  $(document).on('click','.edit_PR_record',function () {
    PR_id=$(this).attr('PR_id');
    if (PR_id) {
      $.ajax({
        url:'<?=base_url()?>parameter-range-by-id',
        method:'post',
        data:{PR_id:PR_id},
        async: false,
        success:function (data) {

          console.log(data)
          if(typeof(data)=='object'){
            $('.PR_model_title').html('Edit Parameter Range');
            $('#gender').val(data['record']['gender']);
            $('#min_age').val(data['record']['min_age']);
            $('#max_age').val(data['record']['max_age']);
            $('#min_value').val(data['record']['min_value']);
            $('#max_value').val(data['record']['max_value']);
            $('#min_critical_value').val(data['record']['critical_min_value']);
            $('#max_critical_value').val(data['record']['critical_max_value']);
            
            $('#PR_id').val(PR_id);
           
          }
        }
      })
    }
    
    else{
      alert("Something Went Wrong..!");
      location.reload();
    }
  });

</script>
