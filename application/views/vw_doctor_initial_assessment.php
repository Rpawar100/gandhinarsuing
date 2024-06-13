<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <style>
   input[type="checkbox"][name="breast"] {
        transform: scale(1.5);
        font-size: 20px; 
    }
     .container {
        width: 80%; /* Set the desired width for the entire form */
        margin: 0 auto; /* Center the form horizontally */
        padding: 20px;
        box-sizing: border-box;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

</style>
 <form method="post" enctype="multipart/form-data" name="doctor_intial_assesment_gynaechology"id="doctor_intial_assesment_gynaechology">
	<div class="container">
		<div class="row">
	        <div class="col-lg-12" style="padding-bottom: 5px;">
	            <h2 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px dotted darkgrey;">
	                <b> DOCTORS INITIAL ASSESSMENT </b>
	            </h2>
	        </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="padding-bottom: 5px;">
                <h2 style="margin: 0px;text-align:center;padding-bottom: 10px;border-bottom: 1px dotted darkgrey;">
                    <b> Department Of Obstetrics & Gynaecology </b>
                </h2>
            </div>
        </div>
        <div class="row" style="margin: 0px;">
		    <div class="col-lg-6" style="margin: 0px;">
		        	<div class="col-lg-6">
				        <label class="form-control " style="border:0px;"><b>Medical History<a style="color: red">*</a>:-</b></label>            	
				    </div>
				     <div class="col-lg-6">
				    	<input class="form-control border border-secondary border-2" type="text" name="medical_history" id="medical_history"required="">
				    </div>
				    <div class="col-lg-6">
				        <label class="form-control " style="border:0px;"><b>Menstrual History:-</b></label>
				                	
				    </div>
				     <div class="col-lg-6">
				    	<input class="form-control border border-secondary border-2" type="text" name="menstrual_history" id="menstrual_history">
				    </div>
				    <div class="col-lg-6">
				        <label class="form-control " style="border:0px;"><b>Menarche Cycle:-</b></label>
				                	
				    </div>
				     <div class="col-lg-6">
				    	<input class="form-control border border-secondary border-2" type="text" name="menarche_cycle" id="menarche_cycle">
				    </div>
					<div class="row" style="margin: 5px;">
					    <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Pain:-</b></label>		                	
		                </div>
		                <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>PCB:-</b></label>		                	
		                </div>
		            </div>
					<div class="row" style="margin: 5px;">
		                <div class="col-lg-6">
		    				<input class="form-control border border-secondary border-2" type="text" name="pain" id="pain">
		    			</div>
					    <div class="col-lg-6">    
					        <input class="form-control border border-secondary border-2" type="text" name="pcb" id="pcb">
					    </div>
                    </div>
                    <div class="row" style="margin: 5px;">
					    <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Vaginal Discharge:-</b></label>		                	
		                </div>
		                 <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Cs Smear:-</b></label>		                	
		                </div>
		            </div>
					<div class="row" style="margin: 5px;">
		                <div class="col-lg-6">
		    				<input class="form-control border border-secondary border-2" type="text" name="vaginal_discharge" id="vaginal_discharge">
		    			</div>
					    <div class="col-lg-6">    
					        <input class="form-control border border-secondary border-2" type="text" name="smear" id="smear">
					    </div>
                    </div>
                    <div class="row" style="margin: 5px;">
	                    <div class="col-lg-6">
						      <label class="form-control " style="border:0px;"><b>Indication:-</b></label>		                	
			            </div>
			            <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Alergies:-</b></label>		                	
		                </div>
		            </div>
		            <div class="row" style="margin: 5px;">
			            <div class="col-lg-6">    
						        <input class="form-control border border-secondary border-2" type="text" name="indication" id="indication">
						</div>
						<div class="col-lg-3">    
						        <input type="radio" name="alergies" value="Yes"><b>Yes</b>
						</div>
						<div class="col-lg-3">    
						        <input type="radio" name="alergies" value="No"><b>No</b>
						</div>
					</div>
					<div class="row" style="margin: 5px;">
	                    <div class="col-lg-6">
						      <label class="form-control " style="border:0px;"><b>Family History:-</b></label>		                	
			            </div>
			            <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Abuse:-</b></label>		                	
		                </div>
		            </div>
		            <div class="row" style="margin: 5px;">
			            <div class="col-lg-6">    
						        <input class="form-control border border-secondary border-2" type="text" name="family_history" id="family_history">
						</div>
						<div class="col-lg-6">    
					        <input class="form-control border border-secondary border-2" type="text" name="abuse" id="abuse">
					    </div>

					</div>
					<div class="row" style="margin: 5px;">
		                <div class="col-lg-4">
					      <label class="form-control " style="border:0px;"><b>Exercise/Diet history:-</b></label>		                	
		                </div>
					    <div class="col-lg-8">    
					        <input class="form-control border border-secondary border-2" type="text" name="diet_history" id="diet_history">
					    </div>
                    </div>					
		    </div>
		    <div class="col-lg-6" style="margin: 0px;">
		         	<div class="col-lg-10">
				      <label class="form-control " style="border:0px;"><b>Surgical History (Year/ Procedure/Hospital)<a style="color: red">*</a>:-</b></label>		                	
	                </div>
		            <div class="row" style="margin: 5px;">
                      
		                <div class="col-lg-8">
		    				<input class="form-control border border-secondary border-2" type="text" name="surgical_history_year" id="surgical_history_year"placeholder="Year/Procedure/Hospital">
		    			</div>
					 
                    </div>
						<div class="col-lg-6">
						 <label class="form-control " style="border:0px;"><b>Married Status:-</b></label>		
					    </div>
					<div class="row" style="margin: 5px;">    
					    <div class="col-lg-3">
						        <input type="radio" name="status" value="Yes"><b>Yes</b>
					    </div>
					    <div class="col-lg-3">
						        <input type="radio" name="status" value="No"><b>No</b>
					    </div>
					</div>
					<div class="row" style="margin: 5px;">
					    <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Loss:-</b></label>		                	
		                </div>
		                 <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>IMB:-</b></label>		                	
		                </div>
		            </div>
					<div class="row" style="margin: 5px;">
		                <div class="col-lg-6">
		    				<input class="form-control border border-secondary border-2" type="text" name="loss" id="loss">
		    			</div>
					    <div class="col-lg-6">    
					        <input class="form-control border border-secondary border-2" type="text" name="imb" id="imb">
					    </div>
                    </div>
                    <div class="row" style="margin: 5px;">
					    <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>LMP<a style="color: red">*</a>:-</b></label>		                	
		                </div>
		                 <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>EDD:-</b></label>		                	
		                </div>
		            </div>
					<div class="row" style="margin: 5px;">
		                <div class="col-lg-6">
		    				<input class="form-control border border-secondary border-2" type="text" name="lmp" id="lmp"required="">
		    			</div>
					    <div class="col-lg-6">    
					        <input class="form-control border border-secondary border-2" type="text" name="edd" id="edd">
					    </div>
                    </div>
                    <div class="row" style="margin: 5px;">
					    <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Contraception:-</b></label>		                	
		                </div>
		                <div class="col-lg-6">
					      <label class="form-control " style="border:0px;"><b>Obstetric History:-</b></label>		                	
		                </div>
		            </div>
					<div class="row" style="margin: 5px;">
		                <div class="col-lg-6">
		    				<input class="form-control border border-secondary border-2" type="text" name="contraception" id="contraception">
		    			</div>
					    <div class="col-lg-6">    
					        <input class="form-control border border-secondary border-2" type="text" name="obstetric_history" id="obstetric_history">
					    </div>
                    </div>
                    <div class="row" style="margin: 5px;">
						<div class="col-lg-4">
							<label class="form-control " style="border:0px;"><b>If any allergic to<a style="color: red">*</a>:-</b></label>		                	
						</div>
					    <div class="col-lg-8">    
					        <input class="form-control border border-secondary border-2" type="text" name="allergic_to" id="allergic_to"required="">
					    </div>
                    </div>
                    <div class="row" style="margin: 5px;">
		                <div class="col-lg-4">
					      <label class="form-control " style="border:0px;"><b>Tobacco:-</b></label>		                	
		                </div>
					    <div class="col-lg-3">    
						        <input type="radio" name="tobacco" value="None"><b>None</b>
						</div>
						<div class="col-lg-3">    
						        <input type="radio" name="tobacco" value="Yes"><b>Yes</b>
						</div>
                    </div>
                    <div class="row" style="margin: 5px;">
		                <div class="col-lg-4">
					      <label class="form-control " style="border:0px;"><b>Alcohol:-</b></label>		                	
		                </div>
					    <div class="col-lg-3">    
						        <input type="radio" name="alcohol" value="None"><b>None</b>
						</div>
						<div class="col-lg-3">    
						        <input type="radio" name="alcohol" value="Yes"><b>Yes</b>
						</div>
                    </div>
                    <div class="row" style="margin: 5px;">
		                <div class="col-lg-4">
					      <label class="form-control " style="border:0px;"><b>Drugs:-</b></label>		                	
		                </div>
					    <div class="col-lg-3">    
						        <input type="radio" name="drugs" value="None"><b>None</b>
						</div>
						<div class="col-lg-3">    
						        <input type="radio" name="drugs" value="Yes"><b>Yes</b>
						</div>
                    </div>
			</div> 
		</div>
		<div class="row">
			    <div class="col-lg-6">
			        <label class="control-label">
			            <h3>PHYSICAL EXAMINATION</h3>
			        </label>
			        <div class= "col-lg-6">
						<label >
	        				<input type="checkbox" name="breast"><b> Breast</b>
	    				</label>
				    </div>
				    <div class="col-lg-6">
						<label>
	        				<input  name="breast"type="checkbox"><b> Semen</b>
	    				</label>
				    </div>
				    <div>
						<label class="control-label" style="margin-left: 10px;" >
			                <h3>SYSTEMIC EXAMINATION</h3>
			            </label>
	                </div>
	                <div class="row">
						<div class="col-lg-3">
						      <label class="form-control " style="border:0px;"><b>R/S:-</b></label>		                	
			            </div>
			            <div class="col-lg-3">
			    				<input class="form-control border border-secondary border-2" type="text" name="r_s" id="r_s">
			    		</div>
		    		</div>	
			    	<div class="row">
						<div class="col-lg-3">
						      <label class="form-control " style="border:0px;"><b>CVS:-</b></label>		                	
			            </div>
			            <div class="col-lg-3">
			    				<input class="form-control border border-secondary border-2" type="text" name="cvs" id="cvs">
			    		</div>
			    	</div>	
			    	<div class="row">
						<div class="col-lg-3">
						      <label class="form-control " style="border:0px;"><b>P/A:-</b></label>		                	
			            </div>
			            <div class="col-lg-3">
			    				<input class="form-control border border-secondary border-2" type="text" name="p_a" id="p_a">
			    		</div>
			    	</div>
					<div class="row">
						<div class="col-lg-3">
						      <label class="form-control " style="border:0px;"><h3>Genital/Rectal:-</h3></label>		                	
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-lg-1">
						      <label class="form-control " style="border:0px;"><b>P/S:-</b></label>		                	
			            </div>
			            <div class="col-lg-2">
			    				<input class="form-control border border-secondary border-2" type="text" name="p_s" id="p_s">
			    		</div>
			    		<div class="col-lg-1">
						      <label class="form-control " style="border:0px;"><b>P/V:-</b></label>		                	
			            </div>
			            <div class="col-lg-2">
			    				<input class="form-control border border-secondary border-2" type="text" name="p_v" id="p_v">
			    		</div><div class="col-lg-1">
						      <label class="form-control " style="border:0px;"><b>P/R:-</b></label>		                	
			            </div>
			            <div class="col-lg-2">
			    				<input class="form-control border border-secondary border-2" type="text" name="p_r" id="p_r">
			    		</div>			            
					</div>
			    </div>
			    <div class="col-lg-6 border border-secondary border-2">
			        <label>
			            <h2><b>VITALS</b></h2>  
			        </label>
			        <div class="row mb-2">
			            <div class="col-lg-6">
			                <label><b>WEIGHT:-</b></label>
			                <input class="form-control border border-secondary border-2" type="text" name="weight" id="weight">
			            </div>
			            <div class="col-lg-6">
			                <label><b>HEIGHT:-</b></label>
			                <input class="form-control border border-secondary border-2" type="text" name="height" id="height">
			            </div>
			        </div>
			        <div class="row mb-2">
			            <div class="col-lg-6">
			                <label><b>TEMPERATURE:-</b></label>
			                <input class="form-control border border-secondary border-2" type="text" name="temp" id="temp">
			            </div>
			            <div class="col-lg-6">
			                <label><b>PULSE:-</b></label>
			                <input class="form-control border border-secondary border-2" type="text" name="pulse" id="pulse">
			            </div>
			        </div>
			        <div class="row mb-2">
			            <div class="col-lg-6">
			                <label><b>BP:-</b></label>
			                <input class="form-control border border-secondary border-2" type="text" name="bp" id="bp">
			            </div>
			            <div class="col-lg-6">
			                <label><b>RESPIRATORY RATE(RR):-</b></label>
			                <input class="form-control border border-secondary border-2" type="text" name="rr" id="rr">
			            </div>
			        </div>
			    </div>
		</div>
		<div class="row" style="margin-top:15PX;">
			<div class="col-lg-2">
		        <label><h3>Skin/Pulses/Extremities:-</h3></label>
		    </div>
			<div class="col-lg-3">
			    <input class="form-control border border-secondary border-2" type="text" name="spe" id="spe">
	        </div>
		</div>
		<div class="row">
			 <table id="investigationTable" class="table table-bordered">
			    <thead>
				    <tr>
				        <th>Investigation</th>
				        <th>Reports</th>
				    </tr>
			    </thead>
				<tbody>                
	            </tbody>
		   </table>
		</div>
		<div class="row">
				<div class="col-lg-4">
				 <label class="form-control " style="border:0px;text-align: center;"><b>Plan Of Care<a style="color: red">*</a>:</b></label>		             
				</div>
				<div class="col-lg-4">
				 
                <textarea id="plan_of_care" name="plan_of_care" rows="2" cols="100"></textarea>
           
				</div>
	    </div>
	    <div class="row">
				
				<div class="col-lg-4">
				 <label class="form-control " style="border:0px;text-align: center;"><b>Final Diagnosis:</b></label>		             
				</div>
				<div class="col-lg-4">
                <textarea id="final_diagnosis" name="final_diagnosis" rows="2" cols="100"></textarea>
				</div>
		</div>
		<div class="row">
			<label class="control-label" style="margin-left: 10px;"><h3>Current Medications<a style="color: red">*</a>:</h3></label>
            <table id="currentmedicationsTable" class="table table-bordered">
	            <thead>
	                <tr>
	                    <th>Sr.No</th>
	                    <th>Name Of the Drug with Does Route and Frequency</th>
	                    <th>Last Admission Date</th>

	                </tr>
	            </thead>
	            <tbody>   
	            </tbody>
		    </table>
		</div>
		<div class="col-lg-12">
		        <label><h2>Examination Completed By:</h2></label>
		</div>
		<div class="row">
			<div class="col-lg-3">
			 <label class="form-control " style="border:0px;"><b>Clinical Assistant/Medical Officer:</b></label>	
			</div>
			<div class="col-lg-3">
			  <input class="form-control border border-secondary border-2" type="text" name="rmo_name" id="rmo_name">
	        </div>
	        <div class="col-lg-3">
			 <label class="form-control " style="border:0px;"><b>Consultant Name:</b></label>	
			</div>
			<div class="col-lg-3">
				<input class="form-control border border-secondary border-2" type="text" name="consultant_name" id="consultant_name">
	        </div>
	    </div>
		<div class="row">
			<div class="col-lg-3">
			 <label class="form-control " style="border:0px;"><b>Date:</b></label>	
			</div>
			<div class="col-lg-3">
	           <input class="form-control border border-secondary border-2" type="date" name="date"
	            id="date" maxlength="50">					
	        </div>
			<div class="col-lg-3">
			 <label class="form-control " style="border:0px;"><b>Date:</b></label>	
			</div>
			<div class="col-lg-3">
	           <input class="form-control border border-secondary border-2" type="date" name="d_ate"
	            id="d_ate" maxlength="50">					
	        </div>
		</div>
		<div class="row">
			<div class="col-lg-3">
			 <label class="form-control " style="border:0px;"><b>Time:</b></label>	
			</div>
			<div class="col-lg-3">
	            <input class="form-control border border-secondary border-2" type="time" name="time" id="time" step="1">
	         </div>
			<div class="col-lg-3">
			 <label class="form-control " style="border:0px;"><b>Time:</b></label>	
			</div>
			<div class="col-lg-3">
			<input class="form-control border border-secondary border-2" type="time" name="t_ime" id="t_ime" step="1">
	        </div>
		</div>
		<div class="row">
			<div class="col-lg-6">
			 <label class="form-control " style="border:0px;"><b>Signature:</b></label>	
			</div>
			<div class="col-lg-6">
			 <label class="form-control " style="border:0px;"><b>Signature:</b></label>	
			</div>
		</div>          	
	</div>
</form> 
<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
</script>    