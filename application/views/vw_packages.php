<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title" style="padding-top: 10px !important;">
                <h3 class="record_form_title">Add Packages</h3>
            </div>
            <div class="ibox-content">
                <form method="post" enctype="multipart/form-data" id="records_form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="form-control" style="border: 0px;">Package Name</label>
                                    <input class="form-control" type="hidden" name="p_id" id="p_id">
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-control" style="border: 0px;">Select Service</label>
                                </div>

                                <div class="col-lg-2">
                                    <label class="form-control" style="border: 0px;">Select department</label>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-control" style="border: 0px;">Package Amount</label>
                                </div>
                                <button type="reset" class=" col-lg-1 btn btn-danger" >Reset</button>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 5px;">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-2">
                                    <input class="form-control" type="text" name="package_name" id="package_name" placeholder="Package Name" required="">
                                </div>
                                
                                 <div class="col-lg-2">
                                    <select class="form-control" name="s_name" id="s_name">
                                       <?php foreach ($services as $service): ?>
                                         <option value=""><?= $service->services_name ?></option>
                                      <?php endforeach; ?>
                                   </select>                               
                                </div>



                                <div class="col-lg-2">
                                    <select class="form-control" name="d_name" id="d_name"></select>
                                </div>


                                <div class="col-lg-2">
                                    <input class="form-control" type="number" name="package_amount" id="package_amount" step="0.01" placeholder="Package Amount" min="0.01" required="">
                                </div>
                               
                                <button type="submit" class=" col-lg-1 btn btn-primary" >Submit</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox-title" style="padding-top: 10px !important;">
                <div class="row">
                    <h3 class="col-lg-2" style="padding: 7px; padding-left: 15px;">Packages List</h3>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
                    <tfoot>
                      <tr>
                        <th nowrap="nowrap" ></th>
                        <th nowrap="nowrap" style="width: fit-content !important;">name</th>
                        <th nowrap="nowrap" style="width: fit-content !important;">d_name</th>
                        <th nowrap="nowrap" style="width: fit-content !important;">amount</th>
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
    
  $('#packages_tab').addClass('active');
    get_list();
    department_all();
   
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
        'url':'<?=base_url()?>package-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Package Name",data:"name",mSearch:true},
        {title: "Department",data:"d_name",mSearch:true},
        {title: "Amount",data:"amount",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4] },
                {
                        'targets':[0,1,2,3,4],
                        'createdCell':  function (td, cellData, rowData, row, col) {
                        $(td).attr('style', 'white-space: nowrap;'); 
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
    $('.records_form_title').html('Add Packages ');
    $('#package_name').val('');
    $('#d_name').val('');
    $('#package_amount').val('');
   
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
        url:'<?=base_url()?>package-action',
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

  function department_all() {
    $.ajax({
      url:'<?=base_url()?>department-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Department</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#d_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }


  $(document).on('click','.delete_record',function () {
   p_id=$(this).attr('p_id');
    if (p_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>package-delete',
          method:'post',
          data:{p_id:p_id},
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

$(document).on('click', '.edit_record', function () {
    var p_id = $(this).attr('p_id'); // Corrected attribute name
    alert(p_id)
    if (p_id) {
        $.ajax({
            url: '<?=base_url()?>package-by-id',
            method: 'post',
            data: {p_id: p_id},
            async: false,
            dataType: 'json',
            success: function (data) {
                if (typeof (data) == 'object') {
                    $('.record_form_title').html('Edit Package');
                    $('#p_id').val(p_id); // Updated line
                    $('#package_name').val(data['record']['name']);
                     $('#package_amount').val(data['record']['amount']);
                    $('#d_name').val(data['record']['d_name']);
           
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

