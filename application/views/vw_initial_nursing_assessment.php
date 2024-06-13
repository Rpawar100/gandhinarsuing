<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<style>
    table {
    width: 100%;
    border: 1px solid black;
    margin-top: 20px;
   padding: 20px;
   margin-right: 10px;
   margin-left: 10px;
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
    input[type="checkbox"] {
      transform: scale(1.5);
      margin-right: 10px; 
      font-size: 16px;
    }
    label{
        font-size: 16px;
        font-weight: bolder;
    }
    
</style>
<form method="post" enctype="multipart/form-data" name="initial_nursing_assesment"id="initial_nursing_assesment">
    <div class="container">
   	    <div class="row">
            <div class="col-lg-12" style="padding-bottom: 5px;">
                <h2 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px dotted darkgrey;">
                    <b>  INITIAL NURSING ASSESSMENT </b>
                </h2>
            </div>
        </div>
        <div class="row">
            <table >
                <tbody>
                    <tr>
                        <td colspan="6">
                            <label class="control-label">On Arrival Received by(Name Of Staff):</label>
                        </td>
                        <td colspan="6">
                            <input type="text" class="form-control border border-secondary border-2" name="name_of_staff" id="name_of_staff">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                           <label class="control-lable">Arrival by:</label> 
                        </td>
                        <td colspan="3">
                            <label style="font-size:16px; margin-right: 10px;">Walk:</label>
                            <input type="checkbox" id="walk" name="walk">
                        </td>
                        <td colspan="3">
                            <label style="font-size:16px; margin-right: 10px; ">Strecher:</label>
                            <input type="checkbox" id="strecher" name="strecher">
                        </td>
                        <td colspan="3">
                            <label style="font-size:16px; margin-right: 10px;">Wheel chair:</label>
                            <input type="checkbox" id="wheel_chair" name="wheel_chair">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="control-label">Height(cm):</label>
                        </td>
                        <td colspan="2">
                            <input type="text" class="form-control border border-secondary border-2" name="height" id="height">
                        </td>
                        <td colspan="2">
                            <label class="control-label">Weight(Kg):</label>
                        </td>
                        <td colspan="2">
                            <input type="text" class="form-control border border-secondary border-2" name="weight" id="weight">
                        </td>
                        <td colspan="2">
                            <label class="control-label">(If patient is ambulatory):</label>
                        </td>
                        <td colspan="2">
                            <input type="text" class="form-control border border-secondary border-2" name="ambulatory" id="ambulatory">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <label class="control-label">Vital Signs:</label>
                        </td>
                        <td colspan="7">
                            <input type="text" class="form-control border border-secondary border-2" name="vital_signs" id="vital_signs">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label class="control-label">Temp (F):</label>
                        </td>
                        <td colspan="3">
                            <input type="text" class="form-control border border-secondary border-2" name="temp" id="temp">
                        </td>
                        <td colspan="3">
                            <label class="control-label">Resp (/min):</label>
                        </td>
                        <td colspan="3">
                            <input type="text" class="form-control border border-secondary border-2" name="resp" id="resp">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label class="control-label">Pulse (/min):</label>
                        </td>
                        <td colspan="3">
                            <input type="text" class="form-control border border-secondary border-2" name="pulse" id="pulse">
                        </td>
                        <td colspan="3">
                            <label class="control-label">BP (mmHg):</label>
                        </td>
                        <td colspan="3">
                            <input type="text" class="form-control border border-secondary border-2" name="bp" id="bp">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label class="control-label">Level Of Conscioussness:</label>
                        </td>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Coscious:</label>
                            <input type="checkbox" id="Conscioussness" name="Conscioussness" value="conscious">
                        </td>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Semiconscious:</label>
                            <input type="checkbox" id="Conscioussness" name="Conscioussness" value="Semiconscious">
                        </td>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Uncoscious:</label>
                            <input type="checkbox" id="Conscioussness" name="Conscioussness" value="Uncoscious">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12" >
                           <label class="control-label"style="margin-right: 1050px;">Past History:</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="4">
                             <label class="control-label">A.Medical:</label>
                        </td>
                        <td colspan="8">
                            <input type="text" class="form-control border-secondary border-2" name="medical" id="medical">
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="4">
                             <label class="control-label">B.Surgical:</label>
                        </td>
                        <td colspan="8">
                            <input type="text" class="form-control border-secondary border-2" name="surgical" id="surgical">
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="control-label">History Of Allergy:</label>
                        </td>
                        <td colspan="8">
                            <input type="text" class="form-control border-secondary border-2" name="allergy_history" id="allergy_history">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="control-label">If On Any Medication:</label>
                        </td>
                        <td colspan="8">
                         <input type="text" class="form-control border-secondary border-2" name="medication" id="medication">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <label class="control-label" style="margin-right: 400px;">Pressure sores:</label>
                        </td>
                        <td colspan="2">
                            <label  style="font-size:16px">Yes:</label>
                            <input type="radio" id="Pressure_sores" name="Pressure_sores" value="Yes">
                        </td>
                        <td colspan="2">
                            <label style="font-size:16px">No:</label>
                            <input type="radio" id="Pressure_sores" name="Pressure_sores" value="No">  
                        </td>
                    </tr>
                      <tr>
                        <td colspan="4">
                            <label class="control-label">a)Location:</label>
                        </td>
                        <td colspan="8">
                         <input type="text" class="form-control border-secondary border-2" name="location" id="location">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <label class="control-label">b)Severity:</label>
                        </td>
                        <td colspan="2">
                            <label style="font-size:16px; margin-right: 10px;">Mid:</label>
                            <input type="checkbox" id="Severity" name="Severity" value="Mid">
                        </td>
                        <td colspan="2">
                            <label style="font-size:16px; margin-right: 10px;">Moderate:</label>
                            <input type="checkbox" id="Severity" name="Severity" value="Moderate">
                        </td>
                        <td colspan="2">
                            <label style="font-size:16px; margin-right: 10px;">Severe:</label>
                            <input type="checkbox" id="Severity" name="Severity" value="Severe">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <label class="control-label">c)Size:</label>
                        </td>
                        <td colspan="2">
                            <label style="font-size:16px; margin-right: 10px;">Small:</label>
                            <input type="checkbox" id="Size" name="Size" value="Small">
                        </td>
                        <td colspan="2">
                            <label style="font-size:16px; margin-right: 10px;">Medium:</label>
                            <input type="checkbox" id="Size" name="Size" value="Medium">
                        </td>
                        <td colspan="2">
                            <label style="font-size:16px; margin-right: 10px;">Large:</label>
                            <input type="checkbox" id="Size" name="Size" value="Large">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">d)Skin Peeling:</label>
                            <input type="checkbox" id="skin_peeling" name="skin_peeling" value="Skin Peeling">
                        </td>
                        <td colspan="4">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Discolouration:</label>
                             <input type="checkbox" id="discolouration" name="discolouration" value="Discolouration">
                        </td>
                        <td colspan="4">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Abrasion:</label>
                            <input type="checkbox" id="abrasion" name="abrasion" value="Abrasion">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="control-label">Any Deformities:</label>
                        </td>
                        <td colspan="8">
                           <input type="text" class="form-control border-secondary border-2" name="deformities" id="deformities">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Dentures:</label>
                            <input type="checkbox" id="dentures" name="dentures" value="Dentures">
                        </td>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Contact Lenses:</label>
                            <input type="checkbox" id="contact_lenses" name="contact_lenses" value="Contact Lenses">
                        </td>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Artificial limbs:</label>
                            <input type="checkbox" id="artificial_limbs" name="artificial_limbs" value="Artificial limbs">
                        </td>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Implants:</label>
                            <input type="checkbox" id="implants" name="implants" value="Implants">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"rowspan="2">
                            <label class="control-label">On:</label>
                        </td>
                        <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Ryle's Tube:</label>
                            <input type="checkbox" id="On" name="On" value="Ryle's Tube">
                        </td> 
                         <td colspan="3">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Gastro Jejunostomy feed:</label>
                            <input type="checkbox" id="On" name="On" value="Gastro Jejunostomy feed">
                        </td> 
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Central Line:</label>
                            <input type="checkbox" id="On" name="On " value="Central Line">
                        </td>
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Arterial Line:</label>
                            <input type="checkbox" id="On" name="On" value="Arterial Line">
                        </td>     
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Tracheostomy:</label>
                            <input type="checkbox" id="On" name="On" value="Tracheostomy">
                        </td> 
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Intubated:</label>
                            <input type="checkbox" id="On" name="On" value="Intubated">
                        </td>
                         <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Fistula:</label>
                            <input type="checkbox" id="On" name="On" value="Fistula">
                        </td> 
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Foley's Cath:</label>
                            <input type="checkbox" id="On" name="On " value="Foley's Cath">
                        </td>
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Colostomy:</label>
                            <input type="checkbox" id="On" name="On" value="Colostomy">
                        </td>     
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="control-label" style="margin-right:100px;">Nutritional Assessment:</label>
                        </td>
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Poor:</label>
                            <input type="checkbox" id="nutritional_status" name="nutritional_status" value="Poor">
                        </td>
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Moderate:</label>
                            <input type="checkbox" id="nutritional_status" name="nutritional_status" value="Moderate">
                        </td>
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Well built:</label>
                            <input type="checkbox" id="nutritional_status" name="nutritional_status" value="Well built">
                        </td>
                        <td colspan="2">
                            <label class="control-label"style="font-size:16px; margin-right: 10px;">Obese:</label>
                            <input type="checkbox" id="nutritional_status" name="nutritional_status" value="Obese">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <label class="control-label" style="margin-right:500px;">Assessment Completion Time:</label>
                        </td>
                        <td colspan="4">
                            <input type="time" class="form-control border-secondary border-2" name="time" id="time">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label class="control-label">Name:</label>
                        </td>
                        <td colspan="4">
                            <input type="text" class="form-control border-secondary border-2" name="name" id="name">
                        </td>
                        <td colspan="2">
                            <label class="control-label">Signature:</label>
                        </td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>
<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
</script>