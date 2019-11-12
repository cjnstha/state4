
//filter search for project
var root_url = base_url;
// var root_url = "http://192.168.0.23/socialwelfaredbms/public";
// var root_url = "http://socialwelfaredbms.3hammers.com";

    // training adding beneficiairies

        $(document).ready(function () {
          $('.adding_benef_in_training').click(function () {
            
            var  callbenefcreate_url = root_url + "/benef/createform_for_training";

              $.ajax({
                  type: "GET",
            
                  url: callbenefcreate_url,
                  
                  success: function (data) {
                    // console.log(data.html);
                    $('#modal_body_to_place_html').html(data.html); 
                    $('.benef_create_form_modal').modal('show');
                  },
                  error: function (data) {
                    // alert('error');
                      new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
                      console.log('Error:', data);
                  }

             });
        });
  });

//
       //called when saving beneficiaries from modal in training
  $(document).ready(function() {
            $('#benef_modal_create').submit(function(event) {
            
            var  benefstore_url = root_url + "/benef/storebenef";
            
            var formData =  $( "#benef_modal_create" ).serialize();

            $.ajax({

            type: "POST",
            url: benefstore_url, 
             data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            // encode          : true,

            success: function (data) {
                  
                  $('.benef-detail').append(data.html);
                  $('.benef_create_form_modal').modal('hide');

                    
                 new PNotify({
                            title: 'Beneficiaires Added successfully',
                            type: 'success',
                            styling: 'bootstrap3'
                        });

                  },
                  error: function (data) {
                     new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
                      console.log('Error:', data);
                  }

             });
        });
  });


//project document multiple progess document
    
    $(document).ready(function () {
        var  prodoc_url = root_url + "/prodoc/tmp_progress";

        $('#fileupload').fileupload({
            url: prodoc_url,
            dataType: 'json',

            add: function (e, data) {
               data.submit();
              },
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    // console.log(file);
                    $('<p/>').html(file.name).appendTo($('#files_list'));
                    if ($('#file_ids').val() != '') {
                        $('#file_ids').val($('#file_ids').val() + ',');
                    }
                    $('#file_ids').val($('#file_ids').val() + file.fileID);
                });
              },
              progressall: function (e, data) {
              var progress = parseInt(data.loaded / data.total * 100, 10);
              $('#progress').removeClass('hide');
              $('#progress .progress-bar').css(
                  'width',
                  progress + '%'
              );
             }
            
        });
    });
    

//by  samyak for ajax in test ko ajax 

   $(document).ready(function(){

    $('#test').on('change',function(){
        var task_id = $(this).val();
        
          $.ajax({

            type: "GET",
            url: "test/"+task_id, 
            // data: {id:task_id},
            success: function (data) {
                // console.log(data.html);
                  $('#myModal').show();
                 $('#myModal').html(data.html);
                 $('#demo-form2 select').SumoSelect();

                  new PNotify({
                                  title: 'Test  Loaded Successfully',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });

            },
            error: function (data) {

                new PNotify({
                                  title: 'Test loading Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

                console.log('Error:', data);
            }
            }); 
        });
    });
   

// for goal reports generating 
$(document).ready(function(){

    $('#goalreportid').on('change',function(){
            var task_id = $(this).val();
            if (task_id == '') {
              $('#goal-report').html('');
              return;
            }
          
            var dataFormat =  $(this).data("format"); 
            var baseurl = root_url + "/goalreport/"+dataFormat+ "/"+ task_id; 

            $.ajax({

            type  : "GET",
            url   :baseurl,
            success: function (data) {
                // console.log(data);
                  $('#goal-report').show();
                  
                 $('#goal-report').html(data.html);
                  $('#indicatorshow').SumoSelect();
                  $('#outputshow').SumoSelect();
                  $('#activityshow').SumoSelect();

                   new PNotify({
                                  title: 'Goal  Loaded Successfully',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });

                 // $('#demo-form2 select').SumoSelect();
            },
            error: function (data) {

               
                  new PNotify({
                                  title: 'Goal Loading Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
                console.log('Error:', data);
            }
            }); 
        });
    });

// for planning output 
// $(document).ready(function(){

//     $('#planid').on('change',function(){
//             var task_id = $(this).val();
//             var baseurl = root_url + "/plan/show/"+ task_id; 

//             $.ajax({

//             type  : "GET",
//             url   :baseurl,
//             success: function (data) {
//                 // console.log(data);
//                   $('#goal-report').show(); 
//                  $('#goal-report').html(data.html);
                   
//                   $('#outputshow').SumoSelect();
                  
//                    new PNotify({
//                                   title: 'Goal  Loaded Successfully',
//                                   type: 'success',
//                                   styling: 'bootstrap3'
//                               });

//                  // $('#demo-form2 select').SumoSelect();
//             },
//             error: function (data) {

               
//                   new PNotify({
//                                   title: 'Goal Loading Failed',
//                                   type: 'error',
//                                   styling: 'bootstrap3'
//                               });
//                 console.log('Error:', data);
//             }
//             }); 
//         });
//     });

//for edit part in reports generating
$(document).ready(function(){

    $('#goalreportedit').on('change',function(){

        $('.indicatoredit').addClass('hide');
        // $('#indicatoredit').removeAttr('checked');
        $('#indicatoredit').attr('disabled', true);

        $('.outputedit').addClass('hide');
        $('#outputedit').attr('disabled', true);

        $('.activityedit').addClass('hide');
        $('#activityedit').attr('disabled', true);
    
        var task_id = $(this).val();
        // var baseurl = root_url + "/goalreport/"+ task_id; 
         var dataFormat =  $(this).data("format"); 
            var baseurl = root_url + "/goalreport/"+dataFormat+ "/"+ task_id;
       // console.log(task_id);
          $.ajax({

            type: "GET",
          // url: "http://192.168.0.155/sfcgdbms/public/goalreport/"+task_id, 
              url:baseurl,
            
            // data: {id:task_id},
            success: function (data) {
                //console.log(data.html);
                 $('#goal-report').show();
                 
                 $('#goal-report').html(data.html);
                 
                  $('#indicatorshow').SumoSelect();
                  $('#outputshow').SumoSelect();
                  $('#activityshow').SumoSelect();

                   new PNotify({
                                  title: 'Goal  Loaded Successfully',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
            },
            error: function (data) {

                  new PNotify({
                                  title: 'Goal Loading Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
                console.log('Error:', data);
            }
            }); 
        });
    });






$(document).ready(function() {
    $('#filter-search').submit(function(event) {
 //     alert('clicked');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search").serialize();

        var url = "/project/";
        var baseurl = root_url + url;
         // var baseurl = "http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#project-index').DataTable();
            table.destroy();

             table = $('.tbl_new').DataTable();
            table.destroy();

            $('#project-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

$(document).ready(function() {
    $('#filter-search-project-report').submit(function(event) {
 //     alert('clicked');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-project-report").serialize();

        var url = "/projectreport/";
        var baseurl = root_url + url;
         // var baseurl = "http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#project-index-report').DataTable();
            table.destroy();

             table = $('.tbl_project_report').DataTable();
            table.destroy();

            $('#project-index-report').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_project_report').html(''); // to empty inside div
           
            $('.table_in_project_report').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_project_report').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

$(document).ready(function() {
    $('#filter-search-imp').submit(function(event) {
      //alert('clicked');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-imp").serialize();

        var url = "/importapproval/";
        var baseurl = root_url + url;
         // var baseurl = "http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";
        //alert(filterajax);
        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable').DataTable();
            table.destroy();

             table = $('.tbl_import').DataTable();
            table.destroy();

            $('#datatable').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_import').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});


$(document).ready(function() {
    $('#filter-search-visa').submit(function(event) {
      //alert('clicked');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-visa").serialize();

        var url = "/visa/";
        var baseurl = root_url + url;
         // var baseurl = "http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";
        //alert(filterajax);
        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable').DataTable();
            table.destroy();

             table = $('.tbl_visa').DataTable();
            table.destroy();

            $('#datatable').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.tbl_in_visa').html(''); // to empty inside div
           
            $('.tbl_in_visa').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_visa').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

$(document).ready(function() {
    $('#filter-search-ingo').submit(function(event) {
      //alert('clicked');
  
      new PNotify({
              title: 'Processing...',
              type: 'info',
              styling: 'bootstrap3'
          });

        var formData =  $("#filter-search-ingo").serialize();

        var url = "/ingo/";
        var baseurl = root_url + url;
         // var baseurl = "http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";
        //alert(filterajax);
        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable').DataTable();
            table.destroy();

             table = $('.tbl_ingo').DataTable();
            table.destroy();

            $('#datatable').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.tbl_in_ingo').html(''); // to empty inside div
           
            $('.tbl_in_ingo').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_ingo').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

$(document).ready(function() {
    $('#filter-search-generalagreements').submit(function(event) {
      //alert('clicked');
  
      new PNotify({
              title: 'Processing...',
              type: 'info',
              styling: 'bootstrap3'
          });

        var formData =  $("#filter-search-generalagreements").serialize();

        var url = "/generalagreements/";
        var baseurl = root_url + url;
         // var baseurl = "http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";
        //alert(filterajax);
        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable').DataTable();
            table.destroy();

             table = $('.tbl_generalagreements').DataTable();
            table.destroy();

            $('#datatable').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_generalagreements').html(''); // to empty inside div
           
            $('.table_in_generalagreements').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_generalagreements').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        event.preventDefault();
    });

});

$(document).ready(function() {
    $('#filter-search-project').submit(function(event) {
      //alert('clicked');
  
      new PNotify({
              title: 'Processing...',
              type: 'info',
              styling: 'bootstrap3'
          });

        var formData =  $("#filter-search-project").serialize();

        var url = "/project/";
        var baseurl = root_url + url;
         // var baseurl = "http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";
        //alert(filterajax);
        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#project-index').DataTable();
            table.destroy();

             table = $('.tbl_project').DataTable();
            table.destroy();

            $('#project-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_project').html(''); // to empty inside div
           
            $('.table_in_project').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_project').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        event.preventDefault();
    });

});
//filter search-consultancy-service For community med

// $(document).ready(function() {
//     $('#filter-search-consultancy-service').submit(function(event) {

//       // alert('filter-search-comm-med');
  
//       new PNotify({
//                                   title: 'Processing...',
//                                   type: 'info',
//                                   styling: 'bootstrap3'
//                               });

//         var formData =  $('#filter-search-consultancy-service').serialize();

//         var url = "/consultancy/";
//         var baseurl = root_url + url;

//         var  filterajax = baseurl + "filter";

//         $.ajax({
          
//             type: "POST",
//             url: filterajax, 
//             data        : formData, // our data object
//             dataType    : 'json', // what type of data do we expect back from the serve
//             encode          : true,


//              success:function(data){

//             table = $('#consultancy-service-index').DataTable();
//             table.destroy();

//              table = $('.datatbl_new').DataTable();
//             table.destroy();

//             $('#consultancy-service-index').hide();
//             // $('.table_in_div').empty(); // to empty inside div
//             $('.table_in_div').html(''); // to empty inside div
           
//             $('.table_in_div').html(data.html); 
//              // $('.tbl_new').DataTable();
//                  $('.datatbl_new').DataTable( {
//         dom: 'Bfr<"table-responsive custom-table"t>ip',
//         // stateSave: true,
//         buttons: [
//                 {
//                     extend: 'print',
//                     text: '<i class="fa fa-print"></i>',
//                     titleAttr: 'Print',
//                     // message: 'Project ',
//                     download: 'open',
//                     // title: 'Project List',
//                     customize: function ( win ) {
//                     $(win.document.body)
//                         .css( 'font-size', '10pt' );
 
//                     $(win.document.body).find( 'table' )
//                         .addClass( 'compact' )
//                         .css( 'font-size', 'inherit' );
//                 },
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
                
//                 {
//                     extend: 'excel',
//                     text: '<i class="fa fa-file-excel-o"></i>',
//                     titleAttr: 'Excel',
//                     // title: 'Project List',
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
                
//                 {
//                     extend: 'pdf',
//                     text: '<i class="fa fa-file-pdf-o"></i>',
//                     titleAttr: 'Pdf',
//                     // message: 'Project ',
//                      // extend: 'pdfHtml5',
//                    // download: 'open',// for opening in new tab with preview and more option
//                     // title: 'Project List',
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
//                  {
//                     extend: 'copy',
//                     text: '<i class="fa fa-files-o"></i>',
//                     titleAttr: 'Copy',
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
//                  {
//                     extend: 'colvis',
//                     text: '<i class="fa fa-columns"></i>',
//                     titleAttr: 'Column Visibility',
//                     columnText: function ( dt, idx, title ) {
//                         return (idx+1)+': '+title;
//                     },
//                     postfixButtons: [ 'colvisRestore' ]
//                 },
//                 // 'colvis',
//           ]
//         } );
          
          
//               new PNotify({
//                                   title: 'Request Submit',
//                                   type: 'success',
//                                   styling: 'bootstrap3'
//                               });
//          },

//          error:function(data){
//            new PNotify({
//                                   title: 'Request Failed',
//                                   type: 'error',
//                                   styling: 'bootstrap3'
//                               });

//          }
//        })
//         // stop the form from submitting the normal way and refreshing the page
//         event.preventDefault();
//     });

//     $('#filter-search-consultancy-service2').submit(function(event) {

//       // alert('filter-search-comm-med');
  
//       new PNotify({
//                                   title: 'Processing...',
//                                   type: 'info',
//                                   styling: 'bootstrap3'
//                               });

//         var formData =  $("#filter-search-consultancy-service2").serialize();

//         var url = "/consultancy/";
//         var baseurl = root_url + url;

//         var  filterajax = baseurl + "filter2";

//         $.ajax({
          
//             type: "POST",
//             url: filterajax, 
//             data        : formData, // our data object
//             dataType    : 'json', // what type of data do we expect back from the serve
//             encode          : true,


//              success:function(data){

//             table = $('#consultancy-service-index').DataTable();
//             table.destroy();

//              table = $('.datatbl_new').DataTable();
//             table.destroy();

//             $('#consultancy-service-index').hide();
//             // $('.table_in_div').empty(); // to empty inside div
//             $('.table_in_div').html(''); // to empty inside div
           
//             $('.table_in_div').html(data.html); 
//              // $('.tbl_new').DataTable();
//                  $('.datatbl_new').DataTable( {
//         dom: 'Bfr<"table-responsive custom-table"t>ip',
//         // stateSave: true,
//         buttons: [
//                 {
//                     extend: 'print',
//                     text: '<i class="fa fa-print"></i>',
//                     titleAttr: 'Print',
//                     // message: 'Project ',
//                     download: 'open',
//                     // title: 'Project List',
//                     customize: function ( win ) {
//                     $(win.document.body)
//                         .css( 'font-size', '10pt' );
 
//                     $(win.document.body).find( 'table' )
//                         .addClass( 'compact' )
//                         .css( 'font-size', 'inherit' );
//                 },
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
                
//                 {
//                     extend: 'excel',
//                     text: '<i class="fa fa-file-excel-o"></i>',
//                     titleAttr: 'Excel',
//                     // title: 'Project List',
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
                
//                 {
//                     extend: 'pdf',
//                     text: '<i class="fa fa-file-pdf-o"></i>',
//                     titleAttr: 'Pdf',
//                     // message: 'Project ',
//                      // extend: 'pdfHtml5',
//                    // download: 'open',// for opening in new tab with preview and more option
//                     // title: 'Project List',
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
//                  {
//                     extend: 'copy',
//                     text: '<i class="fa fa-files-o"></i>',
//                     titleAttr: 'Copy',
//                     exportOptions: {
//                         columns: ':visible'
//                     }
//                 },
//                  {
//                     extend: 'colvis',
//                     text: '<i class="fa fa-columns"></i>',
//                     titleAttr: 'Column Visibility',
//                     columnText: function ( dt, idx, title ) {
//                         return (idx+1)+': '+title;
//                     },
//                     postfixButtons: [ 'colvisRestore' ]
//                 },
//                 // 'colvis',
//           ]
//         } );
          
          
//               new PNotify({
//                                   title: 'Request Submit',
//                                   type: 'success',
//                                   styling: 'bootstrap3'
//                               });
//          },

//          error:function(data){
//            new PNotify({
//                                   title: 'Request Failed',
//                                   type: 'error',
//                                   styling: 'bootstrap3'
//                               });

//          }
//        })
//         // stop the form from submitting the normal way and refreshing the page
//         event.preventDefault();
//     });

// });

// general code for search filter
$(document).ready(function() {
    $('.FilterForm').submit(function(event) {
      var check = $(this).attr('data-base');

      // alert('filter-search-comm-med');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $(this).serialize();

        var url = "/"+$(this).attr('data-base')+"/";
        var baseurl = root_url + url;

        var  filterajax = baseurl + $(this).attr('data-filter');

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

              if (check == 'benef') {

                  table = $('#benef-group-ind-index').DataTable();
                    table.destroy();

                     table = $('.datatbl_new').DataTable();
                    table.destroy();

                    $('#benef-group-ind-index').hide();
                    // $('.table_in_div').empty(); // to empty inside div
                    $('.table_in_div').html(''); // to empty inside div
                   
                    $('.table_in_div').html(data.html); 
                     // $('.tbl_new').DataTable();
                         $('.datatbl_new').DataTable( {
                dom: 'Bfr<"table-responsive custom-table"t>ip',
                // stateSave: true,
                buttons: [
                      {
                        extend: 'colvisGroup',
                        text: 'Individual',
                        show: [ 1, 2, 3, 5, 7, 9, 11, 12 ],
                        hide: [ 4, 6, 8, 10 ],
                        className: 'Individual',
                       },
                    {
                        extend: 'colvisGroup',
                        text: 'Group',
                        className: 'Group',
                        show: [ 1, 2, 4, 6, 8, 10, 11, 12 ],
                        hide: [ 3, 5, 7, 9 ]
                    },
                    {
                        extend: 'colvisGroup',
                        text: 'Show all',
                        show: ':hidden',
                        className: 'showAll active',
                        // className: ''
                        }
                     
                ]
                } );

              }else{

                    table = $('.dataTableClass').DataTable();
                    table.destroy();

                     table = $('.datatbl_new').DataTable();
                    table.destroy();

                    $('.dataTableClass').hide();
                    // $('.table_in_div').empty(); // to empty inside div
                    $('.table_in_div').html(''); // to empty inside div
                   
                    $('.table_in_div').html(data.html); 
                     // $('.tbl_new').DataTable();
                         $('.datatbl_new').DataTable( {
                dom: 'Bfr<"table-responsive custom-table"t>ip',
                // stateSave: true,
                buttons: [
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i>',
                            titleAttr: 'Print',
                            // message: 'Project ',
                            download: 'open',
                            // title: 'Project List',
                            customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' );
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        },
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        
                        {
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel-o"></i>',
                            titleAttr: 'Excel',
                            // title: 'Project List',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        
                        {
                            extend: 'pdf',
                            text: '<i class="fa fa-file-pdf-o"></i>',
                            titleAttr: 'Pdf',
                            // message: 'Project ',
                             // extend: 'pdfHtml5',
                           // download: 'open',// for opening in new tab with preview and more option
                            // title: 'Project List',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                         {
                            extend: 'copy',
                            text: '<i class="fa fa-files-o"></i>',
                            titleAttr: 'Copy',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                         {
                            extend: 'colvis',
                            text: '<i class="fa fa-columns"></i>',
                            titleAttr: 'Column Visibility',
                            columnText: function ( dt, idx, title ) {
                                return (idx+1)+': '+title;
                            },
                            postfixButtons: [ 'colvisRestore' ]
                        },
                        // 'colvis',
                  ]
                } );

              }

          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});


//filter search-community-med For community med

$(document).ready(function() {
    $('#filter-search-comm-med').submit(function(event) {

      // alert('filter-search-comm-med');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-comm-med").serialize();

        var url = "/communitymed/";
        var baseurl = root_url + url;

        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#comm-med-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#comm-med-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

    $('#filter-search-comm-med2').submit(function(event) {

      // alert('filter-search-comm-med');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-comm-med2").serialize();

        var url = "/communitymed/";
        var baseurl = root_url + url;

        var  filterajax = baseurl + "filter2";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#comm-med-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#comm-med-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

//filter Iec material 

$(document).ready(function() {
    $('#filter-search-iec').submit(function(event) {

      // alert('filter-search-iec');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-iec").serialize();

        var url = "/iecmaterial/";
        var baseurl = root_url + url;

        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
       dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

    $('#filter-search-iec2').submit(function(event) {

      // alert('filter-search-iec');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-iec2").serialize();

        var url = "/iecmaterial/";
        var baseurl = root_url + url;

        var  filterajax = baseurl + "filter2";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
       dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});


//sgrant
$(document).ready(function() {
    $('#filter-search-sgrant').submit(function(event) {

      // alert('filter-search-iec');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-sgrant").serialize();

        var url = "/sgrant/";
        var baseurl = root_url + url;

        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
       dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

    $('#filter-search-sgrant2').submit(function(event) {

      // alert('filter-search-iec');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-sgrant2").serialize();

        var url = "/sgrant/";
        var baseurl = root_url + url;

        var  filterajax = baseurl + "filter2";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
       dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});


//media
$(document).ready(function() {
    $('#filter-search-media').submit(function(event) {

      // alert('filter-search-iec');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-media").serialize();

        var url = "/media/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
    
    $('#filter-search-media2').submit(function(event) {

      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-media2").serialize();

        var url = "/media/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter2";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

    $('#filter-search-plan2').submit(function(event) {

      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $("#filter-search-plan2").serialize();

        var url = "/plan/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter2";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.datatbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

//mne
$(document).ready(function() {
    $('#filter-search-mne').submit(function(event) {

      // alert('filter-search-iec');
  
      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $( "#filter-search-mne" ).serialize();

        var url = "/mne/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type: "POST",
            url: filterajax, 
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the serve
            encode          : true,


             success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});



//report
$(document).ready(function() {
    $('#filter-search-report').submit(function(event) {

      new PNotify({
                                  title: 'Processing...',
                                  type: 'info',
                                  styling: 'bootstrap3'
                              });

        var formData =  $( "#filter-search-report" ).serialize();

        // alert(formData);
        var url = "/report/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type      : "POST",
            url       : filterajax, 
            data      : formData, // our data object
            dataType  : 'json', // what type of data do we expect back from the serve
            encode    : true,


            success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});



//prodocument
$(document).ready(function() {
    $('#filter-search-prodocument').submit(function(event) {

      new PNotify({
                  title: 'Processing...',
                  type: 'info',
                  styling: 'bootstrap3'
              });

        var formData =  $("#filter-search-prodocument").serialize();

        // alert(formData);
        var url = "/prodoc/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type      : "POST",
            url       : filterajax, 
            data      : formData, // our data object
            dataType  : 'json', // what type of data do we expect back from the serve
            encode    : true,


            success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});


//quote lab
$(document).ready(function() {
    $('#filter-search-quotelab').submit(function(event) {

      new PNotify({
                  title: 'Processing...',
                  type: 'info',
                  styling: 'bootstrap3'
              });

        var formData =  $("#filter-search-quotelab").serialize();

        // alert(formData);
        var url = "/quotelab/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type      : "POST",
            url       : filterajax, 
            data      : formData, // our data object
            dataType  : 'json', // what type of data do we expect back from the serve
            encode    : true,


            success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
             // $('.tbl_new').DataTable();
                 $('.tbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        // stateSave: true,
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    // message: 'Project ',
                    download: 'open',
                    // title: 'Project List',
                    customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    // message: 'Project ',
                     // extend: 'pdfHtml5',
                   // download: 'open',// for opening in new tab with preview and more option
                    // title: 'Project List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
          // alert('data table activated');
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});



//quote lab
$(document).ready(function() {
    $('#filter-search-logical').submit(function(event) {

      new PNotify({
                  title: 'Processing...',
                  type: 'info',
                  styling: 'bootstrap3'
              });

        var formData =  $("#filter-search-logical").serialize();

        // alert(formData);
        var url = "/logical/";
        var baseurl = root_url + url;
        var  filterajax = baseurl + "filter";

        $.ajax({
          
            type      : "POST",
            url       : filterajax, 
            data      : formData, // our data object
            dataType  : 'json', // what type of data do we expect back from the serve
            encode    : true,


            success:function(data){

            table = $('#datatable-table-index').DataTable();
            table.destroy();

             table = $('.datatbl_new').DataTable();
            table.destroy();

            $('#datatable-table-index').hide();
            // $('.table_in_div').empty(); // to empty inside div
            $('.table_in_div').html(''); // to empty inside div
           
            $('.table_in_div').html(data.html); 
                $('.tbl_new').DataTable( {
        dom: 'Bfr<"table-responsive custom-table"t>ip',
        buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    download: 'open',
                     customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                 {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Column Visibility',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    },
                    postfixButtons: [ 'colvisRestore' ]
                },
                // 'colvis',
          ]
        } );
          
              new PNotify({
                                  title: 'Request Submit',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
         },

         error:function(data){
           new PNotify({
                                  title: 'Request Failed',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

         }
       })
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

//demo code for search filter
$(document).ready(function() {
    $('.filterDemo').submit(function(event) {
      function RequestSubmit(){
        new PNotify({
            title: 'Request Submit',
            type: 'success',
            styling: 'bootstrap3'
          });
      }      
      new PNotify({
        title: 'Processing...',
        type: 'info',
        styling: 'bootstrap3'
      });

      setTimeout(RequestSubmit, 2000);

      });
  });
//end demo code for search filter


// general code for search filter
$(document).ready(function() {
    $('.filterReportForm').submit(function(event) {
      var check = $(this).attr('data-report');
      new PNotify({
        title: 'Processing...',
        type: 'info',
        styling: 'bootstrap3'
      });

      var formData =  $(this).serialize();
      var url = "/report/"+check+"/";
      var baseurl = root_url + url;
      var  filterajax = baseurl + $(this).attr('data-filter');

      $.ajax({
        type: "POST",
        url: filterajax, 
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the serve
        encode      : true,

        success:function(data){
          table = $('.dataTableClass').DataTable();
          table.destroy();

          table = $('.datatbl_new').DataTable();
          table.destroy();

          $('.dataTableClass').hide();
          // $('.table_in_div').empty(); // to empty inside div
          $('.table_in_div').html(''); // to empty inside div
         
          $('.table_in_div').html(data.html); 
           // $('.tbl_new').DataTable();

          $('.datatbl_new').DataTable( {
            dom: '<"toolbar">Bfr<"table-responsive custom-table"t>ip',
            // stateSave: true,
              buttons: [
                {
                  extend: 'print',
                  text: '<i class="fa fa-print"></i>',
                  titleAttr: 'Print',
                  // message: 'Project ',
                  download: 'open',
                  // title: 'Project List',
                  customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                          .css( 'font-size', 'inherit' );
                  },
                  exportOptions: {
                      columns: ':visible'
                  }
                },
                
                {
                  extend: 'excel',
                  text: '<i class="fa fa-file-excel-o"></i>',
                  titleAttr: 'Excel',
                  // title: 'Project List',
                  exportOptions: {
                      columns: ':visible'
                  }
                },
                
                {
                  extend: 'pdf',
                  text: '<i class="fa fa-file-pdf-o"></i>',
                  titleAttr: 'Pdf',
                  // message: 'Project ',
                   // extend: 'pdfHtml5',
                 // download: 'open',// for opening in new tab with preview and more option
                  // title: 'Project List',
                  exportOptions: {
                      columns: ':visible'
                  }
                },

                {
                  extend: 'copy',
                  text: '<i class="fa fa-files-o"></i>',
                  titleAttr: 'Copy',
                  exportOptions: {
                      columns: ':visible'
                  }
                },

                {
                  extend: 'colvis',
                  text: '<i class="fa fa-columns"></i>',
                  titleAttr: 'Column Visibility',
                  columnText: function ( dt, idx, title ) {
                      return (idx+1)+': '+title;
                  },
                  postfixButtons: [ 'colvisRestore' ]
                },
              ]
          } );
          //$("div.toolbar").html('Total Results: '+table.page.info().recordsTotal);
          new PNotify({
            title: 'Request Submit',
            type: 'success',
            styling: 'bootstrap3'
          });
          $('.tableContent').removeClass('hide');
        },

        error:function(data){
          new PNotify({
              title: 'Request Failed',
              type: 'error',
              styling: 'bootstrap3'
          });
          $('.tableContent').addClass('hide');
        }
      })
      // stop the form from submitting the normal way and refreshing the page
      event.preventDefault();
    });
});