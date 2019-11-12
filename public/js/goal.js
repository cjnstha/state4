    
      $count_obj=0;
      $count_outcome=0;
      $count_output=0;

    $(document).on('click','.addmorebtn_obj', function() {
      


         //increase obj count and set others to 0
          $count_obj++;
          $count_outcome=0;
          $count_output=0;

          $obj_name= "obj["+$count_obj+"]";
          $outcome_name= "outcome["+$count_obj+"]["+$count_outcome+"]";
          $output_name= "output["+$count_obj+"]["+$count_outcome+"]["+$count_output+"]";
          $act_name= "activity["+$count_obj+"]["+$count_outcome+"]["+$count_output+"]";

          $obj= $('.add_obj').find('#obj');
          $obj.attr('name',$obj_name);
          $obj.attr('data-no', $count_obj);

          $outc= $('.add_obj').find('#outcome');
          $outc.attr('name',$outcome_name);
          $outc.attr('data-no', $count_outcome);

          $outp= $('.add_obj').find('#output');
          $outp.attr('name',$output_name);
          $outp.attr('data-no', $count_output);

          $act= $('.add_obj').find('#act');
          $act.attr('name',$act_name);
          var html = $('.add_obj').html();
           
          $p= $(this).parent('div');
          $p= $p.parent('div');
          $p= $p.prev('div');
           //alert($p.attr('class'));
          $p.append(html) ;

          $('.objectiveDelete').removeClass('hide');
          
          //added -yojan
          $p.find('select').addClass('sumoSelect');
          $('select.sumoSelect').SumoSelect({search: true, searchText: 'Search Here.'});
         
      });
  
     $(document).on('click','.addmorebtn_outcome', function() {
          //get data-no of parent obj
          $p= $(this).parentsUntil('.obj_text');
          $data= $p.find('#obj');
          $count_obj= parseInt($data.attr('data-no'));
           
          //get data-no of previous outcome
          $p_out= $(this).parent('div');
          $p_out= $p_out.prev('div');
          $p_out= $p_out.children('div').last();
          $p_out= $p_out.find('#outcome');
          $count_outcome= parseInt($p_out.attr('data-no'));
          
          $count_outcome++;
          $count_output=0;

          $outcome_name= "outcome["+$count_obj+"]["+$count_outcome+"]";
          $output_name= "output["+$count_obj+"]["+$count_outcome+"]["+$count_output+"]";
          $act_name= "activity["+$count_obj+"]["+$count_outcome+"]["+$count_output+"]";

          $outc= $('.add_outcome').find('#outcome');
          $outc.attr('name',$outcome_name);
          $outc.attr('data-no', $count_outcome);

          $outp= $('.add_outcome').find('#output');
          $outp.attr('name',$output_name);
          $outp.attr('data-no', $count_output);

          $act= $('.add_outcome').find('#act');
          $act.attr('name',$act_name);
          //add content of outcome
          var html = $('.add_outcome').html();
         
          $p= $(this).parent('div');
          $p= $p.prev('div');
           //alert($p.attr('class'));
          $p.append(html);

          //added -yojan
          $p.find('select').addClass('sumoSelect');
          $('select.sumoSelect').SumoSelect({search: true, searchText: 'Search Here.'});
            
      });

     $(document).on('click','.addmorebtn_output', function() {
          //get data-no of parent obj
          $p= $(this).parentsUntil('.obj_text');
          $data= $p.find('#obj');
          $count_obj= parseInt($data.attr('data-no'));

          
          //get data-no of parent outcome
          $q= $(this).parentsUntil('.outcome-box');
          $e= $q.find('#outcome');
          $count_outcome= parseInt($e.attr('data-no'));
          
          //get data-no of previous output
          $p_outp= $(this).parent('div');
          $p_outp= $p_outp.prev('div');
          $p_outp= $p_outp.children('div').last();
          $p_outp= $p_outp.find('#output');
          $count_output= parseInt($p_outp.attr('data-no'));
          

          $count_output++;
          $output_name= "output["+$count_obj+"]["+$count_outcome+"]["+$count_output+"]";
          $act_name= "activity["+$count_obj+"]["+$count_outcome+"]["+$count_output+"]";

          $outp= $('.add_output').find('#output');
          $outp.attr('name',$output_name);
          $outp.attr('data-no', $count_output);

          $act= $('.add_output').find('#act');
          $act.attr('name',$act_name);
          
          var html = $('.add_output').html();

          $p= $(this).parent('div');
          $p= $p.prev('div');
          
          $p.append(html);

          //added -yojan
          $p.find('select').addClass('sumoSelect');
          $('select.sumoSelect').SumoSelect({search: true, searchText: 'Search Here.'});
         
      });

     $(document).on('click','#del_input_obj', function() { 
         $p= $(this).prev('div').prev('div');
         $p= $p.children('div').last();
          
          if($p.attr('id') != 'first'){
              $p.remove();
          }

          if ($('form .outcome-wrap').length > 1) {
           $('form .objectiveDelete').removeClass('hide');
          }else{
           $('form .objectiveDelete').addClass('hide');
          }

         
     });  

     $(document).on('click','#del_input_obj_edit', function() { 
        
         
     }); 