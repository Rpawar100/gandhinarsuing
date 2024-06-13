<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Asset Allocation</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
           <div class="row" >
            <h3 class="record_form_title" style="margin-left: 10px;">Search By</h3>
           </div>
           <br>
           <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">From Date</label>
            <label class="form-control col-lg-2" style="border:0px;">To Date</label>
            <label class="form-control col-lg-1" style="border:0px;"></label>
            <label class="form-control col-lg-2" style="border:0px;">Vendor Name</label>
            <label class="form-control col-lg-2" style="border:0px;">Vendor Code</label>
            <label class="form-control col-lg-1" style="border:0px;"></label>
            <label class="form-control col-lg-2" style="border:0px;">Product Name</label>
           
            
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
    </div>
    <div class="col-lg-12">
      <div class="ibox-content">
        <h3>List</h3>
        <row style="margin-top: 5px;">
          <div>
            <input type="radio" id="allocated" name="list_type" value="allocated" style="margin-left:10px"> 
            <label for="allocated" style="font-size: 20px;color:green;">Allocated</label>
            <input type="radio" id="Unallocated" name="list_type" value="Unallocated" style="margin-left:15px;">
            <label for="css" style="font-size: 20px;color:red">Unallocated</label>
          </div>
          
        </row>
        <br>
        <br>
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
             <thead>
              <th nowrap="nowrap" >Sr.No.</th>
              <th nowrap="nowrap" >Purchase Date</th>
              <th nowrap="nowrap" >Purchase/GRN Number</th>
              <th nowrap="nowrap" >Product Name</th>
              <th nowrap="nowrap" >Quantity</th>
              <th nowrap="nowrap" >Unit</th>
              <th nowrap="nowrap" >Assign Department</th>
              <th nowrap="nowrap" >Assign Location</th>
              <th nowrap="nowrap" >HOD Name</th>
              <th nowrap="nowrap" >Handover Date</th>
              <th nowrap="nowrap" >Print Barcode</th>
              <th nowrap="nowrap" >Status By User</th>
              <th nowrap="nowrap" >Action</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>09-02-2018</td>
                <td>DD2211</td>
                <td>anethesia machines</td>
                <td>25</td>
                <td>clinical services</td>
                <td>OT</td>
                <td>Miraj</td>
                <td>Aakash</td>
                <td>04-10-2018</td>
                <td>0102011</td>
                <td>done</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>2</td>
                <td>07-04-2017</td>
                <td>DD3322</td>
                <td>Paracetamol</td>
                <td>100</td>
                <td>clinical services</td>
                <td>Radiology</td>
                <td>Nashik</td>
                <td>Mr.Rishi</td>
                <td>04-10-2017</td>
                <td>0209211</td>
                <td>Inprocess</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>3</td>
                <td>07-11-2022</td>
                <td>DD4433</td>
                <td>Patient Monitors</td>
                <td>57</td>
                <td>case study</td>
                <td>IPD</td>
                <td>Pune</td>
                <td>Mr.Pruthwiraj</td>
                <td>15-12-2022</td>
                <td>2889001</td>
                <td>Pending</td>
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
  $('#asset_managment_tab').addClass('active');



  //get_list();
  
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
        {title: "Purchase Date",data:"",mSearch:true},
        {title: "Purchase/GRN Number",data:"",mSearch:true},
        {title: "Product Name",data:"",mSearch:true},
        {title: "Quantity",data:"",mSearch:true},
        {title: "Unit",data:"",mSearch:true},
        {title: "Assign Department",data:"",mSearch:true},
        {title: "Assign Location",data:"",mSearch:true},
        {title: "HOD Name",data:"",mSearch:true},
        {title: "Handover Date",data:"",mSearch:true},
        {title: "Print Barcode",data:"",mSearch:true},
        {title: "Status By User",data:"",mSearch:true},
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
