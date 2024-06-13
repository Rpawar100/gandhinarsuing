<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Facility Management</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
           <div class="row" >
           	<div class="col-lg-9">
           		<h3 class="record_form_title" style="margin-left: 10px;">Search By</h3>	
           	</div>
           	<div class="col-lg-1">
           		<input type="button" class="btn btn-info" onclick="show_add_task()" value="Add Task"></button>
           	</div>
           	<div class="col-lg-1">
           		<input type="button" class="btn btn-info" onclick="show_assign_task()" value="Assign Task"></button>
           	</div>
           	<div class="col-lg-1">
           		<button type="reset" class="btn btn-info" >View Report</button>
           	</div>
            
           	
           	
           	
           </div>
           <br>
           <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">From Date</label>
            <label class="form-control col-lg-2" style="border:0px;">To Date</label>
            <label class="form-control col-lg-1" style="border:0px;"></label>
            <label class="form-control col-lg-2" style="border:0px;">By Task</label>
            <label class="form-control col-lg-1" style="border:0px;"></label>
            <label class="form-control col-lg-2" style="border:0px;">By User</label>
           	
            
          </div>
          <div class="row"  style="margin-top: 5px;">
          
              <div class="col-lg-2">
                  <input class="form-control" type="date" name="from_date" id="from_date" required="" >
              </div>
              <div class="col-lg-2">
                <input class="form-control" type="date" name="to_date" id="to_date">
              </div>
              <div class="col-lg-1">
                <h3>OR</h3>
              </div>
              <div class="col-lg-2">
                <input class="form-control" type="text" name="vendor_name" id="vendor_name">
              </div>
              <div class="col-lg-1">
                <h3>OR</h3>
              </div>
              <div class="col-lg-2">
                <input class="form-control" type="text" name="product_name" id="product_name">
              </div>
              <button type="reset" class="col-lg-1 btn btn-primary" >Search</button>
          </div>
       
        </form>
      </div>
      <div class="ibox-content" id="add-task-form">
      	<h3 class="record_form_title">Add Task</h3>
      	<hr>
        <form method="post" enctype="multipart/form-data" id="record_form">
           
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Task Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="task_name" id="task_name" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Task Details<a style="color: red">*</a><b class="pull-right">:</b></label>
	        <div class="col-lg-2">
	            <input class="form-control" type="text" name="to_date" id="to_date">
	        </div>
            
          </div>
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Frequency<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="task_name" id="task_name" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Task Type<a style="color: red">*</a><b class="pull-right">:</b></label>
	        <div class="col-lg-2">
	            <select class="form-control">
	            	<option value="" selected="" disabled="">Select Task Type</option>
	            </select>
	        </div>
          </div>
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Location<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="task_name" id="task_name" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Department<a style="color: red">*</a><b class="pull-right">:</b></label>
	        <div class="col-lg-2">
	            <select class="form-control">
	            	<option value="" selected="" disabled="">Select Department</option>
	            </select>
	        </div>
          </div>
          <hr>
          <div class="row"  style="margin-top: 5px;">
          	<input type="button" class="btn btn-secondary" onclick="show_list()" value="Back to List" style="margin-left:15px"></button>
          	<button type="submit" class="col-lg-1 btn btn-danger" style="margin-left:15px">Reset</button>
            <button type="submit" class="col-lg-1 btn btn-primary" style="margin-left:15px">Save</button>
          </div>
       
        </form>

      </div>
      <div class="ibox-content" id="assign-task-form">
      	<h3 class="record_form_title">Assign Task</h3>
      	<hr>
        <form method="post" enctype="multipart/form-data" id="record_form">
            <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Task Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <select class="form-control" name="task_name" id="task_name" required="" >
                  	<option value="" selected disabled>Select Task</option>
                  </select>
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Task Details<a style="color: red">*</a><b class="pull-right">:</b></label>
	        <div class="col-lg-2">
	            <input class="form-control" type="text" name="to_date" id="to_date">
	        </div>
            
          </div>
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Frequency<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="task_name" id="task_name" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Task Type<a style="color: red">*</a><b class="pull-right">:</b></label>
	        <div class="col-lg-2">
	            <select class="form-control">
	            	<option value="" selected="" disabled="">Select Task Type</option>
	            </select>
	        </div>
          </div>
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Location<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="task_name" id="task_name" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Department<a style="color: red">*</a><b class="pull-right">:</b></label>
	        <div class="col-lg-2">
	            <select class="form-control">
	            	<option value="" selected="" disabled="">Select Department</option>
	            </select>
	        </div>
          </div>
           <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">User Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="task_name" id="task_name" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Supervisor<a style="color: red">*</a><b class="pull-right">:</b></label>
	        <div class="col-lg-2">
	            <input class="form-control" type="text" name="to_date" id="to_date">
	        </div>
            
          </div>
          
          <hr>
          <div class="row"  style="margin-top: 5px;">
          	<input type="button" class="btn btn-secondary" onclick="show_list()" value="Back to List" style="margin-left:15px"></button>
          	<button type="submit" class="col-lg-1 btn btn-danger" style="margin-left:15px">Reset</button>
            <button type="submit" class="col-lg-1 btn btn-primary" style="margin-left:15px">Save</button>
          </div>
       
        </form>
      </div>
    </div>
    <div class="col-lg-12" id="task-list">
      <div class="ibox-content">
        <h3>Task List</h3>
        <row style="margin-top: 5px;">
          <div>
            <input type="radio" id="allocated" name="list_type" value="allocated" style="margin-left:10px"> 
            <label for="allocated" style="font-size: 20px;color:green;">Completed</label>
            <input type="radio" id="Unallocated" name="list_type" value="Unallocated" style="margin-left:15px;">
            <label for="css" style="font-size: 20px;color:orange;">Inprogress</label>
            <input type="radio" id="Unallocated" name="list_type" value="Unallocated" style="margin-left:15px;">
            <label for="css" style="font-size: 20px;color:red">Not Done</label>
          </div>
          
        </row>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <thead>
              <th nowrap="nowrap" >Sr.No.</th>
              <th nowrap="nowrap" >Task Date</th>
              <th nowrap="nowrap" >Task Name</th>
              <th nowrap="nowrap" >Frequency</th>
              <th nowrap="nowrap" >Location</th>
              <th nowrap="nowrap" >Department</th>
              <th nowrap="nowrap" >HOD Name</th>
              <th nowrap="nowrap" >Supervisor Name</th>
              <th nowrap="nowrap" >Feedback</th>
              <th nowrap="nowrap" >Rating</th>
              <th nowrap="nowrap" >Task Status</th>
              <th nowrap="nowrap" >Task Reassignment</th>
              <th nowrap="nowrap" >Action</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>10-04-2024</td>
                <td>Electricity</td>
                <td>290Hz</td>
                <td>sangli</td>
                <td>OT</td>
                <td>Prasad</td>
                <td>Rajendra</td>
                <td>good</td>
                <td>65%</td>
                <td>Inprocess</td>
                <td>no</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>2</td>
                <td>10-02-2024</td>
                <td>Equipment</td>
                <td>300Hz</td>
                <td>pune</td>
                <td>Gynachology</td>
                <td>Sweta</td>
                <td>Sneha</td>
                <td>average</td>
                <td>60%</td>
                <td>done</td>
                <td>yes</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#facility_management_tab').addClass('active');
  //get_list();
  $('#add-task-form').hide();
  $('#assign-task-form').hide();

  

  
  function show_add_task(){
  	$('#add-task-form').show();
  	$('#task-list').hide();
  	$('#assign-task-form').hide();
  }
  function show_list(){
  	$('#task-list').show();
  	$('#add-task-form').hide();
  	$('#assign-task-form').hide();
  	
  }

  function show_assign_task(){

  	$('#assign-task-form').show();
  	$('#task-list').hide();
  	$('#add-task-form').hide();
  }


  
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
        'url':'<?=base_url()?>purchase-list',
      },
      'columns': [
        {title: "Sr.No.",data:"id",mSearch:false},
        {title: "Task Date",data:"",mSearch:true},
        {title: "Task Name",data:"",mSearch:true},
        {title: "Frequency",data:"",mSearch:true},
        {title: "Location",data:"",mSearch:true},
        {title: "Department",data:"",mSearch:true},
        {title: "HOD Name",data:"",mSearch:true},
        {title: "Supervisor Name",data:"",mSearch:true},
        {title: "Feedback",data:"",mSearch:true},
        {title: "Rating",data:"",mSearch:true},
        {title: "Task Status",data:"",mSearch:true},
        {title: "Task Reassignment",data:"",mSearch:true},
        {title: "Action",data:"action",mSearch:true},
       
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12] }
                ,{
                    'targets':[0,1,2,3,4,5,6,7,8,9,10,11,12],
                    'createdCell':  function (td, cellData, rowData, row, col) {
                    $(td).attr('style', 'white-space: nowrap;text-align-last: left;'); 
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
    $('.record_form_title').html('Add Vendor');
   
    
  }

  $('#record_form').on('reset',function(event){
    reset_form();
  });


  function vendor_all() {
    $.ajax({
      url:'<?=base_url()?>vendor-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#vendor_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>purchase-action',
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
    purchase_id=$(this).attr('purchase_id');
    if (purchase_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>purchase-delete',
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
    vendor_id=$(this).attr('vendor_id');
    if (vendor_id) {
      $.ajax({
        url:'<?=base_url()?>vendor-by-id',
        method:'post',
        data:{vendor_id:vendor_id},
        async: false,
        success:function (data) {
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Visitor');
            $('#vendor_name').val(data['record']['name']);
            $('#vendor_gst_number').val(data['record']['gst_number']);
            $('#vendor_address').val(data['record']['address']);


            $('#vendor_id').val(vendor_id);
            
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
