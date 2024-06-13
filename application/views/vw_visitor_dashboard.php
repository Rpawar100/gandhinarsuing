<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox-title"  style="padding-top: 10px !important;">
        <div class="row" >
	        <form action="" style="width: 100%">
	            <input type="hidden" name="daterange" id="daterangeinput" value="<?=!empty($_GET['daterange'])? $_GET['daterange']:''?>">
	                <div class="col-lg-4" style="float: left;">
	                    <h3 style="font-size: 19px;"><b>Visitor Dashboard</b></h3>
	                </div>
	                <div class="col-lg-3" style="float: left;">
	                    <div id="daterangepicker" class="" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; ">
	                        <i class="fa fa-calendar"></i>&nbsp;
	                         <span><?=!empty($_GET['daterange'])? substr_replace($_GET['daterange'],' to ',10,2):''?></span>  
	                        <i class="fa fa-caret-down"></i>
	                    </div>
	                </div>
	                <div class="col-lg-2" style="float: left;">
	                    <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
	                </div>
	        </form>
    		</div>
      </div>
      <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px;">
			<div class="col-lg-12" style="margin: 10px 0px;    padding-right: 0px;">
				<div class="ibox float-e-margins" style="margin: 0px;">
					<div id="orderchart" style="height: 370px; "></div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-bottom: 10px;">
				<div class="col-lg-4">
					<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
						<h2><b>Reason-wise Count</b></h2>
						<hr>
						<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $reason_count[0]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $reason_count[0]['count']?>
							</div>
						</div>
						<?php for($i=1;$i<count($reason_count);$i++){ ?>
							<hr style="margin: 0px;">
							<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $reason_count[$i]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $reason_count[$i]['count']?>
							</div>
						</div>
						<?php }?>
					</div>
				<br>
					<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
						<h2><b>Section-wise Count</b></h2>
						<hr>
						<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $section_count[0]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $section_count[0]['count']?>
							</div>
						</div>
						<?php for($i=1;$i<count($section_count);$i++){ ?>
							<hr style="margin: 0px;">
							<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $section_count[$i]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $section_count[$i]['count']?>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
				<div class="col-lg-4" >
					<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
						<h2><b>Doctor-wise Count</b></h2>
						<hr>
						<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $doctor_count[0]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $doctor_count[0]['count']?>
							</div>
						</div>
						<?php for($i=1;$i<count($doctor_count);$i++){ ?>
							<hr style="margin: 0px;">
							<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $doctor_count[$i]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $doctor_count[$i]['count']?>
							</div>
						</div>
						<?php }?>
					</div>
				<br>
					<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
						<h2><b>Department-wise Count</b></h2>
						<hr>
						<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $department_count[0]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $department_count[0]['count']?>
							</div>
						</div>
						<?php for($i=1;$i<count($department_count);$i++){ ?>
							<hr style="margin: 0px;">
							<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $department_count[$i]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $department_count[$i]['count']?>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
				<div class="col-lg-4">
					<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
						<h2><b>Inserted By-wise Count</b></h2>
						<hr>
						<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $user_count[0]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $user_count[0]['count']?>
							</div>
						</div>
						<?php for($i=1;$i<count($user_count);$i++){ ?>
							<hr style="margin: 0px;">
							<div class="row" style="font-size: 16px;padding: 10px;">
							<div class="col-lg-10" style="border-right: 1px solid lightblue;">
								<?php echo $user_count[$i]['name']?>
							</div>
							<div class="col-lg-2" style="text-align: center;">
								<?php echo $user_count[$i]['count']?>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
		</div>
      </div>
    </div>
  </div>
</div>


<?php include_once  APPPATH.'views/footer.php'; ?>
<!-- Flot -->
<script src="<?=base_url('assets')?>/js/plugins/flot/jquery.flot.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/flot/jquery.flot.time.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
	$('#visitor_dashboard_tab').addClass('active');
	get_data();
	function get_data(){
		var dataPoints = [];
		var dataPoints1 = [];
		var dataPoints2 = [];
		var dataPoints3 = [];
		var allLinesArray = <?=$graph_count?>;
;
		if (allLinesArray.length > 0) {
			for (var i = 0; i <= allLinesArray.length - 1; i++) {
				x_array=allLinesArray[i]['x'].split('-');
				
				dataPoints.push({
					x: new Date(allLinesArray[i]['x']),
					y: parseInt(allLinesArray[i]['u_y'])
				});
				dataPoints1.push({
					x: new Date(allLinesArray[i]['x']),
					y: parseInt(allLinesArray[i]['d_y'])
				});
				dataPoints2.push({
					x: new Date(allLinesArray[i]['x']),
					y: parseInt(allLinesArray[i]['d_y'])-parseInt(allLinesArray[i]['u_y'])
				});
			}
		}

		var orderchart = new CanvasJS.Chart("orderchart", {
			zoomEnabled: true,
      		zoomType: "x",
			animationEnabled: true,
			theme: "light2",
			title: {
				text: "Visitor In-Out Count"
			},
			axisX: {
				valueFormatString: "DD-MMM",
				viewportMinimum: allLinesArray[0]['x'],
        		viewportMaximum: allLinesArray[allLinesArray.length - 1]['x'],
			},
			axisY:[{
					title: "Visitor In-Out",
					lineColor: "#369EAD",
					titleFontColor: "#369EAD",
					labelFontColor: "#369EAD"
				}],
			
			toolTip: {
				shared: true
			},
			legend: {
				cursor: "pointer",
				horizontalAlign: "right",
        		verticalAlign: "center",
				itemclick: toggleDataSeries
			},
			data: [
				{
					type: "column",
					name: "Stay In Hospital",
					showInLegend: true,
					color: "#fdd207",
					dataPoints: dataPoints2
				}
				,{
					type: "line",
					name: "Visitor In Count",
					showInLegend: true,
					color: "#00008B",
					dataPoints: dataPoints1
				}
				,{
					type: "line",
					
					name: "Visitor Out Count",
					showInLegend: true,
					color: "#FF0000",
					dataPoints: dataPoints
				}
				
			]
		});

		
		window.addEventListener('load', function() {
			let percentage=document.getElementsByTagName('html')[0].style.zoom;
			percentage = percentage.slice(0, -1);
			zoom_level=(10000/percentage);
		   	document.getElementById('orderchart').style.zoom=zoom_level+"%"; 
		    orderchart.axisX[0].set("viewportMinimum", null, false);
  			orderchart.axisX[0].set("viewportMaximum", null);
		});
		
		orderchart.render();

		function toggleDataSeries(e) {
			if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			} else {
				e.dataSeries.visible = true;
			}
			e.chart.render();
		}
	}
</script>
