<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        table {
            border:1px solid black;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        .label-checkbox-container {
            display: flex;
            align-items: center;
        }
        .label-checkbox-container label {
            margin-right: 10px; 
            font-size: 16px;

        }
        .label-checkbox-container input[type="checkbox"] {
            width: 16px;
            height: 16px; 
        }
        h2{
        	text-align: center;
        }
        body{
        	background-color:whitesmoke;
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
</head>
<body>
<form method="post" enctype="multipart/form-data" name="nursing_care_plan"id="nursing_care_plan">
     <!-- <div class="row"style="text-center;"> 
     	<label ><h2>NURSING CARE PLAN</h2></label> 
     </div> -->
   <div class="container-fluid">
   	 <div class="row">
            <div class="col-lg-12" style="padding-bottom: 5px;">
                <h2 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px dotted darkgrey;">
                    <b>  NURSING CARE PLAN </b>
                </h2>
            </div>
        </div>
    <table>
        <thead>
            <tr>
                <th  colspan="1" style="width: 100px;">Parameters</th>
                <th  colspan="3" style="width: 350px;">Assessment</th>
                <th  colspan="2" style="width: 300px;">Plan Of Caer</th>
                <th  colspan="1" style="width: 100px;">Remarks</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        	<tr>
                <td rowspan="9">
               	  <div class="label-checkbox-container">
	                    <label>Hygience</label>
                  </div>
                </td>
                <td rowspan="4">
                	<div class="label-checkbox-container">
	                    <label for="">Consciousness</label>
                   </div> 	
                </td>
                <td rowspan="1" colspan="2">
                	<div class="label-checkbox-container">
	                    <label for="checkbox1">Able to do self:</label>
	                    <input type="checkbox" id="able_to_self" name="able_to_self">
                	</div>
                </td>  
	            
	            <td colspan="2">
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">If Conscious with self deficit/Unconscious:</label>
	                    <input type="checkbox" id="with_self_deficit" name="with_self_deficit">
                	</div>
	            </td> 
	            <td rowspan="9"></td>
            
            </tr>
	         <tr> 
	            <td rowspan="3"colspan="2">
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">self care deficit:</label>
	                    <input type="checkbox" id="self_care_deficit" name="self_care_deficit">
                	</div>
	            </td>
	            
	            <td colspan="2" >
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Mouth Care:</label>
	                    <input type="checkbox" id="mouth_care" name="mouth_care">
                	</div>
	            </td>  
	        </tr>
	        <tr>
	            <td colspan="2" >
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Eye Care:</label>
	                    <input type="checkbox" id="eye_care" name="eye_care">
                	</div>
	            </td>
	             
	         </tr>
	           <tr>
	            <td colspan="2" >
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Sponge Bath:</label>
	                    <input type="checkbox" id="sponge_bath" name="sponge_bath">
                	</div>
	            </td>
            </tr>
             <tr>
	            <td colspan="3">
	            	<div class="label-checkbox-container">
	                    <label for="">Unconsious</label>
                    </div>
	            </td>
	            <td rowspan="1" colspan="2" >
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Back Care:</label>
	                    <input type="checkbox" id="back_care" name="back_care">
                	</div>
	            </td>

            </tr>

            <tr>
               <td colspan="3" >
               	    <div class="label-checkbox-container">
	                    <label for="">Pressure Of Score</label>
                    </div>
               </td>
	            <td rowspan="1"colspan="2" >
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Catheter Care:</label>
	                    <input type="checkbox" id="catheter_care" name="catheter_care">
                	</div>
	            </td>

            </tr>
             <tr>
	            <td rowspan="3" >
	            	<div class="label-checkbox-container">
	                    <label for="">Skin Assessment</label>
                    </div>
	            </td>
	            <td rowspan="1"colspan="2">
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Intact:</label>
	                    <input type="checkbox" id="intact" name="intact">
                	</div>
	            </td>
	            
  
            </tr>
            <tr>
            	<td rowspan="1"colspan="2">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">Redness:</label>
	                    <input type="checkbox" id="redness" name="redness">
                	</div>
            	</td>
	            <td rowspan="1" colspan="2">
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Positioning and Following:</label>
	                    <input type="checkbox" id="positioning_and_following" name="positioning_and_following">
                	</div>
	            </td>  
            </tr>
            <tr>
            	<td rowspan="1"colspan="2">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">Skin Peel:</label>
	                    <input type="checkbox" id="skin_peel" name="skin_peel">
                	</div>
            	</td>
	            <td rowspan="1"colspan="2">
	            	<div class="label-checkbox-container">
	                    <label for="checkbox1">Pressure sore care plan:</label>
	                    <input type="checkbox" id="pressure_sore_care_plan" name="pressure_sore_care_plan">
                	</div>
	            </td> 
            </tr>

        </tr>
        <tr>
            <tr>
            	<td rowspan="4">
            		<div class="label-checkbox-container">
	                    <label for="">Activity</label>
                    </div>
            	</td>

            	<td colspan="5">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">Ability to do ADL (Activities Of Daily Living):</label>
	                    <input type="checkbox" id="ability_to_do " name="ability_to_do">
                	</div>
            	</td>
            	
                <td rowspan="4"></td>
            </tr>
            <tr>
            	<td colspan="3" rowspan="2">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">Activity is impaired:</label>
	                    <input type="checkbox" id="activity_is_impaired" name="activity_is_impaired">
                	</div>
            	</td>

            	<td colspan="2">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">IF impaired; hepl to do ADL:</label>
	                    <input type="checkbox" id="if_impaired" name="if_impaired">
                	</div>
            	</td>
            </tr>
            <tr>
            	<td colspan="2">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">Physiotherapy:</label>
	                    <input type="checkbox" id="physiotherapy" name="physiotherapy">
                	</div>
            	</td>
            </tr>
            <tr>
            	<td colspan="3">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">Fall Score:</label>
	                    <input type="checkbox" id="fall_score" name="fall_score">
                	</div>
            	</td>
            	<td colspan="2">
            		<div class="label-checkbox-container">
	                    <label for="checkbox1">Provide Assistance:</label>
	                    <input type="checkbox" id="provide_assistance" name="provide_assistance">
                	</div>
            	</td>
            </tr>
        </tr>
        <tr>
        	<tr>
        		<td rowspan="5">
        			<div class="label-checkbox-container">
	                    <label for="">Nutrition</label>
                    </div>
        		</td>
        		<td colspan="3" rowspan="1">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">NBM:</label>
	                    <input type="checkbox" id="ibm" name="ibm">
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Normal Diet:</label>
	                    <input type="checkbox" id="normal_diet" name="normal_diet">
                	</div>
        		</td>
        		<td rowspan="5"></td> 
        	</tr>
        	<tr>
        		<td colspan="3" rowspan="1">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Oral:</label>
	                    <!-- <input type="checkbox" id="Oral" name="Oral"> -->
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Semi Solid Diet:</label>
	                    <input type="checkbox" id="semi_solid_diet" name="semi_solid_diet">
                	</div>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="3" rowspan="1">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Ryle's Tube:</label>
	                    <!-- <input type="checkbox" id="checkbox1" name="checkbox1"> -->
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Soft Diet:</label>
	                    <input type="checkbox" id="soft_diet" name="soft_diet">
                	</div>
        		</td>

        	</tr>
        	<tr>
        		<td colspan="3" rowspan="1">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Ostomy:</label>
	                    <!-- <input type="checkbox" id="checkbox1" name="checkbox1"> -->
                	</div>
        		</td>

        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Liquid Diet:</label>
	                    <input type="checkbox" id="liquid_diet" name="liquid_diet">
                	</div>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="3" rowspan="1">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Parenteral:</label>
	                    <!-- <input type="checkbox" id="checkbox1" name="checkbox1"> -->
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">If therapeutic specify:</label>
	                    <input type="checkbox" id="if_therapeutic " name="if_therapeutic">
                	</div>
        		</td>
        	</tr>
        </tr>
        <tr>
        	<tr>
        		<td rowspan="6">
        			<div class="label-checkbox-container">
	                    <label for="">Elimination</label>
                    </div>
        		</td>
        		<td rowspan="3">
        			<div class="label-checkbox-container">
	                    <label for="">Bladder</label>
                    </div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Voiding normally:</label>
	                    <input type="checkbox" id="voiding_normally" name="voiding_normally">
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Monitor I/O Cart:</label>
	                    <input type="checkbox" id="monitor" name="monitor">
                	</div>
        		</td>
        		<td rowspan="6"></td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Catheter present:</label>
	                    <input type="checkbox" id="catheter_present" name="catheter_present">
                	</div>
        		</td>
        		<!-- <td></td>
        		<td></td> -->
        	</tr>
        	<tr>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Drains present:</label>
	                    <input type="checkbox" id="drains_present" name="drains_present">
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Mention Drain Volume:</label>
	                    <input type="checkbox" id="mention_drain" name="mention_drain">
                	</div>
        		</td>
        		<!-- <td></td> -->
        	</tr>

        	<tr>
        		<td rowspan="3">
        			<div class="label-checkbox-container">
	                    <label for="">Bowel</label>
                    </div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Normal:</label>
	                    <input type="checkbox" id="normal" name="normal">
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Medications:</label>
	                    <input type="checkbox" id="medications" name="medications">
                	</div>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Constipation:</label>
	                    <input type="checkbox" id="constipation" name="constipation">
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Stool Softeners:</label>
	                    <input type="checkbox" id="stool_softeners" name="stool_softeners">
                	</div>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Diarrhoea:</label>
	                    <input type="checkbox" id="diarrhoea" name="diarrhoea">
                	</div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Informed to doctor:</label>
	                    <input type="checkbox" id="informed_to_doctor" name="informed_to_doctor">
                	</div>
                </td>
        	</tr>
        </tr>
        <tr>
        	<tr>
        		<td rowspan="4">
        			<div class="label-checkbox-container">
	                    <label for="">Sleep</label>
                    </div>
        		</td>
        		<td colspan="3">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Normal:</label>
	                    <input type="checkbox" id="Normal" name="Normal">
                	</div>
        		</td>
        		<td></td>
        		<td></td>
        		<td rowspan="4"></td>
        	</tr>
        	<tr>
        		<td colspan="3"rowspan="3">
        			<div class="label-checkbox-container">
	                    <label for="">Insominia</label>
                    </div>
        		</td>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Reassurance:</label>
	                    <input type="checkbox" id="reassurance" name="reassurance">
                	</div>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Inform to the doctor:</label>
	                    <input type="checkbox" id="inform_to" name="inform_to">
                	</div>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Mrdications:</label>
	                    <input type="checkbox" id="mrdications" name="mrdications">
                	</div>
        		</td>
        	</tr>
        </tr>    
        <tr>
        	<tr>
        		<td rowspan="3">
        			<div class="label-checkbox-container">
	                    <label for="">Fear & Anxiety</label>
                    </div>
        		</td>
        		<td colspan="3">
        			<div class="label-checkbox-container">
	                    <label for="checkbox1">Absent:</label>
	                    <input type="checkbox" id="absent" name="absent">
                	</div>
        		</td>
        		<td></td>
        		<td></td>
        		<td rowspan="3"></td>
        	</tr>
        	<tr>
	        	<td colspan="3" rowspan="2">
                    <div class="label-checkbox-container">
	                    <label for="">Present</label>
                    </div>
	        	</td>
	        	<td colspan="2">
                     <div class="label-checkbox-container">
	                    <label for="checkbox1">Reassurance:</label>
	                    <input type="checkbox" id="Reassurance" name="Reassurance">
                	</div>
	        	</td>
	        </tr>
	        <tr>
	        	<td colspan="2">
                    <div class="label-checkbox-container">
	                    <label for="checkbox1">Counseling:</label>
	                    <input type="checkbox" id="Counseling" name="Counseling">
                	</div>
	        	</td>
	        </tr>
        </tr>
        <tr>
        	<tr>
        		<td rowspan="2">
        			<div class="label-checkbox-container">
	                    <label for="">Name Of Staff</label>
                    </div>
        		</td>
        		<td colspan="3"></td>
        		<td colspan="2"></td>
        		<td rowspan="2"></td>
        	</tr>
        </tr>
            
        </tbody>
    </table>

    <br>

    <div class="col-lg-6">
    	<label  style="text-center;"><h3>Pain Assessment</h3></label>
   
    <table>
    	<tr>
    		<td>
    			<div class="label-checkbox-container">
	                    <label for="">Location</label>
                 </div>
    		</td>
    		<td>
    			<div class="label-checkbox-container">
    				<input type="text" name="location" id="location">
                 </div>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<div class="label-checkbox-container">
	                    <label for="">Frequency</label>
                 </div>
    		</td>
    		<td>
    			<div class="label-checkbox-container">
    				<input type="text" name="frequency" id="frequency">
                 </div>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<div class="label-checkbox-container">
	                    <label for="">Duration</label>
                 </div>
    		</td>
    		<td>
    			<div class="label-checkbox-container">
    				<input type="text" name="duration" id="duration">
                 </div>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<div class="label-checkbox-container">
	                    <label for="">Character</label>
                 </div>
    		</td>
    		<td> 
    			<div class="label-checkbox-container">
    				<!-- <input type="text" name="character" id="character"> -->
    				<label for="">Headache, Deep, Sharp, Cold, Itchy</label>
                 </div>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<div class="label-checkbox-container">
	                    <label for="">Radiation</label>
                 </div>
    		</td>
    		<td>
    			<div class="label-checkbox-container">
    				<input type="text" name="radiation" id="radiation">
                 </div>
    		</td>
    	</tr>
    </table>
    <br><br>
   </div>
    <button type="submit">Submit</button>
   </div>
</form>

</body>
</html>

<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
</script>