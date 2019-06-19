<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });

	  $('.datepickertahun').datepicker({
	      autoclose: true,
	      format : 'yyyy',
	      viewMode: 'years', 
	      minViewMode: 'years'
	    });



	  $('.datepickerbulan').datepicker({
	      autoclose: true,
	      format : 'm',
	      viewMode: 'months', 
	      minViewMode: 'months'
	      
	     
	          
	    });
  });

</script>