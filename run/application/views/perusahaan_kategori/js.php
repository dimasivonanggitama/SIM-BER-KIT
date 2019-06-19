<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });

	  $('.datepicker').datepicker({
	        autoclose: true,
	        format : 'yyyy-mm-dd'
	            
	      });
  });
  </script>