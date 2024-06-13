<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
    <div class="col-lg-4">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3 class="record_form_title">Add Course</h3>
      </div>
      <div class="ibox-content">
        <form method="post" enctype="multipart/form-data" id="record_form">
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Course Name<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input class="form-control" type="text" name="course_name" id="course_name" maxlength="50" required="" >
                <input class="form-control" type="hidden" name="course_id" id="course_id">
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Upload Image<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input class="form-control" type="file" name="course_photo" id="course_photo" accept="image/png, image/jpeg" >
                <input type="hidden" name="course_img_path" id="course_img_path">
                
            </div>
          </div>
          <div class="row" style="margin: 0px;">
            <label class="form-control col-lg-5" style="border:0px;">Course Information<a style="color: red">*</a><b class="pull-right">:</b></label>
            <div class="col-lg-7">
                <input class="form-control" type="file" name="course_information" id="course_information"  accept="application/pdf" >
                <input type="hidden" name="course_info_path" id="course_info_path">
            </div>
          </div><hr>
          <div class="row" style="margin: 0px;">
              <button type="reset" class=" col-lg-5 btn btn-danger" >Reset</button>
              <div class="col-lg-2"></div>
              <button type="submit" class=" col-lg-5 btn btn-primary" >Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Course List</h3>
      </div>
      <div class="ibox-content">
        <div class="table-responsive" >
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;"> </th>
                <th nowrap="nowrap" style="width: fit-content !important;"></th>
                <th nowrap="nowrap"> </th>
                <th nowrap="nowrap"> </th>
                <th nowrap="nowrap" ></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="photo_gallery" class="modal fade" role="dialog"></div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#course_tab').addClass('active');
  get_course_list();

  $(document).on('click','.gallery_image',function () {
      div_name=$(this).attr('div_name');
      image_gallery('uploads/course/photo',div_name);
    });

  function get_course_list(){
    if ($.fn.DataTable.isDataTable('#datatable_list'))
    {
      var table = $('#datatable_list').DataTable();
      table.destroy();
      table.clear();
      table.state.clear();
    }
      
    var table1=$('#datatable_list').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'autoWidth':true,
      'stateSave': true,
      'ajax': {
        'url':'<?=base_url()?>get-course-list',
      },
      'columns': [
        {title: "Id",data:"sr_no",mSearch:false},
        {title: "Name",data:"name",mSearch:true},
        {title: "Photo",data:"course_image",mSearch:true},
        {title: "Information",data:"info",mSearch:true},
        {title: "Status",data:"status",mSearch:true},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5] },
                {
                  'targets': [3],
                  'createdCell':  function (td, cellData, rowData, row, col) {
                  $(td).attr('data-toggle', 'modal'); 
                  $(td).attr('data-target', '#course_index_popup'); 
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

    table1.columns().every( function () {
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

  function reset_course_add_form(){
    
    $('#course_id').val('');
    $('#course_name').val('');
    $('#course_photo').val('');
    $('#course_information').val('');    
  }

  $('#course_photo').change(function (e) {
    $('.course_photo_note').html('');
    document.getElementById("course_photo_view").src='';
    fileName = document.getElementById("course_photo").files.item(0).name;
    fileExtension = fileName.replace(/^.*\./, '');
    if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') 
    {
      var height=0,width=0;;
      var _URL = window.URL || window.webkitURL;
      var img = new Image();
      img.onload = function() {
        height=this.height;
        width=this.width;
        if (height == '200' && width=='300')
        {

          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("course_photo").files[0]);
          oFReader.onload = function (oFREvent) { 
              document.getElementById("course_photo_view").src = oFREvent.target.result;
          };
          $('.course_photo_note').html('');
        }
        else
        {
          $('.course_photo_note').html('***Image Size Must be 300px * 200px');
          $('input[name=course_photo]').val('');
        }
        
      };
      img.src = _URL.createObjectURL(document.getElementById("course_photo").files[0]);
    }
    else
    {
      $('.course_photo_note').html('*** Please Select Correct File Type');
      $('input[name=course_photo]').val('');
    }
  });


  $(document).on('click','.close_course_add_model',function () {
    $('#add_course_modal').modal('hide');
    document.getElementById("course_photo_view").src='';
    reset_course_add_form();
  });

  $('.add-course-btn').on('click',function(event){
    $('.course_model_title').html('Add Course');
    reset_course_add_form();
    $('#add_course_modal').modal('show');
  });

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
  
    if(form.valid()==true)
    {
      $.ajax({
        url:'<?=base_url()?>course-action',
        method:'post',
        data:formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
          if(data['status']){
            if(data['swall']['type']=='success')
            {
    
              reset_course_add_form();
              get_course_list();
            }
            swal({
              html:true,
              title:data['swall']['title'],
              text:data['swall']['text'],
              type:data['swall']['type']
            });
          }
        },
      });
    }
  });

  $(document).on('click','.delete_course',function () {
    course_id=$(this).attr('course_id');
    if (course_id) {
      if (confirm('Are Your Sure Want To Delete This Course ?')==true) {
        $.ajax({
          url:'<?=base_url()?>delete-course',
          method:'post',
          data:{course_id:course_id},
          async: false,
          success:function (data) { 
            if(data){
              swal({
                html:true,
                title:data['swall']['title'],
                text:data['swall']['text'],
                type:data['swall']['type']
              });
              get_course_list();
            }
          }
        })
      }
    }
  });



      $(document).on('click','.change_status',function () {
      course_id=$(this).attr('course_id');
      course_status=$(this).val();
      if (course_id) {
        if (confirm('Are Your Sure Want To change Course  status ?')==true) {
          if(status=='Inactive')
            $(this).val('Active');
          else
            $(this).val('Inactive');
          $.ajax({
            url:'<?=base_url()?>chage-course-status',
            method:'post',
            data:{course_id:course_id,course_status:course_status},
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
          if(status=='Inactive')
            $(this).prop("checked", false);
          if(status=='Active')
            $(this).prop("checked", true);
        }
      }
    });

 

  $(document).on('click','.edit_course',function () {
    $('.record_form_title').html('Edit Course');
    course_id=$(this).attr('course_id');
    if (course_id) 
    {
      $.ajax({
        url:'<?=base_url()?>get-course-by-id',
        method:'post',
        data:{course_id:course_id},
        async: false,
        success:function (data) {
          
          $('#course_id').val(course_id);
          $('#course_name').val(data['record']['course_name']);
          $('#course_img_path').val(data['record']['course_image']);
          $('#course_info_path').val(data['record']['course_info']);


        }
      })
    }
  });

</script>
