<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add License</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
		  <div class="row"  style="margin-top: 5px;">
            <div class="col-lg-3">
			  <div class="form-group">
				<label for="license-name" class="col-form-label">License Name</label>
				<input class="form-control" type="text" name="l_name" id="l_name"  placeholder="Enter License Name" maxlength="200" required="" >
                <input class="form-control" type="hidden" name="l_id" id="l_id">
			  </div>
			</div>
			<div class="col-lg-3">
			  <div class="form-group">
				<label for="license-number" class="col-form-label">License Number</label>
				<input class="form-control" type="text" name="l_number" id="l_number" maxlength="100" required="" placeholder="Enter License No." >
			  </div>
			</div>
			<div class="col-lg-3">
			  <div class="form-group">
				<label for="license-remark" class="col-form-label">License Remark</label>
				<input class="form-control" type="text" name="l_remark" id="l_remark" maxlength="100" required="" placeholder="Enter Remark" >
			  </div>
			</div>
			<div class="col-lg-3">
			  <div class="form-group">
				<label for="license-issue-by" class="col-form-label">License Issue By</label>
				<input class="form-control" type="text" name="l_issue_by" id="l_issue_by" maxlength="100" required="" placeholder="Enter Issue By" >
			  </div>
			</div>
		  </div>
		  
		  <div class="row"  style="margin-top: 5px;">
			<div class="col-lg-3">
			  <div class="form-group">
				<label for="license-process-document" class="col-form-label">License Process Doc</label>
				<input class="form-control" type="file" name="l_process_doc_url" id="l_process_doc_url" accept="application/pdf" required="" >
			  </div>
			</div>

			<div class="col-lg-3">			  
			  <div class="form-group">
				<button type="reset" class=" col-lg-2 btn btn-danger" >Reset</button>&nbsp;
				<button type="submit" class=" col-lg-2 btn btn-primary" >Submit</button>
			  </div>
			</div>
		  </div>
          <div class="row" style="margin-top: 5px;">
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">License Name</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">License Number</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">License Issue By</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">License Remark</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Inserted By</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Updated By</th>
                <th nowrap="nowrap" style="width: fit-content !important;padding: 0px;">Updated Timestamp</th>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<form method="post" enctype="multipart/form-data" id="modal_form" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add License Validity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="issue-date" class="col-form-label">Issue Date</label>
            <input type="date" class="form-control" id="ld_issue_date" name="ld_issue_date" required="">
			<input class="form-control" type="hidden" name="ld_l_id" id="ld_l_id" >
          </div>
          <div class="form-group"> 
            <label for="valid-date" class="col-form-label">Valid Date</label>
            <input type="date" class="form-control" id="ld_valid_date" name="ld_valid_date" required="">
          </div>
		  <div class="form-group">
			<label for="license-certificate" class="col-form-label">License Certificate</label>
			<input type="file" class="form-control" id="ld_license_url" name="ld_license_url" accept="application/pdf" required="" >
		  </div> 	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<!-- Modal For Show Hstory-->
<div class="modal fade" id="license_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">License Validity History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="license_details_body">
          	
      </div>
	  
    </div>
  </div>
</div>

<!-- Modal For Add Required Documents -->
<div class="modal fade" id="required_documents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	  <form method="post" enctype="multipart/form-data" id="req_doc_form" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add License Required Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="row">
		<div class="col-lg-4">
          <div class="form-group"> 
            <label for="document-name" class="col-form-label">Document Name</label>
            <input type="text" class="form-control" id="lrd_name" name="lrd_name" required="">
			<input class="form-control" type="hidden" name="lrd_id" id="lrd_id"> 
			<input class="form-control" type="hidden" name="lrd_l_id" id="lrd_l_id"> 
          </div>
		</div> 
		<div class="col-lg-6">
		  <div class="form-group">
			<label for="upload-document" class="col-form-label">Document</label>
			<input type="file" class="form-control" id="lrd_doc_url" name="lrd_doc_url" accept="application/pdf" required="" >
		  </div>
		</div> 
		<div class="col-lg-2">
		  <div class="form-group">
			<!-- <button type="button" class="btn btn-secondary mt-5" data-dismiss="modal">Close</button> -->
			<button type="submit" class="btn btn-primary mt-4">Save</button>	
		  </div>
		</div>	
      </div>
	  <div class="modal-footer" id="license_required_doc_body">
        
      </div>
	  </form>
    </div>
  </div>
</div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#legal_tab').addClass('active');
  get_list();
  section_all();
 
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
        'url':'<?=base_url()?>legal-licensing-list',
      },
      'columns': [
        {title: "Id",data:"id",mSearch:false},
        {title: "License Name",data:"name",mSearch:true},
        {title: "License Number",data:"number",mSearch:true},
        {title: "License Issue By",data:"issue_by",mSearch:true},
        {title: "License Remark",data:"remark",mSearch:true},
        {title: "Inserted By",data:"insert_name",mSearch:true},
        {title: "Updated By",data:"update_name",mSearch:true},
        {title: "Updated Timestamp",data:"updated_timestamp",mSearch:true},
        {title: "License Validity",data:"license_validity",mSearch:false},
        {title: "License Process Doc",data:"license_process_doc",mSearch:false},
        {title: "License Required Doc",data:"required_document",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10,11] }
                ,{
                    'targets':[1,2,3,4,5,6],
                    'createdCell':  function (td, cellData, rowData, row, col) {
                    $(td).attr('style', 'white-space: nowrap;text-align-last: left;'); 
                  }
                }
                ,{
                    'targets':[7,8,9,10,11],
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
    $('.record_form_title').html('Add License');
    $('#l_name').val('');
    $('#l_id').val('');
    $('#l_number').val('');
    $('#l_issue_by').val('');
    $('#l_remark').val('');
  }
  function reset_LD_form(){
	$("#ld_l_id").val('');
	$("#ld_issue_date").val('');
	$("#ld_valid_date").val('');
	$("#ld_license_url").val('');
  }
  function reset_LRD_form(){
	$("#lrd_id").val('');
	$("#lrd_l_id").val('');
	$("#lrd_name").val('');
	$("#lrd_doc_url").val('');
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
        url:'<?=base_url()?>legal-licensing-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(typeof(data)=='object'){
            if(data['swall']['type']=='success'){
              reset_form();
              //visitor_summary();
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

  $('#section_name').change(function(){
    var section_name=$("#section_name option:selected").val();
    if(section_name=='1' || section_name=='2'){
      // empty_enable_disable('#d_name','1','1');
      empty_enable_disable('#doctor_name','1','1');
      doctor_by_section_id(section_name);
    }else{
      empty_enable_disable('#d_name','0','1');
      empty_enable_disable('#doctor_name','0','1');
      $("#doctor_name").html('');
      $("#d_name").html('');
    }
  });

  function section_all() {
    $.ajax({
      url:'<?=base_url()?>section-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Section</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#section_name").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  $(document).on('click','.delete_record',function () {
    l_id=$(this).attr('l_id');
    if (l_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>legal-licensing-delete',
          method:'post',
          data:{l_id:l_id},
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
    reset_form();
    l_id=$(this).attr('l_id');
    if (l_id) {
      $.ajax({
        url:'<?=base_url()?>legal-licensing-by-id',
        method:'post',
        data:{l_id:l_id},
        async: false,
        success:function (data) {
          if(typeof(data)=='object'){
            $('.record_form_title').html('Edit License');
            $('#l_name').val(data['record']['name']);
            $('#l_id').val(l_id);
            $('#l_number').val(data['record']['number']);
            $('#l_issue_by').val(data['record']['issue_by']);   
            $('#l_remark').val(data['record']['remark']);
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
	
	$('#modal_form').on('submit',function(event){
		event.preventDefault(); 
		var form = $( "#modal_form" );
		var formData = new FormData(this);
		if(form.valid()==true){
		  $.ajax({
			url:'<?=base_url()?>legal-licensing-details-action',
			method:'post',
			data:formData,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
			  if(typeof(data)=='object'){
				if(data['swall']['type']=='success'){
				  reset_LD_form();
				  get_list();
				}
				swal({
				  html:true,
				  title:data['swall']['title'],
				  text:data['swall']['text'],
				  type:data['swall']['type']
				});
				$('#exampleModalLong').modal('hide');
			  }else{
				location.reload();
			  }
			},
		  });
		}
  });
  
  $(document).on('click','.add_license_validity_record',function () {
    reset_form();
    l_id=$(this).attr('l_id');
	$('#ld_l_id').val(l_id);
  });
  
	$(document).on('click','.get_license_details',function () {
		reset_form();
		l_id=$(this).attr('l_id');
		if (l_id) {
		  $.ajax({
			url:'<?=base_url()?>license-details-history',
			method:'post',
			data:{l_id:l_id},
			async: false,
			success:function (data) {
				$('#license_details_body').html(data);
			}
		  })
		}else{
		  alert("Something Went Wrong..!");
		  location.reload();
		}
	});
	
	$(document).on('click','.add_license_required_doc',function () {
		reset_LRD_form();
		l_id=$(this).attr('l_id');
		$('#lrd_l_id').val(l_id);
		get_required_doc_list();
	});
	
	$('#req_doc_form').on('submit',function(event){
		event.preventDefault(); 
		var form = $( "#req_doc_form" );
		var formData = new FormData(this);
		if(form.valid()==true){
		  $.ajax({
			url:'<?=base_url()?>license-required-doc-action',
			method:'post',
			data:formData,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
			  if(typeof(data)=='object'){
				if(data['swall']['type']=='success'){
				  reset_LRD_form();
				  get_list();
				}
				swal({
				  html:true,
				  title:data['swall']['title'],
				  text:data['swall']['text'],
				  type:data['swall']['type']
				});
				get_required_doc_list();
				//$('#required_documents').modal('hide');
			  }else{
				location.reload();
			  }
			},
		  });
		}
	});
	
	function get_required_doc_list() {	
		l_id=$(this).attr('l_id');
		if (l_id) {
		  $.ajax({
			url:'<?=base_url()?>license-required-doc-list',
			method:'post',
			data:{l_id:l_id},
			async: false,
			success:function (data) {
				$('#license_required_doc_body').html(data);
			}
		  })
		}else{
		  alert("Something Went Wrong..!");
		  location.reload();
		}
	}
	
	$(document).on('click','.delete_document',function () {
    l_id=$(this).attr('l_id');
    if (l_id) {
      if (confirm('Are Your Sure Want To Delete This Record ?')==true) {
        $.ajax({
          url:'<?=base_url()?>required-document-delete',
          method:'post',
          data:{l_id:l_id},
          async: false,
          success:function (data) { 
             if(typeof(data)=='object'){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
			  $('#lrd_l_id').val(l_id);
              get_required_doc_list();
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
	
	
	
	
	    

</script>
