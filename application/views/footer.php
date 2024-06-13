<script>

  $(document).on("keypress",'.isNumber',function (event) { 
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode>=42 && charCode <=57) {
      return true;
    }else{
      return false;
    }
  });

  $(document).on('click','.close_gallery_model',function () {
    $('#photo_gallery').modal('hide');
  });

  function image_gallery(dir,input_name){
    if($('#photo_gallery').html()=='')
    {
      html_code='<div class="modal-dialog modal-lg"><div class="modal-content" style="min-height: 600px;"><div class="modal-header"><h4 class="modal-title">Select Image from Gallery</h4><button type="button" class="close_gallery_model">&times;</button></div><div class="modal-body" style=""><div class="row photo_gallery_list"></div></div><div class="modal-footer"><button type="button" class="btn btn-default pull-left close_gallery_model">Close</button></div></div></div>';
      $('#photo_gallery').html(html_code);
    } 
    $('.photo_gallery_list').html('') ;
      var path = "https://zerzura.in/admin/"+dir+"/";
      var Images='';
      $.ajax({
      url: dir,
      success: function (data) {
        $(data).find("td > a").each(function(){
              var filename=$(this).attr("href");
              if(filename.includes('.png')||filename.includes('.jpg')||filename.includes('.jpeg'))
              {
                 Images+='<div class="col-lg-3 selected_image" style="margin: 1%;border: 1px solid gray;border-radius: 10px;" name="'+input_name+'" path="' + path + filename + '"><img class="col-lg-12" style="width:100%;padding:0px;" src="' + path + filename + '"></img></div>';
              }
          });
        if(Images=='')
        {
          $('.photo_gallery_list').html('<img class="col-lg-12" style="padding: 0px 225px;" src="https://zerzura.in/admin/assets/images/no-record.png"></img>');
        }
        else
        {
          $('.photo_gallery_list').html(Images);
        }
        $('#photo_gallery').modal('show');
      }
    });  
  }

  // function empty_disable_enable(id,status){
  //   switch(status){
  //     case '0':
  //       $(id).val('');
  //       $(id).prop("disabled", true);
  //       $(id).css('background-color', 'lightgray');
  //     break;
  //     case '1':
  //       $(id).val('');
  //       $(id).prop("disabled", false);
  //       $(id).css('background-color', 'white');
  //     break;
  //   }
  // }

  function empty_enable_disable(id,status,empty){
    if(empty=='1'){
      $(id).val('');
    }
    switch(status){
      case '0':
        $(id).prop("disabled", true);
        $(id).css('background-color', 'lightgray');
      break;
      case '1':
        $(id).prop("disabled", false);
        $(id).css('background-color', 'white');
      break;
    }
  }


      function empty_course_id()
    {
      empty_disable_enable('.course_id','0');
      $('.course_id').html('');
      empty_subject_id();
    }

    function empty_subject_id()
    {
      empty_disable_enable('.subject_id','0');
      $('.subject_id').html('');
      empty_topic_id();
    }

    function empty_topic_id()
    {
      empty_disable_enable('.SS_id','0');
      $('.SS_id').html('');
      empty_test_id();
    }

    function empty_test_id()
    {
      empty_disable_enable('.test_id','0');
      $('.test_id').html('');
    }

  $(document).on('click','.selected_image',function () {
    path=$(this).attr('path');
    name=$(this).attr('name');
    $('#'+name+'_view').attr('src',path);
    $('#'+name+'_url').val(path);
    $('.'+name+'_trash').show();
    $('#'+name).prop('required',false);
    $('#photo_gallery').modal('hide');
  });
  
  function checkIfImageExists(url, callback) {
    const img = new Image();
    img.src = url;
    
    if (img.complete) {
      callback(true);
    } else {
      img.onload = () => {
        callback(true);
      };
      
      img.onerror = () => {
        callback(false);
      };
    }
  }

  $(window).keydown(function(event){
    if(event.keyCode == 113) {
      checked_val=$('#language').val(); 
      if(checked_val=='1') {
        $('#language_img').attr('src','<?=base_url('assets')?>/images/english.png'); 
        $('#language').val('2');
        closeAllLists();
        $('.autocomplete-items').remove();
      }
      else{
        $('#language_img').attr('src','<?=base_url('assets')?>/images/marathi.png'); 
        $('#language').val('1'); 
      }

      $.ajax({
        url:'<?php echo base_url()?>change-language',
        data:{
          language_type: $('#language').val()
        },
        method:'post',
        success:function(data){},
      });
    }
  });

  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i]) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }

  $(document).on('keyup', 'input[type=text],textarea[type=text]', function (e) {
    var a,b;
    val = $(this).val();
    checked_val=$('#language').val(); 
    var cc=$(this);
    var par=$(this).parent();
    parent_element=par[0].tagName;
    if (parent_element!='TH' && checked_val=='1' && !$(this).hasClass("isNumber"))
    {
      if (e.keyCode == 32) 
      {
        if($('.data-0').val()!=undefined)
        {
          if ($(cc).val()) 
          {
            $(cc).val($.trim($('.data-0').val()+' '));
          }
          else
          {
            $(cc).val($.trim($('.data-0').val()));
          }
          var   ul, li, a, i, txtValue;
          ul = $(cc).parent().siblings('ul');
          if (ul) 
          {
            li = ul.children();
            filter=$('.data-0').val();
            for (i = 1; i < (li.length-1); i++) 
            {
              a = li[i].getElementsByTagName("a")[0].getElementsByTagName("span")[0];
              txtValue = a.textContent || a.innerText;
              if (txtValue.search(filter) > -1) 
              {
                $(ul).find("[data-original-index='" +[i]+ "']").removeClass('hidden');
                $(ul).find("[data-original-index='" +[i]+ "']").addClass('active');
              } else {
                $(ul).find("[data-original-index='" +[i]+"']").addClass('hidden');
                $(ul).find("[data-original-index='" +[i]+ "']").removeClass('active');
              }
            }
          }
        }
        closeAllLists();
        $('.autocomplete-items').remove();
      }
      else if(e.keyCode == 40)
      {
        var focus_sr_no=$('.autocomplete-items').attr('focus_sr_no');
        var length=$('#'+(parseInt(focus_sr_no)+1)).attr('length');
        if(parseInt(length)>=parseInt(focus_sr_no))
        {
          $('#'+focus_sr_no).removeClass("autocomplete-active");
          focus_sr_no=(parseInt(focus_sr_no)+1);
          $('.autocomplete-items').attr("focus_sr_no", focus_sr_no);
          $('#'+focus_sr_no).addClass("autocomplete-active");
          $(cc).val($('.data-'+focus_sr_no).val());
          var   ul, li, a, i, txtValue;
          ul = $(cc).parent().siblings('ul');
          if (ul) 
          {
            li = ul.children();
            filter=$('.data-'+focus_sr_no).val();
            for (i = 1; i < (li.length-1); i++) 
            {
              a = li[i].getElementsByTagName("a")[0].getElementsByTagName("span")[0];
              txtValue = a.textContent || a.innerText;
              if (txtValue.search(filter) > -1) {
                $(ul).find("[data-original-index='" +[i]+ "']").removeClass('hidden');
                $(ul).find("[data-original-index='" +[i]+ "']").addClass('active');
              } else {
                $(ul).find("[data-original-index='" +[i]+"']").addClass('hidden');
                $(ul).find("[data-original-index='" +[i]+"']").removeClass('active');
              }
            }
          }
        }
      }
      else if(e.keyCode == 38)
      {
        var focus_sr_no=$('.autocomplete-items').attr('focus_sr_no');
        if(parseInt(focus_sr_no)>0)
        {
          $('#'+focus_sr_no).removeClass("autocomplete-active");
          focus_sr_no=(parseInt(focus_sr_no)-1);
          $('.autocomplete-items').attr("focus_sr_no", focus_sr_no);
          $('#'+focus_sr_no).addClass("autocomplete-active");
          $(cc).val($('.data-'+focus_sr_no).val());
          var   ul, li, a, i, txtValue;
          ul = $(cc).parent().siblings('ul');
          if (ul) 
          {
            li = ul.children();
            filter=$('.data-'+focus_sr_no).val()
            for (i = 1; i < (li.length-1); i++) {
              a = li[i].getElementsByTagName("a")[0].getElementsByTagName("span")[0];
              txtValue = a.textContent || a.innerText;
              if (txtValue.search(filter) > -1) {
                $(ul).find("[data-original-index='" +[i]+ "']").removeClass('hidden');
                $(ul).find("[data-original-index='" +[i]+ "']").addClass('active');
              } else {
                $(ul).find("[data-original-index='" +[i]+"']").addClass('hidden');
                $(ul).find("[data-original-index='" +[i]+ "']").removeClass('active');
              }
            }
          }
        }
      }
      else if(e.keyCode == 13)
      {
        event.preventDefault();
        $("#autocomplete-list").css("color", "yellow");
        var focus_sr_no=$('.autocomplete-items').attr('focus_sr_no');
        if(parseInt(focus)!=-1)
        {
          if ($('.data-'+focus_sr_no).val()!=undefined) {
            $(cc).val($('.data-'+focus_sr_no).val()+' ');
          }else{
            $(cc).val($(cc).val());
          }
        }
        else
        {
          if ($('.data-0').val()!=undefined) {
            $(cc).val($('.data-0').val()+' ');
          }else{
            $(cc).val($(cc).val());
          }
        }
        var   ul, li, a, i, txtValue;
        ul = $(cc).parent().siblings('ul');
        if (ul) {
          li = ul.children();
          filter=$('.data-'+focus_sr_no).val()
          for (i = 1; i < (li.length-1); i++) {
            a = li[i].getElementsByTagName("a")[0].getElementsByTagName("span")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.search(filter) > -1) {
              $(ul).find("[data-original-index='" +[i]+ "']").removeClass('hidden');
              $(ul).find("[data-original-index='" +[i]+ "']").addClass('active');
            } else {
              $(ul).find("[data-original-index='" +[i]+"']").addClass('hidden');
              $(ul).find("[data-original-index='" +[i]+ "']").removeClass('active');
            }
          }
        }
        closeAllLists();
        $('.autocomplete-items').remove();
      }
      else
      {
        $('.autocomplete-items').remove();
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        a.setAttribute("style", "position:relative;width: 42%;");
        a.setAttribute("focus_sr_no", "-1");

        $(this).parent().append(a);
        $.ajax({
          'type': "get",
          url:'https://inputtools.google.com/request?text='+val+'&itc=mr-t-i0-und&num=13&cp=0&cs=1&ie=utf-8&oe=utf-8&app=demopage',
          'success': function (data) {
            if (data['1']) 
            {
              for(var i=0;i<data['1']['0']['1'].length;i++)
              {
                b = document.createElement("DIV");
                b.setAttribute("id", i);
                b.setAttribute("length", data['1']['0']['1'].length);
                b.innerHTML = "<strong>" +data['1']['0']['1'][i].substr(0, val.length)+ "</strong>";
                b.innerHTML += data['1']['0']['1'][i].substr(val.length);
                b.innerHTML += "<input type='hidden' class='data-"+i+"'  value='" +data['1']['0']['1'][i]+ "'>";
                b.addEventListener("click", function(e) {
                  get_id=this.getAttribute('id');
                  get_val=$('.data-'+get_id+'').val();
                  $(cc).val(get_val);
                  var   ul, li, a, i, txtValue;
                  ul = $(cc).parent().siblings('ul');
                  if (ul) {
                    li = ul.children();
                    filter=get_val;
                    for (i = 1; i < (li.length-1); i++) {
                      a = li[i].getElementsByTagName("a")[0].getElementsByTagName("span")[0];
                      txtValue = a.textContent || a.innerText;
                      if (txtValue.search(filter) > -1) {
                        $(ul).find("[data-original-index='" +[i]+ "']").removeClass('hidden');
                        $(ul).find("[data-original-index='" +[i]+ "']").addClass('active');
                      } else {
                        $(ul).find("[data-original-index='" +[i]+"']").addClass('hidden');
                        $(ul).find("[data-original-index='" +[i]+ "']").removeClass('active');
                      }
                    }
                  }
                  closeAllLists();
                });
                a.appendChild(b);
              }
            }
          }
        });
      }
    }
  });

  $(function() {
    from_date_daterange='<?=!empty($_GET['daterange'])?$_GET['daterange']:''?>';
    var start = moment().subtract(1, 'month');
    var end = moment();
    if (from_date_daterange=='') {
      $('#daterangepicker span').html(start.format('DD-MM-Y')+ ' to ' + end.format('DD-MM-Y'));
    }
    function cb(start, end) {
      $('#daterangepicker span').html(start.format('DD-MM-Y')+ ' to ' + end.format('DD-MM-Y'));
      $('#daterangeinput').val(start.format('DD-MM-Y')+ 'to' + end.format('DD-MM-Y'));
    }
    $('#daterangepicker').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'This Week <br>( Mon - Today )':  [moment().startOf('isoWeek'), moment()],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last Week <br>( Mon - Sun )': [moment().subtract(7, 'days').startOf('isoWeek'),moment().subtract(7, 'days').endOf('isoWeek')],
      'Last 14 Days': [moment().subtract(13, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
      'Last 3 Month': [ moment().subtract(3, 'month'),moment()],
      'Last 6 Month': [ moment().subtract(6, 'month'),moment()],
      }
    }, cb);
  })

</script>
</body>
</html>
<script src="<?=base_url('assets')?>/js/theme.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/validate/jquery.validate.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/validate/additional-methods.js"></script>
<script src="<?=base_url('assets')?>/js/plugins/sweetalert/sweetalert.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
  function to_ind_rs(amount) {
    var x=amount;
    x=x.toString();
    var afterPoint = '';
    if(x.indexOf('.') > 0)
      afterPoint = x.substring(x.indexOf('.'),x.length);
    x = Math.floor(x);
    x=x.toString();
    var lastThree = x.substring(x.length-3);
    var otherNumbers = x.substring(0,x.length-3);
    if(otherNumbers != '')
      lastThree = ',' + lastThree;
    return res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
  }

  $("body").on("submit", "form", function() {
    $(this).submit(function() {
      return false;
    });
    return true;
  });
  
  $(window).load(function() {
    $(".loader").fadeOut("slow");
  });

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

  function capitalize(textboxid, str) {
    if (str && str.length >= 1)
    {       
      var firstChar = str.charAt(0);
      var remainingStr = str.slice(1);
      str = firstChar.toUpperCase() + remainingStr.toLowerCase();
    }
    document.getElementById(textboxid).value = str;
  }
  var today = new Date();

  $('.update_current_user_password').on('click',function(event){
    pass=$('#password_header').val();
    confirm_pass=$('#confirm_password_header').val();
    if(pass==confirm_pass){
      // $.ajax({
      //  url:'<?=base_url()?>add-new-course',
      //  method:'post',
      //  data:formData,
      //  cache: false,
      //  contentType: false,
      //  processData: false,
      //  success:function(data){
      //    if(data){
      //      if(data['swall']['type']=='success')
      //      {
      //        change_tab('active_cust_tab');
      //        reset_course_add_form();
      //        get_user_list();
      //        $('#view_user_modal').modal('show');
      //        $('#add_course_model').modal('hide');
      //        $('.child_table').html('');
      //        var table_view_data='';
      //        for(var i=0;i<data['assign_course'].length;i++)
      //        {
      //          table_view_data+="<tr>\
      //          <td style='padding:4px;vertical-align:middle;'>"+(i+1)+"</td>\
      //          <td style='padding:4px;vertical-align:middle;'>"+data['assign_course'][i]['course_name']+"</td>\
      //          <td style='padding:4px;vertical-align:middle;'>"+data['assign_course'][i]['UC_start_date']+"</td>\
      //          <td style='padding:4px;vertical-align:middle;'>"+data['assign_course'][i]['UC_end_date']+"</td></tr>";
      //        }       
      //        $('.child_table').html(table_view_data);
      //      }
      //      swal({
      //        html:true,
      //        title:data['swall']['title'],
      //        text:data['swall']['text'],
      //        type:data['swall']['type']
      //      });
      //    }
      //  },
      // });
      
    }else if(pass==""){
      alert("Password cannot be Empty");
      $('#password_modal').modal('show');
    }else if(confirm_pass==""){
      alert("Confirm Password cannot be Empty");
      $('#password_modal').modal('show');
    }else{
      alert("Entered passwor and confirmed password are not same");
      $('#password_modal').modal('show');
    }
  });

</script>
