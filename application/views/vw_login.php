<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="<?=base_url('assets')?>/images/title_logo.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synergy Hospital | Login</title>
    <link href="<?=base_url('assets')?>/font/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/css/animate.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

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

        function setZoom() {
            var screenWidth = window.innerWidth;
            var percentag=(window.innerWidth/1920)*100;
             document.body.style.zoom
             document.body.style.zoom = percentag+"%";
        }

        window.addEventListener("resize", setZoom);
        window.addEventListener("load", setZoom);
    </script>
    <style type="text/css">
      .moving-clouds {
          position: absolute;
          z-index: 1;
          top: 0;
          left: 0;
          width: 250.625em;
          height: 20.75em;
          -webkit-animation: cloudLoop 80s linear infinite;
          animation: cloudLoop 80s linear infinite;
        }

        @keyframes cloudLoop {
          0% {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
          }
          50% {
            -webkit-transform: translate3d(-50%, 0, 0);
            transform: translate3d(-50%, 0, 0);
          }
        }
        .input_field{
            margin-top: 10px;
            padding: 10px;
            border-radius: 10px;
            font-size: 16px;
        }
        .input_field:hover{
            border-color: #3a57e8;
        }
        
        .input_label{
            font-size: 16px;
            font-weight: bolder;
            color: gray;
        }
        .btn-info{
           background: transparent;
           margin: 40px auto;
           padding: 8px;
           width: 160px;
           background: #3a57e8;
           border-color: #3a57e8; 
        }
    </style>
</head>
<body   style="margin: 0px;background: white;">
    <div style="width: 100%;height: 100%;overflow: hidden;">
        <div  class="input_page_div" style="width: 50%;background: white;z-index: 2;position: absolute;height: 100%;">
            <img src="<?=base_url('assets')?>/images/login_page_tran_logo.png" style="width: 150px;margin: 5%;position: absolute;opacity:0.08;"> 
            <div class="input_form_div"  style="padding:0% 30%;padding-top: 15%;font-family: inherit;">
                <!--
               <img src="<?=base_url('assets')?>/images/synergy_logo.png" style="width: 200px;margin: 0% 24%;"> -->
                <center>
                    <h1 style="font-weight: bolder;color: black;margin-top: 15%;">Sign In</h1>
                    <h3 >Login to stay connected.<h3>
                </center>
                <hr style="border-style: ridge;">
                <form method="post" action="<?=base_url()?>login">
                    <div class="form-group" style="margin-top: 20px">
                        <label class="input_label">Username</label>
                        <input type="text" class="form-control input_field" maxlength="30" name="user_username" required="">
                    </div>
                    <div class="form-group" style="margin-top: 20px">
                        <label class="input_label">Password</label>
                        <input type="password" class="form-control input_field" maxlength="30" name="user_password" required="">
                    </div>
                    <button type="submit" class="btn btn-info block m-b" style=""><span style="font-size:18px">Login</spabutton>
                </form>
            </div>
             <div class="video_div" style="overflow: hidden;">
                <video width="624" height="352" autoplay loop muted ><source src="<?=base_url('assets')?>/images/doct_video.mp4" type="video/mp4"></video>
            </div>
        </div>
        <div style="width: 50%;float: right;">
            <img src="<?=base_url('assets')?>/images/gandhi.png" style="width: 100%;">
            <div class="moving-clouds" style="background-image: url('<?=base_url('assets')?>/images/cloud.png'); "></div>
        </div>
    </div>
   

    <!-- Mainly scripts -->
    <script src="<?=base_url('assets')?>/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url('assets')?>/js/plugins/sweetalert/sweetalert.min.js"></script> 

    <script>
        panel_resize();
        $(document).ready(function(){

          <?php 
          $flash['active'] = $this->session->flashdata('active');
          $flash['title'] = $this->session->flashdata('title');
          $flash['text'] = $this->session->flashdata('text');
          $flash['type'] = $this->session->flashdata('type');

          if(isset($flash['active']) && $flash['active'] == 1) {?>
            swal({
              title: "<?=$flash['title']?>",
              text: "<?=$flash['text']?>",
              type: "<?=$flash['type']?>"
                });
            <?php } $this->session->set_flashdata('active',0);?>
        });
        function panel_resize(){
            
                total_height=document.querySelector(".input_page_div").offsetHeight;
                console.log("total"+total_height);
                input_div=document.querySelector(".input_form_div").offsetHeight;
                console.log("input_div"+input_div);
                var height = total_height-input_div-42; 
                console.log("remain"+height);
                $(".video_div").css("min-height", height + "px");
                $(".video_div").css("height", height + "px");
            
        }
    </script>
</body>
</html>

        