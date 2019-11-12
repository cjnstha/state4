


$(document).ready(function() {
    $('#filter-search').submit(function(event) {
      // var formData = {
        //     'district_id'   : $('select[name=district_id]').val(),
        //     'donor_code'    : $('select[name=donor_code]').val(),
        //     'project_code'  : $('select[name=project_code]').val(),
        //     'keywords'      : $('input[name=keywords]').val(),
        //     's_year'        : $('select[name=s_year]').val(),
        //     's_month'       : $('select[name=s_month]').val(),
        //     's_day'         : $('select[name=s_day]').val(),
        //     '_token'         : $('meta[name="csrf-token"]').attr('content'),
        // };
        var baseurl = " http://localhost/sfcgdbms/public/project/";
        var  filterajax = baseurl + "filter";
       
        var dtable = $('#datatable').dataTable({
          'ajax': {
            "type"   : "POST",
            "url"    : "http://localhost/sfcgdbms/public/project/filter",
            "data"   : function( d ) {
              d.district_id   = $('select[name=district_id]').val();
              d.donor_code    = $('select[name=donor_code]').val();
              d.project_code  = $('select[name=project_code]').val();
              d.s_year        = $('select[name=s_year]').val();
              d.s_month       = $('select[name=s_month]').val();
              d.s_day         = $('select[name=s_day]').val();
              d.keywords      = $('input[name=keywords]').val();  
            },
            "dataSrc": ""
          },
          'columns': [
            {"data" : "metric_name"},
            {"data" : "metric_type"},
            {"data" : "metric_timestamp"},
            {"data" : "metric_duration"}
          ]
        });
        //To Reload The Ajax
        //See DataTables.net for more information about the reload method
        dtable.ajax.reload()

        })
});

