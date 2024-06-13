<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
        <div class="ibox-title" style="padding-top: 10px !important;">
            <h3 class="record_form_title">Add Package Services</h3>
        </div>
        <div class="ibox-content">
            <form method="post" enctype="multipart/form-data" id="records_form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                            <label class="form-control" style="border: 0px;">Select Package</label>
                                <input class="form-control" type="hidden" name="psa_id" id="psa_id">
                            </div>
                            <div class="col-lg-2">
                                <label class="form-control" style="border: 0px;">Package Amount</label>
                            </div>
                             <div class="col-lg-3">
                                <label class="form-control" style="border: 0px;">Select Services</label>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-control" style="border: 0px;">Service Amount</label>
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
                            <div class="col-lg-3">
                                <select class="form-control" name="p_name" id="p_name"></select>
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="number" name="p_amount" id="p_amount"  placeholder="Package Amount"  required="">
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" name="s_name" id="s_name"></select>
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control" type="text" name="s_amount" id="s_amount" placeholder="Services Amount" required="">
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
        <h3 class="col-lg-2" style="padding: 7px; padding-left: 15px;">Package Services List</h3>
      </div>
    </div>
    <div class="ibox-content">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
          <tfoot>
            <tr>
              <th nowrap="nowrap"></th>
              <th nowrap="nowrap" style="width: fit-content !important;">package name</th>
              <th nowrap="nowrap" style="width: fit-content !important;">package Amount</th>
              <th nowrap="nowrap" style="width: fit-content !important;">service name</th>
            <th nowrap="nowrap" style="width: fit-content !important;">Service Amount</th>
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
    
  $('#package_service_assignment_tab').addClass('active');
    get_list();
    services_all();
    packages_all();
   
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
        'url':'<?=base_url()?>PSA-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "package name ",data:"p_name",mSearch:true},
        {title: "package Amount ",data:"p_amount",mSearch:true},
        {title: "service name",data:"s_name",mSearch:true},
        {title: "Service Amount",data:"s_amount",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4 ,5] },
                {
                        'targets':[0,1,2,3,4 ,5],
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
    $('.records_form_title').html('Add Package services ');
    $('#p_name').val('');
    $('#p_amount').val('');
    $('#s_name').val('');
    $('#s_amount').val('');
   
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
        url:'<?=base_url()?>psa-action',
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

function services_all() {
            $.ajax({
                url: '<?=base_url()?>services-all',
                method: 'post',
                async: false,
                dataType: 'json',
                success: function (data) {
                    if (typeof (data) == 'object') {
                        var serviceDropdownHtml = "<option value='' selected disabled>Select Services</option>";
                        var amountDropdownHtml = "<option value='' selected disabled>Services Amount</option>";

                        for (var i = 0; i < data['record'].length; i++) {
                            serviceDropdownHtml += "<option value='" + data['record'][i]["id"] + "'>" + data['record'][i]["name"] + "</option>";
                            amountDropdownHtml += "<option data-amount='" + data['record'][i]["rate"] + "' value='" + data['record'][i]["id"] + "'>" + data['record'][i]["rate"] + "</option>";
                        }

                        $("#s_name").html(serviceDropdownHtml);
                        $("#s_amount").html(amountDropdownHtml);

                        // Handle change event of service name dropdown
                        $("#s_name").change(function () {
                            var selectedServiceId = $(this).val();
                            var selectedAmount = $("#s_amount option[value='" + selectedServiceId + "']").data("amount");

                            // Update the rate dropdown with the selected rate
                            $("#s_amount").val(selectedAmount);
                        });
                    } else {
                        location.reload();
                    }
                }
            });
        }

  function packages_all() {
    $.ajax({
        url: '<?=base_url()?>packages-all',
        method: 'post',
        async: false,
        dataType: 'json',
        success: function (data) {
            if (typeof (data) == 'object') {
                var nameDropdownHtml = "<option value='' selected disable>Select packages</option>";
                var amountDropdownHtml = "<option value='' selected disable>Package Amount</option>";

                for (var i = 0; i < data['record'].length; i++) {
                    nameDropdownHtml += "<option value='" + data['record'][i]["id"] + "'>" + data['record'][i]["name"] + "</option>";
                    amountDropdownHtml += "<option data-rate='" + data['record'][i]["amount"] + "' value='" + data['record'][i]["id"] + "'>" + data['record'][i]["amount"] + "</option>";
                }

                $("#p_name").html(nameDropdownHtml);
                $("#p_amount").html(amountDropdownHtml);

                // Handle change event of service name dropdown
                $("#p_name").change(function () {
                    var selectedServiceId = $(this).val();
                    var selectedRate = $("#p_amount option[value='" + selectedServiceId + "']").data("rate");

                    // Update the rate dropdown with the selected rate
                    $("#p_amount").val(selectedRate);
                });

            } else {
                location.reload();
            }
        }
    });
}

$(document).on('click','.delete_record',function () {
   psa_id=$(this).attr('psa_id');
    if (psa_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>psa-delete',
          method:'post',
          data:{psa_id:psa_id},
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
    var psa_id = $(this).attr('psa_id'); 
    //alert(psa_id)
    if (psa_id) {
        $.ajax({
            url: '<?=base_url()?>package-services-by-id',
            method: 'post',
            data: {psa_id: psa_id},
            async: false,
            dataType: 'json',
            success: function (data) {
                if (typeof (data) == 'object') {
                    $('.record_form_title').html('Edit Package services');
                     $('#psa_id').val(data['record']['id']);
                    $('#p_name').val(data['record']['pname']);
                    $('#p_amount').val(data['record']['pamount']);
                    $('#s_name').val(data['record']['name']);
                    $('#s_amount').val(data['record']['amount']);           
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