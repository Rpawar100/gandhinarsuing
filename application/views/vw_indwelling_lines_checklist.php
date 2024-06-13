<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
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
#title{
    text-align: center;
    margin-left: 450px;
}
</style>
<div class="container">
    <form method="post" enctype="multipart/form-data" name="nursing_care_plan"id="nursing_care_plan">
        <div class="row">
            <label class="control-label" id="title"><h2>INDWELLING LINES CHECKLIST</h2></label>
        </div>
    	
        <fieldset style="border: 2px solid #333; border-radius: 10px;  padding: 10px;  width: 100%; ">
            <div class="row" style="margin-top:10px;margin-left:10px ;font-size: 16px;">
                <div class="col-lg-3">
                    <label class="control-label"><b>Select Indwelling</b></label>
                </div>
                
                <div class="col-lg-3">
                    <label class="control-label"><b>Date Of Insertion</b>
                </div>
               
                <div class="col-lg-3">
                    <label class="control-label"><b>Due for Change</b>
                </div>
            </div>
            <div class="row" style="margin-left:10px">
               <div class="col-lg-3">
                    <select class="form-control border-secondary border-2" name=" Select_indwelling" id="Select_indwelling">
                        <option>IV CENNULA</option>
                        <option>FOLEY'S CATHETER</option>
                        <option>RYLE'S TUBE</option>
                        <option>CENTRAL LINE</option>
                        <option>ENDOTRACHEAL TUBE</option>
                        <option>TRACHEOSTOMY TUBE</option>
                        <option>ARTERIAL LINE</option>
                        <option>Other</option>
                    </select>     
                </div>
                <div class="col-lg-3">
                    <input type="date" class="form-control border-secondary border-2" name="insertion_date" id="insertion_date">
                </div>
                <div class="col-lg-3">
                    <input type="date" class="form-control border-secondary border-2" name="change_date" id="change_date">
                </div> 
                <div class="col-lg-2">
                    <input class="form-control" type="button"  
                            style="width:100px;height:40px;background-color:#1ab394;color:white;" value="ADD"
                            onclick="add_record()">
                </div>
            </div>
            <div class="row" style="margin-top:20px; padding: 30px;">
                <table class="table"name="Table" style="border: 1px solid #e9ecef;margin: 0px;">
                    <thead>
                        <tr>
                            <th style="border-right: 1px solid white;">Indwelling Name</th>
                            <th style="border-right: 1px solid white;">Date Of Insertion</th>
                            <th style="border-right: 1px solid white;">Due for Change</th>
                            <th style="border-right: 1px solid white;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="indwelling_list">
                    </tbody>
                </table>
            </div>
        </fieldset>
    </form>
</div>
<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
    function attachTableEvents() {
    console.log("Attaching table events...");

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
    var indwellingText = $("#Select_indwelling").val();
    var insertText = $("#insertion_date").val();
    var dueText = $("#change_date").val();
    if (indwellingText && insertText && dueText) {        
        if (isDuplicate(indwellingText)) {
            alert("Duplicate Equipment!");                        
        } else{
                var indwelling_all = [indwellingText, insertText, dueText];
                tableData.push(indwelling_all);
                var html = '<tr style="font-size: 18px;">\
                                <td style="border-right:1px solid lightgray">' + indwellingText + '</td>\
                                <td style="border-right:1px solid lightgray">' + insertText + '</td>\
                                <td style="border-right:1px solid lightgray">' + dueText + '</td>\
                                <td style="border-right:1px solid lightgray">\
                                <i class="fa fa-trash delete_record" style="color:red;font-size:20px;margin: 0px 10px;"></i>\
                                </td>\
                            </tr>';
                $('#indwelling_list').append(html);
                $('#indwellingText').val("");
                $('#insertText').val("");
                $('#dueText').val("");
            }
        
        }
    else{
        alert("Please select values for all fields.");
    }
}
attachTableEvents();
function isDuplicate(indwellingText) {
    for (var i = 0; i < tableData.length; i++) {
        if (tableData[i][1] === indwellingText) {    
            return true;
        }
    }
    return false;
}

</script>