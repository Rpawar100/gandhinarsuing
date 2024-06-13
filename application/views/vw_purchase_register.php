<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Search By</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
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
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <thead>
              <th nowrap="nowrap" >Sr.No.</th>
              <th nowrap="nowrap" >Purchase Date</th>
              <th nowrap="nowrap" >Purchase/GRN Number</th>
              <th nowrap="nowrap" >Vendor Name</th>
              <th nowrap="nowrap" >Purchase Status</th>
              <th nowrap="nowrap" >Invoice Number</th>
              <th nowrap="nowrap" >Invoice Date</th>
              <th nowrap="nowrap" >Taxable Amount</th>
              <th nowrap="nowrap" >Purchase CGST</th>
              <th nowrap="nowrap" >Purchase SGST</th>
              <th nowrap="nowrap" >Purchase IGST</th>
              <th nowrap="nowrap" >Gross Total</th>
              
              <th nowrap="nowrap" >Action</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>07-09-2013</td>
                <td>DD2211</td>
                <td>Vedant</td>
                <td>pending</td>
                <td>04201710</td>
                <td>04-10-2017</td>
                <td>3300</td>
                <td>5.056</td>
                <td>3.789</td>
                <td>4.768</td>
                <td>21000</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
               <td>2</td>
                <td>07-11-2016</td>
                <td>DD3322</td>
                <td>Sanjay</td>
                <td>done</td>
                <td>08201607</td>
                <td>08-07-2016</td>
                <td>2500</td>
                <td>7.056</td>
                <td>2.789</td>
                <td>5.768</td>
                <td>27000</td>
               
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
               <td>3</td>
                <td>09-02-2015</td>
                <td>DD4433</td>
                <td>Ramesh</td>
                <td>In Process</td>
                <td>12201505</td>
                <td>12-05-2015</td>
                <td>1300</td>
                <td>6.056</td>
                <td>7.789</td>
                <td>6.768</td>
                <td>14000</td>
                
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
  $('#purchase_register_tab').addClass('active');



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
        {title: "Id",data:"id",mSearch:false},
        {title: "Purchase Date",data:"pdate",mSearch:true},
        {title: "Purchase/GRN Number",data:"pnumber",mSearch:true},
        {title: "Vendor Name",data:"vendor_id",mSearch:true},
        {title: "Purchase Status",data:"pstatus",mSearch:true},
        {title: "Invoice Number",data:"invoice_number",mSearch:true},
        {title: "Invoice Date",data:"invoice_date",mSearch:true},
        {title: "Taxable Amount",data:"taxable_amount",mSearch:true},
        {title: "Purchase CGST",data:"cgst",mSearch:true},
        {title: "Purchase SGST",data:"sgst",mSearch:true},
        {title: "Purchase IGST",data:"igst",mSearch:true},
        {title: "Gross Total",data:"gross_total",mSearch:true},
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
