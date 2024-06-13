<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<style>
   .accordion{
           margin-bottom: 2%;
           
        }

        .accordion .card-header:after {
            font-family: 'FontAwesome';  
            content: "\f068";
            float: right;


        }

        .accordion .card-header.collapsed:after {
            /* symbol for "collapsed" panels */
            content: "\f067"; 
            background-color: '#dedede';
        }

        .accordion .card-header:after {
            font-family: 'FontAwesome';  
            content: "\f068";
            float: right; 
        }

        .table tbody tr:hover {
            background-color: #e0dede;
            cursor: pointer; 
        }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" id="user_form_page">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Service Provider</h3>
        <button class="btn btn-primary pull-right show-user-btn" onclick="show_user_list()"><i class="fa fa-plus"></i> Show List</button>
      </div>
      <div class="ibox-content">
        <form method="post"  enctype="multipart/form-data" id="record_form">
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div  class="card-header collapsed" data-toggle="collapse" href="#collapsetwo">
                        <a class="card-title">
                            Company Person Information
                        </a>
                    </div>
                    <div id="collapsetwo" class="card-body collapse show" data-parent="#accordion">
                       <div class="row" style="padding:5px;">
                  <label class="control-label select_slot col-lg-3">Company Name<a style="color: red">*</a></label>
                  <label class="control-label col-lg-3">First Name<a style="color: red">*</a></label>
                  <label class="control-label col-lg-3">Father Name<a style="color: red">*</a> </label>
                  <label class="control-label col-lg-3">Last Name<a style="color: red">*</a></label>

               </div>
               <div class="row" style="padding:5px;">
                <input class="form-control" type="hidden" id="user_id" name="user_id">
                <input class="form-control" type="hidden" name="user_type" value="External">    
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="company_name" name="company_name">
                    </div>  
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="first_name" name="first_name">
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="father_name" name="father_name">
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="last_name" name="last_name">
                    </div>   
                </div>
                
                <div class="row" style="padding:5px;">
                  <label class="control-label col-lg-3">Mobile Number<a style="color: red">*</a></label>
                  <label class="control-label col-lg-3">Alt. Mobile Number <a style="color: red">*</a></label>
                  <label class="control-label col-lg-3">Email Address<a style="color: red">*</a> </label>
                  <label class="control-label select_slot col-lg-3">Photo<a style="color: red">*</a></label>
               </div>
                <div class="row" style="padding:5px;">
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="mobile_number" name="mobile_number" minlength="10" maxlength="10">
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="alt_mobile_number" name="alt_mobile_number" minlength="10" maxlength="10">           
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="email" id="email" name="email">
                    </div>
                     <div class="col-lg-3">
                      <input class="form-control" type="file" id="photo" name="photo">
                    </div>
                    
                </div>
                </div>
                </div>
            </div>
          
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapsethree">
                        <a class="card-title">
                            Address Information
                        </a>
                    </div>
                                        <div id="collapsethree" class="card-body collapse show" data-parent="#accordion">
                      <div class="row" style="padding:5px;">
                        <label class="control-label col-lg-3">Permanant Address<a style="color: red">*</a></label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-12">
                              <input class="form-control" type="text" id="p_address" name="p_address" placeholder="Permanant Address" style="height:70px">
                          </div>
                      </div>
                      <div class="row" style="padding:5px;">
                        <label class="control-label col-lg-3">Permanant Area<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Permanant Taluka<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Permanant District<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Permanant State<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">Permanant Pincode<a style="color: red">*</a></label>
                      </div>
                       <div class="row" style="padding:5px;">
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="p_area" name="p_area" placeholder="Permanant Area">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="p_taluka" name="p_taluka" placeholder="Permanant Taluka">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="p_district" name="p_district" placeholder="Permanant District">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="p_state" name="p_state" placeholder="Permanant State">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="p_pincode" name="p_pincode" placeholder="Permanant Pincode" maxlength="6">
                              <div id="area_list" style="font-size:18px;display:none;">
                               
                              </div>
                          </div>
                      </div>
                      <div class="row" style="padding:10px;">
                        <label class="control-label col-lg-3">Current Address</label>
                        <input type="checkbox" id="same_address" name="same_address"  style="margin-bottom:5px"><label class="control-label col-lg-3"> Same as Permanant Address</label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-12">
                              <input class="form-control" type="text" id="c_address" name="c_address" placeholder="Current Address" style="height:70px">
                          </div>
                      </div>
                      <div class="row" style="padding:5px;">
                        <label class="control-label col-lg-3">Current Area </label>
                        <label class="control-label col-lg-2">Current Taluka<a style="color: red">*</a></label>
                        <label class="control-label col-lg-2">Current District</label>
                        <label class="control-label col-lg-2">Current State</label>
                        <label class="control-label col-lg-3">Current Pincode</label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="c_area" name="c_area" placeholder="Current Area">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="c_taluka" name="c_taluka" placeholder="Current Area">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="c_district" name="c_district" placeholder="Current District">
                          </div>
                          <div class="col-lg-2">
                              <input class="form-control" type="text" id="c_state" name="c_state" placeholder="Current State">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="c_pincode" name="c_pincode" placeholder="Current Pincode">
                          </div>
                      </div>
                      
                      
                    </div>

                </div>
            </div>
            
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapsefive">
                        <a class="card-title">
                            Bank Details
                        </a>
                    </div>
                    <div id="collapsefive" class="card-body collapse" data-parent="#accordion">
                      <div class="row" style="padding:5px;">
                        <label class="control-label select_slot col-lg-3">Bank Name<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">Account Number<a style="color: red">*</a></label>
                        <label class="control-label col-lg-3">IFSC Code<a style="color: red">*</a> </label>
                        <label class="control-label col-lg-3">Bank Branch<a style="color: red">*</a> </label>
                      </div>
                      <div class="row" style="padding:5px;">
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="bank_name" name="bank_name">
                          </div>
                         
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="bank_account_no" name="bank_account_no">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" id="ifsc_code" name="ifsc_code">
                          </div>
                           <div class="col-lg-3">
                              <input class="form-control" type="text" id="branch_name" name="branch_name">
                          </div>
                      </div>
                    </div>
                </div>
            </div>
          
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary pull-right submit_user_add_model" >Submit</button>
              <button type="button" class="btn btn-default pull-left">Close</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12" id="user_list_page">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Service Provider List</h3>
          <button class="btn btn-primary pull-right add-user-btn" onclick="show_user_form()"><i class="fa fa-plus"></i> Add Service Provider  </button>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Company Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Mobile Number</th>
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

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#service_provider_tab').addClass('active');
  
  get_list();
  $('#user_form_page').hide();
  role_designation_all();
  department_all();
  specialization_all();
    $('#Specialization').selectpicker();
  function show_user_form(){
    $('#user_list_page').hide();
    $('#user_form_page').show()
  }

  function show_user_list(){
    $('#user_form_page').hide();
    $('#user_list_page').show();
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
        'url':'<?=base_url()?>service-provider-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Company Name",data:"company_name",mSearch:true},
        {title: "Person Name",data:"name",mSearch:false},
        {title: "Mobile Number",data:"mobile_number",mSearch:false},
        {title: "Email Address",data:"user_email",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
        {title: "Status",data:"user_status",mSearch:false},


         
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3] },
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

  function department_all() {

        $.ajax({
          url:'<?=base_url()?>department-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){
               var html2="<option value='' selected disable>Select Department</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html2+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#department").html(html2);
            }else{
              location.reload();
            }
          }
        })
    
  }

  function specialization_all(){
    $.ajax({
          url:'<?=base_url()?>specialization-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){
               var html2="<option value='' selected disable>Select specialization</option>";
              for (var i = 0; i <data['record'].length; i++){    
                  html2+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";
              }
              $("#Specialization").html(html2);
              $('#Specialization').selectpicker('refresh');
            }else{
              location.reload();
            }
          }
        })

  }

  function role_designation_all() {

        $.ajax({
          url:'<?=base_url()?>department-role-designation-all',
          method:'post',
          async: false,
          dataType: 'json',
          success:function (data) { 
            if(typeof(data)=='object'){

              
              var html="<option value='' selected='' disable=''>Select Role</option>";
              for (var i = 0; i <data['role'].length; i++){    
                  html+="<option value='"+data['role'][i]["id"]+"'>"+data['role'][i]["name"]+"</option>";  
              }
              $("#role").html(html);

              var html1="<option value='' selected disable>Select Designation</option>";
              for (var i = 0; i <data['designation'].length; i++){    
                  html1+="<option value='"+data['designation'][i]["id"]+"'>"+data['designation'][i]["name"]+"</option>";
              }
              $("#designation").html(html1); 

               
            
            }else{
              location.reload();
            }
          }
        })
    
  }

  $('#department').change(function(){
        var d_id=$(this).val();
        $.ajax({
            url:"<?php echo base_url();?>sub-department-by-dept",
            method:'post',
            async: false,
            dataType: 'json',
            data:{d_id:d_id},
            success:function(data)
            {   

                  console.log(data);
                  $('#sub_department').html('');
                  html='';
                  html='<option value="" selected="" disabled=""> Select Sub Department</option>';
                  for (var i=0;i<data['record'].length;i++)
                  { 
                      html+='<option value="'+data['record'][i]['id']+'">'+data['record'][i]['name']+'</option>'; 
                  } 
                  $('#sub_department').html(html); 

                 

                    
            },
        });  

   })

  $('#same_address').on('change', function(){
        if($(this).prop('checked')){
        
        //empty_disable_enable('#c_address','0');
        //empty_disable_enable('#c_area','0');
        //empty_disable_enable('#c_taluka','0');
        //empty_disable_enable('#c_district','0');
        //empty_disable_enable('#c_state','0');
        //empty_disable_enable('#c_pincode','0');

        var c_address=$('#p_address').val();
        $('#c_address').val(c_address);
        var c_area=$('#p_area').val();
        $('#c_area').val(c_area);
        var c_taluka=$('#p_taluka').val();
        $('#c_taluka').val(c_taluka);
        var c_dist=$('#p_district').val();
        $('#c_district').val(c_dist);
        var c_state=$('#p_state').val();
        $('#c_state').val(c_state);
        var c_pincode=$('#p_pincode').val();
        $('#c_pincode').val(c_pincode);

        
        } else {
            empty_disable_enable('#c_address','1');
            empty_disable_enable('#c_area','1');
            empty_disable_enable('#c_taluka','1');
            empty_disable_enable('#c_district','1');
            empty_disable_enable('#c_state','1');
            empty_disable_enable('#c_pincode','1');
        }
    });

  function reset_form(){
    //$('.record_form_title').html('Add Sub-Department');
 
   
    $('#first_name').val('');
    $('#father_name').val('');
    $('#last_name').val('');
    $('#company_name').val('');
    $('#mobile_number').val('');
    $('#alt_mobile_number').val('');
    $('#email').val('');
    $('#c_state').val('');
    $('#c_district').val('');
    $('#c_area').val('');
    $('#c_pincode').val('');
    $('#c_address').val('');
    $('#p_state').val('');
    $('#p_district').val('');
    $('#p_area').val('');
    $('#p_pincode').val('');
    $('#p_address').val('');
    $('#bank_name').val('');
    $('#bank_account_no').val('');
    $('#ifsc_code').val('');
    $('#branch_name').val('');
    
    //empty_disable_enable('#d_name','1');
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
        url:'<?=base_url()?>service-provider-action',
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
    user_id=$(this).attr('user_id');
    if (user_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>service-provider-delete',
          method:'post',
          data:{user_id:user_id},
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
    show_user_form();
    user_id=$(this).attr('user_id');
    //alert(user_id);
    
    if (user_id) {
      $.ajax({
        url:'<?=base_url()?>service-provider-by-id',
        method:'post',
        data:{user_id:user_id},
        async: false,
        dataType:'json',
        success:function (data) {

         console.log(data);

          
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit User');
            
            $('#user_id').val(user_id);
            
            $('#company_name').val(data['record'][0]['company_name']);
            $('#first_name').val(data['record'][0]['name']);
            $('#father_name').val(data['record'][0]['middle_name']);
            $('#last_name').val(data['record'][0]['last_name']);

            $('#mobile_number').val(data['record'][0]['mobile_number']);
            $('#alt_mobile_number').val(data['record'][0]['alt_mobile_number']);            
            $('#email').val(data['record'][0]['email']);
            $('#photo').val(data['record'][0]['photo']);
            
            
            $('#p_address').val(data['record'][0]['p_address']);
            $('#p_area').val(data['record'][0]['p_area']);
            $('#p_taluka').val(data['record'][0]['p_taluka']);
            $('#p_district').val(data['record'][0]['p_dist']);
            $('#p_state').val(data['record'][0]['p_state']);
            $('#p_pincode').val(data['record'][0]['p_pincode']);

            $('#c_address').val(data['record'][0]['c_address']);
            $('#c_area').val(data['record'][0]['c_area']);
            $('#c_taluka').val(data['record'][0]['c_taluka']);
            $('#c_district').val(data['record'][0]['c_dist']);
            $('#c_state').val(data['record'][0]['c_state']);
            $('#c_pincode').val(data['record'][0]['c_pincode']);


            $('#bank_name').val(data['record'][0]['bank_name']);
            $('#bank_account_no').val(data['record'][0]['account_number']);
            $('#ifsc_code').val(data['record'][0]['ifsc_code']);
            $('#branch_name').val(data['record'][0]['branch_name']);

           


            
           // empty_disable_enable('#d_name','0');
            //$('#d_name').val(data['record']['d_id']);
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


  $(document).on('click','.change_status',function () {
   
    user_id=$(this).attr('user_id');
    user_status=$(this).val();
    if (user_id) {
      if (confirm('Are Your Sure Want To chage This User status ?')==true) {
        if(user_status=='Inactive')
          $(this).val('Active');
        else
          $(this).val('Inactive');
        $.ajax({
          url:'<?=base_url()?>change-service-provider-status',
          method:'post',
          data:{user_id:user_id,user_status:user_status},
          async: false,
          success:function (data) { 
            if(data){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
            }
          }
        })
      }
      else
      {
        if(syllabus_status=='0')
          $(this).prop("checked", false);
        if(syllabus_status=='1')
          $(this).prop("checked", true);
      }
    }
  });

  $('#p_pincode').on('input', function(){
        var pincode = $(this).val();
        if(pincode.length >= 6){ 
            console.log(pincode);
            $.ajax({
                url:'<?=base_url()?>get-pincode',
                method:'post',
                data:{pincode:pincode},
                async: false,
                success: function(data){
                    if(data.status=='Success'){

                        console.log(data.list);
                         $('#area_list').show();
                        html="";
                         for (var i=0;i<data.list.length;i++){
                           html += '<div class="add_address" style="border: 0.5px solid #9f9e9e; padding-left: 10px;" area="' + data.list[i]['Name'] + '" taluka="' + data.list[i]['Taluk'] + '" dist="' + data.list[i]['District'] + '" state="' + data.list[i]['State'] + '">' + data.list[i]['Name'] + '</div>';
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
            $('#searchResults').empty();
        }
    });

  $(document).on('click','.add_address',function () {
    area=$(this).attr('area');
    taluka=$(this).attr('taluka');
    dist=$(this).attr('dist');
    state=$(this).attr('state');
    $('#area_list').hide();


    $('#p_area').val(area);
    $('#p_taluka').val(taluka);
    $('#p_district').val(dist);
    $('#p_state').val(state);
})

</script>
