<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-6">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Task</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="task_record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;">Task Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-6">
                <input class="form-control" type="text" name="task_name" id="task_name" maxlength="50" required="" >
                <input class="form-control" type="hidden" name="task_id" id="task_id">
            </div>
          </div><hr>
          <div class="row" style="margin: 0px;">
              <button type="reset" class=" col-lg-5 btn btn-danger" >Reset</button>
              <div class="col-lg-2"></div>
              <button type="submit" class=" col-lg-5 btn btn-primary" >Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Assign Task</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;">Select Task<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-9">
                <select class="form-control" id="AT_id" name="AT_id"> 
                </select>
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;">Select User<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-9">
                <select class="form-control" id="user_id" name="user_id"> 
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
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Task List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Name </th>
                <th nowrap="nowrap" ></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Task Assign List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list1" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Name</th>
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
  $('#occupation_tab').addClass('active');
  get_list();
  task_all();
  user_all();
  get_task_assign_list();

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
        'url':'<?=base_url()?>task-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Name",data:"name",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2] },
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

  function get_task_assign_list(){
    if ($.fn.DataTable.isDataTable('#datatable_list1'))
    {
      var table = $('#datatable_list1').DataTable();
      table.destroy();
      table.clear();
      table.state.clear();
    }

    var table=$('#datatable_list1').DataTable({
      'processing': true,
      'serverSide': true,
      'orderable':false,
      'serverMethod': 'post',
      'autoWidth':true,
      'stateSave': true,
      'ajax': {
      'url':'<?=base_url()?>get-task-assign-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Task Name",data:"name",mSearch:true},
        {title: "User Name",data:"name",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3] },
            ],
      });

    $('#datatable_list1 tfoot tr th').each( function () {
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

  function reset_form(){
    $('.record_form_title').html('Add Occupation');
    $('#task_name').val('');
    $('#task_id').val('');
  }
  $('#record_form').on('reset',function(event){
    reset_form();
  });

  function task_all(){
    $.ajax({
          url:'<?=base_url()?>task-all',
          method:'post',
          async: false,
          success:function (data) { 
            if(typeof(data)=='object'){

              var html="<option value='' selected disable>Select Task</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#AT_id").html(html);

            }else{
              location.reload();
            }
          }
    })
  }

  function user_all(){
    $.ajax({
          url:'<?=base_url()?>users-all',
          method:'post',
          async: false,
          success:function (data) { 
            if(typeof(data)=='object'){

              var html="<option value='' selected disable>Select User</option>";
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

  $('#task_record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#task_record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>task-record-action',
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
    o_id=$(this).attr('o_id');
    if (o_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>occupation-delete',
          method:'post',
          data:{o_id:o_id},
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
    o_id=$(this).attr('o_id');
    if (o_id) {
      $.ajax({
        url:'<?=base_url()?>occupation-by-id',
        method:'post',
        data:{o_id:o_id},
        async: false,
        success:function (data) {
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Occupation');
            $('#o_name').val(data['record']['name']);
            $('#o_id').val(o_id);
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
