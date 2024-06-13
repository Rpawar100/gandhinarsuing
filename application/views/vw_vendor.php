<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Vendor</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" >
            <label class="form-control col-lg-3" style="border:0px;">Vendor Name<a style="color: red">*</a></label>
            <label class="form-control col-lg-3" style="border:0px;">Vendor GST Number<a style="color: red">*</a></label>
            <label class="form-control col-lg-3" style="border:0px;">Vendor Address<a style="color: red">*</a></label>
            <button type="reset" class="col-lg-1 btn btn-danger" >Reset</button>
          </div>
          <div class="row"  style="margin-top: 5px;">
          
              <div class="col-lg-3">
                  <input class="form-control" type="text" name="vendor_name" id="vendor_name"  placeholder="Enter Name"  required="" >
                  <input class="form-control" type="hidden" name="vendor_id" id="vendor_id">
              </div>
              <div class="col-lg-3">
                <input class="form-control" type="text" name="vendor_gst_number" id="vendor_gst_number">
              </div>
              <div class="col-lg-3">
                  <input class="form-control" type="text" name="vendor_address" id="vendor_address"  placeholder="Enter Address"  required="" >
              </div>
              <button type="submit" class=" col-lg-1 btn btn-primary" >Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">GST Number</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Vendor address</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;"></th>
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
  $('#vendor_master_tab').addClass('active');



  get_list();
  
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
        'url':'<?=base_url()?>vendor-list',
      },
      'columns': [
        {title: "Id",data:"id",mSearch:false},
        {title: "Vendor Name",data:"name",mSearch:true},
        {title: "Vendor GST number",data:"gst_number",mSearch:true},
        {title: "Vendor Address",data:"address",mSearch:true},
        {title: "Action",data:"action",mSearch:true},
       
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4] }
                ,{
                    'targets':[0,1,2,3,4],
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
    $('#vendor_name').val('');
    $('#vendor_gst_number').val('');
    $('#vendor_address').val('');
    
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
        url:'<?=base_url()?>vendor-action',
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
    vendor_id=$(this).attr('vendor_id');
    if (vendor_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>vendor-delete',
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
