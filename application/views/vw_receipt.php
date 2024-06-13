<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <div class="row" >
          <form action="" style="width: 100%">
              <input type="hidden" name="daterange" id="daterangeinput" value="<?=!empty($_GET['daterange'])? $_GET['daterange']:''?>">
                  <div class="col-lg-4" style="float: left;">
                      <h3 style="font-size: 19px;">Receipt List</h3>
                  </div>
                  <div class="col-lg-3" style="float: left;">
                      <div id="daterangepicker" class="" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; ">
                          <i class="fa fa-calendar"></i>&nbsp;
                           <span><?=!empty($_GET['daterange'])? substr_replace($_GET['daterange'],' to ',10,2):''?></span>  
                          <i class="fa fa-caret-down"></i>
                      </div>
                  </div>
                  <div class="col-lg-2" style="float: left;">
                      <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
                  </div>
          </form>
        </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">TimeStamp </th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Type</th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Patient Name</th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" ></th>
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

<div id="change_refund_request_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 500px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12" style="text-align: center; padding: 30px 0;">
                <label style="font-size: x-large;margin: 30px;margin-top: 0px;" id="ASA_label">Do you want to Approve refund request?</label>
                <br>
              <button type="button" class="btn btn-primary update_status" id="Approved_status_update" style="width: 30%;height: 35%;margin-right: 15px;" appointment_id="'+appointment_id+'"  refund_status="YES" >Yes</button>
              <button type="button" class="btn btn-danger update_status" style="width: 30%;height: 35%;margin-right: 15px;" refund_status="NO">NO</button>
              <button type="button" class="btn btn-secondary" style="width: 30%;height: 35%;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
      </div>
   </div>           
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#receipt_tab').addClass('active');
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
        'url':'<?=base_url()?>receipt-list',
      },
      'columns': [
        {title:"Sr.No.",data:"sr_no",mSearch:false},
        {title:"Timestamp",data:"receipt_timestamp",mSearch:false},
        {title:"Appointment",data:"appointment_id",mSearch:false},
        {title:"Type",data:"type",mSearch:false},
        {title:"Amount",data:"amount",mSearch:true},
        {title:"Patient Name",data:"name",mSearch:false},
        {title:"Transaction Number",data:"transaction_number",mSearch:false},
        {title:"Transaction Number",data:"transaction_number",mSearch:false},
        {title:"status",data:"pay_status",mSearch:false},
        {title:"Action",data:"action",mSearch:false},

        
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7] },
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

  $(document).on('click','.refund_request',function(){

     appointment_id=$(this).attr('appointment_id');
     $('.update_status').attr('appointment_id',appointment_id);
     $('#change_refund_request_modal').modal('show');

  })


  $(document).on('click','.update_status',function(){
        appointment_id=$(this).attr('appointment_id');
        refund_status=$(this).attr('refund_status');
        flag=true;
        if(refund_status=='NO'){
          flag=false;
        }
       
        if(flag)
        {
          $.ajax({
            url:'<?=base_url()?>change-refund-request-status',
            method:'post',
            data:{appointment_id:appointment_id,refund_status:refund_status},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  get_list();
                  $('#change_refund_request_modal').modal('hide');
                 
                }
                swal({
                          html:true,
                          title:data['swall']['title'],
                          text:data['swall']['text'],
                          type:data['swall']['type'],
                        });
            }
        })
    }
    });






  



</script>
