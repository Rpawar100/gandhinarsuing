<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Add Department Assignment</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;">User Name<a style="color: red">*</a></label>
            <label class="form-control col-lg-3" style="border:0px;">Department Name<a style="color: red">*</a></label>
            <label class="form-control col-lg-3" style="border:0px;">Sub-Department Name<a style="color: red">*</a></label>
            <button type="reset" class=" col-lg-3 btn btn-danger" >Reset</button>
          </div>
          <div class="row" style="margin: 0px;margin-top: 5px;">
            <div class="col-lg-3">
                <select class="form-control selectpicker" data-live-search="true"  name="user_id" id="user_id" required=""> 
                </select>
            </div>
            <div class="col-lg-3">
                <input class="form-control" type="hidden" name="s_id" id="s_id">
                <select class="form-control selectpicker" data-live-search="true" type="text" name="d_name" id="d_name" required=""> 
                </select>
            </div>
            <div class="col-lg-3">
                <select class="form-control selectpicker" data-live-search="true"  type="text" name="sd_name" id="sd_name"  required="" > 
                	<option value="" selected="" disabled=""> Select Sub Department</option>
                </select>
            </div>
            <button type="submit" class=" col-lg-3 btn btn-primary" >Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Department Assignment List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">User Name </th>
                <th nowrap="nowrap" style="width: fit-content !important;">Department Name </th>
                <th nowrap="nowrap" style="width: fit-content !important;">Sub-Department Group </th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                
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
  $('#department_assignment_tab').addClass('active');
  get_list();
  users_all();
  department_all();
  reset_form();
  service_group_all();
  $('#user_id').selectpicker();
  $('#d_name').selectpicker();
  $('#sd_name').selectpicker();


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
        'url':'<?=base_url()?>user-department-assign-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "User Name",data:"name",mSearch:false},
        {title: "Department Name",data:"d_name",mSearch:false},
        {title: "Sub-Department Name",data:"sd_name",mSearch:false},
        {title: "Status",data:"status",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
       

        
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5] },
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


  function users_all() {
    $.ajax({
      url:'<?=base_url()?>users-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#user_id").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  function department_all() {
    $.ajax({
      url:'<?=base_url()?>department-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#d_name").html(html);
          $('#d_name').selectpicker('refresh');
        }else{
          location.reload();
        }
      }
    })
  }
 

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
                  html+='<option value="0">All Sub-Department</option>'; 
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>'; 
                  } 
                  $('#sd_name').html(html); 
                  $('#sd_name').selectpicker('refresh');     
            },
        });  

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
    
   
    $("#user_id").val('default').selectpicker("refresh");
    $("#d_name").val('default').selectpicker("refresh");
    $("#sd_name").val('default').selectpicker("refresh");
   
    //empty_enable_disable('#d_name','1','0');
    //html='<option value="" selected="" disabled=""> Select Sub Department</option>';
    //$('#sd_name').html(html);      
    //$('#sd_name').val('');
    //empty_enable_disable('#sd_name','0','1');
    
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
        url:'<?=base_url()?>assign-department-action',
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


  $(document).on('click','.change_status',function () {
   
    UDA_id=$(this).attr('UDA_id');
    UDA_status=$(this).val();
    if (UDA_id) {
      if (confirm('Are Your Sure Want To chage This Service status ?')==true) {
        $.ajax({
          url:'<?=base_url()?>change-department-assign-status',
          method:'post',
          data:{UDA_id:UDA_id,UDA_status:UDA_status},
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

  $(document).on('click','.delete_record',function () {
    UDA_id=$(this).attr('UDA_id');
    if (UDA_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>assign-department-delete',
          method:'post',
          data:{UDA_id:UDA_id},
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


</script>
