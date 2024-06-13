  <?php include_once  APPPATH.'views/header.php'; ?>
  <?php include_once  APPPATH.'views/leftbar.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-6">
        <div class="ibox-title"  style="padding-top: 10px !important;">
          <h3 class="record_form_title">Attendence</h3>
        </div>
        <div class="ibox-content">
          <form method="post" enctype="multipart/form-data" id="record_form">
            <div class="row" style="margin: 0px;">
              <label class="control-label col-lg-5" style="border:0px;">Date<b class="pull-right">:</b></label>
              <div class="col-lg-7">
                <input type="date" class="form-control" name="attendence_date" id="attendence_date">
              </div>
            </div>
           
            <div class="row" style="margin: 0px;">
              <label class="control-label col-lg-5" style="border:0px;">Select Batch<b class="pull-right">:</b></label>
              <div class="col-lg-7">
                <select class="form-control" type="text" name="B_id" id="B_id">
                    <option selected="" disabled="">Select Batch</option>
                </select>
                <input type="hidden" id="student_id" name="student_id" >
                <input type="hidden" class="form-control" name="attendence_id" id="attendence_id">
              </div>
            </div>
            
         
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="ibox-content">
          <div class="ibox-title"  style="padding-top: 10px !important;">
          <h3>Student List</h3>
        </div>
          <div class="row" style="margin-top:20px;">
              <table class="table"name="Table" style="border: 1px solid #e9ecef;margin: 0px;">
                  <thead>
                      <tr>
                          <th style="border-right: 1px solid white;">Sr.No</th> 
                          <th style="border-right: 1px solid white;"> Student Name</th>
                          <th style="border-right: 1px solid white;">Status</th> 
                      </tr>
                  </thead>
                  <tbody id="Student_list">
                      
                  </tbody>
              </table>
          </div>
          <div class="row" style="margin: 10px 0px;">
              <div class="col-lg-10">
              </div>
             
          </div>
        </div>
      </div>
    </div>
   <div class="row">
      <div class="col-lg-12">
        <div class="ibox-title"  style="padding-top: 10px !important;">
          <h3>Attendence List</h3>
        </div>
        <div class="ibox-content">
          <div class="table-responsive" >
            <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
              <tfoot>
                <tr>
                  <th nowrap="nowrap" ></th>
                  <th nowrap="nowrap" style="width: fit-content !important;">
                    Date
                  </th> 
                  <th nowrap="nowrap" style="width: fit-content !important;">
                    Batch name
                  </th> 
                   <th nowrap="nowrap" style="width: fit-content !important;">
                   Student name
                   </th> 
                  <th nowrap="nowrap" ></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
  <?php include_once  APPPATH.'views/footer.php'; ?>
  <script type="text/javascript">
    $('#attendence_tab').addClass('active');
    get_attendence_list();
    batch_student_all();
    function get_attendence_list(){
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
          'url':'<?=base_url()?>get-attendence-list',
        },
        'columns': [
          {title: "Sr.No.",data:"sr_no",mSearch:false},
          {title: "Date",data:"adate",mSearch:true},
          {title: "Batch Name",data:"b_name",mSearch:true},
          {title: "Student Name",data:"s_name",mSearch:true},
          {title: "Status",data:"status",mSearch:true},
         
        ],
        dom: '<"html5buttons"B>lTfgitp',
              'columnDefs': [
                  { orderable: false, targets: [0,1,2,3,4] },
                  {
                    'targets': [4],
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

  function batch_student_all() {
      $.ajax({
        url:'<?=base_url()?>batch-student-all',
        method:'post',
        async: false,
        dataType: 'json',
        success:function (data) { 
          if(typeof(data)=='object'){
            var html='<option selected="" disabled="">Select Batch </option>';
            for (var i = 0; i <data['result'].length; i++){    
                html+="<option value='"+data['result'][i]["id"]+"'>"+data['result'][i]["name"]+"</option>";  
            }
            $("#B_id").html(html);
          }else{
            location.reload();
          }
        }
      })
    }



  $('#B_id').change(function(){
    var B_id = $(this).val();
    if(B_id){
      $.ajax({
        url: '<?= base_url() ?>get-students-by-batch',
        method: 'POST',
        data: { B_id: B_id },
        dataType: 'json',
        success: function(data) {

          html='';

         for(var i=0;i<data['record'].length;i++){
          html+='<tr>\
                      <td>'+data['record'][i]['id']+'</td>\
                      <td>'+data['record'][i]['name']+'</td>\
                      <td><label class="switch"><input type="checkbox" class="change_status"   student_id="'+data['record'][i]['id']+'" value="Absent"><span class="slider round"></span></label></td>\
                  </tr>';

          }

         $('#Student_list').html(html);

        },
          
      });
    }
  });


    $(document).on('click','.change_status',function () {
      var student_id=$(this).attr('student_id');
      var adate=$('#attendence_date').val();
      var batch_id=$('#B_id').val();
      var student_status=$(this).val();
      if (student_id) {
        if (confirm('Are Your Sure Want mark student Present ?')==true) {
           if(student_status=='Absent'){
              student_status='Present';
            }else{
              student_status='Absent';
            }
          $.ajax({
            url:'<?=base_url()?>chage-student-status',
            method:'post',
            data:{student_id:student_id,student_status:student_status,adate:adate,batch_id:batch_id},
            async: false,
            success:function (data) { 
              if(data){
                swal({
                  html:true,
                  title:data['swall']['title'],
                  text:data['swall']['text'],
                  type:data['swall']['type']
                });
                get_attendence_list();
              }
            }
          })
        }
        else
        {
          if(status=='Absent')
            $(this).prop("checked", false);
          if(status=='Present')
            $(this).prop("checked", true);
        }
      }
    });

 $(document).on('click','.changed_status',function () {
      attendence_id=$(this).attr('attendence_id');
      status=$(this).val();
      if (attendence_id) {
        if (confirm('Are Your Sure Want To chage Student Mark ?')==true) {
          if(status=='Absent')
            $(this).val('Present');
          else
            $(this).val('Absent');
          $.ajax({
            url:'<?=base_url()?>chaged-status',
            method:'post',
            data:{attendence_id:attendence_id,status:status},
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
       
      }
    });

</script>
