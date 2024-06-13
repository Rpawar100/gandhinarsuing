<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row" style="padding-top:5px">
    <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12"> 
                   <div class="row"> 
                      <div class="col-lg-4" style="background: lightskyblue;border-radius: 10px 0px 0px 10px;" id="all">
                      <h3  style="margin: 10px;text-align: center;">All: <b class="" style="font-size: x-large;"><?=!empty($record['count'])?$record['count']:'-'?></b></h3>
                      </div>
                      <div class="col-lg-4" style="background: lightgreen;" id="active">
                      <h3  style="margin: 10px;text-align: center;">Active: <b class="" style="font-size: x-large;"><?=!empty($active['acount'])?$active['acount']:'-'?></b></h3>
                      </div>
                      <div class="col-lg-4" style="background: lightskyblue;border-radius: 0px 10px 10px 0px;" id="discarded">
                      <h3  style="margin: 10px;text-align: center;">Discarded: <b class="" style="font-size: x-large;"><?=!empty($discarded['dcount'])?$discarded['dcount']:'-'?></b></h3>
                      </div>   
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="padding-top:15px">
        <div class="col-lg-12">
          <div class="ibox-title"  style="padding-top: 10px !important;">
            <h3 class="record_form_title">Add Pass Count</h3>
          </div>
          <div class="ibox-content">
            <form method="post" enctype="multipart/form-data" id="record_form">
              <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-5" style="border:0px;">Pass Count<a style="color: red">*</a><b class="pull-right">:</b></label>
                <div class="col-lg-7">
                    <input class="form-control" type="text" name="pass_count" id="pass_count" maxlength="50" required="" >
                    <!--<input class="form-control" type="hidden" name="d_id" id="d_id">-->
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
      </div>
      <div class="row" style="padding-top:15px">
        <div class="col-lg-12">
          <div class="ibox-title"  style="padding-top: 10px !important;">
            <h3 class="record_form_title">Discard Pass</h3>
          </div>
          <div class="ibox-content">
            <form method="post" enctype="multipart/form-data" id="discard_pass_form">
              <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-5" style="border:0px;">Enter Pass No.<a style="color: red">*</a><b class="pull-right">:</b></label>
                <div class="col-lg-7">
                    <input class="form-control" type="text" name="pass_number" id="pass_number" maxlength="50" required="" >
                </div>
              </div>
              <div class="row" style="margin: 0px;">
                <label class="form-control col-lg-5" style="border:0px;">Discard Reason<a style="color: red">*</a><b class="pull-right">:</b></label>
                <div class="col-lg-7">
                    <input class="form-control" type="text" name="discard_reason" id="discard_reason" required="" >
                </div>
              </div>
              <hr>
              <div class="row" style="margin: 0px;">
                  <button type="reset" class=" col-lg-5 btn btn-danger" >Reset</button>
                  <div class="col-lg-2"></div>
                  <button type="submit" class=" col-lg-5 btn btn-primary" >Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <h3>Pass Count List</h3>
      </div>
      <div class="ibox-content">
        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover datatable_list" id="datatable_list" style="width: 99% !important;">
            <tfoot>
              <tr>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Pass No. </th>
                <th nowrap="nowrap" style="width: fit-content !important;">Timestamp</th>
                <th nowrap="nowrap" ></th>
                <th nowrap="nowrap" style="width: fit-content !important;">Discarded By</th>
                <th nowrap="nowrap" ></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    
  </div>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
  $('#visitor_pass_tab').addClass('active');
  

  active_tab='all';
  $('#all').addClass('active');
  get_list();

  $('#all').on('click',function(){
    change_tab('all');
  });

  $('#active').on('click',function(){
    change_tab('active');
  });

  $('#discarded').on('click',function(){
    change_tab('discarded');
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
        'url':'<?=base_url()?>visitor-pass-list',
        'data':{active_tab:active_tab},
      },
      'columns': [
        {title: "Sr.No.",data:"sr_no",mSearch:false},
        {title: "Pass No.",data:"pass_no",mSearch:true},
        {title: "TimeStamp",data:"date_time",mSearch:false},
        {title: "Reason",data:"reason",mSearch:false},
        {title: "discarded By",data:"user_name",mSearch:false},
        {title: "Action",data:"action",mSearch:false},
      ],
      dom: '<"html5buttons"B>lTfgitp',
            'columnDefs': [
                {
                     'targets':[0,1,2,3,4],
                      "orderable": false,
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

    if(active_tab=='all' || active_tab=='active'){

        table.columns(3).visible(false);
        table.columns(4).visible(false);
        table.columns(5).visible(false);
    }

    
  }

  function reset_form(){
    $('#pass_count').val('');
    $('#pass_number').val('');
    $('#discard_reason').val('');
  }


  $(document).on('click','.cancel_record',function(){
    VP_id=$(this).attr('VP_id');
     if (VP_id) {
      if (confirm('Are Your Sure Want To Cancel This discarded Pass ?')==true) {
        $.ajax({
          url:'<?=base_url()?>cancel-discarded-pass',
          method:'post',
          data:{VP_id:VP_id},
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
              location.reload();
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
  })

  $('#record_form').on('reset',function(event){
    reset_form();
  });

  $('#record_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $( "#record_form" );
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>visitor-pass-action',
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

  

    $('#discard_pass_form').on('submit',function(event){
    event.preventDefault(); 
    var form = $("#discard_pass_form");
    var formData = new FormData(this);
    if(form.valid()==true){
      $.ajax({
        url:'<?=base_url()?>discard-pass-form',
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

 
  

</script>
