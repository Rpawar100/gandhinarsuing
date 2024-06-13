<?php include_once  APPPATH . 'views/header.php'; ?>
<?php include_once  APPPATH . 'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<style>
    table {
        width: 100%;
        border: 1px solid black;
        margin-top: 20px;
        padding: 20px;
    }

    th,
    td {

        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    .container {
        width: 110%;
        max-width: 1300px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #title {
        text-align: center;
        margin-left: 450px;
    }
</style>
<div class="container">
    <form method="post" enctype="multipart/form-data" name="pain_re_assessment" id="pain_re_assessment">
        <div class="row">
            <label class="control-label" id="title">
                <h3>PAIN RE-ASSESSMENT</h3>
            </label>
        </div>
        <fieldset style="border: 2px solid #333; border-radius: 10px;  padding: 10px;  width: 100%; ">
            <div class="row" style="margin-top: 10px; margin-left: 10px">
                <div class="col-lg-1">
                    <label class="control-label"><b>UHID NO.:</b><label>
                </div>
                <div class="col-lg-2">
                    <input type="text" class="form-control border-secondary border-2" name="uhid" id="uhid">
                </div>
                <div class="col-lg-1">
                    <label class="control-label"><b>Date:</b><label>
                </div>
                <div class="col-lg-2">
                    <input type="date" class="form-control border-secondary border-2" name="d_ate" id="d_ate">
                </div>
                <div class="col-lg-1">
                    <label class="control-label"><b>Time:</b><label>
                </div>
                <div class="col-lg-2">
                    <input type="time" class="form-control border-secondary border-2" name="t_ime" id="t_ime">
                </div>
            </div> 
            <table>
                <thead>
                    <tr>
                        <th colspan="1">Date</th>
                        <th colspan="1">Time</th>
                        <th colspan="1">Pain Score</th>
                        <th colspan="1">Location</th>
                        <th colspan="1">Duration</th>
                        <th colspan="7">Character</th>
                        <th colspan="1">Radiation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="date" class="form-control border-secondary border-2" id="date" name="date">
                        </td>
                        <td>
                            <input type="time" class="form-control border-secondary border-2" id="time" name="time">
                        </td>
                        <td>
                            <input type="text" class="form-control border-secondary border-2" id="score" name="score">
                        </td>
                        <td>
                            <input type="text" class="form-control border-secondary border-2" id="location" name="location">
                        </td>
                        <td>
                            <input type="time" class="form-control border-secondary border-2" id="duration" name="duration">
                        </td>
                        <td>
                            <label class="control-label">Dull</label>
                            <input type="checkbox" class="form-control" id="character" name="character" value="Dull">
                        </td>
                        <td>
                            <label class="control-label">Achy</label>

                            <input type="checkbox" class="form-control" id="character" name="character" value="Achy">
                        </td>
                        <td>
                            <label class="control-label">Sharp</label>
                            <input type="checkbox" class="form-control" id="character" name="character" value="Sharp">
                        </td>
                        <td>
                            <label class="control-label">Stabbing</label>

                            <input type="checkbox" class="form-control" id="character" name="character" value="Stabbing">
                        </td>
                        <td>
                            <label class="control-label">Shooting</label>
                            <input type="checkbox" class="form-control" id="character" name="character" value="Shooting">
                        </td>
                        <td>
                            <label class="control-label">Burning</label>

                            <input type="checkbox" class="form-control" id="character" name="character" value="Burning">
                        </td>
                        <td>
                            <label class="control-label">Other</label>
                            <input type="checkbox" class="form-control" id="character" name="character" value="Other">
                        </td>
                        <td>
                            <input type="text" class="form-control border-secondary border-2" id="radiation" name="radiation">
                        </td>
                    </tr>
                </tbody>
            </table>
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-10">
                        <!-- Your form elements go here -->
                    </div>
                    <div class="col-lg-2" >
                        <input class="form-control" type="button"  
                                style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD"
                                onclick="add_record()">
                    </div>
                </div>
                <div class="row" style="margin-top:10px; padding: 30px;">
                <table class="table"name="Table" style="border: 1px solid #e9ecef;margin: 0px;">
                    <thead>
                        <tr>
                            <th style="border-right: 1px solid white;">Date</th>
                            <th style="border-right: 1px solid white;">Time</th>
                            <th style="border-right: 1px solid white;">Pain Score</th>
                            <th style="border-right: 1px solid white;">Location</th>
                            <th style="border-right: 1px solid white;">Duration</th>
                            <th style="border-right: 1px solid white;">Character</th>
                            <th style="border-right: 1px solid white;">Radiation</th>
                            <th style="border-right: 1px solid white;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="assessment_list">
                    </tbody>
                </table>
            </div>
        </fieldset>
    </form>
</div>
<?php include_once  APPPATH . 'views/footer.php'; ?>
<script type="text/javascript">
     

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

    var tableData = [];
    function add_record() {
    var dateText = $("#date").val();
    var timeText = $("#time").val();
    var scoreText = $("#score").val();
    var locationText = $("#location").val();
    var durationText = $("#duration").val();
    var characterText = $("#character:checked").map(function() {
        return $(this).val();
    }).get().join(', ');
    var radiationText = $("#radiation").val();

    if (dateText && timeText && scoreText && locationText && durationText && characterText && radiationText) {
        var assessment_all = [dateText, timeText, scoreText, locationText, durationText, characterText, radiationText];
        tableData.push(assessment_all);
        var html = '<tr style="font-size: 18px;">\
                        <td style="border-right:1px solid lightgray">' + dateText + '</td>\
                        <td style="border-right:1px solid lightgray">' + timeText + '</td>\
                        <td style="border-right:1px solid lightgray">' + scoreText + '</td>\
                        <td style="border-right:1px solid lightgray">' + locationText + '</td>\
                        <td style="border-right:1px solid lightgray">' + durationText + '</td>\
                        <td style="border-right:1px solid lightgray">' + characterText + '</td>\
                        <td style="border-right:1px solid lightgray">' + radiationText + '</td>\
                        <td style="border-right:1px solid lightgray">\
                            <i class="fa fa-trash delete_record" style="color:red;font-size:20px;margin: 0px 10px;"></i>\
                        </td>\
                    </tr>';
        $('#assessment_list').append(html);

        $('#date').val("");
        $('#time').val("");
        $('#score').val("");
        $('#location').val("");
        $('#duration').val("");
        $('.character').prop('checked', false);
        $('#radiation').val("");
    } else {
        alert("Please select values for all fields.");
    }
}
attachTableEvents();

</script>