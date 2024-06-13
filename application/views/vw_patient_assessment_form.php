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

th {
    background-color: #FFD580;
}

input[type="checkbox"] {
    transform: scale(1.5);
    margin-right: 10px;
    font-size: 16px;
}
#a{ margin-left: 10px;
	height:140%;
	width:112%;
}

.container {
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
<form method="post" enctype="multipart/form-data" name="patient_assessment_form" id="patient_assessment_form">
    <div class="container">
        <div class="row"style=" background-color: #FFD580;margin-left: 5px;margin-right: 5px;">
            <div class="col-lg-3 border border-secondary border-2">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-control" style="margin-top: 5px;"><b>DATE:</b></label>
                    </div>
                    <div class="col-lg-8">
                        <input type="date" class="form-control border border-secondary border-2" name="date" id="date"
                            style="margin-top: 5px;">
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-4">
                        <label class="form-control"><b>PHYSIO:</b></label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control border border-secondary border-2" name="physio"
                            id="physio" style="margin-top: 5px;">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 "style="padding: 15px;">
                <div class="row">
                    <label class="form-control" style="text-align: center;border:0px;">
                        <h2><b>Patient Assessment Form </b></h2>
                    </label>
                </div>
                <div class="row">
                    <label class="form-control" style="text-align: center;border:0px; margin-top: 0px;">
                        <h2><b>GENERAL</b></h2>
                    </label>
                </div>
            </div>
            <div class="col-lg-5 border border-secondary border-2">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-control" style="margin-top: 5px;"><b>PATIENT NAME:</b></label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control border border-secondary border-2" name="pname" id="pname"
                            style="margin-top: 5px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-control" style="margin-top: 5px;"><b>F/Name:</b></label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control border border-secondary border-2" name="fname" id="fname"
                            style="margin-top: 5px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-control" style="margin-top: 5px;"><b>REGISTRATION NO.:</b></label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control border border-secondary border-2" name="rno" id="rno"
                            style="margin-top: 5px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row"style="margin-top: 10px; margin-left: 5px;margin-right: 5px;">
            <div >
                <label class="control-label"><h3>PATIENT HISTORY :</h3></label>
                <table >
                    <tbody>
                        <tr style=" background-color: #FFD580;">
                            <th>
                                <label class="form-control" style="margin-top: 5px;">ADDRESS(Province-Distric):</label>
                            </th>
                            <td >
                                <input type="text" class="form-control border border-secondary border-2" name="address"
                                    id="address" style="margin-top: 5px;">
                            </td>

                            <th colspan="6">
                                <label class="form-control" style="margin-top: 5px;">PHONE NO.:</label>
                            </th>
                            <td colspan="4">
                                <input type="text" class="form-control border border-secondary border-2" name="phno"
                                    id="phno" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control" style="margin-top: 5px;"><b>Patient Age:</b></label>
                            </td>
                            <td>
                                <input type="text" class="form-control border border-secondary border-2" name="age"
                                    id="age">
                            </td>
                            <td colspan="4">
                                <label style="font-size:16px">M:</label>
                                <input type="radio" id="Gender" name="Gender" value="Male">
                                <label style="font-size:16px">F:</label>
                                <input type="radio" id="Gender" name="Gender" value="Female">
                            </td>
                            <td colspan="2">
                                <label class="form-control"><b>Diagnosis:</b></label>
                            </td>
                            <td colspan="4">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="diagnosis" id="diagnosis">
                            </td>
                        </tr>
                        <tr>
                            <td><b>1.</b></td>
                            <td colspan="2">
                                <label class="form-control"><b>Civil Status:</b></label>
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Single:</label>
                                <input type="radio" id="status" name="status" value="Single">
                                <label style="font-size:16px">Married:</label>
                                <input type="radio" id="status" name="status" value="Married">
                            </td>
                            <td colspan="3">
                                <label class="form-control">No.OF Childrens :</label>

                            </td>
                            <td colspan="3">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="childrens" id="childrens">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2"><b>2.</b></td>
                            <td colspan="2" rowspan="2">
                                <label class="form-control"><b>Job & Occupations:</b></label>
                            </td>
                            <td colspan="2">

                                <label style="font-size:16px">Armed Force:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Armed Force">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Farmer, FishMan:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Farmer, FishMan">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Non Qualified Worker:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Non Qualified Worker">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Technician:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Technician">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label style="font-size:16px">Office workers:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Office workers">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Retired:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Retired">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Unemployed & not active:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Unemployed & not active">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Student:</label>
                                <input type="checkbox" id="occupations" name="occupations" value="Student">
                            </td>
                        </tr>
                        <tr>
                            <td><b>3</b></td>
                            <td colspan="2">
                                <label class="form-control" style="margin-top: 5px;"><b>Education level:</b></label>

                            </td>
                            <td colspan="2">

                                <label style="font-size:16px">Can write:</label>
                                <input type="radio" id="education" name="education" value="Single">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Can read:</label>
                                <input type="radio" id="education" name="education" value="Married">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Class:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2" name="class"
                                    id="class">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <b>4</b>
                            </td>
                            <td colspan="2">
                                <label class="form-control" style="margin-top: 5px;"><b>History of the trauma/illness
                                        :</b></label>
                            </td>
                            <td colspan="2">
                                <label class="form-control" style="margin-top: 5px;">date:</label>
                            </td>
                            <td colspan="2">
                                <input type="date" class="form-control border border-secondary border-2" name="date"
                                    id="date" style="margin-top: 5px;">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Circumstances/Etiology:</label>
                            </td>
                            <td colspan="2">
                                <textarea class="form-control border border-secondary border-2" name="circumstances"
                                    id="circumstances"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <label class="form-control" style="margin-top: 5px;"><b>Associated diseases
                                        :</b></label>
                            </td>
                            <td colspan="4">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="circumstances" id="circumstances">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3"><b>5</b></td>
                            <td colspan="2">
                                <label class="form-control"><b>Medical History/Treatment:</b></label>

                            </td>
                            <td colspan="2">
                                <label class="form-control">Hospital::</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2" name="hospital"
                                    id="hospital">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Care:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2" name="care"
                                    id="care">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Evolution since the beginning:</label>

                            </td>
                            <td colspan="2">

                                <label style="font-size:16px">Improved:</label>
                                <input type="radio" id="evolution" name="evolution" value="Improved">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Worse:</label>
                                <input type="radio" id="evolution" name="evolution" value="Worse">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Remark:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2" name="remark"
                                    id="remark">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label style="font-size:16px">Medication::</label>
                            </td>
                            <td colspan="4">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="medication:" id="medication">
                            </td>
                            <td colspan="2">
                                <label class="form-control">X-ray/Other ex::</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2" name="xray"
                                  id="xray">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="11"><b>6</b></td>
                            <td colspan="10">
                                <label class="form-control"><b>Psychological Status:</b></label>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Motivation/Emotional Status:</label>
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="emotional_status" name="emotional_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="emotional_status" name="emotional_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="emotional_comments" id="emotional_comments">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Attitude/Compliance:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="attitude_status" name="attitude_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="attitude_status" name="attitude_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="attitude_comments" id="attitude_comments">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="10">
                                <label class="form-control"><b>Cognitive Status and others (Mainly for Neurological
                                        Conditions):</b></label>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Concentration/Memory:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="concentration_status" name="concentration_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="concentration_status" name="concentration_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="concentration_comments" id="concentration_comments">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Communication (understanding, speaking):</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="communication_status" name="communication_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="communication_status" name="communication_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="communication_comments" id="communication_comments">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Bowel/Bladder control:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="bowel_control_status" name="bowel_control_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="bowel_control_status" name="bowel_control_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="bowel_control_comments" id="bowel_control_comments">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Swallowing:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="swallowing_status" name="swallowing_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="swallowing_status" name="swallowing_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="swallowing_comments" id="swallowing_comments">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Breathing (ability to cough):</label>
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="breathing_status" name="breathing_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="breathing_status" name="breathing_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="breathing_comments" id="breathing_comments">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Vision:</label>
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="vision_status" name="vision_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="vision_status" name="vision_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="vision_comments" id="vision_comments">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Hearing:</label>
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="hearing_status" name="hearing_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="hearing_status" name="hearing_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="hearing_comments" id="hearing_comments">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="6"><b>7</b></td>
                            <td colspan="10">
                                <label class="form-control"><b>Living Condition:</b></label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">House:</label>
                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="house_status" name="house_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="house_status" name="house_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="house_comments" id="house_comments">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Environment:</label>
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Rural:</label>
                                <input type="checkbox" id="environment" name="environment" value="Rural">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Urban:</label>
                                <input type="checkbox" id="environment" name="environment" value="Urban">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Mountain:</label>
                                <input type="checkbox" id="environment" name="environment" value="Mountain">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Flooded fields:</label>
                                <input type="checkbox" id="environment" name="environment" value="Flooded fields">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Family:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="family_status" name="family_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="family_status" name="family_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="family_comments" id="family_comments">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Friends:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="friend_status" name="friend_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="friend_status" name="friend_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="friend_comments" id="friend_comments">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Cultural Environment:</label>

                            </td>
                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="cultural_status" name="cultural_status" value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="cultural_status" name="cultural_status" value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="cultural_comments" id="cultural_comments">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4"><b>8</b></td>
                            <td colspan="10">
                                <label class="form-control"><b>Medical and Social Support:</b></label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Accessibility to Medical Services:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="medical_services_status" name="medical_services_status"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="medical_services_status" name="medical_services_status"
                                    value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="medical_services_comments" id="medical_services_comments">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Accessibility to Social Services:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="social_services_status" name="social_services_status"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="social_services_status" name="social_services_status"
                                    value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="social_services_comments" id="social_services_comments">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="form-control">Security Situation:</label>

                            </td>

                            <td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="security_situation_status" name="security_situation_status"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="security_situation_status" name="security_situation_status"
                                    value="Bad">
                            </td>
                            <td colspan="2">
                                <label class="form-control">Comments:</label>

                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control border border-secondary border-2"
                                    name="security_situation_comments" id="security_situation_comments">
                            </td>

                        </tr>
                        <tr>
                            <td><b>9</b></td>
                            <td colspan="5">
                                <label class="form-control"><b>Main patient’s concerns:</b></label>

                            </td>
                            <td colspan="5">
                                <input type="text" class="form-control border border-secondary border-2" name="concerns"
                                    id="concerns">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2"><b>10</b></td>
                            <td colspan="10">
                                <label class="form-control"><b> Main patient’s expectations:</b></label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <label class="form-control"><b> Current Treatment::</b></label>
                            </td>
                            <td colspan="1">
                                <label class="form-control"><b>1st:</b></label>

                            </td>
                            <td colspan="1">
                                <input type="text" class="form-control border border-secondary border-2" name="concerns"
                                    id="concerns">
                            </td>
                            <td colspan="1">
                                <label class="form-control"><b>2nd:</b></label>

                            </td>
                            <td colspan="1">
                                <input type="text" class="form-control border border-secondary border-2" name="concerns"
                                    id="concerns">
                            </td>
                            <td colspan="1">
                                <label class="form-control"><b>3rd:</b></label>

                            </td>
                            <td colspan="1">
                                <input type="text" class="form-control border border-secondary border-2" name="concerns"
                                    id="concerns">
                            </td>
                        </tr>

                    </tbody>
                </table>
                
            </div>
        </div>
         <div class="row" style="margin-top:10px ;margin-left:7px;margin-right: 5px;">
	            <label ><h3>Remark:</h3></label>
	            <textarea class="form-control border border-secondary border-2" id="range_motion_remark"name="range_motion_remark" ></textarea>
	    </div>
        <div class="row"style="margin-top:10px;margin-left: 5px;margin-right: 5px;">
            <div style="margin-top: 10px;">
                <label class="control-label"><b>PHYSICAL EXAMINATION :</b></label>
                <div>
                    <img src="<?=base_url()?>/assets/images/PhysicalExamination.jpg" id="a">
                </div>
                <div class="col-lg-12" style="margin-top:10px">
		            
	           </div>
            </div>
        </div>
        <div class="row"style="margin-top:10px;margin-left: 7px;margin-right: 5px;">
        	<label ><h3>Remark:</h3></label>
	            <textarea class="form-control border border-secondary border-2" id="range_motion_remark"name="range_motion_remark" ></textarea>
        </div>
        <div class="row">
                <div class="col-lg-6">
                    <label class="control-label" style="margin-top:5px;">
                        <h3>Skin & soft tissues problem:</h3>
                    </label>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="1">DISORDERS</th>
                                <th colspan="1">Minor</th>
                                <th colspan="1">Important</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="control-label">Swelling:</label>
                                </td>
                                <td>

                                    <input type="checkbox" id="Swelling" name="Swelling" value="Minor">
                                </td>
                                <td>

                                    <input type="checkbox" id="Swelling" name="Swelling" value="Important">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Callus:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="Callus" name="Callus" value="Minor">
                                </td>
                                <td>

                                    <input type="checkbox" id="Callus" name="Callus" value="Important">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Scar:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="Scar" name="Scar"value="Minor" >
                                </td>
                                <td>

                                    <input type="checkbox" id="Scar" name="Scar" value="Important">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Wound:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="Wound" name="Wound" value="Minor">
                                </td>
                                <td>
                                    <input type="checkbox" id="Wound" name="Wound" value="Important">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Temperature:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="Temperature" name="Temperature" value="Minor">
                                </td>
                                <td>
                                    <input type="checkbox" id="Temperature" name="Temperature" value="Important">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Infection:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="Infection" name="Infection" value="Minor">
                                </td>
                                <td>
                                    <input type="checkbox" id="Infection" name="Infection" value="Important">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Pain:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="pain" name="pain" value="Minor">
                                </td>
                                <td>
                                    <input type="checkbox" id="pain" name="pain" value="Important">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Abnormal Sensation:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="abnormal_sensation" name="abnormal_sensation" value="Minor">
                                </td>
                                <td>
                                    <input type="checkbox" id="abnormal_sensation" name="abnormal_sensation" value="Important">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <label class="control-label" style="margin-top:5px;">
                        <h3>Sensation:</h3>
                    </label>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="1">Sensitivity</th>
                                <th colspan="1">R</th>
                                <th colspan="1">L</th>
                                <th colspan="1">Specification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="control-label">Superficial:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="superficial_r" name="superficial_r" value="">
                                </td>
                                <td>
                                    <input type="checkbox" id="superficial_l" name="superficial_l" value="L">
                                </td>
                                <td>
                                    <input type="text" class="form-control border border-secondary border-2"
                                        name="superficial_specification" id="superficial_specification">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Deep:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="deep_r" name="deep_r" value="R">
                                </td>
                                <td>
                                    <input type="checkbox" id="deep_l" name="deep_l" value="L">
                                </td>
                                <td>
                                    <input type="text" class="form-control border border-secondary border-2"
                                        name="deep_specification" id="deep_specification">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Numbness:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="numbness_r" name="numbness_r" value="R">
                                </td>
                                <td>
                                    <input type="checkbox" id="numbness_l" name="numbness_l" value="L">
                                </td>
                                <td>
                                    <input type="text" class="form-control border border-secondary border-2"
                                        name="numbness_specification" id="numbness_specification">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Paresthesia:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="paresthesia_r" name="paresthesia_r" value="R">
                                </td>
                                <td>
                                    <input type="checkbox" id="paresthesia_l" name="paresthesia_l" value="L">
                                </td>
                                <td>
                                    <input type="text" class="form-control border border-secondary border-2"
                                        name="paresthesia_specification" id="paresthesia_specification">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Other:</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="other_r" name="other_r" value="R">
                                </td>
                                <td>
                                    <input type="checkbox" id="other_l" name="other_l" value="L">
                                </td>
                                <td>
                                    <input type="text" class="form-control border border-secondary border-2"
                                        name="other_specification" id="other_specification">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="row" style="margin-top:10px">
                    <div class="col-lg-12">
                        <label class="control-label">
                            <h3>Reflexes:</h3>
                        </label>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="1"></th>
                                    <th colspan="3">R</th>
                                    <th colspan="3">L</th>
                                    <th colspan="1">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label class="control-label">BTR:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td>
                                        <input type="text" class="form-control border border-secondary border-2"
                                            name="btr_comment" id="btr_comment">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">TTR:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td>
                                        <input type="text" class="form-control border border-secondary border-2"
                                            name="ttr_comment" id="ttr_comment">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">KTR:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td>
                                        <input type="text" class="form-control border border-secondary border-2"
                                            name="ktr_comment" id="ktr_comment">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">ATR:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td>
                                        <input type="text" class="form-control border border-secondary border-2"
                                            name="atr_comment" id="atr_comment">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">Babinsky:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td><label class="control-label">+</label></td>
                                    <td><label class="control-label">-</label></td>
                                    <td><label class="control-label">Normal:</label></td>
                                    <td>
                                        <input type="text" class="form-control border border-secondary border-2"
                                            name="babinsky_comment" id="babinsky_comment">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        </div>
        <div class="row"style="margin-top:10px;margin-left: 5px;margin-right: 5px;">
            <div style="margin-top: 10px;margin-right: 5px;">
                <div>
                    <img src="<?=base_url()?>/assets/images/body_chard_of_pain.jpg" id="a">
                </div>  
            </div>   
        </div>
        <div class="row" style="margin-top:10px ;margin-left:7px;margin-right: 5px;">
	            <label ><h3>Remark:</h3></label>
	            <textarea class="form-control border border-secondary border-2" id="range_motion_remark"name="range_motion_remark" ></textarea>
	    </div>
        <div class="row" style="margin-top:10px; margin-left: 5px;margin-right: 5px;">
            <div class="col-lg-12">
                <label class="control-label">
                    <h3>Pain:</h3>
                </label>
             </div>
	                    <fieldset style="border: 2px solid #333; border-radius: 10px;  padding: 10px;  width: 100%; ">
	                        <div class="row" style="margin-top:5px">
	                            <div class="col-lg-6">
	                                <label class="control-label">Date of first complaints:</label>
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control border-secondary border-2"
	                                    name="first_complaints" id="first_complaints">
	                            </div>
	                        </div>
	                        <div class="row"style="margin-top:5px">
	                            <div class="col-lg-6">
	                                <label class="control-label">Evolution since the beginning of the pain :</label>
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control border-secondary border-2"
	                                    name="beginning_of_the_pain" id="beginning_of_the_pain">
	                            </div>
	                        </div>
	                        <div class="row"style="margin-top:5px">
	                            <div class="col-lg-6">
	                                <label class="control-label">Evolution in 24h & scale 0 -10 :</label>
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control border-secondary border-2"
	                                    name="evolution_scale" id="evolution_scale">
	                            </div>
	                        </div>
	                        <div class="row"style="margin-top:5px">
	                            <div class="col-lg-6">
	                                <label class="control-label">Pain	(increase) with :</label>
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control border-secondary border-2"
	                                    name="pain_increase" id="pain_increase">
	                            </div>
	                        </div>
	                         <div class="row"style="margin-top:5px">
	                            <div class="col-lg-6">
	                                <label class="control-label">Pain  ( decrease) with:</label>
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control border-secondary border-2"
	                                    name="pain_decrease" id="pain_decrease">
	                            </div>
	                        </div>
	                    </fieldset>     
        </div>
        <div class="row" style=" margin-left: 5px;margin-right: 5px;">
        	<table>
        		<thead>
        		   <tr>
	        			<th colspan="2" rowspan="2">Patient's category</th>
	        			<th colspan="2">SIN</th>
	        			<th colspan="2">ROM</th>
	        			<th colspan="2">MOMP</th>
	        			<th colspan="2">EOR</th>			
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<tr>
	        			<td colspan="2"></td>
	        			
	        			<td>
                            <label class="control-label">severe,irritable,nature  :</label>
                        </td>
                        <td>
                            <input type="checkbox" id="sin" name="sin" value="SIN">
                        </td>
                        <td>
                            <label class="control-label">: range of motion:</label>
                        </td>
                        <td>
                            <input type="checkbox" id="rom" name="rom" value="ROM">
                        </td>
                        <td>
                            <label class="control-label">end of range :</label>
                        </td>
                        <td>
                            <input type="checkbox" id="momp" name="momp" value="MOMP">
                        </td>
                        <td>
                            <label class="control-label">momentary pain:</label>
                        </td>
                        <td>
                            <input type="checkbox" id="eor" name="eor" value="EOR">
                        </td>
                    </tr>
                </tbody>    
        	</table>
        </div>
        <div class="row"style=" margin-top: 10px;margin-left: 5px;margin-right: 5px;">
        	<div class="col-lg-12">
                <label class="control-label" >
                    <h3>Neurodynamics:</h3>
                </label>
             </div>
             <table>
             	<thead>
             		<tr>
             			<th>Tests</th>
             			<th>R</th>
             			<th>L</th>
             			<th colspan="2">Sensitive component</th>
             		</tr>
             	</thead>
             	<tbody>
             		<tr>
             			<td>
                             <label class="control-label">SLR</label>	
             		    </td>
             		    <td>
                            <input type="checkbox" id="slr" name="slr" value="R">
                        </td>
             		    <td>
                            <input type="checkbox" id="slr" name="slr" value="L">
                        </td>
                        <td>
                        	<input type="text" class="form-control border-secondary border-2"
	                                    name="slr_input" id="slr_input">
                        </td>
             		</tr>
             		<tr>
             			<td>
                             <label class="control-label">Slump</label>	
             		    </td>
             		    <td>
                            <input type="checkbox" id="slump" name="slump" value="R">
                        </td>
             		    <td>
                            <input type="checkbox" id="slump" name="slump" value="L">
                        </td>
                        <td>
                        	<input type="text" class="form-control border-secondary border-2"
	                                    name="slump_input" id="slump_input">
                        </td>
             		</tr>
             		<tr>
             			<td>
                             <label class="control-label">PKB</label>	
             		    </td>
             		    <td>
                            <input type="checkbox" id="pkb" name="pkb" value="R">
                        </td>
             		    <td>
                            <input type="checkbox" id="pkb" name="pkb" value="L">
                        </td>
                        <td>
                        	<input type="text" class="form-control border-secondary border-2"
	                                    name="pkb_input" id="pkb_input">
                        </td>
             		</tr>
             		<tr>
             			<td>
                             <label class="control-label">ULNT1</label>	
             		    </td>
             		    <td>
                            <input type="checkbox" id="ulnt1" name="ulnt1" value="R">
                        </td>
             		    <td>
                            <input type="checkbox" id="ulnt1" name="ulnt1" value="L">
                        </td>
                        <td>
                        	<input type="text" class="form-control border-secondary border-2"
	                                    name="ulnt1_input" id="ulnt1_input">
                        </td>
             		</tr>
             		<tr>
             			<td>
                             <label class="control-label">ULNT2</label>	
             		    </td>
             		    <td>
                            <input type="checkbox" id="ulnt2" name="ulnt2" value="R">
                        </td>
             		    <td>
                            <input type="checkbox" id="ulnt2" name="ulnt2" value="L">
                        </td>
                        <td>
                        	<input type="text" class="form-control border-secondary border-2"
	                                    name="ulnt2_input" id="ulnt2_input">
                        </td>
             		</tr>
             		<tr>
             			<td>
                             <label class="control-label">ULNT3</label>	
             		    </td>
             		    <td>
                            <input type="checkbox" id="ulnt3" name="ulnt3" value="R">
                        </td>
             		    <td>
                            <input type="checkbox" id="ulnt3" name="ulnt3" value="L">
                        </td>
                        <td>
                        	<input type="text" class="form-control border-secondary border-2"
	                                    name="ulnt3_input" id="ulnt3_input">
                        </td>
             		</tr>
             		<tr>
             			<td>
                             <label class="control-label">ULNT4</label>	
             		    </td>
             		    <td>
                            <input type="checkbox" id="ulnt4" name="ulnt4" value="R">
                        </td>
             		    <td>
                            <input type="checkbox" id="ulnt4" name="ulnt4" value="L">
                        </td>
                        <td>
                        	<input type="text" class="form-control border-secondary border-2"
	                                    name="ulnt4_input" id="ulnt4_input">
                        </td>
             		</tr>

             	</tbody>
             </table>
        </div>
        <div class="row"style="margin-left: 7px; margin-top: 10px;">
        	<div class="col-lg-12">
                <label class="control-label" >
                    <h3>Range Of Motion:</h3>
                </label>
            </div>
        </div>
        <div class="row"style=" margin-top: 10px;">
        	<div class="col-lg-12">
            <label style="margin-left: 20px;"><b>• Passive ROM should be recorded during first assessment and before discharging the patients</b></label>
            </div>
            <div class="col-lg-6">
	            <table>
	             	<tbody>
	             		<tr>
	             			<td rowspan="3"style=" background-color: #FFD580;">
	             				<label class="control-label"><b>LOWER LIMB</b></label>
	             			</td>
	             			<td colspan="2">
	             				<label class="control-label"><b>DATE Assessment</b></label>
	             			</td>
	             			<td colspan="2" >
	             				<label class="control-label"><b>DATE Follow UP</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             		</tr>
	             		<tr>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="6">
	             				<label class="control-label"style="text-align: left;"><b>HIP</b></label>
	             			</td>
	             		</tr>
	                </tbody>
	            </table>
	        </div>
	        <div class="col-lg-6">
	            <table>
	             	<tbody>
	             		<tr>
	             			<td rowspan="3"style=" background-color: #FFD580;">
	             				<label class="control-label"><b>UPPER  LIMB</b></label>
	             			</td>
	             			<td colspan="2">
	             				<label class="control-label"><b>DATE Assessment</b></label>
	             			</td>
	             			<td colspan="2" >
	             				<label class="control-label"><b>DATE Follow UP</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             		</tr>
	             		<tr>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="6">
	             				<label class="control-label"style="text-align: left;"><b>SHOULDER</b></label>
	             			</td>
	             		</tr>
	                </tbody>
	            </table>
	        </div>
	        <div class="col-lg-12" style="margin-top:10px">
	            <label style="margin-left: 20px;"><h3>Remark:</h3></label>
	            <textarea class="form-control border border-secondary border-2" id="range_motion_remark"name="range_motion_remark" ></textarea>
	        </div>
        </div>
        <div class="row"style=" margin-top: 10px;">
        	<div class="col-lg-12">
                <label class="control-label" >
                    <h3>Muscle Test:</h3>
                </label>
            </div>
        </div>
        <div class="row"style=" margin-top: 10px;">
        	<div class="col-lg-12">
            <label style="margin-left: 20px;"><b>• Muscle test should be recorded during first assessment and before discharging the patient</b></label>
            </div>
            <div class="col-lg-6">
	            <table>
	             	<tbody>
	             		<tr>
	             			<td rowspan="3"style=" background-color: #FFD580;">
	             				<label class="control-label"><b>LOWER LIMB</b></label>
	             			</td>
	             			<td colspan="2">
	             				<label class="control-label"><b>DATE Assessment</b></label>
	             			</td>
	             			<td colspan="2" >
	             				<label class="control-label"><b>DATE Follow UP</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             		</tr>
	             		<tr>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>HIP</b></label>
	             			</td>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>Comments</b></label>
	             			</td>
	             		</tr>
	                </tbody>
	            </table>
	        </div>
	        <div class="col-lg-6">
	            <table>
	             	<tbody>
	             		<tr>
	             			<td rowspan="3"style=" background-color: #FFD580;">
	             				<label class="control-label"><b>UPPER  LIMB</b></label>
	             			</td>
	             			<td colspan="2">
	             				<label class="control-label"><b>DATE Assessment</b></label>
	             			</td>
	             			<td colspan="2" >
	             				<label class="control-label"><b>DATE Follow UP</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             		</tr>
	             		<tr>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>SHOULDER</b></label>
	             			</td>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>Comments</b></label>
	             			</td>
	             		</tr>
	                </tbody>
	            </table>	            
	        </div>
        </div>
        <div class="row"style=" margin-top: 10px;">
        	<div class="col-lg-12">
                <label class="control-label" >
                    <h3>Muscle Tone:</h3>
                </label>
            </div>
        </div>
        <div class="row"style=" margin-top: 10px;">
        	<div class="col-lg-12">
            <label style=""><b>• Muscle test should be recorded during first assessment and before discharging the patient</b></label>
            </div>
            <div class="col-lg-6">
	            <table>
	             	<tbody>
	             		<tr>
	             			<td rowspan="3"style=" background-color: #FFD580;">
	             				<label class="control-label"><b>LOWER LIMB</b></label>
	             			</td>
	             			<td colspan="2">
	             				<label class="control-label"><b>DATE Assessment</b></label>
	             			</td>
	             			<td colspan="2" >
	             				<label class="control-label"><b>DATE Follow UP</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             		</tr>
	             		<tr>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>HIP</b></label>
	             			</td>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>Comments</b></label>
	             			</td>
	             		</tr>
	                </tbody>
	            </table>
	        </div>
	        <div class="col-lg-6">
	            <table>
	             	<tbody>
	             		<tr>
	             			<td rowspan="3"style=" background-color: #FFD580;">
	             				<label class="control-label"><b>UPPER  LIMB</b></label>
	             			</td>
	             			<td colspan="2">
	             				<label class="control-label"><b>DATE Assessment</b></label>
	             			</td>
	             			<td colspan="2" >
	             				<label class="control-label"><b>DATE Follow UP</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             			<td colspan="2">
	             				<input type="date"  class="form-control"name="date_assessment"id="date_assessment">
	             			</td>
	             		</tr>
	             		<tr>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>L</b></label>
	             			</td>
	             			<td style=" background-color: #FFD580;">
	             				<label class="control-label"><b>R</b></label>
	             			</td>
	             		</tr>
	             		<tr>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>SHOULDER</b></label>
	             			</td>
	             			<td colspan="3">
	             				<label class="control-label"style="text-align: left;"><b>Comments</b></label>
	             			</td>
	             		</tr>
	                </tbody>
	            </table>
	            
	        </div>
        </div>
        <div class="row"style=" margin-top: 15px;">
        	<div class="col-lg-12">
                <label class="control-label" >
                    <h3>Functional Evaluation:</h3>
                </label>
            </div>
        </div>
        <div class="row"style=" margin-top: 10px;">
        	<div class="col-lg-6"style="margin-top:5px; text-align: center;">
        		<label class="control-label" >
                        <h3>Balance disorders:</h3>
                </label>
                <table>
                	<tbody>
                		<tr>
                			<td rowspan="4">
                				<label class="control-label"><b>Sitting</b></label>
                			</td>
                			<td>
                                    <label class="control-label">Normal:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="sitting" name="sitting" value="Normal">
                            </td>
                		</tr>
                		<tr>
                			<td>
                                    <label class="control-label">Good:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="sitting" name="sitting" value="Good">
                            </td>
                		</tr>
                		<tr>
                			<td>
                                    <label class="control-label">Poor:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="sitting" name="sitting" value="Poor">
                            </td>
                		</tr>
                		<tr>
                			<td>
                                    <label class="control-label">Not possible:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="sitting" name="sitting" value="Not possible">
                            </td>
                		</tr>
                		<tr>
                			<td rowspan="4">
                				<label class="control-label"><b>Standing</b></label>
                			</td>
                			<td>
                                    <label class="control-label">Normal:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="standing" name="standing" value="Normal">
                            </td>
                		</tr>
                		<tr>
                			<td>
                                    <label class="control-label">Good:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="standing" name="standing" value="Good">
                            </td>
                		</tr>
                		<tr>
                			<td>
                                    <label class="control-label">Poor:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="standing" name="standing" value="Poor">
                            </td>
                		</tr>
                		<tr>
                			<td>
                                    <label class="control-label">Not possible:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="standing" name="standing" value="Not possible">
                            </td>
                		</tr>
                	</tbody>
                </table>
        	</div>
        	<div class="col-lg-6"style="margin-top:5px; text-align: center;">
        		<label class="control-label">
                        <h3>Coordination:</h3>
                </label>
                <table>
                	<tbody>
                		<tr>
                			<td rowspan="2">
                				<label class="control-label"><b>UPPER LIMBS</b></label>
                			</td>
                			<td colspan="2">
                                    <label class="control-label">Good:</label>
                            </td>
                            <td >
                                    <input type="checkbox" id="upper_limbs" name="upper_limbs" value="Good">
                            </td>
                            <td colspan="2">
                                    <label class="control-label">Poor:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="upper_limbs" name="upper_limbs" value="Poor">
                            </td>
                            <td colspan="2">
                                    <label class="control-label">Not possible:</label>
                            </td>
                            <td>
                                    <input type="checkbox" id="upper_limbs" name="upper_limbs" value="Not possible" >
                            </td>
                		</tr>
                		<tr>
                			<td>
                				<label class="control-label">L</label>
                			</td>
                			<td>
                				<label class="control-label">R</label>
                			</td>
                			<td>
                				<label class="control-label">L</label>
                			</td>
                			<td>
                				<label class="control-label">R</label>
                			</td>
                			<td>
                				<label class="control-label">L</label>
                			</td>
                			<td>
                				<label class="control-label">R</label>
                			</td>
                		</tr>
                	</tbody>
                </table>
        	</div>
        </div>
        <div class="row"style=" margin-top: 15px;">
        	<div class="col-lg-12">
                <label class="control-label" >
                    <h3>Berg Balance Score:- </h3>
                </label>
                <table id="berg_balance_score"name="berg_balance_score" >
                	<tbody>
                		<tr style=" background-color: #FFD580;">
	                		<td colspan="12">
	                			<label class="control-label"><b>Gait Analysis</b></label>
	                		</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="1"rowspan="2">
	                    		<label class="control-label"><b>FRONTAL PLANE</b></label>
	                    	</td>
	                    	<td colspan="10">
	                    		<label class="control-label">Observations :</label>
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="10">
	                    		<textarea class="form-control border-secondary border-2" id="frontal_observation" name="frontal_observation"></textarea>
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="1"rowspan="2">
	                    		<label class="control-label"><b>SAGITTAL PLANE</b></label>
	                    	</td>
	                    	<td colspan="10">
	                    		<label class="control-label">Observations :</label>
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="10">
	                    		<textarea class="form-control border-secondary border-2" id="sagittal_observation" name="sagittal_observation"></textarea>
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="1">
	                    		<label class="control-label"><b>Functional Quality of the gait</b></label>
	                    	</td>
	                    	<td>
	                    		<label class="control-label">Normal :</label>
	                    	</td>
	                    	<td>
	                    		<label class="control-label">Good :</label>
	                    	</td>
	                    	<td>
	                    		<label class="control-label">Poor :</label>
	                    	</td>
	                    	<td colspan="2">
	                    		<label class="control-label">Comment:</label>
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="1">
	                    		<label class="control-label">1. SAFETY:</label>
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="safety" name="safety" value="Normal">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="safety" name="safety" value="Good">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="safety" name="safety" value="Poor">
	                    	</td>
	                    	<td>
	                    		<input type="text" class="form-control border-secondary border-2" name="safety_comment" id="safety_comment">
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="1">
	                    		<label class="control-label">2. CADENCE:</label>
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="cadence" name="cadence">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="cadence" name="cadence">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="cadence" name="cadence">
	                    	</td>
	                    	<td>
	                    		<input type="text" class="form-control border-secondary border-2" name="cadence_comment" id="cadence_comment">
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="1">
	                    		<label class="control-label">3. SPEED:</label>
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="speed" name="speed">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="speed" name="speed">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="speed" name="speed">
	                    	</td>
	                    	<td>
	                    		<input type="text" class="form-control border-secondary border-2" name="speed_comment" id="speed_comment">
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td colspan="1">
	                    		<label class="control-label">4. FATIGUE:</label>
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="fatigue" name="fatigue">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="fatigue" name="fatigue">
	                    	</td>
	                    	<td>
	                    		 <input type="checkbox" id="fatigue" name="fatigue">
	                    	</td>
	                    	<td>
	                    		<input type="text" class="form-control border-secondary border-2" name="fatigue_comment" id="fatigue_comment">
	                    	</td>
	                    </tr>
	                    <tr>
	                    	<td>
	                    		<label class="control-label"><b>Other Remark:</b></label>
	                    	</td>
	                    	<td colspan="10">
	                    		<textarea class="form-control border-secondary border-2" id="Other_remark" name="Other_remark"></textarea>
	                    	</td>
	                    </tr>
                	</tbody>
                </table>
            </div>
        </div>
        <div class="row"style=" margin-top: 10px;">
        	<div class="col-lg-12">
                <label class="control-label" >
                    <h3>Activity Limitations & Participation Restrictions:</h3>
                </label>
                <table name="al_pr" id="al_pr" >
                	<tbody>
                		<tr style=" background-color: #FFD580;">
                			<td colspan="2">
                				<label class="control-label"><b>ACTIVITIES / PARTICIPATIONS</b></label>
                			</td>
                			<td colspan="2" >
                				<label class="control-label"><b>Independent</b></label>
                			</td>
                			<td colspan="2">
                				<label class="control-label"><b>Assisted</b></label>
                			</td>
                			<td colspan="2">
                				<label class="control-label"><b>Impossible</b></label>
                			</td>
                			<td colspan="5"></td>
                		<tr>
                		<tr >
                			<td colspan="13" >
                				<label class="control-label" style=" margin-right: 925px; "><b>MOBILITY</b></label>
                			</td>
                		</tr>
                		<tr>
                			<td colspan="2">
                				<label class="control-label">Crawling</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="Crawling" name="Crawling" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="Crawling" name="safety" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="safety" name="safety" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="2">
                				<label class="control-label">Crouching gait</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="crouching_gait" name="crouching_gait" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="crouching_gait" name="crouching_gait" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="crouching_gait" name="crouching_gait" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="2">
                				<label class="control-label">Walking</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="walking" name="walking" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="walking" name="walking" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="walking" name="walking" value="Impossible">
	                    	</td>
	                    	<td colspan="5"> </td>
                		</tr>
                		<tr>
                			<td colspan="2">
                				<label class="control-label">Squatting</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="squatting" name="squatting" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="squatting" name="squatting" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="squatting" name="squatting" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>	
                			<td colspan="2">
                				<label class="control-label">Stairs</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="stairs" name="stairs" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="stairs" name="stairs" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="stairs" name="stairs" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="2">
                				<label class="control-label">Running</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="running" name="running" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="running" name="running" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="running" name="running" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr >
                			<td colspan="13" >
                				<label class="control-label" style=" margin-right: 925px; "><b>TRANSFERS</b></label>
                			</td>

                		</tr>
                			<td colspan="2">
                				<label class="control-label">Lie to Sit (& opposite)</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="lie_to_sit" name="lie_to_sit" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="lie_to_sit" name="lie_to_sit" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="lie_to_sit" name="lie_to_sit" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Sit to Stand (& opposite)</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="sit_to_stand" name="sit_to_stand" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="sit_to_stand" name="sit_to_stand" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="sit_to_stand" name="sit_to_stand" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Stand to Floor (& opposite)</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="stand_to_floor" name="stand_to_floor" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="stand_to_floor" name="stand_to_floor" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="stand_to_floor" name="stand_to_floor" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Sit to sit</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="sit_to_sit" name="sit_to_sit" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="sit_to_sit" name="sit_to_sit" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="sit_to_sit" name="sit_to_sit" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr >
                			<td colspan="13" >
                				<label class="control-label" style=" margin-right: 925px; "><b>BALANCE</b></label>
                			</td>

                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Sitting</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="sitting" name="sitting" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="sitting" name="sitting" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="sitting" name="sitting" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Standing</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="standing" name="standing" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="standing" name="standing" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="standing" name="standing" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">On one leg</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="on_one_leg" name="on_one_leg" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="on_one_leg" name="on_one_leg" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="on_one_leg" name="on_one_leg" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr >
                			<td colspan="13" >
                				<label class="control-label" style=" margin-right: 925px; "><b>UPPER LIMB FUNCTIONS</b></label>
                			</td>
                		</tr>
                		</tr>
                			<td rowspan="2" colspan="1">
                				<label class="control-label">Grasp</label>
                			</td>
                			<td colspan="1">
                				<label class="control-label">R</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="r_grasp" name="r_grasp" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_grasp" name="r_grasp" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_grasp" name="r_grasp" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="1">
                				<label class="control-label">L</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="l_grasp" name="l_grasp" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_grasp" name="l_grasp" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_grasp" name="l_grasp" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td rowspan="2" colspan="1">
                				<label class="control-label">Release</label>
                			</td>
                			<td colspan="1">
                				<label class="control-label">R</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="r_release" name="r_release" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_release" name="r_release" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_release" name="r_release" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="1">
                				<label class="control-label">L</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="l_release" name="l_release" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_release" name="l_release" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_release" name="l_release" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td rowspan="2" colspan="1">
                				<label class="control-label">Fine Manipulation</label>
                			</td>
                			<td colspan="1">
                				<label class="control-label">R</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="r_fine_manipulation" name="r_fine_manipulation" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_fine_manipulation" name="r_fine_manipulation" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_fine_manipulation" name="r_fine_manipulation" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="1">
                				<label class="control-label">L</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="l_fine_manipulation" name="l_fine_manipulation" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_fine_manipulation" name="l_fine_manipulation" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_fine_manipulation" name="l_fine_manipulation" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td rowspan="2" colspan="1">
                				<label class="control-label">Holding</label>
                			</td>
                			<td colspan="1">
                				<label class="control-label">R</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="r_holding" name="r_holding" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_holding" name="r_holding" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_holding" name="r_holding" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="1">
                				<label class="control-label">L</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="l_holding" name="l_holding" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_holding" name="l_holding" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_holding" name="l_holding" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td rowspan="2" colspan="1">
                				<label class="control-label"></label>
                			</td>
                		    <td colspan="1">
                				<label class="control-label">R</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="r_holding" name="r_holding" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_holding" name="r_holding" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="r_holding" name="r_holding" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr>
                			<td colspan="1">
                				<label class="control-label">L</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="l_holding" name="l_holding" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_holding" name="l_holding" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="l_holding" name="l_holding" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr >
                			<td colspan="13" >
                				<label class="control-label" style=" margin-right: 925px; "><b>DAILY LIFE ACTIVITIES</b></label>
                			</td>

                		</tr>
                			<td colspan="2">
                				<label class="control-label">Dressing – Upper body</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="dressing_upper_body" name="dressing_upper_body" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="dressing_upper_body" name="dressing_upper_body" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="dressing_upper_body" name="dressing_upper_body" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Dressing – Lower body</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="dressing_lower_body" name="dressing_lower_body" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="dressing_lower_body" name="dressing_lower_body" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="dressing_lower_body" name="dressing_lower_body" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Toileting</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="toileting" name="toileting" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="toileting" name="toileting" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="toileting" name="toileting" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Bathing</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="bathing" name="bathing" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="bathing" name="bathing" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="bathing" name="bathing" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Washing oneself</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="washing_oneself" name="washing_oneself" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="washing_oneself" name="washing_oneself" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="washing_oneself" name="washing_oneself" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Eating</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="eating" name="eating" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="eating" name="eating" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="eating" name="eating" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Drinking</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="drinking" name="drinking" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="drinking" name="drinking" value="Assisted">
	                    	</td>
	                    	<td colspan="2">
	                    		 <input type="checkbox" id="drinking" name="drinking" value="Impossible">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		<tr >
                			<td colspan="13" >
                				<label class="control-label" style=" margin-right: 925px; "><b>ASSISTED DEVICES</b></label>
                			</td>

                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">	Without assisted devices</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="without_assisted_devices" name="without_assisted_devices" value="Independent">
	                    	</td>
	                    	<td colspan="2">
	                    	</td>
	                    	<td colspan="2">
	                    	</td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">One crutch</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="one_crutch" name="one_crutch" value="Independent">
	                    	</td>
	                    	<td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="one_crutch" name="one_crutch"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="one_crutch" name="one_crutch"
                                    value="Bad">
                            </td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Pair of crutches</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="pair_of_crutches" name="pair_of_crutches" value="Independent">
	                    	</td>
	                    	<td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="pair_of_crutches" name="pair_of_crutches"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="pair_of_crutches" name="pair_of_crutches"
                                    value="Bad">
                            </td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Walking frame</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="walking_frame" name="walking_frame" value="Independent">
	                    	</td>
	                    	<td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="walking_frame" name="walking_frame"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="walking_frame" name="walking_frame"
                                    value="Bad">
                            </td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Wheelchair</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="wheelchair" name="wheelchair" value="Independent">
	                    	</td>
	                    	<td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="wheelchair" name="wheelchair"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="wheelchair" name="wheelchair"
                                    value="Bad">
                            </td>
	                    	<td colspan="5"></td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Orthoses right side</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="orthoses_right_side" name="orthoses_right_side" value="Independent">
	                    	</td>
	                    	<td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="orthoses_right_side" name="orthoses_right_side"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="orthoses_right_side" name="orthoses_right_side"
                                    value="Bad">
                            </td>
	                    	<td colspan="1">
	                    		<label class="control-label">FO</label>
	                    		<input type="checkbox" id="orthoses_right_side" name="orthoses_right_side" value="FO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">AFO</label>
	                    		<input type="checkbox" id="orthoses_right_side" name="orthoses_right_side" value="AFO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">KAFO</label>
	                    		<input type="checkbox" id="orthoses_right_side" name="orthoses_right_side" value="KAFO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">HKAFO</label>
	                    		<input type="checkbox" id="orthoses_right_side" name="orthoses_right_side" value="HKAFO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">Shoe raise</label>
	                    		<input type="checkbox" id="orthoses_right_side" name="orthoses_right_side" value="Shoe raise">
	                      	</td>
                		</tr>
                		</tr>
                			<td colspan="2">
                				<label class="control-label">Orthosis left side</label>
                			</td>
                			<td colspan="2">
	                    		 <input type="checkbox" id="orthoses_left_side" name="orthoses_left_side" value="Independent">
	                    	</td>
	                    	<td colspan="2">

                                <label style="font-size:16px">Good:</label>
                                <input type="radio" id="orthoses_left_side" name="orthoses_left_side"
                                    value="Good">
                            </td>
                            <td colspan="2">
                                <label style="font-size:16px">Bad:</label>
                                <input type="radio" id="orthoses_left_side" name="orthoses_left_side"
                                    value="Bad">
                            </td>
	                    	<td colspan="1">
	                    		<label class="control-label">FO</label>
	                    		<input type="checkbox" id="orthoses_left_side" name="orthoses_left_side" value="FO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">AFO</label>
	                    		<input type="checkbox" id="orthoses_left_side" name="orthoses_left_side" value="AFO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">KAFO</label>
	                    		<input type="checkbox" id="orthoses_left_side" name="orthoses_left_side" value="KAFO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">HKAFO</label>
	                    		<input type="checkbox" id="orthoses_left_side" name="orthoses_left_side" value="HKAFO">
	                    	</td>
	                    	<td colspan="1">
	                    		<label class="control-label">Shoe raise</label>
	                    		<input type="checkbox" id="orthoses_left_side" name="orthoses_left_side" value="Shoe raise">
	                    	</td>	
                		</tr>
                	</tbody>
                </table>
            </div>
        </div> 
         <div class="row"style=" margin-top: 10px;margin-left: 5px;margin-right: 5px;">
            <table  id="Conclusion_of_patient_assessment" name="Conclusion_of_patient_assessment" >
            	<tbody>
            		<tr>
            			<td colspan="5">
            			<label class="control-label"><b>CONCLUSION OF PATIENT ASSESSMENT & MAIN FINDINGS</b></label>
            			</td>
            		</tr>
            		<tr>
            			<td colspan="5">
            			<label class="control-label">ENVIRONMENTAL & PERSONAL FACTORS</label>
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Personal conditions</label>
            			</td>
            			<td colspan="4" >
            			    <input type="text" class="form-control border-secondary border-2" name="personal_condition" id="personal_condition">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Living conditions</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="living_condition" id="living_condition">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Med & Social structures</label>
            			</td>
            			<td colspan="4" >
            			    <input type="text" class="form-control border-secondary border-2" name="social_structures" id="social_structures">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Current treatment</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="current_treatment" id="current_treatment">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Remarks</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="remark" id="remark">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="5">
            			<label class="control-label">ENVIRONMENTAL & PERSONAL FACTORS</label>
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Ass. trauma & diseases</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="at_diseases" id="at_diseases">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">R.O.M status</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="rom_status" id="rom_status">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Muscle status</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="muscle_status" id="muscle_status">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Skin & soft tissues/Pain</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="skin_soft" id="skin_soft">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Cardio vascular status</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="cardio_status" id="cardio_status">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="5">
            			<label class="control-label">ACTIVITY LIMITATIONS & PARTICIPATION RESTRICTION</label>
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">General Mobility (gait)</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="general_mobility" id="general_mobility">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Transfers</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="transfer" id="transfer">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Balance</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="balance" id="balance">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Upper limb functions</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="upper_limb_functions" id="upper_limb_functions">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            			<label class="control-label">Daily life activities</label>
            			</td>
            			<td colspan="4">
            			    <input type="text" class="form-control border-secondary border-2" name="daily_life_activities" id="daily_life_activities">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="5">
            			<label class="control-label"><b>REFERRAL</b></label>
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1" rowspan="5">
            			<label class="control-label">Referred to……………………………………………   for</label>
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="medicalcare" name="medicalcare" value="Medical care">
            				<label class="control-label">Medical care</label>    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="nursingcare" name="nursingcare" value="Nursing care">
            				<label class="control-label">Nursing care</label>    
            			</td>
            		</tr>
            		<tr>
            			<td colspan="2">
            				<input type="checkbox" id="medication" name="medication" value="Medication<">
            				<label class="control-label">Medication</label>    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="remove_cast" name="remove_cast" value="Remove cast">
            				<label class="control-label">Remove cast</label>    
            			</td>
            		</tr>
            		<tr>
            			<td colspan="2">
            				<input type="checkbox" id="orthopaedic_consultation" name="orthopaedic_consultation" value="Orthopaedic consultation">
            				<label class="control-label">Orthopaedic consultation</label>    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="stump_revision" name="stump_revision" value="Stump revision">
            				<label class="control-label">Stump revision</label>    
            			</td>
            		</tr>
            			<td colspan="2">
            				<input type="checkbox" id="orthopaedic_surgery" name="orthopaedic_surgery" value="Orthopaedic surgery">
            				<label class="control-label">Orthopaedic surgery</label>    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="tenotomy" name="tenotomy" value="Tenotomy">
            				<label class="control-label">Tenotomy</label>    
            			</td>
            		</tr>
            		</tr>
            			<td colspan="2">
            				<input type="checkbox" id="Other_specify" name="Other_specify" value="Other specify">
            				<label class="control-label">Other (specify)</label>    
            			</td>
            			<td colspan="2">
            				
            			</td>
            		</tr>
            	</tbody>
            </table>
        </div> 
        <div class="row"style=" margin-top: 10px;margin-left: 5px;margin-right: 5px;">
        	<table id="treatment_plan" name="treatment_plan">
        		<tbody>
        			<tr>
        				<td colspan="6">
        					<label class="control-label"><b>TREATMENT PLAN</b></label>
        				</td>
        			</tr>
        			<tr>
        				<td colspan="3">
        					<label class="control-label"><b>Walking Aids</b></label>
        				</td>
        				<td colspan="3">
        					<label class="control-label"><b>Wheelchairs and Modifications</b></label>
        				</td>
        			</tr>
        			<tr>
            			<td colspan="1">
            				<input type="checkbox" id="axillary_crutches" name="axillary_crutches" value="Axillary crutches">
            				<label class="control-label">Axillary crutches</label>    
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="adult" name="adult" value="Adult">
            				<label class="control-label">Adult</label>    
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="pair" name="pair" value="pair">
            				<label class="control-label">Pair</label>    
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="Wheelchair_3_wheels" name="Wheelchair_3_wheels" value="Wheelchair 3-wheels">
            				<label class="control-label">Wheelchair 3-wheels</label>    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Wheelchair_3_wheels_modifications" name="Wheelchair_3_wheels_modifications" value="Wheelchair 3-wheels and modifications">
            				<label class="control-label">Wheelchair 3-wheels and modifications</label>    
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            				<input type="checkbox" id="elbow_crutches" name="elbow_crutches" value="Elbow crutches">
            				<label class="control-label">Elbow crutches</label>    
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="child" name="child" value="Child">
            				<label class="control-label">Child</label>    
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="unit" name="unit" value="Unit">
            				<label class="control-label">Unit</label>    
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="Wheelchair_4_wheels" name="Wheelchair_4_wheels" value="Wheelchair 4-wheels">
            				<label class="control-label">Wheelchair 4-wheels</label>    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Wheelchair_3_wheels_seating_system" name="Wheelchair_3_wheels_seating_system" value="Wheelchair 3-wheels and seating system">
            				<label class="control-label">Wheelchair 3-wheels and seating system</label>    
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            				<input type="checkbox" id="Cane" name="Cane" value="Cane">
            				<label class="control-label">Cane</label>    
            			</td>
            			<td colspan="1">
            				  
            			</td>
            			<td colspan="1">
            				  
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="Tricycle" name="Tricycle" value="Tricycle">
            				<label class="control-label">Tricycle</label>    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Wheelchair_4_wheels_modifications" name="Wheelchair_4_wheels_modifications" value="Wheelchair 4-wheels and modifications">
            				<label class="control-label">	Wheelchair 4-wheels and modifications</label>    
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1">
            				<input type="checkbox" id="Walking_frame" name="Walking_frame" value="Walking frame">
            				<label class="control-label">Walking frame</label>    
            			</td>
            			<td colspan="1">
            				  
            			</td>
            			<td colspan="1">
            				  
            			</td>
            			<td colspan="1">
            				    
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Wheelchair_4_wheels_seating_system" name="Wheelchair_4_wheels_seating_system" value="Wheelchair 4-wheels and seating system">
            				<label class="control-label">	Wheelchair 4-wheels and seating system</label>    
            			</td>
            		</tr>
            		<tr>
            			<td colspan="1" rowspan="2">
            				<label class="control-label"><b>Other</b></label>   
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="Standing_Frame" name="Standing_Frame" value="Standing Frame">
            				<label class="control-label">Standing Frame</label>
            			</td>
            			<td colspan="4">
            				<input type="checkbox" id="Other_specify" name="Other_specify" value="Other specify">
            				<label class="control-label">Other (specify)</label>    
            		    </td>
            		</tr>
            			<td colspan="1">
            				<input type="checkbox" id="Baby_walker" name="Baby_walker" value="Baby walker">
            				<label class="control-label">Baby walker</label>
            			</td>	
            		<tr>
        				<td colspan="3">
        					<label class="control-label"><b>Lower Limb Prostheses</b></label>
        				</td>
        				<td colspan="3">
        					<label class="control-label"><b>Upper Limb Prostheses</b></label>
        				</td>
        			</tr>
        			<tr>
	        			<td colspan="1" >
	                        <input type="checkbox" id="Partial_Foot" name="Partial_Foot" value="Partial Foot">
	        				<label class="control-label">Partial Foot</label>   
	        			</td>
	        			<td colspan="2">
	        				<input type="checkbox" id="Trans_Femoral" name="Trans_Femoral" value="Trans Femoral">
	        				<label class="control-label">Trans Femoral</label>
	        			</td>
	        			<td colspan="1">
	        				<input type="checkbox" id="Shoulder_Disarticulation" name="Shoulder_Disarticulation" value="Shoulder Disarticulation">
	        				<label class="control-label">Shoulder Disarticulation</label>    
	        		    </td>
	        		    <td colspan="2" >
	        		    	<input type="checkbox" id="trans_Radial" name="trans_Radial" value="Trans Radial">
	            			<label class="control-label">Trans Radial</label>   
	        			</td>
            		</tr>
            		<tr>
            			<td colspan="1" >
                            <input type="checkbox" id="Ankle_Disarticulation" name="Ankle_Disarticulation" value="Ankle Disarticulation">
            				<label class="control-label">Ankle Disarticulation</label>   
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Knee_Disarticulation" name="Knee_Disarticulation" value="Knee Disarticulation">
            				<label class="control-label">Knee Disarticulation</label>
            			</td>
            			<td colspan="1">
            				<input type="checkbox" id="Trans_Humeral" name="Trans_Humeral" value="Trans Humeral">
            				<label class="control-label">Trans Humeral</label>    
            		    </td>
            		    <td colspan="2" >
            		    	<input type="checkbox" id="Elbow_Disarticulation" name="Elbow_Disarticulation" value="Elbow Disarticulation">
	            			<label class="control-label">Elbow Disarticulation</label>   
            			</td>
            		</tr>																									
            		<tr>
            			<td colspan="1" >
                            <input type="checkbox" id="Trans_Tibial" name="Trans_Tibial" value="Trans Tibial">
            				<label class="control-label">Trans Tibial</label>   
            			</td>
            			 <td colspan="2" >
            		    	<input type="checkbox" id="Hip_Disarticulation" name="Hip_Disarticulation" value="Hip Disarticulation">
	            			<label class="control-label">Hip Disarticulation</label>   
            			</td>
            			<td colspan="2">
            				
            			</td>
            			<td colspan="1">
            				   
            		    </td>   
            		</tr>

            		<tr>
        				<td colspan="2">
        					<label class="control-label"><b>Lower Limb Orthoses</b></label>
        				</td>
        				<td colspan="2">
        					<label class="control-label"><b>Upper Limb Orthoses</b></label>
        				</td>
        				<td colspan="2">
        					<label class="control-label"><b>Spinal Orthoses</b></label>
        				</td>
        			</tr>
        			<tr>
						<td colspan="2">
            				<input type="checkbox" id="Shoe_Raise" name="Shoe_Raise" value="Shoe Raise">
            				<label class="control-label">Shoe Raise</label>
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Shoulder_Orthosis" name="Shoulder_Orthosis" value="Shoulder Orthosis (SO)">
            				<label class="control-label">Shoulder Orthosis (SO)</label>    
            		    </td>
            		    <td colspan="2" >
            		    	<input type="checkbox" id="Cervical_Orthosis" name="Cervical_Orthosis" value="Cervical Orthosis (CO)">
	            			<label class="control-label">Cervical Orthosis (CO)</label>   
            			</td>
        			</tr>
        			<tr>
						<td colspan="2">
            				<input type="checkbox" id="Foot_Orthosis" name="Foot_Orthosis" value="Foot Orthosis">
            				<label class="control-label">Foot Orthosis</label>
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Shoulder_Elbow_Hand_Orthosis" name="Shoulder_Elbow_Hand_Orthosis" value="Shoulder Elbow Hand Orthosis (SEHO)">
            				<label class="control-label">Shoulder Elbow Hand Orthosis (SEHO)</label>    
            		    </td>
            		    <td colspan="2" >
            		    	<input type="checkbox" id="Lumbo_Sacral_Orthosis" name="Lumbo_Sacral_Orthosis " value="Lumbo Sacral Orthosis (LSO)">
	            			<label class="control-label">Lumbo Sacral Orthosis (LSO)</label>   
            			</td>
        			</tr>
        			<tr>
						<td colspan="2">
            				<input type="checkbox" id="AFO" name="AFO" value="AFO">
            				<label class="control-label">AFO</label>
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Elbow_Orthosis" name="Elbow_Orthosis" value="Elbow Orthosis (EO)">
            				<label class="control-label">Elbow Orthosis (EO)</label>    
            		    </td>
            		    <td colspan="2">
            				<input type="checkbox" id="Thoraco_Lumbo_Sacral_Orthosis " name="Thoraco_Lumbo_Sacral_Orthosis" value="Thoraco Lumbo Sacral Orthosis (TLSO)">
            				<label class="control-label">Thoraco Lumbo Sacral Orthosis (TLSO)</label>
            			</td>
        			</tr>
        			<tr>
						<td colspan="2">
            				<input type="checkbox" id="KAFO " name="KAFO" value="KAFO">
            				<label class="control-label">KAFO</label>
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Wrist_Hand_Orthosis" name="Wrist_Hand_Orthosis" value="Wrist Hand Orthosis (WHO)">
            				<label class="control-label">Wrist Hand Orthosis (WHO)</label>    
            		    </td>
            		    <td colspan="2" >
            		    	<input type="checkbox" id="Cervico_Thoraco_Lumbo_Sacral_Orthosis" name="Cervico_Thoraco_Lumbo_Sacral_Orthosis" value="Cervico Thoraco Lumbo Sacral Orthosis (CTLSO)">
	            			<label class="control-label">Cervico Thoraco Lumbo Sacral Orthosis (CTLSO)</label>   
            			</td>
        			</tr>
        			<tr>
						<td colspan="2">
            				<input type="checkbox" id="Knee_Orthosis" name="Knee_Orthosis " value="Knee Orthosis (KO)">
            				<label class="control-label">Knee Orthosis (KO)</label>
            			</td>
            			<td colspan="2">
            				<input type="checkbox" id="Finger_Orthosis" name="Finger_Orthosis" value="Finger Orthosis">
            				<label class="control-label">Finger Orthosis</label>    
            		    </td>
            		    <td colspan="2" >
            		    	  
            			</td>
        			</tr>
        			<tr>
						<td colspan="2">
            				<input type="checkbox" id="Hip_Orthosis" name="Hip_Orthosis " value="Hip Orthosis (HO)">
            				<label class="control-label">Hip Orthosis (HO)</label>
            			</td>
            			<td colspan="2">
            				 
            		    </td>
            		    <td colspan="2" >
            		    	   
            			</td>
        			</tr>
        			<tr>
						<td colspan="2">
            				<input type="checkbox" id="HKAFO" name="HKAFO " value="HKAFO">
            				<label class="control-label">HKAFO</label>
            			</td>
            			<td colspan="2">
            				 
            		    </td>
            		    <td colspan="2" >
            		    	   
            			</td>
        			</tr>
        			<tr>
        				<td colspan="6">
        					<label class="control-label"><h2>Technical Specifications :</h2></label>
        				</td>
        			</tr>
        			<tr>
        				<td colspan="6">
        					<label class="control-label"><h2>PHYSIOTHERAPY TREATMENT PLAN</h2></label>
        				</td>
        			</tr>
        			<tr>
        				<td colspan="6">
        					<label class="control-label"><h3>Treatment Objectives:</h3></label>
        				</td>
        			</tr>
        			<tr>
        				<td colspan="2">
        					<label class="control-label"><b>SHORT TERM:</b></label>
        				</td>
        				<td colspan="4">
        					<input type="text" name="short_term" id="short_term" class="form-control border-secondary border-2">
        				</td>
        			</tr>
        			<tr>
        				<td colspan="2" >
        					<label class="control-label"><b>MID TERM:</b></label>
        				</td>
        				<td colspan="4">
        					<input type="text" name="mid_term" id="mid_term" class="form-control border-secondary border-2">
        				</td>
        			</tr>
        			<tr>
        				<td colspan="2" >
        					<label class="control-label"><b>LONG TERM:</b></label>
        				</td>
        				<td colspan="4">
        					<input type="text" name="long_term" id="long_term" class="form-control border-secondary border-2">
        				</td>
        			</tr>
        			<tr>
        				<td colspan="6">
        					<label class="control-label"><h3>Treatment Proposals</h3></label>
        					<textarea class="form-control border-secondary border-2" id="treatment_proposals" name="treatment_proposals" rows="2"></textarea>
        				</td>
        			</tr>
        			<tr>
        				<td colspan="1">
        					<label class="control-label"><b>Follow up Plan:</b></label>
        				</td>
        				<td colspan="2">
        					<input type="text" class="form-control border-secondary border-2" name="follow_up_plan" id="follow_up_plan">
        				</td>
        				<td colspan="1">
        					<label class="control-label"><b>Date follow up appointment:</b></label>
        				</td>
        				<td colspan="2">
        					<input type="date" class="form-control border-secondary border-2" name="follow_up_appointment" id="follow_up_appointment">
        				</td>
        			</tr>
        		</tbody>
        	</table>
        </div>
       	<div class="row"style="margin-left: 20px; margin-top: 15px;">
       		<div class="col-lg-4">
       			<label class="control-label"><h3>Assessment Forms</h3></label>
       		</div>
       		<div class="col-lg-4">
       			<label class="control-label"><h3>Review June 2014</h3></label>
       		</div>
       		<div class="col-lg-4">
       			<label class="control-label"><h3>ICRC OCs, Afghanistan</h3></label>
       		</div>
       	</div>
        <div style="border:1px solid black; ">
	       <div class="row"style=" margin-top: 15px;">
       		  <div class="col-lg-10"style=" margin-top: 15px;text-align: center; width: 80%;">
       		  	<label class="control-label"><h2>PHYSIOTHERAPY FOLLOW UP</h2></label>
       		  	<label class="control-label"></label>
       		  </div>  
	       	</div>
	       	<div class="row"style="margin-left: 7px; margin-top: 15px; " >
		       	<div class="col-lg-4">
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<div class="col-lg-2">
	       		  		    <label class="control-label">DATE:</label>
	       		  		</div>
	       		  		<div class="col-lg-3">
	       		  		   <input type="date" name="d_ate" id="d_ate" >
	       		  		</div>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px; text-align: center;">
	       		  		
	       		  		    <label class="control-label">PHYSIO NAME:</label>
	       		  		
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		
	       		  			<input type="text" class="form-control border-secondary border-2" name="pname" id="pname">
	       		  	</div>
	       		  	
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<label class="control-label">OT NAME:</label>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<label class="control-label">NEXT FOLLOW UP (OP):</label>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
	       		  	</div>
		        </div>
		        <div class="col-lg-8" style="border">
	       		  	<label class="control-label" style="text-align:center;"><h3>Current situation of the patient</h3></label>
	       		  	<label class="control-label">(Improvement-goals achieved, functional status, ROM-Muscle strength etc., compared to previous assessment)</label>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px; margin-right: 7px;" >
	       		  		<textarea class="form-control border-secondary border-2" id="current_situation" name="current_situation" rows="2"></textarea>
       		  	    </div> 
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;">
       		  	   		
                      		<label class="control-label"><h3>Treatment Proposals:</h3></label>
       		  	   	</div>
       		  	   	<div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
	       		  		<textarea class="form-control border-secondary border-2" id="treatment_proposals" name="treatment_proposals" rows="2"></textarea>
       		  	    </div> 
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
       		  	   	  <label class="control-label">Remark:</label>
       		  	   	  <textarea class="form-control border-secondary border-2" id="remark" name="remark" rows="1"></textarea>
       		  	   </div>
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;">       		  		
       		  	   </div>
		       </div>
		    </div>	
		    <div class="row"style="margin-left: 7px; margin-top: 15px; " >
		       	<div class="col-lg-4">
		       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
		       		  		<div class="col-lg-2">
		       		  		    <label class="control-label">DATE:</label>
		       		  		</div>
		       		  		<div class="col-lg-3">
		       		  		   <input type="date" name="d_ate" id="d_ate" >
		       		  		</div>
		       		  	</div>
		       		  	<div class="row"style="margin-left: 7px; margin-top: 15px; text-align: center;">
		       		  		
		       		  		    <label class="control-label">PHYSIO NAME:</label>
		       		  		
		       		  	</div>
		       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
		       		  		
		       		  			<input type="text" class="form-control border-secondary border-2" name="pname" id="pname">
		       		  		
		       		  	</div>
		       		  	
		       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
		       		  		<label class="control-label">OT NAME:</label>
		       		  	</div>
		       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
		       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
		       		  	</div>
		       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
		       		  		<label class="control-label">NEXT FOLLOW UP (OP):</label>
		       		  	</div>
		       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
		       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
		       		  	</div>
		       </div>
		        <div class="col-lg-8" style="border">
	       		  	<label class="control-label" style="text-align:center;"><h3>Current situation of the patient</h3></label>
	       		  	<label class="control-label">(Improvement-goals achieved, functional status, ROM-Muscle strength etc., compared to previous assessment)</label>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
	       		  		<textarea class="form-control border-secondary border-2" id="current_situation" name="current_situation" rows="2"></textarea>
       		  	    </div> 
       		  	    <div class="row"style="margin-left: 7px; margin-top: 15px;">
       		  	   		
                      		<label class="control-label"><h3>Treatment Proposals:</h3></label>
       		  	   		
       		  	   	</div>
       		  	   	<div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
	       		  		<textarea class="form-control border-secondary border-2" id="treatment_proposals" name="treatment_proposals" rows="2"></textarea>
       		  	    </div> 
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
       		  	   	  <label class="control-label">Remark:</label>
       		  	   	  <textarea class="form-control border-secondary border-2" id="remark" name="remark" rows="1"></textarea>
       		  	   </div>
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;">
       		  	   </div>
		       </div>
		    </div>
		</div>
		<div class="row"style="margin-left: 10px; margin-top: 15px;">
       		<div class="col-lg-4">
       			<label class="control-label"><h3>Assessment Forms</h3></label>
       		</div>
       		<div class="col-lg-4">
       			<label class="control-label"><h3>Review June 2014</h3></label>
       		</div>
       		<div class="col-lg-4">
       			<label class="control-label"><h3>ICRC OCs, Afghanistan</h3></label>
       		</div>
       	</div>
       	
       	 <div style="border:1px solid black; "> 
	       <div class="row"style=" margin-top: 15px;">
	       		
	       		  <div class="col-lg-10"style=" margin-top: 15px;text-align: center; width: 80%;">
	       		  	<label class="control-label"><h2>PHYSIOTHERAPY FOLLOW UP</h2></label>
	       		  	<label class="control-label"></label>
	       		  </div>	  
	       	</div>
	       	<div class="row"style="margin-left: 7px; margin-top: 15px; " >
		       	<div class="col-lg-4">
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<div class="col-lg-2">
	       		  		    <label class="control-label">DATE:</label>
	       		  		</div>
	       		  		<div class="col-lg-3">
	       		  		   <input type="date" name="d_ate" id="d_ate" >
	       		  		</div>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px; text-align: center;">
	       		  		
	       		  		    <label class="control-label">PHYSIO NAME:</label>
	       		  		
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		
	       		  			<input type="text" class="form-control border-secondary border-2" name="pname" id="pname">
	       		  		
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<label class="control-label">OT NAME:</label>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<label class="control-label">NEXT FOLLOW UP (OP):</label>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
	       		  	</div>
		       </div>
		       <div class="col-lg-8" style="border">
	       		  	<label class="control-label" style="text-align:center;"><h3>Current situation of the patient</h3></label>
	       		  	<label class="control-label">(Improvement-goals achieved, functional status, ROM-Muscle strength etc., compared to previous assessment)</label>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
	       		  		<textarea class="form-control border-secondary border-2" id="current_situation" name="current_situation" rows="2"></textarea>
       		  	    </div> 
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;">
       		  	   		
                      		<label class="control-label"><h3>Treatment Proposals:</h3></label>

       		  	   	</div>
       		  	   	<div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
	       		  		<textarea class="form-control border-secondary border-2" id="treatment_proposals" name="treatment_proposals" rows="2"></textarea>
       		  	    </div> 
       		  	    <div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
       		  	   	  <label class="control-label">Remark:</label>
       		  	   	  <textarea class="form-control border-secondary border-2" id="remark" name="remark" rows="1"></textarea>
       		  	   </div>
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;">  		
       		  	   </div>
		        </div>
		    </div>	
		    <div class="row"style="margin-left: 7px; margin-top: 15px; " >
		       	<div class="col-lg-4">
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<div class="col-lg-2">
	       		  		    <label class="control-label">DATE:</label>
	       		  		</div>
	       		  		<div class="col-lg-3">
	       		  		   <input type="date" name="d_ate" id="d_ate" >
	       		  		</div>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px; text-align: center;">
	       		  		
	       		  		    <label class="control-label">PHYSIO NAME:</label>
	       		  		
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		
	       		  			<input type="text" class="form-control border-secondary border-2" name="pname" id="pname">
	       		  		
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<label class="control-label">OT NAME:</label>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<label class="control-label">NEXT FOLLOW UP (OP):</label>
	       		  	</div>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;">
	       		  		<input type="text" class="form-control border-secondary border-2" name="otname" id="otname">
	       		  	</div>
		        </div>
		        <div class="col-lg-8" style="border">
	       		  	<label class="control-label" style="text-align:center;"><h3>Current situation of the patient</h3></label>
	       		  	<label class="control-label">(Improvement-goals achieved, functional status, ROM-Muscle strength etc., compared to previous assessment)</label>
	       		  	<div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
	       		  		<textarea class="form-control border-secondary border-2" id="current_situation" name="current_situation" rows="2"></textarea>
       		  	    </div> 
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;">
       		  	   		
                      		<label class="control-label"><h3>Treatment Proposals:</h3></label>

       		  	   	</div>
       		  	   	<div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
	       		  		<textarea class="form-control border-secondary border-2" id="treatment_proposals" name="treatment_proposals" rows="2"></textarea>
       		  	    </div> 
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;margin-right: 7px;">
       		  	   	  <label class="control-label">Remark:</label>
       		  	   	  <textarea class="form-control border-secondary border-2" id="remark" name="remark" rows="1"></textarea>
       		  	   </div>
       		  	   <div class="row"style="margin-left: 7px; margin-top: 15px;">
       		  	   </div>
		        </div>
		    </div>
		 </div> 
		<div class="row"style="margin-left: 10px; margin-top: 15px;">
       		<div class="col-lg-4">
       			<label class="control-label"><h3>Assessment Forms</h3></label>
       		</div>
       		<div class="col-lg-4">
       			<label class="control-label"><h3>Review June 2014</h3></label>
       		</div>
       		<div class="col-lg-4">
       			<label class="control-label"><h3>ICRC OCs, Afghanistan</h3></label>
       		</div>
       	</div>
    </div>
</form>

<style type="text/css"></style>
<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
</script>