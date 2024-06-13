<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="">OPD Payment Report</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            
            <label class="form-control col-lg-1" style="border:0px;"> Select Doctor<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <select class="form-control" type="text" name="doctor_id" id="doctor_id" required=""> 
                  <option selected="" disabled="">Select Doctor</option>
                </select>
            </div>
            <label class="form-control col-lg-1" style="border:0px;">Start Date<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <input class="form-control" type="date" name="start_date" id="start_date" required="" >
            </div>
            <label class="form-control col-lg-1" style="border:0px;">End Date<a style="color: red">*</a></label>
            <div class="col-lg-2">
                <input class="form-control" type="date" name="end_date" id="end_date" required="" >
            </div>
            
         
            <button type="button" class="btn btn-primary" id="search"><i class="fa fa-search" ></i></button>
            
          </div>
          

        </form>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Doctor Calculation List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                
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
  $('#opd_report').addClass('active');
  
  get_list();
  CMA_doctor_list();

 
  var doctor_id='';
  var start_date=''; 
  var end_date='';
  
  $('#search').click(function(){

      doctor_id=$('#doctor_id').val();
      start_date=$('#start_date').val();
      end_date=$('#end_date').val();
      section=$('#section_id').val();
      get_list();
      
      
    })

  
  

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
        'url':'<?=base_url()?>opd-payment-calc-list',
        'data':{doctor_id:doctor_id,start_date:start_date,end_date:end_date},
       
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "UHID",data:"uhid",mSearch:false},
        {title: "Visit No.",data:"appointment_no",mSearch:false},
        {title: "Visit Date",data:"visit_date",mSearch:false},
        {title: "Patient Name",data:"patient_name",mSearch:false},
        {title: "Mobile No.",data:"mobile_number",mSearch:false},
        {title: "Gender",data:"gender",mSearch:false},
        {title: "Age",data:"age",mSearch:false},
        {title: "Consulting Doctor",data:"doctor_name",mSearch:false},
        {title: "Department",data:"d_name",mSearch:false},
        {title: "Patient Category",data:"category",mSearch:false},
        {title: "Visit Type",data:"type",mSearch:false},
        {title: "New/Followup",data:"new_f",mSearch:false},
        {title: "User Name",data:"user_name",mSearch:false},
        {title: "Referral Name",data:"referral_name",mSearch:false},
        {title: "Amount",data:"commission",mSearch:false},
        {title: "Narration",data:"narration",mSearch:false},
        {title: "Receipt No",data:"receipt_no",mSearch:false},
       
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17] },
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



  function CMA_doctor_list() {
    $.ajax({
      url:'<?=base_url()?>CMA-doctor-list',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Doctor</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#doctor_id").html(html);
        }else{
          location.reload();
        }
      }
    })
  }
  


  

  

 


</script>
