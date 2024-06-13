<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Room Master</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Select Floor No<b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <select class="form-control" name="floor_id" id="floor_id"></select>
                <input class="form-control" type="hidden" name="bed_id" id="bed_id">
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Select Billing Class<b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <select class="form-control" name="bc_id" id="bc_id"></select>
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Room Name<b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input type="text" class="form-control" name="room_number" id="room_number">
            </div>
          </div>
           <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;" id="bs_title">Bed Strength<b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input class="form-control" type="text" name="bed_strength" id="bed_strength">
            </div>
          </div>
          <br>
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
        <h3>Room Master</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Floor No </th>
                <th nowrap="nowrap" style="width: fit-content !important;">Billing Class Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Room Number</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Bed Number</th>
                <th nowrap="nowrap" ></th>
               </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="add_bed_name_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" enctype="multipart/form-data" id="add_bed_name_form">
            <div class="modal-header">
                <h5 class="modal-title">BED Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <label class="form-control col-lg-4" style="border:0px;">Enter Bed Name:<b class="pull-right">:</b></label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="bed_number" name="bed_number">
                  <input type="hidden"  id="b_id" name="b_id">
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveNewMrdDocBtn">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>


<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#room_master_tab').addClass('active');
  
  get_list();
  floor_all();
  billing_class_all();
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
        'url':'<?=base_url()?>room-list',
      },
      'columns': [
        {title: "Sr.No.", data: "sr_no", mSearch: false},
        {title: "Floor No", data: "fr_name", mSearch: true},
        {title: "Billing Class Name", data: "bc_name", mSearch: true},
        {title: "Room Number", data: "r_name", mSearch: true},
        {title: "Bed Number", data: "bed_number", mSearch: true},
        {title: "Action", data: "action", mSearch: false},
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
            
  function reset_form(){
    $('.record_form_title').html('Add Room Master');
    $('#bs_title').text('Bed Strength');
    $('#bed_id').val('');
    $('#floor_id').val('');
    $('#bc_id').val('');
    $('#room_number').val('');
    $('#bed_number').val('');
    $('#bed_strength').val('');
   
    $('#bed_id').val('');
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
        url:'<?=base_url()?>room-action',
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


  

  $('#add_bed_name_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $("#add_bed_name_form");
    var formData = new FormData(this);
   
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>add-bed-name-action',
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
              $('#add_bed_name_modal').modal('hide');
            }
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }else{
            //location.reload();
          }
        },
      });
    } 
  });






  
  function floor_all() {
    $.ajax({
      url:'<?=base_url()?>floor-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Floor</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#floor_id").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

function billing_class_all() {
    $.ajax({
      url:'<?=base_url()?>billing-class-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Billing Class</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#bc_id").html(html);
        }else{
          location.reload();
        }
      }
    })
  }


   $(document).on('click','.add_bed_name',function () {


    var bed_id=$(this).attr('bed_id');
    $('#b_id').val(bed_id);
    $('#add_bed_name_modal').modal('show');
    

   })
  

 $(document).on('click','.delete_record',function () {
    bed_id=$(this).attr('bed_id');
    if (bed_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>room-delete',
          method:'post',
          data:{bed_id:bed_id},
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
    bed_id=$(this).attr('bed_id');
   
    if (bed_id) {
      $.ajax({
        url:'<?=base_url()?>room-by-id',
        method:'post',
        data:{bed_id:bed_id},
        async: false,
        success:function (data) {

          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Ward Name');
            $('#bs_title').text('Bed Name');

            $('#floor_id').val(data['record']['floor_id']);
            $('#bc_id').val(data['record']['billing_class_id']);
            $('#room_number').val(data['record']['r_name']);
            $('#bed_strength').val(data['record']['b_number']);          
          
            $('#bed_id').val(bed_id);
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