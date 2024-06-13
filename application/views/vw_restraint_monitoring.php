<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<style>
    table {
    width: 95%;
    border: 1px solid black;
    margin-top: 20px;
    margin-left: 30px;
   padding: 30px;
}
th,
td {
    
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}
.container {
  width: 110%;
  max-width: 1200px; 
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
        <div class="row" style="margin-left:10px;">
            <label class="control-label" id="title"><h2>RESTRAINT MONITORING</h2></label>
        </div>
        <div class="row"style="margin-left:10px;">
            <div class="col-lg-2">
                <label class="control-label"><b>Device Applied:</b></label>
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control border-secondary border-2" name="divice_applied" id="divice_applied" >
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Date:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="date"  class="form-control border-secondary border-2"  name="date" id="date">
            </div>
             <div class="col-lg-1">
                <label class="control-label"><b>Time:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="time"  class="form-control border-secondary border-2"  name="time" id="time">
            </div>
        </div>
        <div class="row" style="margin-top: 10px; margin-left: 10px;">
            <div class="col-lg-2">
                <label class="control-label"><b>New Order Required:</b></label>
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control border-secondary border-2" name="order_required" id="order_required" >
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Date:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="date"  class="form-control border-secondary border-2"  name="date" id="date">
            </div>
             <div class="col-lg-1">
                <label class="control-label"><b>Time:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="time"  class="form-control border-secondary border-2"  name="time" id="time">
            </div>
        </div>
        <div class="row " style="margin-top:20px">
            <label class="control-label" id="title"><h3>Patient Care & Outgoing Monitoring</h3></label>
            <table>
                <tbody>
                    <tr>
                        <td ></td>
                        <td colspan="5">am</td>
                        <td colspan="12">pm</td>
                        <td colspan="7">am</td>
                    </tr>
                    <tr>
                        <td ></td>
                        <td>08</td>
                        <td>09</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>01</td>
                        <td>02</td>
                        <td>03</td>
                        <td>04</td>
                        <td>05</td>
                        <td>06</td>
                        <td>07</td>
                        <td>08</td>
                        <td>09</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>01</td>
                        <td>02</td>
                        <td>03</td>
                        <td>04</td>
                        <td>05</td>
                        <td>06</td>
                        <td>07</td>

                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="position" name="position">Position</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="circulation" name="circulation">Circulation</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="integrity" name="integrity">Skin Integrity</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>  
                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="temperature" name="temperature">Temperature</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="fluid_needs" name="fluid_needs">Fluid Needs</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td> 
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label" id="toileting_needs" name="toileting_needs">Toileting Needs</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="nutrition_offerd" name="nutrition_offerd">Nutrition Offered</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label" id="restraint_removal" name="restraint_removal">Eval Restraint Removal</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="restraint_status" name="restraint_status">Restraint Status + on-off</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label" id="chatheter_check" name="chatheter_check">Catheter Check</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td >
                            <label class="control-label" id="oedema" name="oedema">Oedema</label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12" style="margin-top:15px;margin-left: 10px;">
                <label class="control-label"><b>Documentation Standards</b></label>
                <label class="control-label">Documentation of assessment/care/monitoring is completed by entering a tick mark when the following criteria are met. If criteria not met, an asterist (*) is entered and a note written. Assessment is ongoing; documentation is required at least every two hours.
                </label>
                <label class="control-label"><b>Position:</b> Proper alignment of the restrained limb is maintained.
                </label><br>

                <label class="control-label"><b>Circulation:</b>Nail bed blanches in less than 3 seconds and pulse present above and below restraint
                </label>

                <label class="control-label"><b>Fluid Needs: </b>Fluids administered as per physician order (oral or parenteral). If patient is not on restriction; fluids offered every hour. If the patient is NBM, oral care provided 4 hourly
                </label>

                <label class="control-label"><b>Toileting Needs: </b>Elimination needs attended to, either by foley catheter (only if orderd for other medical necessity) or by offeting bed pan or assistance to bathroom/bedside commode chair.
                </label>

                <label class="control-label"><b>Nutrition Offered:</b>Nutritional Needs met as per physician order, if oral intake allowed, patient offered and assisted with meals and snacks.
                </label>

                <label class="control-label"><b>Skin Integrity:</b>Skin integrity around / under the device and at all bony prominence indicates no pressure or reddened areas developed. 
                </label>

                <label class="control-label"><b>Temperature: </b>Patient's skin comfortable to the touch, patient temperature checked as per physician orders, and room temperature maintained as appropriate to patient's condition. 
                </label>

                <label class="control-label"><b>Evaluation for reduction or removal:</b>The use of restraint is evaluated frequently(at least every 2 hours) and ended at the earliest at the earliest possible time.
                </label>
        </div>
        <table>
            <tbody>
                <tr>
                    <td colspan="1">
                        <label class="control-label" id="morning_duty_name">Morning duty name of staff nurse</label>
                    </td>
                    <td colspan="2">
                        <label class="control-label">Sign.</label>
                    </td>
                    <td colspan="1">
                        <label class="control-label">Afternoon duty name of staff nurse</label>
                    </td>
                     <td colspan="2">
                        <label class="control-label">Sign.</label>
                    </td>
                     <td colspan="1">
                        <label class="control-label">Eveningn duty name of staff nurse</label>
                    </td>
                     <td colspan="2">
                        <label class="control-label">Sign.</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="1">cszfsd</td>
                    <td colspan="2">daddghdfhdhhhdfh</td>
                    <td colspan="1">dssdf</td>
                    <td colspan="2">dsdcczczzzcxzccz</td>
                    <td colspan="1">gdgdgdg</td>
                    <td colspan="2">dddsczcczzzczczcz</td>
                </tr>
                <tr>
                    <td colspan="1">
                        <label class="control-label">Sign of sister in charge of the ward:</label>
                    </td>
                    <td colspan="7"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
</script>