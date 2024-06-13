<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12 patient-add-div" style="display: none;">
      <div class="ibox-title"  style="padding-top: 10px !important;padding-right: 20px;">
        <h3 class="record_form_title">Add Patient Info</h3>
        <button class="btn btn-primary patient-list-btn" style="margin-top: -35px;float: right;">Patient List</button>
      </div>
      <div class="ibox-content">
          <form method="post"  enctype="multipart/form-data" id="record_form">
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" >
              <div class="row" style="margin:0px;" >
                <label class="form-control col-lg-2" style="border:0px;">Prefix <a style="color: red">*</a></label>
                <label class="form-control col-lg-2" style="border:0px;">First Name<a style="color: red">*</a></label>
                <label class="form-control col-lg-2" style="border:0px;">Middle Name</label>
                <label class="form-control col-lg-2" style="border:0px;">Last Name<a style="color: red">*</a></label>
                <label class="form-control col-lg-2" style="border:0px;">Mother's Name</label>
                <label class="form-control col-lg-2" style="border:0px;">Father's Name</label>
              </div>
              <div class="row" style="margin: 0px;margin-top: 5px;">
                <div class="col-lg-2">
                  <select class="form-control" name="prefix" id="prefix" required="">
                    <option value="" selected="" disabled="">Select Prefix</option>
                    <option value="Mr." >Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss.">Miss.</option>
                    <option value="Mast.">Mast.</option>
                    <option value="Dr.">Dr. </option>
                  </select>
                </div>
               <div class="col-lg-2">
                  <input class="form-control" type="hidden" name="patient_id" id="patient_id" >
                  <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" required="" oninput="this.value = this.value.toUpperCase()">
               </div>
               <div class="col-lg-2">
                  <input class="form-control" type="text" name="middle_name" id="middle_name" placeholder="Middle Name" oninput="this.value = this.value.toUpperCase()">
               </div>
               <div class="col-lg-2">
                  <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" required="" oninput="this.value = this.value.toUpperCase()">
               </div>  
                
               <div class="col-lg-2">
                  <input class="form-control" type="text" name="mother_name" id="mother_name" placeholder="Mother's Name" oninput="this.value = this.value.toUpperCase()">
               </div>
               <div class="col-lg-2">
                  <input class="form-control" type="text" name="father_name" id="father_name" placeholder="Father's Name" oninput="this.value = this.value.toUpperCase()">
               </div>
              </div>
              <div class="row" style="margin:0px;margin-top: 30px;" >
                <label class="form-control col-lg-2" style="border:0px;">Birth date<a style="color: red">*</a></label>
                <label class="form-control col-lg-2" style="border:0px;">Age<a style="color: red">*</a></label>
                <label class="form-control col-lg-2" style="border:0px;">Gender<a style="color: red">*</a></label>
                <label class="form-control col-lg-2" style="border:0px;">Marital Status</label>
                <label class="form-control col-lg-2" style="border:0px;">Identity Type</label>
                <label class="form-control col-lg-2" style="border:0px;">Identity Number</label>
              </div>
              <div class="row" style="margin:0px;margin-top: 5px;" >
                <div class="col-lg-2">
                   <input class="form-control" type="date" name="birth_date" id="birth_date" oninput="calculateAge()" required="">
                </div>
                <div class="col-lg-2">
                  <div class="form-row">
                      <div class="col">
                          <input type="text" class="form-control" id="outputyear" name="outputyear" placeholder="Year">
                      </div>
                      <div class="col">
                          <input type="text" class="form-control" id="outputmonth" name="outputmonth" placeholder="Month">
                      </div>
                      <div class="col">
                          <input type="text" class="form-control" id="outputday" name="outputday" placeholder="Day">
                      </div>
                  </div>
                </div>
                <div class="col-lg-2">
                  <select class="form-control" name="gender" id="gender" required="">
                    <option value="" selected="" disabled="">Select Gender</option>
                    <option value="Male" >Male</option>
                    <option value="Female">Female</option>
                    <option value="Transgender">Transgender</option>
                    <option value="Not-Specify">Not Specify</option>
                  </select>
                </div>
                <div class="col-lg-2">
                  <select class="form-control" name="marital_status" id="marital_status">
                    <option value="" selected="" disabled="">Select Marital Status</option>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widow">Widow</option>
                    <option value="Widower">Widower</option>

                  </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control" name="identity_type" id="identity_type">
                    <option value="" selected="" disabled="">Select Document Type</option>
                    <option value="Aadhaar Card">Aadhar Card</option>
                    <option value="Pan Card">Pan Card</option>
                    <option value="Voter Id">Voter Id</option>
                    <option value="Passport">Passport</option>
                    <option value="Ration Card">Ration Card</option>
                    <option value="Driving Licence">Driving Licence</option>
                  </select>
                </div>
                <div class="col-lg-2">
                    <input class="form-control" type="text" name="identity_number" id="identity_number" placeholder="Identity Number">
                </div>
              </div>
              <div class="row" style="margin:0px;margin-top: 30px;">
                <label class="form-control col-lg-2" style="border:0px;">Mobile Number<a style="color: red">*</a></label>
                <label class="form-control col-lg-2" style="border:0px;">Alt. Mobile Number</label>
                <label class="form-control col-lg-2" style="border:0px;">Email Id</label>
                <label class="form-control col-lg-2" style="border:0px;">Occupation</label>
              </div>
              <div class="row" style="margin:0px;margin-top: 5px;">
               <div class="col-lg-2">
                  <input class="form-control" type="text" name="mobile_number" id="mobile_number" placeholder="Mobile Number" minlength="10" maxlength="10" required="">
               </div>
               <div class="col-lg-2">
                  <input class="form-control" type="text" name="alt_mobile_number" id="alt_mobile_number" placeholder="Alt Mobile No" minlength="10" maxlength="10">
               </div>
               <div class="col-lg-2">
                  <input class="form-control" type="text" name="email" id="email" placeholder="Email Address" oninput="this.value = this.value.toUpperCase()">
               </div>
               <div class="col-lg-2">
                  <select class="form-control"  name="occupation" id="occupation"></select>
               </div>
              </div>
              <div class="row" style="margin:0px;margin-top: 5px;">
                <label class="form-control col-lg-10" style="border:0px;">Full Address<a style="color: red">*</a></label>
                
              </div>
              <div class="row" style="margin:0px;margin-top: 5px;">
                <div class="col-lg-10">
                  <input class="form-control" type="text" id="per_address" name="per_address" required="" oninput="this.value = this.value.toUpperCase()">
                </div>
                <button class="btn btn-danger col-lg-2" type="reset">Reset All Details</button>
              </div>
              <div class="row" style="margin:0px;margin-top: 5px;">
                <div class="col-lg-2">
                    <input class="form-control" type="text" id="pincode" name="pincode" placeholder="Pincode" maxlength="6" minlength="6" required="">
                    <div id="area_list" style="font-size:18px;display:none;font-size: 18px;position: absolute;z-index: 1;background: white;bottom: 40px;">
                    </div>
                </div>
                <div class="col-lg-2">
                    <input class="form-control" type="text" id="area" name="area" placeholder="Area" required="" oninput="this.value = this.value.toUpperCase()">
                </div>
                <div class="col-lg-2">
                    <input class="form-control" type="text" id="taluka" name="taluka" placeholder="Taluka" required="" oninput="this.value = this.value.toUpperCase()">
                </div>
                <div class="col-lg-2">
                    <input class="form-control" type="text" id="district" name="district" placeholder="District" required="" oninput="this.value = this.value.toUpperCase()">
                </div>
                <div class="col-lg-2">
                    <input class="form-control" type="text" id="state" name="state" placeholder="State" required="" oninput="this.value = this.value.toUpperCase()">
                </div>
                <button class="btn btn-primary col-lg-2 patient_details_submit_btn" type="submit">Add New Patient</button>
              </div>
            </div>
          </form>
      </div>
    </div>
    <div class="col-lg-12 patient-list-div">
      <div class="ibox-title"  style="padding-top: 10px !important;padding-right: 20px;">
        <h3>Patient List</h3>
        <button class="btn btn-primary add-patient-btn" style="margin-top: -35px;float: right;">Add Patient</button>
      </div>
      <div class="ibox-content">
        <div class="table-responsive " >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Reg. Date</th>
                <th nowrap="nowrap" style="width: fit-content !important;">UHID</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Mother Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;">DOB</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Age</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Gender</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Marital Status</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Occupation</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Doc Type</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Doc. No.</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Mobile No.</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Alt. Mobile No.</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Email</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Address</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Area</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Taluka</th>
                <th nowrap="nowrap" style="width: fit-content !important;">District</th>
                <th nowrap="nowrap" style="width: fit-content !important;">State</th>
                <th nowrap="nowrap" style="width: fit-content !important;">Pincode</th>
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
  $('#patient_tab').addClass('active');
  get_list();
  occupation_all();
  reset_form();

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
        'url':'<?=base_url()?>patient-list',
      },
      'columns': [
        {title: "Id",data:"id",mSearch:false},
        {title: "Reg. Date",data:"reg_date",mSearch:true},
        {title: "UHID",data:"grn",mSearch:true},
        {title: "Name",data:"name",mSearch:true},
        {title: "Mother Name",data:"mother_name",mSearch:true},
        {title: "DOB",data:"dob",mSearch:true},
        {title: "Age",data:"age",mSearch:true},
        {title: "Gender",data:"gender",mSearch:true},
        {title: "Marital Status",data:"marital_status",mSearch:true},
        {title: "Occupation",data:"occupation_name",mSearch:true},
        {title: "Doc. Type",data:"identity_type",mSearch:true},
        {title: "DOc. No.",data:"identity_number",mSearch:true},
        {title: "Mobile No.",data:"mobile_number",mSearch:true},
        {title: "Alt. Mobile No.",data:"alt_mobile_number",mSearch:true},
        {title: "Email",data:"email",mSearch:true},
        {title: "Address",data:"address",mSearch:true},
        {title: "Area",data:"area",mSearch:true},
        {title: "Taluka",data:"taluka",mSearch:true},
        {title: "District",data:"district",mSearch:true},
        {title: "State",data:"state",mSearch:true},
        {title: "Pincode",data:"pincode",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21] },
                {
                        'targets':[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21],
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

  $('.patient-list-btn').on('click',function(event){
    $('.patient-add-div').hide();
    $('.patient-list-div').show();
  });

  $('.add-patient-btn').on('click',function(event){
    reset_form();
    $('.patient-add-div').show();
    $('.patient-list-div').hide();
  });

   $('#outputyear,#outputmonth, #outputday').on('input', function () {
        updateDateInput();
    });

    $('#prefix').change(function(){

      var prefix=$(this).val();
      if(prefix=='Mr.' || prefix=='Mast.'){
        $('#gender').val('Male');
      }else if(prefix=='Mrs.' ||prefix=='Miss.'){
         $('#gender').val('Female');
      }else{
        $('#gender').val('');
      }

    })

   function updateDateInput() {
      var year='0';
      var month='1';
      var day='1';
      if ($('#outputyear').val()){
        year=$('#outputyear').val();
      }
      if ($('#outputmonth').val()){
        month=$('#outputmonth').val();
      }
      if ($('#outputday').val()){
        day=$('#outputday').val();
      }
        
        if (year && month && day) {
            var currentYear = new Date().getFullYear();
            var birthYear = currentYear - parseInt(year, 10);
            var dateString = birthYear + '-' + month.padStart(2, '0') + '-' + day.padStart(2, '0');
            $('#birth_date').val(dateString);
        }
    }


  function occupation_all() {
    $.ajax({
      url:'<?=base_url()?>occupation-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html='<option value="" selected disable>Select Occupation</option>';
          for (var i = 0; i <data['record'].length; i++){    
              html+='<option value="'+data['record'][i]["id"]+'">'+data['record'][i]["name"]+'</option>';  
          }
          $("#occupation").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  function reset_form(){
    $('.record_form_title').html('Add Patient Info');
    $('.patient_details_submit_btn').html('Add New Patient');
    $('#patient_id').val('');
    $('#prefix').val('');
    $('#first_name').val('');
    $('#middle_name').val('');
    $('#last_name').val('');
    $('#mother_name').val('');
    $('#father_name').val('');
    $('#birth_date').val('');
    $('#outputyear').val('');
    $('#outputmonth').val('');
    $('#outputday').val('');
    $('#gender').val('');
    $('#marital_status').val('');
    $('#identity_type').val('');
    $('#identity_number').val('');
    $('#mobile_number').val('');
    $('#alt_mobile_number').val('');
    $('#email').val('');
    $('#occupation').val('');
    $('#per_address').val('');
    $('#area').val('');
    $('#taluka').val('');
    $('#district').val('');
    $('#state').val('');
    $('#pincode').val('');
  }
  
  $('#pincode').on('input', function(){
        var pincode = $(this).val();
        if(pincode.length == 6){ 
            console.log(pincode);
            $.ajax({
                url:'<?=base_url()?>get-pincode',
                method:'post',
                data:{pincode:pincode},
                async: false,
                success: function(data){
                    if(data.status=='Success'){
                         $('#area_list').show();
                        html="";
                         for (var i=0;i<data.list.length;i++){
                           html += '<div class="add_address" style="border: 0.5px solid lightgray; padding: 0px 20px;" area="' + data.list[i]['Name'] + '" taluka="' + data.list[i]['Taluk'] + '" dist="' + data.list[i]['District'] + '" state="' + data.list[i]['State'] + '">' + data.list[i]['Name'] + '</div>';
                         }
                        $('#area_list').html(html);
                         
                    }else{
                       swal({
                            html:true,
                            title:data['swall']['title'],
                            text:data['swall']['text'],
                            type:data['swall']['type']
                        }); 
                    }
                }
            });
        } else {
            $('#area_list').html('');
        }
  });

  $('#record_form').on('reset',function(event){
    reset_form();
  });

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>patient-action',
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
              $('.patient-add-div').hide();
              $('.patient-list-div').show();
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
    p_id=$(this).attr('p_id');
    if (p_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>patient-delete',
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

  $(document).on('click','.edit_record',function () {
    p_id=$(this).attr('p_id');
    if (p_id) {
      $.ajax({
        url:'<?=base_url()?>patient-by-id',
        method:'post',
        data:{p_id:p_id},
        async: false,
        success:function (data) {
          console.log(data);
          if(typeof(data)=='object'){
            reset_form();
            $('.record_form_title').html('Edit Patient Info');
            $('#prefix').val(data['record']['name_prefix']);
            $('#first_name').val(data['record']['first_name']);
            $('#middle_name').val(data['record']['middle_name']);
            $('#last_name').val(data['record']['last_name']);
            $('#mother_name').val(data['record']['mother_name']);
            $('#father_name').val(data['record']['father_name']);
            $('#birth_date').val(data['record']['dob']);
            $('#outputyear').val(data['record']['outputyear']);
            $('#outputmonth').val(data['record']['outputmonth']);
            $('#outputday').val(data['record']['outputday']);
            $('#gender').val(data['record']['gender']);
            $('#marital_status').val(data['record']['marital_status']);
            $('#identity_type').val(data['record']['identity_type']);
            $('#identity_number').val(data['record']['identity_number']);
            $('#mobile_number').val(data['record']['mobile_number']);
            $('#alt_mobile_number').val(data['record']['alt_mobile_number']);
            $('#email').val(data['record']['email']);
            $('#occupation').val(data['record']['occupation_id']);
            $('#per_address').val(data['record']['address']);
            $('#area').val(data['record']['area']);
            $('#taluka').val(data['record']['taluka']);
            $('#district').val(data['record']['district']);
            $('#state').val(data['record']['state']);
            $('#pincode').val(data['record']['pincode']);
            $('#patient_id').val(p_id);
            $('.patient-add-div').show();
            $('.patient-list-div').hide();
            $('.patient_details_submit_btn').html('Update Patient Details');
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

  $(document).on('click','.add_address',function () {
    area=$(this).attr('area');
    taluka=$(this).attr('taluka');
    dist=$(this).attr('dist');
    state=$(this).attr('state');
    $('#area_list').hide();
    $('#area').val(area.toUpperCase());
    $('#taluka').val(taluka.toUpperCase());
    $('#district').val(dist.toUpperCase());
    $('#state').val(state.toUpperCase());
  })

  function calculateAge() {

    var startDate = new Date(document.getElementById('birth_date').value);
    var endDate = new Date();
    var timeDifference = endDate - startDate;

    var daysDifference = timeDifference / (1000 * 60 * 60 * 24);

    var yearsDifference = Math.floor(daysDifference / 365);

    var remainingDays = daysDifference % 365;

    var monthsDifference = Math.floor(remainingDays / 30);

    var remainingDaysInMonth = remainingDays % 30;

    $('#outputyear').val(yearsDifference);
    $('#outputmonth').val(monthsDifference);
    $('#outputday').val(monthsDifference);
  }

  

</script>
