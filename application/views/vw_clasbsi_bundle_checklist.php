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
    <form method="post" enctype="multipart/form-data" name="restraint_monitoring" id="restraint_monitoring">
        <div class="row">
            <label class="control-label" id="title">
                <h2>CLABSI BUNDLE CHECKLIST</h2>
            </label>
        </div>
        <div class="row" style="padding:5px;">
            <div class="col-lg-1">
                <label class="control-label"><b>Patient Name:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="p_name" id="p_name">
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>UHID NO.:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="uhid" id="uhid">
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
                <label class="control-label"><b>age:</b></label>
            </div>
            <div class="col-lg-1">
                <input type="text" class="form-control border-secondary border-2" name="age" id="age">
            </div>
        </div>
        <div class="row" style="padding:5px;">
            <div class="col-lg-1">
                <label class="control-label"><b>DOA:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="doa" id="doa">
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Diagnosis:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="diagnosis" id="diagnosis">
            </div>
             <div class="col-lg-2">
                <label class="control-label"><b>Consultant Name:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="consultant_name" id="consultant_name">
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>IP No.:</b></label>
            </div>
            <div class="col-lg-1">
                <input type="text" class="form-control border-secondary border-2" name="ip_no" id="ip_no">
            </div>

        </div>
        <div class="row" style="padding:5px;">
            <div class="col-lg-1">
                <label class="control-label"><b>CVC Done By:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control border-secondary border-2" name="doa" id="doa">
            </div>
            <div class="col-lg-1">
                <label class="control-label"><b>Insertion Date:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="Date" class="form-control border-secondary border-2" name="date" id="date">
            </div>
             <div class="col-lg-2">
                <label class="control-label"><b>Insertion Time:</b></label>
            </div>
            <div class="col-lg-2">
                <input type="time" class="form-control border-secondary border-2" name="time" id="time">
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
                        <label class="control-label">CVC Day</label>
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
                    <td>M</td>
                    <td>E</td>
                    <td>N</td>
                    <td>M</td>
                    <td>E</td>
                    <td>N</td>
                    <td>M</td>
                    <td>E</td>
                    <td>N</td>
                    <td>M</td>
                    <td>E</td>
                    <td>N</td>
                    <td>M</td>
                    <td>E</td>
                    <td>N</td>
                    <td>M</td>
                    <td>E</td>
                    <td>N</td>
                    <td>M</td>
                    <td>E</td>
                    <td>N</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Hand Hygiene before & After accessing CVC</label>
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
                <tr>
                    <td colspan="3">
                        <label class="control-label">CVC line & in situ</label>
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
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Transparent Dressing site</label>
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
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Dressing Clean & Intact</label>
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
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Maxmial barrier precaution</label>
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
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Staff ID & Sign</label>
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
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">Incharge Sign</label>
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
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="control-label">ICN Sign</label>
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
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php include_once  APPPATH . 'views/footer.php'; ?>
<script type="text/javascript">
</script>