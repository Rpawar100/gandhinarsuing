<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Patient Company</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Category<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <select class="form-control"  name="PC_patient_category_name" id="PC_patient_category_name" required=""> 
                </select>
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Rate Type<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
               
               <select class="form-control" name="PC_rate_type_name" id="PC_rate_type_name" required=""></select>
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Company<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                
                <input class="form-control"  name="PC_name" id="PC_name" required="">
                 <input class="form-control" type="hidden" name="PC_id" id="PC_id">
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
        <h3>Patient Company List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Department</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Patient Company</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Classification</th>
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
  $('#patient_company_tab').addClass('active');
  get_list();
  rate_type_all();
  patient_category_all();

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
        'url':'<?=base_url()?>patient-company-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Category",data:"category_name",mSearch:false},
        {title: "Rate Type",data:"rate_type_name",mSearch:false},
        {title: "Company",data:"company_name",mSearch:true},
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

  function rate_type_all() {

        $.ajax({
          url:'<?=base_url()?>rate-type-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 

            if(typeof(data)=='object'){
           
              var html="<option value='' selected disable>Select Rate Type</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#PC_rate_type_name").html(html);
            }else{
              location.reload();
            }
          }
        })
    
  }

  function patient_category_all() {

        $.ajax({
          url:'<?=base_url()?>patient-category-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 

            console.log(data)
            if(typeof(data)=='object'){
           
              var html="<option value='' selected disable>Select Patient Category</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
              }
              $("#PC_patient_category_name").html(html);
            }else{
              location.reload();
            }
          }
        })
    
  }

  function reset_form(){
    $('.record_form_title').html('Add patient company');
    $('#PC_name').val('');
    $('#PC_rate_type_name').val('');
    $('#PC_patient_category_name').val('');

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
        url:'<?=base_url()?>patient-company-action',
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
    PC_id=$(this).attr('PC_id');
    if (PC_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>patient-company-delete',
          method:'post',
          data:{PC_id:PC_id},
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
    PC_id=$(this).attr('PC_id');
    if (PC_id) {
      $.ajax({
        url:'<?=base_url()?>patient-company-by-id',
        method:'post',
        data:{PC_id:PC_id},
        async: false,
        success:function (data) {

          console.log(data)
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit Patient Company');
            $('#PC_name').val(data['record'][0]['name']);
            $('#PC_rate_type_name').val(data['record'][0]['rate_type_id']);
            $('#PC_patient_category_name').val(data['record'][0]['patient_category_id']);
            $('#PC_id').val(PC_id);
            empty_disable_enable('#d_name','0');
            $('#d_name').val(data['record']['d_id']);
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
