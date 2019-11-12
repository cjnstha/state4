
$(document).ready(function() {
    $('#datatable-table-index').DataTable( {
        dom: 'Bfrtip',
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
                    title: 'Project List',
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
} );

