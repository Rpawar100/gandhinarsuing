<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Room Type</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-3" style="border:0px;">Room Type<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-9">
                <input class="form-control" type="text" name="room_type" id="room_type" maxlength="50" required="" >
                <input class="form-control" type="hidden" name="r_id" id="r_id">
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
        <h3>Room Type List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;"> Room type </th>
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
  $('#room_type_tab').addClass('active');
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
        'url':'<?=base_url()?>room-type-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Room type",data:"r_type",mSearch:true},
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

  function reset_form(){
    $('.record_form_title').html('Add Room Type');
    $('#room_type').val('');
    $('#r_id').val('');
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
        url:'<?=base_url()?>room-type-action',
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
    r_id=$(this).attr('r_id');
    if (r_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>room-type-delete',
          method:'post',
          data:{r_id:r_id},
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
    r_id=$(this).attr('r_id');
    alert(r_id);
    if (r_id) {
      $.ajax({
        url:'<?=base_url()?>room-type-by-id',
        method:'post',
        data:{r_id:r_id},
        async: false,
        success:function (data) {

          console.log(data);
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Room Type');
            $('#room_type').val(data['record']['r_type']);
            $('#r_id').val(r_id);
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