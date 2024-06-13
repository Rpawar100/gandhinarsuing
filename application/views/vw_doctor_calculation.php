<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="">Doctor Calculation</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <div class="col-lg-11 row">
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
              <label class="form-control col-lg-1" style="border:0px;">Section<a style="color: red">*</a></label>
              <div class="col-lg-2">
                  <select class="form-control" type="text" name="section_id" id="section_id" required=""> 
                    <option selected="" disabled="">Select Section</option>
                    <option value="0">All Department</option>
                    <option value="1">OPD</option>
                    <option value="2">IPD</option>
                    <option value="3">Diagnostics</option>
                    <option value="4">Pharmaceutical</option>
                  </select>
              </div>
            </div>
            <div class="col-lg-1">
              <button type="button" class="btn btn-primary" id="search"><i class="fa fa-search" ></i></button>
            </div>
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
            <thead>
              <th nowrap="nowrap" >Sr.No.</th>
              <th nowrap="nowrap" >Date Time</th>
              <th nowrap="nowrap" >Appointment No.</th>
              <th nowrap="nowrap" >Patient Name</th>
              <th nowrap="nowrap" >Category</th>
              <th nowrap="nowrap" >Company</th>
              <th nowrap="nowrap" >Hospital Amount</th>
              <th nowrap="nowrap" >Share's Amount</th>
              <th nowrap="nowrap" >Action</th>
              
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>27-03-2024 04:14 PM</td>
                <td>OP-41101</td>
                <td>Ramdas Patil</td>
                <td>General</td>
                <td>Self Pay </td>
                <td>500</td>
                <td>50</td>
                <td><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>2</td>
                <td>28-03-2024 02:15 PM</td>
                <td>OP-41102</td>
                <td>Mukesh Kadam</td>
                <td>General</td>
                <td>Self Pay </td>
                <td>200</td>
                <td>25</td>
                <td><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
              <tr>
                <td>3</td>
                <td>28-03-2024 03:14 PM</td>
                <td>OP-41103</td>
                <td>Rakesh Jadhav</td>
                <td>General</td>
                <td>Self Pay </td>
                <td>700</td>
                <td>100</td>
                <td><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
               <tr>
                <td>4</td>
                <td>29-03-2024 01:14 PM</td>
                <td>OP-41104</td>
                <td>Anikest Mohite</td>
                <td>General</td>
                <td>Self Pay </td>
                <td>500</td>
                <td>20</td>
                <td><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
               <tr>
                <td>5</td>
                <td>28-03-2024 03:14 PM</td>
                <td>OP-41105</td>
                <td>Hanumant Shinde</td>
                <td>General</td>
                <td>Self Pay </td>
                <td>180</td>
                <td>18</td>
                <td><i class="fa fa-edit edit_record"  style="color:royalblue;font-size:20px;margin: 0px 10px;"></i><i class="fa fa-trash delete_record"  style="color:red;font-size:20px;margin: 0px 10px;"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#doctor_calculation_tab').addClass('active');
  
  //get_list();
  CMA_doctor_list();

 
  var doctor_id='';
  var start_date=''; 
  var end_date='';
  var section='';  
  
  $('#search').click(function(){

      doctor_id=$('#doctor_id').val();
      start_date=$('#start_date').val();
      end_date=$('#end_date').val();
      section=$('#section_id').val();
      get_list();
      
      
    })

  
  
  /*
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
        'url':'<?=base_url()?>CMA-list',
        'data':{doctor_id:doctor_id,start_date:start_date,end_date:end_date,section:section},
       
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Date Time",data:"appointment_timestamp",mSearch:false},
        {title: "Appointment No.",data:"appointment_no",mSearch:false},
        {title: "Patient Name",data:"patient_name",mSearch:false},
        {title: "Category",data:"category",mSearch:false},
        {title: "Company",data:"company",mSearch:false},
        {title: "Hospital Amount ",data:"appointment_amount",mSearch:false},
        {title: "Share's Amount",data:"commission",mSearch:false},
       
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
  */



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
  


  

  /*
  $('#record_form').on('submit',function(event){


    alert('safdsa');

    
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>user-action',
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

              $('#user_id').val(data['user_id']);
              var uid=$('#user_id').val();
              console.log(uid);
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

  */


 


</script>
