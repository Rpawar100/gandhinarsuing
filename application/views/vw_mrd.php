<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0px;">
  <div class="row">
    <div class="col-lg-12">
        <div class="ibox-title" style="padding-top: 10px !important;">
            <h3 class="record_form_title">MRD</h3>
        </div>
        <div class="ibox-content">
              <form method="post" enctype="multipart/form-data" id="records_form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                            <label class="form-control" style="border: 0px;">Select Appoinment No</label>
                                <input class="form-control" type="hidden" name="m_id" id="m_id">
                            </div>
                            <div class="col-lg-3">
                              <label class="form-control"  style="border: 0px;">Select mrd doc name</label>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-control" style="border: 0px;"> MRD url</label>
                            </div>                           
                            <div class="col-lg-3">
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <select class="form-control" name="app_no" id="app_no"></select>
                            </div>
                            <div class="col-lg-3">
                                  <div class="input-group">
                                      <select class="form-control" name="mrdDocId" id="mrdDocId"></select>
                                      <div class="input-group-append">
                                          <button type="button" class="btn btn-success" id="addNewMrdDocBtn">+</button>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-lg-3">
                              <input class="form-control" type="file" name="mrdurl[]" id="mrdurl" accept="image/*, application/pdf" required="" multiple>
                              </div>
                              
                            <div class="col-lg-3">
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
        <h3 class="col-lg-2" style="padding: 7px; padding-left: 15px;"> MRD List</h3>
      </div>
    </div>
    <div class="ibox-content">
     <button type="button" class="btn btn-primary" id="viewFileBtn" style="position: absolute; right: 15px; top: 10px;">View File</button>

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
          <tfoot>
            <tr>
              <th nowrap="nowrap"></th>
              <th nowrap="nowrap" style="width: fit-content !important;">Appoinment No</th>
              <th nowrap="nowrap" style="width: fit-content !important;">MRD Doc Name</th>
              <th nowrap="nowrap" style="width: fit-content !important;">MRD Url</th>
              <th nowrap="nowrap"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-primary" id="openPdfBtn"style="position: absolute; right: 40px; top: 10px;">Open PDF</button>
        <h5 class="modal-title" id="fileModalLabel">View File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="fileModalBody">
        <!-- File content will be displayed here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addMrdDocModal" tabindex="-1" role="dialog" aria-labelledby="addMrdDocModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMrdDocModalLabel">Add New MRD Doc Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="newMrdDocName">New MRD Doc Name:</label>
                <input type="text" class="form-control" id="newMrdDocName" name="newMrdDocName" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveNewMrdDocBtn">Save</button>
            </div>
        </div>
    </div>
</div>
<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
    
  $('#mrd_tab').addClass('active');
    get_list();
    Appoinment_all();
   Mrd_doc_all();
   
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
        'url':'<?=base_url()?>mrd-list',
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Appoinment No ",data:"app_no",mSearch:true},
        {title: "MRD Doc Name",data:"mrdDocId",mSearch:true},
        {title: "MRD Url ",data:"mrdurl",mSearch:true},
        {title: "Action",data:"action",mSearch:false},

      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4 ] },
                {
                        'targets':[0,1,2,3,4 ],
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
    $('#app_no').val('');
    $('#mrdDocId').val('');
    $('#mrdurl').val('');
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
        url:'<?=base_url()?>mrd-action',
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

function Mrd_doc_all() {
    $.ajax({
      url:'<?=base_url()?>Mrd-doc-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select mrs doc name </option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#mrdDocId").html(html);
        }else{
          location.reload();
        }
      }
    })
  }

  function Appoinment_all() {
    $.ajax({
      url:'<?=base_url()?>Appoinment-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Appoinment No</option>";
          for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#app_no").html(html);
        }else{
          location.reload();
        }
      }
    })
  }


    $('#viewFileBtn').hide();
      $(document).on('click', '.edit_record', function () {
    var m_id = $(this).attr('m_id');
    if (m_id) {
        $.ajax({
            url: '<?=base_url()?>mrd-by-id',
            method: 'post',
            data: {m_id: m_id},
            user_id: m_id,
            async: false,
            dataType: 'json',
            success: function (data) {
                if (typeof (data) == 'object') {
                    $('.record_form_title').html('Edit mrd');
                    $('#m_id').val(data['record']['id']);
                    $('#app_no').val(data['record']['app_no']);
                    $('#mrdDocId').val(data['record']['mrdDocId']);

                    $('#viewFileBtn').show();
 
                    var mrdDocList = (data['record']['mrdurll']).split(',');

                    $('#openPdfBtn').click(function () {
                        var pdfUrls = mrdDocList.filter(url => url.toLowerCase().endsWith('.pdf'));

                        if (pdfUrls.length > 0) {
                            // Open each PDF in a separate window
                            pdfUrls.forEach(pdfUrl => {
                                window.open(pdfUrl, '_blank');
                            });
                        } else {
                            alert('No PDF files to open.');
                        }
                    });

                    $('#viewFileBtn').click(function () {
                        var pdfHtml = '';
                        var imageHtml = '';

                        for (var i = 0; i < mrdDocList.length; i++) {
                            var fileUrl = mrdDocList[i];
                            var fileExtension = fileUrl.split('.').pop().toLowerCase();

                            if (fileExtension === 'pdf') {
                                pdfHtml += '<iframe src="' + fileUrl + '" width="100%" height="auto"></iframe>';
                            } else if (fileExtension === 'jpg' || fileExtension === 'jpeg' || fileExtension === 'png' || fileExtension === 'gif') {
                                imageHtml += '<img src="' + fileUrl + '" width="100%" height="auto">';
                            }
                        }

                        if (pdfHtml !== '' && imageHtml !== '') {
                            // If there are both PDFs and images, display images in a modal
                            $('#fileModalBody').html(imageHtml);
                            $('#fileModal').modal('show');
                        } else if (pdfHtml !== '') {
                            // If only PDFs, open each PDF in a separate window
                            var pdfUrls = mrdDocList.filter(url => url.toLowerCase().endsWith('.pdf'));

                            if (pdfUrls.length > 0) {
                                pdfUrls.forEach(pdfUrl => {
                                    window.open(pdfUrl, '_blank');
                                     });
                            } else {
                                alert('No PDF files to open.');
                            }
                        } else if (imageHtml !== '') {
                            // If only images, display them in a modal
                            $('#fileModalBody').html(imageHtml);
                            $('#fileModal').modal('show');
                        } else {
                            alert('No files to display.');
                        }
                    });

                } else {
                    location.reload();
                }
            }
        });
    } else {
        alert("Something Went Wrong..!");
        location.reload();
    }
  });


    
    $(document).ready(function () {
    $('#addNewMrdDocBtn').click(function () {
        $('#addMrdDocModal').modal('show');
    });

    $('#saveNewMrdDocBtn').click(function () {
        var newMrdDocName = $('#newMrdDocName').val();
        if (newMrdDocName.trim() !== '') {
            $.ajax({
                url: '<?=base_url()?>mrd-doc-action', 
                method: 'POST',
                data: { mrd_name: newMrdDocName },
                success: function (response) {
                    if (response.status) {
                        
                        get_list();
                        $('#addMrdDocModal').modal('hide');
                    } else {
                        alert('Failed to save MRD Doc name. Please try again.');
                    }
                },
                error: function () {
                    alert('An error occurred while saving MRD Doc name.');
                }
            });
        } else {
            alert('Please enter a valid MRD Doc name.');
        }
    });
    
});




  $(document).on('click', '.change_state', function () {
    var m_id = $(this).attr('m_id');
    var m_status = $(this).attr('m_status');
    //alert(m_status);

  
    var confirmMessage = m_status == 'Cancelled' ? 'Are you sure you want to Uncancel this record?' : 'Are You Sure Want To Cancelled This Record ?';

    if (m_id) {
        if (confirm(confirmMessage)) {
            $.ajax({
                url: '<?=base_url()?>mrd-status',
                method: 'post',
                data: { m_id: m_id, m_status: m_status },
                async: false,
                success: function (data) {
                    if (typeof (data) === 'object') {
                         swal({
                            html:true,
                            title:data['swall']['title'],
                            text:data['swall']['text'],
                            type:data['swall']['type']
                          });
                        get_list();
                    }

                }
            });
        }
    } else {
        alert("Something Went Wrong..!");
        location.reload();
    }
});



  </script> 
