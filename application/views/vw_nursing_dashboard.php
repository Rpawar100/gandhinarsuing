<?php include_once  APPPATH.'views/header.php'; ?>
<?php include_once  APPPATH.'views/leftbar.php'; ?>
<style type="text/css">
	  .ibox-content{
    padding-top: 0px;
    padding-bottom: 10px;
    text-align: center;
  }
  .count_div{
    border-bottom: 1px solid lightgray;
    margin:0px;
  }
  .right_left{
    border-right: 1px solid lightgray; 
    border-left: 1px solid lightgray;
    padding-bottom: 5px;
    padding-top: 10px;
  }
  .right{
    border-right: 1px solid lightgray; 
    padding-bottom: 5px;
    padding-top: 10px;
  }
  .active{
    background-color:#ff000036;
  }
  .inactive{
    background-color:#00ff0040;
  }

</style>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox-title"  style="padding-top: 10px !important;">
        <div class="row" >
	        <form action="" style="width: 100%">
	            <input type="hidden" name="daterange" id="daterangeinput" value="<?=!empty($_GET['daterange'])? $_GET['daterange']:''?>">
	                <div class="col-lg-4" style="float: left;">
	                    <h3 style="font-size: 19px;"><b>Nursing Dashboard</b></h3>
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
			<div class="col-lg-4">
				<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
					<h2><b>Total Bed</b></h2>
					<hr>
					<div class="row" style="font-size: 16px;">
						<div class="col-lg-12">
						<b style="font-size: 30px;">84</b>
						</div>
					</div>
					
					<hr style="margin: 0px;">			
				</div>
			<br>
			
			</div>
			<div class="col-lg-4" >
				<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
					<h2><b>Occupied Bed</b></h2>
					<hr>
					<div class="row" style="font-size: 16px;">
						<div class="col-lg-12">
							<b style="font-size: 30px;">23</b>
						</div>
					</div>
					<hr style="margin: 0px;">
				</div>
			<br>
				
			</div>
			<div class="col-lg-4">
				<div  style="margin: 10px; padding: 20px;border: 2px solid lightblue;border-radius: 20px;">
					<h2><b>Available Bed</b></h2>
					<hr>
					<div class="row" style="font-size: 16px;">
						<div class="col-lg-12">
							<b style="font-size: 30px;">12</b>
						</div>
					</div>
					<hr style="margin: 0px;">
				</div>	
			</div>
	 </div>
	 <div class="row" style="margin-bottom: 10px;">
			<div class="col-lg-6">
				<div id="chartContainer" style="height: 300px; width: 100%;">
  				</div>
  			</div>

  			<div class="col-lg-6">
				<div id="chartContainer1" style="height: 300px; width: 100%;">
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
	$('#nursing_dashboard_tab').addClass('active');
	 window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "A Monthly and Yearly Income Chart"
      
      },   
      data: [{        
        type: "stackedArea", //or stackedColumn
        color: "#d9d2d2",
        dataPoints: [
        { x: 10, y: 171 ,color: "blue"},
        { x: 20, y: 155,color: "blue"},
        { x: 30, y: 150,color: "blue" },
        { x: 40, y: 165 ,color: "blue"},
        { x: 50, y: 195 ,color: "blue"},
        { x: 60, y: 168 ,color: "blue"},
        { x: 70, y: 128 ,color: "blue"},
        { x: 80, y: 134 ,color: "blue"},
        { x: 90, y: 114,color: "blue"}
        ]
      },{        
        type: "stackedArea", //or stackedColumn
        color: "#ebe8e8",
        dataPoints: [
        { x: 10, y: 101 },
        { x: 20, y: 105,color: "yellow"},
        { x: 30, y: 100 ,color: "yellow"},
        { x: 40, y: 105 ,color: "yellow"},
        { x: 50, y: 105 ,color: "yellow"},
        { x: 60, y: 108 ,color: "yellow"},
        { x: 70, y: 108 ,color: "yellow"},
        { x: 80, y: 104 ,color: "yellow"},
        { x: 90, y: 104,color: "yellow"}
        ]
      }
      ]
    });

    chart.render();



        var chart1 = new CanvasJS.Chart("chartContainer1",
    {
      title:{
        text: "Total Patient Count"
    },
    axisX:{
        title: "timeline",
        gridThickness: 2
    },
    axisY: {
        title: "Downloads"
    },
    data: [
    {        
        type: "area",
        color:"#d2dbfa",
        dataPoints: [//array
        { x: new Date(2024, 01, 1), y: 2,color: "blue"},
        { x: new Date(2024, 01, 3), y: 3,color: "blue"},
        { x: new Date(2024, 01, 5), y: 1,color: "blue"},
        { x: new Date(2024, 01, 7), y: 4,color: "blue"},
        { x: new Date(2024, 01, 11), y: 5,color: "blue"},
        { x: new Date(2024, 01, 13), y: 3,color: "blue"},
        { x: new Date(2024, 01, 20), y: 2,color: "blue"},
        { x: new Date(2024, 01, 21), y: 6,color: "blue"},
        { x: new Date(2024, 01, 25), y: 2,color: "blue"},
        { x: new Date(2024, 01, 27), y: 5,color: "blue"}

        ]
    }
    ]
});

    chart1.render();
  }

  if(SESSION_['role_id']==2){

        table.columns(8).visible(false);
        
    }

 
	


</script>
