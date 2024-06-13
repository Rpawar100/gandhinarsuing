<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Purchase</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" >
            <label class="form-control col-lg-2" style="border:0px;">Purchase Date<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Purchase / GRN Number<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Vendor Code<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Vendor Name<a style="color: red">*</a></label>

            <label class="form-control col-lg-2" style="border:0px;">Purchase Status<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Invoice Number<a style="color: red">*</a></label>
            <!--
            <label class="form-control col-lg-2" style="border:0px;">Invoice Date<a style="color: red">*</a></label>-->
            
          </div>
          <div class="row"  style="margin-top: 5px;">
          
              <div class="col-lg-2">
                  <input class="form-control" type="Date" name="purchase_date" id="purchase_date" required="" >
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
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="invoice_number" id="invoice_number" required="" >
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
            <label class="form-control col-lg-2" style="border:0px;">Purchase CGST<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Purchase SGST<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Purchase IGST<a style="color: red">*</a></label>
            <label class="form-control col-lg-2" style="border:0px;">Gross Total<a style="color: red">*</a></label>
            

            <!--
            -->
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
                  <input class="form-control" type="text" name="purchase_igst" id="purchase_igst" required="" >
              </div>
              <div class="col-lg-2">
                  <input class="form-control" type="text" name="gross_total" id="gross_total" required="" >
              </div>
             
              
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
              <th nowrap="nowrap" >Product Code</th>
              <th nowrap="nowrap" >Product Name</th>
              <th nowrap="nowrap" >Product Description</th>
              <th nowrap="nowrap" >Purchase Rate</th>
              <th nowrap="nowrap" >Purchase Qty.</th>
              <th nowrap="nowrap" >Purchase Unit</th>
              <th nowrap="nowrap" >Taxable Amount</th>
              <th nowrap="nowrap" >Purchase CGST</th>
              <th nowrap="nowrap" >Purchase SGST</th>
              <th nowrap="nowrap" >Purchase IGST</th>
              <th nowrap="nowrap" >Gross Total</th>
              <th nowrap="nowrap" >Generate Barcode</th>
              <th nowrap="nowrap" >Action</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>DD2211</td>
                <td>anethesia machines</td>
                <td>prepare a gas mixture</td>
                <td>70%</td>
                <td>10 </td>
                <td>clinical services</td>
                <td>2300</td>
                <td>8.056</td>
                <td>6.789</td>
                <td>4.768</td>
                <td>3400</td>
                <td>011100</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>2</td>
                <td>DD3322</td>
                <td>Paracetamol</td>
                <td>Use for fever</td>
                <td>40%</td>
                <td>5</td>
                <td>clinical services</td>
                <td>2300</td>
                <td>5.056</td>
                <td>3.789</td>
                <td>4.768</td>
                <td>1500</td>
                <td>101021</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>3</td>
                <td>DD4433</td>
                <td>Patient Monitors </td>
                <td>For measure Records</td>
                <td>80%</td>
                <td>15</td>
                <td>case study</td>
                <td>2700</td>
                <td>4.056</td>
                <td>7.789</td>
                <td>4.768</td>
                <td>4400</td>
                <td>02140101</td>
                <td><i class="fa fa-plus edit_record" style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
            </tbody>

            
           
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
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
            <label class="form-control col-lg-1" style="border:0px;">IGST</label>
            <div class="col-lg-1">
                <input class="form-control" type="text" name="taxable_amount" id="purchase_date" required="" >
            </div>
            <label class="form-control col-lg-1" style="border:0px;">Delivery Charges</label>
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
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#vendor_master_tab').addClass('active');



  //get_list();


    var today = new Date();
    
    var formattedDate = today.toISOString().substr(0, 10);
    
    $('#purchase_date').val(formattedDate);
  
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
        {title: "Product Code",data:"",mSearch:true},
        {title: "Product Name",data:"",mSearch:true},
        {title: "Product Description",data:"",mSearch:true},
        {title: "Purchase Rate",data:"",mSearch:true},
        {title: "Purchase Qty.",data:"",mSearch:true},
        {title: "Purchase Unit",data:"",mSearch:true},
        {title: "Taxable Amount",data:"",mSearch:true},
        {title: "Purchase CGST",data:"",mSearch:true},
        {title: "Purchase SGST",data:"",mSearch:true},
        {title: "Purchase IGST",data:"",mSearch:true},
        {title: "Gross Total",data:"",mSearch:true},
        {title: "Generate Barcode",data:"",mSearch:true},
        {title: "Action",data:"action",mSearch:true},
       
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13] }
                ,{
                    'targets':[0,1,2,3,4,5,6,7,8,9,10,11,12,13],
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
