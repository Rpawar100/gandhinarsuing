<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Canteen Management</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
           <div class="row" >
           	<div class="col-lg-7">
           		<h3 class="record_form_title" style="margin-left: 10px;">Search By</h3>	
           	</div>
           	<div class="col-lg-1">
           		<input type="button" class="btn btn-info" onclick="show_add_task()" value="Add Menu">
           	</div>
           	<div class="col-lg-1">
           		<input type="button" class="btn btn-info" onclick="show_assign_task()" value="Assign Delivery">
           	</div>
           	<div class="col-lg-1">
           		<button type="reset" class="btn btn-info" >Invoice List</button>
           	</div>
            <div class="col-lg-1">
              <input type="button" class="btn btn-info" onclick="show_live_order_bill()" value="Live Order Billing">
            </div>

            
           </div>
           <br>
           <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">From Date</label>
            <label class="form-control col-lg-2" style="border:0px;">To Date</label>
            <label class="form-control col-lg-1" style="border:0px;"></label>
            <label class="form-control col-lg-2" style="border:0px;">By Room</label>
            <label class="form-control col-lg-1" style="border:0px;"></label>
            <label class="form-control col-lg-2" style="border:0px;">By Patient</label>
           	
            
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
      	<h3 class="record_form_title">Add Menu</h3>
      	<hr>
        <form method="post" enctype="multipart/form-data" id="record_form">
           
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Diet Type<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <select class="form-control"  name="Diet_id" id="Diet_id" required="" >
                    <option value="Normal Diet">Normal Diet</option>
                    <option value="Liquid Diet">Liquid Diet</option>
                    <option value="Fasting Diet">Fasting Diet</option>
                  </select>
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Menu Name<a style="color: red">*</a><b class="pull-right">:</b></label>
  	        <div class="col-lg-2">
  	            <input class="form-control" type="text" name="menu_name" id="menu_name">
  	        </div>
            
          </div>
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Serving Time<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="time" name="serving_time" id="serving_time" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Frequecy<a style="color: red">*</a><b class="pull-right">:</b></label>
  	        <div class="col-lg-2">
  	           <input class="form-control" type="text" name="frequecy" id="frequecy" required="" >
  	        </div>
          </div>
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Rate For Hospital<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="rate_for_hospital" id="rate_for_hospital" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Rate For Patient<a style="color: red">*</a><b class="pull-right">:</b></label>
  	        <div class="col-lg-2">
  	            <input class="form-control" type="text" name="rate_for_patient" id="rate_for_patient" required="" >
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
      	<h3 class="record_form_title">Assign Delivery</h3>
      	<hr>
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Select Menu<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <select class="form-control" name="menu_id" id="menu_id" required="" >
                  	<option value="" selected disabled>Select Menu</option>
                  </select>
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Assign Location<a style="color: red">*</a><b class="pull-right">:</b></label>
  	        <div class="col-lg-2">
  	            <input class="form-control" type="text" name="Location" id="Location">
  	        </div>
            
          </div>
           <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Serving Time<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="time" name="serving_time" id="serving_time" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Frequecy<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
               <input class="form-control" type="text" name="frequecy" id="frequecy" required="" >
            </div>
          </div>
          <!--
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Rate For Hospital<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <input class="form-control" type="text" name="rate_for_hospital" id="rate_for_hospital" required="" >
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Rate For Patient<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                <input class="form-control" type="text" name="rate_for_patient" id="rate_for_patient" required="" >
            </div>
          </div> -->
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Assign Employee<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-2">
                  <select class="form-control"  name="employee_id" id="employee_id" required="" >
                  </select>
            </div>
            <label class="form-control col-lg-2" style="border:0px;">Assign Supervisor<a style="color: red">*</a><b class="pull-right">:</b></label>
  	        <div class="col-lg-2">
  	            <select class="form-control">
  	            	<option value="" selected="" disabled="">Select Supervisor</option>
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
      <div class="ibox-content" id="live-order-bill-form">
        <h3 class="record_form_title">Live Order Billing</h3>
        <hr>
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Bill Date<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Bill Number<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Patient Name<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Patient Location<a style="color: red">*</a></label>

            <label class="form-control col-lg-2" style="border:0px;">Payment Status<a style="color: red">*</a></label>
            <!--
            <label class="form-control col-lg-2" style="border:0px;">Invoice Date<a style="color: red">*</a></label>-->
            
          </div>
          <div class="row"  style="margin-top: 5px;">
          
              <div class="col-lg-2">
                  <input class="form-control" type="Date" name="Bill_date" id="Bill_date" required="" >
              </div>
              <div class="col-lg-2">
                <input class="form-control" type="text" name="purchase_number" id="purchase_number">
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="vendor_code" id="vendor_code" required="" >
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="vendor_name" id="vendor_name" required="" >
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="purchase_status" id="purchase_status" required="" >
              </div>
              
              <!--
              <div class="col-lg-2">
                  <input class="form-control" type="date" name="invoice_date" id="invoice_date" required="" >
              </div>-->
              <!--
              <button type="submit" class=" col-lg-1 btn btn-primary" >Submit</button>-->
          </div>
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Taxable Amount<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">CGST<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">SGST<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Gross Total<a style="color: red">*</a></label>
            
          </div>
          <div class="row"  style="margin-top: 5px;">
          
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="taxable_amount" id="taxable_amount" required="" >
              </div>
              <div class="col-lg-2">
                <input class="form-control" type="text" name="purchase_cgst" id="purchase_cgst">
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="purchase_sgst" id="purchase_sgst" required="" >
              </div>
            
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="gross_total" id="gross_total" required="" >
              </div>
          </div>
          <br>
          <table class="table" style="border: 1px solid #e9ecef;margin: 0px;">
              <thead>
                  <tr>
                      <th style="border-right: 1px solid white;">Sr.No.</th>
                      <th style="border-right: 1px solid white;">Item Code</th>
                      <th style="border-right: 1px solid white;">Menu Name</th>
                      <th style="border-right: 1px solid white;">Menu Description</th>
                      <th style="border-right: 1px solid white;">Rate</th>
                      <th style="border-right: 1px solid white;">Qty.</th>
                      <th style="border-right: 1px solid white;">Unit</th>
                      <th style="border-right: 1px solid white;">CGST</th>
                      <th style="border-right: 1px solid white;">SGST</th>
                      <th style="border-right: 1px solid white;">Gross Total</th>
                      <th style="border-right: 1px solid white;">Action</th>
                  </tr>
              </thead>
              <tbody id="service_list">
                <tr style="font-size: 18px;">
                      <td style="border-right: 1px solid white;">.</td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>
                      <td style="border-right: 1px solid white;"></td>  
                <tr>
              </tbody>
          </table>
          <br>
           <div class="row" >
            <label class="form-control col-lg-1" style="border:0px;">Taxable Amount</label>
            <div class="col-lg-1">
                <input class="form-control" type="text" name="taxable_amount" id="purchase_date" required="" >
            </div>
             <label class="form-control col-lg-1" style="border:0px;">CGST</label>
            <div class="col-lg-1">
                <input class="form-control" type="text" name="taxable_amount" id="purchase_date" required="" >
            </div>
            <label class="form-control col-lg-1" style="border:0px;">SGST</label>
            <div class="col-lg-1">
                <input class="form-control" type="text" name="taxable_amount" id="purchase_date" required="" >
            </div>
            <label class="form-control col-lg-1" style="border:0px;">Other Charges</label>
            <div class="col-lg-1">
                <input class="form-control" type="text" name="taxable_amount" id="purchase_date" required="" >
            </div>
            <!--
            <label class="form-control col-lg-2" style="border:0px;">Other Charges</label>
            <label class="form-control col-lg-2" style="border:0px;">Delivery Charges</label>
            <label class="form-control col-lg-2" style="border:0px;">Invoice Amount</label>
            <label class="form-control col-lg-2" style="border:0px;">Vendor Name</label>-->
            <!--
            <label class="form-control col-lg-2" style="border:0px;">Invoice Date<a style="color: red">*</a></label>-->
          </div>
          <div class="row"  style="margin-top: 5px;">
              <label class="form-control col-lg-2" style="border:0px;">Discount Amount</label>
              <div class="col-lg-1">
                  <input class="form-control" type="text" name="taxable_amount" id="purchase_date" required="" >
              </div>
              <label class="form-control col-lg-2" style="border:0px;">Total Invoice Amount</label>
              <div class="col-lg-1">
                  <input class="form-control" type="text" name="taxable_amount" id="purchase_date" required="" >
              </div>
              <div class="col-lg-1">
                <button type="reset" class="btn btn-primary" >Draft Save</button>
              </div>
              <div class="col-lg-1">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!--
              <div class="col-lg-2">
                <input class="form-control" type="text" name="purchase_number" id="purchase_number">
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="vendor_code" id="vendor_code" required="" >
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="vendor_name" id="vendor_name" required="" >
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="purchase_status" id="purchase_status" required="" >
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="invoice_number" id="invoice_number" required="" >
              </div>

              <div class="col-lg-2">
                  <input class="form-control" type="date" name="invoice_date" id="invoice_date" required="" >
              </div>-->
              <!--
              <button type="submit" class=" col-lg-1 btn btn-primary" >Submit</button>-->
          </div> 
        </form>
        
      </div>
    </div>
    <div class="col-lg-12" id="task-list">
      <div class="ibox-content">
        <h3>Delivery Status</h3>
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
              <th nowrap="nowrap" >Order Date</th>
              <th nowrap="nowrap" >Patient Name</th>
              <th nowrap="nowrap" >Location</th>
              <th nowrap="nowrap" >Department</th>
              <th nowrap="nowrap" >Frequency</th>
              <th nowrap="nowrap" >Diet Type</th>
              <th nowrap="nowrap" >Menu Name</th>
              <th nowrap="nowrap" >Dietition Name</th>
              <th nowrap="nowrap" >Delivery Status</th>
              <th nowrap="nowrap" >Rating By Patient</th>
              <th nowrap="nowrap" >Delivered By</th>
              <th nowrap="nowrap" >Delivery Time</th>
              <th nowrap="nowrap" >Bill Amount</th>
              <th nowrap="nowrap" >Action</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>05-03-2023</td>
                <td>Sunita</td>
                <td>Sangli</td>
                <td>Gynacology</td>
                <td>370Hz</td>
                <td>Cardiac diet</td>
                <td>Salmon</td>
                <td>Mr.Kolhe</td>
                <td>done</td>
                <td> three star</td>
                <td>Rohan</td>
                <td>10 min</td>
                <td>367</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>2</td>
                <td>12-04-2021</td>
                <td>Raghav</td>
                <td>Mumbai</td>
                <td>OT</td>
                <td>420Hz</td>
                <td>Ketogenic Diet</td>
                <td>Eggs</td>
                <td>shruti</td>
                <td>in process</td>
                <td> three star</td>
                <td>swati</td>
                <td>15 min</td>
                <td>200</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>3</td>
                <td>15-01-2022</td>
                <td>sumit</td>
                <td>Pune</td>
                <td>OT</td>
                <td>350Hz</td>
                <td>Ketogenic Diet</td>
                <td>Chicken</td>
                <td>sameer</td>
                <td>done</td>
                <td> three star</td>
                <td>aditya</td>
                <td>35 min</td>
                <td>320</td>
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
  $('#canteen_management_tab').addClass('active');
  //get_list();
  $('#add-task-form').hide();
  $('#assign-task-form').hide();
  $('#live-order-bill-form').hide();


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

  function show_live_order_bill(){

    $('#live-order-bill-form').show();
    $('#task-list').hide();
    $('#add-task-form').hide();
      $('#assign-task-form').hide();
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
        {title: "Order Date",data:"",mSearch:true},
        {title: "Patient Name",data:"",mSearch:true},
        {title: "Location",data:"",mSearch:true},
        {title: "Department",data:"",mSearch:true},
        {title: "Frequency",data:"",mSearch:true},
        {title: "Diet Type",data:"",mSearch:true},
        {title: "Menu Name",data:"",mSearch:true},
        {title: "Dietition Name",data:"",mSearch:true},
        {title: "Delivery Status",data:"",mSearch:true},
        {title: "Rating By Patient",data:"",mSearch:true},
        {title: "Delivered By",data:"",mSearch:true},
        {title: "Delivery Time",data:"",mSearch:true},
        {title: "Bill Amount",data:"",mSearch:true},

        {title: "Action",data:"action",mSearch:true},
       
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14] }
                ,{
                    'targets':[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14],
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
