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
   <form method="post" enctype="multipart/form-data" name="restraint_monitoring"id="restraint_monitoring">
        <div class="row">
            <label class="control-label" id="title"><h2>UTI BUNDLE CHECKLIST</h2></label>
        </div>
        <div class="row">
            <div class="col-lg-1">
                <label class="control-label"><b>IP No.:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="ip_no" id="ip_no" >
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Date Of Admission:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="date"  class="form-control border-secondary border-2"  name="date" id="date">
            </div>
             <div class="col-lg-1">
                <label class="control-label"><b>Location:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text"  class="form-control border-secondary border-2"  name="Location" id="Location">
            </div>
        </div>
        <table>
            <tbody>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Date</label>
                    </td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Catheter Day</label>
                    </td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                </tr>
                 <tr>
                    <td colspan="3">
                        <label class="control-label">Shift</label>
                    </td>
                    <td >M</td>
                    <td>E</td>
                    <td >N</td>
                    <td >M</td>
                    <td >E</td>
                    <td >N</td>
                    <td >M</td>
                    <td >E</td>
                    <td >N</td>
                    <td >M</td>
                    <td >E</td>
                    <td >N</td>
                    <td >M</td>
                    <td >E</td>
                    <td >N</td>
                    <td >M</td>
                    <td >E</td>
                    <td >N</td>
                    <td >M</td>
                    <td >E</td>
                    <td >N</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Any kinking or leakage</label>
                    </td>
                    <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                <tr>
                    <td colspan="3">
                       <label class="control-label">Collection bag below  bladder level</label>
                    </td>
                     <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                 <tr>
                    <td colspan="3">
                        <label class="control-label">Catheter secured at mid thigh</label>
                    </td>
                     <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                 <tr>
                    <td colspan="3">
                        <label class="control-label">Catheter care Performed</label>
                    </td>
                     <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                 <tr>
                    <td colspan="3">
                        <label class="control-label">Collection  bag emptied at regular intervals</label>
                    </td>
                     <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Hand hygiene performed before & after  handling catheter</label>
                    </td>
                     <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>        
                </tr>\
                <tr>
                    <td colspan="3">
                        <label class="control-label">Action:Request Removal / Leave in situ</label>
                    </td>
                    <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                <tr>
                    <td colspan="3"> 
                        <label class="control-label">Staff ID & Sign</label>
                    </td>
                    <td ></td>
                    <td></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
            </tbody>
        </table>
   </form>
</div>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
</script>