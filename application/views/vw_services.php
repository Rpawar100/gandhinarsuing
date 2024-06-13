<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Services</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-2" style="border:0px;">Department Name<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <input class="form-control" type="hidden" name="s_id" id="s_id">
                <select class="form-control" type="text" name="d_name" id="d_name" required=""> 
                </select>
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Service Name<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <input class="form-control" type="text" name="service_name" id="service_name" maxlength="50" required="" >
            </div>
            <label class="form-control tat_div col-lg-2" style="border:0px;">Service Input Method<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <select class="form-control tat_div"  name="service_input_method" id="service_input_method">
                  <option value="" selected="" disabled="">Select Input Method</option>
                  <option value="DATA">DATA</option>
                  <option value="FILE">FILE</option>
                </select>
            </div>
          </div>
          <div class="row" style="margin: 0px;margin-top: 5px;">
            <label class="form-control col-lg-2" style="border:0px;">Sub-Department Name<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <select class="form-control" type="text" name="sd_name" id="sd_name"  required="" > 
                  <option value="" selected="" disabled=""> Select Sub Department</option>
                </select>
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Default Rate<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <input class="form-control" type="text" name="service_default_rate" id="service_default_rate"  required="" >
            </div>
            <label class="form-control tat_div col-lg-2" style="border:0px;">Sample Type<a style="color: red">*</a></label>
            <div class="col-lg-2 tat_div">
              <select class="form-control" type="text" name="sample_type" id="sample_type"> 
                    <option value="0" selected="">Not Applicable</option>
                    <option value="Serum">Serum</option>
                    <option value="Fluid">Fluid</option>
                    <option value="Stool">Stool</option>
                    <option value="Urin">Urin</option>
                    <option value="Plasma">Plasma</option>
                    <option value="Whole_Blood">Whole Blood</option>
              </select>
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-2" style="border:0px;">Service-Group Name<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <select class="form-control" type="text" name="sg_name" id="sg_name"  required="" > 
                </select>
            </div>
            <div class="col-lg-2">
              <label class="form-control tat_div" style="border:0px;">TAT<a style="color: red">*</a></label>
            </div>
            <div class="col-lg-2 row " style="margin:0px;padding:0px;">
              <div class="col-lg-4 tat_div">
                <input class="form-control" type="text" name="days" id="days"  placeholder="DD" disabled>
              </div>
              <div class="col-lg-4 tat_div">
                <input class="form-control" type="text" name="hours" id="hours"  placeholder="HH" disabled>
              </div>
              <div class="col-lg-4 tat_div">
                <input class="form-control"  type="text" name="minutes" id="minutes"  placeholder="MM" disabled>
              </div>
            </div>
            <div class="col-lg-2">
            </div>
            
            <button type="reset" class=" col-lg-1 btn btn-danger" >Reset</button>
            <button type="submit" class=" col-lg-1 btn btn-primary" >Submit</button>
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
                <th nowrap="nowrap" style="width: fit-content !important;">Department </th>
                <th nowrap="nowrap" style="width: fit-content !important;">Sub Department </th>
                <th nowrap="nowrap" style="width: fit-content !important;">Service Group </th>
                <th nowrap="nowrap" style="width: fit-content !important;">Service Name </th>
                 <th nowrap="nowrap" style="width: fit-content !important;"></th>
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
  $('#services_tab').addClass('active');
  get_list();
  department_all()
  reset_form();
  service_group_all();
  $('.tat_div').hide();

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
        'url':'<?=base_url()?>services-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Department Name",data:"d_name",mSearch:false},
        {title: "Sub-Department Name",data:"sd_name",mSearch:false},
        {title: "Service-Group Name",data:"sg_name",mSearch:false},
        {title: "Service Name",data:"name",mSearch:true},
        {title: "TAT",data:"days",mSearch:true},
        {title:"Default Rate",data:"rate",mSearch:false},
        {title:"Sample Type",data:"sample_type",mSearch:false},
        {title: "Status",data:"services_status",mSearch:false},
        {title: "Action",data:"action",mSearch:false},

        
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8] },
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
  /*
  $('#section_name').change(function(){
        var section_name=$(this).find("option:selected").text()

        $.ajax({
            url:"<?php echo base_url();?>department-by-section",
            method:'post',
            async: false,
            dataType: 'json',
            data:{section_name:section_name},
            success:function(data)
            {   
              //console.log(data);
                  if(typeof(data)=='object'){
                      var html="<option value='' selected disable>Select Department</option>";
                      for (var i = 0; i <data['record'].length; i++){    
                          html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
                      }
                      $("#d_name").html(html);
                    }else{
                      location.reload();
                    }   
            },
        });  

   })*/


  


 $('#d_name').change(function(){
        var d_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>sub-department-by-dept",
            method:'post',
            async: false,
            dataType: 'json',
            data:{d_id:d_id},
            success:function(data)
            {   
                  empty_enable_disable('#sd_name','1','1');
                  $('#sub_department').html('');
                  html='';
                  html='<option value="" selected="" disabled=""> Select Sub Department</option>';
                  html+='<option value="0">All Sub-Department</option>'; 
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>'; 
                  } 
                  $('#sd_name').html(html);      
            },
        });

        

        if(d_id==17 || d_id==19){

         empty_enable_disable('#days','0','0');
         empty_enable_disable('#hours','0','0');
          empty_enable_disable('#minutes','0','0');

          $('.tat_div').show();
        }else{
          empty_enable_disable('#days','1','0');
         empty_enable_disable('#hours','1','0');
          empty_enable_disable('#minutes','1','0');
          $('.tat_div').hide();
        } 

   })


  function service_group_all() {
    $.ajax({
      url:'<?=base_url()?>service-group-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          console.log(data);
          var html="<option value='' selected disable>Select Service Group</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#sg_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }


  function reset_form(){
    $('.record_form_title').html('Add Services');
    $('#d_name').val('');
    empty_enable_disable('#d_name','1','0');
    empty_enable_disable('#days','1','0');
    empty_enable_disable('#hours','1','0');
    empty_enable_disable('#minutes','1','0');
    html='<option value="" selected="" disabled=""> Select Sub Department</option>';
    $('#sd_name').html(html);      
    $('#sd_name').val('');
    empty_enable_disable('#sd_name','0','1');
    $('#sg_name').val('');
    $('#service_name').val('');
    $('#service_default_rate').val('');
    $('.tat_div').hide();
    $('#days').val('');
    $('#hours').val('');
    $('#minutes').val('');
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
        url:'<?=base_url()?>services-action',
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
    s_id=$(this).attr('s_id');
    if (s_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>services-delete',
          method:'post',
          data:{s_id:s_id},
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
    s_id=$(this).attr('s_id');
    if (s_id) {
      $.ajax({
        url:'<?=base_url()?>services-by-id',
        method:'post',
        data:{s_id:s_id},
        async: false,
        success:function (data) {
          console.log(data);
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Services');
            $('#d_name').val(data['record']['d_id']);

            html='';
            html+='<option value="'+data['record']['sd_id']+'">'+data['record']['sd_name']+'</option>'; 
            $('#sd_name').html(html);     
            $('#sg_name').val(data['record']['sg_id']);
            $('#service_name').val(data['record']['name']);
            $('#service_default_rate').val(data['record']['rate']);
            var dept=data['record']['d_id'];
            if(dept==17 || dept==19){
              $('.tat_div').show();
              $('#days').val(data['record']['days']);
              $('#hours').val(data['record']['hours']);
              $('#minutes').val(data['record']['minutes']);
            }
            $('#s_id').val(s_id);
            empty_enable_disable('#d_name','0','0');
            empty_enable_disable('#sd_name','0','0');
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

  $(document).on('click','.change_status',function () {
    s_id=$(this).attr('s_id');
    status=$(this).val();
    if (s_id) {
      if (confirm('Are Your Sure Want To chage This Service status ?')==true) {
        $.ajax({
          url:'<?=base_url()?>change-services-status',
          method:'post',
          data:{s_id:s_id,status:status},
          async: false,
          success:function (data) { 
            if(data){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
            }
          }
        })
      }
      else
      {
        if(status=='0')
          $(this).prop("checked", false);
        if(status=='1')
          $(this).prop("checked", true);
      }
    }
  });


</script>
