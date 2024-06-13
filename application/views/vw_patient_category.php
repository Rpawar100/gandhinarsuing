<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Patient Category</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input class="form-control" type="text" name="pc_name" id="pc_name" maxlength="50" required="" >
                <input class="form-control" type="hidden" name="pc_id" id="pc_id">
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Type<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <select class="form-control"  name="pc_type" id="pc_type" required="">
                  <option value="" selected="" disabled="">Select Type</option>
                  <option value="Corporate Tie-Up" >Corporate Tie-Up</option>
                  <option value="Goverment Policies" >Goverment Policies</option>
                  <option value="Insurance" >Insurance</option>
                  <option value="Self Pay" >Self Pay</option>
                  <option value="Semi Goverment" >Semi Goverment</option>
                  <option value="Staff / Employee" >Staff / Employee</option>
                  <option value="Student" >Student</option>
                  <option value="CAMP" >CAMP</option>
                </select>
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
    <div class="col-lg-8">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Patient Category List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Type</th>
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
  $('#patient_category_tab').addClass('active');
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
        'url':'<?=base_url()?>patient-category-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Name",data:"name",mSearch:true},
        {title: "Type",data:"type",mSearch:true},
        {title: "No of Company",data:"count",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4] },
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

  function reset_form(){
    $('.record_form_title').html('Add Patient Category');
    $('#pc_name').val('');
    $('#pc_id').val('');
    $('#pc_type').val('');
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
        url:'<?=base_url()?>patient-category-action',
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
    pc_id=$(this).attr('pc_id');
    if (pc_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>patient-category-delete',
          method:'post',
          data:{pc_id:pc_id},
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
    pc_id=$(this).attr('pc_id');
    if (pc_id) {
      $.ajax({
        url:'<?=base_url()?>patient-category-by-id',
        method:'post',
        data:{pc_id:pc_id},
        async: false,
        success:function (data) {
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Patient Category');
            $('#pc_name').val(data['record']['name']);
            $('#pc_type').val(data['record']['type']);
            $('#pc_id').val(pc_id);
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
