<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<style type="text/css">
  
  .ibox-content{
    padding-top: 0px;
    padding-bottom: 10px;
    text-align: center;
  }
  .count_div{
    border-bottom: 1px solid lightgray;
    margin:0px;
  }
  .right_left{
    border-right: 1px solid lightgray; 
    border-left: 1px solid lightgray;
    padding-bottom: 5px;
    padding-top: 10px;
  }
  .right{
    border-right: 1px solid lightgray; 
    padding-bottom: 5px;
    padding-top: 10px;
  }
  .active{
    background-color:#ff000036;
  }
  .inactive{
    background-color:#00ff0040;
  }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Doctor Desk</h3>
      </div>
      <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-lg-4 " style="cursor:pointer;">
            <div class="ibox float-e-margins" style="margin-bottom:0px;" >
              <div class="ibox-title" style="background-color: #22486b;color:white;">
                <h3><i class="fa fa-book"></i> OPD </h3>
              </div>
              <div class="ibox-content" style="background-color: #f4f3f7;">
                <div class="row count_div" >
                  <div class="col-lg-6 right_left active" id="opd_waiting">
                    <h3 class="no-margins"><?=!empty($opd_waiting['opdw_count'])? $opd_waiting['opdw_count']:'0'?></h3>
                    <small>Waiting</small>
                  </div>
                  <div class="col-lg-6 right inactive" id="opd_completed">
                    <h3 class="no-margins"><?=!empty($opd_completed['opdc_count'])? $opd_completed['opdc_count']:'0'?></h3>
                    <small>Completed</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 "  style="cursor:pointer;">
            <div class="ibox float-e-margins" style="margin-bottom:0px;" >
              <div class="ibox-title" style="background-color: #22486b;color:white;">
                <h3><i class="fa fa-book"></i> IPD </h3>
              </div>
              <div class="ibox-content" style="background-color: #f4f3f7;">
                <div class="row count_div" >
                  <div class="col-lg-12 right_left inactive" id="ipd_patient">
                    <h3 class="no-margins"><?=!empty($ipd_patient['ipdp_count'])? $ipd_patient['ipdp_count']:'0'?></h3>
                    <small>Total IPD Patient</small>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4" onclick="window.location='<?=base_url()?>subject';" style="cursor:pointer;">
            <div class="ibox float-e-margins" style="margin-bottom:0px;" >
              <div class="ibox-title" style="background-color:#22486b;color:white;">
                <h3><i class="fa fa-book"></i>Casualty </h3>
              </div>
              <div class="ibox-content" style="background-color: #f4f3f7;">
                <div class="row count_div" >
                  <div class="col-lg-6 right_left active">
                    <h3 class="no-margins"><?=!empty($subject_count['active_cnt'])? $subject_count['active_cnt']:'0'?></h3>
                    <small>Waiting</small>
                  </div>
                  <div class="col-lg-6 right inactive">
                    <h3 class="no-margins"><?=!empty($subject_count['inactive_cnt'])? $subject_count['inactive_cnt']:'0'?></h3>
                    <small>Completed</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <div class="row"> 
          <h3 class="col-lg-2" style="padding: 7px;padding-left: 15px;">Patients Waiting</h3>
          <div class="col-lg-5"></div>
        </div>
      </div>
      <div class="ibox-content">
          <div class="col-lg-2" style="float: left;padding-top:15px">
              <div class="input-group">
                  <input class="form-control" type="date" name="search_date" id="search_date">
                  <button type="button" class="btn btn-primary" id="search"><i class="fa fa-search"></i></button>
              </div>
          </div>
        <div class="table-responsive" style="margin-top:5%" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">UHID</th>
                <th nowrap="nowrap" style="width: fit-content !important;">OPD ID</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Patient Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Location</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Reg.Time</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Gender</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Age</th>
                <th nowrap="nowrap" style="width: fit-content !important;">New/FollowUp</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Bill Report</th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="change_appointment_status_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog " style="max-width: 500px;border-radius: 15px;">
      <div class="modal-content" style="border-radius: 15px;">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12" style="text-align: center; padding: 30px 0;">
                <label style="font-size: x-large;margin: 30px;margin-top: 0px;">Do You Want to change status into Inprocess !</label>
                <br>
              <button type="button" class="btn btn-primary update_status" id="Approved_status_update" style="width: 30%;height: 35%;margin-right: 15px;" appointment_id="'+appointment_id+'"  appointment_status="YES" >Yes</button>
              <button type="button" class="btn btn-danger update_status" style="width: 30%;height: 35%;margin-right: 15px;" appointment_id="'+appointment_id+'" appointment_status="NO">NO</button>
              <button type="button" class="btn btn-secondary" style="width: 30%;height: 35%;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
      </div>
   </div>           
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#doctor_dashboard_tab').addClass('active');
  get_list();


  $(document).ready(function(){
    
    var currentDate = new Date().toISOString().slice(0, 10);
    
    document.getElementById("search_date").value = currentDate;
  });
 

  var search_date='';
  $('#search').click(function(){

      search_date=$('#search_date').val();   
      get_list();
      
      
    })
  

  var active_tab='opd_waiting';

  $('#opd_waiting').addClass('active');
  get_list();

  $('#opd_waiting').on('click',function(){
    change_tab('opd_waiting');
  });



  $('#opd_completed').on('click',function(){
    change_tab('opd_completed');
  });

  $('#ipd_patient').on('click',function(){
    change_tab('ipd_patient');
  });

  


   function change_tab(tab_name){
    $('#'.concat(active_tab)).removeClass('active');
    $('#'.concat(tab_name)).addClass('active');
    active_tab=tab_name;
    get_list();
  }

  



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
        'url':'<?=base_url()?>all-appointment-list',
        'data':{active_tab:active_tab,search_date:search_date},
      },
      'columns': [
        {title: "Id",data:"sr_no",mSearch:false},
        {title: "UHID",data:"uhid",mSearch:true},
        {title: "OPD ID",data:"appointment_no",mSearch:true},
        {title: "Patient Name",data:"p_name",mSearch:true},
        {title: "location", data: "location", mSearch: true},
        {title: "Reg.Time",data:"appointment_datetime",mSearch:true},
        {title: "Gender",data:"p_gender",mSearch:true},
        {title: "Age",data:"age",mSearch:true},
        {title: "New/FollowUp",data:"appointment_type",mSearch:true},
        {title: "Status",data:"status",mSearch:true},
        {title: "reference",data:"reference",mSearch:true},
       
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9] }
                ,{
                    'targets':[1,2,3,4,5],
                    'createdCell':  function (td, cellData, rowData, row, col) {
                       id=rowData.id;
                       status=rowData.appointment_status;
                        if(status=='Inprocess' || status=='Completed'){
                        $(td).attr('class', 'view_patient'); 
                        $(td).attr('id',id); 
                        $(td).attr('style', 'white-space: nowrap;'); 
                      }
                  }
                }
                
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

    if(active_tab=='ipd_patient'){

        table.columns(8).visible(false);
        
    }
  }

  $(document).on('click','.view_patient',function(){
  
    id=$(this).attr('id');
    //alert(patient_id);
    window.open('<?=base_url()?>demographic-detail/'+id, '_blank');
 
 });


  $(document).on('click','.change_state',function () {
      appointment_id=$(this).attr('appointment_id');
      appointment_status=$(this).attr('appointment_status');

      
      if(appointment_status=='Pending' || appointment_status=='Waiting' ){

        $('.update_status').attr('appointment_id',appointment_id);
        $('#change_appointment_status_modal').modal('show');

      }
     
    });

  $(document).on('click','.update_status',function(){
        appointment_id=$(this).attr('appointment_id');
        appointment_status=$(this).attr('appointment_status');
        flag=true;
        if(appointment_status=='NO'){
          flag=false;
        }
        if(flag)
        {
          $.ajax({
            url:'<?=base_url()?>change-all-appointment-status',
            method:'post',
            data:{appointment_id:appointment_id},
            async: false,
            success:function (data) { 
                if(data['swall']['type']=='success'){
                  get_list();
                  //reset_report_approval();
                  $('#change_appointment_status_modal').modal('hide');
                  //$('#report_approval_modal').modal('hide');
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
