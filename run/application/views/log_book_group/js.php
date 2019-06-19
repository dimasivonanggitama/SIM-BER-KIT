<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });
  });

  $('.datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
          
    });

  
  $('.datepickerbulan').datepicker({
      autoclose: true,
      format : 'm',
      viewMode: 'months', 
      minViewMode: 'months'
      
     
          
    });

  $('.datepickertahun').datepicker({
      autoclose: true,
      format : 'yyyy',
      viewMode: 'years', 
      minViewMode: 'years'
      
     
          
    });

  function parent(val){
	  if ($('#module_'+val).is(':checked')) {
		  $('.module_child_'+val).prop('checked', true);
	  } else {
		  $('.module_child_'+val).prop('checked', false);
	  }
  }
  </script>