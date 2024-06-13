<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link href="<?=base_url('assets')?>/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<style>
    .menu-content {
        /*display:none;*/
    }

    .menu-content.active {
        display: block;
    }

    .square-box {
        width: 10px;
        height: 10px;
        background-color: #3498db;
        border: 2px solid #2980b9;
    }

    .square-box1 {
        width: 500px;
        height: 200px; /* Set a fixed height */
        background-color: lightyellow;
        border: 2px solid #2980b9;
    }

    h3 {
        margin-left: 8px;
    }

    h4 {
        margin-left: 8px;
    }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-2 #ffffff text-light" style="padding-right: 0px;padding-left: 0px;">
      <nav class="navbar-static-side fill" role="navigation" style="width:inherit;">
        <div class="sidebar-collapse" >
          <ul class="nav metismenu" id="side-menu1" style="overflow-y: auto;">
          </ul>
        </div>
      </nav>
    </div>
    <div class="col-lg-10">
      <div class="ibox-content" style="padding: 0px;">
        <div class="menu-content" id="default">
          <div id="accordion" class="accordion">
              <div class="card mb-0">
                  <div class="card-header">
                      <a class="card-title">
                         <h3 style="margin: 0px;">IPD Dashboard</h3>
                      </a>
                  </div>
                  <div class="card-body" style="font-size:16px;">
                    <div class="row">
                      <label class="form-control col-lg-2" style="border:0px;" >Ward Name<a style="color: red">*</a></label>
                      <div class="col-lg-3">
                        <select class="form-control" name="ward_name" id="ward_name">
                          <option value="" selected="" disabled="">Select Ward Name</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <label class="form-control col-lg-2" style="border:0px;" >Search By<a style="color: red">*</a></label>
                      <div class="col-lg-3">
                        <select class="form-control" name="search_by" id="search_by">
                            <option value="Patient Name">Patient Name</option>
                            <option value="UHID">UHID</option>
                            <option value="Bed Name">Bed Name</option>
                            <option value="Doctor Name">Doctor Name</option>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <input class="form-control" type="text" name="search_by_text" placeholder="Enter Text">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-1" >
                      </div>    
                      <div class="row col-lg-2">
                       <div class="square-box" style="margin-top:5px;margin-right:5px;"></div>
                       Vacant:
                       <label>20</label>
                      </div>
                      <div class="row col-lg-2">
                       <div class="square-box" style="margin-top:5px;margin-right:5px;"></div>
                       Allocated:
                       <label>20</label>
                      </div>
                      <div class="row col-lg-2">
                       <div class="square-box" style="margin-top:5px;margin-right:5px;"></div>
                       Initiated Discharge:
                       <label>20</label>
                      </div>
                      <div class="row col-lg-2">
                       <div class="square-box" style="margin-top:5px;margin-right:5px;"></div>
                       Marked Discharge:
                       <label>20</label>
                      </div>
                      <div class="row col-lg-2">
                      <div class="square-box" style="margin-top:5px;margin-right:5px;"></div>
                       Discharge:
                       <label>20</label>            
                      </div>
                      <div id="allocated-info"></div>
                    </div>
                    <br>
                    <br>
                    <div id="allocated_info">  
                    <div class="row">
                      <div class="row col-lg-3">
                       <div class="square-box1" style="margin-top:5px;margin-right:5px; margin-left: 5px;"> 
                        <h3 id="floor_name">2nd floor -bed 1</h3>
                        <h4>Mr.Bhuhshan Patil</h4>
                        <h4>UHID-85555655</h4>
                        <h4>DR Name.- akash patil</h4>
                        <h4>Company- Selef Pay</h4>
                        <h4>ADDMISSION DATE- 5564</h4>
                       </div>
                      </div>
                       <div class="row col-lg-3">
                       <div class="square-box1" style="margin-top:5px;margin-right:5px;"></div>
                      </div>
                       <div class="row col-lg-3">
                       <div class="square-box1" style="margin-top:5px;margin-right:5px;"></div>
                      </div>
                       <div class="row col-lg-3">
                       <div class="square-box1" style="margin-top:5px;margin-right:5px;"></div>
                      </div>
                    </div>
                    </div>
                  </div> 
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once  APPPATH.'views/footer.php'; ?>
<script src="<?=base_url('assets')?>/js/fullcalendar/moment.min.js"></script>
<script src="<?=base_url('assets')?>/js/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript">
get_ward_list();
billing_class_all();

$("#ipd_dashboard_tab").addClass("active");
function get_ward_list() {
    $.ajax({
        url: '<?=base_url()?>billing-class-all',
        method: 'post',
        async: false,
        dataType: 'json',
        success: function (data) {
            if (typeof (data) == 'object') {
                var html = "";
                for (var i = 0; i < data['record'].length; i++) {
                    // Get the count of allocations for the current billing class
                    var allocationCount = getAllocationCount(data['record'][i]['id']);
                    html += '<li id="dash_tab" class="menu-item" data-target="' + data['record'][i]['name'] + '">\
                            <a  tabindex="-1">\
                              <div class="row">\
                                <div class="col-lg-2">\
                                  <i class="fa-solid fa-bed"></i>\
                                </div>\
                                <div class="col-lg-8">\
                                    <span class="nav-label" BC_id="' + data['record'][i]['id'] + '">' + data['record'][i]['name'] + '</span>\
                                </div>\
                                <div class="col-lg-2">\
                                  <span style="padding: 2px;background-color: sandybrown;">' + allocationCount + '</span>\
                                </div>\
                              </div>\
                            </a>\
                    </li>';
                }
                $("#side-menu1").html(html);
            } else {
                location.reload();
            }
        }
  })
}


function getAllocationCount(billingClassId) {
    var count = 0;
    $.ajax({
        url: '<?=base_url()?>get-allocation-count/' + billingClassId, 
        method: 'post',
        async: false,
        dataType: 'json',
        success: function (data) {
            if (typeof (data) == 'object') {
                count = data['count']; 
            }
        }
    });
    return count;
}

function billing_class_all() {
    $.ajax({
      url:'<?=base_url()?>billing-class-all',
      method:'post',
      async: false,
      dataType: 'json',
      success:function (data) { 
        if(typeof(data)=='object'){
          var html="<option value='' selected disable>Select Category</option>";
               for (var i = 0; i <data['record'].length; i++){    
              html+="<option value='"+data['record'][i]["id"]+"'>"+data['record'][i]["name"]+"</option>";  
          }
          $("#ward_name").html(html);
        }else{
          location.reload();
        }
      }
  })
}
  

$(document).on('click', '#side-menu1 li.menu-item', function() {
    currentBillingClassId = $(this).find('.nav-label').attr('BC_id');
    getBillingClassAllocationData(currentBillingClassId);
});



function getBillingClassAllocationData(currentBillingClassId) {
  $.ajax({
        url:'<?=base_url()?>get-allocation-data',
        method: 'post',
        data: {billingClassId: currentBillingClassId},
        dataType:'json',
        async: false,
        success:function (data) {
          if (typeof(data) == 'object') {
                AllocationInfo(data);
            } else {
                location.reload();
            } 
        }
  })
}

function AllocationInfo(data) {
    var allocationInfoHtml = '';
    for (var i = 0; i < 4; i++) {
        
        if (i % 4 === 0) {
            allocationInfoHtml += '<div class="row">';
        }
        allocationInfoHtml += '<div class="col-lg-3">';
        allocationInfoHtml += '<div class="square-box1" >';
        allocationInfoHtml += '<h3 class="floor-name">' + data[i]['fb_name'] + '</h3>';
        allocationInfoHtml += '<h4>' + data[i]['patient_name'] + '</h4>';
        allocationInfoHtml += '<h4>UHID-' + data[i]['UHID'] + '</h4>';
        allocationInfoHtml += '<h4>DR Name.- ' + data[i]['doctor_name'] + '</h4>';
        allocationInfoHtml += '<h4>Company- ' + data[i]['patient_company_name'] + '</h4>';
        allocationInfoHtml += '<h4>ADMISSION DATE- ' + data[i]['admit_date'] + '</h4>';
        allocationInfoHtml += '</div>';
        allocationInfoHtml += '</div>';
        // allocationInfoHtml += '</div>';
        if ((i + 1) % 4 === 0 || (i + 1) === data.length) {
          allocationInfoHtml += '</div>';
        }
}

$('#allocated_info').html(allocationInfoHtml);
style="margin-top:5px;margin-right:5px;margin-left:5px;"
}

</script>


