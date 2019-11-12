// var root_url = "http://192.168.0.155/sfcgdbms/public";
// var root_url = "http://sfcgdbms.3hammers.com";

$(document).ready(function(){

  // $('.check1').toggle(function(){
  //       $('input:checkbox').attr('checked','checked');
  //       $(this).val('uncheck all')
  //   },function(){
  //       $('input:checkbox').removeAttr('checked');
  //       $(this).val('check all');        
  //   })

  $('select.sumoSelect').SumoSelect({search: true, searchText: 'Search Here.'});

  // $('form').submit(function(e){
  //     e.preventDefault();
  //     var submit = true;

  //     // Validate the form using generic validaing
  //     if( !validator.checkAll( $(this) ) ){
  //       submit = false;
  //     }

  //     if( submit )
  //       this.submit();

  //     return false;
  //   });


/** ==== Display district according to zone ==== **/
  $(document).on('change', '.zone1', function(){
      var zone_id = $(this).val();
       
      $('.district1 option').removeClass('hide');
      $('.district1 option').each(function(){
        if (zone_id != $(this).attr('data-attr')) {
          $(this).addClass('hide');
        }

        $('.district1 option').first().removeClass('hide'); 

       $('.district1').val('');

    });
      $('.district1')[0].sumo.reload();
  });

  var zone_id = $('.zone1').val();

  if(zone_id != ''){
     
    $('.district1 option').removeClass('hide');
      $('.district1 option').each(function(){

        if (zone_id != $(this).attr('data-attr')) {
          $(this).addClass('hide');
        }
    });
    $('.district1').val($('.district1').attr('data-district'));

  }


    $(document).on('change', '.select-individual', function(){

      var tmp = $(this).val();
      if (tmp == 'Individual') {
         
// alert(tmp);

        $('.districtifindividual').removeClass('hide');
         $('.districtifindividual').removeAttr('disabled');
        $('.vdcmunciplity').removeClass('hide');
        $('.ward_number').removeClass('hide');

         $('#divindividualhideshow').show();
        
      }else{

          // $('#divindividualhideshow').hide();


        $('.districtifindividual').attr('disabled', false);
        $('textarea[name="vdc_or_munciplity"]').val('');
        $('textarea[name="ward_no"]').val('');
      }
    });

    $(document).on('change', '.select-individual', function(){
      var tmp = $(this).val();
      if (tmp == 'Group') {
    
         $('#divindividualhideshow').hide();
        
      } });



  
$('.date_pick').daterangepicker({
              singleDatePicker: true,
              singleClasses: "picker_1"
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
            });
 

/** ==== Display eidt district according to zone ==== **/
  $(document).on('change', '.zone', function(){
      var zone_id = $(this).val();
       // alert(zone_id);
     $('.district option').addClass('hide');
      $('.district option').each(function(){
        var tmp = $(this);
         $.each( zone_id, function( key, zonevalue ) {
        
          if (zonevalue == tmp.attr('data-attr')) {
            // console.log('same');
            tmp.removeClass('hide');
          }
      });

        //$('.district option').first().removeClass('hide'); 
        
       $('.district').val('');
    });
      $('select.district')[0].sumo.reload();
  });


   
  // for dip and sip plan

   $(document).ready(function () {
     $('#activityradio').change(function () {
            $('#activitytext').removeAttr('disabled');
            $('#selectradio').removeAttr('checked');
            $('.selectkoselect').attr('disabled', true);
        });

     $('.sipAcitivity').change(function(){

        $.ajax({
          url: base_url + '/fromdip',
          method: 'get',
          data: {id: $(this).val() },
          // data: {id: 4444 },

          success:function(data){
            if (data.stat == 'ok') {
              $('form input[name="name_of_activity"]').val(data.value.name);
              var result = data.value.act_type.split(',');
              $('form input[name="activity_id[]"]').each(function(){
                if ($.inArray($(this).attr('data-id'), result ) != -1 ) {
                  $(this).prop("checked", true);
                }else{
                  $(this).prop("checked", false);
                }
              });
              $('form textarea[name="main_objective"]').val(data.value.obj);
              $('form select[name="indicator_activity[]"]').val(data.value.ind_act);
              $('form select[name="indicator_activity[]"]')[0].sumo.reload();
              $('form input[name="indicator"]').val(data.value.ind_no);
            }else{
              alert('Error. Try again later.');
            }
          },
          error:function(data){
            alert('error');
          }
        });
     });

  });

  $(document).ready(function () {
        $('#selectradio').change(function () {
            $('#selectkoselect').removeAttr('disabled');
            $('#activityradio').removeAttr('checked');
            $('#activitytext').attr('disabled', true);
        });
  });


//  $('.daterange').daterangepicker({
//          "locale": {
//         "format": "YYYY-MM-DD",
//         "separator": " - ",
//     },
//  singleDatePicker: true,

// });

// for project 
//   $(document).on('change', '.districtproject', function(){
//           var tmp = $(this).val();
          
//           if (tmp == '1') {
 
//             $('.zone').addClass('hide');
//             $('input[name="zone_id"]').val('');
//             $('#zone').show().append('all district selected');
//           }
//         });


     $(document).on('change', '.select-p-type', function(){
          var tmp = $(this).val();
          
          if (tmp == 'Others') {
          
            $('.p_others').removeClass('hide');
         }else{
            $('.p_others').addClass('hide');
            $('input[name="p_others"]').val('');
          }
        });
    
      $(document).on('change', '.select-act-type', function(){

      var tmp = $(this).val();
        // alert(tmp);
      if (tmp == 'others') {
         
        $('#act-others').removeClass('hide');
         // alert('inside if');
      }else{
        $('#act-others').addClass('hide');
        $('input[name="act_others"]').val('');
      }
    });



//for small grant create/edit

    $(document).on('change', '.select-individual', function(){

      var tmp = $(this).val();
      if (tmp == 'Individual') {
      
        $('.districtifindividual').removeClass('hide');
         $('.districtifindividual').removeAttr('disabled');
        $('.vdcmunciplity').removeClass('hide');
        $('.ward_number').removeClass('hide');

         $('#divindividualhideshow').show();
        
      }else{

        $('#divindividualhideshow').hide();
        $('.districtifindividual').attr('disabled', true);
        $('textarea[name="vdc_or_munciplity"]').val('');
        $('textarea[name="ward_no"]').val('');
      }
    });

    $(document).on('change', '.tgroup', function(){
      var tmp = $(this).val();
      if (tmp == 'others') {
        $('.tgroupText').removeClass('hide');
      }else{
        $('.tgroupText').addClass('hide');
        $('input[name="tg_others"]').val('');
      }
    });


      
    $(document).on('click','.addmorebtn_i_partners', function() {
   
        var html = $('.add_i_partners').html();

        $('.test2').append(html);
         
        });

    
    $(document).on('click','.addmorebtn_c_partners', function() {

        var html = $('.add_c_partners').html();
        $('.test1').append(html);
       
        });


    $(document).on('click','.addmorebtn_r_persons', function() {
  
        var html = $('.add_r_persons').html();

        $('.test3').append(html);
        $('.test3').find('select.test').SumoSelect();
         
        });   
    $(document).on('change','.status',function(){
      //alert('success');
      var value = $(this).val();
      if (value == '2') {
        $('.percentage_complete').removeClass('hide');
      }
      if (value == '1') {
        $('.percentage_complete').addClass('hide');
      }
    });

    $(document).on('change','#amended',function(){
      var value = $(this).val();
      if (value == '1') {
        $('.amendment').removeClass('hide');
      }
      if (value == '2') {
        $('.amendment').addClass('hide');
      }
    });

    $(document).on('change','.priority',function(){
      var value = $(this).val();
      if (value == 'yes') {
        $('.project_priority').removeClass('hide');
      }
      if (value == 'no') {
        $('.project_priority').addClass('hide');
      }
    });

    $(document).on('click','.addmorebtn_m_findings', function() {
   
        var html = $('.add_m_findings').html();
        $('.m_findings').append(html);
       
        });
    $(document).on('click','.addmorebtn_recom', function() {
   
        var html = $('.add_recom').html();
        $('.recom').append(html);
       
        });
     $(document).on('click','.addmorebtn_conduct', function() {
         
        var html = $('.add_conduct').html();
        $('.conduct').append(html);
       datePick();
        });

   
    //delete the added input box
    $(document).on('click','#del_input', function() {
       
        var p = $(this).parent('div');
          //p.attr('class'));
         p.remove();
       
        });

    $(document).on('click','#del_past', function() {
       
        var p = $(this).parent('div');
          //p.attr('class'));
         p.remove();
       
        });
    $(document).on('click','#del_budget', function() {
       
        var p = $(this).parent('div');
          //p.attr('class'));
         p.remove();
       
        });

    $(document).on('click','#del_facility', function() {
       
        var p = $(this).parent('div');
          //p.attr('class'));
         p.remove();
       
        });

    $(document).on('click','#del_payment', function() {
       //alert('success');
        var p = $(this).parent('div');
        
         p.remove();
       
        });

        $(document).on('click','.del_tr', function() {
          
         var p = $(this).closest( 'tr').remove();

        // var p = $(this).deleteRow(0);
        console.log(p);

          //p.attr('class'));
         // p.remove();
       
        });
    
  });


function readLogoURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#previewLogo').attr('src', e.target.result).removeClass('hide');
      $("#img-preview").hide();
    }
    reader.readAsDataURL(input.files[0]);
  }else{
    $('#previewLogo').addClass('hide').attr('src', 'url(\'\')');
  }
}

function readFaviconURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#previewFavicon').attr('src', e.target.result).removeClass('hide');
      $("#img-preview2").hide();
    }
    reader.readAsDataURL(input.files[0]);
  }else{
    $('#previewFavicon').addClass('hide').attr('src', 'url(\'\')');
  }
}

 /* Browse button */
$(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

        // console.log(event);
        // console.log(numFiles);
        // console.log(label);
        
          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              //if( log ) alert(log);
          }

      });
  });

  function datePick() {

      $('.date_pick').daterangepicker({
              singleDatePicker: true,
              singleClasses: "picker_1"
            }, function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
            });
}

   
        



//by samyak for test ko create page but display used by ajax in index page
  $(document).on('click','.add_morebtn_mulanswers', function() {
     
        $p= $(this).parent();
        $p= $p.prev('div.test2').attr("id");
        // alert($p);
        name =  $('#'+$p).find("input").attr("name");
       
        $('#'+$p).append('<br><div class="new-field"> <input type="text" class="form-control answers" placeholder="उत्तर यहाँ लेखनुहोस "  name="'+name+'" value="" required="required" /> <span class="glyphicon glyphicon-trash" id="del_input"></span> </div>');
        });


  //by samyak qna create page

   var clicks = 0; 
$(document).on("click",".addmorebtn_qna", function() {
  // alert('clicked');
   clicks++;
        $('.add .counter').val(clicks)
        var count = $('.add .counter').val(); 
        // console.log(count);
      
        $('.add .question').        attr('id','question'+count)
        $('.add .answer_type').     attr('id','answer_type'+count)   
        $('.add .answer_option').   attr('id','answer_option'+count)
        $('.add .answer_type').     attr('onchange','disablenable(this, "#addmore'+count+'","#answers'+count+'","#addmoreid'+count+'")')
        $('.add .answers').         attr('id','answers'+count)
        $('.add .add_morebtn_answers_qnacreate'). attr('id','add_morebtn_answers_qnacreate'+count)
        $('.add .test2').           attr('id','addmoreid'+count)
        $('.add .addmore').         attr('id','addmore'+count)     
        $('.add .answers').         attr('name','answers'+'['+count+'][]')        
        
          var html = $('.add').html()
        $('#uploadForm #add-slider-wrap .repeat-block-wrap .input-field-group').append(html)
});
//by samyak qna create page

window.disablenable = function (input, addmore, answer, addmoreid) {


   if ($(input).val() == "text") {
            check = $(addmoreid).parent();
           check.hide();
        } else {
             check = $(addmoreid).parent();
             check.show();
        }
    return true;
}
//by samyak qna create page

   $(document).on('click','.add_morebtn_answers_qnacreate', function() {
     
        $p= $(this).parent();
         //alert($p);
        $p= $p.prev('div.test2').attr("id");
        //alert($p);
        name =  $('#'+$p).find("input").attr("name");
       
        $('#'+$p).append('<div class="new-field"> <input type="text" class="form-control answers"  name="'+name+'" value="" /> <span class="glyphicon glyphicon-trash" id="del_input"></span> </div>');
        });


//by samyak qna edit page

   // $(document).on('click','.add_morebtn_answers_qnacreate', function() {
     
   //      $p= $(this).parent();
   //      $p= $p.prev('div.test2').attr("id");
   //      // alert($p);
   //      name =  $('#'+$p).find("input").attr("name");
       
   //      $('#'+$p).append('<div class="new-field"> <input type="text" class="form-control answers"  name="'+name+'" value="" /> <span class="glyphicon glyphicon-trash" id="del_input"></span> </div>');
   //      });

      

         $(document).on('click','#add_morebtn_answers_qnaupdate', function() {
     
        $p= $(this).parent();
        $p= $p.prev('div.test2').attr("id");
        // alert('alert');
        // name =  $('#'+$p).find("input").attr("name");
       
        $('#'+$p).append('<div class="new-field"> <input type="text" class="form-control answers"  name="newadded[]" value="" /> <span class="glyphicon glyphicon-trash" id="del_input"></span> </div>');
        });
        
   
  // for consultancy text field and dropdown enable disable

   $(document).ready(function () {
     $('#document').change(function () {
            $('#documenttext').removeAttr('disabled');
            $('#selectradio').removeAttr('checked');
            $('.selectkoselect').attr('disabled', true);
        });
  });

  $(document).ready(function () {
        $('#selectradio').change(function () {
            $('#selectkoselect').removeAttr('disabled');
            $('#document').removeAttr('checked');
            $('#documenttext').attr('disabled', true);
        });
  });

//partner's profile

     $(document).on('click','.addmorebtn_networks', function() {
   
        var html = $('.add_networks').html();

        $('.test3').append(html);

         
        });

    $(document).on('click','.addmorebtn_ex_n_endors_policy', function() {
   
        var html = $('.add_ex_n_endors_policy').html();

        $('.test4').append(html);
         
        });

    $(document).on('click','.addmorebtn_organization_expertise', function() {
   
        var html = $('.add_organization_expertise').html();

        $('.test5').append(html);
         
        });



    $(document).on('click','.addmorebtn_publications', function() {
   
        var html = $('.add_publications').html();

        $('.test6').append(html);
         
        });         
    
    $(document).on('click','.addmorebtn_geo_coverage', function() {
   
        var html = $('.add_geo_coverage').html();

        $('.test7').append(html);
        $('.test7').find('select.test').SumoSelect();
        
        });  


    $(document).on('click','.addmorebtn_info_project_cover', function() {
   
        var html = $('.add_info_project_cover').html();

        $('.test8').append(html);
        $('.test8').find('select.test').SumoSelect();
        
        });  



/** ==== Display values of benefeciaries according to  benefeciaries type (group and individual) ==== **/
  $(document).on('change', '.group_ind', function(){
      var group_in = $(this).val();
       // alert(group_in);
      
       $('#benefaddmorebutton').removeClass('hide');
      $('.benefhideselect option').removeClass('hide');
      $('.benefhideselect option').each(function(){
        if (group_in != $(this).attr('data-attr')) {
          $(this).addClass('hide');
        }
        //$('.district option').first().removeClass('hide'); 
        $('select.benefhideselect')[0].sumo.reload();
       $('.benefhideselect').val('');
    });
  });

  var group_in = $('.group_ind').val();
  if(group_in != ''){
    // alert('if');
    $('.benefhideselect option').removeClass('hide');
      $('.benefhideselect option').each(function(){
        if (group_in != $(this).attr('data-attr')) {
          $(this).addClass('hide');
        }
    });
    $('.benefhideselect').val($('.benefhideselect').attr('data-benefhideselect'));

  }

/** ==== Display values of benefeciaries in small grant edit **/
  $(document).on('change', '.group_ind', function(){
      var group_in = $(this).val();
       // alert(group_in);
      $('.benefhideselectedit option').removeClass('hide');
      $('.benefhideselectedit option').each(function(){
        if (group_in != $(this).attr('data-attr')) {
          $(this).addClass('hide');
        }
        //$('.district option').first().removeClass('hide'); 
        $('select.benefhideselectedit')[0].sumo.reload();
       $('.benefhideselectedit').val('');
    });
  });

  $(document).on('keyup', '.genderAdd', function(){
    $total = 0;
    $('.genderAdd').each(function(){
      if ($(this).val() == '') {
        $val = 0;
      }else{
        $val = $(this).val();
      }
      $total += parseInt($val);
    });
    $('.genderAddTotal').val($total);
  });



$(document).on('change', '#theme_select', function(){

      var tmp = $(this).val();
        // alert(tmp);
      if (tmp == 'other') {
         
        $('.theme_others').removeClass('hide');
         // alert('inside if');
      }else{
        $('.theme_others').addClass('hide');
        $('input[name="theme_others"]').val('');
      }
    });


 

$(document).keyup('.eb_female , .eb_male', function(){

      var   eb_female= $('.eb_female').val();
      var   eb_male= $('.eb_male').val();
        
      if ( eb_female!='' ) {
        if ( eb_male!='' ) { 
          $('input[name="eb_total"]').val(parseInt(eb_female)+parseInt(eb_male));
        }
      }
    });

$(document).keyup('.pb_travel, pb_accom, pb_program , .eb_male', function(){

      var   pb_travel= $('.pb_travel').val();
      var   pb_accom= $('.pb_accom').val();
      var   pb_program= $('.pb_program').val();

      if (typeof pb_travel != "undefined" && pb_travel!='' ) {
        if (typeof pb_accom != "undefined" && pb_accom!=='' ) { 
          if (typeof pb_program != "undefined" && pb_program!=='' ) {
         
        $('input[name="pb_total"]').val(parseInt(pb_travel)+parseInt(pb_accom)+parseInt(pb_program));
          }
        }
      }
    });



//date picker 
$(document).ready(function(){
        var date_input=$('input[id="datepick-all"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        // alert(container);
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            // todayBtn: true,
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
        })
    });

// for quarter and quarter year
$(document).ready(function(){
   var select = $('#quarter_select_year');

     $('.quarter_year_select').on('click',function(){
     
        // $('#quarter-year').show();
        $('#quarter-year').removeClass('hide');

        select.attr('required', true);
     
      });

 });



    $(document).on('change', '.select-type-of-program', function(){

      var tmp = $(this).val();

      // alert(tmp);
      if (tmp == 'Others') {
         
// alert(tmp);
  // alert('true');
        $('.other-program-type-class').removeClass('hide');
         $('.select-type-of-otherprogram').removeAttr('disabled');
          
      }else{

          $('.other-program-type-class').addClass('hide');;

        $('.select-type-of-otherprogram').attr('disabled', true);
      }
    });

//Beneficiar group/individual show hide 

    $(document).on('change', '.benef-group-ind-select', function(){

      var tmp = $(this).val();

      if (tmp == 'Individual') {
         
      // alert(Individual);

        $('.ind-age').removeClass('hide');
        $('.group-age').addClass('hide');

        $('.ind-gender').removeClass('hide');
        $('.group-gender').addClass('hide');

        $('.ind-identity').removeClass('hide');
        $('.group-identity').addClass('hide');

        $('.ind-cast-eth').removeClass('hide');
        $('.group-cast-eth').addClass('hide');

          new PNotify({
                                  title: 'Individual Field Loaded Successfully',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
        
      }
      if (tmp == 'Group') {

          // alert('Group');
        $('.ind-age').addClass('hide');
        $('.group-age').removeClass('hide');

        $('.ind-gender').addClass('hide');
        $('.group-gender').removeClass('hide');

        $('.ind-identity').addClass('hide');
        $('.group-identity').removeClass('hide');

        $('.ind-cast-eth').addClass('hide');
        $('.group-cast-eth').removeClass('hide');

        
          new PNotify({
                                  title: 'Group Field Loaded Successfully',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });
          

      }

       if (tmp == '') {
          // alert('Group');
        $('.ind-age').addClass('hide');
        $('.group-age').addClass('hide');

        $('.ind-gender').addClass('hide');
        $('.group-gender').addClass('hide');

        $('.ind-identity').addClass('hide');
        $('.group-identity').addClass('hide');

        $('.ind-cast-eth').addClass('hide');
        $('.group-cast-eth').addClass('hide');

            new PNotify({
                                  title: 'Select Individual/Group',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });


      }
    });



//community mediator adding people

     $(document).on('click','.addmorebtn_addingpeople', function() {
   
        var html = $('.add_people').html();

        $('.peopleaddingclass').append(html);

         
        });



// Activity Completion Reprot

    // $(document).on('click','.classforother', function() {
    
    // alert('ksdfkjskdf');
        // $('#otherinput_text').removeClass('hide');

        // // $('#otherinput_text').addClass('hide');

         
        // });  

    // $(document).ready(function(){
    //   $('.classforother').click(function(){
    //     // alert('sdfsdf');
    //       $('#otherinput_text').toggle();
    //       });
    // });


    $(document).on('click','.addmorebtn_result_outcome', function() {
   
        var html = $('.add_result_outcome').html();

        $('.divappend1').append(html);
         
        });   

    $(document).on('click','.addmorebtn_quote_participant', function() {
   
        var html = $('.add_quote_participant').html();

        $('.divappend2').append(html);
    });  

    $(document).on('click','.add_past_experience',function(){
      //alert('success');
      var html = $('.add_past').html();
      $('.div_to_append').append(html);
      
    });

    $(document).on('click','.add_budget',function(){
      //alert('success');
      var html = $('.add_cost').html();
      $('.div_to_append').append(html);
    });

    $(document).on('click','.add_payment',function(){
      var html = $('.add_milestone').html();
      $('.div_apppend_pay').append(html);
    });

    $(document).on('click','.add_facility',function(){
      var html = $('.add_new_facility').html();
      $('.div_to_append_facility').append(html);
    });



    $(document).on('click','.addmorebtn_followup_action_plan', function() {
   
        var html = $('.add_followup_action_plan').html();

        $('.divappend12').append(html);
    });  







    $(document).on('click','.addmorebtn_learn_activities', function() {
   
        var html = $('.add_learn_activities').html();

        $('.divappend3').append(html);
         
        });   




// Activity Completion Reprot\

  $(document).on('click','.classforother', function() {
// alert('clicked');
      if ( $(this).is(':checked') ) {
          $('#otherinput_text').removeClass('hide');
          $('input[name="activity_other"]').val('');
     } else {
          $('#otherinput_text').addClass('hide');
          $('input[name="activity_other"]').val('');
     }
  });  

  $(document).on('click','.fut_mon_other_class', function() {

    if ( $(this).is(':checked') ) {
        $('#fut_mon_otherinput_text').removeClass('hide');
        $('input[name="fut_mon_outcome_put_indi_other"]').val('');
   } else {
        $('#fut_mon_otherinput_text').addClass('hide');
        $('input[name="fut_mon_outcome_put_indi_other"]').val('');
   }
 });  


// for Activity Completion Report
$(document).on('keyup','.form-horizontal #prof', function(){
   
  $row= $(this).attr('data-attr'); 
  $lastrow= $('.form-horizontal .professional').children().length;

  $f_value= $(".pf"+$row).val();
  $m_value= $(".pm"+$row).val();

  if ($f_value==""){ $f_value=0; };
  if ($m_value==""){ $m_value=0; };

  $total= parseInt($f_value)+parseInt($m_value);

  $('.pt'+$row).val($total);

  //for grand total
  $gr_total=0;
  $gr_female=0;
  $gr_male=0;

  for($i=1; $i<$lastrow; $i++){
    $g_total= $('.pt'+$i).val();
    if ($g_total==""){ $g_total=0; };
    $gr_total += parseInt($g_total);

    $g_female= $('.pf'+$i).val();
    if ($g_female==""){ $g_female=0; };
    $gr_female += parseInt($g_female);

    $g_male= $('.pm'+$i).val();
    if ($g_male==""){ $g_male=0; };
    $gr_male += parseInt($g_male);
  }
  $('.pt'+$lastrow).val($gr_total);
  $('.pf'+$lastrow).val($gr_female);
  $('.pm'+$lastrow).val($gr_male);
});


$(document).on('keyup','.form-horizontal #castid', function(){
   
  $row= $(this).attr('data-attr'); 
  $lastrow= $('.form-horizontal .castetable').children().length;

  $f_value= $(".cf"+$row).val();
  $m_value= $(".cm"+$row).val();

  if ($f_value==""){ $f_value=0; };
  if ($m_value==""){ $m_value=0; };

  $total= parseInt($f_value)+parseInt($m_value);

  $('.ct'+$row).val($total);

  //for grand total
  $gr_total=0;
  $gr_female=0;
  $gr_male=0;

  for($i=1; $i<$lastrow; $i++){
    $g_total= $('.ct'+$i).val();
    if ($g_total==""){ $g_total=0; };
    $gr_total += parseInt($g_total);

    $g_female= $('.cf'+$i).val();
    if ($g_female==""){ $g_female=0; };
    $gr_female += parseInt($g_female);

    $g_male= $('.cm'+$i).val();
    if ($g_male==""){ $g_male=0; };
    $gr_male += parseInt($g_male);
  }
  $('.ct'+$lastrow).val($gr_total);
  $('.cf'+$lastrow).val($gr_female);
  $('.cm'+$lastrow).val($gr_male);
});


// $(document).on('keyup','.form-horizontal #ageid', function(){
   
//   $row= $(this).attr('data-attr'); 
//   $lastrow= $('.form-horizontal .age_groupclass').children().length;

//   $f_value= $(".af"+$row).val();
//   $m_value= $(".am"+$row).val();

//   if ($f_value==""){ $f_value=0; };
//   if ($m_value==""){ $m_value=0; };

//   $total= parseInt($f_value)+parseInt($m_value);

//   $('.at'+$row).val($total);

//   //for grand total
//   $gr_total=0;
//   $gr_female=0;
//   $gr_male=0;

//   for($i=1; $i<$lastrow; $i++){
//     $g_total= $('.at'+$i).val();
//     if ($g_total==""){ $g_total=0; };
//     $gr_total += parseInt($g_total);

//     $g_female= $('.af'+$i).val();
//     if ($g_female==""){ $g_female=0; };
//     $gr_female += parseInt($g_female);

//     $g_male= $('.am'+$i).val();
//     if ($g_male==""){ $g_male=0; };
//     $gr_male += parseInt($g_male);
//   }
//   $('.at'+$lastrow).val($gr_total);
//   $('.af'+$lastrow).val($gr_female);
//   $('.am'+$lastrow).val($gr_male);
// });

// edited by yojan
$(document).on('keyup','.form-horizontal #ageid', function(){
  $row= $(this).attr('data-attr'); 
  $lastrow= $('.form-horizontal .age_groupclass').children().length;

  $f_value= $(".af"+$row).val();
  $m_value= $(".am"+$row).val();

  if ($f_value==""){ $f_value=0; };
  if ($m_value==""){ $m_value=0; };

  $total= parseInt($f_value)+parseInt($m_value);

  $('.at'+$row).val($total);

  //for grand total
  $gr_total=0;
  $gr_female=0;
  $gr_male=0;

  for($i=1; $i<$lastrow; $i++){
    $g_total= $('.at'+$i).val();
    if ($g_total==""){ $g_total=0; };
    $gr_total += parseInt($g_total);

    $g_female= $('.af'+$i).val();
    if ($g_female==""){ $g_female=0; };
    $gr_female += parseInt($g_female);

    $g_male= $('.am'+$i).val();
    if ($g_male==""){ $g_male=0; };
    $gr_male += parseInt($g_male);
  }
  $('.at'+$lastrow).val($gr_total);
  $('.af'+$lastrow).val($gr_female);
  $('.am'+$lastrow).val($gr_male);
});

$(document).on('keyup','.totalWrapper .individual', function(){
  var total = 0;
  var no = 0;
  var wrapper = $(this).closest('.totalWrapper');
  var individualGroup = wrapper.find('.individual');
  var count = individualGroup.length;
  individualGroup.each(function(index){
    if (index < (count-1)) {
      if ($(this).val() == '') {
        no = 0;
      }else{
        no = parseInt($(this).val());
      }
      total += no;
    }else{
      $(this).val(total);
    }
  });
});

$(document).on('keyup','.totalWrapper .individual2', function(){
  var total = 0;
  var no = 0;
  var wrapper = $(this).closest('.totalWrapper');
  var individualGroup = wrapper.find('.individual2');
  var count = individualGroup.length;
  individualGroup.each(function(index){
    if (index < (count-1)) {
      if ($(this).val() == '') {
        no = 0;
      }else{
        no = parseInt($(this).val());
      }
      total += no;
    }else{
      $(this).val(total);
    }
  });
});

$(document).on('keyup','.totalWrapper .individual3', function(){
  var total = 0;
  var no = 0;
  var wrapper = $(this).closest('.totalWrapper');
  var individualGroup = wrapper.find('.individual3');
  var count = individualGroup.length;
  individualGroup.each(function(index){
      if ($(this).val() == '') {
        no = 0;
      }else{
        no = parseInt($(this).val());
      }
      total += no;
  });
  wrapper.find('.totalValue').val(total);
});

$(document).on('keyup','.form-horizontal .individualNo', function(){
  $row= $(this).attr('data-attr'); 
  var wrapper = $(this).closest('.individualNoGroup');
  // var individuals = wrapper.find('.individualNo');
  $lastrow = wrapper.children().length;
  // $lastrow= $('.form-horizontal .individualNoGroup').children().length;

  $f_value= wrapper.find(".f"+$row).val();
  $m_value= wrapper.find(".m"+$row).val();
  $o_value= wrapper.find(".o"+$row).val();

  if ($f_value==""){ $f_value=0; };
  if ($m_value==""){ $m_value=0; };
  if ($o_value==""){ $o_value=0; };

  $total= parseInt($f_value)+parseInt($m_value)+parseInt($o_value);

  wrapper.find('.t'+$row).val($total);

  //for grand total
  $gr_total=0;
  $gr_female=0;
  $gr_male=0;
  $gr_other=0;

  for($i=1; $i<$lastrow; $i++){
    $g_total= wrapper.find('.t'+$i).val();
    if ($g_total==""){ $g_total=0; };
    $gr_total += parseInt($g_total);

    $g_female= wrapper.find('.f'+$i).val();
    if ($g_female==""){ $g_female=0; };
    $gr_female += parseInt($g_female);

    $g_male= wrapper.find('.m'+$i).val();
    if ($g_male==""){ $g_male=0; };
    $gr_male += parseInt($g_male);

    $g_other= wrapper.find('.o'+$i).val();
    if ($g_other==""){ $g_other=0; };
    $gr_other += parseInt($g_other);
  }
  wrapper.find('.t'+$lastrow).val($gr_total);
  wrapper.find('.f'+$lastrow).val($gr_female);
  wrapper.find('.m'+$lastrow).val($gr_male);
  wrapper.find('.o'+$lastrow).val($gr_other);
});

// end of editing -yojan

// #notinlist-responsible
// responsible-addnewdiv


 //dip
  $(document).on('click','#addnew-responsible', function() {
     // $('#addnew-responsible').click(function () {
        $('#notinlist-responsible').addClass('hide'); //p

        var html = $('.add_responsible').html();

        $('#responsible-addnewdiv').append(html);
        
        $('#responsible-addnewdiv').removeClass('hide'); //div to append
           
  });
 
  $(document).on('click','.responsible-delete', function() {
     // alert('sdfjsldf lsjdf');
        $('#notinlist-responsible').removeClass('hide');
        
        var p = $(this).parent('div');
        // p.remove();
        p.html(''); // modified -yojan

         $('#responsible-addnewdiv').addClass('hide');
        
         
  });


  $(document).on('click','#addnew-accountable', function() {
     // $('#addnew-responsible').click(function () {
        $('#notinlist-accountable').addClass('hide'); //p

        var html = $('.add_accountable').html();

        $('#accountable-addnewdiv').append(html);
        
        $('#accountable-addnewdiv').removeClass('hide'); //div to append
           
  });
 
  $(document).on('click','.accountable-delete', function() {
     // alert('sdfjsldf lsjdf');
        $('#notinlist-accountable').removeClass('hide');
        
        var p = $(this).parent('div');

        // p.remove();
        p.html('');

         $('#accountable-addnewdiv').addClass('hide');
        
         
  });

    $(document).on('click','#addnew-approver', function() {
     // $('#addnew-responsible').click(function () {
        $('#notinlist-approver').addClass('hide'); //p

        var html = $('.add_approver').html();

        $('#approver-addnewdiv').append(html);
        
        $('#approver-addnewdiv').removeClass('hide'); //div to append
           
  });
 
  $(document).on('click','.approver-delete', function() {
     // alert('sdfjsldf lsjdf');
        $('#notinlist-approver').removeClass('hide');
        
        var p = $(this).parent('div');

        // p.remove();
        p.html('');

         $('#approver-addnewdiv').addClass('hide');
        
         
  });

// partner pro



    var i = 3;
    $(document).on('click','.addmorebtn_name_position_bec', function() {
   
      $('.tbody_np_bec').append('<tr> <td class="lh34">'+ i + '</td> <td><input type="text" name="staff['+i+'][name]" class="form-control"></td> <td><input type="text" name="staff['+i+'][designation]" class="form-control"> </td> <td class="lh34"> <div id="del_inpu" class="text-center del_tr"> <span class="glyphicon glyphicon-trash"></span> </div> </td>  </tr>');
        i++;
    });


$(document).ready(function(){

  // for generating miscDistricts from miscProvinces
  $('.miscProvince').on('change',function(){
          var province_id = $(this).val();
          var baseurl = root_url + "/miscdistrict?province="+province_id;
           
          $.ajax({
          type  : "GET",
          url   :baseurl,
          success: function (data) {
            if (data.stat == 'success') {
              var newOptions = data.data;
              $(".miscLgu").empty();
              $(".miscLgu")[0].sumo.reload();
              var $el = $(".miscDistrict");
              $el.empty(); // remove old options
              $.each(newOptions, function(key,value) {
                $el.append($("<option></option>")
                   .attr("value", key).text(value));
              });
              $el[0].sumo.reload();
              new PNotify({
                title: 'Districts Loaded Successfully',
                type: 'success',
                styling: 'bootstrap3'
              });
            }else{
              new PNotify({
                title: 'Districts Loading Failed',
                type: 'error',
                styling: 'bootstrap3'
              });
            }
          },
          error: function (data) {
            new PNotify({
              title: 'Districts Loading Failed',
              type: 'error',
              styling: 'bootstrap3'
            });
          }
        }); 
    });

  // for generating miscLgus from miscDistricts 
  $('.miscDistrict').on('change',function(){
          var district_id = $(this).val();
          var baseurl = root_url + "/misclgu?district="+district_id; 

          $.ajax({
          type  : "GET",
          url   :baseurl,
          success: function (data) {
            if (data.stat == 'success') {
              var newOptions = data.data;
              var $el = $(".miscLgu");
              $el.empty(); // remove old options
              $.each(newOptions, function(key,value) {
                $el.append($("<option></option>")
                   .attr("value", key).text(value));
              });
              $el[0].sumo.reload();
              new PNotify({
                title: 'LGU Loaded Successfully',
                type: 'success',
                styling: 'bootstrap3'
              });
            }else{
              new PNotify({
                title: 'LGU Loading Failed',
                type: 'error',
                styling: 'bootstrap3'
              });
            }
          },
          error: function (data) {
            new PNotify({
              title: 'LGU Loading Failed',
              type: 'error',
              styling: 'bootstrap3'
            });
          }
        }); 
    });

//Getting project code from general code

$('.MiscProject').on('change',function(){
          var pro_id = $(this).val();
          var baseurl = root_url + "/miscprojectcode?project="+pro_id; 

          $.ajax({
          type  : "GET",
          url   :baseurl,
          success: function (data) {
            if (data.stat == 'success') {
              var newOptions = data.data;
              var $el = $(".MiscExpName");
              $el.empty(); // remove old options
              $.each(newOptions, function(key,value) {
                $el.append($("<option></option>")
                   .attr("value", key).text(value));
              });
              $el[0].sumo.reload();
              new PNotify({
                title: 'General Agreement Code Loaded Successfully',
                type: 'success',
                styling: 'bootstrap3'
              });
            }else{
              new PNotify({
                title: 'General Agreement Code Loading Failed',
                type: 'error',
                styling: 'bootstrap3'
              });
            }
          },
          error: function (data) {
            new PNotify({
              title: 'General Agreement Code Loading Failed',
              type: 'error',
              styling: 'bootstrap3'
            });
          }
        }); 
    }); 

//checking for empty commodity amount
$('.ComGrant').on('change',function(){
          var ga_id = $(this).val();
          var baseurl = root_url + "/comgrant?ga_id="+ga_id; 

          $.ajax({
          type  : "GET",
          url   :baseurl,
          success: function (data) {
            if (data.stat == 'success') {
              var newOptions = data.data;
              new PNotify({
                title: 'There is a commodity grant',
                type: 'success',
                styling: 'bootstrap3'
              });
              $('#commodityGrant').prop('disabled', false);
              $('#commodity_curency').prop('disabled', false);
              $('#newCommodityGrant').prop('disabled', false);
            }else{
              new PNotify({
                title: 'There is no commodity grant',
                type: 'error',
                styling: 'bootstrap3'
              });

              var com_g = $('#commodityGrant').prop('disabled', true);
              com_g.prop('value',0);
              $('#commodity_curency').prop('disabled', true);
              var new_com_g = $('#newCommodityGrant').prop('disabled', true);
              new_com_g.prop('value',0);
            }
          },
          error: function (data) {
            new PNotify({
              title: 'Expatriate Name Loading Failed',
              type: 'error',
              styling: 'bootstrap3'
            });
          }
        }); 
    });
    //End

//Adding Exp Name from General Agreement 

$('.MiscExpName').on('change',function(){
          var ga_id = $(this).val();
          var baseurl = root_url + "/miscexpname?expname="+ga_id; 

          $.ajax({
          type  : "GET",
          url   :baseurl,
          success: function (data) {
            if (data.stat == 'success') {
              var newOptions = data.data;
              var $el = $(".MiscExPDetails");
              $el.empty(); // remove old options
              $.each(newOptions, function(key,value) {
                $el.append($("<option></option>")
                   .attr("value", key).text(value));
              });
              $el[0].sumo.reload();
              new PNotify({
                title: 'Expatriate Name Loaded Successfully',
                type: 'success',
                styling: 'bootstrap3'
              });
            }else{
              new PNotify({
                title: 'Expatriate Name Loading Failed',
                type: 'error',
                styling: 'bootstrap3'
              });
            }
          },
          error: function (data) {
            new PNotify({
              title: 'Expatriate Name Loading Failed',
              type: 'error',
              styling: 'bootstrap3'
            });
          }
        }); 
    });
    //End

$('.MiscExPDetails').on('change',function(){
          var expname = $(this).val();
          var baseurl = root_url + "/getdesignation?expdes="+expname; 

          $.ajax({
          type  : "GET",
          url   :baseurl,
          success: function (data) {
            if (data.stat == 'success') {
              var newOptions = data.data;
              var $el = $(".designation");
              $el.empty(); // remove old options
              $.each(newOptions, function(key,value) {
                $el.append($("<div class='form-control'>" + value + "</div>"));
              });
              // $el[0].sumo.reload();
              new PNotify({
                title: 'General Agreement Code Loaded Successfully',
                type: 'success',
                styling: 'bootstrap3'
              });
            }else{
              new PNotify({
                title: 'Expatriate Designation Loading Failed',
                type: 'error',
                styling: 'bootstrap3'
              });
            }
          },
          error: function (data) {
            new PNotify({
              title: 'Expatriate Designation Loading Failed',
              type: 'error',
              styling: 'bootstrap3'
            });
          }
        }); 
    }); 
// 

   $("#chkingodate").click(function () {
            if ($(this).is(":checked")) {
                $("#ingodate").show();
                
            } else {
                $("#ingodate").hide();
                
            }
        });

  $(document).on('click','.addmore_staff', function() {
        //alert ('sdhcbs');
         var html = $('.add_staff').html();
         $('.total_staff').append(html);
       
         });

  $(document).on('click','#del_staff', function() { 

       

       $(this).closest('.this-staff').remove()

       
        });

  $(document).on('click','.addmore_visa', function() {
        //alert ('sdhcbs');
         var html = $('.add_visa').html();
         $('.total_visa').append(html);
         var date_input=$('input[id="datepick-all"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        // alert(container);
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            // todayBtn: true,
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
        })
       
         });

  $(document).on('click','#del_visa', function() { 

       

       $(this).closest('.this-visa').remove()

       
        });
  $(document).on('click','#del_one',function(){
    $(this).closest('.icon').remove();
  });



   

    $("#new_currency").click(function () {
            if ($(this).is(":checked")) {
                $("#new_total_budget").show();
                
            } else {
                $("#new_total_budget").hide();
                
            }
        });
    $("#new_cost_currency").click(function () {
            if ($(this).is(":checked")) {
                $("#new_cost").show();
                
            } else {
                $("#new_cost").hide();
                
            }
        });

    $("#new_c_grant").click(function () {
            if ($(this).is(":checked")) {
                $("#new_commodity_grant").show();
                
            } else {
                $("#new_commodity_grant").hide();
                
            }
        });

    $("#new_t_grant").click(function () {
            if ($(this).is(":checked")) {
                $("#new_technical_grant").show();
                
            } else {
                $("#new_technical_grant").hide();
                
            }
        });

    $("#new_bill").click(function () {
            if ($(this).is(":checked")) {
                $("#new_bill_sec").show();
                
            } else {
                $("#new_bill_sec").hide();
                
            }
        });

    $("#new_f_grant").click(function () {
            if ($(this).is(":checked")) {
                $("#new_finance_grant").show();
                
            } else {
                $("#new_finance_grant").hide();
                
            }
        });

    $("#new_a_cost").click(function () {
            if ($(this).is(":checked")) {
                $("#new_admin_cost").show();
                
            } else {
                $("#new_admin_cost").hide();
                
            }
        });

    $("#new_p_cost").click(function () {
            if ($(this).is(":checked")) {
                $("#new_program_cost").show();
                
            } else {
                $("#new_program_cost").hide();
                
            }
        });

    

    $(document).on('click','#new_a_budget',function(){
      if($(this).is(":checked")){
        $(" #new_activity_budget").show();
      }
      else{
        $(" #new_activity_budget").hide();
      }
    });


    $(document).on('click','#second_new_a_budget',function(){
      if($(this).is(":checked")){
        $("form #second_new_activity_budget").show();
      }
      else{
        $("form #second_new_activity_budget").hide();
      }
    });

    $(document).on('click','#third_new_a_budget',function(){
      if($(this).is(":checked")){
        $("form #third_new_activity_budget").show();
      }
      else{
        $("form #third_new_activity_budget").hide();
      }
    });

    $(document).on('click','#fourth_new_a_budget',function(){
      if($(this).is(":checked")){
        $("form #fourth_new_activity_budget").show();
      }
      else{
        $("form #fourth_new_activity_budget").hide();
      }
    });

    $(document).on('click','#fifth_new_a_budget',function(){
      if($(this).is(":checked")){
        $("form #fifth_new_activity_budget").show();
      }
      else{
        $("form #fifth_new_activity_budget").hide();
      }
    });

    $(document).on('click','.addmore_cd', function() {
         var html = $('.add_cd').html();
         $('.more_cd').append(html);         
         var date_input=$('input[id="datepick-all"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
        })
         });

    $(document).on('click','.del_cd', function() { 
         $(this).closest('.new_cd').remove()       
         });


    $(document).on('click','.add_renew_time', function() {
         var html = $('.add_renew').html();
         $('.new_date').append(html);   
         $('form .new_time_bound').find('select.currencyClass').SumoSelect({search: true, searchText: 'Search Here.'});      
         var date_input=$('input[id="datepick-all"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
        })
         });

    $(document).on('click','.del_renew', function() { 
         $(this).closest('.new_time_bound').remove()       
         });

    $(document).on('click','.add_donor', function() {
         var html = $('.new_donor_section').html();
         $('.add_new_donor').append(html);

         $('form .new_donor').find('select.currencyClass').SumoSelect({search: true, searchText: 'Search Here.'});
            });

    $(document).on('click','.del_donor', function() { 
         $(this).closest('.new_donor').remove()       
         });

    
$count_ngo = 0;
$count_wor = 0;
    $(document).on('click','.add_ngo',function(){ 
        $count_ngo++;
        $ngo_name= "ngoname["+$count_ngo+"]";
        $ngo_address= "ngo_address["+$count_ngo+"]";
        $ngo_theme= "ngo_theme["+$count_ngo+"][]";
        $dist_working= "dist_working["+$count_ngo+"][]";
        $ngo_staff= "ngo_staff["+$count_ngo+"]";

        $obj= $('.new_ngo_section .new_ngo').find('#ngo_name');
        $obj.attr('name',$ngo_name);

        $obj= $('.new_ngo_section .new_ngo').find('#ngo_address');
        $obj.attr('name',$ngo_address);

        $obj= $('.new_ngo_section .new_ngo').find('#wor_area');
        $obj.attr('name',$ngo_theme);

        $obj= $('.new_ngo_section .new_ngo').find('#no_staff');
        $obj.attr('name',$ngo_staff);

        $obj= $('.new_ngo_section .new_ngo').find('#dist_working');
        $obj.attr('name',$dist_working);

        var html = $('.new_ngo_section').html();
        $('.add_new_ngo').append(html);
        $('form .new_ngo').find('select.currencyClass').SumoSelect({search: true, searchText: 'Search Here.'});
    });

    $(document).on('click','.add_ngo_new',function(){ 
        var $count_ngo = $(this).attr('data-count');

        
        
        $ngo_name= "ngo_name["+$count_ngo+"]";
        $ngo_address= "ngo_address["+$count_ngo+"]";
        $ngo_theme= "ngo_theme["+$count_ngo+"][]";
        $dist_working= "dist_working["+$count_ngo+"][]";
        $ngo_staff= "ngo_staff["+$count_ngo+"]";

        $obj= $('.new_ngo_section .new_ngo').find('#ngo_name');
        $obj.attr('name',$ngo_name);

        $obj= $('.new_ngo_section .new_ngo').find('#ngo_address');
        $obj.attr('name',$ngo_address);

        $obj= $('.new_ngo_section .new_ngo').find('#wor_area');
        $obj.attr('name',$ngo_theme);

        $obj= $('.new_ngo_section .new_ngo').find('#no_staff');
        $obj.attr('name',$ngo_staff);

        $obj= $('.new_ngo_section .new_ngo').find('#dist_working');
        $obj.attr('name',$dist_working);

        var html = $('.new_ngo_section').html();
        $('.add_new_ngo').append(html);
        $count_ngo++;
        $(this).attr('data-count',$count_ngo);
        $('form .new_ngo').find('select.currencyClass').SumoSelect({search: true, searchText: 'Search Here.'});
    });

    $(document).on('click','.del_ngo',function(){
        $(this).closest('.new_ngo').remove();
    });

    $(document).on('click','.add_exp',function(){
        var html = $('.new_exp_section').html();
        $('.add_new_exp').append(html);
        $('form .new_exp').find('select.currencyClass').SumoSelect({search: true, searchText: 'Search Here.'});
    });

    $(document).on('click','.del_exp',function(){
        $(this).closest('.new_exp').remove();
    });

    $(document).on('click','.add_wor',function(){

      $count_wor++;
        $ngoname= "ngoname["+$count_wor+"]";
        $province_id= "province_id["+$count_wor+"]";
        $district_id= "district_id["+$count_wor+"]";
        $lgu_id= "lgu_id["+$count_wor+"]";
        $ward= "ward["+$count_wor+"]";
        $activity= "activity["+$count_wor+"]";
        $activity_main= "activity_main["+$count_wor+"]";
        $unit= "unit["+$count_wor+"]";
        $unit_cost= "unit_cost["+$count_wor+"]";
        $total_cost= "total_cost["+$count_wor+"]";
        $w_detail= "w_detail["+$count_wor+"][]";

        $obj= $('.new_wor_section .new_wor').find('#ngoname');
        $obj.attr('name',$ngoname);

        $obj= $('.new_wor_section .new_wor').find('#province_id');
        $obj.attr('name',$province_id);

        $obj= $('.new_wor_section .new_wor').find('#district_id');
        $obj.attr('name',$district_id);

        $obj= $('.new_wor_section .new_wor').find('#lgu_id');
        $obj.attr('name',$lgu_id);

        $obj= $('.new_wor_section .new_wor').find('#ward');
        $obj.attr('name',$ward);

        $obj= $('.new_wor_section .new_wor').find('#activity');
        $obj.attr('name',$activity);

        $obj= $('.new_wor_section .new_wor').find('#activity_main');
        $obj.attr('name',$activity_main);

        $obj= $('.new_wor_section .new_wor').find('#unit');
        $obj.attr('name',$unit);

        $obj= $('.new_wor_section .new_wor').find('#total_cost');
        $obj.attr('name',$total_cost);

        $obj= $('.new_wor_section .new_wor').find('#w_detail');
        $obj.attr('name',$w_detail);

        $obj= $('.new_wor_section .new_wor').find('#w_detail');
        $obj.attr('name',$w_detail);

        var html = $('.new_wor_section').html();
        var $el = $(".miscDistrict");
        $el.empty(); // remove old options
        $('.add_new_wor').append(html);        
        $('select.newNgoClass:last').SumoSelect({search: true, searchText: 'Search Here.'});      
        $('form .new_wor').find('select.currencyClass').SumoSelect({search: true, searchText: 'Search Here.'});
    });    

    $(document).on('click','.add_wor_new',function(){

        $count_wor = $(this).attr('data-count');
        $ngoname= "ngoname["+$count_wor+"]";
        $province_id= "province_id["+$count_wor+"]";
        $district_id= "district_id["+$count_wor+"]";
        $lgu_id= "lgu_id["+$count_wor+"]";
        $ward= "ward["+$count_wor+"]";
        $activity= "activity["+$count_wor+"]";
        $activity_main= "activity_main["+$count_wor+"]";
        $unit= "unit["+$count_wor+"]";
        $unit_cost= "unit_cost["+$count_wor+"]";
        $total_cost= "total_cost["+$count_wor+"]";
        $w_detail= "w_detail["+$count_wor+"][]";

        $obj= $('.new_wor_section .new_wor').find('#ngoname');
        $obj.attr('name',$ngoname);

        $obj= $('.new_wor_section .new_wor').find('#province_id');
        $obj.attr('name',$province_id);

        $obj= $('.new_wor_section .new_wor').find('#district_id');
        $obj.attr('name',$district_id);

        $obj= $('.new_wor_section .new_wor').find('#lgu_id');
        $obj.attr('name',$lgu_id);

        $obj= $('.new_wor_section .new_wor').find('#ward');
        $obj.attr('name',$ward);

        $obj= $('.new_wor_section .new_wor').find('#activity');
        $obj.attr('name',$activity);

        $obj= $('.new_wor_section .new_wor').find('#activity_main');
        $obj.attr('name',$activity_main);

        $obj= $('.new_wor_section .new_wor').find('#unit');
        $obj.attr('name',$unit);

        $obj= $('.new_wor_section .new_wor').find('#total_cost');
        $obj.attr('name',$total_cost);

        $obj= $('.new_wor_section .new_wor').find('#w_detail');
        $obj.attr('name',$w_detail);

        $obj= $('.new_wor_section .new_wor').find('#w_detail');
        $obj.attr('name',$w_detail);

        var html = $('.new_wor_section').html();
        var $el = $(".miscDistrict");
        $el.empty(); // remove old options
        $('.add_new_wor').append(html);
        $count_wor++;
        $(this).attr('data-count',$count_wor);        
        $('select.newNgoClass:last').SumoSelect({search: true, searchText: 'Search Here.'});      
        $('form .new_wor').find('select.currencyClass').SumoSelect({search: true, searchText: 'Search Here.'});
    });    

    $(document).on('click','.del_wor',function(){
        $(this).closest('.new_wor').remove();
    });

    $('.append_ngo').on('click',function(){
       var ngo_name = $("input[id='ngo_name']").map(function(){return $(this).val();}).get();
       var newNgoName = ngo_name;
       var countngo = newNgoName.length;
       var $appDiv = $(" #ngoname");
       $appDiv.empty();
       $.each(newNgoName,function(key,value){
           if(value)
           {
             $appDiv.append($("<option value='" + value + "'>" + value + "</option>"));
           }             
       });

        $('.ngoname')[0].sumo.reload();
       $('.ngoname').each(function(){
        // console.log($('.ngoname'));
        // $(this)[0].sumo.reload();
       });
       //$("#ngoname")[0].sumo.reload();
    });

   $(document).keyup('#financeGrant , #technicalGrant , #commodityGrant', function(){
      var   techGrant= $('#technicalGrant').val();
      var   comGrant= $('#commodityGrant').val();
      var   finGrant= $('#financeGrant').val();
      $('#totalBudget').val(parseInt(techGrant)+parseInt(comGrant)+parseInt(finGrant));
    });

   $(document).keyup('#newFinanceGrant , #newTechnicalGrant , #newCommodityGrant', function(){
      var   newtechGrant= $('#newTechnicalGrant').val();
      var   newcomGrant= $('#newCommodityGrant').val();
      var   newfinGrant= $('#newFinanceGrant').val();
      $('#newTotalBudget').val(parseInt(newtechGrant)+parseInt(newcomGrant)+parseInt(newfinGrant));
    });

   $(document).on('submit', 'form', function(){
    $(this).find('.submitBtn .loading').removeClass('hide');
   });

   $(document).on('change', '#popSelect', function(){
    var temp = $(this);
    temp.each(function(index,value){
      var x = $(value).val();
      if($('#pop_content').find('x')){
          
      }
    });
   });

    
});
  