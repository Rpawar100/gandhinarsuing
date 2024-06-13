<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<style>
    table {
    width: 100%;
    border: 1px solid black;
    margin-top: 20px;
}
th,
td {
    
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}
.container-fluid {
  width: 100%;
  max-width: 1200px; 
  margin: 0 auto; 
  padding: 20px; 
  box-sizing: border-box; 
  background-color: #fff; 
  border: 1px solid #ccc;
  border-radius: 8px; 
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>
<div class="container-fluid">
    <form method="post" enctype="multipart/form-data" name="intake_output_from"id="intake_output_from">
        <div class="row">
            <div class="col-lg-12" style="padding-bottom: 5px;">
                <h2 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px dotted darkgrey;">
                    <b>  INTAKE & OUTPUT RECORD</b>
                </h2>
            </div>
        </div>
    	<table>
            <thead>
                <tr>
                    <th  colspan="7" >INTAKE(ml)</th>
                    <th  colspan="7" >OUTPUT(ml)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="1">
                        <label class="control-label" >Time</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label"  >Oral</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label"  >RT</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label"  >IV</label>
                    </td>
                    <td colspan="2">
                        <label class="control-label"  >Other</label>
                    </td>
                    <td>
                        <label class="control-label"  >Running Total</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label"  >Urine</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label"  >RT Asp</label>
                    </td>
                    <td colspan="3" >
                        <label class="control-label" >Other(Chest drain ,etc.)</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label"  >Running Total</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label"  >Initial</label>
                    </td>           
                </tr> 
                <tr>
                    <td>
                        <input type="time" class="form-control border-secondary border-2" name="time" id="time">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="oral" id="oral">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="rt" id="rt">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="iv" id="iv">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="other" id="other">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="other" id="other">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="running_total" id="running_total">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="urine" id="urine">
                    </td>
                    <td>
                       <input type="text" class="form-control border-secondary border-2" name="rt_asp" id="rt_asp"> 
                    </td>
                    <td>
                      <input type="text" class="form-control border-secondary border-2" name="o_ther" id="o_ther1">  
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="o_ther" id="o_ther2">  
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="o_ther" id="o_ther2">  
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="running_total" id="runningtotal">
                    </td>
                    <td>
                        <input type="text" class="form-control border-secondary border-2" name="initial" id="initial">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Total Intake(ml)</label>  
                    </td>
                    <td colspan="4">
                        <input type="text" class="form-control border-secondary border-2" name="intake" id="intake" >
                    </td>
                    <td colspan="3">
                        <label class="control-label">Total Output(ml)</label>
                    </td>
                    <td colspan="4">
                        <input type="text" class="form-control border-secondary border-2" name="output" id="output" >
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-10">
                
            </div>
            <div class="col-lg-2" >
                <input class="form-control" type="button"  
                        style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD"
                        onclick="add_record()">
            </div>
        </div>
        <div class="row" style="margin-top:20px; padding: 30px;">
            <table class="table"name="Table" style="border: 1px solid #e9ecef;margin: 0px;">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid white;">Time</th>
                        <th style="border-right: 1px solid white;">Oral</th>
                        <th style="border-right: 1px solid white;">RT</th>
                        <th style="border-right: 1px solid white;">IV</th>
                        <th style="border-right: 1px solid white;">Other</th>
                        <th style="border-right: 1px solid white;">Running Total</th>
                        <th style="border-right: 1px solid white;">Urine</th>
                        <th style="border-right: 1px solid white;">RT Asp</th>
                        <th style="border-right: 1px solid white;">Other(Chest drain ,etc.)</th>
                        <th style="border-right: 1px solid white;">Running Total</th>
                        <th style="border-right: 1px solid white;">Initial</th>
                        <th  style="border-right: 1px solid white;">Total Intake(ml)</th>
                        <th style="border-right: 1px solid white;">Total Output(ml)</th>
                        <th style="border-right: 1px solid white;">Action</th>
                    </tr>
                </thead>
                <tbody id="intake_list">
                </tbody>
            </table>
        </div>
        <div class="row col-lg-3" style="text-align:center;margin-top: 15px;">
          <button type="submit" class=" col-lg-5 btn btn-primary" >Submit</button>
        </div>
    </form>
</div>
<?php include_once  APPPATH.'views/footer.php';?>
<script type="text/javascript">
    $('#intake_output_record_tab').addClass('active');

    $('#intake_output_from').on('submit', function (event) {
        alert("Hello");
    event.preventDefault(); 
    var form = $("#intake_output_from");
    var formData = new FormData(this);
    formData.append('tableData', JSON.stringify(tableData));
    console.log(formData);
    if (form.valid() == true) {
        $.ajax({
            url: '<?=base_url()?>intake-output-record-action',
            method: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
              console.log(data);
                if (typeof (data) == 'object') {

                    if (data['swall']['type'] == 'success') {
                       // reset_form();
                       //  get_list();
                    }
                    swal({
                        html: true,
                        title: data['swall']['title'],
                        text: data['swall']['text'],
                        type: data['swall']['type']
                    });
                }
                records = [];
                $("#intake_list").empty();
            },
        });
    } else {
      
  }
});

    function attachTableEvents() {
        $(document).on('click', '.delete_record', function () {
    var rowIndex = $(this).closest('tr').index();

    if (rowIndex >= 0 && rowIndex < tableData.length) {
        $(this).closest('tr').remove();

        tableData.splice(rowIndex, 1);

        console.log("Row deleted successfully. Updated tableData:", tableData);
    } else {
        console.log("Invalid row index:", rowIndex);
    }
    });
}


var tableData = []; 
function add_record() {
    var timeValue = $("#time").val();
    var oralValue = $("#oral").val();
    var rtValue = $("#rt").val();
    var ivValue = $("#iv").val();
    var otherValues = $("input[name='other']").map(function () {
    return $(this).val();
    }).get();
    var runningtValue = $("#running_total").val();
    var urineValue = $("#urine").val();
    var rtspValue = $("#rt_asp").val();
    var otherrValues = $("input[name='o_ther']").map(function () {
        return $(this).val();
    }).get();
    var runningtotalValue = $("#runningtotal").val();
    var initialValue = $("#initial").val();
    var intakeValue = $("#intake").val();
    var outputValue = $("#output").val();

    if(timeValue && oralValue && rtValue && ivValue && otherValues.length && runningtValue && urineValue && rtspValue && otherrValues.length > 0 && runningtotalValue && initialValue &&  intakeValue && outputValue) {
        var assessment_all = {
            time: timeValue,
            oral: oralValue,
            rt: rtValue,
            iv: ivValue,
            other: otherValues.join(', '),
            running_total: runningtValue,
            urine: urineValue,
            rt_asp: rtspValue,
            o_ther: otherrValues.join(', '),
            runningtotal: runningtotalValue,
            initial:initialValue,
            intake:intakeValue,
            output:outputValue
        };
        tableData.push(assessment_all);
        var html = '<tr style="font-size: 18px;">\
                        <td style="border-right:1px solid lightgray">' + timeValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + oralValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + rtValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + ivValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + otherValues.join(', ') + '</td>\
                        <td style="border-right:1px solid lightgray">' + runningtValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + urineValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + rtspValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + otherrValues.join(', ') + '</td>\
                        <td style="border-right:1px solid lightgray">' + runningtotalValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + initialValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + intakeValue + '</td>\
                        <td style="border-right:1px solid lightgray">' + outputValue + '</td>\
                        <td style="border-right:1px solid lightgray">\
                            <i class="fa fa-trash delete_record" style="color:red;font-size:20px;margin: 0px 10px; cursor:pointer;"></i>\
                        </td>\
                    </tr>';
        $('#intake_list').append(html);
        $('#time').val("");
        $('#oral').val("");
        $('#rt').val("");
        $('#iv').val("");
        $('input[name="other"]').prop('checked', false);
        $('#running_total').val("");
        $('#urine').val("");
        $('#rt_asp').val("");
        $('input[name="o_ther"]').prop('checked', false);
        $('#runningtotal').val("");
        $('#initial').val("");
        $('#intake').val("");
        $('#output').val("");
    } else {
        alert("Please fill in all the fields.");
    }
}

attachTableEvents();

</script>