<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
        <div class="ibox-title" style="padding-top: 10px !important;">
            <h3 class="record_form_title">Add Bed Master</h3>
        </div>
        <div class="ibox-content">
            <form method="post" enctype="multipart/form-data" id="records_form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="form-control" style="border: 0px;"> Select Floor</label>
                            </div>
                             <div class="col-lg-2">
                                <label class="form-control" style="border: 0px;">Select Billing Category</label>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-control" style="border: 0px;">Select Type</label>
                            </div>
                             <div class="col-lg-2">
                                <label class="form-control" style="border: 0px;">Select Room Number</label>
                            </div>
                            <div class="col-lg-2">
                            <label class="form-control" style="border: 0px;">Bed No</label>
                            <input class="form-control" type="hidden" name="b_id" id="b_id">
                            </div>
                            <div class="col-lg-2">
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                              
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <select class="form-control" name="floor_no" id="floor_no"></select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control" name="ward_name" id="ward_name"></select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control" name="room_type" id="room_type"></select>
                            </div>
                            <div class="col-lg-2">
                              <select class="form-control" name="room_number" id="room_number"></select>
                            </div>
                            <div class="col-lg-2">
                             <input class="form-control" type="text" name="bed_no" id="bed_no" placeholder="Bed No"  required="">
                            </div> 
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
   <div class="col-lg-12">
    <div class="ibox-title" style="padding-top: 10px !important;">
      <div class="row">
        <h3 class="col-lg-2" style="padding: 7px; padding-left: 15px;">Bed Master</h3>
      </div>
    </div>
    <div class="ibox-content">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
          <tfoot>
            <tr>
              <th nowrap="nowrap"></th>
              <th nowrap="nowrap" style="width: fit-content !important;">Floor no</th>
              <th nowrap="nowrap" style="width: fit-content !important;">Ward name</th>
              <th nowrap="nowrap" style="width: fit-content !important;">Room name</th>
              <th nowrap="nowrap" style="width: fit-content !important;">Bed no</th>
              <th nowrap="nowrap"></th>
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
 $('#bed_master_tab').addClass('active');
 get_list();
  floor_all();
  ward_all();
  room_all();
  room_type_all();


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
        'url':'<?=base_url()?>bed-list',
      },
      'columns': [
        {title: "Sr.No.", data: "sr_no", mSearch: false},
        {title: "Floor No", data: "floor_name", mSearch: true},
        {title: "Category Name", data: "w_name", mSearch: true},
        {title: "Type Name", data: "r_name", mSearch: true},
        {title: "Bed No", data: "b_no", mSearch: true},
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
    $('.record_form_title').html('Add Bed Master');
    $('#floor_no').val('');
    $('#ward_name').val('');
    $('#room_name').val('');
    $('#b_id').val('');
    $('#bed_no').val('');
  }
  $('#records_form').on('reset',function(event){
    reset_form();
  });

  $('#records_form').on('submit',function(event){
    event.preventDefault(); 
  
    var form = $( "#records_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>bed-action',
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
          $("#floor_no").html(html);
        }else{
          location.reload();
        }
      }
    })
  }


  

  function room_type_all() {
    $.ajax({
      url:'<?=base_url()?>room-type-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Type</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#room_type").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

function ward_all() {
    $.ajax({
      url:'<?=base_url()?>ward-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Category</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#ward_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }



   $('#ward_name').change(function(){
        var ward_id=$(this).val();
        $.ajax({
        url:'<?=base_url()?>room-by-ward-id',
        method:'post',
        async: false,
        dataType: 'json',
        data:{ward_id:ward_id},
        success:function (data) {

          if(typeof(data)=='object'){

            var html="<option value='' selected disable>Select Room</option>";
            for (var i = 0; i <data['record'].length; i++){    
                html+="<option value='"+data['record'][i]["id"]+"' >"+data['record'][i]["name"]+"</option>";  
            }
            $("#room_number").html(html);

          
          }else{
            location.reload();
          }
        }
      })
    }) 

function room_all() {
    $.ajax({
      url:'<?=base_url()?>room-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Type</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#room_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }



  $(document).on('click','.delete_record',function () {
    b_id=$(this).attr('b_id');
    if (b_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>bed-delete',
          method:'post',
          data:{b_id:b_id},
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
    b_id=$(this).attr('b_id');
    alert(b_id);
    if (b_id) {
      $.ajax({
        url:'<?=base_url()?>bed-by-id',
        method:'post',
        data:{b_id:b_id},
        async: false,
        success:function (data) {

          console.log(data);
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Bed No');
            $('#bed_no').val(data['record']['b_no']);
            $('#floor_no').val(data['record']['f_no']);
            $('#ward_name').val(data['record']['w_name']);
            $('#room_name').val(data['record']['r_name']);
            $('#b_id').val(b_id);
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