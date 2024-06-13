<?php 
setlocale(LC_MONETARY, 'en_IN');
?>
<!DOCTYPE html>
<html >
	<head>
		<link rel="shortcut icon" type="image/png" href="<?=base_url('assets')?>/images/gandhi.png"/>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=1920, initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no"/>
		<title>Gandhi Nursing Home</title>
		<link href="<?=base_url('assets')?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url('assets')?>/css/animate.css" rel="stylesheet">
		<link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet">
		<link href="<?=base_url('assets')?>/font/css/font-awesome.css" rel="stylesheet">

		<!--
		<link href="<?=base_url('assets')?>/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="<?=base_url('assets')?>/css/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/daygrid/main.min.css" />
		-->

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>






		


		<link href="<?=base_url('assets')?>/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
		<link href="<?=base_url('assets')?>/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="<?=base_url('assets')?>/js/jquery-2.1.1.js"></script>
		<script src="<?=base_url('assets')?>/js/popper.min.js"></script>
		<script src="<?=base_url('assets')?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url('assets')?>/js/plugins/validate/jquery.validate.min.js"></script>
		<script src="<?=base_url('assets')?>/js/plugins/dataTables/datatables.min.js"></script>

		<!--
		<script src="<?=base_url('assets')?>/js/fullcalendar/fullcalendar.min.js" defer></script>
		<script src="<?=base_url('assets')?>/js/fullcalendar/moment.min.js" defer></script> 
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/daygrid/main.min.js"></script>-->





		<script src="<?=base_url('assets')?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
		<script src="<?=base_url('assets')?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script> 
		<style type="text/css">
			.modal { overflow: auto !important; }
			.modal-dialog{
				background: white;
			}
			.loader {
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 9999;
				background: url('<?=base_url('assets')?>/images/page_loader.gif') 50% 50% no-repeat rgb(249,249,249);
				opacity: .8;
			}
			th,td{
				text-align: center !important;
				vertical-align: middle !important;
				
			}
			thead>tr>th{
				background-color: #2f4050 !important;
				color: white !important;
			}
			.wrapper-content{
				padding-top: 0 !important;
				padding-left: 0 !important;
			}
			@media (min-width: 768px)
			{
				#page-wrapper{
					margin: 0px;
				}
				.navbar-right{
					margin-right: 0px;
				}
			}

			@media print {
				thead>tr>th{
					background-color: white !important;
					color: black !important;
				}
			}
			img {
				pointer-events: none;
				-webkit-user-drag: none;
				-khtml-user-drag: none;
				-moz-user-drag: none;
				-o-user-drag: none;
				user-drag: none;
			}

			* {
				box-sizing: border-box;
			}

		
			.autocomplete {
				position: relative;
				display: inline-block;
			}

			.autocomplete-items {
				position: absolute;
				border: 1px solid #d4d4d4;
				border-bottom: none;
				border-top: none;
				z-index: 99;
				/*position the autocomplete items to be the same width as the container:*/
				top: 100%;
				left: 15px;
				right: 15px;
			}

			.autocomplete-items div {
				padding: 5px;
				cursor: pointer;
				background-color: #fff;
				border-bottom: 1px solid #d4d4d4;
			}
	
			/*when hovering an item:*/
			.autocomplete-items div:hover {
				background-color: #e9e9e9;
			}

			.autocomplete-active {
			background-color: #ffd68c !important;
				color: #000000;
			}
			.switch {
			    position: relative;
			    display: inline-block;
			    width: 50px;
			    height: 21px;
		  	}

		  	.switch input { 
			    opacity: 0;
			    width: 0;
			    height: 0;
		  	}

		  	.slider {
			    position: absolute;
			    cursor: pointer;
			    top: 0;
			    left: 0;
			    right: 0;
			    bottom: 0;
			    background-color: #ccc;
			    -webkit-transition: .4s;
			    transition: .4s;
		  	}

		  	.slider:before {
			    position: absolute;
			    content: "";
			    height: 16px;
			    width: 16px;
			    left: 4px;
			    bottom: 3px;
			    background-color: white;
			    -webkit-transition: .4s;
			    transition: .4s;
		  	}

		  	input:checked + .slider {
		    	background-color: #2196F3;
		  	}

		  	input:focus + .slider {
		    	box-shadow: 0 0 1px #2196F3;
		  	}

		  	input:checked + .slider:before {
			    -webkit-transform: translateX(26px);
			    -ms-transform: translateX(26px);
			    transform: translateX(26px);
		  	}

		  	.slider.round {
		    	border-radius: 34px;
		  	}

		  	.slider.round:before {
		    	border-radius: 50%;
		  	}
		  	#myProgress {
			    padding: 0px;
			    background-color: #ddd;
			    display: block;
			    max-height: 30px;
			}

			#myBar {
			    width: 0%;
			    height: 30px;
			    background-color: #04AA6D;
			}
		</style>
		<script type="text/javascript">
	        document.onkeydown = function(e) {
	            if(event.keyCode == 123) {
	                return false;
	            }
	            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
	                return false;
	            }
	            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
	                return false;
	            }
	            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
	                return false;
	            }
	            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
	                return false;
	            }
	        }
	        var message = "";
	        function clickIE() {
	            if (document.all) {
	                (message);
	                return false;
	            }
	        }

	        function clickNS(e) {
	            if (document.layers || (document.getElementById && !document.all)) {
	                if (e.which == 2 || e.which == 3) {
	                    (message);
	                    return false;
	                }
	            }
	        }
	        if (document.layers) {
	            document.captureEvents(Event.MOUSEDOWN);
	            document.onmousedown = clickNS;
	        } else {
	            document.onmouseup = clickNS;
	            document.oncontextmenu = clickIE;
	        }
	            
	        document.oncontextmenu = new Function("return false");

	        var screenWidth = window.innerWidth;
	        var percentag=(window.innerWidth/1920)*100;
	        
	        document.getElementsByTagName('html')[0].style.zoom=percentag+"%";
	    </script>
	</head>
<body style="color: black;background-color: #f3f3f4 !important;" oncontextmenu="return false;"> 
	<div class="loader"></div>
	<div id="wrapper" tabindex="-2">

