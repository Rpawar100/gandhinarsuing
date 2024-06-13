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
	<form method="post" enctype="multipart/form-data" name="blood_transfusion" id="blood_transfusion">
		<div class="row">
            <label class="control-label" id="title"><h2>BLOOD TRANSFUSION</h2></label>
        </div>
		<div class="row" style="margin-top:15PX ;padding: 5PX;">
			<div class="col-lg-1">
				<label class="control-label"><b>Date:</b></label>
			</div>
			<div class="col-lg-2">
				<input type="date" class="form-control border-secondary border-2"  name="date" id="date">
			</div>
			 <div class="col-lg-1">
                <label class="control-label"><b>IP No.:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="ip_no" id="ip_no" >
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>UHID No.:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="uhid" id="uhid" >
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Bed No.:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="bed_no" id="bed_no" >
            </div>
		</div>
		<div class="row" style="margin-top:10px; padding: 5PX;">
			<div class="col-lg-1">
                <label class="control-label"><b>Patient Name:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="p_name" id="p_name" >
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Age:</b></label>
            </div>
            <div class="col-lg-1">
                <input type="text" class="form-control border-secondary border-2" name="age" id="age" >
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Gender:</b></label>
            </div>
            <div class="col-lg-1">
               <label class="control-label"><b>Male:</b></label>
               <input type="radio" name="gender" value="Male">
            </div>
            <div class="col-lg-1">
            	 <label class="control-label"><b>Female:</b></label>
               <input type="radio" name="gender" value="Female">
            </div>
            <div class="col-lg-1">
             <label class="control-label"><b>Other:</b></label>	
               <input type="radio" name="gender" value="Other">
            </div>
             <div class="col-lg-1">
                <label class="control-label"><b>Blood Group:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="blood_group" id="blood_group" >
            </div>
		</div>
		<table>
			<thead>
				<tr>
					<th>Time</th>
					<th>Type Transfusion</th>
					<th>Time Started</th>
					<th>Time Ended</th>
					<th>Bag No.</th>
					<th>Blood Group on Bag</th>
					<th>Date Of Expiry</th>
					<th>Donor's Blood Group /Rh type</th>
					<th>Cross Match Compatible yes/No</th>
					<th>Checked By Doctor</th>
					<th>T</th>
					<th>P</th>
					<th>R</th>
					<th>BP</th>
					<th>Sign S/N</th>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
					<td>a</td>
                    <td>a</td>

				</tr>
			</tbody>
		</table>
		<div class="row" style="margin-top:10px;">
			<div class="col-lg-2">
			    <label class="control-label"><b>Reaction any / action taken:</b></label>
	      	</div>
	      	<div class="col-lg-6">
			   <textarea class="form-control border-secondary border-2" name="raction" id="raction" rows="1"></textarea>
		    </div>
		</div>

	</form>
</div>
<?php include_once  APPPATH.'views/footer.php'; ?>
<script type="text/javascript">
</script>